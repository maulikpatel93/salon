<?php

namespace App\Http\Controllers\Admin;

use App\Exceptions\UnsecureException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ChangePasswordRequest;
use App\Http\Requests\Admin\UserAccessRequest;
use App\Http\Requests\Admin\UserRequest;
use App\Models\Permissions;
use App\Models\Salons;
use App\Models\UserAccess;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Itstructure\GridView\DataProviders\EloquentDataProvider;

class UsersController extends Controller
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
        $sort = $request->sort;

        if (auth() && auth()->user() && auth()->user()->role_id != 1) {
            if ($sort) {
                $dataProvider = new EloquentDataProvider(Users::query()->where('role_id', '!=', 5)->where('role_id', '!=', 1));
            } else {
                $dataProvider = new EloquentDataProvider(Users::query()->where('role_id', '!=', 5)->where('role_id', '!=', 1)->orderBy('id', 'desc'));
            }
        } else {
            if ($sort) {
                $dataProvider = new EloquentDataProvider(Users::query()->where('role_id', '!=', 5));
            } else {
                $dataProvider = new EloquentDataProvider(Users::query()->where('role_id', '!=', 5)->orderBy('id', 'desc'));
            }
        }
        return view('admin.users.index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function create()
    {
        $model = new Users();
        return view('admin.users.create', ['model' => $model]);
    }

    public function store(UserRequest $request)
    {
        $requestAll = $request->all();
        $email_username = explode('@', $requestAll['email']);

        $requestAll['salon_id'] = (isset($requestAll['salon_id'])) ? $requestAll['salon_id'] : '';
        $requestAll['email_verified'] = '1';
        $requestAll['email_verified_at'] = currentDateTime();
        $requestAll['phone_number_verified'] = '0';
        $requestAll['password'] = Hash::make($requestAll['password']);
        $requestAll['is_active_at'] = currentDateTime();
        $token = Str::random(config('params.auth_key_character'));
        $requestAll['auth_key'] = hash('sha256', $token);
        $requestAll['username'] = $email_username ? $email_username[0] : $requestAll['first_name'] . '_' . $requestAll['last_name'] . '_' . random_int(101, 999);
        $model = new Users();
        if ($request->ajax() && $model->create($requestAll)) {
            $responseData['status'] = 200;
            $responseData['message'] = 'Success';
            $responseData['url'] = false;
            return response()->json($responseData);
        }
        return redirect()->route('admin.users.index');
    }

    public function edit($id)
    {
        $model = $this->findModel(decode($id));
        return view('admin.users.update', ['model' => $model]);
    }

    public function update(UserRequest $request, $id)
    {
        // $validated = $request->validated();
        $requestAll = $request->all();
        $requestAll['controller'] = $requestAll['controller'] ?? '';
        $requestAll['action'] = $requestAll['action'] ?? '';
        $model = $this->findModel(decode($id));
        if ($request->ajax() && $model->update($requestAll)) {
            $responseData['status'] = 200;
            $responseData['message'] = 'Success';
            $responseData['url'] = false;
            return response()->json($responseData);
        }
        return redirect()->route('admin.users.index');
    }

    public function changepassword($id)
    {
        $model = $this->findModel(decode($id));
        return view('admin.users.changepassword', ['model' => $model]);
    }

    public function changepasswordupdate(ChangePasswordRequest $request, $id)
    {
        // $validated = $request->validated();
        $requestAll = $request->all();
        $requestAll['password'] = Hash::make($requestAll['password']);
        $model = $this->findModel(decode($id));
        if ($request->ajax() && $model->update($requestAll)) {
            $responseData['status'] = 200;
            $responseData['message'] = 'Success';
            $responseData['url'] = false;
            return response()->json($responseData);
        }
        return redirect()->route('admin.users.index');
    }

    public function view(Request $request, $id)
    {
        $model = $this->findModel(decode($id));
        return view('admin.users.view', ['model' => $model]);
    }

    public function delete(Request $request, $id)
    {
        Users::where('id', decode($id))->delete();
        return redirect()->route('admin.users.index');
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
                            Users::where('id', $id)->delete();
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
        $permissionmodel = DB::select("SELECT CASE WHEN ROW_NUMBER() OVER(PARTITION BY module_id ORDER BY id) = 1 THEN (select title as module_name from modules WHERE id = module_id) ELSE NULL END AS 'module_name_unique' , id , module_id , name , title , controller , action FROM permissions ORDER BY module_id, controller, id;");
        config()->set('database.connections.mysql.strict', true);
        DB::reconnect();
        $model = new UserAccess();
        $model->role_id = $id;
        return view('admin.users.access', [
            'model' => $model,
            'rolemodel' => $rolemodel,
            'permissionmodel' => $permissionmodel,
        ]);
    }

    public function accessupdate(UserAccessRequest $request, $id)
    {
        $id = decode($id);
        $requestAll = $request->all();
        $permission_id = isset($requestAll['permission_id']) ? $requestAll['permission_id'] : [];
        $access = isset($requestAll['access']) ? $requestAll['access'] : [];
        if ($permission_id) {
            foreach ($permission_id as $key => $value) {
                $checkPermissionId = Permissions::where(['id' => $value])->count();
                if ($checkPermissionId) {
                    $model = UserAccess::where(['role_id' => $id, 'permission_id' => $value])->first();
                    if (empty($model->count())) {
                        $model = new UserAccess();
                    }
                    $model->role_id = $id;
                    $model->permission_id = $value;
                    $model->access = isset($access[$key]) ? $access[$key] : '0';
                    $model->save();
                }
            }
        }
        return redirect()->route('admin.users.index');
    }
    protected function findModel($id)
    {
        if (($model = Users::find($id)) !== null) {
            return $model;
        }
        throw new UnsecureException('The requested page does not exist.');
    }

    public function salons(Request $request)
    {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {

            $type = empty($_POST['depdrop_parents'][0]) ? null : $_POST['depdrop_parents'][0];
            // $parent_menu_id = empty($_POST['depdrop_parents'][1]) ? null : $_POST['depdrop_parents'][1];
            if ($type == 4) {
                $role_id = isset($_REQUEST['role_id']) ? $_REQUEST['role_id'] : '';
                $salon_id = isset($_REQUEST['salon_id']) ? $_REQUEST['salon_id'] : '';
                $list = [];
                $list = Salons::where('is_active', '1')->where('business_name', '!=', '')->get()->pluck('business_name', 'id')->toArray();
                $selected = null;
                if ($type != null && count($list) > 0) {
                    $selected = $salon_id;
                    foreach ($list as $key => $value) {
                        $out[] = ['id' => $key, 'name' => $value];
                    }
                    // Shows how you can preselect a value
                    return response()->json(['output' => $out, 'selected' => $selected]);
                }
            }
        }
        return response()->json(['output' => '', 'selected' => '']);
    }
}