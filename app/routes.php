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
	return App::environment();
	//return View::make('hello');
});

Route::get('/adminlogin', function(){
	return View::make('admin.login');
});

Route::filter('auth.admin', function(){
	if(!Auth::check())
		return Redirect::to('/adminlogin');
});

Route::group(array('prefix' => 'admin', 'before' => 'auth.admin'), function(){
	Route::resource('users', 'UserController');
});

