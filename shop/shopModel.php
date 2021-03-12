<!-- Add Shop Model -->
    <div class="modal fade" id="shopAddModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">ADD SHOP</h4>
                </div>
                <hr/>
                <div class="modal-body">
                    <form method="post" action="./shop/addShopData.php">
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
                            <label for="shop_name">Shop Name</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="shop_name" name="shop_name" class="form-control" placeholder="Enter shop name" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="phone">Phone</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="phone" name="phone" class="form-control" placeholder="Enter shop phone number" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <label for="address">Address</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <textarea rows="4" name="address" class="form-control no-resize" placeholder="Enter shop address..." required></textarea>
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

    <!-- Update Shop Model -->
    <div class="modal fade" id="shopUpModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">UPDATE SHOP</h4>
                </div>
                <hr/>
                <div class="modal-body">
                    <form method="post" action="./shop/upShopData.php">
                        <?php if($branch === ''){ ?>
                        <div class="col-sm-12">
                            <label for="branch">Branch</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <select class="form-control show-tick" name="branch" id="branch_edit" required>
                                        <option value="">---- Select One ----</option>
                                        <?php $i=0; foreach ($branchFetchResult as $dta) { ?>
                                            <option value="<?= $branchFetchResult[$i]['branch_name'] ?>"><?= ucwords($branchFetchResult[$i]['branch_name']) ?></option>
                                        <?php $i++; } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        <input type="hidden" name="shopId" id="shopId">
                        <div class="col-sm-6">
                            <label for="shop_name">Shop Name</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="shop_name_edit" name="shop_name" class="form-control" placeholder="Enter shop name" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="phone">Phone</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="phone_edit" name="phone" class="form-control" placeholder="Enter shop phone number" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <label for="address">Address</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <textarea rows="4" id="address_edit" name="address" class="form-control no-resize" placeholder="Enter shop address..." required></textarea>
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