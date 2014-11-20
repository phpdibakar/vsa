<?php
namespace VSA\Users;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Event;
use VSA\Users\Repositories\UserRepositoryInterface;
use VSA\Users\Repositories\UserRepository;
use VSA\Users\Events\UserEventHandler;

class UserServiceProvider extends ServiceProvider{
	
	public function register(){
		
		$this->app->bind('VSA\Users\Repositories\UserRepositoryInterface', 'VSA\Users\Repositories\UserRepository');
		$this->app->bind('UserEventHandler', 'VSA\Users\Events\UserEventHandler');
		
		//subscribing events for this services
		$this->app->events->subscribe(new UserEventHandler());
	}
}