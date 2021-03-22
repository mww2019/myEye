<!-- Branch Wise Product Price Detail Model -->
    <div class="modal fade" id="productPriceDetailsBranchModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <hr/>
                <div class="modal-body">
                    <form method="post" action="">
                        <input type="hidden" name="productCodeBranch" id="productCodeBranch">
                        <div class="row clearfix">   
                            <div class="col-sm-12">
                                <label for="branch">Select Branch</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <select class="form-control show-tick" name="branchName" id="branchName" required>
                                            <option value="">---- Select One ----</option>
                                            <?php $i=0; foreach ($branchFetchResult as $dta) { ?>
                                                <option value="<?= $branchFetchResult[$i]['branch_name'] ?>"><?= ucwords($branchFetchResult[$i]['branch_name']) ?></option>
                                            <?php $i++; } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="priceBDetails" style="display:none;">
                                <div class="card">
                                    <div class="header">
                                        <h2 class="modal-title" id="pricedetailtilteB"></h2>
                                    </div>
                                    <div class="body table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="row">Purchase Price(₹): </th>
                                                    <td id="pruPriceB"></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Selling Price(₹): </th>
                                                    <td id="sePriceB"></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Tax(%): </th>
                                                    <td id="taxxB"></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Quantity: </th>
                                                    <td id="toQuantB"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary m-t-15 waves-effect" data-dismiss="modal">CLOSE</button>
                    </form>
                </div>
            </div>
        </div>
    </div>




<!-- Product Price Detail Model -->
    <div class="modal fade" id="productPriceDetailsModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <hr/>
                <div class="modal-body">
                    <form method="post" action="">
                        <input type="hidden" name="productCode" id="productCode">
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="card">
                                    <div class="header">
                                        <h2 class="modal-title" id="pricedetailtilte"></h2>
                                    </div>
                                    <div class="body table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="row">Purchase Price(₹): </th>
                                                    <td id="pruPrice"></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Selling Price(₹): </th>
                                                    <td id="sePrice"></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Tax(%): </th>
                                                    <td id="taxx"></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Quantity: </th>
                                                    <td id="toQuant"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary m-t-15 waves-effect" data-dismiss="modal">CLOSE</button>
                    </form>
                </div>
            </div>
        </div>
    </div>