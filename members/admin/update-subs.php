<?
require ("../includes/dbconnection.php");
$famID=$_GET['famID'];
$famAmu=$_GET['famAmu'];
$famP=$_GET['famP'];
$VID=$_GET['VID'];
$sql = "SELECT * FROM subscription Where sub_id = '$famID'";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){			
					$sub_id = $row['sub_id'];
					$subP = $row['parent_id'];
					$subH1 = $row['hours'];
					$subD = $row['date'];
					$sub_status = $row['status'];
					$extra = $row['added'];
					$last_add = $row['last_added'];
					$actual = $row['actual'];
					$arrear = $row['arrear'];
					$subH = $subH1+$extra+$arrear;
	
			}
			}
?>
<div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add More Hour <?php echo $famAmu; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="signupForm" class="col-md-10 mx-auto" method="post" action="update-subs-change<?php echo $VID; ?>">
				<input type="hidden" value="<?php echo $famID; ?>" name="sub" id="sub" class="form-control">
												<input type="hidden" value="<?php echo $famP; ?>" name="pid" id="pid" class="form-control">
                                <div class="form-group">
															<label>Hours / Month</label>
															<div>
															<input required type="text" value="<?php echo $subH1; ?>" name="hoursS" id="hoursS" class="form-control">
															</div>
												</div>
												<div class="form-group">
															<label>Date of Subscription</label>
															<div>
															<input type="date" value="<?php echo $subD; ?>" name="stdata" id="stdata" class="form-control">
															</div>
												</div>
												<div class="form-group">
															<label>Extra Hours</label>
															<div>
															<input type="text" value="<?php echo $extra; ?>" name="extra" id="extra" class="form-control">
															</div>
												</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name ="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>