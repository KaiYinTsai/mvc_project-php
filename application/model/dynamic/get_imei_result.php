<?php
include '../../../public/auto_includement.php';

$model = new Model;

$model->config = "dbconfig";
$model->dbconnect();

$model->_table = "ztd_imei_use";
$data = $model->selectAll('*');

$json =  json_encode($data);//json Output

echo $json;


?>