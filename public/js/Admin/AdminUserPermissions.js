var app = app || {};
(function($){
	'use strict';
	app.AdminUserPermissions = {
		getActions: function(data, target){
			//showing ajax loading
			$('div[data-loader=' + target + ']').removeClass('hidden');
			
			$.post(
				app.Admin.globalScriptBaseUrl + 'actions/ajaxGetActions',
				data
			).done(function(result){
				$('#' + target).html(result);
				
				//hiding ajax loading
				$('div[data-loader=' + target + ']').addClass('hidden');
			}).fail(function(jqXHR, textStatus, errorThrown){
				alert('Error: ' + textStatus + ' -- ' + errorThrown);
			});
		},
		activateHandlers: function(){
			var _super = this;
			$('.form-admin-permissions').on('change', '.section', function(){
				if($(this).attr('readonly'))
					return false;
					
				
				var data = {section_id: $('#' + $(this).attr('id') + ' option:selected').val()};
				
				_super.getActions(data, $(this).data('target-action'));
			});
			$('#UserIsAdmin').on('click', function(){
				if($(this).is(':checked'))
					$('.permission-panel').removeClass('hidden');
				else{
					alertify.confirm("Are you sure to revoke all privileges?", function(e){
						if(e)
							$('.permission-panel').addClass('hidden');
						else
							$('#UserIsAdmin').prop('checked', true);
					});
				}
					
			});
			$(document).on('ready', function(){
				if($('#UserIsAdmin').is(':checked'))
					$('.permission-panel').removeClass('hidden');
				else
					$('.permission-panel').addClass('hidden');
			});
			//handler to add new permissions
			$('.add-permission').on('click', function(e){
				var _super = this;
				//setting last caller which performs enable disable of permission set before it.
				var caller = $('.permissions').last().attr('id');
				//console.log(caller);
				$('#permission-caller').val(caller);
				
				$.post(
					app.Admin.globalScriptBaseUrl + 'sections/ajaxGetSections',
					$('.form-admin-permissions').serialize()
				).done(function(result){
					var elm = $(_super).parent().parent('div.form-group');
					$(result).insertBefore(elm);
					//alert('here');
					//disabling the caller item as read-only
					//console.log($('#' + caller).find('select'));
					var targetObj = $('#' + caller).find('select.section');
					if(targetObj){
						var hiddenFld = '<input type="hidden" id="' 
							+ targetObj.attr('id') + '_hidden" name="' 
							+ targetObj.attr('name') + '" value="'
							+ targetObj.val() + '" />';
						$(hiddenFld).insertBefore(targetObj);
						targetObj.attr('disabled', 'disabled');
					}
					
				}).fail(function (jqXHR, textStatus, errorThrown){
					alertify.alert('Error: ' + jqXHR.status + " - " + textStatus + " - " + errorThrown);
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
			var form = $('.form-admin-permissions');
			var errorHandler = $('.errorHandler', form);
			form.validate({
				rules: {
					"data[User][action][]": {
						required: true
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
		
		removePermissionSet: function(elmId){
			//removing the permission set
			var parentCaller = $('#' + elmId).data('caller') || null;
			
			$('#' + elmId).length ?
				$('#' + elmId).remove() :
				void(0);
			
			//if removed making the parent caller active
			if(parentCaller) {
				$('#' + parentCaller).find('select.section').prev('input[type=hidden]').remove();
				$('#' + parentCaller).find('select.section').removeAttr('disabled');
			} 
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
	app.AdminUserPermissions.init();
	
})(jQuery);