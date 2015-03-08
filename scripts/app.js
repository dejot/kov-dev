(function ($) {
  	$('.wpcf7-submit').click(function () {
	        // We remove the error to avoid duplicate errors
		$('.error').remove();
	        // We create a variable to store our error message
		var errorMsg = $('<span class="error">Die eingegebenen E-Mail-Adressen stimmen nicht überein.</span>');

	        // Then we check our values to see if they match
	        // If they do not match we display the error and we do not allow form to submit
		if ($('.your-email').find('input').val() !== $('.your-email-confirm').find('input').val()) {
			errorMsg.insertAfter($('.your-email-confirm').find('input'));

			return false;
		} else {
	                // If they do match we remove the error and we submit the form
			$('.error').remove();

			return true;
		}
	});
}(jQuery));