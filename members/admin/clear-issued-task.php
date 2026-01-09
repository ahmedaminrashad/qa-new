<?php

  require ("../includes/dbconnection.php");  
  include("../includes/main-var.php");
date_default_timezone_set($TimeZoneCustome);
$sy = date('Y-m-d h:i:sa');

	$tkid =$_REQUEST['new_id'];
	$sql = "UPDATE task_creator SET clear = '2', status = 2 WHERE task_id = '$tkid'";
					 if ($conn->query($sql) === TRUE) {
					 header('Location: ' . $_SERVER['HTTP_REFERER']);
					 }
?>