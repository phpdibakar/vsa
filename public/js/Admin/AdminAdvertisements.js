var app = app || {};
(function($){
	'use strict';
	app.AdminAdvertisements = {
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
		
		add: {
		
		},
		
		init: function(){
			//activating all event listeners
			this.activateHandlers();
		}
	};
	
	//initializing app
	app.AdminEventLists.init();
	
})(jQuery);