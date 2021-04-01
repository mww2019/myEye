<?php

error_reporting(0);
session_start();
$branch = $_SESSION['branch'];
$phone = $_POST['phone'];

include '../comm/db.php';

$data = "SELECT * FROM customer WHERE phone='$phone' and branch='$branch' and status=1 ";
$resultData = mysqli_query($conn,$data);
$rData = mysqli_fetch_assoc($resultData);

echo json_encode(array("id"=>$rData['id'],"name"=>$rData['name'],"gender"=>$rData['gender'],"address"=>$rData['address']));


?>