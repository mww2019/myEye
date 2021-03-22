<?php

// error_reporting(0);
include_once '../comm/baseURL.php';
session_start();

$pro_code				= $_POST['pro_code']?$_POST['pro_code']:'NA';
$sol_name				= $_POST['sol_name']?strtolower($_POST['sol_name']):'NA';
$company				= $_POST['company']?strtolower($_POST['company']):'NA';
$solution_quality		= $_POST['quality']?strtolower($_POST['quality']):'NA';
$variant				= $_POST['variant']?strtolower($_POST['variant']):'NA';
$solution_packing_type	= $_POST['pak_type']?strtolower($_POST['pak_type']):'NA';
$solution_color			= $_POST['color']?strtolower($_POST['color']):'NA';
$quantity 				= $_POST['quantity']?$_POST['quantity']:0;
$pur_price 				= $_POST['pur_price']?$_POST['pur_price']:0;
$sell_price 			= $_POST['sell_price']?$_POST['sell_price']:0;
$tax 					= $_POST['tax']?$_POST['tax']:0;


include_once '../comm/db.php'; 

$chkCode = "SELECT * FROM product_solution WHERE code='$pro_code' ";
$resultChkCode = $conn->query($chkCode)->fetch_array();
if($resultChkCode['code'] === $pro_code) {
	$_SESSION['actStatus'] = "error";
	$_SESSION['actTitle'] = "Oops!";
	$_SESSION['actMsg'] = "Solution code already exist!";
	header("Location: ".$baseURL."addSolution.php");
} else {
	$sqlData = "INSERT INTO product_solution (code, name, company, solution_quality, variant, solution_packing_type, solution_color, purchase_price, selling_price, tax, quantity) VALUES ('$pro_code', '$sol_name', '$company', '$solution_quality', '$variant', '$solution_packing_type', '$solution_color', '$pur_price', '$sell_price', '$tax', '$quantity')";

	if ($conn->query($sqlData) === TRUE) { 
		$_SESSION['actStatus'] = "success";
		$_SESSION['actTitle'] = "Good job!";
		$_SESSION['actMsg'] = "Solution added successfully!";
		header("Location: ".$baseURL."addSolution.php");
	} else {
		$_SESSION['actStatus'] = "error";
		$_SESSION['actTitle'] = "Oops!";
		$_SESSION['actMsg'] = "Solution not added!";
		header("Location: ".$baseURL."addSolution.php");
	}
}


?>