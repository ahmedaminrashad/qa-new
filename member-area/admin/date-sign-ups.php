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

require_once("../includes/mysql-compat.php");

// Check database connection
if (!isset($conn) || !$conn) {
    die("Database connection failed. Please contact the administrator.");
}
date_default_timezone_set("Africa/Cairo");
$s_date =$_REQUEST['start_date'];
$e_date =$_REQUEST['end_date'];
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
function all_requests($m)
{
$y =$_REQUEST['year_id'];
$result = mysql_query("SELECT * FROM new_request Where MONTH(date) = $m AND YEAR(date) = $y");

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

function trials($m)
{
$s_date =$_REQUEST['start_date'];
$e_date =$_REQUEST['end_date'];
$result = mysql_query("SELECT * FROM account Where trial_date => $s_date AND trial_date =< $e_date");

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
function regulars($m)
{
$s_date =$_REQUEST['start_date'];
$e_date =$_REQUEST['end_date'];
$result = mysql_query("SELECT * FROM account Where regular_date => $s_date AND regular_date =< $e_date");

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
function lefts($m)
{
$s_date =$_REQUEST['start_date'];
$e_date =$_REQUEST['end_date'];
$result = mysql_query("SELECT * FROM account WHERE deactivation_date => $s_date AND deactivation_date =< $e_date");

if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0){
			$var1 = 0;
			}
		else if ($numberOfRows > 0) 
			{
			$var1 = $numberOfRows;
			 }
			 echo $var1;
		}
// Print out rows
$prefix = '';
echo "[\n";
while ( $row = mysql_fetch_assoc( $result ) ) {
  echo $prefix . " {\n";
  echo '  "date": "'.$s_date.'-'.$e_date.'",' . "\n";
  echo '  "all_request": ' . "\n";
  echo '  ' . all_requests() . ',' . "\n";
  echo '  "request": ' . "\n";
  echo '  ' . requests() . ',' . "\n";
  echo '  "trial": ' . "\n";
  echo '  ' . trials() . ',' . "\n";
  echo '  "regular": ' . "\n";
  echo '  ' . regulars() . ',' . "\n";
  echo '  "left": ' . "\n";
  echo '  ' . lefts() . '' . "\n";
  echo " }";
  $prefix = ",\n";
}
echo "\n]";

// Close the connection
mysql_close($link);
?>