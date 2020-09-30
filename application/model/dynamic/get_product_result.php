<?php
include '../../../public/auto_includement.php';

$model = new Model;


$data = $model->selectdata('ztd_product','product_name,product_id','');

echo json_encode($data)
?>