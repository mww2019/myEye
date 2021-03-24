<?php

$description	= $_POST['a'];
$quantity 		= $_POST['b'];
$uAmout 		= $_POST['c'];
$amount 		= $_POST['d'];

$no = count($description);
$data = array();
for($i=0;$i<$no;$i++){
	$data[] = $description[$i].','.$quantity[$i].','.$uAmout[$i].','.$amount[$i];  //total table data
}

$totalA = 0;
for($i=0;$i<$no;$i++){
	$price = explode(',',$data[$i]);
	$totalA += $price[3];    // total price
}
echo $totalA;



?>