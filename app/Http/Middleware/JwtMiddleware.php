<?php

namespace App\Http\Middleware;

use Closure;
use JWTAuth;
use Exception;
use Response ;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

class JwtMiddleware
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
        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){
                return Response::json(['success'=>false,'message'=>'Token is Invalid'], 400);
            }else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException){
                return Response::json(['success'=>false,'message'=>'Token is Invalid'], 400);
            }else{
                return Response::json(['success'=>false,'message'=>'Token is Invalid'], 400);
            }
        }
        return $next($request);
    }
}
