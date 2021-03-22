<?php

// error_reporting(0);
include_once '../comm/baseURL.php';
session_start();
date_default_timezone_set('Asia/Kolkata');
$dateTime	=	date('Y-m-d H:i:s');

$id         	= $_POST['glassID'];
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


include_once '../comm/db.php'; 

$sqlData = "UPDATE product_glass SET code='$pro_code', company='$company', glass_quality='$glass_quality', glass_color='$glass_color', glass_material='$glass_material', glass_coating='$glass_coating', glass_design='$glass_design', glass_index='$glass_index', glass_details='$glass_details', glass_numbers='glass_numbers', glass_range='glass_range', tax='$tax', dte_modified='$dateTime' WHERE id='$id'  ";

if ($conn->query($sqlData) === TRUE) { 
	$_SESSION['actStatus'] = "success";
	$_SESSION['actTitle'] = "Good job!";
	$_SESSION['actMsg'] = "Glass updated successfully!";
	header("Location: ".$baseURL."addGlass.php");
} else {
	$_SESSION['actStatus'] = "error";
	$_SESSION['actTitle'] = "Oops!";
	$_SESSION['actMsg'] = "Glass not updated!";
	header("Location: ".$baseURL."addGlass.php");
}




?>