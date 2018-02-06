<?php

namespace App\Http\Middleware;

use Closure;

class YxbMiddleware
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
        if(session('Admin')->status == 2)
        {
            return redirect('/jslmadmin/index');
        }
        return $next($request);
    }
}
