<?php

  require ("../includes/dbconnection.php");  
?>
<?php
	$pid =$_REQUEST['pidf'];
	$tsu =$_REQUEST['at'];

	$sql = "UPDATE sched SET status = $tsu WHERE course_id = $pid";  	

	if ($conn->query($sql) === TRUE) {
	header("Location: make-trial-schedule3?pids=$pid&ats=$tsu");
	}


?>