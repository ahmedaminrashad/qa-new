<?php

  require ("../includes/dbconnection.php");  
?>
<?php
$data_date1 = date('Y-m-d', time());
	$pid =$_REQUEST['t_id'];
	$adate =$_REQUEST['date'];

	$sql = "UPDATE account SET active = '17', suspension_date = '$adate' WHERE parent_id = '$pid'";
	if ($conn->query($sql) === TRUE) {
        echo '';
    }
	$sql = "UPDATE course SET active = '17' WHERE parent_id = '$pid'";
	if ($conn->query($sql) === TRUE) {
        echo '';
    }
	$sql = "UPDATE sched SET status = '17' WHERE parent_id = '$pid'";
	if ($conn->query($sql) === TRUE) {
        echo '';
    }
	$sql = "UPDATE class_history SET status = '17' WHERE parent_id = '$pid' AND date_admin >= '$data_date1'";
if ($conn->query($sql) === TRUE) {
        header('Location: email-general?pid='.$pid.'&type=email-suspend-account-temp');
    }
	
?>