<?php
function site_all($m, $y, $s)
{
require ("../../includes/dbconnection.php");
$sql = "SELECT * FROM new_request Where MONTH(date) = $m AND YEAR(date) = $y AND site_id = '$s'";
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
function site_total($y, $s)
{
require ("../../includes/dbconnection.php");
$sql = "SELECT * FROM new_request Where YEAR(date) = $y AND site_id = '$s'";
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
function leftsall($m, $y)
{
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
function req_reg_ratio($m, $y)
{
require ("../../includes/dbconnection.php");
$sql1 = "SELECT * FROM new_request Where status != 10 AND MONTH(date) = $m AND YEAR(date) = $y";
$counter1 = 0;
$result1 = mysqli_query($conn, $sql1);
$numberOfRows1 = mysqli_num_rows($result1);
$sql = "SELECT * FROM account Where MONTH(regular_date) = $m AND YEAR(regular_date) = $y";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows1 > 0){
$total=($numberOfRows/$numberOfRows1)*100;
echo number_format($total, 0); echo '%';
		}
		else {echo '0%';}
}
function req_reg_ratio_year($y)
{
require ("../../includes/dbconnection.php");
$sql1 = "SELECT * FROM new_request Where status != 10 AND YEAR(date) = $y";
$counter1 = 0;
$result1 = mysqli_query($conn, $sql1);
$numberOfRows1 = mysqli_num_rows($result1);
$sql = "SELECT * FROM account Where YEAR(regular_date) = $y";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
$total=($numberOfRows/$numberOfRows1)*100;
echo number_format($total, 0); echo '%';
		}
function requests($m, $y)
{
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
function requests_att($y)
{
require ("../../includes/dbconnection.php");
$sql = "SELECT * FROM new_request Where status != 10 AND YEAR(date) = $y";
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
function requests_all($m, $y)
{
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
function requests_total($y)
{
require ("../../includes/dbconnection.php");
$sql = "SELECT * FROM new_request Where YEAR(date) = $y";
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
function trials($m, $y)
{
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
function trials_total($y)
{
require ("../../includes/dbconnection.php");
$sql = "SELECT * FROM account Where YEAR(trial_date) = $y";
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
function regulars($m, $y)
{
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
function regulars_total($y)
{
require ("../../includes/dbconnection.php");
$sql = "SELECT * FROM account Where YEAR(regular_date) = $y";
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
function active($m)
{
require ("../../includes/dbconnection.php");
$sql = "SELECT * FROM account Where active = 1 AND regular_date <= '$m'";
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
function free($m)
{
require ("../../includes/dbconnection.php");
$sql = "SELECT * FROM account Where active = 5 AND regular_date <= '$m'";
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
function req_note($er)
{
require ("../../includes/dbconnection.php");
// sending query
$sql = "SELECT * FROM new_request_comments Where request_id = $er";
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
function csr($t)
  {
  require ("../../includes/dbconnection.php");
  $sql = "SELECT * FROM profile Where teacher_id = '$t'";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
If ($numberOfRows == 0) 
	{
	echo 'Not Alocated';
	}
else if ($numberOfRows > 0) 
	{
	while($row = mysqli_fetch_assoc($result)){		
		
			$acat_id = $row['teacher_id'];
			$acat_name = $row['teacher_name'];
			echo $acat_name;	 
			}
			}
	}
function hsum($h, $m, $y){
require ("../../includes/dbconnection.php");
  $sql = "select sum(amount) from account_entry where account_head = $h AND MONTH(date) = $m AND YEAR(date) = $y";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
if($row[0] > 0) 
        {
            echo $row[0];
        }
    else
        {
            echo '--';
        }
}
function psum($m, $y){
require ("../../includes/dbconnection.php");
  $sql = "select sum(amount) from account_entry where (ac_cat_id = 2 OR ac_cat_id = 7 OR ac_cat_id = 8 OR ac_cat_id = 9 OR ac_cat_id = 1 OR ac_cat_id = 10 OR ac_cat_id = 11) AND MONTH(date) = $m AND YEAR(date) = $y";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
if($row[0] > 0) 
        {
            echo number_format($row[0], 2);
        }
    else
        {
            echo '--';
        }
}
function rsum($m, $y){
require ("../../includes/dbconnection.php");
  $sql = "select sum(amount) from account_entry where (ac_cat_id = 3 OR ac_cat_id = 4 OR ac_cat_id = 6) AND MONTH(date) = $m AND YEAR(date) = $y";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
if($row[0] > 0) 
        {
            echo number_format($row[0], 2);
        }
    else
        {
            echo '--';
        }
}
function tot($m, $y){
require ("../../includes/dbconnection.php");
  $sql = "select sum(amount) from account_entry where (ac_cat_id = 2 OR ac_cat_id = 7 OR ac_cat_id = 8 OR ac_cat_id = 9 OR ac_cat_id = 1 OR ac_cat_id = 10 OR ac_cat_id = 11) AND MONTH(date) = $m AND YEAR(date) = $y";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$first = $row[0];
$sql = "select sum(amount) from account_entry where (ac_cat_id = 3 OR ac_cat_id = 4 OR ac_cat_id = 6) AND MONTH(date) = $m AND YEAR(date) = $y";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$second = $row[0];
$total = $second-$first;
if($total >= 2) 
        {
            echo '<font color="#44B6AE"><i class="fa fa-sort-up"></i>  <b>'.$total.'</b></font>';
        }
    else
        {
            echo '<font color="#EF4836"><i class="fa fa-sort-down"></i>  <b>'.$total.'</b></font>';
        }
}
function totavg($m, $y){
require ("../../includes/dbconnection.php");
  $sql = "select sum(amount) from account_entry where (ac_cat_id = 2 OR ac_cat_id = 7 OR ac_cat_id = 8 OR ac_cat_id = 9 OR ac_cat_id = 1 OR ac_cat_id = 10 OR ac_cat_id = 11) AND MONTH(date) = $m AND YEAR(date) = $y";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$first = $row[0];
$sql = "select sum(amount) from account_entry where (ac_cat_id = 3 OR ac_cat_id = 4 OR ac_cat_id = 6) AND MONTH(date) = $m AND YEAR(date) = $y";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$second = $row[0];
if ($second == 0){ echo '--'; }
if ($second > 0){ $total = ($first/$second)*100;
echo number_format($total, 2); echo '%';
}
}
function pavg($y){
require ("../../includes/dbconnection.php");
  $sql = "select sum(amount) from account_entry where (ac_cat_id = 2 OR ac_cat_id = 7 OR ac_cat_id = 8 OR ac_cat_id = 9 OR ac_cat_id = 1 OR ac_cat_id = 10 OR ac_cat_id = 11) AND YEAR(date) = $y";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$first = $row[0];
$pa = $first/12;
echo number_format($pa, 2);
}
function ravg($y){
require ("../../includes/dbconnection.php");
$sql = "select sum(amount) from account_entry where (ac_cat_id = 3 OR ac_cat_id = 4 OR ac_cat_id = 6) AND YEAR(date) = $y";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$second = $row[0];
$ra = $second/12;
echo number_format($ra, 2);
}
function gavg($m, $y){
require ("../../includes/dbconnection.php");
  $sql = "select sum(amount) from account_entry where (ac_cat_id = 2 OR ac_cat_id = 7 OR ac_cat_id = 8 OR ac_cat_id = 9 OR ac_cat_id = 1 OR ac_cat_id = 10 OR ac_cat_id = 11) AND YEAR(date) = $y";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$first = $row[0];
$sql = "select sum(amount) from account_entry where (ac_cat_id = 3 OR ac_cat_id = 4 OR ac_cat_id = 6) AND YEAR(date) = $y";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$second = $row[0];
if ($second == 0){ echo '--'; }
if ($second > 0){ $total = (($first/$second)*100)/12;
echo number_format($total, 2); echo '%';
}
}
function cash($y){
require ("../../includes/dbconnection.php");
  $sql = "select sum(amount) from account_entry where (ac_cat_id = 2 OR ac_cat_id = 7 OR ac_cat_id = 8 OR ac_cat_id = 9 OR ac_cat_id = 1 OR ac_cat_id = 10 OR ac_cat_id = 11) AND date <= '$y'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$first = $row[0];
$sql = "select sum(amount) from account_entry where (ac_cat_id = 3 OR ac_cat_id = 4 OR ac_cat_id = 6) AND date <= '$y'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$second = $row[0];
$total = $second-$first;
if($total >= 0) 
        {
            echo '<font color="#44B6AE"><b>'.$total.'</b></font>';
        }
    else
        {
            echo '<font color="#EF4836"><b>'.$total.'</b></font>';
        }
}
?>