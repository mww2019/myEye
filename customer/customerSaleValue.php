<?php

error_reporting(0);
session_start();
$branch = $_SESSION['branch'];

$id = $_POST['id'];

include '../comm/db.php';

$data = "SELECT * FROM sales WHERE id='$id' ";
$resultData = mysqli_query($conn,$data);
$rData = mysqli_fetch_assoc($resultData);

$des = explode('|',$rData['description']);

$count = count($des);
$data1 = '<table class="table table-bordered table-striped table-hover js-basic-example dataTable"><tr><th>Pro Type</th><th>Pro Code</th><th>Pro Name</th><th>Quantity</th><th>Unit Amt(₹)</th><th>Total Amt(₹)</th></tr>';
for($i=0;$i<$count;$i++){
	$des1 = explode(',',$des[$i]);

	$pData = "SELECT product_cat, product_name FROM $branch WHERE product_code='$des1[0]' ";
	$resultPData = mysqli_query($conn,$pData);
	$rPData = mysqli_fetch_assoc($resultPData);

	$data1 .= '<tr><td>'.ucwords($rPData['product_cat']).'</td><td>'.$des1[0].'</td><td>'.ucwords($rPData['product_name']).'</td><td>'.$des1[1].'</td><td>'.$des1[2].'</td><td>'.$des1[3].'</td></tr>';
}
$data1 .= '</table>';
// echo $data1;
// print_r($des);
// die;

echo json_encode(array("cust_id"=>$rData['cust_id'], "cust_phone"=>$rData['cust_phone'], "branch"=>$rData['branch'],  "shop"=>$rData['shop'], "total_amt"=>$rData['total_amt'], "discount"=>$rData['discount'],  "amt_paid"=>$rData['amt_paid'], "amt_bal"=>$rData['amt_bal'], "notes"=>$rData['notes'], "description"=>$data1, "dte_created"=>$rData['dte_created']));

// echo json_encode(array("description"=>$data1));


?>