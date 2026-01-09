<?php
require ("../includes/dbconnection.php");
$famID=$_POST['famID'];
$sql = "SELECT `sched`.*,`course`.`course_yrSec`,`profile`.`teacher_name` FROM `sched`,`course`,`profile` WHERE sched.course_id=course.course_id and sched.teacher_id=profile.teacher_id HAVING sched_id = '$famID'";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){			
					$sched = $row['sched_id'];
					$stud_id = $row['course_id'];
					$tech_id = $row['teacher_id'];
					$hidden_pcourse = $row['course_yrSec'];
					$hidden_pt = $row['teacher_name'];
					$hidden_pday = $row['day_id'];
					$tt1 = $row['time_start'];
					$tt2 = $row['time_end'];
					$trial = $row['status'];
			}
			}
		
		 	$teacherid= $_POST['teacherID'];
			$student_name= $_POST['studentID'];
			$start_time = $_POST['STime'];
			$end_time = $_POST['ETime'];
			$day = $_POST['day'];

$sql = "SELECT * FROM course WHERE course_id = $student_name";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){			
					$SID = $row['course_id'];
					$dept = $row['dept_id'];
					$PID = $row['parent_id'];
					$tzy_stud = $row['timezone'];
					$teacher_name = $row['Teacher'];
					$tzy_stud = $row['php_tz'];
					$stu_status = $row['active'];
					$adept = $row['adept_id'];
		
	} 
			}

$sql = "SELECT * FROM profile WHERE teacher_id = $teacher_name";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){			
					$tzy_tech = $row['time'];
		
	}	 
			}

$local_tz = new DateTimeZone($tzy_tech);
$local = new DateTime('now', $local_tz);

$user_tz = new DateTimeZone($tzy_stud);
$user = new DateTime('now', $user_tz);

$admin_tz = new DateTimeZone('Africa/Cairo');
$admin = new DateTime('now', $admin_tz);

$local_offset = $local->getOffset() / 3600;
$user_offset = $user->getOffset() / 3600;
$admin_offset = $admin->getOffset() / 3600;

$Sdiff = $user_offset - $local_offset;
$Adiff = $admin_offset - $local_offset;


$tech_startTime = date('H:i:s',strtotime($start_time));
$stud_startTime = date('H:i:s',strtotime($Sdiff. 'hour',strtotime($start_time)));
$admin_startTime = date('H:i:s',strtotime($Adiff. 'hour',strtotime($start_time)));
$tech_startEnd = date('H:i:s',strtotime($end_time));
$stud_startEnd = date('H:i:s',strtotime($Sdiff. 'hour',strtotime($end_time)));
$admin_startEnd = date('H:i:s',strtotime($Adiff. 'hour',strtotime($end_time)));
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


if ($tech_startEnd == '00:00:00') { $TTE = '23:59:59';}
else { $TTE = $tech_startEnd;}
$startTime1 = new DateTime($tech_startTime);
$endTime1 = new DateTime($TTE);
$duration = $startTime1->diff($endTime1); //$duration is a DateInterval object
$atdif = $duration->format("%H:%I:%S");
$sql = "UPDATE sched SET day_id = '$day', sday_id = '$studentDay', aday_id = '$adminDay', time_start = '$tech_startTime', time_end = '$TTE', start_time_S = '$stud_startTime', end_time_S = '$stud_startEnd', start_time_A = '$admin_startTime', end_time_A = '$admin_startEnd', duration = '$atdif' WHERE sched_id = '$famID'"; 
if ($conn->query($sql) === TRUE) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        echo 'error';
    }
?>