<?php

namespace App\Http\Controllers\Api\v1;

use App\Exceptions\UnsecureException;
use App\Exports\ClientExport;
use App\Http\Controllers\Api\v1\StripeApiController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ClientRequest;
use App\Models\Api\Cart;
use App\Models\Api\Client;
use App\Models\Api\Sale;
use App\Models\Api\VoucherTo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class ClientApiController extends Controller
{
    protected $successStatus = 200;
    protected $badrequestStatus = 400;
    protected $errorStatus = 422;
    protected $unauthorizedStatus = 401;
    protected $warningStatus = 410;

    protected $field = [
        'id',
        'salon_id',
        'first_name',
        'last_name',
        'username',
        'email',
        'profile_photo',
        'phone_number',
        'gender',
        'date_of_birth',
        'address',
        'street',
        'suburb',
        'state',
        'postcode',
        'description',
        'send_sms_notification',
        'send_email_notification',
        'recieve_marketing_email',
    ];

    protected $salon_field = [
        'id',
        'business_name',
    ];

    public function __construct()
    {
        $this->middleware('auth:api');
        parent::__construct();
    }

    public function view(Request $request)
    {
        $requestAll = $request->all();
        $id = $request->id;
        return $this->returnResponse('view', $request, $id);
    }

    public function store(ClientRequest $request)
    {
        $requestAll = $request->all();
        unset($requestAll['auth_key']);

        $requestAll['is_active_at'] = currentDateTime();
        $email_username = explode('@', $requestAll['email']);
        $requestAll['panel'] = 'Frontend';
        $requestAll['role_id'] = 6;
        $token = Str::random(config('params.auth_key_character'));
        $randompassword = Str::random(6);
        $requestAll['auth_key'] = hash('sha256', $token);
        $requestAll['username'] = $email_username ? $email_username[0] . random_int(101, 999) : $requestAll['first_name'] . '_' . $requestAll['last_name'] . '_' . random_int(101, 999);
        $requestAll['password'] = Hash::make(Str::random(10));
        $requestAll['send_sms_notification'] = (isset($requestAll['send_sms_notification']) && $requestAll['send_sms_notification']) ? '1' : '0';
        $requestAll['send_email_notification'] = (isset($requestAll['send_email_notification']) && $requestAll['send_email_notification']) ? '1' : '0';
        $requestAll['recieve_marketing_email'] = (isset($requestAll['recieve_marketing_email']) && $requestAll['recieve_marketing_email']) ? '1' : '0';
        $model = new Client;
        $model->fill($requestAll);
        $file = $request->file('profile_photo');
        if ($file) {
            $fileName = time() . '_' . str_replace(' ', '_', $file->getClientOriginalName());
            $filePath = $file->storeAs('client', $fileName, 'public');
            $model->profile_photo = $fileName;
        }
        $model->description = isset($requestAll['description']) ? $requestAll['description'] : '';
        $model->save();
        if ($model && $model->id) {
            $StripeModel = new StripeApiController;
            $CustomerCreateRequestData = [
                'client_id' => $model->id,
                'name' => \ucfirst($model->first_name) . ' ' . \ucfirst($model->last_name),
                'email' => $model->email,
                'phone' => $model->phone_number,
                'address' => [
                    'line1' => $model->address,
                    'line2' => $model->street . ' ' . $model->suburb,
                    'postal_code' => $model->postcode,
                    'city' => $model->suburb,
                    'state' => $model->state,
                    'country' => 'AU',
                ],
                'description' => $model->description,
            ];
            $stripeCustomerCreateRequest = new Request($CustomerCreateRequestData);
            $stripeCustomerCreate = $StripeModel->customerCreate($stripeCustomerCreateRequest);
        }
        return $this->returnResponse('store', $request, $model->id);
    }

    public function update(ClientRequest $request, $id)
    {
        $requestAll = $request->all();
        unset($requestAll['auth_key']);
        $model = $this->findModel($id);
        if (empty($model->auth_key)) {
            $token = Str::random(config('params.auth_key_character'));
            $model->auth_key = hash('sha256', $token);
        }
        $requestAll['send_sms_notification'] = (isset($requestAll['send_sms_notification']) && $requestAll['send_sms_notification']) ? '1' : '0';
        $requestAll['send_email_notification'] = (isset($requestAll['send_email_notification']) && $requestAll['send_email_notification']) ? '1' : '0';
        $requestAll['recieve_marketing_email'] = (isset($requestAll['recieve_marketing_email']) && $requestAll['recieve_marketing_email']) ? '1' : '0';
        $model->fill($requestAll);
        $file = $request->file('profile_photo');
        if ($file) {
            Storage::delete('/public/client/' . $model->profile_photo);
            $fileName = time() . '_' . str_replace(' ', '_', $file->getClientOriginalName());
            $filePath = $file->storeAs('client', $fileName, 'public');
            $model->profile_photo = $fileName;
        }
        $model->description = isset($requestAll['description']) ? $requestAll['description'] : $model->description;
        $model->save();
        // if ($model && $model->id && empty($model->stripe_customer_account_id)) {
        //     $StripeModel = new StripeApiController;
        //     $CustomerCreateRequestData = [
        //         'client_id' => $model->id,
        //         'name' => \ucfirst($model->first_name) . ' ' . \ucfirst($model->last_name),
        //         'email' => $model->email,
        //         'phone' => $model->phone_number,
        //         'address' => [
        //             'line1' => $model->address,
        //             'line2' => $model->street . ' ' . $model->suburb,
        //             'postal_code' => $model->postcode,
        //             'city' => $model->suburb,
        //             'state' => $model->state,
        //             'country' => 'AU',
        //         ],
        //         'description' => $model->description,
        //     ];
        //     $stripeCustomerCreateRequest = new Request($CustomerCreateRequestData);
        //     $stripeCustomerCreate = $StripeModel->customerCreate($stripeCustomerCreateRequest);
        // }
        return $this->returnResponse('update', $request, $model->id);
    }

    public function delete(Request $request, $id)
    {
        $requestAll = $request->all();
        Client::where(['id' => $id, 'role_id' => 6])->delete();
        return response()->json(['id' => $id, 'message' => __('messages.success')], $this->successStatus);
    }

    protected function findModel($id)
    {
        if (($model = Client::find($id)) !== null) {
            return $model;
        }
        throw new UnsecureException('The requested page does not exist.');
    }

    public function returnResponse($method, $request, $id, $data = [])
    {
        $requestAll = $request->all();
        $field = ($request->field) ? array_merge(['id', 'salon_id'], explode(',', $request->field)) : $this->field;
        $sort = ($request->sort) ? $request->sort : "";

        $salon_field = $this->salon_field;
        if (isset($requestAll['salon_field']) && empty($requestAll['salon_field'])) {
            $salon_field = false;
        } else if ($request->salon_field == '*') {
            $salon_field = [$request->salon_field];
        } else if ($request->salon_field) {
            $salon_field = array_merge(['id'], explode(',', $request->salon_field));
        }
        $withArray = [];
        if ($salon_field) {
            $withArray[] = 'salon:' . implode(',', $salon_field);
        }
        $pagination = $request->pagination ? $request->pagination : false;
        $limit = $request->limit ? $request->limit : config('params.apiPerPage');

        $where = ['is_active' => '1', 'role_id' => 6, 'salon_id' => $request->salon_id];
        $where = ($id) ? array_merge($where, ['id' => $id]) : $where;

        $whereLike = $request->q ? explode(' ', $request->q) : '';

        $orderby = 'id desc';
        if ($sort) {
            $sd = [];
            foreach ($sort as $key => $value) {
                $sd[] = $key . ' ' . $value;
            }
            if ($sd) {
                $orderby = implode(", ", $sd);
            }

        }
        $query = Client::with($withArray)->select($field)->where($where);
        if ($id) {
            if ($request->result == 'result_array') {
                $model = $query->get();
            } else {
                $model = $query->first();
            }
            $successData = $model->toArray();
            return response()->json($successData, $this->successStatus);
        } else {
            if ($pagination == true) {
                if ($whereLike) {
                    $model = $query->where(function ($querylike) use ($whereLike) {
                        if ($whereLike) {
                            $querylike->where('first_name', "like", "%" . $whereLike[0] . "%");
                            foreach ($whereLike as $row) {
                                $querylike->orWhere('first_name', "like", "%" . $row . "%");
                                $querylike->orWhere('last_name', "like", "%" . $row . "%");
                            }
                        }
                    })->orderByRaw($orderby)->paginate($limit);
                } else {
                    $model = $query->orderByRaw($orderby)->paginate($limit);
                }
            } else {
                if ($whereLike) {
                    $model = $query->where(function ($querylike) use ($whereLike) {
                        if ($whereLike) {
                            $querylike->where('first_name', "like", "%" . $whereLike[0] . "%");
                            foreach ($whereLike as $row) {
                                $querylike->orWhere('first_name', "like", "%" . $row . "%");
                                $querylike->orWhere('last_name', "like", "%" . $row . "%");
                            }
                        }
                    })->orderByRaw($orderby)->get();
                } else {
                    $model = $query->orderByRaw($orderby)->get();
                }
            }
            if ($model->count()) {
                $successData = $model->toArray();
                return response()->json($successData, $this->successStatus);
            }
        }

        return response()->json(['message' => __('messages.failed')], $this->errorStatus);
    }

    public function clientmembership(Request $request)
    {
        $requestAll = $request->all();
        $client_id = $request->client_id;
        unset($requestAll['auth_key']);
        $model = $this->findModel($client_id);
        $limit = $request->limit ? $request->limit : config('params.apiPerPage');
        $withArray = [
            'services',
            'staff',
            'products',
            'vouchers',
            'membership',
            'voucherto',
            'sale',
        ];
        $cardModel = Cart::with($withArray)->whereNotNull('membership_id')->whereHas('sale', function ($q) use ($client_id) {
            $q->where('client_id', $client_id);
        })->paginate($limit);
        if ($cardModel->count()) {
            $successData = $cardModel->toArray();
            return response()->json($successData, $this->successStatus);
        }
        return response()->json(['message' => __('messages.failed')], $this->errorStatus);
    }

    public function clientinvoice(Request $request)
    {
        $requestAll = $request->all();
        $client_id = $request->client_id;
        unset($requestAll['auth_key']);
        $model = $this->findModel($client_id);
        $limit = $request->limit ? $request->limit : config('params.apiPerPage');
        $withArray = [
            'salon:id,business_name',
            'client:id,first_name,last_name,email,phone_number',
            'cart',
            'appointment:id,dateof,start_time,end_time,duration,cost',
        ];
        $cardModel = Sale::with($withArray)->whereNotNull('client_id')->where('client_id', $client_id)->paginate($limit);
        if ($cardModel->count()) {
            $successData = $cardModel->toArray();
            return response()->json($successData, $this->successStatus);
        }
        return response()->json(['message' => __('messages.failed')], $this->errorStatus);
    }

    public function clientvoucher(Request $request)
    {
        $requestAll = $request->all();
        $client_id = $request->client_id;
        unset($requestAll['auth_key']);
        $model = $this->findModel($client_id);
        $limit = $request->limit ? $request->limit : config('params.apiPerPage');
        $withArray = [
            'voucher',
        ];
        $currentdate = Carbon::parse()->format('Y-m-d H:i:s');
        $voucherto = VoucherTo::with('voucher')->whereHas('voucher', function ($q) use ($currentdate) {
            $q->where(['is_active' => 1])->where('expiry_at', '>=', $currentdate)->where('remaining_balance', '>', '0');
        })->where(['client_id' => $client_id])->paginate($limit);
        // $voucherto = VoucherTo::with($withArray)->where('client_id', $client_id)->paginate($limit);
        if ($voucherto->count()) {
            $successData = $voucherto->toArray();
            return response()->json($successData, $this->successStatus);
        }
        return response()->json(['message' => __('messages.failed')], $this->errorStatus);
    }

    public function clientimport(Request $request)
    {
        $requestAll = $request->all();
        $this->validate($request, [
            'excelfile' => 'required|mimes:xls,xlsx,ods',
        ]);
        $requestAll['is_active_at'] = currentDateTime();
        $requestAll['panel'] = 'Frontend';
        $token = Str::random(config('params.auth_key_character'));
        $requestAll['auth_key'] = hash('sha256', $token);
        $file = $request->file('excelfile');
        if (!empty($file)) {
            // echo "enter in file";
            $row = Excel::toCollection(collect([]), $file)->toArray();

            if (in_array($file->getClientOriginalExtension(), ['xlsx', 'xls', 'ods'])) {
                // echo "get file extension";
                if (!empty($row)) {
                    // echo "not empty";
                    foreach ($row as $key11 => $value2) {
                        foreach ($value2 as $key1 => $value1) {
                            if ($key1 > 0) {
                                $value1[13] = (isset($value1[13]) && $value1[13] == 'on') ? '1' : '0';
                                $value1[14] = (isset($value1[14]) && $value1[14] == 'on') ? '1' : '0';
                                $value1[15] = (isset($value1[15]) && $value1[15] == 'on') ? '1' : '0';

                                $token = Str::random(config('params.auth_key_character'));
                                $randompassword = Str::random(6);

                                $data = array(
                                    'role_id' => 6,
                                    'salon_id' => $request->salon_id,
                                    'panel' => 'Frontend',
                                    'first_name' => $value1[0],
                                    'last_name' => $value1[1],
                                    'email' => $value1[2],
                                    'email_verified' => 1,
                                    'email_verified_at' => currentDateTime(),
                                    'phone_number_verified' => 1,
                                    'phone_number_verified_at' => currentDateTime(),
                                    'password' => Hash::make($value1[3]),
                                    'phone_number' => $value1[4],
                                    'date_of_birth' => Carbon::parse($value1[5])->format('Y-m-d'),
                                    // 'date_of_birth' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value1[5])->format('Y-m-d'),
                                    'gender' => $value1[6],
                                    'address' => $value1[7],
                                    'street' => $value1[8],
                                    'suburb' => $value1[9],
                                    'state' => $value1[10],
                                    'postcode' => $value1[11],
                                    'description' => $value1[12],
                                    'send_sms_notification' => $value1[13],
                                    'send_email_notification' => $value1[14],
                                    'recieve_marketing_email' => $value1[15],
                                    'is_active_at' => currentDateTime(),

                                );
                                // echo '<pre>';
                                // print_r($data);
                                // echo '<pre>';
                                // dd();
                                $clientModel = Client::where(['email' => $data['email'], 'role_id' => 6])->first();
                                if (empty($clientModel)) {
                                    $email_username = explode('@', $data['email']);
                                    $clientModel = new Client;
                                    $clientModel->auth_key = hash('sha256', $token);
                                    $clientModel->username = $email_username ? $email_username[0] . random_int(101, 999) : $requestAll['first_name'] . '_' . $requestAll['last_name'] . '_' . random_int(101, 999);
                                    $clientModel->fill($data);
                                    $clientModel->save();
                                }
                                // $insert_data = Client::insert($data);
                            }
                        }
                    }
                    return response()->json(['message' => __('messages.success')], $this->successStatus);
                }
            }
        }
        return response()->json(['message' => __('messages.failed')], $this->errorStatus);
    }

    public function clientexport()
    {

        // $data = Excel::download(new ClientExport, 'client_export.xlsx');
        // return $data;
        $file_name = date('YmdHis') . rand();
        Excel::store(new ClientExport(), $file_name . '.xlsx', 'local');

        return response()->json($file_name . '.xlsx', 200);
        // echo "hello export";
        // if ($data_export) {
        //     echo "exported";
        // } else {
        //     echo "not exported";
        // }

    }
}
