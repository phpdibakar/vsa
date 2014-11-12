<?php
namespace VSA\Settings;

use Illuminate\Support\ServiceProvider;
use VSA\Settings\Repositories\SiteRepositoryInterface;
use VSA\Settings\Repositories\SiteRepository;

class SettingsServiceProvider extends ServiceProvider{
	
	public function register(){
		$this->app->singleton('VSA\Settings\Repositories\SettingsRepositoryInterface', 'VSA\Settings\Repositories\SettingsRepository');
	}
}