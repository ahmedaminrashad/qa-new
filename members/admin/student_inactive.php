<?php

  require ("../includes/dbconnection.php");  
?>
<?php
	$pid =$_REQUEST['t_id1'];
	$pid1 =$_REQUEST['t_id'];

	$sql = "UPDATE course SET nature = '2', Teacher = '0' WHERE course_id = '$pid'";  	
if ($conn->query($sql) === TRUE) {
 	
$sql = "DELETE FROM sched WHERE course_id = '$pid'";
if ($conn->query($sql) === TRUE) {
	header("Location: parent-accounts");
	}
}
?>