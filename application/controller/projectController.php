<?php

class projectController extends Controller
{

	
	public function ProjectIndex() {
        
        $this->model();
        $data = $this->model->selectdata("ztd_project`,`ztd_product",'ztd_product.product_id,ztd_project.project_id,ztd_project.project_name,ztd_product.product_name','
        ztd_project.project_id=ztd_product.project_id');
        $this->view('Project' . DIRECTORY_SEPARATOR . 'ProjectIndex',$data);
		$this->view->render();
		
    }


    public function ProjectNew() {

        $this->view('Project'.DIRECTORY_SEPARATOR . 'ProjectNew');
        $this->view->render();

    }


    public function ProjectUpdate() {

        $this->model();
        $data = $this->model->selectdata("ztd_project","project_id,project_name","1");
        $this->view('Project'.DIRECTORY_SEPARATOR.'ProjectUpdate',$data);
        $this->view->render();
    }
}