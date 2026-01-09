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
function group_name($var)
  {
			$result = mysql_query("SELECT * FROM employee_catagory WHERE cat_id = $var");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0){
			echo 'General';
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
				{			
					$hidden_pcourse = MYSQL_RESULT($result,$i,"cat_id");
					$hidden_proom = MYSQL_RESULT($result,$i,"cat_name");
					echo $hidden_proom;	
	$i++;	 
			}
			}
	}
function cun_ann()
  	{$sy = date('Y-m-d');
  		$result = mysql_query("SELECT * FROM announcement WHERE (ann_cat = 4 or ann_cat = 17) and ann_date <= '$sy' AND ann_end >= '$sy'");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRowsot = MYSQL_NUMROWS($result);
echo number_format($numberOfRowsot, 0);
}
function all_ann()
  	{$sy = date('Y-m-d');
  		$result = mysql_query("SELECT * FROM announcement where ann_cat = 4 or ann_cat = 17");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRowsot = MYSQL_NUMROWS($result);
echo number_format($numberOfRowsot, 0);
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
				<h1>Announcements <small>Current</small></h1>
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
					<a href="admin-home">Home</a><i class="fa fa-circle"></i>
				</li>
				<li class="active">
					 Announcements
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN TODO SIDEBAR -->
					<div class="todo-sidebar">
						<div class="portlet light">
							<div class="portlet-title">
								<div class="caption" data-toggle="collapse" data-target=".todo-project-list-content">
									<span class="caption-subject font-green-sharp bold uppercase">ANNOUNCEMENTS </span>
									<span class="caption-helper visible-sm-inline-block visible-xs-inline-block">click to view project list</span>
								</div>
							</div>
							<div class="portlet-body todo-project-list-content">
								<div class="todo-project-list">
									<ul class="nav nav-pills nav-stacked">
										<li class="active">
											<a href="current-announcement">
											<span class="badge badge-success badge-active"> <?php echo cun_ann(); ?> </span> ACTIVE </a>
										</li>
										<li>
											<a href="all-announcement">
											<span class="badge badge-success"> <?php echo all_ann(); ?> </span> ALL </a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<!-- END TODO SIDEBAR -->
					<!-- BEGIN TODO CONTENT -->
					<div class="todo-content">
						<div class="portlet light">
							<!-- PROJECT HEAD -->
							<div class="portlet-title">
								<div class="caption">
									<i class="icon-bar-chart font-green-sharp hide"></i>
									<span class="caption-helper">Announcements:</span> &nbsp; <span class="caption-subject font-green-sharp bold uppercase">ACTIVE (<?php echo cun_ann(); ?>)</span>
								</div>
							</div>
							<!-- end PROJECT HEAD -->
							<div class="portlet-body">
								<div class="row">
									<div class="">
										<div class="scroller" style="max-height: 800px;" data-always-visible="0" data-rail-visible="0" data-handle-color="#dae3e7">
											<div class="todo-tasklist">
											<?php 
// sending query
$result = mysql_query("SELECT * FROM announcement WHERE (ann_cat = 4 or ann_cat = 17) and ann_date <= '$sy' AND ann_end >= '$sy'");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
If ($numberOfRows == 0) 
	{
	echo '<div class="label label-info">No Announcement Found!</div>';
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
		
			$annid = MYSQL_RESULT($result,$i,"ann_id");
			$sdate = MYSQL_RESULT($result,$i,"ann_date");
			$anncat = MYSQL_RESULT($result,$i,"ann_cat");
			$msg = MYSQL_RESULT($result,$i,"ann_msg");
			$edate = MYSQL_RESULT($result,$i,"ann_end");
?>
													<div class="todo-tasklist-item todo-tasklist-item-border-green">
													<div class="todo-tasklist-item-title">
														<font color="#A80707">For <?php echo group_name("$anncat"); ?></font>
													</div>
													<div class="todo-tasklist-item-text">
														 <?php echo $msg; ?>
													</div>
													<div class="todo-tasklist-controls pull-left">
														<span class="todo-tasklist-date"><i class="fa fa-calendar"></i> <span class="font-green"><?php echo $sdate; ?></span>-<span class="font-red"><?php echo $edate; ?></span> </span>
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
<?php echo $fot; ?>