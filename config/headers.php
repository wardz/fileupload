<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Website Headers
    |--------------------------------------------------------------------------
    |
    | These headers will be applied to every route using the headers middleware. 
    |
    */

	'X-Robots-Tag' => 'index, follow',
	'X-Content-Type-Options' => 'nosniff',
	'X-Download-Options' => 'noopen',
	'X-Frame-Options' => 'DENY',
	'X-XSS-Protection' => '1; mode=block',
	'Access-Control-Allow-Origin' => 'false',
	'X-Powered-By' => 'REMOVE', // Delete existing header

	/*
	'Strict-Transport-Security' => 'max-age=31536000; preload',
	'Public-Key-Pins' => 'pin-sha256="' . env('PUBLIC_KEY_PINS', '') .'"; max-age="5184000"; includeSubDomains',*/

];
