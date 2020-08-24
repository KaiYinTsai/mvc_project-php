<?php
class Application
{
	protected $controller = 'homeController';
	protected $action = 'index';
	protected $parms = [];

	public function __construct() {
		
		$this->prepareURL();
//		echo $this->controller,'<br/>',$this->action,'<br/>',print_r($this->parms);
		if(file_exists(CONTROLLER . $this->controller . '.php')) {
			$this->controller = new $this->controller;

			if($foo = method_exists ($this->controller,$this->action)) {
				call_user_func_array([$this->controller,$this->action],$this->parms);

			}

		}

	}	
	protected function prepareURL() {

		$request = trim($_SERVER['REQUEST_URI'], '/');
		if(!empty($request)) {

			$url = explode('/', $request);
			
			$this->controller = isset($url[0]) ? $url[0] . 'Controller' :'homeController';
			$this->action = isset($url[1]) ? $url[1] : 'index';
			
			unset($url[0],$url[1]);//delete unused string from url array 
			$this->parms = !empty($url) ? array_values($url) : [];
			
		}	
	}
	
	
}