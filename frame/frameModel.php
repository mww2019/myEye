<!-- Add Frame Model -->
    <div class="modal fade" id="frameAddModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">ADD FRAME</h4>
                </div>
                <hr/>
                <div class="modal-body">
                    <form method="post" action="./frame/addFrameData.php">
                        <div class="col-sm-4">
                            <label for="pro_code">Frame Code</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="pro_code" name="pro_code" class="form-control" placeholder="Enter frame code" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label for="frame_name">Frame Name</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="frame_name" name="frame_name" class="form-control" placeholder="Enter frame name" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label for="company">Company</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="company" name="company" class="form-control" placeholder="Enter frame company" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label for="quality">Quality</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="quality" name="quality" class="form-control" placeholder="Enter frame quality" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label for="color">Colour</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="color" name="color" class="form-control" placeholder="Enter frame colour" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label for="size">Size</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="size" name="size" class="form-control" placeholder="Enter frame size" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="type">Type</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="type" name="type" class="form-control" placeholder="Enter frame type" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="gender">Gender</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <select class="form-control show-tick" name="gender" id="gender">
                                        <option value="unisex">Unisex</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="shape">Shape</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="shape" name="shape" class="form-control" placeholder="Enter frame shape" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="material">Material</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="material" name="material" class="form-control" placeholder="Enter frame material" >
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-sm-4">
                            <label for="quantity">Quantity</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="number" id="quantity" name="quantity" class="form-control" placeholder="Enter frame quantity" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label for="pur_price">Pruchase Price (₹)</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="pur_price" name="pur_price" class="form-control" placeholder="Enter frame purchase price" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label for="sell_price">Selling Price (₹)</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="sell_price" name="sell_price" class="form-control" placeholder="Enter frame selling price" >
                                </div>
                            </div>
                        </div> 
                        <div class="col-sm-4">
                            <label for="tax">Tax (%)</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="tax" name="tax" class="form-control" placeholder="Enter frame tax" >
                                </div>
                            </div>
                        </div> -->

                        <input type="submit" class="btn btn-primary m-t-15 waves-effect" value="SUBMIT" />
                        <button type="button" class="btn btn-primary m-t-15 waves-effect" data-dismiss="modal">CLOSE</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<!-- Update Frame Model -->
    <div class="modal fade" id="frameUpModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">UPDATE FRAME</h4>
                </div>
                <hr/>
                <div class="modal-body">
                    <form method="post" action="./frame/upFrameData.php">
                        <input type="hidden" name="frameID" id="frameID">
                        <div class="col-sm-4">
                            <label for="pro_code">Frame Code</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edit_pro_code" name="pro_code" class="form-control" placeholder="Enter frame code" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label for="frame_name">Frame Name</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edit_frame_name" name="frame_name" class="form-control" placeholder="Enter frame name" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label for="company">Company</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edit_company" name="company" class="form-control" placeholder="Enter frame company" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label for="quality">Quality</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edit_quality" name="quality" class="form-control" placeholder="Enter frame quality" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label for="color">Colour</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edit_color" name="color" class="form-control" placeholder="Enter frame colour" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label for="size">Size</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edit_size" name="size" class="form-control" placeholder="Enter frame size" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="type">Type</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edit_type" name="type" class="form-control" placeholder="Enter frame type" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="gender">Gender</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <select class="form-control show-tick" name="gender" id="edit_gender">
                                        <option value="unisex">Unisex</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="shape">Shape</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edit_shape" name="shape" class="form-control" placeholder="Enter frame shape" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="material">Material</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edit_material" name="material" class="form-control" placeholder="Enter frame material" >
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-sm-4">
                            <label for="quantity">Quantity</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="number" id="edit_quantity" name="quantity" class="form-control" placeholder="Enter frame quantity" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label for="pur_price">Pruchase Price (₹)</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edit_pur_price" name="pur_price" class="form-control" placeholder="Enter frame purchase price" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label for="sell_price">Selling Price (₹)</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edit_sell_price" name="sell_price" class="form-control" placeholder="Enter frame selling price" >
                                </div>
                            </div>
                        </div> 
                        <div class="col-sm-4">
                            <label for="tax">Tax (%)</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edit_tax" name="tax" class="form-control" placeholder="Enter frame tax" >
                                </div>
                            </div>
                        </div> -->

                        <input type="submit" class="btn btn-primary m-t-15 waves-effect" value="UPDATE" />
                        <button type="button" class="btn btn-primary m-t-15 waves-effect" data-dismiss="modal">CLOSE</button>
                    </form>
                </div>
            </div>
        </div>
    </div>