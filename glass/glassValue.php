<?php

error_reporting(0);

$id = $_POST['id'];

include '../comm/db.php';

$data = "SELECT * FROM product_glass WHERE id='$id' ";
$resultData = mysqli_query($conn,$data);
$rData = mysqli_fetch_assoc($resultData);

echo json_encode(array("code"=>$rData['code'], "company"=>$rData['company'], "glass_quality"=>$rData['glass_quality'], "glass_color"=>$rData['glass_color'], "glass_material"=>$rData['glass_material'], "glass_coating"=>$rData['glass_coating'], "glass_design"=>$rData['glass_design'], "glass_index"=>$rData['glass_index'], "glass_details"=>$rData['glass_details'], "glass_numbers"=>$rData['glass_numbers'], "glass_range"=>$rData['glass_range']));


?>