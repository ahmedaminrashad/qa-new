<?
require ("../includes/dbconnection.php");
$famID=$_GET['famID'];
$famDis=$_GET['famDis'];
?>
<div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Referals by: <?php echo $famDis; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php 
// sending query
$sql = "SELECT * FROM new_request WHERE parent_id = '$famID' ORDER BY request_id DESC";
$counter = 0;
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
			$asite_id = $row['site_id'];
			$ip_id = $row['ip_address'];
			$parent_id = $row['parent_id'];
			$parent_name = $row['parent_name'];
?>
<table class="table table-hover">
								<thead>
								<tr>
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
								<th>
									 City
								</th>
								</tr>
								</thead>
								<tbody>
								<tr bgcolor="<?php echo $bgcolor; ?>">
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
								<td>
										<?php echo $acity; ?>
								</td>
							</tr>
							<tr>
								<td>
								<strong>Message:</strong>
								</td>
								<td colspan="4">
									<?php echo $amessage; ?>
								</td>
							</tr>
							<tr>
								<td>
								<strong>IP Address:</strong>
								</td>
								<td colspan="4">
									<?php echo $ip_id; ?>
								</td>
							</tr>
							</tbody>
								</table>
								<?php 	
		}
	}	
?>
</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>