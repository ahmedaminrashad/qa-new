<?php
  require ("../includes/dbconnection.php");  
	$pid =$_REQUEST['py_id'];
	$note =$_REQUEST['note'];
	$date =$_REQUEST['date'];
	$sql = "UPDATE invoice SET status = '2', submit = '$date', order_num = '$note', d = now() WHERE py_id = '$pid'";
	if ($conn->query($sql) === TRUE) {
	header('Location: ' . $_SERVER['HTTP_REFERER']); 
	}	
?>