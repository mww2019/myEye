<?php 
    error_reporting(0);
    session_start();

    if($_SESSION['valid'] === true){
        include_once('./glass/glassAutoData.php');
        $empName    = $_SESSION['uName'];
        $empType    = $_SESSION['empType'];
        $empMail    = $_SESSION['username'];

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Add Frames Purchase | My Eye Care</title>
    <?php include('./comm/headerLinks.php') ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
    <style type="text/css">
        .actionBtn{
            padding: 2px 5px;
        }
        .selectize-input {
            border: 0px solid #ccc;
            padding: 0px;
            min-height: 28px;
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
                                GLASS'S PURCHASE DATA 
                                &nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary waves-effect" data-toggle="modal" data-target="#glassPurAddModal">
                                        <i class="material-icons">add_box</i>
                                        <span>PURCHASE</span>
                                </button>
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable" id="glassPurTable">
                                    <thead>
                                        <tr>
                                            <th>S.No.</th>
                                            <th>Glass Code</th>
                                            <th>Pro. Name</th>
                                            <th>Supp. Name</th>
                                            <th>Pur. Price(₹)</th>
                                            <th>Sell Price(₹)</th>
                                            <th>Tax(%)</th>
                                            <th>Qty</th>
                                            <th>Pur. Date</th>
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

    <?php include('./glass/glassPurModel.php'); ?>

    <script src="./plugins/jquery/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
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
        function check(e, value) {
          //Check Charater
          var unicode = e.charCode ? e.charCode : e.keyCode;
          if (value.indexOf(".") != -1)
            if (unicode == 46) return false;
          if (unicode != 8)
            if ((unicode < 48 || unicode > 57) && unicode != 46) return false;
        }
        $(document).ready(function () {
            $('select').selectize({
                sortField: 'text'
            });
        });
    </script>

    <script type="text/javascript">
        $('#edit_pDte').datepicker();

        $(function () {
            $('#glassPurTable').DataTable({
                "responsive": true,
                "processing": true,
                "serverSide": true,
                "bJQueryUI": true,
                "ajax": {
                    url: "./glass/fetchPurGlassData.php"
                },
                error: function () { 
                    $(".example -error").html("");
                    $("#glassPurTable").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                    $("#glassPurTable").css("display", "none");
                },
                "destroy": true
            });
        });
    </script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">

        function toUpper(str) {
            return str
                .toLowerCase()
                .split(' ')
                .map(function(word) {
                    return word[0].toUpperCase() + word.substr(1);
                })
                .join(' ');
             }

        $(document).on('change', '#code', function(e) {
            var frameCode = $("#code").val();

            $.ajax({
                    url: "./glass/glassName.php",
                    type: "POST",
                    cache: false,
                    data:{
                        id: frameCode
                    },
                    success: function(dataResult){
                        var dataResult = JSON.parse(dataResult);
                        document.getElementById('f_name').value         = toUpper(dataResult['name']);
                        document.getElementById('pre_pur_price').value  = dataResult['p_price'];
                        document.getElementById('pre_sell_price').value = dataResult['s_price'];
                        document.getElementById('pre_tax').value        = dataResult['tax'];
                        document.getElementById('re_quantity').value    = dataResult['quantity'];
                    }
                });
        });

        $(document).on('click', '.upModelBtn', function(e) {
            $("#purID").val($(this).attr('data-vendor'));
            var purID = $("#purID").val();

            $.ajax({
                    url: "./glass/glassPurValue.php",
                    type: "POST",
                    cache: false,
                    data:{
                        id: purID
                    },
                    success: function(dataResult){
                        var dataResult = JSON.parse(dataResult);
                        document.getElementById('edit_code').value  = dataResult['pro_code'];
                        document.getElementById('edit_sName-selectized').value = toUpper(dataResult['sup_name']);
                        document.getElementById('edit_pDte').value = dataResult['pur_dte'];
                        document.getElementById('edit_f_name').value = toUpper(dataResult['pro_name']);
                        document.getElementById('edit_pur_price').value = dataResult['purchase_price'];
                        document.getElementById('edit_sell_price').value = dataResult['selling_price'];
                        document.getElementById('edit_quantity').value = dataResult['quantity'];
                        document.getElementById('edit_tax').value = dataResult['tax'];

                        document.getElementById('sENme').value = document.getElementById('edit_sName-selectized').value;
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