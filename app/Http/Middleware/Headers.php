<?php

namespace App\Http\Middleware;

use Closure;

class Headers
{
    protected $headers;

    /**
     * The URIs that should have cache & index off.
     *
     * @var array
     */
    protected $except = [
        'login',
        'password',
        'password/reset',
    ];

    /**
     * Load headers on middleware created.
     */
    public function __construct()
    {
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
    public function handle($request, Closure $next, $cacheOff = false)
    {
        $response = $next($request);

        if (!isset($response->header)) {
            // Certain \Response objects doesn't have header method
            return $response;
        }

        foreach ($this->headers as $key => $value) {
            if ($value !== 'REMOVE') {
                $response->header($key, $value);
            } else {
                header_remove($key);
            }
        }

        if ($cacheOff || isset($this->except[$request->path()])) {
            $response->header('Cache-Control', 'no-store, no-cache, must-revalidate, proxy-revalidate');
            $response->header('X-Robots-Tag', 'noindex, nofollow');
        }

        return $response;
    }
}
