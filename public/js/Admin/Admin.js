var app = app || {};
(function($){
	app.Admin = {
		//simple function to check the global script base path
		showLocation: function(){
			alert(app.Config.getScriptBaseUrl());
		},
		//global script execution path
		globalScriptBaseUrl: app.Config.getScriptBaseUrl(),
		
		highLightleftMenu: function(rel){
			$('.main-navigation-menu li[rel=' + rel + ']').addClass('open active');
		},
		
		highLightleftMenuChild: function(rel, boolMultiLevel, childRel){
			boolMultiLevel = boolMultiLevel === undefined ? false : boolMultiLevel;
			childRel = childRel === undefined ? '' : childRel;
			if(boolMultiLevel){
				 $('.main-navigation-menu li[rel=' + rel + ']').addClass('open active');
				 $('.main-navigation-menu li[rel=' + rel + ']>ul.sub-menu').show('slow');
				 $('.main-navigation-menu li[rel=' + rel + ']').find('li[rel=' + childRel + ']').addClass('active');
			}else
				$('.main-navigation-menu li[rel=' + rel + ']').addClass('active');
		},
	}

})(jQuery);