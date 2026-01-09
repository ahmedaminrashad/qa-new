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
include("../includes/teacher_rights.php");  $tt = $_SESSION['is']['teacher_id'];
   mysql_query("UPDATE note_student SET status = '3' WHERE status = '2' AND teacher_id = '$tt'") or die(mysql_error());
   include("header.php");
?>
<?php echo $main_header; ?>
<head>
<link href="../../assets/admin/pages/css/timeline-old.css" rel="stylesheet" type="text/css"/>
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
				<h1>All <small>Notes</small></h1>
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
					<a href="teacher-home">Home</a><i class="fa fa-circle"></i>
				</li>
				<li class="active">
					 Notes
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="portlet light">
				<div class="portlet-body">
					<div class="row">
				<div class="col-md-12">
							<ul class="timeline">
							<?php 
// sending query
$result = mysql_query("SELECT * FROM note_student WHERE status > 1 AND teacher_id = '$tt' ORDER BY note_id DESC;");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
If ($numberOfRows == 0) 
	{
	echo 'No Pending Note Found';
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
?>
								<li class="timeline-yellow">
									<div class="timeline-time">
										<span class="date">
										<?php echo $adate; ?> </span>
										<span class="time">
										<?php echo $atime; ?> </span>
									</div>
									<div class="timeline-icon">
										<i class="fa fa-comments"></i>
									</div>
									<div class="timeline-body">
										<h2><?php echo $atname; ?></h2>
										<div class="timeline-content">
											<strong><?php echo $asname; ?> <i class="fa fa-arrow-right"></i></strong> <?php echo $anote; ?><br>
											<?php if ($astatus > 1){echo '<strong>FeedBack <i class="fa fa-arrow-right"></i></strong> '.$afb.'';} else {echo '';} ?>											
											</div>
										<div class="timeline-footer">
											<?php if ($astatus == 1){echo '<span class="label label-sm label-danger">Pending</span>';} elseif ($astatus > 1){echo '<span class="label label-sm label-success">Cleared On '.$ardate.' ('.$artime.')</span>';} ?>
										</div>
									</div>
								</li>
								<?php 	
		$i++;		
		}
	}	
?>
							</ul>
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