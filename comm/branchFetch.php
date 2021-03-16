<?php

session_start();

include './comm/db.php';

$branchFetch = "SELECT * FROM branch WHERE status=1 "; 
$branchFetchResult = $conn->query($branchFetch)->fetch_all(MYSQLI_ASSOC);

// echo "<pre>";
// print_r($branchFetchResult);
// echo "</pre>";
// die;

?>