<?php
  require ("../includes/dbconnection.php");
$date = date('Y-m-d', time());
$sql = "SELECT * FROM `public_holidays` WHERE pb_id = '1'";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){
					$sdate = $row['start_date'];
					$edate = $row['end_date'];
					$status = $row['status'];
					$des = $row['details'];
	
			  		if ($date >= $sdate AND $date <= $edate AND $status == 2){
			
sql = "UPDATE class_history SET monitor_id = '21', lesson_discription = '$des' WHERE date_admin = '$date' AND monitor_id = '1'";
if ($conn->query($sql) === TRUE) {
echo '';
}
}
else { exit; }
}
}
    ?>