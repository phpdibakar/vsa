<?php
namespace VSA\Settings\Facades;

use Illuminate\Support\Facades\Facade;

class Settings extends Facade{
	protected static function getFacadeAccessor(){
		return 'VSA\Settings\Repositories\SettingsRepository';
	}
}