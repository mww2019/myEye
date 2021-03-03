<?php

error_reporting(0);
session_start();

date_default_timezone_set('Asia/Kolkata');
$id = $_GET['id'];
$dateTime =	date('Y-m-d H:i:s');

include_once '../comm/db.php'; 
include_once '../comm/baseURL.php'; 

$preQF = "SELECT pro_code,quantity FROM product_purches WHERE id='$id'";
$preQFResult = $conn->query($preQF)->fetch_all(MYSQLI_ASSOC);
$preQF_quant = $preQFResult[0]['quantity'];
$code = $preQFResult[0]['pro_code'];

$qtyFetch = "SELECT quantity FROM product_frame WHERE code='$code'"; 
$qtyFetchResult = $conn->query($qtyFetch)->fetch_all(MYSQLI_ASSOC);
$pre_quant = $qtyFetchResult[0]['quantity'];
$new_quant = $pre_quant - $preQF_quant;

$sql = "UPDATE product_frame SET quantity='$new_quant', dte_modified='$dateTime' WHERE code='$code' ";

$sql1 = "UPDATE product_purches SET dte_modified='$dateTime', status='0' WHERE id='$id' ";

if ($conn->query($sql1) === TRUE) {
	$conn->query($sql);
	$_SESSION['actStatus'] = "success";
	$_SESSION['actTitle'] = "Good job!";
	$_SESSION['actMsg'] = "Purchase deleted successfully!";
	header("Location: ".$baseURL."addPurFrame.php");
} else {
  	$_SESSION['actStatus'] = "error";
  	$_SESSION['actTitle'] = "Oops!";
  	$_SESSION['actMsg'] = "Purchase not deleted!";
  	header("Location: ".$baseURL."addPurFrame.php");
}




?>