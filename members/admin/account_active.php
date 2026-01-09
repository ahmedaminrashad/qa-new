<?php

  require ("../includes/dbconnection.php");  
date_default_timezone_set("Africa/Cairo");
$time_start = date("h:i:s A", time(true));
?>
<?php
	$pid =$_REQUEST['t_id'];

	$sql = "UPDATE account SET active = '1' ";  	

	header("Location: account-list.php");
?>