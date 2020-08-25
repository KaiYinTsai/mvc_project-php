<?php

class projectController extends Controller
{

	
	public function indexProject() {
        
        $this->model();
		$data = $this->model->selectdata("ztd_project`,`ztd_product",'*','ztd_project.project_id=ztd_product.project_id');
        
        $this->view('project' . DIRECTORY_SEPARATOR . 'indexProject',$data);
		$this->view->render();
		
    }
}
