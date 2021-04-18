<!-- Add Customer Model -->
    <div class="modal fade" id="customerAddModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">ADD CUSTOMER</h4>
                </div>
                <hr/>
                <div class="modal-body">
                    <form method="post" action="./customer/addCustomerData.php">
                        <?php if($branch === ''){ ?>
                        <div class="col-sm-12">
                            <label for="branch">Branch</label>
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
                        <div class="col-sm-6">
                            <label for="name">Name</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="name" name="name" class="form-control" placeholder="Enter customer name" autocomplete="off" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="email">Email</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="email" id="email" name="email" class="form-control" placeholder="Enter customer email" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="phone">Phone</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="phone" name="phone" class="form-control" placeholder="Enter customer phone no." autocomplete="off" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="dob">DOB</label>
                            <div class="form-group">
                                <div class="form-line" id="bs_datepicker_container">
                                    <input type="text" id="dob" name="dob" class="form-control" placeholder="Please choose a date..." autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="gender">Gender</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <select class="form-control show-tick" name="gender" id="gender">
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="address">Address</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="address" name="address" class="form-control" placeholder="Enter customer address" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label for="age">Age</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="age" name="age" class="form-control" placeholder="Enter customer age" autocomplete="off" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label for="ref">Referred By</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="ref" name="ref" class="form-control" placeholder="Customer referred by" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label for="asgShop">Cust. In Shop</label>
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

                        <input type="submit" class="btn btn-primary m-t-15 waves-effect" value="SUBMIT" />
                        <button type="button" class="btn btn-primary m-t-15 waves-effect" data-dismiss="modal">CLOSE</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<!-- Update Customer Model -->
    <div class="modal fade" id="customerUpModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">UPDATE CUSTOMER</h4>
                </div>
                <hr/>
                <div class="modal-body">
                    <form method="post" action="./customer/upCustomerData.php">
                        <?php if($branch === ''){ ?>
                        <div class="col-sm-12">
                            <label for="branch">Branch</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edit_branch" name="branch" class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        <input type="hidden" name="customerID" id="customerID">
                        <div class="col-sm-6">
                            <label for="name">Name</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edit_name" name="name" class="form-control" placeholder="Enter customer name" autocomplete="off" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="email">Email</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="email" id="edit_email" name="email" class="form-control" placeholder="Enter customer email" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="phone">Phone</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edit_phone" name="phone" class="form-control" placeholder="Enter customer phone no." autocomplete="off" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="dob">DOB</label>
                            <div class="form-group">
                                <div class="form-line" id="edit_bs_datepicker_container">
                                    <input type="text" id="edit_dob" name="dob" class="form-control" placeholder="Please choose a date..." autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="gender">Gender</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <select class="form-control show-tick" name="gender" id="edit_gender">
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="address">Address</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edit_address" name="address" class="form-control" placeholder="Enter customer address" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label for="age">Age</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edit_age" name="age" class="form-control" placeholder="Enter customer age" autocomplete="off" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label for="ref">Referred By</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edit_ref" name="ref" class="form-control" placeholder="Customer referred by" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label for="asgShop">Cust. In Shop</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <select class="form-control show-tick" name="asgShop" id="edit_asgShop" required>
                                        <option value="">---- Select One ----</option>
                                        <?php $i=0; foreach ($shopFetchResult as $dta) { ?>
                                        <option value="<?= $shopFetchResult[$i]['name'] ?>"><?= ucwords($shopFetchResult[$i]['name']) ?></option>
                                        <?php $i++; } ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <input type="submit" class="btn btn-primary m-t-15 waves-effect" value="UPDATE" />
                        <button type="button" class="btn btn-primary m-t-15 waves-effect" data-dismiss="modal">CLOSE</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<!-- Customer Description -->
    <div class="modal fade" id="descriptionModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">PRODUCT DESCRIPTION</h4>
                </div>
                <hr style="margin-top: 10px; margin-bottom: 0px;" />
                <div class="modal-body">
                    <form method="post" >
                        <input type="hidden" name="custSaleID" id="custSaleID">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="form-line" style="border-bottom:0px solid #ddd;">
                                    <span id="desc"></span>
                                </div>
                            </div>
                        </div>

                        <button type="button" class="btn btn-primary m-t-15 waves-effect" data-dismiss="modal">CLOSE</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<!-- Customer Balance Payment -->
    <div class="modal fade" id="balPaymentModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">PRODUCT DESCRIPTION</h4>
                </div>
                <hr style="margin-top: 10px; margin-bottom: 0px;" />
                <div class="modal-body">
                    <form method="post" action="./receipt/addBalPay.php">
                        <input type="hidden" name="custSaleID1" id="custSaleID1">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="form-line" style="border-bottom:0px solid #ddd;">
                                    <span id="desc1"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="totAmt">Total Amt(₹)</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="totAmt" name="totAmt" class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="paidAmt">Paid Amt(₹)</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="paidAmt" name="paidAmt" class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="balAmt">Balance Amt(₹)</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="balAmt" name="balAmt" class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="payNow">Enter Amt(₹)</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="payNow" name="payNow" class="form-control" placeholder="Enter Amount" onkeypress="return check(event,value)" required>
                                </div>
                            </div>
                        </div>

                        <input type="submit" class="btn btn-primary m-t-15 waves-effect" value="SUBMIT" />
                        <button type="button" class="btn btn-primary m-t-15 waves-effect" data-dismiss="modal">CLOSE</button>
                    </form>
                </div>
            </div>
        </div>
    </div>