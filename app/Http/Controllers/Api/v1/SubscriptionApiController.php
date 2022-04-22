<?php

namespace App\Http\Controllers\Api\v1;

use App\Exceptions\UnsecureException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\SubscriptionRequest;
use App\Models\Api\Categories;
use App\Models\Api\Services;
use App\Models\Api\Subscription;
use App\Models\Api\SubscriptionServices;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class SubscriptionApiController extends Controller
{
    protected $successStatus = 200;
    protected $badrequestStatus = 400;
    protected $errorStatus = 422;
    protected $unauthorizedStatus = 401;
    protected $warningStatus = 410;

    protected $field = [
        'id',
        'name',
        'amount',
        'repeats',
        'repeat_time',
        'repeat_time_option',
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
    public function services(Request $request)
    {
        $requestAll = $request->all();
        $pagination = $request->pagination ? $request->pagination : false;
        $limit = $request->limit ? $request->limit : config('params.apiPerPage');
        $whereLike = $request->q;
        $service_id = $request->service_id;
        $salon_id = $request->salon_id;
        $gprice = $request->gprice;
        $staff = $request->staff;
        if ($salon_id) {
            if ($service_id) {
                $withArray = [
                    // 'staffservices:id,first_name,last_name,email',
                    'defaultserviceprice:id,service_id,price_tier_id,price,add_on_price',
                    // 'tax:id,name,percentage',
                ];
                $services = Services::with($withArray)->select(['id', 'tax_id', 'name'])->where('id', $service_id)->where('salon_id', $salon_id)->whereNotNull('category_id')->first()->makeHidden(['isServiceChecked', 'isNotId', 'tax_id']);
                if ($gprice) {
                    $services->gprice = $gprice;
                }
                if ($staff) {
                    $services->staff = $staff;
                }
            } else {
                $services = Categories::with(['services' => function ($query) use ($salon_id, $whereLike) {
                    $query->with(['defaultserviceprice:id,service_id,price_tier_id,price,add_on_price'])->select('category_id', 'id', 'name', 'duration')->where('salon_id', $salon_id)->where('is_active', '1')->where(function ($squery) use ($whereLike) {
                        $squery->where('name', "like", "%" . $whereLike . "%");
                    });
                }])->has('services')->select('id', 'name')->where('salon_id', $salon_id)->where('is_active', '1')->paginate($limit);
            }
            if ($services) {
                $services = $services->toArray();
                if (isset($services['data']) && $services['data']) {
                    $services = array_values(array_filter($services['data'], function ($v) {return !empty($v['services']);}));
                }
                $successData = $services;
                return response()->json($successData, $this->successStatus);
            }
        }
        return response()->json(['message' => __('messages.not_found')], $this->errorStatus);
    }
    public function view(Request $request)
    {
        $requestAll = $request->all();
        $id = $request->id;
        return $this->returnResponse($request, $id);
    }

    public function store(SubscriptionRequest $request)
    {
        $requestAll = $request->all();
        $requestAll['is_active_at'] = currentDateTime();
        $model = new Subscription;
        $model->fill($requestAll);
        $model->save();
        if ($model) {
            $subservice = $request->subservice ? \json_decode($request->subservice, true) : [];
            $totalPrice = 0;
            if ($subservice) {
                for ($i = 0; $i < count($subservice); $i++) {
                    $SubscriptionServicesModel = new SubscriptionServices;
                    $SubscriptionServicesModel->salon_id = $model->salon_id;
                    $SubscriptionServicesModel->subscription_id = $model->id;
                    $SubscriptionServicesModel->service_id = $subservice[$i]['id'];
                    $SubscriptionServicesModel->qty = $subservice[$i]['qty'];
                    $SubscriptionServicesModel->save();
                    $totalPrice += $subservice[$i]['service_price'] * $SubscriptionServicesModel->qty;
                }
            }
            // $model->save();
        }

        return $this->returnResponse($request, $model->id);
    }

    public function update(SubscriptionRequest $request, $id)
    {
        $requestAll = $request->all();
        $subservice = $request->subservice ? \json_decode($request->subservice, true) : [];

        $model = $this->findModel($id);
        $model->fill($requestAll);
        $model->save();
        if ($model) {
            $salon_id = $model->salon_id;
            $subserviceIdArray = Arr::pluck($subservice, 'id');
            $model->subservice->map(function ($value) use ($subserviceIdArray, $id, $salon_id) {
                if (empty($subserviceIdArray)) {
                    SubscriptionServices::where(['salon_id' => $salon_id, 'subscription_id' => $id])->delete();
                }
                if ($subserviceIdArray && !in_array($value->services->id, $subserviceIdArray)) {
                    SubscriptionServices::where(['id' => $value->id])->delete();
                }
                return;
            })->toArray();

            $totalPrice = 0;
            if ($subservice) {
                for ($i = 0; $i < count($subservice); $i++) {
                    $SubscriptionServicesModel = SubscriptionServices::where(['salon_id' => $model->salon_id, 'subscription_id' => $model->id, 'service_id' => $subservice[$i]['id']])->first();
                    if (empty($SubscriptionServicesModel)) {
                        $SubscriptionServicesModel = new SubscriptionServices;
                    }
                    $SubscriptionServicesModel->salon_id = $model->salon_id;
                    $SubscriptionServicesModel->subscription_id = $model->id;
                    $SubscriptionServicesModel->service_id = $subservice[$i]['id'];
                    $SubscriptionServicesModel->qty = $subservice[$i]['qty'];
                    $SubscriptionServicesModel->save();
                    $totalPrice += $subservice[$i]['service_price'] * $SubscriptionServicesModel->qty;
                }
            }
            // $model->save();
        }
        return $this->returnResponse($request, $model->id);
    }

    public function delete(Request $request, $id)
    {
        $requestAll = $request->all();
        $model = $this->findModel($id);
        Subscription::where('id', $id)->delete();
        return response()->json(['id' => $id, 'message' => __('messages.success')], $this->successStatus);
    }

    protected function findModel($id)
    {
        if (($model = Subscription::find($id)) !== null) {
            return $model;
        }
        throw new UnsecureException('The requested page does not exist.');
    }

    public function returnResponse($request, $id, $data = [])
    {
        $requestAll = $request->all();

        $field = ($request->field) ? array_merge(['id', 'salon_id'], explode(',', $request->field)) : $this->field;
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
        $withArray = [];
        if ($salon_field) {
            $withArray[] = 'salon:' . implode(',', $salon_field);
        }
        $withArray[] = 'subservice';
        $pagination = $request->pagination ? $request->pagination : false;
        $limit = $request->limit ? $request->limit : config('params.apiPerPage');

        $where = ['is_active' => '1', 'salon_id' => $request->salon_id];
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
            $successData = Subscription::with($withArray)->selectRaw($option['valueField'] . ' as value, ' . $option['labelField'] . ' as label')->where($where)->get()->toArray();
            return response()->json($successData, $this->successStatus);
        }
        if ($id) {
            if ($request->result == 'result_array') {
                $model = Subscription::with($withArray)->select($field)->where($where)->get();
            } else {
                $model = Subscription::with($withArray)->select($field)->where($where)->first();
            }
            $successData = $model->toArray();
            return response()->json($successData, $this->successStatus);
        } else {
            if ($pagination == true) {
                if ($whereLike) {
                    $model = Subscription::with($withArray)->select($field)->where(function ($query) use ($whereLike) {
                        if ($whereLike) {
                            $query->where('name', "like", "%" . $whereLike[0] . "%");
                            foreach ($whereLike as $row) {
                                $query->orWhere('name', "like", "%" . $row . "%");
                            }
                        }
                    })->where($where)->orderByRaw($orderby)->paginate($limit);
                } else {
                    $model = Subscription::with($withArray)->select($field)->where($where)->orderByRaw($orderby)->paginate($limit);
                }
            } else {
                if ($whereLike) {
                    $model = Subscription::with($withArray)->select($field)->where(function ($query) use ($whereLike) {
                        if ($whereLike) {
                            $query->where('name', "like", "%" . $whereLike[0] . "%");
                            foreach ($whereLike as $row) {
                                $query->orWhere('name', "like", "%" . $row . "%");
                            }
                        }
                    })->where($where)->orderByRaw($orderby)->get();
                } else {
                    $model = Subscription::with($withArray)->select($field)->where($where)->orderByRaw($orderby)->get();
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

}