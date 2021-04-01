<?php

error_reporting(0);
session_start();
$branch = $_SESSION['branch'];

include '../comm/db.php';

$query = "SELECT * FROM $branch WHERE status=1 ";
$count = mysqli_query($conn,$query);

$data = array();

while ( $row = mysqli_fetch_row($count) )
{
  $data[] = $row;
}
echo json_encode( $data );

// $rData = mysqli_fetch_assoc($resultData);

// echo json_encode(array("id"=>$rData['id'],"name"=>$rData['name'],"gender"=>$rData['gender'],"address"=>$rData['address']));


?>