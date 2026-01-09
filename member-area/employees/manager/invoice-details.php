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
  include("../includes/session.php");
  include("../includes/manager_rights.php");
  require ("../includes/dbconnection.php");
  include("header.php");
date_default_timezone_set("Asia/Karachi");
$date = date('d/m/Y', time());
?>
<?php
date_default_timezone_set("Asia/Karachi");
$mon = date('F');
if($mon== "January") 
        {
            $m = 1;
        }
    elseif($mon== "February")
        {
            $m = 2;
        } 
    elseif($mon== "March") 
        {
            $m = 3;
        } 
    elseif($mon== "April")
        {
            $m = 4;
        } 
    elseif($mon== "May")
        {
            $m = 5;
        } 
    elseif($mon== "June") 
        {
            $m = 6;
        } 
    elseif($mon== "July")
        {
            $m = 7;
        } 
    elseif($mon== "August") 
        {
            $m = 8;
        } 
    elseif($mon== "September")
        {
            $m = 9;
        } 
    elseif($mon== "October")
        {
            $m = 10;
        } 
    elseif($mon== "November") 
        {
            $m = 11;
        }
    else 
        {
    // Since it is not any of the days above it must be Saturday
            $m = 12;
        }
?>
<?php
date_default_timezone_set("Asia/Karachi");
$sy = date('Y');
if($sy == "2014") 
        {
            $y = 1;
        }
    elseif($sy == "2015")
        {
           $y = 2;
        } 
    elseif($sy == "2016") 
        {
            $y = 3;
        }
    elseif($sy == "2017") 
        {
            $y = 4;
        } 
    elseif($sy == "2018") 
        {
            $y = 5;
        }
    elseif($sy == "2019") 
        {
            $y = 6;
        }
    elseif($sy == "2020") 
        {
            $y = 7;
        }
$py=$y-1;
?>
<?php
date_default_timezone_set("Asia/Karachi");
$syyw = date('Y-m-d');
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
				<h1>Invoice Details<small> <?php $result = mysql_query("SELECT * FROM school_yr WHERE year_id = $y");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
$pidm = MYSQL_RESULT($result,$i,"school_year");
echo $pidm;?></small></h1>
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
					 Invoice Records<i class="fa fa-circle"></i>
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="row">
				<div class="col-md-6">
					<!-- Begin: life time stats -->
					<div class="portlet light">
						<div class="portlet-title">
							<div class="caption">
								<i class="icon-bar-chart font-green-sharp"></i>
								<span class="caption-helper">INVOICE DETAILS FOR THE YEAR</span>
								<span class="caption-subject font-green-sharp bold uppercase"><?php $result = mysql_query("SELECT * FROM school_yr WHERE year_id = $y");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
$pidm = MYSQL_RESULT($result,$i,"school_year");
echo $pidm ?></span>
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="#portlet-config" data-toggle="modal" class="config">
								</a>
								<a href="javascript:;" class="reload">
								</a>
								<a href="javascript:;" class="remove">
								</a>
							</div>
						</div>
						<div class="portlet-body">
							<div class="tabbable-line">
								<ul class="nav nav-tabs">
									<li class="active">
										<a href="#overview_1" data-toggle="tab">
										Dollars </a>
									</li>
									<li>
										<a href="#overview_2" data-toggle="tab">
										Pounds </a>
									</li>
									<li>
										<a href="#overview_3" data-toggle="tab">
										Euro </a>
									</li>
									<li>
										<a href="#overview_4" data-toggle="tab">
										Rupees </a>
									</li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane active" id="overview_1">
										<div class="table-responsive">
											<table class="table table-hover table-light">
											<thead>
											<tr class="uppercase">
												<th>
													Month
												</th>
												<th>
													 Remaining
												</th>
											</tr>
											</thead>
											<tbody>
											<tr>
												<td>
													<a href="pending-invoices?stu=1&mon=1&year=<?php echo $y; ?>&cur=1&currency_name=$">
													January</a>
												</td>
												<td>
													 <a href="pending-invoices?mon=1&stu=1&year=<?php echo $y; ?>&cur=1&currency_name=$">Click to check pending invoices</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="pending-invoices?stu=1&mon=2&year=<?php echo $y; ?>&cur=1&currency_name=$">
													February</a>
												</td>
												<td>
													 <a href="pending-invoices?mon=2&stu=1&year=<?php echo $y; ?>&cur=1&currency_name=$">Click to check pending invoices</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="pending-invoices?stu=1&mon=3&year=<?php echo $y; ?>&cur=1&currency_name=$">
													March</a>
												</td>
												<td>
													 <a href="pending-invoices?mon=3&stu=1&year=<?php echo $y; ?>&cur=1&currency_name=$">Click to check pending invoices</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="pending-invoices?stu=1&mon=4&year=<?php echo $y; ?>&cur=1&currency_name=$">
													April</a>
												</td>
												<td>
													 <a href="pending-invoices?mon=4&stu=1&year=<?php echo $y; ?>&cur=1&currency_name=$">Click to check pending invoices</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="pending-invoices?stu=1&mon=5&year=<?php echo $y; ?>&cur=1&currency_name=$">
													May</a>
												</td>
												<td>
													 <a href="pending-invoices?mon=5&stu=1&year=<?php echo $y; ?>&cur=1&currency_name=$">Click to check pending invoices</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="pending-invoices?stu=1&mon=6&year=<?php echo $y; ?>&cur=1&currency_name=$">
													June</a>
												</td>
												<td>
													 <a href="pending-invoices?mon=6&stu=1&year=<?php echo $y; ?>&cur=1&currency_name=$">Click to check pending invoices</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="pending-invoices?stu=1&mon=7&year=<?php echo $y; ?>&cur=1&currency_name=$">
													July</a>
												</td>
												<td>
													 <a href="pending-invoices?mon=7&stu=1&year=<?php echo $y; ?>&cur=1&currency_name=$">Click to check pending invoices</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="pending-invoices?stu=1&mon=8&year=<?php echo $y; ?>&cur=1&currency_name=$">
													August</a>
												</td>
												<td>
													 <a href="pending-invoices?mon=8&stu=1&year=<?php echo $y; ?>&cur=1&currency_name=$">Click to check pending invoices</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="pending-invoices?stu=1&mon=9&year=<?php echo $y; ?>&cur=1&currency_name=$">
													September</a>
												</td>
												<td>
													 <a href="pending-invoices?mon=9&stu=1&year=<?php echo $y; ?>&cur=1&currency_name=$">Click to check pending invoices</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="pending-invoices?stu=1&mon=10&year=<?php echo $y; ?>&cur=1&currency_name=$">
													October</a>
												</td>
												<td>
													 <a href="pending-invoices?mon=10&stu=1&year=<?php echo $y; ?>&cur=1&currency_name=$">Click to check pending invoices</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="pending-invoices?stu=1&mon=11&year=<?php echo $y; ?>&cur=1&currency_name=$">
													November</a>
												</td>
												<td>
													 <a href="pending-invoices?mon=11&stu=1&year=<?php echo $y; ?>&cur=1&currency_name=$">Click to check pending invoices</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="pending-invoices?stu=1&mon=12&year=<?php echo $y; ?>&cur=1&currency_name=$">
													December</a>
												</td>
												<td>
													 <a href="pending-invoices?mon=12&stu=1&year=<?php echo $y; ?>&cur=1&currency_name=$">Click to check pending invoices</a>
												</td>
											</tr>
											</tbody>
											</table>
										</div>
									</div>
									<div class="tab-pane" id="overview_2">
										<div class="table-responsive">
											<table class="table table-hover table-light">
											<thead>
											<tr class="uppercase">
												<th>
													Month
												</th>
												<th>
													 Remaining
												</th>
											</tr>
											</thead>
											<tbody>
											<tr>
												<td>
													<a href="pending-invoices?stu=1&mon=1&year=<?php echo $y; ?>&cur=2&currency_name=&pound;">
													January</a>
												</td>
												<td>
													 <a href="pending-invoices?mon=1&stu=1&year=<?php echo $y; ?>&cur=2&currency_name=&pound;">Click to check pending invoices</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="pending-invoices?stu=1&mon=2&year=<?php echo $y; ?>&cur=2&currency_name=&pound;">
													February</a>
												</td>
												<td>
													 <a href="pending-invoices?mon=2&stu=1&year=<?php echo $y; ?>&cur=2&currency_name=&pound;">Click to check pending invoices</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="pending-invoices?stu=1&mon=3&year=<?php echo $y; ?>&cur=2&currency_name=&pound;">
													March</a>
												</td>
												<td>
													 <a href="pending-invoices?mon=3&stu=1&year=<?php echo $y; ?>&cur=2&currency_name=&pound;">Click to check pending invoices</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="pending-invoices?stu=1&mon=4&year=<?php echo $y; ?>&cur=2&currency_name=&pound;">
													April</a>
												</td>
												<td>
													 <a href="pending-invoices?mon=4&stu=1&year=<?php echo $y; ?>&cur=2&currency_name=&pound;">Click to check pending invoices</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="pending-invoices?stu=1&mon=5&year=<?php echo $y; ?>&cur=2&currency_name=&pound;">
													May</a>
												</td>
												<td>
													 <a href="pending-invoices?mon=5&stu=1&year=<?php echo $y; ?>&cur=2&currency_name=&pound;">Click to check pending invoices</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="pending-invoices?stu=1&mon=6&year=<?php echo $y; ?>&cur=2&currency_name=&pound;">
													June</a>
												</td>
												<td>
													 <a href="pending-invoices?mon=6&stu=1&year=<?php echo $y; ?>&cur=2&currency_name=&pound;">Click to check pending invoices</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="pending-invoices?stu=1&mon=7&year=<?php echo $y; ?>&cur=2&currency_name=&pound;">
													July</a>
												</td>
												<td>
													 <a href="pending-invoices?mon=7&stu=1&year=<?php echo $y; ?>&cur=2&currency_name=&pound;">Click to check pending invoices</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="pending-invoices?stu=1&mon=8&year=<?php echo $y; ?>&cur=2&currency_name=&pound;">
													August</a>
												</td>
												<td>
													 <a href="pending-invoices?mon=8&stu=1&year=<?php echo $y; ?>&cur=2&currency_name=&pound;">Click to check pending invoices</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="pending-invoices?stu=1&mon=9&year=<?php echo $y; ?>&cur=2&currency_name=&pound;">
													September</a>
												</td>
												<td>
													 <a href="pending-invoices?mon=9&stu=1&year=<?php echo $y; ?>&cur=2&currency_name=&pound;">Click to check pending invoices</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="pending-invoices?stu=1&mon=10&year=<?php echo $y; ?>&cur=2&currency_name=&pound;">
													October</a>
												</td>
												<td>
													 <a href="pending-invoices?mon=10&stu=1&year=<?php echo $y; ?>&cur=2&currency_name=&pound;">Click to check pending invoices</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="pending-invoices?stu=1&mon=11&year=<?php echo $y; ?>&cur=2&currency_name=&pound;">
													November</a>
												</td>
												<td>
													 <a href="pending-invoices?mon=11&stu=1&year=<?php echo $y; ?>&cur=2&currency_name=&pound;">Click to check pending invoices</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="pending-invoices?stu=1&mon=12&year=<?php echo $y; ?>&cur=2&currency_name=&pound;">
													December</a>
												</td>
												<td>
													 <a href="pending-invoices?mon=12&stu=1&year=<?php echo $y; ?>&cur=2&currency_name=&pound;">Click to check pending invoices</a>
												</td>
											</tr>
											</tbody>
											</table>
										</div>
									</div>
									<div class="tab-pane" id="overview_3">
										<div class="table-responsive">
											<table class="table table-hover table-light">
											<thead>
											<tr class="uppercase">
												<th>
													Month
												</th>
												<th>
													 Remaining
												</th>
											</tr>
											</thead>
											<tbody>
											<tr>
												<td>
													<a href="pending-invoices?stu=1&mon=1&year=<?php echo $y; ?>&cur=3&currency_name=&euro;">
													January</a>
												</td>
												<td>
													 <a href="pending-invoices?mon=1&stu=1&year=<?php echo $y; ?>&cur=3&currency_name=&euro;">Click to check pending invoices</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="pending-invoices?stu=1&mon=2&year=<?php echo $y; ?>&cur=3&currency_name=&euro;">
													February</a>
												</td>
												<td>
													 <a href="pending-invoices?mon=2&stu=1&year=<?php echo $y; ?>&cur=3&currency_name=&euro;">Click to check pending invoices</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="pending-invoices?stu=1&mon=3&year=<?php echo $y; ?>&cur=3&currency_name=&euro;">
													March</a>
												</td>
												<td>
													 <a href="pending-invoices?mon=3&stu=1&year=<?php echo $y; ?>&cur=3&currency_name=&euro;">Click to check pending invoices</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="pending-invoices?stu=1&mon=4&year=<?php echo $y; ?>&cur=3&currency_name=&euro;">
													April</a>
												</td>
												<td>
													 <a href="pending-invoices?mon=4&stu=1&year=<?php echo $y; ?>&cur=3&currency_name=&euro;">Click to check pending invoices</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="pending-invoices?stu=1&mon=5&year=<?php echo $y; ?>&cur=3&currency_name=&euro;">
													May</a>
												</td>
												<td>
													 <a href="pending-invoices?mon=5&stu=1&year=<?php echo $y; ?>&cur=3&currency_name=&euro;">Click to check pending invoices</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="pending-invoices?stu=1&mon=6&year=<?php echo $y; ?>&cur=3&currency_name=&euro;">
													June</a>
												</td>
												<td>
													 <a href="pending-invoices?mon=6&stu=1&year=<?php echo $y; ?>&cur=3&currency_name=&euro;">Click to check pending invoices</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="pending-invoices?stu=1&mon=7&year=<?php echo $y; ?>&cur=3&currency_name=&euro;">
													July</a>
												</td>
												<td>
													 <a href="pending-invoices?mon=7&stu=1&year=<?php echo $y; ?>&cur=3&currency_name=&euro;">Click to check pending invoices</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="pending-invoices?stu=1&mon=8&year=<?php echo $y; ?>&cur=3&currency_name=&euro;">
													August</a>
												</td>
												<td>
													 <a href="pending-invoices?mon=8&stu=1&year=<?php echo $y; ?>&cur=3&currency_name=&euro;">Click to check pending invoices</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="pending-invoices?stu=1&mon=9&year=<?php echo $y; ?>&cur=3&currency_name=&euro;">
													September</a>
												</td>
												<td>
													 <a href="pending-invoices?mon=9&stu=1&year=<?php echo $y; ?>&cur=3&currency_name=&euro;">Click to check pending invoices</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="pending-invoices?stu=1&mon=10&year=<?php echo $y; ?>&cur=3&currency_name=&euro;">
													October</a>
												</td>
												<td>
													 <a href="pending-invoices?mon=10&stu=1&year=<?php echo $y; ?>&cur=3&currency_name=&euro;">Click to check pending invoices</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="pending-invoices?stu=1&mon=11&year=<?php echo $y; ?>&cur=3&currency_name=&euro;">
													November</a>
												</td>
												<td>
													 <a href="pending-invoices?mon=11&stu=1&year=<?php echo $y; ?>&cur=3&currency_name=&euro;">Click to check pending invoices</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="pending-invoices?stu=1&mon=12&year=<?php echo $y; ?>&cur=3&currency_name=&euro;">
													December</a>
												</td>
												<td>
													 <a href="pending-invoices?mon=12&stu=1&year=<?php echo $y; ?>&cur=3&currency_name=&euro;">Click to check pending invoices</a>
												</td>
											</tr>
											</tbody>
											</table>
										</div>
									</div>
									<div class="tab-pane" id="overview_4">
										<div class="table-responsive">
											<table class="table table-hover table-light">
											<thead>
											<tr class="uppercase">
												<th>
													Month
												</th>
												<th>
													 Remaining
												</th>
											</tr>
											</thead>
											<tbody>
											<tr>
												<td>
													<a href="pending-invoices?stu=1&mon=1&year=<?php echo $y; ?>&cur=4&currency_name=Rs.">
													January</a>
												</td>
												<td>
													 <a href="pending-invoices?mon=1&stu=1&year=<?php echo $y; ?>&cur=4&currency_name=Rs.">Click to check pending invoices</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="pending-invoices?stu=1&mon=2&year=<?php echo $y; ?>&cur=4&currency_name=Rs.">
													February</a>
												</td>
												<td>
													 <a href="pending-invoices?mon=2&stu=1&year=<?php echo $y; ?>&cur=4&currency_name=Rs.">Click to check pending invoices</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="pending-invoices?stu=1&mon=3&year=<?php echo $y; ?>&cur=4&currency_name=Rs.">
													March</a>
												</td>
												<td>
													 <a href="pending-invoices?mon=3&stu=1&year=<?php echo $y; ?>&cur=4&currency_name=Rs.">Click to check pending invoices</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="pending-invoices?stu=1&mon=4&year=<?php echo $y; ?>&cur=4&currency_name=Rs.">
													April</a>
												</td>
												<td>
													 <a href="pending-invoices?mon=4&stu=1&year=<?php echo $y; ?>&cur=4&currency_name=Rs.">Click to check pending invoices</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="pending-invoices?stu=1&mon=5&year=<?php echo $y; ?>&cur=4&currency_name=Rs.">
													May</a>
												</td>
												<td>
													 <a href="pending-invoices?mon=5&stu=1&year=<?php echo $y; ?>&cur=4&currency_name=Rs.">Click to check pending invoices</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="pending-invoices?stu=1&mon=6&year=<?php echo $y; ?>&cur=4&currency_name=Rs.">
													June</a>
												</td>
												<td>
													 <a href="pending-invoices?mon=6&stu=1&year=<?php echo $y; ?>&cur=4&currency_name=Rs.">Click to check pending invoices</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="pending-invoices?stu=1&mon=7&year=<?php echo $y; ?>&cur=4&currency_name=Rs.">
													July</a>
												</td>
												<td>
													 <a href="pending-invoices?mon=7&stu=1&year=<?php echo $y; ?>&cur=4&currency_name=Rs.">Click to check pending invoices</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="pending-invoices?stu=1&mon=8&year=<?php echo $y; ?>&cur=4&currency_name=Rs.">
													August</a>
												</td>
												<td>
													 <a href="pending-invoices?mon=8&stu=1&year=<?php echo $y; ?>&cur=4&currency_name=Rs.">Click to check pending invoices</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="pending-invoices?stu=1&mon=9&year=<?php echo $y; ?>&cur=4&currency_name=Rs.">
													September</a>
												</td>
												<td>
													 <a href="pending-invoices?mon=9&stu=1&year=<?php echo $y; ?>&cur=4&currency_name=Rs.">Click to check pending invoices</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="pending-invoices?stu=1&mon=10&year=<?php echo $y; ?>&cur=4&currency_name=Rs.">
													October</a>
												</td>
												<td>
													 <a href="pending-invoices?mon=10&stu=1&year=<?php echo $y; ?>&cur=4&currency_name=Rs.">Click to check pending invoices</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="pending-invoices?stu=1&mon=11&year=<?php echo $y; ?>&cur=4&currency_name=Rs.">
													November</a>
												</td>
												<td>
													 <a href="pending-invoices?mon=11&stu=1&year=<?php echo $y; ?>&cur=4&currency_name=Rs.">Click to check pending invoices</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="pending-invoices?stu=1&mon=12&year=<?php echo $y; ?>&cur=4&currency_name=Rs.">
													December</a>
												</td>
												<td>
													 <a href="pending-invoices?mon=12&stu=1&year=<?php echo $y; ?>&cur=4&currency_name=Rs.">Click to check pending invoices</a>
												</td>
											</tr>
											</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- End: life time stats -->
				</div>
				<div class="col-md-6">
					<!-- Begin: life time stats -->
					<div class="portlet light">
						<div class="portlet-title">
							<div class="caption">
								<i class="icon-bar-chart font-green-sharp"></i>
								<span class="caption-helper">INVOICE DETAILS FOR THE YEAR</span>
								<span class="caption-subject font-green-sharp bold uppercase"><?php $result = mysql_query("SELECT * FROM school_yr WHERE year_id = $py");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
$pidm = MYSQL_RESULT($result,$i,"school_year");
echo $pidm ?></span>
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="#portlet-config" data-toggle="modal" class="config">
								</a>
								<a href="javascript:;" class="reload">
								</a>
								<a href="javascript:;" class="remove">
								</a>
							</div>
						</div>
						<div class="portlet-body">
							<div class="tabbable-line">
								<ul class="nav nav-tabs">
									<li class="active">
										<a href="#overview_5" data-toggle="tab">
										Dollars </a>
									</li>
									<li>
										<a href="#overview_6" data-toggle="tab">
										Pounds </a>
									</li>
									<li>
										<a href="#overview_7" data-toggle="tab">
										Euro </a>
									</li>
									<li>
										<a href="#overview_8" data-toggle="tab">
										Rupees </a>
									</li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane active" id="overview_5">
										<div class="table-responsive">
											<table class="table table-hover table-light">
											<thead>
											<tr class="uppercase">
												<th>
													Month
												</th>
												<th>
													 Remaining
												</th>
											</tr>
											</thead>
											<tbody>
											<tr>
												<td>
													<a href="pending-invoices?stu=1&mon=1&year=<?php echo $py; ?>&cur=1&currency_name=$">
													January</a>
												</td>
												<td>
													 <a href="pending-invoices?mon=1&stu=1&year=<?php echo $py; ?>&cur=1&currency_name=$">Click to check pending invoices</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="pending-invoices?stu=1&mon=2&year=<?php echo $py; ?>&cur=1&currency_name=$">
													February</a>
												</td>
												<td>
													 <a href="pending-invoices?mon=2&stu=1&year=<?php echo $py; ?>&cur=1&currency_name=$">Click to check pending invoices</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="pending-invoices?stu=1&mon=3&year=<?php echo $py; ?>&cur=1&currency_name=$">
													March</a>
												</td>
												<td>
													 <a href="pending-invoices?mon=3&stu=1&year=<?php echo $py; ?>&cur=1&currency_name=$">Click to check pending invoices</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="pending-invoices?stu=1&mon=4&year=<?php echo $py; ?>&cur=1&currency_name=$">
													April</a>
												</td>
												<td>
													 <a href="pending-invoices?mon=4&stu=1&year=<?php echo $py; ?>&cur=1&currency_name=$">Click to check pending invoices</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="pending-invoices?stu=1&mon=5&year=<?php echo $py; ?>&cur=1&currency_name=$">
													May</a>
												</td>
												<td>
													 <a href="pending-invoices?mon=5&stu=1&year=<?php echo $py; ?>&cur=1&currency_name=$">Click to check pending invoices</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="pending-invoices?stu=1&mon=6&year=<?php echo $py; ?>&cur=1&currency_name=$">
													June</a>
												</td>
												<td>
													 <a href="pending-invoices?mon=6&stu=1&year=<?php echo $py; ?>&cur=1&currency_name=$">Click to check pending invoices</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="pending-invoices?stu=1&mon=7&year=<?php echo $py; ?>&cur=1&currency_name=$">
													July</a>
												</td>
												<td>
													 <a href="pending-invoices?mon=7&stu=1&year=<?php echo $py; ?>&cur=1&currency_name=$">Click to check pending invoices</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="pending-invoices?stu=1&mon=8&year=<?php echo $py; ?>&cur=1&currency_name=$">
													August</a>
												</td>
												<td>
													 <a href="pending-invoices?mon=8&stu=1&year=<?php echo $py; ?>&cur=1&currency_name=$">Click to check pending invoices</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="pending-invoices?stu=1&mon=9&year=<?php echo $py; ?>&cur=1&currency_name=$">
													September</a>
												</td>
												<td>
													 <a href="pending-invoices?mon=9&stu=1&year=<?php echo $py; ?>&cur=1&currency_name=$">Click to check pending invoices</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="pending-invoices?stu=1&mon=10&year=<?php echo $py; ?>&cur=1&currency_name=$">
													October</a>
												</td>
												<td>
													 <a href="pending-invoices?mon=10&stu=1&year=<?php echo $py; ?>&cur=1&currency_name=$">Click to check pending invoices</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="pending-invoices?stu=1&mon=11&year=<?php echo $py; ?>&cur=1&currency_name=$">
													November</a>
												</td>
												<td>
													 <a href="pending-invoices?mon=11&stu=1&year=<?php echo $py; ?>&cur=1&currency_name=$">Click to check pending invoices</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="pending-invoices?stu=1&mon=12&year=<?php echo $py; ?>&cur=1&currency_name=$">
													December</a>
												</td>
												<td>
													 <a href="pending-invoices?mon=12&stu=1&year=<?php echo $py; ?>&cur=1&currency_name=$">Click to check pending invoices</a>
												</td>
											</tr>
											</tbody>
											</table>
										</div>
									</div>
									<div class="tab-pane" id="overview_6">
										<div class="table-responsive">
											<table class="table table-hover table-light">
											<thead>
											<tr class="uppercase">
												<th>
													Month
												</th>
												<th>
													 Remaining
												</th>
											</tr>
											</thead>
											<tbody>
											<tr>
												<td>
													<a href="pending-invoices?stu=1&mon=1&year=<?php echo $py; ?>&cur=2&currency_name=&pound;">
													January</a>
												</td>
												<td>
													 <a href="pending-invoices?mon=1&stu=1&year=<?php echo $py; ?>&cur=2&currency_name=&pound;">Click to check pending invoices</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="pending-invoices?stu=1&mon=2&year=<?php echo $py; ?>&cur=2&currency_name=&pound;">
													February</a>
												</td>
												<td>
													 <a href="pending-invoices?mon=2&stu=1&year=<?php echo $py; ?>&cur=2&currency_name=&pound;">Click to check pending invoices</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="pending-invoices?stu=1&mon=3&year=<?php echo $py; ?>&cur=2&currency_name=&pound;">
													March</a>
												</td>
												<td>
													 <a href="pending-invoices?mon=3&stu=1&year=<?php echo $py; ?>&cur=2&currency_name=&pound;">Click to check pending invoices</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="pending-invoices?stu=1&mon=4&year=<?php echo $py; ?>&cur=2&currency_name=&pound;">
													April</a>
												</td>
												<td>
													 <a href="pending-invoices?mon=4&stu=1&year=<?php echo $py; ?>&cur=2&currency_name=&pound;">Click to check pending invoices</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="pending-invoices?stu=1&mon=5&year=<?php echo $py; ?>&cur=2&currency_name=&pound;">
													May</a>
												</td>
												<td>
													 <a href="pending-invoices?mon=5&stu=1&year=<?php echo $py; ?>&cur=2&currency_name=&pound;">Click to check pending invoices</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="pending-invoices?stu=1&mon=6&year=<?php echo $py; ?>&cur=2&currency_name=&pound;">
													June</a>
												</td>
												<td>
													 <a href="pending-invoices?mon=6&stu=1&year=<?php echo $py; ?>&cur=2&currency_name=&pound;">Click to check pending invoices</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="pending-invoices?stu=1&mon=7&year=<?php echo $py; ?>&cur=2&currency_name=&pound;">
													July</a>
												</td>
												<td>
													 <a href="pending-invoices?mon=7&stu=1&year=<?php echo $py; ?>&cur=2&currency_name=&pound;">Click to check pending invoices</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="pending-invoices?stu=1&mon=8&year=<?php echo $py; ?>&cur=2&currency_name=&pound;">
													August</a>
												</td>
												<td>
													 <a href="pending-invoices?mon=8&stu=1&year=<?php echo $py; ?>&cur=2&currency_name=&pound;">Click to check pending invoices</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="pending-invoices?stu=1&mon=9&year=<?php echo $py; ?>&cur=2&currency_name=&pound;">
													September</a>
												</td>
												<td>
													 <a href="pending-invoices?mon=9&stu=1&year=<?php echo $py; ?>&cur=2&currency_name=&pound;">Click to check pending invoices</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="pending-invoices?stu=1&mon=10&year=<?php echo $py; ?>&cur=2&currency_name=&pound;">
													October</a>
												</td>
												<td>
													 <a href="pending-invoices?mon=10&stu=1&year=<?php echo $py; ?>&cur=2&currency_name=&pound;">Click to check pending invoices</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="pending-invoices?stu=1&mon=11&year=<?php echo $py; ?>&cur=2&currency_name=&pound;">
													November</a>
												</td>
												<td>
													 <a href="pending-invoices?mon=11&stu=1&year=<?php echo $py; ?>&cur=2&currency_name=&pound;">Click to check pending invoices</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="pending-invoices?stu=1&mon=12&year=<?php echo $py; ?>&cur=2&currency_name=&pound;">
													December</a>
												</td>
												<td>
													 <a href="pending-invoices?mon=12&stu=1&year=<?php echo $py; ?>&cur=2&currency_name=&pound;">Click to check pending invoices</a>
												</td>
											</tr>
											</tbody>
											</table>
										</div>
									</div>
									<div class="tab-pane" id="overview_7">
										<div class="table-responsive">
											<table class="table table-hover table-light">
											<thead>
											<tr class="uppercase">
												<th>
													Month
												</th>
												<th>
													 Remaining
												</th>
											</tr>
											</thead>
											<tbody>
											<tr>
												<td>
													<a href="pending-invoices?stu=1&mon=1&year=<?php echo $py; ?>&cur=3&currency_name=&euro;">
													January</a>
												</td>
												<td>
													 <a href="pending-invoices?mon=1&stu=1&year=<?php echo $py; ?>&cur=3&currency_name=&euro;">Click to check pending invoices</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="pending-invoices?stu=1&mon=2&year=<?php echo $py; ?>&cur=3&currency_name=&euro;">
													February</a>
												</td>
												<td>
													 <a href="pending-invoices?mon=2&stu=1&year=<?php echo $py; ?>&cur=3&currency_name=&euro;">Click to check pending invoices</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="pending-invoices?stu=1&mon=3&year=<?php echo $py; ?>&cur=3&currency_name=&euro;">
													March</a>
												</td>
												<td>
													 <a href="pending-invoices?mon=3&stu=1&year=<?php echo $py; ?>&cur=3&currency_name=&euro;">Click to check pending invoices</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="pending-invoices?stu=1&mon=4&year=<?php echo $py; ?>&cur=3&currency_name=&euro;">
													April</a>
												</td>
												<td>
													 <a href="pending-invoices?mon=4&stu=1&year=<?php echo $py; ?>&cur=3&currency_name=&euro;">Click to check pending invoices</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="pending-invoices?stu=1&mon=5&year=<?php echo $py; ?>&cur=3&currency_name=&euro;">
													May</a>
												</td>
												<td>
													 <a href="pending-invoices?mon=5&stu=1&year=<?php echo $py; ?>&cur=3&currency_name=&euro;">Click to check pending invoices</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="pending-invoices?stu=1&mon=6&year=<?php echo $py; ?>&cur=3&currency_name=&euro;">
													June</a>
												</td>
												<td>
													 <a href="pending-invoices?mon=6&stu=1&year=<?php echo $py; ?>&cur=3&currency_name=&euro;">Click to check pending invoices</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="pending-invoices?stu=1&mon=7&year=<?php echo $py; ?>&cur=3&currency_name=&euro;">
													July</a>
												</td>
												<td>
													 <a href="pending-invoices?mon=7&stu=1&year=<?php echo $py; ?>&cur=3&currency_name=&euro;">Click to check pending invoices</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="pending-invoices?stu=1&mon=8&year=<?php echo $py; ?>&cur=3&currency_name=&euro;">
													August</a>
												</td>
												<td>
													 <a href="pending-invoices?mon=8&stu=1&year=<?php echo $py; ?>&cur=3&currency_name=&euro;">Click to check pending invoices</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="pending-invoices?stu=1&mon=9&year=<?php echo $py; ?>&cur=3&currency_name=&euro;">
													September</a>
												</td>
												<td>
													 <a href="pending-invoices?mon=9&stu=1&year=<?php echo $py; ?>&cur=3&currency_name=&euro;">Click to check pending invoices</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="pending-invoices?stu=1&mon=10&year=<?php echo $py; ?>&cur=3&currency_name=&euro;">
													October</a>
												</td>
												<td>
													 <a href="pending-invoices?mon=10&stu=1&year=<?php echo $py; ?>&cur=3&currency_name=&euro;">Click to check pending invoices</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="pending-invoices?stu=1&mon=11&year=<?php echo $py; ?>&cur=3&currency_name=&euro;">
													November</a>
												</td>
												<td>
													 <a href="pending-invoices?mon=11&stu=1&year=<?php echo $py; ?>&cur=3&currency_name=&euro;">Click to check pending invoices</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="pending-invoices?stu=1&mon=12&year=<?php echo $py; ?>&cur=3&currency_name=&euro;">
													December</a>
												</td>
												<td>
													 <a href="pending-invoices?mon=12&stu=1&year=<?php echo $py; ?>&cur=3&currency_name=&euro;">Click to check pending invoices</a>
												</td>
											</tr>
											</tbody>
											</table>
										</div>
									</div>
									<div class="tab-pane" id="overview_8">
										<div class="table-responsive">
											<table class="table table-hover table-light">
											<thead>
											<tr class="uppercase">
												<th>
													Month
												</th>
												<th>
													 Remaining
												</th>
											</tr>
											</thead>
											<tbody>
											<tr>
												<td>
													<a href="pending-invoices?stu=1&mon=1&year=<?php echo $py; ?>&cur=4&currency_name=Rs.">
													January</a>
												</td>
												<td>
													 <a href="pending-invoices?mon=1&stu=1&year=<?php echo $py; ?>&cur=4&currency_name=Rs.">Click to check pending invoices</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="pending-invoices?stu=1&mon=2&year=<?php echo $py; ?>&cur=4&currency_name=Rs.">
													February</a>
												</td>
												<td>
													 <a href="pending-invoices?mon=2&stu=1&year=<?php echo $py; ?>&cur=4&currency_name=Rs.">Click to check pending invoices</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="pending-invoices?stu=1&mon=3&year=<?php echo $py; ?>&cur=4&currency_name=Rs.">
													March</a>
												</td>
												<td>
													 <a href="pending-invoices?mon=3&stu=1&year=<?php echo $py; ?>&cur=4&currency_name=Rs.">Click to check pending invoices</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="pending-invoices?stu=1&mon=4&year=<?php echo $py; ?>&cur=4&currency_name=Rs.">
													April</a>
												</td>
												<td>
													 <a href="pending-invoices?mon=4&stu=1&year=<?php echo $py; ?>&cur=4&currency_name=Rs.">Click to check pending invoices</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="pending-invoices?stu=1&mon=5&year=<?php echo $py; ?>&cur=4&currency_name=Rs.">
													May</a>
												</td>
												<td>
													 <a href="pending-invoices?mon=5&stu=1&year=<?php echo $py; ?>&cur=4&currency_name=Rs.">Click to check pending invoices</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="pending-invoices?stu=1&mon=6&year=<?php echo $py; ?>&cur=4&currency_name=Rs.">
													June</a>
												</td>
												<td>
													 <a href="pending-invoices?mon=6&stu=1&year=<?php echo $py; ?>&cur=4&currency_name=Rs.">Click to check pending invoices</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="pending-invoices?stu=1&mon=7&year=<?php echo $py; ?>&cur=4&currency_name=Rs.">
													July</a>
												</td>
												<td>
													 <a href="pending-invoices?mon=7&stu=1&year=<?php echo $py; ?>&cur=4&currency_name=Rs.">Click to check pending invoices</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="pending-invoices?stu=1&mon=8&year=<?php echo $py; ?>&cur=4&currency_name=Rs.">
													August</a>
												</td>
												<td>
													 <a href="pending-invoices?mon=8&stu=1&year=<?php echo $py; ?>&cur=4&currency_name=Rs.">Click to check pending invoices</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="pending-invoices?stu=1&mon=9&year=<?php echo $py; ?>&cur=4&currency_name=Rs.">
													September</a>
												</td>
												<td>
													 <a href="pending-invoices?mon=9&stu=1&year=<?php echo $py; ?>&cur=4&currency_name=Rs.">Click to check pending invoices</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="pending-invoices?stu=1&mon=10&year=<?php echo $py; ?>&cur=4&currency_name=Rs.">
													October</a>
												</td>
												<td>
													 <a href="pending-invoices?mon=10&stu=1&year=<?php echo $py; ?>&cur=4&currency_name=Rs.">Click to check pending invoices</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="pending-invoices?stu=1&mon=11&year=<?php echo $py; ?>&cur=4&currency_name=Rs.">
													November</a>
												</td>
												<td>
													 <a href="pending-invoices?mon=11&stu=1&year=<?php echo $py; ?>&cur=4&currency_name=Rs.">Click to check pending invoices</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="pending-invoices?stu=1&mon=12&year=<?php echo $py; ?>&cur=4&currency_name=Rs.">
													December</a>
												</td>
												<td>
													 <a href="pending-invoices?mon=12&stu=1&year=<?php echo $py; ?>&cur=4&currency_name=Rs.">Click to check pending invoices</a>
												</td>
											</tr>
											</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- End: life time stats -->
				</div>
			</div>
			<!-- END PAGE CONTENT INNER -->
		</div>
	</div>
	<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->
<?php echo $fot; ?>