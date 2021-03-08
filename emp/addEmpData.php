<?php

// error_reporting(0);
include_once '../comm/baseURL.php';
include_once '../comm/db.php';
session_start();
$branchh    = $_SESSION['branch'];

$name 		= strtolower($_POST['eName']);
$email		= strtolower($_POST['email']);
$phone 		= $_POST['phone'];
$pass		= $_POST['password'];
$rPass		= $_POST['rPass'];
$branch		= $branchh;
$assignShop = $_POST['asgShop']?$_POST['asgShop']:'NULL';
$empType	= $_POST['empType'];
$address 	= $_POST['address'];

$checkMail = "SELECT email FROM user WHERE email='$email' and status=1";
$checkMailResult = $conn->query($checkMail)->fetch_array();

$checkPhone = "SELECT phone FROM user WHERE phone='$phone' and status=1";
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
else if($pass !== $rPass){
	$_SESSION['actStatus'] = "error";
	$_SESSION['actTitle'] = "Oops!";
	$_SESSION['actMsg'] = "Password Mismatch!";
	header("Location: ".$baseURL."addEmployee.php");
}
else{
	$pass = md5($_POST['password']);
	$sqlData = "INSERT INTO user (name, email, phone, password, emp_type, address, branch, assign_shop) VALUES ('$name', '$email', '$phone', '$pass', '$empType', '$address', '$branch', '$assignShop')";

	if ($conn->query($sqlData) === TRUE) { 
		$_SESSION['actStatus'] = "success";
		$_SESSION['actTitle'] = "Good job!";
		$_SESSION['actMsg'] = "Employee added successfully!";
		header("Location: ".$baseURL."addEmployee.php");
	} else {
		$_SESSION['actStatus'] = "error";
		$_SESSION['actTitle'] = "Oops!";
		$_SESSION['actMsg'] = "Employee not added!";
		header("Location: ".$baseURL."addEmployee.php");
	}
}




?>