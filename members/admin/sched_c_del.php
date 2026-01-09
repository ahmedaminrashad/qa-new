<?php
  require ("../includes/dbconnection.php");  
?>
<?php
	$sched_id =$_REQUEST['sched_id'];
	$sql = "DELETE FROM sched WHERE sched_id = '$sched_id'";
	if ($conn->query($sql) === TRUE) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        echo 'error';
    }	
?>