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
?>
<?php
	$pid =$_REQUEST['t_id1'];
	$piy =$_REQUEST['pp_idName'];
	$pidName =$_REQUEST['t_idName'];
	$link =$_REQUEST['link'];
	$result = mysql_query("SELECT * FROM class_history WHERE history_id = (SELECT MAX(history_id) FROM class_history WHERE course_id = '$pid');") or die(mysql_error());
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
					$tech_id = MYSQL_RESULT($result,$i,"teacher_id");
	$i++;	 
			}
			}
	mysql_query("UPDATE course SET nature = '1', Teacher = '$tech_id' WHERE course_id = '$pid'") or die(mysql_error());  	
	header('Location: email-general?pid='.$piy.'&type=email-activate-student-temp&name='.$pidName.'');

?>