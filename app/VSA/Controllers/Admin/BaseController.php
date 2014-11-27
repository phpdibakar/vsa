<?php
namespace VSA\Controllers\Admin;

use Illuminate\Support\Facades\Config;
use Controller;

class BaseController extends Controller {

	const recordLimit = 5;
	
	protected $_adminPrefix,
		$_saId;
	
	public static $pagination_limits = [5, 10, 25, 50, 'all'];
		
	public function __construct(){
		$this->_adminPrefix = Config::get('app.adminPrefix');
		$this->_saId = Config::get('app.saId');
	}
	
	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}
	
	

}
