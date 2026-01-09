<?php
require ("../includes/dbconnection.php");
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
		 	$teacherid= $_POST['pteacher'];
			$studentid= $_POST['pstudent'];
			$teacher_time = $_POST['pstime1'];
			$teacher_date = $_POST['checkbox1'];
			$history = $_POST['his'];

$result = mysql_query ("SELECT * FROM course WHERE course_id = '$studentid'")or die(mysql_error());
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
					$tzy_stud = MYSQL_RESULT($result,$i,"timezone");
					$teacher_name = MYSQL_RESULT($result,$i,"Teacher");
					$tzyphp = MYSQL_RESULT($result,$i,"php_tz");
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
					$tzy_tech = MYSQL_RESULT($result1,$i,"timezone_dif");
		
	$i++;	 
			}

$z = 48;
$tzt = $tzy_tech+$tzy_tech;
$tzs = $tzy_stud+$tzy_stud;
$x = $teacher_time+$tzs-$tzt;
if ($x < 0){
		$student_time = $z+$x;
		$a = -1;
		}
elseif ($x == 0){
		$student_time = $z;
		$a = -1;
	}
elseif ($x > 0 and $x < $z){
		$student_time = $x;
		$a = 0;
		}
elseif ($x == $z){
		$student_time = $x;
		$a = 0;
	}
elseif ($x > $z){
		$student_time = $x-$z;
		$a = 1;
	}
$y = $teacher_time-$tzt;		
if ($y < 0){
		$admin_time = $z+$y;
		$b = -1;
		}
elseif ($y == 0){
		$admin_time = $z;
		$b = -1;
	}
elseif ($y > 0 and $y < $z){
		$admin_time = $y;
		$b = 0;
		}
elseif ($y == $z){
		$admin_time = $y;
		$b = 0;
	}
elseif ($y > $z){
		$admin_time = $y-$z;
		$b = 1;
	}
$date = $teacher_date;
$date1 = str_replace('-', '/', $date);
$student_date = date('Y-m-d',strtotime("".$date1." ".$a." days"));
$admin_date = date('Y-m-d',strtotime("".$date1." ".$b." days"));

			header(
			"Location: update-teacher-time-class.php?teacher=".$teacherid."&student=".$studentid."&t_date=".$teacher_date."&s_date=".$student_date."&a_date=".$admin_date."&t_time=".$teacher_time."&s_time=".$student_time."&a_time=".$admin_time."&history=".$history."&link=".$link."&dept=".$dept."&a_dept=".$adept."&parent_id=".$parent."&admindate=".$add."&teacherdate=".$tdd."&studentdate=".$sdd."&mp_id=".$mp."");
?>