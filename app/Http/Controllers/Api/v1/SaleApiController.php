<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\SaleRequest;
use App\Models\Api\Appointment;
use App\Models\Api\Cart;
use App\Models\Api\Categories;
use App\Models\Api\Membership;
use App\Models\Api\Products;
use App\Models\Api\Sale;
use App\Models\Api\Services;
use App\Models\Api\Voucher;
use App\Models\Api\VoucherTo;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Validator;

class SaleApiController extends Controller
{
    protected $successStatus = 200;
    protected $errorStatus = 422;
    protected $unauthorizedStatus = 401;

    protected $field = [
        'id',
        'salon_id',
        'client_id',
        'appointment_id',
        'voucher_id',
        'eventdate',
        'totalprice',
        'paidby',
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
        $gprice = $request->gprice;
        $staff = $request->staff;
        if ($salon_id) {
            if ($service_id) {
                $withArray = [
                    'staffservices:id,first_name,last_name,email',
                    // 'serviceprice:id,service_id,price_tier_id,price,add_on_price',
                    'tax:id,name,percentage',
                ];
                // if ($serviceprice) {
                //     $withArray = [
                //         'staffservices:id,first_name,last_name,email',
                //         'tax:id,name,percentage',
                //     ];
                // } else {
                //     $withArray = [
                //         'staffservices:id,first_name,last_name,email',
                //         // 'serviceprice:id,service_id,price_tier_id,price,add_on_price',
                //         'tax:id,name,percentage',
                //     ];
                // }
                $services = Services::with($withArray)->select(['id', 'tax_id', 'name'])->where('id', $service_id)->where('salon_id', $salon_id)->whereNotNull('category_id')->first()->makeHidden(['isServiceChecked', 'isNotId', 'tax_id']);
                if ($gprice) {
                    $services->gprice = $gprice;
                }
                if ($staff) {
                    $services->staff = $staff;
                }
            } else {
                $services = Categories::with(['services' => function ($query) use ($salon_id, $whereLike) {
                    $query->with(['serviceprice:id,service_id,price_tier_id,price,add_on_price'])->select('category_id', 'id', 'name', 'duration')->where('salon_id', $salon_id)->where('is_active', '1')->where(function ($squery) use ($whereLike) {
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

    public function products(Request $request)
    {
        $requestAll = $request->all();
        $pagination = $request->pagination ? $request->pagination : false;
        $limit = $request->limit ? $request->limit : config('params.apiPerPage');
        $whereLike = $request->q;

        $product_id = $request->product_id;
        $salon_id = $request->salon_id;
        $qty = $request->qty ? $request->qty : 1;
        if ($salon_id) {
            if ($product_id) {
                $withArray = [
                    'tax:id,name,percentage',
                ];
                $products = Products::with($withArray)->select(['id', 'tax_id', 'name', 'image', 'sku', 'cost_price', 'retail_price', 'manage_stock', 'stock_quantity', 'low_stock_threshold'])->where('id', $product_id)->where('salon_id', $salon_id)->first()->makeHidden(['tax_id']);
                $products->qty = $qty;
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
                })->where('is_active', '1')->where('salon_id', $salon_id)->paginate($limit);
            }

            if ($products) {
                $successData = $products->toArray();
                return response()->json($successData, $this->successStatus);
            }
        }
        return response()->json(['message' => __('messages.not_found')], $this->errorStatus);
    }

    public function vouchers(Request $request)
    {
        $requestAll = $request->all();
        $pagination = $request->pagination ? $request->pagination : false;
        $limit = $request->limit ? $request->limit : config('params.apiPerPage');
        $whereLike = $request->q;

        $voucher_id = $request->voucher_id;
        $salon_id = $request->salon_id;
        $voucher_to = $request->voucher_to;
        if ($salon_id) {
            if ($voucher_id) {
                $withArray = [];
                $vouchers = Voucher::select(['id', 'code', 'name', 'description', 'amount', 'used_online', 'terms_and_conditions'])->where('id', $voucher_id)->where('salon_id', $salon_id)->first();
                $vouchers->voucher_to = $voucher_to;
            } else {
                $vouchers = Voucher::select(['id',
                    'salon_id',
                    'code',
                    'name',
                    'description',
                    'amount',
                    'valid',
                    'used_online',
                    'terms_and_conditions'])->where('is_active', '1')->where('salon_id', $salon_id)->paginate($limit);
            }

            if ($vouchers) {
                $successData = $vouchers->toArray();
                return response()->json($successData, $this->successStatus);
            }
        }
        return response()->json(['message' => __('messages.not_found')], $this->errorStatus);
    }

    public function membership(Request $request)
    {
        $requestAll = $request->all();
        $pagination = $request->pagination ? $request->pagination : false;
        $limit = $request->limit ? $request->limit : config('params.apiPerPage');
        $whereLike = $request->q;

        $membership_id = $request->membership_id;
        $salon_id = $request->salon_id;
        if ($salon_id) {
            if ($membership_id) {
                $withArray = [];
                $vouchers = Membership::select(['id', 'name', 'credit', 'cost'])->where('id', $membership_id)->where('salon_id', $salon_id)->first();
            } else {
                $vouchers = Membership::select(['id', 'name', 'credit', 'cost'])->where('is_active', '1')->where('salon_id', $salon_id)->paginate($limit);
            }

            if ($vouchers) {
                $successData = $vouchers->toArray();
                return response()->json($successData, $this->successStatus);
            }
        }
        return response()->json(['message' => __('messages.not_found')], $this->errorStatus);
    }

    public function store(SaleRequest $request)
    {
        $requestAll = $request->all();
        echo '<pre>';
        print_r($requestAll);
        echo '<pre>';
        dd();
        $cart = $request->cart ? json_decode($request->cart, true) : [];
        $salon_id = $request->salon_id;
        $client_id = $request->client_id;
        $appointment_id = $request->appointment_id;
        $eventdate = $request->eventdate;
        $invoicedate = date('Y-m-d');
        if ($appointment_id) {
            $model = Sale::where(['salon_id' => $salon_id, 'client_id' => $client_id, 'appointment_id' => $appointment_id, 'eventdate' => $eventdate])->first();
        }
        $model = new Sale;
        $model->salon_id = $salon_id;
        $model->client_id = $client_id;
        $model->appointment_id = $appointment_id;
        $model->eventdate = $eventdate;
        $model->totalprice = null;
        $model->paidby = $request->paidby;
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
                        $modelCart = new Cart;
                        $modelCart->sale_id = $model->id;
                        $modelCart->product_id = $value['id'];
                        $modelCart->qty = $value['qty'];
                        $modelCart->cost = $value['price'];
                        $modelCart->type = "Product";
                        $modelCart->save();
                    }
                }
                if (isset($cart['vouchers']) && $cart['vouchers']) {
                    foreach ($cart['vouchers'] as $value) {
                        $voucher_to = (isset($value['voucher_to']) && $value['voucher_to']) ? $value['voucher_to'] : "";
                        $modelCart = new Cart;
                        $modelCart->sale_id = $model->id;
                        $modelCart->voucher_id = $value['id'];
                        $modelCart->cost = $value['amount'];
                        $modelCart->type = "Voucher";
                        $modelCart->save();
                        if ($voucher_to) {
                            foreach ($voucher_to as $vt) {
                                $modelCartVoucherTo = new VoucherTo;
                                $modelCartVoucherTo->cart_id = $modelCart->id;
                                $modelCartVoucherTo->first_name = $vt['first_name'];
                                $modelCartVoucherTo->last_name = $vt['last_name'];
                                $modelCartVoucherTo->is_send = $vt['is_send'];
                                $modelCartVoucherTo->email = $vt['email'];
                                $modelCartVoucherTo->amount = $vt['amount'];
                                $modelCartVoucherTo->message = $vt['message'];
                                $modelCartVoucherTo->code = (isset($value['code']) && $value['code']) ? $value['code'] : Str::random(6);
                                $modelCartVoucherTo->save();
                                if ($modelCartVoucherTo->is_send) {
                                    $field = array();
                                    $field['{{amount}}'] = $modelCartVoucherTo->amount;
                                    $field['{{code}}'] = $modelCartVoucherTo->code;
                                    $sendmail = sendMail($modelCartVoucherTo->email, ['subject' => 'Beauty- Gift Voucher'], $field);
                                    if (empty($sendmail)) {
                                        // return response()->json(['email' => $requestAll['email'], 'message' => __('messages.wrongmail')], $this->errorStatus);
                                    }
                                }
                            }
                        }
                    }
                }
                if (isset($cart['membership']) && $cart['membership']) {
                    foreach ($cart['membership'] as $value) {
                        $modelCartProduct = new Cart;
                        $modelCart->sale_id = $model->id;
                        $modelCart->membership_id = $value['id'];
                        $modelCart->cost = $value['amount'];
                        $modelCart->type = "Membership";
                        $modelCart->save();
                    }
                }
                if (isset($cart['onoffvouchers']) && $cart['onoffvouchers']) {
                    foreach ($cart['onoffvouchers'] as $value) {
                        $modelCartProduct = new Cart;
                        $modelCart->sale_id = $model->id;
                        $modelCart->cost = $value['amount'];
                        $modelCart->type = "OnOffVoucher";
                        $modelCart->save();
                    }
                }
            }
            $successData = $model->toArray();
            return response()->json($successData, $this->successStatus);
        }
        return response()->json(['message' => __('messages.not_found')], $this->errorStatus);
    }

    public function invoice(Request $request)
    {
        $requestAll = $request->all();
        $id = $request->id;
        return $this->returnResponse($request, $id);
    }

    public function returnResponse($request, $id, $data = [])
    {
        $requestAll = $request->all();
        $field = ($request->field) ? array_merge(['id'], explode(',', $request->field)) : $this->field;
        $client_id = $request->client_id;
        $daterange = $request->daterange ? explode(" - ", $request->daterange) : "";
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
        $withArray = [
            'salon:' . implode(',', $this->salon_field),
            'client:' . implode(',', $this->client_field),
            'cart',
            'appointment:id,dateof,start_time,end_time,duration,cost',
        ];
        $pagination = $request->pagination ? $request->pagination : false;
        $limit = $request->limit ? $request->limit : config('params.apiPerPage');

        $where = ['salon_id' => $request->salon_id];
        if ($client_id) {
            $where['client_id'] = $client_id;
        }

        $where = ($id) ? array_merge($where, ['id' => $id]) : $where;

        $orderby = 'id desc';
        $query = Sale::with($withArray)->select($field)->where($where);
        if ($daterange) {
            $startdate = $daterange[0] . ' 00:00:00';
            $enddate = $daterange[1] . ' 23:59:59';
            $query->whereBetween("invoicedate", [$startdate, $enddate]);
        }
        if ($id) {
            if ($request->result == 'result_array') {
                $model = $query->get();
            } else {
                $model = $query->first();
            }
            $successData = $model->toArray();
            return response()->json($successData, $this->successStatus);
        } else {
            if ($pagination == true) {
                $model = $query->orderByRaw($orderby)->paginate($limit);
                $model->data = $model;
            } else {
                $model = $query->orderByRaw($orderby)->get();
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

    public function createinvoice(Request $request)
    {
        $requestAll = $request->all();
        $client_id = $request->client_id;
        $id = $request->id;
        $daterange = $request->daterange ? explode(" - ", $request->daterange) : "";
        $validator = Validator::make($requestAll, [
            'salon_id' => 'required',
        ]);
        if ($validator->passes()) {
            $pagination = $request->pagination ? $request->pagination : false;
            $limit = $request->limit ? $request->limit : config('params.apiPerPage');
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
            ];
            $withArray = [
                'salon:id,business_name',
                'client:id,first_name,last_name',
                'service:id,name',
                'staff:id,first_name,last_name',
            ];
            $where = ['is_active' => 1, 'salon_id' => $request->salon_id];
            if ($client_id) {
                $where['client_id'] = $client_id;
            }
            $where = ($id) ? array_merge($where, ['id' => $id]) : $where;
            $query = Appointment::with($withArray)->select($field)->where($where);
            if ($daterange) {
                $startdate = $daterange[0] . ' 00:00:00';
                $enddate = $daterange[1] . ' 23:59:59';
                $query->whereBetween("dateof", [$startdate, $enddate]);
            }
            $model = $query->orderByRaw('id desc')->paginate($limit);
            $model->makeHidden(['salon_id', 'client_id', 'service_id', 'staff_id']);
            $successData = $model->toArray();
            return response()->json($successData, $this->successStatus);
        } else {
            // $errors = $validator->errors()->all();
            $messages = $validator->messages();
            return response()->json(['errors' => $messages, 'message' => __('messages.validation_error')], $this->errorStatus);
        }
    }

}