<?php
require ("../includes/dbconnection.php");
$cid =$_REQUEST['class_id'];
$tid =$_REQUEST['techid'];
			$sql = "UPDATE sched3 SET teacher_id = '$tid', mnt_id = 11 where sched_id = '$cid'";
if ($conn->query($sql) === TRUE) {
header('Location: ' . $_SERVER['HTTP_REFERER']);
}
?>
