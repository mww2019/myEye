<?php

// error_reporting(0);
include_once '../comm/baseURL.php';
session_start();
date_default_timezone_set('Asia/Kolkata');
$dateTime	=	date('Y-m-d H:i:s');

$id         = $_POST['goggleID'];
$pro_code 	= $_POST['pro_code']?$_POST['pro_code']:'NA';
$goggle_name= $_POST['goggle_name']?strtolower($_POST['goggle_name']):'NA';
$company 	= $_POST['company']?strtolower($_POST['company']):'NA';
$quality 	= $_POST['quality']?strtolower($_POST['quality']):'NA';
$color 		= $_POST['color']?strtolower($_POST['color']):'NA';
$size 		= $_POST['size']?$_POST['size']:'NA';
$type 		= $_POST['type']?strtolower($_POST['type']):'NA';
$gender		= $_POST['gender'];
$shape 		= $_POST['shape']?strtolower($_POST['shape']):'NA';
$material 	= $_POST['material']?strtolower($_POST['material']):'NA';


include_once '../comm/db.php'; 

$sqlData = "UPDATE product_goggle SET code='$pro_code', name='$goggle_name', company='$company', quality='$quality', color='$color', size='$size', type='$type', gender='$gender', shape='$shape', material='$material', dte_modified='$dateTime' WHERE id='$id'  ";

if ($conn->query($sqlData) === TRUE) { 
	$_SESSION['actStatus'] = "success";
	$_SESSION['actTitle'] = "Good job!";
	$_SESSION['actMsg'] = "Goggle updated successfully!";
	header("Location: ".$baseURL."addGoggle.php");
} else {
	$_SESSION['actStatus'] = "error";
	$_SESSION['actTitle'] = "Oops!";
	$_SESSION['actMsg'] = "Goggle not updated!";
	header("Location: ".$baseURL."addGoggle.php");
}




?>