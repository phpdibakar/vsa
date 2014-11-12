var app = app || {};
(function($){
	'use strict';
	app.AdminStarletLists = {
		activateHandlers: function(){
			var _super = this;
			$('.delete-confirm').on('click', function(){
				var url = $(this).data('url') || '';
				var message = $(this).data('message') || '';
				alertify.set({ buttonFocus: "cancel" });
				alertify.confirm(message, function (e) {
					if(e){
						$('#delete-post').attr('action', url).submit();
					}
				});
			});
			
			$('.activation').on('click', function(e){
				e.preventDefault();
				
				var $starletId = $(this).data('starlet-id') || 0;
				$('#starletActivation').modal({
					remote: app.Admin.globalScriptBaseUrl + 'admin/starlets/activation/' + $starletId,
					keyboard: false,
					//show: true
				});
			});
			
			//clearing data when bootstrap modal closed to prevent caching
			$('body').on('hidden.bs.modal', '.modal', function () {
				$(this).removeData('bs.modal');
			});
		},
		
		init: function(){
			//activating all event listeners
			this.activateHandlers();
			//highlight current section root item on the left menu
			app.Admin.highLightleftMenu('leftmenu-root-starlets');
			//highlight current section child item on the left menu
			app.Admin.highLightleftMenuChild('leftmenu-child-starlets-list');
		}
		
	};
	
	//initializing app
	app.AdminStarletLists.init();
	
})(jQuery);