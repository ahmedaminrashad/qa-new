<?php
  require ("../includes/dbconnection.php");  
?>
<?php
	$history =$_REQUEST['history_id'];
	$sql = "UPDATE class_history SET monitor_id = '1', activation = '00:00:00', start_time = '0000-00-00 00:00:00', end_time = '0000-00-00 00:00:00' WHERE history_id = '$history'";  	
	if ($conn->query($sql) === TRUE) {
	header("Location: teacher-home");
	}
?>