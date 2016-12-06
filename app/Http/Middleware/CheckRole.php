<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $roleType = '')
    {
        if ($roleType !== 'owner') {
            return $request->user()->hasRole($roleType) ? $next($request) : redirect('/');
        } else {
            return $request->project->userOwned() ? $next($request) : redirect('/');
        }
    }
}
