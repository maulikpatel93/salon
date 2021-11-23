<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckApiToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // if(!in_array($request->headers->get('accept'), ['application/json', 'Application/Json']))
        // return response()->json(['message' => 'Unauthenticated.'], 401);
        if ($request->input('auth_key')) {
            if (!empty(trim($request->input('auth_key')))) {
                $is_exists = User::where('id', Auth::guard('api')->id())->exists();
                if ($is_exists) {
                    return $next($request);
                }
            }
            return response()->json('Invalid Token', 401);
        }
        return $next($request);

    }
}
