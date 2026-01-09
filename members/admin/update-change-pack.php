<?php

  require ("../includes/dbconnection.php");
$data_date1 = date('Y-m-d', time()); 
$nod =$_REQUEST['txtnod'];
$cid =$_REQUEST['courseID'];
$cur_id =$_REQUEST['cur'];
$sql = "SELECT * FROM fee_package Where package_id = '$nod'";
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$tnumberOfRows = MYSQL_NUMROWS($result);
If ($tnumberOfRows == 0){
			echo '';
			}
		else if ($tnumberOfRows > 0) 
			{
			$i=0;
			while ($i<$tnumberOfRows)
				{			
					$pac_id = MYSQL_RESULT($result,$i,"package_id");
					$pac_name = MYSQL_RESULT($result,$i,"package_name");
					$pac_classes = MYSQL_RESULT($result,$i,"package_classes");
					$pac_usd = MYSQL_RESULT($result,$i,"fee_usd");
					$pac_gbp = MYSQL_RESULT($result,$i,"fee_gbp");
					$pac_aud = MYSQL_RESULT($result,$i,"fee_aud");
					$pac_pkr = MYSQL_RESULT($result,$i,"fee_pkr");
					if ($cur_id == 1){ $ufee = $pac_usd;}
					elseif ($cur_id == 2){ $ufee = $pac_gbp;}
					elseif ($cur_id == 3){ $ufee = $pac_aud;}
					elseif ($cur_id == 4){ $ufee = $pac_pkr;}
	$i++;	 
			}
			}
$sql = "UPDATE course SET Fee = '$ufee', Number_of_Days = '$nod' WHERE course_id = '$cid'";
if ($conn->query($sql) === TRUE) {
echo '';
}
$sql = "DELETE FROM sched WHERE course_id = '$cid'";
if ($conn->query($sql) === TRUE) {
echo '';
}
$sql = "DELETE FROM class_history WHERE course_id = '$pid' AND date_admin >= '$data_date1' AND monitor_id = '1'";
	if ($conn->query($sql) === TRUE) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

?>
