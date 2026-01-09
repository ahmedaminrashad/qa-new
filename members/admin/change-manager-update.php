<?php session_start(); ?>
<?php
include("../includes/session1.php");
require ("../includes/dbconnection.php");
date_default_timezone_set("Africa/Cairo");
$sy11 = date('Y-m-d');
$man =$_REQUEST['man'];
$tech =$_REQUEST['tech'];
			$sql = "UPDATE profile SET manager_id = '$man' where teacher_id = '$tech'";
			if ($conn->query($sql) === TRUE) {
header('Location: ' . $_SERVER['HTTP_REFERER']);
}
?>
