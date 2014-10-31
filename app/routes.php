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
	//return App::environment();
	return View::make('hello');
});

//route to accept admin login
Route::get('/adminlogin', function(){
	return View::make('admin.login');
});
Route::post('/adminlogin', array('uses' => 'UserController@postLogin'));

//Route to redirect to the admin user dashboard when /admin is called 
Route::get('/admin', function(){
	return Redirect::to('/admin/users/dashboard');
});


//filter to check every access to the admin is validated with a logged in admin user
 Route::filter('auth.admin', function(){
	if(!Auth::check())
		return Redirect::to('/adminlogin');
});

Route::group(array('prefix' => 'admin', 'before' => 'auth.admin'), function(){
	Route::resource('users', 'UserController');
	
	//Route::get('admin/users/dashboard/{id}', array('uses' => 'UserController@getAdminDashBoard'));
});
