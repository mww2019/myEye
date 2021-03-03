<?php

error_reporting(0);
include_once '../comm/baseURL.php';
session_start();
date_default_timezone_set('Asia/Kolkata');

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


include_once '../comm/db.php'; 

$sqlData = "INSERT INTO customer (cust_id, shop, name, email, phone, dob, age, gender, address, refBy) VALUES ('$cust_id', '$shop', '$name', '$email', '$phone', '$dob', '$age', '$gender', '$address', '$refBy')";

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




?>