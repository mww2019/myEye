<?php

// error_reporting(0);
include_once '../comm/baseURL.php';
session_start();

$pro_code 	= $_POST['pro_code']?$_POST['pro_code']:'NA';
$lense_name	= $_POST['lens_name']?strtolower($_POST['lens_name']):'NA';
$company 	= $_POST['company']?strtolower($_POST['company']):'NA';
$quality 	= $_POST['quality']?strtolower($_POST['quality']):'NA';
$color 		= $_POST['color']?strtolower($_POST['color']):'NA';
$bNo		= $_POST['bNo']?$_POST['bNo']:'NA';
$aNo		= $_POST['aNo']?$_POST['aNo']:'NA';
$thickness	= $_POST['thickness']?$_POST['thickness']:'NA';
$type 		= $_POST['type']?strtolower($_POST['type']):'NA';
$bCurve		= $_POST['bCurve']?$_POST['bCurve']:'NA';
$diameter	= $_POST['diameter']?$_POST['diameter']:'NA';
$material   = $_POST['material']?strtolower($_POST['material']):'NA';
$modality	= $_POST['modality']?$_POST['modality']:'NA';
$validity	= $_POST['validity']?$_POST['validity']:'NA';
$quantity 	= $_POST['quantity']?$_POST['quantity']:0;
$pur_price 	= $_POST['pur_price']?$_POST['pur_price']:0;
$sell_price = $_POST['sell_price']?$_POST['sell_price']:0;
$tax 		= $_POST['tax']?$_POST['tax']:0;


include_once '../comm/db.php'; 

$sqlData = "INSERT INTO contact_lenses (code, company, name, lens_quality, lens_color, lens_num_basic, lens_num_adv, lens_thickness, lens_type, lens_base_curves, lens_diameter, lens_materials, lens_modality, lens_validity, quantity, purchase_price, selling_price, tax) VALUES ('$pro_code', '$lense_name', '$company', '$quality', '$color', '$bNo', '$aNo', '$thickness', '$type', '$bCurve', '$diameter', '$material', '$modality', '$validity', '$quantity', '$pur_price', '$sell_price', '$tax' )";

if ($conn->query($sqlData) === TRUE) { 
	$_SESSION['actStatus'] = "success";
	$_SESSION['actTitle'] = "Good job!";
	$_SESSION['actMsg'] = "Contact Lens added successfully!";
	header("Location: ".$baseURL."addCLens.php");
} else {
	$_SESSION['actStatus'] = "error";
	$_SESSION['actTitle'] = "Oops!";
	$_SESSION['actMsg'] = "Contact Lens not added!";
	header("Location: ".$baseURL."addCLens.php");
}




?>