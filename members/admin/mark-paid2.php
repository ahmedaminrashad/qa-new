<?php
  require ("../includes/dbconnection.php");  
	$pid =$_REQUEST['py_id'];
	$note =$_REQUEST['note'];
	$date =$_REQUEST['date'];
	$sql = "UPDATE invoice SET status = '2', submit = '$date', order_num = '$note', d = now(true) WHERE py_id = '$pid'";
	if ($conn->query($sql) === TRUE) {
	echo ''; }
	$sql = "UPDATE subscription SET status = '2', date = '$date', d = now(true) WHERE py_id = '$pid'";
	if ($conn->query($sql) === TRUE) {
	echo ''; }
	$sql = "SELECT parent_id FROM invoice WHERE py_id = '$pid'";
	$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){
			$pid1 = $row['parent_id'];
			}
			}
	$sql = "UPDATE account SET active = '1' WHERE parent_id = '$pid1'";
	if ($conn->query($sql) === TRUE) {
	echo ''; }
	$sql = "UPDATE course SET active = 1 WHERE parent_id = $pid1";
	if ($conn->query($sql) === TRUE) {
	echo ''; }
	$sql = "UPDATE sched SET status = 1 WHERE parent_id = $pid1";
	if ($conn->query($sql) === TRUE) {
	echo ''; }
	$sql = "UPDATE class_history SET status = '1', value = '1' WHERE parent_id = '$pid1' AND date_admin >= '$date' AND `monitor_id` NOT IN (9,4,6,21)";
	if ($conn->query($sql) === TRUE) {
	header('Location: ' . $_SERVER['HTTP_REFERER']);
	 }
	
?>