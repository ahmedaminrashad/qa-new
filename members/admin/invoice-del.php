<?php session_start(); ?>
<?php
  include("../includes/session1.php");
  require ("../includes/dbconnection.php");  
$pd =$_REQUEST['pidt'];
	$sql = "DELETE FROM invoice where py_id = '$pd'";  	
	if ($conn->query($sql) === TRUE) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        echo 'error';
    }
?>