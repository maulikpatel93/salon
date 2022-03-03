<?php

namespace App\Http\Controllers\Api\v1;

use App\Exceptions\UnsecureException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ServiceRequest;
use App\Models\Api\AddOnServices;
use App\Models\Api\Appointment;
use App\Models\Api\Categories;
use App\Models\Api\PriceTier;
use App\Models\Api\Services;
use App\Models\Api\ServicesPrice;
use App\Models\Api\StaffServices;
use Illuminate\Http\Request;

class ServicesApiController extends Controller
{
    protected $successStatus = 200;
    protected $errorStatus = 422;
    protected $unauthorizedStatus = 401;
    protected $warningStatus = 410;

    //Services Column name
    protected $field = [
        'id',
        'salon_id',
        'category_id',
        'tax_id',
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

    protected $tax_field = [
        'id',
        'name',
        'percentage',
    ];

    //Services_Price Column name default ['*']
    protected $serviceprice_field = [
        'id',
        'service_id',
        'name',
        'price',
        'add_on_price',
    ];

    protected $addOnService_field = [
        'id',
        'service_id',
        'add_on_service_id',
    ];

    protected $addOnStaff_field = [
        'id',
        'service_id',
        'staff_id',
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
        $add_on_services = $add_on_services ? array_values(array_filter($add_on_services)) : [];
        $staff_services = ($request->add_on_staff) ? explode(",", $request->add_on_staff) : [];
        $staff_services = $staff_services ? array_values(array_filter($staff_services)) : [];

        $requestAll['is_active_at'] = currentDateTime();
        $requestAll['service_booked_online'] = (isset($requestAll['service_booked_online']) && $requestAll['service_booked_online']) ? '1' : '0';
        $requestAll['deposit_booked_online'] = (isset($requestAll['deposit_booked_online']) && $requestAll['deposit_booked_online']) ? '1' : '0';
        $requestAll['deposit_booked_price'] = (isset($requestAll['deposit_booked_price']) && $requestAll['deposit_booked_price']) ? $requestAll['deposit_booked_price'] : '0';
        $requestAll['color'] = (isset($requestAll['color']) && $requestAll['color']) ? $requestAll['color'] : '';
        $model = new Services;
        $model->fill($requestAll);
        $model->description = isset($requestAll['description']) ? $requestAll['description'] : '';
        $model->save();
        if ($service_price) {
            foreach ($service_price as $key => $value) {
                $servicesPriceModel = ServicesPrice::where(['service_id' => $model->id, 'name' => ucfirst($key)])->first();
                if (empty($servicesPriceModel)) {
                    $servicesPriceModel = new ServicesPrice();
                }
                $servicesPriceModel->service_id = $model->id;
                $servicesPriceModel->name = ucfirst($key);
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
        $pagetype = $request->pagetype;
        $requestAll['service_booked_online'] = (isset($requestAll['service_booked_online']) && $requestAll['service_booked_online']) ? '1' : '0';
        $requestAll['deposit_booked_online'] = (isset($requestAll['deposit_booked_online']) && $requestAll['deposit_booked_online']) ? '1' : '0';
        $requestAll['deposit_booked_price'] = (isset($requestAll['deposit_booked_price']) && $requestAll['deposit_booked_price']) ? $requestAll['deposit_booked_price'] : '0';
        $requestAll['color'] = (isset($requestAll['color']) && $requestAll['color']) ? $requestAll['color'] : '';

        $service_price = ($request->service_price) ? json_decode($request->service_price, true) : [];
        $add_on_services = ($request->add_on_services) ? explode(",", $request->add_on_services) : [];
        $add_on_services = $add_on_services ? array_values(array_filter($add_on_services)) : [];
        $staff_services = ($request->add_on_staff) ? explode(",", $request->add_on_staff) : [];
        $staff_services = $staff_services ? array_values(array_filter($staff_services)) : [];

        $appointmentMatch = collect([]);
        $model = $this->findModel($id);
        $model->addonservices->map(function ($value) use ($add_on_services, $id) {
            if ($add_on_services && !in_array($value->id, $add_on_services)) {
                AddOnServices::where(['service_id' => $id, 'add_on_service_id' => $value->id])->delete();
            }
            return;
        })->toArray();
        $model->staffservices->map(function ($value) use ($staff_services, $id, $appointmentMatch) {
            if (empty($staff_services)) {
                $appointment = Appointment::where(['service_id' => $id, 'staff_id' => $value->id])->count();
                if ($appointment > 0) {
                    $appointmentstaffdata = [
                        'staff' => ['id' => $value->id, 'first_name' => $value->first_name, 'last_name' => $value->last_name, 'email' => $value->email, 'phone_number' => $value->phone_number],
                        'appointmentcount' => $appointment,
                    ];
                    $appointmentMatch->push($appointmentstaffdata);
                } else {
                    StaffServices::where(['service_id' => $id, 'staff_id' => $value->id])->delete();
                }
            }
            if ($staff_services && !in_array($value->id, $staff_services)) {
                $appointment = Appointment::where(['service_id' => $id, 'staff_id' => $value->id])->count();
                if ($appointment > 0) {
                    $appointmentstaffdata = [
                        'staff' => ['id' => $value->id, 'first_name' => $value->first_name, 'last_name' => $value->last_name, 'email' => $value->email, 'phone_number' => $value->phone_number],
                        'appointmentcount' => $appointment,
                    ];
                    $appointmentMatch->push($appointmentstaffdata);
                } else {
                    StaffServices::where(['service_id' => $id, 'staff_id' => $value->id])->delete();
                }
            }
            return;
        })->toArray();
        $appointmentMatchAll = $appointmentMatch->all();
        if ($appointmentMatchAll && empty($pagetype)) {
            return response()->json(['appointmentMatchAll' => $appointmentMatchAll, 'message' => __('message.success')], $this->warningStatus);
        }
        $model->fill($requestAll);
        $model->description = isset($requestAll['description']) ? $requestAll['description'] : $model->description;
        $model->save();
        if ($service_price) {
            foreach ($service_price as $key => $value) {
                $servicesPriceModel = ServicesPrice::where(['service_id' => $model->id, 'name' => ucfirst($key)])->first();
                if (empty($servicesPriceModel)) {
                    $servicesPriceModel = new ServicesPrice();
                }
                $servicesPriceModel->service_id = $model->id;
                $servicesPriceModel->name = ucfirst($key);
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
        $appointment = Appointment::where(['service_id' => $id])->count();
        if ($appointment > 0) {
            return response()->json(['appointment' => $appointment, 'message' => __('message.success')], $this->warningStatus);
        }
        Services::where('id', $id)->delete();
        return response()->json(['id' => $id, 'message' => __('message.success')], $this->successStatus);
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
        $field = ($request->field) ? array_merge(['id', 'salon_id', 'category_id', 'tax_id'], explode(',', $request->field)) : $this->field;
        $sort = ($request->sort) ? $request->sort : "";
        $option = ($request->option) ? $request->option : "";

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

        $tax_field = $this->tax_field;
        if (isset($requestAll['tax_field']) && empty($requestAll['tax_field'])) {
            $tax_field = false;
        } else if ($request->tax_field == '*') {
            $tax_field = [$request->tax_field];
        } else if ($request->tax_field) {
            $tax_field = array_merge(['id'], explode(',', $request->tax_field));
        }

        $serviceprice_field = $this->serviceprice_field;
        if (isset($requestAll['serviceprice_field']) && empty($requestAll['serviceprice_field'])) {
            $serviceprice_field = false;
        } else if ($request->serviceprice_field == '*') {
            $serviceprice_field = [$request->serviceprice_field];
        } else if ($request->serviceprice_field) {
            $serviceprice_field = array_merge(['id', 'service_id'], explode(',', $request->serviceprice_field));
        }

        $addOnService_field = $this->addOnService_field;
        if (isset($requestAll['addOnService_field']) && empty($requestAll['addOnService_field'])) {
            $addOnService_field = false;
        } else if ($request->addOnService_field == '*') {
            $addOnService_field = [$request->addOnService_field];
        } else if ($request->addOnService_field) {
            $addOnService_field = array_merge(['id'], explode(',', $request->addOnService_field));
        }

        $addOnStaff_field = $this->addOnStaff_field;
        if (isset($requestAll['addOnStaff_field']) && empty($requestAll['addOnStaff_field'])) {
            $addOnStaff_field = false;
        } else if ($request->addOnStaff_field == '*') {
            $addOnStaff_field = [$request->addOnStaff_field];
        } else if ($request->addOnStaff_field) {
            $addOnStaff_field = array_merge(['id'], explode(',', $request->addOnStaff_field));
        }

        $withArray = [];
        if ($salon_field) {
            $withArray[] = 'salon:' . implode(',', $salon_field);
        }
        if ($category_field) {
            $withArray[] = 'category:' . implode(',', $category_field);
        }
        if ($tax_field) {
            $withArray[] = 'tax:' . implode(',', $tax_field);
        }
        if ($serviceprice_field) {
            $withArray[] = 'serviceprice:' . implode(',', $serviceprice_field);
        }
        if ($addOnService_field) {
            // $withArray[] = 'addonservices:' . implode(',', $addOnService_field);
            $withArray[] = 'addonservices:id,name';
        }

        if ($addOnStaff_field) {
            // $withArray[] = 'addonservices:' . implode(',', $addOnStaff_field);
            $withArray[] = 'staffservices:id,first_name,last_name';
        }

        $pagination = $request->pagination ? $request->pagination : false;
        $limit = $request->limit ? $request->limit : config('params.apiPerPage');

        $where = ['is_active' => '1', 'salon_id' => $request->salon_id];
        $where = ($id) ? array_merge($where, ['id' => $id]) : $where;
        $whereLike = $request->q ? explode(' ', $request->q) : '';

        $orderby = 'id desc';
        if ($sort) {
            $sd = [];
            foreach ($sort as $key => $value) {
                if (!in_array($key, ['category'])) {
                    $sd[] = $key . ' ' . $value;
                }
            }
            if ($sd) {
                $orderby = implode(", ", $sd);
            }
        }

        if ($option) {
            $successData = Services::with($withArray)->selectRaw($option['valueField'] . ' as value, ' . $option['labelField'] . ' as label')->where($where)->whereNotNull('category_id')->get()->makeHidden(['isServiceChecked', 'isNotId'])->toArray();
            return response()->json($successData, $this->successStatus);
        }
        if ($id) {
            if ($request->result == 'result_array') {
                $model = Services::with($withArray)->select($field)->where($where)->whereNotNull('category_id')->get()->makeHidden(['isServiceChecked', 'isNotId']);
            } else {
                $model = Services::with($withArray)->select($field)->where($where)->whereNotNull('category_id')->first()->makeHidden(['isServiceChecked', 'isNotId']);
            }
            $successData = $model->toArray();
            return response()->json($successData, $this->successStatus);
        } else {
            if ($pagination == true) {
                if ($whereLike) {
                    $model = Services::with($withArray)->select($field)->where(function ($query) use ($whereLike) {
                        if ($whereLike) {
                            $query->where('name', "like", "%" . $whereLike[0] . "%");
                            foreach ($whereLike as $row) {
                                $query->orWhere('name', "like", "%" . $row . "%");
                            }
                        }
                    })->where($where)->orderByRaw($orderby)->paginate($limit);
                } else {
                    $model = Services::with($withArray)->select($field)->where($where)->whereNotNull('category_id')->orderByRaw($orderby)->paginate($limit);
                }
                $model->data = $model->makeHidden(['isServiceChecked', 'isNotId']);
            } else {
                if ($whereLike) {
                    $model = Services::with($withArray)->select($field)->where(function ($query) use ($whereLike) {
                        if ($whereLike) {
                            $query->where('name', "like", "%" . $whereLike[0] . "%");
                            foreach ($whereLike as $row) {
                                $query->orWhere('name', "like", "%" . $row . "%");
                            }
                        }
                    })->where($where)->whereNotNull('category_id')->orderByRaw($orderby)->get()->makeHidden(['isServiceChecked', 'isNotId']);
                } else {
                    $model = Services::with($withArray)->select($field)->where($where)->whereNotNull('category_id')->orderByRaw($orderby)->get()->makeHidden(['isServiceChecked', 'isNotId']);
                }
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

    public function addonservices(Request $request)
    {
        $requestAll = $request->all();
        $id = $request->id;
        $isNotId = $request->isNotId;
        $salon_id = $request->salon_id;
        if ($salon_id) {
            $add_on_services = Categories::with(['services' => function ($query) use ($isNotId, $salon_id) {
                if ($isNotId) {
                    $query->whereNotIn('id', explode(',', $isNotId));
                }
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

    public function addonstaff(Request $request)
    {
        $requestAll = $request->all();
        $id = $request->id;
        $salon_id = $request->salon_id;
        if ($salon_id) {
            $add_on_staff = PriceTier::with(['staff' => function ($query) use ($salon_id) {
                $query->select('price_tier_id', 'id', 'first_name', 'last_name')->where('salon_id', $salon_id);
            }])->has('staff')->select('id', 'name')->get()->toArray();
            if ($add_on_staff) {
                $add_on_staff = array_values(array_filter($add_on_staff, function ($v) {return !empty($v['staff']);}));
                $successData = $add_on_staff;
                return response()->json($successData, $this->successStatus);
            }
        }
        return response()->json(['message' => __('messages.not_found')], $this->errorStatus);
    }

    public function serviceprice(Request $request)
    {
        $requestAll = $request->all();
        $salon_id = $request->salon_id;
        $service_id = $request->service_id;

        $withArray = [];
        $withArray[] = 'serviceprice:id,service_id,name,price,add_on_price';
        $withArray[] = 'staffservices:id,first_name,last_name';
        $service = Services::with($withArray)->where(['id' => $service_id, 'salon_id' => $salon_id])->first();
        if ($service) {
            $service = $service->makeHidden(['is_active', 'is_active_at', 'created_at', 'updated_at', 'isNotId', 'isServiceChecked']);
            $service->duration = $service->duration;
            $successData = $service->toArray();
            return response()->json($successData, $this->successStatus);
        }
        return response()->json(['message' => __('messages.not_found')], $this->errorStatus);
    }
}