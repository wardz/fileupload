<?php

if (! function_exists('isActiveUrl')) {
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
}

if (! function_exists('isChecked')) {
	/**
	 * See if checkbox has been checked by searching for
	 * checkbox's value in last url segment. (Checked checkboxes are appended to URL)
	 *
	 * @param  string  $tag
	 * @return boolean
	 */
	function isChecked($tag) {
		$segments = Request::segments();

		return preg_match("/$tag\b/i", $segments[count($segments)-1]);
	}
}
