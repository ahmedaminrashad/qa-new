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
								<th>
									 Country
								</th>
								</tr>
								</thead>
								<tbody>
								<?php 
// sending query
$sql = "SELECT * FROM new_request Where MONTH(date) = $famID AND YEAR(date) = $famName";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){		
			$arequest_id = $row['request_id'];
			$aname = $row['name'];
			$aemail = $row['email'];
			$aphone = $row['phone'];
			$askype = $row['skype'];
			$acountry = $row['country'];
			$acity = $row['city'];
			$amessage = $row['message'];
			$adate = $row['date'];
			$atime = $row['time'];
			$aupdate = $row['time_update'];
			$asent = $row['sent'];
			$acsr_id = $row['csr_id'];
			$from_id = $row['time_from'];
			$to_id = $row['time_to'];
			?>
								<tr bgcolor="<?php echo $bgcolor; ?>">
								<td>
									 <?php echo $aname; ?>
								</td>
								<td>
									 <?php echo $aemail; ?>
								</td>
								<td>
									 <?php echo $aphone; ?>
								</td>
								<td>
									 <?php echo $askype; ?>
								</td>
								<td>
									 <?php echo $acountry; ?>
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