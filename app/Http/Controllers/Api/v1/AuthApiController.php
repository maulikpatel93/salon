<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthApiController extends Controller
{

    protected $successStatus = 200;
    protected $errorStatus = 403;
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
        $user = Auth::user();
        if ($user) {
            return response()->json(['status' => $this->successStatus, 'message' => 'Success', 'data' => $user]);
        }
        return response()->json(['status' => $this->errorStatus, 'message' => 'Failed']);
    }

}
