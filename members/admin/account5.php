<?php

  require ("../includes/dbconnection.php");  
$time_start = date("h:i:s A", time(true));
?>
<?php
	$pid =$_REQUEST['t_id'];

	$sql = "UPDATE account SET active = '5' WHERE parent_id = '$pid'";  	

	if ($conn->query($sql) === TRUE) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        echo 'error';
    }
?>