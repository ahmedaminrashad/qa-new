<?php
require ("../includes/dbconnection.php");
$cid =$_REQUEST['class_id'];
$tid =$_REQUEST['techid'];
			$sql = "UPDATE class_history SET teacher_id = '$tid', status = '18' where history_id = '$cid'";
			if ($conn->query($sql) === TRUE) {
header('Location: ' . $_SERVER['HTTP_REFERER']);
}
?>
