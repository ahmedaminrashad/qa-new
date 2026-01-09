<?
require ("../includes/dbconnection.php");
$famID=$_GET['famID'];
$famTax=$_GET['famTax'];
$famAmu=$_GET['famAmu'];
?>
<div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tax On Amount <?php echo $famAmu; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="signupForm" class="col-md-10 mx-auto" method="post" action="salary-tax-details-update">
				<div class="form-group">
															<label>Enter Tax Amount</label>
															<div>
															<input type="text" value="<?php echo $famTax; ?>" name="tax" id="tax" class="form-control">															</div>
												</div>
												<input type="hidden" value="<?php echo $famID; ?>" name="sal_id" id="sal_id" class="form-control">
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name ="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>