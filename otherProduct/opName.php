<?php

error_reporting(0);

$code = $_POST['id'];

include '../comm/db.php';

$data = "SELECT * FROM other_products WHERE code='$code' ";
$resultData = mysqli_query($conn,$data);
$rData = mysqli_fetch_assoc($resultData);

$name 		= $rData['name']?$rData['name']:'none';
$p_price 	= $rData['purchase_price']?$rData['purchase_price']:'0.00';
$s_price 	= $rData['selling_price']?$rData['selling_price']:'0.00';
$tax 		= $rData['tax']?$rData['tax']:'0.00';
$quantity	= $rData['quantity']?$rData['quantity']:'0';

echo json_encode(array("name"=>$name, "p_price"=>$p_price, "s_price"=>$s_price, "tax"=>$tax, "quantity"=>$quantity));


?>