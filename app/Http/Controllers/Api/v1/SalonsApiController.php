<?php

namespace App\Http\Controllers\Api\v1;

use App\Exceptions\UnsecureException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\SalonRequest;
use App\Models\Api\Salons;
use App\Models\Api\SalonWorkingHours;
use App\Models\Api\Users;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Validator;

class SalonsApiController extends Controller
{
    protected $successStatus = 200;
    protected $badrequestStatus = 400;
    protected $errorStatus = 422;
    protected $unauthorizedStatus = 401;
    protected $warningStatus = 410;

    protected $field = [
        'business_name',
        'business_email',
        'business_email_verified',
        'business_email_verified_at',
        'business_phone_number',
        'business_phone_number_verified',
        'business_phone_number_verified_at',
        'business_address',
        'salon_type',
        'number_of_staff',
        'logo',
        'timezone',
        'terms',
    ];

    public function __construct()
    {
        $this->middleware('guest:api');
        parent::__construct();
    }

    public function view(Request $request)
    {
        $requestAll = $request->all();
        $id = $request->id;
        return $this->returnResponse($request, $id);
    }

    public function store(SalonRequest $request)
    {
        $requestAll = $request->all();
        $salon_working_hours = ($request->working_hours) ? json_decode($request->working_hours, true) : [];
        $requestAll['working_hours'] = $salon_working_hours ? $salon_working_hours : [];
        $messages = [
            'working_hours.*.days.required' => "The days field is required.",
            'working_hours.*.start_time.required_if' => "The start time field is required when dayoff is on.",
            'working_hours.*.end_time.required_if' => "The end time field is required when dayoff is on.",
            'working_hours.*.end_time.after' => "The end time must be a date after start time.",
        ];
        $validator = Validator::make($requestAll, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email,id_to_ignore,id,role_id,4',
            'password' => 'required|min:6|max:16',
            'phone_number' => "required|regex:/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/",
            'working_hours' => 'array',
            'working_hours.*.days' => 'required',
            'working_hours.*.start_time' => 'nullable|required_if:working_hours.*.dayoff,1',
            'working_hours.*.end_time' => 'nullable|required_if:working_hours.*.dayoff,1|date_format:H:i|after:working_hours.*.start_time',
        ], $messages);

        if ($validator->passes()) {
            try {
                $requestAll['is_active_at'] = currentDateTime();
                $model = new Salons;
                $model->business_name = $request->business_name;
                $model->business_email = null;
                $model->business_email_verified = "1";
                $model->business_email_verified_at = currentDateTime();
                $model->business_phone_number = $request->business_phone_number;
                $model->business_phone_number_verified = "1";
                $model->business_phone_number_verified_at = currentDateTime();
                $model->business_address = $request->business_address;
                $model->salon_type = $request->salon_type;
                $model->logo = null;
                $model->timezone = "";
                $model->terms = $request->terms === true ? "1" : "0";
                $model->is_active = "1";
                $model->is_active_at = currentDateTime();
                $model->save();
                if ($model) {
                    $days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
                    if ($salon_working_hours) {
                        foreach ($salon_working_hours as $key => $value) {
                            if (isset($value['days']) && in_array($value['days'], $days)) {
                                $SalonWorkingHoursModel = SalonWorkingHours::where(['salon_id' => $model->id, 'days' => $value['days']])->first();
                                if (empty($SalonWorkingHoursModel)) {
                                    $SalonWorkingHoursModel = new SalonWorkingHours;
                                }
                                $dayoff = (isset($value['dayoff']) && $value['dayoff']) ? '1' : '0';
                                $start_time = isset($value['start_time']) ? $value['start_time'] : '';
                                $end_time = isset($value['end_time']) ? $value['end_time'] : '';
                                $break_time = (isset($value['break_time']) && $value['break_time']) ? $value['break_time'] : [];
                                $SalonWorkingHoursModel->salon_id = $model->id;
                                $SalonWorkingHoursModel->days = $value['days'];
                                $SalonWorkingHoursModel->start_time = $dayoff ? $start_time : null;
                                $SalonWorkingHoursModel->end_time = $dayoff ? $end_time : null;
                                $SalonWorkingHoursModel->break_time = $dayoff ? $break_time : [];
                                $SalonWorkingHoursModel->dayoff = $dayoff;
                                $SalonWorkingHoursModel->is_active_at = currentDateTime();
                                $SalonWorkingHoursModel->save();
                            }
                        }
                    }

                    $email_username = explode('@', $requestAll['email']);
                    $token = Str::random(config('params.auth_key_character'));
                    $modelSalonOwner = new Users;
                    $modelSalonOwner->salon_id = $model->id;
                    $modelSalonOwner->role_id = 4;
                    $modelSalonOwner->first_name = $request->first_name;
                    $modelSalonOwner->last_name = $request->last_name;
                    $modelSalonOwner->email = $request->email;
                    $modelSalonOwner->email_verified = "1";
                    $modelSalonOwner->email_verified_at = currentDateTime();
                    $modelSalonOwner->phone_number = $request->phone_number;
                    $modelSalonOwner->phone_number_verified = "1";
                    $modelSalonOwner->phone_number_verified_at = currentDateTime();
                    $modelSalonOwner->password = Hash::make($request->password);
                    $modelSalonOwner->is_active_at = currentDateTime();
                    $modelSalonOwner->auth_key = hash('sha256', $token);
                    $modelSalonOwner->username = $email_username ? $email_username[0] . random_int(101, 999) : $requestAll['first_name'] . '_' . $requestAll['last_name'] . '_' . random_int(101, 999);
                    $modelSalonOwner->save();
                }
                return $this->returnResponse($request, $model->id);
            } catch (Exception $e) {
                // do task when error
                dd($e->getMessage()); // insert query
            }

        } else {
            // $errors = $validator->errors()->all();
            $messages = $validator->messages();
            $keys = array_keys($messages->toArray());
            $values = array_values($messages->toArray());
            $errors = [];
            if ($keys) {
                for ($i = 0; $i < count($keys); $i++) {
                    $valueArray = explode(".", $keys[$i]);
                    $valid = [];
                    if ($valueArray) {
                        $errors[$valueArray[0]][$valueArray[1]][$valueArray[2]] = $values[$i];
                    }
                }
            }
            return response()->json(['errors' => $errors, 'message' => __('messages.validation_error')], $this->errorStatus);
        }
        return response()->json(['message' => __('messages.failed')], $this->errorStatus);

    }

    public function update(SalonRequest $request, $id)
    {
        $requestAll = $request->all();
        $model = $this->findModel($id);
        $model->fill($requestAll);
        $model->save();
        return $this->returnResponse($request, $model->id);
    }

    protected function findModel($id)
    {
        if (($model = Salons::find($id)) !== null) {
            return $model;
        }
        throw new UnsecureException('The requested page does not exist.');
    }

    public function returnResponse($request, $id, $data = [])
    {
        $requestAll = $request->all();

        $field = ($request->field) ? array_merge(['id'], explode(',', $request->field)) : $this->field;

        $pagination = $request->pagination ? $request->pagination : false;
        $limit = $request->limit ? $request->limit : config('params.apiPerPage');

        $where = ['is_active' => '1'];
        $where = ($id) ? array_merge($where, ['id' => $id]) : $where;

        $orderby = 'id desc';
        if ($id) {
            if ($request->result == 'result_array') {
                $model = Salons::select($field)->where($where)->get();
            } else {
                $model = Salons::select($field)->where($where)->first();
            }
            $successData = $model->toArray();
            return response()->json($successData, $this->successStatus);
        } else {
            if ($pagination == true) {
                $model = Salons::select($field)->where($where)->orderByRaw($orderby)->paginate($limit);
            } else {
                $model = Salons::select($field)->where($where)->orderByRaw($orderby)->get();
            }
            if ($model->count()) {
                $successData = $model->toArray();
                if ($successData) {
                    return response()->json($successData, $this->successStatus);
                }
            }
        }
        return response()->json(['message' => __('messages.failed')], $this->errorStatus);
    }

    public function checkexist(Request $request)
    {
        $requestAll = $request->all();
        $pagetype = $request->pagetype;
        $email_verified = $request->email_verified;
        $email = $request->email;
        if ($pagetype === "signupstep2") {
            $validator = Validator::make($requestAll, [
                'email' => 'required|email|unique:users,email,id_to_ignore,id,role_id,4',
            ]);
            if ($validator->fails()) {
                return response()->json($validator->validate(), $this->errorStatus);
            }
            if (empty($email_verified) && $email) {
                $email_otp = rand(1000, 9999);
                // $user = Users::where('email', '=', $request->email)->update(['otp' => $otp]);
                $field = array();
                $field['{{otp}}'] = $email_otp;
                $sendmail = sendMail($request->email, 'email_verification', $field);
                if (empty($sendmail)) {
                    return response()->json(['email' => $requestAll['email'], 'message' => __('messages.wrongmail')], $this->errorStatus);
                }
                return response()->json(['email_otp' => $email_otp, 'message' => __('messages.otp_send')], $this->errorStatus);
            }
        }
        if ($pagetype === "signupstep3") {
            $validator = Validator::make($requestAll, [
                'business_name' => 'required|unique:salons,business_name',
                'business_phone_number' => "required|regex:/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/|unique:salons,business_phone_number",
            ]);
            if ($validator->fails()) {
                return response()->json($validator->validate(), $this->errorStatus);
            }
        }
        return response()->json($this->successStatus);
        // $model = Salons::where(['is_active' => '1', 'business_name' => "business_name"])->whereRaw('(CASE WHEN business_email is not null THEN business_email = "' . $request->email . '" ELSE business_email is null END)')->first();
    }

}