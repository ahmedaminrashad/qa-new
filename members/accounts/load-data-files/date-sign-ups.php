<?php
require ("../../includes/dbconnection.php");
date_default_timezone_set("Africa/Cairo");
$s_date =$_REQUEST['start_date'];
$e_date =$_REQUEST['end_date'];
// Connect to MySQL

function trials()
{
require ("../../includes/dbconnection.php");
$s_date =$_REQUEST['start_date'];
$e_date =$_REQUEST['end_date'];
$sql = "SELECT * FROM account Where trial_date >= '$s_date' AND trial_date <= '$e_date'";
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
function regulars()
{
require ("../../includes/dbconnection.php");
$s_date =$_REQUEST['start_date'];
$e_date =$_REQUEST['end_date'];
$sql = "SELECT * FROM account Where regular_date >= '$s_date' AND regular_date <= '$e_date'";
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
function lefts()
{
require ("../../includes/dbconnection.php");
$s_date =$_REQUEST['start_date'];
$e_date =$_REQUEST['end_date'];
$sql = "SELECT * FROM account WHERE deactivation_date >= '$s_date' AND deactivation_date <= '$e_date'";
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
function leave()
{
require ("../../includes/dbconnection.php");
$s_date =$_REQUEST['start_date'];
$e_date =$_REQUEST['end_date'];
$sql = "SELECT * FROM account WHERE leave_date >= '$s_date' AND leave_date <= '$e_date'";
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
function suspended()
{
require ("../../includes/dbconnection.php");
$s_date =$_REQUEST['start_date'];
$e_date =$_REQUEST['end_date'];
$sql = "SELECT * FROM account WHERE suspension_date >= '$s_date' AND suspension_date <= '$e_date'";
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
// Print out rows
$prefix = '';
echo "[\n";
  echo $prefix . " {\n";
  echo '  "date": "'.$s_date.' to '.$e_date.'",' . "\n";
  echo '  "trial": ' . "\n";
  echo '  ' . trials() . ',' . "\n";
  echo '  "regular": ' . "\n";
  echo '  ' . regulars() . ',' . "\n";
  echo '  "leave": ' . "\n";
  echo '  ' . leave() . ',' . "\n";
  echo '  "suspend": ' . "\n";
  echo '  ' . suspended() . ',' . "\n";
  echo '  "left": ' . "\n";
  echo '  ' . lefts() . '' . "\n";
  echo " }";
  $prefix = ",\n";
echo "\n]";

?>