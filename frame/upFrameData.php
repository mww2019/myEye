<?php

// error_reporting(0);
include_once '../comm/baseURL.php';
session_start();
date_default_timezone_set('Asia/Kolkata');
$dateTime	=	date('Y-m-d H:i:s');

$id         = $_POST['frameID'];
$pro_code 	= $_POST['pro_code']?$_POST['pro_code']:'NA';
$frame_name = $_POST['frame_name']?strtolower($_POST['frame_name']):'NA';
$company 	= $_POST['company']?strtolower($_POST['company']):'NA';
$quality 	= $_POST['quality']?strtolower($_POST['quality']):'NA';
$color 		= $_POST['color']?strtolower($_POST['color']):'NA';
$size 		= $_POST['size']?$_POST['size']:'NA';
$type 		= $_POST['type']?strtolower($_POST['type']):'NA';
$gender		= $_POST['gender'];
$shape 		= $_POST['shape']?strtolower($_POST['shape']):'NA';
$material 	= $_POST['material']?strtolower($_POST['material']):'NA';
$quantity 	= $_POST['quantity']?$_POST['quantity']:0;
$pur_price 	= $_POST['pur_price']?$_POST['pur_price']:0;
$sell_price = $_POST['sell_price']?$_POST['sell_price']:0;
$tax 		= $_POST['tax']?$_POST['tax']:0;


include_once '../comm/db.php'; 

$sqlData = "UPDATE product_frame SET code='$pro_code', name='$frame_name', company='$company', quality='$quality', color='$color', size='$size', type='$type', gender='$gender', shape='$shape', material='$material', purchase_price='$pur_price', selling_price='$sell_price', tax='$tax', quantity='$quantity', dte_modified='$dateTime' WHERE id='$id'  ";

if ($conn->query($sqlData) === TRUE) { 
	$_SESSION['actStatus'] = "success";
	$_SESSION['actTitle'] = "Good job!";
	$_SESSION['actMsg'] = "Frame updated successfully!";
	header("Location: ".$baseURL."addFrame.php");
} else {
	$_SESSION['actStatus'] = "error";
	$_SESSION['actTitle'] = "Oops!";
	$_SESSION['actMsg'] = "Frame not updated!";
	header("Location: ".$baseURL."addFrame.php");
}




?>