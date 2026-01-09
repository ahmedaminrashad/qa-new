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
  include("header.php");
  
date_default_timezone_set("Africa/Cairo");
$mon = date('F');
$monid = date('n');
if($mon== "January") 
        {
            $m = 1;
        }
    elseif($mon== "February")
        {
            $m = 2;
        } 
    elseif($mon== "March") 
        {
            $m = 3;
        } 
    elseif($mon== "April")
        {
            $m = 4;
        } 
    elseif($mon== "May")
        {
            $m = 5;
        } 
    elseif($mon== "June") 
        {
            $m = 6;
        } 
    elseif($mon== "July")
        {
            $m = 7;
        } 
    elseif($mon== "August") 
        {
            $m = 8;
        } 
    elseif($mon== "September")
        {
            $m = 9;
        } 
    elseif($mon== "October")
        {
            $m = 10;
        } 
    elseif($mon== "November") 
        {
            $m = 11;
        }
    else 
        {
    // Since it is not any of the days above it must be Saturday
            $m = 12;
        }
date_default_timezone_set("Africa/Cairo");
$sy = date('Y');
if($sy == "2014") 
        {
            $y = 1;
        }
    elseif($sy == "2015")
        {
           $y = 2;
        } 
    elseif($sy == "2016") 
        {
            $y = 3;
        }
    elseif($sy == "2017") 
        {
            $y = 4;
        }
    elseif($sy == "2018") 
        {
            $y = 5;
        }
    elseif($sy == "2019") 
        {
            $y = 6;
        }
    elseif($sy == "2020") 
        {
            $y = 7;
        }

  require ("../includes/dbconnection.php");
  $Course_ID =base64_decode($_GET["Course_ID"]);

function history($con, $month, $year, $id){
			$result = mysql_query("SELECT * FROM History2 WHERE admin_date  = '$con' AND admin_month = '$month' AND admin_year = '$year' AND course_id = '$id'");

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
			$his_id = MYSQL_RESULT($result,$i,"history1_id");
			$fff = MYSQL_RESULT($result,$i,"a_id");
			if ($fff == 9){
				echo '<span class="label label-danger"><strong>Still Pending</strong></span>';
				}
			elseif ($fff >= 1 && $fff <= 8){
			echo '<a href="history-details?history_id='.$his_id.'"><button type="button" class="btn green btn-xs">See Details</button></a>';
			}
				}
}

function teacher($con, $month, $year, $id){
			$result = mysql_query("SELECT `History2`.*,`profile`.`teacher_name` FROM `History2`,`profile` WHERE History2.teacher_id=profile.teacher_id HAVING admin_date  = '$con' AND admin_month = '$month' AND admin_year = '$year' AND course_id = '$id'");

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
			$teacher = MYSQL_RESULT($result,$i,"teacher_name");
			echo $teacher;
				}
}


function attend($con, $month, $year, $id){
			$result = mysql_query("SELECT `History2`.*,`attend`.`mark` FROM `History2`,`attend` WHERE History2.a_id=attend.a_id HAVING admin_date  = '$con' AND admin_month = '$month' AND admin_year = '$year' AND course_id = '$id'");

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
			$attend = MYSQL_RESULT($result,$i,"mark");
			echo $attend;
				}
}

function remark($con, $month, $year, $id){
			$result = mysql_query("SELECT `History2`.*,`remaks`.`remak` FROM `History2`,`remaks` WHERE History2.teacher_remarks=remaks.remk_id HAVING admin_date  = '$con' AND admin_month = '$month' AND admin_year = '$year' AND course_id = '$id'");

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
			$rmak = MYSQL_RESULT($result,$i,"remak");
			echo $rmak;
				}
}

function sum1($con, $month, $year, $id){
			$result =  mysql_query("SELECT * FROM `History2` WHERE admin_date  = '$con' AND admin_month = '$month' AND admin_year = '$year' AND course_id = '$id'");
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
			$fff = MYSQL_RESULT($result,$i,"a_id");
			if ($fff == 9){
				echo "#FFFFA9";
				}
			elseif ($fff >= 1 && $fff <= 8){
				echo "#E2FFE2";
				}
			else {
				echo "#fff";
				}
				}
}

function uuu($con, $month, $year, $id){
			$result =  mysql_query("SELECT * FROM `History2` WHERE admin_date  = '$con' AND admin_month = '$month' AND admin_year = '$year' AND course_id = '$id'");
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
			$start_t = MYSQL_RESULT($result,$i,"start_time");
			$end_t = MYSQL_RESULT($result,$i,"end_time");
			echo '<font color="#44B6AE"><b>'.$start_t.'</b></font> to <font color="#E35B5A"><b>'.$end_t.'</b></font>';
				}
}

function delete($con, $month, $year, $id){
			$result = mysql_query("SELECT * FROM History2 WHERE admin_date  = '$con' AND admin_month = '$month' AND admin_year = '$year' AND course_id = '$id'");

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
			$his_id = MYSQL_RESULT($result,$i,"history1_id");
			echo '<a href="history-delete?history_id='.$his_id.'"><button type="button" class="btn red btn-xs"><i class="fa fa-ban"></i></button></a>';
				}
}

function edit($con, $month, $year, $id){
			$result = mysql_query("SELECT * FROM History2 WHERE admin_date  = '$con' AND admin_month = '$month' AND admin_year = '$year' AND course_id = '$id'");

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
			$his_id = MYSQL_RESULT($result,$i,"history1_id");
			echo '<a href="history-edit?history_id='.$his_id.'"><button type="button" class="btn yellow btn-xs"><i class="fa fa-edit"></i></button></a>';
				}
}
?>
<?php echo $main_header; ?>
<head>
<link href="../assets/global/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css" rel="stylesheet" type="text/css"/>
<link href="../assets/global/plugins/bootstrap-modal/css/bootstrap-modal.css" rel="stylesheet" type="text/css"/>
</head>
<!-- BEGIN TOP NAVIGATION MENU -->
			<div class="top-menu">
				<ul class="nav navbar-nav pull-right">
					<li class="dropdown dropdown-extended dropdown-dark dropdown-inbox" id="header_inbox_bar">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						<span class="circle">3</span>
						<span class="corner"></span>
						</a>
						<ul class="dropdown-menu">
							<li class="external">
								<h3>You have <strong>7 New</strong> Messages</h3>
								<a href="javascript:;">view all</a>
							</li>
							<li>
								<ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
									<li>
										<a href="inbox.html?a=view">
										<span class="photo">
										<img src="../assets/admin/layout3/img/avatar2.jpg" class="img-circle" alt="">
										</span>
										<span class="subject">
										<span class="from">
										Lisa Wong </span>
										<span class="time">Just Now </span>
										</span>
										<span class="message">
										Vivamus sed auctor nibh congue nibh. auctor nibh auctor nibh... </span>
										</a>
									</li>
								</ul>
							</li>
						</ul>
					</li>
					<!-- END INBOX DROPDOWN -->
					<!-- BEGIN USER LOGIN DROPDOWN -->
					<li class="dropdown dropdown-user dropdown-dark">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						<img alt="" class="img-circle" src="../assets/admin/layout3/img/<?php echo $_SESSION['is']['teacher_id'];?>a.jpg">
						<span class="username username-hide-mobile"><?php echo $_SESSION['is']['teacher_name']; ?></span>
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
									 Start/End
								</th>
								<th>
									 Teacher
								</th>
								<th>
									 Status
								</th>
								<th>
									 Remarks
								</th>
								<th>
									 Details
								</th>
								<th>
									 &nbsp;
								</th>
								<th>
									 &nbsp;
								</th>
								<?php
$date = ''.$sy.'-'.$monid.'-01';
$end = ''.$sy.'-'.$monid.'-' . date('t', strtotime($date)); //get end date of month
?>
<?php while(strtotime($date) <= strtotime($end)) {
        $day_num = date('Y-m-d', strtotime($date));
        $day_name = date('l', strtotime($date));
        $date = date("Y-m-d", strtotime("+1 day", strtotime($date)));
    ?>
    </thead>
								
								<tbody>
								<tr bgcolor="<?php echo sum1("$day_num","$monid","$y","$Course_ID"); ?>">
								<td><?php echo $day_num; ?> - <?php echo $day_name; ?></td>
								<td><?php echo uuu("$day_num","$monid","$y","$Course_ID"); ?></td>
								<td><?php echo teacher("$day_num","$monid","$y","$Course_ID"); ?></td>
								<td><?php echo attend("$day_num","$monid","$y","$Course_ID"); ?></td>
								<td><?php echo remark("$day_num","$monid","$y","$Course_ID"); ?></td>
								<td><?php echo history("$day_num","$monid","$y","$Course_ID"); ?></td>
								<td><?php echo edit("$day_num","$monid","$y","$Course_ID"); ?></td>
								<td><?php echo delete("$day_num","$monid","$y","$Course_ID"); ?></td>
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
  <option value="<?php echo $row['year_id'];?>"><?php echo $row['school_year'];?> </option>
  <?php } while ($row = mysql_fetch_assoc($result)); ?>
</select>
<span class="help-block">
																Please Select Year. </span>

<input type="hidden" id="Course_ID" name="Course_ID"  value="<?php echo base64_encode($Course_ID); ?>" />

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
<script src="../assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="../assets/admin/layout3/scripts/layout.js" type="text/javascript"></script>
<script src="../assets/admin/layout3/scripts/demo.js" type="text/javascript"></script>
<script src="../assets/admin/pages/scripts/ui-extended-modals.js"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<?php echo $fot; ?>