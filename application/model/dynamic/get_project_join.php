<?php
include '../../../public/auto_includement.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") { //如果是 POST 請求
    @$selected = $_POST["select"];     
    if ($selected == null) 
        return;                
}
$model = new Model;

$data = $model->selectdata("ztd_project`,`ztd_product",'*','ztd_project.project_id=ztd_product.project_id AND ztd_product.project_id ='.$selected);



echo json_encode($data);


?>