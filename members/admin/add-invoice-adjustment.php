<?
require ("../includes/dbconnection.php");
$famID=$_GET['famID'];
$famAdd=$_GET['famAdd'];
$famNote=$_GET['famNote'];
$famName=$_GET['famName'];
?>
<div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Invoice Adjustemnt for <?php echo $famName; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="signupForm" class="col-md-10 mx-auto" method="post" action="invoice-adjustment-update">
				<input type="hidden" value="<?php echo $famID; ?>" name="py_id" id="py_id" class="form-control">
                                <div class="form-group">
                                    <label for="lastname">Amount</label>
                                    <div>
                                        <input type="text" value="<?php echo $famAdd; ?>" name="amu" id="amu" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="lastname">Note</label>
                                    <div>
                                        <textarea required class="form-control" placeholder="Enter Your Note" name="note" id="note"><?php echo $famNote; ?></textarea>
                                    </div>
                                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name ="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>