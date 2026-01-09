<?php

  require ("../includes/dbconnection.php");
$data_date1 = date('Y-m-d', time()); 
$dis =$_REQUEST['dis'];
$pid =$_REQUEST['parentID'];
$sql = "UPDATE account SET discount = '$dis' WHERE parent_id = '$pid'";
	if ($conn->query($sql) === TRUE) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        echo 'error';
    }

?>
