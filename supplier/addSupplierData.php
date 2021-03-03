<?php

error_reporting(0);
include_once '../comm/baseURL.php';
session_start();

$name 		= strtolower($_POST['supplier_name']);
$email		= strtolower($_POST['email']);
$phone 		= $_POST['phone'];
$company 	= strtolower($_POST['company']);
$products	= strtolower($_POST['product']);


include_once '../comm/db.php'; 

$sqlData = "INSERT INTO supplier (name, email, phone, company, products) VALUES ('$name', '$email', '$phone', '$company', '$products')";

if ($conn->query($sqlData) === TRUE) { 
	$_SESSION['actStatus'] = "success";
	$_SESSION['actTitle'] = "Good job!";
	$_SESSION['actMsg'] = "Supplier added successfully!";
	header("Location: ".$baseURL."addSupplier.php");
} else {
	$_SESSION['actStatus'] = "error";
	$_SESSION['actTitle'] = "Oops!";
	$_SESSION['actMsg'] = "Supplier not added!";
	header("Location: ".$baseURL."addSupplier.php");
}




?>