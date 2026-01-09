<?php
  require ("../includes/dbconnection.php");  
  $pid =$_REQUEST['teacher'];
			$sql = "SELECT * FROM profile WHERE teacher_id='$pid' ";
			$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){			
					$link = $row['link'];
			 		$zoom_link = $link;			
			}
			}
			header("Location: ".$link."");
?>