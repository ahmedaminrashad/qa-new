<?php

  require ("../includes/dbconnection.php");  
?>
<?php
$data_date1 = date('Y-m-d', time());
	$pid =$_REQUEST['t_id'];
	$link =$_REQUEST['link'];

	$sql = "UPDATE account SET active = '1' WHERE parent_id = '$pid'";
	if ($conn->query($sql) === TRUE) {
	echo '';
	}
	$sql = "UPDATE course SET active = 1 WHERE parent_id = $pid";
	if ($conn->query($sql) === TRUE) {
	echo '';
	}
	$sql = "UPDATE sched SET status = 1 WHERE parent_id = $pid";
	if ($conn->query($sql) === TRUE) {
	echo '';
	}
	$sql = "UPDATE class_history SET status = '1' WHERE parent_id = '$pid' AND date_admin >= '$data_date1'";
if ($conn->query($sql) === TRUE) {
	header('Location: email-general?pid='.$pid.'&type=email-unsuspend-account-temp');
	}
	
?>