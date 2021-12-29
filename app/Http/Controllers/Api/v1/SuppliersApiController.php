<?php

namespace App\Http\Controllers\Api\v1;

use App\Exceptions\UnsecureException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\SupplierRequest;
use App\Models\Api\Suppliers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SuppliersApiController extends Controller
{
    protected $successStatus = 200;
    protected $errorStatus = 422;
    protected $unauthorizedStatus = 401;

    protected $field = [
        'id',
        'salon_id',
        'name',
        'first_name',
        'last_name',
        'logo',
        'email',
        'phone_number',
        'website',
        'address',
        'street',
        'suburb',
        'state',
        'postcode',
    ];

    protected $salon_field = [
        'id',
        'business_name',
        'owner_name',
    ];

    protected $product_field = [
        'id',
        'supplier_id',
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

    public function store(SupplierRequest $request)
    {
        $requestAll = $request->all();
        $requestAll['is_active_at'] = currentDateTime();
        $model = new Suppliers;
        $model->fill($requestAll);
        $file = $request->file('logo');
        if ($file) {
            $fileName = time() . '_' . str_replace(' ', '_', $file->getClientOriginalName());
            $filePath = $file->storeAs('suppliers', $fileName, 'public');
            $model->logo = $fileName;
        }
        $model->description = isset($requestAll['description']) ? $requestAll['description'] : '';
        $model->save();
        return $this->returnResponse($request, $model->id);
    }

    public function update(SupplierRequest $request, $id)
    {
        $requestAll = $request->all();
        $model = $this->findModel($id);
        $model->fill($requestAll);
        $file = $request->file('logo');
        if ($file) {
            Storage::delete('/public/suppliers/' . $model->logo);
            $fileName = time() . '_' . str_replace(' ', '_', $file->getClientOriginalName());
            $filePath = $file->storeAs('suppliers', $fileName, 'public');
            $model->logo = $fileName;
        }
        $model->description = isset($requestAll['description']) ? $requestAll['description'] : $model->description;
        $model->save();
        return $this->returnResponse($request, $model->id);
    }

    public function delete(Request $request, $id)
    {
        $requestAll = $request->all();
        Suppliers::where('id', $id)->delete();
        return response()->json(['id' => $id, 'message' => __('message.success')], $this->successStatus);
    }

    protected function findModel($id)
    {
        if (($model = Suppliers::find($id)) !== null) {
            return $model;
        }
        throw new UnsecureException('The requested page does not exist.');
    }

    public function returnResponse($request, $id, $data = [])
    {
        $requestAll = $request->all();

        $field = ($request->field) ? array_merge(['id', 'salon_id'], explode(',', $request->field)) : $this->field;
        $sort = ($request->sort) ? $request->sort : "";
        $salon_field = $this->salon_field;
        if (isset($requestAll['salon_field']) && empty($requestAll['salon_field'])) {
            $salon_field = false;
        } else if ($request->salon_field == '*') {
            $salon_field = [$request->salon_field];
        } else if ($request->salon_field) {
            $salon_field = array_merge(['id'], explode(',', $request->salon_field));
        }

        $product_field = $this->product_field;
        if (isset($requestAll['product_field']) && empty($requestAll['product_field'])) {
            $product_field = false;
        } else if ($request->product_field == '*') {
            $product_field = [$request->product_field];
        } else if ($request->product_field) {
            $product_field = array_merge(['id', 'supplier_id'], explode(',', $request->product_field));
        }
        $withArray = [];
        if ($salon_field) {
            $withArray[] = 'salon:' . implode(',', $salon_field);
        }
        if ($product_field) {
            $withArray[] = 'products:' . implode(',', $product_field);
        }

        $pagination = $request->pagination ? $request->pagination : false;
        $limit = $request->limit ? $request->limit : config('params.apiPerPage');

        $where = ['is_active' => '1', 'salon_id' => $request->salon_id];
        $where = ($id) ? array_merge($where, ['id' => $id]) : $where;

        $whereLike = $request->q;

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

        if ($id) {
            if ($request->result == 'result_array') {
                $model = Suppliers::with($withArray)->select($field)->where($where)->get();
            } else {
                $model = Suppliers::with($withArray)->select($field)->where($where)->first();
            }
            $successData = $model->toArray();
            return response()->json($successData, $this->successStatus);
        } else {
            if ($pagination == true) {
                if ($whereLike) {
                    $model = Suppliers::with($withArray)->select($field)->where(function ($query) use ($whereLike) {
                        $query->where('first_name', "like", "%" . $whereLike . "%");
                        $query->orWhere('last_name', "like", "%" . $whereLike . "%");
                    })->where($where)->orderByRaw($orderby)->paginate($limit);
                } else {
                    $model = Suppliers::with($withArray)->select($field)->where($where)->orderByRaw($orderby)->paginate($limit);
                }
            } else {
                if ($whereLike) {
                    $model = Suppliers::with($withArray)->select($field)->where(function ($query) use ($whereLike) {
                        $query->where('first_name', "like", "%" . $whereLike . "%");
                        $query->orWhere('last_name', "like", "%" . $whereLike . "%");
                    })->where($where)->orderByRaw($orderby)->get();
                } else {
                    $model = Suppliers::with($withArray)->select($field)->where($where)->orderByRaw($orderby)->get();
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