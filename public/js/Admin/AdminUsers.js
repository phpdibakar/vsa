var app = app || {};
(function($){
	'use strict';
	app.AdminUsers = {
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
				
				_super.getStates(data, 'states');
			});
			$(document).on('ready', function(){
				var data = {country_id: $('.country option:selected').val()};
				
				_super.getStates(data, 'states');
				
				/*
				* triggering blur events and already selected
				* contact type when page refreshes 
				* for the already entered contact numbers
				*/
				
				$('.phone').trigger('blur');
				$('#default_cno_type').val($('input.preferred:checked').data('default-cno-type') || '');
			});
			
			$('.date-picker').datepicker({
				autoclose: true
			});
			
			$('.phone').on('blur', function(e){
				var regExp = /^(\+[1-9][0-9]*(\([0-9]*\)|-[0-9]*-))?[0]?[1-9][0-9\- ]*$/;
				//console.log(regExp.test($(this).val()));
				var validated = regExp.test($(this).val());
				var targetRadioId = $(this).data('default-radio-id') || null;
				
				try{
					if(validated){
						$('#' + targetRadioId).val($(this).val());
						$('#' + targetRadioId).iCheck('enable');
					}else{
						$('#' + targetRadioId).val('');
						$('#' + targetRadioId).iCheck('uncheck');
						$('#' + targetRadioId).iCheck('disable');
					}
				}catch(error){
					console.log(error);
				}
				
				/* 
				* again checking at least one cno is selected 
				* otherwise default home cno is being selected
				*/
				console.log($('.preferred:checked').length);
				if(!$('.preferred:checked').length){
					$('#default-home').iCheck('enable');
					$('#default-home').iCheck('check');
				}
			});
			
			$('.preferred').on('ifChecked', function(){
				var value = $(this).data('default-cno-type') || '';
				$('#default_cno_type').val(value);
			});
		},
		
		init: function(){
			//activating all event listeners
			this.activateHandlers();
		}
		
	};
	
	//initializing app
	app.AdminUsers.init();
	
})(jQuery);