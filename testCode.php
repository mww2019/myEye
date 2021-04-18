<?php


$name  = 'praveen';
$phone = '2343454565';

$nmeF = strtoupper(substr($name, 0, 3));
$phnF = substr($phone, 3, 4);

$cust_id = $nmeF.''.$phnF.''.date('is');

echo $nmeF.' - '.$phnF.' - '.$cust_id;





?>