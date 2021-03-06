<?php

/* 
* breadcrumbs for administration
*/

Breadcrumbs::register('home', function($breadcrumbs) {
    $breadcrumbs->push('Home', url(Config::get('app.adminPrefix'). '/users/dashboard'), ['icon' => 'clip-home-3']);
});

Breadcrumbs::register('users', function($breadcrumbs){
	$breadcrumbs->parent('home');
	$breadcrumbs->push('Directory', url(Config::get('app.adminPrefix'). '/users/list'));
});

Breadcrumbs::register('user_registration', function($breadcrumbs) {
    $breadcrumbs->parent('users');
    $breadcrumbs->push('Registration', url(Config::get('app.adminPrefix'). '/users/register'));
});

Breadcrumbs::register('system', function($breadcrumbs){
	$breadcrumbs->parent('home');
	$breadcrumbs->push('System', url(Config::get('app.adminPrefix'). '/system/index'));
});

Breadcrumbs::register('shift_category', function($breadcrumbs){
	$breadcrumbs->parent('system');
	$breadcrumbs->push('Shift Category', url(Config::get('app.adminPrefix'). '/shifts/list-category'));
});

Breadcrumbs::register('user_roles', function($breadcrumbs){
	$breadcrumbs->parent('system');
	$breadcrumbs->push('Roles', url(Config::get('app.adminPrefix'). '/users/list-roles'));
});