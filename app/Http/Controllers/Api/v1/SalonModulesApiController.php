<?php

namespace App\Http\Controllers\Api\v1;

use App\Exceptions\UnsecureException;
use App\Http\Controllers\Controller;
use App\Models\Api\SalonAccess;
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
        $type = $request->type;

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

        $where = [];
        if ($type) {
            $where['type'] = $type;
        }
        $where = ($id) ? array_merge($where, ['id' => $id]) : $where;

        $whereLike = $request->q ? explode(' ', $request->q) : '';

        $orderby = 'id asc';

        if ($id) {
            if ($request->result == 'result_array') {
                $model = SalonModules::with($withArray)->select($field)->where($where)->get();
            } else {
                $model = SalonModules::with($withArray)->select($field)->where($where)->first();
            }
            $successData = $model->toArray();
            return response()->json($successData, $this->successStatus);
        } else {
            if ($request->salon_permission_field) {
                $model = SalonModules::with($withArray)->has('salonpermission')->select($field)->where($where)->orderByRaw($orderby)->get();
            } else {
                $model = SalonModules::with($withArray)->select($field)->where($where)->orderByRaw($orderby)->get();
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

        return response()->json(['message' => __('messages.success')], $this->successStatus);
    }

    public function accessupdate(Request $request)
    {
        $requestAll = $request->all();
        $salon_permission_id = $request->salon_permission_id ? explode(",", $request->salon_permission_id) : "";
        $salonmoduleaccess = $request->salonmoduleaccess ? explode(",", $request->salonmoduleaccess) : "";
        $salon_id = $request->salon_id;
        $role_id = $request->role_id;
        if ($salon_permission_id) {
            foreach ($salon_permission_id as $key => $value) {
                $SalonAccess = SalonAccess::where(['salon_id' => $salon_id, 'role_id' => $role_id, 'salon_permission_id' => $value])->first();
                if ($SalonAccess) {
                    $SalonAccess->salon_id = $salon_id;
                    $SalonAccess->role_id = $role_id;
                    $SalonAccess->salon_permission_id = $value;
                    $SalonAccess->access = (isset($salonmoduleaccess[$key]) && $salonmoduleaccess[$key]) ? '1' : '0';
                    $SalonAccess->save();
                } else {
                    $SalonAccess = new SalonAccess;
                    $SalonAccess->salon_id = $salon_id;
                    $SalonAccess->role_id = $role_id;
                    $SalonAccess->salon_permission_id = $value;
                    $SalonAccess->access = (isset($salonmoduleaccess[$key]) && $salonmoduleaccess[$key]) ? '1' : '0';
                    $SalonAccess->save();
                }
            }
        }
        return response()->json(['message' => __('messages.success')], $this->successStatus);

    }
}
