<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionsRequest;
use App\Models\Modules;
use App\Models\Permissions;
use Illuminate\Http\Request;
use Itstructure\GridView\DataProviders\EloquentDataProvider;

class PermissionsController extends Controller
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
        // global $user;
        $dataProvider = new EloquentDataProvider(Permissions::query());
        return view('admin.permissions.index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function create()
    {
        $model = new permissions();
        $modules = $this->modulefindModel();
        return view('admin.permissions.create', ['model' => $model, 'modules' => $modules]);
    }

    public function store(PermissionsRequest $request)
    {
        $inputVal = $request->all();
        $inputVal['controller'] = $inputVal['controller'] ?? '';
        $inputVal['action'] = $inputVal['action'] ?? '';

        $model = new permissions();
        if ($request->ajax() && $model->create($inputVal)) {
            $responseData['status'] = 200;
            $responseData['message'] = 'Success';
            $responseData['url'] = false;
            return response()->json($responseData);
        }
        return redirect()->route('admin.permissions.index');
    }

    public function edit($id)
    {
        $model = $this->findModel(decode($id));
        $modules = $this->modulefindModel();
        return view('admin.permissions.update', ['model' => $model, 'modules' => $modules]);
    }

    public function update(PermissionsRequest $request, $id)
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
        return redirect()->route('admin.permissions.index');
    }

    public function view(Request $request, $id)
    {
        return view('admin.permissions.view');
    }

    public function delete(Request $request, $id)
    {
        Permissions::where('id', decode($id))->delete();
        return redirect()->route('admin.permissions.index');
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
                            Permissions::where('id', $id)->delete();
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
        if (($model = Permissions::find($id)) !== null) {
            return $model;
        }

        throw new Exception('The requested page does not exist.');
    }

    protected function modulefindModel()
    {
        return Modules::where(['is_active' => '1'])->where('functionality', '!=', 'none')->where('title', '!=', '')->orderBy('title', 'ASC')->get()->pluck('title', 'id')->toArray();
    }

    protected function addPjaxHeaders(Request $request)
    {
        $request->headers->set('X-PJAX', true);
        $request->headers->set('X-PJAX-Container', '#pjax-container');
        return $request;
    }
}
