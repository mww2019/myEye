<!-- Add Supplier Model -->
    <div class="modal fade" id="supplierAddModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">ADD SUPPLIER</h4>
                </div>
                <hr/>
                <div class="modal-body">
                    <form method="post" action="./supplier/addSupplierData.php">
                        <div class="col-sm-12">
                            <label for="supplier_name">Supplier Name</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="supplier_name" name="supplier_name" class="form-control" placeholder="Enter supplier name" autocomplete="off" required >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="email">Email</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="email" id="email" name="email" class="form-control" placeholder="Enter supplier email" autocomplete="off" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="phone">Phone</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="phone" name="phone" class="form-control" placeholder="Enter supplier phone number" autocomplete="off" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="company">Company</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="company" name="company" class="form-control" placeholder="Enter supplier company" autocomplete="off" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="product">Products</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="product" name="product" class="form-control" placeholder="Enter supplier product" autocomplete="off" required>
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

    <!-- Update Supplier Model -->
    <div class="modal fade" id="supplierUpModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">UPDATE SHOP</h4>
                </div>
                <hr/>
                <div class="modal-body">
                    <form method="post" action="./supplier/upSupplierData.php">
                        <input type="hidden" name="supplierId" id="supplierId">
                        <div class="col-sm-12">
                            <label for="supplier_name">Supplier Name</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edit_supplier_name" name="supplier_name" class="form-control" placeholder="Enter supplier name" autocomplete="off" required >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="email">Email</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="email" id="edit_email" name="email" class="form-control" placeholder="Enter supplier email" autocomplete="off" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="phone">Phone</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edit_phone" name="phone" class="form-control" placeholder="Enter supplier phone number" autocomplete="off" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="company">Company</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edit_company" name="company" class="form-control" placeholder="Enter supplier company" autocomplete="off" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="product">Products</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edit_product" name="product" class="form-control" placeholder="Enter supplier product" autocomplete="off" required>
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