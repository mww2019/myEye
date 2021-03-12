<?php

// error_reporting(0);
include_once '../comm/baseURL.php';
session_start();
date_default_timezone_set('Asia/Kolkata');
$dateTime	= date('Y-m-d H:i:s');
// $branchPre 	= $_POST['branch']?$_POST['branch']:strtolower($_POST['branchNme']);
$branch 	= $_SESSION['branch']?$_SESSION['branch']:strtolower($_POST['branch']);

$id         = $_POST['purID'];
$pro_cat 	= 'frame';
$pro_code 	= $_POST['code'];
$sup_name	= $_POST['sName']?$_POST['sName']:strtolower($_POST['sENme']);
$pro_name 	= $_POST['f_name']?strtolower($_POST['f_name']):'NA';
$pur_dte	= $_POST['pDte'];
$quantity 	= $_POST['quantity'];
$pur_price 	= $_POST['pur_price'];
$sell_price = $_POST['sell_price'];
$tax 		= $_POST['tax'];
$new_quantity = 0;

include_once '../comm/db.php';

$chkPurQant = "SELECT quantity FROM product_purches WHERE id='$id'";
$chkPurQantResult = $conn->query($chkPurQant)->fetch_array();

$chkBranchQty = "SELECT quantity FROM $branch WHERE product_code='$pro_code'";
$chkBranchQtyResult = $conn->query($chkBranchQty)->fetch_array();

if($chkPurQantResult['quantity'] === $quantity) { 
	$new_quantity = $chkBranchQtyResult['quantity'];
}
else {
	$new_quantity = $chkBranchQtyResult['quantity'] + ($quantity - $chkPurQantResult['quantity']);
}

$sqlData1 = "UPDATE $branch SET purchase_price='$pur_price', selling_price='$sell_price', tax='$tax', quantity='$new_quantity', dte_modified='$dateTime' WHERE product_code='$pro_code'  ";
 
$sqlData = "UPDATE product_purches SET sup_name='$sup_name', pur_dte='$pur_dte', purchase_price='$pur_price', selling_price='$sell_price', tax='$tax', quantity='$quantity', dte_modified='$dateTime' WHERE id='$id'  ";

if ($conn->query($sqlData) === TRUE) { 
	$conn->query($sqlData1);
	$_SESSION['actStatus'] = "success";
	$_SESSION['actTitle'] = "Good job!";
	$_SESSION['actMsg'] = "Purchase updated successfully!";
	header("Location: ".$baseURL."addPurFrame.php");
} else {
	$_SESSION['actStatus'] = "error";
	$_SESSION['actTitle'] = "Oops!";
	$_SESSION['actMsg'] = "Purchase not updated!";
	header("Location: ".$baseURL."addPurFrame.php");
}




?>