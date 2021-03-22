                        <div class="header">
                            <h2>
                                <input type="hidden" name="pro_cat" id="pro_cat" value="<?= $title ?>">
                                <?= strtoupper($title) ?>'S PURCHASE DATA 
                                &nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary waves-effect" data-toggle="modal" data-target="#purAddModal">
                                        <i class="material-icons">add_box</i>
                                        <span>PURCHASE</span>
                                </button>
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable" id="purTable">
                                    <thead>
                                        <tr>
                                            <th>S.No.</th>
                                            <?php if($branch === ''){ ?>
                                                <th>Branch</th>
                                            <?php } ?>
                                            <th>Pro. Code</th>
                                            <th>Pro. Name</th>
                                            <th>Supp. Name</th>
                                            <th>Pur. Price(₹)</th>
                                            <th>Sell Price(₹)</th>
                                            <th>Tax(%)</th>
                                            <th>Qty</th>
                                            <th>Pur. Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>