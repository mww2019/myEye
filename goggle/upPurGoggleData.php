<?php

// error_reporting(0);
include_once '../comm/baseURL.php';
session_start();
date_default_timezone_set('Asia/Kolkata');
$dateTime	=	date('Y-m-d H:i:s');

$id         = $_POST['purID'];
$pro_code 	= $_POST['code'];
$sup_name	= $_POST['sName']?$_POST['sName']:strtolower($_POST['sENme']);
$pur_dte	= $_POST['pDte'];
$quantity 	= $_POST['quantity'];
$pur_price 	= $_POST['pur_price'];
$sell_price = $_POST['sell_price'];
$tax 		= $_POST['tax'];
$new_quantity = 0;

include_once '../comm/db.php'; 

$preQF = "SELECT quantity FROM product_purches WHERE id='$id'";
$preQFResult = $conn->query($preQF)->fetch_all(MYSQLI_ASSOC);
$preQF_quant = $preQFResult[0]['quantity'];

if($preQF_quant == $quantity){
	$new_quantity = $preQF_quant;
	// echo $new_quantity;
	// die;
} else {
	$qty = $quantity - $preQF_quant;
	
	$qtyFetch = "SELECT quantity FROM product_goggle WHERE code='$pro_code'"; 
	$qtyFetchResult = $conn->query($qtyFetch)->fetch_all(MYSQLI_ASSOC);
	$pre_quant = $qtyFetchResult[0]['quantity'];
	$new_quantity = $qty + $pre_quant;
	// echo "<pre>";
	// print_r($pre_quant);
	// echo "</pre>";
	// echo $qty.'  '.$new_quantity;
	// die;
}

$sqlData1 = "UPDATE product_goggle SET purchase_price='$pur_price', selling_price='$sell_price', tax='$tax', quantity='$new_quantity', dte_modified='$dateTime' WHERE code='$pro_code'  ";

$sqlData = "UPDATE product_purches SET sup_name='$sup_name', pur_dte='$pur_dte', purchase_price='$pur_price', selling_price='$sell_price', tax='$tax', quantity='$quantity', dte_modified='$dateTime' WHERE id='$id'  ";

if ($conn->query($sqlData) === TRUE) { 
	$conn->query($sqlData1);
	$_SESSION['actStatus'] = "success";
	$_SESSION['actTitle'] = "Good job!";
	$_SESSION['actMsg'] = "Purchase updated successfully!";
	header("Location: ".$baseURL."addPurGoggle.php");
} else {
	$_SESSION['actStatus'] = "error";
	$_SESSION['actTitle'] = "Oops!";
	$_SESSION['actMsg'] = "Purchase not updated!";
	header("Location: ".$baseURL."addPurGoggle.php");
}




?>