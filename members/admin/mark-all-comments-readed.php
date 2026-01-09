<?php

  require ("../includes/dbconnection.php");  

$time_start = date("h:i:s A", time(true));
?>
<?php
	$pid =$_REQUEST['t_id'];

	$sql = "UPDATE comment SET status = '2' WHERE manager_id = 1";  	
if ($conn->query($sql) === TRUE) {
	header('Location: ' . $_SERVER['HTTP_REFERER']);
	}
?>