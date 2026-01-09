<?php session_start(); ?>
<?php
include("../includes/session1.php");
require ("../includes/dbconnection.php");
date_default_timezone_set("Africa/Cairo");
$sy11 = date('Y-m-d');
$rid =$_REQUEST['r_id'];
$cid =$_REQUEST['csrid'];
			$sql =  "UPDATE new_request SET csr_id = '$cid', status = '7' where request_id = '$rid'";
			if ($conn->query($sql) === TRUE) {
			$sql = "SELECT * FROM csr_performance Where csr_id = '$cid' AND req_id = '$rid' AND status = '1'");
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			header('Location: ' . $_SERVER['HTTP_REFERER']);
			}
		elseif ($numberOfRows > 0) 
			{
header('Location: ' . $_SERVER['HTTP_REFERER']);
}
}
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
