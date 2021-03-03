<?php


include './comm/db.php';

$shopFetch = "SELECT * FROM shop WHERE status=1"; 
$shopFetchResult = $conn->query($shopFetch)->fetch_all(MYSQLI_ASSOC);

// echo "<pre>";
// print_r($shopFetchResult);
// echo "</pre>";




?>