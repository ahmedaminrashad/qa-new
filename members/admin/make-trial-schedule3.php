<?php

  require ("../includes/dbconnection.php");  
?>
<?php
	$pid =$_REQUEST['pids'];
	$tsu =$_REQUEST['ats'];

	$sql = "UPDATE sched3 SET status = $tsu WHERE course_id = $pid";  	

	if ($conn->query($sql) === TRUE) {
	header("Location: list-of-active-students");
	}


?>