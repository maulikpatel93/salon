<?php

namespace App\Http\Controllers\Api\v1;

use App\Exceptions\UnsecureException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ClientPhotoRequest;
use App\Models\Api\Client;
use App\Models\Api\Clientphoto;
use Illuminate\Http\Request;

class ClientPhotoApiController extends Controller
{
    protected $successStatus = 200;
    protected $badrequestStatus = 400;
    protected $errorStatus = 422;
    protected $unauthorizedStatus = 401;
    protected $warningStatus = 410;

    protected $field = [
        'id',
        'salon_id',
        'client_id',
        'name',
        'is_profile_photo',
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

    public function store(ClientPhotoRequest $request)
    {
        $requestAll = $request->all();
        $photos = $request->photo;
        $salon_id = $request->salon_id;
        $client_id = $request->client_id;
        if ($photos) {
            foreach ($photos as $file) {
                if ($file) {
                    $fileName = time() . '_' . str_replace(' ', '_', $file->getClientOriginalName());
                    $filePath = $file->storeAs('client', $fileName, 'public');
                    $model = new Clientphoto();
                    $model->name = $fileName;
                    $model->is_profile_photo = '0';
                    $model->client_id = $client_id;
                    $model->salon_id = $salon_id;
                    $model->is_active_at = currentDateTime();
                    $model->save();
                    // Storage::delete('/public/client/' . $model->profile_photo);
                    // $fileName = time() . '_' . str_replace(' ', '_', $file->getClientOriginalName());
                    // $filePath = $file->storeAs('client', $fileName, 'public');
                    // $model->profile_photo = $fileName;
                }
            }
        }
        return response()->json(['message' => __('messages.success')], $this->successStatus);
        // return $this->returnResponse($request, $model->id);
    }

    public function update(ClientPhotoRequest $request, $id)
    {
        $requestAll = $request->all();
        $model = $this->findModel($id);
        Clientphoto::where('client_id', $model->client_id)->update(['is_profile_photo' => 0]);
        $model->is_profile_photo = 1;
        $model->save();
        Client::where('id', $model->client_id)->update(['profile_photo' => $model->name]);
        return $this->returnResponse($request, $model->id);
    }

    public function delete(Request $request, $id)
    {
        $requestAll = $request->all();
        Clientphoto::where(['id' => $id])->delete();
        return response()->json(['id' => $id, 'message' => __('messages.success')], $this->successStatus);
    }

    protected function findModel($id)
    {
        if (($model = Clientphoto::find($id)) !== null) {
            return $model;
        }
        throw new UnsecureException('The requested page does not exist.');
    }

    public function returnResponse($request, $id, $data = [])
    {
        $requestAll = $request->all();
        $field = ($request->field) ? array_merge(['id', 'salon_id', 'client_id'], explode(',', $request->field)) : $this->field;
        $sort = ($request->sort) ? $request->sort : "";

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

        $where = ['is_active' => '1', 'client_id' => $request->client_id, 'salon_id' => $request->salon_id];
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
        if ($id) {
            if ($request->result == 'result_array') {
                $model = Clientphoto::with($withArray)->select($field)->where($where)->get();
            } else {
                $model = Clientphoto::with($withArray)->select($field)->where($where)->first();
            }
            $successData = $model->toArray();
            return response()->json($successData, $this->successStatus);
        } else {
            if ($pagination == true) {
                if ($whereLike) {
                    $model = Clientphoto::with($withArray)->select($field)->where(function ($query) use ($whereLike) {
                        if ($whereLike) {
                            $query->where('name', "like", "%" . $whereLike[0] . "%");
                        }
                    })->where($where)->orderByRaw($orderby)->paginate($limit);
                } else {
                    $model = Clientphoto::with($withArray)->select($field)->where($where)->orderByRaw($orderby)->paginate($limit);
                }
            } else {
                if ($whereLike) {
                    $model = Clientphoto::with($withArray)->select($field)->where(function ($query) use ($whereLike) {
                        if ($whereLike) {
                            $query->where('name', "like", "%" . $whereLike[0] . "%");
                        }
                    })->where($where)->orderByRaw($orderby)->get();
                } else {
                    $model = Clientphoto::with($withArray)->select($field)->where($where)->orderByRaw($orderby)->get();
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