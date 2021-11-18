<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleAccessRequest;
use App\Http\Requests\RoleRequest;
use App\Models\Permissions;
use App\Models\RoleAccess;
use App\Models\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Itstructure\GridView\DataProviders\EloquentDataProvider;

class RolesController extends Controller
{
    const ACTIVE = 'Active';
    const INACTIVE = 'Inactive';
    const ACTIVE_INT = '1';
    const INACTIVE_INT = '0';
    const DELETE = 'Delete';

    public function __construct()
    {
        $this->middleware('auth:admin');
        parent::__construct();
    }

    public function index(Request $request)
    {
        // global $user;
        $dataProvider = new EloquentDataProvider(Roles::query()->orderBy('id', 'desc'));
        return view('admin.roles.index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function create()
    {
        $model = new Roles();
        return view('admin.roles.create', ['model' => $model]);
    }

    public function store(RoleRequest $request)
    {
        $inputVal = $request->all();
        $inputVal['controller'] = $inputVal['controller'] ?? '';
        $inputVal['action'] = $inputVal['action'] ?? '';

        $model = new Roles();
        if ($request->ajax() && $model->create($inputVal)) {
            $responseData['status'] = 200;
            $responseData['message'] = 'Success';
            $responseData['url'] = false;
            return response()->json($responseData);
        }
        return redirect()->route('admin.roles.index');
    }

    public function edit($id)
    {
        $model = $this->findModel(decode($id));
        return view('admin.roles.update', ['model' => $model]);
    }

    public function update(RoleRequest $request, $id)
    {
        // $validated = $request->validated();
        $inputVal = $request->all();
        $inputVal['controller'] = $inputVal['controller'] ?? '';
        $inputVal['action'] = $inputVal['action'] ?? '';
        $model = $this->findModel(decode($id));
        if ($request->ajax() && $model->update($inputVal)) {
            $responseData['status'] = 200;
            $responseData['message'] = 'Success';
            $responseData['url'] = false;
            return response()->json($responseData);
        }
        return redirect()->route('admin.roles.index');
    }

    public function view(Request $request, $id)
    {
        return view('admin.roles.view');
    }

    public function delete(Request $request, $id)
    {
        Roles::where('id', decode($id))->delete();
        return redirect()->route('admin.roles.index');
    }

    public function isactive(Request $request, $id)
    {
        if ($request->ajax()) {
            $model = $this->findModel(decode($id));
            $model->is_active = ($model->is_active == self::ACTIVE_INT) ? self::INACTIVE_INT : self::ACTIVE_INT;
            $model->is_active_at = currentDateTime();
            return $model->save();
        }
    }

    public function applystatus(Request $request)
    {
        if ($request->ajax()) {
            $inputall = $request->all();
            if (isset($inputall['applyoption'])) {
                if ($inputall['applyoption'] == self::ACTIVE) {
                    // if(empty(Yii::$app->BackFunctions->checkaccess('statusupdate', Yii::$app->controller->id))){
                    //     throw new \yii\web\HttpException('403',"You don't have permission to access on this role.");
                    // }
                    if (isset($inputall['keylist']) && $inputall['keylist']) {
                        foreach ($inputall['keylist'] as $id) {
                            $model = $this->findModel($id);
                            $model->is_active = '1';
                            $model->is_active_at = currentDateTime();
                            $model->save();
                        }
                    }
                } elseif ($inputall['applyoption'] == self::INACTIVE) {
                    // if(empty(Yii::$app->BackFunctions->checkaccess('statusupdate', Yii::$app->controller->id))){
                    //     throw new \yii\web\HttpException('403',"You don't have permission to access on this role.");
                    // }
                    if (isset($inputall['keylist']) && $inputall['keylist']) {
                        foreach ($inputall['keylist'] as $id) {
                            $model = $this->findModel($id);
                            $model->is_active = '0';
                            $model->is_active_at = currentDateTime();
                            $model->save();
                        }
                    }
                } elseif ($inputall['applyoption'] == self::DELETE) {
                    // if(empty(Yii::$app->BackFunctions->checkaccess('delete', Yii::$app->controller->id))){
                    //     throw new \yii\web\HttpException('403',"You don't have permission to access on this role.");
                    // }

                    if (isset($inputall['keylist']) && $inputall['keylist']) {
                        foreach ($inputall['keylist'] as $id) {
                            Roles::where('id', $id)->delete();
                        }
                    }
                }
                return true;
            } else {
                return false;
            }
        }
    }

    public function access(Request $request, $id)
    {
        $rolemodel = $this->findModel(decode($id));
        config()->set('database.connections.mysql.strict', false);
        DB::reconnect(); //important as the existing connection if any would be in strict mode
        $permissionmodel = DB::select("SELECT CASE WHEN ROW_NUMBER() OVER(PARTITION BY module_id ORDER BY action) = 1 THEN (select title as module_name from modules WHERE id = module_id) ELSE NULL END AS 'module_name_unique' , id , module_id , name , title , controller , action FROM permissions ORDER BY module_id,controller, action;");
        config()->set('database.connections.mysql.strict', true);
        DB::reconnect();
        $model = new RoleAccess();
        $model->role_id = $id;
        // if ($model->load(Yii::$app->request->post())) {
        //     if ($model->permission_id) {
        //         foreach ($model->permission_id as $key => $value) {
        //             $checkPermissionId = Permission::find()->where(['id' => $value])->count();
        //             if ($checkPermissionId) {
        //                 $modelAll = RoleAccess::find()->where(['role_id' => $id, 'permission_id' => $value])->one();
        //                 if (empty($modelAll)) {
        //                     $modelAll = new RoleAccess();
        //                     $modelAll->role_id = $id;
        //                 }
        //                 $modelAll->permission_id = $value;
        //                 $modelAll->access = $model->access[$key];
        //                 $modelAll->created_at = date("Y-m-d H:i:s");
        //                 $modelAll->save();
        //             }
        //         }
        //     }
        //     Yii::$app->session->setFlash('success', Yii::$app->BackFunctions->message('update'));
        //     return $this->redirect(['access', 'id' => $model->role_id]);
        // }
        return view('admin.roles.access', [
            'model' => $model,
            'rolemodel' => $rolemodel,
            'permissionmodel' => $permissionmodel,
        ]);
    }

    public function accessupdate(RoleAccessRequest $request, $id)
    {
        $inputVal = $request->all();
        $permission_id = isset($inputVal['permission_id']) ? $inputVal['permission_id'] : [];
        $access = isset($inputVal['access']) ? $inputVal['access'] : [];
        if ($permission_id) {
            foreach ($permission_id as $key => $value) {
                $checkPermissionId = Permissions::where(['id' => $value])->count();
                if ($checkPermissionId) {
                    $model = RoleAccess::where(['role_id' => $id, 'permission_id' => $value])->get();
                    if (empty($model->count())) {
                        $model = new RoleAccess();
                    }
                    $model->role_id = decode($id);
                    $model->permission_id = $value;
                    $model->access = isset($access[$key]) ? $access[$key] : 0;
                    $model->save();
                }
            }
        }
        return redirect()->route('admin.roles.index');
    }
    protected function findModel($id)
    {
        if (($model = Roles::find($id)) !== null) {
            return $model;
        }
        throw new Exception('The requested page does not exist.');
    }
}
