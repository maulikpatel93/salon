<?php

namespace App\Http\Controllers\Api\v1;

use App\Exceptions\UnsecureException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\AppointmentRequest;
use App\Http\Requests\Api\AppointmentStatusRequest;
use App\Models\Api\Appointment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AppointmentApiController extends Controller
{
    protected $successStatus = 200;
    protected $errorStatus = 422;
    protected $unauthorizedStatus = 401;

    protected $field = [
        'id',
        'salon_id',
        'client_id',
        'service_id',
        'staff_id',
        'date',
        'start_time',
        'duration',
        'cost',
        'repeats',
        'booking_notes',
        'status',
        'cancellation_reason',
        'reschedule',
        'reschedule_at',
    ];

    protected $salon_field = [
        'id',
        'business_name',
        'owner_name',
    ];

    protected $client_field = [
        'id',
        'first_name',
        'last_name',
        'username',
        'email',
        'phone_number',
        'profile_photo',
    ];

    protected $service_field = [
        'id',
        'name',
        'description',
        'duration',
        'padding_time',
        'color',
        'service_booked_online',
        'deposit_booked_online',
        'deposit_booked_price',
    ];

    protected $staff_field = [
        'id',
        'price_tier_id',
        'first_name',
        'last_name',
        'email',
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
        return $this->returnResponse($request, $id);
    }

    public function store(AppointmentRequest $request)
    {
        $requestAll = $request->all();
        $requestAll['is_active_at'] = currentDateTime();
        $requestAll['status'] = 'Scheduled';
        $requestAll['duration'] = HoursToMinutes($requestAll['duration']);
        $requestAll['date'] = Carbon::parse($requestAll['date'])->format('Y-m-d');
        $requestAll['end_time'] = Carbon::parse($requestAll['date'] . ' ' . $requestAll['start_time'])->addMinutes($requestAll['duration'])->format('H:i:s');

        $model = new Appointment;
        $model->fill($requestAll);
        $model->save();
        return $this->returnResponse($request, $model->id);
    }

    public function update(AppointmentRequest $request, $id)
    {
        $requestAll = $request->all();
        $requestAll['status'] = $request->status ? "Confirmed" : "Scheduled";
        $requestAll['duration'] = HoursToMinutes($requestAll['duration']);
        $requestAll['date'] = Carbon::parse($requestAll['date'])->format('Y-m-d');
        $requestAll['end_time'] = Carbon::parse($requestAll['date'] . ' ' . $requestAll['start_time'])->addMinutes($requestAll['duration'])->format('H:i:s');

        $model = $this->findModel($id);
        $model->fill($requestAll);
        $model->save();
        return $this->returnResponse($request, $model->id);
    }

    public function status(AppointmentStatusRequest $request, $id)
    {
        $requestAll = $request->all();
        $model = $this->findModel($id);
        $model->fill($requestAll);
        $model->save();
        return $this->returnResponse($request, $model->id);
    }

    public function delete(Request $request, $id)
    {
        $requestAll = $request->all();
        Appointment::where('id', $id)->delete();
        return response()->json(['id' => $id, 'message' => __('message.success')], $this->successStatus);
    }

    protected function findModel($id)
    {
        if (($model = Appointment::find($id)) !== null) {
            return $model;
        }
        throw new UnsecureException('The requested page does not exist.');
    }

    public function returnResponse($request, $id, $data = [])
    {
        $requestAll = $request->all();
        $field = ($request->field) ? array_merge(['id', 'salon_id', 'client_id', 'service_id', 'staff_id'], explode(',', $request->field)) : $this->field;
        $sort = ($request->sort) ? $request->sort : "";
        $option = ($request->option) ? $request->option : "";
        //Start Calender View Client base
        $client_id = ($request->client_id) ? $request->client_id : "";
        $start_date = ($request->start_date) ? Carbon::parse($request->start_date)->format('Y-m-d') : "";
        $end_date = ($request->end_date) ? Carbon::parse($request->end_date)->format('Y-m-d') : "";
        $timezone = ($request->timezone) ? $request->timezone : "";
        $type = ($request->type) ? $request->type : "";
        //End Calender View Client base
        $filter = ($request->filter) ? json_decode($request->filter, true) : "";

        $salon_field = $this->salon_field;
        if (isset($requestAll['salon_field']) && empty($requestAll['salon_field'])) {
            $salon_field = false;
        } else if ($request->salon_field == '*') {
            $salon_field = [$request->salon_field];
        } else if ($request->salon_field) {
            $salon_field = array_merge(['id'], explode(',', $request->salon_field));
        }

        $client_field = $this->client_field;
        if (isset($requestAll['client_field']) && empty($requestAll['client_field'])) {
            $client_field = false;
        } else if ($request->client_field == '*') {
            $client_field = [$request->client_field];
        } else if ($request->client_field) {
            $client_field = array_merge(['id'], explode(',', $request->client_field));
        }

        $service_field = $this->service_field;
        if (isset($requestAll['service_field']) && empty($requestAll['service_field'])) {
            $service_field = false;
        } else if ($request->service_field == '*') {
            $service_field = [$request->service_field];
        } else if ($request->service_field) {
            $service_field = array_merge(['id'], explode(',', $request->service_field));
        }

        $staff_field = $this->staff_field;
        if (isset($requestAll['staff_field']) && empty($requestAll['staff_field'])) {
            $staff_field = false;
        } else if ($request->staff_field == '*') {
            $staff_field = [$request->staff_field];
        } else if ($request->staff_field) {
            $staff_field = array_merge(['id', 'price_tier_id'], explode(',', $request->staff_field));
        }

        $withArray = [];
        if ($salon_field) {
            $withArray[] = 'salon:' . implode(',', $salon_field);
        }
        if ($client_field) {
            $withArray[] = 'client:' . implode(',', $client_field);
        }
        if ($service_field) {
            $withArray[] = 'service:' . implode(',', $service_field);
        }
        if ($staff_field) {
            $withArray[] = 'staff:' . implode(',', $staff_field);
        }

        $pagination = $request->pagination ? $request->pagination : false;
        $limit = $request->limit ? $request->limit : config('params.apiPerPage');

        $where = ['is_active' => '1', 'salon_id' => $request->salon_id];
        if ($client_id) {
            $where['client_id'] = $client_id;
        }
        if ($start_date && $type == "day") {
            $where['date'] = $start_date;
        }
        if ($filter) {
            if (isset($filter['status']) && $filter['status']) {
                $where['status'] = $filter['status'];
            }
        }
        $where = ($id) ? array_merge($where, ['id' => $id]) : $where;
        $whereLike = $request->q ? explode(' ', $request->q) : '';

        $orderby = DB::raw('case when status= "Scheduled" then 1 when status= "Confirmed" then 2 when status= "Completed" then 3 when status= "Cancelled" then 4 end');
        if ($sort) {
            $sd = [];
            foreach ($sort as $key => $value) {
                $sd[] = $key . ' ' . $value;
            }
            if ($sd) {
                $orderby = implode(", ", $sd);
            }
        }

        if ($option) {
            $successData = Appointment::with($withArray)->selectRaw($option['valueField'] . ' as value, ' . $option['labelField'] . ' as label')->where($where)->get()->toArray();
            return response()->json($successData, $this->successStatus);
        }
        if ($id) {
            if ($request->result == 'result_array') {
                $model = Appointment::with($withArray)->select($field)->where($where)->get();
            } else {
                $model = Appointment::with($withArray)->select($field)->where($where)->first();
            }
            $successData = $model->toArray();
            return response()->json($successData, $this->successStatus);
        } else {
            if ($pagination == true) {
                $model = Appointment::with($withArray)->select($field)->where($where)->orderByRaw($orderby)->paginate($limit);
            } else {
                if ($start_date && $end_date && $type == "week") {
                    $model = Appointment::with($withArray)->select($field)->where($where)->whereBetween('date', [$start_date, $end_date])->orderByRaw($orderby)->get();
                } else {
                    $model = Appointment::with($withArray)->select($field)->where($where)->orderByRaw($orderby)->get();
                }
            }
            if ($model->count() || (isset($filter['status']) && $filter['status'])) {
                $successData = $model->toArray();
                if ($successData) {
                    return response()->json($successData, $this->successStatus);
                }
            }
        }
        return response()->json(['message' => __('messages.failed')], $this->errorStatus);
    }
}