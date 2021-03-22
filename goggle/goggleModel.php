<!-- Add Goggle Model -->
    <div class="modal fade" id="goggleAddModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">ADD GOGGLE</h4>
                </div>
                <hr/>
                <div class="modal-body">
                    <form method="post" action="./goggle/addGoggleData.php">
                        <div class="col-sm-4">
                            <label for="pro_code">Goggle Code</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="pro_code" name="pro_code" class="form-control" placeholder="Enter goggle code" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label for="goggle_name">Goggle Name</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="goggle_name" name="goggle_name" class="form-control" placeholder="Enter goggle name" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label for="company">Company</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="company" name="company" class="form-control" placeholder="Enter goggle company" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label for="quality">Quality</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="quality" name="quality" class="form-control" placeholder="Enter goggle quality" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label for="color">Colour</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="color" name="color" class="form-control" placeholder="Enter goggle colour" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label for="size">Size</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="size" name="size" class="form-control" placeholder="Enter goggle size" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="type">Type</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="type" name="type" class="form-control" placeholder="Enter goggle type" >
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
                                    <input type="text" id="shape" name="shape" class="form-control" placeholder="Enter goggle shape" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="material">Material</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="material" name="material" class="form-control" placeholder="Enter goggle material" >
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


<!-- Update Goggle Model -->
    <div class="modal fade" id="goggleUpModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">UPDATE GOGGLE</h4>
                </div>
                <hr/>
                <div class="modal-body">
                    <form method="post" action="./goggle/upGoggleData.php">
                        <input type="hidden" name="goggleID" id="goggleID">
                        <div class="col-sm-4">
                            <label for="pro_code">Goggle Code</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edit_pro_code" name="pro_code" class="form-control" placeholder="Enter goggle code" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label for="goggle_name">Goggle Name</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edit_goggle_name" name="goggle_name" class="form-control" placeholder="Enter goggle name" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label for="company">Company</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edit_company" name="company" class="form-control" placeholder="Enter goggle company" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label for="quality">Quality</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edit_quality" name="quality" class="form-control" placeholder="Enter goggle quality" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label for="color">Colour</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edit_color" name="color" class="form-control" placeholder="Enter goggle colour" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label for="size">Size</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edit_size" name="size" class="form-control" placeholder="Enter goggle size" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="type">Type</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edit_type" name="type" class="form-control" placeholder="Enter goggle type" >
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
                                    <input type="text" id="edit_shape" name="shape" class="form-control" placeholder="Enter goggle shape" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="material">Material</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edit_material" name="material" class="form-control" placeholder="Enter goggle material" >
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