<?php
require ("../includes/dbconnection.php");
			$req_id= $_POST['reqid'];
		 	$msg= $_POST['comment'];
		 	$date= $_POST['dateid'];
			$sql = "INSERT INTO new_request_comments (request_id, comment, date)
					VALUES('$req_id', '" . mysql_real_escape_string($msg) . "', '$date')"; 
					header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
