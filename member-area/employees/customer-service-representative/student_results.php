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
  include("../includes/csr_rights.php");
  require ("../includes/dbconnection.php");

   include("header.php");
  ?>
<?php
$link =base64_decode($_GET["link"]);
$name =base64_decode($_GET["name"]);
$pnid =base64_decode($_GET["Course_ID"]);
	$result = mysql_query("SELECT * FROM course Where course_id = $pnid");
	if (!$result) 
		{
		die("Query to show fields from table failed");
		}
			$numberOfRows = MYSQL_NUMROWS($result);
			If ($numberOfRows == 0) 
				{
			//echo 'Sorry No Record Found!';
				}
			else if ($numberOfRows > 0) 
				{
				$i=0;
			$student_name = MYSQL_RESULT($result,$i,"course_yrSec");
			$teacher_remarks = MYSQL_RESULT($result,$i,"remark_teacher");
			}
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
				<h1>Student <small>Results</small></h1>
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
					<a href="parent-accounts">Parent Accounts</a><i class="fa fa-circle"></i>
				</li>
				<li>
					<a href="<?php echo $link; ?>">Profile of <?php echo $name; ?></a><i class="fa fa-circle"></i>
				</li>
				<li class="active">
					 Trial Class Remarks and Results of <?php echo $student_name; ?> </li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN SAMPLE TABLE PORTLET-->
					<div class="alert alert-success">
								<strong>Trial Class Remarks:</strong><br> <?php echo $teacher_remarks; ?>
							</div>
					<div class="portlet light">
						<div class="portlet-body">
							<?php 
// sending query
$pnid =base64_decode($_GET["Course_ID"]);
$result = mysql_query("SELECT `test_results`.*, `month`.`month_name`, `school_yr`.`school_year` FROM `test_results`,`month`,`school_yr` WHERE test_results.m_id=month.month_id and test_results.y_id=school_yr.year_id HAVING course_id = $pnid ORDER BY m_id DESC;");
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
	while ($i<$numberOfRows)
		{		
			$test_r = MYSQL_RESULT($result,$i,"test_remarks");
			$test_g = MYSQL_RESULT($result,$i,"test_grade");
			$date_a = MYSQL_RESULT($result,$i,"taken_date_admin");
			$year_a = MYSQL_RESULT($result,$i,"school_year");
			$mon_a = MYSQL_RESULT($result,$i,"month_name");
?>
<div class="alert alert-warning">
								<strong><?php echo $mon_a; ?>-<?php echo $year_a; ?></strong><br><br><?php echo $test_r; ?><br><br>
								Test Grade: <span class="label label-success">
							<?php echo $test_g; ?> </span>
								</div>
								<?php 	
		$i++;		
		}
	}	
?>
							
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