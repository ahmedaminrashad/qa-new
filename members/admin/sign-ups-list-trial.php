<?
require ("../includes/dbconnection.php");
$Date1=$_GET['Date1'];
$Date2=$_GET['Date2'];
$status=$_GET['name'];
echo 'From: '.$Date1.' To: '.$Date2.'';
function csr($var){
require ("../includes/dbconnection.php");
$result = mysqli_query("SELECT * FROM profile Where teacher_id = $var");
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){			
					$hidden_pt = $row['teacher_name'];
					$hidden_pday = $row['teacher_id'];
	
			  		echo $hidden_pt;
			}
			}
}
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
									 #
								</th>
								<th>
									 Name
								</th>
								<th>
									 Email
								</th>
								<th>
									 Account
								</th>
								<th>
									 Assigned
								</th>
								<th>
									 Status
								</th>
								</tr>
								</thead>
								<tbody>
								<?php 
// sending query
$sql = "SELECT `account`.*, `currency`.`currency_name` FROM `account`,`currency` WHERE account.currency_id=currency.currency_id HAVING ".$status." >= '$Date1' AND ".$status." <= '$Date2'";
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
			$MID = $row['m_id'];
			$CSRID = $row['csr_id'];
			$stu = $row['active'];
			?>
								<tr bgcolor="<?php echo $bgcolor; ?>">
								<td>
									 <?php echo ++$counter; ?>
								</td>
								<td>
									 <?php echo $pname; ?>
								</td>
								<td>
									 <a href="parent-accounts-profile?parent_id=<?php echo base64_encode($pid); ?>" target="_blank"><?php echo $pemail; ?></a>
								</td>
								<td>
									 <?php echo csr("$CSRID"); ?>
								</td>
								<td>
									 <?php echo csr("$MID"); ?>
								</td>
								<td>
									 <?php if ($stu == 11){ echo '<span class="label label-warning"><strong>On Trial</strong></span>'; }
									 elseif($stu == 7){ echo '<span class="label label-info"><strong>On Leave</strong></span>'; }
									 elseif($stu == 3){ echo '<span class="label label-danger"><strong>Deactived</strong></span>'; }
									 elseif($stu == 17){ echo '<span class="label label-danger"><strong>Suspended</strong></span>'; }
									 else { echo '<span class="label label-success"><strong>Regular</strong></span>'; }
									 ?>
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