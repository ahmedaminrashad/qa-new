<?php
require ("../../includes/dbconnection.php");
date_default_timezone_set("Africa/Cairo");
$y =$_REQUEST['year_id'];
function all_requests($m)
{
$y =$_REQUEST['year_id'];
require ("../../includes/dbconnection.php");
$sql = "SELECT * FROM new_request Where MONTH(date) = $m AND YEAR(date) = $y";
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
function requests($m)
{
$y =$_REQUEST['year_id'];
require ("../../includes/dbconnection.php");
$sql = "SELECT * FROM new_request Where status != 10 AND MONTH(date) = $m AND YEAR(date) = $y";
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
function trials($m)
{
$y =$_REQUEST['year_id'];
require ("../../includes/dbconnection.php");
$sql = "SELECT * FROM account Where MONTH(trial_date) = $m AND YEAR(trial_date) = $y";
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
function regulars($m)
{
$y =$_REQUEST['year_id'];
require ("../../includes/dbconnection.php");
$sql = "SELECT * FROM account Where MONTH(regular_date) = $m AND YEAR(regular_date) = $y";
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
function lefts($m)
{
$y =$_REQUEST['year_id'];
require ("../../includes/dbconnection.php");
$sql = "SELECT * FROM account WHERE MONTH(deactivation_date) = $m AND YEAR(deactivation_date) = $y AND dateDiff(deactivation_date,regular_date) > 30";
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
  echo '  "all_request": ' . "\n";
  echo '  ' . all_requests($row['num']) . ',' . "\n";
  echo '  "request": ' . "\n";
  echo '  ' . requests($row['num']) . ',' . "\n";
  echo '  "trial": ' . "\n";
  echo '  ' . trials($row['num']) . ',' . "\n";
  echo '  "regular": ' . "\n";
  echo '  ' . regulars($row['num']) . ',' . "\n";
  echo '  "left": ' . "\n";
  echo '  ' . lefts($row['num']) . '' . "\n";
  echo " }";
  $prefix = ",\n";
}
echo "\n]";
?>