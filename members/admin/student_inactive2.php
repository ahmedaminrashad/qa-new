<?php

  require ("../includes/dbconnection.php");  
?>
<?php
	$pid =$_REQUEST['t_id1'];
	$piy =$_REQUEST['pp_idName'];
	$pidName =$_REQUEST['t_idName'];
	$sql = "SELECT * FROM class_history WHERE history_id = (SELECT MAX(history_id) FROM class_history WHERE course_id = '$pid')";
	$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			$tech_id = 1;
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){			
					$tech_id = $row['teacher_id'];
			}
			}
	$sql = "UPDATE course SET nature = '1', Teacher = '$tech_id' WHERE course_id = '$pid'"; 
	if ($conn->query($sql) === TRUE) { 	
	header('Location: email-general?pid='.$piy.'&type=email-activate-student-temp&name='.$pidName.'');
	//header('Location: parent-accounts-profile?parent_id='.base64_encode($piy).'');
	}

?>