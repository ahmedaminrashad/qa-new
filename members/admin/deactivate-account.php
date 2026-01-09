<?php

  require ("../includes/dbconnection.php");  
$time_start = date("h:i:s A", time());
?>
<?php
$data_date1 = date('Y-m-d', time());
	$pid =$_REQUEST['t_id'];
	$adate =$_REQUEST['date'];

	$sql = "UPDATE account SET active = '3', dept_id = '1003', deactivation_date = '$adate' WHERE parent_id = '$pid'";  	
if ($conn->query($sql) === TRUE) {
echo '';
}
	$sql = "UPDATE course SET nature = '2', Teacher = '0', active = '7' WHERE parent_id = '$pid'";  	
 	if ($conn->query($sql) === TRUE) {
echo '';
}
	$sql = "DELETE FROM sched WHERE parent_id = '$pid'";
	if ($conn->query($sql) === TRUE) {
echo '';
}
	$sql = "DELETE FROM class_history WHERE parent_id = '$pid' AND date_admin >= '$data_date1' AND monitor_id = '1'";
	if ($conn->query($sql) === TRUE) {
header('Location: email-general?pid='.$pid.'&type=email-deactivation-account-temp');
}
	
	
	//header('Location: ' . $_SERVER['HTTP_REFERER']);

?>