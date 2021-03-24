<?php

error_reporting(0);
include_once '../comm/baseURL.php';
session_start();
date_default_timezone_set('Asia/Kolkata');
$branch 	= $_SESSION['branch']?$_SESSION['branch']:$_POST['branch'];

$name       = strtolower($_POST['name']);
$cust_id    = strtoupper(substr($name, 0, 3)).''.date('ydis');
$shop       = $_POST['asgShop'];
$email      = $_POST['email']?strtolower($_POST['email']):'NA';
$phone      = $_POST['phone'];
$age        = $_POST['age'];
$gender     = $_POST['gender'];
$address    = $_POST['address']?strtolower($_POST['address']):'NA';
$refBy      = $_POST['ref']?strtolower($_POST['ref']):'NA';
$dob        = $_POST['dob']?$_POST['dob']:'NA';	

// echo $branch.' - '.$name.' - '.$cust_id.' - '.$shop.' - '.$email.' - '.$phone.' - '.$age.' - '.$gender.' - '.$address.' - '.$refBy.' - '.$dob;
// die;

include_once '../comm/db.php'; 

$chkCode = "SELECT * FROM customer WHERE phone='$phone' and status=1 ";
$resultChkCode = $conn->query($chkCode)->fetch_array();
if($resultChkCode['phone'] === $phone) {
	$_SESSION['actStatus'] = "error";
	$_SESSION['actTitle'] = "Oops!";
	$_SESSION['actMsg'] = "Customer phone no already exist!";
	header("Location: ".$baseURL."addCustomer.php");
} else {
	$sqlData = "INSERT INTO customer (branch, cust_id, shop, name, email, phone, dob, age, gender, address, refBy) VALUES ('$branch', '$cust_id', '$shop', '$name', '$email', '$phone', '$dob', '$age', '$gender', '$address', '$refBy')";

	if ($conn->query($sqlData) === TRUE) { 
	    $_SESSION['actStatus'] = "success";
	    $_SESSION['actTitle'] = "Good job!";
	    $_SESSION['actMsg'] = "Customer added successfully!";
	    header("Location: ".$baseURL."addCustomer.php");
	} else {
	    $_SESSION['actStatus'] = "error";
	    $_SESSION['actTitle'] = "Oops!";
	    $_SESSION['actMsg'] = "Customer not added!";
	    header("Location: ".$baseURL."addCustomer.php");
	}
}




?>