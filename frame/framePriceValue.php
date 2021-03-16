<?php

error_reporting(0);
session_start();

$branchh = $_POST['branch'];
$branch = $branchh?$branchh:$_SESSION['branch'];

$code = $_POST['code'];

include '../comm/db.php';

$data = "SELECT * FROM $branch WHERE product_code='$code' ";
$resultData = mysqli_query($conn,$data);
$rData = mysqli_fetch_assoc($resultData);

echo json_encode(array("code"=>$rData['product_code'], "name"=>$rData['product_name'], "purchase_price"=>$rData['purchase_price'], "selling_price"=>$rData['selling_price'], "tax"=>$rData['tax'], "quantity"=>$rData['quantity']));


?>