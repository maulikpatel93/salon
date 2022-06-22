<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Api\Appointment;
use App\Models\Api\Client;
use App\Models\Api\Products;
use App\Models\Api\Staff;
use App\Models\Api\VoucherTo;
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

        if ($model && $model->count() > 0) {
            $successData = $model->toArray();
            if ($successData) {
                return response()->json($successData, $this->successStatus);
            }
        }
        return response()->json(['message' => __('messages.failed')], $this->errorStatus);
    }

}
