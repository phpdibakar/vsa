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

Route::get('/', function()
{
	return View::make('users.login');
});

Route::post('/users/login', array('uses' => 'UserController@postUserLogin'));

//route to accept admin login
Route::get('/adminlogin', function(){
	return View::make('admin.users.login');
});
Route::post('/adminlogin', array('uses' => 'UserController@postLogin'));

//Route to redirect to the admin user dashboard when /admin is called 
Route::get('/admin', function(){
	return Redirect::to('/admin/users/dashboard');
});


//filter to check every access to the admin is validated with a logged in admin user
 Route::filter('auth.admin', function(){
	if(!Auth::check() || !Auth::user()->admin)
		return Redirect::to('/adminlogin');
});

Route::group(array('prefix' => Config::get('app.adminPrefix'), 'before' => 'auth.admin'), function(){
	
	Route::controller('users', 'UserController');
	
});

//route to accept registration from the front-end
Route::get('/users/register', array('as' => 'registration', 'uses' => 'UserController@getRegister'));

//route to accept login for users at the front-end
Route::get('/login', function(){
	return View::make('users.login');
});
//route to verify user authentication for front access
Route::post('/users/login', array('as' => 'user-login', 'uses' => 'UserController@postLogin'));

//Route configuration to have forget password service functionality
Route::controller('password', 'RemindersController');

//Route to get ajax list of states for a selected country
Route::post('states/ajaxGetStates', array('uses' => 'StatesController@postStates'));