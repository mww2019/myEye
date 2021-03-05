<?php


include './comm/db.php';

$dtaFetch = "SELECT * FROM product_goggle WHERE status=1"; 
$dtaFetchResult = $conn->query($dtaFetch)->fetch_all(MYSQLI_ASSOC);

$dtaFetch1 = "SELECT * FROM supplier WHERE status=1"; 
$dtaFetchResult1 = $conn->query($dtaFetch1)->fetch_all(MYSQLI_ASSOC);

// echo "<pre>";
// print_r($shopFetchResult);
// echo "</pre>";






?>