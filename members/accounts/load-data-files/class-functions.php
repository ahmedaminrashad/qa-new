<?php
function taken_all($m, $y)
{
require ("../../includes/dbconnection.php");
$sql = "SELECT history_id FROM class_history WHERE monitor_id = '9' AND MONTH(date_admin) = '$m' AND YEAR(date_admin) = '$y' AND re_status = '1'";
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
function taken_all_year($y)
{
require ("../../includes/dbconnection.php");
$sql = "SELECT history_id FROM class_history WHERE monitor_id = '9' AND YEAR(date_admin) = '$y' AND re_status = '1'";
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
function absent_all($m, $y)
{
require ("../../includes/dbconnection.php");
$sql = "SELECT history_id FROM class_history WHERE monitor_id = '4' AND MONTH(date_admin) = '$m' AND YEAR(date_admin) = '$y' AND re_status = '1'";
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
function absent_all_year($y)
{
require ("../../includes/dbconnection.php");
$sql = "SELECT history_id FROM class_history WHERE monitor_id = '4' AND YEAR(date_admin) = '$y' AND re_status = '1'";
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
//Leaves
function leave_all($m, $y)
{
require ("../../includes/dbconnection.php");
$sql = "SELECT history_id FROM class_history WHERE monitor_id = '5' AND MONTH(date_admin) = '$m' AND YEAR(date_admin) = '$y' AND re_status = '1'";
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
function leave_all_year($y)
{
$sql = "SELECT history_id FROM class_history WHERE monitor_id = '5' AND YEAR(date_admin) = '$y' AND re_status = '1'";
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
//Declined
function declined_all($m, $y)
{
$sql = "SELECT history_id FROM class_history WHERE monitor_id = '6' AND MONTH(date_admin) = '$m' AND YEAR(date_admin) = '$y' AND re_status = '1'";
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
function declined_all_year($y)
{
$sql = "SELECT history_id FROM class_history WHERE monitor_id = '6' AND YEAR(date_admin) = '$y' AND re_status = '1'";
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
//Pending
function pending_all($m, $y)
{
$sql = "SELECT history_id FROM class_history WHERE monitor_id = '1' AND MONTH(date_admin) = '$m' AND YEAR(date_admin) = '$y' AND re_status = '1'";
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
function pending_all_year($y)
{
$sql = "SELECT history_id FROM class_history WHERE monitor_id = '1' AND YEAR(date_admin) = '$y' AND re_status = '1'";
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