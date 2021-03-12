<!-- Add Branch Model -->
    <div class="modal fade" id="branchAddModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">ADD BRANCH</h4>
                </div>
                <hr/>
                <div class="modal-body">
                    <form method="post" action="./branch/addBranchData.php">
                        <div class="col-sm-12">
                            <label for="eName">Branch Name</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="eName" name="eName" class="form-control" placeholder="Enter branch name" autocomplete="off" required>
                                </div>
                            </div>
                        </div>

                        <input type="submit" id="save" class="btn btn-primary m-t-15 waves-effect" value="SUBMIT" />
                        <button type="button" class="btn btn-primary m-t-15 waves-effect" data-dismiss="modal">CLOSE</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    