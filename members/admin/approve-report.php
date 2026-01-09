<?php

  require ("../includes/dbconnection.php");  
?>
<?php
	$pid =$_REQUEST['ID'];

	$sql = "UPDATE reports SET status = '2' WHERE report_id = '$pid'";  	

	if ($conn->query($sql) === TRUE) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
?>