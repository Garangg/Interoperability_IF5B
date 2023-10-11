<?php

namespace App\Http\Middleware;

use Closure;

class UserMiddleware
{
    public function handle($request, Closure $next){
        if(!($request->input('role') == 'user')){
            return response('Unauthorized.', 401);
        }
        return $next($request);
    }
}