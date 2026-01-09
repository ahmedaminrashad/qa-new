<?php
require ("../../includes/dbconnection.php");
date_default_timezone_set("Africa/Cairo");
$y =$_REQUEST['year_id'];

function site_1($m)
{
$y =$_REQUEST['year_id'];
require ("../../includes/dbconnection.php");
$sql = "SELECT * FROM new_request Where MONTH(date) = $m AND YEAR(date) = $y AND site_id = 1";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
if ($numberOfRows == 0) 
	{
	echo '0';
	}
elseif ($numberOfRows > 0) 
	{
	echo $numberOfRows;
	}
		}
function site_2($m)
{
$y =$_REQUEST['year_id'];
require ("../../includes/dbconnection.php");
$sql = "SELECT * FROM new_request Where MONTH(date) = $m AND YEAR(date) = $y AND site_id = 2";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
if ($numberOfRows == 0) 
	{
	echo '0';
	}
elseif ($numberOfRows > 0) 
	{
	echo $numberOfRows;
	}
		}
function site_3($m)
{
$y =$_REQUEST['year_id'];
require ("../../includes/dbconnection.php");
$sql = "SELECT * FROM new_request Where MONTH(date) = $m AND YEAR(date) = $y AND site_id = 3";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
if ($numberOfRows == 0) 
	{
	echo '0';
	}
elseif ($numberOfRows > 0) 
	{
	echo $numberOfRows;
	}
		}
function site_4($m)
{
$y =$_REQUEST['year_id'];
require ("../../includes/dbconnection.php");
$sql = "SELECT * FROM new_request Where MONTH(date) = $m AND YEAR(date) = $y AND site_id = 4";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
if ($numberOfRows == 0) 
	{
	echo '0';
	}
elseif ($numberOfRows > 0) 
	{
	echo $numberOfRows;
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
  echo '  "site01": ' . "\n";
  echo '  ' . site_1($row['num']) . ',' . "\n";
  echo '  "site02": ' . "\n";
  echo '  ' . site_2($row['num']) . ',' . "\n";
  echo '  "site03": ' . "\n";
  echo '  ' . site_3($row['num']) . ',' . "\n";
  echo '  "site04": ' . "\n";
  echo '  ' . site_4($row['num']) . '' . "\n";
  echo " }";
  $prefix = ",\n";
}
echo "\n]";

?>