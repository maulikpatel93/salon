<?php

namespace App\Http\Controllers\Api\v1;

use App\Exceptions\UnsecureException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\NotifyDetailRequest;
use App\Models\Api\NotifyDetail;
use Illuminate\Http\Request;

class NotifyDetailApiController extends Controller
{
    protected $successStatus = 200;
    protected $badrequestStatus = 400;
    protected $errorStatus = 422;
    protected $unauthorizedStatus = 401;
    protected $warningStatus = 410;

    protected $field = [
        'id',
        'salon_id',
        'form_id',
        'icon',
        'title',
        'nofify',
        'type',
        'short_description',
        'appointment_times_description',
        'cancellation_description',
        'sms_template',
        'preview',
        'is_active',
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
        $notifydata = $request->notifydata;
        $salon_id = $request->salon_id;
        $id = $request->id;

        if ($notifydata) {
            foreach ($notifydata as $key => $value) {
                $value['salon_id'] = $salon_id;
                $model = NotifyDetail::where(['type' => $value["type"], 'nofify' => $value['nofify'], 'salon_id' => $salon_id])->first();
                if (empty($model)) {
                    $model = new NotifyDetail;
                    $model->fill($value);
                    $model->save();
                }
            }
        }
        return $this->returnResponse($request, $id);
    }

    // public function store(NotifyDetailRequest $request)
    // {
    //     $requestAll = $request->all();
    //     $requestAll['is_active_at'] = currentDateTime();
    //     $model = new NotifyDetail;
    //     $model->fill($requestAll);
    //     $model->save();
    //     return $this->returnResponse($request, $model->id);
    // }

    public function update(NotifyDetailRequest $request, $id)
    {
        $requestAll = $request->all();
        $model = $this->findModel($id);
        $model->fill($requestAll);
        $model->save();
        return $this->returnResponse($request, $model->id);
    }

    // public function delete(Request $request, $id)
    // {
    //     $requestAll = $request->all();
    //     $model = $this->findModel($id);
    //     NotifyDetail::where('id', $id)->delete();
    //     return response()->json(['id' => $id, 'message' => __('messages.success')], $this->successStatus);
    // }

    protected function findModel($id)
    {
        if (($model = NotifyDetail::find($id)) !== null) {
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

        $pagination = $request->pagination ? $request->pagination : false;
        $limit = $request->limit ? $request->limit : config('params.apiPerPage');

        $where = ['salon_id' => $request->salon_id];
        $where = ($id) ? array_merge($where, ['id' => $id]) : $where;

        $whereLike = $request->q ? explode(' ', $request->q) : '';

        $orderby = 'id asc';
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
            $successData = NotifyDetail::with($withArray)->selectRaw($option['valueField'] . ' as value, ' . $option['labelField'] . ' as label')->where($where)->get()->toArray();
            return response()->json($successData, $this->successStatus);
        }
        if ($id) {
            if ($request->result == 'result_array') {
                $model = NotifyDetail::with($withArray)->select($field)->where($where)->get();
            } else {
                $model = NotifyDetail::with($withArray)->select($field)->where($where)->first();
            }
            $successData = $model->toArray();
            return response()->json($successData, $this->successStatus);
        } else {
            if ($pagination == true) {
                if ($whereLike) {
                    $model = NotifyDetail::with($withArray)->select($field)->where(function ($query) use ($whereLike) {
                        if ($whereLike) {
                            $query->where('title', "like", "%" . $whereLike[0] . "%");
                            foreach ($whereLike as $row) {
                                $query->orWhere('title', "like", "%" . $row . "%");
                            }
                        }
                    })->where($where)->orderByRaw($orderby)->paginate($limit);
                } else {
                    $model = NotifyDetail::with($withArray)->select($field)->where($where)->orderByRaw($orderby)->paginate($limit);
                }
            } else {
                if ($whereLike) {
                    $model = NotifyDetail::with($withArray)->select($field)->where(function ($query) use ($whereLike) {
                        if ($whereLike) {
                            $query->where('title', "like", "%" . $whereLike[0] . "%");
                            foreach ($whereLike as $row) {
                                $query->orWhere('title', "like", "%" . $row . "%");
                            }
                        }
                    })->where($where)->orderByRaw($orderby)->get();
                } else {
                    $model = NotifyDetail::with($withArray)->select($field)->where($where)->orderByRaw($orderby)->get();
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

}
