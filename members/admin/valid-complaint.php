<?php

  require ("../includes/dbconnection.php");  
$time_start = date("h:i:s A", time(true));
?>
<?php
	$cid =$_REQUEST['cid'];
	$vid =$_REQUEST['vid'];
	$sql = "UPDATE complaint SET validity = '$vid' WHERE com_id = '$cid'";  	
if ($conn->query($sql) === TRUE) {
	header('Location: ' . $_SERVER['HTTP_REFERER']);
	}
?>