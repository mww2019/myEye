<?php

include './comm/db.php';

$todayCust = "SELECT count(*) as todayCust FROM customer WHERE branch='$branch' AND DATE(dte_created)=CURDATE() AND status=1";
$todayCustResult = $conn->query($todayCust)->fetch_array();
if($todayCustResult['todayCust'] > 0){
	$todayCustData = $todayCustResult['todayCust'];
} else {
	$todayCustData = 0;
}

$todaySale = "SELECT SUM(amt_paid) as todaySale FROM sales WHERE branch='$branch' AND DATE(dte_created)=CURDATE() AND status=1";
$todaySaleResult = $conn->query($todaySale)->fetch_array();
if($todaySaleResult['todaySale'] > 0){
	$todaySaleData = $todaySaleResult['todaySale'];
} else {
	$todaySaleData = 0;
}

$todayPur = "SELECT * FROM product_purches WHERE branch='$branch' AND pur_dte=date_format(CURDATE(), '%m/%d/%Y') AND status=1";
$todayPurResult = $conn->query($todayPur);
$totPurAmt = 0;
foreach ($todayPurResult as $dta) {
	$pur_price 	= $dta['purchase_price'];
	$quant		= $dta['quantity'];
	$totPurAmt = $totPurAmt + ($pur_price*$quant);
}
if($totPurAmt > 0){
	$todayPurData = $totPurAmt;
} else {
	$todayPurData = 0;
}


$curMFrame = "SELECT pro_cat,purchase_price,quantity FROM product_purches WHERE branch='$branch' AND DATE_FORMAT(STR_TO_DATE(pur_dte, '%m/%d/%Y'),'%m')=date_format(CURDATE(), '%m') AND status=1";
$curMFrameResult = $conn->query($curMFrame);
$frame = 0; $glass = 0; $goggle = 0; $lense = 0; $solution = 0; $other = 0;
foreach ($curMFrameResult as $dta) {
	if($dta['pro_cat'] == 'frame'){
		$pur_price 	= $dta['purchase_price'];
		$quant		= $dta['quantity'];
		$frame 		= $frame + ($pur_price*$quant);
	}
	else if($dta['pro_cat'] == 'glass'){
		$pur_price 	= $dta['purchase_price'];
		$quant		= $dta['quantity'];
		$glass 		= $glass + ($pur_price*$quant);
	}
	else if($dta['pro_cat'] == 'goggle'){
		$pur_price 	= $dta['purchase_price'];
		$quant		= $dta['quantity'];
		$goggle 	= $goggle + ($pur_price*$quant);
	}
	else if($dta['pro_cat'] == 'lense'){
		$pur_price 	= $dta['purchase_price'];
		$quant		= $dta['quantity'];
		$lense 		= $lense + ($pur_price*$quant);
	}
	else if($dta['pro_cat'] == 'solution'){
		$pur_price 	= $dta['purchase_price'];
		$quant		= $dta['quantity'];
		$solution 	= $solution + ($pur_price*$quant);
	}
	else if($dta['pro_cat'] == 'other'){
		$pur_price 	= $dta['purchase_price'];
		$quant		= $dta['quantity'];
		$other 		= $other + ($pur_price*$quant);
	}
}

// $todayPur = "SELECT SUM(purchase_price) as todayPur FROM product_purches WHERE branch='$branch' AND pur_dte=date_format(CURDATE(), '%m/%d/%Y') AND status=1";
// $todayPurResult = $conn->query($todayPur)->fetch_array();
// if($todayPurResult['todayPur'] > 0){
// 	$todayPurData = $todayPurResult['todayPur'];
// } else {
// 	$todayPurData = 0;
// }


$noShops = "SELECT id,name FROM shop WHERE branch='$branch' AND status=1 ";
$resultNoShops = $conn->query($noShops);
// echo "<pre>";
// print_r($resultNoShops);
// echo "</pre>";
// die;





// $shopFetch = "SELECT count(*) as totalShop FROM shop WHERE status=1"; 
// $shopFetchResult = $conn->query($shopFetch)->fetch_array();

// $empFetch = "SELECT count(*) as totalEmp FROM user WHERE emp_type='employee' AND status=1";
// $empFetchResult = $conn->query($empFetch)->fetch_array();

// echo "<pre>";
// print_r($shopFetchResult['totalShop']);
// echo "</pre>";




?>