<?php

// error_reporting(0);
session_start();
include_once '../comm/baseURL.php';
$branch_name 	= strtolower($_POST['eName']);
include_once '../comm/db.php'; 

$chkBranch = "SELECT * FROM branch where branch_name='$branch_name' ";
$chkBranchResult = $conn->query($chkBranch)->fetch_array(); 

if($chkBranchResult['branch_name'] === $branch_name && $chkBranchResult['status'] === '1') {
	$_SESSION['actStatus'] = "error";
	$_SESSION['actTitle'] = "Oops!";
	$_SESSION['actMsg'] = "Branch already exist!";
	header("Location: ".$baseURL."addBranch.php");
} else if($chkBranchResult['branch_name'] === $branch_name && $chkBranchResult['status'] === '0') {
	$_SESSION['actStatus'] = "error";
	$_SESSION['actTitle'] = "Oops!";
	$_SESSION['actMsg'] = "Branch already exist but not active!";
	header("Location: ".$baseURL."addBranch.php");
} else {
	$tableData = "CREATE TABLE IF NOT EXISTS $branch_name (
    			id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    			branch_name text NOT NULL,
    			product_cat text NOT NULL,
    			product_code text NOT NULL,
    			product_name text NOT NULL,
    			purchase_price float NOT NULL DEFAULT '0.00',
				selling_price float NOT NULL DEFAULT '0.00',
				tax float NOT NULL DEFAULT '0.00',
				quantity int(10) NOT NULL DEFAULT '0',
				dte_created datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
				dte_modified datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
				status int(11) NOT NULL DEFAULT '1' 
    		)";
    $conn->query($tableData);

	$sqlData = "INSERT INTO branch (branch_name) VALUES ('$branch_name')";
	if ($conn->query($sqlData) === TRUE) { 
		$_SESSION['actStatus'] = "success";
		$_SESSION['actTitle'] = "Good job!";
		$_SESSION['actMsg'] = "Branch added successfully!";
		header("Location: ".$baseURL."addBranch.php");
	} else {
		$_SESSION['actStatus'] = "error";
		$_SESSION['actTitle'] = "Oops!";
		$_SESSION['actMsg'] = "Branch not added!";
		header("Location: ".$baseURL."addBranch.php");
	}
}




?>