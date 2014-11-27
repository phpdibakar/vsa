<?php
namespace VSA\Settings\Repositories;

use VSA\Settings\Repositories\SettingsRepositoryInterface;
use VSA\Settings\Model\Setting;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SettingsRepository implements SettingsRepositoryInterface{
	
	protected $setting; 
	
	public function __construct(Setting $setting){
		$this->setting = $setting->get(['name', 'tagline', 'admin_email', 'logo'])->first();
	}
	public function getName(){
		if(isset($this->setting->name)){
			return $this->setting->name;
		}else
			throw new ModelNotFoundException('The site does not seem to exist', 1);
	}
	
	public function getTagline(){
		if(isset($this->setting->tagline)){
			return $this->setting->tagline;
		}else
			throw new ModelNotFoundException('The site does not seem to exist', 1);
	}
	
	public function getAdminEmail(){
		if(isset($this->setting->admin_email)){
			return $this->setting->admin_email;
		}else
			throw new ModelNotFoundException('The site does not seem to exist', 1);
	}
	
	public function getLogoPath($absolute = false){
		return $absolute ? public_path(). '/uploads/settings/' : '/uploads/settings/';
	}
	
	public function getLogoImage(){
		if(isset($this->setting->logo)){
			return $this->setting->logo;
		}else
			throw new ModelNotFoundException('The site does not seem to exist', 1);
	}
	
}