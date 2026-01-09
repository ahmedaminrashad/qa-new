<?php
  require ('../includes/dbconnection.php');
		$ptzname =$_REQUEST['tzname'];
		$ptzdiff =$_REQUEST['tzdiff'];
		$ptzphp =$_REQUEST['tzphp'];
		$ptzid =$_REQUEST['tzid'];
		$s_timee =$_REQUEST['tcid'];

		
$sql = "UPDATE time_zone SET timezone_diff = '$ptzdiff', timezone_name = '$ptzname', php_tz = '$ptzphp' where tz_id = '$ptzid'"; 
if ($conn->query($sql) === TRUE) {
							 header("Location: save-timezone-student?tz_name=$ptzname&tz_id=$ptzid&tz_diff=$ptzdiff&tz_php=$ptzphp&c_id=$s_timee");
							 }

?>