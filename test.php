<?php
include_once './comm/db.php'; 

if(isset($_POST['but_import'])){
   $target_dir = "uploads/";
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
                $shop	= $data[1]?strtolower($data[1]):'NA';
                $name 	= $data[2]?strtolower($data[2]):'NA';
                $email 	= $data[3]?strtolower($data[3]):'NA';
                $phone 	= $data[4]?$data[4]:'NA';
                $age 	= $data[5]?$data[5]:'NA';
                $gender = $data[6]?strtolower($data[6]):'NA';
                $address = $data[7]?$data[7]:'NA';
                $cust_id = strtoupper(substr($name, 0, 3)).''.substr($phone, 3, 4).''.date('is');

                 // Checking duplicate entry
                $sql = "select count(*) as allcount from test where phone='" . $phone . "' ";

                 $retrieve_data = mysqli_query($conn,$sql);
                 $row = mysqli_fetch_array($retrieve_data);
                 $count = $row['allcount'];

                 if($count == 0){
                    // Insert record
                    $insert_query = "insert into test(branch,cust_id,shop,name,email,phone,age,gender,address) values('".$branch."','".$cust_id."','".$shop."','".$name."','".$email."','".$phone."','".$age."','".$gender."','".$address."')";
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
   } else {
   	 $error = "Only upload CSV file";
   }
}
?>

<style>
	.popup_import{
  border: 1px solid black;
  width: 550px;
  height: auto;
  background: white;
  border-radius: 3px;
  margin: 0 auto;
  padding: 5px;
}

.format{
  color: red;
}

#userTable{
  border-collapse: collapse;
  margin: 0 auto;
  margin-top: 15px;
  width: 550px;
}

#but_import{
  margin-left: 10px;
}
</style>
<!-- Import form (start) -->
<div class="popup_import">
 <form method="post" action="" enctype="multipart/form-data" id="import_form">
  <table width="100%">

   <tr>
    <td colspan="2">
     <input type='file' name="importfile" id="importfile">
    </td>
   </tr>
   <tr>
    <td colspan="2" ><input type="submit" id="but_import" name="but_import" value="Import"></td>
   </tr>
   <tr>
    <td colspan="2" align="center"><span class="format">Username, First name, Last name,Email</span> </td>
    </tr>
    <?php if($error) { ?>
    	<tr><td colspan="2" align="center"><span class="format"><?= $error ?></span> </td></tr>
    <?php } ?>
   <tr>
    <td colspan="2" align="center"><a href="import_example.csv" target="_blank">Download Sample</a></td>
   </tr>

   <tr>
    <td colspan="2"><b>Instruction : </b><br/>
     <ul>
      <li>Enclose text field in quotes (' , " ) if text contains comma (,) is used.</li>
      <li>Enclose text field in single quotes (') if text contains double quotes (")</li>
      <li>Enclose text field in double quotes (") if text contains single quotes (')</li>
     </ul>
    </td>
   </tr>
  </table>
 </form>
</div>
<!-- Import form (end) -->

<!-- Displaying imported users -->
<table border="1" id="userTable">
  <tr>
   <td>S.no</td>
   <td>Branch</td>
   <td>Cust ID</td>
   <td>Shop</td>
   <td>Name</td>
   <td>Email</td>
   <td>Phone</td>
   <td>Age</td>
   <td>Gender</td>
   <td>Address</td>
  </tr>
  <?php
    $sql = "select * from test order by id desc limit 10";
    $sno = 1;
    $retrieve_data = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_array($retrieve_data)){
        $id = $row['id'];
        $branch = $row['branch'];
        $cust_id = $row['cust_id'];
        $shop	= $row['shop'];
        $name 	= $row['name'];
        $email 	= $row['email'];
        $phone 	= $row['phone'];
        $age 	= $row['age'];
        $gender = $row['gender'];
        $address = $row['address'];

        echo "<tr>
            <td>".$sno."</td>
            <td>".$branch."</td>
            <td>".$cust_id."</td>
            <td>".$shop."</td>
            <td>".$name."</td>
            <td>".$email."</td>
            <td>".$phone."</td>
            <td>".$age."</td>
            <td>".$gender."</td>
            <td>".$address."</td>

        </tr>";
        $sno++;
    }
   ?>
</table>