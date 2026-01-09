<?php

  require ("../includes/dbconnection.php");  
?>
<?php
	$pid =$_REQUEST['p_id'];

	$sql = "UPDATE course SET nature = '2', Teacher = '0' WHERE parent_id = '$pid'";  	
if ($conn->query($sql) === TRUE) {
 	
$sql = "DELETE FROM sched WHERE parent_id = '$pid'";
	if ($conn->query($sql) === TRUE) {header("Location: parent-accounts");
	}
}
?>