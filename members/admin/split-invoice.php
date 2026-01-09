<?
require ("../includes/dbconnection.php");
$famAdd=$_GET['famAdd'];
$famNote=$_GET['famNote'];
?>
<div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Split this invoice</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="signupForm" class="col-md-10 mx-auto" method="post" action="update-invoice-split">
				<div class="form-group">
															<label>Actual Amount</label>
															<div>
															<input type="text" value="<?php echo $famNote; ?>" name="www" id="www" class="form-control input-circle" readonly>															</div>
												</div>
												<div class="form-group">
															<label>Split Amount</label>
															<div>
														<input type="text" value="" name="fee" id="fee" class="form-control input-circle" required>
												</div>
												</div>
												<input type="hidden" value="<?php echo $famAdd; ?>" name="py_id" id="py_id" class="form-control">
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name ="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>