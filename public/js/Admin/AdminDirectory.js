var app = app || {};
(function($){
	'use strict';
	app.AdminDirectory = {
		activateHandlers: function(){
			var _super = this;
		},
		
		init: function(){
			//activating all event listeners
			this.activateHandlers();
		}
	};
	
	//initializing app
	app.AdminDirectory.init();
	
})(jQuery);