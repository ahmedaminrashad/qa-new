<?
require ("../includes/dbconnection.php");
$famID=$_GET['famID'];
?>
<div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add New CLass <?php echo $famID; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="mb-0 table">
                <thead>
								<tr>
								<th>
									 Teacher Name
								</th>
								<th>
									 Zoom
								</th>
								<th>
									 Password
								</th>
								</tr>
								</thead>
								<tbody>
								<?php 
// sending query
$famID=$_GET['famID'];
$sql = "SELECT * FROM profile WHERE teacher_id = $famID";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){		
			$asky = $row['Skype'];		
			$aspass = $row['s_pass'];
			$atname = $row['teacher_name'];
?>
								<tr bgcolor="<?php echo $bgcolor; ?>">
								<td>
									 <?php echo $atname; ?>
								</td>
								<td>
									 <?php echo $asky; ?>
								</td>
								<td>
									 <?php echo $aspass; ?>
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
            </div>