<?php

  require ("../includes/dbconnection.php");  
?>
<?php
$data_date1 = date('Y-m-d', time());
	$pid =$_REQUEST['t_id'];
	$pidName =$_REQUEST['t_idName'];
	$piy =$_REQUEST['pp_idName'];
	
	$sql = "UPDATE course SET active = '17' WHERE course_id = '$pid'";
	if ($conn->query($sql) === TRUE) {
        echo '';
    }
	$sql = "UPDATE sched SET status = '17' WHERE course_id = '$pid'";
	if ($conn->query($sql) === TRUE) {
        echo '';
    }
	$sql = "UPDATE class_history SET status = '17' WHERE course_id = '$pid' AND date_admin >= '$data_date1'";
if ($conn->query($sql) === TRUE) {
        header('Location: email-general?pid='.$piy.'&type=email-suspend-student-temp&name='.$pidName.'');
        //header('Location: parent-accounts-profile?parent_id='.base64_encode($piy).'');
    }
	
?>