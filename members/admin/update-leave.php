<?php session_start(); ?>
<?php
include("../includes/session1.php");
require ("../includes/dbconnection.php");
			$leaveid= $_GET['leave'];
		 	$status_id= $_GET['status'];
			$sql = "UPDATE leave_app SET status = '$status_id' WHERE leave_id = '$leaveid'";
					if ($conn->query($sql) === TRUE) {
					header('Location: ' . $_SERVER['HTTP_REFERER']);
					}
?>
