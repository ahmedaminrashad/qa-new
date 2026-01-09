<?php
  require ("../includes/dbconnection.php");  
?>
<?php
$req_id =$_REQUEST['p_id'];
	$sql = "DELETE FROM account WHERE parent_id = '$req_id'";
	$sql = "DELETE FROM course WHERE parent_id = '$req_id'";
	$sql = "DELETE FROM sched WHERE parent_id = '$req_id'";
	$sql = "DELETE FROM invoice WHERE parent_id = '$req_id'";
	$sql = "DELETE FROM class_history WHERE parent_id = '$req_id'";
	if ($conn->query($sql) === TRUE) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
?>