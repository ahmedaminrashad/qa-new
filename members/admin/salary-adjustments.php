<?
require ("../includes/dbconnection.php");
$famTECH=$_GET['famTECH'];
?>
<div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Salary Adjustemnts</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="signupForm" class="col-md-10 mx-auto" method="post" action="add-fine">
				<div class="form-body">
												<div class="form-group">
															<label>Amount</label>
															<div>
															<input type="text" name="amount" id="amount" class="form-control" required>
															</div>
												</div>
												<div class="form-group">
															<label>Type</label>
															<div>
															<select required class="form-control" name="type"  id="type" onchange="javascript: return optionList49_SelectedIndex()">
                      							<option value="1">Fine</option>
												<option value="2">Bonus</option>
												<option value="3">Advance</option>
												<option value="4">Arrears</option>
												<option value="5">Reduction in Fine</option>
												<option value="6">Gift</option>
												<option value="7">Other Additions</option>
												<option value="8">Other Deductions</option>
              									</select>
              												</div>
												</div>
												<div class="form-group">
															<label>Date</label>
															<div>
															<input type="date" name="date" id="date" class="form-control" required>
															</div>
												</div>
												<div class="form-group">
															<label>Description</label>
															<div >
															<textarea class="form-control" name="des" id="des"></textarea>
															</div>
												</div>
												<input type="hidden" value="<?php echo $famTECH; ?>" name="t_id" id="t_id" class="form-control">
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name ="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>