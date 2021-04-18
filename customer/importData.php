<?php
error_reporting(0);
include_once '../comm/baseURL.php';
session_start();
include_once '../comm/db.php'; 

if(isset($_POST['but_import'])){
   $target_dir = "../uploads/";
   $target_file = $target_dir . basename($_FILES["importfile"]["name"]);

   $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

   $uploadOk = 1;
   if($imageFileType != "csv" ) {
     $uploadOk = 0;
   }

   if ($uploadOk != 0) {
      if (move_uploaded_file($_FILES["importfile"]["tmp_name"], $target_dir.'importfile.csv')) {

        // Checking file exists or not
        $target_file = $target_dir . 'importfile.csv';
        $fileexists = 0;
        if (file_exists($target_file)) {
           $fileexists = 1;
        }
        if ($fileexists == 1 ) {

           // Reading file
           $file = fopen($target_file,"r");
           $i = 0;

           $importData_arr = array();
                       
           while (($data = fgetcsv($file, 1000, ",")) !== FALSE) {
             $num = count($data);

             for ($c=0; $c < $num; $c++) {
                $importData_arr[$i][] = mysqli_real_escape_string($conn, $data[$c]);
             }
             $i++;
           }
           fclose($file);

           $skip = 0;
           // insert import data
           foreach($importData_arr as $data){
              if($skip != 0){
              	// $username = $data[0];
              	// $cust_id = strtoupper(substr($username, 0, 3)).''.date('ydis');
               //  $fname = $data[1];
               //  $lname = $data[2];
               //  $email = $data[3];

                $branch = $data[0]?strtolower($data[0]):'NA';
                $shop	  = $data[1]?strtolower($data[1]):'NA';
                $name 	= $data[2]?strtolower($data[2]):'NA';
                $email 	= $data[3]?strtolower($data[3]):'NA';
                $phone 	= $data[4]?$data[4]:'NA';
                $age 	  = $data[5]?$data[5]:'NA';
                $gender = $data[6]?strtolower($data[6]):'NA';
                $address = $data[7]?$data[7]:'NA';
                $cust_id = strtoupper(substr($name, 0, 3)).''.substr($phone, 3, 4).''.date('is');

                $dob    = 'NA';
                $refBy  = 'NA';

                 // Checking duplicate entry
                $sql = "select count(*) as allcount from customer where phone='" . $phone . "' ";

                 $retrieve_data = mysqli_query($conn,$sql);
                 $row = mysqli_fetch_array($retrieve_data);
                 $count = $row['allcount'];

                 if($count == 0){
                    // Insert record
                    $insert_query = "insert into customer(branch,cust_id,shop,name,email,phone,dob,age,gender,address,refBy) values('".$branch."','".$cust_id."','".$shop."','".$name."','".$email."','".$phone."','".$dob."','".$age."','".$gender."','".$address."','".$refBy."')";
                    mysqli_query($conn,$insert_query);
                 }
              }
              $skip ++;
           }
           $newtargetfile = $target_file;
           if (file_exists($newtargetfile)) {
              unlink($newtargetfile);
           }

         }
      }
          $_SESSION['actStatus'] = "success";
          $_SESSION['actTitle'] = "Good job!";
          $_SESSION['actMsg'] = "File data imported successfully!";
          header("Location: ".$baseURL."addCustomer.php");
   } else {
      $_SESSION['actStatus'] = "error";
      $_SESSION['actTitle'] = "Oops!";
      $_SESSION['actMsg'] = "File format should be in CSV!";
      header("Location: ".$baseURL."addCustomer.php");
   }
}
?>