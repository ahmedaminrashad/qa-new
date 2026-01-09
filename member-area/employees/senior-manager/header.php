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
error_reporting(0);
  $ID = $_SESSION['is']['teacher_id'];
$result = mysql_query("SELECT * FROM profile Where teacher_id = '$ID' AND csr_rights = 1");
			if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$tnumberOfRows = MYSQL_NUMROWS($result);
if ($tnumberOfRows > 0){
$menu_csr= '<li><a href="../customer-service-representative/home"><i class="icon-lock"></i> CSR </a></li>';
	}

$result = mysql_query("SELECT * FROM profile Where teacher_id = '$ID' AND teacher_rights = 1");
			if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$tnumberOfRows = MYSQL_NUMROWS($result);
if ($tnumberOfRows > 0){
$menu_teacher='<li>
								<a href="../teacher/teacher-home">
								<i class="icon-lock"></i> Teacher </a>
							</li>';
	}
$result = mysql_query("SELECT * FROM profile Where teacher_id = '$ID' AND monitor_rights = 2");
			if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$tnumberOfRows = MYSQL_NUMROWS($result);
if ($tnumberOfRows > 0){
$menu_monitor='<li>
								<a href="../monitor/admin-home">
								<i class="icon-lock"></i> Monitor Section </a>
							</li>';
	}

			$result = mysql_query("SELECT * FROM profile Where teacher_id = '$ID' AND super_rights = 1");
			if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$tnumberOfRows = MYSQL_NUMROWS($result);
if ($tnumberOfRows > 0){
$menu_manager='<li>
								<a href="../manager/admin-home">
								<i class="icon-lock"></i> Manager </a>
							</li>';
	}
			$result = mysql_query("SELECT * FROM profile Where teacher_id = '$ID' AND s_supper_rights = 1");
			if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$tnumberOfRows = MYSQL_NUMROWS($result);
if ($tnumberOfRows > 0){
$menu_senior='<li>
								<a href="../senior-manager/admin-home">
								<i class="icon-action-undo"></i> Senior Manager </a>
							</li>';
	}
			$result = mysql_query("SELECT * FROM profile Where teacher_id = '$ID' AND accounts = 1");
			if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$tnumberOfRows = MYSQL_NUMROWS($result);
if ($tnumberOfRows > 0){
$menu_accounts='<li>
								<a href="../accounts/list-of-voucher">
								<i class="icon-lock"></i> Accountant </a>
							</li>';
	}
			$result = mysql_query("SELECT * FROM profile Where teacher_id = '$ID' AND billing_rights = 1");
			if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$tnumberOfRows = MYSQL_NUMROWS($result);
if ($tnumberOfRows > 0){
$menu_billing='<li>
								<a href="../billing/invoice-details">
								<i class="icon-lock"></i> Billing Section </a>
							</li>';
	}
 $ID = $_SESSION['is']['teacher_id'];
  $TIMG = $_SESSION['is']['image_name'];
   $TNAME = $_SESSION['is']['teacher_name'];
?>
<?php
error_reporting(0);
include("../includes/main-var.php");
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
$result = mysql_query("SELECT * FROM task_creator WHERE clear = '1' AND to_person = '$ID' AND status = '1'");
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
$result = mysql_query("SELECT * FROM task_creator WHERE clear = '1' AND from_person = '$ID' AND status = '2'");
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
$result = mysql_query("SELECT * FROM leave_app WHERE (status = '1' OR status = '3' OR status = '4') AND teacher_id = '$ID'");
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
	
$result = mysql_query("SELECT * FROM note_student WHERE status = 1 AND user_id = $ID");
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
	$student_note2= $numberOfRowsot;
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
$tool_bar='<!-- BEGIN TOP NAVIGATION MENU -->
			<div class="top-menu">
				<ul class="nav navbar-nav pull-right">
				<!-- BEGIN NOTIFICATION DROPDOWN -->
					<li class="dropdown dropdown-extended dropdown-dark dropdown-notification" id="header_notification_bar">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						<i class="icon-book-open"></i>
						'.$leave_status.'</a>
						<ul class="dropdown-menu">
							<li class="external">
								<h3>You have <strong>'.$leave_status.' Leaves for Supervision </strong>.</h3>
								<a href="leave-status">view all</a>
							</li>
							<li>
							</li>
						</ul>
					</li>
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
						<i class="icon-volume-2"></i>
						'.$announcements.'</a>
						<ul class="dropdown-menu">
							<li class="external">
								<h3>You have <strong>'.$announcements.' Announcements </strong></h3>
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
								<h3>Tasks <strong>'.$task_given.'</strong> Given</h3>
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
						<img alt="" class="img-circle" src="../../uploads/thumb/'.$TIMG.'">
						<span class="username username-hide-mobile">'.$TNAME.'</span>
						</a>
						<ul class="dropdown-menu dropdown-menu-default">
						'.$menu_senior.'
						'.$menu_manager.'
						'.$menu_accounts.'
						'.$menu_csr.'
						'.$menu_teacher.'
						'.$menu_billing.'
						'.$menu_monitor.'
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
$main_header = '<!DOCTYPE html>
<!-- 
Author: Muhammad Farooq
Website: http://www.tarteeltechnologies.net/
Contact: info@tarteeltechnologies.net
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
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="https://fonts.googleapis.net/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css">
<link href="../../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="../../assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css">
<link href="../../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="../../assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css">
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="../../assets/global/css/components-rounded.css" id="style_components" rel="stylesheet" type="text/css">
<link href="../../assets/global/css/plugins.css" rel="stylesheet" type="text/css">
<link href="../../assets/admin/layout3/css/layout.css" rel="stylesheet" type="text/css">
<link href="../../assets/admin/layout3/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color">
<link href="../../assets/admin/layout3/css/custom.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="../../assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css"/>
<link rel="stylesheet" type="text/css" href="../../assets/global/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="../../assets/admin/pages/css/todo.css"/>
<script src="https://code.jquery.net/jquery-2.1.1.min.js" type="text/javascript"></script>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
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
				<a href="#"><img src="../../assets/admin/layout3/img/logo-default.png" alt="logo" class="logo-default"></a>
			</div>
			<!-- END LOGO -->
			<!-- BEGIN RESPONSIVE MENU TOGGLER -->
			<a href="javascript:;" class="menu-toggler"></a>
			<!-- END RESPONSIVE MENU TOGGLER -->'
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
					<li>
						<a href="admin-home">Home</a>
					</li>
					<li>
						<a href="teacher-search-local-time">Search Schedule</a>
					</li>
					<li>
						<a href="list-of-teachers">Teachers</a>
					</li>
					<li>
						<a href="parent-accounts">Parents</a>
					</li>
					<li>
						<a href="list-of-active-students">Students</a>
					</li>
					<li class="menu-dropdown mega-menu-dropdown mega-menu-full ">
						<a data-hover="megamenu-dropdown" data-close-others="true" data-toggle="dropdown" href="javascript:;" class="dropdown-toggle">
						Options <i class="fa fa-angle-down"></i>
						</a>
						<ul class="dropdown-menu">
							<li>
								<div class="mega-menu-content">
									<div class="row">
										<div class="col-md-3">
											<ul class="mega-menu-submenu">
												<li>
													<h3>Weekly Classes</h3>
												</li>
												<li>
													<a href="create_daily_classes-panel?y='.time().'">
													<i class="fa fa-angle-right"></i>
													Update Weekly Classes </a>
												</li>
												<li>
													<a href="teacher-class-anylasis-search">
													<i class="fa fa-angle-right"></i>
													Daily Class Report </a>
												</li>
												<li>
													<a href="class-payment-rules">
													<i class="fa fa-angle-right"></i>
													Rules <span class="badge badge-roundless badge-warning">new</span></a>
												</li>
												<li>
													<a href="min-fee-man">
													<i class="fa fa-angle-right"></i>
													Rules <span class="badge badge-roundless badge-warning">Min Fee</span></a>
												</li>
											</ul>
										</div>
										<div class="col-md-3">
											<ul class="mega-menu-submenu">
												<li>
													<h3>Add Options</h3>
												</li>
												<li>
													<a href="add-teacher-account">
													<i class="fa fa-angle-right"></i>
													Add New Teacher</a>
												</li>
												<li>
													<a href="add-parent-account-call">
													<i class="fa fa-angle-right"></i>
													Add New Parent</a>
												</li>
												<li>
													<a href="add-country">
													<i class="fa fa-angle-right"></i>
													Add New Country</a>
												</li>
												<li>
													<a href="add-new-task-manual">
													<i class="fa fa-angle-right"></i>
													Add New Task</a>
												</li>
											</ul>
										</div>
										<div class="col-md-3">
											<ul class="mega-menu-submenu">
												<li>
													<h3>Other Options</h3>
												</li>
												<li>
													<a href="test_status">
													<i class="fa fa-angle-right"></i>
													See Test Status</a>
												</li>
												<li>
													<a href="teacher-test-report">
													<i class="fa fa-angle-right"></i>
													Test Reports </a>
												</li>
												<li>
													<a href="list-of-country">
													<i class="fa fa-angle-right"></i>
													List of Country</a>
												</li>
												<li>
													<a href="teacher-class-anylasis-search">
													<i class="fa fa-angle-right"></i>
													Salary Class Report </a>
												</li>
												<li>
													<a href="teacher-class-anylasis-daily">
													<i class="fa fa-angle-right"></i>
													Daily Class Report </a>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</li>
						</ul>
						<li class="menu-dropdown classic-menu-dropdown ">
						<a data-hover="megamenu-dropdown" data-close-others="true" data-toggle="dropdown" href="javascript:;">
						Courses <i class="fa fa-angle-down"></i>
						</a>
						<ul class="dropdown-menu pull-left">
							<li class=" dropdown-submenu">
								<a href="course-material">
								<i class="icon-wallet"></i>
								View Courses </a>
							</li>
							<li class=" dropdown-submenu">
								<a href="add-new-course">
								<i class="icon-plus"></i>
								Add New Course </a>
							</li>
						</ul>
					</li>

					</li>				</ul>
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
<script src="../../assets/global/plugins/respond.min.js"></script>
<script src="../../assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
<script src="../../assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="../../assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<script src="../../assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="../../assets/admin/layout3/scripts/layout.js" type="text/javascript"></script>
<script src="../../assets/admin/layout3/scripts/demo.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/jquery.pulsate.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/jquery-bootpag/jquery.bootpag.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/holder.js" type="text/javascript"></script>
<script src="../../assets/admin/pages/scripts/ui-general.js" type="text/javascript"></script>
<script>
jQuery(document).ready(function() {       
   // initiate layout and plugins
   Metronic.init(); // init metronic core components
Layout.init(); // init current layout
Demo.init(); // init demo features
UIGeneral.init();
});
</script>
</body>
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