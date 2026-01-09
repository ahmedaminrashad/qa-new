<?php
require ("../includes/dbconnection.php");
$data_date1 = date('Y-m-d', time());
			$sid = $_REQUEST['sub'];
		 	$pid= $_REQUEST['pid'];
		 	$extra= $_REQUEST['extra'];
		 	$hoursS= $_REQUEST['hoursS'];
		 	$subD= $_REQUEST['stdata'];
			$sql = "UPDATE subscription SET added = '$extra', hours = '$hoursS', value = '1', date = '$subD' WHERE sub_id = '$sid'";
			if ($conn->query($sql) === TRUE) {
echo '';
}
			$sql = "UPDATE account SET active = '1' WHERE parent_id = '$pid'";
			if ($conn->query($sql) === TRUE) {
echo '';
}
	
	$sql = "UPDATE course SET active = 1 WHERE parent_id = '$pid'";
	if ($conn->query($sql) === TRUE) {
echo '';
}
	
	$sql = "UPDATE sched SET status = 1 WHERE parent_id = '$pid'";
	if ($conn->query($sql) === TRUE) {
echo '';
}
	
//	$sql = "UPDATE class_history SET status = '1', value = '1' WHERE parent_id = '$pid' AND date_admin >= '$data_date1' AND `monitor_id` NOT IN (9,4,6,21)";
	$sql = "UPDATE class_history SET status = '1' WHERE parent_id = '$pid' AND date_admin >= '$data_date1'";
	if ($conn->query($sql) === TRUE) {
echo '';
}
	$sql = "UPDATE class_history SET value = '1' WHERE parent_id = '$pid' AND value = '2' AND re_status != '2' AND date_admin >= '$subD' AND date_admin <= '$data_date1'";
	if ($conn->query($sql) === TRUE) {
echo '';
}
$sql = "SELECT MAX(d) AS ddi FROM invoice Where parent_id = '$pid' AND status = 1";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$did = $row["ddi"];
	
	//$sql = "DELETE FROM invoice WHERE parent_id = '$pid' AND status = 1 AND d = '$did'";
	//$sql = "DELETE FROM subscription Where parent_id = '$pid' AND status = 1 AND date = '0000-00-00'";
	$sql = "SELECT * FROM subscription WHERE parent_id = '$pid' AND status = 1 AND d = (SELECT MAX(d) FROM subscription Where parent_id = '$pid' AND status = 1)";
	$result2 = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result2);
$h_hours = $row['hours'];
$h_id = $row['sub_id'];
$T_HR = $h_hours-$extra;
$sql = "UPDATE subscription SET hours = '$T_HR', last_added = '$extra' WHERE sub_id = '$h_id'";
if ($conn->query($sql) === TRUE) {
					header('Location: ' . $_SERVER['HTTP_REFERER']);
					}
?>
