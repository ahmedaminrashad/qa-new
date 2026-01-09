<?php

  require ("../includes/dbconnection.php"); 
  
$tcid =$_REQUEST['cid']; 
$tdid =$_REQUEST['did'];
$p_id =$_REQUEST['parent_id']; 

$sql = "UPDATE sched SET dept_id = '$tdid' WHERE course_id = '$tcid'"; 
if ($conn->query($sql) === TRUE) {
	header("Location: parent-accounts-profile?parent_id=".$p_id."");
	}

?>