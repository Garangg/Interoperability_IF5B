<?php

namespace App\Http\Middleware;

use Closure;

class UserMiddleware
{
    public function handle($request, Closure $next)
    {
        if ($request->input('role') == 'user') {
            return redirect('home');
        }
        return $next($request);
    }
}