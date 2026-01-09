<?php
function trials($s_date, $e_date)
{
require ("db.php");
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
require ("db.php");
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
require ("db.php");
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
function regularsfee($s_date, $e_date, $t)
{
    require ("db.php");
$sql = "SELECT sum(fee) FROM account Where currency_id = '$t' AND regular_date >= '$s_date' AND regular_date <= '$e_date'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$fee = $row[0];
echo number_format($fee, 0);
		}
function leftsrealfee($s_date, $e_date, $t)
{
    require ("db.php");
$sql = "SELECT sum(fee) FROM account WHERE currency_id = '$t' AND deactivation_date >= '$s_date' AND deactivation_date <= '$e_date' AND exists (select 1 from invoice where parent_id = account.parent_id);";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$fee = $row[0];
echo number_format($fee, 0);
		}
function leftsreal($s_date, $e_date)
{
    require ("db.php");
$sql = "SELECT * FROM account WHERE deactivation_date >= '$s_date' AND deactivation_date <= '$e_date' AND exists (select 1 from invoice where parent_id = account.parent_id);";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '0';
			}
		elseif ($numberOfRows > 0) 
			{
			echo $numberOfRows;
			}
		}
function leave($s_date, $e_date)
{
require ("db.php");
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
require ("db.php");
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