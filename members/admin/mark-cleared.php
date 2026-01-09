<?php
 require ("../includes/dbconnection.php");
  $ent_id =$_REQUEST['ent_id'];
  $sql = "UPDATE account_entry SET status = '2' WHERE entry_id = '$ent_id'";
					if ($conn->query($sql) === TRUE) {
	header('Location: ' . $_SERVER['HTTP_REFERER']);
	 }
	
?>