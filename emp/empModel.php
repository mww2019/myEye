<!-- Add Employee Model -->
    <div class="modal fade" id="empAddModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">ADD EMPLOYEE</h4>
                </div>
                <hr/>
                <div class="modal-body">
                    <form method="post" action="./emp/addEmpData.php">
                                <div class="col-sm-4">
                                    <label for="eName">Name</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="eName" name="eName" class="form-control" placeholder="Enter employee name" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label for="email">Email</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="email" id="email" name="email" class="form-control" placeholder="Enter employee email" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label for="phone">Phone</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="phone" name="phone" class="form-control" placeholder="Enter employee phone number" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label for="password">Password</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="password" id="password" name="password" class="form-control" placeholder="Enter password" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label for="rPass">Re-enter Password</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="password" id="rPass" name="rPass" class="form-control" placeholder="Enter re-enter password" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label for="empType">Emp Type</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <select class="form-control show-tick" name="empType" id="empType">
                                                <option value="employee">Employee</option>
                                                <option value="admin">Admin</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <label for="asgShop">Assign Shop</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <select class="form-control show-tick" name="asgShop" id="asgShop" required>
                                                <option value="">---- Select One ----</option>
                                                <?php $i=0; foreach ($shopFetchResult as $dta) { ?>
                                                    <option value="<?= $shopFetchResult[$i]['id'] ?>"><?= ucwords($shopFetchResult[$i]['name']) ?></option>
                                                <?php $i++; } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-7">
                                    <label for="address">Address</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea rows="4" name="address" class="form-control no-resize" placeholder="Enter shop address..." required></textarea>
                                        </div>
                                    </div>
                                </div>

                                <input type="submit" id="save" class="btn btn-primary m-t-15 waves-effect" value="SUBMIT" />
                                <button type="button" class="btn btn-primary m-t-15 waves-effect" data-dismiss="modal">CLOSE</button>
                            </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Update Employee Model -->
    <div class="modal fade" id="empUpModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">UPDATE EMPLOYEE</h4>
                </div>
                <hr/>
                <div class="modal-body">
                    <form method="post" action="./emp/upEmpData.php">
                                <input type="hidden" id="empId" name="empId" >
                                <div class="col-sm-4">
                                    <label for="eName">Name</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="eName_edit" name="eName" class="form-control" placeholder="Enter employee name" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label for="email">Email</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="email" id="email_edit" name="email" class="form-control" placeholder="Enter employee email" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label for="phone">Phone</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="phone_edit" name="phone" class="form-control" placeholder="Enter employee phone number" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label for="empType">Emp Type</label>
                                    <div class="">
                                        <div class="form-line">
                                            <select class="form-control show-tick" name="empType" id="empType_edit">
                                                <option value="employee">Employee</option>
                                                <option value="admin">Admin</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label for="asgShop">Assign Shop</label>
                                    <div class="">
                                        <div class="form-line">
                                            <select class="form-control show-tick" name="asgShop" id="asgShop_edit" required>
                                                <option value="">---- Select One ----</option>
                                                <?php $i=0; foreach ($shopFetchResult as $dta) { ?>
                                                    <option value="<?= $shopFetchResult[$i]['id'] ?>"><?= ucwords($shopFetchResult[$i]['name']) ?></option>
                                                <?php $i++; } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label for="address">Address</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea rows="4" id="address_edit" name="address" class="form-control no-resize" placeholder="Enter shop address..." required></textarea>
                                        </div>
                                    </div>
                                </div>

                                <input type="submit" id="save" class="btn btn-primary m-t-15 waves-effect" value="UPDATE" />
                                <button type="button" class="btn btn-primary m-t-15 waves-effect" data-dismiss="modal">CLOSE</button>
                            </form>
                </div>
            </div>
        </div>
    </div>