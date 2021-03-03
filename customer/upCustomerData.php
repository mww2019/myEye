<?php

error_reporting(0);
include_once '../comm/baseURL.php';
session_start();
date_default_timezone_set('Asia/Kolkata');
$dateTime	=	date('Y-m-d H:i:s');

$id         = $_POST['customerID'];
$name       = strtolower($_POST['name']);
$shop       = $_POST['asgShop'];
$email      = $_POST['email']?strtolower($_POST['email']):'NA';
$phone      = $_POST['phone'];
$age        = $_POST['age'];
$gender     = $_POST['gender'];
$address    = $_POST['address']?strtolower($_POST['address']):'NA';
$refBy      = $_POST['ref']?strtolower($_POST['ref']):'NA';
$dob        = $_POST['dob']?$_POST['dob']:'NA';	


include_once '../comm/db.php'; 

$sqlData = "UPDATE customer SET shop='$shop', name='$name', email='$email', phone='$phone', dob='$dob', age='$age', gender='$gender', address='$address', refBy='$refBy', dte_modified='$dateTime' WHERE id='$id'  ";

if ($conn->query($sqlData) === TRUE) { 
    $_SESSION['actStatus'] = "success";
    $_SESSION['actTitle'] = "Good job!";
    $_SESSION['actMsg'] = "Customer updated successfully!";
    header("Location: ".$baseURL."addCustomer.php");
} else {
    $_SESSION['actStatus'] = "error";
    $_SESSION['actTitle'] = "Oops!";
    $_SESSION['actMsg'] = "Customer not updated!";
    header("Location: ".$baseURL."addCustomer.php");
}




?>