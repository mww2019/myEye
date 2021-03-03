<?php 
    error_reporting(0);
    session_start();
    // $uID    = $_GET['id'];
    // $uType  = $_GET['upType'];

    if($_SESSION['valid'] === true){
        include_once('./comm/baseURL.php');
        include_once('./emp/autoDta.php');
        $empName    = $_SESSION['uName'];
        $empType    = $_SESSION['empType'];
        $empMail    = $_SESSION['username'];

        // if($uID != '' && $uType == 'emp'){
        //     include_once('./comm/db.php');
        //     $empF = "SELECT * FROM user where id='$uID' "; 
        //     $empFResult = $conn->query($empF)->fetch_array();
        // } 

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Add Employee | My Eye Care</title>
    <?php include('./comm/headerLinks.php') ?>
    <style type="text/css">
        .actionBtn{
            padding: 2px 5px;
        }
    </style>
</head>

<body class="theme-red">
    <!-- Page Loader -->
    <?php include_once('./comm/loader.php') ?>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Top Bar -->
    <?php include_once('./comm/topBar.php') ?>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <?php include_once('./comm/leftSidebar.php') ?>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
        <?php include_once('./comm/rightSidebar.php') ?>
        <!-- #END# Right Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <!-- Input -->
            <!-- <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    <?php if($uID == ''){ ?>
                    <div class="card">
                        <div class="header">
                            <h2>
                                ADD EMPLOYEE
                                <small>Please enter employee details <span id="message"></span></small>
                            </h2>
                        </div>
                        <div class="body">
                            <form method="post" action="./emp/addEmpData.php">
                                <div class="col-sm-4">
                                    <label for="eName">Name</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="eName" name="eName" class="form-control" placeholder="Enter employee name" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label for="email">Email</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="email" id="email" name="email" class="form-control" placeholder="Enter employee email" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label for="phone">Phone</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="phone" name="phone" class="form-control" placeholder="Enter employee phone number" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label for="password">Password</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="password" id="password" name="password" class="form-control" placeholder="Enter password" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label for="rPass">Re-enter Password</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="password" id="rPass" name="rPass" class="form-control" placeholder="Enter re-enter password" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label for="asgShop">Assign Shop</label>
                                    <div class="">
                                        <div class="form-line">
                                            <select class="form-control show-tick" name="asgShop" id="asgShop" required>
                                                <option value="">-- Please select --</option>
                                                <?php $i=0; foreach ($shopFetchResult as $dta) { ?>
                                                    <option value="<?= $shopFetchResult[$i]['id'] ?>"><?= ucwords($shopFetchResult[$i]['name']) ?></option>
                                                <?php $i++; } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <label for="empType">Emp Type</label>
                                    <div class="">
                                        <div class="form-line">
                                            <select class="form-control show-tick" name="empType" id="empType" required>
                                                <option value="">-- Please select --</option>
                                                <option value="employee">Employee</option>
                                                <option value="admin">Admin</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-7">
                                    <label for="address">Address</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea rows="4" name="address" class="form-control no-resize" placeholder="Enter shop address..." required></textarea>
                                        </div>
                                    </div>
                                </div>

                                <input type="submit" id="save" class="btn btn-primary m-t-15 waves-effect" value="SUBMIT" />
                            </form>
                        </div>
                    </div>
                    <?php } else { ?>
                        <div class="card">
                        <div class="header">
                            <h2>
                                UPDATE EMPLOYEE
                                <small>Please update employee details</small>
                            </h2>
                        </div>
                        <div class="body">
                            <form method="post" action="./emp/upEmpData.php">
                                <input type="hidden" name="empId" value="<?= $uID ?>">
                                <div class="col-sm-4">
                                    <label for="eName">Name</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="eName" name="eName" value="<?= ucwords($empFResult['name']) ?>" class="form-control" placeholder="Enter employee name" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label for="email">Email</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="email" id="email" name="email" value="<?= $empFResult['email'] ?>" class="form-control" placeholder="Enter employee email" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label for="phone">Phone</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="phone" name="phone" value="<?= $empFResult['phone'] ?>" class="form-control" placeholder="Enter employee phone number" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label for="asgShop">Assign Shop</label>
                                    <div class="">
                                        <div class="form-line">
                                            <select class="form-control show-tick" name="asgShop" id="asgShop" required>
                                                <option value="">-- Please select --</option>
                                                <?php $i=0; foreach ($shopFetchResult as $dta) { ?>
                                                    <option value="<?= $shopFetchResult[$i]['id'] ?>" <?php echo ($empFResult['assign_shop'] == $shopFetchResult[$i]['id']) ? 'selected' : '' ?> ><?= ucwords($shopFetchResult[$i]['name']) ?></option>
                                                <?php $i++; } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label for="empType">Emp Type</label>
                                    <div class="">
                                        <div class="form-line">
                                            <select class="form-control show-tick" name="empType" id="empType" required>
                                                <option value="">-- Please select --</option>
                                                <option value="employee" <?php echo ($empFResult['emp_type'] == 'employee') ? 'selected' : '' ?>>Employee</option>
                                                <option value="admin" <?php echo ($empFResult['emp_type'] == 'admin') ? 'selected' : '' ?>>Admin</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label for="address">Address</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea rows="4" name="address" class="form-control no-resize" placeholder="Enter shop address..." required><?= ucwords($empFResult['address']) ?></textarea>
                                        </div>
                                    </div>
                                </div>

                                <input type="submit" id="save" class="btn btn-primary m-t-15 waves-effect" value="UPDATE" />
                            </form>
                        </div>
                    </div>
                    <?php } ?>

                </div>
            </div> -->
            <!-- #END# Input -->
            <!-- Basic Examples -->
            <div class="row clearfix" >
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                EMPLOYEE'S DATA
                                &nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary waves-effect" data-toggle="modal" data-target="#empAddModal">
                                        <i class="material-icons">add_box</i>
                                        <span>Employee</span>
                                </button>
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable" id="empTable">
                                    <thead>
                                        <tr>
                                            <th>S.No.</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone No.</th>
                                            <th>Assign Shop</th>
                                            <th>Emp Type</th>
                                            <th>Address</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
        </div>
    </section>

    <?php include_once('./emp/empModel.php') ?>

    <?php include_once('./emp/empCustom.js') ?>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <?php if(isset($_SESSION['actStatus'])){ ?>
        <script>
            swal({
              title: "<?php echo $_SESSION['actTitle']; ?>",
              text: "<?php echo $_SESSION['actMsg']; ?>",
              icon: "<?php echo $_SESSION['actStatus']; ?>",
              button: "Close",
            });
        </script>
    <?php 
        unset($_SESSION['actStatus']);
        unset($_SESSION['actTitle']);
        unset($_SESSION['actMsg']);
    } ?>
    
</body>

</html>




<?php }else{ header('Refresh: 2; URL = login.php'); } ?>