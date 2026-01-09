<?php session_start(); ?>
<?php
include("../includes/session1.php");
require ("../includes/dbconnection.php");
$ft =$_REQUEST['t_id'];
$fa =$_REQUEST['amount'];
$fdes =$_REQUEST['des'];
$fd =$_REQUEST['date'];
$fty =$_REQUEST['type'];
			$sql = "INSERT INTO teacher_fine (teacher_id, date, amount, des, type)
					VALUES('$ft', '$fd', '$fa', '$fdes', '$fty')"; 
					if ($conn->query($sql) === TRUE) {
					header('Location: ' . $_SERVER['HTTP_REFERER']);
					}
?>
