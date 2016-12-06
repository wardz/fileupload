<?php

/**
 * Check if given URL matches current route, and return
 * active css class name.
 *
 * @param  string $url
 * @return string
 */
function isActiveUrl($url) {
	return (URL::current() === URL::to($url)) ? 'active' : '';
}

function isChecked($tag) {
	$segments = Request::segments();

	return preg_match("/$tag\b/i", $segments[count($segments)-1]);
}
