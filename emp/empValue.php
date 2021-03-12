<?php

error_reporting(0);

$empId = $_POST['id'];

include '../comm/db.php';

$empData = "SELECT * FROM user WHERE id='$empId' ";
$resultEmpData = mysqli_query($conn,$empData);
$rEmpData = mysqli_fetch_assoc($resultEmpData);

echo json_encode(array("name"=>$rEmpData['name'], "email"=>$rEmpData['email'], "phone"=>$rEmpData['phone'], "branch"=>$rEmpData['branch'], "asgShop"=>$rEmpData['assign_shop'], "empType"=>$rEmpData['emp_type'], "address"=>$rEmpData['address']));


?>