<?
require ("../includes/dbconnection.php");
$teacherid= $_POST['teacherID'];
			$student_name= $_POST['studentID'];
			$start_time = $_POST['STime'];
			$date = $_POST['date'];
            $end_time = $_POST['ETime'];

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



//echo '<br>SID '.$SID;
//echo '<br>TID '.$teacher_name;
//echo '<br>TDAY '.$day;
//echo '<br>SDAY '.$studentDay;
//echo '<br>Aday '.$adminDay;
//echo '<br>PID '.$PID;
//echo '<br>Dept '.$dept;
//echo '<br>Adept '.$adept;
//echo '<br>ST '.$tzy_stud;
//echo '<br>stu '.$stu_status;
//echo '<br>TS TIME '.$tech_startTime;
//echo '<br>TE TIME '.$tech_startEnd;
//echo '<br>SS TIME '.$stud_startTime;
//echo '<br>SE TIME '.$stud_startEnd;
//echo '<br>AS TIME '.$admin_startTime;
//echo '<br>AE TIME '.$admin_startEnd;
//echo '<br>DUR '.$atdif;
mysql_query ("INSERT INTO class_history(course_id, teacher_id, date_teacher, date_student, date_admin, parent_id, dept_id, adept_id, status, time_start, time_end, start_time_S, end_time_S, start_time_A, end_time_A, duration, type, le_date_admin, le_date_teacher, le_date_student)
					VALUES('$SID','$teacher_name','$date','$studentDay','$adminDay','$PID','$dept','$adept', '21', '$tech_startTime', '$tech_startEnd', '$stud_startTime', '$stud_startEnd', '$admin_startTime', '$admin_startEnd', '$atdif', '11', '$ADtate', '$TDtate', '$SDtate')") or die(mysql_error());
header('Location: ' . $_SERVER['HTTP_REFERER']);

?>