<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SalonRequest;
use App\Http\Requests\Admin\UserRequest;
use App\Models\Api\Salons;
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
    protected $errorStatus = 401;
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
        ];
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $successData = [];
            $successData['token'] = $user->createToken($user->id)->accessToken;
            $successData['auth_key'] = $user->auth_key;
            return response()->json(['status' => $this->successStatus, 'message' => 'success', 'data' => $successData]);
        } else {
            return response()->json(['status' => $this->errorStatus, 'message' => 'Unauthorised']);
        }
    }

    public function salonregistration(SalonRequest $request)
    {
        // $validator = Validator::make($request->all(), [
        //     'business_name' => 'required',
        //     'owner_name' => 'required',
        //     'business_phone_number' => "required|regex:/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/",
        //     'business_email' => 'required|email|unique:salons,business_email,' . $id,
        //     'business_address' => 'required',
        //     'salon_type' => 'required',
        //     'timezone' => 'required',
        //     'logo' => 'image|mimes:jpeg,png,jpg,svg|max:2048',
        // ]);
        // if ($validator->fails()) {
        //     return response()->json(['error' => $validator->errors()], 401);
        // }
        $inputVal = $request->all();
        $inputVal['business_email_verified'] = '1';
        $inputVal['business_email_verified_at'] = currentDateTime();
        $inputVal['business_phone_number_verified'] = '0';
        $inputVal['is_active_at'] = currentDateTime();

        $file = $request->file('logo');
        if ($file) {
            $fileName = time() . '_' . str_replace(' ', '_', $file->getClientOriginalName());
            $filePath = $file->storeAs('salons', $fileName, 'public');
            $inputVal['logo'] = $fileName;
        }
        $model = new Salons();
        $model->create($inputVal);
        return response()->json(['status' => $this->successStatus, 'message' => 'success']);
    }

    public function getSalons(Request $request)
    {
        $requestAll = $request->all();
        $successData = [];
        $selectField = [
            'id',
            'business_name',
            'owner_name',
            'business_email',
            'business_phone_number',
            'business_address',
            'salon_type',
            'logo',
            'timezone',
        ];
        if (isset($requestAll['id']) && $requestAll['id']) {
            $id = $requestAll['id'];
            $Salons = Salons::select($selectField)->where([
                'is_active' => '1',
                'id' => $id,
                'business_email_verified' => 1,
            ])->get()->toArray();
        } else {
            $Salons = Salons::select($selectField)->where(['is_active' => '1'])->get()->toArray();
        }

        $successData = $Salons;
        return response()->json(['status' => $this->successStatus, 'message' => 'success', 'data' => $successData]);
    }
    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(UserRequest $request)
    {
        $inputVal = $request->all();
        $inputVal['role_id'] = 4;
        $inputVal['salon_id'] = (isset($inputVal['salon_id'])) ? $inputVal['salon_id'] : '';
        $inputVal['email_verified'] = '1';
        $inputVal['email_verified_at'] = currentDateTime();
        $inputVal['phone_number_verified'] = '0';
        $inputVal['password'] = Hash::make($inputVal['password']);
        $inputVal['is_active_at'] = currentDateTime();
        $inputVal['panel'] = 'Frontend';
        // $inputVal['username'] = str_replace(' ', '_', strtolower($inputVal['first_name'])).'_'.str_replace(' ', '_', strtolower($inputVal['last_name']));
        $token = Str::random(config('params.auth_key_character'));
        $inputVal['auth_key'] = hash('sha256', $token);
        $user = Users::create($inputVal);

        $successData = [];
        $successData['token'] = $user->createToken($user->id)->accessToken;
        return response()->json(['status' => $this->successStatus, 'message' => 'success', 'data' => $successData]);
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        if ($request->everywhere) {
            foreach ($request->user()->tokens()->whereRevoked(0)->get() as $token) {
                $token->revoke();
            }
        }
        return response()->json(['status' => $this->successStatus, 'message' => 'success']);
    }
}
