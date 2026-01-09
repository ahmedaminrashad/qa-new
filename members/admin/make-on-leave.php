<?php

  require ("../includes/dbconnection.php");  

$data_date1 = date('Y-m-d', time());
?>
<?php
	$pid =$_REQUEST['p_id'];
	$date =$_REQUEST['date'];

	$sql = "UPDATE account SET active = '7', leave_date = '$date' WHERE parent_id = '$pid'";  	

	if ($conn->query($sql) === TRUE) {
 	
$sql = "UPDATE course SET nature = '1', Teacher = '0', active = '7' WHERE parent_id = '$pid'";
if ($conn->query($sql) === TRUE) {
	echo '';
	}
$sql = "DELETE FROM sched WHERE parent_id = '$pid'";
if ($conn->query($sql) === TRUE) {
	echo '';
	}
$sql = "DELETE FROM class_history WHERE parent_id = '$pid' AND date_admin >= '$data_date1' AND monitor_id = '1'";
	if ($conn->query($sql) === TRUE) {
	header('Location: email-general?pid='.$pid.'&type=email-onleave-account-temp&leavedate='.$date.'');
	}

}
?>