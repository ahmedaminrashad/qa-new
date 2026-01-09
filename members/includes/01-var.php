<?php
include("dbconnection.php");
include("main-var.php");
date_default_timezone_set($TimeZoneCustome);
$sql = "SELECT * FROM settings_email WHERE id = 1";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){			
					$sched = $row['id'];
					$ins_id= $row['ins_id'];
					$client_id= $row['client_id'];
					$sec= $row['sec'];
					$admin= $row['admin'];
			}
			}
$INS_ID = $ins_id;
$CL_ID = $client_id;
$SEC = $sec;
$admin = $admin;
$site = 'http://api.whatsmate.net/v3/whatsapp/group/text/message/' . $INS_ID;
?>