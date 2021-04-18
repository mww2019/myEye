<?php

error_reporting(0);
session_start();
include_once '../comm/baseURL.php';
include_once '../comm/db.php';

$id = $_POST['custSaleID1'];

$chkID = "SELECT * FROM sales WHERE id='$id' ";
$resultChkID = $conn->query($chkID)->fetch_array();

// echo "<pre>";
// print_r($resultChkID);
// echo "</pre>";
// die;

$cust_id	= $resultChkID['cust_id'];
$custPhone 	= $resultChkID['cust_phone'];
$branch		= $resultChkID['branch'];
$shop 		= $resultChkID['shop'];
$totAmt 	= $resultChkID['total_amt'];
$discount 	= $resultChkID['discount'];
$amtPay 	= $_POST['payNow'];
$amtPaid 	= $_POST['paidAmt'];

$newTot		= $_POST['balAmt'];
$amtBal 	= $newTot-$amtPay;

$notes 		= $resultChkID['notes'];
$discript  	= $resultChkID['description'];

if($amtBal == 0){
	$sale_status = 'paid';
} else {
	$sale_status = 'balance';
}

// echo $cust_id.' - '.$custPhone.' - '.$branch.' - '.$shop.' - '.$totAmt.' - '.$discount.' - '.$amtPaid.' - '.$amtBal.' - '.$notes.' - '.$discript;
// die;

$sqlData = "INSERT INTO sales (cust_id, cust_phone, branch, shop, total_amt, discount, amt_paid, amt_bal, sale_status, notes, description) VALUES ('$cust_id', '$custPhone', '$branch', '$shop', '$totAmt', '$discount', '$amtPay', '$amtBal', '$sale_status', '$notes', '$discript')";

if ($conn->query($sqlData) === TRUE) { 
	$_SESSION['actStatus'] = "success";
	$_SESSION['actTitle'] = "Good job!";
	$_SESSION['actMsg'] = "Sale added successfully!";
	header("Location: ".$baseURL."custAllData.php?id=".$cust_id);
} else {
	$_SESSION['actStatus'] = "error";
	$_SESSION['actTitle'] = "Oops!";
	$_SESSION['actMsg'] = "Sale not added!";
	header("Location: ".$baseURL."custAllData.php?id=".$cust_id);
}





?>