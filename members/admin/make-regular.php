<?php

  require ("../includes/dbconnection.php");  
?>
<?php
	$pid =$_REQUEST['t_id'];
	$did =$_REQUEST['d_id'];
	$frs =$_REQUEST['frr'];
	$curs =$_REQUEST['cur'];
	$link =$_REQUEST['link'];

	$sql = "UPDATE account SET active = '1', regular_date = '$did' WHERE parent_id = '$pid'";
	if ($conn->query($sql) === TRUE) {
	echo '';
	}
	$sql = "UPDATE course SET active = '1', regular_date = '$did' WHERE parent_id = $pid";
	if ($conn->query($sql) === TRUE) {
	echo '';
	}
	$sql = "UPDATE sched SET status = '1' WHERE parent_id = '$pid'";
	if ($conn->query($sql) === TRUE) {
	echo '';
	}
	$sql = "UPDATE class_history SET status = '1' WHERE parent_id = '$pid'";
	if ($conn->query($sql) === TRUE) {
	header('Location: email-general?pid='.$pid.'&type=email-regular-account-temp');
	}
?>