var app = app || {};
(function($){
	'use strict';
	app.AdminEvents = {
		activateHandlers: function(){
			var _super = this;
			$('.time-picker').timepicker();
			$('.date-picker').datepicker({
				autoclose: true
			});
			
			//handler to uncover custom event or music type accepting text boxes when clicking others
			$('.event-categories, .event-music-categories').on('click', function(){
				if($(this).find('label').text() == 'Other'){
					var chk = $(this).find('input[type=checkbox]').is(':checked');
					if($(this).hasClass('event-categories')){
						chk ? $('.event-custom-type-text').removeClass('hidden') : $('.event-custom-type-text').addClass('hidden');
					}else if($(this).hasClass('event-music-categories')){
						chk ? $('.music-custom-type-text').removeClass('hidden') : $('.music-custom-type-text').addClass('hidden');
					}	
				}
			});
			
			//handler to uncover the same as above when page loads
			$(document).on('ready', function(){
				//getting list of checked items for both music and event categories
				$('.event-categories, .event-music-categories').each(function(i){
					var val = $(this).find('label').text();
					var chk = $(this).find('input[type=checkbox]').is(':checked');
					if(val == 'Other'){
						if($(this).hasClass('event-categories')){
							chk ? $('.event-custom-type-text').removeClass('hidden') : $('.event-custom-type-text').addClass('hidden');
						}else if($(this).hasClass('event-music-categories')){
							chk ? $('.music-custom-type-text').removeClass('hidden') : $('.music-custom-type-text').addClass('hidden');
						}
					}
				});
			});
			
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
		
		runSettingsValidator : function () {
			var form = $('.form-admin-settings');
			var errorHandler = $('.errorHandler', form);
			form.validate({
				rules: {
					"data[Setting][site_name]": {
						required: true
					},
					"data[Setting][copyright]": {
						required: true
					},
					"data[Setting][admin_email]": {
						required: true,
						email: true
					}
				},
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
			this.runSettingsValidator();
		}
		
	};
	
	//initializing app
	app.AdminEvents.init();
	
})(jQuery);