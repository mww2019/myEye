<?php

error_reporting(0);

$id = $_POST['id'];

include '../comm/db.php';

$data = "SELECT * FROM other_products WHERE id='$id' ";
$resultData = mysqli_query($conn,$data);
$rData = mysqli_fetch_assoc($resultData);

echo json_encode(array("code"=>$rData['code'], "name"=>$rData['name'], "company"=>$rData['company'], "quality"=>$rData['quality'], "type"=>$rData['type'], "color"=>$rData['color'], "shape"=>$rData['shape'], "size"=>$rData['size'], "purchase_price"=>$rData['purchase_price'], "selling_price"=>$rData['selling_price'], "tax"=>$rData['tax'], "quantity"=>$rData['quantity']));


?>