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
   include("header.php");
  require ("../includes/dbconnection.php");
  $link =$_REQUEST['link'];
  ?>
<?php
date_default_timezone_set("Asia/Karachi");
$sy = date('Y-m-d');
?>
<?php echo $main_header; ?>
<!-- BEGIN TOP NAVIGATION MENU -->
			<div class="top-menu">
				<ul class="nav navbar-nav pull-right">
				<!-- BEGIN NOTIFICATION DROPDOWN -->
					<li class="dropdown dropdown-extended dropdown-dark dropdown-notification" id="header_notification_bar">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						<i class="icon-envelope-open"></i>
						<?php echo newrequest(); ?></a>
						<ul class="dropdown-menu">
							<li class="external">
								<h3>You have <strong><?php echo newrequest(); ?> New Requests</strong>awaiting.</h3>
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
						<i class="icon-bell"></i>
						<?php echo trial("$sy"); ?></a>
						<ul class="dropdown-menu">
							<li class="external">
								<h3>You have <strong><?php echo trial2(); ?> families</strong> on trial</h3>
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
						<?php echo note(); ?>
						</a>
						<ul class="dropdown-menu">
							<li class="external">
								<h3>You have <strong><?php echo note2(); ?> </strong>unread comments</h3>
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
						<?php echo leave($sy); ?>
						</a>
						<ul class="dropdown-menu">
							<li class="external">
								<h3>You have <strong><?php echo leave2(); ?> families</strong> on leave</h3>
								<a href="parent-accounts-on-leave">view all</a>
							</li>
							<li>
							</li>
						</ul>
					</li>
					<!-- END NOTIFICATION DROPDOWN -->
					<li class="droddown dropdown-separator">
						<span class="separator"></span>
					</li>
					<!-- BEGIN INBOX DROPDOWN -->
					<li class="dropdown dropdown-extended dropdown-dark dropdown-inbox" id="header_inbox_bar">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						<?php echo task() ?>
						</a>
						<ul class="dropdown-menu">
							<li class="external">
								<h3>You have <strong><?php echo task() ?> New</strong> Tasks</h3>
								<a href="pending-task">view all</a>
							</li>
							<li>
							</li>
						</ul>
					</li>
					<!-- END INBOX DROPDOWN -->
					<!-- BEGIN USER LOGIN DROPDOWN -->
					<li class="dropdown dropdown-user dropdown-dark">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						<img alt="" class="img-circle" src="../assets/admin/layout3/img/avatar9.jpg">
						<span class="username username-hide-mobile"><?php echo $head_name; ?></span>
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
	</div>
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
				<h1>Teacher <small>Note</small></h1>
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
					<a href="<?php echo $link; ?>#tab_1_44">Go Back</a><i class="fa fa-circle"></i>
				</li>
				<li class="active">
					 Note Details</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN SAMPLE TABLE PORTLET-->
					<div class="alert alert-success">
					<?php 
					$pid =$_REQUEST['n_id'];
					$result = mysql_query("SELECT * FROM note_student WHERE note_id = $pid");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
If ($numberOfRows == 0) 
	{
	echo '';
	}
else if ($numberOfRows > 0) 
	{
	$i=0;
		
			$anid = MYSQL_RESULT($result,$i,"note_id");
			$anote = MYSQL_RESULT($result,$i,"note_text");
			$astatus = MYSQL_RESULT($result,$i,"status");
			$adate = MYSQL_RESULT($result,$i,"date");
			$atime = MYSQL_RESULT($result,$i,"time");
			$asid = MYSQL_RESULT($result,$i,"course_id");
			$atid = MYSQL_RESULT($result,$i,"teacher_id");
			$asname = MYSQL_RESULT($result,$i,"student_name");
			$atname = MYSQL_RESULT($result,$i,"teacher_name");
			$apid = MYSQL_RESULT($result,$i,"parent_id");
			$ardate = MYSQL_RESULT($result,$i,"read_date");
			$artime = MYSQL_RESULT($result,$i,"read_time");
			$afb = MYSQL_RESULT($result,$i,"feed_back");
			} ?>
								<strong>Student:</strong> <?php echo $asname; ?><br>
								<strong>Teacher:</strong> <?php echo $atname; ?><br><br>
								<strong><h4>Note Details:</h4></strong>
								<strong>Date:</strong> <?php echo $adate; ?><br>
								<strong>Time:</strong> <?php echo $atime; ?><br>
								<strong>Teacher Note:</strong> <span class="label label-danger"><strong><?php echo $anote; ?></strong></span><br>
								
								<br>
								
								<strong><h4>FeedBack Details:</h4></strong>
								<strong>Date:</strong> <?php echo $ardate; ?><br>
								<strong>Time:</strong> <?php echo $artime; ?><br>
								<strong>FeedBack:</strong> <span class="label label-danger"><strong><?php echo $afb; ?></strong></span><br>
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