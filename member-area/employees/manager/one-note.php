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
  $link =$_REQUEST['link'];
  ?>
<?php
date_default_timezone_set("Asia/Karachi");
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