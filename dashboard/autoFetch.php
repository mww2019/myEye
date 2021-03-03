<?php


include './comm/db.php';

$shopFetch = "SELECT count(*) as totalShop FROM shop WHERE status=1"; 
$shopFetchResult = $conn->query($shopFetch)->fetch_array();

$empFetch = "SELECT count(*) as totalEmp FROM user WHERE emp_type='employee' AND status=1";
$empFetchResult = $conn->query($empFetch)->fetch_array();

// echo "<pre>";
// print_r($shopFetchResult['totalShop']);
// echo "</pre>";




?>