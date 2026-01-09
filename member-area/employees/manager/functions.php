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
function taskall()
{
// sending query
   $result = mysql_query("SELECT * FROM task");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$tnumberOfRows = MYSQL_NUMROWS($result);
echo $tnumberOfRows;
}
function taskcom()
{
// sending query
   $result = mysql_query("SELECT * FROM task Where status = 2");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$tnumberOfRows = MYSQL_NUMROWS($result);
echo $tnumberOfRows;
}
function taskpen()
{
// sending query
   $result = mysql_query("SELECT * FROM task Where status = 1");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$tnumberOfRows = MYSQL_NUMROWS($result);
echo $tnumberOfRows;
}
function trial($sy)
{
$result = mysql_query("SELECT * FROM account WHERE active = 11 and trial_date < '$sy'");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRowsot = MYSQL_NUMROWS($result);
If ($numberOfRowsot == 0) 
	{
	echo '';
	}
else if ($numberOfRowsot > 0) 
	{
	echo '<span class="badge badge-default">'.$numberOfRowsot.'</span>';
	}
}
function trial2()
{
$result = mysql_query("SELECT * FROM account WHERE active = 11");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRowsot = MYSQL_NUMROWS($result);
If ($numberOfRowsot == 0) 
	{
	echo '';
	}
else if ($numberOfRowsot > 0) 
	{
	echo $numberOfRowsot;
	}
}
function note()
{
$result = mysql_query("SELECT * FROM note_student WHERE status = 1");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRowsot = MYSQL_NUMROWS($result);
If ($numberOfRowsot == 0) 
	{
	echo '';
	}
else if ($numberOfRowsot > 0) 
	{
	echo '<span class="badge badge-default">'.$numberOfRowsot.'</span>';
	}
}
function note2()
{
$result = mysql_query("SELECT * FROM note_student WHERE status = 1");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRowsot = MYSQL_NUMROWS($result);
If ($numberOfRowsot == 0) 
	{
	echo '';
	}
else if ($numberOfRowsot > 0) 
	{
	echo $numberOfRowsot;
	}
}
function leave($sy)
{
$result = mysql_query("SELECT * FROM account WHERE active = '7' and leave_date < '$sy'");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRowsot = MYSQL_NUMROWS($result);
If ($numberOfRowsot == 0) 
	{
	echo '';
	}
else if ($numberOfRowsot > 0) 
	{
	echo '<span class="badge badge-default">'.$numberOfRowsot.'</span>';
	}
}
function leave2()
{
$result = mysql_query("SELECT * FROM account WHERE active = '7'");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRowsot = MYSQL_NUMROWS($result);
If ($numberOfRowsot == 0) 
	{
	echo '';
	}
else if ($numberOfRowsot > 0) 
	{
	echo $numberOfRowsot;
	}
}
function task()
{
$result = mysql_query("SELECT * FROM task WHERE status = 1 and type_id = 1");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRowsot = MYSQL_NUMROWS($result);
if ($numberOfRowsot > 0) 
	{
	echo '<span id="pulsate-regular" style="padding:5px;" class="circle">'.$numberOfRowsot.'</span><span class="corner"></span>';
	}
else if ($numberOfRowsot == 0) 
	{
	$result = mysql_query("SELECT * FROM task WHERE status = 1");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRowsot = MYSQL_NUMROWS($result);
if ($numberOfRowsot > 0) 
	{
	echo '<span class="circle">'.$numberOfRowsot.'</span><span class="corner"></span>';
	}
else if ($numberOfRowsot == 0) 
	{
	echo '';
	}
	}
}
?>
