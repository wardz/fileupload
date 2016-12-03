<?php

/**
 * Check if given URL matches current route/url.
 * 
 * @param  string $url
 * @return boolean
 */
function isActiveUrl($url) {
	return (URL::current() == URL::to($url)) ? 'active' : '';
}
