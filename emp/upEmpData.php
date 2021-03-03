<?php

// error_reporting(0);
include_once '../comm/baseURL.php';
include_once '../comm/db.php';
session_start();
date_default_timezone_set('Asia/Kolkata');
$dateTime	=	date('Y-m-d H:i:s');

$id 		= $_POST['empId'];
$name 		= strtolower($_POST['eName']);
$email		= strtolower($_POST['email']);
$phone 		= $_POST['phone'];
$assignShop = $_POST['asgShop']?$_POST['asgShop']:'NULL';
$empType	= $_POST['empType'];
$address 	= $_POST['address'];

$checkMail = "SELECT email FROM user WHERE email='$email' and id!=$id and status=1";
$checkMailResult = $conn->query($checkMail)->fetch_array();

$checkPhone = "SELECT phone FROM user WHERE phone='$phone' and id!=$id and status=1";
$checkPhoneResult = $conn->query($checkPhone)->fetch_array();

if($checkPhoneResult['phone'] === $phone){
	$_SESSION['actStatus'] = "error";
	$_SESSION['actTitle'] = "Oops!";
	$_SESSION['actMsg'] = "Employee with phone no already exist!";
	header("Location: ".$baseURL."addEmployee.php");
}
else if($checkMailResult['email'] === $email){
	$_SESSION['actStatus'] = "error";
	$_SESSION['actTitle'] = "Oops!";
	$_SESSION['actMsg'] = "Employee with email id already exist!";
	header("Location: ".$baseURL."addEmployee.php");
}
else{
	$sqlData = "UPDATE user SET name='$name', email='$email', phone='$phone', emp_type='$empType', address='$address', assign_shop='$assignShop', dte_modified='$dateTime' WHERE id='$id'  ";

	if ($conn->query($sqlData) === TRUE) { 
		$_SESSION['actStatus'] = "success";
		$_SESSION['actTitle'] = "Good job!";
		$_SESSION['actMsg'] = "Employee updated successfully!";
		header("Location: ".$baseURL."addEmployee.php");
	} else {
		$_SESSION['actStatus'] = "error";
		$_SESSION['actTitle'] = "Oops!";
		$_SESSION['actMsg'] = "Employee not updated!";
		header("Location: ".$baseURL."addEmployee.php");
	}
}




?>