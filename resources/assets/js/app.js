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

	// Check if any inputs are invalid on page load
	function validate() {
		var id = $(this).attr('id');
		var $label = $('label[for="' + id + '"]');

		if ($label && $label.data('error')) {
			$(this).addClass('invalid');
		}
	}
	$('.validate').each(validate);

	$(document).on('click', 'button', function(event) {
		var self = $(this);
		setTimeout(function() {
			self.attr('disabled', 'disabled');
		}, 0);

		setTimeout(function() {
			self.removeAttr('disabled');
		}, 3000);
	});

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
				route = route + 'all';
				window.location.replace(route.replace($(this).attr('id'), ''));
			}
		}
	});

	$('#projects-show-btn').click(function() {
		var $ele = $('#projects-widgets');
		console.log($ele);
		if ($ele.is(':visible')) {
			$ele.addClass('hide-on-small-only');
		} else {
			$ele.removeClass('hide-on-small-only');
		}
	});

	/**
	 * Add ajax request to <a> tags with certain classname.
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
		}).fail(function(response) {
			alert('Failed retrieving information from server. Please try again later.');
			console.log(response);
		}).always(function(response) {
			self.isPending = false;
			$spinner.remove();

			window.location.replace(response.redirect ? response.redirect : '/');
		});
	});
});
