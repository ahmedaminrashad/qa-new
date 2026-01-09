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
  include("../includes/session1.php");
  require ("../includes/dbconnection.php");
  include("header-accounts.php");
function net_income($y){
$sql = "select sum(amount) from account_entry where (ac_cat_id = 3 OR ac_cat_id = 6) AND date <= '$y'";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$second = $row[0];
echo number_format($second, 2);
}
function cost_of_services($y){
$sql = "select sum(amount) from account_entry where ac_cat_id = 7 AND date <= '$y'";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$first = $row[0];
$sql = "select sum(ad_amount) from adjusment_account where (ac_cat_id = 2 OR ac_cat_id = 4) AND date <= '$y'";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$second = $row[0];
$total = $first+$second;
echo number_format($total, 2);
}
function gross_profit($y){
$sql = "select sum(amount) from account_entry where (ac_cat_id = 3 OR ac_cat_id = 6) AND date <= '$y'";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$first = $row[0];
$sql = "select sum(ad_amount) from adjusment_account where (ac_cat_id = 2 OR ac_cat_id = 4) AND date <= '$y'";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$second = $row[0];
$sql = "select sum(amount) from account_entry where ac_cat_id = 7 AND date <= '$y'";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$third = $row[0];
$total = $first-$second-$third;
echo number_format($total, 2);
}
function op_expense($y){
$sql = "select sum(amount) from account_entry where ac_cat_id = 8 AND date <= '$y'";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$first = $row[0];
$sql = "select sum(ad_amount) from adjusment_account where (ac_cat_id = 1 OR ac_cat_id = 10) AND date <= '$y'";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$second = $row[0];
$total = $first+$second;
echo number_format($total, 2);
}
function pbfc($y){
$sql = "select sum(amount) from account_entry where (ac_cat_id = 3 OR ac_cat_id = 6) AND date <= '$y'";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$first = $row[0];
$sql = "select sum(ad_amount) from adjusment_account where date <= '$y'";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$second = $row[0];
$sql = "select sum(amount) from account_entry where (ac_cat_id = 7 OR ac_cat_id = 8) AND date <= '$y'";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$third = $row[0];
$total = $first-$second-$third;
echo number_format($total, 2);
}
function bank_charges($y){
$sql = "select sum(amount) from account_entry where ac_cat_id = 9 AND date <= '$y'";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$second = $row[0];
echo number_format($second, 2);
}
function pbt($y){
$sql = "select sum(amount) from account_entry where (ac_cat_id = 3 OR ac_cat_id = 6) AND date <= '$y'";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$first = $row[0];
$sql = "select sum(ad_amount) from adjusment_account where date <= '$y'";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$second = $row[0];
$sql = "select sum(amount) from account_entry where (ac_cat_id = 7 OR ac_cat_id = 8 OR ac_cat_id = 9) AND date <= '$y'";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$third = $row[0];
$total = $first-$second-$third;
echo number_format($total, 2);
}
function pro_tax($y){
$sql = "select sum(tax) from account_entry where date <= '$y'";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$second = $row[0];
echo number_format($second, 2);
}
function p_after_tax($y){
$sql = "select sum(amount) from account_entry where (ac_cat_id = 3 OR ac_cat_id = 6) AND date <= '$y'";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$first = $row[0];
$sql = "select sum(ad_amount) from adjusment_account where date <= '$y'";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$second = $row[0];
$sql = "select sum(amount) from account_entry where (ac_cat_id = 7 OR ac_cat_id = 8 OR ac_cat_id = 9) AND date <= '$y'";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$third = $row[0];
$total = $first-$second-$third;
$sql = "select sum(tax) from account_entry where date <= '$y'";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$second3 = $row[0];
$final_profit = $total-$second3;
echo number_format($final_profit, 2);
}
?>
<?php echo $main_header; ?>
<?php
date_default_timezone_set("Africa/Cairo");
$sy = date('Y-m-d');
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
					 Profit &amp; Loss Statment till (<?php echo $sy; ?>)
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
					<div class="row">
				<div class="col-md-6">
				<div class="portlet light">
									<h4>
									<font color="#44B6AE"> <b>PROFIT &amp; LOSS STATMENT</b></font>
									</h4><br>
									<div id="mytable" class="table-responsive">
								<table class="table table-hover">
								<tbody>
								<tr>
								<td><b>Net Income</b></td>
								<td><b><?php echo net_income("$sy"); ?></b></td>
								</tr>
								<tr>
								<td>Cost of Services</td>
								<td><?php echo cost_of_services("$sy"); ?></td>
								</tr>
								<tr>
								<td><b>Gross profit</b></td>
								<td><b><?php echo gross_profit("$sy"); ?></b></td>
								</tr>
								<tr>
								<td>Operating expenses</td>
								<td><?php echo op_expense("$sy"); ?></td>
								</tr>
								<tr>
								<td><b>Profit before financial charges</b></td>
								<td><b><?php echo pbfc("$sy"); ?></b></td>
								</tr>
								<tr>
								<td>Financial Charges</td>
								<td><?php echo bank_charges("$sy"); ?></td>
								</tr>
								<tr>
								<td><b>Profit before taxation</b></td>
								<td><b><?php echo pbt("$sy"); ?></b></td>
								</tr>
								<tr>
								<td>Provision for taxation</td>
								<td><?php echo pro_tax("$sy"); ?></td>
								</tr>
								<tr>
								<td><b>Profit after taxation</b></td>
								<td><b><?php echo p_after_tax("$sy"); ?></b></td>
								</tr>
								<tr>
								<td><b>Profit brought forward</b></td>
								<td><b><?php echo p_after_tax("$sy"); ?></b></td>
								</tr>
								<tr>
								<td><b>Profit carried to balance sheet</b></td>
								<td><b><?php echo p_after_tax("$sy"); ?></b></td>
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