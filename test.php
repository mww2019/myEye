<?php

// $cust_id    = strtoupper(substr('ptraveen', 0, 3)).''.date('ydis');
// echo $cust_id;

include_once './comm/db.php'; 
$branch = 'e';
$pro_code = 'ssss';

$chkPro = "SELECT * FROM $branch WHERE product_code='$pro_code' ";
$chkProResult = $conn->query($chkPro)->fetch_array();

if($chkProResult['product_code'] === '$pro_code') { 
	echo "Data Present";
}
else{
	echo "Data Not Present";
}

// $sqlData = "CREATE TABLE IF NOT EXISTS $branch_name (
//     			id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
//     			branch_name text NOT NULL,
//     			product_cat text NOT NULL,
//     			product_code text NOT NULL,
//     			purchase_price float NOT NULL,
// 				selling_price float NOT NULL,
// 				tax float NOT NULL,
// 				quantity int(10) NOT NULL,
// 				dte_created datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
// 				dte_modified datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
// 				status int(11) NOT NULL DEFAULT '1' 
//     		)";
// if ($conn->query($sqlData) === TRUE) { 
// 	echo "table created";
// }
// else{
// 	echo "table not created";
// }


?>