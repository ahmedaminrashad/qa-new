<?php session_start(); ?>
<?php
  include("../includes/session1.php");
  require ("../includes/dbconnection.php");  
?>
<?php
$t_id =$_REQUEST['pT'];
	$sql = "DELETE FROM test_results WHERE test_id = '$t_id'";  		
	if ($conn->query($sql) === TRUE) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
?>