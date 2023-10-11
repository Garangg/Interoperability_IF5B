<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware{
    public function handle($request, Closure $next){
        if(!($request->input('role') == 'admin')){
            return response('Unauthorized.', 401);
        }
        return $next($request);
    }
}