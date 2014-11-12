var app = app || {};
(function($){
	'use strict';
	app.AdminEventLists = {
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
		},
		
		init: function(){
			//activating all event listeners
			this.activateHandlers('leftmenu-root-events');
			//highlight current section root item on the left menu
			app.Admin.highLightleftMenu('leftmenu-root-events');
			//highlight current section child item on the left menu
			app.Admin.highLightleftMenuChild('leftmenu-child-events-list');
		}
		
	};
	
	//initializing app
	app.AdminEventLists.init();
	
})(jQuery);