<?php 
    error_reporting(0);
    session_start();

    if($_SESSION['valid'] === true){
        include_once('./comm/baseURL.php');
        $empName    = $_SESSION['uName'];
        $empType    = $_SESSION['empType'];
        $empMail    = $_SESSION['username'];
        $branch     = $_SESSION['branch'];
        include_once('./emp/autoDta.php');

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
    <?php include_once('./comm/loader.php') ?>
    <div class="overlay"></div>
    <?php include_once('./comm/topBar.php') ?>
    <section>
        <?php include_once('./comm/leftSidebar.php') ?>
        <?php include_once('./comm/rightSidebar.php') ?>
    </section>

    <section class="content">
        <div class="container-fluid">
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
        $("#empType").change(function() {
            var val = $("#empType").val();
            if(val == 'admin'){
                $('#asgShop').val(null);
                $('#asgShop').attr("disabled", "disabled");
                $('#empType').attr("required", null);
            }else{
                $('#asgShop').attr("disabled", null);
                $('#empType').attr("required", "required");
            }
        });

        $("#empType_edit").change(function() {
            var val = $("#empType_edit").val();
            if(val == 'admin'){
                $('#asgShop_edit').val(null);
                $('#asgShop_edit').attr("disabled", "disabled");
                $('#empType_edit').attr("required", null);
            }else{
                $('#asgShop_edit').attr("disabled", null);
                $('#empType_edit').attr("required", "required");
            }
        });
    </script>

    <script type="text/javascript">
        $(function () {
            $('#empTable').DataTable({
                "responsive": true,
                "processing": true,
                "serverSide": true,
                "bJQueryUI": true,
                "ajax": {
                    url: "./emp/fetchEmpData.php"
                },
                error: function () { 
                    $(".example -error").html("");
                    $("#empTable").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                    $("#example_processing").css("display", "none");
                },
                "destroy": true
            });
        });
    </script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">
        function delEmployee(id){
            swal({
              title: "Are you sure?",
              text: "want to delete employee details!",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                window.location.href = "<?= $baseURL ?>emp/delEmployee.php?id="+id;
              } else {
                swal("Employee details are not going to delete!");
              }
            });
        }

        // function editEmployee(id){
        //     window.location.href = "<?= $baseURL ?>addEmployee.php?upType=emp&id="+id;
        // }

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
            $("#empId").val($(this).attr('data-vendor'));
            var empID = $("#empId").val();

            $.ajax({
                    url: "./emp/empValue.php",
                    type: "POST",
                    cache: false,
                    data:{
                        id: empID
                    },
                    success: function(dataResult){
                        var dataResult = JSON.parse(dataResult);
                        document.getElementById('eName_edit').value     = toUpper(dataResult['name']);
                        document.getElementById('email_edit').value     = dataResult['email'];
                        document.getElementById('phone_edit').value     = dataResult['phone'];
                        document.getElementById('asgShop_edit').value   = dataResult['asgShop'];
                        document.getElementById('empType_edit').value   = dataResult['empType'];
                        // $('#empType_edit option:selected').attr("selected",null);
                        // $('#empType_edit option[value="employee"]').attr("selected", "selected");
                        // $('#empType_edit').val(employee).attr("selected", "selected");
                        // $('#empType_edit').val(dataResult.empType);
                        if(dataResult['empType'] == 'admin'){
                            $('#asgShop_edit').attr("disabled", "disabled");
                        }
                        else{
                            $('#asgShop_edit').attr("disabled", null);
                        }
                        document.getElementById('address_edit').value   = toUpper(dataResult['address']);
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