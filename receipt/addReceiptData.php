<?php

error_reporting(0);
include_once '../comm/baseURL.php';
include_once '../comm/db.php';
session_start();
date_default_timezone_set('Asia/Kolkata');
$dateTime	= date('Y-m-d H:i:s');
$branch 	= $_SESSION['branch'];

$description	= $_POST['a'];
$quantity 		= $_POST['b'];
$uAmout 		= $_POST['c'];
$amount 		= $_POST['d'];

// echo "<pre>";
// print_r($description);
// echo "</pre>";
// echo "<pre>";
// print_r($quantity);
// echo "</pre>";

$no = count($description);
$data = array();
for($i=0;$i<$no;$i++){
	$data[] = $description[$i].','.$quantity[$i].','.$uAmout[$i].','.$amount[$i];  //total table data

	$pro_code = $description[$i];
	$quant = $quantity[$i];

	$chkPro = "SELECT quantity FROM $branch WHERE product_code='$pro_code' ";
	$chkProResult = $conn->query($chkPro)->fetch_array();
	$preQuant = $chkProResult['quantity'];
	$newQuant = $preQuant - $quant;

	$sqlData1 = "UPDATE $branch SET quantity='$newQuant', dte_modified='$dateTime' WHERE product_code='$pro_code'  ";
	$conn->query($sqlData1);
	// echo $quantity.' - '.$preQuant.' - '.$newQuant;
	// die;

}
// echo "<pre>";
// print_r($data);
// echo "</pre>";

$shop 		= $_POST['asgShop'];
$custPhone 	= $_POST['cust_phone'];
$custName 	= strtolower($_POST['cust_name']);
$gender 	= $_POST['gender'];
$address 	= $_POST['cust_add']?$_POST['cust_add']:'NA';
$discript  	= implode('|',$data);

// echo $discript;
// die;

$totAmt 	= $_POST['tot_amt'];
$discount 	= $_POST['discount'];
$amtPaid 	= $_POST['paid_amt'];
$amtBal 	= $_POST['bal_amt'];
$notes 		= $_POST['cust_notes']?$_POST['cust_notes']:'NA';

if($amtBal == 0){
	$sale_status = 'paid';
} else {
	$sale_status = 'balance';
}


$chkPhone = "SELECT * FROM customer WHERE phone='$custPhone' and status=1 ";
$resultChkPhone = $conn->query($chkPhone)->fetch_array();
if($resultChkPhone['phone'] !== $custPhone) { 
	$cust_id    = strtoupper(substr($custName, 0, 3)).''.date('ydis');
	$sqlCustData = "INSERT INTO customer (branch, cust_id, shop, name, email, phone, dob, age, gender, address, refBy) VALUES ('$branch', '$cust_id', '$shop', '$custName', 'NA', '$custPhone', 'NA', 'NA', '$gender', '$address', 'NA')";
	$conn->query($sqlCustData);
} else {
	$cust_id = $resultChkPhone['cust_id'];

}

$sqlData = "INSERT INTO sales (cust_id, cust_phone, branch, shop, total_amt, discount, amt_paid, amt_bal, sale_status, notes, description) VALUES ('$cust_id', '$custPhone', '$branch', '$shop', '$totAmt', '$discount', '$amtPaid', '$amtBal', '$sale_status', '$notes', '$discript')";

if ($conn->query($sqlData) === TRUE) { 
	$_SESSION['actStatus'] = "success";
	$_SESSION['actTitle'] = "Good job!";
	$_SESSION['actMsg'] = "Sale added successfully!";
	header("Location: ".$baseURL."allReceipt.php");
} else {
	$_SESSION['actStatus'] = "error";
	$_SESSION['actTitle'] = "Oops!";
	$_SESSION['actMsg'] = "Sale not added!";
	header("Location: ".$baseURL."allReceipt.php");
}










// echo $shop.' - '.$custPhone.' - '.$custName.' - '.$gender.' - '.$address.' - '.$totAmt.' - '.$discount.' - '.$amtPaid.' - '.$amtBal.' - '.$notes;
// print_r($discript);

// $totalA = 0;
// for($i=0;$i<$no;$i++){
// 	$price = explode(',',$data[$i]);
// 	$totalA += $price[3];    // total price
// }
// echo $totalA;








?>