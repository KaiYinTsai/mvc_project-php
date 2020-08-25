<?php
include '../../../public/auto_includement.php';

$model = new Model;

$data = $model->selectdata('ztd_imei_use','*','');
$json = json_encode($data);
echo $json;


?>  