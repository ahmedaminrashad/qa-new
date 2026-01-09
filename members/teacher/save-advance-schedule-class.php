<?php session_start(); ?>
  <?php
  include("../includes/session.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("header.php");
			$student_name= $_POST['studentID'];
			$start_time = $_POST['STime'];
			$date = $_POST['date'];
			$dur = $_POST['duration'];
			$secs = strtotime($dur)-strtotime("00:00:00");
            $end_time = date("H:i:s",strtotime($start_time)+$secs);
            $ADtate = $_POST['ADtate'];
            $TDtate = $_POST['TDtate'];
            $SDtate = $_POST['SDtate'];
            $famID = $_POST['famID'];
            $MONI  = $_POST['MONI'];

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
					$tzy_tech = MYSQL_RESULT($result1,$i,"time'];
		
	}	 
			}

$local_tz = new DateTimeZone($tzy_tech);
$local = new DateTime('now', $local_tz);

$user_tz = new DateTimeZone($tzy_stud);
$user = new DateTime('now', $user_tz);

$admin_tz = new DateTimeZone($TimeZoneCustome);
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
$sql = "INSERT INTO class_resched(course_id, teacher_id, date_teacher, date_student, date_admin, parent_id, dept_id, adept_id, status, time_start, time_end, start_time_S, end_time_S, start_time_A, end_time_A, duration, type, le_date_admin, le_date_teacher, le_date_student, uni, cur_status, ori_status)
					VALUES('$SID','$teacher_name','$date','$studentDay','$adminDay','$PID','$dept','$adept', '19', '$tech_startTime', '$tech_startEnd', '$stud_startTime', '$stud_startEnd', '$admin_startTime', '$admin_startEnd', '$atdif', '11', '$ADtate', '$TDtate', '$SDtate', '$famID', '2', '$MONI')";
					if ($conn->query($sql) === TRUE) {
					echo'';
					}
					$sql = "UPDATE class_history SET re_status = 1, re_date_admin = '$adminDay', re_date_student = '$studentDay', re_date_teacher = '$date', monitor_id = 8 WHERE history_id = $famID";
if ($conn->query($sql) === TRUE) {
header('Location: ' . $_SERVER['HTTP_REFERER']);
}

?>