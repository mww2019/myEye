<?php

error_reporting(0);
session_start();

$code 	= $_POST['id'];
$branch = $_SESSION['branch']?$_SESSION['branch']:$_POST['branch'];

include '../comm/db.php';

$data1 = "SELECT name FROM product_frame WHERE code='$code' ";
$resultData1 = mysqli_query($conn,$data1);
$rData1 = mysqli_fetch_assoc($resultData1);

$data = "SELECT * FROM $branch WHERE branch_name='$branch' and product_code='$code' ";
$resultData = mysqli_query($conn,$data);
$rData = mysqli_fetch_assoc($resultData);

$name 		= $rData1['name']?$rData1['name']:'none';
$p_price 	= $rData['purchase_price']?$rData['purchase_price']:'0.00';
$s_price 	= $rData['selling_price']?$rData['selling_price']:'0.00';
$tax 		= $rData['tax']?$rData['tax']:'0.00';
$quantity	= $rData['quantity']?$rData['quantity']:'0';

echo json_encode(array("name"=>$name, "p_price"=>$p_price, "s_price"=>$s_price, "tax"=>$tax, "quantity"=>$quantity));


?>