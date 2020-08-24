<?php

class homeController extends Controller
{
	
	public function index($id = '',$name = '') {
		
//		echo 'I am in in ' . __CLASS__ . ' method ' . __METHOD__;
//		echo $id .'and'. $name;
		$this->view('home\index',[
		'name'=>$name,
		'id'=>$id
		]);
		$this->model();
		$data = $this->model->loadfile('homeintro', 'txt');
		$this->view('home' . DIRECTORY_SEPARATOR . 'index', $data);
		$this->view->render();
	}
	
	public function aboutUs() {
		
//		echo 'I am in in ' . __CLASS__ . ' method ' . __METHOD__;
		$this->view('home\aboutUs');
		$this->view->page_title = 'this is about as page';
		$this->view->render();
		
	}

}