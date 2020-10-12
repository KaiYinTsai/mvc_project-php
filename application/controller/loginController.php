<?php

class loginController extends Controller
{
	
	public function login_UI() {
		
//		echo 'I am in in ' . __CLASS__ . ' method ' . __METHOD__;
		$this->view('login');
		$this->view->loginrender();
		
	}

}