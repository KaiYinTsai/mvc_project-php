<?php


class data {

	protected static $data_file;
	protected $rol_data =[];
	
	public function __construct() {
		
		self::$data_file = DATA . 'homeintro.txt';
		
	}
	
	private function load() {
		
		if(file_exists(DATA . 'homeintro.txt')) {
			$this->rol_data = file(DATA . 'homeintro.txt');
		}
	}
	
	public function getData() {
		
		$this->load();
		return $this->rol_data;
		
    }


}