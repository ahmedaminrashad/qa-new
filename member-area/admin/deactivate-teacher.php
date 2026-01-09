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
date_default_timezone_set("Africa/Cairo");
$time_start = date(" g:i:A", time(true));
?>
<?php
	$pid =$_REQUEST['pteacher'];
	$pidname =$_REQUEST['pname'];
	$sta =$_REQUEST['sts'];
	$stalog =$_REQUEST['stlog'];
	$date = date('d-m-Y', time());
	$result = mysql_query("SELECT * FROM course Where Teacher = $pid");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$tnumberOfRows = MYSQL_NUMROWS($result);
If ($tnumberOfRows == 0){
			mysql_query("UPDATE profile SET active = '$sta', dept_id = '$stalog', deactive = '$date' WHERE teacher_id = '$pid'") or die(mysql_error());
			header('Location: ' . $_SERVER['HTTP_REFERER']);
			}
		elseif ($tnumberOfRows > 0) 
			{
			echo '<center style=" margin-top: 200px; font-size: larger; color: #FF0000; vertical-align: middle;">You are not allowed to deactivate teacher <b>'.$pidname.'</b>. Total number of students with him/her is '.$tnumberOfRows.'. <a href="list-of-teachers"><button type="button" class="btn red btn-xs">Go Back</button></a></center>';
			}	
?>