<?php

error_reporting(0);

$id = $_POST['id'];

include '../comm/db.php';

$data = "SELECT * FROM product_other WHERE id='$id' ";
$resultData = mysqli_query($conn,$data);
$rData = mysqli_fetch_assoc($resultData);

echo json_encode(array("code"=>$rData['code'], "name"=>$rData['name'], "company"=>$rData['company'], "quality"=>$rData['quality'], "type"=>$rData['type'], "color"=>$rData['color'], "shape"=>$rData['shape'], "size"=>$rData['size']));


?>