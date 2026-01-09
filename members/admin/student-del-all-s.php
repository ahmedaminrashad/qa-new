<?php
  require ("../includes/dbconnection.php");  
?>
<?php
	$Course_ID =$_REQUEST['Course_ID'];
	$sql = "DELETE FROM sched WHERE course_id = '$Course_ID'";  	
	if ($conn->query($sql) === TRUE) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
?>