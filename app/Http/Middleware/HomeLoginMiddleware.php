<?php

namespace App\Http\Middleware;

use Closure;

class HomeLoginMiddleware
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
        if( !\session('Home') )
        {
            return redirect('/newpro/login')->with(['info'=>'未登入']);
        }
        return $next($request);
    }
}
