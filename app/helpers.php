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
