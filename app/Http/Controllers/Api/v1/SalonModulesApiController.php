<?php

namespace App\Http\Controllers\Api\v1;

use App\Exceptions\UnsecureException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\SalonModulesRequest;
use App\Models\Api\SalonModules;
use Illuminate\Http\Request;

class SalonModulesApiController extends Controller
{
    protected $successStatus = 200;
    protected $errorStatus = 422;
    protected $unauthorizedStatus = 401;

    protected $field = [
        'id',
        'title',
        'controller',
        'action',
        'icon',
        'functionality',
        'type',
        'parent_menu_id',
        'parent_submenu_id',
    ];
    protected $salon_permission_field = [
        'id',
        'salon_module_id',
        'panel',
        'title',
        'name',
        'controller',
        'action',
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

    public function store(SalonModulesRequest $request)
    {
        $requestAll = $request->all();
        $model = new SalonModules;
        $model->fill($requestAll);
        $model->save();
        return $this->returnResponse($request, $model->id);
    }

    public function update(SalonModulesRequest $request, $id)
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
        SalonModules::where('id', $id)->delete();
        return response()->json(['id' => $id, 'message' => __('message.success')], $this->successStatus);
    }

    protected function findModel($id)
    {
        if (($model = SalonModules::find($id)) !== null) {
            return $model;
        }
        throw new UnsecureException('The requested page does not exist.');
    }

    public function returnResponse($request, $id, $data = [])
    {
        $requestAll = $request->all();
        $field = ($request->field) ? array_merge(['id'], explode(',', $request->field)) : $this->field;

        $salon_permission_field = $this->salon_permission_field;
        if (isset($requestAll['salon_permission_field']) && empty($requestAll['salon_permission_field'])) {
            $salon_permission_field = false;
        } else if ($request->salon_permission_field == '*') {
            $salon_permission_field = [$request->salon_permission_field];
        } else if ($request->salon_permission_field) {
            $salon_permission_field = array_merge(['id', 'salon_module_id'], explode(',', $request->salon_permission_field));
        }

        $withArray = [];
        if ($salon_permission_field) {
            $withArray[] = 'salonpermission:' . implode(',', $salon_permission_field);
        }

        $pagination = $request->pagination ? $request->pagination : false;
        $limit = $request->limit ? $request->limit : config('params.apiPerPage');

        $where = ['type' => 'Menu'];
        $where = ($id) ? array_merge($where, ['id' => $id]) : $where;

        $whereLike = $request->q ? explode(' ', $request->q) : '';

        $orderby = 'id desc';

        if ($id) {
            if ($request->result == 'result_array') {
                $model = SalonModules::with($withArray)->select($field)->where($where)->get();
            } else {
                $model = SalonModules::with($withArray)->select($field)->where($where)->first();
            }
            $successData = $model->toArray();
            return response()->json($successData, $this->successStatus);
        } else {
            if ($pagination == true) {
                if ($whereLike) {
                    $model = Staff::with($withArray)->select($field)->where(function ($query) use ($whereLike) {
                        if ($whereLike) {
                            $query->where('name', "like", "%" . $whereLike[0] . "%");
                        }
                    })->where($where)->orderByRaw($orderby)->paginate($limit);
                } else {
                    $model = SalonModules::with($withArray)->select($field)->where($where)->orderByRaw($orderby)->paginate($limit);
                }
                // $model->data = $model;
            } else {
                if ($whereLike) {
                    $model = SalonModules::with($withArray)->select($field)->where(function ($query) use ($whereLike) {
                        if ($whereLike) {
                            $query->where('name', "like", "%" . $whereLike[0] . "%");
                        }
                    })->where($where)->orderByRaw($orderby)->get();
                } else {
                    $model = SalonModules::with($withArray)->select($field)->where($where)->orderByRaw($orderby)->get();
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