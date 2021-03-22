<?php

// error_reporting(0);
include_once '../comm/baseURL.php';
session_start();

$pro_code		= $_POST['pro_code']?$_POST['pro_code']:'NA';
$name			= $_POST['name']?strtolower($_POST['name']):'NA';
$company		= $_POST['company']?strtolower($_POST['company']):'NA';
$quality		= $_POST['quality']?strtolower($_POST['quality']):'NA';
$type			= $_POST['type']?strtolower($_POST['type']):'NA';
$color			= $_POST['color']?strtolower($_POST['color']):'NA';
$shape			= $_POST['shape']?strtolower($_POST['shape']):'NA';
$size			= $_POST['size']?strtolower($_POST['size']):'NA';

include_once '../comm/db.php'; 

$chkCode = "SELECT * FROM product_other WHERE code='$pro_code' ";
$resultChkCode = $conn->query($chkCode)->fetch_array();
if($resultChkCode['code'] === $pro_code) {
	$_SESSION['actStatus'] = "error";
	$_SESSION['actTitle'] = "Oops!";
	$_SESSION['actMsg'] = "Product code already exist!";
	header("Location: ".$baseURL."addOther.php");
} else {
	$sqlData = "INSERT INTO product_other (code, name, company, quality, type, color, shape, size) VALUES ('$pro_code', '$name', '$company', '$quality', '$type', '$color', '$shape', '$size')";

	if ($conn->query($sqlData) === TRUE) { 
		$_SESSION['actStatus'] = "success";
		$_SESSION['actTitle'] = "Good job!";
		$_SESSION['actMsg'] = "Product added successfully!";
		header("Location: ".$baseURL."addOther.php");
	} else {
		$_SESSION['actStatus'] = "error";
		$_SESSION['actTitle'] = "Oops!";
		$_SESSION['actMsg'] = "Product not added!";
		header("Location: ".$baseURL."addOther.php");
	}
}




?>