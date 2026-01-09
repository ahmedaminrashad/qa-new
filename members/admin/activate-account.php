<?php
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  require ("../includes/smsGateway.php");  
$time_start = date("h:i:s A", time(true));
?>
<?php
	$pid =$_REQUEST['t_id'];
	$apman =$_REQUEST['name'];

	$sql = "UPDATE account SET active = '1', dept_id = '1002' WHERE parent_id = '$pid'";  	
if ($conn->query($sql) === TRUE) {
	$sql = "UPDATE course SET nature = '1', Teacher = '1' WHERE parent_id = '$pid'";
if ($conn->query($sql) === TRUE) {
	header('Location: email-general?pid='.$pid.'&type=email-activated-account-temp');
}	
	}  
?>