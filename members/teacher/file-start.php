<?php
  require ("../includes/dbconnection.php");  
date_default_timezone_set($TimeZoneCustome);
$time_start = date('Y-m-d H:i:s');
?>
<?php
	$history =$_REQUEST['history_id'];
	$sql = "UPDATE class_history SET monitor_id = '3', start_time = '$time_start', end_time = '$time_start' WHERE history_id = '$history'";  	
	if ($conn->query($sql) === TRUE) {
	header("Location: teacher-home");
	}
?>