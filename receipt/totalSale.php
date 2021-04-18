<?php

session_start();
error_reporting(0);
include '../comm/db.php';
$branch = $_SESSION['branch'];

$shop = $_POST['shop'];

$getDate        = explode(' - ',$_POST['date']);
$date1          = explode(' ',$getDate[0]);
$monthNo1       = date('m', strtotime($date1[0]));
$removeComma1   = explode(',',$date1[1]);
$from           = $date1[2].'-'.$monthNo1.'-'.$removeComma1[0];
$date2          = $getDate[1];
if($date2 == ''){
    $to = $date1[2].'-'.$monthNo1.'-'.$removeComma1[0];
} else{
    $date21         = explode(' ',$getDate[1]);
    $monthNo2       = date('m', strtotime($date21[0]));
    $removeComma2   = explode(',',$date21[1]);
    $to             = $date21[2].'-'.$monthNo2.'-'.$removeComma2[0];
}

if($shop === ''){
	if($branch === '') {
	    $sqlquery = "SELECT sum(total_amt) AS totalAmt FROM sales WHERE sale_status='paid' AND status=1 AND (DATE(dte_created) BETWEEN '$from' AND '$to')";
	} else {
	    $sqlquery = "SELECT sum(total_amt) AS totalAmt FROM sales WHERE sale_status='paid' AND status=1 AND branch='$branch' AND (DATE(dte_created) BETWEEN '$from' AND '$to')";
	}
} else {
	if($branch === '') {
	    $sqlquery = "SELECT sum(total_amt) AS totalAmt FROM sales WHERE sale_status='paid' AND shop='$shop' AND status=1 AND (DATE(dte_created) BETWEEN '$from' AND '$to')";
	} else {
	    $sqlquery = "SELECT sum(total_amt) AS totalAmt FROM sales WHERE sale_status='paid' AND shop='$shop' AND status=1 AND branch='$branch' AND (DATE(dte_created) BETWEEN '$from' AND '$to')";
	}
}


$resultTotalSale = mysqli_query($conn,$sqlquery);
$totalSaleCount = mysqli_fetch_assoc($resultTotalSale);

echo json_encode(array("totalSaleAmt"=>number_format($totalSaleCount['totalAmt'],2)));


?>