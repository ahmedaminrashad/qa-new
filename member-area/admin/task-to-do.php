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
   require ("../includes/dbconnection.php");
  include("header.php");
?>
<?php
function abc($er)
{
date_default_timezone_set($er);
$date = date('h:i a', time());
echo $date;
}
?>
<?php
date_default_timezone_set("Africa/Cairo");
$sy = date('Y-m-d');
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
				<h1>Tasks<small> To Do</small></h1>

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
					 List of Parent Accounts
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN SAMPLE TABLE PORTLET-->
					<div class="portlet light">
					<h4><?php 
$result = mysql_query("SELECT * FROM account WHERE active = 1 OR active = 5 OR active = 11 OR active = 7");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
echo "Total Number of Accounts: $numberOfRows"; ?></h4>
						<div class="portlet-title">

															<a href="parent-accounts" class="btn blue"><i class="fa fa-user"></i> Active Accounts <b>(No. <?php 
$result = mysql_query("SELECT * FROM account WHERE active = 1 OR active = 5 OR active = 11 OR active = 7");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
echo $numberOfRows; ?>)</b></a>
															<a href="parent-accounts-left" class="btn red"><i class="fa fa-user-times"></i> Deactivated Accounts <b>(No. <?php 
$result = mysql_query("SELECT * FROM account WHERE active = 3");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
echo $numberOfRows; ?>)</b></a>
															<a href="parent-accounts-on-trial" class="btn yellow"><i class="fa fa-clock-o"></i> Accounts On Trial <b>(No. <?php 
$result = mysql_query("SELECT * FROM account WHERE active = 11");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
echo $numberOfRows; ?>)</b></a>
															<a href="parent-accounts-on-leave" class="btn green"><i class="fa fa-clock-o"></i> Accounts On Leave <b>(No. <?php 
$result = mysql_query("SELECT * FROM account WHERE active = 7");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
echo $numberOfRows; ?>)</b></a>
						</div>
											<!-- BEGIN TODO CONTENT -->
					<div class="todo-content">
						<div class="portlet light">
							<!-- PROJECT HEAD -->
							<div class="portlet-title">
								<div class="caption">
									<i class="icon-bar-chart font-green-sharp hide"></i>
									<span class="caption-helper">PROJECT:</span> &nbsp; <span class="caption-subject font-green-sharp bold uppercase">Tune Website</span>
								</div>
								<div class="actions">
									<div class="btn-group">
										<a class="btn green-haze btn-circle btn-sm" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
										MANAGE <i class="fa fa-angle-down"></i>
										</a>
										<ul class="dropdown-menu pull-right">
											<li>
												<a href="javascript:;">
												<i class="i"></i> New Task </a>
											</li>
											<li class="divider">
											</li>
											<li>
												<a href="javascript:;">
												Pending <span class="badge badge-danger">
												4 </span>
												</a>
											</li>
											<li>
												<a href="javascript:;">
												Completed <span class="badge badge-success">
												12 </span>
												</a>
											</li>
											<li>
												<a href="javascript:;">
												Overdue <span class="badge badge-warning">
												9 </span>
												</a>
											</li>
											<li class="divider">
											</li>
											<li>
												<a href="javascript:;">
												<i class="i"></i> Delete Project </a>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<!-- end PROJECT HEAD -->
							<div class="portlet-body">
								<div class="row">
									<div class="col-md-5 col-sm-4">
										<div class="scroller" style="max-height: 800px;" data-always-visible="0" data-rail-visible="0" data-handle-color="#dae3e7">
											<div class="todo-tasklist">
												<div class="todo-tasklist-item todo-tasklist-item-border-green">
													<img class="todo-userpic pull-left" src="../../assets/admin/layout/img/avatar4.jpg" width="27px" height="27px">
													<div class="todo-tasklist-item-title">
														 Slider Redesign
													</div>
													<div class="todo-tasklist-item-text">
														 Lorem dolor sit amet ipsum dolor sit consectetuer dolore.
													</div>
												</div>
											</div>
										</div>
									</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- END TODO CONTENT -->
				</div>
			</div>
			<!-- END PAGE CONTENT INNER -->
		</div>
	</div>
	<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->
<script type="text/javascript" src="../assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="../assets/global/plugins/select2/select2.min.js"></script>
<script src="../assets/admin/pages/scripts/todo.js" type="text/javascript"></script>
<?php echo $fot; ?>