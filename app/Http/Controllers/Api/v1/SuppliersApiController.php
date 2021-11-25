<?php

namespace App\Http\Controllers\Api\v1;

use App\Exceptions\UnsecureException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\SupplierRequest;
use App\Models\Api\Suppliers;
use Illuminate\Http\Request;

class SuppliersApiController extends Controller
{
    protected $successStatus = 200;
    protected $errorStatus = 403;

    protected $selectFieldSupplier = [
        'id',
        'name',
        'first_name',
        'last_name',
        'logo',
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
        $model = Suppliers::select($this->selectFieldSupplier)->where($where)->simplePaginate($limit);
        $successData = $model->toArray();
        if ($successData) {
            return response()->json(['status' => $this->successStatus, 'message' => 'success', 'data' => $successData]);
        }
        return response()->json(['status' => $this->errorStatus, 'message' => 'success']);
    }

    public function store(SupplierRequest $request)
    {
        $requestAll = $request->all();
        $model = new Suppliers;
        $model->fill($requestAll);
        $file = $request->file('logo');
        if ($file) {
            $fileName = time() . '_' . str_replace(' ', '_', $file->getClientOriginalName());
            $filePath = $file->storeAs('supplier', $fileName, 'public');
            $model->logo = $fileName;
        }
        $model->description = isset($requestAll['description']) ? $requestAll['description'] : '';
        $model->save();
        $successData = [];
        $successData[] = $model->only($this->selectFieldSupplier);
        return response()->json(['status' => $this->successStatus, 'message' => 'success', 'data' => $successData]);
    }

    public function update(SupplierRequest $request, $id)
    {
        $requestAll = $request->all();
        $model = $this->findModel($id);
        $model->fill($requestAll);
        $file = $request->file('logo');
        if ($file) {
            Storage::delete('/public/supplier/' . $model->logo);
            $fileName = time() . '_' . str_replace(' ', '_', $file->getClientOriginalName());
            $filePath = $file->storeAs('supplier', $fileName, 'public');
            $model->logo = $fileName;
        }
        $model->description = isset($requestAll['description']) ? $requestAll['description'] : $model->description;
        $model->save();
        $successData = [];
        $successData[] = $model->only($this->selectFieldSupplier);
        return response()->json(['status' => $this->successStatus, 'message' => 'success', 'data' => $successData]);
    }

    public function delete(Request $request, $id)
    {
        $requestAll = $request->all();
        Suppliers::where('id', $id)->delete();
        return response()->json(['status' => $this->successStatus, 'message' => 'success']);
    }

    protected function findModel($id)
    {
        if (($model = Suppliers::find($id)) !== null) {
            return $model;
        }
        throw new UnsecureException('The requested page does not exist.');
    }
}
