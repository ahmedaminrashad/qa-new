<?php session_start(); ?>
<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ini_set('log_errors', 1);

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

require("../includes/dbconnection.php");
require_once("../includes/mysql-compat.php");

// Check database connection
if (!isset($conn) || !$conn) {
    die("Database connection failed. Please contact the administrator.");
}
<?php
  include("../includes/session1.php");
  include("header.php");
  $user_id= $_SESSION['is']['user_id'];
  function schedule_classes()
{
$pT =$_REQUEST['Course_ID'];
$nname = $_REQUEST['studentName'];
$nnod = $_REQUEST['nod'];
// sending query
   $result = mysql_query("SELECT * FROM sched Where course_id = '$pT'");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$tnumberOfRows = MYSQL_NUMROWS($result);
If ($tnumberOfRows == 0){
			echo '<div class="alert alert-success"><h3>Student <strong>'.$nname.'</strong> is on <strong>'.$nnod.' day(s)</strong> package out of which system has <strong>'.$tnumberOfRows.' classe(s)</strong> scheduled.<h3></div>';
			}
		else if ($tnumberOfRows > 0) 
			{
			echo '<div class="alert alert-success"><h3>Student <strong>'.$nname.'</strong> is on <strong>'.$nnod.' day(s)</strong> package out of which system has <strong>'.$tnumberOfRows.' classe(s)</strong> scheduled.<h3></div>';
			}
	}
  function abc($d, $t)
  {
  $pT =$_REQUEST['Course_ID'];
			$result = mysql_query("SELECT `sched`.*, `course`.`course_yrSec`,`profile`.`teacher_name`,`Stime`.`stime_s`,`day`.`day_name` FROM `sched`,`course`,`profile`,`Stime`,`day` WHERE sched.course_id=course.course_id and sched.teacher_id=profile.teacher_id and sched.time_s_id=Stime.stime_s_id and sched.day_id=day.day_id
 HAVING course_id ='$pT' and sday_id = '$d' and stime_s_id = '$t'
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
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_pday = MYSQL_RESULT($result,$i,"sday_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"stime_s_id");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_ptime1 = MYSQL_RESULT($result,$i,"stime_s");
					$hidden_ptime2 = MYSQL_RESULT($result,$i,"day_name");
					$schedid = MYSQL_RESULT($result,$i,"sched_id");
			 if ($hidden_pday == $d && $hidden_pstime == $t){	
			  		echo "<b>Teacher:</b> $hidden_pt </br><b>Time:</b> $hidden_ptime1 </br><b>Day:</b> $hidden_ptime2 </br><a href='sched_c_del?sched_id=$schedid'><button type='button' class='btn red btn-xs'>Delete</button></a>";
						}			
	$i++;	 
			}
			}
	}
function color($d, $t){
$pT =$_REQUEST['Course_ID'];
			$result = mysql_query("SELECT * FROM sched HAVING course_id = $pT and sday_id = $d and stime_s_id = $t
  			");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0){
			echo '#CECE0F';
			}
		else if ($numberOfRows > 0) 
			{
			echo '#989800';
			 }
		}
  function opt($time, $tr,  $d, $tech){
			$result = mysql_query("SELECT * FROM profile HAVING teacher_id = '$tech'");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0) 
			{
			echo "";
			}
		else if ($numberOfRows > 0) 
			{
				
					$st1 = MYSQL_RESULT($result,$i,"st1");
					$st2 = MYSQL_RESULT($result,$i,"st2");
					$et1 = MYSQL_RESULT($result,$i,"et1");
					$et2 = MYSQL_RESULT($result,$i,"et2");
					$st3 = MYSQL_RESULT($result,$i,"st3");
					$et3 = MYSQL_RESULT($result,$i,"et3");
			 if ($st1 <= $tr && $et1 >= $tr){	
					$c = '#81F781';
						}
			 elseif ($st2 <= $tr && $et2 >= $tr){	
					$c = '#81F781';
						}
			elseif ($st3 <= $tr && $et3 >= $tr){	
					$c = '#81F781';
						}
			else {	
					$c = '#ffffff';
						}
if ($c == "#81F781"){
$pT =$_REQUEST['Course_ID'];
$result = mysql_query("SELECT `sched`.*,`course`.`course_yrSec`,`Stime`.`stime_s` FROM `sched`,`course`,`Stime`  WHERE sched.course_id=course.course_id and sched.stime_s_id=Stime.stime_s_id HAVING teacher_id='$tech' AND day_id='$d' AND time_s_id='$tr'");
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
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_pcourseid = MYSQL_RESULT($result,$i,"course_id");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
					$trial = MYSQL_RESULT($result,$i,"status");
					$sName = '('.$hidden_pcourse.')';
					$able = 'disabled';
					if ($trial == 11){ $color = '#F2F5A9'; }
					elseif ($trial == 17){ $color = '#F9BCBC'; }
					else { $color = '#BCF5A9'; }
					if ($hidden_pcourseid == $pT) {$star = ' selected';}
					else {$star = '';}
			}
			echo '<option'.$star.' style="background:'.$color.'" value="'.$tr.'">'.$time.' '.$sName.'</option>';
	}
 }
			}
function checker($a){
$pT1 =$_REQUEST['Course_ID'];
$pT2 =$_REQUEST['tech'];
$result = mysql_query("SELECT * FROM sched  WHERE teacher_id = '$pT2' AND course_id = '$pT1' AND day_id = '$a'");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0){
			echo '';
			}
			else { echo 'checked'; }
}
?>
<?php
   if (isset($_POST['cmdSubmit'])) 
  	{ 	
		 	$teacherid= $_POST['pteacher'];
			$student_name= $_POST['pstudent'];
			$teacher_time1 = $_POST['pstime1'];
			$teacher_time2 = $_POST['pstime2'];
			$teacher_time3 = $_POST['pstime3'];
			$teacher_time4 = $_POST['pstime4'];
			$teacher_time5 = $_POST['pstime5'];
			$teacher_time6 = $_POST['pstime6'];
			$teacher_time7 = $_POST['pstime7'];
			$hidden_proom = 1;
			$tday1 = $_POST['checkbox1'];
			$tday2 = $_POST['checkbox2'];
			$tday3 = $_POST['checkbox3'];
			$tday4 = $_POST['checkbox4'];
			$tday5 = $_POST['checkbox5'];
			$tday6 = $_POST['checkbox6'];
			$tday7 = $_POST['checkbox7'];
			$aannod = $_POST['annod'];
			if ($tday1 == 1) { $a1 = 1; }
			if ($tday2 > 1) { $a2 = 1; }
			if ($tday3 > 1) { $a3 = 1; }
			if ($tday4 > 1) { $a4 = 1; }
			if ($tday5 > 1) { $a5 = 1; }
			if ($tday6 > 1) { $a6 = 1; }
			if ($tday7 > 1) { $a7 = 1; }
			$CTotal = $a1+$a2+$a3+$a4+$a5+$a6+$a7;
			if ($CTotal == $aannod)
			{
			mysql_query("DELETE FROM sched WHERE course_id = '$student_name'") or die(mysql_error());
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
					$dept = MYSQL_RESULT($result,$i,"dept_id");
					$parent = MYSQL_RESULT($result,$i,"parent_id");
					$tzy = MYSQL_RESULT($result,$i,"timezone");
					$teacher_name = MYSQL_RESULT($result,$i,"Teacher");
					$tzyphp = MYSQL_RESULT($result,$i,"php_tz");
					$stu_status = MYSQL_RESULT($result,$i,"active");
					$adept = MYSQL_RESULT($result,$i,"adept_id");
		
	$i++;	 
			}

$z = 48;
$tz = $tzy+$tzy;
$x1 = $teacher_time1+$tz;		
if ($x1 < 0){
		$student_time1 = $z+$x1;
		$a1 = -1;
		}
elseif ($x1 == 0){
		$student_time1 = $z;
		$a1 = -1;
	}
elseif ($x1 > 0 and $x1 < $z){
		$student_time1 = $x1;
		$a1 = 0;
		}
elseif ($x1 == $z){
		$student_time1 = $x1;
		$a1 = 0;
	}
elseif ($x1 > $z){
		$student_time1 = $x1-$z;
		$a1 = 1;
	}

$x2 = $teacher_time2+$tz;		
if ($x2 < 0){
		$student_time2 = $z+$x2;
		$a2 = -1;
		}
elseif ($x2 == 0){
		$student_time2 = $z;
		$a2 = -1;
	}
elseif ($x2 > 0 and $x2 < $z){
		$student_time2 = $x2;
		$a2 = 0;
		}
elseif ($x2 == $z){
		$student_time = $x2;
		$a2 = 0;
	}
elseif ($x2 > $z){
		$student_time = $x2-$z;
		$a2 = 1;
	}
	
$x3 = $teacher_time3+$tz;		
if ($x3 < 0){
		$student_time3 = $z+$x3;
		$a3 = -1;
		}
elseif ($x3 == 0){
		$student_time3 = $z;
		$a3 = -1;
	}
elseif ($x3 > 0 and $x3 < $z){
		$student_time3 = $x3;
		$a3 = 0;
		}
elseif ($x3 == $z){
		$student_time3 = $x3;
		$a3 = 0;
	}
elseif ($x3 > $z){
		$student_time3 = $x3-$z;
		$a3 = 1;
	}
	
$x4= $teacher_time4+$tz;		
if ($x4 < 0){
		$student_time4 = $z+$x4;
		$a4 = -1;
		}
elseif ($x4 == 0){
		$student_time4 = $z;
		$a4 = -1;
	}
elseif ($x4 > 0 and $x4 < $z){
		$student_time4 = $x4;
		$a4 = 0;
		}
elseif ($x4 == $z){
		$student_time4 = $x4;
		$a4 = 0;
	}
elseif ($x4 > $z){
		$student_time4 = $x4-$z;
		$a4 = 1;
	}
	
$x5 = $teacher_time5+$tz;		
if ($x5 < 0){
		$student_time5 = $z+$x5;
		$a5 = -1;
		}
elseif ($x5 == 0){
		$student_time5 = $z;
		$a5 = -1;
	}
elseif ($x5 > 0 and $x5 < $z){
		$student_time5 = $x5;
		$a5 = 0;
		}
elseif ($x5 == $z){
		$student_time5 = $x5;
		$a5 = 0;
	}
elseif ($x5 > $z){
		$student_time5 = $x5-$z;
		$a5 = 1;
	}
	
$x6 = $teacher_time6+$tz;		
if ($x6 < 0){
		$student_time6 = $z+$x6;
		$a6 = -1;
		}
elseif ($x6 == 0){
		$student_time6 = $z;
		$a6 = -1;
	}
elseif ($x6 > 0 and $x6 < $z){
		$student_time6 = $x6;
		$a6 = 0;
		}
elseif ($x6 == $z){
		$student_time = $x6;
		$a6 = 0;
	}
elseif ($x6 > $z){
		$student_time6 = $x6-$z;
		$a6 = 1;
	}
	
$x7 = $teacher_time7+$tz;		
if ($x7 < 0){
		$student_time7 = $z+$x7;
		$a7 = -1;
		}
elseif ($x7 == 0){
		$student_time7 = $z;
		$a7 = -1;
	}
elseif ($x7 > 0 and $x7 < $z){
		$student_time7 = $x7;
		$a7 = 0;
		}
elseif ($x7== $z){
		$student_time7 = $x7;
		$a7 = 0;
	}
elseif ($x7 > $z){
		$student_time7 = $x7-$z;
		$a7 = 1;
	}
	
$student_day1 = $tday1+$a1;
			if ($student_day1 == 0){ $sday1 = 7; }
			elseif ($student_day1 == 8){ $sday1 = 1; }
			else { $sday1 = $student_day1; }
$student_day2 = $tday2+$a2;
			if ($student_day2 == 0){ $sday2 = 7; }
			elseif ($student_day2 == 8){ $sday2 = 1; }
			else { $sday2 = $student_day2; }
$student_day3 = $tday3+$a3;
			if ($student_day3 == 0){ $sday3 = 7; }
			elseif ($student_day3 == 8){ $sday3 = 1; }
			else { $sday3 = $student_day3; }
$student_day4 = $tday4+$a4;
			if ($student_day4 == 0){ $sday4 = 7; }
			elseif ($student_day4 == 8){ $sday4 = 1; }
			else { $sday4 = $student_day4; }
$student_day5 = $tday5+$a5;
			if ($student_day5 == 0){ $sday5 = 7; }
			elseif ($student_day5 == 8){ $sday5 = 1; }
			else { $sday5 = $student_day5; }
$student_day6 = $tday6+$a6;
			if ($student_day6 == 0){ $sday6 = 7; }
			elseif ($student_day6 == 8){ $sday6 = 1; }
			else { $sday6 = $student_day6; }
$student_day7 = $tday7+$a7;
			if ($student_day7 == 0){ $sday7 = 7; }
			elseif ($student_day7 == 8){ $sday7 = 1; }
			else { $sday7 = $student_day7; }

$z = 48;
$tz = 0;
$ax1 = $teacher_time1+$tz;		
if ($ax1 < 0){
		$admin_time1 = $z+$ax1;
		$aa1 = -1;
		}
elseif ($ax1 == 0){
		$admin_time1 = $z;
		$aa1 = -1;
	}
elseif ($ax1 > 0 and $ax1 < $z){
		$admin_time1 = $ax1;
		$aa1 = 0;
		}
elseif ($ax1 == $z){
		$admin_time1 = $ax1;
		$aa1 = 0;
	}
elseif ($ax1 > $z){
		$admin_time1 = $ax1-$z;
		$aa1 = 1;
	}

$ax2 = $teacher_time2+$tz;		
if ($ax2 < 0){
		$admin_time2 = $z+$ax2;
		$aa2 = -1;
		}
elseif ($ax2 == 0){
		$admin_time2 = $z;
		$aa2 = -1;
	}
elseif ($ax2 > 0 and $ax2 < $z){
		$admin_time2 = $ax2;
		$aa2 = 0;
		}
elseif ($ax2 == $z){
		$admin_time = $ax2;
		$aa2 = 0;
	}
elseif ($ax2 > $z){
		$admin_time = $ax2-$z;
		$aa2 = 1;
	}
	
$ax3 = $teacher_time3+$tz;		
if ($ax3 < 0){
		$admin_time3 = $z+$ax3;
		$aa3 = -1;
		}
elseif ($ax3 == 0){
		$admin_time3 = $z;
		$aa3 = -1;
	}
elseif ($ax3 > 0 and $ax3 < $z){
		$admin_time3 = $ax3;
		$aa3 = 0;
		}
elseif ($ax3 == $z){
		$admin_time3 = $ax3;
		$aa3 = 0;
	}
elseif ($ax3 > $z){
		$admin_time3 = $ax3-$z;
		$aa3 = 1;
	}
	
$ax4= $teacher_time4+$tz;		
if ($ax4 < 0){
		$admin_time4 = $z+$ax4;
		$aa4 = -1;
		}
elseif ($ax4 == 0){
		$admin_time4 = $z;
		$aa4 = -1;
	}
elseif ($ax4 > 0 and $ax4 < $z){
		$admin_time4 = $ax4;
		$aa4 = 0;
		}
elseif ($ax4 == $z){
		$admin_time4 = $ax4;
		$aa4 = 0;
	}
elseif ($ax4 > $z){
		$admin_time4 = $ax4-$z;
		$aa4 = 1;
	}
	
$ax5 = $teacher_time5+$tz;		
if ($ax5 < 0){
		$admin_time5 = $z+$ax5;
		$aa5 = -1;
		}
elseif ($ax5 == 0){
		$admin_time5 = $z;
		$aa5 = -1;
	}
elseif ($ax5 > 0 and $ax5 < $z){
		$admin_time5 = $ax5;
		$aa5 = 0;
		}
elseif ($ax5 == $z){
		$admin_time5 = $ax5;
		$aa5 = 0;
	}
elseif ($ax5 > $z){
		$admin_time5 = $ax5-$z;
		$aa5 = 1;
	}
	
$ax6 = $teacher_time6+$tz;		
if ($ax6 < 0){
		$admin_time6 = $z+$ax6;
		$aa6 = -1;
		}
elseif ($ax6 == 0){
		$admin_time6 = $z;
		$aa6 = -1;
	}
elseif ($ax6 > 0 and $ax6 < $z){
		$admin_time6 = $ax6;
		$aa6 = 0;
		}
elseif ($ax6 == $z){
		$admin_time = $ax6;
		$aa6 = 0;
	}
elseif ($ax6 > $z){
		$admin_time6 = $ax6-$z;
		$aa6 = 1;
	}
	
$ax7 = $teacher_time7+$tz;		
if ($ax7 < 0){
		$admin_time7 = $z+$ax7;
		$aa7 = -1;
		}
elseif ($ax7 == 0){
		$admin_time7 = $z;
		$aa7 = -1;
	}
elseif ($ax7 > 0 and $ax7 < $z){
		$admin_time7 = $ax7;
		$aa7 = 0;
		}
elseif ($ax7== $z){
		$admin_time7 = $ax7;
		$aa7 = 0;
	}
elseif ($ax7 > $z){
		$admin_time7 = $ax7-$z;
		$aa7 = 1;
	}
	
$admin_day1 = $tday1+$aa1;
			if ($admin_day1 == 0){ $aday1 = 7; }
			elseif ($admin_day1 == 8){ $aday1 = 1; }
			else { $aday1 = $admin_day1; }
$admin_day2 = $tday2+$aa2;
			if ($admin_day2 == 0){ $aday2 = 7; }
			elseif ($admin_day2 == 8){ $aday2 = 1; }
			else { $aday2 = $admin_day2; }
$admin_day3 = $tday3+$aa3;
			if ($admin_day3 == 0){ $aday3 = 7; }
			elseif ($admin_day3 == 8){ $aday3 = 1; }
			else { $aday3 = $admin_day3; }
$admin_day4 = $tday4+$aa4;
			if ($admin_day4 == 0){ $aday4 = 7; }
			elseif ($admin_day4 == 8){ $aday4 = 1; }
			else { $aday4 = $admin_day4; }
$admin_day5 = $tday5+$aa5;
			if ($admin_day5 == 0){ $aday5 = 7; }
			elseif ($admin_day5 == 8){ $aday5 = 1; }
			else { $aday5 = $admin_day5; }
$admin_day6 = $tday6+$aa6;
			if ($admin_day6 == 0){ $aday6 = 7; }
			elseif ($admin_day6 == 8){ $aday6 = 1; }
			else { $aday6 = $admin_day6; }
$admin_day7 = $tday7+$aa7;
			if ($admin_day7 == 0){ $aday7 = 7; }
			elseif ($admin_day7 == 8){ $aday7 = 1; }
			else { $aday7 = $admin_day7; }
$result = mysql_query ("SELECT * FROM sched") or die(mysql_error());
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
If ($numberOfRows == 0) 
	{
	echo '';
	}
else if ($numberOfRows > 0) 
	{
	$i=0;
	while ($i<$numberOfRows)
		{			
			$sched_id = MYSQL_RESULT($result,$i,"sched_id");
			$course = MYSQL_RESULT($result,$i,"course_id");
			$teacher = MYSQL_RESULT($result,$i,"teacher_id");
			$room = MYSQL_RESULT($result,$i,"room_id");
			$day = MYSQL_RESULT($result,$i,"day_id");
			$stime = MYSQL_RESULT($result,$i,"time_s_id");
			$sday = MYSQL_RESULT($result,$i,"sday_id");
			$sstime = MYSQL_RESULT($result,$i,"stime_s_id");
			if (($teacher == $teacher_name && $course == $student_name && $day == $tday1 && $stime == $teacher_time1) OR ($teacher == $teacher_name && $course == $student_name && $day == $tday2 && $stime == $teacher_time2) OR ($teacher == $teacher_name && $course == $student_name && $day == $tday3 && $stime == $teacher_time3) OR ($teacher == $teacher_name && $course == $student_name && $day == $tday4 && $stime == $teacher_time4) OR ($teacher == $teacher_name && $course == $student_name && $day == $tday5 && $stime == $teacher_time5) OR ($teacher == $teacher_name && $course == $student_name && $day == $tday6 && $stime == $teacher_time6) OR ($teacher == $teacher_name && $course == $student_name && $day == $tday7 && $stime == $teacher_time7)){
			   $result = mysql_query("SELECT `sched`.*, `day`.`day_name`, `course`.`course_yrSec`, `room`.`room_name`,
 `timestart`.`time_s`, `sday`.`sday_name`, `Stime`.`stime_s`,
 `profile`.`teacher_name` FROM `sched`,`room`,`course`,`profile`,`timestart` ,`day`,`Stime`,`sday` WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.teacher_id=profile.teacher_id and sched.time_s_id=timestart.time_s_id and sched.day_id=day.day_id and sched.stime_s_id=Stime.stime_s_id and sched.sday_id=sday.sday_id 
 having sched_id = '$sched_id'
  			");
			 if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
If ($numberOfRows == 0) 
	{
	echo '';
	}
else if ($numberOfRows > 0) 
	{
	$i=0;
	while ($i<$numberOfRows)
		{			
			$sched_id = MYSQL_RESULT($result,$i,"sched_id");
			$acourse = MYSQL_RESULT($result,$i,"course_yrSec");
			$ateacher = MYSQL_RESULT($result,$i,"teacher_name");
			$aroom = MYSQL_RESULT($result,$i,"room_name");
			$aday = MYSQL_RESULT($result,$i,"day_name");
			$astime = MYSQL_RESULT($result,$i,"time_s");
			$asday = MYSQL_RESULT($result,$i,"day_name");
			$asstime = MYSQL_RESULT($result,$i,"time_s");
	$i++;	 
			}
			}
			$note = '<div class="alert alert-danger">* There is a conflict with the schedule of <b>' . $ateacher. '</b> with <b>' . $acourse. '</b> at <b>' . $astime.'</b></div>';
			$conflict = true;
			end;
			}
	$i++;	 
			}
			}
if ($conflict != true){
			header(
			"Location: save-schedule-local-new.php?teacher=$teacher_name&student=$student_name&s_time1=$student_time1&t_time1=$teacher_time1&s_time2=$student_time2&t_time2=$teacher_time2&s_time3=$student_time3&t_time3=$teacher_time3&s_time4=$student_time4&t_time4=$teacher_time4&s_time5=$student_time5&t_time5=$teacher_time5&s_time6=$student_time6&t_time6=$teacher_time6&s_time7=$student_time7&t_time7=$teacher_time7&a_time1=$admin_time1&a_time2=$admin_time2&a_time3=$admin_time3&a_time4=$admin_time4&a_time5=$admin_time5&a_time6=$admin_time6&a_time7=$admin_time7&ad1=$aday1&ad2=$aday2&ad3=$aday3&ad4=$aday4&ad5=$aday5&ad6=$aday6&ad7=$aday7&td1=$tday1&td2=$tday2&td3=$tday3&td4=$tday4&td5=$tday5&td6=$tday6&td7=$tday7&sd1=$sday1&sd2=$sday2&sd3=$sday3&sd4=$sday4&sd5=$sday5&sd6=$sday6&sd7=$sday7&dept_id=$dept&adept_id=$adept&parent_id=$parent&time_php=$tzyphp&active=$stu_status");
		}
	}
	else { header(
			"Location: error.php"); }
	}
?>
<?php
date_default_timezone_set("Africa/Cairo");
$sy = date('Y-m-d');
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>&lt;?php echo $head_title; ?&gt;</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css">
<link href="../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="../assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css">
<link href="../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="../assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css">
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="../assets/global/css/components-rounded.css" id="style_components" rel="stylesheet" type="text/css">
<link href="../assets/global/css/plugins.css" rel="stylesheet" type="text/css">
<link href="../assets/admin/layout3/css/layout.css" rel="stylesheet" type="text/css">
<link href="../assets/admin/layout3/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color">
<link href="../assets/admin/layout3/css/custom.css" rel="stylesheet" type="text/css">
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
<script>
    function Reload()   {
        document.getElementById("mytable").innerHTML;
    }
    </script>

<style type="text/css">
.auto-style1 {
	color: #B70E0E;
}
.auto-style2 {
	color: #115911;
}
.auto-style3 {
	color: #0A0A87;
}
</style>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-menu-fixed" class to set the mega menu fixed  -->
<!-- DOC: Apply "page-header-top-fixed" class to set the top menu fixed  -->
<body>
<!-- BEGIN HEADER -->
<div class="page-header">
	<!-- BEGIN HEADER TOP -->
	<div class="page-header-top">
		<div class="container">
			<!-- BEGIN LOGO -->
			<div class="page-logo">
				<a href="index.html"><img src="../assets/admin/layout3/img/logo-default.png" alt="logo" class="logo-default"></a>
			</div>
			<!-- END LOGO -->
			<!-- BEGIN RESPONSIVE MENU TOGGLER -->
			<a href="javascript:;" class="menu-toggler"></a>
			<!-- END RESPONSIVE MENU TOGGLER -->
 <?php echo $tool_bar; ?>
<?php echo $start_menu; ?>
<?php echo $search_bar; ?>
<?php echo $main_menu; ?>
<!-- BEGIN PAGE CONTAINER -->
<div class="page-container">
	<!-- BEGIN PAGE HEAD -->
	<div class="page-head">
		<div class="container">
			<!-- BEGIN PAGE TITLE -->
			<div class="page-title">
				<h1>Add <small>New Schedule</small></h1>
			</div>
			<!-- END PAGE TITLE -->
			<!-- BEGIN PAGE TOOLBAR -->
			<div class="page-toolbar">
			</div>
			<!-- END PAGE TOOLBAR -->
		</div>
	</div>
	<!-- END PAGE HEAD -->
	<!-- BEGIN PAGE CONTENT -->
	<div class="page-content">
		<div class="container">
			<!-- BEGIN PAGE BREADCRUMB -->
			<div class="modal fade" id="note" tabindex="-1" role="basic" aria-hidden="true">
							</div>
								<?php echo $note; ?>
			<ul class="page-breadcrumb breadcrumb">
				<li>
					<a href="admin-home">Home</a><i class="fa fa-circle"></i>
				</li>
				<li class="active">
					 You are adding a schedule
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="row">
				<div class="col-md-12">
				<?php echo schedule_classes(); ?>
				<div id="mytable" class="table-responsive">
								<table class="table table-striped table-bordered table-hover">
								<thead>
								<tr>
									<th>Time/Days</th>
									<th>MONDAY</th>
									<th>TUESDAY</th>
									<th>WEDNESDAY</th>
									<th>THURSDAY</th>
									<th>FRIDAY</th>
									<th>SATURDAY</th>
									<th>SUNDAY</th>
								</tr>
								</thead>
<tbody><tr>
								<?php $pT =$_REQUEST['Course_ID'];
								$time = "12:00-12:30 AM";
								$tr = "1";
			$result = mysql_query("SELECT * FROM sched HAVING course_id = $pT and stime_s_id = $tr");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0) 
			{
			echo "";
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
		
			if(($i%2)==0) 
				{
					$bgcolor ='#FFFFFF';
				}
			else
				{
					$bgcolor ='#CDE7FF';
				}		
					$st1 = MYSQL_RESULT($result,$i,"stime_s_id");
			 if ($st1 == $tr){	
					$c = '#81F781';
						}
			else {	
					$c = '#ffffff';
						}
if ($c == "#81F781"){ ?>
<td><?php echo $time; ?></td>
<td bgcolor="<?php echo color('1','1'); ?>"><font color="#FFFFFF"><?php echo abc('1','1'); ?></font></td>
<td bgcolor="<?php echo color('2','1'); ?>"><font color="#FFFFFF"><?php echo abc('2','1'); ?></font></td>
<td bgcolor="<?php echo color('3','1'); ?>"><font color="#FFFFFF"><?php echo abc('3','1'); ?></font></td>
<td bgcolor="<?php echo color('4','1'); ?>"><font color="#FFFFFF"><?php echo abc('4','1'); ?></font></td>
<td bgcolor="<?php echo color('5','1'); ?>"><font color="#FFFFFF"><?php echo abc('5','1'); ?></font></td>
<td bgcolor="<?php echo color('6','1'); ?>"><font color="#FFFFFF"><?php echo abc('6','1'); ?></font></td>
<td bgcolor="<?php echo color('7','1'); ?>"><font color="#FFFFFF"><?php echo abc('7','1'); ?></font></td>
<?php }
	$i++;	 
			}
			 ?>
</tr></tbody>
<tbody><tr>
								<?php $pT =$_REQUEST['Course_ID'];
								$time = "12:30-01:00 AM";
								$tr = "2";
			$result = mysql_query("SELECT * FROM sched HAVING course_id = $pT and stime_s_id = $tr");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0) 
			{
			echo "";
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
		
			if(($i%2)==0) 
				{
					$bgcolor ='#FFFFFF';
				}
			else
				{
					$bgcolor ='#CDE7FF';
				}		
					$st1 = MYSQL_RESULT($result,$i,"stime_s_id");
			 if ($st1 == $tr){	
					$c = '#81F781';
						}
			else {	
					$c = '#ffffff';
						}
if ($c == "#81F781"){ ?><td><?php echo $time; ?></td>
<td bgcolor="<?php echo color('1','2'); ?>"><font color="#FFFFFF"><?php echo abc('1','2'); ?></font></td>
<td bgcolor="<?php echo color('2','2'); ?>"><font color="#FFFFFF"><?php echo abc('2','2'); ?></font></td>
<td bgcolor="<?php echo color('3','2'); ?>"><font color="#FFFFFF"><?php echo abc('3','2'); ?></font></td>
<td bgcolor="<?php echo color('4','2'); ?>"><font color="#FFFFFF"><?php echo abc('4','2'); ?></font></td>
<td bgcolor="<?php echo color('5','2'); ?>"><font color="#FFFFFF"><?php echo abc('5','2'); ?></font></td>
<td bgcolor="<?php echo color('6','2'); ?>"><font color="#FFFFFF"><?php echo abc('6','2'); ?></font></td>
<td bgcolor="<?php echo color('7','2'); ?>"><font color="#FFFFFF"><?php echo abc('7','2'); ?></font></td>
<?php }
	$i++;	 
			}
			 ?>
</tr></tbody>
<tbody><tr>
								<?php $pT =$_REQUEST['Course_ID'];
								$time = "01:00-01:30 AM";
								$tr = "3";
			$result = mysql_query("SELECT * FROM sched HAVING course_id = $pT and stime_s_id = $tr");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0) 
			{
			echo "";
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
		
			if(($i%2)==0) 
				{
					$bgcolor ='#FFFFFF';
				}
			else
				{
					$bgcolor ='#CDE7FF';
				}		
					$st1 = MYSQL_RESULT($result,$i,"stime_s_id");
			 if ($st1 == $tr){	
					$c = '#81F781';
						}
			else {	
					$c = '#ffffff';
						}
if ($c == "#81F781"){ ?><td><?php echo $time; ?></td>
<td bgcolor="<?php echo color('1','3'); ?>"><font color="#FFFFFF"><?php echo abc('1','3'); ?></font></td>
<td bgcolor="<?php echo color('2','3'); ?>"><font color="#FFFFFF"><?php echo abc('2','3'); ?></font></td>
<td bgcolor="<?php echo color('3','3'); ?>"><font color="#FFFFFF"><?php echo abc('3','3'); ?></font></td>
<td bgcolor="<?php echo color('4','3'); ?>"><font color="#FFFFFF"><?php echo abc('4','3'); ?></font></td>
<td bgcolor="<?php echo color('5','3'); ?>"><font color="#FFFFFF"><?php echo abc('5','3'); ?></font></td>
<td bgcolor="<?php echo color('6','3'); ?>"><font color="#FFFFFF"><?php echo abc('6','3'); ?></font></td>
<td bgcolor="<?php echo color('7','3'); ?>"><font color="#FFFFFF"><?php echo abc('7','3'); ?></font></td>
<?php }
	$i++;	 
			}
			 ?>
</tr></tbody>
<tbody><tr>
								<?php $pT =$_REQUEST['Course_ID'];
								$time = "01:30-02:00 AM";
								$result = mysql_query("SELECT * FROM sched HAVING course_id = $pT and stime_s_id = $tr");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0) 
			{
			echo "";
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
		
			if(($i%2)==0) 
				{
					$bgcolor ='#FFFFFF';
				}
			else
				{
					$bgcolor ='#CDE7FF';
				}		
					$st1 = MYSQL_RESULT($result,$i,"stime_s_id");
			 if ($st1 == $tr){	
					$c = '#81F781';
						}
			else {	
					$c = '#ffffff';
						}
if ($c == "#81F781"){ ?><td><?php echo $time; ?></td>
<td bgcolor="<?php echo color('1','4'); ?>"><font color="#FFFFFF"><?php echo abc('1','4'); ?></font></td>
<td bgcolor="<?php echo color('2','4'); ?>"><font color="#FFFFFF"><?php echo abc('2','4'); ?></font></td>
<td bgcolor="<?php echo color('3','4'); ?>"><font color="#FFFFFF"><?php echo abc('3','4'); ?></font></td>
<td bgcolor="<?php echo color('4','4'); ?>"><font color="#FFFFFF"><?php echo abc('4','4'); ?></font></td>
<td bgcolor="<?php echo color('5','4'); ?>"><font color="#FFFFFF"><?php echo abc('5','4'); ?></font></td>
<td bgcolor="<?php echo color('6','4'); ?>"><font color="#FFFFFF"><?php echo abc('6','4'); ?></font></td>
<td bgcolor="<?php echo color('7','4'); ?>"><font color="#FFFFFF"><?php echo abc('7','4'); ?></font></td>
<?php }
	$i++;	 
			}
			 ?>
</tr></tbody>
<tbody><tr>
								<?php $pT =$_REQUEST['Course_ID'];
								$time = "02:00-02:30 AM";
								$tr = "5";
			$result = mysql_query("SELECT * FROM sched HAVING course_id = $pT and stime_s_id = $tr");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0) 
			{
			echo "";
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
		
			if(($i%2)==0) 
				{
					$bgcolor ='#FFFFFF';
				}
			else
				{
					$bgcolor ='#CDE7FF';
				}		
					$st1 = MYSQL_RESULT($result,$i,"stime_s_id");
			 if ($st1 == $tr){	
					$c = '#81F781';
						}
			else {	
					$c = '#ffffff';
						}
if ($c == "#81F781"){ ?><td><?php echo $time; ?></td>
<td bgcolor="<?php echo color('1','5'); ?>"><font color="#FFFFFF"><?php echo abc('1','5'); ?></font></td>
<td bgcolor="<?php echo color('2','5'); ?>"><font color="#FFFFFF"><?php echo abc('2','5'); ?></font></td>
<td bgcolor="<?php echo color('3','5'); ?>"><font color="#FFFFFF"><?php echo abc('3','5'); ?></font></td>
<td bgcolor="<?php echo color('4','5'); ?>"><font color="#FFFFFF"><?php echo abc('4','5'); ?></font></td>
<td bgcolor="<?php echo color('5','5'); ?>"><font color="#FFFFFF"><?php echo abc('5','5'); ?></font></td>
<td bgcolor="<?php echo color('6','5'); ?>"><font color="#FFFFFF"><?php echo abc('6','5'); ?></font></td>
<td bgcolor="<?php echo color('7','5'); ?>"><font color="#FFFFFF"><?php echo abc('7','5'); ?></font></td>
<?php }
	$i++;	 
			}
			 ?>
</tr></tbody>
<tbody><tr>
								<?php $pT =$_REQUEST['Course_ID'];
								$time = "02:30-03:00 AM";
								$tr = "6";
			$result = mysql_query("SELECT * FROM sched HAVING course_id = $pT and stime_s_id = $tr");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0) 
			{
			echo "";
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
		
			if(($i%2)==0) 
				{
					$bgcolor ='#FFFFFF';
				}
			else
				{
					$bgcolor ='#CDE7FF';
				}		
					$st1 = MYSQL_RESULT($result,$i,"stime_s_id");
			 if ($st1 == $tr){	
					$c = '#81F781';
						}
			else {	
					$c = '#ffffff';
						}
if ($c == "#81F781"){ ?><td><?php echo $time; ?></td>
<td bgcolor="<?php echo color('1','6'); ?>"><font color="#FFFFFF"><?php echo abc('1','6'); ?></font></td>
<td bgcolor="<?php echo color('2','6'); ?>"><font color="#FFFFFF"><?php echo abc('2','6'); ?></font></td>
<td bgcolor="<?php echo color('3','6'); ?>"><font color="#FFFFFF"><?php echo abc('3','6'); ?></font></td>
<td bgcolor="<?php echo color('4','6'); ?>"><font color="#FFFFFF"><?php echo abc('4','6'); ?></font></td>
<td bgcolor="<?php echo color('5','6'); ?>"><font color="#FFFFFF"><?php echo abc('5','6'); ?></font></td>
<td bgcolor="<?php echo color('6','6'); ?>"><font color="#FFFFFF"><?php echo abc('6','6'); ?></font></td>
<td bgcolor="<?php echo color('7','6'); ?>"><font color="#FFFFFF"><?php echo abc('7','6'); ?></font></td>
<?php }
	$i++;	 
			}
			 ?>
</tr></tbody>
<tbody><tr>
								<?php $pT =$_REQUEST['Course_ID'];
								$time = "03:00-03:30 AM";
								$tr = "7";
			$result = mysql_query("SELECT * FROM sched HAVING course_id = $pT and stime_s_id = $tr");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0) 
			{
			echo "";
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
		
			if(($i%2)==0) 
				{
					$bgcolor ='#FFFFFF';
				}
			else
				{
					$bgcolor ='#CDE7FF';
				}		
					$st1 = MYSQL_RESULT($result,$i,"stime_s_id");
			 if ($st1 == $tr){	
					$c = '#81F781';
						}
			else {	
					$c = '#ffffff';
						}
if ($c == "#81F781"){ ?><td><?php echo $time; ?></td>
<td bgcolor="<?php echo color('1','7'); ?>"><font color="#FFFFFF"><?php echo abc('1','7'); ?></font></td>
<td bgcolor="<?php echo color('2','7'); ?>"><font color="#FFFFFF"><?php echo abc('2','7'); ?></font></td>
<td bgcolor="<?php echo color('3','7'); ?>"><font color="#FFFFFF"><?php echo abc('3','7'); ?></font></td>
<td bgcolor="<?php echo color('4','7'); ?>"><font color="#FFFFFF"><?php echo abc('4','7'); ?></font></td>
<td bgcolor="<?php echo color('5','7'); ?>"><font color="#FFFFFF"><?php echo abc('5','7'); ?></font></td>
<td bgcolor="<?php echo color('6','7'); ?>"><font color="#FFFFFF"><?php echo abc('6','7'); ?></font></td>
<td bgcolor="<?php echo color('7','7'); ?>"><font color="#FFFFFF"><?php echo abc('7','7'); ?></font></td>
<?php }
	$i++;	 
			}
			 ?>
</tr></tbody>
<tbody><tr>
								<?php $pT =$_REQUEST['Course_ID'];
								$time = "03:30-04:00 AM";
								$tr = "8";
			$result = mysql_query("SELECT * FROM sched HAVING course_id = $pT and stime_s_id = $tr");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0) 
			{
			echo "";
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
		
			if(($i%2)==0) 
				{
					$bgcolor ='#FFFFFF';
				}
			else
				{
					$bgcolor ='#CDE7FF';
				}		
					$st1 = MYSQL_RESULT($result,$i,"stime_s_id");
			 if ($st1 == $tr){	
					$c = '#81F781';
						}
			else {	
					$c = '#ffffff';
						}
if ($c == "#81F781"){ ?><td><?php echo $time; ?></td>
<td bgcolor="<?php echo color('1','8'); ?>"><font color="#FFFFFF"><?php echo abc('1','8'); ?></font></td>
<td bgcolor="<?php echo color('2','8'); ?>"><font color="#FFFFFF"><?php echo abc('2','8'); ?></font></td>
<td bgcolor="<?php echo color('3','8'); ?>"><font color="#FFFFFF"><?php echo abc('3','8'); ?></font></td>
<td bgcolor="<?php echo color('4','8'); ?>"><font color="#FFFFFF"><?php echo abc('4','8'); ?></font></td>
<td bgcolor="<?php echo color('5','8'); ?>"><font color="#FFFFFF"><?php echo abc('5','8'); ?></font></td>
<td bgcolor="<?php echo color('6','8'); ?>"><font color="#FFFFFF"><?php echo abc('6','8'); ?></font></td>
<td bgcolor="<?php echo color('7','8'); ?>"><font color="#FFFFFF"><?php echo abc('7','8'); ?></font></td>
<?php }
	$i++;	 
			}
			 ?>
</tr></tbody>
<tbody><tr>
								<?php $pT =$_REQUEST['Course_ID'];
								$time = "04:00-04:30 AM";
								$tr = "9";
			$result = mysql_query("SELECT * FROM sched HAVING course_id = $pT and stime_s_id = $tr");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0) 
			{
			echo "";
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
		
			if(($i%2)==0) 
				{
					$bgcolor ='#FFFFFF';
				}
			else
				{
					$bgcolor ='#CDE7FF';
				}		
					$st1 = MYSQL_RESULT($result,$i,"stime_s_id");
			 if ($st1 == $tr){	
					$c = '#81F781';
						}
			else {	
					$c = '#ffffff';
						}
if ($c == "#81F781"){ ?><td><?php echo $time; ?></td>
<td bgcolor="<?php echo color('1','9'); ?>"><font color="#FFFFFF"><?php echo abc('1','9'); ?></font></td>
<td bgcolor="<?php echo color('2','9'); ?>"><font color="#FFFFFF"><?php echo abc('2','9'); ?></font></td>
<td bgcolor="<?php echo color('3','9'); ?>"><font color="#FFFFFF"><?php echo abc('3','9'); ?></font></td>
<td bgcolor="<?php echo color('4','9'); ?>"><font color="#FFFFFF"><?php echo abc('4','9'); ?></font></td>
<td bgcolor="<?php echo color('5','9'); ?>"><font color="#FFFFFF"><?php echo abc('5','9'); ?></font></td>
<td bgcolor="<?php echo color('6','9'); ?>"><font color="#FFFFFF"><?php echo abc('6','9'); ?></font></td>
<td bgcolor="<?php echo color('7','9'); ?>"><font color="#FFFFFF"><?php echo abc('7','9'); ?></font></td>
<?php }
	$i++;	 
			}
			 ?>
</tr></tbody>
<tbody><tr>
								<?php $pT =$_REQUEST['Course_ID'];
								$time = "04:30-05:00 AM";
								$tr = "10";
			$result = mysql_query("SELECT * FROM sched HAVING course_id = $pT and stime_s_id = $tr");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0) 
			{
			echo "";
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
		
			if(($i%2)==0) 
				{
					$bgcolor ='#FFFFFF';
				}
			else
				{
					$bgcolor ='#CDE7FF';
				}		
					$st1 = MYSQL_RESULT($result,$i,"stime_s_id");
			 if ($st1 == $tr){	
					$c = '#81F781';
						}
			else {	
					$c = '#ffffff';
						}
if ($c == "#81F781"){ ?><td><?php echo $time; ?></td>
<td bgcolor="<?php echo color('1','10'); ?>"><font color="#FFFFFF"><?php echo abc('1','10'); ?></font></td>
<td bgcolor="<?php echo color('2','10'); ?>"><font color="#FFFFFF"><?php echo abc('2','10'); ?></font></td>
<td bgcolor="<?php echo color('3','10'); ?>"><font color="#FFFFFF"><?php echo abc('3','10'); ?></font></td>
<td bgcolor="<?php echo color('4','10'); ?>"><font color="#FFFFFF"><?php echo abc('4','10'); ?></font></td>
<td bgcolor="<?php echo color('5','10'); ?>"><font color="#FFFFFF"><?php echo abc('5','10'); ?></font></td>
<td bgcolor="<?php echo color('6','10'); ?>"><font color="#FFFFFF"><?php echo abc('6','10'); ?></font></td>
<td bgcolor="<?php echo color('7','10'); ?>"><font color="#FFFFFF"><?php echo abc('7','10'); ?></font></td>
<?php }
	$i++;	 
			}
			 ?>
</tr></tbody>
<tbody><tr>
								<?php $pT =$_REQUEST['Course_ID'];
								$time = "05:00-05:30 AM";
								$tr = "11";
			$result = mysql_query("SELECT * FROM sched HAVING course_id = $pT and stime_s_id = $tr");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0) 
			{
			echo "";
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
		
			if(($i%2)==0) 
				{
					$bgcolor ='#FFFFFF';
				}
			else
				{
					$bgcolor ='#CDE7FF';
				}		
					$st1 = MYSQL_RESULT($result,$i,"stime_s_id");
			 if ($st1 == $tr){	
					$c = '#81F781';
						}
			else {	
					$c = '#ffffff';
						}
if ($c == "#81F781"){ ?><td><?php echo $time; ?></td>
<td bgcolor="<?php echo color('1','11'); ?>"><font color="#FFFFFF"><?php echo abc('1','11'); ?></font></td>
<td bgcolor="<?php echo color('2','11'); ?>"><font color="#FFFFFF"><?php echo abc('2','11'); ?></font></td>
<td bgcolor="<?php echo color('3','11'); ?>"><font color="#FFFFFF"><?php echo abc('3','11'); ?></font></td>
<td bgcolor="<?php echo color('4','11'); ?>"><font color="#FFFFFF"><?php echo abc('4','11'); ?></font></td>
<td bgcolor="<?php echo color('5','11'); ?>"><font color="#FFFFFF"><?php echo abc('5','11'); ?></font></td>
<td bgcolor="<?php echo color('6','11'); ?>"><font color="#FFFFFF"><?php echo abc('6','11'); ?></font></td>
<td bgcolor="<?php echo color('7','11'); ?>"><font color="#FFFFFF"><?php echo abc('7','11'); ?></font></td>
<?php }
	$i++;	 
			}
			 ?>
</tr></tbody>
<tbody><tr>
								<?php $pT =$_REQUEST['Course_ID'];
								$time = "05:30-06:00 AM";
								$tr = "12";
			$result = mysql_query("SELECT * FROM sched HAVING course_id = $pT and stime_s_id = $tr");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0) 
			{
			echo "";
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
		
			if(($i%2)==0) 
				{
					$bgcolor ='#FFFFFF';
				}
			else
				{
					$bgcolor ='#CDE7FF';
				}		
					$st1 = MYSQL_RESULT($result,$i,"stime_s_id");
			 if ($st1 == $tr){	
					$c = '#81F781';
						}
			else {	
					$c = '#ffffff';
						}
if ($c == "#81F781"){ ?><td><?php echo $time; ?></td>
<td bgcolor="<?php echo color('1','12'); ?>"><font color="#FFFFFF"><?php echo abc('1','12'); ?></font></td>
<td bgcolor="<?php echo color('2','12'); ?>"><font color="#FFFFFF"><?php echo abc('2','12'); ?></font></td>
<td bgcolor="<?php echo color('3','12'); ?>"><font color="#FFFFFF"><?php echo abc('3','12'); ?></font></td>
<td bgcolor="<?php echo color('4','12'); ?>"><font color="#FFFFFF"><?php echo abc('4','12'); ?></font></td>
<td bgcolor="<?php echo color('5','12'); ?>"><font color="#FFFFFF"><?php echo abc('5','12'); ?></font></td>
<td bgcolor="<?php echo color('6','12'); ?>"><font color="#FFFFFF"><?php echo abc('6','12'); ?></font></td>
<td bgcolor="<?php echo color('7','12'); ?>"><font color="#FFFFFF"><?php echo abc('7','12'); ?></font></td>
<?php }
	$i++;	 
			}
			 ?>
</tr></tbody>
<tbody><tr>
								<?php $pT =$_REQUEST['Course_ID'];
								$time = "06:00-06:30 AM";
								$tr = "13";
			$result = mysql_query("SELECT * FROM sched HAVING course_id = $pT and stime_s_id = $tr");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0) 
			{
			echo "";
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
		
			if(($i%2)==0) 
				{
					$bgcolor ='#FFFFFF';
				}
			else
				{
					$bgcolor ='#CDE7FF';
				}		
					$st1 = MYSQL_RESULT($result,$i,"stime_s_id");
			 if ($st1 == $tr){	
					$c = '#81F781';
						}
			else {	
					$c = '#ffffff';
						}
if ($c == "#81F781"){ ?><td><?php echo $time; ?></td>
<td bgcolor="<?php echo color('1','13'); ?>"><font color="#FFFFFF"><?php echo abc('1','13'); ?></font></td>
<td bgcolor="<?php echo color('2','13'); ?>"><font color="#FFFFFF"><?php echo abc('2','13'); ?></font></td>
<td bgcolor="<?php echo color('3','13'); ?>"><font color="#FFFFFF"><?php echo abc('3','13'); ?></font></td>
<td bgcolor="<?php echo color('4','13'); ?>"><font color="#FFFFFF"><?php echo abc('4','13'); ?></font></td>
<td bgcolor="<?php echo color('5','13'); ?>"><font color="#FFFFFF"><?php echo abc('5','13'); ?></font></td>
<td bgcolor="<?php echo color('6','13'); ?>"><font color="#FFFFFF"><?php echo abc('6','13'); ?></font></td>
<td bgcolor="<?php echo color('7','13'); ?>"><font color="#FFFFFF"><?php echo abc('7','13'); ?></font></td>
<?php }
	$i++;	 
			}
			 ?>
</tr></tbody>
<tbody><tr>
								<?php $pT =$_REQUEST['Course_ID'];
								$time = "06:30-07:00 AM";
								$tr = "14";
			$result = mysql_query("SELECT * FROM sched HAVING course_id = $pT and stime_s_id = $tr");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0) 
			{
			echo "";
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
		
			if(($i%2)==0) 
				{
					$bgcolor ='#FFFFFF';
				}
			else
				{
					$bgcolor ='#CDE7FF';
				}		
					$st1 = MYSQL_RESULT($result,$i,"stime_s_id");
			 if ($st1 == $tr){	
					$c = '#81F781';
						}
			else {	
					$c = '#ffffff';
						}
if ($c == "#81F781"){ ?><td><?php echo $time; ?></td>
<td bgcolor="<?php echo color('1','14'); ?>"><font color="#FFFFFF"><?php echo abc('1','14'); ?></font></td>
<td bgcolor="<?php echo color('2','14'); ?>"><font color="#FFFFFF"><?php echo abc('2','14'); ?></font></td>
<td bgcolor="<?php echo color('3','14'); ?>"><font color="#FFFFFF"><?php echo abc('3','14'); ?></font></td>
<td bgcolor="<?php echo color('4','14'); ?>"><font color="#FFFFFF"><?php echo abc('4','14'); ?></font></td>
<td bgcolor="<?php echo color('5','14'); ?>"><font color="#FFFFFF"><?php echo abc('5','14'); ?></font></td>
<td bgcolor="<?php echo color('6','14'); ?>"><font color="#FFFFFF"><?php echo abc('6','14'); ?></font></td>
<td bgcolor="<?php echo color('7','14'); ?>"><font color="#FFFFFF"><?php echo abc('7','14'); ?></font></td>
<?php }
	$i++;	 
			}
			 ?>
</tr></tbody>
<tbody><tr>
								<?php $pT =$_REQUEST['Course_ID'];
								$time = "07:00-07:30 AM";
								$tr = "15";
			$result = mysql_query("SELECT * FROM sched HAVING course_id = $pT and stime_s_id = $tr");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0) 
			{
			echo "";
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
		
			if(($i%2)==0) 
				{
					$bgcolor ='#FFFFFF';
				}
			else
				{
					$bgcolor ='#CDE7FF';
				}		
					$st1 = MYSQL_RESULT($result,$i,"stime_s_id");
			 if ($st1 == $tr){	
					$c = '#81F781';
						}
			else {	
					$c = '#ffffff';
						}
if ($c == "#81F781"){ ?><td><?php echo $time; ?></td>
<td bgcolor="<?php echo color('1','15'); ?>"><font color="#FFFFFF"><?php echo abc('1','15'); ?></font></td>
<td bgcolor="<?php echo color('2','15'); ?>"><font color="#FFFFFF"><?php echo abc('2','15'); ?></font></td>
<td bgcolor="<?php echo color('3','15'); ?>"><font color="#FFFFFF"><?php echo abc('3','15'); ?></font></td>
<td bgcolor="<?php echo color('4','15'); ?>"><font color="#FFFFFF"><?php echo abc('4','15'); ?></font></td>
<td bgcolor="<?php echo color('5','15'); ?>"><font color="#FFFFFF"><?php echo abc('5','15'); ?></font></td>
<td bgcolor="<?php echo color('6','15'); ?>"><font color="#FFFFFF"><?php echo abc('6','15'); ?></font></td>
<td bgcolor="<?php echo color('7','15'); ?>"><font color="#FFFFFF"><?php echo abc('7','15'); ?></font></td>
<?php }
	$i++;	 
			}
			 ?>
</tr></tbody>
<tbody><tr>
								<?php $pT =$_REQUEST['Course_ID'];
								$time = "07:30-08:00 AM";
								$tr = "16";
			$result = mysql_query("SELECT * FROM sched HAVING course_id = $pT and stime_s_id = $tr");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0) 
			{
			echo "";
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
		
			if(($i%2)==0) 
				{
					$bgcolor ='#FFFFFF';
				}
			else
				{
					$bgcolor ='#CDE7FF';
				}		
					$st1 = MYSQL_RESULT($result,$i,"stime_s_id");
			 if ($st1 == $tr){	
					$c = '#81F781';
						}
			else {	
					$c = '#ffffff';
						}
if ($c == "#81F781"){ ?><td><?php echo $time; ?></td>
<td bgcolor="<?php echo color('1','16'); ?>"><font color="#FFFFFF"><?php echo abc('1','16'); ?></font></td>
<td bgcolor="<?php echo color('2','16'); ?>"><font color="#FFFFFF"><?php echo abc('2','16'); ?></font></td>
<td bgcolor="<?php echo color('3','16'); ?>"><font color="#FFFFFF"><?php echo abc('3','16'); ?></font></td>
<td bgcolor="<?php echo color('4','16'); ?>"><font color="#FFFFFF"><?php echo abc('4','16'); ?></font></td>
<td bgcolor="<?php echo color('5','16'); ?>"><font color="#FFFFFF"><?php echo abc('5','16'); ?></font></td>
<td bgcolor="<?php echo color('6','16'); ?>"><font color="#FFFFFF"><?php echo abc('6','16'); ?></font></td>
<td bgcolor="<?php echo color('7','16'); ?>"><font color="#FFFFFF"><?php echo abc('7','16'); ?></font></td>
<?php }
	$i++;	 
			}
			 ?>
</tr></tbody>
<tbody><tr>
								<?php $pT =$_REQUEST['Course_ID'];
								$time = "08:00-08:30 AM";
								$tr = "17";
			$result = mysql_query("SELECT * FROM sched HAVING course_id = $pT and stime_s_id = $tr");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0) 
			{
			echo "";
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
		
			if(($i%2)==0) 
				{
					$bgcolor ='#FFFFFF';
				}
			else
				{
					$bgcolor ='#CDE7FF';
				}		
					$st1 = MYSQL_RESULT($result,$i,"stime_s_id");
			 if ($st1 == $tr){	
					$c = '#81F781';
						}
			else {	
					$c = '#ffffff';
						}
if ($c == "#81F781"){ ?><td><?php echo $time; ?></td>
<td bgcolor="<?php echo color('1','17'); ?>"><font color="#FFFFFF"><?php echo abc('1','17'); ?></font></td>
<td bgcolor="<?php echo color('2','17'); ?>"><font color="#FFFFFF"><?php echo abc('2','17'); ?></font></td>
<td bgcolor="<?php echo color('3','17'); ?>"><font color="#FFFFFF"><?php echo abc('3','17'); ?></font></td>
<td bgcolor="<?php echo color('4','17'); ?>"><font color="#FFFFFF"><?php echo abc('4','17'); ?></font></td>
<td bgcolor="<?php echo color('5','17'); ?>"><font color="#FFFFFF"><?php echo abc('5','17'); ?></font></td>
<td bgcolor="<?php echo color('6','17'); ?>"><font color="#FFFFFF"><?php echo abc('6','17'); ?></font></td>
<td bgcolor="<?php echo color('7','17'); ?>"><font color="#FFFFFF"><?php echo abc('7','17'); ?></font></td>
<?php }
	$i++;	 
			}
			 ?>
</tr></tbody>
<tbody><tr>
								<?php $pT =$_REQUEST['Course_ID'];
								$time = "08:30-09:00 AM";
								$tr = "18";
			$result = mysql_query("SELECT * FROM sched HAVING course_id = $pT and stime_s_id = $tr");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0) 
			{
			echo "";
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
		
			if(($i%2)==0) 
				{
					$bgcolor ='#FFFFFF';
				}
			else
				{
					$bgcolor ='#CDE7FF';
				}		
					$st1 = MYSQL_RESULT($result,$i,"stime_s_id");
			 if ($st1 == $tr){	
					$c = '#81F781';
						}
			else {	
					$c = '#ffffff';
						}
if ($c == "#81F781"){ ?><td><?php echo $time; ?></td>
<td bgcolor="<?php echo color('1','18'); ?>"><font color="#FFFFFF"><?php echo abc('1','18'); ?></font></td>
<td bgcolor="<?php echo color('2','18'); ?>"><font color="#FFFFFF"><?php echo abc('2','18'); ?></font></td>
<td bgcolor="<?php echo color('3','18'); ?>"><font color="#FFFFFF"><?php echo abc('3','18'); ?></font></td>
<td bgcolor="<?php echo color('4','18'); ?>"><font color="#FFFFFF"><?php echo abc('4','18'); ?></font></td>
<td bgcolor="<?php echo color('5','18'); ?>"><font color="#FFFFFF"><?php echo abc('5','18'); ?></font></td>
<td bgcolor="<?php echo color('6','18'); ?>"><font color="#FFFFFF"><?php echo abc('6','18'); ?></font></td>
<td bgcolor="<?php echo color('7','18'); ?>"><font color="#FFFFFF"><?php echo abc('7','18'); ?></font></td>
<?php }
	$i++;	 
			}
			 ?>
</tr></tbody>
<tbody><tr>
								<?php $pT =$_REQUEST['Course_ID'];
								$time = "09:00-09:30 AM";
								$tr = "19";
			$result = mysql_query("SELECT * FROM sched HAVING course_id = $pT and stime_s_id = $tr");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0) 
			{
			echo "";
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
		
			if(($i%2)==0) 
				{
					$bgcolor ='#FFFFFF';
				}
			else
				{
					$bgcolor ='#CDE7FF';
				}		
					$st1 = MYSQL_RESULT($result,$i,"stime_s_id");
			 if ($st1 == $tr){	
					$c = '#81F781';
						}
			else {	
					$c = '#ffffff';
						}
if ($c == "#81F781"){ ?><td><?php echo $time; ?></td>
<td bgcolor="<?php echo color('1','19'); ?>"><font color="#FFFFFF"><?php echo abc('1','19'); ?></font></td>
<td bgcolor="<?php echo color('2','19'); ?>"><font color="#FFFFFF"><?php echo abc('2','19'); ?></font></td>
<td bgcolor="<?php echo color('3','19'); ?>"><font color="#FFFFFF"><?php echo abc('3','19'); ?></font></td>
<td bgcolor="<?php echo color('4','19'); ?>"><font color="#FFFFFF"><?php echo abc('4','19'); ?></font></td>
<td bgcolor="<?php echo color('5','19'); ?>"><font color="#FFFFFF"><?php echo abc('5','19'); ?></font></td>
<td bgcolor="<?php echo color('6','19'); ?>"><font color="#FFFFFF"><?php echo abc('6','19'); ?></font></td>
<td bgcolor="<?php echo color('7','19'); ?>"><font color="#FFFFFF"><?php echo abc('7','19'); ?></font></td>
<?php }
	$i++;	 
			}
			 ?>
</tr></tbody>
<tbody><tr>
								<?php $pT =$_REQUEST['Course_ID'];
								$time = "09:30-10:00 AM";
								$tr = "20";
			$result = mysql_query("SELECT * FROM sched HAVING course_id = $pT and stime_s_id = $tr");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0) 
			{
			echo "";
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
		
			if(($i%2)==0) 
				{
					$bgcolor ='#FFFFFF';
				}
			else
				{
					$bgcolor ='#CDE7FF';
				}		
					$st1 = MYSQL_RESULT($result,$i,"stime_s_id");
			 if ($st1 == $tr){	
					$c = '#81F781';
						}
			else {	
					$c = '#ffffff';
						}
if ($c == "#81F781"){ ?><td><?php echo $time; ?></td>
<td bgcolor="<?php echo color('1','20'); ?>"><font color="#FFFFFF"><?php echo abc('1','20'); ?></font></td>
<td bgcolor="<?php echo color('2','20'); ?>"><font color="#FFFFFF"><?php echo abc('2','20'); ?></font></td>
<td bgcolor="<?php echo color('3','20'); ?>"><font color="#FFFFFF"><?php echo abc('3','20'); ?></font></td>
<td bgcolor="<?php echo color('4','20'); ?>"><font color="#FFFFFF"><?php echo abc('4','20'); ?></font></td>
<td bgcolor="<?php echo color('5','20'); ?>"><font color="#FFFFFF"><?php echo abc('5','20'); ?></font></td>
<td bgcolor="<?php echo color('6','20'); ?>"><font color="#FFFFFF"><?php echo abc('6','20'); ?></font></td>
<td bgcolor="<?php echo color('7','20'); ?>"><font color="#FFFFFF"><?php echo abc('7','20'); ?></font></td>
<?php }
	$i++;	 
			}
			 ?>
</tr></tbody>
<tbody><tr>
								<?php $pT =$_REQUEST['Course_ID'];
								$time = "10:00-10:30 AM";
								$tr = "21";
			$result = mysql_query("SELECT * FROM sched HAVING course_id = $pT and stime_s_id = $tr");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0) 
			{
			echo "";
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
		
			if(($i%2)==0) 
				{
					$bgcolor ='#FFFFFF';
				}
			else
				{
					$bgcolor ='#CDE7FF';
				}		
					$st1 = MYSQL_RESULT($result,$i,"stime_s_id");
			 if ($st1 == $tr){	
					$c = '#81F781';
						}
			else {	
					$c = '#ffffff';
						}
if ($c == "#81F781"){ ?><td><?php echo $time; ?></td>
<td bgcolor="<?php echo color('1','21'); ?>"><font color="#FFFFFF"><?php echo abc('1','21'); ?></font></td>
<td bgcolor="<?php echo color('2','21'); ?>"><font color="#FFFFFF"><?php echo abc('2','21'); ?></font></td>
<td bgcolor="<?php echo color('3','21'); ?>"><font color="#FFFFFF"><?php echo abc('3','21'); ?></font></td>
<td bgcolor="<?php echo color('4','21'); ?>"><font color="#FFFFFF"><?php echo abc('4','21'); ?></font></td>
<td bgcolor="<?php echo color('5','21'); ?>"><font color="#FFFFFF"><?php echo abc('5','21'); ?></font></td>
<td bgcolor="<?php echo color('6','21'); ?>"><font color="#FFFFFF"><?php echo abc('6','21'); ?></font></td>
<td bgcolor="<?php echo color('7','21'); ?>"><font color="#FFFFFF"><?php echo abc('7','21'); ?></font></td>
<?php }
	$i++;	 
			}
			 ?>
</tr></tbody>
<tbody><tr>
								<?php $pT =$_REQUEST['Course_ID'];
								$time = "10:30-11:00 AM";
								$tr = "22";
			$result = mysql_query("SELECT * FROM sched HAVING course_id = $pT and stime_s_id = $tr");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0) 
			{
			echo "";
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
		
			if(($i%2)==0) 
				{
					$bgcolor ='#FFFFFF';
				}
			else
				{
					$bgcolor ='#CDE7FF';
				}		
					$st1 = MYSQL_RESULT($result,$i,"stime_s_id");
			 if ($st1 == $tr){	
					$c = '#81F781';
						}
			else {	
					$c = '#ffffff';
						}
if ($c == "#81F781"){ ?><td><?php echo $time; ?></td>
<td bgcolor="<?php echo color('1','22'); ?>"><font color="#FFFFFF"><?php echo abc('1','22'); ?></font></td>
<td bgcolor="<?php echo color('2','22'); ?>"><font color="#FFFFFF"><?php echo abc('2','22'); ?></font></td>
<td bgcolor="<?php echo color('3','22'); ?>"><font color="#FFFFFF"><?php echo abc('3','22'); ?></font></td>
<td bgcolor="<?php echo color('4','22'); ?>"><font color="#FFFFFF"><?php echo abc('4','22'); ?></font></td>
<td bgcolor="<?php echo color('5','22'); ?>"><font color="#FFFFFF"><?php echo abc('5','22'); ?></font></td>
<td bgcolor="<?php echo color('6','22'); ?>"><font color="#FFFFFF"><?php echo abc('6','22'); ?></font></td>
<td bgcolor="<?php echo color('7','22'); ?>"><font color="#FFFFFF"><?php echo abc('7','22'); ?></font></td>
<?php }
	$i++;	 
			}
			 ?>
</tr></tbody>
<tbody><tr>
								<?php $pT =$_REQUEST['Course_ID'];
								$time = "11:00-11:30 AM";
								$tr = "23";
			$result = mysql_query("SELECT * FROM sched HAVING course_id = $pT and stime_s_id = $tr");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0) 
			{
			echo "";
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
		
			if(($i%2)==0) 
				{
					$bgcolor ='#FFFFFF';
				}
			else
				{
					$bgcolor ='#CDE7FF';
				}		
					$st1 = MYSQL_RESULT($result,$i,"stime_s_id");
			 if ($st1 == $tr){	
					$c = '#81F781';
						}
			else {	
					$c = '#ffffff';
						}
if ($c == "#81F781"){ ?><td><?php echo $time; ?></td>
<td bgcolor="<?php echo color('1','23'); ?>"><font color="#FFFFFF"><?php echo abc('1','23'); ?></font></td>
<td bgcolor="<?php echo color('2','23'); ?>"><font color="#FFFFFF"><?php echo abc('2','23'); ?></font></td>
<td bgcolor="<?php echo color('3','23'); ?>"><font color="#FFFFFF"><?php echo abc('3','23'); ?></font></td>
<td bgcolor="<?php echo color('4','23'); ?>"><font color="#FFFFFF"><?php echo abc('4','23'); ?></font></td>
<td bgcolor="<?php echo color('5','23'); ?>"><font color="#FFFFFF"><?php echo abc('5','23'); ?></font></td>
<td bgcolor="<?php echo color('6','23'); ?>"><font color="#FFFFFF"><?php echo abc('6','23'); ?></font></td>
<td bgcolor="<?php echo color('7','23'); ?>"><font color="#FFFFFF"><?php echo abc('7','23'); ?></font></td>
<?php }
	$i++;	 
			}
			 ?>
</tr></tbody>
<tbody><tr>
								<?php $pT =$_REQUEST['Course_ID'];
								$time = "11:30-12:00 AM";
								$tr = "24";
			$result = mysql_query("SELECT * FROM sched HAVING course_id = $pT and stime_s_id = $tr");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0) 
			{
			echo "";
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
		
			if(($i%2)==0) 
				{
					$bgcolor ='#FFFFFF';
				}
			else
				{
					$bgcolor ='#CDE7FF';
				}		
					$st1 = MYSQL_RESULT($result,$i,"stime_s_id");
			 if ($st1 == $tr){	
					$c = '#81F781';
						}
			else {	
					$c = '#ffffff';
						}
if ($c == "#81F781"){ ?><td><?php echo $time; ?></td>
<td bgcolor="<?php echo color('1','24'); ?>"><font color="#FFFFFF"><?php echo abc('1','24'); ?></font></td>
<td bgcolor="<?php echo color('2','24'); ?>"><font color="#FFFFFF"><?php echo abc('2','24'); ?></font></td>
<td bgcolor="<?php echo color('3','24'); ?>"><font color="#FFFFFF"><?php echo abc('3','24'); ?></font></td>
<td bgcolor="<?php echo color('4','24'); ?>"><font color="#FFFFFF"><?php echo abc('4','24'); ?></font></td>
<td bgcolor="<?php echo color('5','24'); ?>"><font color="#FFFFFF"><?php echo abc('5','24'); ?></font></td>
<td bgcolor="<?php echo color('6','24'); ?>"><font color="#FFFFFF"><?php echo abc('6','24'); ?></font></td>
<td bgcolor="<?php echo color('7','24'); ?>"><font color="#FFFFFF"><?php echo abc('7','24'); ?></font></td>
<?php }
	$i++;	 
			}
			 ?>
</tr></tbody>		
<tbody><tr>
								<?php $pT =$_REQUEST['Course_ID'];
								$time = "12:00-12:30 PM";
								$tr = "25";
			$result = mysql_query("SELECT * FROM sched HAVING course_id = $pT and stime_s_id = $tr");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0) 
			{
			echo "";
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
		
			if(($i%2)==0) 
				{
					$bgcolor ='#FFFFFF';
				}
			else
				{
					$bgcolor ='#CDE7FF';
				}		
					$st1 = MYSQL_RESULT($result,$i,"stime_s_id");
			 if ($st1 == $tr){	
					$c = '#81F781';
						}
			else {	
					$c = '#ffffff';
						}
if ($c == "#81F781"){ ?><td><?php echo $time; ?></td>
<td bgcolor="<?php echo color('1','25'); ?>"><font color="#FFFFFF"><?php echo abc('1','25'); ?></font></td>
<td bgcolor="<?php echo color('2','25'); ?>"><font color="#FFFFFF"><?php echo abc('2','25'); ?></font></td>
<td bgcolor="<?php echo color('3','25'); ?>"><font color="#FFFFFF"><?php echo abc('3','25'); ?></font></td>
<td bgcolor="<?php echo color('4','25'); ?>"><font color="#FFFFFF"><?php echo abc('4','25'); ?></font></td>
<td bgcolor="<?php echo color('5','25'); ?>"><font color="#FFFFFF"><?php echo abc('5','25'); ?></font></td>
<td bgcolor="<?php echo color('6','25'); ?>"><font color="#FFFFFF"><?php echo abc('6','25'); ?></font></td>
<td bgcolor="<?php echo color('7','25'); ?>"><font color="#FFFFFF"><?php echo abc('7','25'); ?></font></td>
<?php }
	$i++;	 
			}
			 ?>
</tr></tbody>
<tbody><tr>
								<?php $pT =$_REQUEST['Course_ID'];
								$time = "12:30-01:00 PM";
								$tr = "26";
			$result = mysql_query("SELECT * FROM sched HAVING course_id = $pT and stime_s_id = $tr");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0) 
			{
			echo "";
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
		
			if(($i%2)==0) 
				{
					$bgcolor ='#FFFFFF';
				}
			else
				{
					$bgcolor ='#CDE7FF';
				}		
					$st1 = MYSQL_RESULT($result,$i,"stime_s_id");
			 if ($st1 == $tr){	
					$c = '#81F781';
						}
			else {	
					$c = '#ffffff';
						}
if ($c == "#81F781"){ ?><td><?php echo $time; ?></td>
<td bgcolor="<?php echo color('1','26'); ?>"><font color="#FFFFFF"><?php echo abc('1','26'); ?></font></td>
<td bgcolor="<?php echo color('2','26'); ?>"><font color="#FFFFFF"><?php echo abc('2','26'); ?></font></td>
<td bgcolor="<?php echo color('3','26'); ?>"><font color="#FFFFFF"><?php echo abc('3','26'); ?></font></td>
<td bgcolor="<?php echo color('4','26'); ?>"><font color="#FFFFFF"><?php echo abc('4','26'); ?></font></td>
<td bgcolor="<?php echo color('5','26'); ?>"><font color="#FFFFFF"><?php echo abc('5','26'); ?></font></td>
<td bgcolor="<?php echo color('6','26'); ?>"><font color="#FFFFFF"><?php echo abc('6','26'); ?></font></td>
<td bgcolor="<?php echo color('7','26'); ?>"><font color="#FFFFFF"><?php echo abc('7','26'); ?></font></td>
<?php }
	$i++;	 
			}
			 ?>
</tr></tbody>
<tbody><tr>
								<?php $pT =$_REQUEST['Course_ID'];
								$time = "01:00-01:30 PM";
								$tr = "27";
			$result = mysql_query("SELECT * FROM sched HAVING course_id = $pT and stime_s_id = $tr");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0) 
			{
			echo "";
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
		
			if(($i%2)==0) 
				{
					$bgcolor ='#FFFFFF';
				}
			else
				{
					$bgcolor ='#CDE7FF';
				}		
					$st1 = MYSQL_RESULT($result,$i,"stime_s_id");
			 if ($st1 == $tr){	
					$c = '#81F781';
						}
			else {	
					$c = '#ffffff';
						}
if ($c == "#81F781"){ ?><td><?php echo $time; ?></td>
<td bgcolor="<?php echo color('1','27'); ?>"><font color="#FFFFFF"><?php echo abc('1','27'); ?></font></td>
<td bgcolor="<?php echo color('2','27'); ?>"><font color="#FFFFFF"><?php echo abc('2','27'); ?></font></td>
<td bgcolor="<?php echo color('3','27'); ?>"><font color="#FFFFFF"><?php echo abc('3','27'); ?></font></td>
<td bgcolor="<?php echo color('4','27'); ?>"><font color="#FFFFFF"><?php echo abc('4','27'); ?></font></td>
<td bgcolor="<?php echo color('5','27'); ?>"><font color="#FFFFFF"><?php echo abc('5','27'); ?></font></td>
<td bgcolor="<?php echo color('6','27'); ?>"><font color="#FFFFFF"><?php echo abc('6','27'); ?></font></td>
<td bgcolor="<?php echo color('7','27'); ?>"><font color="#FFFFFF"><?php echo abc('7','27'); ?></font></td>
<?php }
	$i++;	 
			}
			 ?>
</tr></tbody>
<tbody><tr>
								<?php $pT =$_REQUEST['Course_ID'];
								$time = "01:30-02:00 PM";
								$tr = "28";
			$result = mysql_query("SELECT * FROM sched HAVING course_id = $pT and stime_s_id = $tr");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0) 
			{
			echo "";
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
		
			if(($i%2)==0) 
				{
					$bgcolor ='#FFFFFF';
				}
			else
				{
					$bgcolor ='#CDE7FF';
				}		
					$st1 = MYSQL_RESULT($result,$i,"stime_s_id");
			 if ($st1 == $tr){	
					$c = '#81F781';
						}
			else {	
					$c = '#ffffff';
						}
if ($c == "#81F781"){ ?><td><?php echo $time; ?></td>
<td bgcolor="<?php echo color('1','28'); ?>"><font color="#FFFFFF"><?php echo abc('1','28'); ?></font></td>
<td bgcolor="<?php echo color('2','28'); ?>"><font color="#FFFFFF"><?php echo abc('2','28'); ?></font></td>
<td bgcolor="<?php echo color('3','28'); ?>"><font color="#FFFFFF"><?php echo abc('3','28'); ?></font></td>
<td bgcolor="<?php echo color('4','28'); ?>"><font color="#FFFFFF"><?php echo abc('4','28'); ?></font></td>
<td bgcolor="<?php echo color('5','28'); ?>"><font color="#FFFFFF"><?php echo abc('5','28'); ?></font></td>
<td bgcolor="<?php echo color('6','28'); ?>"><font color="#FFFFFF"><?php echo abc('6','28'); ?></font></td>
<td bgcolor="<?php echo color('7','28'); ?>"><font color="#FFFFFF"><?php echo abc('7','28'); ?></font></td>
<?php }
	$i++;	 
			}
			 ?>
</tr></tbody>
<tbody><tr>
								<?php $pT =$_REQUEST['Course_ID'];
								$time = "02:00-02:30 PM";
								$tr = "29";
			$result = mysql_query("SELECT * FROM sched HAVING course_id = $pT and stime_s_id = $tr");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0) 
			{
			echo "";
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
		
			if(($i%2)==0) 
				{
					$bgcolor ='#FFFFFF';
				}
			else
				{
					$bgcolor ='#CDE7FF';
				}		
					$st1 = MYSQL_RESULT($result,$i,"stime_s_id");
			 if ($st1 == $tr){	
					$c = '#81F781';
						}
			else {	
					$c = '#ffffff';
						}
if ($c == "#81F781"){ ?><td><?php echo $time; ?></td>
<td bgcolor="<?php echo color('1','29'); ?>"><font color="#FFFFFF"><?php echo abc('1','29'); ?></font></td>
<td bgcolor="<?php echo color('2','29'); ?>"><font color="#FFFFFF"><?php echo abc('2','29'); ?></font></td>
<td bgcolor="<?php echo color('3','29'); ?>"><font color="#FFFFFF"><?php echo abc('3','29'); ?></font></td>
<td bgcolor="<?php echo color('4','29'); ?>"><font color="#FFFFFF"><?php echo abc('4','29'); ?></font></td>
<td bgcolor="<?php echo color('5','29'); ?>"><font color="#FFFFFF"><?php echo abc('5','29'); ?></font></td>
<td bgcolor="<?php echo color('6','29'); ?>"><font color="#FFFFFF"><?php echo abc('6','29'); ?></font></td>
<td bgcolor="<?php echo color('7','29'); ?>"><font color="#FFFFFF"><?php echo abc('7','29'); ?></font></td>
<?php }
	$i++;	 
			}
			 ?>
</tr></tbody>
<tbody><tr>
								<?php $pT =$_REQUEST['Course_ID'];
								$time = "02:30-03:00 PM";
								$tr = "30";
			$result = mysql_query("SELECT * FROM sched HAVING course_id = $pT and stime_s_id = $tr");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0) 
			{
			echo "";
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
		
			if(($i%2)==0) 
				{
					$bgcolor ='#FFFFFF';
				}
			else
				{
					$bgcolor ='#CDE7FF';
				}		
					$st1 = MYSQL_RESULT($result,$i,"stime_s_id");
			 if ($st1 == $tr){	
					$c = '#81F781';
						}
			else {	
					$c = '#ffffff';
						}
if ($c == "#81F781"){ ?><td><?php echo $time; ?></td>
<td bgcolor="<?php echo color('1','30'); ?>"><font color="#FFFFFF"><?php echo abc('1','30'); ?></font></td>
<td bgcolor="<?php echo color('2','30'); ?>"><font color="#FFFFFF"><?php echo abc('2','30'); ?></font></td>
<td bgcolor="<?php echo color('3','30'); ?>"><font color="#FFFFFF"><?php echo abc('3','30'); ?></font></td>
<td bgcolor="<?php echo color('4','30'); ?>"><font color="#FFFFFF"><?php echo abc('4','30'); ?></font></td>
<td bgcolor="<?php echo color('5','30'); ?>"><font color="#FFFFFF"><?php echo abc('5','30'); ?></font></td>
<td bgcolor="<?php echo color('6','30'); ?>"><font color="#FFFFFF"><?php echo abc('6','30'); ?></font></td>
<td bgcolor="<?php echo color('7','30'); ?>"><font color="#FFFFFF"><?php echo abc('7','30'); ?></font></td>
<?php }
	$i++;	 
			}
			 ?>
</tr></tbody>
<tbody><tr>
								<?php $pT =$_REQUEST['Course_ID'];
								$time = "03:00-03:30 PM";
								$tr = "31";
			$result = mysql_query("SELECT * FROM sched HAVING course_id = $pT and stime_s_id = $tr");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0) 
			{
			echo "";
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
		
			if(($i%2)==0) 
				{
					$bgcolor ='#FFFFFF';
				}
			else
				{
					$bgcolor ='#CDE7FF';
				}		
					$st1 = MYSQL_RESULT($result,$i,"stime_s_id");
			 if ($st1 == $tr){	
					$c = '#81F781';
						}
			else {	
					$c = '#ffffff';
						}
if ($c == "#81F781"){ ?><td><?php echo $time; ?></td>
<td bgcolor="<?php echo color('1','31'); ?>"><font color="#FFFFFF"><?php echo abc('1','31'); ?></font></td>
<td bgcolor="<?php echo color('2','31'); ?>"><font color="#FFFFFF"><?php echo abc('2','31'); ?></font></td>
<td bgcolor="<?php echo color('3','31'); ?>"><font color="#FFFFFF"><?php echo abc('3','31'); ?></font></td>
<td bgcolor="<?php echo color('4','31'); ?>"><font color="#FFFFFF"><?php echo abc('4','31'); ?></font></td>
<td bgcolor="<?php echo color('5','31'); ?>"><font color="#FFFFFF"><?php echo abc('5','31'); ?></font></td>
<td bgcolor="<?php echo color('6','31'); ?>"><font color="#FFFFFF"><?php echo abc('6','31'); ?></font></td>
<td bgcolor="<?php echo color('7','31'); ?>"><font color="#FFFFFF"><?php echo abc('7','31'); ?></font></td>
<?php }
	$i++;	 
			}
			 ?>
</tr></tbody>
<tbody><tr>
								<?php $pT =$_REQUEST['Course_ID'];
								$time = "03:30-04:00 PM";
								$tr = "32";
			$result = mysql_query("SELECT * FROM sched HAVING course_id = $pT and stime_s_id = $tr");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0) 
			{
			echo "";
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
		
			if(($i%2)==0) 
				{
					$bgcolor ='#FFFFFF';
				}
			else
				{
					$bgcolor ='#CDE7FF';
				}		
					$st1 = MYSQL_RESULT($result,$i,"stime_s_id");
			 if ($st1 == $tr){	
					$c = '#81F781';
						}
			else {	
					$c = '#ffffff';
						}
if ($c == "#81F781"){ ?><td><?php echo $time; ?></td>
<td bgcolor="<?php echo color('1','32'); ?>"><font color="#FFFFFF"><?php echo abc('1','32'); ?></font></td>
<td bgcolor="<?php echo color('2','32'); ?>"><font color="#FFFFFF"><?php echo abc('2','32'); ?></font></td>
<td bgcolor="<?php echo color('3','32'); ?>"><font color="#FFFFFF"><?php echo abc('3','32'); ?></font></td>
<td bgcolor="<?php echo color('4','32'); ?>"><font color="#FFFFFF"><?php echo abc('4','32'); ?></font></td>
<td bgcolor="<?php echo color('5','32'); ?>"><font color="#FFFFFF"><?php echo abc('5','32'); ?></font></td>
<td bgcolor="<?php echo color('6','32'); ?>"><font color="#FFFFFF"><?php echo abc('6','32'); ?></font></td>
<td bgcolor="<?php echo color('7','32'); ?>"><font color="#FFFFFF"><?php echo abc('7','32'); ?></font></td>
<?php }
	$i++;	 
			}
			 ?>
</tr></tbody>
<tbody><tr>
								<?php $pT =$_REQUEST['Course_ID'];
								$time = "04:00-04:30 PM";
								$tr = "33";
			$result = mysql_query("SELECT * FROM sched HAVING course_id = $pT and stime_s_id = $tr");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0) 
			{
			echo "";
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
		
			if(($i%2)==0) 
				{
					$bgcolor ='#FFFFFF';
				}
			else
				{
					$bgcolor ='#CDE7FF';
				}		
					$st1 = MYSQL_RESULT($result,$i,"stime_s_id");
			 if ($st1 == $tr){	
					$c = '#81F781';
						}
			else {	
					$c = '#ffffff';
						}
if ($c == "#81F781"){ ?><td><?php echo $time; ?></td>
<td bgcolor="<?php echo color('1','33'); ?>"><font color="#FFFFFF"><?php echo abc('1','33'); ?></font></td>
<td bgcolor="<?php echo color('2','33'); ?>"><font color="#FFFFFF"><?php echo abc('2','33'); ?></font></td>
<td bgcolor="<?php echo color('3','33'); ?>"><font color="#FFFFFF"><?php echo abc('3','33'); ?></font></td>
<td bgcolor="<?php echo color('4','33'); ?>"><font color="#FFFFFF"><?php echo abc('4','33'); ?></font></td>
<td bgcolor="<?php echo color('5','33'); ?>"><font color="#FFFFFF"><?php echo abc('5','33'); ?></font></td>
<td bgcolor="<?php echo color('6','33'); ?>"><font color="#FFFFFF"><?php echo abc('6','33'); ?></font></td>
<td bgcolor="<?php echo color('7','33'); ?>"><font color="#FFFFFF"><?php echo abc('7','33'); ?></font></td>
<?php }
	$i++;	 
			}
			 ?>
</tr></tbody>
<tbody><tr>
								<?php $pT =$_REQUEST['Course_ID'];
								$time = "04:30-05:00 PM";
								$tr = "34";
			$result = mysql_query("SELECT * FROM sched HAVING course_id = $pT and stime_s_id = $tr");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0) 
			{
			echo "";
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
		
			if(($i%2)==0) 
				{
					$bgcolor ='#FFFFFF';
				}
			else
				{
					$bgcolor ='#CDE7FF';
				}		
					$st1 = MYSQL_RESULT($result,$i,"stime_s_id");
			 if ($st1 == $tr){	
					$c = '#81F781';
						}
			else {	
					$c = '#ffffff';
						}
if ($c == "#81F781"){ ?><td><?php echo $time; ?></td>
<td bgcolor="<?php echo color('1','34'); ?>"><font color="#FFFFFF"><?php echo abc('1','34'); ?></font></td>
<td bgcolor="<?php echo color('2','34'); ?>"><font color="#FFFFFF"><?php echo abc('2','34'); ?></font></td>
<td bgcolor="<?php echo color('3','34'); ?>"><font color="#FFFFFF"><?php echo abc('3','34'); ?></font></td>
<td bgcolor="<?php echo color('4','34'); ?>"><font color="#FFFFFF"><?php echo abc('4','34'); ?></font></td>
<td bgcolor="<?php echo color('5','34'); ?>"><font color="#FFFFFF"><?php echo abc('5','34'); ?></font></td>
<td bgcolor="<?php echo color('6','34'); ?>"><font color="#FFFFFF"><?php echo abc('6','34'); ?></font></td>
<td bgcolor="<?php echo color('7','34'); ?>"><font color="#FFFFFF"><?php echo abc('7','34'); ?></font></td>
<?php }
	$i++;	 
			}
			 ?>
</tr></tbody>
<tbody><tr>
								<?php $pT =$_REQUEST['Course_ID'];
								$time = "05:00-05:30 PM";
								$tr = "35";
			$result = mysql_query("SELECT * FROM sched HAVING course_id = $pT and stime_s_id = $tr");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0) 
			{
			echo "";
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
		
			if(($i%2)==0) 
				{
					$bgcolor ='#FFFFFF';
				}
			else
				{
					$bgcolor ='#CDE7FF';
				}		
					$st1 = MYSQL_RESULT($result,$i,"stime_s_id");
			 if ($st1 == $tr){	
					$c = '#81F781';
						}
			else {	
					$c = '#ffffff';
						}
if ($c == "#81F781"){ ?><td><?php echo $time; ?></td>
<td bgcolor="<?php echo color('1','35'); ?>"><font color="#FFFFFF"><?php echo abc('1','35'); ?></font></td>
<td bgcolor="<?php echo color('2','35'); ?>"><font color="#FFFFFF"><?php echo abc('2','35'); ?></font></td>
<td bgcolor="<?php echo color('3','35'); ?>"><font color="#FFFFFF"><?php echo abc('3','35'); ?></font></td>
<td bgcolor="<?php echo color('4','35'); ?>"><font color="#FFFFFF"><?php echo abc('4','35'); ?></font></td>
<td bgcolor="<?php echo color('5','35'); ?>"><font color="#FFFFFF"><?php echo abc('5','35'); ?></font></td>
<td bgcolor="<?php echo color('6','35'); ?>"><font color="#FFFFFF"><?php echo abc('6','35'); ?></font></td>
<td bgcolor="<?php echo color('7','35'); ?>"><font color="#FFFFFF"><?php echo abc('7','35'); ?></font></td>
<?php }
	$i++;	 
			}
			 ?>
</tr></tbody>
<tbody><tr>
								<?php $pT =$_REQUEST['Course_ID'];
								$time = "05:30-06:00 PM";
								$tr = "36";
			$result = mysql_query("SELECT * FROM sched HAVING course_id = $pT and stime_s_id = $tr");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0) 
			{
			echo "";
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
		
			if(($i%2)==0) 
				{
					$bgcolor ='#FFFFFF';
				}
			else
				{
					$bgcolor ='#CDE7FF';
				}		
					$st1 = MYSQL_RESULT($result,$i,"stime_s_id");
			 if ($st1 == $tr){	
					$c = '#81F781';
						}
			else {	
					$c = '#ffffff';
						}
if ($c == "#81F781"){ ?><td><?php echo $time; ?></td>
<td bgcolor="<?php echo color('1','36'); ?>"><font color="#FFFFFF"><?php echo abc('1','36'); ?></font></td>
<td bgcolor="<?php echo color('2','36'); ?>"><font color="#FFFFFF"><?php echo abc('2','36'); ?></font></td>
<td bgcolor="<?php echo color('3','36'); ?>"><font color="#FFFFFF"><?php echo abc('3','36'); ?></font></td>
<td bgcolor="<?php echo color('4','36'); ?>"><font color="#FFFFFF"><?php echo abc('4','36'); ?></font></td>
<td bgcolor="<?php echo color('5','36'); ?>"><font color="#FFFFFF"><?php echo abc('5','36'); ?></font></td>
<td bgcolor="<?php echo color('6','36'); ?>"><font color="#FFFFFF"><?php echo abc('6','36'); ?></font></td>
<td bgcolor="<?php echo color('7','36'); ?>"><font color="#FFFFFF"><?php echo abc('7','36'); ?></font></td>
<?php }
	$i++;	 
			}
			 ?>
</tr></tbody>
<tbody><tr>
								<?php $pT =$_REQUEST['Course_ID'];
								$time = "06:00-06:30 PM";
								$tr = "37";
			$result = mysql_query("SELECT * FROM sched HAVING course_id = $pT and stime_s_id = $tr");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0) 
			{
			echo "";
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
		
			if(($i%2)==0) 
				{
					$bgcolor ='#FFFFFF';
				}
			else
				{
					$bgcolor ='#CDE7FF';
				}		
					$st1 = MYSQL_RESULT($result,$i,"stime_s_id");
			 if ($st1 == $tr){	
					$c = '#81F781';
						}
			else {	
					$c = '#ffffff';
						}
if ($c == "#81F781"){ ?><td><?php echo $time; ?></td>
<td bgcolor="<?php echo color('1','37'); ?>"><font color="#FFFFFF"><?php echo abc('1','37'); ?></font></td>
<td bgcolor="<?php echo color('2','37'); ?>"><font color="#FFFFFF"><?php echo abc('2','37'); ?></font></td>
<td bgcolor="<?php echo color('3','37'); ?>"><font color="#FFFFFF"><?php echo abc('3','37'); ?></font></td>
<td bgcolor="<?php echo color('4','37'); ?>"><font color="#FFFFFF"><?php echo abc('4','37'); ?></font></td>
<td bgcolor="<?php echo color('5','37'); ?>"><font color="#FFFFFF"><?php echo abc('5','37'); ?></font></td>
<td bgcolor="<?php echo color('6','37'); ?>"><font color="#FFFFFF"><?php echo abc('6','37'); ?></font></td>
<td bgcolor="<?php echo color('7','37'); ?>"><font color="#FFFFFF"><?php echo abc('7','37'); ?></font></td>
<?php }
	$i++;	 
			}
			 ?>
</tr></tbody>
<tbody><tr>
								<?php $pT =$_REQUEST['Course_ID'];
								$time = "06:30-07:00 PM";
								$tr = "38";
			$result = mysql_query("SELECT * FROM sched HAVING course_id = $pT and stime_s_id = $tr");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0) 
			{
			echo "";
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
		
			if(($i%2)==0) 
				{
					$bgcolor ='#FFFFFF';
				}
			else
				{
					$bgcolor ='#CDE7FF';
				}		
					$st1 = MYSQL_RESULT($result,$i,"stime_s_id");
			 if ($st1 == $tr){	
					$c = '#81F781';
						}
			else {	
					$c = '#ffffff';
						}
if ($c == "#81F781"){ ?><td><?php echo $time; ?></td>
<td bgcolor="<?php echo color('1','38'); ?>"><font color="#FFFFFF"><?php echo abc('1','38'); ?></font></td>
<td bgcolor="<?php echo color('2','38'); ?>"><font color="#FFFFFF"><?php echo abc('2','38'); ?></font></td>
<td bgcolor="<?php echo color('3','38'); ?>"><font color="#FFFFFF"><?php echo abc('3','38'); ?></font></td>
<td bgcolor="<?php echo color('4','38'); ?>"><font color="#FFFFFF"><?php echo abc('4','38'); ?></font></td>
<td bgcolor="<?php echo color('5','38'); ?>"><font color="#FFFFFF"><?php echo abc('5','38'); ?></font></td>
<td bgcolor="<?php echo color('6','38'); ?>"><font color="#FFFFFF"><?php echo abc('6','38'); ?></font></td>
<td bgcolor="<?php echo color('7','38'); ?>"><font color="#FFFFFF"><?php echo abc('7','38'); ?></font></td>
<?php }
	$i++;	 
			}
			 ?>
</tr></tbody>
<tbody><tr>
								<?php $pT =$_REQUEST['Course_ID'];
								$time = "07:00-07:30 PM";
								$tr = "39";
			$result = mysql_query("SELECT * FROM sched HAVING course_id = $pT and stime_s_id = $tr");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0) 
			{
			echo "";
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
		
			if(($i%2)==0) 
				{
					$bgcolor ='#FFFFFF';
				}
			else
				{
					$bgcolor ='#CDE7FF';
				}		
					$st1 = MYSQL_RESULT($result,$i,"stime_s_id");
			 if ($st1 == $tr){	
					$c = '#81F781';
						}
			else {	
					$c = '#ffffff';
						}
if ($c == "#81F781"){ ?><td><?php echo $time; ?></td>
<td bgcolor="<?php echo color('1','39'); ?>"><font color="#FFFFFF"><?php echo abc('1','39'); ?></font></td>
<td bgcolor="<?php echo color('2','39'); ?>"><font color="#FFFFFF"><?php echo abc('2','39'); ?></font></td>
<td bgcolor="<?php echo color('3','39'); ?>"><font color="#FFFFFF"><?php echo abc('3','39'); ?></font></td>
<td bgcolor="<?php echo color('4','39'); ?>"><font color="#FFFFFF"><?php echo abc('4','39'); ?></font></td>
<td bgcolor="<?php echo color('5','39'); ?>"><font color="#FFFFFF"><?php echo abc('5','39'); ?></font></td>
<td bgcolor="<?php echo color('6','39'); ?>"><font color="#FFFFFF"><?php echo abc('6','39'); ?></font></td>
<td bgcolor="<?php echo color('7','39'); ?>"><font color="#FFFFFF"><?php echo abc('7','39'); ?></font></td>
<?php }
	$i++;	 
			}
			 ?>
</tr></tbody>
<tbody><tr>
								<?php $pT =$_REQUEST['Course_ID'];
								$time = "07:30-08:00 PM";
								$tr = "40";
			$result = mysql_query("SELECT * FROM sched HAVING course_id = $pT and stime_s_id = $tr");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0) 
			{
			echo "";
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
		
			if(($i%2)==0) 
				{
					$bgcolor ='#FFFFFF';
				}
			else
				{
					$bgcolor ='#CDE7FF';
				}		
					$st1 = MYSQL_RESULT($result,$i,"stime_s_id");
			 if ($st1 == $tr){	
					$c = '#81F781';
						}
			else {	
					$c = '#ffffff';
						}
if ($c == "#81F781"){ ?><td><?php echo $time; ?></td>
<td bgcolor="<?php echo color('1','40'); ?>"><font color="#FFFFFF"><?php echo abc('1','40'); ?></font></td>
<td bgcolor="<?php echo color('2','40'); ?>"><font color="#FFFFFF"><?php echo abc('2','40'); ?></font></td>
<td bgcolor="<?php echo color('3','40'); ?>"><font color="#FFFFFF"><?php echo abc('3','40'); ?></font></td>
<td bgcolor="<?php echo color('4','40'); ?>"><font color="#FFFFFF"><?php echo abc('4','40'); ?></font></td>
<td bgcolor="<?php echo color('5','40'); ?>"><font color="#FFFFFF"><?php echo abc('5','40'); ?></font></td>
<td bgcolor="<?php echo color('6','40'); ?>"><font color="#FFFFFF"><?php echo abc('6','40'); ?></font></td>
<td bgcolor="<?php echo color('7','40'); ?>"><font color="#FFFFFF"><?php echo abc('7','40'); ?></font></td>
<?php }
	$i++;	 
			}
			 ?>
</tr></tbody>
<tbody><tr>
								<?php $pT =$_REQUEST['Course_ID'];
								$time = "08:00-08:30 PM";
								$tr = "41";
			$result = mysql_query("SELECT * FROM sched HAVING course_id = $pT and stime_s_id = $tr");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0) 
			{
			echo "";
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
		
			if(($i%2)==0) 
				{
					$bgcolor ='#FFFFFF';
				}
			else
				{
					$bgcolor ='#CDE7FF';
				}		
					$st1 = MYSQL_RESULT($result,$i,"stime_s_id");
			 if ($st1 == $tr){	
					$c = '#81F781';
						}
			else {	
					$c = '#ffffff';
						}
if ($c == "#81F781"){ ?><td><?php echo $time; ?></td>
<td bgcolor="<?php echo color('1','41'); ?>"><font color="#FFFFFF"><?php echo abc('1','41'); ?></font></td>
<td bgcolor="<?php echo color('2','41'); ?>"><font color="#FFFFFF"><?php echo abc('2','41'); ?></font></td>
<td bgcolor="<?php echo color('3','41'); ?>"><font color="#FFFFFF"><?php echo abc('3','41'); ?></font></td>
<td bgcolor="<?php echo color('4','41'); ?>"><font color="#FFFFFF"><?php echo abc('4','41'); ?></font></td>
<td bgcolor="<?php echo color('5','41'); ?>"><font color="#FFFFFF"><?php echo abc('5','41'); ?></font></td>
<td bgcolor="<?php echo color('6','41'); ?>"><font color="#FFFFFF"><?php echo abc('6','41'); ?></font></td>
<td bgcolor="<?php echo color('7','41'); ?>"><font color="#FFFFFF"><?php echo abc('7','41'); ?></font></td>
<?php }
	$i++;	 
			}
			 ?>
</tr></tbody>
<tbody><tr>
								<?php $pT =$_REQUEST['Course_ID'];
								$time = "08:30-09:00 PM";
								$tr = "42";
			$result = mysql_query("SELECT * FROM sched HAVING course_id = $pT and stime_s_id = $tr");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0) 
			{
			echo "";
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
		
			if(($i%2)==0) 
				{
					$bgcolor ='#FFFFFF';
				}
			else
				{
					$bgcolor ='#CDE7FF';
				}		
					$st1 = MYSQL_RESULT($result,$i,"stime_s_id");
			 if ($st1 == $tr){	
					$c = '#81F781';
						}
			else {	
					$c = '#ffffff';
						}
if ($c == "#81F781"){ ?><td><?php echo $time; ?></td>
<td bgcolor="<?php echo color('1','42'); ?>"><font color="#FFFFFF"><?php echo abc('1','42'); ?></font></td>
<td bgcolor="<?php echo color('2','42'); ?>"><font color="#FFFFFF"><?php echo abc('2','42'); ?></font></td>
<td bgcolor="<?php echo color('3','42'); ?>"><font color="#FFFFFF"><?php echo abc('3','42'); ?></font></td>
<td bgcolor="<?php echo color('4','42'); ?>"><font color="#FFFFFF"><?php echo abc('4','42'); ?></font></td>
<td bgcolor="<?php echo color('5','42'); ?>"><font color="#FFFFFF"><?php echo abc('5','42'); ?></font></td>
<td bgcolor="<?php echo color('6','42'); ?>"><font color="#FFFFFF"><?php echo abc('6','42'); ?></font></td>
<td bgcolor="<?php echo color('7','42'); ?>"><font color="#FFFFFF"><?php echo abc('7','42'); ?></font></td>
<?php }
	$i++;	 
			}
			 ?>
</tr></tbody>
<tbody><tr>
								<?php $pT =$_REQUEST['Course_ID'];
								$time = "09:00-09:30 PM";
								$tr = "43";
			$result = mysql_query("SELECT * FROM sched HAVING course_id = $pT and stime_s_id = $tr");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0) 
			{
			echo "";
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
		
			if(($i%2)==0) 
				{
					$bgcolor ='#FFFFFF';
				}
			else
				{
					$bgcolor ='#CDE7FF';
				}		
					$st1 = MYSQL_RESULT($result,$i,"stime_s_id");
			 if ($st1 == $tr){	
					$c = '#81F781';
						}
			else {	
					$c = '#ffffff';
						}
if ($c == "#81F781"){ ?><td><?php echo $time; ?></td>
<td bgcolor="<?php echo color('1','43'); ?>"><font color="#FFFFFF"><?php echo abc('1','43'); ?></font></td>
<td bgcolor="<?php echo color('2','43'); ?>"><font color="#FFFFFF"><?php echo abc('2','43'); ?></font></td>
<td bgcolor="<?php echo color('3','43'); ?>"><font color="#FFFFFF"><?php echo abc('3','43'); ?></font></td>
<td bgcolor="<?php echo color('4','43'); ?>"><font color="#FFFFFF"><?php echo abc('4','43'); ?></font></td>
<td bgcolor="<?php echo color('5','43'); ?>"><font color="#FFFFFF"><?php echo abc('5','43'); ?></font></td>
<td bgcolor="<?php echo color('6','43'); ?>"><font color="#FFFFFF"><?php echo abc('6','43'); ?></font></td>
<td bgcolor="<?php echo color('7','43'); ?>"><font color="#FFFFFF"><?php echo abc('7','43'); ?></font></td>
<?php }
	$i++;	 
			}
			 ?>
</tr></tbody>
<tbody><tr>
								<?php $pT =$_REQUEST['Course_ID'];
								$time = "09:30-10:00 PM";
								$tr = "44";
			$result = mysql_query("SELECT * FROM sched HAVING course_id = $pT and stime_s_id = $tr");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0) 
			{
			echo "";
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
		
			if(($i%2)==0) 
				{
					$bgcolor ='#FFFFFF';
				}
			else
				{
					$bgcolor ='#CDE7FF';
				}		
					$st1 = MYSQL_RESULT($result,$i,"stime_s_id");
			 if ($st1 == $tr){	
					$c = '#81F781';
						}
			else {	
					$c = '#ffffff';
						}
if ($c == "#81F781"){ ?><td><?php echo $time; ?></td>
<td bgcolor="<?php echo color('1','44'); ?>"><font color="#FFFFFF"><?php echo abc('1','44'); ?></font></td>
<td bgcolor="<?php echo color('2','44'); ?>"><font color="#FFFFFF"><?php echo abc('2','44'); ?></font></td>
<td bgcolor="<?php echo color('3','44'); ?>"><font color="#FFFFFF"><?php echo abc('3','44'); ?></font></td>
<td bgcolor="<?php echo color('4','44'); ?>"><font color="#FFFFFF"><?php echo abc('4','44'); ?></font></td>
<td bgcolor="<?php echo color('5','44'); ?>"><font color="#FFFFFF"><?php echo abc('5','44'); ?></font></td>
<td bgcolor="<?php echo color('6','44'); ?>"><font color="#FFFFFF"><?php echo abc('6','44'); ?></font></td>
<td bgcolor="<?php echo color('7','44'); ?>"><font color="#FFFFFF"><?php echo abc('7','44'); ?></font></td>
<?php }
	$i++;	 
			}
			 ?>
</tr></tbody>
<tbody><tr>
								<?php $pT =$_REQUEST['Course_ID'];
								$time = "10:00-10:30 PM";
								$tr = "45";
			$result = mysql_query("SELECT * FROM sched HAVING course_id = $pT and stime_s_id = $tr");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0) 
			{
			echo "";
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
		
			if(($i%2)==0) 
				{
					$bgcolor ='#FFFFFF';
				}
			else
				{
					$bgcolor ='#CDE7FF';
				}		
					$st1 = MYSQL_RESULT($result,$i,"stime_s_id");
			 if ($st1 == $tr){	
					$c = '#81F781';
						}
			else {	
					$c = '#ffffff';
						}
if ($c == "#81F781"){ ?><td><?php echo $time; ?></td>
<td bgcolor="<?php echo color('1','45'); ?>"><font color="#FFFFFF"><?php echo abc('1','45'); ?></font></td>
<td bgcolor="<?php echo color('2','45'); ?>"><font color="#FFFFFF"><?php echo abc('2','45'); ?></font></td>
<td bgcolor="<?php echo color('3','45'); ?>"><font color="#FFFFFF"><?php echo abc('3','45'); ?></font></td>
<td bgcolor="<?php echo color('4','45'); ?>"><font color="#FFFFFF"><?php echo abc('4','45'); ?></font></td>
<td bgcolor="<?php echo color('5','45'); ?>"><font color="#FFFFFF"><?php echo abc('5','45'); ?></font></td>
<td bgcolor="<?php echo color('6','45'); ?>"><font color="#FFFFFF"><?php echo abc('6','45'); ?></font></td>
<td bgcolor="<?php echo color('7','45'); ?>"><font color="#FFFFFF"><?php echo abc('7','45'); ?></font></td>
<?php }
	$i++;	 
			}
			 ?>
</tr></tbody>
<tbody><tr>
								<?php $pT =$_REQUEST['Course_ID'];
								$time = "10:30-11:00 PM";
								$tr = "46";
			$result = mysql_query("SELECT * FROM sched HAVING course_id = $pT and stime_s_id = $tr");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0) 
			{
			echo "";
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
		
			if(($i%2)==0) 
				{
					$bgcolor ='#FFFFFF';
				}
			else
				{
					$bgcolor ='#CDE7FF';
				}		
					$st1 = MYSQL_RESULT($result,$i,"stime_s_id");
			 if ($st1 == $tr){	
					$c = '#81F781';
						}
			else {	
					$c = '#ffffff';
						}
if ($c == "#81F781"){ ?><td><?php echo $time; ?></td>
<td bgcolor="<?php echo color('1','46'); ?>"><font color="#FFFFFF"><?php echo abc('1','46'); ?></font></td>
<td bgcolor="<?php echo color('2','46'); ?>"><font color="#FFFFFF"><?php echo abc('2','46'); ?></font></td>
<td bgcolor="<?php echo color('3','46'); ?>"><font color="#FFFFFF"><?php echo abc('3','46'); ?></font></td>
<td bgcolor="<?php echo color('4','46'); ?>"><font color="#FFFFFF"><?php echo abc('4','46'); ?></font></td>
<td bgcolor="<?php echo color('5','46'); ?>"><font color="#FFFFFF"><?php echo abc('5','46'); ?></font></td>
<td bgcolor="<?php echo color('6','46'); ?>"><font color="#FFFFFF"><?php echo abc('6','46'); ?></font></td>
<td bgcolor="<?php echo color('7','46'); ?>"><font color="#FFFFFF"><?php echo abc('7','46'); ?></font></td>
<?php }
	$i++;	 
			}
			 ?>
</tr></tbody>
<tbody><tr>
								<?php $pT =$_REQUEST['Course_ID'];
								$time = "11:00-11:30 PM";
								$tr = "47";
			$result = mysql_query("SELECT * FROM sched HAVING course_id = $pT and stime_s_id = $tr");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0) 
			{
			echo "";
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
		
			if(($i%2)==0) 
				{
					$bgcolor ='#FFFFFF';
				}
			else
				{
					$bgcolor ='#CDE7FF';
				}		
					$st1 = MYSQL_RESULT($result,$i,"stime_s_id");
			 if ($st1 == $tr){	
					$c = '#81F781';
						}
			else {	
					$c = '#ffffff';
						}
if ($c == "#81F781"){ ?><td><?php echo $time; ?></td>
<td bgcolor="<?php echo color('1','47'); ?>"><font color="#FFFFFF"><?php echo abc('1','47'); ?></font></td>
<td bgcolor="<?php echo color('2','47'); ?>"><font color="#FFFFFF"><?php echo abc('2','47'); ?></font></td>
<td bgcolor="<?php echo color('3','47'); ?>"><font color="#FFFFFF"><?php echo abc('3','47'); ?></font></td>
<td bgcolor="<?php echo color('4','47'); ?>"><font color="#FFFFFF"><?php echo abc('4','47'); ?></font></td>
<td bgcolor="<?php echo color('5','47'); ?>"><font color="#FFFFFF"><?php echo abc('5','47'); ?></font></td>
<td bgcolor="<?php echo color('6','47'); ?>"><font color="#FFFFFF"><?php echo abc('6','47'); ?></font></td>
<td bgcolor="<?php echo color('7','47'); ?>"><font color="#FFFFFF"><?php echo abc('7','47'); ?></font></td>
<?php }
	$i++;	 
			}
			 ?>
</tr></tbody>
<tbody><tr>
								<?php $pT =$_REQUEST['Course_ID'];
								$time = "11:30 PM-12:00 AM";
								$tr = "48";
			$result = mysql_query("SELECT * FROM sched HAVING course_id = $pT and stime_s_id = $tr");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0) 
			{
			echo "";
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
		
			if(($i%2)==0) 
				{
					$bgcolor ='#FFFFFF';
				}
			else
				{
					$bgcolor ='#CDE7FF';
				}		
					$st1 = MYSQL_RESULT($result,$i,"stime_s_id");
			 if ($st1 == $tr){	
					$c = '#81F781';
						}
			else {	
					$c = '#ffffff';
						}
if ($c == "#81F781"){ ?><td><?php echo $time; ?></td>
<td bgcolor="<?php echo color('1','48'); ?>"><font color="#FFFFFF"><?php echo abc('1','48'); ?></font></td>
<td bgcolor="<?php echo color('2','48'); ?>"><font color="#FFFFFF"><?php echo abc('2','48'); ?></font></td>
<td bgcolor="<?php echo color('3','48'); ?>"><font color="#FFFFFF"><?php echo abc('3','48'); ?></font></td>
<td bgcolor="<?php echo color('4','48'); ?>"><font color="#FFFFFF"><?php echo abc('4','48'); ?></font></td>
<td bgcolor="<?php echo color('5','48'); ?>"><font color="#FFFFFF"><?php echo abc('5','48'); ?></font></td>
<td bgcolor="<?php echo color('6','48'); ?>"><font color="#FFFFFF"><?php echo abc('6','48'); ?></font></td>
<td bgcolor="<?php echo color('7','48'); ?>"><font color="#FFFFFF"><?php echo abc('7','48'); ?></font></td>
<?php }
	$i++;	 
			}
			 ?>
</tr></tbody>
							</table>
							</div>
					<div class="tabbable tabbable-custom tabbable-noborder tabbable-reversed">
						<div class="tab-content">
								<div class="tab-content">
							<div class="tab-pane active" id="tab_0">
								<div class="portlet box green">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-plus"></i>Add 
											Schedule
										</div>
										<div class="tools">
											<a href="javascript:;" class="collapse">
											</a>
											<a href="#portlet-config" data-toggle="modal" class="config">
											</a>
											<a href="javascript:;" class="reload">
											</a>
											<a href="javascript:;" class="remove">
											</a>
										</div>
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" class="form-horizontal form-row-seperated">
											<div class="form-group">
															<label class="control-label col-md-3">
															<strong>Teacher</strong></label>
															<div class="col-md-9">
															<input type="hidden" class="form-control" value="<?php echo $_REQUEST['tech']; ?>" name="pteacher" id="pteacher">
															<input readonly type="text" class="form-control" value="<?php $tyt = $_REQUEST['tech']; $result = mysql_query("SELECT * FROM profile Where teacher_id = $tyt");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$tnumberOfRows = MYSQL_NUMROWS($result);
If ($tnumberOfRows == 0){
			echo '';
			}
		else if ($tnumberOfRows > 0) 
			{
			$i=0;
			while ($i<$tnumberOfRows)
				{			
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"teacher_id");
	
			  		echo $hidden_pt;
	$i++;	 
			}
			} ?>">
															</div>
												</div>
											<div class="form-group">
															<label class="control-label col-md-3">
															<strong>Student</strong></label>
															<div class="col-md-9">
															<input type="hidden" class="form-control" value="<?php echo $_REQUEST['Course_ID']; ?>" name="pstudent" id="pstudent">
															<input readonly type="text" class="form-control" value="<?php echo $_REQUEST['studentName']; ?>">
															</div>
												</div>
											<div class="form-group">
									<label class="control-label col-md-3">
												<strong>Teacher Day</strong></label>
									<div class="md-checkbox-inline">
										<div class="md-checkbox">
											<input <?php checker("1"); ?> type="checkbox" name="checkbox1" value="1" id="checkbox1" class="md-check">
											<label for="checkbox1">
											<span></span>
											<span class="check"></span>
											<span class="box"></span>
											Mon </label>
											<select class="form-control" name="pstime1"  id="pstime1" style="width:250px" onchange="javascript: return optionList9_SelectedIndex()">
                    <option value="">Please Select...</option>
                    <?php $pT =$_REQUEST['tech']; echo opt("12:00-12:30 AM","1","1","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("12:30-01:00 AM","2","1","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("01:00-01:30 AM","3","1","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("01:30-02:00 AM","4","1","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("02:00-02:30 AM","5","1","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("02:30-03:00 AM","6","1","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("03:00-03:30 AM","7","1","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("03:30-04:00 AM","8","1","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("04:00-04:30 AM","9","1","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("04:30-05:00 AM","10","1","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("05:00-05:30 AM","11","1","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("05:30-06:00 AM","12","1","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("06:00-06:30 AM","13","1","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("06:30-07:00 AM","14","1","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("07:00-07:30 AM","15","1","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("07:30-08:00 AM","16","1","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("08:00-08:30 AM","17","1","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("08:30-09:00 AM","18","1","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("09:00-09:30 AM","19","1","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("09:30-10:00 AM","20","1","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("10:00-10:30 AM","21","1","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("10:30-11:00 AM","22","1","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("11:00-11:30 AM","23","1","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("11:30-12:00 PM","24","1","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("12:00-12:30 PM","25","1","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("12:30-01:00 PM","26","1","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("01:00-01:30 PM","27","1","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("01:30-02:00 PM","28","1","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("02:00-02:30 PM","29","1","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("02:30-03:00 PM","30","1","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("03:00-03:30 PM","31","1","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("03:30-04:00 PM","32","1","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("04:00-04:30 PM","33","1","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("04:30-05:00 PM","34","1","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("05:00-05:30 PM","35","1","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("05:30-06:00 PM","36","1","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("06:00-06:30 PM","37","1","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("06:30-07:00 PM","38","1","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("07:00-07:30 PM","39","1","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("07:30-08:00 PM","40","1","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("08:00-08:30 PM","41","1","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("08:30-09:00 PM","42","1","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("09:00-09:30 PM","43","1","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("09:30-10:00 PM","44","1","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("10:00-10:30 PM","45","1","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("10:30-11:00 PM","46","1","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("11:00-11:30 PM","47","1","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("11:30-12:00 PM","48","1","$pT"); ?>
                  </select>
										</div>
										<div class="md-checkbox">
											<input <?php checker("2"); ?> type="checkbox" name="checkbox2" value="2" id="checkbox2" class="md-check">
											<label for="checkbox2">
											<span></span>
											<span class="check"></span>
											<span class="box"></span>
											Tue </label>
											<select class="form-control" name="pstime2"  id="pstime2" style="width:250px" onchange="javascript: return optionList9_SelectedIndex()">
                    <option value="">Please Select...</option>
                    <?php $pT =$_REQUEST['tech']; echo opt("12:00-12:30 AM","1","2","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("12:30-01:00 AM","2","2","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("01:00-01:30 AM","3","2","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("01:30-02:00 AM","4","2","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("02:00-02:30 AM","5","2","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("02:30-03:00 AM","6","2","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("03:00-03:30 AM","7","2","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("03:30-04:00 AM","8","2","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("04:00-04:30 AM","9","2","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("04:30-05:00 AM","10","2","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("05:00-05:30 AM","11","2","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("05:30-06:00 AM","12","2","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("06:00-06:30 AM","13","2","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("06:30-07:00 AM","14","2","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("07:00-07:30 AM","15","2","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("07:30-08:00 AM","16","2","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("08:00-08:30 AM","17","2","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("08:30-09:00 AM","18","2","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("09:00-09:30 AM","19","2","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("09:30-10:00 AM","20","2","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("10:00-10:30 AM","21","2","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("10:30-11:00 AM","22","2","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("11:00-11:30 AM","23","2","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("11:30-12:00 PM","24","2","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("12:00-12:30 PM","25","2","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("12:30-01:00 PM","26","2","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("01:00-01:30 PM","27","2","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("01:30-02:00 PM","28","2","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("02:00-02:30 PM","29","2","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("02:30-03:00 PM","30","2","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("03:00-03:30 PM","31","2","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("03:30-04:00 PM","32","2","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("04:00-04:30 PM","33","2","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("04:30-05:00 PM","34","2","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("05:00-05:30 PM","35","2","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("05:30-06:00 PM","36","2","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("06:00-06:30 PM","37","2","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("06:30-07:00 PM","38","2","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("07:00-07:30 PM","39","2","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("07:30-08:00 PM","40","2","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("08:00-08:30 PM","41","2","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("08:30-09:00 PM","42","2","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("09:00-09:30 PM","43","2","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("09:30-10:00 PM","44","2","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("10:00-10:30 PM","45","2","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("10:30-11:00 PM","46","2","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("11:00-11:30 PM","47","2","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("11:30-12:00 PM","48","2","$pT"); ?>
                  </select>
										</div>
										<div class="md-checkbox">
											<input <?php checker("3"); ?> type="checkbox" name="checkbox3" value="3" id="checkbox3" class="md-check">
											<label for="checkbox3">
											<span></span>
											<span class="check"></span>
											<span class="box"></span>
											Wed </label>
											<select class="form-control" name="pstime3"  id="pstime3" style="width:250px" onchange="javascript: return optionList9_SelectedIndex()">
                    <option value="">Please Select...</option>
                    <?php $pT =$_REQUEST['tech']; echo opt("12:00-12:30 AM","1","3","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("12:30-01:00 AM","2","3","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("01:00-01:30 AM","3","3","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("01:30-02:00 AM","4","3","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("02:00-02:30 AM","5","3","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("02:30-03:00 AM","6","3","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("03:00-03:30 AM","7","3","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("03:30-04:00 AM","8","3","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("04:00-04:30 AM","9","3","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("04:30-05:00 AM","10","3","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("05:00-05:30 AM","11","3","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("05:30-06:00 AM","12","3","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("06:00-06:30 AM","13","3","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("06:30-07:00 AM","14","3","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("07:00-07:30 AM","15","3","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("07:30-08:00 AM","16","3","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("08:00-08:30 AM","17","3","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("08:30-09:00 AM","18","3","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("09:00-09:30 AM","19","3","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("09:30-10:00 AM","20","3","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("10:00-10:30 AM","21","3","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("10:30-11:00 AM","22","3","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("11:00-11:30 AM","23","3","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("11:30-12:00 PM","24","3","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("12:00-12:30 PM","25","3","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("12:30-01:00 PM","26","3","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("01:00-01:30 PM","27","3","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("01:30-02:00 PM","28","3","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("02:00-02:30 PM","29","3","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("02:30-03:00 PM","30","3","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("03:00-03:30 PM","31","3","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("03:30-04:00 PM","32","3","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("04:00-04:30 PM","33","3","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("04:30-05:00 PM","34","3","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("05:00-05:30 PM","35","3","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("05:30-06:00 PM","36","3","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("06:00-06:30 PM","37","3","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("06:30-07:00 PM","38","3","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("07:00-07:30 PM","39","3","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("07:30-08:00 PM","40","3","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("08:00-08:30 PM","41","3","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("08:30-09:00 PM","42","3","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("09:00-09:30 PM","43","3","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("09:30-10:00 PM","44","3","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("10:00-10:30 PM","45","3","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("10:30-11:00 PM","46","3","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("11:00-11:30 PM","47","3","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("11:30-12:00 PM","48","3","$pT"); ?>
                  </select>
										</div>
									</div>
												</div>
							<div class="form-group">
									<label class="control-label col-md-3">
												</label>
									<div class="md-checkbox-inline">
									<div class="md-checkbox">
											<input <?php checker("4"); ?> type="checkbox" name="checkbox4" value="4" id="checkbox4" class="md-check">
											<label for="checkbox4">
											<span></span>
											<span class="check"></span>
											<span class="box"></span>
											Thu </label>
											<select class="form-control" name="pstime4"  id="pstime4" style="width:250px" onchange="javascript: return optionList9_SelectedIndex()">
                    <option value="">Please Select...</option>
                    <?php $pT =$_REQUEST['tech']; echo opt("12:00-12:30 AM","1","4","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("12:30-01:00 AM","2","4","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("01:00-01:30 AM","3","4","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("01:30-02:00 AM","4","4","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("02:00-02:30 AM","5","4","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("02:30-03:00 AM","6","4","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("03:00-03:30 AM","7","4","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("03:30-04:00 AM","8","4","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("04:00-04:30 AM","9","4","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("04:30-05:00 AM","10","4","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("05:00-05:30 AM","11","4","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("05:30-06:00 AM","12","4","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("06:00-06:30 AM","13","4","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("06:30-07:00 AM","14","4","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("07:00-07:30 AM","15","4","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("07:30-08:00 AM","16","4","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("08:00-08:30 AM","17","4","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("08:30-09:00 AM","18","4","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("09:00-09:30 AM","19","4","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("09:30-10:00 AM","20","4","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("10:00-10:30 AM","21","4","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("10:30-11:00 AM","22","4","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("11:00-11:30 AM","23","4","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("11:30-12:00 PM","24","4","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("12:00-12:30 PM","25","4","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("12:30-01:00 PM","26","4","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("01:00-01:30 PM","27","4","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("01:30-02:00 PM","28","4","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("02:00-02:30 PM","29","4","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("02:30-03:00 PM","30","4","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("03:00-03:30 PM","31","4","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("03:30-04:00 PM","32","4","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("04:00-04:30 PM","33","4","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("04:30-05:00 PM","34","4","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("05:00-05:30 PM","35","4","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("05:30-06:00 PM","36","4","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("06:00-06:30 PM","37","4","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("06:30-07:00 PM","38","4","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("07:00-07:30 PM","39","4","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("07:30-08:00 PM","40","4","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("08:00-08:30 PM","41","4","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("08:30-09:00 PM","42","4","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("09:00-09:30 PM","43","4","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("09:30-10:00 PM","44","4","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("10:00-10:30 PM","45","4","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("10:30-11:00 PM","46","4","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("11:00-11:30 PM","47","4","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("11:30-12:00 PM","48","4","$pT"); ?>
                  </select>
										</div>
										<div class="md-checkbox">
											<input <?php checker("5"); ?> type="checkbox" name="checkbox5" value="5" id="checkbox5" class="md-check">
											<label for="checkbox5">
											<span></span>
											<span class="check"></span>
											<span class="box"></span>
											Fri </label>
											<select class="form-control" name="pstime5"  id="pstime5" style="width:250px" onchange="javascript: return optionList9_SelectedIndex()">
                    <option value="">Please Select...</option>
                    <?php $pT =$_REQUEST['tech']; echo opt("12:00-12:30 AM","1","5","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("12:30-01:00 AM","2","5","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("01:00-01:30 AM","3","5","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("01:30-02:00 AM","4","5","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("02:00-02:30 AM","5","5","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("02:30-03:00 AM","6","5","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("03:00-03:30 AM","7","5","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("03:30-04:00 AM","8","5","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("04:00-04:30 AM","9","5","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("04:30-05:00 AM","10","5","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("05:00-05:30 AM","11","5","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("05:30-06:00 AM","12","5","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("06:00-06:30 AM","13","5","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("06:30-07:00 AM","14","5","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("07:00-07:30 AM","15","5","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("07:30-08:00 AM","16","5","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("08:00-08:30 AM","17","5","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("08:30-09:00 AM","18","5","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("09:00-09:30 AM","19","5","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("09:30-10:00 AM","20","5","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("10:00-10:30 AM","21","5","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("10:30-11:00 AM","22","5","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("11:00-11:30 AM","23","5","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("11:30-12:00 PM","24","5","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("12:00-12:30 PM","25","5","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("12:30-01:00 PM","26","5","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("01:00-01:30 PM","27","5","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("01:30-02:00 PM","28","5","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("02:00-02:30 PM","29","5","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("02:30-03:00 PM","30","5","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("03:00-03:30 PM","31","5","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("03:30-04:00 PM","32","5","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("04:00-04:30 PM","33","5","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("04:30-05:00 PM","34","5","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("05:00-05:30 PM","35","5","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("05:30-06:00 PM","36","5","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("06:00-06:30 PM","37","5","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("06:30-07:00 PM","38","5","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("07:00-07:30 PM","39","5","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("07:30-08:00 PM","40","5","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("08:00-08:30 PM","41","5","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("08:30-09:00 PM","42","5","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("09:00-09:30 PM","43","5","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("09:30-10:00 PM","44","5","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("10:00-10:30 PM","45","5","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("10:30-11:00 PM","46","5","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("11:00-11:30 PM","47","5","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("11:30-12:00 PM","48","5","$pT"); ?>
                  </select>
										</div>
										<div class="md-checkbox">
											<input <?php checker("6"); ?> type="checkbox" name="checkbox6" value="6" id="checkbox6" class="md-check">
											<label for="checkbox6">
											<span></span>
											<span class="check"></span>
											<span class="box"></span>
											Sat </label>
											<select class="form-control" name="pstime6"  id="pstime6" style="width:250px" onchange="javascript: return optionList9_SelectedIndex()">
                    <option value="">Please Select...</option>
                    <?php $pT =$_REQUEST['tech']; echo opt("12:00-12:30 AM","1","6","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("12:30-01:00 AM","2","6","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("01:00-01:30 AM","3","6","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("01:30-02:00 AM","4","6","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("02:00-02:30 AM","5","6","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("02:30-03:00 AM","6","6","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("03:00-03:30 AM","7","6","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("03:30-04:00 AM","8","6","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("04:00-04:30 AM","9","6","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("04:30-05:00 AM","10","6","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("05:00-05:30 AM","11","6","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("05:30-06:00 AM","12","6","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("06:00-06:30 AM","13","6","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("06:30-07:00 AM","14","6","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("07:00-07:30 AM","15","6","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("07:30-08:00 AM","16","6","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("08:00-08:30 AM","17","6","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("08:30-09:00 AM","18","6","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("09:00-09:30 AM","19","6","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("09:30-10:00 AM","20","6","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("10:00-10:30 AM","21","6","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("10:30-11:00 AM","22","6","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("11:00-11:30 AM","23","6","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("11:30-12:00 PM","24","6","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("12:00-12:30 PM","25","6","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("12:30-01:00 PM","26","6","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("01:00-01:30 PM","27","6","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("01:30-02:00 PM","28","6","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("02:00-02:30 PM","29","6","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("02:30-03:00 PM","30","6","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("03:00-03:30 PM","31","6","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("03:30-04:00 PM","32","6","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("04:00-04:30 PM","33","6","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("04:30-05:00 PM","34","6","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("05:00-05:30 PM","35","6","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("05:30-06:00 PM","36","6","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("06:00-06:30 PM","37","6","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("06:30-07:00 PM","38","6","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("07:00-07:30 PM","39","6","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("07:30-08:00 PM","40","6","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("08:00-08:30 PM","41","6","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("08:30-09:00 PM","42","6","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("09:00-09:30 PM","43","6","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("09:30-10:00 PM","44","6","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("10:00-10:30 PM","45","6","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("10:30-11:00 PM","46","6","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("11:00-11:30 PM","47","6","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("11:30-12:00 PM","48","6","$pT"); ?>
                  </select>										
									</div>
									</div>
												</div>
								<div class="form-group">
									<label class="control-label col-md-3">
												</label>
									<div class="md-checkbox-inline">
									<div class="md-checkbox">
											<input <?php checker("7"); ?> type="checkbox" name="checkbox7" value="7" id="checkbox7" class="md-check">
											<label for="checkbox7">
											<span></span>
											<span class="check"></span>
											<span class="box"></span>
											Sun </label>
											<select class="form-control" name="pstime7"  id="pstime7" style="width:250px" onchange="javascript: return optionList9_SelectedIndex()">
                    <option value="">Please Select...</option>
                    <?php $pT =$_REQUEST['tech']; echo opt("12:00-12:30 AM","1","7","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("12:30-01:00 AM","2","7","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("01:00-01:30 AM","3","7","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("01:30-02:00 AM","4","7","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("02:00-02:30 AM","5","7","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("02:30-03:00 AM","6","7","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("03:00-03:30 AM","7","7","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("03:30-04:00 AM","8","7","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("04:00-04:30 AM","9","7","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("04:30-05:00 AM","10","7","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("05:00-05:30 AM","11","7","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("05:30-06:00 AM","12","7","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("06:00-06:30 AM","13","7","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("06:30-07:00 AM","14","7","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("07:00-07:30 AM","15","7","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("07:30-08:00 AM","16","7","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("08:00-08:30 AM","17","7","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("08:30-09:00 AM","18","7","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("09:00-09:30 AM","19","7","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("09:30-10:00 AM","20","7","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("10:00-10:30 AM","21","7","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("10:30-11:00 AM","22","7","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("11:00-11:30 AM","23","7","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("11:30-12:00 PM","24","7","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("12:00-12:30 PM","25","7","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("12:30-01:00 PM","26","7","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("01:00-01:30 PM","27","7","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("01:30-02:00 PM","28","7","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("02:00-02:30 PM","29","7","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("02:30-03:00 PM","30","7","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("03:00-03:30 PM","31","7","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("03:30-04:00 PM","32","7","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("04:00-04:30 PM","33","7","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("04:30-05:00 PM","34","7","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("05:00-05:30 PM","35","7","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("05:30-06:00 PM","36","7","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("06:00-06:30 PM","37","7","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("06:30-07:00 PM","38","7","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("07:00-07:30 PM","39","7","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("07:30-08:00 PM","40","7","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("08:00-08:30 PM","41","7","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("08:30-09:00 PM","42","7","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("09:00-09:30 PM","43","7","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("09:30-10:00 PM","44","7","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("10:00-10:30 PM","45","7","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("10:30-11:00 PM","46","7","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("11:00-11:30 PM","47","7","$pT"); ?>
                    <?php $pT =$_REQUEST['tech']; echo opt("11:30-12:00 PM","48","7","$pT"); ?>
                  </select>
									</div>
									</div>
												</div>
												<input type="hidden" class="form-control" value="<?php echo $_REQUEST['nod']; ?>" name="annod" id="annod">
											<div class="form-actions">
												<div class="row">
													<div class="col-md-offset-3 col-md-9">
														<button type="submit" name="cmdSubmit" class="btn btn-circle blue">
														Submit</button>
														<a href="<?php echo $_REQUEST['link']; ?>"></a><button type="button" class="btn btn-circle default">
														Cancel</button>
													</div>
												</div>
											</div>
										</form>
										<!-- END FORM-->
							<!-- /.modal -->
									</div>
								</div>
							<!-- END PAGE CONTENT INNER -->
			
	<!-- BEGIN SAMPLE TABLE PORTLET-->
	<!-- END PAGE CONTENT -->
<!-- END PAGE CONTAINER -->
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<?php echo $fot; ?>