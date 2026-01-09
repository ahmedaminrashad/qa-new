<?php

//error_reporting(E_STRICT | E_ALL);
include("../includes/dbconnection.php");
$sql = "SELECT * FROM profile WHERE active = 1";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){
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
    $rate_id = $row['hour_rate'];
	$cur_id = $row['currency'];
    if ($cat == 7 OR $cat == 8) { $ft = 7; } else { $ft = 8; }

$dat1 =$_REQUEST['date1'];
$dat2 =$_REQUEST['date2'];
$month =$_REQUEST['mon'];
$year =$_REQUEST['yyy'];
$ddd = ''.$year.'-'.$month.'-01';
$last_date = date("Y-m-t", strtotime($ddd));
//teacher_returns
$teacher_returns = "select sum(amount) from teacher_fine WHERE date >= '$dat1' AND date <= '$dat2' AND teacher_id = $TID AND type = 4";
$teacher_returns_data = mysqli_query($conn, $teacher_returns);
$teacher_returns_row = mysqli_fetch_array($teacher_returns_data);
if ($teacher_returns_row[0] > 0){ $teacher_returns1 = $teacher_returns_row[0]; } else { $teacher_returns1 = 0; }

//teacher_bouns
$teacher_bouns = "select sum(amount) from teacher_fine WHERE date >= '$dat1' AND date <= '$dat2' AND teacher_id = $TID AND type = 2";
$teacher_bouns_data = mysqli_query($conn, $teacher_bouns);
$teacher_bouns_row = mysqli_fetch_array($teacher_bouns_data);
if ($teacher_bouns_row[0] > 0){ $teacher_bouns1 = $teacher_bouns_row[0]; } else { $teacher_bouns1 = 0; }

//teacher_fine
$teacher_fine = "select sum(amount) from teacher_fine WHERE date >= '$dat1' AND date <= '$dat2' AND teacher_id = $TID AND type = 1";
$teacher_fine_data = mysqli_query($conn, $teacher_fine);
$teacher_fine_row = mysqli_fetch_array($teacher_fine_data);
if ($teacher_fine_row[0] > 0){ $teacher_fine1 = $teacher_fine_row[0]; } else { $teacher_fine1 = 0; }

//teacher_fine_redu
$teacher_fine_redu = "select sum(amount) from teacher_fine WHERE date >= '$dat1' AND date <= '$dat2' AND teacher_id = $TID AND type = 5";
$teacher_fine_redu_data = mysqli_query($conn, $teacher_fine_redu);
$teacher_fine_redu_row = mysqli_fetch_array($teacher_fine_redu_data);
if ($teacher_fine_redu_row[0] > 0){ $teacher_fine_redu1 = $teacher_fine_redu_row[0]; } else { $teacher_fine_redu1 = 0; }

//teacher_advance
$teacher_advance = "select sum(amount) from teacher_fine WHERE date >= '$dat1' AND date <= '$dat2' AND teacher_id = $TID AND type = 3";
$teacher_advance_data = mysqli_query($conn, $teacher_advance);
$teacher_advance_row = mysqli_fetch_array($teacher_advance_data);
if ($teacher_advance_row[0] > 0){ $teacher_advance1 = $teacher_advance_row[0]; } else { $teacher_advance1 = 0; }

//teacher_gift
$teacher_gift = "select sum(amount) from teacher_fine WHERE date >= '$dat1' AND date <= '$dat2' AND teacher_id = $TID AND type = 6";
$teacher_gift_data = mysqli_query($conn, $teacher_gift);
$teacher_gift_row = mysqli_fetch_array($teacher_gift_data);
if ($teacher_gift_row[0] > 0){ $teacher_gift1 = $teacher_gift_row[0]; } else { $teacher_gift1 = 0; }

//teacher_add
$teacher_add = "select sum(amount) from teacher_fine WHERE date >= '$dat1' AND date <= '$dat2' AND teacher_id = $TID AND type = 7";
$teacher_add_data = mysqli_query($conn, $teacher_add);
$teacher_add_row = mysqli_fetch_array($teacher_add_data);
if ($teacher_add_row[0] > 0){ $teacher_add1 = $teacher_add_row[0]; } else { $teacher_add1 = 0; }

//teacher_dec
$teacher_dec = "select sum(amount) from teacher_fine WHERE date >= '$dat1' AND date <= '$dat2' AND teacher_id = $TID AND type = 8";
$teacher_dec_data = mysqli_query($conn, $teacher_dec);
$teacher_dec_row = mysqli_fetch_array($teacher_dec_data);
if ($teacher_dec_row[0] > 0){ $teacher_dec1 = $teacher_dec_row[0]; } else { $teacher_dec1 = 0; }

//hour salary

$sql2="SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(`duration`))) AS total FROM class_history WHERE teacher_id = '$TID' AND re_status != 2 AND date_teacher >= '$dat1' AND date_teacher <= '$dat2' AND (monitor_id = 4 OR monitor_id = 9 OR monitor_id = 6 OR monitor_id = 21)";
$res2 = mysqli_query($conn, $sql2);
$totalRow = mysqli_fetch_array($res2);
$total = $totalRow['total'];
if (!empty($total)){
$hours=$total;
}
else { $hours='00:00:00'; }

    list($h, $m, $s) = explode(':',$hours);  //Split up string into hours/minutes
    $decimal = $m/60;  //get minutes as decimal
    $hoursAsDecimal = $h+$decimal;
    $hour_salary = $hoursAsDecimal*$rate_id;

$sql = "SELECT * FROM teacher_salary WHERE teacher_id = '$TID' AND date = '$last_date'";
$resultt = mysqli_query($conn, $sql);
$numberOfRows7 = mysqli_num_rows($resultt);
		if ($numberOfRows7 == 0){
	    
	$sql = "INSERT INTO teacher_salary (teacher_id, date, monthly_salary, company_returns, performance, residence_all, fine, leave_duc, advance_duc, tax, type, fine_reduc, class_earning, csr_earning, hour_earning, slot_earning, slot_rate, class_rate, hour_rate, csr_rate, acc_type, cat_id, total_classes, total_hours, num_student, gift, other_add, other_dec, date1, date2, currency)
					VALUES('$TID', '$last_date', '$monthly', '$teacher_returns1', '$teacher_bouns1', '$rent', '$teacher_fine1', '$sum', '$teacher_advance1', '$tax', '$salary', '$teacher_fine_redu1', '0', '0', '$hour_salary', '0', '0', '0', '$rate_id', '0', '$ft', '$cat', '0', '$hoursAsDecimal', '0', '$teacher_gift1', '$teacher_add1', '$teacher_dec1', '$dat1', '$dat2', '$cur')";
					if ($conn->query($sql) === TRUE) { 
			 	echo '<font color="green"><b>Salary Generated Successfully '.$name.' <a href="teacher-accounts-profile?profile_no='.base64_encode($TID).'">See Profile</a></b></font> <br>';
			 	}
	}
else if ($numberOfRows7 > 0) 
	{
echo '<font color="red"><b>Salary Already Generated for '.$name.' for the month of '.$month.'-'.$year.' <a href="teacher-accounts-profile?profile_no='.base64_encode($TID).'">See Profile</a>.</b></font> <br>';

	}   
}
}
echo 'Go to Salary record of this month <a href="monthly-salary-details-ana?mon='.$month.'&yr='.$year.'"> Click Here</a>';
?>
