<?php 
    error_reporting(0);
    session_start();

    if($_SESSION['valid'] === true){
        include_once('./emp/autoDta.php');
        $empName    = $_SESSION['uName'];
        $empType    = $_SESSION['empType'];
        $empMail    = $_SESSION['username'];
        $branch     = $_SESSION['branch'];
        include_once('./comm/branchFetch.php');

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Add Customer | My Eye Care</title>
    <?php include('./comm/headerLinks.php') ?>
    <style type="text/css">
        .actionBtn{
            padding: 2px 5px;
        }
        .card .header {
            border-bottom: 1px solid rgb(21 21 21 / 35%);
        }
    </style>
</head>

<body class="theme-red">
    <?php include_once('./comm/loader.php') ?>
    <div class="overlay"></div>
    <?php include_once('./comm/topBar.php') ?>
    <section>
        <?php include_once('./comm/leftSidebar.php') ?>
        <?php include_once('./comm/rightSidebar.php') ?>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                CUSTOMER'S DATA 
                                &nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary waves-effect" data-toggle="modal" data-target="#customerAddModal">
                                        <i class="material-icons">add_box</i>
                                        <span>CUSTOMER</span>
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable" id="customerTable">
                                    <thead>
                                        <tr>
                                            <th>S.No.</th>
                                            <?php if($branch === ''){ ?>
                                                <th>Branch</th>
                                            <?php } ?>
                                            <th>Cust.ID</th>
                                            <th>Shop</th>
                                            <th>Name</th>
                                            <th>Mobile</th>
                                            <!-- <th>Email</th> -->
                                            <th>Address</th>
                                            <th>Age</th>
                                            <th>Date of visit</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content" style="margin-top: 0px;">
            <div class="container-fluid">
                <div class="row clearfix">
                    <div class="col-xs-12 col-sm-12">
                        <div class="card" style="background-color: #cddc395e; margin-bottom: 15px;">
                            <div class="header">
                                <h2><strong>IMPORT CUSTOMERS DATA (only .CSV file)</strong>&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn bg-red waves-effect" href="importfile.csv">Download File Format</a></h2>
                            </div>
                            <div class="body">
                                <div>
                                    <div class="tab-content">
                                        <div  class="" id="profile_settings">
                                            <form class="form-horizontal" method="post" action="./customer/importData.php" enctype="multipart/form-data" id="import_form">
                                                <div class="form-group">
                                                    <div class="col-sm-3"></div>
                                                    <div class="col-sm-5">
                                                        <div class="form-line">
                                                            <input type='file' name="importfile" id="importfile" class="form-control show-tick" required>
                                                        </div>
                                                    </div>
                                                    <input class="col-sm-2 btn btn-primary waves-effect" type="submit" id="but_import" name="but_import" value="Import">
                                                    <div class="col-sm-2">
                                                        <!-- <a class="btn btn-primary waves-effect" href="importfile.csv">Download File Format</a> -->
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <?php include('./customer/customerModel.php'); ?>

    <script src="./plugins/jquery/jquery.min.js"></script>
    <script src="./plugins/bootstrap/js/bootstrap.js"></script>
    <!-- <script src="./plugins/bootstrap-select/js/bootstrap-select.js"></script> -->
    <script src="./plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
    <script src="./plugins/node-waves/waves.js"></script>
    <script src="./plugins/autosize/autosize.js"></script>
    <script src="./plugins/momentjs/moment.js"></script>
    <script src="./plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
    <script src="./plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script src="./plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="./plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="./plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="./plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="./plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="./plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="./plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="./plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="./plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <!-- Custom Js -->
    <script src="./js/admin.js"></script>
    <script src="./js/pages/tables/jquery-datatable.js"></script>
    <script src="./js/pages/forms/basic-form-elements.js"></script>
    <!-- Demo Js -->
    <script src="./js/demo.js"></script>

    

    <script type="text/javascript">
        // $(function () {
        //     console.log("hello");
        //     setInterval(timestamp, 1000);
        // });

        // function timestamp() {
        //     $.ajax({
        //         url: './comm/timestamp.php',
        //         success: function(data) {
        //             $('#timestamp').html(data);
        //         },
        //     });
        // }

        $( function() {
            $( "#edit_dob" ).datepicker();
        });

        $(function () {
            $('#customerTable').DataTable({
                "responsive": true,
                "processing": true,
                "serverSide": true,
                "bJQueryUI": true,
                "ajax": {
                    url: "./customer/fetchCustomerData.php"
                },
                error: function () { 
                    $(".example -error").html("");
                    $("#customerTable").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                    $("#example_processing").css("display", "none");
                },
                "destroy": true
            });
        });
    </script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">
        function delCustomer(id){
            swal({
              title: "Are you sure?",
              text: "want to delete customer details!",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                window.location.href = "<?= $baseURL ?>customer/delCustomer.php?id="+id;
              } else {
                swal("Customer details are not going to delete!");
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
            $("#customerID").val($(this).attr('data-vendor'));
            var customerID = $("#customerID").val();

            $.ajax({
                    url: "./customer/customerValue.php",
                    type: "POST",
                    cache: false,
                    data:{
                        id: customerID
                    },
                    success: function(dataResult){
                        var dataResult = JSON.parse(dataResult);
                        document.getElementById('edit_branch').value  = toUpper(dataResult['branch']);
                        document.getElementById('edit_name').value    = toUpper(dataResult['name']);
                        var email = dataResult['email'];
                        if(email == 'NA') {
                            document.getElementById('edit_email').value = '';
                        } else {
                            document.getElementById('edit_email').value = dataResult['email'];
                        }
                        document.getElementById('edit_phone').value   = dataResult['phone'];
                        document.getElementById('edit_dob').value     = dataResult['dob'];
                        document.getElementById('edit_gender').value  = dataResult['gender'];
                        document.getElementById('edit_address').value =toUpper(dataResult['address']);
                        document.getElementById('edit_age').value    = dataResult['age'];
                        document.getElementById('edit_ref').value    = toUpper(dataResult['refBy']);
                        document.getElementById('edit_asgShop').value = dataResult['shop'];
                    }
                });
        });

        $(document).on('change', '#dob', function(e) {
            var userinput = document.getElementById("dob").value;  
            var dob = new Date(userinput); 
            var month_diff = Date.now() - dob.getTime(); 
            var age_dt = new Date(month_diff);
            var year = age_dt.getUTCFullYear(); 
            var age = Math.abs(year - 1970); 
            document.getElementById("age").value = age; 
        });

        $(document).on('change', '#edit_dob', function(e) {
            var userinput = document.getElementById("edit_dob").value;  
            var dob = new Date(userinput); 
            var month_diff = Date.now() - dob.getTime(); 
            var age_dt = new Date(month_diff);
            var year = age_dt.getUTCFullYear(); 
            var age = Math.abs(year - 1970); 
            document.getElementById("edit_age").value = age; 
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