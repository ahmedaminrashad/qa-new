<?php

  require ("../includes/dbconnection.php"); 
  
$pid =$_REQUEST['spid']; 
$con_id =$_REQUEST['scon'];
$man_id =$_REQUEST['sman'];
$time_id =$_REQUEST['stimezone'];
$date_id =$_REQUEST['date'];
$active_id =$_REQUEST['act'];
$skype_id =$_REQUEST['skypes'];
$link =$_REQUEST['link'];

$sql = "SELECT * FROM time_zone WHERE tz_id = $time_id";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){
			$tzy_parent = $sched = $row['timezone_diff'];
			$tzname_tech = $sched = $row['timezone_name'];
			$tzname_php = $sched = $row['php_tz'];
				}
				}

$sql = "UPDATE course SET c_id = '$con_id', m_id = '$man_id', tz_id = '$time_id', timezone = '$tzy_parent', time_name = '$tzname_tech', php_tz = '$tzname_php', date = '$date_id', active = '$active_id' WHERE parent_id = '$pid'";  	
if ($conn->query($sql) === TRUE) {
echo '';
}
	header("Location: ".$link."");

?>
