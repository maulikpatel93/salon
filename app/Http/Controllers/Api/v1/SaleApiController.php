<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\SaleRequest;
use App\Models\Api\Appointment;
use App\Models\Api\Cart;
use App\Models\Api\Categories;
use App\Models\Api\Client;
use App\Models\Api\Membership;
use App\Models\Api\Payment;
use App\Models\Api\Products;
use App\Models\Api\Sale;
use App\Models\Api\Services;
use App\Models\Api\Subscription;
use App\Models\Api\Users;
use App\Models\Api\Voucher;
use App\Models\Api\VoucherTo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use MailchimpTransactional\ApiClient;
use Validator;

class SaleApiController extends Controller
{
    protected $successStatus = 200;
    protected $badrequestStatus = 400;
    protected $errorStatus = 422;
    protected $unauthorizedStatus = 401;
    protected $warningStatus = 410;
    protected $serverErrorStatus = 500;

    protected $field = [
        'id',
        'salon_id',
        'client_id',
        'appointment_id',
        'eventdate',
        'invoicedate',
        'totalprice',
        'status',
        'applied_voucher_to_id',
        'voucher_discount',
        'total_pay',
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
                $vouchers = Voucher::select(['id', 'name', 'description', 'amount', 'used_online', 'terms_and_conditions'])->where('id', $voucher_id)->where('salon_id', $salon_id)->first();
                $vouchers->voucher_to = $voucher_to;
            } else {
                $vouchers = Voucher::select(['id',
                    'salon_id',
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

    public function subscription(Request $request)
    {
        $requestAll = $request->all();
        $pagination = $request->pagination ? $request->pagination : false;
        $limit = $request->limit ? $request->limit : config('params.apiPerPage');
        $whereLike = $request->q;

        $subscription_id = $request->subscription_id;
        $salon_id = $request->salon_id;
        if ($salon_id) {
            if ($subscription_id) {
                $withArray = ['subservice'];
                $vouchers = Subscription::select(['id', 'name', 'amount', 'repeats', 'repeat_time', 'repeat_time_option'])->with($withArray)->where('id', $subscription_id)->where('salon_id', $salon_id)->first();
            } else {
                $withArray = ['subservice'];
                $vouchers = Subscription::select(['id', 'name', 'amount', 'repeats', 'repeat_time', 'repeat_time_option'])->with($withArray)->where('is_active', '1')->where('salon_id', $salon_id)->paginate($limit);
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
        $stripe_account_id = auth()->user()->stripe_account_id;
        $cart = $request->cart ? json_decode($request->cart, true) : [];
        $voucher_to_id = $request->voucher_to_id;
        $is_stripe = $request->is_stripe;
        $salon_id = $request->salon_id;
        $client_id = $request->client_id;
        $appointment_id = $request->appointment_id;
        $eventdate = $request->eventdate;
        $totalprice = $request->totalprice;
        $paidby = $request->paidby;
        $invoicedate = Carbon::parse(currentDateTime(), localtimezone())->setTimezone('UTC')->format('Y-m-d H:i:s');

        if ($is_stripe === 1 || $is_stripe === '1') {
            $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
            \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        }
        $model = new Sale;
        $model->salon_id = $salon_id;
        $model->client_id = $client_id;
        $model->appointment_id = $appointment_id;
        $model->eventdate = $eventdate;
        $model->invoicedate = $invoicedate;
        $model->totalprice = $totalprice;
        $model->is_stripe = $is_stripe;
        $model->status = 'Pending';
        $remaining_balance = "0.00";
        $voucher_discount = "0.00";
        $total_pay = $totalprice;
        if ($voucher_to_id) {
            $appliedvoucherto = VoucherTo::where('id', $voucher_to_id)->first();
            if ($appliedvoucherto) {
                if ($totalprice >= $appliedvoucherto->remaining_balance) {
                    $voucher_discount = $appliedvoucherto->remaining_balance;
                    $total_pay = ($totalprice - $appliedvoucherto->remaining_balance);
                    $appliedvoucherto->remaining_balance = $remaining_balance;
                    $appliedvoucherto->save();
                }
                if ($totalprice < $appliedvoucherto->remaining_balance) {
                    $voucher_discount = ($appliedvoucherto->remaining_balance - ($appliedvoucherto->remaining_balance - $totalprice));
                    $total_pay = $totalprice - ($appliedvoucherto->remaining_balance - ($appliedvoucherto->remaining_balance - $totalprice));
                    $remaining_balance = ($appliedvoucherto->remaining_balance - $totalprice);
                    $appliedvoucherto->remaining_balance = $remaining_balance;
                    $appliedvoucherto->save();
                }
            }
        }
        $model->applied_voucher_to_id = $voucher_to_id;
        $model->voucher_discount = $voucher_discount;
        $model->total_pay = $total_pay;
        $model->save();
        if ($model) {
            $client = Users::find($client_id);
            if ($client && $client->id && empty($client->stripe_customer_account_id) && ($is_stripe === 1 || $is_stripe === '1')) {
                $StripeModel = new StripeApiController;
                $CustomerCreateRequestData = [
                    'client_id' => $client->id,
                    'name' => \ucfirst($client->first_name) . ' ' . \ucfirst($client->last_name),
                    'email' => $client->email,
                    'phone' => $client->phone_number,
                    'address' => [
                        'line1' => $client->address,
                        'line2' => $client->street . ' ' . $client->suburb,
                        'postal_code' => $client->postcode,
                        'city' => $client->suburb,
                        'state' => $client->state,
                        'country' => 'AU',
                    ],
                    'description' => $client->description,
                ];
                $stripeCustomerCreateRequest = new Request($CustomerCreateRequestData);
                $stripeCustomerCreate = $StripeModel->customerCreate($stripeCustomerCreateRequest);
                $stripe_customer_account_id = $stripeCustomerCreate->id;
            } else {
                $stripe_customer_account_id = $client->stripe_customer_account_id;
            }
            if ($cart && isset($cart['subscription']) && $cart['subscription']) {
                $subscriptionCheckout = $cart['subscription'][0];
                $modelCart = new Cart;
                $modelCart->salon_id = $salon_id;
                $modelCart->sale_id = $model->id;
                $modelCart->subscription_id = $subscriptionCheckout['id'];
                $modelCart->cost = $subscriptionCheckout['amount'];
                $modelCart->type = "Subscription";
                $modelCart->save();
                try {
                    if ($modelCart->subscription->repeats === "Yes") {
                        $subrepeat = "";
                        if ($modelCart->subscription->repeat_time_option === "Daily") {
                            $subrepeat = 'day';
                        }
                        if ($modelCart->subscription->repeat_time_option === "Weekly") {
                            $subrepeat = 'week';
                        }
                        if ($modelCart->subscription->repeat_time_option === "Monthly") {
                            $subrepeat = 'month';
                        }
                        if ($modelCart->subscription->repeat_time_option === "Yearly") {
                            $subrepeat = 'year';
                        }
                        $product = $stripe->products->create(['name' => $modelCart->subscription->name], ['stripe_account' => $stripe_account_id]);

                        $price = $stripe->prices->create(
                            [
                                'product' => $product->id,
                                'unit_amount' => (int) $modelCart->subscription->amount,
                                'currency' => 'inr',
                                'recurring' => ['interval' => $subrepeat, 'interval_count' => $modelCart->subscription->repeat_time],
                            ], ['stripe_account' => $stripe_account_id]
                        );
                    }
                } catch (Exception $e) {
                    $api_error = $e->getMessage();
                }
                if (empty($api_error) && $price) {
                    // Creates a new subscription
                    try {
                        $subscription = \Stripe\Subscription::create(array(
                            "customer" => $stripe_customer_account_id,
                            "items" => [
                                ["price" => $price->id],
                            ],
                            "payment_behavior" => "default_incomplete",
                        ), ['stripe_account' => $stripe_account_id]);
                    } catch (Exception $e) {
                        $api_error = $e->getMessage();
                    }

                    $invoices = $stripe->invoices->retrieve(
                        $subscription->latest_invoice,
                        [],
                        ['stripe_account' => $stripe_account_id]
                    );

                    $paymentModal = new Payment;
                    $paymentModal->salon_id = $salon_id;
                    $paymentModal->sale_id = $model->id;
                    $paymentModal->client_id = $client->id;
                    $paymentModal->subscription_id = $modelCart->subscription_id;
                    $paymentModal->type = 'Subscription';
                    $paymentModal->paidby = 'StripeCreditCard';
                    $paymentModal->status = 'Pending';
                    $paymentModal->payment_date = Carbon::parse(currentDateTime(), localtimezone())->setTimezone('UTC')->format('Y-m-d H:i:s');
                    $paymentModal->transaction_id = null;
                    $paymentModal->amount = $price->unit_amount; // unit_amount , unit_amount_decimal
                    $paymentModal->payment_intent = null;
                    $paymentModal->payment_intent_client_secret = null;
                    $paymentModal->redirect_status = null;
                    $paymentModal->save();

                    $stripe->paymentIntents->update(
                        $invoices->payment_intent,
                        ['metadata' => ['sale_id' => $model->id, 'client_id' => $client->id, "subscription_id" => $modelCart->subscription_id, "payment_id" => $paymentModal->id]],
                        ['stripe_account' => $stripe_account_id]
                    );

                    $paymentIntent = \Stripe\PaymentIntent::retrieve(
                        $invoices->payment_intent,
                        ['stripe_account' => $stripe_account_id]
                    );

                    if ($paymentIntent->status == 'requires_payment_method') {
                        return response()->json([
                            'payment_intent_client_secret' => $paymentIntent->client_secret,
                            'message' => __('messages.warning'),
                            'payment_status' => $paymentIntent->status,
                            'amount' => $paymentIntent->amount,
                            'stripe_account_id' => $stripe_account_id,
                            'sale' => Sale::where('id', $model->id)->with(['cart'])->first(),
                        ], $this->warningStatus);
                    } else {
                        http_response_code(500);
                        return response()->json(['message' => __('messages.error_PaymentIntent_status')], $this->serverErrorStatus);
                    }
                }
            } else {
                if ($model->appointment_id) {
                    $appointment = Appointment::where('id', $model->appointment_id)->first();
                    if ($appointment) {
                        $modelCart = new Cart;
                        $modelCart->salon_id = $salon_id;
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
                            $modelCart->salon_id = $salon_id;
                            $modelCart->sale_id = $model->id;
                            $modelCart->service_id = $value['id'];
                            $modelCart->staff_id = ($value['staff_id']) ? $value['staff_id'] : null;
                            $modelCart->cost = $value['gprice'];
                            $modelCart->type = "Service";
                            $modelCart->save();
                        }
                    }
                    if (isset($cart['products']) && $cart['products']) {
                        foreach ($cart['products'] as $value) {
                            $modelCart = new Cart;
                            $modelCart->salon_id = $salon_id;
                            $modelCart->sale_id = $model->id;
                            $modelCart->product_id = $value['id'];
                            $modelCart->qty = $value['qty'];
                            $modelCart->cost = $value['cost_price'];
                            $modelCart->type = "Product";
                            $modelCart->save();
                            if ($modelCart && $modelCart->product_id) {
                                $modelProduct = Products::where(['id' => $modelCart->product_id, 'manage_stock' => 1])->first();
                                if ($modelProduct) {
                                    if ($modelProduct->stock_quantity >= $modelCart->qty) {
                                        $modelProduct->stock_quantity = $modelProduct->stock_quantity - $modelCart->qty;
                                        $modelProduct->save();
                                    }
                                }
                            }

                        }
                    }
                    if (isset($cart['vouchers']) && $cart['vouchers']) {
                        foreach ($cart['vouchers'] as $value) {
                            $voucher_to = (isset($value['voucher_to']) && $value['voucher_to']) ? $value['voucher_to'] : "";

                            if ($voucher_to) {
                                $voucherModal = Voucher::select(['id', 'valid', 'name', 'description', 'amount', 'used_online', 'terms_and_conditions'])->where('id', $value['id'])->where('salon_id', $salon_id)->first();
                                $vt = $voucher_to;
                                // foreach ($voucher_to as $vt) {
                                $modelCartVoucherTo = new VoucherTo;
                                $modelCartVoucherTo->salon_id = $salon_id;
                                $modelCartVoucherTo->voucher_id = $value['id'];
                                $modelCartVoucherTo->voucher_type = "Voucher";
                                $modelCartVoucherTo->client_id = $client->id;
                                $modelCartVoucherTo->first_name = $vt['first_name'];
                                $modelCartVoucherTo->last_name = $vt['last_name'];
                                $modelCartVoucherTo->is_send = (isset($vt['is_send']) && $vt['is_send']) ? 1 : 0;
                                $modelCartVoucherTo->email = $vt['email'] ? $vt['email'] : null;
                                $modelCartVoucherTo->amount = $vt['amount'];
                                $modelCartVoucherTo->remaining_balance = $vt['amount'];
                                $modelCartVoucherTo->message = $vt['message'] ? $vt['message'] : null;
                                $modelCartVoucherTo->code = Str::random(6);
                                $modelCartVoucherTo->save();
                                $modelCart = new Cart;
                                $modelCart->salon_id = $salon_id;
                                $modelCart->sale_id = $model->id;
                                $modelCart->voucher_to_id = $modelCartVoucherTo->id;
                                $modelCart->cost = $value['amount'];
                                $modelCart->type = "Voucher";
                                $modelCart->save();
                                if ($modelCartVoucherTo->is_send) {
                                    $field = array();
                                    $field['amount'] = $modelCartVoucherTo->amount;
                                    $field['code'] = $modelCartVoucherTo->code;
                                    $field['message'] = $modelCartVoucherTo->message;
                                    $field['recipient_name'] = ucfirst($modelCartVoucherTo->first_name) . ' ' . ucfirst($modelCartVoucherTo->last_name);
                                    $field['sender_name'] = $client->first_name . ' ' . $client->last_name;
                                    $field['voucherModal'] = $voucherModal->toArray();
                                    $field['is_stripe'] = $is_stripe;
                                    // $sendmail = sendMail($modelCartVoucherTo->email, ['subject' => 'Beauty- Gift Voucher', 'template' => 'GiftVoucher'], $field);
                                    // if (empty($sendmail)) {
                                    //     // return response()->json(['email' => $requestAll['email'], 'message' => __('messages.wrongmail')], $this->errorStatus);
                                    // }
                                }
                                // }
                            }
                        }
                    }
                    if (isset($cart['membership']) && $cart['membership']) {
                        foreach ($cart['membership'] as $value) {
                            $modelCart = new Cart;
                            $modelCart->salon_id = $salon_id;
                            $modelCart->sale_id = $model->id;
                            $modelCart->membership_id = $value['id'];
                            $modelCart->cost = $value['cost'];
                            $modelCart->type = "Membership";
                            $modelCart->save();
                        }
                    }
                    if (isset($cart['oneoffvoucher']) && $cart['oneoffvoucher']) {
                        foreach ($cart['oneoffvoucher'] as $vt) {
                            $modelCartVoucherTo = new VoucherTo;
                            $modelCartVoucherTo->salon_id = $salon_id;
                            $modelCartVoucherTo->voucher_id = null;
                            $modelCartVoucherTo->client_id = $client->id;
                            $modelCartVoucherTo->voucher_type = "OneOffVoucher";
                            $modelCartVoucherTo->first_name = $vt['first_name'];
                            $modelCartVoucherTo->last_name = $vt['last_name'];
                            $modelCartVoucherTo->is_send = (isset($vt['is_send']) && $vt['is_send']) ? 1 : 0;
                            $modelCartVoucherTo->email = $vt['email'] ? $vt['email'] : null;
                            $modelCartVoucherTo->amount = $vt['amount'];
                            $modelCartVoucherTo->remaining_balance = $vt['amount'];
                            $modelCartVoucherTo->message = $vt['message'] ? $vt['message'] : null;
                            $modelCartVoucherTo->code = Str::random(6);
                            $modelCartVoucherTo->save();
                            $modelCart = new Cart;
                            $modelCart->sale_id = $model->id;
                            $modelCart->voucher_to_id = $modelCartVoucherTo->id;
                            $modelCart->cost = $modelCartVoucherTo->amount;
                            $modelCart->type = "OneOffVoucher";
                            $modelCart->save();
                            if ($modelCartVoucherTo->is_send) {
                                $field = array();
                                $field['amount'] = $modelCartVoucherTo->amount;
                                $field['code'] = $modelCartVoucherTo->code;
                                $field['message'] = $modelCartVoucherTo->message;
                                $field['recipient_name'] = ucfirst($modelCartVoucherTo->first_name) . ' ' . ucfirst($modelCartVoucherTo->last_name);
                                $field['sender_name'] = $client->first_name . ' ' . $client->last_name;
                                $field['is_stripe'] = $is_stripe;
                                $sendmail = sendMail($modelCartVoucherTo->email, ['subject' => 'Beauty- Gift Voucher', 'template' => 'GiftVoucher'], $field);
                                if (empty($sendmail)) {
                                    // return response()->json(['email' => $requestAll['email'], 'message' => __('messages.wrongmail')], $this->errorStatus);
                                }
                            }
                        }
                    }
                }

                $paymentModal = new Payment;
                $paymentModal->salon_id = $salon_id;
                $paymentModal->sale_id = $model->id;
                $paymentModal->client_id = $client->id;
                $paymentModal->type = null;
                $paymentModal->paidby = $request->paidby;
                $paymentModal->amount = $totalprice;
                if ($paidby === "StripeCreditCard") {
                    $paymentModal->status = "Paid";
                } elseif ($paidby === "CreditCard") {
                    $paymentModal->status = "Paid";
                } elseif ($paidby === "Cash") {
                    $paymentModal->status = "Paid";
                } elseif ($paidby === "Voucher") {
                    $paymentModal->status = "Paid";
                } else {
                    $paymentModal->status = "Failed";
                }
                $paymentModal->payment_date = Carbon::parse(currentDateTime(), localtimezone())->setTimezone('UTC')->format('Y-m-d H:i:s');
                $paymentModal->transaction_id = null;
                $paymentModal->payment_intent = null;
                $paymentModal->payment_intent_client_secret = null;
                $paymentModal->redirect_status = null;
                $paymentModal->save();
                if ($paymentModal) {
                    $model->status = $paymentModal->status;
                    $model->save();
                }
                if ($is_stripe === 1 || $is_stripe === '1') {
                    $Intent = \Stripe\PaymentIntent::create([
                        'customer' => $stripe_customer_account_id,
                        'amount' => $totalprice,
                        'currency' => 'inr',
                        // 'payment_method' => $customerattach->id,
                        'payment_method_types' => ['card'],
                        // 'payment_method' => "pm_card_visa",
                        'confirmation_method' => 'automatic', //manual/automatic
                        "metadata" => ["sale_id" => $model->id, 'client_id' => $client->id, 'payment_id' => $paymentModal->id],
                        // 'confirm' => true,
                        // 'use_stripe_sdk' => true,
                        // 'receipt_email' => $client->email,
                        // 'next_action' => ['type' => 'redirect_to_url', 'redirect_to_url' => ['url' => 'https://hooks.stripe.com', 'return_url' => 'https://mysite.com']],
                        // 'source' => $token,
                        // 'automatic_payment_methods' => [
                        //     'enabled' => true,
                        // ],
                    ], ['stripe_account' => $stripe_account_id]);

                    $paymentIntent = \Stripe\PaymentIntent::retrieve(
                        $Intent->id,
                        ['stripe_account' => $stripe_account_id]
                    );
                    if ($paymentIntent->status == 'requires_action' &&
                        $paymentIntent->next_action->type == 'use_stripe_sdk') {
                        # Tell the client to handle the action
                        return response()->json([
                            'requires_action' => true,
                            'url' => $paymentIntent->next_action,
                            'payment_intent_client_secret' => $paymentIntent->client_secret,
                            'payment_status' => $paymentIntent->status,
                            'amount' => $paymentIntent->amount,
                            'stripe_account_id' => $stripe_account_id,
                            'message' => __('messages.success'),
                        ], $this->warningStatus);
                    } elseif ($paymentIntent->status == 'requires_payment_method') {
                        # The payment didn’t need any additional actions and completed!
                        # Handle post-payment fulfillment
                        return response()->json([
                            'payment_intent_client_secret' => $paymentIntent->client_secret,
                            'message' => __('messages.warning'),
                            'payment_status' => $paymentIntent->status,
                            'amount' => $paymentIntent->amount,
                            'stripe_account_id' => $stripe_account_id,
                            'sale' => Sale::where('id', $model->id)->with(['cart'])->first(),
                        ], $this->warningStatus);
                    } elseif ($paymentIntent->status == 'requires_confirmation') {
                        # The payment didn’t need any additional actions and completed!
                        # Handle post-payment fulfillment
                        return response()->json([
                            'payment_intent_client_secret' => $paymentIntent->client_secret,
                            'message' => __('messages.warning'),
                            'payment_status' => $paymentIntent->status,
                            'amount' => $paymentIntent->amount,
                            'stripe_account_id' => $stripe_account_id,
                            'sale_id' => $model->id,
                        ], $this->warningStatus);
                    } else if ($paymentIntent->status == 'succeeded') {
                        # The payment didn’t need any additional actions and completed!
                        # Handle post-payment fulfillment
                        return response()->json(['message' => __('messages.success'), 'payment_status' => $paymentIntent->status, 'sale_id' => $model->id], $this->successStatus);
                    } else {
                        # Invalid status
                        http_response_code(500);
                        return response()->json(['message' => __('messages.error_PaymentIntent_status')], $this->serverErrorStatus);
                    }
                }
            }
            return $this->returnResponse($request, $model->id);
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
            'appliedvoucherto',
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
                $startdate = Carbon::parse($daterange[0] . ' 00:00:00', localtimezone())->setTimezone('UTC')->format('Y-m-d 00:00:00');
                $enddate = Carbon::parse($daterange[1] . ' 23:59:59', localtimezone())->setTimezone('UTC')->format('Y-m-d 23:59:59');
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

    public function sendEmailInvoice(Request $request)
    {
        $requestAll = $request->all();
        $validator = Validator::make($requestAll, [
            'salon_id' => 'required',
            'email' => 'required',
        ]);
        if ($validator->passes()) {
            $field = array();
            $field['SaleCompletedData'] = $request->SaleCompletedData;
            $sendmail = sendMail($request->email, ['subject' => 'Beauty- Invoice', 'template' => 'Invoice'], $field);
            if (empty($sendmail)) {
                // return response()->json(['email' => $requestAll['email'], 'message' => __('messages.wrongmail')], $this->errorStatus);
            }
        } else {
            $messages = $validator->messages();
            return response()->json(['errors' => $messages, 'message' => __('messages.validation_error')], $this->errorStatus);
        }

    }

    public function returnpayment(Request $request)
    {
        $requestAll = $request->all();
        $stripe_account_id = auth()->user()->stripe_account_id;

        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $paymentIntent = \Stripe\PaymentIntent::retrieve(
            $request->payment_intent,
            ['stripe_account' => $stripe_account_id]
        );
        if ($paymentIntent) {
            $metadata = $paymentIntent->metadata;
            $paymentModal = Payment::where(['id' => $metadata->payment_id])->first();
            if ($paymentModal) {
                $paymentModal->payment_intent = $paymentIntent->id;
                $paymentModal->payment_intent_client_secret = $paymentIntent->client_secret;
                $paymentModal->redirect_status = $paymentIntent->status;
                $paymentModal->paidby = "StripeCreditCard";
                $paymentModal->status = $paymentIntent->status === "succeeded" ? "Paid" : "Failed";
                $paymentModal->invoice = $paymentIntent->invoice;
                $paymentModal->save();
                $saleModal = Sale::where('id', $metadata->sale_id)->first();
                if ($saleModal) {
                    $saleModal->status = $paymentIntent->status === "succeeded" ? "Paid" : "Failed";
                    $saleModal->save();
                }
            }
        }
    }

    public function payment(Request $request)
    {

    }

    public function voucherapply(Request $request)
    {
        $requestAll = $request->all();
        $validator = Validator::make($requestAll, [
            'client_id' => 'required|integer',
            'code' => 'required',
        ]);
        if ($validator->fails()) {
            $messages = $validator->messages();
            return response()->json(['errors' => $messages, 'message' => __('messages.validation_error')], $this->errorStatus);
        }
        $client_id = $request->client_id;
        $code = $request->code;
        $action = $request->action;
        $salon_id = $request->salon_id;

        $currentdate = Carbon::parse()->format('Y-m-d H:i:s');
        $voucherto = VoucherTo::with('voucher')->whereHas('voucher', function ($q) use ($currentdate) {
            $q->where(['is_active' => 1])->where('expiry_at', '>=', $currentdate)->where('remaining_balance', '>', '0');
        })->where(['code' => $code, 'client_id' => $client_id])->first();

        if ($voucherto) {
            return response()->json($voucherto, $this->successStatus);
        } else {
            return response()->json(['errors' => ['code' => __('messages.code_not_match')], 'message' => __('messages.validation_error')], $this->errorStatus);
        }
    }

    public function SendEmailVoucher(Request $request)
    {
        $requestAll = $request->all();
        if ($request->client_id) {
            $client = Client::find($request->client_id);
            $data['test'] = 'hello';

            try {
                $mailchimp = new ApiClient();
                // $mailchimp->setApiKey(env('MAILCHIMP_API_KEY'));
                $mailchimp->setApiKey('mIfiW1VW5N-qkXB8X_7nTA');
                // $response = $mailchimp->messages->send(["message" => 'ss']);
                $response = $mailchimp->users->ping();
                // print_r($response);
                // dd();

                $client = new MailchimpMarketing\ApiClient();
                $client->setConfig([
                    'apiKey' => 'mIfiW1VW5N-qkXB8X_7nTA',
                    'server' => 'us18',
                ]);

                $response = $client->campaigns->sendTestEmail(51, [
                    "test_emails" => ["EveWakefield@mailinator.com"],
                    "send_type" => "html",
                ]);
                print_r($response);

                $toEmail = "EveWakefield@mailinator.com";
                $fromEmail = "programmer93.dynamicdreamz@gmail.com";
                $subject = "Hello";
                // $sendemail = Mail::send(new SendVoucher($data), $data, function ($message) use ($toEmail, $fromEmail, $subject) {
                //     // echo $toEmail . ' ' . $fromEmail . ' ' . $subject;
                //     $message->to($toEmail)->subject($subject);
                //     $message->from($fromEmail);
                // });

                $sendemail = Mail::to($client->email)->send(new SendVoucher($data));
                // echo '<pre>';
                // print_r($sendemail);
                // echo '<pre>';
                // dd();

            } catch (\Error$e) {
                echo 'Error: ', $e->getMessage(), "\n";
            }
            dd();
        }

        $validator = Validator::make($requestAll, [
            'client_id' => 'required|integer',
            'code' => 'required',
        ]);
        if ($validator->fails()) {
            $messages = $validator->messages();
            return response()->json(['errors' => $messages, 'message' => __('messages.validation_error')], $this->errorStatus);
        }
    }
}
