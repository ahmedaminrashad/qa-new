<?
require ("../includes/dbconnection.php");
$famID=$_POST['famID'];
$result = mysql_query("SELECT `sched`.*,`course`.`course_yrSec`,`profile`.`teacher_name` FROM `sched`,`course`,`profile` WHERE sched.course_id=course.course_id and sched.teacher_id=profile.teacher_id
 HAVING sched_id = '$famID'
  			");
			//HAVING course_id='$pCourse'
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

	$i++;	 
			}
			}
		
		 	$teacherid= $_POST['teacherID'];
			$student_name= $_POST['studentID'];
			$start_time = $_POST['STime'];
			$date = $_POST['date'];
			$dur = $_POST['duration'];
			$secs = strtotime($dur)-strtotime("00:00:00");
            $end_time = date("H:i:s",strtotime($start_time)+$secs);

$result = mysql_query ("SELECT * FROM course WHERE course_id = $student_name")or die(mysql_error());
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
					$tzy_stud = MYSQL_RESULT($result,$i,"timezone");
					$teacher_name = MYSQL_RESULT($result,$i,"Teacher");
					$tzy_stud = MYSQL_RESULT($result,$i,"php_tz");
					$stu_status = MYSQL_RESULT($result,$i,"active");
					$adept = MYSQL_RESULT($result,$i,"adept_id");
		
	$i++;	 
			}

$result1 = mysql_query ("SELECT * FROM profile WHERE teacher_id = $teacher_name")or die(mysql_error());
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
if ($Sdiff < 0 && $stud_startTime > $tech_startTime) {$studentDay = date('Y-m-d',strtotime("".$date." -1 days"));}
if ($Sdiff > 0 && $stud_startTime < $tech_startTime) {$studentDay = date('Y-m-d',strtotime("".$date." 1 days"));}
if ($Sdiff < 0 && $stud_startTime < $tech_startTime) {$studentDay = $date;}
if ($Sdiff > 0 && $stud_startTime > $tech_startTime) {$studentDay = $date;}
if ($Sdiff == 0) {$studentDay = $date;}

if ($Adiff < 0 && $admin_startTime > $tech_startTime) {$adminDay = date('Y-m-d',strtotime("".$date." -1 days"));}
if ($Adiff > 0 && $admin_startTime < $tech_startTime) {$adminDay = date('Y-m-d',strtotime("".$date." 1 days"));}
if ($Adiff < 0 && $admin_startTime < $tech_startTime) {$adminDay = $date;}
if ($Adiff > 0 && $admin_startTime > $tech_startTime) {$adminDay = $date;}
if ($Adiff == 0) {$adminDay = $date;}


$startTime1 = new DateTime($tech_startTime);
$endTime1 = new DateTime($tech_startEnd);
$duration = $startTime1->diff($endTime1); //$duration is a DateInterval object
$atdif = $duration->format("%H:%I:%S");
mysql_query( "UPDATE class_history SET date_teacher = '$date', date_student = '$studentDay', date_admin = '$adminDay', time_start = '$tech_startTime', time_end = '$tech_startEnd', start_time_S = '$stud_startTime', end_time_S = '$stud_startEnd', start_time_A = '$admin_startTime', end_time_A = '$admin_startEnd', status = '18' WHERE history_id = '$famID'") or die(mysql_error()); 
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>