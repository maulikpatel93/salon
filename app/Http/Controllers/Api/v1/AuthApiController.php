<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Api\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthApiController extends Controller
{

    protected $successStatus = 200;
    protected $errorStatus = 422;
    protected $unauthorizedStatus = 401;

    protected $field = ['*'];

    protected $salon_field = [
        'id',
        'business_name',
        'owner_name',
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

}