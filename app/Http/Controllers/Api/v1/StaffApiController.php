<?php

namespace App\Http\Controllers\Api\v1;

use App\Exceptions\UnsecureException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StaffRequest;
use App\Models\Api\Categories;
use App\Models\Api\Staff;
use App\Models\Api\StaffServices;
use App\Models\Api\StaffWorkingHours;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class StaffApiController extends Controller
{
    protected $successStatus = 200;
    protected $errorStatus = 422;
    protected $unauthorizedStatus = 401;

    protected $field = [
        'id',
        'salon_id',
        'price_tier_id',
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'profile_photo',
        'address',
        'street',
        'suburb',
        'state',
        'postcode',
        'calendar_booking',
    ];

    protected $salon_field = [
        'id',
        'business_name',
        'owner_name',
    ];

    protected $price_tier_field = [
        'id',
        'name',
    ];

    protected $staff_service_field = [
        'id',
        'staff_id',
        'service_id',
    ];

    protected $staff_working_hours_field = [
        'id',
        'staff_id',
        'days',
        'start_time',
        'end_time',
        'break_time',
        'dayoff',
    ];

    protected $roster_field = [
        'id',
        'salon_id',
        'staff_id',
        'date',
        'start_time',
        'end_time',
        'away',
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

    public function store(StaffRequest $request)
    {
        $requestAll = $request->all();
        unset($requestAll['auth_key']);

        $timestamp = strtotime('next Sunday');
        $days = array();
        for ($i = 0; $i < 7; $i++) {
            $days[] = strftime('%A', $timestamp);
            $timestamp = strtotime('+1 day', $timestamp);
        }

        $requestAll['is_active_at'] = currentDateTime();
        $email_username = explode('@', $requestAll['email']);
        $requestAll['panel'] = 'Frontend';
        $requestAll['role_id'] = 5;
        $token = Str::random(config('params.auth_key_character'));
        $randompassword = Str::random(6);
        $requestAll['auth_key'] = hash('sha256', $token);
        $requestAll['username'] = $email_username ? $email_username[0] . random_int(101, 999) : $requestAll['first_name'] . '_' . $requestAll['last_name'] . '_' . random_int(101, 999);
        $requestAll['password'] = Hash::make($randompassword);
        $requestAll['calendar_booking'] = (isset($requestAll['calendar_booking']) && $requestAll['calendar_booking']) ? '1' : '0';

        if ($requestAll['email']) {
            $field = array();
            $field['{{password}}'] = $randompassword;
            $sendmail = sendMail($requestAll['email'], 'send_password', $field);
            if (empty($sendmail)) {
                return response()->json(['email' => $requestAll['email'], 'message' => __('message.wrongmail')], $this->errorStatus);
            }
        }
        $staff_working_hours = ($request->working_hours) ? json_decode($request->working_hours, true) : [];
        $staff_services = ($request->add_on_services) ? explode(",", $request->add_on_services) : [];
        $staff_services = $staff_services ? array_values(array_filter($staff_services)) : [];

        // $working_hour_error = [];
        // if ($staff_working_hours) {
        //     foreach ($staff_working_hours as $key => $value) {
        //         if (isset($value['days']) && in_array($value['days'], $days)) {
        //             $start_time = isset($value['start_time']) ? strtotime($value['start_time']) : '';
        //             $end_time = isset($value['end_time']) ? strtotime($value['end_time']) : '';
        //             $break_time = (isset($value['break_time']) && $value['break_time']) ? $value['break_time'] : [];
        //             $dayoff = (isset($value['dayoff']) && $value['dayoff']) ? '1' : '0';
        //             if ($start_time && $end_time && $start_time >= $end_time) {
        //                 // $working_hour_error[$value['days']]["errors"] = __('messages.failed');
        //                 $working_hour_error["working_hours"][$key] = ['start_time' => __('messages.endtime_greater_starttime')];
        //             }
        //             $break_time_error = [];
        //             if ($break_time) {
        //                 foreach ($break_time as $bkey => $bvalue) {
        //                     $break_title = isset($bvalue['break_title']) ? $bvalue['break_title'] : '';
        //                     $break_start_time = isset($bvalue['break_start_time']) ? $bvalue['break_start_time'] : '';
        //                     $break_end_time = isset($bvalue['break_end_time']) ? $bvalue['break_end_time'] : '';
        //                     if ($break_start_time && $break_end_time && $break_start_time >= $break_end_time) {
        //                         $break_time_error[$bkey] = ['break_start_time' => __('messages.endtime_greater_starttime'), 'break_end_time' => __('messages.endtime_greater_starttime')];
        //                     }
        //                 }
        //             }
        //             if ($break_time_error) {
        //                 $working_hour_error["working_hours"][$key] = ['break_time' => $break_time_error];
        //             }
        //         }
        //     }
        // }
        // if ($working_hour_error) {
        //     return response()->json(['errors' => $working_hour_error], $this->errorStatus);
        // }

        $model = new Staff;
        $model->fill($requestAll);
        $file = $request->file('profile_photo');
        if ($file) {
            $fileName = time() . '_' . str_replace(' ', '_', $file->getClientOriginalName());
            $filePath = $file->storeAs('staff', $fileName, 'public');
            $model->profile_photo = $fileName;
        }
        $model->save();
        if ($staff_services) {
            foreach ($staff_services as $key => $value) {
                $StaffServicesModel = StaffServices::where(['staff_id' => $model->id, 'service_id' => $value])->first();
                if (empty($StaffServicesModel)) {
                    $StaffServicesModel = new StaffServices;
                }
                $StaffServicesModel->staff_id = $model->id;
                $StaffServicesModel->service_id = $value;
                $StaffServicesModel->save();
            }
        }

        if ($staff_working_hours) {
            foreach ($staff_working_hours as $key => $value) {
                if (isset($value['days']) && in_array($value['days'], $days)) {
                    $StaffWorkingHoursModel = StaffWorkingHours::where(['staff_id' => $model->id, 'days' => $value['days']])->first();
                    if (empty($StaffWorkingHoursModel)) {
                        $StaffWorkingHoursModel = new StaffWorkingHours;
                    }
                    $dayoff = (isset($value['dayoff']) && $value['dayoff']) ? '1' : '0';
                    $start_time = isset($value['start_time']) ? $value['start_time'] : '';
                    $end_time = isset($value['end_time']) ? $value['end_time'] : '';
                    $break_time = isset($value['break_time']) ? $value['break_time'] : '';
                    $StaffWorkingHoursModel->salon_id = $model->salon_id;
                    $StaffWorkingHoursModel->staff_id = $model->id;
                    $StaffWorkingHoursModel->days = $value['days'];
                    $StaffWorkingHoursModel->start_time = $dayoff ? $start_time : null;
                    $StaffWorkingHoursModel->end_time = $dayoff ? $end_time : null;
                    $StaffWorkingHoursModel->break_time = $dayoff ? $break_time : [];
                    $StaffWorkingHoursModel->dayoff = $dayoff;
                    $StaffWorkingHoursModel->is_active_at = currentDateTime();
                    $StaffWorkingHoursModel->save();
                }
            }
        }
        return $this->returnResponse($request, $model->id);
    }

    public function update(StaffRequest $request, $id)
    {
        $requestAll = $request->all();
        unset($requestAll['auth_key']);

        $requestAll['calendar_booking'] = (isset($requestAll['calendar_booking']) && $requestAll['calendar_booking']) ? '1' : '0';
        $timestamp = strtotime('next Sunday');
        $days = array();
        for ($i = 0; $i < 7; $i++) {
            $days[] = strftime('%A', $timestamp);
            $timestamp = strtotime('+1 day', $timestamp);
        }

        $staff_working_hours = ($request->working_hours) ? json_decode($request->working_hours, true) : [];
        $staff_services = ($request->add_on_services) ? explode(",", $request->add_on_services) : [];
        $staff_services = $staff_services ? array_values(array_filter($staff_services)) : [];

        // $working_hour_error = [];
        // if ($staff_working_hours) {
        //     foreach ($staff_working_hours as $key => $value) {
        //         if (isset($value['days']) && in_array($value['days'], $days)) {
        //             $start_time = isset($value['start_time']) ? strtotime($value['start_time']) : '';
        //             $end_time = isset($value['end_time']) ? strtotime($value['end_time']) : '';
        //             $break_time = (isset($value['break_time']) && $value['break_time']) ? $value['break_time'] : [];
        //             $dayoff = (isset($value['dayoff']) && $value['dayoff']) ? '1' : '0';
        //             if ($start_time && $end_time && $start_time >= $end_time) {
        //                 // $working_hour_error[$value['days']]["errors"] = __('messages.failed');
        //                 $working_hour_error["working_hours"][$key] = ['start_time' => __('messages.endtime_greater_starttime')];
        //             }
        //             $break_time_error = [];
        //             if ($break_time) {
        //                 foreach ($break_time as $bkey => $bvalue) {
        //                     $break_title = isset($bvalue['break_title']) ? $bvalue['break_title'] : '';
        //                     $break_start_time = isset($bvalue['break_start_time']) ? $bvalue['break_start_time'] : '';
        //                     $break_end_time = isset($bvalue['break_end_time']) ? $bvalue['break_end_time'] : '';
        //                     // echo $break_start_time . ' ' . $start_time;
        //                     if ($break_start_time && $break_end_time && $break_start_time >= $break_end_time) {
        //                         // $working_hour_error[$value['days']]["errors"] = __('messages.failed');
        //                         $break_time_error[$bkey] = ['break_start_time' => __('messages.endtime_greater_starttime'), 'break_end_time' => __('messages.endtime_greater_starttime')];
        //                     }
        //                     //  else if ($break_start_time && $start_time && $end_time && $break_start_time <= $start_time && $end_time >= $break_end_time) {
        //                     //     $break_time_error[$bkey] = ['break_start_time' => __('messages.beetween_startendtime'), 'break_end_time' => __('messages.endtime_greater_starttime')];
        //                     // }
        //                     // echo $start_time . '<=' . $break_start_time . '<br>';
        //                     // echo $end_time . '>=' . $break_end_time;
        //                 }
        //             }
        //             if ($break_time_error) {
        //                 $working_hour_error["working_hours"][$key] = ['break_time' => $break_time_error];
        //             }
        //         }
        //     }
        // }
        // if ($working_hour_error) {
        //     return response()->json(['errors' => $working_hour_error], $this->errorStatus);
        // }

        $model = $this->findModel($id);
        if (empty($model->auth_key)) {
            $token = Str::random(config('params.auth_key_character'));
            $model->auth_key = hash('sha256', $token);
        }
        $model->staffservices->map(function ($value) use ($staff_services, $id) {
            if ($staff_services && !in_array($value->service_id, $staff_services)) {
                StaffServices::where(['staff_id' => $id, 'service_id' => $value->id])->delete();
            }
            return;
        })->toArray();
        $model->fill($requestAll);
        $file = $request->file('profile_photo');

        if ($file) {
            Storage::delete('/public/staff/' . $model->profile_photo);
            $fileName = time() . '_' . str_replace(' ', '_', $file->getClientOriginalName());
            $filePath = $file->storeAs('staff', $fileName, 'public');
            $model->profile_photo = $fileName;
        }
        $model->save();
        if ($staff_services) {
            foreach ($staff_services as $key => $value) {
                $StaffServicesModel = StaffServices::where(['staff_id' => $model->id, 'service_id' => $value])->first();
                if (empty($StaffServicesModel)) {
                    $StaffServicesModel = new StaffServices;
                }
                $StaffServicesModel->staff_id = $model->id;
                $StaffServicesModel->service_id = $value;
                $StaffServicesModel->save();
            }
        }

        if ($staff_working_hours) {
            foreach ($staff_working_hours as $key => $value) {
                if (isset($value['days']) && in_array($value['days'], $days)) {
                    $StaffWorkingHoursModel = StaffWorkingHours::where(['staff_id' => $model->id, 'days' => $value['days']])->first();
                    if (empty($StaffWorkingHoursModel)) {
                        $StaffWorkingHoursModel = new StaffWorkingHours;
                    }
                    $dayoff = (isset($value['dayoff']) && $value['dayoff']) ? '1' : '0';
                    $start_time = isset($value['start_time']) ? $value['start_time'] : '';
                    $end_time = isset($value['end_time']) ? $value['end_time'] : '';
                    $break_time = isset($value['break_time']) ? $value['break_time'] : '';
                    $StaffWorkingHoursModel->salon_id = $model->salon_id;
                    $StaffWorkingHoursModel->staff_id = $model->id;
                    $StaffWorkingHoursModel->days = $value['days'];
                    $StaffWorkingHoursModel->start_time = $dayoff ? $start_time : null;
                    $StaffWorkingHoursModel->end_time = $dayoff ? $end_time : null;
                    $StaffWorkingHoursModel->break_time = $dayoff ? $break_time : [];
                    $StaffWorkingHoursModel->dayoff = $dayoff;
                    $StaffWorkingHoursModel->save();
                }
            }
        }
        return $this->returnResponse($request, $model->id);
    }

    public function delete(Request $request, $id)
    {
        $requestAll = $request->all();
        Staff::where('id', $id)->delete();
        return response()->json(['id' => $id, 'message' => __('message.success')], $this->successStatus);
    }

    protected function findModel($id)
    {
        if (($model = Staff::find($id)) !== null) {
            return $model;
        }
        throw new UnsecureException('The requested page does not exist.');
    }

    public function returnResponse($request, $id, $data = [])
    {
        $requestAll = $request->all();
        $field = ($request->field) ? array_merge(['id', 'salon_id', 'price_tier_id'], explode(',', $request->field)) : $this->field;
        $sort = ($request->sort) ? $request->sort : "";
        $option = ($request->option) ? $request->option : "";
        $service_id = ($request->service_id) ? $request->service_id : "";

        $salon_field = $this->salon_field;
        if (isset($requestAll['salon_field']) && empty($requestAll['salon_field'])) {
            $salon_field = false;
        } else if ($request->salon_field == '*') {
            $salon_field = [$request->salon_field];
        } else if ($request->salon_field) {
            $salon_field = array_merge(['id'], explode(',', $request->salon_field));
        }

        $price_tier_field = $this->price_tier_field;
        if (isset($requestAll['price_tier_field']) && empty($requestAll['price_tier_field'])) {
            $price_tier_field = false;
        } else if ($request->price_tier_field == '*') {
            $price_tier_field = [$request->price_tier_field];
        } else if ($request->price_tier_field) {
            $price_tier_field = array_merge(['id'], explode(',', $request->price_tier_field));
        }

        $staff_service_field = $this->staff_service_field;
        if (isset($requestAll['staff_service_field']) && empty($requestAll['staff_service_field'])) {
            $staff_service_field = false;
        } else if ($request->staff_service_field == '*') {
            $staff_service_field = [$request->staff_service_field];
        } else if ($request->staff_service_field) {
            $staff_service_field = array_merge(['id'], explode(',', $request->staff_service_field));
        }

        $staff_working_hours_field = $this->staff_working_hours_field;
        if (isset($requestAll['staff_working_hours_field']) && empty($requestAll['staff_working_hours_field'])) {
            $staff_working_hours_field = false;
        } else if ($request->staff_working_hours_field == '*') {
            $staff_working_hours_field = [$request->staff_working_hours_field];
        } else if ($request->staff_working_hours_field) {
            $staff_working_hours_field = array_merge(['id'], explode(',', $request->staff_working_hours_field));
        }

        $roster_field = $this->roster_field;
        if (isset($requestAll['roster_field']) && empty($requestAll['roster_field'])) {
            $roster_field = false;
        } else if ($request->roster_field == '*') {
            $roster_field = [$request->roster_field];
        } else if ($request->roster_field) {
            $roster_field = array_merge(['id'], explode(',', $request->roster_field));
        }

        $withArray = [];
        if ($salon_field) {
            $withArray[] = 'salon:' . implode(',', $salon_field);
        }
        if ($price_tier_field) {
            $withArray[] = 'pricetier:' . implode(',', $price_tier_field);
        }
        if ($staff_service_field) {
            // $withArray[] = 'staffservices:' . implode(',', $staff_service_field);
            $withArray[] = 'staffservices:id,name';
        }
        if ($staff_working_hours_field) {
            $withArray[] = 'staffworkinghours:' . implode(',', $staff_working_hours_field);
        }
        if ($roster_field) {
            $withArray[] = 'rosterfield:' . implode(',', $roster_field);
        }

        $pagination = $request->pagination ? $request->pagination : false;
        $limit = $request->limit ? $request->limit : config('params.apiPerPage');

        $where = ['is_active' => '1', 'role_id' => 5, 'salon_id' => $request->salon_id];
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
            if ($service_id) {
                $successData = Staff::with($withArray)->join('staff_services', 'staff_services.staff_id', '=', 'users.id')->selectRaw($option['valueField'] . ' as value, ' . $option['labelField'] . ' as label')->where(['users.is_active' => '1', 'users.role_id' => 5, 'users.salon_id' => $request->salon_id])->where(['staff_services.service_id' => $service_id])->get()->makeHidden(['isNewRecord'])->toArray();
            } else {
                $successData = Staff::with($withArray)->selectRaw($option['valueField'] . ' as value, ' . $option['labelField'] . ' as label')->get()->makeHidden(['isNewRecord'])->toArray();
            }
            return response()->json($successData, $this->successStatus);
        }
        if ($id) {
            if ($request->result == 'result_array') {
                $model = Staff::with($withArray)->select($field)->where($where)->whereNotNull('price_tier_id')->get()->makeHidden(['isStaffChecked', 'calendar_booking']);
            } else {
                $model = Staff::with($withArray)->select($field)->where($where)->whereNotNull('price_tier_id')->first();
            }
            $successData = $model->toArray();
            return response()->json($successData, $this->successStatus);
        } else {
            if ($pagination == true) {
                if ($whereLike) {
                    $model = Staff::with($withArray)->select($field)->where(function ($query) use ($whereLike) {
                        if ($whereLike) {
                            $query->where('first_name', "like", "%" . $whereLike[0] . "%");
                            foreach ($whereLike as $row) {
                                $query->orWhere('first_name', "like", "%" . $row . "%");
                                $query->orWhere('last_name', "like", "%" . $row . "%");
                            }
                        }
                    })->where($where)->whereNotNull('price_tier_id')->orderByRaw($orderby)->paginate($limit);
                } else {
                    $model = Staff::with($withArray)->select($field)->where($where)->whereNotNull('price_tier_id')->orderByRaw($orderby)->paginate($limit);
                }
                $model->data = $model->makeHidden(['isStaffChecked', 'calendar_booking']);
            } else {
                if ($whereLike) {
                    $model = Staff::with($withArray)->select($field)->where(function ($query) use ($whereLike) {
                        if ($whereLike) {
                            $query->where('first_name', "like", "%" . $whereLike[0] . "%");
                            foreach ($whereLike as $row) {
                                $query->orWhere('first_name', "like", "%" . $row . "%");
                                $query->orWhere('last_name', "like", "%" . $row . "%");
                            }
                        }
                    })->where($where)->whereNotNull('price_tier_id')->orderByRaw($orderby)->get()->makeHidden(['isStaffChecked', 'calendar_booking']);
                } else {
                    $model = Staff::with($withArray)->select($field)->where($where)->whereNotNull('price_tier_id')->orderByRaw($orderby)->get()->makeHidden(['isStaffChecked', 'calendar_booking']);
                }
            }
            if ($model->count()) {
                $successData = $model->toArray();
                if ($successData) {
                    if ($pagination == true) {
                        // return response()->json(array_merge(['status' => $this->successStatus, 'message' => 'Success'], $successData));
                    }
                    return response()->json($successData, $this->successStatus);
                }
            }
        }

        return response()->json(['message' => __('messages.failed')], $this->errorStatus);
    }

    public function addonservices(Request $request)
    {
        $requestAll = $request->all();
        $id = $request->id;
        $salon_id = $request->salon_id;
        if ($salon_id) {
            $add_on_services = Categories::with(['services' => function ($query) use ($salon_id) {
                $query->select('category_id', 'id', 'name')->where('salon_id', $salon_id);
            }])->has('services')->select('id', 'name')->get()->toArray();
            if ($add_on_services) {
                $add_on_services = array_values(array_filter($add_on_services, function ($v) {return !empty($v['services']);}));
                $successData = $add_on_services;
                return response()->json($successData, $this->successStatus);
            }
        }
        return response()->json(['message' => __('messages.not_found')], $this->errorStatus);
    }

}