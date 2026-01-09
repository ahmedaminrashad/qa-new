<?php session_start(); ?>
<?php
  include("../includes/session1.php");
  require ("../includes/dbconnection.php");  
?>
<?php
$dept_id =$_REQUEST['pT'];
	$sql = "DELETE FROM invoice WHERE py_id = '$dept_id'";  		
	if ($conn->query($sql) === TRUE) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
?>