<?php session_start(); ?>
<?php
  include("../includes/session1.php");
  require ("../includes/dbconnection.php");  
?>
<?php
$dept_id =$_REQUEST['ddd'];
	$sql = "DELETE FROM book_time WHERE book_id = '$dept_id'";  		
	if ($conn->query($sql) === TRUE) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
?>