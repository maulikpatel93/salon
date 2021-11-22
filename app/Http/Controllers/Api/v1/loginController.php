<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
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
        $this->middleware('guest:api')->except('logout');
    }

    public function login(Request $request)
    {
        $inputVal = $request->all();

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $credentials = [
            'email' => $inputVal['email'],
            'password' => $inputVal['password'],
            'role_id' => 3,
        ];

        if (Auth::guard('web')->attempt($credentials)) {
            $user = Auth::user();
            return ['status' => 200];
        } else {
            return ['status' => 'Email & Password are incorrect.'];
            return redirect()->route('login')->with('error', 'Email & Password are incorrect.');
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        return redirect()->route('login');
    }
}
