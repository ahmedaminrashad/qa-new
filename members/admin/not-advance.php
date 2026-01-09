<?php
  require ("../includes/dbconnection.php");
  $o_id =$_REQUEST['original_id'];
  $h_id =$_REQUEST['his_id'];  
$sql = "UPDATE class_history SET monitor_id = 1, status = 1 WHERE history_id = '$o_id'";
$sql = "DELETE FROM class_resched WHERE history_id = '$h_id'";
if ($conn->query($sql) === TRUE) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        echo 'error';
    }
?>