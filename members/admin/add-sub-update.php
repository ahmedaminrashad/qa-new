<?php
require ("../includes/dbconnection.php");
			date_default_timezone_set("Africa/Cairo");
$data_date1 = date('Y-m-d', time());
		 	$pid= $_REQUEST['pid'];
		 	$extra= $_REQUEST['extra'];
			$sql = "INSERT INTO subscription (parent_id, hours, date, status, added, py_id, last_added, actual)
					VALUES('$pid','$extra', '$data_date1', '2', '0', '0', '0', '$extra')";
					if ($conn->query($sql) === TRUE) {
					$sql = "UPDATE account SET subscription = 2 WHERE parent_id = $pid";
					if ($conn->query($sql) === TRUE) {
					header('Location: ' . $_SERVER['HTTP_REFERER']);
					}
					}
?>
