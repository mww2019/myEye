<?php

session_start();

include './comm/db.php';
$branch   = $_SESSION['branch'];

if($branch === ''){
	$shopFetch = "SELECT * FROM shop WHERE status=1 "; 
	$shopFetchResult = $conn->query($shopFetch)->fetch_all(MYSQLI_ASSOC);
} else {
	$productFetch = "SELECT * FROM $branch WHERE status=1 "; 
	$productFetchResult = $conn->query($productFetch)->fetch_all(MYSQLI_ASSOC);
}


// echo "<pre>";
// print_r($branchFetchResult);
// echo "</pre>";




?>