<?
require ("../includes/dbconnection.php");
$famID=$_GET['famID'];
$famName=$_GET['famName'];
$famTime=$_GET['famTime'];
?>
<div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Class of <?php echo $famName; ?> (<?php echo $famTime; ?>)</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="signupForm" class="col-md-10 mx-auto" method="post" action="class-shift-update">
				<input type="hidden" value="<?php echo $famID; ?>" name="class_id" id="class_id" class="form-control">
                                <div class="form-group">
                                    <div>
                                    <div class="position-relative form-group"><label for="exampleSelect" class="">Note</label>
                                                    <textarea required class="form-control" placeholder="Enter Remarks for Parent" name="note" id="note"></textarea>
                                                    </div>
                                                </div>
                                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name ="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>