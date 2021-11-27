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
    protected $errorStatus = 403;

    protected $selectFieldProduct = [
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

    protected $selectFieldSalon = [
        'id',
        'business_name',
        'owner_name',
    ];

    protected $selectFieldSupplier = [
        'id',
        'name',
        'first_name',
        'last_name',
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
        $field = ($request->field) ? array_merge(['id'], explode(',', $request->field)) : [];
        return $this->returnResponse($id, ['field' => $field, 'pagination' => $request->pagination, 'limit' => $request->limit]);
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
        return $this->returnResponse($model->id);
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
        return $this->returnResponse($model->id);
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

    public function returnResponse($id, $pagination = [])
    {
        // $limit = $request->limit ? $request->limit : config('params.apiPerPage');
        // $page = $request->page && $request->page > 0 ? $request->page : 1;
        // $skip = ($page - 1) * $limit;
        $selectField = (isset($data['field']) && $data['field']) ? $data['field'] : $this->selectFieldProduct;
        $pagination = (isset($data['pagination']) && $data['pagination']) ? $pagination['pagination'] : false;
        $limit = (isset($data['limit']) && $data['limit']) ? $data['limit'] : config('params.apiPerPage');

        $where = ['is_active' => '1'];
        $where = ($id) ? array_merge($where, ['id' => $id]) : $where;

        if ($pagination == true) {
            $model = Products::with('salon:' . implode(',', $this->selectFieldSalon), 'supplier:' . implode(',', $this->selectFieldSupplier))->select($selectField)->where($where)->simplePaginate($limit);
        } else {
            $model = Products::with('salon:' . implode(',', $this->selectFieldSalon), 'supplier:' . implode(',', $this->selectFieldSupplier))->select($selectField)->where($where)->get();
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
