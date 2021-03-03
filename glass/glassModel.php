<!-- Add Glass Model -->
    <div class="modal fade" id="glassAddModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">ADD GLASS</h4>
                </div>
                <hr/>
                <div class="modal-body">
                    <form method="post" action="./glass/addGlassData.php">

                        <div class="col-sm-3">
                            <label for="pro_code">Glass Code</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="pro_code" name="pro_code" class="form-control" placeholder="Enter glass code" autocomplete="off" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="company">Company</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="company" name="company" class="form-control" placeholder="Enter glass company" autocomplete="off" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="quality">Quality</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="quality" name="quality" class="form-control" placeholder="Enter glass quality" autocomplete="off" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="color">Colour</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="color" name="color" class="form-control" placeholder="Enter glass colour" autocomplete="off" >
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <label for="material">Material</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="material" name="material" class="form-control" placeholder="Enter glass material" autocomplete="off" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="coating">Coating</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <select class="form-control show-tick" name="coating" id="coating">
                                        <option value="CRUC">CRUC</option>
                                        <option value="CRHC">CRHC</option>
                                        <option value="CRARC">CRARC</option>
                                        <option value="BLCT">BLCT</option>
                                        <option value="BLCTblue">BLCTblue</option>
                                        <option value="02">02</option>
                                        <option value="O2 Easydrive">O2 Easydrive</option>
                                        <option value="Crizal UV">Crizal UV</option>
                                        <option value="Crizal Sapphire 360UV">Crizal Sapphire 360UV</option>
                                        <option value="Crizal Pervencia">Crizal Pervencia</option>
                                        <option value="Eyezen">Eyezen</option>
                                        <option value="Trio">Trio</option>
                                        <option value="CRPG">CRPG</option>
                                        <option value="CRKT">CRKT</option>
                                        <option value="CRKT-P">CRKT-P</option>
                                        <option value="CRKT-E">CRKT-E</option>
                                        <option value="CRKT-BLCT">CRKT-BLCT</option>
                                        <option value="ProgerssiveCR">ProgerssiveCR</option>
                                        <option value="Progressive-CRHC">Progressive-CRHC</option>
                                        <option value="ProgressiveBLCT">ProgressiveBLCT</option>
                                        <option value="ProgCRHC-P">ProgCRHC-P</option>
                                        <option value="ProgTitus">ProgTitus</option>
                                        <option value="ProgCrizal UV">ProgCrizal UV</option>
                                        <option value="ProgTitus Digital">ProgTitus Digital</option>
                                        <option value="Prog-P Digital">Prog-P Digital</option>
                                        <option value="Prog Digital">Prog Digital</option>
                                        <option value="ProgPG">ProgPG</option>
                                        <option value="Prog Tr">Prog Tr</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="design">Design</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="design" name="design" class="form-control" placeholder="Enter glass design" autocomplete="off" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="index">Index</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <select class="form-control show-tick" name="index" id="index">
                                        <option value="1.50mm">1.50mm</option>
                                        <option value="1.56mm">1.56mm</option>
                                        <option value="1.67mm">1.67mm</option>
                                        <option value="1.70mm">1.70mm</option>
                                        <option value="1.74mm">1.74mm</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <label for="details">Details</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="details" name="details" class="form-control" placeholder="Enter glass details" autocomplete="off" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="numbers">Numbers</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="numbers" name="numbers" class="form-control" placeholder="Enter glass numbers" autocomplete="off" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="range">Range</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="range" name="range" class="form-control" placeholder="Enter glass range" autocomplete="off" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="quantity">Quantity</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="number" id="quantity" name="quantity" class="form-control" placeholder="Enter Glass quantity" autocomplete="off" >
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <label for="pur_price">Pruchase Price (₹)</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="pur_price" name="pur_price" class="form-control" placeholder="Enter glass purchase price" autocomplete="off" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label for="sell_price">Selling Price (₹)</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="sell_price" name="sell_price" class="form-control" placeholder="Enter glass selling price" autocomplete="off" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label for="tax">Tax (%)</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="tax" name="tax" class="form-control" placeholder="Enter glass tax" autocomplete="off" >
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


<!-- Update Glass Model -->
    <div class="modal fade" id="glassUpModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">UPDATE GLASS</h4>
                </div>
                <hr/>
                <div class="modal-body">
                    <form method="post" action="./glass/upGlassData.php">
                        <input type="hidden" name="glassID" id="glassID">
                        <div class="col-sm-3">
                            <label for="pro_code">Glass Code</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edit_pro_code" name="pro_code" class="form-control" placeholder="Enter glass code" autocomplete="off" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="company">Company</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edit_company" name="company" class="form-control" placeholder="Enter glass company" autocomplete="off" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="quality">Quality</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edit_quality" name="quality" class="form-control" placeholder="Enter glass quality" autocomplete="off" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="color">Colour</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edit_color" name="color" class="form-control" placeholder="Enter glass colour" autocomplete="off" >
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <label for="material">Material</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edit_material" name="material" class="form-control" placeholder="Enter glass material" autocomplete="off" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="coating">Coating</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <select class="form-control show-tick" name="coating" id="edit_coating">
                                        <option value="CRUC">CRUC</option>
                                        <option value="CRHC">CRHC</option>
                                        <option value="CRARC">CRARC</option>
                                        <option value="BLCT">BLCT</option>
                                        <option value="BLCTblue">BLCTblue</option>
                                        <option value="02">02</option>
                                        <option value="O2 Easydrive">O2 Easydrive</option>
                                        <option value="Crizal UV">Crizal UV</option>
                                        <option value="Crizal Sapphire 360UV">Crizal Sapphire 360UV</option>
                                        <option value="Crizal Pervencia">Crizal Pervencia</option>
                                        <option value="Eyezen">Eyezen</option>
                                        <option value="Trio">Trio</option>
                                        <option value="CRPG">CRPG</option>
                                        <option value="CRKT">CRKT</option>
                                        <option value="CRKT-P">CRKT-P</option>
                                        <option value="CRKT-E">CRKT-E</option>
                                        <option value="CRKT-BLCT">CRKT-BLCT</option>
                                        <option value="ProgerssiveCR">ProgerssiveCR</option>
                                        <option value="Progressive-CRHC">Progressive-CRHC</option>
                                        <option value="ProgressiveBLCT">ProgressiveBLCT</option>
                                        <option value="ProgCRHC-P">ProgCRHC-P</option>
                                        <option value="ProgTitus">ProgTitus</option>
                                        <option value="ProgCrizal UV">ProgCrizal UV</option>
                                        <option value="ProgTitus Digital">ProgTitus Digital</option>
                                        <option value="Prog-P Digital">Prog-P Digital</option>
                                        <option value="Prog Digital">Prog Digital</option>
                                        <option value="ProgPG">ProgPG</option>
                                        <option value="Prog Tr">Prog Tr</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="design">Design</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edit_design" name="design" class="form-control" placeholder="Enter glass design" autocomplete="off" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="index">Index</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <select class="form-control show-tick" name="index" id="edit_index">
                                        <option value="1.50mm">1.50mm</option>
                                        <option value="1.56mm">1.56mm</option>
                                        <option value="1.67mm">1.67mm</option>
                                        <option value="1.70mm">1.70mm</option>
                                        <option value="1.74mm">1.74mm</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <label for="details">Details</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edit_details" name="details" class="form-control" placeholder="Enter glass details" autocomplete="off" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="numbers">Numbers</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edit_numbers" name="numbers" class="form-control" placeholder="Enter glass numbers" autocomplete="off" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="range">Range</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edit_range" name="range" class="form-control" placeholder="Enter glass range" autocomplete="off" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="quantity">Quantity</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="number" id="edit_quantity" name="quantity" class="form-control" placeholder="Enter Glass quantity" autocomplete="off" >
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <label for="pur_price">Pruchase Price (₹)</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edit_pur_price" name="pur_price" class="form-control" placeholder="Enter glass purchase price" autocomplete="off" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label for="sell_price">Selling Price (₹)</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edit_sell_price" name="sell_price" class="form-control" placeholder="Enter glass selling price" autocomplete="off" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label for="tax">Tax (%)</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edit_tax" name="tax" class="form-control" placeholder="Enter glass tax" autocomplete="off" >
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