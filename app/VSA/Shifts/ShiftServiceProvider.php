<?php
namespace VSA\Shifts;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Event;
use VSA\Shifts\Repositories\ShiftRepositoryInterface;
use VSA\Shifts\Repositories\ShiftRepository;
use VSA\Shifts\Events\ShiftEventHandler;

class ShiftServiceProvider extends ServiceProvider{
	
	public function register(){
		
		$this->app->bind('VSA\Shifts\Repositories\ShiftRepositoryInterface', 'VSA\Shifts\Repositories\ShiftRepository');
		$this->app->bind('ShiftEventHandler', 'VSA\Shifts\Events\ShiftEventHandler');
		
		//subscribing events for this services
		$this->app->events->subscribe(new ShiftEventHandler());
	}
}