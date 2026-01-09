<?
require ("../includes/dbconnection.php");
$famID=$_GET['famID'];
?>
<?php 
// sending query
$sql = "SELECT * FROM profile WHERE teacher_id = $famID";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){		
			$atname = $row['teacher_name'];
			$anote = $row['note'];
?>
<div class="portlet-body">
							<div class="note note-success">
								<h4 class="block"><?php echo $atname; ?></h4>
								<p>
									 <?php echo $anote; ?>
								</p>
							</div>
							</div>
							<?php 	
		}
	}	
?>
