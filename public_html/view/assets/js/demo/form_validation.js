/*
 * form_validation.js
 *
 * Demo JavaScript used on Validation-pages.
 */

"use strict";

$(document).ready(function(){

	//===== Validation =====//
	// @see: for default options, see assets/js/plugins.form-components.js (initValidation())

	$.extend( $.validator.defaults, {
		invalidHandler: function(form, validator) {
			var errors = validator.numberOfInvalids();
			if (errors) {
				var message = errors == 1
				? 'Existe 1 campo que não foi preenchido, favor verificar.'
				: 'Existem ' + errors + ' campos que não foram preenchidos, favor verificar.';
				noty({
					text: message,
					type: 'error',
					timeout: 5000
				});
			}
		}
	});

	$("#validate-1").validate();
	$("#validate-2").validate();
	$("#validate-3").validate();
	$("#validate-4").validate();

});