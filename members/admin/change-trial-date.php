<?php

  require ("../includes/dbconnection.php");  
date_default_timezone_set("Africa/Cairo");
$time_start = date("h:i:s A", time(true));
?>
<?php
	$pid =$_REQUEST['p_id'];
	$date =$_REQUEST['date'];

	$sql = "UPDATE account SET trial_date = '$date' WHERE parent_id = '$pid'";  	
 		if ($conn->query($sql) === TRUE) {
	header('Location: ' . $_SERVER['HTTP_REFERER']);
}
?>