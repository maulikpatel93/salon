<?php

namespace App\Http\Controllers\Admin;

use App\Exceptions\UnsecureException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SalonPermissionsRequest;
use App\Models\SalonModules;
use App\Models\SalonPermissions;
use Illuminate\Http\Request;
use Itstructure\GridView\DataProviders\EloquentDataProvider;

class SalonPermissionsController extends Controller
{
    const ACTIVE = 'Active';
    const INACTIVE = 'Inactive';
    const DELETE = 'Delete';
    const ACTIVE_INT = '1';
    const INACTIVE_INT = '0';

    public function __construct()
    {
        $this->middleware('auth:admin');
        parent::__construct();
    }

    public function index(Request $request)
    {
        $sort = $request->sort;
        if ($sort) {
            $dataProvider = new EloquentDataProvider(SalonPermissions::query());
        } else {
            $dataProvider = new EloquentDataProvider(SalonPermissions::query()->orderBy('id', 'desc'));
        }
        return view('admin.salonpermissions.index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function create()
    {
        $model = new SalonPermissions();
        $modules = $this->modulefindModel();
        return view('admin.salonpermissions.create', ['model' => $model, 'modules' => $modules]);
    }

    public function store(SalonPermissionsRequest $request)
    {
        $inputVal = $request->all();

        if ($request->ajax()) {
            $title = $inputVal['title'];
            $name = $inputVal['name'];
            $controller = $inputVal['controller'];
            $action = $inputVal['action'];
            $panel = $inputVal['panel'];
            if ($name) {
                for ($i = 0; $i < count($name); $i++) {
                    $model = SalonPermissions::where(['name' => $name[$i], 'salon_module_id' => $inputVal['salon_module_id']])->count();
                    if (empty($model)) {
                        $model = new SalonPermissions();
                        $model->salon_module_id = $inputVal['salon_module_id'];
                        $model->panel = $panel;
                        $model->title = $title[$i];
                        $model->name = $name[$i];
                        $model->controller = $controller[$i];
                        $model->action = $action[$i];
                        $model->is_active_at = currentDateTime();
                        $model->save();
                    }
                }
            }
            $responseData['status'] = 200;
            $responseData['message'] = 'Success';
            $responseData['url'] = false;
            return response()->json($responseData);
        }
        return redirect()->route('admin.salonpermissions.index');
    }

    public function edit($id)
    {
        $model = $this->findModel(decode($id));
        $modules = $this->modulefindModel();
        return view('admin.salonpermissions.update', ['model' => $model, 'modules' => $modules]);
    }

    public function update(SalonPermissionsRequest $request, $id)
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
        return redirect()->route('admin.salonpermissions.index');
    }

    public function view(Request $request, $id)
    {
        $model = $this->findModel(decode($id));
        return view('admin.salonpermissions.view', ['model' => $model]);
    }

    public function delete(Request $request, $id)
    {
        SalonPermissions::where('id', decode($id))->delete();
        return redirect()->route('admin.salonpermissions.index');
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
                            SalonPermissions::where('id', $id)->delete();
                        }
                    }
                }
                return true;
            } else {
                return false;
            }
        }
    }

    protected function findModel($id)
    {
        if (($model = SalonPermissions::find($id)) !== null) {
            return $model;
        }

        throw new UnsecureException('The requested page does not exist.');
    }

    protected function modulefindModel()
    {
        return SalonModules::where(['is_active' => '1'])->where('functionality', '!=', 'none')->where('title', '!=', '')->orderBy('title', 'ASC')->get()->pluck('title', 'id')->toArray();
    }

    protected function addPjaxHeaders(Request $request)
    {
        $request->headers->set('X-PJAX', true);
        $request->headers->set('X-PJAX-Container', '#pjax-container');
        return $request;
    }
}