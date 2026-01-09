<?
$famAdd=$_REQUEST['famAdd'];
$famNote=$_REQUEST['famNote'];
$famDate=$_REQUEST['famDate'];
$famID=$_REQUEST['famID'];
?>
<div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Mark this Invoice as Paid <?php echo $famID; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="signupForm" class="col-md-10 mx-auto" method="post" action="mark-paid<?php echo $famID; ?>">
				<div class="form-group">
															<label>Order number / Paymant Mode etc</label>
															<div>
															<input type="text" value="<?php echo $famNote; ?>" name="note" id="note" class="form-control input-circle" required>															</div>
												</div>
												<div class="form-group">
															<label>Payment Date</label>
															<div>
														<input type="date" value="<?php echo $famDate; ?>" name="date" id="date" class="form-control input-circle" required>
												</div>
												</div>
												<input type="hidden" value="<?php echo $famAdd; ?>" name="py_id" id="py_id" class="form-control">
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name ="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
