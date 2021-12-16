<?php

namespace App\Http\Controllers\Api\v1;

use App\Exceptions\UnsecureException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\VoucherRequest;
use App\Models\Api\Voucher;
use App\Models\Api\Voucherservices;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VoucherApiController extends Controller
{
    protected $successStatus = 200;
    protected $errorStatus = 422;
    protected $unauthorizedStatus = 401;

    protected $field = [
        'id',
        'salon_id',
        'code',
        'name',
        'description',
        'amount',
        'valid',
        'used_online',
        'limit_uses',
        'limit_uses_value',
        'terms_and_conditions',
    ];

    protected $salon_field = [
        'id',
        'business_name',
        'owner_name',
    ];

    protected $voucher_service_field = [
        'id',
        'voucher_id',
        'service_id',
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
        $id = $request->id;
        return $this->returnResponse($request, $id);
    }

    public function store(VoucherRequest $request)
    {
        $requestAll = $request->all();
        $requestAll['is_active_at'] = currentDateTime();
        $requestAll['code'] = Str::random(6);
        $voucher_services = ($request->voucher_services) ? json_decode($request->voucher_services, true) : [];
        $model = new Voucher;
        $model->fill($requestAll);
        $model->save();
        if ($voucher_services) {
            foreach ($voucher_services as $key => $value) {
                $vservicesModel = Voucherservices::where(['voucher_id' => $model->id, 'service_id' => $value])->first();
                if (empty($vservicesModel)) {
                    $vservicesModel = new Voucherservices();
                }
                $vservicesModel->voucher_id = $model->id;
                $vservicesModel->service_id = $value;
                $vservicesModel->save();
            }
        }
        return $this->returnResponse($request, $model->id);
    }

    public function update(VoucherRequest $request, $id)
    {
        $requestAll = $request->all();
        $voucher_services = ($request->voucher_services) ? explode(",", $request->voucher_services) : [];
        $model = $this->findModel($id);
        $model->Voucherservices->map(function ($value) use ($voucher_services, $id) {
            if ($voucher_services && !in_array($value->id, $voucher_services)) {
                Voucherservices::where(['voucher_id' => $id, 'service_id' => $value->id])->delete();
            }
            return;
        })->toArray();
        $model->fill($requestAll);
        $model->save();
        if ($voucher_services) {
            foreach ($voucher_services as $key => $value) {
                $vservicesModel = Voucherservices::where(['voucher_id' => $model->id, 'service_id' => $value])->first();
                if (empty($vservicesModel)) {
                    $vservicesModel = new Voucherservices();
                }
                $vservicesModel->voucher_id = $model->id;
                $vservicesModel->service_id = $value;
                $vservicesModel->save();
            }
        }
        return $this->returnResponse($request, $model->id);
    }

    public function delete(Request $request, $id)
    {
        $requestAll = $request->all();
        Voucher::where('id', $id)->delete();
        return response()->json(['status' => $this->successStatus, 'message' => 'success']);
    }

    protected function findModel($id)
    {
        if (($model = Voucher::find($id)) !== null) {
            return $model;
        }
        throw new UnsecureException('The requested page does not exist.');
    }

    public function returnResponse($request, $id, $data = [])
    {
        $requestAll = $request->all();
        $field = ($request->field) ? array_merge(['id', 'salon_id'], explode(',', $request->field)) : $this->field;

        $salon_field = $this->salon_field;
        if (isset($requestAll['salon_field']) && empty($requestAll['salon_field'])) {
            $salon_field = false;
        } else if ($request->salon_field == '*') {
            $salon_field = [$request->salon_field];
        } else if ($request->salon_field) {
            $salon_field = array_merge(['id'], explode(',', $request->salon_field));
        }

        $voucher_service_field = $this->voucher_service_field;
        if (isset($requestAll['voucher_service_field']) && empty($requestAll['voucher_service_field'])) {
            $voucher_service_field = false;
        } else if ($request->voucher_service_field == '*') {
            $voucher_service_field = [$request->voucher_service_field];
        } else if ($request->voucher_service_field) {
            $voucher_service_field = array_merge(['id', 'service_id'], explode(',', $request->voucher_service_field));
        }

        $service_field = $this->service_field;
        if (isset($requestAll['service_field']) && empty($requestAll['service_field'])) {
            $service_field = false;
        } else if ($request->service_field == '*') {
            $service_field = [$request->service_field];
        } else if ($request->service_field) {
            $service_field = array_merge(['id'], explode(',', $request->service_field));
        }
        $withArray = [];
        if ($salon_field) {
            $withArray[] = 'salon:' . implode(',', $salon_field);
        }
        if ($service_field) {
            $withArray[] = 'voucherservices:' . implode(',', $service_field);
        }
        $pagination = $request->pagination ? $request->pagination : false;
        $limit = $request->limit ? $request->limit : config('params.apiPerPage');

        $where = ['is_active' => '1'];
        $where = ($id) ? array_merge($where, ['id' => $id]) : $where;

        if ($pagination == true) {
            $model = Voucher::with($withArray)->select($field)->where($where)->simplePaginate($limit);
        } else {
            $model = Voucher::with($withArray)->select($field)->where($where)->get();
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