var app = app || {};
(function($){
	'use strict';
	app.AdminMusics = {
		activateHandlers: function(){
			var _super = this;

		},
		
		runDefaultValidation : function () {
			$.validator.setDefaults({
				errorElement: "span", // contain the error msg in a small tag
				errorClass: 'help-block',
				errorPlacement: function (error, element) { // render error placement for each input type
					if (element.attr("type") == "radio" || element.attr("type") == "checkbox") { // for chosen elements, need to insert the error after the chosen container
						error.insertAfter($(element).closest('.form-group').children('div').children().last());
					} else if (element.attr("name") == "card_expiry_mm" || element.attr("name") == "card_expiry_yyyy") {
						error.appendTo($(element).closest('.form-group').children('div'));
					} else {
						error.insertAfter(element);
						// for other inputs, just perform default behavior
					}
				},
				ignore: ':hidden',
				highlight: function (element) {
					$(element).closest('.help-block').removeClass('valid');
					// display OK icon
					$(element).closest('.form-group').removeClass('has-success').addClass('has-error').find('.symbol').removeClass('ok').addClass('required');
					// add the Bootstrap error class to the control group
				},
				unhighlight: function (element) { // revert the change done by hightlight
					$(element).closest('.form-group').removeClass('has-error');
					// set error class to the control group
				},
				success: function (label, element) {
					label.addClass('help-block valid');
					// mark the current input as valid and display OK icon
					$(element).closest('.form-group').removeClass('has-error');
				},
			});
		},
		
		runMusicValidator : function () {
			var form = $('#MusicAdminAddForm, #MusicAdminEditForm');
			var errorHandler = $('.errorHandler', form);
			form.validate({
				submitHandler: function (form) {
					errorHandler.hide();
					form.submit();
				},
				invalidHandler: function (event, validator) { //display error alert on form submit
					errorHandler.show();
				}
			});
		},
		
		init: function(){
			//activating all event listeners
			this.activateHandlers();
			//executing default form validation pre-requisite
			this.runDefaultValidation();
			//attaching profile form validation
			this.runMusicValidator();
		}
		
	};
	
	//initializing app
	app.AdminMusics.init();
	
})(jQuery);