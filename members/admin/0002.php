<?php
require ("../includes/dbconnection.php");
$student_name= $_GET['studentID'];
$sql = "SELECT * FROM `sched` WHERE course_id = $student_name";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result))
{
$schedid= $row['sched_id'];
$teacherid= $row['teacher_id'];
$student_name= $row['course_id'];
$start_time = $row['time_start'];
$end_time = $row['time_end'];
$day = $row['day_id'];
$tzy_stud = $row['php_tz'];
require ("../includes/dbconnection.php");
$sql = "SELECT * FROM profile WHERE teacher_id = '$teacherid'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$tzy_tech = $row['time'];


$local_tz = new DateTimeZone($tzy_tech);
$local = new DateTime('now', $local_tz);

$user_tz = new DateTimeZone($tzy_stud);
$user = new DateTime('now', $user_tz);

$admin_tz = new DateTimeZone('Africa/Cairo');
$admin = new DateTime('now', $admin_tz);

$local_offset = $local->getOffset() / 60;
$user_offset = $user->getOffset() / 60;
$admin_offset = $admin->getOffset() / 60;

$Sdiff = $user_offset - $local_offset;
$Adiff = $admin_offset - $local_offset;


$tech_startTime = date('H:i:s',strtotime($start_time));
$stud_startTime = date('H:i:s',strtotime($Sdiff. 'minutes',strtotime($start_time)));
$admin_startTime = date('H:i:s',strtotime($Adiff. 'minutes',strtotime($start_time)));
$tech_startEnd = date('H:i:s',strtotime($end_time));
$stud_startEnd = date('H:i:s',strtotime($Sdiff. 'minutes',strtotime($end_time)));
$admin_startEnd = date('H:i:s',strtotime($Adiff. 'minutes',strtotime($end_time)));
if ($Sdiff < 0 && $stud_startTime > $tech_startTime) {$a = $day-1; if ($a == 0) {$studentDay = 7;} else {$studentDay = $a;}}
if ($Sdiff > 0 && $stud_startTime < $tech_startTime) {$a = $day+1; if ($a == 8) {$studentDay = 1;} else {$studentDay = $a;}}
if ($Sdiff < 0 && $stud_startTime < $tech_startTime) {$studentDay = $day;}
if ($Sdiff > 0 && $stud_startTime > $tech_startTime) {$studentDay = $day;}
if ($Sdiff == 0) {$studentDay = $day;}


if ($Adiff < 0 && $admin_startTime > $tech_startTime) {$a = $day-1; if ($a == 0) {$adminDay = 7;} else {$adminDay = $a;}}
if ($Adiff > 0 && $admin_startTime < $tech_startTime) {$a = $day+1; if ($a == 8) {$adminDay = 1;} else {$adminDay = $a;}}
if ($Adiff < 0 && $admin_startTime < $tech_startTime) {$adminDay = $day;}
if ($Adiff > 0 && $admin_startTime > $tech_startTime) {$adminDay = $day;}
if ($Adiff == 0) {$adminDay = $day;}



$sql = "UPDATE sched SET start_time_S = '$stud_startTime', end_time_S = '$stud_startEnd', sday_id = '$studentDay', start_time_A = '$admin_startTime', end_time_A = '$admin_startEnd', aday_id = '$adminDay' WHERE sched_id = '$schedid'";
if ($conn->query($sql) === TRUE) {
        echo '';
    } else {
        echo 'error';
    }
}
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>