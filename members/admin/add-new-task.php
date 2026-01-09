<?php session_start(); ?>
<?php
include("../includes/session1.php");
require ("../includes/dbconnection.php");
require ("../includes/smsGateway.php");

$apid =$_REQUEST['p_id'];
$adate =$_REQUEST['time'];
$apman =$_REQUEST['techid'];
$acom =$_REQUEST['comment'];
$sstu =$_REQUEST['stu'];
$spid =$_REQUEST['ppid'];

			$sql = "INSERT INTO task (parent_name, task_date, manager, task_des, type_id, parent_id)
					VALUES('$apid','$adate','$apman','$acom','$sstu','$spid')"; 							
 		header('Location: ' . $_SERVER['HTTP_REFERER']);
?>