<?php
function trials($s_date, $e_date)
{
require ("../../includes/dbconnection.php");
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
function regulars($s_date, $e_date)
{
require ("../../includes/dbconnection.php");
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
function lefts($s_date, $e_date)
{
require ("../../includes/dbconnection.php");
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
function leave($s_date, $e_date)
{
require ("../../includes/dbconnection.php");
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
function suspended($s_date, $e_date)
{
require ("../../includes/dbconnection.php");
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
?>