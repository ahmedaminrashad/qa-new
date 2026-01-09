<?php

  require ("../includes/dbconnection.php");  
$time_start = date("h:i:s A", time(true));
?>
<?php
	$pid =$_REQUEST['pT'];

	$sql = "UPDATE test_results SET status_id = '3' WHERE test_id = '$pid'";  	

	if ($conn->query($sql) === TRUE) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
?>