var app = app || {};
(function(){
	'use strict';
	app.Config = {
		scriptHost : window.location.hostname,
		scriptProtocol: window.location.protocol,
		
		//need to be changed on production or staging
		scriptHostSuffix : '/',
		
		//admin routing prefix
		adminPrefix: 'admin',
		
		getScriptBaseUrl: function(){
			return this.scriptProtocol + '//' + this.scriptHost + this.scriptHostSuffix;
		}
	};
	
})();