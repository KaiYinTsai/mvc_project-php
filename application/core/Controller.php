<?php

class Controller
{
	
	protected $view;
	protected $model;
	protected $sql;
	
	public function view($viewName,$data =[],$action=[]) {
		
		$this->view = new View($viewName, $data, $action);
		return $this->view;
		
	}

	public function model() {

		$this->model = new Model;

	}
/*	
	public function model($modelName,$data = []) {
		
		if(file_exists(MODEL . $modelName . '.php')) {
			
			require MODEL . $modelName . '.php';
			$this->model = new $modelName;
		}
		
	}
*/

}