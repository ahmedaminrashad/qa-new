<?php
require ("../../includes/dbconnection.php");
date_default_timezone_set("Africa/Cairo");
$y =$_REQUEST['year_id'];
function psumi_t($m){
require ("../../includes/dbconnection.php");
$y =$_REQUEST['year_id'];
$h=$_REQUEST['h_id'];
$sql = "select sum(amount) from account_entry where ac_cat_id = $h AND MONTH(date) = $m AND YEAR(date) = $y";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$second = $row[0];
if ($second == 0){
echo '0';
}
else {
echo $second;
}
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
  echo '  "amount": ' . "\n";
  echo '  ' . psumi_t($row['num']) . '' . "\n";
  echo " }";
  $prefix = ",\n";
}
echo "\n]";
?>