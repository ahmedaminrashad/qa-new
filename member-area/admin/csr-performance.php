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
include("../includes/session1.php");
  include("header-main.php");
  $csr_id =$_REQUEST['csr'];
  $csr_name =$_REQUEST['name'];
  $yy_id = $_REQUEST['year'];
  $mm_id = $_REQUEST['month'];
if (!function_exists('csr_allocated')) {
function csr_allocated($var,$mm_id)//currently active request
{
$yy_id=date('Y');
   $result = mysql_query("SELECT * FROM csr_performance Where csr_id = $var AND status = 1 AND MONTH(date) = $mm_id AND YEAR(date) = $yy_id");
if (!$result) 
	{
    die("Issue in Data");
	}
$total = MYSQL_NUMROWS($result);
if ($total == 0){ echo '--'; }
else { echo $total; }
}
}
if (!function_exists('csr_active')) {
function csr_active($var)//currently active request
{
   $result = mysql_query("SELECT * FROM new_request Where csr_id = $var AND status = 7");
if (!$result) 
	{
    die("Issue in Data");
	}
$total = MYSQL_NUMROWS($result);
if ($total == 0){ echo '--'; }
else { echo $total; }
}
}
if (!function_exists('csr_remove')) {
function csr_remove($var)//currently removed
{
   $result = mysql_query("SELECT * FROM new_request Where csr_id = $var AND status = 6");
if (!$result) 
	{
    die("Issue in Data");
	}
$total = MYSQL_NUMROWS($result);
if ($total == 0){ echo '--'; }
else { echo $total; }
}
}
if (!function_exists('csr_trials')) {
function csr_trials($var,$mm_id)//schedule trial this month
{
$yy_id=date('Y');
$result = mysql_query("SELECT * FROM account Where csr_id = $var AND MONTH(trial_date) = $mm_id AND YEAR(trial_date) = $yy_id");
if (!$result) 
	{
    die("Issue in Data");
	}
$total = MYSQL_NUMROWS($result);
if ($total == 0){ echo '--'; }
else { echo $total; }
}
}
if (!function_exists('csr_trials_running')) {
function csr_trials_running($var,$mm_id)//schedule trial this month
{
$yy_id=date('Y');
$result = mysql_query("SELECT * FROM account Where csr_id = $var AND MONTH(trial_date) = $mm_id AND YEAR(trial_date) = $yy_id AND active = 11");
if (!$result) 
	{
    die("Issue in Data");
	}
$total = MYSQL_NUMROWS($result);
if ($total == 0){ echo '--'; }
else { echo $total; }
}
}
if (!function_exists('csr_regulars')) {
function csr_regulars($var,$mm_id)//regulars this month
{
$yy_id=date('Y');
$result = mysql_query("SELECT * FROM account Where csr_id = $var AND MONTH(regular_date) = $mm_id AND YEAR(regular_date) = $yy_id");
if (!$result) 
	{
    die("Issue in Data");
	}
$total = MYSQL_NUMROWS($result);
if ($total == 0){ echo '--'; }
else { echo $total; }
}
}
if (!function_exists('csr_per_exp')) {
function csr_per_exp($var,$mm_id)//performance average all
{
$yy_id = date('Y');
$result = mysql_query("SELECT * FROM account Where csr_id = $var AND MONTH(trial_date) = $mm_id AND YEAR(trial_date) = $yy_id");
if (!$result) 
	{
    die("Issue in Data");
	}
$regular = MYSQL_NUMROWS($result);
$result = mysql_query("SELECT * FROM csr_performance Where csr_id = $var AND status = 1 AND MONTH(date) = $mm_id AND YEAR(date) = $yy_id");
if (!$result) 
	{
    die("Issue in Data");
	}
$total = MYSQL_NUMROWS($result);
$avg = ($regular/$total)*100;
echo number_format($avg, 2);
}
}
if (!function_exists('csr_per_real')) {
function csr_per_real($var,$mm_id)//performance average all
{
$yy_id = date('Y');
$result = mysql_query("SELECT * FROM account Where csr_id = $var AND MONTH(regular_date) = $mm_id AND YEAR(regular_date) = $yy_id");
if (!$result) 
	{
    die("Issue in Data");
	}
$regular = MYSQL_NUMROWS($result);
$result = mysql_query("SELECT * FROM csr_performance Where csr_id = $var AND status = 1 AND MONTH(date) = $mm_id AND YEAR(date) = $yy_id");
if (!$result) 
	{
    die("Issue in Data");
	}
$total = MYSQL_NUMROWS($result);
$avg = ($regular/$total)*100;
echo number_format($avg, 2);
}
}
?>
<?php
date_default_timezone_set("Africa/Cairo");
$sy = date('Y-m-d');
$yy_id=date('Y');
?>
<?php echo $main_header; ?>
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
				<h1>CSR<small> Performance</small></h1>

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
					<a href="dashboard">Home</a><i class="fa fa-circle"></i>
				</li>
				<li class="active">
					 CSR Performance Report
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN SAMPLE TABLE PORTLET-->
					<div class="portlet light">
					<h4>Performance Report of <?php echo $csr_name; ?></h4>
						<div class="portlet-body">
							<div id="mytable" class="table-responsive">
								<table class="table table-hover">
								<thead>
								<tr>
								<th>
									 Month
								</th>
								<th>
									 Attended
								</th>
								<th>
									 Scheduled Trials
								</th>
								<th>
									 Running Trials
								</th>
								<th>
									 Regulars
								</th>
								<th>
									 Expected
								</th>
								<th>
									 Realized
								</th>
							</tr>
								</thead>
								<tbody>
								<tr>
								<td>
									 January-<?php echo $yy_id; ?>
								</td>
								<td>
									 <?php echo csr_allocated("$csr_id","01"); ?>
								</td>
								<td>
									 <?php echo csr_trials("$csr_id","01"); ?>
								</td>
								<td>
									 <?php echo csr_trials_running("$csr_id","01"); ?>
								</td>
								<td>
									 <?php echo csr_regulars("$csr_id","01"); ?>
								</td>
								<td>
									 <span class='bold font-blue'><?php echo csr_per_exp("$csr_id","01"); ?>%</span>
								</td>
								<td>
									<span class='bold font-green'><?php echo csr_per_real("$csr_id","01"); ?>%</span>
								</td>
								</tr>
								<tr>
								<td>
									 February-<?php echo $yy_id; ?>
								</td>
								<td>
									 <?php echo csr_allocated("$csr_id","02"); ?>
								</td>
								<td>
									 <?php echo csr_trials("$csr_id","02"); ?>
								</td>
								<td>
									 <?php echo csr_trials_running("$csr_id","02"); ?>
								</td>
								<td>
									 <?php echo csr_regulars("$csr_id","02"); ?>
								</td>
								<td>
									 <span class='bold font-blue'><?php echo csr_per_exp("$csr_id","02"); ?>%</span>
								</td>
								<td>
									<span class='bold font-green'><?php echo csr_per_real("$csr_id","02"); ?>%</span>
								</td>
								</tr>
								<tr>
								<td>
									 March-<?php echo $yy_id; ?>
								</td>
								<td>
									 <?php echo csr_allocated("$csr_id","03"); ?>
								</td>
								<td>
									 <?php echo csr_trials("$csr_id","03"); ?>
								</td>
								<td>
									 <?php echo csr_trials_running("$csr_id","03"); ?>
								</td>
								<td>
									 <?php echo csr_regulars("$csr_id","03"); ?>
								</td>
								<td>
									 <span class='bold font-blue'><?php echo csr_per_exp("$csr_id","03"); ?>%</span>
								</td>
								<td>
									<span class='bold font-green'><?php echo csr_per_real("$csr_id","03"); ?>%</span>
								</td>
								</tr>
								<tr>
								<td>
									 April-<?php echo $yy_id; ?>
								</td>
								<td>
									 <?php echo csr_allocated("$csr_id","04"); ?>
								</td>
								<td>
									 <?php echo csr_trials("$csr_id","04"); ?>
								</td>
								<td>
									 <?php echo csr_trials_running("$csr_id","04"); ?>
								</td>
								<td>
									 <?php echo csr_regulars("$csr_id","04"); ?>
								</td>
								<td>
									 <span class='bold font-blue'><?php echo csr_per_exp("$csr_id","04"); ?>%</span>
								</td>
								<td>
									<span class='bold font-green'><?php echo csr_per_real("$csr_id","04"); ?>%</span>
								</td>
								</tr>
								<tr>
								<td>
									 May-<?php echo $yy_id; ?>
								</td>
								<td>
									 <?php echo csr_allocated("$csr_id","05"); ?>
								</td>
								<td>
									 <?php echo csr_trials("$csr_id","05"); ?>
								</td>
								<td>
									 <?php echo csr_trials_running("$csr_id","05"); ?>
								</td>
								<td>
									 <?php echo csr_regulars("$csr_id","05"); ?>
								</td>
								<td>
									 <span class='bold font-blue'><?php echo csr_per_exp("$csr_id","05"); ?>%</span>
								</td>
								<td>
									<span class='bold font-green'><?php echo csr_per_real("$csr_id","05"); ?>%</span>
								</td>
								</tr>
								<tr>
								<td>
									 June-<?php echo $yy_id; ?>
								</td>
								<td>
									 <?php echo csr_allocated("$csr_id","06"); ?>
								</td>
								<td>
									 <?php echo csr_trials("$csr_id","06"); ?>
								</td>
								<td>
									 <?php echo csr_trials_running("$csr_id","06"); ?>
								</td>
								<td>
									 <?php echo csr_regulars("$csr_id","06"); ?>
								</td>
								<td>
									 <span class='bold font-blue'><?php echo csr_per_exp("$csr_id","06"); ?>%</span>
								</td>
								<td>
									<span class='bold font-green'><?php echo csr_per_real("$csr_id","06"); ?>%</span>
								</td>
								</tr>
								<tr>
								<td>
									 July-<?php echo $yy_id; ?>
								</td>
								<td>
									 <?php echo csr_allocated("$csr_id","07"); ?>
								</td>
								<td>
									 <?php echo csr_trials("$csr_id","07"); ?>
								</td>
								<td>
									 <?php echo csr_trials_running("$csr_id","07"); ?>
								</td>
								<td>
									 <?php echo csr_regulars("$csr_id","07"); ?>
								</td>
								<td>
									 <span class='bold font-blue'><?php echo csr_per_exp("$csr_id","07"); ?>%</span>
								</td>
								<td>
									<span class='bold font-green'><?php echo csr_per_real("$csr_id","07"); ?>%</span>
								</td>
								</tr>
								<tr>
								<td>
									 August-<?php echo $yy_id; ?>
								</td>
								<td>
									 <?php echo csr_allocated("$csr_id","08"); ?>
								</td>
								<td>
									 <?php echo csr_trials("$csr_id","08"); ?>
								</td>
								<td>
									 <?php echo csr_trials_running("$csr_id","08"); ?>
								</td>
								<td>
									 <?php echo csr_regulars("$csr_id","08"); ?>
								</td>
								<td>
									<span class='bold font-blue'><?php echo csr_per_exp("$csr_id","08"); ?>%</span>
								</td>
								<td>
									<span class='bold font-green'><?php echo csr_per_real("$csr_id","08"); ?>%</span>
								</td>
								</tr>
								<tr>
								<td>
									 September-<?php echo $yy_id; ?>
								</td>
								<td>
									 <?php echo csr_allocated("$csr_id","09"); ?>
								</td>
								<td>
									 <?php echo csr_trials("$csr_id","09"); ?>
								</td>
								<td>
									 <?php echo csr_trials_running("$csr_id","09"); ?>
								</td>
								<td>
									 <?php echo csr_regulars("$csr_id","09"); ?>
								</td>
								<td>
									 <span class='bold font-blue'><?php echo csr_per_exp("$csr_id","09"); ?>%</span>
								</td>
								<td>
									<span class='bold font-green'><?php echo csr_per_real("$csr_id","09"); ?>%</span>
								</td>
								</tr>
								<tr>
								<td>
									 October-<?php echo $yy_id; ?>
								</td>
								<td>
									 <?php echo csr_allocated("$csr_id","10"); ?>
								</td>
								<td>
									 <?php echo csr_trials("$csr_id","10"); ?>
								</td>
								<td>
									 <?php echo csr_trials_running("$csr_id","10"); ?>
								</td>
								<td>
									 <?php echo csr_regulars("$csr_id","10"); ?>
								</td>
								<td>
									 <span class='bold font-blue'><?php echo csr_per_exp("$csr_id","10"); ?>%</span>
								</td>
								<td>
									<span class='bold font-green'><?php echo csr_per_real("$csr_id","10"); ?>%</span>
								</td>
								</tr>
								<tr>
								<td>
									 November-<?php echo $yy_id; ?>
								</td>
								<td>
									 <?php echo csr_allocated("$csr_id","11"); ?>
								</td>
								<td>
									 <?php echo csr_trials("$csr_id","11"); ?>
								</td>
								<td>
									 <?php echo csr_trials_running("$csr_id","11"); ?>
								</td>
								<td>
									 <?php echo csr_regulars("$csr_id","11"); ?>
								</td>
								<td>
									<span class='bold font-blue'><?php echo csr_per_exp("$csr_id","11"); ?>%</span>
								</td>
								<td>
									<span class='bold font-green'><?php echo csr_per_real("$csr_id","11"); ?>%</span>
								</td>
								</tr>
								<tr>
								<td>
									 December-<?php echo $yy_id; ?>
								</td>
								<td>
									 <?php echo csr_allocated("$csr_id","12"); ?>
								</td>
								<td>
									 <?php echo csr_trials("$csr_id","12"); ?>
								</td>
								<td>
									 <?php echo csr_trials_running("$csr_id","12"); ?>
								</td>
								<td>
									 <?php echo csr_regulars("$csr_id","12"); ?>
								</td>
								<td>
									 <span class='bold font-blue'><?php echo csr_per_exp("$csr_id","12"); ?>%</span>
								</td>
								<td>
									<span class='bold font-green'><?php echo csr_per_real("$csr_id","12"); ?>%</span>
								</td>
								</tr>
								</tbody>
								</table>
							</div>
						</div>
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