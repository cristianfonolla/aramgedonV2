<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;

class VerifyAccessKey
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $key = $request->headers->get('api-key');
        if (isset($key)) {
            $autorized = User::where('api_token','=',$key)->first();
            if ($autorized) {
                $next($request);
            } else {
                return response()->json(['error' => 'unauthorized'], 401);
            }
        } else {
            return response()->json(['error' => 'unauthorized'], 401);
        }
    }
}
