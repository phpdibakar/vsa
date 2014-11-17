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
			});
			
			$('.date-picker').datepicker({
				autoclose: true
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