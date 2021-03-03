<?php

	error_reporting(0);
	session_start();
    unset($_SESSION['uName']);
    unset($_SESSION['empType']);
   	unset($_SESSION["username"]);
   	unset($_SESSION["valid"]);
   
   	//$msg = 'You have successfully logout!';
   	header('Refresh: 2; URL = login.php');



?>