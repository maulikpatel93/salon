<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\SalonRequest;
use App\Http\Requests\Api\UserRequest;
use App\Models\Api\Salons;
use App\Models\Api\Users;
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
    protected $errorStatus = 422;
    protected $unauthorizedStatus = 401;

    protected $salon_field = [
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
        $requestAll = $request->all();
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
            'is_active' => '1',
            'email_verified' => '1',
        ];
        $credentials_4 = array_merge(['role_id' => 4], $credentials); // Salon role
        $credentials_5 = array_merge(['role_id' => 5], $credentials); // Client role
        if (Auth::attempt($credentials_4) || Auth::attempt($credentials_5)) {
            $user = Auth::user();
            $successData = [];
            $token = $user->createToken($user->id)->accessToken;
            $successData['token'] = $token;
            $successData['auth_key'] = $user->auth_key;
            $successData['id'] = $user->id;
            return response()->json($successData, $this->successStatus);
        } else {
            $EmailCheckAccount = Users::where('email', $request->email)->count();
            if (empty($EmailCheckAccount)) {
                return response()->json(['message' => __('messages.user_email_not_available')], $this->errorStatus);
            }
            $unVerifyAccount = Users::where(['is_active' => 0, 'email' => $request->email])->count();
            if ($unVerifyAccount > 0) {
                return response()->json(['message' => __('messages.user_email_unverify')], $this->errorStatus);
            }
            return response()->json(['message' => __('messages.user_passowrd_wrong')], $this->errorStatus);
        }
    }

    public function salonregistration(SalonRequest $request)
    {
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

    public function salons(Request $request)
    {
        $requestAll = $request->all();
        $successData = [];
        if (isset($requestAll['id']) && $requestAll['id']) {
            $id = $requestAll['id'];
            $Salons = Salons::select($this->salon_field)->where([
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
        $requestAll = $request->all();
        $token = Str::random(config('params.auth_key_character'));
        $requestAll['role_id'] = 4;
        $requestAll['auth_key'] = hash('sha256', $token);
        $email_username = explode('@', $request->email);
        $requestAll['username'] = $email_username ? $email_username[0] : $requestAll['first_name'] . '_' . $requestAll['last_name'] . '_' . random_int(101, 999);
        $requestAll['password'] = Hash::make($requestAll['password']);
        $model = new Users;
        $model->fill($requestAll);
        $model->save();
        $successData = [];
        $successData = $model->toArray();
        $successData['token'] = $model->createToken($model->id)->accessToken;
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