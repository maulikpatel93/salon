<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Api\Appointment;
use App\Models\Api\Client;
use App\Models\Api\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;

class ReportApiController extends Controller
{
    protected $successStatus = 200;
    protected $badrequestStatus = 400;
    protected $errorStatus = 422;
    protected $unauthorizedStatus = 401;
    protected $warningStatus = 410;

    protected $staff_field = [
        'id',
        'salon_id',
        'price_tier_id',
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'calendar_booking',
    ];

    protected $client_field = [
        'id',
        'salon_id',
        'first_name',
        'last_name',
        'email',
        'phone_number',
    ];

    protected $salon_field = [
        'id',
        'business_name',
    ];

    protected $appointment_field = [
        'id',
        'client_id',
        'service_id',
        'staff_id',
        'dateof',
        'start_time',
        'end_time',
        'cost',
        'status',
        'cancellation_reason',
        'updated_at',
    ];

    public function __construct()
    {
        $this->middleware('auth:api');
        parent::__construct();
    }

    public function view(Request $request)
    {
        $requestAll = $request->all();
        $staff_field = $this->staff_field;
        $client_field = $this->client_field;
        $appointment_field = $this->appointment_field;

        $validator = Validator::make($requestAll, [
            'auth_key' => 'required',
            'salon_id' => 'required|integer',
            'ScreenReport' => 'required',
        ]);
        if ($validator->fails()) {
            $messages = $validator->messages();
            return response()->json(['errors' => $messages, 'message' => __('messages.validation_error')], $this->errorStatus);
        }

        $pagination = $request->pagination ? $request->pagination : false;
        $limit = $request->limit ? $request->limit : config('params.apiPerPage');
        $orderby = 'id desc';

        $ScreenReport = $request->ScreenReport;
        $salon_id = $request->salon_id;
        $staff_id = $request->staff_id;
        $daterange = $request->daterange ? explode(" - ", $request->daterange) : "";
        $model = "";
        if ($ScreenReport === "performance_summary") {
            $queryData = Staff::with(['appointment:id'])->has('appointment')->select($staff_field)->where(['is_active' => 1, 'salon_id' => $salon_id, 'role_id' => 5])->orderByRaw($orderby);
            if ($staff_id && !$daterange) {
                $queryData->where('id', $staff_id);
            }
            if (!$staff_id && $daterange) {
                $queryData->addSelect(DB::raw('"' . $daterange[0] . '" as startdate, "' . $daterange[1] . '" as enddate'));
            }
            if ($staff_id && $daterange) {
                $queryData->addSelect(DB::raw('"' . $daterange[0] . '" as startdate, "' . $daterange[1] . '" as enddate'))->where('id', $staff_id);
            }
            if ($pagination == true) {
                $model = $queryData->paginate($limit);
            } else {
                $model = $queryData->get();
            }

        }
        if ($ScreenReport === "client_retention") {
            $queryData = Client::with(["lastappointment" => function ($query) {
                $query->select(['id', 'client_id', 'dateof', 'start_time', 'end_time'])->orderBy('id', 'desc');
            }])->has("lastappointment")->select($client_field)->where(['is_active' => 1, 'salon_id' => $salon_id, 'role_id' => 6])->orderByRaw($orderby);
            if ($daterange) {
                $queryData->addSelect(DB::raw('"' . $daterange[0] . '" as startdate, "' . $daterange[1] . '" as enddate'));
            }
            if ($pagination == true) {
                $model = $queryData->paginate($limit);
            } else {
                $model = $queryData->get();
            }
        }

        if ($ScreenReport === "cancelled_appointments") {
            $queryData = Appointment::with([
                "client:id,first_name,last_name,email,phone_number",
                "staff:id,first_name,last_name,email,phone_number",
                "service:id,name",
            ])->select($appointment_field)->where(['status' => 'Cancelled'])->orderBy('id', 'desc');

            if ($staff_id) {
                $queryData->where('staff_id', $staff_id);
            }
            if ($daterange) {
                $queryData->whereDate('updated_at', '>=', $daterange[0])->whereDate('updated_at', '<=', $daterange[1]);
            }
            if ($pagination == true) {
                $model = $queryData->paginate($limit);
            } else {
                $model = $queryData->get();
            }
        }
        if ($ScreenReport === "appointment_schedule") {
            $queryData = Appointment::with([
                "client:id,first_name,last_name,email,phone_number",
                "staff:id,first_name,last_name,email,phone_number",
                "service:id,name",
            ])->select($appointment_field)->orderBy('id', 'desc');

            if ($staff_id) {
                $queryData->where('staff_id', $staff_id);
            }
            if ($daterange) {
                $queryData->whereDate('dateof', '>=', $daterange[0])->whereDate('dateof', '<=', $daterange[1]);
            }
            if ($pagination == true) {
                $model = $queryData->paginate($limit);
            } else {
                $model = $queryData->get();
            }
        }

        if ($model && $model->count() > 0) {
            $successData = $model->toArray();
            if ($successData) {
                return response()->json($successData, $this->successStatus);
            }
        }
        return response()->json(['message' => __('messages.failed')], $this->errorStatus);
    }

}
