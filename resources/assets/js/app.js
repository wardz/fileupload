/*window.$ = window.jQuery = require('jquery');
window.hammerjs = require('hammerjs');*/

$(function() {
    $('#select_tag').material_select();
    $(".button-collapse").sideNav();

	function validate() {
		var id = $(this).attr('id');
		var $label = $('label[for="' + id + '"]');

		if ($label && $label.data('error')) {
			$(this).addClass('invalid');
		}
	}

	//$('.validate').on('keypress', validate);
	$('.validate').each(validate);
});