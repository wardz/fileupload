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
	'Access-Control-Allow-Origin' => 'false',
    'Referrer-Policy' => 'strict-origin',

    // Note that mode=block is a security risk in IE8, but we only
    // support IE9+ anyways
    'X-XSS-Protection' => '1; mode=block',

	'X-Powered-By' => 'REMOVE', // Delete existing header

	/*
	'Strict-Transport-Security' => 'max-age=31536000; preload',
	'Public-Key-Pins' => 'pin-sha256="' . env('PUBLIC_KEY_PIN1', '') .'";
        pin-sha256="' . env('PUBLIC_KEY_PIN2', '') .'"; max-age="5184000"; includeSubDomains',
    */

];
