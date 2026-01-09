<?php

  require ("../includes/dbconnection.php");  
?>
<?php
	$pid =$_REQUEST['t_id'];
	$whatsapp =$_REQUEST['w_id'];

	$sql = "UPDATE account SET subscription = '$whatsapp' WHERE parent_id = '$pid'";  	

	if ($conn->query($sql) === TRUE) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        echo 'error';
    }
?>