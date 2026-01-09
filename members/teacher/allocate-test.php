<?
require ("../includes/dbconnection.php");
$famID=$_GET['famID'];
$famName=$_GET['famName'];
?>
<div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Allocate Test to <?php echo $famName; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="signupForm" class="col-md-10 mx-auto" method="post" action="allocate-test-update">
                                <div class="form-group">
															<label>Student Course</label>
															<div>
															<select required class="form-control input-circle" name="dept"  id="dept" onchange="javascript: return optionList49_SelectedIndex()">
                      							<option value="1">Quaida Student</option>
												<option value="2">Nazra Student</option>
												<option value="3">Hifz Student</option>
              									</select>															
              									</div>
												</div>
												<input type="hidden" value="<?php echo $famID; ?>" name="s_id" id="s_id" class="form-control">
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name ="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>