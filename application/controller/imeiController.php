<?php

class imeiController extends Controller
{
	protected $rol=[];
	
	public function ImeiIndex() {
		
		$this->model();
		$data = $this->model->loadfile('imei','txt');

		$this->view('IMEI' . DIRECTORY_SEPARATOR . 'ImeiIndex',$data);
		$this->view->render();
		
	}

	public function ImeiSearch() {
		
//		echo 'IMEI search page '.__CLASS__ .'and ' . __METHOD__;
//		$this->sql->connect('localhost', 'root', '', 'ztd_database');
		$this->model();
		$data = $this->model->selectdata('ztd_product','product_name,product_id','');

		$this->view('IMEI'. DIRECTORY_SEPARATOR . 'ImeiSearch',$data);
		$this->view->render();


	}


	public function ImeiEdit() {

		$this->view('IMEI' . DIRECTORY_SEPARATOR . 'ImeiEdit');
		$this->view->render();

	}
}
//SELECT ztd_product.product_id,ztd_product.product_name,ZTD_PROJECT.project_name FROM `ztd_product`,ztd_project WHERE ztd_product.project_id =ztd_project.project_id