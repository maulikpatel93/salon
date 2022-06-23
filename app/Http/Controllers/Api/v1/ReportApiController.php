<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Api\Appointment;
use App\Models\Api\Cart;
use App\Models\Api\Client;
use App\Models\Api\Products;
use App\Models\Api\Services;
use App\Models\Api\Staff;
use App\Models\Api\Tax;
use App\Models\Api\VoucherTo;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;

class ReportApiController extends Controller
{
    protected $successStatus = 200;
    protected $badrequestStatus = 400;
    protected $errorStatus = 422;
    protected $unauthorizedStatus = 401;
    protected $warningStatus = 410;

    protected $staff_field = [
        'id',
        'salon_id',
        'price_tier_id',
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'calendar_booking',
    ];

    protected $client_field = [
        'id',
        'salon_id',
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'gender',
        'created_at',
        'recieve_marketing_email',
    ];

    protected $salon_field = [
        'id',
        'business_name',
    ];

    protected $appointment_field = [
        'id',
        'client_id',
        'service_id',
        'staff_id',
        'dateof',
        'start_time',
        'end_time',
        'cost',
        'status',
        'cancellation_reason',
        'updated_at',
    ];

    protected $product_field = [
        'id',
        'supplier_id',
        'tax_id',
        'name',
        'sku',
        'cost_price',
        'retail_price',
        'manage_stock',
        'stock_quantity',
        'low_stock_threshold',
        'updated_at',
    ];

    protected $voucherto_field = [
        'id',
        'voucher_id',
        'client_id',
        'first_name',
        'last_name',
        'email',
        'code',
        'voucher_type',
        'is_send',
        'amount',
        'remaining_balance',
        'message',
    ];

    protected $cart_field = [
        'id',
        'service_id',
        'product_id',
        'voucher_to_id',
        'staff_id',
        'type',
        'cost',
        'qty',
    ];

    protected $service_field = [
        'id',
        'name',
    ];

    public function __construct()
    {
        $this->middleware('auth:api');
        parent::__construct();
    }

    public function view(Request $request)
    {
        $requestAll = $request->all();
        $staff_field = $this->staff_field;
        $client_field = $this->client_field;
        $appointment_field = $this->appointment_field;
        $product_field = $this->product_field;
        $voucherto_field = $this->voucherto_field;
        $cart_field = $this->cart_field;
        $service_field = $this->service_field;

        $validator = Validator::make($requestAll, [
            'auth_key' => 'required',
            'salon_id' => 'required|integer',
            'ScreenReport' => 'required',
        ]);
        if ($validator->fails()) {
            $messages = $validator->messages();
            return response()->json(['errors' => $messages, 'message' => __('messages.validation_error')], $this->errorStatus);
        }

        $pagination = $request->pagination ? $request->pagination : false;
        $limit = $request->limit ? $request->limit : config('params.apiPerPage');
        $orderby = 'id desc';

        $ScreenReport = $request->ScreenReport;
        $salon_id = $request->salon_id;
        $staff_id = $request->staff_id;
        $supplier_id = $request->supplier_id;
        $service_id = $request->service_id;
        $product_id = $request->product_id;
        $month = $request->month;
        $daterange = $request->daterange ? explode(" - ", $request->daterange) : "";
        $model = "";
        if ($ScreenReport === "performance_summary") {
            $queryData = Staff::select($staff_field)->with(['appointment:id'])->has('appointment')->where(['is_active' => 1, 'salon_id' => $salon_id, 'role_id' => 5])->orderByRaw($orderby);
            if ($staff_id) {
                $queryData->where('id', $staff_id);
            }
            if ($daterange) {
                $queryData->addSelect(DB::raw('"' . $daterange[0] . '" as startdate, "' . $daterange[1] . '" as enddate'));
            }
            if ($ScreenReport) {
                $queryData->addSelect(DB::raw('"' . $ScreenReport . '" as ScreenReport'));
            }
            if ($pagination == true) {
                $model = $queryData->paginate($limit);
            } else {
                $model = $queryData->get();
            }

        }
        if ($ScreenReport === "client_retention") {
            $queryData = Client::select($client_field)->with(["lastappointment" => function ($query) {
                $query->select(['id', 'client_id', 'dateof', 'start_time', 'end_time'])->orderBy('id', 'desc');
            }])->whereHas('lastappointment', function (Builder $query) use ($daterange) {
                if ($daterange) {
                    $query->whereDate('dateof', '>=', $daterange[0])->whereDate('dateof', '<=', $daterange[1]);
                }
            })->has("lastappointment")->where(['is_active' => 1, 'salon_id' => $salon_id, 'role_id' => 6])->orderByRaw($orderby);

            if ($daterange) {
                $queryData->addSelect(DB::raw('"' . $daterange[0] . '" as startdate, "' . $daterange[1] . '" as enddate'));
            }
            if ($ScreenReport) {
                $queryData->addSelect(DB::raw('"' . $ScreenReport . '" as ScreenReport'));
            }
            if ($pagination == true) {
                $model = $queryData->paginate($limit);
            } else {
                $model = $queryData->get();
            }
        }

        if ($ScreenReport === "cancelled_appointments") {
            $queryData = Appointment::select($appointment_field)->with([
                "client:id,first_name,last_name,email,phone_number",
                "staff:id,first_name,last_name,email,phone_number",
                "service:id,name",
            ])->where(['status' => 'Cancelled', 'salon_id' => $salon_id])->orderBy('id', 'desc');

            if ($staff_id) {
                $queryData->where('staff_id', $staff_id);
            }
            if ($daterange) {
                $queryData->whereDate('updated_at', '>=', $daterange[0])->whereDate('updated_at', '<=', $daterange[1]);
            }
            if ($ScreenReport) {
                $queryData->addSelect(DB::raw('"' . $ScreenReport . '" as ScreenReport'));
            }
            if ($pagination == true) {
                $model = $queryData->paginate($limit);
            } else {
                $model = $queryData->get();
            }
        }
        if ($ScreenReport === "appointment_schedule") {
            $queryData = Appointment::select($appointment_field)->with([
                "client:id,first_name,last_name,email,phone_number",
                "staff:id,first_name,last_name,email,phone_number",
                "service:id,name",
            ])->where(['salon_id' => $salon_id])->orderBy('id', 'desc');

            if ($staff_id) {
                $queryData->where('staff_id', $staff_id);
            }
            if ($daterange) {
                $queryData->whereDate('dateof', '>=', $daterange[0])->whereDate('dateof', '<=', $daterange[1]);
            }
            if ($ScreenReport) {
                $queryData->addSelect(DB::raw('"' . $ScreenReport . '" as ScreenReport'));
            }
            if ($pagination == true) {
                $model = $queryData->paginate($limit);
            } else {
                $model = $queryData->get();
            }
        }

        if ($ScreenReport === "stock_levels") {
            $queryData = Products::select($product_field)->with([
                "supplier:id,name",
            ])->withCount("stocksold")->where(["manage_stock" => 1, 'salon_id' => $salon_id])->orderBy('id', 'desc');

            if ($supplier_id) {
                $queryData->where('supplier_id', $supplier_id);
            }
            if ($daterange) {
                $queryData->whereDate('dateof', '>=', $daterange[0])->whereDate('dateof', '<=', $daterange[1]);
            }
            if ($ScreenReport) {
                $queryData->addSelect(DB::raw('"' . $ScreenReport . '" as ScreenReport'));
            }
            if ($pagination == true) {
                $model = $queryData->paginate($limit);
            } else {
                $model = $queryData->get();
            }
        }

        if ($ScreenReport === "client_list") {
            $queryData = Client::select($client_field)->with(["lastappointment" => function ($query) use ($daterange) {
                $query->select(['id', 'client_id', 'dateof', 'start_time', 'end_time'])->orderBy('id', 'desc');
            }])->whereHas('lastappointment', function (Builder $query) use ($daterange) {
                if ($daterange) {
                    $query->whereDate('dateof', '>=', $daterange[0])->whereDate('dateof', '<=', $daterange[1]);
                }
            })->has("lastappointment")->where(['is_active' => 1, 'salon_id' => $salon_id, 'role_id' => 6])->orderByRaw($orderby);
            if ($daterange) {
                $queryData->addSelect(DB::raw('"' . $daterange[0] . '" as startdate, "' . $daterange[1] . '" as enddate'));
            }
            if ($ScreenReport) {
                $queryData->addSelect(DB::raw('"' . $ScreenReport . '" as ScreenReport'));
            }
            if ($pagination == true) {
                $model = $queryData->paginate($limit);
            } else {
                $model = $queryData->get();
            }
        }

        if ($ScreenReport === "client_birthdays") {
            $queryData = Client::select($client_field)->with(["lastappointment" => function ($query) use ($daterange) {
                $query->select(['id', 'client_id', 'dateof', 'start_time', 'end_time'])->orderBy('id', 'desc');
            }])->whereHas('lastappointment', function (Builder $query) use ($daterange) {
                if ($daterange) {
                    $query->whereDate('dateof', '>=', $daterange[0])->whereDate('dateof', '<=', $daterange[1]);
                }
            })->has("lastappointment")->where(['is_active' => 1, 'salon_id' => $salon_id, 'role_id' => 6])->orderByRaw($orderby);
            if ($daterange) {
                $queryData->addSelect(DB::raw('"' . $daterange[0] . '" as startdate, "' . $daterange[1] . '" as enddate'));
            }
            if ($ScreenReport) {
                $queryData->addSelect(DB::raw('"' . $ScreenReport . '" as ScreenReport'));
            }
            if ($month) {
                $queryData->whereMonth('date_of_birth', $month);
            }
            if ($pagination == true) {
                $model = $queryData->paginate($limit);
            } else {
                $model = $queryData->get();
            }
        }

        if ($ScreenReport === "gift_vouchers") {
            $queryData = VoucherTo::select($voucherto_field)->with(["client:id,first_name,last_name,email", "voucher:id,name,expiry_at,is_active"])->where(['salon_id' => $salon_id])->whereNotNull('client_id')->orderByRaw($orderby);
            if ($daterange) {
                $queryData->whereDate('created_at', '>=', $daterange[0])->whereDate('created_at', '<=', $daterange[1]);
            }
            if ($daterange) {
                $queryData->addSelect(DB::raw('"' . $daterange[0] . '" as startdate, "' . $daterange[1] . '" as enddate'));
            }
            if ($ScreenReport) {
                $queryData->addSelect(DB::raw('"' . $ScreenReport . '" as ScreenReport'));
            }
            if ($pagination == true) {
                $model = $queryData->paginate($limit);
            } else {
                $model = $queryData->get();
            }
        }

        if ($ScreenReport === "clients_by_service") {
            // $cart = Cart::with('sale')->get();
            // if ($cart) {
            //     foreach ($cart as $c) {
            //         $cartm = Cart::where('id', $c->id)->first();
            //         $cartm->client_id = $c->sale->client_id;
            //         $cartm->save();
            //     }
            // }
            $queryData = Client::select($client_field)->with([
                "lastappointment" => function ($query) use ($daterange) {
                    $query->select(['id', 'client_id', 'dateof', 'start_time', 'end_time'])->orderBy('id', 'desc');
                    if ($daterange) {
                        $query->whereDate('dateof', '>=', $daterange[0])->whereDate('dateof', '<=', $daterange[1]);
                    }
                },
            ])->whereHas('cart', function (Builder $query) use ($daterange, $service_id) {
                $query->select(['id', 'service_id', 'client_id']);
                if ($daterange) {
                    $query->whereDate('created_at', '>=', $daterange[0])->whereDate('created_at', '<=', $daterange[1]);
                }
                if ($service_id) {
                    $query->where('service_id', $service_id);
                }
            })->where(['is_active' => 1, 'salon_id' => $salon_id, 'role_id' => 6])->orderByRaw($orderby);

            if ($daterange) {
                $queryData->addSelect(DB::raw('"' . $daterange[0] . '" as startdate, "' . $daterange[1] . '" as enddate'));
            }
            if ($service_id) {
                $queryData->addSelect(DB::raw('"' . $service_id . '" as service_id'));
            }
            if ($ScreenReport) {
                $queryData->addSelect(DB::raw('"' . $ScreenReport . '" as ScreenReport'));
            }
            if ($pagination == true) {
                $model = $queryData->paginate($limit);
            } else {
                $model = $queryData->get();
            }
        }

        if ($ScreenReport === "clients_by_product") {
            $queryData = Client::select($client_field)->with([
                "lastproduct" => function ($query) use ($daterange, $product_id) {
                    $query->select(['id', 'client_id', 'created_at'])->orderBy('id', 'desc')->whereNotNull('product_id');
                    if ($daterange) {
                        $query->whereDate('created_at', '>=', $daterange[0])->whereDate('created_at', '<=', $daterange[1]);
                    }
                    if ($product_id) {
                        $query->where('product_id', $product_id);
                    }
                },
            ])->whereHas('cart', function (Builder $query) use ($daterange, $product_id) {
                $query->select(['id', 'product_id', 'client_id']);
                if ($daterange) {
                    $query->whereDate('created_at', '>=', $daterange[0])->whereDate('created_at', '<=', $daterange[1]);
                }
                if ($product_id) {
                    $query->where('product_id', $product_id);
                }
            })->where(['is_active' => 1, 'salon_id' => $salon_id, 'role_id' => 6])->orderByRaw($orderby);

            if ($daterange) {
                $queryData->addSelect(DB::raw('"' . $daterange[0] . '" as startdate, "' . $daterange[1] . '" as enddate'));
            }
            if ($product_id) {
                $queryData->addSelect(DB::raw('"' . $product_id . '" as product_id'));
            }
            if ($ScreenReport) {
                $queryData->addSelect(DB::raw('"' . $ScreenReport . '" as ScreenReport'));
            }
            if ($pagination == true) {
                $model = $queryData->paginate($limit);
            } else {
                $model = $queryData->get();
            }
        }

        $tax = Tax::where(['name' => 'GST', 'is_active' => 1])->first();
        $taxpercentage = $tax ? $tax->percentage : 0;

        if ($ScreenReport === "sales_by_type") {
            $serviceCart = Cart::where(['salon_id' => $salon_id])->whereNotNull('service_id');
            if ($daterange) {
                $serviceCart->whereDate('created_at', '>=', $daterange[0])->whereDate('created_at', '<=', $daterange[1]);
            }
            $service_item_sold = $serviceCart->count();
            $service_gross_sale = $serviceCart->sum("cost");
            $service_taxvalue = ($service_gross_sale / $taxpercentage);
            $service_net_sales = ($service_gross_sale - $service_taxvalue);

            $productCart = Cart::where(['salon_id' => $salon_id, 'type' => 'Product'])->whereNotNull('product_id');
            if ($daterange) {
                $productCart->whereDate('created_at', '>=', $daterange[0])->whereDate('created_at', '<=', $daterange[1]);
            }
            $product_item_sold = $productCart->count();
            $product_gross_sale = $productCart->sum("cost");
            $product_taxvalue = ($product_gross_sale / $taxpercentage);
            $product_net_sales = ($product_gross_sale - $product_taxvalue);

            $voucherCart = Cart::where(['salon_id' => $salon_id])->whereNotNull('voucher_to_id');
            if ($daterange) {
                $voucherCart->whereDate('created_at', '>=', $daterange[0])->whereDate('created_at', '<=', $daterange[1]);
            }
            $voucher_item_sold = $voucherCart->count();
            $voucher_gross_sale = $voucherCart->sum("cost");
            $voucher_taxvalue = ($voucher_gross_sale / $taxpercentage);
            $voucher_net_sales = ($voucher_gross_sale - $voucher_taxvalue);

            $membershipCart = Cart::where(['salon_id' => $salon_id, 'type' => 'Membership'])->whereNotNull('membership_id');
            if ($daterange) {
                $membershipCart->whereDate('created_at', '>=', $daterange[0])->whereDate('created_at', '<=', $daterange[1]);
            }
            $membership_item_sold = $membershipCart->count();
            $membership_gross_sale = $membershipCart->sum("cost");
            $membership_taxvalue = ($membership_gross_sale / $taxpercentage);
            $membership_net_sales = ($membership_gross_sale - $membership_taxvalue);

            $subscriptionCart = Cart::where(['salon_id' => $salon_id, 'type' => 'Subscription'])->whereNotNull('subscription_id');
            if ($daterange) {
                $subscriptionCart->whereDate('created_at', '>=', $daterange[0])->whereDate('created_at', '<=', $daterange[1]);
            }
            $subscription_item_sold = $subscriptionCart->count();
            $subscription_gross_sale = $subscriptionCart->sum("cost");
            $subscription_taxvalue = ($subscription_gross_sale / $taxpercentage);
            $subscription_net_sales = ($subscription_gross_sale - $subscription_taxvalue);

            $dataSales = [
                [
                    "type" => "Services",
                    "item_sold" => $service_item_sold,
                    "net_sales" => $service_net_sales,
                    "tax" => $service_taxvalue,
                    "gross_sale" => $service_gross_sale,
                ],
                [
                    "type" => "Products",
                    "item_sold" => $product_item_sold,
                    "net_sales" => $product_net_sales,
                    "tax" => $product_taxvalue,
                    "gross_sale" => $product_gross_sale,
                ],
                [
                    "type" => "Gift Vouchers",
                    "item_sold" => $voucher_item_sold,
                    "net_sales" => $voucher_net_sales,
                    "tax" => $voucher_taxvalue,
                    "gross_sale" => $voucher_taxvalue,
                ],
                [
                    "type" => "Memberships",
                    "item_sold" => $membership_item_sold,
                    "net_sales" => $membership_net_sales,
                    "tax" => $membership_taxvalue,
                    "gross_sale" => $membership_gross_sale,
                ],
                [
                    "type" => "Subsciption",
                    "item_sold" => $subscription_item_sold,
                    "net_sales" => $subscription_net_sales,
                    "tax" => $subscription_taxvalue,
                    "gross_sale" => $subscription_gross_sale,
                ],
            ];
            $successData = $dataSales;
            if ($successData) {
                return response()->json($successData, $this->successStatus);
            }
        }

        if ($ScreenReport === "sales_by_service") {
            $queryData = Services::select($service_field)->where(['salon_id' => $salon_id])->has("cart")->orderByRaw($orderby);
            if ($daterange) {
                $queryData->addSelect(DB::raw('"' . $daterange[0] . '" as startdate, "' . $daterange[1] . '" as enddate'));
            }
            if ($pagination == true) {
                $model = $queryData->paginate($limit);
            } else {
                $model = $queryData->get();
            }
        }

        if ($ScreenReport === "sales_by_product") {
            $queryData = Products::select($service_field)->where(['salon_id' => $salon_id])->has("cart")->orderByRaw($orderby);
            if ($daterange) {
                $queryData->addSelect(DB::raw('"' . $daterange[0] . '" as startdate, "' . $daterange[1] . '" as enddate'));
            }
            if ($pagination == true) {
                $model = $queryData->paginate($limit);
            } else {
                $model = $queryData->get();
            }
        }

        if ($ScreenReport === "sales_by_staffmember") {
            $queryData = Staff::select($staff_field)->where(['salon_id' => $salon_id])->has("cart")->orderByRaw($orderby);
            if ($daterange) {
                $queryData->addSelect(DB::raw('"' . $daterange[0] . '" as startdate, "' . $daterange[1] . '" as enddate'));
            }
            if ($pagination == true) {
                $model = $queryData->paginate($limit);
            } else {
                $model = $queryData->get();
            }
        }

        if ($ScreenReport === "sales_by_day") {
            $start = Carbon::parse()->subDays(30)->toDateString();
            $end = Carbon::now()->toDateString();
            $period = CarbonPeriod::create($start, $end);
            $period = array_reverse(iterator_to_array($period));

            // $period = Carbon::parse('2018-04-27')->daysUntil('2018-04-21');
            foreach ($period as $date) {
                echo $date->format('Y-m-d');
            }

            echo '<pre>';
            print_r($period);
            echo '<pre>';
            dd();

            // for ($i = 0; $i < 30; $i++) {
            //     $date = Carbon::now()->subDays($i)->toDateString();
            //     // $queryData = Cart::select($cart_field)->where(['salon_id' => $salon_id])->where('created_at', '>=', $date . ' 00:00:00')->where('created_at', '<=', $date . ' 23:59:59')->orderByRaw($orderby);
            //     $dayCart = Cart::where(['salon_id' => $salon_id])->where('created_at', '>=', $date . ' 00:00:00')->where('created_at', '<=', $date . ' 23:59:59');
            //     if ($date) {
            //         $dayCart->where('created_at', '>=', $date . ' 00:00:00')->where('created_at', '<=', $date . ' 23:59:59');
            //     }
            //     $day_item_sold = $dayCart->count();
            //     $day_gross_sale = $dayCart->sum("cost");
            //     $day_taxvalue = ($day_gross_sale / $taxpercentage);
            //     $day_net_sales = ($day_gross_sale - $day_taxvalue);
            // }

            if ($pagination == true) {
                $model = $queryData->paginate($limit);
            } else {
                $model = $queryData->get();
            }
        }

        if ($model && $model->count() > 0) {
            $successData = $model->toArray();
            if ($successData) {
                return response()->json($successData, $this->successStatus);
            }
        }
        return response()->json(['message' => __('messages.failed')], $this->errorStatus);
    }

}
