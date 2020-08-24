<?php

class imei
{
	protected static $data_file;
	protected $rol_data =[];
	
	public function __construct() {
		
		self::$data_file = DATA . 'imei.txt';
		
	}
	
	private function load() {
		
		if(file_exists(DATA . 'imei.txt')) {
			$this->rol_data = file(DATA . 'imei.txt');
		}
	}
	
	public function getImei() {
		
		$this->load();
		return $this->rol_data;
		
	}
	
}