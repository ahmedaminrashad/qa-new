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
  include("../includes/session1.php");
  require ("../includes/dbconnection.php");
  include("header.php");
  $cur_id =$_REQUEST['cur'];
?>
<?php
date_default_timezone_set("Africa/Cairo");
$sy = date('Y-m-d');
function invoice($var){
$cur_id =$_REQUEST['cur'];
$sql = "select sum(fee+invoice_add) from invoice where status = 2 and DATE(d) = '$var' and currency_id = '$cur_id'";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
if($row[0] > 0) 
        {
            echo '' .number_format($row[0], 0);
        }
    else
        {
            echo '--';
        }
}
function invoice_color($var){
$cur_id =$_REQUEST['cur'];
$sql = "select sum(fee+invoice_add) from invoice where status = 2 and DATE(d) = '$var' and currency_id = '$cur_id'";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
if($row[0] >= 500 ) 
        {
            echo 'success';
        }
    else
        {
            echo '--';
        }
}
function invoice2($var1, $var2){
$cur_id =$_REQUEST['cur'];
$sql = "select sum(fee+invoice_add) from invoice where status = 2 and DAY(d) = '$var1' and YEAR(d) = '$var2' and currency_id = '$cur_id'";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
if($row[0] > 0) 
        {
            echo '' .number_format($row[0], 0);
        }
    else
        {
            echo '--';
        }
}
function invoice3($var1, $var2){
$cur_id =$_REQUEST['cur'];
$sql = "select sum(fee+invoice_add) from invoice where status = 2 and MONTH(d) = '$var1' and YEAR(d) = '$var2' and currency_id = '$cur_id'";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
if($row[0] > 0) 
        {
            echo '' .number_format($row[0], 0);
        }
    else
        {
            echo '--';
        }
}
function invoice4($var2){
$cur_id =$_REQUEST['cur'];
$sql = "select sum(fee+invoice_add) from invoice where status = 2 and YEAR(d) = '$var2' and currency_id = '$cur_id'";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
if($row[0] > 0) 
        {
            echo '' .number_format($row[0], 0);
        }
    else
        {
            echo '--';
        }
}
?>
<?php echo $main_header; ?>
<?php echo $tool_bar; ?>
<?php echo $start_menu; ?>
<?php echo $search_bar; ?>
<?php echo $main_menu; ?>
<style type="text/css">
.auto-style1 {
	text-align: center;
}
.auto-style2 {
	text-align: right;
    vertical-align: middle;
    padding: 5px;
    position: relative;
}
</style>
<!-- BEGIN PAGE CONTAINER -->
<div class="page-container">
	<!-- BEGIN PAGE HEAD -->
	<div class="page-head">
		<div class="container">
			<!-- BEGIN PAGE TITLE -->
			<div class="page-title">
				<h1>Class<small> Payment Rules</small></h1>
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
				<li>
					 Class Payment Rules
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN SAMPLE TABLE PORTLET-->
					<div class="portlet light">
						<div class="portlet-body">
							<div id="mytable" class="table-responsive">
								<table class="table table-bordered table-hover">
									<thead>
										<tr>
											<th>
												Date/month
											</th>
											<th>
												Jan
											</th>
											<th>
												Feb
											</th>
											<th>
												Mar
											</th>
											<th>
												Apr
											</th>
											<th>
												May
											</th>
											<th>
												Jun
											</th>
											<th>
												Jul
											</th>
											<th>
												Aug
											</th>
											<th>
												Sep
											</th>
											<th>
												Oct
											</th>
											<th>
												Nov
											</th>
											<th>
												Dec
											</th>
											<th>
												Total
											</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>
												1st
											</td>
											<td class="<?php invoice_color("2017-01-01"); ?>">
												<?php invoice("2017-01-01"); ?>
											</td>
											<td class="<?php invoice_color("2017-02-01"); ?>">
												<?php invoice("2017-02-01"); ?>	
											</td>
											<td class="<?php invoice_color("2017-03-01"); ?>">
												<?php invoice("2017-03-01"); ?>
											</td>
											<td class="<?php invoice_color("2017-04-01"); ?>">
												<?php invoice("2017-04-01"); ?>
											</td>
											<td class="<?php invoice_color("2017-05-01"); ?>">
												<?php invoice("2017-05-01"); ?>
											</td>
											<td class="<?php invoice_color("2017-06-01"); ?>">
												<?php invoice("2017-06-01"); ?>	
											</td>
											<td class="<?php invoice_color("2017-07-01"); ?>">
												<?php invoice("2017-07-01"); ?>
											</td>
											<td class="<?php invoice_color("2017-08-01"); ?>">
												<?php invoice("2017-08-01"); ?>
											</td>
											<td class="<?php invoice_color("2017-09-01"); ?>">
												<?php invoice("2017-09-01"); ?>
											</td>
											<td class="<?php invoice_color("2017-10-01"); ?>">
												<?php invoice("2017-10-01"); ?>	
											</td>
											<td class="<?php invoice_color("2017-11-01"); ?>">
												<?php invoice("2017-11-01"); ?>
											</td>
											<td class="<?php invoice_color("2017-12-01"); ?>">
												<?php invoice("2017-12-01"); ?>
											</td>
											<td>
												<?php invoice2("01","2017"); ?>
											</td>
										</tr>
										<tr>
											<td>
												2nd
											</td>
											<td>
												<?php invoice("2017-01-02"); ?>
											</td>
											<td>
												<?php invoice("2017-02-02"); ?>	
											</td>
											<td>
												<?php invoice("2017-03-02"); ?>
											</td>
											<td>
												<?php invoice("2017-04-02"); ?>
											</td>
											<td>
												<?php invoice("2017-05-02"); ?>
											</td>
											<td>
												<?php invoice("2017-06-02"); ?>	
											</td>
											<td>
												<?php invoice("2017-07-02"); ?>
											</td>
											<td>
												<?php invoice("2017-08-02"); ?>
											</td>
											<td>
												<?php invoice("2017-09-02"); ?>
											</td>
											<td>
												<?php invoice("2017-10-02"); ?>	
											</td>
											<td>
												<?php invoice("2017-11-02"); ?>
											</td>
											<td>
												<?php invoice("2017-12-02"); ?>
											</td>
											<td>
												<?php invoice2("02","2017"); ?>
											</td>
										</tr>
										<tr>
											<td>
												3rd
											</td>
											<td>
												<?php invoice("2017-01-03"); ?>
											</td>
											<td>
												<?php invoice("2017-02-03"); ?>	
											</td>
											<td>
												<?php invoice("2017-03-03"); ?>
											</td>
											<td>
												<?php invoice("2017-04-03"); ?>
											</td>
											<td>
												<?php invoice("2017-05-03"); ?>
											</td>
											<td>
												<?php invoice("2017-06-03"); ?>	
											</td>
											<td>
												<?php invoice("2017-07-03"); ?>
											</td>
											<td>
												<?php invoice("2017-08-03"); ?>
											</td>
											<td>
												<?php invoice("2017-09-03"); ?>
											</td>
											<td>
												<?php invoice("2017-10-03"); ?>	
											</td>
											<td>
												<?php invoice("2017-11-03"); ?>
											</td>
											<td>
												<?php invoice("2017-12-03"); ?>
											</td>
											<td>
												<?php invoice2("03","2017"); ?>
											</td>
										</tr>
										<tr>
											<td>
												4th
											</td>
											<td>
												<?php invoice("2017-01-04"); ?>
											</td>
											<td>
												<?php invoice("2017-02-04"); ?>	
											</td>
											<td>
												<?php invoice("2017-03-04"); ?>
											</td>
											<td>
												<?php invoice("2017-04-04"); ?>
											</td>
											<td>
												<?php invoice("2017-05-04"); ?>
											</td>
											<td>
												<?php invoice("2017-06-04"); ?>	
											</td>
											<td>
												<?php invoice("2017-07-04"); ?>
											</td>
											<td>
												<?php invoice("2017-08-04"); ?>
											</td>
											<td>
												<?php invoice("2017-09-04"); ?>
											</td>
											<td>
												<?php invoice("2017-10-04"); ?>	
											</td>
											<td>
												<?php invoice("2017-11-04"); ?>
											</td>
											<td>
												<?php invoice("2017-12-04"); ?>
											</td>
											<td>
												<?php invoice2("04","2017"); ?>
											</td>
										</tr>
										<tr>
											<td>
												5th
											</td>
											<td>
												<?php invoice("2017-01-05"); ?>
											</td>
											<td>
												<?php invoice("2017-02-05"); ?>	
											</td>
											<td>
												<?php invoice("2017-03-05"); ?>
											</td>
											<td>
												<?php invoice("2017-04-05"); ?>
											</td>
											<td>
												<?php invoice("2017-05-05"); ?>
											</td>
											<td>
												<?php invoice("2017-06-05"); ?>	
											</td>
											<td>
												<?php invoice("2017-07-05"); ?>
											</td>
											<td>
												<?php invoice("2017-08-05"); ?>
											</td>
											<td>
												<?php invoice("2017-09-05"); ?>
											</td>
											<td>
												<?php invoice("2017-10-05"); ?>	
											</td>
											<td>
												<?php invoice("2017-11-05"); ?>
											</td>
											<td>
												<?php invoice("2017-12-05"); ?>
											</td>
											<td>
												<?php invoice2("05","2017"); ?>
											</td>
										</tr>
										<tr>
											<td>
												6th
											</td>
											<td>
												<?php invoice("2017-01-06"); ?>
											</td>
											<td>
												<?php invoice("2017-02-06"); ?>	
											</td>
											<td>
												<?php invoice("2017-03-06"); ?>
											</td>
											<td>
												<?php invoice("2017-04-06"); ?>
											</td>
											<td>
												<?php invoice("2017-05-06"); ?>
											</td>
											<td>
												<?php invoice("2017-06-06"); ?>	
											</td>
											<td>
												<?php invoice("2017-07-06"); ?>
											</td>
											<td>
												<?php invoice("2017-08-06"); ?>
											</td>
											<td>
												<?php invoice("2017-09-06"); ?>
											</td>
											<td>
												<?php invoice("2017-10-06"); ?>	
											</td>
											<td>
												<?php invoice("2017-11-06"); ?>
											</td>
											<td>
												<?php invoice("2017-12-06"); ?>
											</td>
											<td>
												<?php invoice2("06","2017"); ?>
											</td>
										</tr>
										<tr>
											<td>
												7th
											</td>
											<td>
												<?php invoice("2017-01-07"); ?>
											</td>
											<td>
												<?php invoice("2017-02-07"); ?>	
											</td>
											<td>
												<?php invoice("2017-03-07"); ?>
											</td>
											<td>
												<?php invoice("2017-04-07"); ?>
											</td>
											<td>
												<?php invoice("2017-05-07"); ?>
											</td>
											<td>
												<?php invoice("2017-06-07"); ?>	
											</td>
											<td>
												<?php invoice("2017-07-07"); ?>
											</td>
											<td>
												<?php invoice("2017-08-07"); ?>
											</td>
											<td>
												<?php invoice("2017-09-07"); ?>
											</td>
											<td>
												<?php invoice("2017-10-07"); ?>	
											</td>
											<td>
												<?php invoice("2017-11-07"); ?>
											</td>
											<td>
												<?php invoice("2017-12-07"); ?>
											</td>
											<td>
												<?php invoice2("07","2017"); ?>
											</td>
										</tr>
										<tr>
											<td>
												8th
											</td>
											<td>
												<?php invoice("2017-01-08"); ?>
											</td>
											<td>
												<?php invoice("2017-02-08"); ?>	
											</td>
											<td>
												<?php invoice("2017-03-08"); ?>
											</td>
											<td>
												<?php invoice("2017-04-08"); ?>
											</td>
											<td>
												<?php invoice("2017-05-08"); ?>
											</td>
											<td>
												<?php invoice("2017-06-08"); ?>	
											</td>
											<td>
												<?php invoice("2017-07-08"); ?>
											</td>
											<td>
												<?php invoice("2017-08-08"); ?>
											</td>
											<td>
												<?php invoice("2017-09-08"); ?>
											</td>
											<td>
												<?php invoice("2017-10-08"); ?>	
											</td>
											<td>
												<?php invoice("2017-11-08"); ?>
											</td>
											<td>
												<?php invoice("2017-12-08"); ?>
											</td>
											<td>
												<?php invoice2("08","2017"); ?>
											</td>
										</tr>
										<tr>
											<td>
												9th
											</td>
											<td>
												<?php invoice("2017-01-09"); ?>
											</td>
											<td>
												<?php invoice("2017-02-09"); ?>	
											</td>
											<td>
												<?php invoice("2017-03-09"); ?>
											</td>
											<td>
												<?php invoice("2017-04-09"); ?>
											</td>
											<td>
												<?php invoice("2017-05-09"); ?>
											</td>
											<td>
												<?php invoice("2017-06-09"); ?>	
											</td>
											<td>
												<?php invoice("2017-07-09"); ?>
											</td>
											<td>
												<?php invoice("2017-08-09"); ?>
											</td>
											<td>
												<?php invoice("2017-09-09"); ?>
											</td>
											<td>
												<?php invoice("2017-10-09"); ?>	
											</td>
											<td>
												<?php invoice("2017-11-09"); ?>
											</td>
											<td>
												<?php invoice("2017-12-09"); ?>
											</td>
											<td>
												<?php invoice2("09","2017"); ?>
											</td>
										</tr>
										<tr>
											<td>
												10th
											</td>
											<td>
												<?php invoice("2017-01-10"); ?>
											</td>
											<td>
												<?php invoice("2017-02-10"); ?>	
											</td>
											<td>
												<?php invoice("2017-03-10"); ?>
											</td>
											<td>
												<?php invoice("2017-04-10"); ?>
											</td>
											<td>
												<?php invoice("2017-05-10"); ?>
											</td>
											<td>
												<?php invoice("2017-06-10"); ?>	
											</td>
											<td>
												<?php invoice("2017-07-10"); ?>
											</td>
											<td>
												<?php invoice("2017-08-10"); ?>
											</td>
											<td>
												<?php invoice("2017-09-10"); ?>
											</td>
											<td>
												<?php invoice("2017-10-10"); ?>	
											</td>
											<td>
												<?php invoice("2017-11-10"); ?>
											</td>
											<td>
												<?php invoice("2017-12-10"); ?>
											</td>
											<td>
												<?php invoice2("10","2017"); ?>
											</td>
										</tr>
										<tr>
											<td>
												11th
											</td>
											<td>
												<?php invoice("2017-01-11"); ?>
											</td>
											<td>
												<?php invoice("2017-02-11"); ?>	
											</td>
											<td>
												<?php invoice("2017-03-11"); ?>
											</td>
											<td>
												<?php invoice("2017-04-11"); ?>
											</td>
											<td>
												<?php invoice("2017-05-11"); ?>
											</td>
											<td>
												<?php invoice("2017-06-11"); ?>	
											</td>
											<td>
												<?php invoice("2017-07-11"); ?>
											</td>
											<td>
												<?php invoice("2017-08-11"); ?>
											</td>
											<td>
												<?php invoice("2017-09-11"); ?>
											</td>
											<td>
												<?php invoice("2017-10-11"); ?>	
											</td>
											<td>
												<?php invoice("2017-11-11"); ?>
											</td>
											<td>
												<?php invoice("2017-12-11"); ?>
											</td>
											<td>
												<?php invoice2("11","2017"); ?>
											</td>
										</tr>
										<tr>
											<td>
												12th
											</td>
											<td>
												<?php invoice("2017-01-12"); ?>
											</td>
											<td>
												<?php invoice("2017-02-12"); ?>	
											</td>
											<td>
												<?php invoice("2017-03-12"); ?>
											</td>
											<td>
												<?php invoice("2017-04-12"); ?>
											</td>
											<td>
												<?php invoice("2017-05-12"); ?>
											</td>
											<td>
												<?php invoice("2017-06-12"); ?>	
											</td>
											<td>
												<?php invoice("2017-07-12"); ?>
											</td>
											<td>
												<?php invoice("2017-08-12"); ?>
											</td>
											<td>
												<?php invoice("2017-09-12"); ?>
											</td>
											<td>
												<?php invoice("2017-10-12"); ?>	
											</td>
											<td>
												<?php invoice("2017-11-12"); ?>
											</td>
											<td>
												<?php invoice("2017-12-12"); ?>
											</td>
											<td>
												<?php invoice2("12","2017"); ?>
											</td>
										</tr>
										<tr>
											<td>
												13th
											</td>
											<td>
												<?php invoice("2017-01-13"); ?>
											</td>
											<td>
												<?php invoice("2017-02-13"); ?>	
											</td>
											<td>
												<?php invoice("2017-03-13"); ?>
											</td>
											<td>
												<?php invoice("2017-04-13"); ?>
											</td>
											<td>
												<?php invoice("2017-05-13"); ?>
											</td>
											<td>
												<?php invoice("2017-06-13"); ?>	
											</td>
											<td>
												<?php invoice("2017-07-13"); ?>
											</td>
											<td>
												<?php invoice("2017-08-13"); ?>
											</td>
											<td>
												<?php invoice("2017-09-13"); ?>
											</td>
											<td>
												<?php invoice("2017-10-13"); ?>	
											</td>
											<td>
												<?php invoice("2017-11-13"); ?>
											</td>
											<td>
												<?php invoice("2017-12-13"); ?>
											</td>
											<td>
												<?php invoice2("13","2017"); ?>
											</td>
										</tr>
										<tr>
											<td>
												14th
											</td>
											<td>
												<?php invoice("2017-01-14"); ?>
											</td>
											<td>
												<?php invoice("2017-02-14"); ?>	
											</td>
											<td>
												<?php invoice("2017-03-14"); ?>
											</td>
											<td>
												<?php invoice("2017-04-14"); ?>
											</td>
											<td>
												<?php invoice("2017-05-14"); ?>
											</td>
											<td>
												<?php invoice("2017-06-14"); ?>	
											</td>
											<td>
												<?php invoice("2017-07-14"); ?>
											</td>
											<td>
												<?php invoice("2017-08-14"); ?>
											</td>
											<td>
												<?php invoice("2017-09-14"); ?>
											</td>
											<td>
												<?php invoice("2017-10-14"); ?>	
											</td>
											<td>
												<?php invoice("2017-11-14"); ?>
											</td>
											<td>
												<?php invoice("2017-12-14"); ?>
											</td>
											<td>
												<?php invoice2("14","2017"); ?>
											</td>
										</tr>
										<tr>
											<td>
												15th
											</td>
											<td>
												<?php invoice("2017-01-15"); ?>
											</td>
											<td>
												<?php invoice("2017-02-15"); ?>	
											</td>
											<td>
												<?php invoice("2017-03-15"); ?>
											</td>
											<td>
												<?php invoice("2017-04-15"); ?>
											</td>
											<td>
												<?php invoice("2017-05-15"); ?>
											</td>
											<td>
												<?php invoice("2017-06-15"); ?>	
											</td>
											<td>
												<?php invoice("2017-07-15"); ?>
											</td>
											<td>
												<?php invoice("2017-08-15"); ?>
											</td>
											<td>
												<?php invoice("2017-09-15"); ?>
											</td>
											<td>
												<?php invoice("2017-10-15"); ?>	
											</td>
											<td>
												<?php invoice("2017-11-15"); ?>
											</td>
											<td>
												<?php invoice("2017-12-15"); ?>
											</td>
											<td>
												<?php invoice2("15","2017"); ?>
											</td>
										</tr>
										<tr>
											<td>
												16th
											</td>
											<td>
												<?php invoice("2017-01-16"); ?>
											</td>
											<td>
												<?php invoice("2017-02-16"); ?>	
											</td>
											<td>
												<?php invoice("2017-03-16"); ?>
											</td>
											<td>
												<?php invoice("2017-04-16"); ?>
											</td>
											<td>
												<?php invoice("2017-05-16"); ?>
											</td>
											<td>
												<?php invoice("2017-06-16"); ?>	
											</td>
											<td>
												<?php invoice("2017-07-16"); ?>
											</td>
											<td>
												<?php invoice("2017-08-16"); ?>
											</td>
											<td>
												<?php invoice("2017-09-16"); ?>
											</td>
											<td>
												<?php invoice("2017-10-16"); ?>	
											</td>
											<td>
												<?php invoice("2017-11-16"); ?>
											</td>
											<td>
												<?php invoice("2017-12-16"); ?>
											</td>
											<td>
												<?php invoice2("16","2017"); ?>
											</td>
										</tr>
										<tr>
											<td>
												17th
											</td>
											<td>
												<?php invoice("2017-01-17"); ?>
											</td>
											<td>
												<?php invoice("2017-02-17"); ?>	
											</td>
											<td>
												<?php invoice("2017-03-17"); ?>
											</td>
											<td>
												<?php invoice("2017-04-17"); ?>
											</td>
											<td>
												<?php invoice("2017-05-17"); ?>
											</td>
											<td>
												<?php invoice("2017-06-17"); ?>	
											</td>
											<td>
												<?php invoice("2017-07-17"); ?>
											</td>
											<td>
												<?php invoice("2017-08-17"); ?>
											</td>
											<td>
												<?php invoice("2017-09-17"); ?>
											</td>
											<td>
												<?php invoice("2017-10-17"); ?>	
											</td>
											<td>
												<?php invoice("2017-11-17"); ?>
											</td>
											<td>
												<?php invoice("2017-12-17"); ?>
											</td>
											<td>
												<?php invoice2("17","2017"); ?>
											</td>
										</tr>
										<tr>
											<td>
												18th
											</td>
											<td>
												<?php invoice("2017-01-18"); ?>
											</td>
											<td>
												<?php invoice("2017-02-18"); ?>	
											</td>
											<td>
												<?php invoice("2017-03-18"); ?>
											</td>
											<td>
												<?php invoice("2017-04-18"); ?>
											</td>
											<td>
												<?php invoice("2017-05-18"); ?>
											</td>
											<td>
												<?php invoice("2017-06-18"); ?>	
											</td>
											<td>
												<?php invoice("2017-07-18"); ?>
											</td>
											<td>
												<?php invoice("2017-08-18"); ?>
											</td>
											<td>
												<?php invoice("2017-09-18"); ?>
											</td>
											<td>
												<?php invoice("2017-10-18"); ?>	
											</td>
											<td>
												<?php invoice("2017-11-18"); ?>
											</td>
											<td>
												<?php invoice("2017-12-18"); ?>
											</td>
											<td>
												<?php invoice2("18","2017"); ?>
											</td>
										</tr>
										<tr>
											<td>
												19th
											</td>
											<td>
												<?php invoice("2017-01-19"); ?>
											</td>
											<td>
												<?php invoice("2017-02-19"); ?>	
											</td>
											<td>
												<?php invoice("2017-03-19"); ?>
											</td>
											<td>
												<?php invoice("2017-04-19"); ?>
											</td>
											<td>
												<?php invoice("2017-05-19"); ?>
											</td>
											<td>
												<?php invoice("2017-06-19"); ?>	
											</td>
											<td>
												<?php invoice("2017-07-19"); ?>
											</td>
											<td>
												<?php invoice("2017-08-19"); ?>
											</td>
											<td>
												<?php invoice("2017-09-19"); ?>
											</td>
											<td>
												<?php invoice("2017-10-19"); ?>	
											</td>
											<td>
												<?php invoice("2017-11-19"); ?>
											</td>
											<td>
												<?php invoice("2017-12-19"); ?>
											</td>
											<td>
												<?php invoice2("19","2017"); ?>
											</td>
										</tr>
										<tr>
											<td>
												20th
											</td>
											<td>
												<?php invoice("2017-01-20"); ?>
											</td>
											<td>
												<?php invoice("2017-02-20"); ?>	
											</td>
											<td>
												<?php invoice("2017-03-20"); ?>
											</td>
											<td>
												<?php invoice("2017-04-20"); ?>
											</td>
											<td>
												<?php invoice("2017-05-20"); ?>
											</td>
											<td>
												<?php invoice("2017-06-20"); ?>	
											</td>
											<td>
												<?php invoice("2017-07-20"); ?>
											</td>
											<td>
												<?php invoice("2017-08-20"); ?>
											</td>
											<td>
												<?php invoice("2017-09-20"); ?>
											</td>
											<td>
												<?php invoice("2017-10-20"); ?>	
											</td>
											<td>
												<?php invoice("2017-11-20"); ?>
											</td>
											<td>
												<?php invoice("2017-12-20"); ?>
											</td>
											<td>
												<?php invoice2("20","2017"); ?>
											</td>
										</tr>
										<tr>
											<td>
												21st
											</td>
											<td>
												<?php invoice("2017-01-21"); ?>
											</td>
											<td>
												<?php invoice("2017-02-21"); ?>	
											</td>
											<td>
												<?php invoice("2017-03-21"); ?>
											</td>
											<td>
												<?php invoice("2017-04-21"); ?>
											</td>
											<td>
												<?php invoice("2017-05-21"); ?>
											</td>
											<td>
												<?php invoice("2017-06-21"); ?>	
											</td>
											<td>
												<?php invoice("2017-07-21"); ?>
											</td>
											<td>
												<?php invoice("2017-08-21"); ?>
											</td>
											<td>
												<?php invoice("2017-09-21"); ?>
											</td>
											<td>
												<?php invoice("2017-10-21"); ?>	
											</td>
											<td>
												<?php invoice("2017-11-21"); ?>
											</td>
											<td>
												<?php invoice("2017-12-21"); ?>
											</td>
											<td>
												<?php invoice2("21","2017"); ?>
											</td>
										</tr>
										<tr>
											<td>
												22nd
											</td>
											<td>
												<?php invoice("2017-01-22"); ?>
											</td>
											<td>
												<?php invoice("2017-02-22"); ?>	
											</td>
											<td>
												<?php invoice("2017-03-22"); ?>
											</td>
											<td>
												<?php invoice("2017-04-22"); ?>
											</td>
											<td>
												<?php invoice("2017-05-22"); ?>
											</td>
											<td>
												<?php invoice("2017-06-22"); ?>	
											</td>
											<td>
												<?php invoice("2017-07-22"); ?>
											</td>
											<td>
												<?php invoice("2017-08-22"); ?>
											</td>
											<td>
												<?php invoice("2017-09-22"); ?>
											</td>
											<td>
												<?php invoice("2017-10-22"); ?>	
											</td>
											<td>
												<?php invoice("2017-11-22"); ?>
											</td>
											<td>
												<?php invoice("2017-12-22"); ?>
											</td>
											<td>
												<?php invoice2("22","2017"); ?>
											</td>
										</tr>
										<tr>
											<td>
												23rd
											</td>
											<td>
												<?php invoice("2017-01-23"); ?>
											</td>
											<td>
												<?php invoice("2017-02-23"); ?>	
											</td>
											<td>
												<?php invoice("2017-03-23"); ?>
											</td>
											<td>
												<?php invoice("2017-04-23"); ?>
											</td>
											<td>
												<?php invoice("2017-05-23"); ?>
											</td>
											<td>
												<?php invoice("2017-06-23"); ?>	
											</td>
											<td>
												<?php invoice("2017-07-23"); ?>
											</td>
											<td>
												<?php invoice("2017-08-23"); ?>
											</td>
											<td>
												<?php invoice("2017-09-23"); ?>
											</td>
											<td>
												<?php invoice("2017-10-23"); ?>	
											</td>
											<td>
												<?php invoice("2017-11-23"); ?>
											</td>
											<td>
												<?php invoice("2017-12-23"); ?>
											</td>
											<td>
												<?php invoice2("23","2017"); ?>
											</td>
										</tr>
										<tr>
											<td>
												24th
											</td>
											<td>
												<?php invoice("2017-01-24"); ?>
											</td>
											<td>
												<?php invoice("2017-02-24"); ?>	
											</td>
											<td>
												<?php invoice("2017-03-24"); ?>
											</td>
											<td>
												<?php invoice("2017-04-24"); ?>
											</td>
											<td>
												<?php invoice("2017-05-24"); ?>
											</td>
											<td>
												<?php invoice("2017-06-24"); ?>	
											</td>
											<td>
												<?php invoice("2017-07-24"); ?>
											</td>
											<td>
												<?php invoice("2017-08-24"); ?>
											</td>
											<td>
												<?php invoice("2017-09-24"); ?>
											</td>
											<td>
												<?php invoice("2017-10-24"); ?>	
											</td>
											<td>
												<?php invoice("2017-11-24"); ?>
											</td>
											<td>
												<?php invoice("2017-12-24"); ?>
											</td>
											<td>
												<?php invoice2("24","2017"); ?>
											</td>
										</tr>
										<tr>
											<td>
												25th
											</td>
											<td>
												<?php invoice("2017-01-25"); ?>
											</td>
											<td>
												<?php invoice("2017-02-25"); ?>	
											</td>
											<td>
												<?php invoice("2017-03-25"); ?>
											</td>
											<td>
												<?php invoice("2017-04-25"); ?>
											</td>
											<td>
												<?php invoice("2017-05-25"); ?>
											</td>
											<td>
												<?php invoice("2017-06-25"); ?>	
											</td>
											<td>
												<?php invoice("2017-07-25"); ?>
											</td>
											<td>
												<?php invoice("2017-08-25"); ?>
											</td>
											<td>
												<?php invoice("2017-09-25"); ?>
											</td>
											<td>
												<?php invoice("2017-10-25"); ?>	
											</td>
											<td>
												<?php invoice("2017-11-25"); ?>
											</td>
											<td>
												<?php invoice("2017-12-25"); ?>
											</td>
											<td>
												<?php invoice2("25","2017"); ?>
											</td>
										</tr>
										<tr>
											<td>
												26th
											</td>
											<td>
												<?php invoice("2017-01-26"); ?>
											</td>
											<td>
												<?php invoice("2017-02-26"); ?>	
											</td>
											<td>
												<?php invoice("2017-03-26"); ?>
											</td>
											<td>
												<?php invoice("2017-04-26"); ?>
											</td>
											<td>
												<?php invoice("2017-05-26"); ?>
											</td>
											<td>
												<?php invoice("2017-06-26"); ?>	
											</td>
											<td>
												<?php invoice("2017-07-26"); ?>
											</td>
											<td>
												<?php invoice("2017-08-26"); ?>
											</td>
											<td>
												<?php invoice("2017-09-26"); ?>
											</td>
											<td>
												<?php invoice("2017-10-26"); ?>	
											</td>
											<td>
												<?php invoice("2017-11-26"); ?>
											</td>
											<td>
												<?php invoice("2017-12-26"); ?>
											</td>
											<td>
												<?php invoice2("26","2017"); ?>
											</td>
										</tr>
										<tr>
											<td>
												27th
											</td>
											<td>
												<?php invoice("2017-01-27"); ?>
											</td>
											<td>
												<?php invoice("2017-02-27"); ?>	
											</td>
											<td>
												<?php invoice("2017-03-27"); ?>
											</td>
											<td>
												<?php invoice("2017-04-27"); ?>
											</td>
											<td>
												<?php invoice("2017-05-27"); ?>
											</td>
											<td>
												<?php invoice("2017-06-27"); ?>	
											</td>
											<td>
												<?php invoice("2017-07-27"); ?>
											</td>
											<td>
												<?php invoice("2017-08-27"); ?>
											</td>
											<td>
												<?php invoice("2017-09-27"); ?>
											</td>
											<td>
												<?php invoice("2017-10-27"); ?>	
											</td>
											<td>
												<?php invoice("2017-11-27"); ?>
											</td>
											<td>
												<?php invoice("2017-12-27"); ?>
											</td>
											<td>
												<?php invoice2("27","2017"); ?>
											</td>
										</tr>
										<tr>
											<td>
												28th
											</td>
											<td>
												<?php invoice("2017-01-28"); ?>
											</td>
											<td>
												<?php invoice("2017-02-28"); ?>	
											</td>
											<td>
												<?php invoice("2017-03-28"); ?>
											</td>
											<td>
												<?php invoice("2017-04-28"); ?>
											</td>
											<td>
												<?php invoice("2017-05-28"); ?>
											</td>
											<td>
												<?php invoice("2017-06-28"); ?>	
											</td>
											<td>
												<?php invoice("2017-07-28"); ?>
											</td>
											<td>
												<?php invoice("2017-08-28"); ?>
											</td>
											<td>
												<?php invoice("2017-09-28"); ?>
											</td>
											<td>
												<?php invoice("2017-10-28"); ?>	
											</td>
											<td>
												<?php invoice("2017-11-28"); ?>
											</td>
											<td>
												<?php invoice("2017-12-28"); ?>
											</td>
											<td>
												<?php invoice2("28","2017"); ?>
											</td>
										</tr>
										<tr>
											<td>
												29th
											</td>
											<td>
												<?php invoice("2017-01-29"); ?>
											</td>
											<td>
												<?php invoice("2017-02-29"); ?>	
											</td>
											<td>
												<?php invoice("2017-03-29"); ?>
											</td>
											<td>
												<?php invoice("2017-04-29"); ?>
											</td>
											<td>
												<?php invoice("2017-05-29"); ?>
											</td>
											<td>
												<?php invoice("2017-06-29"); ?>	
											</td>
											<td>
												<?php invoice("2017-07-29"); ?>
											</td>
											<td>
												<?php invoice("2017-08-29"); ?>
											</td>
											<td>
												<?php invoice("2017-09-29"); ?>
											</td>
											<td>
												<?php invoice("2017-10-29"); ?>	
											</td>
											<td>
												<?php invoice("2017-11-29"); ?>
											</td>
											<td>
												<?php invoice("2017-12-29"); ?>
											</td>
											<td>
												<?php invoice2("29","2017"); ?>
											</td>
										</tr>
										<tr>
											<td>
												30th
											</td>
											<td>
												<?php invoice("2017-01-30"); ?>
											</td>
											<td>
												<?php invoice("2017-02-30"); ?>	
											</td>
											<td>
												<?php invoice("2017-03-30"); ?>
											</td>
											<td>
												<?php invoice("2017-04-30"); ?>
											</td>
											<td>
												<?php invoice("2017-05-30"); ?>
											</td>
											<td>
												<?php invoice("2017-06-30"); ?>	
											</td>
											<td>
												<?php invoice("2017-07-30"); ?>
											</td>
											<td>
												<?php invoice("2017-08-30"); ?>
											</td>
											<td>
												<?php invoice("2017-09-30"); ?>
											</td>
											<td>
												<?php invoice("2017-10-30"); ?>	
											</td>
											<td>
												<?php invoice("2017-11-30"); ?>
											</td>
											<td>
												<?php invoice("2017-12-30"); ?>
											</td>
											<td>
												<?php invoice2("30","2017"); ?>
											</td>
										</tr>
										<tr>
											<td>
												31st
											</td>
											<td>
												<?php invoice("2017-01-31"); ?>
											</td>
											<td>
												<?php invoice("2017-02-31"); ?>	
											</td>
											<td>
												<?php invoice("2017-03-31"); ?>
											</td>
											<td>
												<?php invoice("2017-04-31"); ?>
											</td>
											<td>
												<?php invoice("2017-05-31"); ?>
											</td>
											<td>
												<?php invoice("2017-06-31"); ?>	
											</td>
											<td>
												<?php invoice("2017-07-31"); ?>
											</td>
											<td>
												<?php invoice("2017-08-31"); ?>
											</td>
											<td>
												<?php invoice("2017-09-31"); ?>
											</td>
											<td>
												<?php invoice("2017-10-31"); ?>	
											</td>
											<td>
												<?php invoice("2017-11-31"); ?>
											</td>
											<td>
												<?php invoice("2017-12-31"); ?>
											</td>
											<td>
												<?php invoice2("31","2017"); ?>
											</td>
										</tr>
										<tr>
											<td>
												Total
											</td>
											<td>
												<?php invoice3("01", "2017"); ?>
											</td>
											<td>
												<?php invoice3("02", "2017"); ?>	
											</td>
											<td>
												<?php invoice3("03", "2017"); ?>
											</td>
											<td>
												<?php invoice3("04", "2017"); ?>
											</td>
											<td>
												<?php invoice3("05", "2017"); ?>
											</td>
											<td>
												<?php invoice3("06", "2017"); ?>	
											</td>
											<td>
												<?php invoice3("07", "2017"); ?>
											</td>
											<td>
												<?php invoice3("08", "2017"); ?>
											</td>
											<td>
												<?php invoice3("09", "2017"); ?>
											</td>
											<td>
												<?php invoice3("10", "2017"); ?>	
											</td>
											<td>
												<?php invoice3("11", "2017"); ?>
											</td>
											<td>
												<?php invoice3("12", "2017"); ?>
											</td>
											<td>
												<?php invoice4("2017"); ?>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<!-- END SAMPLE TABLE PORTLET-->
					<div class="modal fade bs-modal-lg" id="fine-d" tabindex="-1" role="dialog" aria-hidden="true">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">


        </div>
    </div>
</div>
<div class="modal fade bs-modal-lg" id="leaves-d" tabindex="-1" role="dialog" aria-hidden="true">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">


        </div>
    </div>
</div>
				</div>
			</div>
			<!-- END PAGE CONTENT INNER -->
		</div>
	</div>
	<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->
<?php echo $fot; ?>
<script>
$('.fine').click(function(){
    var famID=$(this).attr('data-id');
    var famMonth=$(this).attr('data-month');
    var famYear=$(this).attr('data-year');
    var famType=$(this).attr('data-type');
    var famName=$(this).attr('data-name');

    $.ajax({url:"salary-fine-details.php?famID="+famID+"&famMonth="+famMonth+"&famYear="+famYear+"&famType="+famType+"&famName="+famName,cache:false,success:function(result){
        $(".modal-content").html(result);
    }});
});
$('.leaves').click(function(){
    var famID=$(this).attr('data-id');
    var famMonth=$(this).attr('data-month');
    var famYear=$(this).attr('data-year');
    var famAmu=$(this).attr('data-amu');

    $.ajax({url:"salary-leaves-details.php?famID="+famID+"&famMonth="+famMonth+"&famYear="+famYear+"&famAmu="+famAmu,cache:false,success:function(result){
        $(".modal-content").html(result);
    }});
});
</script>