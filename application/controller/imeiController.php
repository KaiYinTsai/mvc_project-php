<?php

class imeiController extends Controller
{
	protected $rol=[];
	
	public function indexImei() {
		
		$this->model();
		$data = $this->model->loadfile('imei','txt');

		$this->view('imei' . DIRECTORY_SEPARATOR . 'indexImei',$data);
		$this->view->render();
		
	}

	public function imeiSearch() {
		
		if(file_exists( ACTION . 'action.js')){

		}
//		echo 'IMEI search page '.__CLASS__ .'and ' . __METHOD__;
//		$this->sql->connect('localhost', 'root', '', 'ztd_database');
		$this->model();
		$this->model->config = 'dbconfig';
		$this->model->dbconnect();

		$this->model->_table = 'ztd_product';
		$data = $this->model->selectAll('product_name,product_id');
		$this->model->disconnect();	
		$this->view('IMEI'. DIRECTORY_SEPARATOR . 'imeiSearch',$data);
		$this->view->render();
		

	}


	public function imeiEdit() {

		$this->view('IMEI' . DIRECTORY_SEPARATOR . 'imeiEdit');
		$this->view->render();

	}
}
//SELECT ztd_product.product_id,ztd_product.product_name,ZTD_PROJECT.project_name FROM `ztd_product`,ztd_project WHERE ztd_product.project_id =ztd_project.project_id