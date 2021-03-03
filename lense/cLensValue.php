<?php

error_reporting(0);

$id = $_POST['id'];

include '../comm/db.php';

$data = "SELECT * FROM contact_lenses WHERE id='$id' ";
$resultData = mysqli_query($conn,$data);
$rData = mysqli_fetch_assoc($resultData);

echo json_encode(array("code"=>$rData['code'], "company"=>$rData['company'], "name"=>$rData['name'], "lens_quality"=>$rData['lens_quality'], "lens_color"=>$rData['lens_color'], "lens_num_basic"=>$rData['lens_num_basic'], "lens_num_adv"=>$rData['lens_num_adv'], "lens_thickness"=>$rData['lens_thickness'], "lens_type"=>$rData['lens_type'], "lens_base_curves"=>$rData['lens_base_curves'], "lens_diameter"=>$rData['lens_diameter'], "lens_materials"=>$rData['lens_materials'], "lens_modality"=>$rData['lens_modality'], "lens_validity"=>$rData['lens_validity'], "quantity"=>$rData['quantity'], "purchase_price"=>$rData['purchase_price'], "selling_price"=>$rData['selling_price'], "tax"=>$rData['tax']));


?>