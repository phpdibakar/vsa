var app = app || {};
(function($){
	'use strict';
	app.AdminEventView = {
		//object container to hold weather data
		weatherJSON: {},
		//
		getWeatherJSON: function(zipcode, startDate, startTime){
			var _super = this;
			var startDate = new Date(startDate);
			$.ajax({
				url: app.Config.getWeatherAPIBaseUrl() + zipcode + '.json',
				dataType: 'jsonp',
				success: function(result){
					_super.weatherJSON = result;
					_super.populateWeather();
					var WeatherView = new app.Event.WeatherView({model:app.Event.Weather});
					WeatherView.getWhere({day:startDate.getDate(), month: startDate.getMonth() + 1, year: startDate.getFullYear()});
					/* 
					_.each(result['forecast']['simpleforecast']['forecastday'], function(key, value){
						console.log(key);
						console.log(value['date']);
						_.extend(_super.weatherJSON, {
									day: value.day,
									month: value.month,
									year: value.year,
									monthname: value.monthname,
									weekday: value.weekday,
							}
						);
					}); */
				}, 
				error: function(){
					alertify.alert("Error in getting weather data");
				}
			}); 
		},
		//
		populateWeather: function(){
			//console.log(this.weatherJSON.forecast.simpleforecast);
			if(this.weatherJSON.forecast.simpleforecast){
				$.each(this.weatherJSON.forecast.simpleforecast, function(key, value){
					$.each(value, function(key1, value1){
						var data = {
							day: value1.date.day,
							month: value1.date.month,
							year: value1.date.year,
							monthname: value1.date.monthname,
							weekday: value1.date.weekday,
							pretty: value1.date.pretty,
							high_C: value1.high.celsius,
							low_C: value1.low.celsius,
							high_F: value1.high.fahrenheit,
							low_F: value1.low.fahrenheit,
							maxhumidity: value1.maxhumidity,
							minhumidity: value1.minhumidity,
							icon: value1.icon,
							iconUrl: value1.icon_url,
						}
						//console.log(data);
						app.Event.Weathers.add(data);
					});
				});
			}else{
				alertify.alert('No weather data received');
			}
		},
		
		processWeatherData: function(zipcode, startDate, startTime){
			this.getWeatherJSON(zipcode, startDate, startTime);
			//app.Event.WeatherView.render();
		},
		
		init: function(){
			//highlight current section root item on the left menu
			app.Admin.highLightleftMenu('leftmenu-root-events');
		}
	};
	
	//initializing app
	app.AdminEventView.init();
	
})(jQuery);