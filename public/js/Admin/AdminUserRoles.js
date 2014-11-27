var app = app || {};
(function($){
	'use strict';
	app.AdminUserRoles = {
		activateHandlers: function(){
			var _super = this;
			
			//code to handle bootstrap select picker for the specified class group
			try{
				$('.selectpicker').selectpicker();
			}catch(error){
				console.log(error.message);
			}
			
			//code to select and deselect all items by one checkbox
			//required jquery iCheck plugin
			try{
				//check all
				$('#user-role-select-all').on('ifChecked', function(event){
					$('input.user-role').iCheck('check');
				});
				
				//uncheck all
				$('#user-role-select-all').on('ifUnchecked', function(event){
						$('input.user-role').iCheck('uncheck');
				});
				
				//delete all handler
				$('#shift-category-delete-all').on('click', function(event){
					
					if($('input.user-role:checked').length){
						alertify.set({ buttonFocus: "cancel" });
						alertify.confirm('Are you sure to delete?', function (e) {
							if(e){
								
								//getting all selected ids
								var $ids = '';
								$('input.user-role:checked').each(function(i){
									$ids += $(this).val() + ',';
								});
								
								if($ids.length > 1)
									$ids = $ids.substring(0, $ids.length-1);
								
								$('#role-ids').val($ids);
								$('#user-role-multi-delete').submit();
							}
						});
					}else
						alertify.alert('Please select at least one item');
				});
				
				//handler to visible / invisible permission and rank upon public / private sign up type
				$('.role-public').on('ifChecked', function(event){
					var $id = $(this).data('id') || 0;
					if(parseInt($(this).val())){
						$('#role-permission-active-' + $id).removeClass('hidden');
						$('#role-permission-inactive-' + $id).addClass('hidden');
						$('#role-rank-active-' + $id).removeClass('hidden');
						$('#role-rank-inactive-' + $id).addClass('hidden');
					}else{
						$('#role-permission-active-' + $id).addClass('hidden');
						$('#role-permission-inactive-' + $id).removeClass('hidden');
						$('#role-rank-active-' + $id).addClass('hidden');
						$('#role-rank-inactive-' + $id).removeClass('hidden');
					}
				});
				
				//handles to auto select row checkbox when any of its fields are changed
				$('.data-list select, .data-list input').on('change ifChecked ifUnchecked', function(event){
					var $id = $(this).data('id') || 0;
					$('[id=' + $id + ']').iCheck('check');
					
					//checking all checkbox when all check boxes are checked
					if($('input.user-role').length == $('input.user-role:checked').length)
						$('#user-role-select-all').iCheck('check');
				});
				
				//handles auto select/deselect all check boxes
				$('input.user-role').on('ifCheck ifUnchecked', function(event){
					if($('input.user-role').length == $('input.user-role:checked').length)
						$('#user-role-select-all').iCheck('check');
					else
						$('#user-role-select-all').iCheck('indeterminate');
				});
				
			}catch(error){
				console.log(error.message);
			}
			
			//code to handle pagination limit
			$('#pagination-per_page').on('change', function(){
				var value = $(this).val();
				window.location.href= app.Config.getScriptBaseUrl() + 
					app.Config.adminPrefix + 
					'/users/role-list?limit=' + value;
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
		
		runRoleAddValidator : function () {
			var form = $('.form-admin-user-roles');
			var errorHandler = $('.errorHandler', form);
			form.validate({
				rules: {
					"name": {
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
		
		runRoleUpdateValidator : function () {
			var form = $('#form-admin-user-update-roles');
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
			//attaching role add validation
			this.runRoleAddValidator();
			//attaching role update validation
			this.runRoleUpdateValidator();
		}
		
	};
	
	//initializing app
	app.AdminUserRoles.init();
	
})(jQuery);