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
    <title>All Sale | My Eye Care</title>
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

    <section class="content" style="margin-bottom: 0px;">
            <div class="container-fluid">
                <div class="row clearfix">
                    <div class="col-xs-12 col-sm-12">
                        <div class="card" style="background-color: #cddc395e; margin-bottom: 15px;">
                            <div class="header">
                                <h2><strong>CUSTOMERS SALE DATA</strong></h2>
                            </div>
                            <div class="body">
                                <div>
                                    <div class="tab-content">
                                        <div  class="" id="profile_settings">
                                            <form class="form-horizontal">
                                                <div class="form-group">
                                                    <label for="asgShop" class="col-sm-2 control-label">Select Shop:</label>
                                                    <div class="col-sm-3">
                                                        <div class="form-line">
                                                            <select class="form-control show-tick" name="asgShop" id="asgShop" onchange="dateChanged()">
                                                                <option value="">---- Select One ----</option>
                                                                <?php $i=0; foreach ($shopFetchResult as $dta) { ?>
                                                                <option value="<?= $shopFetchResult[$i]['name'] ?>"><?= ucwords($shopFetchResult[$i]['name']) ?></option>
                                                                <?php $i++; } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <label for="dateR" class="col-sm-2 control-label">Select Date:</label>
                                                    <div class="col-sm-4">
                                                        <div class="form-line">
                                                            <div id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
                                                                <i class="fa fa-calendar"></i>&nbsp;&nbsp;
                                                                <span name="dateRange" id="dateRange"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <div class="form-group">
                                                    <label for="age" class="col-sm-1 control-label">Age:</label>
                                                    <div class="col-sm-2">
                                                        <div class="form-line">
                                                            <input type="text" class="form-control" value="<?= $custFetchResult[0]['age'] ?>" readonly>
                                                        </div>
                                                    </div>
                                                    <label for="gender" class="col-sm-1 control-label">Gender:</label>
                                                    <div class="col-sm-2">
                                                        <div class="form-line">
                                                            <input type="text" class="form-control" value="<?= ucwords($custFetchResult[0]['gender']) ?>" readonly>
                                                        </div>
                                                    </div>
                                                    <label for="address" class="col-sm-1 control-label">Address:</label>
                                                    <div class="col-sm-5">
                                                        <div class="form-line">
                                                            <input type="text" class="form-control" value="<?= ucwords($custFetchResult[0]['address']) ?>" readonly>
                                                        </div>
                                                    </div>
                                                </div> -->
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

    <section class="content" style="margin-top: 0px;">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <span id="totalAMT">RECEIPT</span>
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable" id="allSaleTable">
                                    <thead>
                                        <tr>
                                            <th>S.No.</th>
                                            <?php if($branch === ''){ ?>
                                                <th>Branch</th>
                                            <?php } ?>
                                            <th>Cust. Name</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                            <th>Shop</th>
                                            <th>Amount(₹)</th>
                                            <th>Remark</th>
                                            <th>Sale Dte.</th>
                                            <th>Action</th>
                                            <!-- <th>Cust.ID</th>
                                            <th>Shop</th>
                                            <th>Total Amt(₹)</th>
                                            <th>Discount(₹)</th>
                                            <th>Paid Amt(₹)</th>
                                            <th>Balance Amt(₹)</th>
                                            <th>Notes</th>
                                            <th>Date</th> -->
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
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <!-- Custom Js -->
    <script src="./js/admin.js"></script>
    <script src="./js/pages/tables/jquery-datatable.js"></script>
    <script src="./js/pages/forms/basic-form-elements.js"></script>
    <!-- Demo Js -->
    <script src="./js/demo.js"></script>

    <script type="text/javascript">
        $(function() {
            var start = moment();
            var end = moment();
            function cb(start, end) {
                var startFor = start.format('MMM D, YYYY');
                var enfFor = end.format('MMM D, YYYY');

                if(startFor == enfFor){
                    $('#reportrange span').html(startFor);
                    dateChanged();
                    
                } else {
                    $('#reportrange span').html(startFor + ' - ' + enfFor);
                    dateChanged();
                }   
            }

            $('#reportrange').daterangepicker({
                startDate: start,
                endDate: end,
                ranges: {
                   'Today': [moment(), moment()],
                   'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                   'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                   'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                   'This Month': [moment().startOf('month'), moment().endOf('month')],
                   'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
                   'All Leads': [moment().subtract(1, 'year').startOf('year'), moment()]
                }
            }, cb);
            cb(start, end);
        });
    </script>

    <script type="text/javascript">
        function dateChanged() {
            var shop = document.getElementById("asgShop").value;
            var span_Text = document.getElementById("dateRange").innerText; 

            $.ajax({
                    url: "./receipt/totalSale.php",
                    type: "POST",
                    cache: false,
                    data:{
                        date: span_Text,
                        shop: shop
                    },
                    success: function(dataResult){
                        var dataResult = JSON.parse(dataResult);
                        document.getElementById('totalAMT').innerHTML = 'Total Sale Amt: ₹ '+dataResult['totalSaleAmt'];
                    }
                });

            var dataTable = $('#allSaleTable').DataTable({
                                "responsive": true,
                                "processing": true,
                                "serverSide": true,
                                "bJQueryUI": true,
                                "ajax": {
                                    url: "./receipt/fetchAllSaleData.php",
                                    method: 'POST',
                                    data: {
                                        date: span_Text,
                                        shop: shop
                                    }
                                },
                                error: function () { 
                                    $(".example -error").html("");
                                    $("#allSaleTable").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                                    $("#example_processing").css("display", "none");
                                },
                                "destroy": true
                            });

        };
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