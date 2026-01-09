<?php session_start(); ?>
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
<?php
  require ("../includes/dbconnection.php");
    $mm_id =$_REQUEST['mon'];
  $yy_id =$_REQUEST['yyy'];
  $date1 =$_REQUEST['date'];
  $voucher =$_REQUEST['voucher'];
  function vou()
{
$voucher =$_REQUEST['voucher'];
// sending query
   $result = mysql_query("SELECT * FROM voucher Where voucher_id = '$voucher'");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$tnumberOfRows = MYSQL_NUMROWS($result);
If ($tnumberOfRows == 0){
			echo '';
			}
		else if ($tnumberOfRows > 0) 
			{
			$i=0;
			while ($i<$tnumberOfRows)
				{			
					$hidden_pt = MYSQL_RESULT($result,$i,"cheque_num");
	
			  		echo $hidden_pt;
	$i++;	 
			}
			}
	}
function salary1($tr, $mr, $yr)
{
// sending query
   $result = mysql_query("SELECT * FROM teacher_salary WHERE teacher_id = $tr AND MONTH(date) = '$mr' AND YEAR(date) = '$yr'");
if (!$result) 
	{
    die("Please Contact Farooq");
	}
$tnumberOfRows = MYSQL_NUMROWS($result);
If ($tnumberOfRows == 0){
			echo '<font color="#E26A6A"> <b>Not Genarated</b></font>';
			}
		else if ($tnumberOfRows > 0) 
			{
			$i=0;
		
			//basic details
			$sal_id = MYSQL_RESULT($result,$i,"salary_id");
			$ttt_id = MYSQL_RESULT($result,$i,"teacher_id");
			$t_date = MYSQL_RESULT($result,$i,"date");
			$t_salary = MYSQL_RESULT($result,$i,"monthly_salary");
			$t_type = MYSQL_RESULT($result,$i,"type");
			$t_cat = MYSQL_RESULT($result,$i,"cat_id");
			//Allowance and deductions
			$t_returns = MYSQL_RESULT($result,$i,"company_returns");
			$t_bouns = MYSQL_RESULT($result,$i,"performance");
			$t_rent = MYSQL_RESULT($result,$i,"residence_all");
			$t_medi = MYSQL_RESULT($result,$i,"medical_allowance");
			$t_ent = MYSQL_RESULT($result,$i,"entertainment_allowance");
			$t_misc = MYSQL_RESULT($result,$i,"misc_allowances");
			$t_eobi = MYSQL_RESULT($result,$i,"eobi");
			$t_fine = MYSQL_RESULT($result,$i,"fine");
			$t_leave = MYSQL_RESULT($result,$i,"leave_duc");
			$t_advance = MYSQL_RESULT($result,$i,"advance_duc");
			$t_reduc = MYSQL_RESULT($result,$i,"fine_reduc");
			$t_tax = MYSQL_RESULT($result,$i,"tax");
			$t_gift = MYSQL_RESULT($result,$i,"gift");
			$t_oadd = MYSQL_RESULT($result,$i,"other_add");
			$t_odec = MYSQL_RESULT($result,$i,"other_dec");
			//salary types and rates
			$class_rate = MYSQL_RESULT($result,$i,"class_rate");
			$csr_rate = MYSQL_RESULT($result,$i,"csr_rate");
			$slot_rate = MYSQL_RESULT($result,$i,"slot_rate");
			$hour_rate = MYSQL_RESULT($result,$i,"hour_rate");
			$numStu = MYSQL_RESULT($result,$i,"num_student");
			//earning
			$t_class = MYSQL_RESULT($result,$i,"class_earning");
			$t_csr = MYSQL_RESULT($result,$i,"csr_earning");
			$t_hour = MYSQL_RESULT($result,$i,"hour_earning");
			$t_slot = MYSQL_RESULT($result,$i,"slot_earning");
			$date_start = MYSQL_RESULT($result,$i,"date1");
			$date_end = MYSQL_RESULT($result,$i,"date2");
			
			$total_add = $t_salary + $t_returns + $t_bouns + $t_rent + $t_reduc + $t_class + $t_csr + $t_medi + $t_misc + $t_hour + $t_slot + $t_gift + $t_oadd;
			$total_sub = $t_fine + $t_leave + $t_advance + $t_tax + $t_eobi + $t_odec;
			$paid = $total_add - $total_sub;

			echo number_format($paid, 0);

			}
	}
	function totalsalary($a)
{
$yy_id =$_REQUEST['yyy'];
  $mm_id =$_REQUEST['mon'];
  $checkbox = $_POST['checkbox'];
  $rrr = implode(',', array_map('intval', $checkbox));
// sending query
   $sql = "select sum(monthly_salary+company_returns+performance+residence_all+medical_allowance+entertainment_allowance+misc_allowances-eobi-fine-leave_duc+fine_reduc-tax+class_earning+csr_earning+hour_earning+slot_earning-advance_duc+gift+other_add-other_dec) from teacher_salary WHERE MONTH(date) = '$mm_id' AND YEAR(date) = '$yy_id' AND teacher_id IN ($rrr)";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$num = $row[0];
if ($a == 1){
echo number_format($num, 0);
}
elseif ($a == 2){
$num = str_replace(array(',', ' '), '' , trim($num));
    if(! $num) {
        return false;
    }
    $num = (int) $num;
    $words = array();
    $list1 = array('', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten', 'eleven',
        'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen'
    );
    $list2 = array('', 'ten', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety', 'hundred');
    $list3 = array('', 'thousand', 'million', 'billion', 'trillion', 'quadrillion', 'quintillion', 'sextillion', 'septillion',
        'octillion', 'nonillion', 'decillion', 'undecillion', 'duodecillion', 'tredecillion', 'quattuordecillion',
        'quindecillion', 'sexdecillion', 'septendecillion', 'octodecillion', 'novemdecillion', 'vigintillion'
    );
    $num_length = strlen($num);
    $levels = (int) (($num_length + 2) / 3);
    $max_length = $levels * 3;
    $num = substr('00' . $num, -$max_length);
    $num_levels = str_split($num, 3);
    for ($i = 0; $i < count($num_levels); $i++) {
        $levels--;
        $hundreds = (int) ($num_levels[$i] / 100);
        $hundreds = ($hundreds ? ' ' . $list1[$hundreds] . ' hundred' . ' ' : '');
        $tens = (int) ($num_levels[$i] % 100);
        $singles = '';
        if ( $tens < 20 ) {
            $tens = ($tens ? ' ' . $list1[$tens] . ' ' : '' );
        } else {
            $tens = (int)($tens / 10);
            $tens = ' ' . $list2[$tens] . ' ';
            $singles = (int) ($num_levels[$i] % 10);
            $singles = ' ' . $list1[$singles] . ' ';
        }
        $words[] = $hundreds . $tens . $singles . ( ( $levels && ( int ) ( $num_levels[$i] ) ) ? ' ' . $list3[$levels] . ' ' : '' );
    } //end for loop
    $commas = count($words);
    if ($commas > 1) {
        $commas = $commas - 1;
    }
    return implode(' ', $words); 
} 
	}
?>
<?php
date_default_timezone_set("Africa/Cairo");
$sy = date('Y-m-d');
$sy1 = date('d-m-Y');
?>
<!DOCTYPE html>
<!-- 
Author: Muhammad Farooq
Website: www.tarteeltechnologies.com/
Contact: info@tarteeltechnologies.com
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>TarteeleQuran | Online Learning Portal</title>
<meta https-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta https-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>


<link rel="stylesheet" type="text/css" href="style_print.css">
<style type="text/css">
@page  
{ 
    size: auto;   /* auto is the initial value */ 

    /* this affects the margin in the printer settings */ 
    margin: 30mm 17mm 17mm 17mm;  
} 
</style>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-menu-fixed" class to set the mega menu fixed  -->
<!-- DOC: Apply "page-header-top-fixed" class to set the top menu fixed  -->
<body id="body" onload=window.print();>

<table width="100%">
<tr>
<td width="70%">
</td>
<td width="30%">
IT/Admin/Bank-ABL/<?php echo $yy_id; ?>
<br>Tarteel Technologies (SMC-Pvt) Ltd
<br>Office No. 01, 3rd Floor, Fazal Arcade
<br>F-11 Markaz, Islamabad, Pakistan
<br><?php echo date('d-M-Y', strtotime($date1)); ?>
</td>
</table>
<table width="100%">
	<tr>
	<td width="10%">To: </td><td>Manager, Allied Bank Limited</td>
	</tr>
	<tr>
	<td></td><td>F-11 Markaz Branch
<br>Islamabad.</td>
	</tr>
</table>
<br><br>
<p>Subject: <span class="auto-style1"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <u>Transfer of Salaries - Tarteel Technologies Employees</u></strong></span></p><br><br>
							<p align="justify">1.            A crossed cheque bearing no. <?php echo vou(); ?>, dated <?php echo date('d-M-Y', strtotime($date1)); ?>, amounting Rs. <?php echo totalsalary("1"); ?>/- (<?php echo totalsalary("2"); ?> only) is attached to transfer the salaries of Iqra Tutoring employees in their UBL bank accounts. Their account numbers and salary details are as under: -</p>
							<br><br>
							
								<table width="100%" class="table2">
							<thead>
								<tr>
								<td align="center">
									 Sr.No
								</td>
								<td>
									 Teacher Name
								</td>
								<td align="center">
									 Account No
								</td>
								<td align="right">
									 Amount
								</td>
								</tr>
							</thead>
								<?php 
// sending query
$checkbox = $_POST['checkbox'];

for($i=0;$i<count($checkbox);$i++){
$del_id = $checkbox[$i];
$result = mysql_query("SELECT `profile`.*, `Gender`.`gender`, `shift`.`shift_name`, `hello`.`inout_name` FROM
  			`profile`,`Gender`,`shift`,`hello` WHERE profile.g_id=Gender.g_id and profile.shift_id=shift.shift_id and profile.inout_id=hello.inout_id HAVING teacher_id ='$del_id'");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
If ($numberOfRows == 0) 
	{
	echo 'Sorry No Record Found!';
	}
else if ($numberOfRows > 0) 
	{
		
	while($row = mysql_fetch_array($result))
		{	?>	
			
								
								<tr bgcolor="<?php echo $bgcolor; ?>">
								<td align="center">
									<?php echo $i+1; ?>
								</td>
								<td>
									 <?php echo $row['account_title']; ?>
								</td>
								<td align="center">
									 <?php echo $row['branch_code']; ?>-<?php echo $row['account_no']; ?>
								</td>
								<td align="right"><?php echo salary1("$del_id", "$mm_id", "$yy_id"); ?></td>
							</tr>
							
							<?php		
		}
		
	}
	}
?>
								
								<tr bgcolor="<?php echo $bgcolor; ?>">
								<td>
								</td>
								<td>
									<b>Total</b>
								</td>
								<td>
									 
								</td>
								<td align="right"><b><?php echo totalsalary("1"); ?></b></td>
							</tr>
							
								</table><br><br>
								<p>2.            Thanking you in anticipation.<br></p>
								<p ><br><br><br><br>
<div align="right">	Imran Shahzad
<br>Chief Executive Officer
<br>Iqra Tutoring (Pvt) Ltd.
</div>
</body>
</html>