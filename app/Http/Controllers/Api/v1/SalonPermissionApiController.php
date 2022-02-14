<?php

namespace App\Http\Controllers\Api\v1;

use App\Exceptions\UnsecureException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\SalonPermissionRequest;
use App\Models\Api\SalonPermission;
use Illuminate\Http\Request;

class SalonPermissionApiController extends Controller
{
    protected $successStatus = 200;
    protected $errorStatus = 422;
    protected $unauthorizedStatus = 401;

    protected $field = [
        'id',
        'panel',
        'salon_module_id',
        'title',
        'name',
        'controller',
        'action',
    ];

    protected $salon_module_field = [
        'id',
        'panel',
        'title',
        'controller',
        'action',
        'icon',
        'functionality',
        'type',
        'parent_menu_id',
        'parent_submenu_id',
        'menu_position',
        'submenu_position',
        'is_hiddden',
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

    public function store(SalonPermissionRequest $request)
    {
        $requestAll = $request->all();
        $model = new SalonPermission;
        $model->fill($requestAll);
        $model->save();
        return $this->returnResponse($request, $model->id);
    }

    public function update(SalonPermissionRequest $request, $id)
    {
        $requestAll = $request->all();
        $model = $this->findModel($id);
        $model->fill($requestAll);
        $model->save();
        return $this->returnResponse($request, $model->id);
    }

    public function delete(Request $request, $id)
    {
        $requestAll = $request->all();
        SalonPermission::where('id', $id)->delete();
        return response()->json(['id' => $id, 'message' => __('message.success')], $this->successStatus);
    }

    protected function findModel($id)
    {
        if (($model = SalonPermission::find($id)) !== null) {
            return $model;
        }
        throw new UnsecureException('The requested page does not exist.');
    }

    public function returnResponse($request, $id, $data = [])
    {
        $requestAll = $request->all();
        $field = ($request->field) ? array_merge(['id'], explode(',', $request->field)) : $this->field;

        $salon_module_field = $this->salon_module_field;
        if (isset($requestAll['salon_module_field']) && empty($requestAll['salon_module_field'])) {
            $salon_module_field = false;
        } else if ($request->salon_module_field == '*') {
            $salon_module_field = [$request->salon_module_field];
        } else if ($request->salon_module_field) {
            $salon_module_field = array_merge(['id'], explode(',', $request->salon_module_field));
        }

        if ($salon_module_field) {
            $withArray[] = 'salonmodule:' . implode(',', $salon_module_field);
        }

        $pagination = $request->pagination ? $request->pagination : false;
        $limit = $request->limit ? $request->limit : config('params.apiPerPage');

        $where = [];
        $where = ($id) ? array_merge($where, ['id' => $id]) : $where;

        $whereLike = $request->q ? explode(' ', $request->q) : '';

        $orderby = 'id desc';

        if ($id) {
            if ($request->result == 'result_array') {
                $model = SalonPermission::with($withArray)->select($field)->where($where)->get();
            } else {
                $model = SalonPermission::with($withArray)->select($field)->where($where)->first();
            }
            $successData = $model->toArray();
            return response()->json($successData, $this->successStatus);
        } else {
            if ($pagination == true) {
                if ($whereLike) {
                    $model = SalonPermission::with($withArray)->select($field)->where(function ($query) use ($whereLike) {
                        if ($whereLike) {
                            $query->where('name', "like", "%" . $whereLike[0] . "%");
                        }
                    })->where($where)->orderByRaw($orderby)->paginate($limit);
                } else {
                    $model = SalonPermission::with($withArray)->select($field)->where($where)->orderByRaw($orderby)->paginate($limit);
                }
                // $model->data = $model;
            } else {
                if ($whereLike) {
                    $model = SalonPermission::with($withArray)->select($field)->where(function ($query) use ($whereLike) {
                        if ($whereLike) {
                            $query->where('name', "like", "%" . $whereLike[0] . "%");
                        }
                    })->where($where)->orderByRaw($orderby)->get();
                } else {
                    $model = SalonPermission::with($withArray)->select($field)->where($where)->orderByRaw($orderby)->get();
                }
            }
            if ($model->count()) {
                $successData = $model->toArray();
                if ($successData) {
                    if ($pagination == true) {
                        // return response()->json(array_merge(['status' => $this->successStatus, 'message' => 'Success'], $successData));
                    }
                    return response()->json($successData, $this->successStatus);
                }
            }
        }

        return response()->json(['message' => __('messages.failed')], $this->errorStatus);
    }
}