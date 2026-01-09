<?
require ("../includes/dbconnection.php");
$famID=$_GET['famID'];
$famDate=$_GET['famDate'];
$famNote=$_GET['famNote'];
?>
<div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Extra CLass</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="signupForm" class="col-md-10 mx-auto" method="post" action="note-date-update">
												<div class="form-group">
															<label class="lastname">
															<strong>Reminder Date</strong></label>
															<div class="col-md-5">
															<input type="date" value="<?php echo $famDate; ?>" name="date" id="date" class="form-control" required>
															</div>
												</div>
												<div class="form-group">
															<label class="lastname">
															<strong>Note</strong></label>
															<div class="col-md-5">
															<textarea required type="text" name="note" id="note" class="form-control"><?php echo $famNote; ?></textarea>
															</div>
												</div>
												<input type="hidden" value="<?php echo $famID; ?>" name="note_id" id="note_id" class="form-control">
											<div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name ="submit" class="btn btn-primary">Change Date</button>
            </div>
										</form>
										<!-- END FORM-->
									</div>