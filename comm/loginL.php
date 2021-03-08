<?php

    error_reporting(0);
    session_start();
    
    if (!empty($_SERVER['HTTP_CLIENT_IP'])){
        $ip=$_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    } else{
        $ip=$_SERVER['REMOTE_ADDR'];
    }
    
    $name   = $_SESSION['uName'];
    $email  = $_SESSION['username'];
    $desig  = $_SESSION['empType'];
    
    $sqlData = "INSERT INTO loginLog (name, email, desig, ip) VALUES ('$name', '$email', '$desig', '$ip')";
    $conn->query($sqlData);


?>