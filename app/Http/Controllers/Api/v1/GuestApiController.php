<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class GuestApiController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
     */

    // use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected $successStatus = 200;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:api')->except('logout');
        parent::__construct();
    }

    public function index(Request $request)
    {
        return ['status' => 200];
    }
    public function login(Request $request)
    {
        $inputVal = $request->all();

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        $inputVal = $request->all();
        $credentials = [
            'email' => $inputVal['email'],
            'password' => $inputVal['password'],
            'role_id' => 4,
        ];
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $success['token'] = $user->createToken('MyApp')->accessToken;
            return response()->json(['success' => $success], $this->successStatus);
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    }

    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        $inputVal = $request->all();
        $inputVal['username'] = '';
        $inputVal['role_id'] = 4;
        $inputVal['email_verified'] = '1';
        $inputVal['email_verified_at'] = currentDateTime();
        $inputVal['phone_number'] = '';
        $inputVal['phone_number_verified'] = '0';
        $inputVal['password'] = Hash::make($inputVal['password']);
        $inputVal['is_active_at'] = currentDateTime();
        $inputVal['profile_photo'] = '';
        $token = Str::random(config('params.auth_key_character'));
        $inputVal['auth_key'] = hash('sha256', $token);
        $user = Users::create($inputVal);
        $success['token'] = $user->createToken('MyApp')->accessToken;
        return response()->json(['success' => $success], $this->successStatus);
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        if ($request->everywhere) {
            foreach ($request->user()->tokens()->whereRevoked(0)->get() as $token) {
                $token->revoke();
            }
        }
        return response()->json(['message' => 'success']);
    }
}
