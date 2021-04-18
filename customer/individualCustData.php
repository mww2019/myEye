<?php

$cust_id	= $_GET['id'];

$custFetch = "SELECT * FROM customer WHERE cust_id='$cust_id' "; 
$custFetchResult = $conn->query($custFetch)->fetch_all(MYSQLI_ASSOC);

// echo "<pre>";
// print_r($custFetchResult);
// echo "</pre>";
// echo $custFetchResult[0]['name'];
// die;



?>