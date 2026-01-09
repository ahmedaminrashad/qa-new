<?php

  require ("../includes/dbconnection.php");  
	$tech_id =$_REQUEST['t_id'];
	$status =$_REQUEST['status'];
	$date =$_REQUEST['date'];
	$sql = "INSERT INTO teacher_attendance (teacher_id, date, time_in, status)
					VALUES('$tech_id', '$date', '$time_start', '$status')";
					if ($conn->query($sql) === TRUE) { 	
	echo "<script>window.open('".$_SERVER['HTTP_REFERER']."','_self')</script>";
	}
?>