<?php
  require ("../includes/dbconnection.php");  
?>
<?php
$dept_id =$_REQUEST['history_id'];
	$sql = "DELETE FROM teacher_attendance WHERE attendence_id = '$dept_id'";  		
	if ($conn->query($sql) === TRUE) { 
	header('Location: ' . $_SERVER['HTTP_REFERER']);
	}
?>