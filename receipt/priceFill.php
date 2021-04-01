<?php

error_reporting(0);
$branch = $_POST['branch'];
$pCode = $_POST['pCode'];

include '../comm/db.php';

$data = "SELECT selling_price FROM $branch WHERE product_code='$pCode' ";
$resultData = mysqli_query($conn,$data);
$rData = mysqli_fetch_assoc($resultData);

echo json_encode(array("price"=>$rData['selling_price']));


?>