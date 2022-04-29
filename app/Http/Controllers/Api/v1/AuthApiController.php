<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\SalonRequest;
use App\Models\Api\Salons;
use App\Models\Api\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AuthApiController extends Controller
{
    protected $successStatus = 200;
    protected $badrequestStatus = 400;
    protected $errorStatus = 422;
    protected $unauthorizedStatus = 401;
    protected $warningStatus = 410;

    protected $field = ['*'];

    protected $salon_field = [
        'id',
        'business_name',
        'business_email',
        'business_phone_number',
        'business_address',
        'business_website',
        'salon_type',
        'logo',
        'timezone',
    ];
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api');
        parent::__construct();
    }
    public function index()
    {
        return "It works!";
    }
    public function user(Request $request)
    {
        $field = ($request->field) ? array_merge(['id', 'salon_id'], explode(',', $request->field)) : $this->field;

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
        $where = ['is_active' => '1'];
        $where = (Auth::user()) ? array_merge($where, ['id' => Auth::user()->id]) : $where;
        $model = Users::with($withArray)->select($field)->where($where)->first();
        if ($model) {
            return response()->json($model, $this->successStatus);
        }
        return response()->json(['message' => __('messages.failed')], $this->errorStatus);
    }

    public function timezone(Request $request)
    {
        $requestAll = $request->all();
        return config('params.timezones');
    }
    public function businessupdate(SalonRequest $request, $id)
    {
        $requestAll = $request->all();
        $model = Salons::find($id);
        $model->fill($requestAll);
        $file = $request->file('logo');
        if ($file) {
            Storage::delete('/public/salons/' . $model->logo);
            $fileName = time() . '_' . str_replace(' ', '_', $file->getClientOriginalName());
            $filePath = $file->storeAs('salons', $fileName, 'public');
            $model->logo = $fileName;
        }
        $model->save();
    }
}