var app = app || {};
(function($){
	'use strict';
	app.AdminUserView = {
		
		init: function(){
			//highlight current section root item on the left menu
			app.Admin.highLightleftMenu('leftmenu-root-users');
		}
	};
	
	//initializing app
	app.AdminUserView.init();
	
})(jQuery);