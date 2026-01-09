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
   require ("../includes/dbconnection.php");
  include("header.php");
  include("monitoring-functions.php");
  $pT =base64_decode($_GET['profile_no']);
function class_monitor($var1, $var2, $var3)
{
$mm_id = date('m');
$yy_id = date('Y');
$result = mysql_query("SELECT history_id FROM class_history WHERE course_id = '$var1' AND teacher_id = '$var2' AND monitor_id = '$var3' AND MONTH(date_admin) = '$mm_id' AND YEAR(date_admin) = '$yy_id'");
if (!$result) 
	{
    die("Query to show");
	}
$numberOfRows = MYSQL_NUMROWS($result);
If ($numberOfRows == 0) 
	{
	echo '--';
	}
else if ($numberOfRows > 0) 
	{
	echo $numberOfRows;
	}

}
function class_paid($var1, $var2, $a)
{
$mm_id = date('m');
$yy_id = date('Y');
$result = mysql_query("SELECT history_id FROM class_history WHERE course_id = '$var1' AND re_status != 2 AND teacher_id = '$var2' AND MONTH(date_admin) = '$mm_id' AND YEAR(date_admin) = '$yy_id' AND (monitor_id = 4 OR monitor_id = 9 OR monitor_id = 6 OR monitor_id = 21)");
if (!$result) 
	{
    die("Query to show");
	}
$numberOfRows = MYSQL_NUMROWS($result);
If ($numberOfRows == 0) 
	{
	echo '--';
	}
else if ($numberOfRows > 0) 
	{
	if ($a == 1){
	echo $numberOfRows;
	}
	elseif ($a == 2){
	echo $numberOfRows/2;
	}
	}

}
function class_paid_total($var2, $a)
{
$mm_id = date('m');
$yy_id = date('Y');
$result = mysql_query("SELECT history_id FROM class_history WHERE teacher_id = '$var2' AND re_status != 2 AND MONTH(date_admin) = '$mm_id' AND YEAR(date_admin) = '$yy_id' AND (monitor_id = 4 OR monitor_id = 9 OR monitor_id = 6 OR monitor_id = 21)");
if (!$result) 
	{
    die("Query to show");
	}
$numberOfRows = MYSQL_NUMROWS($result);
If ($numberOfRows == 0) 
	{
	echo '--';
	}
else if ($numberOfRows > 0) 
	{
	if ($a == 1){
	echo $numberOfRows;
	}
	elseif ($a == 2){
	echo $numberOfRows/2;
	}
	}

}
?>
<?php
date_default_timezone_set("Africa/Cairo");
$sy = date('Y-m-d');
$mm_id = date('m');
$yy_id = date('Y');
?>
<?php echo $main_header; ?>
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
				<h1>Teacher<small> Student's List</small></h1>
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
					<a href="parent-accounts">List of Teachers</a><i class="fa fa-circle"></i>
				</li>
				<li class="active">
					 List of Students of <?php 
$result1 = mysql_query("SELECT * FROM profile HAVING teacher_id='$pT'");
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
			$teacher = MYSQL_RESULT($result1,$i,"teacher_name");
				}			
		echo $teacher; ?>
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN SAMPLE TABLE PORTLET-->
					<div class="portlet light">
					<h4><?php 
$result = mysql_query("SELECT * FROM course WHERE Teacher = '$pT'");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
echo "Total Number of Students: $numberOfRows"; ?></h4>
<a class="btn default" data-target="#full-width" data-toggle="modal">
									View Previous Month Class History <b>(<?php echo date('F'); ?>-<?php echo date('Y'); ?>)</b></a>
						<div class="portlet-body">
							<div id="mytable" class="table-responsive">
								<table class="table table-hover">
								<thead>
								<tr>
								<th>
									 Sr.No
								</th>
								<th>
									 Student Name
								</th>
								<th>
									 Taken
								</th>
								<th>
									 Absent
								</th>
								<th>
									 Leave
								</th>
								<th>
									 Declined
								</th>
								<th>
									 Pending
								</th>
								<th>
									 Holiday
								</th>
								<th>
									 Paid
								</th>
								<th>
									 Hours
								</th>
								<?php
// sending query
   $result = mysql_query("SELECT * FROM `class_history` WHERE teacher_id = '$pT' AND MONTH(date_admin) = '$mm_id' AND YEAR(date_admin) = '$yy_id' GROUP BY course_id;");
   $counter = 0;
if (!$result) 
	{
    die("Query to show");
	}
$numberOfRows = MYSQL_NUMROWS($result);
If ($numberOfRows == 0) 
	{
	echo '<div class="label label-info">Sorry, no record found!</div>';
	}
else if ($numberOfRows > 0) 
	{
	while($row = mysql_fetch_array($result))
		{		
			$sched_id = MYSQL_RESULT($result,$i,"history_id");
			$admin_time = MYSQL_RESULT($result,$i,"atime_s_id");
			$student_time = MYSQL_RESULT($result,$i,"stime_s_id");
			$teacher_time = MYSQL_RESULT($result,$i,"time_s_id");
			$teacher_id = MYSQL_RESULT($result,$i,"teacher_id");
			$student_id = MYSQL_RESULT($result,$i,"course_id");
			$parent_id = MYSQL_RESULT($result,$i,"parent_id");
			$monitor = MYSQL_RESULT($result,$i,"monitor_id");// pending, taken, absent, leave, taken advance, running, waiting or still pending
			$dept_id = MYSQL_RESULT($result,$i,"dept_id");
			$pstr = MYSQL_RESULT($result,$i,"time_s_id");
			$wa = MYSQL_RESULT($result,$i,"activation");
			$status = MYSQL_RESULT($result,$i,"status");// Regular, Trial, Rescheduled or Suspended
			$re_status = MYSQL_RESULT($result,$i,"re_status");
			$his_date = MYSQL_RESULT($result,$i,"date_admin");
?>
							</tr>
								</thead>
								<tbody>
								<tr>
								<td>
									 <?php echo ++$counter; ?>
								</td>
								<td>
									 <a href="parent-accounts-profile?parent_id=<?php echo base64_encode($parent_id); ?>"><?php echo StudentName("$student_id"); ?></a>
								</td>
								<td>
									 <span class="caption-subject bold font-green-sharp"><?php echo class_monitor("$student_id","$pT", "9"); ?></span>
								</td>
								<td>
									 <span class="caption-subject bold font-green-sharp"><?php echo class_monitor("$student_id","$pT", "4"); ?></span>
								</td>
								<td>
									 <span class="caption-subject bold font-red"><?php echo class_monitor("$student_id","$pT", "5"); ?></span>
								</td>
								<td>
									 <span class="caption-subject bold font-green-sharp"><?php echo class_monitor("$student_id","$pT", "6"); ?></span>
								</td>
								<td>
									 <span class="caption-subject bold font-red"><?php echo class_monitor("$student_id","$pT", "1"); ?></span>
								</td>
								<td>
									 <span class="caption-subject bold font-green-sharp"><?php echo class_monitor("$student_id","$pT", "21"); ?></span>
								</td>
								<td>
									 <span class="caption-subject bold font-green-sharp"><?php echo class_paid("$student_id","$pT","1"); ?></span>
								</td>
								<td>
									 <span class="caption-subject bold font-green-sharp"><?php echo class_paid("$student_id","$pT","2"); ?></span>
								</td>
							</tr>
							<?php 	
		$i++;		
		}
	}	
?>
								<tr>
								<td colspan="7" style="text-align:right">
									 <span class="caption-subject bold font-green-sharp">Total</span>
								</td>
								<td>
									 
								</td>
								<td>
									 <span class="caption-subject bold font-green-sharp"><?php echo class_paid_total("$pT","1"); ?></span>
								</td>
								<td>
									 <span class="caption-subject bold font-green-sharp"><?php echo class_paid_total("$pT","2"); ?></span>
								</td>
							</tr>
								</tbody>
								</table>
							</div>
						</div>
						<!-- full width -->
								<div class="modal fade" id="full-width" tabindex="-1" role="dialog" aria-hidden="true">
								<div class="modal-dialog modal-full">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title">Search For Previous Month Records</h4>
										</div>
										<div class="modal-body">
								<div class="portlet box green">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-chevron-right"></i>Search For Previous Month Records
										</div>
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="teacher-class-anylasis-search" method="GET" class="form-horizontal">
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
  <option value="<?php echo $row['num'];?>"><?php echo $row['month_name'];?> </option>
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

<input type="hidden" id="profile_no" name="profile_no"  value="<?php echo $_GET['profile_no']; ?>" />

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
<script language="javascript" >
	var form = document.forms[0];
	//purpose?: to retrieve what users last input on the field..
	form.month_id.value = ("<?php echo $mm_id; ?>");
	form.year_id.value = ("<?php echo $yy_id; ?>");
	//alert (form.pCityM.value);				
</script>