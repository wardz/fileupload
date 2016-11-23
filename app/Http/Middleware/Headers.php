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
        $response->header('X-Content-Type-Options', 'nosniff');
        $response->header('X-Download-Options', 'noopen');
        $response->header('X-Frame-Options', 'DENY');
        $response->header('Access-Control-Allow-Origin', 'false');
        $response->header('X-XSS-Protection', '1; mode=block');

        header_remove('X-Powered-By');

        /*$response->header('Content-Security-Policy', config('app.cspolicy'));
        $response->header('Strict-Transport-Security', 'max-age=31536000; preload');
        $response->header('Public-Key-Pins', 'pin-sha256=""; pin-sha256=""; max-age="5184000"; includeSubDomains');*/

        if ($cacheOff) {
            $response->header('Cache-Control', 'no-store, no-cache, must-revalidate, proxy-revalidate');
            $response->header('X-Robots-Tag', 'none');
            $response->header('X-DNS-Prefetch-Control', 'off');
        } else {
            $response->header('X-Robots-Tag', 'index, follow');
            //$response->header('Cache-Control', 'private, max-age=0');
        }

        return $response;
    }
}
