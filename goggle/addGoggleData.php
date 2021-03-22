<?php

// error_reporting(0);
include_once '../comm/baseURL.php';
session_start();

$pro_code 	= $_POST['pro_code']?$_POST['pro_code']:'NA';
$frame_name = $_POST['goggle_name']?strtolower($_POST['goggle_name']):'NA';
$company 	= $_POST['company']?strtolower($_POST['company']):'NA';
$quality 	= $_POST['quality']?strtolower($_POST['quality']):'NA';
$color 		= $_POST['color']?strtolower($_POST['color']):'NA';
$size 		= $_POST['size']?$_POST['size']:'NA';
$type 		= $_POST['type']?strtolower($_POST['type']):'NA';
$gender		= $_POST['gender'];
$shape 		= $_POST['shape']?strtolower($_POST['shape']):'NA';
$material 	= $_POST['material']?strtolower($_POST['material']):'NA';

include_once '../comm/db.php'; 

$chkCode = "SELECT code FROM product_goggle WHERE code='$pro_code' ";
$resultChkCode = $conn->query($chkCode)->fetch_array();
if($resultChkCode['code'] === $pro_code) {
	$_SESSION['actStatus'] = "error";
	$_SESSION['actTitle'] = "Oops!";
	$_SESSION['actMsg'] = "Goggle code already exist!";
	header("Location: ".$baseURL."addGoggle.php");
} else {
	$sqlData = "INSERT INTO product_goggle (code, name, company, quality, color, size, type, gender, shape, material) VALUES ('$pro_code', '$frame_name', '$company', '$quality', '$color', '$size', '$type', '$gender', '$shape', '$material')";
	if ($conn->query($sqlData) === TRUE) { 
		$_SESSION['actStatus'] = "success";
		$_SESSION['actTitle'] = "Good job!";
		$_SESSION['actMsg'] = "Goggle added successfully!";
		header("Location: ".$baseURL."addGoggle.php");
	} else {
		$_SESSION['actStatus'] = "error";
		$_SESSION['actTitle'] = "Oops!";
		$_SESSION['actMsg'] = "Goggle not added!";
		header("Location: ".$baseURL."addGoggle.php");
	}
}




?>