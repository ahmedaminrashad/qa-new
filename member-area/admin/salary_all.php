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

error_reporting(E_STRICT | E_ALL);
include("../includes/dbconnection.php");
include("../includes/email_details.php");


$mysql = mysqli_connect($server_db, $username_db, $userpass_db);
mysqli_select_db($mysql, $name_db);
$result = mysqli_query($mysql, "SELECT * FROM profile WHERE active = 1");

foreach ($result as $row) {
    $name = $row['teacher_name'];
    $TID = $row['teacher_id'];
    $rent = $row['residence_all'];
    $tax = $row['tax'];
    $cat = $row['cat_id'];
    $monthly = $row['salary_amount'];
    $rate = $row['hour_rate'];
    $medical = $row['medical'];
    $enter = $row['entertainment'];
    $misc = $row['misc'];
    $eobi = $row['eobi'];
    $salary = $row['Salary'];
    $cur = $row['currency'];
    if ($cat == 7 OR $cat == 8) { $ft = 7; } else { $ft = 8; }

$dat1 =$_REQUEST['date1'];
$dat2 =$_REQUEST['date2'];
$month =$_REQUEST['mon'];
$year =$_REQUEST['yyy'];
$ddd = ''.$year.'-'.$month.'-01';
$last_date = date("Y-m-t", strtotime($ddd));
//teacher_returns
$teacher_returns = "select sum(amount) from teacher_fine WHERE date >= '$dat1' AND date <= '$dat2' AND teacher_id = $TID AND type = 4";
$teacher_returns_data = mysql_query($teacher_returns);
$teacher_returns_row = mysql_fetch_array($teacher_returns_data);
if ($teacher_returns_row[0] > 0){ $teacher_returns1 = $teacher_returns_row[0]; } else { $teacher_returns1 = 0; }

//teacher_bouns
$teacher_bouns = "select sum(amount) from teacher_fine WHERE date >= '$dat1' AND date <= '$dat2' AND teacher_id = $TID AND type = 2";
$teacher_bouns_data = mysql_query($teacher_bouns);
$teacher_bouns_row = mysql_fetch_array($teacher_bouns_data);
if ($teacher_bouns_row[0] > 0){ $teacher_bouns1 = $teacher_bouns_row[0]; } else { $teacher_bouns1 = 0; }

//teacher_fine
$teacher_fine = "select sum(amount) from teacher_fine WHERE date >= '$dat1' AND date <= '$dat2' AND teacher_id = $TID AND type = 2";
$teacher_fine_data = mysql_query($teacher_fine);
$teacher_fine_row = mysql_fetch_array($teacher_fine_data);
if ($teacher_fine_row[0] > 0){ $teacher_fine1 = $teacher_fine_row[0]; } else { $teacher_fine1 = 0; }

//teacher_fine_redu
$teacher_fine_redu = "select sum(amount) from teacher_fine WHERE date >= '$dat1' AND date <= '$dat2' AND teacher_id = $TID AND type = 1";
$teacher_fine_redu_data = mysql_query($teacher_fine_redu);
$teacher_fine_redu_row = mysql_fetch_array($teacher_fine_redu_data);
if ($teacher_fine_redu_row[0] > 0){ $teacher_fine_redu1 = $teacher_fine_redu_row[0]; } else { $teacher_fine_redu1 = 0; }

//teacher_advance
$teacher_advance = "select sum(amount) from teacher_fine WHERE date >= '$dat1' AND date <= '$dat2' AND teacher_id = $TID AND type = 3";
$teacher_advance_data = mysql_query($teacher_advance);
$teacher_advance_row = mysql_fetch_array($teacher_advance_data);
if ($teacher_advance_row[0] > 0){ $teacher_advance1 = $teacher_advance_row[0]; } else { $teacher_advance1 = 0; }

//teacher_gift
$teacher_gift = "select sum(amount) from teacher_fine WHERE date >= '$dat1' AND date <= '$dat2' AND teacher_id = $TID AND type = 6";
$teacher_gift_data = mysql_query($teacher_gift);
$teacher_gift_row = mysql_fetch_array($teacher_gift_data);
if ($teacher_gift_row[0] > 0){ $teacher_gift1 = $teacher_gift_row[0]; } else { $teacher_gift1 = 0; }

//teacher_add
$teacher_add = "select sum(amount) from teacher_fine WHERE date >= '$dat1' AND date <= '$dat2' AND teacher_id = $TID AND type = 7";
$teacher_add_data = mysql_query($teacher_add);
$teacher_add_row = mysql_fetch_array($teacher_add_data);
if ($teacher_add_row[0] > 0){ $teacher_add1 = $teacher_add_row[0]; } else { $teacher_add1 = 0; }

//teacher_dec
$teacher_dec = "select sum(amount) from teacher_fine WHERE date >= '$dat1' AND date <= '$dat2' AND teacher_id = $TID AND type = 8";
$teacher_dec_data = mysql_query($teacher_dec);
$teacher_dec_row = mysql_fetch_array($teacher_dec_data);
if ($teacher_dec_row[0] > 0){ $teacher_dec1 = $teacher_dec_row[0]; } else { $teacher_dec1 = 0; }

//leave duc
$result23 = mysql_query("SELECT * FROM teacher_attendance WHERE teacher_id = '$TID' AND date >= '$dat1' AND date <= '$dat2' AND status = '2'");
if (!$result23) 
	{
    die("Query to show fields from table failed");
	}
$tnumberOfRows23 = MYSQL_NUMROWS($result23);
if ($tnumberOfRows23 > 0) 
			{$sum1 = ($monthly/30)*$tnumberOfRows23;
			$sum = number_format($sum1, 0);
			}
			else {$sum = 0;}
//hour salary
$dat1 =$_REQUEST['date1'];
$dat2 =$_REQUEST['date2'];
$result7 = mysql_query("SELECT * FROM profile WHERE teacher_id = '$TID'");
if (!$result7) 
	{
    die("Query to show");
	}
$numberOfRows7 = MYSQL_NUMROWS($result7);
If ($numberOfRows7 == 0) 
	{
	echo 'not found';
	}
else if ($numberOfRows7 > 0) 
	{
	$rate_id = MYSQL_RESULT($result7,$i,"hour_rate");
	$cur_id = MYSQL_RESULT($result7,$i,"currency");
	}

$sql2="SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(`duration`))) AS total FROM class_history WHERE teacher_id = '$TID' AND re_status != 2 AND date_teacher >= '$dat1' AND date_teacher <= '$dat2' AND (monitor_id = 4 OR monitor_id = 9 OR monitor_id = 6 OR monitor_id = 21)";
$res2 = mysql_query($sql2);
$totalRow = mysql_fetch_array($res2);
$total = $totalRow['total'];
$hours=$total;

    list($h, $m, $s) = explode(':',$hours);  //Split up string into hours/minutes
    $decimal = $m/60;  //get minutes as decimal
    $hoursAsDecimal = $h+$decimal;
    $hour_salary = $hoursAsDecimal*$rate_id;

$result7 = mysql_query("SELECT * FROM teacher_salary WHERE teacher_id = '$TID' AND date = '$last_date'");
if (!$result7) 
	{
    die("Query to show");
	}
$numberOfRows7 = MYSQL_NUMROWS($result7);
If ($numberOfRows7 == 0) 
	{
	    
	mysql_query ("INSERT INTO teacher_salary (teacher_id, date, monthly_salary, company_returns, performance, residence_all, fine, leave_duc, advance_duc, tax, type, fine_reduc, class_earning, csr_earning, hour_earning, slot_earning, slot_rate, class_rate, hour_rate, csr_rate, acc_type, cat_id, total_classes, total_hours, num_student, gift, other_add, other_dec, date1, date2, currency)
					VALUES('$TID', '$last_date', '$monthly', '$teacher_returns1', '$teacher_bouns1', '$rent', '$teacher_fine1', '$sum', '$teacher_advance1', '$tax', '$salary', '$teacher_fine_redu1', '0', '0', '$hour_salary', '0', '0', '0', '$rate_id', '0', '$ft', '$cat', '0', '$hoursAsDecimal', '0', '$teacher_gift1', '$teacher_add1', '$teacher_dec1', '$dat1', '$dat2', '$cur')") or die(mysql_error()); 
			 	echo '<font color="green"><b>Salary Generated Successfully '.$name.' <a href="teacher-accounts-profile?profile_no='.base64_encode($TID).'">See Profile</a></b></font> <br>';
	}
else if ($numberOfRows7 > 0) 
	{
echo '<font color="red"><b>Salary Already Generated for '.$name.' for the month of '.$month.'-'.$year.' <a href="teacher-accounts-profile?profile_no='.base64_encode($TID).'">See Profile</a>.</b></font> <br>';

	}   
}
echo 'Go to Salary record of this month <a href="monthly-salary-details-ana?mon='.$month.'&yr='.$year.'"> Click Here</a>';
?>
