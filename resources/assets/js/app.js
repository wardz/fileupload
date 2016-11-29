$(function() {
	// Initialize materialize elements
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



	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	$(document).on('click', 'a.jquery-postback', function(event) {
		event.preventDefault();

		$.ajax({
			url: $(this).data('href'),
			type: $(this).data('method')
		}).done(function(response, textStatus, xhr) {
			console.log(textStatus, xhr);
		});
	});
});
