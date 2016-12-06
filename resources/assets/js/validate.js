(function() {
	'use strict';

	/** Check if any inputs are invalid on page load */
	function validate() {
		var id = $(this).attr('id');
		var $label = $('label[for="' + id + '"]');

		if ($label && $label.data('error')) {
			$(this).addClass('invalid');
		}
	}
	$('.validate').each(validate);
})();
