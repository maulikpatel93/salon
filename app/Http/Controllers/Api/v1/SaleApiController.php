<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\SaleRequest;
use App\Models\Api\Appointment;
use App\Models\Api\Cart;
use App\Models\Api\Categories;
use App\Models\Api\Products;
use App\Models\Api\Sale;
use App\Models\Api\Services;
use Illuminate\Http\Request;

class SaleApiController extends Controller
{
    protected $successStatus = 200;
    protected $errorStatus = 422;
    protected $unauthorizedStatus = 401;

    protected $field = [
        'id',
        'salon_id',
        'client_id',
        'invoicedate',
        'totalprice',
        'paidtype',
        'status',
    ];

    protected $salon_field = [
        'id',
        'business_name',
    ];

    protected $client_field = [
        'id',
        'first_name',
        'last_name',
        'email',
        'phone_number',
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
        if ($salon_id) {
            if ($service_id) {
                $withArray = [
                    'staffservices:id,first_name,last_name,email',
                    'serviceprice:id,service_id,price_tier_id,price,add_on_price',
                    'tax:id,name,percentage',
                ];
                $services = Services::with($withArray)->select(['id', 'tax_id', 'name'])->where('id', $service_id)->whereNotNull('category_id')->first()->makeHidden(['isServiceChecked', 'isNotId', 'tax_id']);
            } else {
                $services = Categories::with(['services' => function ($query) use ($salon_id, $whereLike) {
                    $query->with(['serviceprice:id,service_id,price_tier_id,price,add_on_price'])->select('category_id', 'id', 'name', 'duration')->where('salon_id', $salon_id)->where('is_active', '1')->where(function ($squery) use ($whereLike) {
                        $squery->where('name', "like", "%" . $whereLike . "%");
                    });
                }])->has('services')->select('id', 'name')->where('is_active', '1')->paginate($limit);
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

    public function products(Request $request)
    {
        $requestAll = $request->all();
        $pagination = $request->pagination ? $request->pagination : false;
        $limit = $request->limit ? $request->limit : config('params.apiPerPage');
        $whereLike = $request->q;

        $product_id = $request->product_id;
        $salon_id = $request->salon_id;
        if ($salon_id) {
            if ($product_id) {
                $withArray = [
                    'tax:id,name,percentage',
                ];
                $products = Products::with($withArray)->select(['id', 'tax_id', 'name', 'image', 'sku', 'cost_price', 'retail_price'])->where('id', $product_id)->first()->makeHidden(['tax_id']);
            } else {
                $products = Products::select(['id',
                    'salon_id',
                    'supplier_id',
                    'tax_id',
                    'name',
                    'image',
                    'sku',
                    'description',
                    'cost_price',
                    'retail_price',
                    'manage_stock',
                    'stock_quantity',
                    'low_stock_threshold'])->where(function ($query) use ($whereLike) {
                    $query->where('name', "like", "%" . $whereLike . "%");
                })->where('is_active', '1')->paginate($limit);
            }

            if ($products) {
                $successData = $products->toArray();
                return response()->json($successData, $this->successStatus);
            }
        }
        return response()->json(['message' => __('messages.not_found')], $this->errorStatus);
    }

    public function store(SaleRequest $request)
    {
        $requestAll = $request->all();
        $cart = $request->cart ? json_decode($request->cart, true) : [];
        $salon_id = $request->salon_id;
        $client_id = $request->client_id;
        $appointment_id = $request->appointment_id;
        $invoicedate = $request->invoicedate;
        if ($appointment_id) {
            $model = Sale::where(['salon_id' => $salon_id, 'client_id' => $client_id, 'appointment_id' => $appointment_id, 'invoicedate' => $invoicedate])->first();
        }
        $model = new Sale;
        $model->salon_id = $salon_id;
        $model->client_id = $client_id;
        $model->appointment_id = $appointment_id;
        $model->invoicedate = $invoicedate;
        $model->totalprice = null;
        $model->paidtype = $request->paidtype;
        $model->status = 'Paid';
        $model->save();
        if ($model) {
            if ($model->appointment_id) {
                $appointment = Appointment::where('id', $model->appointment_id)->first();
                if ($appointment) {
                    $modelCart = new Cart;
                    $modelCart->sale_id = $model->id;
                    $modelCart->service_id = $appointment->service_id;
                    $modelCart->staff_id = $appointment->staff_id;
                    $modelCart->cost = $appointment->cost;
                    $modelCart->type = "Appointment";
                    $modelCart->save();
                    // Appointment::where(['id' => $appointment->id, 'repeats' => 'No'])->update(['status' => "Completed"]);
                }
            }
            if ($cart) {
                if (isset($cart['services']) && $cart['services']) {
                    foreach ($cart['services'] as $value) {
                        $modelCart = new Cart;
                        $modelCart->sale_id = $model->id;
                        $modelCart->service_id = $value['id'];
                        $modelCart->staff_id = $value['staff_id'];
                        $modelCart->cost = $value['gprice'];
                        $modelCart->type = "Service";
                        $modelCart->save();
                    }
                }
                if (isset($cart['products']) && $cart['products']) {
                    foreach ($cart['products'] as $value) {
                        $modelCartProduct = new Cart;
                        $modelCart->sale_id = $model->id;
                        $modelCart->product_id = $value['id'];
                        $modelCart->qty = $value['qty'];
                        $modelCart->cost = $value['price'];
                        $modelCart->type = "Product";
                        $modelCart->save();
                    }
                }
            }
            $successData = $model->toArray();
            return response()->json($successData, $this->successStatus);
        }
        return response()->json(['message' => __('messages.not_found')], $this->errorStatus);
    }

    public function view(Request $request)
    {
        $requestAll = $request->all();
        $id = $request->id;
        return $this->returnResponse($request, $id);
    }

    public function returnResponse($request, $id, $data = [])
    {
        $requestAll = $request->all();
        $field = ($request->field) ? array_merge(['id'], explode(',', $request->field)) : $this->field;

        $salon_field = $this->salon_field;
        if (isset($requestAll['salon_field']) && empty($requestAll['salon_field'])) {
            $salon_field = false;
        } else if ($request->salon_field == '*') {
            $salon_field = [$request->salon_field];
        } else if ($request->salon_field) {
            $salon_field = array_merge(['id'], explode(',', $request->salon_field));
        }

        $client_field = $this->client_field;
        if (isset($requestAll['salon_field']) && empty($requestAll['salon_field'])) {
            $client_field = false;
        } else if ($request->client_field == '*') {
            $client_field = [$request->client_field];
        } else if ($request->client_field) {
            $client_field = array_merge(['id'], explode(',', $request->client_field));
        }

        $withArray = [];
        if ($salon_field) {
            $withArray[] = 'salon:' . implode(',', $salon_field);
        }
        if ($client_field) {
            $withArray[] = 'client:' . implode(',', $client_field);
        }
        $withArray[] = 'cart';

        $pagination = $request->pagination ? $request->pagination : false;
        $limit = $request->limit ? $request->limit : config('params.apiPerPage');

        $where = ['salon_id' => $request->salon_id];
        $where = ($id) ? array_merge($where, ['id' => $id]) : $where;

        $orderby = 'id desc';
        if ($id) {
            if ($request->result == 'result_array') {
                $model = Sale::with($withArray)->select($field)->where($where)->get();
            } else {
                $model = Sale::with($withArray)->select($field)->where($where)->first();
            }
            $successData = $model->toArray();
            return response()->json($successData, $this->successStatus);
        } else {
            if ($pagination == true) {
                $model = Sale::with($withArray)->select($field)->where($where)->orderByRaw($orderby)->paginate($limit);
                $model->data = $model;
            } else {
                $model = Sale::with($withArray)->select($field)->where($where)->orderByRaw($orderby)->get();
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

}