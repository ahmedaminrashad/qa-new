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
$y =$_REQUEST['year_id'];
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
function perform($m)
{
$y =$_REQUEST['year_id'];
$er =$_REQUEST['csr'];
$sql = "SELECT SUM(attendence+test+teaching+language+subject+attentiveness+dress_code+behaviour+discipline+complaints) FROM teacher_performance_c where teacher_id = $er AND MONTH(date) = $m AND YEAR(date) = $y"; 
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
if ($row[0] == 0){
echo '0';
}
else{
$total = $row[0]/10;
echo $total;
						}
}


$query = "SELECT * FROM month ORDER BY month_id ASC";
$result = mysql_query( $query );

// All good?
if ( !$result ) {
  // Nope
  $message  = 'Invalid query: ' . mysql_error() . "\n";
  $message .= 'Whole query: ' . $query;
  die( $message );
}

// Print out rows
$prefix = '';
echo "[\n";
while ( $row = mysql_fetch_assoc( $result ) ) {
  echo $prefix . " {\n";
  echo '  "month": "' . $row['short_name'] . '",' . "\n";
  echo '  "Performance": ' . "\n";
  echo '  ' . perform($row['num']) . '' . "\n";
  echo " }";
  $prefix = ",\n";
}
echo "\n]";

// Close the connection
mysql_close($link);
?>