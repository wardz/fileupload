<?php

namespace App\Http\Middleware;

use Closure;

class Role
{
    // TODO set in config
    protected $roles = [
        'banned' => 0,
        'default' => 1,
        'moderator' => 2,
        'admin' => 3,
    ];

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
            return ($request->user()->hasRole($this->roles[$roleType])) ? $next($request) : redirect('/');
        } else {
            return $request->project->userOwned() ? $next($request) : redirect('/');
        }
    }
}
