<!-- Add Frame Purches Model -->
    <div class="modal fade" id="framePurAddModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">PURCHES FRAME</h4>
                </div>
                <hr/>
                <div class="modal-body">
                    <form method="post" action="./frame/addPurFrameData.php">
                        <div class="col-sm-6">
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
                        <div class="col-sm-6">
                            <label for="pro_code">Frame Name</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="f_name" name="f_name" class="form-control" readonly placeholder="Frame Name">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="pur_price">Previous Pruchase Price (₹)</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="pre_pur_price" name="pre_pur_price" class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="pur_price">Pruchase Price (₹)</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="pur_price" name="pur_price" class="form-control" placeholder="Enter frame purchase price" autocomplete="off" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="sell_price">Previous Selling Price (₹)</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="pre_sell_price" name="pre_sell_price" class="form-control" readonly>
                                </div>
                            </div>
                        </div> 
                        <div class="col-sm-6">
                            <label for="sell_price">Selling Price (₹)</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="sell_price" name="sell_price" class="form-control" placeholder="Enter frame selling price" autocomplete="off" required>
                                </div>
                            </div>
                        </div> 
                        <div class="col-sm-6">
                            <label for="quantity">Remaning Quantity</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="number" id="re_quantity" name="re_quantity" class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="quantity">Quantity</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="number" id="quantity" name="quantity" class="form-control" placeholder="Enter frame quantity" autocomplete="off" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="tax">Previous Tax (%)</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="pre_tax" name="pre_tax" class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="tax">Tax (%)</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="tax" name="tax" class="form-control" placeholder="Enter frame tax" autocomplete="off" required>
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
