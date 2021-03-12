<!-- Add Frame Purches Model -->
    <div class="modal fade" id="framePurAddModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">PURCHASE FRAME</h4>
                </div>
                <hr/>
                <div class="modal-body">
                    <form method="post" action="./frame/addPurFrameData.php">
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
                        <div class="col-sm-3">
                            <label for="code">Frame Code</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <select class="form-control show-tick" name="code" id="code" required>
                                        <option value="">-----Select One-----</option>
                                        <?php $i=0; foreach ($dtaFetchResult as $dta) { ?>
                                            <option value="<?= $dtaFetchResult[$i]['code'] ?>"><?= $dtaFetchResult[$i]['code'] ?></option>
                                        <?php $i++; } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="sName">Supplier</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <select class="form-control show-tick" name="sName" id="sName" required>
                                        <option value="">-----Select One-----</option>
                                        <?php $i=0; foreach ($dtaFetchResult1 as $dta) { ?>
                                            <option value="<?= $dtaFetchResult1[$i]['name'] ?>"><?= ucwords($dtaFetchResult1[$i]['name']) ?></option>
                                        <?php $i++; } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="pDte">Purchase Date</label>
                            <div class="form-group">
                                <div class="form-line" id="bs_datepicker_container">
                                    <input type="text" id="pDte" name="pDte" class="form-control" placeholder="Please choose a date..." autocomplete="off" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="pro_code">Frame Name</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="f_name" name="f_name" class="form-control" readonly placeholder="Frame Name">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="pur_price">Previous Pruchase Price (₹)</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="pre_pur_price" name="pre_pur_price" class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="sell_price">Previous Selling Price (₹)</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="pre_sell_price" name="pre_sell_price" class="form-control" readonly>
                                </div>
                            </div>
                        </div>  
                        <div class="col-sm-3">
                            <label for="quantity">Remaning Quantity</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="number" id="re_quantity" name="re_quantity" class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="tax">Previous Tax (%)</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="pre_tax" name="pre_tax" class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="pur_price">Pruchase Price (₹)</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" onkeypress="return check(event,value)" id="pur_price" name="pur_price" class="form-control" placeholder="Enter frame purchase price" autocomplete="off" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="sell_price">Selling Price (₹)</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" onkeypress="return check(event,value)" id="sell_price" name="sell_price" class="form-control" placeholder="Enter frame selling price" autocomplete="off" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="quantity">Quantity</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="number" id="quantity" name="quantity" class="form-control" placeholder="Enter frame quantity" autocomplete="off" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="tax">Tax (%)</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" id="tax" name="tax" class="form-control" placeholder="Enter frame tax" autocomplete="off" required>
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


<!-- Update Frame Purches Model -->
    <div class="modal fade" id="framePurUpModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">UPDATE PURCHASE FRAME</h4>
                </div>
                <hr/>
                <div class="modal-body">
                    <form method="post" action="./frame/upPurFrameData.php">
                        <?php if($branch === ''){ ?>
                        <!-- <input type="hidden" name="branchNme" id="branchNme">   -->
                        <div class="col-sm-12">
                            <label for="branch">Branch</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edit_branch" name="branch" class="form-control" readonly>
                                    <!-- <select class="form-control show-tick" name="branch" id="edit_branch" required>
                                        <option value="">---- Select One ----</option>
                                        <?php $i=0; foreach ($branchFetchResult as $dta) { ?>
                                            <option value="<?= $branchFetchResult[$i]['branch_name'] ?>"><?= ucwords($branchFetchResult[$i]['branch_name']) ?></option>
                                        <?php $i++; } ?>
                                    </select> -->
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        <input type="hidden" name="purID" id="purID">
                        <input type="hidden" name="sENme" id="sENme">
                        <div class="col-sm-3">
                            <label for="code">Frame Code</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edit_code" name="code" class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="sName">Supplier</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <select class="form-control show-tick" name="sName" id="edit_sName" required>
                                        <option value="">-----Select One-----</option>
                                        <?php $i=0; foreach ($dtaFetchResult1 as $dta) { ?>
                                            <option value="<?= $dtaFetchResult1[$i]['name'] ?>"><?= ucwords($dtaFetchResult1[$i]['name']) ?></option>
                                        <?php $i++; } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="pDte">Purchase Date</label>
                            <div class="form-group">
                                <div class="form-line" id="bs_datepicker_container">
                                    <input type="text" id="edit_pDte" name="pDte" class="form-control" placeholder="Please choose a date..." autocomplete="off" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="pro_code">Frame Name</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edit_f_name" name="f_name" class="form-control" readonly placeholder="Frame Name">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="pur_price">Pruchase Price (₹)</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" onkeypress="return check(event,value)" id="edit_pur_price" name="pur_price" class="form-control" placeholder="Enter frame purchase price" autocomplete="off" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="sell_price">Selling Price (₹)</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" onkeypress="return check(event,value)" id="edit_sell_price" name="sell_price" class="form-control" placeholder="Enter frame selling price" autocomplete="off" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="quantity">Quantity</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="number" id="edit_quantity" name="quantity" class="form-control" placeholder="Enter frame quantity" autocomplete="off" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="tax">Tax (%)</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" onkeypress="return check(event,value)" id="edit_tax" name="tax" class="form-control" placeholder="Enter frame tax" autocomplete="off" required>
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
