<?php

// error_reporting(0);
include_once '../comm/baseURL.php';
session_start();
date_default_timezone_set('Asia/Kolkata');
$dateTime	=	date('Y-m-d H:i:s');

$id         	= $_POST['otherPID'];
$pro_code		= $_POST['pro_code']?$_POST['pro_code']:'NA';
$name			= $_POST['name']?strtolower($_POST['name']):'NA';
$company		= $_POST['company']?strtolower($_POST['company']):'NA';
$quality		= $_POST['quality']?strtolower($_POST['quality']):'NA';
$type			= $_POST['type']?strtolower($_POST['type']):'NA';
$color			= $_POST['color']?strtolower($_POST['color']):'NA';
$shape			= $_POST['shape']?strtolower($_POST['shape']):'NA';
$size			= $_POST['size']?strtolower($_POST['size']):'NA';


include_once '../comm/db.php'; 

$sqlData = "UPDATE product_other SET code='$pro_code', name='$sol_name', company='$company', quality='$quality', type='$type', color='$color', shape='$shape', size='$size', purchase_price='$pur_price', selling_price='$sell_price', tax='$tax', quantity='$quantity', dte_modified='$dateTime' WHERE id='$id'  ";

if ($conn->query($sqlData) === TRUE) { 
	$_SESSION['actStatus'] = "success";
	$_SESSION['actTitle'] = "Good job!";
	$_SESSION['actMsg'] = "Product updated successfully!";
	header("Location: ".$baseURL."addOther.php");
} else {
	$_SESSION['actStatus'] = "error";
	$_SESSION['actTitle'] = "Oops!";
	$_SESSION['actMsg'] = "Product not updated!";
	header("Location: ".$baseURL."addOther.php");
}




?>