<?php 
    error_reporting(0);
    session_start();

    if($_SESSION['valid'] === true){
        $empName    = $_SESSION['uName'];
        $empType    = $_SESSION['empType'];
        $empMail    = $_SESSION['username'];
        include_once('./comm/branchFetch.php');

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Add Glass | My Eye Care</title>
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
                                GLASS'S DATA 
                                &nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary waves-effect" data-toggle="modal" data-target="#glassAddModal">
                                        <i class="material-icons">add_box</i>
                                        <span>GLASS</span>
                                </button>
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable" id="glassTable">
                                    <thead>
                                        <tr>
                                            <th>S.No.</th>
                                            <th>Glass Code</th>
                                            <th>Glass Name</th>
                                            <th>Price Details</th>
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

    <?php include('./glass/glassModel.php'); ?>
    <?php include('./glass/detailModel.php'); ?>
    <?php include('./purchase/productPriceShowModel.php'); ?>

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
    <script src="./purchase/productPriceShow.js"></script>

    <script type="text/javascript">
        $(function () {
            $('#glassTable').DataTable({
                "responsive": true,
                "processing": true,
                "serverSide": true,
                "bJQueryUI": true,
                "ajax": {
                    url: "./glass/fetchGlassData.php"
                },
                error: function () { 
                    $(".example -error").html("");
                    $("#glassTable").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                    $("#example_processing").css("display", "none");
                },
                "destroy": true
            });
        });
    </script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">
        function delGlass(id){
            swal({
              title: "Are you sure?",
              text: "want to delete glass details!",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                window.location.href = "<?= $baseURL ?>glass/delGlass.php?id="+id;
              } else {
                swal("Glass details are not going to delete!");
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
            $("#glassID").val($(this).attr('data-vendor'));
            var glassID = $("#glassID").val();

            $.ajax({
                    url: "./glass/glassValue.php",
                    type: "POST",
                    cache: false,
                    data:{
                        id: glassID
                    },
                    success: function(dataResult){
                        var dataResult = JSON.parse(dataResult);
                        document.getElementById('edit_pro_code').value = dataResult['code'];
                        document.getElementById('edit_company').value  = dataResult['company'];
                        document.getElementById('edit_quality').value  = dataResult['glass_quality'];
                        document.getElementById('edit_color').value    = dataResult['glass_color'];
                        document.getElementById('edit_material').value = dataResult['glass_material'];
                        document.getElementById('edit_coating').value  = dataResult['glass_coating'];
                        document.getElementById('edit_design').value   = dataResult['glass_design'];
                        document.getElementById('edit_index').value    = dataResult['glass_index'];
                        document.getElementById('edit_details').value  = dataResult['glass_details'];
                        document.getElementById('edit_numbers').value  = dataResult['glass_numbers'];
                        document.getElementById('edit_range').value    = dataResult['glass_range'];
                    }
                });
        });

        $(document).on('click', '.proDetails', function(e) {
            $("#glassID1").val($(this).attr('data-vendor'));
            var glassID = $("#glassID1").val();

            $.ajax({
                    url: "./glass/glassValue.php",
                    type: "POST",
                    cache: false,
                    data:{
                        id: glassID
                    },
                    success: function(dataResult){
                        var dataResult = JSON.parse(dataResult);
                        document.getElementById('detailtilte').innerHTML = '<strong>['+dataResult['code']+'</strong>] Glass Details';
                        document.getElementById('pCompany').innerHTML = toUpper(dataResult['company']);
                        document.getElementById('pQuality').innerHTML = toUpper(dataResult['glass_quality']);
                        document.getElementById('pColour').innerHTML = toUpper(dataResult['glass_color']);
                        document.getElementById('pMaterial').innerHTML = toUpper(dataResult['glass_material']);
                        document.getElementById('pCoating').innerHTML = toUpper(dataResult['glass_coating']);
                        document.getElementById('pDesign').innerHTML = toUpper(dataResult['glass_design']);
                        document.getElementById('pIndex').innerHTML = dataResult['glass_index'];
                        document.getElementById('pDetail').innerHTML = dataResult['glass_details'];
                        document.getElementById('pNumberes').innerHTML = dataResult['glass_numbers'];
                        document.getElementById('pRange').innerHTML = dataResult['glass_range'];
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