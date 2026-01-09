<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ini_set('log_errors', 1);

if (session_status() !== PHP_SESSION_ACTIVE) session_start();

include("../includes/session1.php");
require("../includes/dbconnection.php");
require_once("../includes/mysql-compat.php");

if (!isset($conn) || !$conn instanceof mysqli) {
    die("Database connection not available. Please contact administrator.");
}

include("header.php");
date_default_timezone_set("Africa/Cairo");
$data_date1 = date('Y-m-d', time());
$date_get = isset($_REQUEST['date']) ? $_REQUEST['date'] : '';
if (!empty($date_get)) {$data_date = $date_get;} else { $data_date = $data_date1; }
$sy = date('Y-m-d');
$mm_id = date('m');
$yy_id = date('Y');
include("monitoring-functions.php");
if (!function_exists('ttm')) {
function ttm($t1, $t2){
$startTime = new DateTime($t1);
$endTime = new DateTime($t2);
$duration = $startTime->diff($endTime); //$duration is a DateInterval object
echo $duration->format("%H:%I");
}
}
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
				<h1>Admin Home<small> Today's Classes</small></h1>
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
					 Current Day Class Progress
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
					<div class="row">
				<div class="col-md-12">
					<!-- BEGIN SAMPLE TABLE PORTLET-->
					<div class="row">
					<div class="tiles">
					<a href="admin-home-all?date=<?php echo $data_date; ?>"><div class="tile bg-blue-hoki">
					<div class="tile-body">
						<i class="fa fa-calendar"></i>
					</div>
					<div class="tile-object">
						<div class="name">
							 Total
						</div>
						<div class="number">
							 <?php $result = mysql_query("SELECT * FROM class_history WHERE date_admin = '$data_date'");
if (!$result) 
	{
    die("Query to show fields from table failed all class");
	}
$rnumberOfRows = MYSQL_NUMROWS($result);
echo $rnumberOfRows; ?>
						</div>
					</div>
				</div></a>
					<a href="admin-home-taken-classes?date=<?php echo $data_date; ?>"><div class="tile bg-green-haze">
					<div class="tile-body">
						<i class="fa fa-check"></i>
					</div>
					<div class="tile-object">
						<div class="name">
							 Taken
						</div>
						<div class="number">
							 <?php echo today("$data_date", "9"); ?>
						</div>
					</div>
				</div></a>
				<a href="admin-home-remaining-classes?date=<?php echo $data_date; ?>"><div class="tile bg-red-intense">
					<div class="tile-body">
						<i class="fa fa-clock-o"></i>
					</div>
					<div class="tile-object">
						<div class="name">
							 Remaining
						</div>
						<div class="number">
							 <?php echo today("$data_date", "1"); ?>
						</div>
					</div>
				</div></a>
				<a href="admin-home-running-classes?date=<?php echo $data_date; ?>"><div class="tile bg-yellow-crusta">
					<div class="tile-body">
						<i class="fa fa-asterisk"></i>
					</div>
					<div class="tile-object">
						<div class="name">
							 Running
						</div>
						<div class="number">
							 <?php echo today("$data_date", "3"); ?>
						</div>
					</div>
				</div></a>
				<a href="admin-home-absents?date=<?php echo $data_date; ?>"><div class="tile bg-red">
					<div class="tile-body">
						<i class="fa fa-times"></i>
					</div>
					<div class="tile-object">
						<div class="name">
							 Absent
						</div>
						<div class="number">
							 <?php echo today("$data_date", "4"); ?>
						</div>
					</div>
				</div></a>
				<a href="admin-home-leaves?date=<?php echo $data_date; ?>"><div class="tile bg-blue-madison">
					<div class="tile-body">
						<i class="fa fa-phone"></i>
					</div>
					<div class="tile-object">
						<div class="name">
							 Leave
						</div>
						<div class="number">
							 <?php echo today("$data_date", "5"); ?>
						</div>
					</div>
				</div></a>
				<a href="admin-home-declined?date=<?php echo $data_date; ?>"><div class="tile bg-grey-cascade">
					<div class="tile-body">
						<i class="fa fa-ban"></i>
					</div>
					<div class="tile-object">
						<div class="name">
							 Declined
						</div>
						<div class="number">
							 <?php echo today("$data_date", "6"); ?>
						</div>
					</div>
				</div></a>
				<a href="admin-home-suspended?date=<?php echo $data_date; ?>"><div class="tile bg-red-thunderbird">
					<div class="tile-body">
						<i class="fa fa-frown-o"></i>
					</div>
					<div class="tile-object">
						<div class="name">
							 Suspended
						</div>
						<div class="number">
							 <?php $result = mysql_query("SELECT * FROM class_history WHERE date_admin = '$data_date' AND status = 17");
if (!$result) 
	{
    die("Query to show fields from table failed test 1");
	}
$rnumberOfRows = MYSQL_NUMROWS($result);
echo $rnumberOfRows; ?>
						</div>
					</div>
				</div></a>
				<a href="admin-home-on-trial?date=<?php echo $data_date; ?>"><div class="tile bg-yellow-gold">
					<div class="tile-body">
						<i class="fa fa-headphones"></i>
					</div>
					<div class="tile-object">
						<div class="name">
							 Trial
						</div>
						<div class="number">
							 <?php $result = mysql_query("SELECT * FROM class_history WHERE date_admin = '$data_date'AND status = 11");
if (!$result) 
	{
    die("Query to show fields from table failed test 2");
	}
$rnumberOfRows = MYSQL_NUMROWS($result);
echo $rnumberOfRows; ?>
						</div>
					</div>
				</div></a>
				<a href="admin-home-advance?date=<?php echo $data_date; ?>"><div class="tile bg-purple-medium">
					<div class="tile-body">
						<i class="fa fa-smile-o"></i>
					</div>
					<div class="tile-object">
						<div class="name">
							 Advance
						</div>
						<div class="number">
							 <?php $result = mysql_query("SELECT * FROM class_history WHERE date_admin = '$data_date' AND status = 19");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$rnumberOfRows = MYSQL_NUMROWS($result);
echo $rnumberOfRows; ?>
						</div>
					</div>
				</div></a>
				<a href="admin-home-rescheduled?date=<?php echo $data_date; ?>"><div class="tile bg-green-jungle">
					<div class="tile-body">
						<i class="fa fa-repeat"></i>
					</div>
					<div class="tile-object">
						<div class="name">
							 Re-Scheduled
						</div>
						<div class="number">
							 <?php $result = mysql_query("SELECT * FROM class_history WHERE date_admin = '$data_date' AND status = 20");
if (!$result) 
	{
    die("Query to show fields from table failed test 3");
	}
$rnumberOfRows = MYSQL_NUMROWS($result);
echo $rnumberOfRows; ?>
						</div>
					</div>
				</div></a>
				<a href="list-of-active-students"><div class="tile bg-purple-seance">
					<div class="tile-body">
						<i class="fa fa-user"></i>
					</div>
					<div class="tile-object">
						<div class="name">
							 Students
						</div>
						<div class="number">
							 <?php
// sending query
   $result = mysql_query("SELECT * FROM course WHERE nature = 1");
if (!$result) 
	{
    die("Query to show fields from table failed test 4");
	}
$rnumberOfRows = MYSQL_NUMROWS($result);
echo $rnumberOfRows; ?>
						</div>
					</div>
				</div></a>
				<a href="test_status"><div class="tile bg-purple-seance">
					<div class="tile-body">
						<i class="fa fa-edit"></i>
					</div>
					<div class="tile-object">
						<div class="name">
							 Created
						</div>
						<div class="number">
							 <?php
// sending query
   $result = mysql_query("SELECT * FROM test_results WHERE MONTH(test_date) = $mm_id AND YEAR(test_date) = $yy_id");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$anumberOfRows = MYSQL_NUMROWS($result);
echo $anumberOfRows; ?>
						</div>
					</div>
				</div></a>
				<a href="test_status"><div class="tile bg-purple-seance">
					<div class="tile-body">
						<i class="fa fa-align-center"></i>
					</div>
					<div class="tile-object">
						<div class="name">
							 Remaining
						</div>
						<div class="number">
							 <?php
// sending query
   $result = mysql_query("SELECT * FROM test_results WHERE status_id = 2 AND MONTH(test_date) = $mm_id AND YEAR(test_date) = $yy_id");
if (!$result) 
	{
    die("Query to show fields from table failed test 5");
	}
$lnumberOfRows = MYSQL_NUMROWS($result);
echo $lnumberOfRows; ?>
						</div>
					</div>
				</div></a>
				<a href="test_status"><div class="tile bg-purple-seance">
					<div class="tile-body">
						<i class="fa fa-thumbs-o-down"></i>
					</div>
					<div class="tile-object">
						<div class="name">
							 Refused
						</div>
						<div class="number">
							 <?php
// sending query
   $result = mysql_query("SELECT * FROM test_results WHERE status_id = 3 AND MONTH(test_date) = $mm_id AND YEAR(test_date) = $yy_id");
if (!$result) 
	{
    die("Query to show fields from table failed test 6");
	}
$lnumberOfRows = MYSQL_NUMROWS($result);
echo $lnumberOfRows; ?>
						</div>
					</div>
				</div></a>
				<a href="admin-home-current-classes"><div class="tile bg-blue-chambray">
					<div class="tile-body">
						<i class="fa fa-repeat"></i>
					</div>
					<div class="tile-object">
						<div class="name">
							 See Current Classes
						</div>
						
					</div>
				</div></a>
				</div>
				</div>
					<!-- BEGIN SAMPLE TABLE PORTLET-->
					<div class="portlet light">
						<div class="portlet-title">
						<?php  $error_results = isset($_REQUEST['err']) ? $_REQUEST['err'] : '';
  if ($error_results == 1) { echo '<div class="alert alert-danger">
								<strong>Error!</strong> Please Select atlest one Option.
							</div>'; } ?>
<form action="date_definer" class="horizontal-form" method="post">
											<div class="form-body">
												<div class="row">
													<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
														<div class="form-group">
															<label class="control-label">Class Time</label>
															<select class="form-control" name="time_id"  id="time_id">
                      <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$result = mysql_query("SELECT * FROM TimeTable ORDER BY TimeID");			  	
				do {  ?>
                      <option value="<?php echo $row['TimeName'];?>"><?php echo $row['TimeList'];?></option>
                      <?php } while ($row = mysql_fetch_assoc($result)); ?>
               </select>
														</div>
													</div>
													<!--/span-->
													<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
														<div class="form-group has-error">
															<label class="control-label">Date</label>
															<input type="date" class="form-control" name="date" id="date">
														</div>
													</div>
													<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
														<div class="form-group has-error">
															<label class="control-label">Teacher</label>
  															<input type="text" autocomplete="off" name="pteacher" list="cars" class="form-control" onchange="this.form.submit()" />
<datalist id="cars">
  <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$result = mysql_query("SELECT * FROM profile WHERE (cat_id = 8 or teacher_rights = 1) and active = 1 and training = 1 ORDER BY teacher_id ");			  	
				do {  ?>
                      <option value="<?php echo $row['teacher_id'];?>"> <?php echo $row['teacher_name'];?> (<?php echo $row['Nationality'];?> <?php if ($row['g_id'] == 1) { echo 'Male'; } else { echo 'Female'; }?>)</option>
                      <?php } while ($row = mysql_fetch_assoc($result)); ?>
</datalist>
														</div>
													</div>
													<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
														<div class="form-actions right">
												<button type="submit" class="btn green">Submit</button>
											</div>
													</div>
													<!--/span-->
												</div>
												</div>
												</form>
						</div>
						<div class="portlet-body">
						<h2><?php $old_date_timestamp = strtotime($data_date);
$new_date = date('l jS F-Y', $old_date_timestamp); echo '<span class="label label label-success">'.$new_date.'</span>'; ?> <span class="label label bg-purple">Admin Home</span></h2>
						<table class="table table-hover">
								<thead>
								<tr>
								<th>
									 A-Time
								</th>
								<th>
									 T-Time
								</th>
								<th>
									 S-Time
								</th>
								<th>
									 Online Time
								</th>
								<th>
									 Student
								</th>
								<th>
									 History
								</th>
								<th>
									 Teacher
								</th>
								<th>
									 Status
								</th>
								<th>
									 &nbsp;
								</th>
								<th>
									 &nbsp;
								</th>
								<?php
$date_get = isset($_REQUEST['date']) ? $_REQUEST['date'] : '';
if (!empty($date_get)) {$data_date = $date_get;} else { $data_date = $data_date1; }
   $result = mysql_query("SELECT * FROM `class_history` WHERE date_admin = '$data_date' ORDER BY start_time_A;
  			");
if (!$result) 
	{
    die("Query to show fields from table failed main");
	}
$numberOfRows = MYSQL_NUMROWS($result);
If ($numberOfRows == 0) 
	{
	echo '<div class="label label-info">Sorry, no record found!</div>';
	}
else if ($numberOfRows > 0) 
	{
	$i = 0; // Initialize counter for MYSQL_RESULT
	while($row = mysql_fetch_array($result))
		{		
			if($row['monitor_id']=='2') //waiting
				{
					$bgcolor ='#F5A9A9';
				}
			else if($row['monitor_id']=='3') //running
				{
					$bgcolor ='#F2F5A9';
				}		
			else if($row['monitor_id']=='4') //absent
				{
					$bgcolor ='#F9BCBC';
				}
			else if($row['monitor_id']=='5') //leave
				{
					$bgcolor ='#C3C3FA';
				}
			else if($row['monitor_id']=='6') //declined
				{
					$bgcolor ='#CEECF5';
				}
			else if($row['monitor_id']=='7') //still pending
				{
					$bgcolor ='#FE642E';
				}
			else if($row['monitor_id']=='8') //taken advance
				{
					$bgcolor ='#D8D8D8';
				}
			else if($row['monitor_id']=='9') //taken
				{
					$bgcolor ='#BCF5A9';
				}
			else
				{
					$bgcolor ='#fffff'; // pending
				}
			$sched_id = MYSQL_RESULT($result,$i,"history_id");
			$admin_timeS = MYSQL_RESULT($result,$i,"start_time_A");
			$admin_timeE = MYSQL_RESULT($result,$i,"end_time_A");
			$student_timeS = MYSQL_RESULT($result,$i,"start_time_S");
			$student_timeE = MYSQL_RESULT($result,$i,"end_time_S");
			$teacher_timeS = MYSQL_RESULT($result,$i,"time_start");
			$teacher_timeE = MYSQL_RESULT($result,$i,"time_end");
			$duration = MYSQL_RESULT($result,$i,"duration");
			$teacher_id = MYSQL_RESULT($result,$i,"teacher_id");
			$student_id = MYSQL_RESULT($result,$i,"course_id");
			$parent_id = MYSQL_RESULT($result,$i,"parent_id");
			$monitor = MYSQL_RESULT($result,$i,"monitor_id");// pending, taken, absent, leave, taken advance, running, waiting or still pending
			$dept_id = MYSQL_RESULT($result,$i,"dept_id");
			$wa = MYSQL_RESULT($result,$i,"activation");
			$status = MYSQL_RESULT($result,$i,"status");// Regular, Trial, Rescheduled or Suspended
			$re_status = MYSQL_RESULT($result,$i,"re_status");
			$his_date = MYSQL_RESULT($result,$i,"date_admin");
?>
							</tr>
								</thead>
								<tbody>
								<tr bgcolor="<?php echo $bgcolor; ?>">
								<td> 
									 <?php echo date("g:i a", strtotime($admin_timeS)); ?> (<?php echo ttm($teacher_timeS, $teacher_timeE); ?>)
								</td>
								<td>
									 <?php echo date("g:i a", strtotime($teacher_timeS)); ?> - <?php echo date("g:i a", strtotime($teacher_timeE)); ?>
								</td>
								<td>
									 <?php echo date("g:i a", strtotime($student_timeS)); ?>
								</td>
								<td>
									 <?php echo $wa; ?>
								</td>
								<td>
									 <a href="parent-accounts-profile?parent_id=<?php echo base64_encode($parent_id); ?>"><?php echo StudentName("$student_id"); ?></a>
								</td>
								<td>
									 <a href="history_course?Course_ID=<?php echo base64_encode($student_id); ?>">History</a>
								</td>
								<td>
									 <a href="teacher-accounts-profile?profile_no=<?php echo base64_encode($teacher_id); ?>"><?php echo TeacherName("$teacher_id"); ?></a>
								</td>
								<td><a href="history-details?cour=<?php echo $student_id; ?>&adate=<?php echo $his_date; ?>">
								<?php echo MonitorName("$monitor","$status","$re_status"); ?></a></td>
								<td><a href="valid.php?parent_id=<?php echo $sched_id; ?>"><button type="button" class="btn yellow btn-xs"><i class='fa fa-history'></i></button></a></td>
							</tr>
							<?php 	
		$i++;		
		}
	}	
?>
								</tbody>
								</table>
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