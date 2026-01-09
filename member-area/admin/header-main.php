<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ini_set('log_errors', 1);

include("../includes/main-var.php");
require_once("../includes/mysql-compat.php");
// Ensure TimeZoneCustome is available (from dbconnection.php or use default)
global $TimeZoneCustome;
if (!isset($TimeZoneCustome) && isset($GLOBALS['TimeZoneCustome'])) {
    $TimeZoneCustome = $GLOBALS['TimeZoneCustome'];
} elseif (!isset($TimeZoneCustome)) {
    $TimeZoneCustome = 'Africa/Cairo';
}
date_default_timezone_set($TimeZoneCustome);
$trial_time = date('Y-m-d');
//Schedule Request
$result = mysql_query("SELECT * FROM class_resched");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$tnumberOfRows = MYSQL_NUMROWS($result);
If ($tnumberOfRows == 0) 
	{
	$sched_request = '';
	}
elseif ($tnumberOfRows > 0){
	$sched_request = '<span class="badge badge-default">'.$tnumberOfRows.'</span>';
}
//task given start
$result = mysql_query("SELECT * FROM task_creator WHERE clear = '1' AND to_person = '1' AND status = '1'");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$tnumberOfRows = MYSQL_NUMROWS($result);
If ($tnumberOfRows == 0) 
	{
	$task_given = '';
	}
elseif ($tnumberOfRows > 0){
	$task_given = '<span class="badge badge-default">'.$tnumberOfRows.'</span>';
}
//task issued start
$result = mysql_query("SELECT * FROM task_creator WHERE clear = '1' AND from_person = '1' AND status = '2'");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$tnumberOfRows = MYSQL_NUMROWS($result);
if ($tnumberOfRows == 0) 
	{
	$task_issued = '';
	}
else if ($tnumberOfRows > 0){
	$task_issued = '<span class="badge badge-task">'.$tnumberOfRows.'</span>';
}
//leave start
$result = mysql_query("SELECT * FROM leave_app WHERE status = '2'");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$tnumberOfRows = MYSQL_NUMROWS($result);
If ($tnumberOfRows == 0) 
	{
	$leave_status = '';
	}
else if ($tnumberOfRows > 0) 
	{
$leave_status = '<span class="badge badge-default">'.$tnumberOfRows.'</span>';
}
//leave end
$result = mysql_query("SELECT * FROM complaint WHERE cn_id = '1'");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$tnumberOfRows = MYSQL_NUMROWS($result);
If ($tnumberOfRows == 0) 
	{
	$complaints = '';
	}
else if ($tnumberOfRows > 0) 
	{
$complaints = '<span class="badge badge-default">'.$tnumberOfRows.'</span>';
}
$result = mysql_query("SELECT * FROM account WHERE active = 17 and suspension_date < '$trial_time'");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRowsot = MYSQL_NUMROWS($result);
If ($numberOfRowsot == 0) 
	{
	$suspension= '';
	}
else if ($numberOfRowsot > 0) 
	{
	$suspension= '<span class="badge badge-default">'.$numberOfRowsot.'</span>';
	}

$result = mysql_query("SELECT * FROM account WHERE active = 17");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRowsot = MYSQL_NUMROWS($result);
If ($numberOfRowsot == 0) 
	{
	$suspension2= '0';
	}
else if ($numberOfRowsot > 0) 
	{
	$suspension2= $numberOfRowsot;
	}
	
$result = mysql_query("SELECT * FROM announcement WHERE ann_date <= '$trial_time' AND ann_end >= '$trial_time'");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$tnumberOfRows = MYSQL_NUMROWS($result);
If ($tnumberOfRows == 0) 
	{
	$announcements = '';
	}
else if ($tnumberOfRows > 0) 
	{
$announcements = '<span class="badge badge-default">'.$tnumberOfRows.'</span>';
}
$result = mysql_query("SELECT * FROM new_request WHERE status = 1");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$tnumberOfRows = MYSQL_NUMROWS($result);
If ($tnumberOfRows == 0) 
	{
	$newrequests = '';
	}
else if ($tnumberOfRows > 0) 
	{
$newrequests = '<span class="badge badge-default">'.$tnumberOfRows.'</span>';
}
$result = mysql_query("SELECT * FROM account WHERE active = 11 and trial_date < '$trial_time'");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRowsot = MYSQL_NUMROWS($result);
If ($numberOfRowsot == 0) 
	{
	$trial= '';
	}
else if ($numberOfRowsot > 0) 
	{
	$trial= '<span class="badge badge-default">'.$numberOfRowsot.'</span>';
	}

$result = mysql_query("SELECT * FROM account WHERE active = 11");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRowsot = MYSQL_NUMROWS($result);
If ($numberOfRowsot == 0) 
	{
	$trial2= '0';
	}
else if ($numberOfRowsot > 0) 
	{
	$trial2= $numberOfRowsot;
	}

$result = mysql_query("SELECT * FROM note_student WHERE status = 1");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRowsot = MYSQL_NUMROWS($result);
If ($numberOfRowsot == 0) 
	{
	$student_note= '';
	$student_note2= '';
	}
else if ($numberOfRowsot > 0) 
	{
	$student_note= '<span class="badge badge-default">'.$numberOfRowsot.'</span>';
	$student_note2= '$numberOfRowsot';
	}

$result = mysql_query("SELECT * FROM account WHERE active = '7' and leave_date < '$trial_time'");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRowsot = MYSQL_NUMROWS($result);
If ($numberOfRowsot == 0) 
	{
	$leave= '';
	}
else if ($numberOfRowsot > 0) 
	{
	$leave= '<span class="badge badge-default">'.$numberOfRowsot.'</span>';	}

$result = mysql_query("SELECT * FROM account WHERE active = '7'");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRowsot = MYSQL_NUMROWS($result);
If ($numberOfRowsot == 0) 
	{
	$leave2= '';
	}
else if ($numberOfRowsot > 0) 
	{
	$leave2= $numberOfRowsot;
	}
?>
<?php
date_default_timezone_set("Africa/Cairo");
$syw = date('Y');

// Determine base path for assets - works for both direct access and MVC routes
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https://' : 'http://';
$host = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : 'localhost';
$scriptName = isset($_SERVER['SCRIPT_NAME']) ? $_SERVER['SCRIPT_NAME'] : '';
$requestUri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '';

// Calculate base path dynamically
// Assets folder is at: /member-area/assets (relative to web root)
// Get the web root path by finding 'member-area' in the script name
$webRoot = '';
if (strpos($scriptName, '/member-area/') !== false) {
    // Extract path up to and including 'member-area'
    $parts = explode('/member-area/', $scriptName);
    $webRoot = $parts[0]; // Everything before /member-area
} elseif (strpos($requestUri, '/member-area/') !== false) {
    // Fallback: extract from REQUEST_URI
    $parts = explode('/member-area/', $requestUri);
    $webRoot = $parts[0]; // Everything before /member-area
} else {
    // Default fallback
    $webRoot = '/quraan-new';
}

// Assets base URL
$assetsBase = $protocol . $host . $webRoot . '/member-area/assets';
?>
<?php
$main_header = '<!DOCTYPE html>
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
<title>'.$title.'</title>
<meta https-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta https-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css">
<link href="'.$assetsBase.'/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="'.$assetsBase.'/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css">
<link href="'.$assetsBase.'/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="'.$assetsBase.'/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css">
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="'.$assetsBase.'/global/css/components-rounded.css" id="style_components" rel="stylesheet" type="text/css">
<link href="'.$assetsBase.'/global/css/plugins.css" rel="stylesheet" type="text/css">
<link href="'.$assetsBase.'/admin/layout3/css/layout.css" rel="stylesheet" type="text/css">
<link href="'.$assetsBase.'/admin/layout3/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color">
<link href="'.$assetsBase.'/admin/layout3/css/custom.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="'.$assetsBase.'/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css"/>
<link rel="stylesheet" type="text/css" href="'.$assetsBase.'/global/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="'.$assetsBase.'/admin/pages/css/todo.css"/>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="https://qarabic.com/vendor/local/imgs/icons/meta/android-icon-192x192.png"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-menu-fixed" class to set the mega menu fixed  -->
<!-- DOC: Apply "page-header-top-fixed" class to set the top menu fixed  -->
<body>
<!-- BEGIN HEADER -->
<div class="page-header">
	<!-- BEGIN HEADER TOP -->
	<div class="page-header-top">
		<div class="container">
			<!-- BEGIN LOGO -->
			<div class="page-logo">
				<a href="'.$site.'"><img src="../assets/admin/layout3/img/logo-default.png" alt="logo" class="logo-default"></a>
			</div>
			<!-- END LOGO -->
			<!-- BEGIN RESPONSIVE MENU TOGGLER -->
			<a href="javascript:;" class="menu-toggler"></a>
			<!-- END RESPONSIVE MENU TOGGLER -->
			';
?>
<?php
$tool_bar='<!-- BEGIN TOP NAVIGATION MENU -->
			<div class="top-menu">
				<ul class="nav navbar-nav pull-right">
				<!-- BEGIN NOTIFICATION DROPDOWN -->
					<li class="dropdown dropdown-extended dropdown-dark dropdown-notification" id="header_notification_bar">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						<i class="icon-user-following"></i>
						'.$suspension.'</a>
						<ul class="dropdown-menu">
							<li class="external">
								<h3>You have <strong>'.$suspension2.' Suspension </strong>.</h3>
								<a href="parent-accounts-on-suspension">view all</a>
							</li>
							<li>
							</li>
						</ul>
					</li>
				<!-- BEGIN NOTIFICATION DROPDOWN -->
					<li class="dropdown dropdown-extended dropdown-dark dropdown-notification" id="header_notification_bar">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						<i class="icon-book-open"></i>
						'.$leave_status.'</a>
						<ul class="dropdown-menu">
							<li class="external">
								<h3><strong>'.$leave_status.' Pending Approval </strong>.</h3>
								<a href="leave-status">view all</a>
							</li>
							<li>
							</li>
						</ul>
					</li>
				<!-- BEGIN NOTIFICATION DROPDOWN -->
					<li class="dropdown dropdown-extended dropdown-dark dropdown-notification" id="header_notification_bar">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						<i class="icon-note"></i>
						'.$complaints.'</a>
						<ul class="dropdown-menu">
							<li class="external">
								<h3>You have <strong>'.$complaints.' Complaints </strong>.</h3>
								<a href="complaint-pending">view all</a>
							</li>
							<li>
							</li>
						</ul>
					</li>
				<!-- BEGIN NOTIFICATION DROPDOWN -->
					<li class="dropdown dropdown-extended dropdown-dark dropdown-notification" id="header_notification_bar">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						<i class="icon-envelope-open"></i>
						'.$newrequests.'</a>
						<ul class="dropdown-menu">
							<li class="external">
								<h3>You have <strong>'.$newrequests.' New Requests </strong>awaiting.</h3>
								<a href="list-of-new-request">view all</a>
							</li>
							<li>
							</li>
						</ul>
					</li>
					<!-- END NOTIFICATION DROPDOWN -->
					<!-- BEGIN NOTIFICATION DROPDOWN -->
					<li class="dropdown dropdown-extended dropdown-dark dropdown-notification" id="header_notification_bar">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						<i class="icon-volume-2"></i>
						'.$announcements.'</a>
						<ul class="dropdown-menu">
							<li class="external">
								<h3>You have <strong>'.$announcements.' Announcements</strong></h3>
								<a href="current-announcement">view all</a>
							</li>
							<li>
							</li>
						</ul>
					</li>
					<!-- END NOTIFICATION DROPDOWN -->
					<!-- BEGIN NOTIFICATION DROPDOWN -->
					<li class="dropdown dropdown-extended dropdown-dark dropdown-notification" id="header_notification_bar">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						<i class="icon-bell"></i>
						'.$trial.'</a>
						<ul class="dropdown-menu">
							<li class="external">
								<h3>You have <strong>'.$trial2.' families</strong> on trial</h3>
								<a href="parent-accounts-on-trial">view all</a>
							</li>
							<li>
							</li>
						</ul>
					</li>
					<!-- END NOTIFICATION DROPDOWN -->
					<!-- BEGIN NOTIFICATION DROPDOWN -->
					<li class="dropdown dropdown-extended dropdown-dark dropdown-notification" id="header_notification_bar">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						<i class="icon-bubbles"></i>
						'.$student_note.'
						</a>
						<ul class="dropdown-menu">
							<li class="external">
								<h3>You have <strong>'.$student_note2.' </strong>unread comments</h3>
								<a href="comment-timeline-all">view all</a>
							</li>
							<li>
							</li>
						</ul>
					</li>
					<!-- END NOTIFICATION DROPDOWN -->
					<!-- BEGIN NOTIFICATION DROPDOWN -->
					<li class="dropdown dropdown-extended dropdown-dark dropdown-notification" id="header_notification_bar">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						<i class="icon-calendar"></i>
						'.$leave.'</a>
						<ul class="dropdown-menu">
							<li class="external">
								<h3>You have <strong>'.$leave2.' families</strong> on leave</h3>
								<a href="parent-accounts-on-leave">view all</a>
							</li>
							<li>
							</li>
						</ul>
					</li>
					<!-- END NOTIFICATION DROPDOWN -->
					<!-- BEGIN NOTIFICATION DROPDOWN -->
					<li class="dropdown dropdown-extended dropdown-dark dropdown-notification" id="header_notification_bar">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						<i class="icon-screen-tablet"></i>
						'.$sched_request.'</a>
						<ul class="dropdown-menu">
							<li class="external">
								<h3>You have <strong>'.$sched_request.'</strong> Re-Schedules</h3>
								<a href="admin-home-reschedule">view all</a>
							</li>
							<li>
							</li>
						</ul>
					</li>
					<!-- END NOTIFICATION DROPDOWN -->
					<li class="droddown dropdown-separator">
						<span class="separator"></span>
					</li>
					<!-- BEGIN NOTIFICATION DROPDOWN -->
					<li class="dropdown dropdown-extended dropdown-dark dropdown-notification" id="header_notification_bar">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						<i class="icon-bulb font-green-jungle"></i>
						'.$task_issued.'</a>
						<ul class="dropdown-menu">
							<li class="external">
								<h3>Task <strong>'.$task_issued.'</strong> Issued</h3>
								<a href="pending-issued-tasks">view all</a>
							</li>
							<li>
							</li>
						</ul>
					</li>
					<!-- END NOTIFICATION DROPDOWN -->
					<!-- BEGIN NOTIFICATION DROPDOWN -->
					<li class="dropdown dropdown-extended dropdown-dark dropdown-notification" id="header_notification_bar">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						<i class="icon-bulb font-red-thunderbird"></i>
						'.$task_given.'</a>
						<ul class="dropdown-menu">
							<li class="external">
								<h3>Task <strong>'.$task_given.'</strong> Given</h3>
								<a href="pending-given-tasks">view all</a>
							</li>
							<li>
							</li>
						</ul>
					</li>
					<!-- END NOTIFICATION DROPDOWN -->
					<!-- BEGIN USER LOGIN DROPDOWN -->

					<li class="dropdown dropdown-user dropdown-dark">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						<img alt="" class="img-circle" src="../assets/admin/layout3/img/avatar9.jpg">
						<span class="username username-hide-mobile">Admin</span>
						</a>
						<ul class="dropdown-menu dropdown-menu-default">
							<li>
								<a href="logout">
								<i class="icon-key"></i> Log Out </a>
							</li>
						</ul>
					</li>
					<!-- END USER LOGIN DROPDOWN -->
				</ul>
			</div>
			<!-- END TOP NAVIGATION MENU -->
			</div>
	</div>';
	?>
<?php
$start_menu='<!-- END HEADER TOP -->
	<!-- BEGIN HEADER MENU -->
	<div class="page-header-menu">
		<div class="container">'
?>
<?php
$search_bar='<!-- BEGIN HEADER SEARCH BOX -->
			<form class="search-form" action="search" method="GET">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Search" name="query">
					<span class="input-group-btn">
					<a href="javascript:;" class="btn submit"><i class="icon-magnifier"></i></a>
					</span>
				</div>
			</form>
			<!-- END HEADER SEARCH BOX -->'
?>
<?php
$main_menu='<!-- BEGIN MEGA MENU -->
			<!-- DOC: Apply "hor-menu-light" class after the "hor-menu" class below to have a horizontal menu with white background -->
			<!-- DOC: Remove data-hover="dropdown" and data-close-others="true" attributes below to disable the dropdown opening on mouse hover -->
			<div class="hor-menu ">
				<ul class="nav navbar-nav">
					<li class="menu-dropdown classic-menu-dropdown ">
						<a data-hover="megamenu-dropdown" data-close-others="true" data-toggle="dropdown" href="javascript:;">
						DashBoard <i class="fa fa-angle-down"></i>
						</a>
						<ul class="dropdown-menu pull-left">
						<li>
								<a href="dashboard">
								DashBoard </a>
							</li>
							<li class=" dropdown-submenu">
								<a href=":;">
								Employees </a>
									<ul class="dropdown-menu">
									<li class=" ">
										<a href="list-of-employees">
										All </a>
									</li>
									<li class=" ">
										<a href="list-of-teachers">
										Teaching Staff </a>
									</li>
									<li class=" ">
										<a href="list-of-non-teaching">
										Non-Teaching Staff </a>
									</li>
								</ul>
							</li>
							<li>
								<a href="parent-accounts">
								Families </a>
							</li>
							<li>
								<a href="list-of-active-students">
								Students </a>
							</li>
							<li class=" dropdown-submenu">
								<a href=":;">
								Options </a>
									<ul class="dropdown-menu">
									<li class="dropdown-submenu">
										<a href="expense-report?year_id='.$syw.'">
										Invoice Section </a>
											<ul class="dropdown-menu">
											<li>
													<a href="invoice-details">
													Invoice Detials </a>
												</li>
												<li>
													<a href="create-monthly-invoice">
													Send Monthly Invoice </a>
												</li>
												<li>
													<a href="generate-monthly salary">
													Generate Monthly Salary </a>
												</li>
												<li>
													<a href="teacher-test-report">
													Test Reports </a>
												</li>
												<li>
													<a href="class-payment-rules">
													Rules <span class="badge badge-roundless badge-warning">new</span></a>
												</li>
												</ul>
									</li>
									<li class="dropdown-submenu">
										<a href="expense-head-report?year_id='.$syw.'">
										Weekly Classes </a>
											<ul class="dropdown-menu">
											<li>
													<a href="create_daily_classes-panel">
													Create Weekly Classes </a>
												</li>
												<li>
													<a href="create_daily_classes-panel">
													Update Weekly Classes </a>
												</li>
												<li>
													<a href="teacher-class-search">
													Schedule Advance Class </a>
												</li>
												<li>
													<a href="public-holidays-teacher-class-search">
													Public Holidays </a>
												</li>
												<li>
													<a href="teacher-class-anylasis-search">
													Salary Class Report </a>
												</li>
												<li>
													<a href="teacher-class-anylasis-daily">
													Daily Class Report </a>
												</li>
											</ul>
									</li>
									<li class="dropdown-submenu">
										<a href="sign-ups-report?year_id='.$syw.'">
										Add Options </a>
											<ul class="dropdown-menu">
											<li>
													<a href="add-teacher-account">
													Add New Employee</a>
												</li>
												<li>
													<a href="add-parent-account-call">
													Add New Family</a>
												</li>
												<li>
													<a href="add-country">
													Add New Country</a>
												</li>
												<li>
													<a href="add-new-task-manual">
													Add New Task</a>
												</li>
												<li>
													<a href="add-vendor">
													Add New Vendor</a>
												</li>
											</ul>
									</li>
									<li class="dropdown-submenu">
										<a href="sign-ups-report?year_id='.$syw.'">
										Other Options </a>
											<ul class="dropdown-menu">
											<li>
													<a href="list-of-new-request">
													New Requests</a>
												</li>
												<li>
													<a href="test_status">
													See Test Status</a>
												</li>
												<li>
													<a href="list-of-country">
													List of Country</a>
												</li>
												<li>
													<a href="list-of-sms-services">
													SMS Services</a>
												</li>
												<li>
													<a href="complaint-pending">
													Complaints</a>
												</li>
											</ul>
									</li>
								</ul>
							</li>
						</ul>
					</li>
					<li>
						<a href="list-of-new-request">New Requests</a> 
					</li>
					<li class="menu-dropdown classic-menu-dropdown ">
						<a data-hover="megamenu-dropdown" data-close-others="true" data-toggle="dropdown" href="javascript:;">
						Task Manager <i class="fa fa-angle-down"></i>
						</a>
						<ul class="dropdown-menu pull-left">
							<li class="">
								<a href="add-new-task-manual">
								Add Task </a>
							</li>
							<li class="">
								<a href="add-new-announcement">
								Add Announcement </a>
							</li>
						</ul>
					</li>
					<li>
						<a href="admin-home">Manager</a> 
					</li>
					<li>
						<a href="list-of-voucher">Accounts</a> 
					</li>
					<li>
						<a href="invoice-details">Billing</a> 
					</li>
					<li class="menu-dropdown classic-menu-dropdown ">
						<a data-hover="megamenu-dropdown" data-close-others="true" data-toggle="dropdown" href="javascript:;">
						Business Stats <i class="fa fa-angle-down"></i>
						</a>
						<ul class="dropdown-menu pull-left">
							<li>
								<a href="sign-ups-report?year_id='.$syw.'">
								Sign-Ups Report </a>
							</li>
							<li>
								<a href="expense-report?year_id='.$syw.'">
								Expense Report </a>
							</li>
							<li>
								<a href="expense-head-report?year_id='.$syw.'">
								Account Head Expenses </a>
							</li>
							<li>
								<a href="generate-monthly-salary-ana">
								Salary Records </a>
							</li>
							<li>
								<a href="sign-anylasis-search">
								SignUps by Date </a>
							</li>
						</ul>
					</li>
					</li>
					
							<li>
								<a href="logout">
								Log out </a>
							</li>
							<li>
								<a href="backup/backup.php">
								 Backup
								 </a>
							</li>
							<li>
							<a href="edit-status-settings">Notifictions Settings</a>
							</li>
					</ul>
			</div>
			<!-- END MEGA MENU -->
		</div>
	</div>
	<!-- END HEADER MENU -->
</div>
<!-- END HEADER -->'
?>
<?php
$fot = '<!-- BEGIN PRE-FOOTER -->
<div class="page-prefooter">
	<div class="container">
		<div class="row">
			<div class="col-md-4 footer-block">
				<h2>Contact Us</h2>
				<b>General Queries:</b> <a href="mailto:'.$email1.'">'.$email1.'</a>
				<br><b>Invoice Issues:</b> <a href="mailto:'.$email2.'">'.$email2.'</a>
				</div>
			<div class="col-md-2 footer-block">
				<h2>Follow Us</h2>
				<ul class="social-icons">
					<li>
						'.$social1.'
					</li>
					<li>
						'.$social2.'
					</li>
					<li>
						'.$social3.'
					</li>
				</ul>
			</div>
			<div class="col-md-3 col-sm-6 col-xs-12 footer-block">
				<h2>About</h2>
				<p align="justify">
					 '.$about.' 
				</p>
			</div>
			<div class="col-md-3 col-sm-6 col-xs-12 footer-block">
				<h2>For Quick Responce</h2>
				<address class="margin-bottom-40">
				'.$phone1.'
				'.$phone2.'
				'.$phone3.'
				</address>
			</div>
		</div>
	</div>
</div>
<!-- END PRE-FOOTER -->
<!-- BEGIN FOOTER -->
<div class="page-footer">
	<div class="container">
		 '.$bottom_line.'
	</div>
</div>
<div class="scroll-to-top">
	<i class="icon-arrow-up"></i>
</div>
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="'.$assetsBase.'/global/plugins/respond.min.js"></script>
<script src="'.$assetsBase.'/global/plugins/excanvas.min.js"></script> 
<![endif]-->
<script src="'.$assetsBase.'/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="'.$assetsBase.'/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="'.$assetsBase.'/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="'.$assetsBase.'/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="'.$assetsBase.'/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="'.$assetsBase.'/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="'.$assetsBase.'/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="'.$assetsBase.'/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="'.$assetsBase.'/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<script src="'.$assetsBase.'/global/scripts/metronic.js" type="text/javascript"></script>
<script src="'.$assetsBase.'/admin/layout3/scripts/layout.js" type="text/javascript"></script>
<script src="'.$assetsBase.'/admin/layout3/scripts/demo.js" type="text/javascript"></script>
<script src="'.$assetsBase.'/global/plugins/jquery.pulsate.min.js" type="text/javascript"></script>
<script src="'.$assetsBase.'/global/plugins/jquery-bootpag/jquery.bootpag.min.js" type="text/javascript"></script>
<script src="'.$assetsBase.'/global/plugins/holder.js" type="text/javascript"></script>
<script src="'.$assetsBase.'/admin/pages/scripts/ui-general.js" type="text/javascript"></script>';
?>
<script>
jQuery(document).ready(function() {       
   // initiate layout and plugins
   Metronic.init(); // init metronic core components
   Layout.init(); // init current layout
   Demo.init(); // init demo features
   UIGeneral.init();
   
   // Initialize Bootstrap dropdowns explicitly (works with both .dropdown and .menu-dropdown classes)
   jQuery('[data-toggle="dropdown"]').on('click', function(e) {
       e.preventDefault();
       e.stopPropagation();
       var $this = jQuery(this);
       var $parent = $this.closest('.dropdown, .menu-dropdown');
       
       // Close other dropdowns
       jQuery('.dropdown, .menu-dropdown').not($parent).removeClass('open');
       
       // Toggle current dropdown
       $parent.toggleClass('open');
   });
   
   // Close dropdowns when clicking outside
   jQuery(document).on('click', function(e) {
       if (!jQuery(e.target).closest('.dropdown, .menu-dropdown').length) {
           jQuery('.dropdown, .menu-dropdown').removeClass('open');
       }
   });
   
   // Initialize hover dropdowns if bootstrap-hover-dropdown is loaded
   try {
       var hoverDropdown = jQuery.fn.bootstrapHoverDropdown;
       if (hoverDropdown) {
           jQuery('[data-hover="dropdown"]').bootstrapHoverDropdown();
       }
   } catch(e) {
       // Plugin not loaded, ignore
   }
});
</script>
</body>
<?php
echo '
<!-- END BODY -->
</html>'
?>
<?php $head_name = 'Admin'; 
$head_title = $title;
?>
<?php
$fot1 = '<!-- BEGIN PRE-FOOTER -->
<div class="page-prefooter">
	<div class="container">
		<div class="row">
			<div class="col-md-4 footer-block">
				<h2>Contact Us</h2>
				<b>General Queries:</b> <a href="mailto:'.$email1.'">'.$email1.'</a>
				<br><b>Invoice Issues:</b> <a href="mailto:'.$email2.'">'.$email2.'</a>
				</div>
			<div class="col-md-2 footer-block">
				<h2>Follow Us</h2>
				<ul class="social-icons">
					<li>
						'.$social1.'
					</li>
					<li>
						'.$social2.'
					</li>
					<li>
						'.$social3.'
					</li>
				</ul>
			</div>
			<div class="col-md-3 col-sm-6 col-xs-12 footer-block">
				<h2>About</h2>
				<p align="justify">
					 '.$about.' 
				</p>
			</div>
			<div class="col-md-3 col-sm-6 col-xs-12 footer-block">
				<h2>For Quick Responce</h2>
				<address class="margin-bottom-40">
				'.$phone1.'
				'.$phone2.'
				'.$phone3.'
				</address>
			</div>
		</div>
	</div>
</div>
<!-- END PRE-FOOTER -->
<!-- BEGIN FOOTER -->
<div class="page-footer">
	<div class="container">
		 '.$bottom_line.'
	</div>
</div>
<div class="scroll-to-top">
	<i class="icon-arrow-up"></i>
</div>
<!-- END FOOTER -->'; ?>