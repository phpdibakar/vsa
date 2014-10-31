<?php
namespace VSA\Users;

use Illuminate\Support\ServiceProvider;
use VSA\Users\Repositories\UserRepositoryInterface;
use VSA\Users\Repositories\UserRepository;

class UserServiceProvider extends ServiceProvider{
	
	public function register(){
		$this->app->bind('VSA\Users\Repositories\UserRepositoryInterface', 'VSA\Users\Repositories\UserRepository');
		
	}
}