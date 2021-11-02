<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AdminLoginRequest;
use Validator;

class AdminController extends Controller
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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function login(AdminLoginRequest $request)
    {
        // $validated = $request->validated();
        $inputVal = $request->all();

        $credentials = [
            'email' => $inputVal['email'],
            'password' => $inputVal['password'],
            'role_id' => 1
        ];
        $responseData = [];
        if(Auth::guard('admin')->attempt($credentials)){
            $user = Auth::user();
            $responseData['status'] = 200;
            $responseData['message'] = 'Success';
            $responseData['url'] = route('admin.dashboard');
            return response()->json($responseData);
        }else{
            // return redirect()->route('admin.login')->with('error','Email & Password are incorrect.');
            // return redirect()->back()->with('error','Email & Password are incorrect.');
            if($request->ajax()){
                $responseData['status'] = 0;
                $responseData['message'] = 'Email & Password are incorrect.';
                $responseData['url'] = route('admin.login');
                return response()->json($responseData);
            }
        }
        return redirect()->route('admin.login')->withInput()->withErrors('Email & Password are incorrect.');
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
