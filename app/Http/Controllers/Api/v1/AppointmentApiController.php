<?php

namespace App\Http\Controllers\Api\v1;

use App\Exceptions\UnsecureException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\AppointmentRequest;
use App\Http\Requests\Api\AppointmentStatusRequest;
use App\Models\Api\Appointment;
use App\Models\Api\Busytime;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class AppointmentApiController extends Controller
{
    protected $successStatus = 200;
    protected $badrequestStatus = 400;
    protected $errorStatus = 422;
    protected $unauthorizedStatus = 401;
    protected $warningStatus = 410;

    protected $field = [
        'id',
        'salon_id',
        'client_id',
        'service_id',
        'staff_id',
        'dateof',
        'start_time',
        'end_time',
        'start_datetime',
        'end_datetime',
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

    protected $salon_field = [
        'id',
        'business_name',
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
        $timezone = auth()->user()->salon->timezone;

        $requestAll['is_active_at'] = currentDateTime();
        $requestAll['status'] = 'Scheduled';
        $requestAll['duration'] = HoursToMinutes($requestAll['duration']);

        $startdatetime = $request->dateof . ' ' . $request->start_time;
        $start_datetime = Carbon::parse($startdatetime)->format('Y-m-d H:i:s');
        $end_datetime = Carbon::parse($startdatetime)->addMinutes($requestAll['duration'])->format('Y-m-d H:i:s');

        if ($requestAll['repeats'] === "Yes") {
            $requestAll['ending'] = isset($requestAll['ending']) ? Carbon::parse($requestAll['ending'] . " 00:00:00", localtimezone())->setTimezone('UTC')->format('Y-m-d') : null;
        } else {
            $requestAll['repeat_time'] = null;
            $requestAll['repeat_time_option'] = null;
            $requestAll['ending'] = null;
        }

        $requestAll['dateof'] = Carbon::parse($start_datetime, localtimezone())->setTimezone('UTC')->toDateString();
        $requestAll['start_time'] = Carbon::parse($start_datetime, localtimezone())->setTimezone('UTC')->toTimeString();
        $requestAll['end_time'] = Carbon::parse($end_datetime, localtimezone())->setTimezone('UTC')->toTimeString();
        $requestAll['start_datetime'] = Carbon::parse($start_datetime, localtimezone())->setTimezone('UTC')->toDateTimeString();
        $requestAll['end_datetime'] = Carbon::parse($end_datetime, localtimezone())->setTimezone('UTC')->toDateTimeString();

        $dateof = $requestAll['dateof'];
        $start_datetime = $requestAll['start_datetime'];
        //$end_time = $requestAll['end_time'];
        $Busytime = Busytime::select(["dateof", "start_time", "end_time", "start_datetime", "end_datetime"])->addSelect(DB::raw('"' . $dateof . '" as showdate'))->where(['is_active' => '1', 'salon_id' => $request->salon_id, 'staff_id' => $request->staff_id])->whereRaw("
                    (start_datetime <= '" . $start_datetime . "' and end_datetime >='" . $start_datetime . "') and
                    (
                        CASE
                        WHEN repeats='Yes' THEN
                            dateof <= '" . $dateof . "' and (ending is null or ending >= '" . $dateof . "') and
                            (CASE repeat_time_option
                                WHEN 'Weekly' THEN (DATEDIFF(dateof, '" . $dateof . "') % (repeat_time * 7) = 0)
                                WHEN 'Monthly' THEN (DATEDIFF(dateof, '" . $dateof . "') % (repeat_time * 31) = 0)
                                ELSE repeat_time_option is null
                            END)
                        ELSE repeats = 'No' and dateof = '" . $dateof . "'
                        END
                    )")->get();

        // $Busytime = Busytime::select(["dateof", "start_time", "end_time"])->addSelect(DB::raw('"' . $dateof . '" as showdate'))->where(['is_active' => '1', 'salon_id' => $request->salon_id, 'staff_id' => $request->staff_id])->whereRaw("
        // (start_time <= '" . $start_time . "' and end_time >='" . $start_time . "') and
        // (
        //     CASE
        //     WHEN repeats='Yes' THEN
        //         dateof <= '" . $dateof . "' and (ending is null or ending >= '" . $dateof . "') and
        //         (CASE repeat_time_option
        //             WHEN 'Weekly' THEN (DATEDIFF(dateof, '" . $dateof . "') % (repeat_time * 7) = 0)
        //             WHEN 'Monthly' THEN (DATEDIFF(dateof, '" . $dateof . "') % (repeat_time * 31) = 0)
        //             ELSE repeat_time_option is null
        //         END)
        //     ELSE repeats = 'No' and dateof = '" . $dateof . "'
        //     END
        // )")->get();

        if ($Busytime->count() > 0) {
            $alreadyBooked = $Busytime->toArray();
            return response()->json(["booked" => $alreadyBooked, "message" => __('messages.busytime_check_appointment')], $this->warningStatus);
        }
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

        $startdatetime = $request->dateof . ' ' . $request->start_time;
        $start_datetime = Carbon::parse($startdatetime)->format('Y-m-d H:i:s');
        $end_datetime = Carbon::parse($startdatetime)->addMinutes($requestAll['duration'])->format('Y-m-d H:i:s');

        if ($requestAll['repeats'] === "Yes") {
            $requestAll['ending'] = isset($requestAll['ending']) ? Carbon::parse($requestAll['ending'] . " 00:00:00", localtimezone())->setTimezone('UTC')->format('Y-m-d') : null;
        } else {
            $requestAll['repeat_time'] = null;
            $requestAll['repeat_time_option'] = null;
            $requestAll['ending'] = null;
        }

        $requestAll['dateof'] = Carbon::parse($start_datetime, localtimezone())->setTimezone('UTC')->toDateString();
        $requestAll['start_time'] = Carbon::parse($start_datetime, localtimezone())->setTimezone('UTC')->toTimeString();
        $requestAll['end_time'] = Carbon::parse($end_datetime, localtimezone())->setTimezone('UTC')->toTimeString();
        $requestAll['start_datetime'] = Carbon::parse($start_datetime, localtimezone())->setTimezone('UTC')->toDateTimeString();
        $requestAll['end_datetime'] = Carbon::parse($end_datetime, localtimezone())->setTimezone('UTC')->toDateTimeString();

        $dateof = $requestAll['dateof'];
        $start_datetime = $requestAll['start_datetime'];
        // $end_time = $requestAll['end_time'];
        $Busytime = Busytime::select(["dateof", "start_time", "end_time", "start_datetime", "end_datetime"])->addSelect(DB::raw('"' . $dateof . '" as showdate'))->where(['is_active' => '1', 'salon_id' => $request->salon_id, 'staff_id' => $request->staff_id])->whereRaw("
                    (start_datetime <= '" . $start_datetime . "' and end_datetime >='" . $start_datetime . "') and
                    (
                        CASE
                        WHEN repeats='Yes' THEN
                            dateof <= '" . $dateof . "' and (ending is null or ending >= '" . $dateof . "') and
                            (CASE repeat_time_option
                                WHEN 'Weekly' THEN (DATEDIFF(dateof, '" . $dateof . "') % (repeat_time * 7) = 0)
                                WHEN 'Monthly' THEN (DATEDIFF(dateof, '" . $dateof . "') % (repeat_time * 31) = 0)
                                ELSE repeat_time_option is null
                            END)
                        ELSE repeats = 'No' and dateof = '" . $dateof . "'
                        END
                    )")->get();

        // $Busytime = Busytime::select(["dateof", "start_time", "end_time"])->addSelect(DB::raw('"' . $dateof . '" as showdate'))->where(['is_active' => '1', 'salon_id' => $request->salon_id, 'staff_id' => $request->staff_id])->whereRaw("
        //             (start_time <= '" . $start_time . "' and end_time >='" . $start_time . "') and
        //             (
        //                 CASE
        //                 WHEN repeats='Yes' THEN
        //                     dateof <= '" . $dateof . "' and (ending is null or ending >= '" . $dateof . "') and
        //                     (CASE repeat_time_option
        //                         WHEN 'Weekly' THEN (DATEDIFF(dateof, '" . $dateof . "') % (repeat_time * 7) = 0)
        //                         WHEN 'Monthly' THEN (DATEDIFF(dateof, '" . $dateof . "') % (repeat_time * 31) = 0)
        //                         ELSE repeat_time_option is null
        //                     END)
        //                 ELSE repeats = 'No' and dateof = '" . $dateof . "'
        //                 END
        //             )")->get();

        if ($Busytime->count() > 0) {
            $alreadyBooked = $Busytime->toArray();
            return response()->json(["booked" => $alreadyBooked, "message" => __('messages.busytime_check_appointment')], $this->warningStatus);
        }
        $model = $this->findModel($id);
        $model->fill($requestAll);
        $model->save();
        return $this->returnResponse($request, $model->id);
    }

    public function reschedule(Request $request, $id)
    {
        $requestAll = $request->all();
        $dateof = $request->dateof;
        $start_time = $request->start_time;
        $end_time = Carbon::parse($dateof . ' ' . $start_time)->addMinutes($requestAll['duration'])->format('H:i:s');

        $startdatetime = $request->dateof . ' ' . $request->start_time;
        $start_datetime = Carbon::parse($startdatetime)->format('Y-m-d H:i:s');
        $end_datetime = Carbon::parse($startdatetime)->addMinutes($requestAll['duration'])->format('Y-m-d H:i:s');

        // $requestAll['dateof'] = Carbon::parse($requestAll['dateof'])->format('Y-m-d');
        // $requestAll['start_time'] = $requestAll['start_time'];
        $requestAll['reschedule'] = '1';
        $requestAll['reschedule_at'] = currentDateTime();

        $requestAll['dateof'] = Carbon::parse($start_datetime, localtimezone())->setTimezone('UTC')->toDateString();
        $requestAll['start_time'] = Carbon::parse($start_datetime, localtimezone())->setTimezone('UTC')->toTimeString();
        $requestAll['end_time'] = Carbon::parse($end_datetime, localtimezone())->setTimezone('UTC')->toTimeString();
        $requestAll['start_datetime'] = Carbon::parse($start_datetime, localtimezone())->setTimezone('UTC')->toDateTimeString();
        $requestAll['end_datetime'] = Carbon::parse($end_datetime, localtimezone())->setTimezone('UTC')->toDateTimeString();

        $dateof = $requestAll['dateof'];
        $start_datetime = $requestAll['start_datetime'];
        // $end_time = $requestAll['end_time'];

        $model = $this->findModel($id);
        $Busytime = Busytime::select(["dateof", "start_time", "end_time", "start_datetime", "end_datetime"])->addSelect(DB::raw('"' . $dateof . '" as showdate'))->where(['is_active' => '1', 'salon_id' => $model->salon_id, 'staff_id' => $model->staff_id])->whereRaw("
        (start_datetime <= '" . $start_datetime . "' and end_datetime >='" . $start_datetime . "') and
        (
            CASE
            WHEN repeats='Yes' THEN
                dateof <= '" . $dateof . "' and (ending is null or ending >= '" . $dateof . "') and
                (CASE repeat_time_option
                    WHEN 'Weekly' THEN (DATEDIFF(dateof, '" . $dateof . "') % (repeat_time * 7) = 0)
                    WHEN 'Monthly' THEN (DATEDIFF(dateof, '" . $dateof . "') % (repeat_time * 31) = 0)
                    ELSE repeat_time_option is null
                END)
            ELSE repeats = 'No' and dateof = '" . $dateof . "'
            END
        )")->get();
        if ($Busytime->count() > 0) {
            $alreadyBooked = $Busytime->toArray();
            return response()->json(["booked" => $alreadyBooked, "message" => __('messages.busytime_check_appointment')], $this->warningStatus);
        }
        $model->end_time = Carbon::parse($requestAll['dateof'] . ' ' . $requestAll['start_time'])->addMinutes($model->duration)->format('H:i:s');
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
        return response()->json(['id' => $id, 'message' => __('messages.success')], $this->successStatus);
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
        $staff_id = ($request->staff_id) ? $request->staff_id : "";
        $start_date = ($request->start_date) ? $request->start_date : "";
        $end_date = ($request->end_date) ? $request->end_date : "";
        $timezone = ($request->timezone) ? $request->timezone : "";
        $type = ($request->type) ? $request->type : "";
        $showdate = ($request->showdate) ? $request->showdate : "";

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
        if ($staff_id) {
            $where['staff_id'] = $staff_id;
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
                $model = Appointment::with($withArray)->select($field)->addSelect(DB::raw('"' . $showdate . '" as showdate'))->where($where)->get();
            } else {
                $model = Appointment::with($withArray)->select($field)->addSelect(DB::raw('"' . $showdate . '" as showdate'))->where($where)->first();
            }
            $successData = $model->toArray();
            return response()->json($successData, $this->successStatus);
        } else {
            if ($pagination == true) {
                $model = Appointment::with($withArray)->select($field)->where($where)->orderByRaw($orderby)->paginate($limit);
            } else {
                if ($start_date && $end_date && $type === "week") {
                    $collection = new Collection();
                    $period = CarbonPeriod::create($start_date, $end_date);
                    foreach ($period as $date) {
                        $rangedate = $date->format('Y-m-d');
                        $modelrange = Appointment::with($withArray)->select($field)->addSelect(DB::raw('"' . $rangedate . '" as showdate'))->where($where)->whereRaw("
                        (
                            CASE repeats
                            WHEN 'Yes' THEN
                                dateof <= '" . $rangedate . "' and (ending is null or ending >= '" . $rangedate . "') and
                                (CASE repeat_time_option
                                    WHEN 'Weekly' THEN (DATEDIFF(dateof, '" . $rangedate . "') % (repeat_time * 7) = 0)
                                    WHEN 'Monthly' THEN (DATEDIFF(dateof, '" . $rangedate . "') % (repeat_time * 31) = 0)
                                    ELSE repeat_time_option is null
                                END)
                            ELSE repeats = 'No' and dateof = '" . $rangedate . "'
                            END
                        )")->orderByRaw($orderby)->get();
                        if ($modelrange->count() > 0) {
                            $collection = $collection->merge($modelrange);
                        }
                    }
                    $model = $collection;
                } else if ($start_date && $type == "day") {
                    // $model = Busytime::with($withArray)->select($field)->where("repeats='Yes' and DATE_FORMAT(date,'%w') = DATE_FORMAT('" . $start_date . "','%w') and (`start_time` BETWEEN '" . $start_time . "' AND '" . $end_time . "' || `end_time` BETWEEN '" . $start_time . "' AND '" . $end_time . "') and (ending >= '2022-04-05' || ending is null)")->orderByRaw($orderby)->get();
                    $model = Appointment::with($withArray)->select($field)->addSelect(DB::raw('"' . $start_date . '" as showdate'))->where($where)->whereRaw("
                    (
                        CASE repeats
                        WHEN 'Yes' THEN
                            dateof <= '" . $start_date . "' and (ending is null or ending >= '" . $start_date . "') and
                            (CASE repeat_time_option
                                WHEN 'Weekly' THEN (DATEDIFF(dateof, '" . $start_date . "') % (repeat_time * 7) = 0)
                                WHEN 'Monthly' THEN (DATEDIFF(dateof, '" . $start_date . "') % (repeat_time * 31) = 0)
                                ELSE repeat_time_option is null
                            END)
                        ELSE repeats = 'No' and dateof = '" . $start_date . "'
                        END
                    )")->orderByRaw($orderby)->get();
                } else {
                    $model = Appointment::with($withArray)->select($field)->where($where)->orderByRaw($orderby)->get();
                }

                // if ($start_date && $end_date && $type === "week") {
                //     $model = Appointment::with($withArray)->select($field)->where($where)->whereBetween('dateof', [$start_date, $end_date])->orderByRaw($orderby)->get();
                // } else {
                //     $model = Appointment::with($withArray)->select($field)->where($where)->orderByRaw($orderby)->get();
                // }
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
