<?php
  require ("../includes/dbconnection.php");
//$date = date('Y-m-d', time());
//$day = date('N', time());
$teacher =$_REQUEST['teacher'];
  $date =$_REQUEST['date'];
  $day =$_REQUEST['day'];
  $des =$_REQUEST['msg'];
$sql = "UPDATE class_history SET monitor_id = '21', lesson_discription = '$des' WHERE status < 19 AND monitor_id = 1 AND date_admin = '$date' AND teacher_id IN ($teacher)" or die(mysql_error());
if ($conn->query($sql) === TRUE) {
header('Location: admin-home');
}

?>