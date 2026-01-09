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
require("../includes/dbconnection.php");
include("../includes/teacher_rights.php");  include("header.php");
  $cid =$_REQUEST['c_id'];
  $tt = $_SESSION['is']['parent_id'];
?>
<?php 
$result1 = mysql_query("SELECT * FROM dept HAVING dept_id='$cid'");
if (!$result1) 
		{
		die("Query to show fields from table failed");
		}
			$numberOfRows = MYSQL_NUMROWS($result1);
			If ($numberOfRows == 0) 
				{
				echo '';
				}
			else if ($numberOfRows > 0) 
				{
				$i=0;
			$cname = MYSQL_RESULT($result1,$i,"name");
				}			
?>
<?php
date_default_timezone_set("Africa/Cairo");
$sy = date('Y-m-d');
?>
<?php echo $main_header; ?>
<head>
<link rel="stylesheet" type="text/css" href="../../assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css"/>
<link href="../../assets/admin/pages/css/search.css" rel="stylesheet" type="text/css"/>
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
				<h1><?php echo $cname; ?> <small>All Lessons</small></h1>
			</div>
			<!-- END PAGE TITLE -->
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
				<li>
					<a href="course-material">All Courses</a><i class="fa fa-circle"></i>
				</li>
				<li class="active">
					 <?php echo $cname; ?> Lessons
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="row">
				<div class="col-md-12">
					<div class="tabbable tabbable-custom tabbable-noborder">
						<ul class="nav nav-tabs">
							<li class="active">
								<a data-toggle="tab" href="#tab_2_2">
								<?php echo $cname; ?> </a>
							</li>
						</ul>
						<div class="tab-content">
							<div id="tab_2_2" class="tab-pane active">
								<div class="row booking-results">
								<?php 
// sending query
$result = mysql_query("SELECT * FROM lesson_pages WHERE dept_id = $cid ORDER BY position_id ASC;");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
If ($numberOfRows == 0) 
	{
	echo 'No lesson Found';
	}
else if ($numberOfRows > 0) 
	{
	$i=0;
	while ($i<$numberOfRows)
		{		
		if(($i%2)==0) 
				{
					$bgcolor ='#FFFFFF';
				}
			else
				{
					$bgcolor ='#F7F7FF';
				}
		
			$lid = MYSQL_RESULT($result,$i,"lesson_id");
			$ldept = MYSQL_RESULT($result,$i,"dept_id");
			$lpos = MYSQL_RESULT($result,$i,"position_id");
			$img = MYSQL_RESULT($result,$i,"image_name");
			$lname = MYSQL_RESULT($result,$i,"lesson_name");
			$ldes = MYSQL_RESULT($result,$i,"lesson_des");
			$scr = MYSQL_RESULT($result,$i,"src");
?>
									<div class="col-md-6">
										<div class="booking-result">
											<div class="booking-img">
												<img src="../../uploads/quran/<?php echo $img; ?>" alt="">
											</div>
											<div class="booking-info">
												<h2>
											
											<?php echo $lname; ?> </a>
												</h2>
												<ul class="stars list-inline">
													<li>
														<i class="fa fa-star"></i>
													</li>
													<li>
														<i class="fa fa-star"></i>
													</li>
													<li>
														<i class="fa fa-star"></i>
													</li>
													<li>
														<i class="fa fa-star"></i>
													</li>													
													</li>
													<li>
														<i class="fa fa-star"></i>
													</li>

													<li>
														<i class="fa fa-star-empty"></i>
													</li>
												</ul>
												<p>
													 <?php echo $ldes; ?>
												</p>
													<figure>
    
    <audio
        controls
        src="../../uploads/quran/<?php echo $scr; ?>">
            Your browser does not support the
            <code>audio</code> element.
    </audio>
</figure>
											</div>
										</div>
									</div>
								

									<?php 	
		$i++;		
		}
	}	
?>
								</div>
							</div>
							<!--end tab-pane-->
						</div>
					</div>
				</div>
				<!--end tabbable-->
			</div>
			<!-- END PAGE CONTENT INNER -->
		</div>
	</div>
	<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->
<?php echo $fot; ?>
