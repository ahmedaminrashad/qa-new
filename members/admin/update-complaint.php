<?php
require ("../includes/dbconnection.php");
$sy11 = date('Y-m-d');
$time_start = date('h:i a', time());
$rid =$_REQUEST['class_id'];
$cid =$_REQUEST['feed'];
			$sql = "UPDATE complaint SET feed = '" . mysqli_real_escape_string($conn, $cid) . "', cn_id = '2', feed_date = '$sy11', feed_time = '$time_start', feed_id = '1' where com_id = '$rid'";
if ($conn->query($sql) === TRUE) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
?>
