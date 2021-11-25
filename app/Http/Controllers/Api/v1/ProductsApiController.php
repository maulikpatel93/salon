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

    public function __construct()
    {
        $this->middleware('auth:api');
        parent::__construct();
    }

    public function view(Request $request)
    {
        $requestAll = $request->all();
        $id = $request->id;
        $limit = $request->limit ? $request->limit : config('params.apiPerPage');
        $page = $request->page && $request->page > 0 ? $request->page : 1;
        $skip = ($page - 1) * $limit;

        $where = ['is_active' => '1'];
        $where = ($id) ? array_merge($where, ['id' => $id]) : $where;
        $model = Products::select($this->selectFieldProduct)->where($where)->simplePaginate($limit);
        $successData = $model->toArray();
        if ($successData) {
            return response()->json(['status' => $this->successStatus, 'message' => 'success', 'data' => $successData]);
        }
        return response()->json(['status' => $this->errorStatus, 'message' => 'success']);
    }

    public function store(ProductRequest $request)
    {
        $requestAll = $request->all();
        $model = new Products;
        $model->fill($requestAll);
        $file = $request->file('logo');
        if ($file) {
            $fileName = time() . '_' . str_replace(' ', '_', $file->getClientOriginalName());
            $filePath = $file->storeAs('products', $fileName, 'public');
            $model->logo = $fileName;
        }
        $model->description = isset($requestAll['description']) ? $requestAll['description'] : '';
        $model->save();
        $successData = [];
        $successData[] = $model->only($this->selectFieldProduct);
        return response()->json(['status' => $this->successStatus, 'message' => 'success', 'data' => $successData]);
    }

    public function update(ProductRequest $request, $id)
    {
        $requestAll = $request->all();
        $model = $this->findModel($id);
        $model->fill($requestAll);
        $file = $request->file('logo');
        if ($file) {
            Storage::delete('/public/products/' . $model->logo);
            $fileName = time() . '_' . str_replace(' ', '_', $file->getClientOriginalName());
            $filePath = $file->storeAs('products', $fileName, 'public');
            $model->logo = $fileName;
        }
        $model->description = isset($requestAll['description']) ? $requestAll['description'] : $model->description;
        $model->save();
        $successData = [];
        $successData[] = $model->only($this->selectFieldProduct);
        return response()->json(['status' => $this->successStatus, 'message' => 'success', 'data' => $successData]);
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
}
