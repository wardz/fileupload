(function() {
	'use strict';

	/**
	 * Get full url path until parameters.
	 *
	 * @return string
	 */
	function getCurrentRoute() {
		var location = window.location.href;
		return location.substr(0, location.lastIndexOf('/') + 1);
	}

	/**
	 * Get list of supported route parameters.
	 *
	 * @return Object
	 */
	function getRouteParams() {
		var location = window.location.href;
		var params = location.substr(location.lastIndexOf('/') + 1, location.length);
		var query;

		if (params.indexOf('?page=') !== -1) {
			var index = params.indexOf('?page=');
			// Store query string in new var
			query = params.substr(index, params.length);
			// Delete query string from params var
			params = params.substr(0, index);
		}

		return {
			tags: params.split(','), // csv to array
			query: query
		}
	}

	/**
	 * Append or remove tag to url on checkbox checked.
	 */
	$(document).on('change', '.tag-select', function(event) {
		var route = getCurrentRoute();
		var params = getRouteParams();

		// Remove 'all' param once a tag has been selected
		if (this.checked && params.tags[0] === 'all') {
			params.tags[0] = '';
		} else if (params.tags.length <= 0) {
			// Re-add 'all' param if no tags are selected again
			params.tags[0] = 'all';
		}

		if (this.checked) {
			params.tags.push($(this).attr('id'));
		} else {
			// Remove tag from array
			params.tags.splice( $.inArray($(this).attr('id'), params.tags), 1);
		}

		window.location.replace(route + params.tags.join(',')); // array to csv
	});
})();
