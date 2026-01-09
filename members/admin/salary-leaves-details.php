<?
require ("../includes/dbconnection.php");
$famID=$_GET['famID'];
$famMonth=$_GET['famMonth'];
$famYear=$_GET['famYear'];
$famAmu=$_GET['famAmu'];
?>
<div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">This Salary Leave Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="mb-0 table">
								<thead>
								<tr>
								<th>
									 Date
								</th>
								<th>
									 Status
								</th>
								<th>
									Deduction 
								</th>
								<?php 
// sending query
$sql = "SELECT * FROM teacher_attendance WHERE teacher_id = $famID AND date >= '$famMonth' AND date <= '$famYear' AND status = 2";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){		
			$attendence_id = $row['attendence_id'];
			$techa_id = $row['teacher_id'];
			$a_date = $row['date'];
			$a_time = $row['time_in'];
			$a_status = $row['status'];
?>
							</tr>
								</thead>
								<tbody>
								<tr>
								<td>
									 <?php echo $a_date; ?>
								</td>
								<td>
									<?php if($a_status == 1){echo 'Present';} elseif($a_status == 2){echo 'Absent';} ?>
								</td>
								<td><?php echo $famAmu/30; ?></td>
							</tr>
							<?php 	
		$i++;		
		}
	}	
?>
								</tbody>
								</table>
                                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>