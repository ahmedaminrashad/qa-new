<?php session_start(); ?>
<?php
include("../includes/session1.php");
require ("../includes/dbconnection.php");
$rid =$_REQUEST['r_id'];
$cid =$_REQUEST['csrid'];
			$sql = "UPDATE new_request SET csr_id = '$cid' where request_id = '$rid'"; 
			if ($conn->query($sql) === TRUE) {
					header('Location: ' . $_SERVER['HTTP_REFERER']);
					}
?>
