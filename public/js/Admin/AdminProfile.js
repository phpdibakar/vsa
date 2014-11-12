var app = app || {};
(function($){
	'use strict';
	app.AdminProfile = {
		getStates: function(data, target){
			//showing ajax loading
			$('div[data-loader=' + target + ']').removeClass('hidden');
			
			$.post(
				app.Admin.globalScriptBaseUrl + 'states/ajaxGetStates',
				data
			).done(function(result){
				$('.' + target).html(result);
				
				//hiding ajax loading
				$('div[data-loader=' + target + ']').addClass('hidden');
			}).fail(function(jqXHR, textStatus, errorThrown){
				alert('Error: ' + textStatus + ' -- ' + errorThrown);
			});
		},
		activateHandlers: function(){
			var _super = this;
			$('.country').on('change', function(){
				var data = {country_id: $('#' + $(this).attr('id') + ' option:selected').val()};
				console.log($('#' + $(this).attr('id')));
				
				_super.getStates(data, 'states');
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
			//adding phone number rule
			$.validator.addMethod("phone_validation", function(value, element) {
				return this.optional(element) || /^\(\d{3}\) ?\d{3}( |-)?\d{4}|^\d{3}( |-)?\d{3}( |-)?\d{4}/.test(value);
			}, "Phone number ### - ### - ####");
			//adding zip validation rule
			$.validator.addMethod("zip_validation", function(value, element) {
				return this.optional(element) || /^((\d{5}-\d{4})|(\d{5})|([AaBbCcEeGgHhJjKkLlMmNnPpRrSsTtVvXxYy]\d[A-Za-z]\s?\d[A-Za-z]\d))$/.test(value);
			}, 	"Postal code should be like A1A 1A1");
			//adding password nomenclature rule
			$.validator.addMethod("password_strength", function(value, element) {
				return this.optional(element) || /^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])([a-zA-Z0-9]{8,})$/.test(value);
			}, "Password must follow requirements.");
			
		},
		
		runProfileValidator : function () {
			var form = $('.form-admin-profile');
			var errorHandler3 = $('.errorHandler', form);
			form.validate({
				rules: {
					"fname": {
						required: true
					},
					"lname": {
						required: true
					},
					"gender_id": {
						required: true
					},
					"profile[home_phone]": {
						required: true,
						number: true,
						minlength: 10,
						maxlength: 12
					},
					"profile[address]": {
						required: true,
					},
					"profile[country_id]": {
						required: true
					},
					"profile[state_id]": {
						required: true
					},
					"profile[zip]": {
						required: true,
						zip_validation: true
					},
				},
				submitHandler: function (form) {
					errorHandler3.hide();
					form.submit();
				},
				invalidHandler: function (event, validator) { //display error alert on form submit
					errorHandler3.show();
				}
			});
		},
		
		runPasswordValidator : function () {
			var form = $('.form-admin-profile-email');
			var errorHandler = $('.errorHandler', form);
			form.validate({
				rules: {
					"email": {
						required: true,
						email: true
					},
					"conf_email": {
						required: true,
						email: true,
						equalTo: '#email'
					},
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
		
		runLoginEmailValidator : function () {
			var form = $('.form-admin-profile-password');
			var errorHandler = $('.errorHandler', form);
			form.validate({
				rules: {
					"current_password": {
						minlength: 2,
						required: true
					},
					"password": {
						required: true,
						password_strength: true
					},
					"conf_password": {
						required: true,
						equalTo: '#UserPassword'
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
		
		highLightCurrentTab: function(tabName){
			$('#myTab4 a[rel=' + tabName + ']').tab('show')
			//$('li[rel=' + tabName + ']').click();
		},
		
		highLightleftMenu: function(){
			$('.main-navigation-menu li[rel=leftmenu-root-dashboard]').addClass('open active');
			//$('li[rel=' + tabName + ']').click();
		},
		
		init: function(){
			//activating all event listeners
			this.activateHandlers();
			//executing default form validation pre-requisite
			this.runDefaultValidation();
			//attaching profile form validation
			this.runProfileValidator();
			//attaching password update form validation
			this.runPasswordValidator();
			//attaching login email validation
			this.runLoginEmailValidator();
			//highlight current section on the left menu
			this.highLightleftMenu();
		}
		
	};
	//app.AdminProfile.showLocation();
	
	//initializing app
	app.AdminProfile.init();
	
})(jQuery);