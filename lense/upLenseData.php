<?php

// error_reporting(0);
include_once '../comm/baseURL.php';
session_start();
date_default_timezone_set('Asia/Kolkata');
$dateTime	=	date('Y-m-d H:i:s');

$id         = $_POST['cLensID'];
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

$sqlData = "UPDATE contact_lenses SET code='$pro_code', company='$company', name='$lense_name', lens_quality='$quality', lens_color='$color', lens_num_basic='$bNo', lens_num_adv='$aNo', lens_thickness='$thickness', lens_type='$type', lens_base_curves='$bCurve', lens_diameter='$diameter', lens_materials='$material', lens_modality='$modality', lens_validity='$validity', quantity='$quantity', purchase_price='$pur_price', selling_price='$sell_price', tax='$tax', dte_modified='$dateTime' WHERE id='$id'  ";

if ($conn->query($sqlData) === TRUE) { 
	$_SESSION['actStatus'] = "success";
	$_SESSION['actTitle'] = "Good job!";
	$_SESSION['actMsg'] = "Contact Lens updated successfully!";
	header("Location: ".$baseURL."addCLens.php");
} else {
	$_SESSION['actStatus'] = "error";
	$_SESSION['actTitle'] = "Oops!";
	$_SESSION['actMsg'] = "Contact Lens not updated!";
	header("Location: ".$baseURL."addCLens.php");
}




?>