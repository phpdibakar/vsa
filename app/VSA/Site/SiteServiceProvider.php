<?php
namespace VSA\Site;

use Illuminate\Support\ServiceProvider;
use VSA\Site\Repositories\SiteRepositoryInterface;
use VSA\Site\Repositories\SiteRepository;

class UserServiceProvider extends ServiceProvider{
	
	public function register(){
		$this->app->bind('VSA\Site\Repositories\SiteRepositoryInterface', 'VSA\SITE\Repositories\SiteRepository');
		
	}
}