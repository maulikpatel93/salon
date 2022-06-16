<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Api\Staff;
use Illuminate\Http\Request;
use Validator;

class ReportApiController extends Controller
{
    protected $successStatus = 200;
    protected $badrequestStatus = 400;
    protected $errorStatus = 422;
    protected $unauthorizedStatus = 401;
    protected $warningStatus = 410;

    protected $field = [
        'id',
        'salon_id',
        'price_tier_id',
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'calendar_booking',
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
        $field = $this->field;

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
        $model = "";
        // $field = array_merge($field, ['AppointmentCount']);
        // echo '<pre>';
        // print_r($field);
        // echo '<pre>';
        // dd();

        if ($ScreenReport === "performance_summary") {
            if ($pagination == true) {
                $model = Staff::with(['appointment'])->has('appointment')->select($field)->where(['is_active' => 1, 'salon_id' => $salon_id, 'role_id' => 5])->orderByRaw($orderby)->paginate($limit);
            } else {
                $model = Staff::where(['is_active' => 1, 'salon_id' => $salon_id, 'role_id' => 5])->orderByRaw($orderby)->get();
            }

        }
        if ($model->count() > 0) {
            $successData = $model->toArray();
            if ($successData) {
                return response()->json($successData, $this->successStatus);
            }
        }
        echo '<pre>';
        print_r($requestAll);
        echo '<pre>';
        dd();
        return response()->json(['message' => __('messages.failed')], $this->errorStatus);
    }

}
