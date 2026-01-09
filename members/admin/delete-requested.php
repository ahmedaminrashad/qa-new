<?php
  require ("../includes/dbconnection.php");  
?>
<?php
$req_id =$_REQUEST['req'];
	$sql = "DELETE FROM requested_schedule WHERE requested_id = '$req_id'";
	if ($conn->query($sql) === TRUE) {
	    echo'';
	}
	$sql = "DELETE FROM schedule_approval WHERE requested_id = '$req_id'"; 
	if ($conn->query($sql) === TRUE) {
	header('Location: list-of-requested-schedule');
	}
?>