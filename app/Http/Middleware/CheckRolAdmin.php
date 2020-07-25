<?php

namespace App\Http\Middleware;

use Closure;

class CheckRolAdmin
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
        if (auth()->user()->mroles->nombre == 'administrador') {
            return $next($request);
            //return redirect('/admin');
        }
        
        return redirect('/');
    }
}
