<?php

// error_reporting(0);
include_once '../comm/baseURL.php';
session_start();
date_default_timezone_set('Asia/Kolkata');
$dateTime	=	date('Y-m-d H:i:s');

$pro_cat 	= 'frame';
$pro_code 	= $_POST['code']?$_POST['code']:'NA';
$pro_name 	= $_POST['f_name']?strtolower($_POST['f_name']):'NA';
$sup_name	= $_POST['sName'];
$pur_dte	= $_POST['pDte'];
$pur_price 	= $_POST['pur_price']?$_POST['pur_price']:0;
$sell_price = $_POST['sell_price']?$_POST['sell_price']:0;
$tax 		= $_POST['tax']?$_POST['tax']:0;
$quantity 	= $_POST['quantity']?$_POST['quantity']:0;

include_once '../comm/db.php'; 

$qtyFetch = "SELECT quantity FROM product_frame WHERE code='$pro_code'"; 
$qtyFetchResult = $conn->query($qtyFetch)->fetch_all(MYSQLI_ASSOC);
$pre_quant = $qtyFetchResult[0]['quantity'];
$new_quantity = $quantity + $pre_quant;

$sqlData1 = "UPDATE product_frame SET purchase_price='$pur_price', selling_price='$sell_price', tax='$tax', quantity='$new_quantity', dte_modified='$dateTime' WHERE code='$pro_code'  ";

$sqlData = "INSERT INTO product_purches (pro_cat, pro_code, pro_name, sup_name, pur_dte, purchase_price, selling_price, tax, quantity) VALUES ('$pro_cat', '$pro_code', '$pro_name', '$sup_name', '$pur_dte', '$pur_price' ,'$sell_price', '$tax', '$quantity')";

if ($conn->query($sqlData) === TRUE) { 
	$conn->query($sqlData1);
	$_SESSION['actStatus'] = "success";
	$_SESSION['actTitle'] = "Good job!";
	$_SESSION['actMsg'] = "Purches added successfully!";
	header("Location: ".$baseURL."addPurFrame.php");
} else {
	$_SESSION['actStatus'] = "error";
	$_SESSION['actTitle'] = "Oops!";
	$_SESSION['actMsg'] = "Purches not added!";
	header("Location: ".$baseURL."addPurFrame.php");
}




?>