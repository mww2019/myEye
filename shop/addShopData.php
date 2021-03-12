<?php

// error_reporting(0);
include_once '../comm/baseURL.php';
session_start();
$branchh    = $_SESSION['branch']?$_SESSION['branch']:$_POST['branch'];

$name 		= strtolower($_POST['shop_name']);
$phone 		= $_POST['phone'];
$branch 	= $branchh;
$address 	= strtolower($_POST['address']);


include_once '../comm/db.php'; 

$sqlData = "INSERT INTO shop (name, phone, branch, address) VALUES ('$name', '$phone', '$branch', '$address')";

if ($conn->query($sqlData) === TRUE) { 
	$_SESSION['actStatus'] = "success";
	$_SESSION['actTitle'] = "Good job!";
	$_SESSION['actMsg'] = "Shop added successfully!";
	header("Location: ".$baseURL."addShop.php");
} else {
	$_SESSION['actStatus'] = "error";
	$_SESSION['actTitle'] = "Oops!";
	$_SESSION['actMsg'] = "Shop not added!";
	header("Location: ".$baseURL."addShop.php");
}




?>