<?php
  require ("../includes/dbconnection.php");  
?>
<?php
	$Course_ID =$_REQUEST['Course_ID'];
	$sql = "INSERT INTO del_student (student_id, s_name) SELECT course_id, course_yrSec FROM course WHERE course_id = '$Course_ID'";
	if ($conn->query($sql) === TRUE) {
        echo '';
    }
	$sql = "DELETE FROM course WHERE course_id = '$Course_ID'";
	if ($conn->query($sql) === TRUE) {
        echo '';
    }
?>
<?php
	$Course_ID =$_REQUEST['Course_ID'];
	$sql = "DELETE FROM sched WHERE course_id = '$Course_ID'";  	
	if ($conn->query($sql) === TRUE) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
?>