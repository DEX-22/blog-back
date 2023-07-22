<?php

namespace App\Http\Middleware;

use App\Http\Controllers\UserController;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function handle(Request $request, Closure $next)
    {
        $token = $request->bearerToken(); 
        // if ($token && $this->isValidToken($token)) {
        if ($token && UserController::validateToken($token)) {
            return $next($request);
        }

        return response()->json(['NO AUTHORIZED'],401);  //$next($request);
    }
}
