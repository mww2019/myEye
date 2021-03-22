<?php

// error_reporting(0);
include_once '../comm/baseURL.php';
session_start();
date_default_timezone_set('Asia/Kolkata');
$dateTime	=	date('Y-m-d H:i:s');

$id         			= $_POST['solutionID'];
$pro_code				= $_POST['pro_code']?$_POST['pro_code']:'NA';
$sol_name				= $_POST['sol_name']?strtolower($_POST['sol_name']):'NA';
$company				= $_POST['company']?strtolower($_POST['company']):'NA';
$solution_quality		= $_POST['quality']?strtolower($_POST['quality']):'NA';
$variant				= $_POST['variant']?strtolower($_POST['variant']):'NA';
$solution_packing_type	= $_POST['pak_type']?strtolower($_POST['pak_type']):'NA';
$solution_color			= $_POST['color']?strtolower($_POST['color']):'NA';


include_once '../comm/db.php'; 

$sqlData = "UPDATE product_solution SET code='$pro_code', name='$sol_name', company='$company', solution_quality='$solution_quality', variant='$variant', solution_packing_type='$solution_packing_type', solution_color='$solution_color', dte_modified='$dateTime' WHERE id='$id'  ";

if ($conn->query($sqlData) === TRUE) { 
	$_SESSION['actStatus'] = "success";
	$_SESSION['actTitle'] = "Good job!";
	$_SESSION['actMsg'] = "Solution updated successfully!";
	header("Location: ".$baseURL."addSolution.php");
} else {
	$_SESSION['actStatus'] = "error";
	$_SESSION['actTitle'] = "Oops!";
	$_SESSION['actMsg'] = "Solution not updated!";
	header("Location: ".$baseURL."addSolution.php");
}




?>