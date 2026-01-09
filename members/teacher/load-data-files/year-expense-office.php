<?php
require ("../../includes/dbconnection.php");
date_default_timezone_set("Africa/Cairo");
$y =$_REQUEST['year_id'];
function poffice1($m){
require ("../../includes/dbconnection.php");
$y =$_REQUEST['year_id'];
  $sql = "select sum(amount) from account_entry where (account_head = 3 Or account_head = 5 Or account_head = 13 Or account_head = 15 Or account_head = 16 Or account_head = 17 Or account_head = 18 Or account_head = 19 Or account_head = 22 Or account_head = 23 Or account_head = 42 Or account_head = 44) AND MONTH(date) = $m AND YEAR(date) = $y AND office_id = 1";
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
function poffice2($m){
require ("../../includes/dbconnection.php");
$y =$_REQUEST['year_id'];
  $sql = "select sum(amount) from account_entry where (account_head = 3 Or account_head = 5 Or account_head = 13 Or account_head = 15 Or account_head = 16 Or account_head = 17 Or account_head = 18 Or account_head = 19 Or account_head = 22 Or account_head = 23 Or account_head = 42 Or account_head = 44) AND MONTH(date) = $m AND YEAR(date) = $y AND office_id = 2";
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
function poffice3($m){
require ("../../includes/dbconnection.php");
$y =$_REQUEST['year_id'];
  $sql = "select sum(amount) from account_entry where (account_head = 3 Or account_head = 5 Or account_head = 13 Or account_head = 15 Or account_head = 16 Or account_head = 17 Or account_head = 18 Or account_head = 19 Or account_head = 22 Or account_head = 23 Or account_head = 42 Or account_head = 44) AND MONTH(date) = $m AND YEAR(date) = $y AND office_id = 3";
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
  echo '  "month": "' . $row['month_name'] . '",' . "\n";
  echo '  "Office_1": ' . "\n";
  echo '  ' . poffice1($row['num']) . ',' . "\n";
  echo '  "Office_2": ' . "\n";
  echo '  ' . poffice2($row['num']) . ',' . "\n";
  echo '  "Office_3": ' . "\n";
  echo '  ' . poffice3($row['num']) . '' . "\n";
  echo " }";
  $prefix = ",\n";
}
echo "\n]";
?>