<?php

  require ("../includes/dbconnection.php");  
date_default_timezone_set("Africa/Cairo");
$time_start = date("h:i:s A", time(true));
?>
<?php
	$pid =$_REQUEST['t_id'];

	$sql = "UPDATE trial SET mnt_id = '6' WHERE trial_id = '$pid'";  	
if ($conn->query($sql) === TRUE) {
	header("Location: new_red.php");
	}
?>