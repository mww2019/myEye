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
    <title>Add Other Product | My Eye Care</title>
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
                                OTHER PRODUCT'S DATA 
                                &nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary waves-effect" data-toggle="modal" data-target="#otherProductAddModal">
                                        <i class="material-icons">add_box</i>
                                        <span>OTHER PRODUCT</span>
                                </button>
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable" id="otherProductTable">
                                    <thead>
                                        <tr>
                                            <th>S.No.</th>
                                            <th>Frame Code</th>
                                            <th>Frame Name</th>
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

    <?php include('./otherProduct/otherProductModel.php'); ?>
    <?php include('./otherProduct/detailModel.php'); ?>
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
            $('#otherProductTable').DataTable({
                "responsive": true,
                "processing": true,
                "serverSide": true,
                "bJQueryUI": true,
                "ajax": {
                    url: "./otherProduct/fetchOtherProductData.php"
                },
                error: function () { 
                    $(".example -error").html("");
                    $("#otherProductTable").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                    $("#example_processing").css("display", "none");
                },
                "destroy": true
            });
        });
    </script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">
        function delOtherProduct(id){
            swal({
              title: "Are you sure?",
              text: "want to delete product details!",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                window.location.href = "<?= $baseURL ?>otherProduct/delOtherProduct.php?id="+id;
              } else {
                swal("Product details are not going to delete!");
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
            $("#otherPID").val($(this).attr('data-vendor'));
            var otherPID = $("#otherPID").val();

            $.ajax({
                    url: "./otherProduct/otherProductValue.php",
                    type: "POST",
                    cache: false,
                    data:{
                        id: otherPID
                    },
                    success: function(dataResult){
                        var dataResult = JSON.parse(dataResult);
                        document.getElementById('edit_pro_code').value  = dataResult['code'];
                        document.getElementById('edit_name').value      = dataResult['name'];
                        document.getElementById('edit_company').value   = dataResult['company'];
                        document.getElementById('edit_quality').value   = dataResult['quality'];
                        document.getElementById('edit_type').value      = dataResult['type'];
                        document.getElementById('edit_color').value     = dataResult['color'];
                        document.getElementById('edit_shape').value     = dataResult['shape'];
                        document.getElementById('edit_size').value      = dataResult['size'];
                    }
                });
        });

        $(document).on('click', '.proDetails', function(e) {
            $("#otherPID1").val($(this).attr('data-vendor'));
            var otherPID = $("#otherPID1").val();

            $.ajax({
                    url: "./otherProduct/otherProductValue.php",
                    type: "POST",
                    cache: false,
                    data:{
                        id: otherPID
                    },
                    success: function(dataResult){
                        var dataResult = JSON.parse(dataResult);
                        var combinedData = '<strong>'+dataResult['code']+' ['+toUpper(dataResult['name'])+']</strong> Product Details';
                        document.getElementById('detailtilte').innerHTML = combinedData;
                        document.getElementById('pCompany').innerHTML = toUpper(dataResult['company']);
                        document.getElementById('pQuality').innerHTML = toUpper(dataResult['quality']);
                        document.getElementById('pType').innerHTML = toUpper(dataResult['type']);
                        document.getElementById('pColour').innerHTML = toUpper(dataResult['color']);
                        document.getElementById('pShape').innerHTML = toUpper(dataResult['shape']);
                        document.getElementById('pSize').innerHTML = dataResult['size'];
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