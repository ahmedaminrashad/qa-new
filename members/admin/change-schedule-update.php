<?php

  require ("../includes/dbconnection.php");  
?>
<?php
	$teacher_time =$_REQUEST['timeid'];
	$student_time =$_REQUEST['studentid'];
	$teach_id =$_REQUEST['teacherid'];
	$student_id =$_REQUEST['s_id'];
	$link =$_REQUEST['link'];

	$sql = "UPDATE sched SET time_s_id = '$teacher_time', atime_s_id = '$teacher_time', stime_s_id = '$student_time', teacher_id = '$teach_id' WHERE course_id = '$student_id'";
	if ($conn->query($sql) === TRUE) {
	$sql = "UPDATE course SET Teacher = '$teach_id' WHERE course_id = '$student_id'";
	if ($conn->query($sql) === TRUE) {
	header("Location: $link");
	}
	}
?>