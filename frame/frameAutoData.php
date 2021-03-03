<?php


include './comm/db.php';

$dtaFetch = "SELECT * FROM product_frame WHERE status=1"; 
$dtaFetchResult = $conn->query($dtaFetch)->fetch_all(MYSQLI_ASSOC);

// echo "<pre>";
// print_r($shopFetchResult);
// echo "</pre>";






?>