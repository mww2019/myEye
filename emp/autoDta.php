<?php

session_start();

include './comm/db.php';
$branch   = $_SESSION['branch'];

if($branch === ''){
	$shopFetch = "SELECT * FROM shop WHERE status=1 "; 
	$shopFetchResult = $conn->query($shopFetch)->fetch_all(MYSQLI_ASSOC);
} else {
	$shopFetch = "SELECT * FROM shop WHERE branch='$branch' and status=1 "; 
	$shopFetchResult = $conn->query($shopFetch)->fetch_all(MYSQLI_ASSOC);
}


// echo "<pre>";
// print_r($branchFetchResult);
// echo "</pre>";




?>