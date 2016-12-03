// Ajax configuration
$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
});

$(function() {
	// Initialize Materialize elements
	$('#select_tag').material_select();
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

	/**
	 * Add ajax request to <a> tags with certain classname.
	 * 
	 * @param Event event
	 */
	$(document).on('click', 'a.jquery-postback', function(event) {
		event.preventDefault();

		$.ajax({
			url: $(this).data('href'),
			type: $(this).data('method'),
			dataType: 'json'
		}).error(function(response) {
			alert('Failed retrieving information from server. Please try again later.');
			console.log(response);
		}).always(function(response) {
			if (response.redirect) {
				window.location.replace(response.redirect);
			}
		});
	});
});
