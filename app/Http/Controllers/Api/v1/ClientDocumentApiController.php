<?php

namespace App\Http\Controllers\Api\v1;

use App\Exceptions\UnsecureException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ClientDocumentRequest;
use App\Models\Api\Clientdocument;
use Illuminate\Http\Request;

class ClientDocumentApiController extends Controller
{
    protected $successStatus = 200;
    protected $errorStatus = 422;
    protected $unauthorizedStatus = 401;

    protected $field = [
        'id',
        'salon_id',
        'client_id',
        'document',
        'updated_at',
    ];

    protected $salon_field = [
        'id',
        'business_name',
        'owner_name',
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

    public function store(ClientDocumentRequest $request)
    {
        $requestAll = $request->all();
        $document = $request->document;
        $salon_id = $request->salon_id;
        $client_id = $request->client_id;
        if ($document) {
            foreach ($document as $file) {
                if ($file) {
                    $fileName = time() . '_' . str_replace(' ', '_', $file->getClientOriginalName());
                    $filePath = $file->storeAs('client', $fileName, 'public');
                    $model = new Clientdocument();
                    $model->document = $fileName;
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

    public function update(ClientDocumentRequest $request, $id)
    {
        $requestAll = $request->all();
        $model = $this->findModel($id);
        // Clientdocument::where('client_id', $model->client_id)->update(['is_profile_photo' => '0']);
        // $model->is_profile_photo = '1';
        // $model->save();
        // Client::where('id', $model->client_id)->update(['profile_photo' => $model->name]);
        return $this->returnResponse($request, $model->id);
    }

    public function delete(Request $request, $id)
    {
        $requestAll = $request->all();
        Clientdocument::where(['id' => $id])->delete();
        return response()->json(['id' => $id, 'message' => __('messages.success')], $this->successStatus);
    }

    protected function findModel($id)
    {
        if (($model = Clientdocument::find($id)) !== null) {
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
                $model = Clientdocument::with($withArray)->select($field)->where($where)->get();
            } else {
                $model = Clientdocument::with($withArray)->select($field)->where($where)->first();
            }
            $successData = $model->toArray();
            return response()->json($successData, $this->successStatus);
        } else {
            if ($pagination == true) {
                if ($whereLike) {
                    $model = Clientdocument::with($withArray)->select($field)->where(function ($query) use ($whereLike) {
                        if ($whereLike) {
                            $query->where('document', "like", "%" . $whereLike[0] . "%");
                        }
                    })->where($where)->orderByRaw($orderby)->paginate($limit);
                } else {
                    $model = Clientdocument::with($withArray)->select($field)->where($where)->orderByRaw($orderby)->paginate($limit);
                }
            } else {
                if ($whereLike) {
                    $model = Clientdocument::with($withArray)->select($field)->where(function ($query) use ($whereLike) {
                        if ($whereLike) {
                            $query->where('document', "like", "%" . $whereLike[0] . "%");
                        }
                    })->where($where)->orderByRaw($orderby)->get();
                } else {
                    $model = Clientdocument::with($withArray)->select($field)->where($where)->orderByRaw($orderby)->get();
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
