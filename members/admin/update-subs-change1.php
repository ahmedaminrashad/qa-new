<?php
require ("../includes/dbconnection.php");
$data_date1 = date('Y-m-d', time());
			$sid = $_REQUEST['sub'];
		 	$pid= $_REQUEST['pid'];
		 	$extra= $_REQUEST['extra'];
		 	$hoursS= $_REQUEST['hoursS'];
		 	$subD= $_REQUEST['stdata'];
			$sql = "UPDATE subscription SET added = '$extra', hours = '$hoursS', date = '$subD' WHERE sub_id = '$sid'";
					if ($conn->query($sql) === TRUE) {
					header('Location: ' . $_SERVER['HTTP_REFERER']);
					}
?>
