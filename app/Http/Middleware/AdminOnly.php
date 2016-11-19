<?php

namespace App\Http\Middleware;

use Closure;

// TODO rename hasRole or something
// and use middleware('hasRole:guest') and so on to check permissions
class AdminOnly
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
        return ($request->user()->is_admin) ? $next($request) : redirect('/');
    }
}
