<?php

namespace App\Http\Controllers\Api\v1;

use App\Exceptions\UnsecureException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CategoryRequest;
use App\Models\Api\Categories;
use Illuminate\Http\Request;

class CategoriesApiController extends Controller
{
    protected $successStatus = 200;
    protected $errorStatus = 403;

    protected $selectFieldCategory = [
        'id',
        'salon_id',
        'name',
    ];

    protected $selectFieldSalon = [
        'id',
        'business_name',
        'owner_name',
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

    public function store(CategoryRequest $request)
    {
        $requestAll = $request->all();
        $requestAll['is_active_at'] = currentDateTime();
        $model = new Categories;
        $model->fill($requestAll);
        $model->description = isset($requestAll['description']) ? $requestAll['description'] : '';
        $model->save();
        return $this->returnResponse($model->id);
    }

    public function update(CategoryRequest $request, $id)
    {
        $requestAll = $request->all();
        $model = $this->findModel($id);
        $model->fill($requestAll);
        $model->description = isset($requestAll['description']) ? $requestAll['description'] : $model->description;
        $model->save();
        return $this->returnResponse($model->id);
    }

    public function delete(Request $request, $id)
    {
        $requestAll = $request->all();
        Categories::where('id', $id)->delete();
        return response()->json(['status' => $this->successStatus, 'message' => 'success']);
    }

    protected function findModel($id)
    {
        if (($model = Categories::find($id)) !== null) {
            return $model;
        }
        throw new UnsecureException('The requested page does not exist.');
    }

    public function returnResponse($id, $pagination = [])
    {
        // $limit = $request->limit ? $request->limit : config('params.apiPerPage');
        // $page = $request->page && $request->page > 0 ? $request->page : 1;
        // $skip = ($page - 1) * $limit;
        $selectField = (isset($data['field']) && $data['field']) ? $data['field'] : $this->selectFieldCategory;
        $pagination = (isset($data['pagination']) && $data['pagination']) ? $data['pagination'] : false;
        $limit = (isset($data['limit']) && $data['limit']) ? $data['limit'] : config('params.apiPerPage');

        $where = ['is_active' => '1'];
        $where = ($id) ? array_merge($where, ['id' => $id]) : $where;

        if ($pagination == true) {
            $model = Categories::with('salon:' . implode(',', $this->selectFieldSalon))->select($selectField)->where($where)->simplePaginate($limit);
        } else {
            $model = Categories::with('salon:' . implode(',', $this->selectFieldSalon))->select($selectField)->where($where)->get();
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
