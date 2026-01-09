<?php
  require ("../includes/dbconnection.php");  
date_default_timezone_set($TimeZoneCustome);
$time_start = date(" g:i:A", time(true));
$date = date('Y-m-d', time());
?>
<?php
	$pid =$_REQUEST['py_id'];
	$oid =$_REQUEST['order_number'];
	if (!empty($pid)){
	$sql = "UPDATE invoice SET status = '2', order_num = '$oid', submit = '$date', d = now() WHERE py_id IN ($pid)"; 
	if ($conn->query($sql) === TRUE) {
	echo'';
	}
	$sql = "UPDATE subscription SET status = '2', date = '$date', d = now() WHERE py_id IN ($pid)";
	if ($conn->query($sql) === TRUE) {
	echo'';
	}
	$sql = "SELECT parent_id FROM invoice where py_id IN ($pid)";
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
	echo'';
	}
	$sql = "UPDATE course SET active = 1 WHERE parent_id = $pid1";
	if ($conn->query($sql) === TRUE) {
	echo'';
	}
	$sql = "UPDATE sched SET status = 1 WHERE parent_id = $pid1";
	if ($conn->query($sql) === TRUE) {
	echo'';
	}
	$sql = "UPDATE class_history SET status = '1', value = '1' WHERE parent_id = '$pid1' AND date_admin >= '$date' AND `monitor_id` NOT IN (9,4,6,21)";
	if ($conn->query($sql) === TRUE) {
	echo'';
	}
	header("Location: payment-done");
	}
	else {
	  header("Location: payment-done");  
	}
?>