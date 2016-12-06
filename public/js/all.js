// Ajax configuration
$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
});

$(function() {
	// Initialize Materialize elements
	$('select').material_select();
	$(".button-collapse").sideNav();

	/**
	 * Temporarily disable button on click to prevent sending
	 * any unnecessary requests.
	 *
	 * @param Event event
	 */
	$(document).on('click', 'button', function(event) {
		var self = $(this);

		// Async disable to make form submit work
		setTimeout(function() {
			self.attr('disabled', 'disabled');
		}, 0);

		setTimeout(function() {
			self.removeAttr('disabled');
		}, 2500);
	});

	/**
	 * Toggle visibility of projects browse widgets on small screens.
	 */
	$('#projects-show-btn').click(function() {
		var $ele = $('#projects-widgets');

		if ($ele.is(':visible')) {
			$ele.addClass('hide-on-small-only');
		} else {
			$ele.removeClass('hide-on-small-only');
		}
	});

	/**
	 * Add ajax request to <a> tags.
	 *
	 * @param Event event
	 */
	$(document).on('click', 'a.jquery-postback', function(event) {
		var self = $(this);
		event.preventDefault();

		if (self.isPending) return;
		self.isPending = true;

		$spinner = $('<div class="progress"><div class="indeterminate"></div></div>');
		$spinner.insertAfter(self);

		$.ajax({
			url: self.data('href'),
			type: self.data('method'),
		})
		.done(function(response) {
			self.isPending = false;
			$spinner.remove();

			window.location.replace(response.redirect ? response.redirect : '/');
		});
	});
});

function getCurrentRoute() {
	var location = window.location.href;
	return location.substr(0, location.lastIndexOf('/') + 1);
}

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
		tags: params.split(','),
		query: query
	}
}

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
		params.tags.splice( $.inArray($(this).attr('id'), params.tags), 1);
	}

	window.location.replace(route + params.tags.join(','));
});

// Check if any inputs are invalid on page load
function validate() {
	var id = $(this).attr('id');
	var $label = $('label[for="' + id + '"]');

	if ($label && $label.data('error')) {
		$(this).addClass('invalid');
	}
}
$('.validate').each(validate);
