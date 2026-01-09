<?
require ("../includes/dbconnection.php");
$famID=$_GET['famID'];
$famMonth=$_GET['famMonth'];
$famYear=$_GET['famYear'];
$famType=$_GET['famType'];
$famName=$_GET['famName'];
?>
<div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"><?php echo $famName; ?><br>From: <?php echo $famMonth; ?> To: <?php echo $famYear; ?></h5>
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
									 Amount
								</th>
								<th>
									 Nature
								</th>
								<th>
									 Description
								</th>
								</tr>
								</thead>
								<tbody>
								<?php 
// sending query
$sql = "SELECT * FROM teacher_fine WHERE teacher_id = $famID AND date >= '$famMonth' AND date <= '$famYear' AND type = '$famType'";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){		
			$fine_id = $row['fine_id'];
			$techf_id = $row['teacher_id'];
			$f_date = $row['date'];
			$f_amount = $row['amount'];
			$f_des = $row['des'];
			$f_type = $row['type'];
?>
							
								<tr bgcolor="<?php echo $bgcolor; ?>">
								<td>
									 <?php echo $f_date; ?>
								</td>
								<td>
									<?php echo $f_amount; ?>
								</td>
								<td>
									<?php if($f_type == 1){echo 'Fine';} elseif($f_type == 2){echo 'Bouns';} elseif($f_type == 3){echo 'Advance';} elseif($f_type == 4){echo 'Returns';} elseif($f_type == 5){echo 'Reduction';} elseif($f_type == 6){echo 'Gift';} elseif($f_type == 7){echo 'Other Additions';} elseif($f_type == 8){echo 'Other Deductions';} ?>
								</td>
								<td>
									<?php echo $f_des; ?>
								</td>
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
                <button type="submit" name ="submit" class="btn btn-primary">Save changes</button>
            </div>