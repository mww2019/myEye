<!-- Add Contact lens Model -->
    <div class="modal fade" id="lenseAddModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">ADD CONTACT LENS</h4>
                </div>
                <hr/>
                <div class="modal-body">
                    <form method="post" action="./lense/addLenseData.php">
                        <div class="col-sm-3">
                            <label for="pro_code">Lens Code</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="pro_code" name="pro_code" class="form-control" placeholder="Enter lens code" autocomplete="off" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="lens_name">Lens Name</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="lens_name" name="lens_name" class="form-control" placeholder="Enter lens name" autocomplete="off" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="company">Company</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="company" name="company" class="form-control" placeholder="Enter lens company" autocomplete="off" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="quality">Quality</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="quality" name="quality" class="form-control" placeholder="Enter lens quality" autocomplete="off" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="color">Colour</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="color" name="color" class="form-control" placeholder="Enter lens colour" autocomplete="off" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="bNo">Basic No.</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="bNo" name="bNo" class="form-control" placeholder="Enter lens basic number" autocomplete="off" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="aNo">Advance No.</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="aNo" name="aNo" class="form-control" placeholder="Enter lens advance number" autocomplete="off" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="thickness">Thickness</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="thickness" name="thickness" class="form-control" placeholder="Enter lens thickness" autocomplete="off" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="type">Type</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="type" name="type" class="form-control" placeholder="Enter lens type" autocomplete="off" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="bCurve">Base Curve</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="bCurve" name="bCurve" class="form-control" placeholder="Enter lens base curve" autocomplete="off" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="diameter">Diameter</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="diameter" name="diameter" class="form-control" placeholder="Enter lens diameter" autocomplete="off" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="modality">Modality</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="modality" name="modality" class="form-control" placeholder="Enter lens modality" autocomplete="off" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label for="material">Material</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="material" name="material" class="form-control" placeholder="Enter lens material" autocomplete="off" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label for="validity">Validity</label>
                            <div class="">
                                <div class="form-line">
                                    <!-- <input type="text" id="validity" name="validity" class="form-control" placeholder="Enter lens validity" autocomplete="off" > -->
                                    <select class="form-control show-tick" name="validity" id="validity">
                                        <option value="Daily">Daily</option>
                                        <option value="monthly">Monthly</option>
                                        <option value="yearly">Yearly</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label for="quantity">Quantity</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="number" id="quantity" name="quantity" class="form-control" placeholder="Enter lens quantity" autocomplete="off" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label for="pur_price">Pruchase Price (₹)</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="pur_price" name="pur_price" class="form-control" placeholder="Enter lens purchase price" autocomplete="off" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label for="sell_price">Selling Price (₹)</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="sell_price" name="sell_price" class="form-control" placeholder="Enter lens selling price" autocomplete="off" >
                                </div>
                            </div>
                        </div> 
                        <div class="col-sm-4">
                            <label for="tax">Tax (%)</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="tax" name="tax" class="form-control" placeholder="Enter lens tax" autocomplete="off" >
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


<!-- Update Contact lens Model -->
    <div class="modal fade" id="cLensUpModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">UPDATE CONTACT LENS</h4>
                </div>
                <hr/>
                <div class="modal-body">
                    <form method="post" action="./lense/upLenseData.php">
                        <input type="hidden" name="cLensID" id="cLensID">
                        <div class="col-sm-3">
                            <label for="pro_code">Lens Code</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edit_pro_code" name="pro_code" class="form-control" placeholder="Enter lens code" autocomplete="off" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="lens_name">Lens Name</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edit_lens_name" name="lens_name" class="form-control" placeholder="Enter lens name" autocomplete="off" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="company">Company</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edit_company" name="company" class="form-control" placeholder="Enter lens company" autocomplete="off" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="quality">Quality</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edit_quality" name="quality" class="form-control" placeholder="Enter lens quality" autocomplete="off" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="color">Colour</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edit_color" name="color" class="form-control" placeholder="Enter lens colour" autocomplete="off" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="bNo">Basic No.</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edit_bNo" name="bNo" class="form-control" placeholder="Enter lens basic number" autocomplete="off" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="aNo">Advance No.</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edit_aNo" name="aNo" class="form-control" placeholder="Enter lens advance number" autocomplete="off" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="thickness">Thickness</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edit_thickness" name="thickness" class="form-control" placeholder="Enter lens thickness" autocomplete="off" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="type">Type</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edit_type" name="type" class="form-control" placeholder="Enter lens type" autocomplete="off" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="bCurve">Base Curve</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edit_bCurve" name="bCurve" class="form-control" placeholder="Enter lens base curve" autocomplete="off" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="diameter">Diameter</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edit_diameter" name="diameter" class="form-control" placeholder="Enter lens diameter" autocomplete="off" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="modality">Modality</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edit_modality" name="modality" class="form-control" placeholder="Enter lens modality" autocomplete="off" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label for="material">Material</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edit_material" name="material" class="form-control" placeholder="Enter lens material" autocomplete="off" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label for="validity">Validity</label>
                            <div class="">
                                <div class="form-line">
                                    <select class="form-control show-tick" name="validity" id="edit_validity">
                                        <option value="Daily">Daily</option>
                                        <option value="monthly">Monthly</option>
                                        <option value="yearly">Yearly</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label for="quantity">Quantity</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="number" id="edit_quantity" name="quantity" class="form-control" placeholder="Enter lens quantity" autocomplete="off" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label for="pur_price">Pruchase Price (₹)</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edit_pur_price" name="pur_price" class="form-control" placeholder="Enter lens purchase price" autocomplete="off" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label for="sell_price">Selling Price (₹)</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edit_sell_price" name="sell_price" class="form-control" placeholder="Enter lens selling price" autocomplete="off" >
                                </div>
                            </div>
                        </div> 
                        <div class="col-sm-4">
                            <label for="tax">Tax (%)</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edit_tax" name="tax" class="form-control" placeholder="Enter lens tax" autocomplete="off" >
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