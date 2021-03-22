<!-- Add Solution Model -->
    <div class="modal fade" id="solutionAddModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">ADD SOLUTION</h4>
                </div>
                <hr/>
                <div class="modal-body">
                    <form method="post" action="./solution/addSolutionData.php">
                        <div class="col-sm-4">
                            <label for="pro_code">Solution Code</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="pro_code" name="pro_code" class="form-control" placeholder="Enter solution code" autocomplete="off" required >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label for="sol_name">Name</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <select class="form-control show-tick" name="sol_name" id="sol_name">
                                        <option value="biotrue">Biotrue</option>
                                        <option value="renu">Renu</option>
                                        <option value="aqua soft">Aqua Soft</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label for="company">Company</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <select class="form-control show-tick" name="company" id="company">
                                        <option value="silklens">Silklens</option>
                                        <option value="bauschn lomb">Bauschn Lomb</option>
                                        <option value="aqua soft">Aqua Soft</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="quality">Quality</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="quality" name="quality" class="form-control" placeholder="Enter solution quality" autocomplete="off" >
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <label for="variant">Variant</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="variant" name="variant" class="form-control" placeholder="Enter solution variant" autocomplete="off" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="pak_type">Packing Type</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="pak_type" name="pak_type" class="form-control" placeholder="Enter solution packing type" autocomplete="off" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="color">Colour</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="color" name="color" class="form-control" placeholder="Enter solution colour" autocomplete="off" >
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


<!-- Update Solution Model -->
    <div class="modal fade" id="solutionUpModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">UPDATE SOLUTION</h4>
                </div>
                <hr/>
                <div class="modal-body">
                    <form method="post" action="./solution/upSolutionData.php">
                        <input type="hidden" name="solutionID" id="solutionID">
                        <div class="col-sm-4">
                            <label for="pro_code">Solution Code</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edit_pro_code" name="pro_code" class="form-control" placeholder="Enter solution code" autocomplete="off" readonly >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label for="sol_name">Name</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <select class="form-control show-tick" name="sol_name" id="edit_sol_name">
                                        <option value="biotrue">Biotrue</option>
                                        <option value="renu">Renu</option>
                                        <option value="aqua soft">Aqua Soft</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label for="company">Company</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <select class="form-control show-tick" name="company" id="edit_company">
                                        <option value="silklens">Silklens</option>
                                        <option value="bauschn lomb">Bauschn Lomb</option>
                                        <option value="aqua soft">Aqua Soft</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="quality">Quality</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edit_quality" name="quality" class="form-control" placeholder="Enter solution quality" autocomplete="off" >
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <label for="variant">Variant</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edit_variant" name="variant" class="form-control" placeholder="Enter solution variant" autocomplete="off" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="pak_type">Packing Type</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edit_pak_type" name="pak_type" class="form-control" placeholder="Enter solution packing type" autocomplete="off" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="color">Colour</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edit_color" name="color" class="form-control" placeholder="Enter solution colour" autocomplete="off" >
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