<?php

// error_reporting(0);
include_once '../comm/baseURL.php';
session_start();

$pro_code		= $_POST['pro_code']?$_POST['pro_code']:'NA';
$company		= $_POST['company']?strtolower($_POST['company']):'NA';
$glass_quality	= $_POST['quality']?strtolower($_POST['quality']):'NA';
$glass_color	= $_POST['color']?strtolower($_POST['color']):'NA';
$glass_material	= $_POST['material']?strtolower($_POST['material']):'NA';
$glass_coating	= $_POST['coating'];
$glass_design	= $_POST['design']?strtolower($_POST['design']):'NA';
$glass_index	= $_POST['index'];
$glass_details	= $_POST['design']?$_POST['design']:'NA';
$glass_numbers	= $_POST['numbers']?$_POST['numbers']:'NA';	 
$glass_range	= $_POST['range']?$_POST['range']:'NA';
$quantity 		= $_POST['quantity']?$_POST['quantity']:0;
$pur_price 		= $_POST['pur_price']?$_POST['pur_price']:0;
$sell_price 	= $_POST['sell_price']?$_POST['sell_price']:0;
$tax 			= $_POST['tax']?$_POST['tax']:0;


include_once '../comm/db.php'; 

$sqlData = "INSERT INTO product_glass (code, company, glass_quality, glass_color, glass_material, glass_coating, glass_design, glass_index, glass_details, glass_numbers, glass_range, quantity, purchase_price, selling_price, tax) VALUES ('$pro_code', '$company', '$glass_quality', '$glass_color', '$glass_material', '$glass_coating', '$glass_design', '$glass_index', '$glass_details', '$glass_numbers', '$glass_range', '$quantity', '$pur_price', '$sell_price', '$tax')";

if ($conn->query($sqlData) === TRUE) { 
	$_SESSION['actStatus'] = "success";
	$_SESSION['actTitle'] = "Good job!";
	$_SESSION['actMsg'] = "Glass added successfully!";
	header("Location: ".$baseURL."addGlass.php");
} else {
	$_SESSION['actStatus'] = "error";
	$_SESSION['actTitle'] = "Oops!";
	$_SESSION['actMsg'] = "Glass not added!";
	header("Location: ".$baseURL."addGlass.php");
}




?>