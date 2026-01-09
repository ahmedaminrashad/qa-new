<?
require ("../includes/dbconnection.php");
$famID=$_GET['famID'];
$famName=$_GET['famName'];
$famValue=$_GET['famValue'];
?>
<div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Name: <?php echo $famName; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="signupForm" class="col-md-10 mx-auto" method="post" action="update-complaint">
				<div class="form-group">
															<label>Complaint</label>
															<div>
															<textarea required class="form-control" readonly><?php echo $famValue; ?></textarea>
															</div>
												</div>
												<div class="form-group">
															<label>Responce</label>
															<div>
															<textarea required class="form-control" placeholder="Enter Remarks for Parent" name="feed" id="feed"></textarea>
															</div>
												</div>
												<input type="hidden" value="<?php echo $famID; ?>" name="class_id" id="class_id" class="form-control">
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name ="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>