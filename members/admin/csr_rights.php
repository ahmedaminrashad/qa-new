<?php

  require ("../includes/dbconnection.php");  
?>
<?php
	$task =$_REQUEST['a_id'];
	$link =$_REQUEST['link'];
	$sta =$_REQUEST['sts'];

	$sql = "UPDATE profile SET csr_rights = '$sta' WHERE teacher_id = $task";  	
if ($conn->query($sql) === TRUE) {
	header("Location: ".$link."");
	}
?>