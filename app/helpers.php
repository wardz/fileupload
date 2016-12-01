<?php

function isActiveUrl($url) {
	return (URL::current() == URL::to($url)) ? 'active' : '';
}
