<?php
require ("../../includes/dbconnection.php");
date_default_timezone_set("Africa/Cairo");
$y =$_REQUEST['year_id'];
function all_requests($m,$var)
{
$y =$_REQUEST['year_id'];
require ("../../includes/dbconnection.php");
$sql = "SELECT history_id FROM class_history WHERE monitor_id = '$var' AND MONTH(date_admin) = '$m' AND YEAR(date_admin) = '$y' AND re_status = '1'";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
echo $numberOfRows;
}

$sql = "SELECT * FROM month ORDER BY month_id ASC";
$result = mysqli_query($conn, $sql);

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
while($row = mysqli_fetch_assoc($result)) {
  echo $prefix . " {\n";
  echo '  "month": "' . $row['short_name'] . '",' . "\n";
  echo '  "taken": ' . "\n";
  echo '  ' . all_requests($row['num'], "9") . ',' . "\n";
  echo '  "absent": ' . "\n";
  echo '  ' . all_requests($row['num'], "4") . ',' . "\n";
  echo '  "leave": ' . "\n";
  echo '  ' . all_requests($row['num'], "5") . ',' . "\n";
  echo '  "declined": ' . "\n";
  echo '  ' . all_requests($row['num'], "6") . ',' . "\n";
  echo '  "pending": ' . "\n";
  echo '  ' . all_requests($row['num'], "1") . '' . "\n";
  echo " }";
  $prefix = ",\n";
}
echo "\n]";
?>