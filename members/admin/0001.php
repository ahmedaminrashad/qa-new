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
$start_time = $row['start_time_S'];
$end_time = $row['end_time_S'];
$day = $row['sday_id'];
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

$Sdiff = $local_offset - $user_offset;
$Adiff = $admin_offset - $user_offset;


$stud_startTime = date('H:i:s',strtotime($start_time));
$tech_startTime = date('H:i:s',strtotime($Sdiff. 'minutes',strtotime($start_time)));
$admin_startTime = date('H:i:s',strtotime($Adiff. 'minutes',strtotime($start_time)));
$stud_startEnd = date('H:i:s',strtotime($end_time));
$tech_startEnd = date('H:i:s',strtotime($Sdiff. 'minutes',strtotime($end_time)));
$admin_startEnd = date('H:i:s',strtotime($Adiff. 'minutes',strtotime($end_time)));
if ($Sdiff < 0 && $tech_startTime > $stud_startTime) {$a = $day-1; if ($a == 0) {$teacherDay = 7;} else {$teacherDay = $a;}}
if ($Sdiff > 0 && $tech_startTime < $stud_startTime) {$a = $day+1; if ($a == 8) {$teacherDay = 1;} else {$teacherDay = $a;}}
if ($Sdiff < 0 && $tech_startTime < $stud_startTime) {$teacherDay = $day;}
if ($Sdiff > 0 && $tech_startTime > $stud_startTime) {$teacherDay = $day;}
if ($Sdiff == 0) {$teacherDay = $day;}


if ($Adiff < 0 && $admin_startTime > $stud_startTime) {$a = $day-1; if ($a == 0) {$adminDay = 7;} else {$adminDay = $a;}}
if ($Adiff > 0 && $admin_startTime < $stud_startTime) {$a = $day+1; if ($a == 8) {$adminDay = 1;} else {$adminDay = $a;}}
if ($Adiff < 0 && $admin_startTime < $stud_startTime) {$adminDay = $day;}
if ($Adiff > 0 && $admin_startTime > $stud_startTime) {$adminDay = $day;}
if ($Adiff == 0) {$adminDay = $day;}



$sql = "UPDATE sched SET time_start = '$tech_startTime', time_end = '$tech_startEnd', day_id = '$teacherDay', start_time_A = '$admin_startTime', end_time_A = '$admin_startEnd', aday_id = '$adminDay' WHERE sched_id = '$schedid'";
if ($conn->query($sql) === TRUE) {
        echo '';
    } else {
        echo 'error';
    }
}
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>