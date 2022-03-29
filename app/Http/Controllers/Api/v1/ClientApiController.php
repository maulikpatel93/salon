<?php

namespace App\Http\Controllers\Api\v1;

use App\Exceptions\UnsecureException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ClientRequest;
use App\Models\Api\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
}