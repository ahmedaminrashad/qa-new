<?php if (empty($session)) { session_start(); } 
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
?>
<?php
  include("../includes/session.php");
  include("../includes/accounts_rights.php");
  require ("../includes/dbconnection.php");
  include("header.php");
  $d1 =$_REQUEST['date_id1'];
$d2 =$_REQUEST['date_id2'];
function net_income($d1, $d2){
//Total income from CASH AND BANK(3) BALANCES and INCOME(6)
$sql = "select sum(amount) from account_entry where (ac_cat_id = 3 OR ac_cat_id = 6) AND date >= '$d1' AND date <= '$d2'";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$income = $row[0];
//Total Adjustment of accrued(5)
$sql = "select sum(ad_amount) from adjusment_account where ac_cat_id = 5 AND date >= '$d1' AND date <= '$d2'";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$accrued_adj = $row[0];
// Total income - Accrued expence adjustment
$total = $income-$accrued_adj;
echo number_format($total, 2);
}
function cost_of_services($d1, $d2){
//Total COST OF SERVICES(7)
$sql = "select sum(amount) from account_entry where ac_cat_id = 7 AND date >= '$d1' AND date <= '$d2'";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$cost = $row[0];
//Total Adjustment of advance where head is teaching staff(2, 35)
$sql = "select sum(ad_amount) from adjusment_account where ac_cat_id = 2 AND head_id = 35 AND date >= '$d1' AND date <= '$d2'";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$advance_adj_teach = $row[0];
//Total Accrued Expense where head is teaching staff(5, 28)
$sql = "select sum(amount) from account_entry where ac_cat_id = 5 AND account_head = 28 AND date >= '$d1' AND date <= '$d2'";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$accrued_adj_teach = $row[0];
//Total cost+advance_adj+accrued_ex
$total = $cost+$advance_adj_teach+$accrued_adj_teach;
echo number_format($total, 2);
}
function gross_profit($d1, $d2){
//Total COST OF SERVICES(7)
$sql = "select sum(amount) from account_entry where ac_cat_id = 7 AND date >= '$d1' AND date <= '$d2'";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$cost = $row[0];
//Total Adjustment of advance where head is teaching staff(2, 35)
$sql = "select sum(ad_amount) from adjusment_account where ac_cat_id = 2 AND head_id = 35 AND date >= '$d1' AND date <= '$d2'";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$advance_adj_teach = $row[0];
//Total Accrued Expense where head is teaching staff(5, 28)
$sql = "select sum(amount) from account_entry where ac_cat_id = 5 AND account_head = 28 AND date >= '$d1' AND date <= '$d2'";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$accrued_adj_teach = $row[0];
//Total income from CASH AND BANK(3) BALANCES and INCOME(6)
$sql = "select sum(amount) from account_entry where (ac_cat_id = 3 OR ac_cat_id = 6) AND date >= '$d1' AND date <= '$d2'";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$income = $row[0];
//Total Adjustment of accrued(5)
$sql = "select sum(ad_amount) from adjusment_account where ac_cat_id = 5 AND date >= '$d1' AND date <= '$d2'";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$accrued_adj = $row[0];
$total = $income-$cost-$advance_adj_teach-$accrued_adj_teach-$accrued_adj;
echo number_format($total, 2);
}
function op_expense($d1, $d2){
//Total ADMINISTRATIVE & GENERAL EXPENSES(8)
$sql = "select sum(amount) from account_entry where ac_cat_id = 8 AND date >= '$d1' AND date <= '$d2'";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$admin_ex = $row[0];
//Total Adjustment of Tangible and Intangible Assets(10, 1)
$sql = "select sum(ad_amount) from adjusment_account where (ac_cat_id = 1 OR ac_cat_id = 10) AND date >= '$d1' AND date <= '$d2'";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$dep_amo_ex = $row[0];
//Total Adjustment of advance where head is admin staff(2, (36, 53))
$sql = "select sum(ad_amount) from adjusment_account where (head_id = 36 OR head_id = 53) AND ac_cat_id = 2 AND date >= '$d1' AND date <= '$d2'";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$advance_adj_oth = $row[0];
//Total Accrued Expense where head is teaching staff(5, (29, 30, 54)
$sql = "select sum(amount) from account_entry where (account_head = 29 OR account_head = 30 OR account_head = 54) AND ac_cat_id = 5 AND date >= '$d1' AND date <= '$d2'";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$accrued_adj_oth = $row[0];
$total = $admin_ex+$dep_amo_ex+$advance_adj_oth+$accrued_adj_oth;
echo number_format($total, 2);
}
function pbfc($d1, $d2){
//Total COST OF SERVICES(7) and ADMINISTRATIVE & GENERAL EXPENSES(8) and Accrued Expense
$sql = "select sum(amount) from account_entry where (ac_cat_id = 7 OR ac_cat_id = 8 OR ac_cat_id = 5) AND date >= '$d1' AND date <= '$d2'";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$cost = $row[0];
//Total Adjustment of advance
$sql = "select sum(ad_amount) from adjusment_account where date >= '$d1' AND date <= '$d2'";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$advance_adj_teach = $row[0];
//Total income from CASH AND BANK(3) BALANCES and INCOME(6)
$sql = "select sum(amount) from account_entry where (ac_cat_id = 3 OR ac_cat_id = 6) AND date >= '$d1' AND date <= '$d2'";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$income = $row[0];
$total = $income-$cost-$advance_adj_teach;
echo number_format($total, 2);
}
function bank_charges($d1, $d2){
$sql = "select sum(amount) from account_entry where (ac_cat_id = 9) AND date >= '$d1' AND date <= '$d2'";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$second = $row[0];
echo number_format($second, 2);
}
function pbt($d1, $d2){
//Total COST OF SERVICES(7) and ADMINISTRATIVE & GENERAL EXPENSES(8) and Accrued Expense
$sql = "select sum(amount) from account_entry where (ac_cat_id = 7 OR ac_cat_id = 8 OR ac_cat_id = 5 OR ac_cat_id = 9) AND date >= '$d1' AND date <= '$d2'";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$cost = $row[0];
//Total Adjustment of advance
$sql = "select sum(ad_amount) from adjusment_account where date >= '$d1' AND date <= '$d2'";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$advance_adj_teach = $row[0];
//Total income from CASH AND BANK(3) BALANCES and INCOME(6)
$sql = "select sum(amount) from account_entry where (ac_cat_id = 3 OR ac_cat_id = 6) AND date >= '$d1' AND date <= '$d2'";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$income = $row[0];
$total = $income-$cost-$advance_adj_teach;
echo number_format($total, 2);
}
function pro_tax($d1, $d2){
$sql = "select sum(tax) from account_entry where date >= '$d1' AND date <= '$d2'";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$second = $row[0];
echo number_format($second, 2);
}
function p_after_tax($d1, $d2){
//Total COST OF SERVICES(7) and ADMINISTRATIVE & GENERAL EXPENSES(8) and Accrued Expense
$sql = "select sum(amount) from account_entry where (ac_cat_id = 7 OR ac_cat_id = 8 OR ac_cat_id = 5 OR ac_cat_id = 9) AND date >= '$d1' AND date <= '$d2'";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$cost = $row[0];
//Total Adjustment of advance
$sql = "select sum(ad_amount) from adjusment_account where date >= '$d1' AND date <= '$d2'";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$advance_adj_teach = $row[0];
//Total income from CASH AND BANK(3) BALANCES and INCOME(6)
$sql = "select sum(amount) from account_entry where (ac_cat_id = 3 OR ac_cat_id = 6) AND date >= '$d1' AND date <= '$d2'";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$income = $row[0];
//tax
$sql = "select sum(tax) from account_entry where date >= '$d1' AND date <= '$d2'";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$tax = $row[0];
$total = $income-$cost-$advance_adj_teach-$tax;
echo number_format($total, 2);
}
function p_boy_fwd($d1){
//Total COST OF SERVICES(7) and ADMINISTRATIVE & GENERAL EXPENSES(8) and Accrued Expense
$sql = "select sum(amount) from account_entry where (ac_cat_id = 7 OR ac_cat_id = 8 OR ac_cat_id = 5 OR ac_cat_id = 9) AND date < '$d1'";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$cost = $row[0];
//Total Adjustment of advance
$sql = "select sum(ad_amount) from adjusment_account where date < '$d1'";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$advance_adj_teach = $row[0];
//Total income from CASH AND BANK(3) BALANCES and INCOME(6)
$sql = "select sum(amount) from account_entry where (ac_cat_id = 3 OR ac_cat_id = 6) AND date < '$d1'";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$income = $row[0];
//tax
$sql = "select sum(tax) from account_entry where date < '$d1'";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$tax = $row[0];
$total = $income-$cost-$advance_adj_teach-$tax;
echo number_format($total, 2);
}
function p_boy_bal($d1){
//Total COST OF SERVICES(7) and ADMINISTRATIVE & GENERAL EXPENSES(8) and Accrued Expense
$sql = "select sum(amount) from account_entry where (ac_cat_id = 7 OR ac_cat_id = 8 OR ac_cat_id = 5 OR ac_cat_id = 9) AND date <= '$d1'";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$cost = $row[0];
//Total Adjustment of advance
$sql = "select sum(ad_amount) from adjusment_account where date <= '$d1'";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$advance_adj_teach = $row[0];
//Total income from CASH AND BANK(3) BALANCES and INCOME(6)
$sql = "select sum(amount) from account_entry where (ac_cat_id = 3 OR ac_cat_id = 6) AND date <= '$d1'";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$income = $row[0];
//tax
$sql = "select sum(tax) from account_entry where date <= '$d1'";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$tax = $row[0];
$total = $income-$cost-$advance_adj_teach-$tax;
echo number_format($total, 2);
}
?>
<?php echo $main_header; ?>
<?php
date_default_timezone_set("Asia/Karachi");
?>
<?php echo $tool_bar; ?>
<?php echo $start_menu; ?>
<?php echo $search_bar; ?>
<?php echo $main_menu; ?>
<!-- BEGIN PAGE CONTAINER -->
<div class="page-container">
	<!-- BEGIN PAGE HEAD -->
	<div class="page-head">
		<div class="container">
			<!-- BEGIN PAGE TITLE -->
			<div class="page-title">
				<h1>Profit &amp; Loss<small> Statment</small></h1>
			</div>
			<!-- END PAGE TITLE -->
			<!-- BEGIN PAGE TOOLBAR -->
			<div class="page-toolbar">
			</div>
			<!-- END PAGE TOOLBAR -->
		</div>
	</div>
	<!-- END PAGE HEAD -->
	<!-- BEGIN PAGE CONTENT -->
	<div class="page-content">
		<div class="container">
			<!-- BEGIN PAGE BREADCRUMB -->
			<ul class="page-breadcrumb breadcrumb">
				<li>
					<a href="admin-home">Home</a><i class="fa fa-circle"></i>
				</li>
				<li class="active">
					 Profit &amp; Loss Statment for the period <b><?php $date1=date_create($d1); 
echo date_format($date1,"M d, Y");
 ?> To <?php $date1=date_create($d2); 
echo date_format($date1,"M d, Y");
 ?></b>
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
					<div class="row">
				<div class="col-md-6">
				<div class="portlet light">
									<h4>
									<font color="#44B6AE"> <b>PROFIT &amp; LOSS STATMENT (in PKR)</b></font>
									</h4><br>
									<div id="mytable" class="table-responsive">
								<table class="table table-hover">
								<tbody>
								<tr>
								<td><b>Net Income</b></td>
								<td><b><?php echo net_income("$d1","$d2"); ?></b></td>
								</tr>
								<tr>
								<td>Cost of Services</td>
								<td><?php echo cost_of_services("$d1","$d2"); ?></td>
								</tr>
								<tr>
								<td><b>Gross profit</b></td>
								<td><b><?php echo gross_profit("$d1","$d2"); ?></b></td>
								</tr>
								<tr>
								<td>Operating expenses</td>
								<td><?php echo op_expense("$d1","$d2"); ?></td>
								</tr>
								<tr>
								<td><b>Profit before financial charges</b></td>
								<td><b><?php echo pbfc("$d1","$d2"); ?></b></td>
								</tr>
								<tr>
								<td>Financial Charges</td>
								<td><?php echo bank_charges("$d1","$d2"); ?></td>
								</tr>
								<tr>
								<td><b>Profit before taxation</b></td>
								<td><b><?php echo pbt("$d1","$d2"); ?></b></td>
								</tr>
								<tr>
								<td>Provision for taxation</td>
								<td><?php echo pro_tax("$d1","$d2"); ?></td>
								</tr>
								<tr>
								<td><b>Profit after taxation</b></td>
								<td><b><?php echo p_after_tax("$d1","$d2"); ?></b></td>
								</tr>
								<tr>
								<td><b>Profit brought forward</b></td>
								<td><b><?php echo p_boy_fwd("$d1"); ?></b></td>
								</tr>
								<tr>
								<td><b>Profit carried to balance sheet</b></td>
								<td><b><?php echo p_boy_bal("$d2"); ?></b></td>
								</tr>
								</tbody>
								</table>
							</div>
					<!-- END SAMPLE TABLE PORTLET-->
				</div>
			</div>
			<!-- END PAGE CONTENT INNER -->
		</div>
	</div>
	<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->
<?php echo $fot; ?>