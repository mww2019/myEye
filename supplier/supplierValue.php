<?php

error_reporting(0);

$ID = $_POST['id'];

include '../comm/db.php';

$supplierData = "SELECT * FROM supplier WHERE id='$ID' ";
$resultSupplierData = mysqli_query($conn,$supplierData);
$rSupplierData = mysqli_fetch_assoc($resultSupplierData);

echo json_encode(array("name"=>$rSupplierData['name'], "email"=>$rSupplierData['email'], "phone"=>$rSupplierData['phone'], "company"=>$rSupplierData['company'], "product"=>$rSupplierData['products'],));


?>