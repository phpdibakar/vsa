var app = app || {};
(function($){
	'use strict';
	app.AdminEditTiles = {
		customCommandId: 0,
		
		configForm: $('.form-home-block-edit'),
		
		activateHandlers: function(){
			var _super = this;
			$('.color-palette').colorPalette()
            .on('selectColor', function (e) {
                $(e.currentTarget).parents('div.input-group').find('input[type=text]').val(e.color);
				//$('#selected-color1').val(e.color);
            });
		},
			
		getUploadedImages: function(tileId){
			// Initialize the jQuery File Upload widget:
			var _super = this;
			$('#fileupload').fileupload({
				// Uncomment the following to send cross-domain cookies:
				//xhrFields: {withCredentials: true},
				url: app.Config.getScriptBaseUrl() + 'homes/uploadAjaxImages/' + tileId,
				acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
			});
			// Load existing files:
			$('#fileupload').addClass('fileupload-processing');
			$.ajax({
				// Uncomment the following to send cross-domain cookies:
				//xhrFields: {withCredentials: true},
				url: app.Config.getScriptBaseUrl() + 'homes/loadAjaxUploadedImages/' + tileId + '/',
				dataType: 'json',
				context: $('#fileupload')[0]
			}).always(function () {
				$(this).removeClass('fileupload-processing');
			}).done(function (result) {
				$(this).fileupload('option', 'done')
					.call(this, $.Event('done'), {result: result});
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
		
		runValidator : function () {
			var form = this.configForm;
			var errorHandler = $('.errorHandler', form);
			var _super = this;
			form.validate({
				submitHandler: function(form){
					
					$(form).ajaxSubmit({
						success: function(result){
							result = JSON.parse(result);
							//console.log(result['id'] !== undefined);
							if(result['id'] !== undefined){
								_super.controlCustomImageUploader(result['id']);
								if($('#HomeHomeConfigId option:selected').val() != _super.customCommandId){
									alertify.alert('Settings Saved Successfully!');
								}else
									alertify.alert('Settings Saved Successfully! please upload / manage photos below:');
							}else if(result['error'] !== undefined){
								alertify.alert(result['error']);
							}
						}
					
					});
				
				},
				invalidHandler: function (event, validator) { //display error alert on form submit
					errorHandler.show();
				}
			});
		},
		
		controlCustomImageUploader: function(recordId) {
			if($('#HomeHomeConfigId option:selected').val() == this.customCommandId){
				if($('#custom-image-upload').hasClass('hidden')){
					$('#custom-image-upload').removeClass('hidden');
					this.getUploadedImages(recordId);
				}
			}else{
				$('#custom-image-upload').addClass('hidden');
			}
		},
		
		init: function(){
			//activating all event listeners
			this.activateHandlers();
			this.runDefaultValidation();
			this.runValidator();
		}
		
	};
	
	//initializing app
	app.AdminEditTiles.init();
	
})(jQuery);