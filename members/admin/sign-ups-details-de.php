<?
require ("../includes/dbconnection.php");
$famID=$_GET['famID'];
$famName=$_GET['famName'];
?>
<div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="main-card mb-3 card">
                                <div class="card-body"><h5 class="card-title"><?php $table_name; ?></h5>
                                    <div class="table-responsive">
                                        <table class="align-middle mb-0 table table-striped table-hover">
                                        <thead>
								<tr>
								<th>
									 Name
								</th>
								<th>
									 Email
								</th>
								<th>
									 Phone
								</th>
								<th>
									 Skype
								</th>
								</tr>
								</thead>
								<tbody>
								<?php 
// sending query
$sql = "SELECT * FROM account Where MONTH(deactivation_date) = $famID AND YEAR(deactivation_date) = $famName AND dateDiff(deactivation_date,regular_date) > 30";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){		
			$pid = $row['parent_id'];
			$pname = $row['parent_name'];
			$pemail = $row['email'];
			$pt = $row['telephone'];
			$ps = $row['skype'];
			?>
								<tr bgcolor="<?php echo $bgcolor; ?>">
								<td>
									 <?php echo $pname; ?>
								</td>
								<td>
									 <?php echo $pemail; ?>
								</td>
								<td>
									 <?php echo $pt; ?>
								</td>
								<td>
									 <?php echo $ps; ?>
								</td>
							</tr>
						<?php 	
		}
	}	
?>
</tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>