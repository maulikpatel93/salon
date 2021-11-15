<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ModuleRequest;
use Illuminate\Http\Request;
use Itstructure\GridView\DataProviders\EloquentDataProvider;
use App\Models\Modules;

class ModulesController extends Controller
{
    const ACTIVE = '1';
    const INACTIVE = '0';
    const DELETE = 'Yes';

    public function __construct()
    {
        $this->middleware('auth:admin');
        parent::__construct();
    }

    public function index()
    {
        // global $user;
        $dataProvider = new EloquentDataProvider(Modules::query());
        return view('admin.modules.index',[
            'dataProvider' => $dataProvider
        ]);
    }

    public function create()
    {
        $model = new Modules();
        return view('admin.modules.create', ['model' => $model]);
    }

    public function store(ModuleRequest $request)
    {
        $inputVal = $request->all();
        $inputVal['controller'] = $inputVal['controller'] ?? '';
        $inputVal['action'] = $inputVal['action'] ?? '';
        
        $model = new Modules();
        if($request->ajax() && $model->create($inputVal)){
            $responseData['status'] = 200;
            $responseData['message'] = 'Success';
            $responseData['url'] = route('admin.modules.index');
            return response()->json($responseData);
        }
        return redirect()->route('admin.modules.index');
    }

    public function edit($id)
    {
        $model = Modules::find(decode($id));
        return view('admin.modules.update', ['model' => $model]);
    }

    public function update(ModuleRequest $request, $id)
    {
        // $validated = $request->validated();
        $inputVal = $request->all();
        $inputVal['controller'] = $inputVal['controller'] ?? '';
        $inputVal['action'] = $inputVal['action'] ?? '';
        $model = Modules::find(decode($id));
        if($request->ajax() && $model->update($inputVal)){
            $responseData['status'] = 200;
            $responseData['message'] = 'Success';
            $responseData['url'] = route('admin.modules.index');
            return response()->json($responseData);
        }
        return redirect()->route('admin.modules.index');
    }

    public function view()
    {
        return view('admin.modules.view');
    }

    public function delete()
    {

    }

    public function isactive(Request $request, $id)
    {
        if ($request->ajax()) {
            $model = $this->findModel($id);
            $model->status = ($model->status == self::ACTIVE) ? self::INACTIVE : self::ACTIVE;
            $model->status_at = Yii::$app->BackFunctions->currentDateTime();
            return $model->save();
        }
    }

    public function apply()
    {
        
    }

    public function childmenu()
    {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            
            $type = empty($_POST['depdrop_parents'][0]) ? null : $_POST['depdrop_parents'][0];
            // $parent_menu_id = empty($_POST['depdrop_parents'][1]) ? null : $_POST['depdrop_parents'][1];

            $list = [];
            if ($type == 'Submenu') {
                $list = Modules::find()->where(['parent_menu_id' => 0, 'parent_submenu_id' => 0])->where(['title', '!=', ''])->get();
                // $list = Modules::find();
            } elseif ($type == 'Subsubmenu' && ($parent_menu_id == 0 || empty($parent_menu_id))) {
                $list = Modules::find()->where(['menu_id' => $menu_id, 'parent_menu_id' => 0, 'parent_submenu_id' => 0])->andWhere(['!=', 'title', ''])->asArray()->all();
            }
            // echo '<pre>'; print_r($list); echo '<pre>';dd();

            $selected = null;
            if ($type != null && count($list) > 0) {
                $selected = '';
                foreach ($list as $key => $value) {
                    $out[] = ['id' => $key, 'name' => $value];
                }
                // Shows how you can preselect a value
                return response()->json(['output' => $out, 'selected' => $selected]);
            }
        }
        return response()->json(['output' => '', 'selected' => '']);
    }
}
