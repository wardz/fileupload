// Ajax configuration
$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
});

$(function() {
	'use strict';

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
