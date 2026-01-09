<?php
  require ("../includes/dbconnection.php");  
date_default_timezone_set("Africa/Cairo");
$time_start = date(" g:i:A", time(true));
?>
<?php
	$pid =$_REQUEST['t_id'];
	$sss =$_REQUEST['block'];
	$sql = "UPDATE profile SET schedule_status = '$sss' WHERE teacher_id = '$pid'";  	
	if ($conn->query($sql) === TRUE) {
	header('Location: ' . $_SERVER['HTTP_REFERER']);
	}
?>