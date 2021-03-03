<?php

error_reporting(0);

$id = $_POST['id'];

include '../comm/db.php';

$data = "SELECT * FROM product_solution WHERE id='$id' ";
$resultData = mysqli_query($conn,$data);
$rData = mysqli_fetch_assoc($resultData);

echo json_encode(array("code"=>$rData['code'], "name"=>$rData['name'], "company"=>$rData['company'], "quality"=>$rData['solution_quality'], "variant"=>$rData['variant'], "type"=>$rData['solution_packing_type'], "color"=>$rData['solution_color'], "purchase_price"=>$rData['purchase_price'], "selling_price"=>$rData['selling_price'], "tax"=>$rData['tax'], "quantity"=>$rData['quantity']));


?>