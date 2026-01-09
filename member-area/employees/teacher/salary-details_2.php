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
require("../includes/dbconnection.php");
include("../includes/teacher_rights.php");  include("header.php");
  $sal_id =$_REQUEST['sal_id'];
$result = mysql_query("SELECT * FROM teacher_salary WHERE salary_id = $sal_id");
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
	$i=0;		
			$sal_id = MYSQL_RESULT($result,$i,"salary_id");
			$ttt_id = MYSQL_RESULT($result,$i,"teacher_id");
			$t_date = MYSQL_RESULT($result,$i,"date");
			$t_salary = MYSQL_RESULT($result,$i,"monthly_salary");
			$t_returns = MYSQL_RESULT($result,$i,"company_returns");
			$t_bouns = MYSQL_RESULT($result,$i,"performance");
			$t_rent = MYSQL_RESULT($result,$i,"residence_all");
			$t_fine = MYSQL_RESULT($result,$i,"fine");
			$t_leave = MYSQL_RESULT($result,$i,"leave_duc");
			$t_advance = MYSQL_RESULT($result,$i,"advance_duc");
			$t_tax = MYSQL_RESULT($result,$i,"tax");
			$t_type = MYSQL_RESULT($result,$i,"type");
			$t_reduc = MYSQL_RESULT($result,$i,"fine_reduc");
			$t_class = MYSQL_RESULT($result,$i,"class_rate");
			$t_num = MYSQL_RESULT($result,$i,"num_student");
			$total_add = $t_returns + $t_bouns + $t_rent;
			$total_sub = $t_fine + $t_leave + $t_advance + $t_tax;
			$paid = $t_salary + $total_add + $t_reduc - $total_sub;
			}
  
?>
<?php echo $main_header; ?>
<head>
<style type="text/css">
.auto-style1 {
	color: #4B77BE;
}
.auto-style2 {
	color: #4B77BE;
	font-weight: bold;
}
.auto-style3 {
	color: #E26A6A;
}
.auto-style4 {
	color: #E26A6A;
	font-weight: bold;
}
</style>
</head>
<?php echo $tool_bar; ?>
<?php echo $start_menu; ?>
<?php echo $main_menu; ?>
<!-- BEGIN PAGE CONTAINER -->
<div class="page-container">
	<!-- BEGIN PAGE HEAD -->
	<div class="page-head">
		<div class="container">
			<!-- BEGIN PAGE TITLE -->
			<div class="page-title">
				<h1>Salary<small> Details</small></h1>
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
					<a href="teacher-home">Home</a><i class="fa fa-circle"></i>
				</li>
				<li class="active">
					 Salary Details		
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
					<div class="row">
				<div class="col-md-6">
				<div class="portlet light">
									<h4>
									<font color="#44B6AE"> <b>Salary Summary:</b></font>
									</h4>
									<div id="mytable" class="table-responsive">
								<table class="table table-hover">
								<tbody>
								<tr>
								<td>Teacher:</td>
								<td> <b><?php echo $tname; ?></b></td>
								</tr>
								<tr>
								<td>Month:</td>
								<td> <b><?php echo date('m-Y',strtotime($t_date)); ?></b></td>
								</tr>
								<tr>
								<td>Total Classes:</td>
								<td> <b><?php echo $t_num; ?></b></td>
								</tr>
								<tr>
								<td>Class Rate:</td>
								<td> <b>Rs. <?php echo $t_class; ?></b></td>
								</tr>
								<tr>
								<td class="auto-style2">Total Additions:</td>
								<td>
								<b><span class="auto-style1">Rs. <?php echo $total_add; ?>
								</span></b>
								</td>
								</tr>
								<tr>
								<td class="auto-style4">Total Deductions:</td>
								<td>
								<b><span class="auto-style3">Rs. <?php echo $total_sub; ?>
								</span></b>
								</td>
								</tr>
								<tr>
								<td><b>Total Paid:</b></td>
								<td> <b>Rs. <?php echo $paid; ?></b></td>
								</tr>
								<tr>
								<td><h4>
									<font color="#4B77BE"> <b>Additions:</b></font>
									</h4></td>
								<td></td>
								</tr>
								<tr>
								<td>Company Returns:</td>
								<td>Rs. <?php echo $t_returns; ?></td>
								</tr>
								<tr>
								<td>Performance Bonus:</td>
								<td>Rs. <?php echo $t_bouns; ?></td>
								</tr>
								<tr>
								<td>Residence Allowance:</td>
								<td>
								Rs. <?php echo $t_rent; ?>
								</td>
								</tr>
								<tr>
								<td>Fine Reduction:</td>
								<td>
								Rs. <?php echo $t_reduc; ?>
								</td>
								</tr>
								<tr>
								<td><b>Total Additions:</b></td>
								<td>
								<b>Rs. <?php echo $total_add; ?></b>
								</td>
								</tr>
								<tr>
								<td><h4>
									<font color="#E26A6A"> <b>Deductions:</b></font>
									</h4></td>
								<td>
								</td>
								</tr>
								<tr>
								<td>Fines:</td>
								<td>
								Rs. <?php echo $t_fine; ?>
								</td>
								</tr>
								<tr>
								<td>Leave Deduction:</td>
								<td>
								Rs. <?php echo $t_leave; ?>
								</td>
								</tr>
								<tr>
								<td>Advance Deduction:</td>
								<td>
								Rs. <?php echo $t_advance; ?>
								</td>
								</tr>
								<tr>
								<td>Tax:</td>
								<td>
								Rs. <?php echo $t_tax; ?>
								</td>
								</tr>
								<tr>
								<td><b>Total Deductions:</b></td>
								<td>
								<b>Rs. <?php echo $total_sub; ?></b>
								</td>
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