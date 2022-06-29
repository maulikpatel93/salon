<?php

namespace App\Http\Controllers\Api\v1;

use App\Exceptions\UnsecureException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\FormCreateRequest;
use App\Models\Api\Form;
use App\Models\Api\FormElement;
use App\Models\Api\FormElementOptions;
use App\Models\Api\FormElementType;
use Illuminate\Http\Request;

class FormApiController extends Controller
{
    protected $successStatus = 200;
    protected $badrequestStatus = 400;
    protected $errorStatus = 422;
    protected $unauthorizedStatus = 401;
    protected $warningStatus = 410;

    protected $field = [
        'id',
        'salon_id',
        'title',
    ];

    protected $salon_field = [
        'id',
        'business_name',
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

    public function store(FormCreateRequest $request)
    {
        $requestAll = $request->all();
        $formdata = $request->formdata ? \json_decode($request->formdata, true) : "";
        $requestAll['is_active_at'] = currentDateTime();
        $model = new Form;
        $model->fill($requestAll);
        $model->save();
        if ($formdata) {
            foreach ($formdata as $key => $value) {
                if ($value) {
                    $value['salon_id'] = $model->salon_id;
                    $value['form_id'] = $model->id;
                    $value['is_active_at'] = currentDateTime();
                    $formElementModal = new FormElement;
                    $formElementModal->fill($value);
                    $formElementModal->save();
                    if ($formElementModal && isset($value['options']) && $value['options']) {
                        foreach ($value['options'] as $kopt => $vopt) {
                            $vopt['salon_id'] = $model->salon_id;
                            $vopt['form_element_id'] = $formElementModal->id;
                            $FormElementOptionsModal = new FormElementOptions;
                            $FormElementOptionsModal->fill($vopt);
                            $FormElementOptionsModal->save();
                        }
                    }
                }
            }
        }
        return $this->returnResponse($request, $model->id);
    }

    public function update(FormCreateRequest $request, $id)
    {
        $requestAll = $request->all();
        $formdata = $request->formdata ? \json_decode($request->formdata, true) : "";
        $delete_form_element_id = $request->formdata ? \json_decode($request->delete_form_element_id, true) : "";
        $collection = collect($delete_form_element_id);
        $deletedElementId = $collection->pluck("form_element_id")->toArray();
        if ($deletedElementId) {
            FormElement::whereIn('id', $deletedElementId)->delete();
        }
        $model = $this->findModel($id);
        $model->fill($requestAll);
        $model->save();
        if ($formdata) {
            foreach ($formdata as $key => $value) {
                if ($value) {
                    $value['salon_id'] = $model->salon_id;
                    $value['form_id'] = $model->id;
                    $formElementModal = FormElement::where('id', $value['form_element_id'])->first();
                    if (empty($formElementModal)) {
                        $formElementModal = new FormElement;
                    }
                    $formElementModal->fill($value);
                    $formElementModal->save();
                    if ($formElementModal && isset($value['options']) && $value['options']) {
                        $beforeoption = $formElementModal->form_element_options->pluck('id')->toArray();
                        $collectionOpt = collect($value['options']);
                        $deletedOptId = $collectionOpt->pluck("id")->filter()->toArray();
                        if ($beforeoption) {
                            foreach ($beforeoption as $bopt) {
                                if (!in_array($bopt, $deletedOptId)) {
                                    FormElementOptions::where('id', $bopt)->delete();
                                }
                            }
                        }
                        foreach ($value['options'] as $kopt => $vopt) {
                            $vopt['salon_id'] = $model->salon_id;
                            $vopt['form_element_id'] = $formElementModal->id;
                            $FormElementOptionsModal = "";
                            if (isset($vopt['id']) && $vopt['id']) {
                                $FormElementOptionsModal = FormElementOptions::where('id', $vopt['id'])->first();
                            }
                            if (empty($FormElementOptionsModal)) {
                                $FormElementOptionsModal = new FormElementOptions;
                            }
                            $FormElementOptionsModal->fill($vopt);
                            $FormElementOptionsModal->save();
                        }
                    }
                }
            }
        }
        return $this->returnResponse($request, $model->id);
    }

    public function delete(Request $request, $id)
    {
        $requestAll = $request->all();
        $model = $this->findModel($id);
        Form::where('id', $id)->delete();
        return response()->json(['id' => $id, 'message' => __('messages.success')], $this->successStatus);
    }

    protected function findModel($id)
    {
        if (($model = Form::find($id)) !== null) {
            return $model;
        }
        throw new UnsecureException('The requested page does not exist.');
    }

    public function returnResponse($request, $id, $data = [])
    {
        $requestAll = $request->all();

        $field = ($request->field) ? array_merge(['id', 'salon_id'], explode(',', $request->field)) : $this->field;
        $sort = ($request->sort) ? $request->sort : "";
        $option = ($request->option) ? $request->option : "";

        $salon_field = $this->salon_field;
        if (isset($requestAll['salon_field']) && empty($requestAll['salon_field'])) {
            $salon_field = false;
        } else if ($request->salon_field == '*') {
            $salon_field = [$request->salon_field];
        } else if ($request->salon_field) {
            $salon_field = array_merge(['id'], explode(',', $request->salon_field));
        }

        $withArray = [];
        if ($salon_field) {
            $withArray[] = 'salon:' . implode(',', $salon_field);
        }
        $withArray[] = 'form_element:id,salon_id,form_element_type_id,form_id,question,form_type';
        $pagination = $request->pagination ? $request->pagination : false;
        $limit = $request->limit ? $request->limit : config('params.apiPerPage');

        $where = ['is_active' => '1', 'salon_id' => $request->salon_id];
        $where = ($id) ? array_merge($where, ['id' => $id]) : $where;

        $whereLike = $request->q ? explode(' ', $request->q) : '';

        $orderby = 'id desc';
        if ($sort) {
            $sd = [];
            foreach ($sort as $key => $value) {
                $sd[] = $key . ' ' . $value;
            }
            if ($sd) {
                $orderby = implode(", ", $sd);
            }
        }

        if ($option) {
            $successData = Form::with($withArray)->selectRaw($option['valueField'] . ' as value, ' . $option['labelField'] . ' as label')->where($where)->get()->toArray();
            return response()->json($successData, $this->successStatus);
        }
        if ($id) {
            if ($request->result == 'result_array') {
                $model = Form::with($withArray)->select($field)->where($where)->get();
            } else {
                $model = Form::with($withArray)->select($field)->where($where)->first();
            }
            $successData = $model->toArray();
            return response()->json($successData, $this->successStatus);
        } else {
            if ($pagination == true) {
                if ($whereLike) {
                    $model = Form::with($withArray)->select($field)->where(function ($query) use ($whereLike) {
                        if ($whereLike) {
                            $query->where('title', "like", "%" . $whereLike[0] . "%");
                            foreach ($whereLike as $row) {
                                $query->orWhere('title', "like", "%" . $row . "%");
                            }
                        }
                    })->where($where)->orderByRaw($orderby)->paginate($limit);
                } else {
                    $model = Form::with($withArray)->select($field)->where($where)->orderByRaw($orderby)->paginate($limit);
                }
            } else {
                if ($whereLike) {
                    $model = Form::with($withArray)->select($field)->where(function ($query) use ($whereLike) {
                        if ($whereLike) {
                            $query->where('title', "like", "%" . $whereLike[0] . "%");
                            foreach ($whereLike as $row) {
                                $query->orWhere('title', "like", "%" . $row . "%");
                            }
                        }
                    })->where($where)->orderByRaw($orderby)->get();
                } else {
                    $model = Form::with($withArray)->select($field)->where($where)->orderByRaw($orderby)->get();
                }
            }
            if ($model->count()) {
                $successData = $model->toArray();
                if ($successData) {
                    return response()->json($successData, $this->successStatus);
                }
            }
        }
        return response()->json(['message' => __('messages.failed')], $this->errorStatus);
    }

    public function formelementtype(Request $request)
    {
        $requestAll = $request->all();
        $model = FormElementType::select(['id', 'name', 'icon', 'section_type', 'can_repeat', 'form_type', "questionholder", "is_edit"])->where(['is_active' => 1])->get();
        $successData = $model->toArray();
        if ($successData) {
            return response()->json($successData, $this->successStatus);
        }
        return response()->json(['message' => __('messages.failed')], $this->errorStatus);
    }

}
