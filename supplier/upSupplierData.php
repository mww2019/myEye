<?php

error_reporting(0);
session_start();
date_default_timezone_set('Asia/Kolkata');
$dateTime 	=	date('Y-m-d H:i:s');

$id 		= $_POST['supplierId'];
$name 		= strtolower($_POST['supplier_name']);
$email		= strtolower($_POST['email']);
$phone 		= $_POST['phone'];
$company 	= strtolower($_POST['company']);
$products	= strtolower($_POST['product']);

include_once '../comm/db.php';
include_once '../comm/baseURL.php'; 

$sql = "UPDATE supplier SET name='$name', email='$email', phone='$phone', company='$company', products='$products', dte_modified='$dateTime' WHERE id='$id' ";

if ($conn->query($sql) === TRUE) {
  $_SESSION['actStatus'] = "success";
  $_SESSION['actTitle'] = "Good job!";
  $_SESSION['actMsg'] = "Supplier details updated successfully!";
  header("Location: ".$baseURL."addSupplier.php");
} else {
  $_SESSION['actStatus'] = "error";
  $_SESSION['actTitle'] = "Oops!";
  $_SESSION['actMsg'] = "Supplier details not updated!";
  header("Location: ".$baseURL."addSupplier.php");
}




?>