<?php
require ("../includes/dbconnection.php");
$sql2="SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(`duration`))) AS total FROM class_history WHERE teacher_id = '1' AND re_status != 2 AND date_teacher >= '2020-11-01' AND date_teacher <= '2020-11-24' AND (monitor_id = 4 OR monitor_id = 9 OR monitor_id = 6 OR monitor_id = 21)";
$res2 = mysqli_query($conn, $sql2);
$totalRow = mysqli_fetch_array($res2);
$total = $totalRow['total'];
$hours=$total;
echo $hours;
?>
