<?php

  require ("../includes/dbconnection.php");  
?>
<?php
	$task =$_REQUEST['a_id'];
	$link =$_REQUEST['link'];

	$sql = "UPDATE profile SET w2 = '2' WHERE teacher_id = $task";  	
if ($conn->query($sql) === TRUE) {
	header("Location: ".$link."");
	}
?>