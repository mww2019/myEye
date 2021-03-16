<?php

//error_reporting(0);
include_once '../comm/baseURL.php';
session_start();
date_default_timezone_set('Asia/Kolkata');
$dateTime	=	date('Y-m-d H:i:s');
$branch 	= $_SESSION['branch']?$_SESSION['branch']:$_POST['branch'];

$pro_cat 	= 'frame';
$pro_code 	= $_POST['code']?$_POST['code']:'NA';
$pro_name 	= $_POST['f_name']?strtolower($_POST['f_name']):'NA';
$sup_name	= $_POST['sName'];
$pur_dte	= $_POST['pDte'];
$pur_price 	= $_POST['pur_price']?$_POST['pur_price']:0;
$sell_price = $_POST['sell_price']?$_POST['sell_price']:0;
$tax 		= $_POST['tax']?$_POST['tax']:0;
$quantity 	= $_POST['quantity']?$_POST['quantity']:0;

$claP = ($sell_price*$tax)/100;
$sellTaxPrice = number_format(floor($claP*100)/100,2, '.', '');

include_once '../comm/db.php'; 

$chkPro = "SELECT * FROM $branch WHERE product_code='$pro_code' ";
$chkProResult = $conn->query($chkPro)->fetch_array();

// echo $pro_code;
// echo "<pre>";
// print_r($chkProResult);
// echo $chkProResult['product_code'];
// echo "</pre>";

if($chkProResult['product_code'] === $pro_code) { 

	// $qtyFetch = "SELECT quantity FROM $branch WHERE product_code='$pro_code'"; 
	// $qtyFetchResult = $conn->query($qtyFetch)->fetch_all(MYSQLI_ASSOC);
	$pre_quant = $chkProResult['quantity'];
	$new_quantity = $quantity + $pre_quant;

	$sqlData1 = "UPDATE $branch SET purchase_price='$pur_price', selling_price='$sell_price', tax='$tax', quantity='$new_quantity', dte_modified='$dateTime' WHERE product_code='$pro_code'  ";
}
else{

	$sqlData1 = "INSERT INTO $branch (branch_name, product_cat, product_code, product_name, purchase_price, selling_price, tax, quantity) VALUES ('$branch', '$pro_cat', '$pro_code', '$pro_name', '$pur_price' ,'$sell_price', '$tax', '$quantity') ";
}


$sqlData = "INSERT INTO product_purches (branch, pro_cat, pro_code, pro_name, sup_name, pur_dte, purchase_price, selling_price, tax, quantity, sellTaxPrice) VALUES ('$branch', '$pro_cat', '$pro_code', '$pro_name', '$sup_name', '$pur_dte', '$pur_price' ,'$sell_price', '$tax', '$quantity', '$sellTaxPrice')";

if ($conn->query($sqlData) === TRUE) { 
	$conn->query($sqlData1);
	$_SESSION['actStatus'] = "success";
	$_SESSION['actTitle'] = "Good job!";
	$_SESSION['actMsg'] = "Purches added successfully!";
	header("Location: ".$baseURL."addPurFrame.php");
} else {
	$_SESSION['actStatus'] = "error";
	$_SESSION['actTitle'] = "Oops!";
	$_SESSION['actMsg'] = "Purches not added!";
	header("Location: ".$baseURL."addPurFrame.php");
}




?>





