<?php
$date_check = date('Y-m-d', time());
$teacher =$_REQUEST['pteacher'];
$date1 =$_REQUEST['date1'];
$date2 =$_REQUEST['date2'];
$type =$_REQUEST['type'];
if ($type == 1)
{
header('Location: student-list-all?pteacher='.$teacher.'');
}
elseif ($type == 2)
{
header('Location: student-list-date?pteacher='.$teacher.'&date1='.$date1.'&date2='.$date2.'');
}
?>