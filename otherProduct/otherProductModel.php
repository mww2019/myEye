<!-- Add Other Product Model -->
    <div class="modal fade" id="otherProductAddModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">ADD OTHER PRODUCT</h4>
                </div>
                <hr/>
                <div class="modal-body">
                    <form method="post" action="./otherProduct/addOtherProductData.php">

                        <div class="col-sm-3">
                            <label for="pro_code">Product Code</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="pro_code" name="pro_code" class="form-control" placeholder="Enter product code" autocomplete="off" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="sol_name">Name</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="name" name="name" class="form-control" placeholder="Enter product name" autocomplete="off" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="company">Company</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="company" name="company" class="form-control" placeholder="Enter product company" autocomplete="off" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="quality">Quality</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="quality" name="quality" class="form-control" placeholder="Enter product quality" autocomplete="off" >
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <label for="type">Type</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="type" name="type" class="form-control" placeholder="Enter product type" autocomplete="off" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="color">Colour</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="color" name="color" class="form-control" placeholder="Enter product colour" autocomplete="off" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="shape">Shape</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="shape" name="shape" class="form-control" placeholder="Enter product shape" autocomplete="off" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="size">Size</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="size" name="size" class="form-control" placeholder="Enter product size" autocomplete="off" >
                                </div>
                            </div>
                        </div>


                        <div class="col-sm-3">
                            <label for="quantity">Quantity</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="number" id="quantity" name="quantity" class="form-control" placeholder="Enter product quantity" autocomplete="off" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="pur_price">Pruchase Price (₹)</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="pur_price" name="pur_price" class="form-control" placeholder="Enter product purchase price" autocomplete="off" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="sell_price">Selling Price (₹)</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="sell_price" name="sell_price" class="form-control" placeholder="Enter product selling price" autocomplete="off" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="tax">Tax (%)</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="tax" name="tax" class="form-control" placeholder="Enter product tax" autocomplete="off" >
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


<!-- Update Other Product Model -->
    <div class="modal fade" id="otherProductUpModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">UPDATE OTHER PRODUCT</h4>
                </div>
                <hr/>
                <div class="modal-body">
                    <form method="post" action="./otherProduct/upOtherProductData.php">
                        <input type="hidden" name="otherPID" id="otherPID">
                        <div class="col-sm-3">
                            <label for="pro_code">Product Code</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edit_pro_code" name="pro_code" class="form-control" placeholder="Enter product code" autocomplete="off" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="sol_name">Name</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edit_name" name="name" class="form-control" placeholder="Enter product name" autocomplete="off" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="company">Company</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edit_company" name="company" class="form-control" placeholder="Enter product company" autocomplete="off" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="quality">Quality</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edit_quality" name="quality" class="form-control" placeholder="Enter product quality" autocomplete="off" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="type">Type</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edit_type" name="type" class="form-control" placeholder="Enter product type" autocomplete="off" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="color">Colour</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edit_color" name="color" class="form-control" placeholder="Enter product colour" autocomplete="off" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="shape">Shape</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edit_shape" name="shape" class="form-control" placeholder="Enter product shape" autocomplete="off" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="size">Size</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edit_size" name="size" class="form-control" placeholder="Enter product size" autocomplete="off" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="quantity">Quantity</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="number" id="edit_quantity" name="quantity" class="form-control" placeholder="Enter product quantity" autocomplete="off" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="pur_price">Pruchase Price (₹)</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edit_pur_price" name="pur_price" class="form-control" placeholder="Enter product purchase price" autocomplete="off" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="sell_price">Selling Price (₹)</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edit_sell_price" name="sell_price" class="form-control" placeholder="Enter product selling price" autocomplete="off" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="tax">Tax (%)</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edit_tax" name="tax" class="form-control" placeholder="Enter product tax" autocomplete="off" >
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