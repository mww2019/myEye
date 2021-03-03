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
$quantity 		= $_POST['quantity']?$_POST['quantity']:0;
$pur_price 		= $_POST['pur_price']?$_POST['pur_price']:0;
$sell_price 	= $_POST['sell_price']?$_POST['sell_price']:0;
$tax 			= $_POST['tax']?$_POST['tax']:0;


include_once '../comm/db.php'; 

$sqlData = "INSERT INTO other_products (code, name, company, quality, type, color, shape, size, purchase_price, selling_price, tax, quantity) VALUES ('$pro_code', '$name', '$company', '$quality', '$type', '$color', '$shape', '$size', '$quantity', '$pur_price', '$sell_price', '$tax')";

if ($conn->query($sqlData) === TRUE) { 
	$_SESSION['actStatus'] = "success";
	$_SESSION['actTitle'] = "Good job!";
	$_SESSION['actMsg'] = "Product added successfully!";
	header("Location: ".$baseURL."addOtherProduct.php");
} else {
	$_SESSION['actStatus'] = "error";
	$_SESSION['actTitle'] = "Oops!";
	$_SESSION['actMsg'] = "Product not added!";
	header("Location: ".$baseURL."addOtherProduct.php");
}




?>