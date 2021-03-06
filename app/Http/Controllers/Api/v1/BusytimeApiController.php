<?php

namespace App\Http\Controllers\Api\v1;

use App\Exceptions\UnsecureException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\BusytimeRequest;
use App\Models\Api\Appointment;
use App\Models\Api\Busytime;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class BusytimeApiController extends Controller
{
    protected $successStatus = 200;
    protected $badrequestStatus = 400;
    protected $errorStatus = 422;
    protected $unauthorizedStatus = 401;
    protected $warningStatus = 410;

    protected $field = [
        'id',
        'salon_id',
        'staff_id',
        'dateof',
        'start_time',
        'end_time',
        'start_datetime',
        'end_datetime',
        'repeats',
        'repeat_time',
        'repeat_time_option',
        'ending',
        'reason',
    ];

    protected $salon_field = [
        'id',
        'business_name',
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

    public function store(BusytimeRequest $request)
    {
        $requestAll = $request->all();
        $requestAll['is_active_at'] = currentDateTime();

        $startdatetime = $request->dateof . ' ' . $request->start_time;
        $enddatetime = $request->dateof . ' ' . $request->end_time;
        $start_datetime = Carbon::parse($startdatetime)->format('Y-m-d H:i:s');
        $end_datetime = Carbon::parse($enddatetime)->format('Y-m-d H:i:s');

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
        $start_time = $requestAll['start_time'];
        $end_time = $requestAll['end_time'];
        $start_datetime = $requestAll['start_datetime'];
        $end_datetime = $requestAll['end_datetime'];

        $Appointment = Appointment::select(["dateof", "start_time", "end_time", "start_datetime", "end_datetime"])->addSelect(DB::raw('"' . $dateof . '" as showdate'))->where(['is_active' => '1', 'salon_id' => $request->salon_id, 'staff_id' => $request->staff_id])->whereRaw("
        ((start_datetime between '" . $start_datetime . "' and '" . $end_datetime . "') or (end_datetime between '" . $start_datetime . "' and '" . $end_datetime . "')) and
        (
            CASE repeats
            WHEN 'Yes' THEN
                dateof <= '" . $dateof . "' and (ending is null or ending >= '" . $dateof . "') and
                (CASE repeat_time_option
                    WHEN 'Weekly' THEN (DATEDIFF(dateof, '" . $dateof . "') % (repeat_time * 7) = 0)
                    WHEN 'Monthly' THEN (DATEDIFF(dateof, '" . $dateof . "') % (repeat_time * 31) = 0)
                    ELSE repeat_time_option is null
                END)
            ELSE repeats = 'No' and dateof = '" . $dateof . "'
            END
        )")->get();

        // $Appointment = Appointment::select(["dateof", "start_time", "end_time", "start_datetime", "end_datetime"])->addSelect(DB::raw('"' . $dateof . '" as showdate'))->where(['is_active' => '1', 'salon_id' => $request->salon_id, 'staff_id' => $request->staff_id])->whereRaw("
        // ((start_time between '" . $start_time . "' and '" . $end_time . "') or (end_time between '" . $start_time . "' and '" . $end_time . "')) and
        // (
        //     CASE repeats
        //     WHEN 'Yes' THEN
        //         dateof <= '" . $dateof . "' and (ending is null or ending >= '" . $dateof . "') and
        //         (CASE repeat_time_option
        //             WHEN 'Weekly' THEN (DATEDIFF(dateof, '" . $dateof . "') % (repeat_time * 7) = 0)
        //             WHEN 'Monthly' THEN (DATEDIFF(dateof, '" . $dateof . "') % (repeat_time * 31) = 0)
        //             ELSE repeat_time_option is null
        //         END)
        //     ELSE repeats = 'No' and dateof = '" . $dateof . "'
        //     END
        // )")->get();

        if ($Appointment->count() > 0) {
            $alreadyBooked = $Appointment->toArray();
            return response()->json(["booked" => $alreadyBooked, "message" => __('messages.busytime_check_appointment2')], $this->warningStatus);
        }
        $model = new Busytime;
        $model->fill($requestAll);
        $model->save();
        return $this->returnResponse($request, $model->id);
    }

    public function update(BusytimeRequest $request, $id)
    {
        $requestAll = $request->all();
        $startdatetime = Carbon::parse($request->dateof)->format('Y-m-d') . ' ' . $request->start_time;
        $enddatetime = Carbon::parse($request->dateof)->format('Y-m-d') . ' ' . $request->end_time;
        $start_datetime = Carbon::parse($startdatetime)->format('Y-m-d H:i:s');
        $end_datetime = Carbon::parse($enddatetime)->format('Y-m-d H:i:s');

        // $requestAll['dateof'] = Carbon::parse($requestAll['dateof'])->format('Y-m-d');
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
        $start_time = $requestAll['start_time'];
        $end_time = $requestAll['end_time'];
        $start_datetime = $requestAll['start_datetime'];
        $end_datetime = $requestAll['end_datetime'];

        $Appointment = Appointment::select(["dateof", "start_time", "end_time", "start_datetime", "end_datetime"])->addSelect(DB::raw('"' . $dateof . '" as showdate'))->where(['is_active' => '1', 'salon_id' => $request->salon_id, 'staff_id' => $request->staff_id])->whereRaw("
        ((start_datetime between '" . $start_datetime . "' and '" . $end_datetime . "') or (end_datetime between '" . $start_datetime . "' and '" . $end_datetime . "')) and
        (
            CASE repeats
            WHEN 'Yes' THEN
                dateof <= '" . $dateof . "' and (ending is null or ending >= '" . $dateof . "') and
                (CASE repeat_time_option
                    WHEN 'Weekly' THEN (DATEDIFF(dateof, '" . $dateof . "') % (repeat_time * 7) = 0)
                    WHEN 'Monthly' THEN (DATEDIFF(dateof, '" . $dateof . "') % (repeat_time * 31) = 0)
                    ELSE repeat_time_option is null
                END)
            ELSE repeats = 'No' and dateof = '" . $dateof . "'
            END
        )")->get();

        // $Appointment = Appointment::select(["dateof", "start_time", "end_time"])->addSelect(DB::raw('"' . $dateof . '" as showdate'))->where(['is_active' => '1', 'salon_id' => $request->salon_id, 'staff_id' => $request->staff_id])->whereRaw("
        // ((start_time between '" . $start_time . "' and '" . $end_time . "') or (end_time between '" . $start_time . "' and '" . $end_time . "')) and
        // (
        //     CASE repeats
        //     WHEN 'Yes' THEN
        //         dateof <= '" . $dateof . "' and (ending is null or ending >= '" . $dateof . "') and
        //         (CASE repeat_time_option
        //             WHEN 'Weekly' THEN (DATEDIFF(dateof, '" . $dateof . "') % (repeat_time * 7) = 0)
        //             WHEN 'Monthly' THEN (DATEDIFF(dateof, '" . $dateof . "') % (repeat_time * 31) = 0)
        //             ELSE repeat_time_option is null
        //         END)
        //     ELSE repeats = 'No' and dateof = '" . $dateof . "'
        //     END
        // )")->get();

        if ($Appointment->count() > 0) {
            $alreadyBooked = $Appointment->toArray();
            return response()->json(["booked" => $alreadyBooked, "message" => __('messages.busytime_check_appointment2')], $this->warningStatus);
        }
        $model = $this->findModel($id);
        $model->fill($requestAll);
        $model->save();
        return $this->returnResponse($request, $model->id);
    }

    public function delete(Request $request, $id)
    {
        $requestAll = $request->all();
        Busytime::where('id', $id)->delete();
        return response()->json(['id' => $id, 'message' => __('messages.success')], $this->successStatus);
    }

    protected function findModel($id)
    {
        if (($model = Busytime::find($id)) !== null) {
            return $model;
        }
        throw new UnsecureException('The requested page does not exist.');
    }

    public function returnResponse($request, $id, $data = [])
    {
        $requestAll = $request->all();
        $field = ($request->field) ? array_merge(['id', 'salon_id', 'staff_id'], explode(',', $request->field)) : $this->field;
        $sort = ($request->sort) ? $request->sort : "";
        $option = ($request->option) ? $request->option : "";
        //Start Calender View Client base
        $client_id = ($request->client_id) ? $request->client_id : "";
        $staff_id = ($request->staff_id) ? $request->staff_id : "";
        $start_date = ($request->start_date) ? $request->start_date : "";
        $end_date = ($request->end_date) ? $request->end_date : "";
        $start_time = ($request->start_time) ? Carbon::parse($request->start_time)->format('H:i') : "";
        $end_time = ($request->end_time) ? Carbon::parse($request->end_time)->format('H:i') : "";
        $timezone = ($request->timezone) ? $request->timezone : "";
        $type = ($request->type) ? $request->type : "";
        $showdate = ($request->showdate) ? $request->showdate : "";
        //End Calender View Client base
        $salon_field = $this->salon_field;
        if (isset($requestAll['salon_field']) && empty($requestAll['salon_field'])) {
            $salon_field = false;
        } else if ($request->salon_field == '*') {
            $salon_field = [$request->salon_field];
        } else if ($request->salon_field) {
            $salon_field = array_merge(['id'], explode(',', $request->salon_field));
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
        if ($staff_field) {
            $withArray[] = 'staff:' . implode(',', $staff_field);
        }

        $pagination = $request->pagination ? $request->pagination : false;
        $limit = $request->limit ? $request->limit : config('params.apiPerPage');

        $where = ['is_active' => '1', 'salon_id' => $request->salon_id];
        if ($start_date && $type == "day") {
            // $where['repeats'] = 'Yes';
            // $where["DATE_FORMAT(date,'%w')"] = "DATE_FORMAT('" . $start_date . "','%w')";
        }
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

        if ($option) {
            $successData = Busytime::with($withArray)->selectRaw($option['valueField'] . ' as value, ' . $option['labelField'] . ' as label')->where($where)->get()->toArray();
            return response()->json($successData, $this->successStatus);
        }
        if ($id) {
            if ($request->result == 'result_array') {
                $model = Busytime::with($withArray)->select($field)->addSelect(DB::raw('"' . $showdate . '" as showdate'))->where($where)->get();
            } else {
                $model = Busytime::with($withArray)->select($field)->addSelect(DB::raw('"' . $showdate . '" as showdate'))->where($where)->first();
            }
            $successData = $model->toArray();
            return response()->json($successData, $this->successStatus);
        } else {
            if ($pagination == true) {
                $model = Busytime::with($withArray)->select($field)->where($where)->orderByRaw($orderby)->paginate($limit);
            } else {
                $model = "";
                if ($start_date && $end_date && $type === "week") {
                    $collection = new Collection();
                    $period = CarbonPeriod::create($start_date, $end_date);
                    foreach ($period as $date) {
                        $rangedate = $date->format('Y-m-d');
                        // $rangedate = Carbon::parse($rangedate, localtimezone())->setTimezone('UTC')->format('Y-m-d');
                        // echo '<pre>';
                        // print_r($rangedate);
                        // echo '<pre>';
                        // dd();

                        $modelrange = Busytime::with($withArray)->select($field)->addSelect(DB::raw('"' . $rangedate . '" as showdate'))->where($where)->whereRaw("
                        (
                            CASE repeats
                            WHEN 'Yes' THEN
                                (dateof <= '" . $rangedate . "' and ending is null or ending >= '" . $rangedate . "') and
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
                    $model = Busytime::with($withArray)->select($field)->addSelect(DB::raw('"' . $start_date . '" as showdate'))->where($where)->whereRaw("
                    (
                        CASE
                        WHEN repeats='Yes' THEN
                            dateof <= '" . $start_date . "' and (ending is null or ending >= '" . $start_date . "') and
                            (CASE repeat_time_option
                                WHEN 'Weekly' THEN (DATEDIFF(dateof, '" . $start_date . "') % (repeat_time * 7) = 0)
                                WHEN 'Monthly' THEN (DATEDIFF(dateof, '" . $start_date . "') % (repeat_time * 31) = 0)
                                ELSE repeat_time_option is null
                            END)
                        ELSE repeats = 'No' and dateof = '" . $start_date . "'
                        END
                    )")->orderByRaw($orderby)->get();
                }
            }
            if ($model && $model->count()) {
                $successData = $model->toArray();
                if ($successData) {
                    return response()->json($successData, $this->successStatus);
                }
            }
        }
        return response()->json(['message' => __('messages.failed')], $this->errorStatus);
    }
}
