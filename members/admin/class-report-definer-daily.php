<?
$teacher=$_REQUEST['pteacher'];
$date1=$_REQUEST['date1'];
$date2=$_REQUEST['date2'];
if ($teacher == 'all'){
header('Location: teacher-daily-anylasis-all?date1='.$date1.'&date2='.$date2.'');
}
else {
header('Location: teacher-daily-anylasis-manager?&teacher='.$teacher.'&date1='.$date1.'&date2='.$date2.'');
}
?>
