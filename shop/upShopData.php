<?php

error_reporting(0);
session_start();
date_default_timezone_set('Asia/Kolkata');
$dateTime 	=	date('Y-m-d H:i:s');

$id 		= $_POST['shopId'];
$name 		= strtolower($_POST['shop_name']);
$phone 		= $_POST['phone'];
$branch 	= $_POST['branch'];
$address 	= strtolower($_POST['address']);

include_once '../comm/db.php';
include_once '../comm/baseURL.php'; 

$sql = "UPDATE shop SET name='$name', phone='$phone', branch='$branch', address='$address', dte_modified='$dateTime' WHERE id='$id' ";

if ($conn->query($sql) === TRUE) {
  $_SESSION['actStatus'] = "success";
  $_SESSION['actTitle'] = "Good job!";
  $_SESSION['actMsg'] = "Shop details updated successfully!";
  header("Location: ".$baseURL."addShop.php");
} else {
  $_SESSION['actStatus'] = "error";
  $_SESSION['actTitle'] = "Oops!";
  $_SESSION['actMsg'] = "Shop details not updated!";
  header("Location: ".$baseURL."addShop.php");
}




?>