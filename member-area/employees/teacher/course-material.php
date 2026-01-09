<?php
session_start();
  include("../includes/session.php");
require ("../includes/dbconnection.php");
include("../includes/teacher_rights.php");
  include("header.php");
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
  $tt = $_SESSION['is']['parent_id'];
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
	<div class="page-content">
		<div class="container">
			<!-- BEGIN PAGE BREADCRUMB -->
			<ul class="page-breadcrumb breadcrumb">
				<li>
					<a href="parents-home">Home</a><i class="fa fa-circle"></i>
				</li>
				<li class="active">
					 Course Material
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="row">
				<div class="col-md-12">
					<div class="tabbable tabbable-custom tabbable-noborder">
						<ul class="nav nav-tabs">
						   	<li class="active">
								<a data-toggle="tab" href="#tab_3">Books</a>
							</li>
						    <li>
								<a data-toggle="tab" href="#tab_1">Listening</a>
							</li>
							<li>
								<a data-toggle="tab" href="#tab_2">videos</a>
							</li>
						
						</ul>
						<div class="tab-content">
						    <div id="tab_1" class="tab-pane ">
								<div class="row booking-results">
								<?php 
// sending query
$result = mysql_query("SELECT * FROM dept WHERE type_id = 5 ORDER BY position_id ASC;");
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
		
			$did = MYSQL_RESULT($result,$i,"dept_id");
			$cname = MYSQL_RESULT($result,$i,"department");
			$dcname = MYSQL_RESULT($result,$i,"name");
			$img = MYSQL_RESULT($result,$i,"image_name");
			$tid = MYSQL_RESULT($result,$i,"type_id");
			$pid = MYSQL_RESULT($result,$i,"position_id");
			$clevel = MYSQL_RESULT($result,$i,"course_level");
			$cdes = MYSQL_RESULT($result,$i,"course_des");
			$cage = MYSQL_RESULT($result,$i,"age");
?>
									<div class="col-md-6">
										<div class="booking-result">
											<div class="booking-img">
												<img src="../../uploads/quran/<?php echo $img; ?>" alt="">
												<ul class="list-unstyled price-location">
													<li>
														<i class="fa fa-child"></i> <?php echo $clevel; ?>
													</li>
													<li>
														<i class="fa fa-mortar-board"></i> Minimum Age <?php echo $cage; ?>
													</li>
												</ul>
											</div>
											<div class="booking-info">
												<h2>
												<a href="quran-material-lesson?c_id=<?php echo $did; ?>">
											<?php echo $dcname; ?> </a>
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
													<li>
														<i class="fa fa-star-empty"></i>
													</li>
												</ul>
												<p>
													 <?php echo $cdes; ?>
												</p>
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
							<div id="tab_2" class="tab-pane ">
								<div class="row booking-results">
								<?php 
// sending query
$result = mysql_query("SELECT * FROM dept WHERE type_id = 6 ORDER BY position_id ASC;");
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
		
			$did = MYSQL_RESULT($result,$i,"dept_id");
			$cname = MYSQL_RESULT($result,$i,"department");
			$dcname = MYSQL_RESULT($result,$i,"name");
			$img = MYSQL_RESULT($result,$i,"image_name");
			$tid = MYSQL_RESULT($result,$i,"type_id");
			$pid = MYSQL_RESULT($result,$i,"position_id");
			$clevel = MYSQL_RESULT($result,$i,"course_level");
			$cdes = MYSQL_RESULT($result,$i,"course_des");
			$cage = MYSQL_RESULT($result,$i,"age");
?>
									<div class="col-md-6">
										<div class="booking-result">
											<div class="booking-img">
												<img src="../../uploads/videos/<?php echo $img; ?>" alt="">
												<ul class="list-unstyled price-location">
													<li>
														<i class="fa fa-child"></i> <?php echo $clevel; ?>
													</li>
													<li>
														<i class="fa fa-mortar-board"></i> Minimum Age <?php echo $cage; ?>
													</li>
												</ul>
											</div>
											<div class="booking-info">
												<h2>
												<a href="video-material-lesson?c_id=<?php echo $did; ?>">
											<?php echo $dcname; ?> </a>
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
													<li>
														<i class="fa fa-star-empty"></i>
													</li>
												</ul>
												<p>
													 <?php echo $cdes; ?>
												</p>
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
							<div id="tab_3" class="tab-pane active">
								<div class="row booking-results">
									<?php 
// sending query
$result = mysql_query("SELECT * FROM dept WHERE type_id = 7 ORDER BY position_id ASC;");
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
		
			$did = MYSQL_RESULT($result,$i,"dept_id");
			$cname = MYSQL_RESULT($result,$i,"department");
			$dcname = MYSQL_RESULT($result,$i,"name");
			$img = MYSQL_RESULT($result,$i,"image_name");
			$tid = MYSQL_RESULT($result,$i,"type_id");
			$pid = MYSQL_RESULT($result,$i,"position_id");
			$clevel = MYSQL_RESULT($result,$i,"course_level");
			$cdes = MYSQL_RESULT($result,$i,"course_des");
			$cage = MYSQL_RESULT($result,$i,"age");
?>
									<div class="col-md-6">
										<div class="booking-result">
											<div class="booking-img">
												<img src="../../uploads/thumb/<?php echo $img; ?>" alt="">
												<ul class="list-unstyled price-location">
													<li>
														<i class="fa fa-child"></i> <?php echo $clevel; ?>
													</li>
													<li>
														<i class="fa fa-mortar-board"></i> Minimum Age <?php echo $cage; ?>
													</li>
												</ul>
											</div>
											<div class="booking-info">
												<h2>
												<a href="course-material-lesson?c_id=<?php echo $did; ?>&cname=<?php echo $dcname; ?>">
											<?php echo $dcname; ?> </a>
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
													<li>
														<i class="fa fa-star-empty"></i>
													</li>
												</ul>
												<p>
													 <?php echo $cdes; ?>
												</p>
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
						</div>
					</div>
				</div>
				<!--end tabbable-->
			</div>
			<!-- END PAGE CONTENT INNER -->
		</div>
	</div>
<!-- END PAGE CONTAINER -->
<?php echo $fot; ?>