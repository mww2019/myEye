<?php

error_reporting(0);

$id = $_POST['id'];

include '../comm/db.php';

$data = "SELECT * FROM product_frame WHERE id='$id' ";
$resultData = mysqli_query($conn,$data);
$rData = mysqli_fetch_assoc($resultData);

echo json_encode(array("code"=>$rData['code'], "name"=>$rData['name'], "company"=>$rData['company'], "quality"=>$rData['quality'], "color"=>$rData['color'], "size"=>$rData['size'], "type"=>$rData['type'], "gender"=>$rData['gender'], "shape"=>$rData['shape'], "material"=>$rData['material']));


?>