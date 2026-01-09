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

require_once("../includes/mysql-compat.php");

// Check database connection
if (!isset($conn) || !$conn) {
    die("Database connection failed. Please contact the administrator.");
}
$result = mysql_query("SELECT * FROM sched WHERE aday_id = '3' AND teacher_id = '104' AND course_id = '1008'") or die(mysql_error());
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
	while($row = mysql_fetch_assoc($result))
		{
		$id = $row['sched_id'];
		$dif=$row['day_id']-$row['aday_id'];
		if($dif == 6){$a1 = -1;}
		elseif($dif == -6){$a1 = 1;}
		else {$a1 = $dif;}
		$difs=$row['sday_id']-$row['aday_id'];
		if($dif == 6){$a1 = -1;}
		elseif($dif == -6){$a1 = 1;}
		else {$a1 = $dif;}
		$teacher_day = date('Y-m-d',strtotime("".$date." ".$a1." days"));
		$student_day = date('Y-m-d',strtotime("".$date." ".$a2." days"));
		echo $teacher_day;
		echo '<br>'.$a1.'';}
		}
 ?>