<?php

namespace App\Http\Middleware;

use Closure;


// middleware('role:guest')
class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $roleType)
    {
        return ($request->user()->hasRole($roleType)) ? $next($request) : redirect('/');
    }
}
