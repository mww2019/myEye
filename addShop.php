<?php 
    error_reporting(0);
    session_start();
    // $uID    = $_GET['id'];
    // $uType  = $_GET['upType'];

    if($_SESSION['valid'] === true){
        // include_once('./comm/baseURL.php');
        // include_once('./comm/db.php');
        $empName    = $_SESSION['uName'];
        $empType    = $_SESSION['empType'];
        $empMail    = $_SESSION['username'];
        $branch     = $_SESSION['branch'];

        // if($uID != '' && $uType == 'shop'){
        //     $shopF = "SELECT * FROM shop where id='$uID' "; 
        //     $shopFResult = $conn->query($shopF)->fetch_array();
        // } 

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Add Shop | My Eye Care</title>
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
                                ADD SHOP
                                <small>Please enter shop details</small>
                            </h2>
                        </div>
                        <div class="body">
                            <form method="post" action="./shop/addShopData.php">
                                <div class="col-sm-6">
                                    <label for="shop_name">Shop Name</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="shop_name" name="shop_name" class="form-control" placeholder="Enter shop name" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="phone">Phone</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="phone" name="phone" class="form-control" placeholder="Enter shop phone number" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <label for="address">Address</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea rows="4" name="address" class="form-control no-resize" placeholder="Enter shop address..." required></textarea>
                                        </div>
                                    </div>
                                </div>

                                <input type="submit" class="btn btn-primary m-t-15 waves-effect" value="SUBMIT" />
                            </form>
                        </div>
                    </div>
                    <?php } else { ?>
                        <div class="card">
                        <div class="header">
                            <h2>
                                UPDATE SHOP
                                <small>Please update shop details</small>
                            </h2>
                        </div>
                        <div class="body">
                            <form method="post" action="./shop/upShopData.php">
                                <input type="hidden" name="shopId" value="<?= $uID ?>">
                                <div class="col-sm-6">
                                    <label for="shop_name">Shop Name</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="shop_name" name="shop_name" class="form-control" placeholder="Enter shop name" value="<?= ucwords($shopFResult['name']) ?>"required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="phone">Phone</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="phone" name="phone" class="form-control" placeholder="Enter shop phone number" value="<?= $shopFResult['phone'] ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <label for="address">Address</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea rows="4" name="address" class="form-control no-resize" placeholder="Enter shop address..." required><?= ucwords($shopFResult['address']) ?></textarea>
                                        </div>
                                    </div>
                                </div>

                                <input type="submit" class="btn btn-primary m-t-15 waves-effect" value="UPDATE" />
                            </form>
                        </div>
                    </div>
                    <?php } ?>

                </div>
            </div> -->
            <!-- #END# Input -->
            <!-- Basic Examples -->
            <!-- <div class="row clearfix" style="<?php if($uID != ''){ ?>display: none;<?php } ?>"> -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                SHOP'S DATA 
                                &nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary waves-effect" data-toggle="modal" data-target="#shopAddModal">
                                        <i class="material-icons">add_box</i>
                                        <span>SHOP</span>
                                </button>
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable" id="shopTable">
                                    <thead>
                                        <tr>
                                            <th>S.No.</th>
                                            <th>Shop Name</th>
                                            <th>Phone No.</th>
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

    <?php include_once('./shop/shopModel.php') ?>

    <script src="./plugins/jquery/jquery.min.js"></script>
    <script src="./plugins/bootstrap/js/bootstrap.js"></script>
    <!-- <script src="./plugins/bootstrap-select/js/bootstrap-select.js"></script> -->
    <script src="./plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
    <script src="./plugins/node-waves/waves.js"></script>
    <script src="./plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="./plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="./plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="./plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="./plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="./plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="./plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="./plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="./plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>
    <script src="./js/admin.js"></script>
    <script src="./js/pages/tables/jquery-datatable.js"></script>
    <script src="./js/demo.js"></script>

    <script type="text/javascript">
        $(function () {
            $('#shopTable').DataTable({
                "responsive": true,
                "processing": true,
                "serverSide": true,
                "bJQueryUI": true,
                "ajax": {
                    url: "./shop/fetchShopData.php"
                },
                error: function () { 
                    $(".example -error").html("");
                    $("#shopTable").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                    $("#example_processing").css("display", "none");
                },
                "destroy": true
            });
        });
    </script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">
        function delShop(id){
            swal({
              title: "Are you sure?",
              text: "want to delete shop details!",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                window.location.href = "<?= $baseURL ?>shop/delShop.php?id="+id;
              } else {
                swal("Shop details are not going to delete!");
              }
            });
        }

        function toUpper(str) {
            return str
                .toLowerCase()
                .split(' ')
                .map(function(word) {
                    return word[0].toUpperCase() + word.substr(1);
                })
                .join(' ');
             }

        $(document).on('click', '.upModelBtn', function(e) {
            $("#shopId").val($(this).attr('data-vendor'));
            var shopID = $("#shopId").val();

            $.ajax({
                    url: "./shop/shopValue.php",
                    type: "POST",
                    cache: false,
                    data:{
                        id: shopID
                    },
                    success: function(dataResult){
                        var dataResult = JSON.parse(dataResult);
                        document.getElementById('shop_name_edit').value = toUpper(dataResult['name']);
                        document.getElementById('phone_edit').value = dataResult['phone'];
                        document.getElementById('branch_edit').value = dataResult['branch'];
                        document.getElementById('address_edit').value = toUpper(dataResult['address']);
                    }
                });
        });
    </script>

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