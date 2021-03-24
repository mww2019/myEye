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
    <title>Add Receipt | My Eye Care</title>
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
                            <center><h2><strong>ADD CUSTOMER RECEIPT</strong></h2></center>
                        </div>
                        <div class="body">
                            <div class="row clearfix">

                                <form method="POST" action="./customer/addReceiptData.php">
                                    <?php if($branch === ''){ ?>
                                        <div class="col-sm-6" style="margin-bottom:0px">
                                            <label for="branch">Select Branch</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <select class="form-control show-tick" name="branch" id="branch" required>
                                                        <option value="">---- Select One ----</option>
                                                        <?php $i=0; foreach ($branchFetchResult as $dta) { ?>
                                                            <option value="<?= $branchFetchResult[$i]['branch_name'] ?>"><?= ucwords($branchFetchResult[$i]['branch_name']) ?></option>
                                                        <?php $i++; } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <div class="col-sm-6" style="margin-bottom:0px">
                                        <label for="asgShop">Select Shop</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select class="form-control show-tick" name="asgShop" id="asgShop" required>
                                                    <option value="">---- Select One ----</option>
                                                    <?php $i=0; foreach ($shopFetchResult as $dta) { ?>
                                                    <option value="<?= $shopFetchResult[$i]['name'] ?>"><?= ucwords($shopFetchResult[$i]['name']) ?></option>
                                                    <?php $i++; } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4" style="margin-bottom:0px">
                                        <label for="cust_name">Customer Name</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="cust_name" name="cust_name" class="form-control" placeholder="Enter customer name" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3" style="margin-bottom:0px">
                                        <label for="cust_phone">Customer Phone No.</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="cust_phone" name="cust_phone" class="form-control" placeholder="Enter customer phone no." required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-5" style="margin-bottom:0px">
                                        <label for="cust_add">Customer Address</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="cust_add" name="cust_add" class="form-control" placeholder="Enter customer address" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12" style="margin-bottom:0px">
                                        <div class="body table-responsive" style="padding-top:0px">
                                            <table class="table table-striped" id="teamArea">
                                                <thead>
                                                    <tr>
                                                        <th>Description</th>
                                                        <th>Quantity</th>
                                                        <th>Unit Amount</th>
                                                        <th>Amount</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><input class="form-control" type="text" name="a[]" required></td>
                                                        <td><input class="form-control change" type="text" id="b1" name="b[]" onkeypress="return check(event,value)" required></td>
                                                        <td><input class="form-control change" type="text" id="c1" name="c[]" onkeypress="return check(event,value)" required></td>
                                                        <td><input class="form-control price" type="text" id="1" name="d[]" readonly></td>
                                                        <td><a id="addNewTeam" style="cursor: pointer;">add another</a></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="col-sm-6" style="margin-bottom:0px">
                                        <label for="paid_amt">Amount Paid</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="paid_amt" name="paid_amt" class="form-control" value="0" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6" style="margin-bottom:0px">
                                        <label for="bal_amt">Amount Balance</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="bal_amt" name="bal_amt" class="form-control" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12" style="margin-bottom:0px">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <textarea id="cust_notes" name="cust_notes" class="form-control" placeholder="Notes and Terms"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <input type="submit" class="btn btn-primary m-t-15 waves-effect" value="SUBMIT" /><!-- 
                                    <button type="button" class="btn btn-primary m-t-15 waves-effect" data-dismiss="modal">CLOSE</button> -->
                                </form>
                                
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

    
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script> -->
<script type="text/javascript">
    function check(e, value) {
          //Check Charater
        var unicode = e.charCode ? e.charCode : e.keyCode;
        if (value.indexOf(".") != -1)
            if (unicode == 46) return false;
        if (unicode != 8)
            if ((unicode < 48 || unicode > 57) && unicode != 46) return false;
    }

    $(document).on('change', '#paid_amt', function(){
        var paid_amt = document.getElementById('paid_amt').value;
        var totA = 0;
        for(var i=1; i<=rowCount; i++){
            var amt = document.getElementById(i);
            if(!amt){
                amt = 0;
            } else {
                amt = amt.value;
            }
            totA =  eval(totA)+eval(amt);
        }
        var new_bal = totA-paid_amt;
        document.getElementById('bal_amt').value = new_bal;
    });

    $(document).on('change', '.change', function() {
        var id = this.id;
        var res = id.substring(1, 2);
        // console.log(res); 
        // $("#"+res).removeAttr('disabled');
        // var bal_amt = document.getElementById('bal_amt').value;
        // var paid_amt = document.getElementById('paid_amt').value;
        // var new_bal = bal_amt-paid_amt;
        // document.getElementById('bal_amt').value = new_bal;
    });
</script>
<script type="text/javascript">
    //var countt = 0;

    // let gtot = 0;
    var tPrice = 0;
    // const amt = [];
    $(document).on('change', '.change', function(){
        var gtot = 0;
        // var id = this.id;
        var id_fetch = this.id;
        var id = id_fetch.substring(1, 2);

        var quant = $("#b"+id).val();
        var uPrice = $("#c"+id).val();

        tPrice = quant*uPrice;
        document.getElementById(id).value = tPrice;
        // $("#"+id).attr('disabled','disabled');

        for(var i=1; i<=rowCount; i++){
            var amt = document.getElementById(i);
            if(!amt){
                amt = 0;
            } else {
                amt = amt.value;
            }
            gtot =  eval(gtot)+eval(amt);
        }
        var paid_amt = document.getElementById('paid_amt').value; 
        document.getElementById('bal_amt').value = gtot-paid_amt;
        // gtot += tPrice;
        // console.log(gtot);

        //
        // amt.push(tPrice);
        // console.log(amt);
        // gtot += tPrice;
        // document.getElementById('bal_amt').value = gtot;
        
    });
</script>
<script type="text/javascript">
    var rowCount = 1;
    var tot = 0;
    $("#addNewTeam").click(function(){
        rowCount++;
        var elem1 = $("<input/>",{
            type: "text",
            name: "a[]",
            class: "form-control",
            required: true
        });
        var elem2 = $("<input/>",{
            type: "text",
            name: "b[]",
            id: "b"+rowCount,
            class: "form-control change",
            onkeypress: "return check(event,value)",
            required: true
        });
        var elem3 = $("<input/>",{
            type: "text",
            name: "c[]",
            id: "c"+rowCount,
            class: "form-control change",
            onkeypress: "return check(event,value)",
            required: true
        });
        var elem4 = $("<input/>",{
            type: "text",
            name: "d[]",
            id: rowCount,
            class: "form-control price",
            readonly: true
        });
        
        var removeLink = $("<span id="+rowCount+" style='cursor: pointer;' />").html("X").click(function(rowCount){
            
            // console.log(rowCount.target.id);
            var amt = document.getElementById(rowCount.target.id).value;
            var old_amt = document.getElementById('bal_amt').value;
            var new_amt = old_amt-amt;
            document.getElementById('bal_amt').value = new_amt;
            // console.log(amt);
            // for(var i=1; i<=rowCount; i++){
            //     var amt = document.getElementById(i).value;
            //     gtot =  eval(gtot)+eval(amt);
            // }
            // document.getElementById('bal_amt').value = gtot;
            content.remove();
        });

        var content = $('<tr>').append($('<td/>').append(elem1),$('<td/>').append(elem2),$('<td/>').append(elem3),$('<td/>').append(elem4),$('<td/>').append(removeLink));                  

        $("#teamArea").append(content);
    });
</script>
    
</body>
</html>

<?php }else{ header('Refresh: 2; URL = login.php'); } ?>    