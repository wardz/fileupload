window.$ = window.jQuery = require('jquery');
window.hammerjs = require('hammerjs');
//window.Materialize = require('./materialize');


$(function() {
	function validate() {
		var id = $(this).attr('id');
		var $label = $('label[for="' + id + '"]');

		if ($label && $label.data('error')) {
			console.log(id);
			$(this).addClass('invalid');
		}
	}

	//$('.validate').on('keypress', validate);
	$('.validate').each(validate);
});