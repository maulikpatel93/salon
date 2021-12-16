<?php

namespace App\Http\Controllers\Api\v1;

use App\Exceptions\UnsecureException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ServiceRequest;
use App\Models\Api\AddOnServices;
use App\Models\Api\Services;
use App\Models\Api\ServicesPrice;
use App\Models\Api\StaffServices;
use Illuminate\Http\Request;

class ServicesApiController extends Controller
{
    protected $successStatus = 200;
    protected $errorStatus = 422;
    protected $unauthorizedStatus = 401;

    //Services Column name
    protected $field = [
        'id',
        'salon_id',
        'category_id',
        'name',
        'description',
        'duration',
        'padding_time',
        'color',
        'service_booked_online',
        'deposit_booked_online',
        'deposit_booked_price',
    ];

    //Salons Column name default ['*']
    protected $salon_field = [
        'id',
        'business_name',
        'owner_name',
    ];

    //Categories Column name default ['*']
    protected $category_field = ['id', 'name'];

    //Services_Price Column name default ['*']
    protected $service_field = [
        'id',
        'service_id',
        'name',
        'price',
        'add_on_price',
    ];

    protected $service_price = [
        [
            'name' => 'General',
            'price' => '00.00',
            'add_on_price' => '00.00',
        ],
        [
            'name' => 'Junior',
            'price' => '00.00',
            'add_on_price' => '00.00',
        ],
        [
            'name' => 'Senior',
            'price' => '00.00',
            'add_on_price' => '00.00',
        ],
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

    public function store(ServiceRequest $request)
    {
        $requestAll = $request->all();
        $service_price = ($request->service_price) ? json_decode($request->service_price, true) : [];
        $add_on_services = ($request->add_on_services) ? explode(",", $request->add_on_services) : [];
        $staff_services = ($request->staff_services) ? explode(",", $request->staff_services) : [];

        $requestAll['is_active_at'] = currentDateTime();
        $model = new Services;
        $model->fill($requestAll);
        $model->description = isset($requestAll['description']) ? $requestAll['description'] : '';
        $model->save();
        if ($service_price) {
            foreach ($service_price as $key => $value) {
                $servicesPriceModel = ServicesPrice::where(['service_id' => $model->id, 'name' => $value['name']])->first();
                if (empty($servicesPriceModel)) {
                    $servicesPriceModel = new ServicesPrice();
                }
                $servicesPriceModel->service_id = $model->id;
                $servicesPriceModel->name = $value['name'];
                $servicesPriceModel->price = ($value['price']) ? $value['price'] : '0';
                $servicesPriceModel->add_on_price = ($value['add_on_price']) ? $value['add_on_price'] : '0';
                $servicesPriceModel->is_active_at = currentDateTime();
                $servicesPriceModel->save();
            }
        }
        if ($add_on_services) {
            foreach ($add_on_services as $key => $value) {
                $AddOnServicesModel = AddOnServices::where(['service_id' => $model->id, 'add_on_service_id' => $value])->first();
                if (empty($AddOnServicesModel)) {
                    $AddOnServicesModel = new AddOnServices;
                }
                $AddOnServicesModel->service_id = $model->id;
                $AddOnServicesModel->add_on_service_id = $value;
                $AddOnServicesModel->save();
            }
        }
        if ($staff_services) {
            foreach ($staff_services as $key => $value) {
                $StaffServicesModel = StaffServices::where(['service_id' => $model->id, 'staff_id' => $value])->first();
                if (empty($StaffServicesModel)) {
                    $StaffServicesModel = new StaffServices;
                }
                $StaffServicesModel->service_id = $model->id;
                $StaffServicesModel->staff_id = $value;
                $StaffServicesModel->save();
            }
        }
        return $this->returnResponse($request, $model->id);
    }

    public function update(ServiceRequest $request, $id)
    {
        $requestAll = $request->all();
        $service_price = ($request->service_price) ? json_decode($request->service_price, true) : [];
        $add_on_services = ($request->add_on_services) ? explode(",", $request->add_on_services) : [];
        $staff_services = ($request->staff_services) ? explode(",", $request->staff_services) : [];

        $model = $this->findModel($id);
        $model->addonservices->map(function ($value) use ($add_on_services, $id) {
            if ($add_on_services && !in_array($value->add_on_service_id, $add_on_services)) {
                AddOnServices::where(['service_id' => $id, 'add_on_service_id' => $value->add_on_service_id])->delete();
            }
            return;
        })->toArray();
        $model->staffservices->map(function ($value) use ($staff_services, $id) {
            if ($staff_services && !in_array($value->staff_id, $staff_services)) {
                StaffServices::where(['service_id' => $id, 'staff_id' => $value->staff_id])->delete();
            }
            return;
        })->toArray();
        $model->fill($requestAll);
        $model->description = isset($requestAll['description']) ? $requestAll['description'] : $model->description;
        $model->save();
        if ($service_price) {
            foreach ($service_price as $key => $value) {
                $servicesPriceModel = ServicesPrice::where(['service_id' => $model->id, 'name' => $value['name']])->first();
                if (empty($servicesPriceModel)) {
                    $servicesPriceModel = new ServicesPrice();
                }
                $servicesPriceModel->service_id = $model->id;
                $servicesPriceModel->name = $value['name'];
                $servicesPriceModel->price = ($value['price']) ? $value['price'] : '0';
                $servicesPriceModel->add_on_price = ($value['add_on_price']) ? $value['add_on_price'] : '0';
                $servicesPriceModel->is_active_at = currentDateTime();
                $servicesPriceModel->save();
            }
        }
        if ($add_on_services) {
            foreach ($add_on_services as $key => $value) {
                $AddOnServicesModel = AddOnServices::where(['service_id' => $model->id, 'add_on_service_id' => $value])->first();
                if (empty($AddOnServicesModel)) {
                    $AddOnServicesModel = new AddOnServices;
                }
                $AddOnServicesModel->service_id = $model->id;
                $AddOnServicesModel->add_on_service_id = $value;
                $AddOnServicesModel->save();
            }
        }
        if ($staff_services) {
            foreach ($staff_services as $key => $value) {
                $StaffServicesModel = StaffServices::where(['service_id' => $model->id, 'staff_id' => $value])->first();
                if (empty($StaffServicesModel)) {
                    $StaffServicesModel = new StaffServices;
                }
                $StaffServicesModel->service_id = $model->id;
                $StaffServicesModel->staff_id = $value;
                $StaffServicesModel->save();
            }
        }
        return $this->returnResponse($request, $model->id);
    }

    public function delete(Request $request, $id)
    {
        $requestAll = $request->all();
        Services::where('id', $id)->delete();
        return response()->json(['status' => $this->successStatus, 'message' => 'success']);
    }

    protected function findModel($id)
    {
        if (($model = Services::find($id)) !== null) {
            return $model;
        }
        throw new UnsecureException('The requested page does not exist.');
    }

    public function returnResponse($request, $id, $data = [])
    {
        $requestAll = $request->all();
        $field = ($request->field) ? array_merge(['id', 'salon_id', 'category_id'], explode(',', $request->field)) : $this->field;

        $salon_field = $this->salon_field;
        if (isset($requestAll['salon_field']) && empty($requestAll['salon_field'])) {
            $salon_field = false;
        } else if ($request->salon_field == '*') {
            $salon_field = [$request->salon_field];
        } else if ($request->salon_field) {
            $salon_field = array_merge(['id'], explode(',', $request->salon_field));
        }

        $category_field = $this->category_field;
        if (isset($requestAll['category_field']) && empty($requestAll['category_field'])) {
            $category_field = false;
        } else if ($request->category_field == '*') {
            $category_field = [$request->category_field];
        } else if ($request->category_field) {
            $category_field = array_merge(['id'], explode(',', $request->category_field));
        }

        $service_field = $this->service_field;
        if (isset($requestAll['service_field']) && empty($requestAll['service_field'])) {
            $service_field = false;
        } else if ($request->service_field == '*') {
            $service_field = [$request->service_field];
        } else if ($request->service_field) {
            $service_field = array_merge(['id', 'service_id'], explode(',', $request->service_field));
        }
        $withArray = [];
        if ($salon_field) {
            $withArray[] = 'salon:' . implode(',', $salon_field);
        }
        if ($category_field) {
            $withArray[] = 'category:' . implode(',', $category_field);
        }
        if ($service_field) {
            $withArray[] = 'serviceprice:' . implode(',', $service_field);
        }

        $pagination = $request->pagination ? $request->pagination : false;
        $limit = $request->limit ? $request->limit : config('params.apiPerPage');

        $where = ['is_active' => '1'];
        $where = ($id) ? array_merge($where, ['id' => $id]) : $where;

        if ($pagination == true) {
            $model = Services::with($withArray)->select($field)->where($where)->simplePaginate($limit);
        } else {
            $model = Services::with($withArray)->select($field)->where($where)->get();
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