<?php
include '../../../public/auto_includement.php';

$model = new Model;


$data = $model->selectdata("ztd_project`,`ztd_product",'*','ztd_project.project_id=ztd_product.project_id');

echo json_encode($data);
?>