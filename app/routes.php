<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array('as' => 'home', function()
{
	return View::make('users.login');
}));

Route::get('/users/login', function(){
	return Redirect::to('/');
});

//route to accept registration from the front-end
Route::get('/users/register', array('as' => 'registration', 'uses' => 'VSA\Controllers\Front\UserController@getRegister'));
Route::post('/users/register', array('uses' => 'VSA\Controllers\Front\UserController@postRegister'));


//route to verify user authentication for front access
Route::post('/users/login', array('uses' => 'VSA\Controllers\Front\UserController@postLogin'));

//route to accept admin login
Route::get(Config::get('app.adminPrefix'). '/users/login', function(){
	return View::make('admin.users.login');
});

Route::post(Config::get('app.adminPrefix'). '/users/login', array('uses' => 'VSA\Controllers\Admin\UserController@postLogin'));

//Route to redirect to the admin user dashboard when /admin is called 
Route::get('/'. Config::get('app.adminPrefix'), function(){
	return Redirect::to(Config::get('app.adminPrefix'). '/users/dashboard');
});

Route::get('/users', function(){
	return Redirect::to(Config::get('app.frontPrefix'). '/users/dashboard');
});

//filter to check users authenticity for their front-end access 
Route::filter('auth.check', function(){
	if(!Auth::check())
		return Redirect::to('/users/login');
});

//Routing groups dedicated to handle front end protected modules
Route::group(array('prefix' => Config::get('app.frontPrefix'), 'before' => 'auth.check'), function(){
	Route::controller('users', 'VSA\Controllers\Front\UserController');
});

//filter to check every access to the admin is validated with a logged in admin user
Route::filter('auth.admin', function(){
	if(!Auth::check() || !Auth::user()->admin)
		return Redirect::to(Config::get('app.adminPrefix'). '/users/login');
});

//Routing groups dedicated to handle administration modules
Route::group(array('prefix' => Config::get('app.adminPrefix'), 'before' => 'auth.admin'), function(){
	Route::controller('users', 'VSA\Controllers\Admin\UserController');
	Route::controller('shifts', 'VSA\Controllers\Admin\ShiftController');
});



//Route configuration to have forget password service functionality
Route::controller('password', 'RemindersController');

//Route to get ajax list of states for a selected country
Route::post('states/ajaxGetStates', array('uses' => 'StatesController@postStates'));