var app = app || {};
(function($){
	'use strict';
	app.AdminGalleries = {
		//current gallery id
		galleryId: 0,
		
		mode: 'add',

		galleryForm: $('#GalleryAdminAddForm, #GalleryAdminEditForm'),
		
		activateHandlers: function(){
			var _super = this;
			$('.next-step').on('click', function(){
				//alert();
				if(_super.galleryForm.valid()){
					 _super.ajaxSubmitData(); //submitting records
				}
				return false;
			});
		
			$('.finish-step').on('click', function(){
				$.getJSON(app.Config.getScriptBaseUrl() + 'gallery_photos/json_count_photos/' + _super.galleryId)
					.done(function(result){
						if(result['count'] && !isNaN(result['count']) && result['count'] >= 1){
							 _super.ajaxSubmitData(true, app.Config.getScriptBaseUrl() + 'admin/galleries/index');
						}else{
							alertify.alert('You should upload at-least one photo');
						}
					}).fail(function(jqXHR, responseText, errorThrown){
						alertify.alert('Error: ' + jqXHR.status + " : " + responseText + ' ' + errorThrown);
					});
			
			})
		},
		
		//submits and save the details and initialize the photo uploader
		ajaxSubmitData: function(redirect, redirectUrl){
			redirect = redirect === undefined ? false : redirect;
			redirectUrl = redirectUrl === undefined ? null : redirectUrl;
			var _super = this;
			
			
			_super.galleryForm.ajaxSubmit({
				url: _super.mode == 'edit' ? _super.galleryForm.attr('action') + '/' + _super.galleryId : _super.galleryForm.attr('action'),
				success: function(responseText, statusText, xhr, $form){
					//if redirect and redirect url is set redirect the page other wise process the output
					if(redirect && redirectUrl){
						window.location.href = redirectUrl;
						return;
					}
					
					responseText = JSON.parse(responseText);
					if(responseText['id'] && !isNaN(responseText['id'])){
						//setting submission id only when add mode
						if(_super.mode == 'add'){
							_super.galleryId = responseText['id'] ? responseText['id']: 0;
						}
						//setting submission id and making it as a edit mode
						_super.mode = 'edit';
						_super.getUploadedImages(_super.galleryId);
						
						//making upload panel visible
						$('.upload-panel').removeClass('hidden');
					}else{
						var validationErrors = '';
						for(var key in responseText){
							validationErrors += key.toUpperCase() + ':' + responseText[key] + "<br />";
						}
						//console.log(validationErrors);
						alertify.alert(validationErrors);
					}
				}
			});
		},
		
		getUploadedImages: function(galleryId){
			// Initialize the jQuery File Upload widget:
			$('#fileupload').fileupload({
				// Uncomment the following to send cross-domain cookies:
				//xhrFields: {withCredentials: true},
				url: app.Config.getScriptBaseUrl() + 'gallery_photos/uploadAjaxImages/' + galleryId,
				acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
			});
			// Load existing files:
			$('#fileupload').addClass('fileupload-processing');
			$.ajax({
				// Uncomment the following to send cross-domain cookies:
				//xhrFields: {withCredentials: true},
				url: app.Config.getScriptBaseUrl() + 'gallery_photos/loadAjaxUploadedImages/' + galleryId + '/',
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
		
		runSettingsValidator : function () {
			var form = this.galleryForm;
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
	app.AdminGalleries.init();
	
})(jQuery);