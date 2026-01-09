<?php
require ("../../includes/dbconnection.php");
date_default_timezone_set("Africa/Cairo");
$y =$_REQUEST['year_id'];

// Fetch the data
function psum($m){
require ("../../includes/dbconnection.php");
$y =$_REQUEST['year_id'];
  $sql = "select sum(amount) from account_entry where (ac_cat_id = 2 OR ac_cat_id = 7 OR ac_cat_id = 8 OR ac_cat_id = 9 OR ac_cat_id = 1 OR ac_cat_id = 10 OR ac_cat_id = 11) AND MONTH(date) = $m AND YEAR(date) = $y";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
if($row[0] > 0) 
        {
            echo $row[0];
        }
    else
        {
            echo '0';
        }
}
function rsum($m){
require ("../../includes/dbconnection.php");
$y =$_REQUEST['year_id'];
  $sql = "select sum(amount) from account_entry where (ac_cat_id = 3 OR ac_cat_id = 4 OR ac_cat_id = 6) AND MONTH(date) = $m AND YEAR(date) = $y";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
if($row[0] > 0) 
        {
            echo $row[0];
        }
    else
        {
            echo '0';
        }
}
function tot($m){
require ("../../includes/dbconnection.php");
$y =$_REQUEST['year_id'];
  $sql = "select sum(amount) from account_entry where (ac_cat_id = 2 OR ac_cat_id = 7 OR ac_cat_id = 8 OR ac_cat_id = 9 OR ac_cat_id = 1 OR ac_cat_id = 10 OR ac_cat_id = 11) AND MONTH(date) = $m AND YEAR(date) = $y";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$first = $row[0];
$sql = "select sum(amount) from account_entry where (ac_cat_id = 3 OR ac_cat_id = 4 OR ac_cat_id = 6) AND MONTH(date) = $m AND YEAR(date) = $y";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$second = $row[0];
$total = $second-$first;
echo $total;
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
  echo '  "revenue": ' . "\n";
  echo '  ' . rsum($row['num']) . ',' . "\n";
  echo '  "expense": ' . "\n";
  echo '  ' . psum($row['num']) . ',' . "\n";
  echo '  "surplus": ' . "\n";
  echo '  ' . tot($row['num']) . '' . "\n";
  echo " }";
  $prefix = ",\n";
}
echo "\n]";
?>