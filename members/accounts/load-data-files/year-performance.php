<?php
require ("../../includes/dbconnection.php");
date_default_timezone_set("Africa/Cairo");
$y =$_REQUEST['year_id'];

function perform($m)
{
require ("../../includes/dbconnection.php");
$y =$_REQUEST['year_id'];
$er =$_REQUEST['csr'];
$sql = "SELECT SUM(attendence+test+teaching+language+subject+attentiveness+dress_code+behaviour+discipline+complaints) FROM teacher_performance_c where teacher_id = $er AND MONTH(date) = $m AND YEAR(date) = $y"; 
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
if ($row[0] == 0){
echo '0';
}
else{
$total = $row[0]/10;
echo $total;
						}
}


$query = "SELECT * FROM month ORDER BY month_id ASC";
$result = mysqli_query($conn, $query );

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
while ( $row = mysqli_fetch_assoc( $result ) ) {
  echo $prefix . " {\n";
  echo '  "month": "' . $row['short_name'] . '",' . "\n";
  echo '  "Performance": ' . "\n";
  echo '  ' . perform($row['num']) . '' . "\n";
  echo " }";
  $prefix = ",\n";
}
echo "\n]";
?>