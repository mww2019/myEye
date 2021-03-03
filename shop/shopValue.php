<?php

error_reporting(0);

$shopId = $_POST['id'];

include '../comm/db.php';

$shopData = "SELECT * FROM shop WHERE id='$shopId' ";
$resultShopData = mysqli_query($conn,$shopData);
$rShopData = mysqli_fetch_assoc($resultShopData);

echo json_encode(array("name"=>$rShopData['name'], "phone"=>$rShopData['phone'], "address"=>$rShopData['address']));


?>