<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class JWTMIddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        try {
            JWTAuth::parseToken()->authenticate();
        } catch (Exception $e) {
            if($e instanceof TokenInvalidException) {
                return response()->json([
                 'status' => 'Invalid Token'
                ]);
            }
            if($e instanceof TokenExpiredException){
                return response()->json([
                    'status' => 'Expired Token'
                   ]);

            }
            return response()->json([
                'status' => 'Token not found'
               ]);
        }
        return $next($request);
    }
}
