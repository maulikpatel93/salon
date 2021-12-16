<?php

namespace App\Http\Controllers\Api\v1;

use App\Exceptions\UnsecureException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StaffRequest;
use App\Models\Api\Staff;
use App\Models\Api\StaffServices;
use App\Models\Api\StaffWorkingHours;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $requestAll['is_active_at'] = currentDateTime();
        $staff_services = ($request->staff_services) ? explode(",", $request->staff_services) : [];
        $staff_working_hours = ($request->staff_working_hours) ? json_decode($request->staff_working_hours, true) : [];

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

        $timestamp = strtotime('next Sunday');
        $days = array();
        for ($i = 0; $i < 7; $i++) {
            $days[] = strftime('%A', $timestamp);
            $timestamp = strtotime('+1 day', $timestamp);
        }
        if ($staff_working_hours) {
            foreach ($staff_working_hours as $key => $value) {
                if (isset($value['days']) && in_array($value['days'], $days)) {
                    $StaffWorkingHoursModel = StaffWorkingHours::where(['staff_id' => $model->id, 'days' => $value['days']])->first();
                    if (empty($StaffWorkingHoursModel)) {
                        $StaffWorkingHoursModel = new StaffWorkingHours;
                    }
                    $StaffWorkingHoursModel->salon_id = $model->salon_id;
                    $StaffWorkingHoursModel->staff_id = $model->id;
                    $StaffWorkingHoursModel->days = $value['days'];
                    $StaffWorkingHoursModel->start_time = isset($value['start_time']) ? $value['start_time'] : '';
                    $StaffWorkingHoursModel->end_time = isset($value['end_time']) ? $value['end_time'] : '';
                    $StaffWorkingHoursModel->break_time = (isset($value['break_time']) && $value['break_time']) ? $value['break_time'] : '';
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
        $staff_services = ($request->staff_services) ? explode(",", $request->staff_services) : [];
        $staff_working_hours = ($request->staff_working_hours) ? json_decode($request->staff_working_hours, true) : [];

        $model = $this->findModel($id);
        $model->staffservices->map(function ($value) use ($staff_services, $id) {
            if ($staff_services && !in_array($value->service_id, $staff_services)) {
                StaffServices::where(['staff_id' => $id, 'service_id' => $value->service_id])->delete();
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
        $timestamp = strtotime('next Sunday');
        $days = array();
        for ($i = 0; $i < 7; $i++) {
            $days[] = strftime('%A', $timestamp);
            $timestamp = strtotime('+1 day', $timestamp);
        }
        if ($staff_working_hours) {
            foreach ($staff_working_hours as $key => $value) {
                if (isset($value['days']) && in_array($value['days'], $days)) {
                    $StaffWorkingHoursModel = StaffWorkingHours::where(['staff_id' => $model->id, 'days' => $value['days']])->first();
                    if (empty($StaffWorkingHoursModel)) {
                        $StaffWorkingHoursModel = new StaffWorkingHours;
                    }
                    $StaffWorkingHoursModel->salon_id = $model->salon_id;
                    $StaffWorkingHoursModel->staff_id = $model->id;
                    $StaffWorkingHoursModel->days = $value['days'];
                    $StaffWorkingHoursModel->start_time = isset($value['start_time']) ? $value['start_time'] : '';
                    $StaffWorkingHoursModel->end_time = isset($value['end_time']) ? $value['end_time'] : '';
                    $StaffWorkingHoursModel->break_time = (isset($value['break_time']) && $value['break_time']) ? $value['break_time'] : '';
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
        return response()->json(['status' => $this->successStatus, 'message' => 'success']);
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

        $withArray = [];
        if ($salon_field) {
            $withArray[] = 'salon:' . implode(',', $salon_field);
        }
        if ($price_tier_field) {
            $withArray[] = 'pricetier:' . implode(',', $price_tier_field);
        }
        if ($staff_service_field) {
            $withArray[] = 'staffservices:' . implode(',', $staff_service_field);
        }
        if ($staff_working_hours_field) {
            $withArray[] = 'staffworkinghours:' . implode(',', $staff_working_hours_field);
        }

        $pagination = $request->pagination ? $request->pagination : false;
        $limit = $request->limit ? $request->limit : config('params.apiPerPage');

        $where = ['is_active' => '1'];
        $where = ($id) ? array_merge($where, ['id' => $id]) : $where;

        if ($pagination == true) {
            $model = Staff::with($withArray)->select($field)->where($where)->simplePaginate($limit);
        } else {
            $model = Staff::with($withArray)->select($field)->where($where)->get();
        }
        if ($model->count()) {
            $successData = $model->toArray();
            if ($successData) {
                if ($pagination == true) {
                    return response()->json(array_merge(['status' => $this->successStatus, 'message' => 'Success'], $successData));
                }
                return response()->json(['status' => $this->successStatus, 'message' => 'Success', 'data' => $successData]);
            }
        }
        return response()->json(['status' => $this->errorStatus, 'message' => 'Failed']);
    }
}