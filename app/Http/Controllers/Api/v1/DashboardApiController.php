<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Api\Appointment;
use App\Models\Api\Client;
use Illuminate\Http\Request;
use Validator;

class DashboardApiController extends Controller
{
    protected $successStatus = 200;
    protected $errorStatus = 422;
    protected $unauthorizedStatus = 401;

    public function __construct()
    {
        $this->middleware('auth:api');
        parent::__construct();
    }

    public function view(Request $request)
    {
        $requestAll = $request->all();
        $AppointmentCount = Appointment::where(['is_active' => '1', 'salon_id' => $request->salon_id, 'status' => 'confirmed'])->count();
        $numberofClients = Client::where(['is_active' => '1', 'salon_id' => $request->salon_id, 'role_id' => 6])->count();
        $numberofNewClients = Client::where(['is_active' => '1', 'salon_id' => $request->salon_id, 'role_id' => 6])->where('created_at', '>=', date('Y-m-d'))->count();

        $successData['appointments'] = $AppointmentCount;
        $successData['averageBookingValue'] = '50.00';
        $successData['numberofClients'] = $numberofClients;
        $successData['numberofNewClients'] = $numberofNewClients;
        return response()->json($successData, $this->successStatus);
    }

    public function upcomingappointment(Request $request)
    {
        $requestAll = $request->all();
        $pagination = $request->pagination ? $request->pagination : false;
        $limit = $request->limit ? $request->limit : config('params.apiPerPage');
        $validator = Validator::make($requestAll, [
            'salon_id' => 'required|integer',
        ]);
        if ($validator->fails()) {
            $messages = $validator->messages();
            return response()->json(['errors' => $messages, 'message' => __('messages.validation_error')], $this->errorStatus);
        }
        $withArray = [
            'salon:id,business_name',
            'client:id,first_name,last_name,username,email,phone_number,profile_photo',
            'service:id,name,description,duration,padding_time,color,service_booked_online,deposit_booked_online,deposit_booked_price',
            'staff:id,price_tier_id,first_name,last_name,email',
        ];

        $field = [
            'id',
            'salon_id',
            'client_id',
            'service_id',
            'staff_id',
            'dateof',
            'start_time',
            'end_time',
            'duration',
            'cost',
            'repeats',
            'repeat_time',
            'repeat_time_option',
            'ending',
            'booking_notes',
            'status',
            'cancellation_reason',
            'reschedule',
            'reschedule_at',
            'status_manage',
        ];
        $where = ['is_active' => '1', 'salon_id' => $request->salon_id, 'status' => 'confirmed'];
        $model = Appointment::with($withArray)->select($field)->where($where)->where('dateof', '<=', date('Y-m-d'))->orderByRaw('id desc')->paginate($limit);
        $successData = $model->toArray();
        return response()->json($successData, $this->successStatus);
    }
}