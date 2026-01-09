<?php
  require ('../includes/dbconnection.php');
		$ptzname =$_REQUEST['tz_name'];
		$ptzdiff =$_REQUEST['tz_diff'];
		$ptzphp =$_REQUEST['tz_php'];
		$ptzid =$_REQUEST['tz_id'];
		$pcid =$_REQUEST['c_id'];

		$sql = "UPDATE course SET timezone = '$ptzdiff', time_name = '$ptzname', php_tz = '$ptzphp' where tz_id = '$ptzid'"; 
							 if ($conn->query($sql) === TRUE) {
							 header("Location: list-of-country-timezone?con=$pcid");
							 }

?>