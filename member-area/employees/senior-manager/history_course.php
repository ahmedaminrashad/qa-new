<?php if (empty($session)) { session_start(); } 
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
?>
<?php
  include("../includes/session.php");
  include("../includes/s_manager_rights.php");
  require ("../includes/dbconnection.php");
  include("header.php");
  $Course_ID =base64_decode($_GET["Course_ID"]);
date_default_timezone_set("Africa/Cairo");
$monid = date('n');
$sy = date('Y');
function history($con){
$Course_ID =base64_decode($_GET["Course_ID"]);
			$result = mysql_query("SELECT * FROM `class_history` WHERE date_admin = '$con' AND course_id = '$Course_ID'");

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
				// $this_course_ID = MYSQL_RESULT($result,$i,"course_id");
			$fff = MYSQL_RESULT($result,$i,"monitor_id");
			$course = MYSQL_RESULT($result,$i,"course_id");
			$addate = MYSQL_RESULT($result,$i,"date_admin");
			echo '<a href="history-details?cour='.$course.'&adate='.$addate.'"><button type="button" class="btn green btn-xs">See Details</button></a>';
				}
}

function sum1($con){
$Course_ID =base64_decode($_GET["Course_ID"]);
			$result =  mysql_query("SELECT * FROM `class_history` WHERE date_admin = '$con' AND course_id = '$Course_ID'");
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
				echo '#BCF5A9';
				}
}

function uuu($con){
$Course_ID =base64_decode($_GET["Course_ID"]);
			$result = mysql_query("SELECT `class_history`.*,`monitor`.`mnt_name`,`profile`.`teacher_name` FROM `class_history`,`monitor`,`profile` WHERE class_history.monitor_id=monitor.mnt_id AND class_history.teacher_id=profile.teacher_id HAVING date_admin = '$con' AND course_id = '$Course_ID'");

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
	while ($i<$numberOfRows)
		{
			$attend = MYSQL_RESULT($result,$i,"mnt_name");
			$monitor = MYSQL_RESULT($result,$i,"monitor_id");
			$teacher = MYSQL_RESULT($result,$i,"teacher_name");
			$start_t = MYSQL_RESULT($result,$i,"start_time");
			$end_t = MYSQL_RESULT($result,$i,"end_time");
			$re_status = MYSQL_RESULT($result,$i,"re_status");
			if ($re_status == 2){
				$set_icon= '<i class="fa fa-check"></i>';
				}
			if ($monitor == 2 OR $monitor == 3){
				$set= '<span class="label label-sm label-warning">';
				}
			elseif ($monitor == 4 OR $monitor == 5 OR $monitor == 6 OR $monitor == 8){
				$set='<span class="label label-sm label-info">';
				}
			elseif ($monitor == 7){
				$set='<span class="label label-sm label-danger">';
				}
			elseif ($monitor == 9){
				$set='<span class="label label-sm label-success">';
				}
			elseif ($monitor == 1){
				$set='<span class="label label-sm label-danger">';
				}
			$start_date = new DateTime("$start_t");
			$end_date = new DateTime("$end_t");
			$interval = $start_date->diff($end_date);
    echo ''.$set.''.$set_icon.' '.$interval->h.':' . $interval->i.':'.$interval->s.' '.$attend.' ('.$teacher.')</span> ';
				$i++;		
		}
	}}


?>
<?php echo $main_header; ?>
<head>
<link href="../assets/global/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css" rel="stylesheet" type="text/css"/>
<link href="../assets/global/plugins/bootstrap-modal/css/bootstrap-modal.css" rel="stylesheet" type="text/css"/>
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
				<h1>Student<small> History</small></h1>
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
					 Class History of <?php
				$Course_ID =base64_decode($_GET["Course_ID"]);
				$result = mysql_query("SELECT * FROM course HAVING course_id='$Course_ID'");
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
			$course = MYSQL_RESULT($result,$i,"course_yrSec");
				}
				echo $course;				
				?>
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->

					<!-- BEGIN SAMPLE TABLE PORTLET-->
						<div class="portlet light">
						
						<h3>Class History of <font color="#44B6AE"> <b><?php
				$Course_ID =base64_decode($_GET["Course_ID"]);
				$result = mysql_query("SELECT * FROM course HAVING course_id='$Course_ID'");
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
			$course = MYSQL_RESULT($result,$i,"course_yrSec");
				}
				echo $course;				
				?></b></font> for <?php echo $mon; ?>-<?php echo $sy; ?></h3>
									<a class="btn default" data-target="#full-width" data-toggle="modal">
									View Previous Month Class History</a>
											<div class="portlet-body">
							<div id="mytable" class="table-responsive">
								<table class="table table-hover">
								<thead>
								<tr>
								<th>
									 Date/Day
								</th>
								<th>
									 Classes
								</th>
								<th>
									 Details
								</th>
								<?php
$date = ''.$sy.'-'.$monid.'-01';
$end = ''.$sy.'-'.$monid.'-' . date('t', strtotime($date)); //get end date of month
?>
<?php while(strtotime($date) <= strtotime($end)) {
        $day_num = date('Y-m-d', strtotime($date));
        $day_name = date('D', strtotime($date));
        $date = date("Y-m-d", strtotime("+1 day", strtotime($date)));
    ?>
    </thead>
								
								<tbody>
								<tr bgcolor="<?php echo sum1("$day_num"); ?>">
								<td><?php echo $day_num; ?> - <?php echo $day_name; ?></td>
								<td><?php echo uuu("$day_num"); ?></td>
								<td><?php echo history("$day_num","$Course_ID"); ?></td>
    							</tr>
    							<?php 	
	}	
?>
								</tbody>
								</table>
							</div>
						</div>
					</div>
					<!-- END SAMPLE TABLE PORTLET-->
					<!-- full width -->
							<div id="full-width" class="modal container fade" tabindex="-1">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
								</div>
								<div class="portlet box green">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-chevron-right"></i>Search For Previous Month Class History
										</div>
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="history_course_search" method="GET" class="form-horizontal">
											<div class="form-body">
												<h3 class="form-section">Please Select Desired Month and Year</h3>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Month</label>
															<div class="col-md-9">
																<select required class="form-control" name="month_id"  id="month_id">

																	<?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$result = mysql_query("SELECT * FROM month ORDER BY month_id ");			  	
				do {  ?>
  <option value="<?php echo $row['month_id'];?>"><?php echo $row['month_name'];?> </option>
  <?php } while ($row = mysql_fetch_assoc($result)); ?>
</select>
																<span class="help-block">
																Please Select Month. </span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Year</label>
															<div class="col-md-9">
															<select required class="form-control" name="year_id"  id="year_id">
																<?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$result = mysql_query("SELECT * FROM school_yr ORDER BY year_id ");			  	
				do {  ?>
  <option value="<?php echo $row['school_year'];?>"><?php echo $row['school_year'];?> </option>
  <?php } while ($row = mysql_fetch_assoc($result)); ?>
</select>
<span class="help-block">
																Please Select Year. </span>

<input type="hidden" id="Course_ID" name="Course_ID"  value="<?php echo base64_decode($_GET["Course_ID"]); ?>" />

															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
												</div>
											<div class="form-actions">
												<div class="row">
													<div class="col-md-6">
														<div class="row">
															<div class="col-md-offset-3 col-md-9">
																<button type="submit" class="btn green">Submit</button>
															</div>
														</div>
													</div>
												</div>
											</div>
										</form>
										<!-- END FORM-->
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
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="../assets/global/plugins/bootstrap-modal/js/bootstrap-modalmanager.js" type="text/javascript"></script>
<script src="../assets/global/plugins/bootstrap-modal/js/bootstrap-modal.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="../assets/admin/pages/scripts/ui-extended-modals.js"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<?php echo $fot; ?>