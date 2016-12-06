$(document).on('change', '.tag-select', function(event) {
	var route = window.location.href;
	var tag;

	if (route.indexOf('/all') !== -1) {
		route = route.replace('/all', '/');
		tag = $(this).attr('id');
	} else {
		tag = ',' + $(this).attr('id');
	}

	if (this.checked) {
		window.location.replace(route + tag);
	} else {
		if (route.indexOf(tag) !== -1) {
			window.location.replace(route.replace(tag, ''));
		} else {
			route = route.replace($(this).attr('id'), '');
			if (route.slice(-1) === '/') route += 'all';
			window.location.replace(route);
		}
	}
});
