<!-- Frame Detail Model -->
    <div class="modal fade" id="frameDetailsModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <hr/>
                <div class="modal-body">
                    <form method="post" action="">
                        <input type="hidden" name="frameID1" id="frameID1">
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="card">
                                    <div class="header">
                                        <h2 class="modal-title" id="detailtilte"></h2>
                                    </div>
                                    <div class="body table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="row">Company: </th>
                                                    <td id="fCompany"></td>
                                                    <th scope="row">Gender: </th>
                                                    <td id="fGender"></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Quality: </th>
                                                    <td id="fQuality"></td>
                                                    <th scope="row">Shape: </th>
                                                    <td id="fShape"></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Colour: </th>
                                                    <td id="fColour"></td>
                                                    <th scope="row">Material: </th>
                                                    <td id="fMaterial"></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Size: </th>
                                                    <td id="fSize"></td>
                                                    <th scope="row">Type: </th>
                                                    <td id="fType"></td>
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

    <!-- Frame Price Detail Model -->
    <div class="modal fade" id="framePriceDetailsModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <hr/>
                <div class="modal-body">
                    <form method="post" action="">
                        <input type="hidden" name="frameCode" id="frameCode">
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

    <!-- Branch Wise Frame Price Detail Model -->
    <div class="modal fade" id="framePriceDetailsBranchModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <hr/>
                <div class="modal-body">
                    <form method="post" action="">
                        <input type="hidden" name="frameCodeBranch" id="frameCodeBranch">
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