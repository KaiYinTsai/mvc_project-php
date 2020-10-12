<?php

class View
{
	
	protected $view_file;
	protected $view_data;
	
	public function __construct($view_file,$view_data) {
		
		$this->view_file = $view_file;
		$this->view_data = $view_data;
	}
	
	public function render() {
		if(file_exists(VIEW . $this->view_file . '.phtml')) {

			include VIEW.("header.phtml");
			include VIEW.("listbar.phtml");
			include VIEW . $this->view_file . '.phtml';
			include VIEW.("footer.phtml");
		}
		
	}
	

	public function getAction() {
		$action = explode(DIRECTORY_SEPARATOR,$this->view_file);
		return $action;
			
	}


	public function loginrender() {
		if(file_exists(VIEW . $this->view_file . '.html')) {
			include CONFIG."get_browse_info.php";
			include VIEW . $this->view_file . '.html';

			}
	}

}

?>