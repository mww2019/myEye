<?php

error_reporting(0);
session_start();

date_default_timezone_set('Asia/Kolkata');
$id = $_GET['id'];
$dateTime =	date('Y-m-d H:i:s');

include_once '../comm/db.php'; 
include_once '../comm/baseURL.php'; 
$sql = "UPDATE customer SET dte_modified='$dateTime', status='0' WHERE id='$id' ";

if ($conn->query($sql) === TRUE) {
  $_SESSION['actStatus'] = "success";
  $_SESSION['actTitle'] = "Good job!";
  $_SESSION['actMsg'] = "Customer deleted successfully!";
  header("Location: ".$baseURL."addCustomer.php");
} else {
  $_SESSION['actStatus'] = "error";
  $_SESSION['actTitle'] = "Oops!";
  $_SESSION['actMsg'] = "Customer not deleted!";
  header("Location: ".$baseURL."addCustomer.php");
}




?>