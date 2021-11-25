<?php

namespace App\Http\Middleware;

use App\Models\Users;
use Closure;
use Illuminate\Http\Request;

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
        if (empty(trim($request->input('action')))) {
            return response()->json(['status' => 403, 'message' => 'Invalid action'], 403);
        }
        if ($request->headers->get('Authorization')) {
            if (!empty(trim($request->input('auth_key')))) {
                $is_exists = Users::where('auth_key', $request->input('auth_key'))->exists();
                if ($is_exists) {
                    return $next($request);
                }
                return response()->json(['message' => 'Unauthenticated.'], 401);
            }
            return response()->json(['status' => 403, 'message' => 'Invalid Auth key'], 403);
        }
        return $next($request);
    }
}
