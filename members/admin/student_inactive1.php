<?php

  require ("../includes/dbconnection.php");  
?>
<?php
	$pid =$_REQUEST['t_id1'];
	$piy =$_REQUEST['pp_idName'];
	$pidName =$_REQUEST['t_idName'];

	$sql = "UPDATE course SET nature = '2', Teacher = '0' WHERE course_id = '$pid'";  	
if ($conn->query($sql) === TRUE) {
 	
$sql = "DELETE FROM sched WHERE course_id = '$pid'";
if ($conn->query($sql) === TRUE) {
	header('Location: email-general?pid='.$piy.'&type=email-deactivate-student-temp&name='.$pidName.'');
	//header('Location: parent-accounts-profile?parent_id='.base64_encode($piy).'');
	}

}
?>