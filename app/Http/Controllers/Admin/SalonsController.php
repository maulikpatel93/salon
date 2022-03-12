<?php

namespace App\Http\Controllers\Admin;

use App\Exceptions\UnsecureException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SalonRequest;
use App\Models\Salons;
use App\Models\Tax;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Itstructure\GridView\DataProviders\EloquentDataProvider;

class SalonsController extends Controller
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
        if ($sort) {
            $dataProvider = new EloquentDataProvider(Salons::query());
        } else {
            $dataProvider = new EloquentDataProvider(Salons::query()->orderBy('id', 'desc'));
        }

        return view('admin.salons.index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function create()
    {
        $model = new Salons();
        return view('admin.salons.create', ['model' => $model]);
    }

    public function store(SalonRequest $request)
    {
        $requestAll = $request->all();
        $requestAll['business_email_verified'] = '1';
        $requestAll['business_email_verified_at'] = currentDateTime();
        $requestAll['business_phone_number_verified'] = '0';
        // $requestAll['password'] = Hash::make($requestAll['password']);
        $requestAll['is_active_at'] = currentDateTime();
        $salon_working_hours = ($request->working_hours) ? json_decode($request->working_hours, true) : [];
        $file = $request->file('logo');
        if ($file) {
            $fileName = time() . '_' . str_replace(' ', '_', $file->getClientOriginalName());
            $filePath = $file->storeAs('salons', $fileName, 'public');
            $requestAll['logo'] = $fileName;
        }
        $model = new Salons();
        if ($request->ajax() && $model->create($requestAll)) {
            $lastInsertId = DB::getPdo()->lastInsertId();
            $taxname = config('params.tax');
            if ($taxname) {
                foreach ($taxname as $tname) {
                    $taxModel = Tax::where(['salon_id' => $lastInsertId, 'name' => $tname])->first();
                    if (empty($taxModel)) {
                        $taxModel = new Tax();
                    }
                    $taxModel->salon_id = $lastInsertId;
                    $taxModel->name = $tname;
                    $taxModel->description = null;
                    $taxModel->percentage = null;
                    $taxModel->save();
                }
            }
            if ($salon_working_hours) {
                foreach ($salon_working_hours as $key => $value) {
                    if (isset($value['days']) && in_array($value['days'], $days)) {
                        $SalonWorkingHoursModel = SalonWorkingHours::where(['salon_id' => $model->id, 'days' => $value['days']])->first();
                        if (empty($SalonWorkingHoursModel)) {
                            $SalonWorkingHoursModel = new SalonWorkingHours;
                        }
                        $dayoff = (isset($value['dayoff']) && $value['dayoff']) ? '1' : '0';
                        $start_time = isset($value['start_time']) ? $value['start_time'] : '';
                        $end_time = isset($value['end_time']) ? $value['end_time'] : '';
                        $break_time = isset($value['break_time']) ? $value['break_time'] : '';
                        $SalonWorkingHoursModel->salon_id = $model->salon_id;
                        $SalonWorkingHoursModel->staff_id = $model->id;
                        $SalonWorkingHoursModel->days = $value['days'];
                        $SalonWorkingHoursModel->start_time = $dayoff ? $start_time : null;
                        $SalonWorkingHoursModel->end_time = $dayoff ? $end_time : null;
                        $SalonWorkingHoursModel->break_time = $dayoff ? $break_time : [];
                        $SalonWorkingHoursModel->dayoff = $dayoff;
                        $SalonWorkingHoursModel->is_active_at = currentDateTime();
                        $SalonWorkingHoursModel->save();
                    }
                }
            }
            $responseData['status'] = 200;
            $responseData['message'] = 'Success';
            $responseData['url'] = false;
            return response()->json($responseData);
        }
        return redirect()->route('admin.salons.index');
    }

    public function edit($id)
    {
        $model = $this->findModel(decode($id));
        return view('admin.salons.update', ['model' => $model]);
    }

    public function update(SalonRequest $request, $id)
    {
        // $validated = $request->validated();
        $requestAll = $request->all();
        $requestAll['controller'] = $requestAll['controller'] ?? '';
        $requestAll['action'] = $requestAll['action'] ?? '';
        $requestAll['business_email_verified'] = '1';
        $requestAll['business_email_verified_at'] = currentDateTime();
        $requestAll['business_phone_number_verified'] = '0';
        $requestAll['is_active_at'] = currentDateTime();
        $salon_working_hours = ($request->working_hours) ? json_decode($request->working_hours, true) : [];
        $model = $this->findModel(decode($id));
        $file = $request->file('logo');
        $requestAll['logo'] = $model->logo;
        if ($file) {
            Storage::delete('/public/salons/' . $model->logo);
            $fileName = time() . '_' . str_replace(' ', '_', $file->getClientOriginalName());
            $filePath = $file->storeAs('salons', $fileName, 'public');
            $requestAll['logo'] = $fileName;
        }
        if ($request->ajax() && $model->update($requestAll)) {
            $taxname = config('params.tax');
            if ($taxname) {
                foreach ($taxname as $tname) {
                    $taxModel = Tax::where(['salon_id' => $model->id, 'name' => $tname])->first();
                    if (empty($taxModel)) {
                        $taxModel = new Tax();
                    }
                    $taxModel->salon_id = $model->id;
                    $taxModel->name = $tname;
                    $taxModel->description = null;
                    $taxModel->percentage = null;
                    $taxModel->save();
                }
            }
            if ($salon_working_hours) {
                foreach ($salon_working_hours as $key => $value) {
                    if (isset($value['days']) && in_array($value['days'], $days)) {
                        $SalonWorkingHoursModel = SalonWorkingHours::where(['salon_id' => $model->id, 'days' => $value['days']])->first();
                        if (empty($SalonWorkingHoursModel)) {
                            $SalonWorkingHoursModel = new SalonWorkingHours;
                        }
                        $dayoff = (isset($value['dayoff']) && $value['dayoff']) ? '1' : '0';
                        $start_time = isset($value['start_time']) ? $value['start_time'] : '';
                        $end_time = isset($value['end_time']) ? $value['end_time'] : '';
                        $break_time = isset($value['break_time']) ? $value['break_time'] : '';
                        $SalonWorkingHoursModel->salon_id = $model->salon_id;
                        $SalonWorkingHoursModel->staff_id = $model->id;
                        $SalonWorkingHoursModel->days = $value['days'];
                        $SalonWorkingHoursModel->start_time = $dayoff ? $start_time : null;
                        $SalonWorkingHoursModel->end_time = $dayoff ? $end_time : null;
                        $SalonWorkingHoursModel->break_time = $dayoff ? $break_time : [];
                        $SalonWorkingHoursModel->dayoff = $dayoff;
                        $SalonWorkingHoursModel->is_active_at = currentDateTime();
                        $SalonWorkingHoursModel->save();
                    }
                }
            }
            $responseData['status'] = 200;
            $responseData['message'] = 'Success';
            $responseData['url'] = false;
            return response()->json($responseData);
        }
        return redirect()->route('admin.salons.index');
    }

    public function view(Request $request, $id)
    {
        $model = $this->findModel(decode($id));
        return view('admin.salons.view', ['model' => $model]);
    }

    public function delete(Request $request, $id)
    {
        Salons::where('id', decode($id))->delete();
        return redirect()->route('admin.salons.index');
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
                            Salons::where('id', $id)->delete();
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
        if (($model = Salons::find($id)) !== null) {
            return $model;
        }
        throw new UnsecureException('The requested page does not exist.');
    }
}