<?php

namespace App\Http\Middleware;

use Closure;

class Headers
{
    /**
     * Load headers on middleware created.
     */
    public function __construct() {
        $this->headers = config('headers');
    }

    /**
     * Set headers for response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  bool $cacheOff
     * @return \Illuminate\Http\Response
     */
    public function handle($request, Closure $next, $cacheOff)
    {
        $response = $next($request);

        foreach ($this->headers as $key => $value) {
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
