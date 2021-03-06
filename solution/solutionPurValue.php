<?php

error_reporting(0);

$id = $_POST['id'];

include '../comm/db.php';

$data = "SELECT * FROM product_purches WHERE id='$id' ";
$resultData = mysqli_query($conn,$data);
$rData = mysqli_fetch_assoc($resultData);

echo json_encode(array("pro_code"=>$rData['pro_code'], "pro_name"=>$rData['pro_name'], "sup_name"=>$rData['sup_name'], "pur_dte"=>$rData['pur_dte'], "purchase_price"=>$rData['purchase_price'], "selling_price"=>$rData['selling_price'], "tax"=>$rData['tax'], "quantity"=>$rData['quantity']));


?>