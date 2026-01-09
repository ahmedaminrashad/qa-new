<?php
require ("../includes/dbconnection.php");
$sy11 = date('Y-m-d');
$tax =$_REQUEST['tax'];
$sid =$_REQUEST['sal_id'];
			$sql = "UPDATE teacher_salary SET tax = '$tax' where salary_id = '$sid'";
			if ($conn->query($sql) === TRUE) {
header('Location: ' . $_SERVER['HTTP_REFERER']);
}
?>
