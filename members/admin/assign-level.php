<?php

  require ("../includes/dbconnection.php");  
?>
<?php
	$task =$_REQUEST['a_id'];
	$link =$_REQUEST['t_link'];
	$sta =$_REQUEST['level'];

	$sql = "UPDATE profile SET level = '$sta' WHERE teacher_id = $task";  	
if ($conn->query($sql) === TRUE) {
	header("Location: ".$link."");
	}
?>