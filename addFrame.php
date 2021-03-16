<?php 
    error_reporting(0);
    session_start();

    if($_SESSION['valid'] === true){
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
    <title>Add Frames | My Eye Care</title>
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
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                FRAME'S DATA 
                                &nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary waves-effect" data-toggle="modal" data-target="#frameAddModal">
                                        <i class="material-icons">add_box</i>
                                        <span>FRAME</span>
                                </button>
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable" id="frameTable">
                                    <thead>
                                        <tr>
                                            <th>S.No.</th>
                                            <th>Frame Code</th>
                                            <th>Frame Name</th>
                                            <th>Price Details</th>
                                            <!-- <th>Pur. Price(₹)</th>
                                            <th>Sell Price(₹)</th>
                                            <th>Tax(%)</th>
                                            <th>Qty</th> -->
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

    <?php include('./frame/frameModel.php'); ?>
    <?php include('./frame/detailModel.php'); ?>

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
            $('#frameTable').DataTable({
                "responsive": true,
                "processing": true,
                "serverSide": true,
                "bJQueryUI": true,
                "ajax": {
                    url: "./frame/fetchFrameData.php"
                },
                error: function () { 
                    $(".example -error").html("");
                    $("#frameTable").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                    $("#frameTable").css("display", "none");
                },
                "destroy": true
            });
        });
    </script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">
        function delFrame(id){
            swal({
              title: "Are you sure?",
              text: "want to delete frame details!",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                window.location.href = "<?= $baseURL ?>frame/delFrame.php?id="+id;
              } else {
                swal("Frame details are not going to delete!");
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
            $("#frameID").val($(this).attr('data-vendor'));
            var frameID = $("#frameID").val();

            $.ajax({
                    url: "./frame/frameValue.php",
                    type: "POST",
                    cache: false,
                    data:{
                        id: frameID
                    },
                    success: function(dataResult){
                        var dataResult = JSON.parse(dataResult);
                        document.getElementById('edit_pro_code').value = dataResult['code'];
                        document.getElementById('edit_frame_name').value = dataResult['name'];
                        document.getElementById('edit_company').value = toUpper(dataResult['company']);
                        document.getElementById('edit_quality').value = dataResult['quality'];
                        document.getElementById('edit_color').value = dataResult['color'];
                        document.getElementById('edit_size').value = dataResult['size'];
                        document.getElementById('edit_type').value = dataResult['type'];
                        document.getElementById('edit_gender').value = dataResult['gender'];
                        document.getElementById('edit_shape').value = dataResult['shape'];
                        document.getElementById('edit_material').value = dataResult['material'];
                        document.getElementById('edit_quantity').value = dataResult['quantity'];
                        document.getElementById('edit_pur_price').value = dataResult['purchase_price'];
                        document.getElementById('edit_sell_price').value = dataResult['selling_price'];
                        document.getElementById('edit_tax').value = dataResult['tax'];
                    }
                });
        });

        $(document).on('click', '.proDetails', function(e) {
            $("#frameID1").val($(this).attr('data-vendor'));
            var frameID = $("#frameID1").val();

            $.ajax({
                    url: "./frame/frameValue.php",
                    type: "POST",
                    cache: false,
                    data:{
                        id: frameID
                    },
                    success: function(dataResult){
                        var dataResult = JSON.parse(dataResult);
                        var combinedData = '<strong>'+dataResult['code']+' ['+toUpper(dataResult['name'])+']</strong> Frame Details';
                        document.getElementById('detailtilte').innerHTML = combinedData;
                        document.getElementById('fCompany').innerHTML = toUpper(dataResult['company']);
                        document.getElementById('fGender').innerHTML = toUpper(dataResult['gender']);
                        document.getElementById('fQuality').innerHTML = toUpper(dataResult['quality']);
                        document.getElementById('fShape').innerHTML = toUpper(dataResult['shape']);
                        document.getElementById('fColour').innerHTML = toUpper(dataResult['color']);
                        document.getElementById('fMaterial').innerHTML = toUpper(dataResult['material']);
                        document.getElementById('fSize').innerHTML = dataResult['size'];
                        document.getElementById('fType').innerHTML = toUpper(dataResult['type']);
                    }
                });
        });

        $(document).on('click', '.proCode', function(e) {
            $("#frameCode").val($(this).attr('data-vendor'));
            var frameCode = $("#frameCode").val();

            $.ajax({
                    url: "./frame/framePriceValue.php",
                    type: "POST",
                    cache: false,
                    data:{
                        code: frameCode
                    },
                    success: function(dataResult){
                        var dataResult = JSON.parse(dataResult);
                        if(dataResult['code'] == null) {
                            document.getElementById('pricedetailtilte').innerHTML = 'Frame <strong>>'+frameCode+' </strong>Price Data Not Available';
                            document.getElementById('pruPrice').innerHTML = '';
                            document.getElementById('sePrice').innerHTML = '';
                            document.getElementById('taxx').innerHTML = '';
                            document.getElementById('toQuant').innerHTML = '';
                        } else {
                            var combinedData = '<strong>'+dataResult['code']+' ['+toUpper(dataResult['name'])+']>/strong> Frame Current Price Details';
                            document.getElementById('pricedetailtilte').innerHTML = combinedData;
                            document.getElementById('pruPrice').innerHTML = dataResult['purchase_price'];
                            document.getElementById('sePrice').innerHTML = dataResult['selling_price'];
                            document.getElementById('taxx').innerHTML = dataResult['tax'];
                            document.getElementById('toQuant').innerHTML = dataResult['quantity'];
                        }
                    }
                });
        });

        $(document).on('click', '.proCodeBranch', function(e) {
            $("#frameCodeBranch").val($(this).attr('data-vendor'));
            document.getElementById("priceBDetails").style.display = "none";
            document.getElementById("branchName").value = '';
        });

        $(document).on('change', '#branchName', function(e) {
            var branch = $("#branchName").val();
            var frameCode = $("#frameCodeBranch").val();

            $.ajax({
                    url: "./frame/framePriceValue.php",
                    type: "POST",
                    cache: false,
                    data:{
                        code: frameCode,
                        branch: branch
                    },
                    success: function(dataResult){
                        var dataResult = JSON.parse(dataResult);
                        document.getElementById("priceBDetails").style.display = "block";
                        if(dataResult['code'] == null) {
                            document.getElementById('pricedetailtilteB').innerHTML = 'Frame <strong>'+frameCode+' </strong>Price Data Not Available';
                            document.getElementById('pruPriceB').innerHTML = '';
                            document.getElementById('sePriceB').innerHTML = '';
                            document.getElementById('taxxB').innerHTML = '';
                            document.getElementById('toQuantB').innerHTML = '';
                        } else {
                            var combinedData = '<strong>'+dataResult['code']+' ['+toUpper(dataResult['name'])+']</strong> Frame Current Price Details';
                            document.getElementById('pricedetailtilteB').innerHTML = combinedData;
                            document.getElementById('pruPriceB').innerHTML = dataResult['purchase_price'];
                            document.getElementById('sePriceB').innerHTML = dataResult['selling_price'];
                            document.getElementById('taxxB').innerHTML = dataResult['tax'];
                            document.getElementById('toQuantB').innerHTML = dataResult['quantity'];
                        }
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