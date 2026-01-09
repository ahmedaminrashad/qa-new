<?php if (empty($session)) { session_start(); } 
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
?>
<?php
  include("../includes/session.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");  
date_default_timezone_set($TimeZoneCustome);
  $pT = $_SESSION['is']['teacher_id'];
			$result = mysql_query("SELECT * FROM profile WHERE teacher_id='$pT' ");
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
					$link = MYSQL_RESULT($result,$i,"link");
			 		$zoom_link = $link;			
	$i++;	 
			}
			}
?>
<!--<a href="" class="button">Refresh Page</a><br>
<!--<a href="https://www.<?php //echo $site_nameS; ?>.com/member-area/employees/teacher/classroom" class="button">Refresh Page</a><br>-->
<!--<a href="https://www.<?php //echo $site_nameS; ?>/member-area/employees/teacher/" class="button">Go Back</a>-->
<iframe src="<?php echo $zoom_link; ?>" style="border: 0; width: 100%; height: 100%">Your browser doesn't support iFrames.</iframe>