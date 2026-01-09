<?php
require ("../../includes/dbconnection.php");
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
date_default_timezone_set("Africa/Cairo");
$y = date('Y');
// Connect to MySQL
$link = mysql_connect( $server_db, $username_db, $userpass_db );
if ( !$link ) {
  die( 'Could not connect: ' . mysql_error() );
}

// Select the data base
$db = mysql_select_db( $name_db, $link );
if ( !$db ) {
  die ( 'Error selecting database \'test\' : ' . mysql_error() );
}

// Fetch the data
function regulars($m)
{
$result = mysql_query("SELECT * FROM account Where active = 1 AND regular_date <= '$m'");

if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0){
			echo '0';
			}
		else if ($numberOfRows > 0) 
			{
			echo $numberOfRows;
			 }
		}
function all($m)
{
$result = mysql_query("SELECT * FROM account Where (active = 5 OR active = 1) AND regular_date <= '$m'");

if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0){
			echo '0';
			}
		else if ($numberOfRows > 0) 
			{
			echo $numberOfRows;
			 }
		}
function month($var)
  {
			$result = mysql_query("SELECT * FROM month WHERE month_id = $var");
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
					$m_id = MYSQL_RESULT($result,$i,"month_id");
					$m_name = MYSQL_RESULT($result,$i,"month_name");
					$m_num = MYSQL_RESULT($result,$i,"num");
					$s_name = MYSQL_RESULT($result,$i,"short_name");
			 echo $s_name;		
	$i++;	 
			}
			}
	}
date_default_timezone_set("Africa/Cairo");
$year1 = date('Y');
$month1 = date('m');
$month2 = date('m', strtotime('-1 month', strtotime(date("F") . "1")));
$month3 = date('m', strtotime('-2 month', strtotime(date("F") . "1")));
$month4 = date('m', strtotime('-3 month', strtotime(date("F") . "1")));
$month5 = date('m', strtotime('-4 month', strtotime(date("F") . "1")));
$month6 = date('m', strtotime('-5 month', strtotime(date("F") . "1")));
if($month2 > $month1){$year2 = $year1-1;} else{$year2 = $year1;}
if($month3 > $month2){$year3 = $year2-1;} else{$year3 = $year2;}
if($month4 > $month3){$year4 = $year3-1;} else{$year4 = $year3;}
if($month5 > $month4){$year5 = $year4-1;} else{$year5 = $year4;}
if($month6 > $month5){$year6 = $year5-1;} else{$year6 = $year5;}
$ddd1 = ''.$year1.'-'.$month1.'-01';
$ddd2 = ''.$year2.'-'.$month2.'-01';
$ddd3 = ''.$year3.'-'.$month3.'-01';
$ddd4 = ''.$year4.'-'.$month4.'-01';
$ddd5 = ''.$year5.'-'.$month5.'-01';
$ddd6 = ''.$year6.'-'.$month6.'-01';
$last_date1 = date("Y-m-t", strtotime($ddd1));
$last_date2 = date("Y-m-t", strtotime($ddd2));
$last_date3 = date("Y-m-t", strtotime($ddd3));
$last_date4 = date("Y-m-t", strtotime($ddd4));
$last_date5 = date("Y-m-t", strtotime($ddd5));
$last_date6 = date("Y-m-t", strtotime($ddd6));
?>
[{
    "month": "<?php echo month("$month6"); ?>-<?php echo $year6; ?>",
    "active": <?php echo regulars("$last_date6"); ?> ,
    "all": <?php echo all("$last_date6"); ?>
},{
    "month": "<?php echo month("$month5"); ?>-<?php echo $year5; ?>",
    "active": <?php echo regulars("$last_date5"); ?> ,
    "all": <?php echo all("$last_date5"); ?>
},{
    "month": "<?php echo month("$month4"); ?>-<?php echo $year4; ?>",
    "active": <?php echo regulars("$last_date4"); ?> ,
    "all": <?php echo all("$last_date4"); ?>
},{
    "month": "<?php echo month("$month3"); ?>-<?php echo $year3; ?>",
    "active": <?php echo regulars("$last_date3"); ?> ,
    "all": <?php echo all("$last_date3"); ?>
},{
    "month": "<?php echo month("$month2"); ?>-<?php echo $year2; ?>",
    "active": <?php echo regulars("$last_date2"); ?> ,
    "all": <?php echo all("$last_date2"); ?>
},{
    "month": "<?php echo month("$month1"); ?>-<?php echo $year1; ?>",
    "active": <?php echo regulars("$last_date1"); ?> ,
    "all": <?php echo all("$last_date1"); ?>
}]