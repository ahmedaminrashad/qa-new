<?php
if ($_REQUEST['checkbox1'] == 1){
require ("../includes/dbconnection.php");
            $teacherid= $_REQUEST['teacherID'];
			$student_name= $_REQUEST['studentID'];
			$start_time = $_REQUEST['STime'];
			$end_time = $_REQUEST['ETime'];
			$day = 1;

$sql = "SELECT * FROM course WHERE course_id = '$student_name'";
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
					//$tzy_stud = $row['timezone'];
					$teacher_name = $row['Teacher'];
					$tzy_stud = $row['php_tz'];
					$stu_status = $row['active'];
					$adept = $row['adept_id'];
		
			}
			}

$sql = "SELECT * FROM profile WHERE teacher_id = '$teacherid'";
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


$sql = "INSERT INTO sched(course_id, teacher_id, day_id, sday_id, aday_id, parent_id, dept_id, adept_id, php_tz, status, time_start, time_end, start_time_S, end_time_S, start_time_A, end_time_A, duration)
					VALUES('$SID','$teacherid','$day','$studentDay','$adminDay','$PID','$dept','$adept', '$tzy_stud', '$stu_status', '$tech_startTime', '$TTE', '$stud_startTime', '$stud_startEnd', '$admin_startTime', '$admin_startEnd', '$atdif')";
	if ($conn->query($sql) === TRUE) {
	echo '';
	}
	}  

if ($_REQUEST['checkbox2'] == 2){
require ("../includes/dbconnection.php");
	
            $teacherid= $_REQUEST['teacherID'];
			$student_name= $_REQUEST['studentID'];
			$start_time = $_REQUEST['STime'];
			$end_time = $_REQUEST['ETime'];
			$day = 2;

$sql = "SELECT * FROM course WHERE course_id = '$student_name'";
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
					//$tzy_stud = $row['timezone'];
					$teacher_name = $row['Teacher'];
					$tzy_stud = $row['php_tz'];
					$stu_status = $row['active'];
					$adept = $row['adept_id'];
		
			}
			}

$sql = "SELECT * FROM profile WHERE teacher_id = '$teacherid'";
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


$sql = "INSERT INTO sched(course_id, teacher_id, day_id, sday_id, aday_id, parent_id, dept_id, adept_id, php_tz, status, time_start, time_end, start_time_S, end_time_S, start_time_A, end_time_A, duration)
					VALUES('$SID','$teacherid','$day','$studentDay','$adminDay','$PID','$dept','$adept', '$tzy_stud', '$stu_status', '$tech_startTime', '$TTE', '$stud_startTime', '$stud_startEnd', '$admin_startTime', '$admin_startEnd', '$atdif')";
	if ($conn->query($sql) === TRUE) {
	echo '';
	}
	}  

if ($_REQUEST['checkbox3'] == 3){
require ("../includes/dbconnection.php");
            $teacherid= $_REQUEST['teacherID'];
			$student_name= $_REQUEST['studentID'];
			$start_time = $_REQUEST['STime'];
			$end_time = $_REQUEST['ETime'];
			$day = 3;

$sql = "SELECT * FROM course WHERE course_id = '$student_name'";
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
					//$tzy_stud = $row['timezone'];
					$teacher_name = $row['Teacher'];
					$tzy_stud = $row['php_tz'];
					$stu_status = $row['active'];
					$adept = $row['adept_id'];
		
			}
			}

$sql = "SELECT * FROM profile WHERE teacher_id = '$teacherid'";
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


$sql = "INSERT INTO sched(course_id, teacher_id, day_id, sday_id, aday_id, parent_id, dept_id, adept_id, php_tz, status, time_start, time_end, start_time_S, end_time_S, start_time_A, end_time_A, duration)
					VALUES('$SID','$teacherid','$day','$studentDay','$adminDay','$PID','$dept','$adept', '$tzy_stud', '$stu_status', '$tech_startTime', '$TTE', '$stud_startTime', '$stud_startEnd', '$admin_startTime', '$admin_startEnd', '$atdif')";
	if ($conn->query($sql) === TRUE) {
	echo '';
	}
	}  
	
if ($_REQUEST['checkbox4'] == 4){
require ("../includes/dbconnection.php");
            $teacherid= $_REQUEST['teacherID'];
			$student_name= $_REQUEST['studentID'];
			$start_time = $_REQUEST['STime'];
			$end_time = $_REQUEST['ETime'];
			$day = 4;

$sql = "SELECT * FROM course WHERE course_id = '$student_name'";
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
					//$tzy_stud = $row['timezone'];
					$teacher_name = $row['Teacher'];
					$tzy_stud = $row['php_tz'];
					$stu_status = $row['active'];
					$adept = $row['adept_id'];
		
			}
			}

$sql = "SELECT * FROM profile WHERE teacher_id = '$teacherid'";
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


$sql = "INSERT INTO sched(course_id, teacher_id, day_id, sday_id, aday_id, parent_id, dept_id, adept_id, php_tz, status, time_start, time_end, start_time_S, end_time_S, start_time_A, end_time_A, duration)
					VALUES('$SID','$teacherid','$day','$studentDay','$adminDay','$PID','$dept','$adept', '$tzy_stud', '$stu_status', '$tech_startTime', '$TTE', '$stud_startTime', '$stud_startEnd', '$admin_startTime', '$admin_startEnd', '$atdif')";
	if ($conn->query($sql) === TRUE) {
	echo '';
	}
	}  
if ($_REQUEST['checkbox5'] == 5){
require ("../includes/dbconnection.php");
$teacherid= $_REQUEST['teacherID'];
			$student_name= $_REQUEST['studentID'];
			$start_time = $_REQUEST['STime'];
			$end_time = $_REQUEST['ETime'];
			$day = 5;

$sql = "SELECT * FROM course WHERE course_id = '$student_name'";
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
					//$tzy_stud = $row['timezone'];
					$teacher_name = $row['Teacher'];
					$tzy_stud = $row['php_tz'];
					$stu_status = $row['active'];
					$adept = $row['adept_id'];
		
			}
			}

$sql = "SELECT * FROM profile WHERE teacher_id = '$teacherid'";
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


$sql = "INSERT INTO sched(course_id, teacher_id, day_id, sday_id, aday_id, parent_id, dept_id, adept_id, php_tz, status, time_start, time_end, start_time_S, end_time_S, start_time_A, end_time_A, duration)
					VALUES('$SID','$teacherid','$day','$studentDay','$adminDay','$PID','$dept','$adept', '$tzy_stud', '$stu_status', '$tech_startTime', '$TTE', '$stud_startTime', '$stud_startEnd', '$admin_startTime', '$admin_startEnd', '$atdif')";
	if ($conn->query($sql) === TRUE) {
	echo '';
	}
	}  

if ($_REQUEST['checkbox6'] == 6){
require ("../includes/dbconnection.php");
            $teacherid= $_REQUEST['teacherID'];
			$student_name= $_REQUEST['studentID'];
			$start_time = $_REQUEST['STime'];
			$end_time = $_REQUEST['ETime'];
			$day = 6;

$sql = "SELECT * FROM course WHERE course_id = '$student_name'";
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
					//$tzy_stud = $row['timezone'];
					$teacher_name = $row['Teacher'];
					$tzy_stud = $row['php_tz'];
					$stu_status = $row['active'];
					$adept = $row['adept_id'];
		
			}
			}

$sql = "SELECT * FROM profile WHERE teacher_id = '$teacherid'";
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


$sql = "INSERT INTO sched(course_id, teacher_id, day_id, sday_id, aday_id, parent_id, dept_id, adept_id, php_tz, status, time_start, time_end, start_time_S, end_time_S, start_time_A, end_time_A, duration)
					VALUES('$SID','$teacherid','$day','$studentDay','$adminDay','$PID','$dept','$adept', '$tzy_stud', '$stu_status', '$tech_startTime', '$TTE', '$stud_startTime', '$stud_startEnd', '$admin_startTime', '$admin_startEnd', '$atdif')";
	if ($conn->query($sql) === TRUE) {
	echo '';
	}
	}  
if ($_REQUEST['checkbox7'] == 7){
require ("../includes/dbconnection.php");
            $teacherid= $_REQUEST['teacherID'];
			$student_name= $_REQUEST['studentID'];
			$start_time = $_REQUEST['STime'];
			$end_time = $_REQUEST['ETime'];
			$day = 7;

$sql = "SELECT * FROM course WHERE course_id = '$student_name'";
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
					//$tzy_stud = $row['timezone'];
					$teacher_name = $row['Teacher'];
					$tzy_stud = $row['php_tz'];
					$stu_status = $row['active'];
					$adept = $row['adept_id'];
		
			}
			}

$sql = "SELECT * FROM profile WHERE teacher_id = '$teacherid'";
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


$sql = "INSERT INTO sched(course_id, teacher_id, day_id, sday_id, aday_id, parent_id, dept_id, adept_id, php_tz, status, time_start, time_end, start_time_S, end_time_S, start_time_A, end_time_A, duration)
					VALUES('$SID','$teacherid','$day','$studentDay','$adminDay','$PID','$dept','$adept', '$tzy_stud', '$stu_status', '$tech_startTime', '$TTE', '$stud_startTime', '$stud_startEnd', '$admin_startTime', '$admin_startEnd', '$atdif')";
	if ($conn->query($sql) === TRUE) {
	echo '';
	}
	}  
	$teacherid= $_REQUEST['teacherID'];
			$student_name= $_REQUEST['studentID'];
			$sql = "UPDATE course SET Teacher = '$teacherid' WHERE course_id = '$student_name'";
			if ($conn->query($sql) === TRUE) {
header('Location: send-schedule?reqid='.$_REQUEST["reqid"].'&StudentName='.$_REQUEST["StudentName"].'&TeacherGroup='.$_REQUEST["group"].'&STime='.$_REQUEST["STime"].'&ETime='.$_REQUEST["ETime"].'&checkbox1='.$_REQUEST["checkbox1"].'&checkbox2='.$_REQUEST["checkbox2"].'&checkbox3='.$_REQUEST["checkbox3"].'&checkbox4='.$_REQUEST["checkbox4"].'&checkbox5='.$_REQUEST["checkbox5"].'&checkbox6='.$_REQUEST["checkbox6"].'&checkbox7='.$_REQUEST["checkbox7"].'');
}
?>