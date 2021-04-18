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
	        include_once('./customer/individualCustData.php');

	?>

	<!DOCTYPE html>
	<html>

	<head>
	    <meta charset="UTF-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
	    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	    <title>Customer Data | My Eye Care</title>
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
	                            <h2>CUSTOMER <strong>[ <?= strtoupper($custFetchResult[0]['name']) ?> ]</strong> INFORMATION&nbsp;&nbsp;&nbsp;<a class="btn btn-primary waves-effect" href="addReceipt.php?id=<?= $custFetchResult[0]['cust_id'] ?>">
	                                        <i class="material-icons">add_box</i>
	                                        <span>NEW RECEIPT</span></a></h2>
	                        </div>
	                        <div class="body">
	                            <div>
	                                <div class="tab-content">
	                                    <div  class="" id="profile_settings">
	                                        <form class="form-horizontal">
	                                            <div class="form-group">
	                                                <label for="custID" class="col-sm-1 control-label">ID:</label>
	                                                <div class="col-sm-2">
	                                                    <div class="form-line">
	                                                        <input type="text" class="form-control" value="<?= $custFetchResult[0]['cust_id'] ?>" readonly>
	                                                    </div>
	                                                </div>
	                                            	<label for="phone" class="col-sm-1 control-label">Phone:</label>
	                                                <div class="col-sm-2">
	                                                    <div class="form-line">
	                                                        <input type="text" class="form-control" value="<?= $custFetchResult[0]['phone'] ?>" readonly>
	                                                    </div>
	                                                </div>
	                                                <label for="email" class="col-sm-1 control-label">Email:</label>
	                                                <div class="col-sm-5">
	                                                    <div class="form-line">
	                                                        <input type="text" class="form-control" value="<?= $custFetchResult[0]['email'] ?>" readonly>
	                                                    </div>
	                                                </div>
	                                            </div>
	                                            <div class="form-group">
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

	    <section class="content" style="margin-top: 0px;">
	        <div class="container-fluid">
	            <div class="row clearfix">
	                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	                    <div class="card">
	                        <div class="header">
	                            <h2>
	                                CUSTOMER <strong>[ <?= strtoupper($custFetchResult[0]['name']) ?> ]</strong> SALE DATA
	                            </h2>
	                        </div>
	                        <div class="body">
	                            <div class="table-responsive">
	                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable" id="custSaleTable">
	                                    <thead>
	                                        <tr>
	                                            <th>S.No.</th>
	                                            <?php if($branch === ''){ ?>
	                                                <th>Branch</th>
	                                            <?php } ?>
	                                            <!-- <th>Cust.ID</th> -->
	                                            <th>Shop</th>
	                                            <th>Total Amt(₹)</th>
	                                            <th>Discount(₹)</th>
	                                            <th>Paid Amt(₹)</th>
	                                            <th>Balance Amt(₹)</th>
	                                            <th>Notes</th>
	                                            <th>Date</th>
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

	    <!-- <?php include('./customer/customerModel.php'); ?> -->

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
	    	function check(e, value) {
		          //Check Charater
		        var unicode = e.charCode ? e.charCode : e.keyCode;
		        if (value.indexOf(".") != -1)
		            if (unicode == 46) return false;
		        if (unicode != 8)
		            if ((unicode < 48 || unicode > 57) && unicode != 46) return false;
		    }

	        $(function () {
	        	var cust_id = '<?= $cust_id ?>';
	            $('#custSaleTable').DataTable({
	                "responsive": true,
	                "processing": true,
	                "serverSide": true,
	                "bJQueryUI": true,
	                "ajax": {
	                    url: "./customer/fetchCustomerSaleData.php",
	                    type: "POST",
	                    data:{
	                        id: cust_id
	                    }
	                },
	                error: function () { 
	                    $(".example -error").html("");
	                    $("#custSaleTable").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
	                    $("#example_processing").css("display", "none");
	                },
	                "destroy": true
	            });
	        });

	        function toUpper(str) {
            return str
                .toLowerCase()
                .split(' ')
                .map(function(word) {
                    return word[0].toUpperCase() + word.substr(1);
                })
                .join(' ');
             }

        $(document).on('click', '.desModelBtn', function(e) {
            $("#custSaleID").val($(this).attr('data-vendor'));
            var custSaleID = $("#custSaleID").val();

            $.ajax({
                    url: "./customer/customerSaleValue.php",
                    type: "POST",
                    cache: false,
                    data:{
                        id: custSaleID
                    },
                    success: function(dataResult){
                        var dataResult = JSON.parse(dataResult);
                        document.getElementById('desc').innerHTML  = dataResult['description'];
                        
                    }
                });
        });

        $(document).on('click', '.balModelBtn', function(e) {
            $("#custSaleID1").val($(this).attr('data-vendor'));
            var custSaleID = $("#custSaleID1").val();

            $.ajax({
                    url: "./customer/customerSaleValue.php",
                    type: "POST",
                    cache: false,
                    data:{
                        id: custSaleID
                    },
                    success: function(dataResult){
                        var dataResult = JSON.parse(dataResult);
                        document.getElementById('desc1').innerHTML  = dataResult['description'];
                        document.getElementById('totAmt').value= dataResult['total_amt'];
                        document.getElementById('balAmt').value= dataResult['amt_bal'];
                        document.getElementById('paidAmt').value= dataResult['amt_paid'];
                        
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