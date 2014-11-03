<?php
namespace VSA\Site\Repositories;

use VSA\Site\Repositories\SiteRepositoryInterface;
use VSA\Site\Model\Site;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SiteRepository implements SiteRepositoryInterface{
	
	protected $site; 
	
	public function __construct(Site $site){
		$this->site = $site;
	}
	public function getFullName($id){
		$site = $this->site->find($id);
		if(count($site)){
			return $site->fname . ' '. $site->lname;
		}else
			throw new ModelNotFoundException('The site does not seem to exist', 1);
	}
	
	public function getLoginValidationRule(){
		return $this->site->getLoginValidationRules();
	}
}