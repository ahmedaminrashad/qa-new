<?
$teacher=$_REQUEST['pteacher'];
$date1=$_REQUEST['date1'];
$date2=$_REQUEST['date2'];
$type=$_REQUEST['type'];
if ($type == 1){
header('Location: teacher-class-anylasis-student?&teacher='.$teacher.'&date1='.$date1.'&date2='.$date2.'');
}
else {
header('Location: teacher-class-anylasis-date?&teacher='.$teacher.'&date1='.$date1.'&date2='.$date2.'');
}
?>
