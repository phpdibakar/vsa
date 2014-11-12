var app = app || {};
(function($){
	'use strict';
	app.AdminIndex = {
		activateHandlers: function(){
			var _super = this;
		},
		
		highLightleftMenu: function(){
			$('.main-navigation-menu li[rel=leftmenu-root-dashboard]').addClass('open active');
			//$('li[rel=' + tabName + ']').click();
		},
		
		init: function(){
			//activating all event listeners
			this.activateHandlers();
			//highlight current section on the left menu
			this.highLightleftMenu();
		}
		
	};
	
	//initializing app
	app.AdminIndex.init();
	
})(jQuery);