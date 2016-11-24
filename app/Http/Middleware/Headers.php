<?php

namespace App\Http\Middleware;

use Closure;

class Headers
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $cacheOff)
    {
        $response = $next($request);

        foreach (config('headers') as $key => $value) {
            if ($value !== 'REMOVE') {
                $response->header($key, $value);
            } else {
                header_remove($key);
            }
        }

        if ($cacheOff) {
            $response->header('Cache-Control', 'no-store, no-cache, must-revalidate, proxy-revalidate');
            $response->header('X-Robots-Tag', 'none');
        }

        return $response;
    }
}
