<?php

error_reporting(0);

$id = $_POST['id'];

include '../comm/db.php';

$data = "SELECT * FROM customer WHERE id='$id' ";
$resultData = mysqli_query($conn,$data);
$rData = mysqli_fetch_assoc($resultData);

echo json_encode(array("branch"=>$rData['branch'], "cust_id"=>$rData['cust_id'], "shop"=>$rData['shop'], "name"=>$rData['name'], "email"=>$rData['email'], "phone"=>$rData['phone'], "dob"=>$rData['dob'], "age"=>$rData['age'], "gender"=>$rData['gender'], "address"=>$rData['address'], "refBy"=>$rData['refBy']));


?>