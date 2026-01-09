<?
require ("../includes/dbconnection.php");
$famID=$_GET['famID'];
$famAmu=$_GET['famAmu'];
$famP=$_GET['famP'];
?>
<div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add More Hour <?php echo $famAmu; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="signupForm" class="col-md-10 mx-auto" method="post" action="add-sub-update">
				<input type="hidden" value="<?php echo $famP; ?>" name="pid" id="pid" class="form-control">
                                <div class="form-group">
                                    <label for="lastname">Add Hours</label>
                                    <div>
                                        <input type="text" value="<?php echo $extra; ?>" name="extra" id="extra" class="form-control">
                                    </div>
                                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name ="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>