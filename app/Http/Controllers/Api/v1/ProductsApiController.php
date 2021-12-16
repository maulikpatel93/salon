<?php

namespace App\Http\Controllers\Api\v1;

use App\Exceptions\UnsecureException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ProductRequest;
use App\Models\Api\Products;
use Illuminate\Http\Request;

class ProductsApiController extends Controller
{
    protected $successStatus = 200;
    protected $errorStatus = 422;
    protected $unauthorizedStatus = 401;

    protected $field = [
        'id',
        'salon_id',
        'supplier_id',
        'name',
        'image',
        'sku',
        'description',
        'cost_price',
        'retail_price',
        'manage_stock',
        'stock_quantity',
        'low_stock_threshold',
    ];

    protected $salon_field = [
        'id',
        'business_name',
        'owner_name',
    ];

    protected $supplier_field = [
        'id',
        'name',
        'first_name',
        'last_name',
        'email',
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

    public function store(ProductRequest $request)
    {
        $requestAll = $request->all();
        $requestAll['is_active_at'] = currentDateTime();
        $model = new Products;
        $model->fill($requestAll);
        $file = $request->file('image');
        if ($file) {
            $fileName = time() . '_' . str_replace(' ', '_', $file->getClientOriginalName());
            $filePath = $file->storeAs('products', $fileName, 'public');
            $model->image = $fileName;
        }
        $model->description = isset($requestAll['description']) ? $requestAll['description'] : '';
        $model->save();
        return $this->returnResponse($request, $model->id);
    }

    public function update(ProductRequest $request, $id)
    {
        $requestAll = $request->all();
        $model = $this->findModel($id);
        $model->fill($requestAll);
        $file = $request->file('image');
        if ($file) {
            Storage::delete('/public/products/' . $model->image);
            $fileName = time() . '_' . str_replace(' ', '_', $file->getClientOriginalName());
            $filePath = $file->storeAs('products', $fileName, 'public');
            $model->image = $fileName;
        }
        $model->description = isset($requestAll['description']) ? $requestAll['description'] : $model->description;
        $model->save();
        return $this->returnResponse($request, $model->id);
    }

    public function delete(Request $request, $id)
    {
        $requestAll = $request->all();
        Products::where('id', $id)->delete();
        return response()->json(['status' => $this->successStatus, 'message' => 'success']);
    }

    protected function findModel($id)
    {
        if (($model = Products::find($id)) !== null) {
            return $model;
        }
        throw new UnsecureException('The requested page does not exist.');
    }

    public function returnResponse($request, $id, $data = [])
    {
        $requestAll = $request->all();
        $field = ($request->field) ? array_merge(['id', 'salon_id', 'supplier_id'], explode(',', $request->field)) : $this->field;

        $salon_field = $this->salon_field;
        if (isset($requestAll['salon_field']) && empty($requestAll['salon_field'])) {
            $salon_field = false;
        } else if ($request->salon_field == '*') {
            $salon_field = [$request->salon_field];
        } else if ($request->salon_field) {
            $salon_field = array_merge(['id'], explode(',', $request->salon_field));
        }

        $supplier_field = $this->supplier_field;
        if (isset($requestAll['supplier_field']) && empty($requestAll['supplier_field'])) {
            $supplier_field = false;
        } else if ($request->supplier_field == '*') {
            $supplier_field = [$request->supplier_field];
        } else if ($request->supplier_field) {
            $supplier_field = array_merge(['id'], explode(',', $request->supplier_field));
        }
        $withArray = [];
        if ($salon_field) {
            $withArray[] = 'salon:' . implode(',', $salon_field);
        }
        if ($supplier_field) {
            $withArray[] = 'supplier:' . implode(',', $supplier_field);
        }

        $pagination = $request->pagination ? $request->pagination : false;
        $limit = $request->limit ? $request->limit : config('params.apiPerPage');

        $where = ['is_active' => '1'];
        $where = ($id) ? array_merge($where, ['id' => $id]) : $where;

        if ($pagination == true) {
            $model = Products::with($withArray)->select($field)->where($where)->simplePaginate($limit);
        } else {
            $model = Products::with($withArray)->select($field)->where($where)->get();
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