<?
if ($_POST['checkbox1'] == 1){
require ("../includes/dbconnection.php");
$teacherid= $_POST['teacherID'];
			$student_name= $_POST['studentID'];
			$start_time = $_POST['STime'];
			$end_time = $_POST['ETime'];
			$day = 1;
			
$result = mysql_query("SELECT `sched`.*,`course`.`course_yrSec`,`profile`.`teacher_name` FROM `sched`,`course`,`profile` WHERE sched.course_id=course.course_id and sched.teacher_id=profile.teacher_id
 HAVING teacher_id='$teacherid' AND day_id='$day' AND time_start > '$start_time' AND time_start < '$end_time'
  			");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0){
			$conflict = 1;
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
				{			
					$sched = MYSQL_RESULT($result,$i,"sched_id");
					$stud_id = MYSQL_RESULT($result,$i,"course_id");
					$tech_id = MYSQL_RESULT($result,$i,"teacher_id");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$tt1 = MYSQL_RESULT($result,$i,"time_start");
					$tt2 = MYSQL_RESULT($result,$i,"time_end");
					$trial = MYSQL_RESULT($result,$i,"status");
					echo 'Sorry! there is a class of student '.$hidden_pcourse.' already scheduled during your selected time.';

	$i++;	 
			}
			}
	if ($conflict == 1){	
$teacherid= $_POST['teacherID'];
			$student_name= $_POST['studentID'];
			$start_time = $_POST['STime'];
			$end_time = $_POST['ETime'];
			$day = 1;

$result = mysql_query ("SELECT * FROM course WHERE course_id = '$student_name'")or die(mysql_error());
if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0){
			echo '';
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;			
					$SID = MYSQL_RESULT($result,$i,"course_id");
					$dept = MYSQL_RESULT($result,$i,"dept_id");
					$PID = MYSQL_RESULT($result,$i,"parent_id");
					//$tzy_stud = MYSQL_RESULT($result,$i,"timezone");
					$teacher_name = MYSQL_RESULT($result,$i,"Teacher");
					$tzy_stud = MYSQL_RESULT($result,$i,"php_tz");
					$stu_status = MYSQL_RESULT($result,$i,"active");
					$adept = MYSQL_RESULT($result,$i,"adept_id");
		
	$i++;	 
			}

$result1 = mysql_query ("SELECT * FROM profile WHERE teacher_id = '$teacherid'")or die(mysql_error());
if (!$result1) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result1);
		If ($numberOfRows == 0){
			echo '';
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;			
					$tzy_tech = MYSQL_RESULT($result1,$i,"time");
		
	$i++;	 
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


mysql_query ("INSERT INTO sched(course_id, teacher_id, day_id, sday_id, aday_id, parent_id, dept_id, adept_id, php_tz, status, time_start, time_end, start_time_S, end_time_S, start_time_A, end_time_A, duration)
					VALUES('$SID','$teacher_name','$day','$studentDay','$adminDay','$PID','$dept','$adept', '$tzy_stud', '$stu_status', '$tech_startTime', '$TTE', '$stud_startTime', '$stud_startEnd', '$admin_startTime', '$admin_startEnd', '$atdif')") or die(mysql_error());
	}  
}

if ($_POST['checkbox2'] == 2){
require ("../includes/dbconnection.php");
$teacherid= $_POST['teacherID'];
			$student_name= $_POST['studentID'];
			$start_time = $_POST['STime'];
			$end_time = $_POST['ETime'];
			$day = 2;
			
$result = mysql_query("SELECT `sched`.*,`course`.`course_yrSec`,`profile`.`teacher_name` FROM `sched`,`course`,`profile` WHERE sched.course_id=course.course_id and sched.teacher_id=profile.teacher_id
 HAVING teacher_id='$teacherid' AND day_id='$day' AND time_start > '$start_time' AND time_start < '$end_time'
  			");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0){
			$conflict = 1;
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
				{			
					$sched = MYSQL_RESULT($result,$i,"sched_id");
					$stud_id = MYSQL_RESULT($result,$i,"course_id");
					$tech_id = MYSQL_RESULT($result,$i,"teacher_id");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$tt1 = MYSQL_RESULT($result,$i,"time_start");
					$tt2 = MYSQL_RESULT($result,$i,"time_end");
					$trial = MYSQL_RESULT($result,$i,"status");
					echo 'Sorry! there is a class of student '.$hidden_pcourse.' already scheduled during your selected time.';

	$i++;	 
			}
			}
	if ($conflict == 1){	
$teacherid= $_POST['teacherID'];
			$student_name= $_POST['studentID'];
			$start_time = $_POST['STime'];
			$end_time = $_POST['ETime'];
			$day = 2;

$result = mysql_query ("SELECT * FROM course WHERE course_id = '$student_name'")or die(mysql_error());
if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0){
			echo '';
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;			
					$SID = MYSQL_RESULT($result,$i,"course_id");
					$dept = MYSQL_RESULT($result,$i,"dept_id");
					$PID = MYSQL_RESULT($result,$i,"parent_id");
					//$tzy_stud = MYSQL_RESULT($result,$i,"timezone");
					$teacher_name = MYSQL_RESULT($result,$i,"Teacher");
					$tzy_stud = MYSQL_RESULT($result,$i,"php_tz");
					$stu_status = MYSQL_RESULT($result,$i,"active");
					$adept = MYSQL_RESULT($result,$i,"adept_id");
		
	$i++;	 
			}

$result1 = mysql_query ("SELECT * FROM profile WHERE teacher_id = '$teacherid'")or die(mysql_error());
if (!$result1) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result1);
		If ($numberOfRows == 0){
			echo '';
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;			
					$tzy_tech = MYSQL_RESULT($result1,$i,"time");
		
	$i++;	 
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


mysql_query ("INSERT INTO sched(course_id, teacher_id, day_id, sday_id, aday_id, parent_id, dept_id, adept_id, php_tz, status, time_start, time_end, start_time_S, end_time_S, start_time_A, end_time_A, duration)
					VALUES('$SID','$teacher_name','$day','$studentDay','$adminDay','$PID','$dept','$adept', '$tzy_stud', '$stu_status', '$tech_startTime', '$TTE', '$stud_startTime', '$stud_startEnd', '$admin_startTime', '$admin_startEnd', '$atdif')") or die(mysql_error());
	}  
}

if ($_POST['checkbox3'] == 3){
require ("../includes/dbconnection.php");
$teacherid= $_POST['teacherID'];
			$student_name= $_POST['studentID'];
			$start_time = $_POST['STime'];
			$end_time = $_POST['ETime'];
			$day = 3;
			
$result = mysql_query("SELECT `sched`.*,`course`.`course_yrSec`,`profile`.`teacher_name` FROM `sched`,`course`,`profile` WHERE sched.course_id=course.course_id and sched.teacher_id=profile.teacher_id
 HAVING teacher_id='$teacherid' AND day_id='$day' AND time_start > '$start_time' AND time_start < '$end_time'
  			");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0){
			$conflict = 1;
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
				{			
					$sched = MYSQL_RESULT($result,$i,"sched_id");
					$stud_id = MYSQL_RESULT($result,$i,"course_id");
					$tech_id = MYSQL_RESULT($result,$i,"teacher_id");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$tt1 = MYSQL_RESULT($result,$i,"time_start");
					$tt2 = MYSQL_RESULT($result,$i,"time_end");
					$trial = MYSQL_RESULT($result,$i,"status");
					echo 'Sorry! there is a class of student '.$hidden_pcourse.' already scheduled during your selected time.';

	$i++;	 
			}
			}
	if ($conflict == 1){	
$teacherid= $_POST['teacherID'];
			$student_name= $_POST['studentID'];
			$start_time = $_POST['STime'];
			$end_time = $_POST['ETime'];
			$day = 3;

$result = mysql_query ("SELECT * FROM course WHERE course_id = '$student_name'")or die(mysql_error());
if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0){
			echo '';
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;			
					$SID = MYSQL_RESULT($result,$i,"course_id");
					$dept = MYSQL_RESULT($result,$i,"dept_id");
					$PID = MYSQL_RESULT($result,$i,"parent_id");
					//$tzy_stud = MYSQL_RESULT($result,$i,"timezone");
					$teacher_name = MYSQL_RESULT($result,$i,"Teacher");
					$tzy_stud = MYSQL_RESULT($result,$i,"php_tz");
					$stu_status = MYSQL_RESULT($result,$i,"active");
					$adept = MYSQL_RESULT($result,$i,"adept_id");
		
	$i++;	 
			}

$result1 = mysql_query ("SELECT * FROM profile WHERE teacher_id = '$teacherid'")or die(mysql_error());
if (!$result1) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result1);
		If ($numberOfRows == 0){
			echo '';
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;			
					$tzy_tech = MYSQL_RESULT($result1,$i,"time");
		
	$i++;	 
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


mysql_query ("INSERT INTO sched(course_id, teacher_id, day_id, sday_id, aday_id, parent_id, dept_id, adept_id, php_tz, status, time_start, time_end, start_time_S, end_time_S, start_time_A, end_time_A, duration)
					VALUES('$SID','$teacher_name','$day','$studentDay','$adminDay','$PID','$dept','$adept', '$tzy_stud', '$stu_status', '$tech_startTime', '$TTE', '$stud_startTime', '$stud_startEnd', '$admin_startTime', '$admin_startEnd', '$atdif')") or die(mysql_error());
	}  
}

if ($_POST['checkbox4'] == 4){
require ("../includes/dbconnection.php");
$teacherid= $_POST['teacherID'];
			$student_name= $_POST['studentID'];
			$start_time = $_POST['STime'];
			$end_time = $_POST['ETime'];
			$day = 4;
			
$result = mysql_query("SELECT `sched`.*,`course`.`course_yrSec`,`profile`.`teacher_name` FROM `sched`,`course`,`profile` WHERE sched.course_id=course.course_id and sched.teacher_id=profile.teacher_id
 HAVING teacher_id='$teacherid' AND day_id='$day' AND time_start > '$start_time' AND time_start < '$end_time'
  			");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0){
			$conflict = 1;
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
				{			
					$sched = MYSQL_RESULT($result,$i,"sched_id");
					$stud_id = MYSQL_RESULT($result,$i,"course_id");
					$tech_id = MYSQL_RESULT($result,$i,"teacher_id");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$tt1 = MYSQL_RESULT($result,$i,"time_start");
					$tt2 = MYSQL_RESULT($result,$i,"time_end");
					$trial = MYSQL_RESULT($result,$i,"status");
					echo 'Sorry! there is a class of student '.$hidden_pcourse.' already scheduled during your selected time.';

	$i++;	 
			}
			}
	if ($conflict == 1){	
$teacherid= $_POST['teacherID'];
			$student_name= $_POST['studentID'];
			$start_time = $_POST['STime'];
			$end_time = $_POST['ETime'];
			$day = 4;

$result = mysql_query ("SELECT * FROM course WHERE course_id = '$student_name'")or die(mysql_error());
if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0){
			echo '';
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;			
					$SID = MYSQL_RESULT($result,$i,"course_id");
					$dept = MYSQL_RESULT($result,$i,"dept_id");
					$PID = MYSQL_RESULT($result,$i,"parent_id");
					//$tzy_stud = MYSQL_RESULT($result,$i,"timezone");
					$teacher_name = MYSQL_RESULT($result,$i,"Teacher");
					$tzy_stud = MYSQL_RESULT($result,$i,"php_tz");
					$stu_status = MYSQL_RESULT($result,$i,"active");
					$adept = MYSQL_RESULT($result,$i,"adept_id");
		
	$i++;	 
			}

$result1 = mysql_query ("SELECT * FROM profile WHERE teacher_id = '$teacherid'")or die(mysql_error());
if (!$result1) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result1);
		If ($numberOfRows == 0){
			echo '';
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;			
					$tzy_tech = MYSQL_RESULT($result1,$i,"time");
		
	$i++;	 
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


mysql_query ("INSERT INTO sched(course_id, teacher_id, day_id, sday_id, aday_id, parent_id, dept_id, adept_id, php_tz, status, time_start, time_end, start_time_S, end_time_S, start_time_A, end_time_A, duration)
					VALUES('$SID','$teacher_name','$day','$studentDay','$adminDay','$PID','$dept','$adept', '$tzy_stud', '$stu_status', '$tech_startTime', '$TTE', '$stud_startTime', '$stud_startEnd', '$admin_startTime', '$admin_startEnd', '$atdif')") or die(mysql_error());
	}  
}
if ($_POST['checkbox5'] == 5){
require ("../includes/dbconnection.php");
$teacherid= $_POST['teacherID'];
			$student_name= $_POST['studentID'];
			$start_time = $_POST['STime'];
			$end_time = $_POST['ETime'];
			$day = 5;
			
$result = mysql_query("SELECT `sched`.*,`course`.`course_yrSec`,`profile`.`teacher_name` FROM `sched`,`course`,`profile` WHERE sched.course_id=course.course_id and sched.teacher_id=profile.teacher_id
 HAVING teacher_id='$teacherid' AND day_id='$day' AND time_start > '$start_time' AND time_start < '$end_time'
  			");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0){
			$conflict = 1;
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
				{			
					$sched = MYSQL_RESULT($result,$i,"sched_id");
					$stud_id = MYSQL_RESULT($result,$i,"course_id");
					$tech_id = MYSQL_RESULT($result,$i,"teacher_id");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$tt1 = MYSQL_RESULT($result,$i,"time_start");
					$tt2 = MYSQL_RESULT($result,$i,"time_end");
					$trial = MYSQL_RESULT($result,$i,"status");
					echo 'Sorry! there is a class of student '.$hidden_pcourse.' already scheduled during your selected time.';

	$i++;	 
			}
			}
	if ($conflict == 1){	
$teacherid= $_POST['teacherID'];
			$student_name= $_POST['studentID'];
			$start_time = $_POST['STime'];
			$end_time = $_POST['ETime'];
			$day = 5;

$result = mysql_query ("SELECT * FROM course WHERE course_id = '$student_name'")or die(mysql_error());
if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0){
			echo '';
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;			
					$SID = MYSQL_RESULT($result,$i,"course_id");
					$dept = MYSQL_RESULT($result,$i,"dept_id");
					$PID = MYSQL_RESULT($result,$i,"parent_id");
					//$tzy_stud = MYSQL_RESULT($result,$i,"timezone");
					$teacher_name = MYSQL_RESULT($result,$i,"Teacher");
					$tzy_stud = MYSQL_RESULT($result,$i,"php_tz");
					$stu_status = MYSQL_RESULT($result,$i,"active");
					$adept = MYSQL_RESULT($result,$i,"adept_id");
		
	$i++;	 
			}

$result1 = mysql_query ("SELECT * FROM profile WHERE teacher_id = '$teacherid'")or die(mysql_error());
if (!$result1) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result1);
		If ($numberOfRows == 0){
			echo '';
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;			
					$tzy_tech = MYSQL_RESULT($result1,$i,"time");
		
	$i++;	 
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


mysql_query ("INSERT INTO sched(course_id, teacher_id, day_id, sday_id, aday_id, parent_id, dept_id, adept_id, php_tz, status, time_start, time_end, start_time_S, end_time_S, start_time_A, end_time_A, duration)
					VALUES('$SID','$teacher_name','$day','$studentDay','$adminDay','$PID','$dept','$adept', '$tzy_stud', '$stu_status', '$tech_startTime', '$TTE', '$stud_startTime', '$stud_startEnd', '$admin_startTime', '$admin_startEnd', '$atdif')") or die(mysql_error());
	}  
}

if ($_POST['checkbox6'] == 6){
require ("../includes/dbconnection.php");
$teacherid= $_POST['teacherID'];
			$student_name= $_POST['studentID'];
			$start_time = $_POST['STime'];
			$end_time = $_POST['ETime'];
			$day = 6;
			
$result = mysql_query("SELECT `sched`.*,`course`.`course_yrSec`,`profile`.`teacher_name` FROM `sched`,`course`,`profile` WHERE sched.course_id=course.course_id and sched.teacher_id=profile.teacher_id
 HAVING teacher_id='$teacherid' AND day_id='$day' AND time_start > '$start_time' AND time_start < '$end_time'
  			");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0){
			$conflict = 1;
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
				{			
					$sched = MYSQL_RESULT($result,$i,"sched_id");
					$stud_id = MYSQL_RESULT($result,$i,"course_id");
					$tech_id = MYSQL_RESULT($result,$i,"teacher_id");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$tt1 = MYSQL_RESULT($result,$i,"time_start");
					$tt2 = MYSQL_RESULT($result,$i,"time_end");
					$trial = MYSQL_RESULT($result,$i,"status");
					echo 'Sorry! there is a class of student '.$hidden_pcourse.' already scheduled during your selected time.';

	$i++;	 
			}
			}
	if ($conflict == 1){	
$teacherid= $_POST['teacherID'];
			$student_name= $_POST['studentID'];
			$start_time = $_POST['STime'];
			$end_time = $_POST['ETime'];
			$day = 6;

$result = mysql_query ("SELECT * FROM course WHERE course_id = '$student_name'")or die(mysql_error());
if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0){
			echo '';
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;			
					$SID = MYSQL_RESULT($result,$i,"course_id");
					$dept = MYSQL_RESULT($result,$i,"dept_id");
					$PID = MYSQL_RESULT($result,$i,"parent_id");
					//$tzy_stud = MYSQL_RESULT($result,$i,"timezone");
					$teacher_name = MYSQL_RESULT($result,$i,"Teacher");
					$tzy_stud = MYSQL_RESULT($result,$i,"php_tz");
					$stu_status = MYSQL_RESULT($result,$i,"active");
					$adept = MYSQL_RESULT($result,$i,"adept_id");
		
	$i++;	 
			}

$result1 = mysql_query ("SELECT * FROM profile WHERE teacher_id = '$teacherid'")or die(mysql_error());
if (!$result1) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result1);
		If ($numberOfRows == 0){
			echo '';
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;			
					$tzy_tech = MYSQL_RESULT($result1,$i,"time");
		
	$i++;	 
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


mysql_query ("INSERT INTO sched(course_id, teacher_id, day_id, sday_id, aday_id, parent_id, dept_id, adept_id, php_tz, status, time_start, time_end, start_time_S, end_time_S, start_time_A, end_time_A, duration)
					VALUES('$SID','$teacher_name','$day','$studentDay','$adminDay','$PID','$dept','$adept', '$tzy_stud', '$stu_status', '$tech_startTime', '$TTE', '$stud_startTime', '$stud_startEnd', '$admin_startTime', '$admin_startEnd', '$atdif')") or die(mysql_error());
	}  
}
if ($_POST['checkbox7'] == 7){
require ("../includes/dbconnection.php");
$teacherid= $_POST['teacherID'];
			$student_name= $_POST['studentID'];
			$start_time = $_POST['STime'];
			$end_time = $_POST['ETime'];
			$day = 7;
			
$result = mysql_query("SELECT `sched`.*,`course`.`course_yrSec`,`profile`.`teacher_name` FROM `sched`,`course`,`profile` WHERE sched.course_id=course.course_id and sched.teacher_id=profile.teacher_id
 HAVING teacher_id='$teacherid' AND day_id='$day' AND time_start > '$start_time' AND time_start < '$end_time'
  			");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0){
			$conflict = 1;
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
				{			
					$sched = MYSQL_RESULT($result,$i,"sched_id");
					$stud_id = MYSQL_RESULT($result,$i,"course_id");
					$tech_id = MYSQL_RESULT($result,$i,"teacher_id");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$tt1 = MYSQL_RESULT($result,$i,"time_start");
					$tt2 = MYSQL_RESULT($result,$i,"time_end");
					$trial = MYSQL_RESULT($result,$i,"status");
					echo 'Sorry! there is a class of student '.$hidden_pcourse.' already scheduled during your selected time.';

	$i++;	 
			}
			}
	if ($conflict == 1){	
$teacherid= $_POST['teacherID'];
			$student_name= $_POST['studentID'];
			$start_time = $_POST['STime'];
			$end_time = $_POST['ETime'];
			$day = 7;

$result = mysql_query ("SELECT * FROM course WHERE course_id = '$student_name'")or die(mysql_error());
if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0){
			echo '';
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;			
					$SID = MYSQL_RESULT($result,$i,"course_id");
					$dept = MYSQL_RESULT($result,$i,"dept_id");
					$PID = MYSQL_RESULT($result,$i,"parent_id");
					//$tzy_stud = MYSQL_RESULT($result,$i,"timezone");
					$teacher_name = MYSQL_RESULT($result,$i,"Teacher");
					$tzy_stud = MYSQL_RESULT($result,$i,"php_tz");
					$stu_status = MYSQL_RESULT($result,$i,"active");
					$adept = MYSQL_RESULT($result,$i,"adept_id");
		
	$i++;	 
			}

$result1 = mysql_query ("SELECT * FROM profile WHERE teacher_id = '$teacherid'")or die(mysql_error());
if (!$result1) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result1);
		If ($numberOfRows == 0){
			echo '';
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;			
					$tzy_tech = MYSQL_RESULT($result1,$i,"time");
		
	$i++;	 
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


mysql_query ("INSERT INTO sched(course_id, teacher_id, day_id, sday_id, aday_id, parent_id, dept_id, adept_id, php_tz, status, time_start, time_end, start_time_S, end_time_S, start_time_A, end_time_A, duration)
					VALUES('$SID','$teacher_name','$day','$studentDay','$adminDay','$PID','$dept','$adept', '$tzy_stud', '$stu_status', '$tech_startTime', '$TTE', '$stud_startTime', '$stud_startEnd', '$admin_startTime', '$admin_startEnd', '$atdif')") or die(mysql_error());
header('Location: ' . $_SERVER['HTTP_REFERER']);
	}  
}
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>