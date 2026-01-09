<?php
  require ("../includes/dbconnection.php");  

$date = date('Y-m-d', time());
?>
<?php
	$history =$_REQUEST['history_id'];
	$sql = "UPDATE class_history SET monitor_id = '7' WHERE monitor_id = '1' AND date_admin = '$date'";  
	if ($conn->query($sql) === TRUE) {
	header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
	
?>