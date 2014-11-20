<?php
Validator::extend('valid_phone', function($attribute, $value){
	return preg_match('/^(\+[1-9][0-9]*(\([0-9]*\)|-[0-9]*-))?[0]?[1-9][0-9\- ]*$/', $value);
});

Validator::extend('alpha_space', function($attribute, $value){
	return preg_match('/^[\pL\s]+$/u', $value);
});