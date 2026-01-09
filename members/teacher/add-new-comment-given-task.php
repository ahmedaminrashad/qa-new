<?php

  require ("../includes/dbconnection.php");  
$sy = date('Y-m-d h:i:sa');

	$tkid =$_REQUEST['new_id'];
	$com =$_REQUEST['comment'];
	$user =$_REQUEST['usertk_id'];
	$sql = "UPDATE task_creator SET status = '2' WHERE task_id = '$tkid'";
	if ($conn->query($sql) === TRUE) {
	echo '';
	}
	$sql = "INSERT INTO task_string (task_id, user, msg, date)
					VALUES('$tkid', '$user', '" . mysqli_real_escape_string($conn, $com) . "', '$sy')"; 
					 if ($conn->query($sql) === TRUE) {
					 header('Location: ' . $_SERVER['HTTP_REFERER']);
					 }
?>