<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ini_set('log_errors', 1);

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

include("../includes/session.php");
require("../includes/dbconnection.php");
require_once("../../includes/mysql-compat.php");

// Check database connection
if (!isset($conn) || !$conn) {
    die("Database connection failed. Please contact the administrator.");
}

include("../includes/teacher_rights.php");
include("header.php");
  function sum($con){
			$result =  mysql_query("SELECT * FROM `course` WHERE course_id  = $con");
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
			$skype = MYSQL_RESULT($result,$i,"Skype_ID");
			echo $skype;
				}
}
function course($con){
			if ($con == 3){echo 'hifz';}
			elseif ($con != 3){echo 'all';}
}
function abc($er)
{
date_default_timezone_set($er);
$date = date('h:i a', time());
echo $date;
}
?>
<?php 
    // set the default timezone to use. Available since PHP 5.1
    date_default_timezone_set($_SESSION['is']['teacher_time']);
    $today = date("l");
    if($today == "Sunday") 
        {
            $c = 7;
        }
    elseif($today == "Monday")
        {
            $c = 1;
        } 
    elseif($today == "Tuesday") 
        {
            $c = 2;
        } 
    elseif($today == "Wednesday")
        {
            $c = 3;
        } 
    elseif($today == "Thursday")
        {
            $c = 4;
        } 
    elseif($today == "Friday") 
        {
            $c = 5;
        } 
    else 
        {
    // Since it is not any of the days above it must be Saturday
            $c = 6;
        }
        $dd = $c - 1;
?>
<?php
date_default_timezone_set($_SESSION['is']['teacher_time']);
$mon = date('F');
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
?>
<?php
date_default_timezone_set($_SESSION['is']['teacher_time']);
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
?>
<?php $week = date("W"); ?>
<?php echo $main_header; ?>
<head>
<script>
setTimeout(function(){
   window.location.reload(1);
}, 600000);
</script>
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
						<img alt="" class="img-circle" src="../uploads/thumb/<?php echo $_SESSION['is']['image_name'];?>">
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
					<a href="teacher-home">Home</a><i class="fa fa-circle"></i>
				</li>
				<li class="active">
					 Current Day Class List
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
					<div class="row">
				<div class="col-md-12">
				<div class="portlet light">
					<!-- BEGIN SAMPLE TABLE PORTLET-->
						<div class="portlet-body">
							<div id="mytable" class="table-responsive">
								<table class="table">
								<?php
                $tt = $_SESSION['is']['teacher_id'];
// sending query
   $result = mysql_query("SELECT `sched3`.*, `day`.`day_name`, `course`.`course_yrSec`, `timestart`.`time_s`, `3StimeS1time`.`stime_s1`, `3StimeS2time`.`stime_s2`, `monitor`.`mnt_name`,`profile`.`teacher_name`, `dept`.`department` FROM `sched3`,`course`,`profile`,`timestart`,`3StimeS1time`,`3StimeS2time`,`day`,`dept`,`monitor` WHERE sched3.course_id=course.course_id and sched3.teacher_id=profile.teacher_id and sched3.atime_s_id=timestart.time_s_id and sched3.stime_s_id=3StimeS1time.stime_s_id1 and sched3.time_s_id=3StimeS2time.stime_s_id2 and sched3.day_id=day.day_id and sched3.dept_id=dept.dept_id and sched3.mnt_id=monitor.mnt_id HAVING day_id = '$dd' and teacher_id = $tt and mnt_id = 1 ORDER BY time_s_id;
  			");
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
	$note = '<h3>Last Day Running Class:</h3>';
	while($row = mysql_fetch_array($result))
		{		
			if($row['mnt_id']=='2') 
				{
					$bgcolor ='#BCF5A9';
				}
			else if($row['mnt_id']=='1')
				{
					$bgcolor ='#F2F5A9';
				}		
			else if($row['mnt_id']=='3')
				{
					$bgcolor ='#FA5858';
				}
			else if($row['mnt_id']=='6')
				{
					$bgcolor ='#8181F7';
				}
			else if($row['mnt_id']=='10')
				{
					$bgcolor ='#F5A9A9';
				}
			else if($row['mnt_id']=='11' OR $row['mnt_id']=='12' OR $row['mnt_id']=='13')
				{
					$bgcolor ='#FFFF00';
				}
			else
				{
					$bgcolor ='#fffff';
				}
			$sched_id = MYSQL_RESULT($result,$i,"sched_id");
			$student_name = MYSQL_RESULT($result,$i,"course_yrSec");
			$teacher_name = MYSQL_RESULT($result,$i,"teacher_name");
			$student_time = MYSQL_RESULT($result,$i,"stime_s1");
			$teacher_time = MYSQL_RESULT($result,$i,"stime_s2");
			$hidden_pdept = MYSQL_RESULT($result,$i,"department");
			$teacher_idp = MYSQL_RESULT($result,$i,"teacher_id");
			$student_idp = MYSQL_RESULT($result,$i,"course_id");
			$monitor_name = MYSQL_RESULT($result,$i,"mnt_name");
			$start_time = MYSQL_RESULT($result,$i,"st");
			$end_time = MYSQL_RESULT($result,$i,"dur");
			$pdept = MYSQL_RESULT($result,$i,"dept_id");
			$a_pdept = MYSQL_RESULT($result,$i,"adept_id");
			$state = MYSQL_RESULT($result,$i,"type");
			$php_time = MYSQL_RESULT($result,$i,"php_tz");
			$stua = MYSQL_RESULT($result,$i,"status");
			$mnp = MYSQL_RESULT($result,$i,"mnt_id");
			$admin_date = MYSQL_RESULT($result,$i,"date");
			$student_date = MYSQL_RESULT($result,$i,"date2");
			$admin_day = MYSQL_RESULT($result,$i,"adayid");
			$admin_mon= MYSQL_RESULT($result,$i,"amonid");
			$admin_year= MYSQL_RESULT($result,$i,"ayearid");
			$student_day = MYSQL_RESULT($result,$i,"sdayid");
			$student_mon= MYSQL_RESULT($result,$i,"smonid");
			$student_year= MYSQL_RESULT($result,$i,"syearid");
			$adaypid= MYSQL_RESULT($result,$i,"adayid");
			$pppp= MYSQL_RESULT($result,$i,"parent_id");
?>							
								<tbody>
								<?php echo $note; ?>
								<tr bgcolor="<?php echo $bgcolor; ?>">
								<td><a href="skype:<?php sum($student_idp); ?>?call"><i class="fa fa-phone"></i></a></td>
								<td>
									 <b><?php echo $teacher_time; ?></b>
								</td>
								<td>
									 <b><?php echo $student_time; ?></b>
								</td>
								<td>
									 <b><?php echo $student_name; ?> <?php if ($state == 8){ echo ''; } elseif ($state == 2){ echo '<span class="label label-sm label-warning">Extra</span>'; } elseif ($state == 2){ echo '<span class="label label-sm label-success">Make-up</span>'; }?></b>
								</td>
								<td>
									 <b><?php echo $hidden_pdept; ?></b>
								</td>
								<td>
									 <a href="history_course?Course_ID=<?php echo base64_encode($student_idp); ?>"><b>History</b></a>
								</td>
								<td>
								<?php if ($stua == 11){ echo '<span class="label label-sm label-warning">On Trial</span>'; } else { echo '<span class="label label-sm label-success">Regular</span>'; } ?>
								</td>
								<td><?php if ($mnp == 11 OR $mnp == 5){echo "<a href='file-wating?parent_id=$sched_id&php=$php_time&student=$student_idp&dayid=$adaypid'><button type='button' style='width: 75px' class='btn red btn-xs'>Activate</button></a>";} elseif ($mnp == 10){echo "<a href='file-start?parent_id=$sched_id&student=$student_idp&dayid=$adaypid'><button type='button' style='width: 75px' class='btn green btn-xs'>Start</button></a>";} elseif ($mnp == 2) { echo '<button type="button" style="width: 75px" class="btn green btn-xs disabled">Taken</button>'; } elseif ($mnp == 3) { echo '<button type="button" style="width: 75px" class="btn red btn-xs disabled">Absent</button>'; } elseif ($mnp == 6) { echo '<button type="button" style="width: 75px" class="btn blue btn-xs disabled">On Leave</button>'; } elseif ($mnp == 1 && $pdept != 3) {echo "<a href='attendence-all?&student_id=$student_idp&teacher_id=$teacher_idp&parent_id=$sched_id&d=$pdept&php=$php_time&start=$start_time&end=$end_time&adate=$admin_date&sdate=$student_date&aday=$admin_day&amon=$admin_mon&ayear=$admin_year&sday=$student_day&smon=$student_mon&syear=$student_year&dept=$pdept&adept=$a_pdept&type_id=$state'><button type='button' style='width: 75px' class='btn yellow btn-xs'>End</button></a>";} elseif ($mnp == 1 && $pdept == 3) {echo "<a href='attendence-hifz?&student_id=$student_idp&teacher_id=$teacher_idp&parent_id=$sched_id&d=$pdept&php=$php_time&start=$start_time&end=$end_time&adate=$admin_date&sdate=$student_date&aday=$admin_day&amon=$admin_mon&ayear=$admin_year&sday=$student_day&smon=$student_mon&syear=$student_year&dept=$pdept&adept=$a_pdept&type_id=$state'><button type='button' style='width: 75px' class='btn yellow btn-xs'>End</button></a>";} ?></td>
								<td><?php if ($mnp == 10) {echo "<a href='file-leave?&student_id=$student_idp&teacher_id=$teacher_idp&parent_id=$sched_id&d=$pdept&php=$php_time&start=$start_time&end=$end_time&adate=$admin_date&sdate=$student_date&aday=$admin_day&amon=$admin_mon&ayear=$admin_year&sday=$student_day&smon=$student_mon&syear=$student_year&dept=$pdept&adept=$a_pdept'><button type='button' style='width: 75px' class='btn blue btn-xs'>Leave</button></a>";} else {echo "";} ?></td>
								<td><?php if ($mnp == 10){echo "<a href='file-absent?&student_id=$student_idp&teacher_id=$teacher_idp&parent_id=$sched_id&d=$pdept&php=$php_time&start=$start_time&end=$end_time&adate=$admin_date&sdate=$student_date&aday=$admin_day&amon=$admin_mon&ayear=$admin_year&sday=$student_day&smon=$student_mon&syear=$student_year&dept=$pdept&adept=$a_pdept'><button type='button' style='width: 75px' class='btn red btn-xs'>Absent</button></a>";} else {echo "";} ?></td>
								<td><?php if ($mnp == 1 OR $mnp == 10) {echo "<a href='file-valid?parent_id=$sched_id'><button type='button' style='width: 75px' class='btn btn-warning btn-xs'>Validate</button></a>";} ?></td>
								
							</tr>
							<?php 	
		$i++;		
		}
	}	
?>
								</tbody>
								</table>
								<table class="table">
								<thead>
								<tr>
								<th>
									 &nbsp;
								</th>
								<th>
									 Class Time
								</th>
								<th>
									 Student Time
								</th>
								<th>
									 Name
								</th>
								<th>
									 Course
								</th>
								<th>
									 History
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
								<th>
									 &nbsp;
								</th>
								<?php
                $tt = $_SESSION['is']['teacher_id'];
// sending query
   $result = mysql_query("SELECT `sched3`.*, `day`.`day_name`, `course`.`course_yrSec`, `timestart`.`time_s`, `3StimeS1time`.`stime_s1`, `3StimeS2time`.`stime_s2`, `monitor`.`mnt_name`,`profile`.`teacher_name`, `dept`.`department` FROM `sched3`,`course`,`profile`,`timestart`,`3StimeS1time`,`3StimeS2time`,`day`,`dept`,`monitor` WHERE sched3.course_id=course.course_id and sched3.teacher_id=profile.teacher_id and sched3.atime_s_id=timestart.time_s_id and sched3.stime_s_id=3StimeS1time.stime_s_id1 and sched3.time_s_id=3StimeS2time.stime_s_id2 and sched3.day_id=day.day_id and sched3.dept_id=dept.dept_id and sched3.mnt_id=monitor.mnt_id HAVING day_id = $c and teacher_id = $tt ORDER BY time_s_id;
  			");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
If ($numberOfRows == 0) 
	{
	echo '<font color="#007094" size="3"><b>Sorry No Record Found!</b></font>';
	}
else if ($numberOfRows > 0) 
	{
	while($row = mysql_fetch_array($result))
		{		
			if($row['mnt_id']=='2') 
				{
					$bgcolor ='#BCF5A9';
				}
			else if($row['mnt_id']=='1')
				{
					$bgcolor ='#F2F5A9';
				}		
			else if($row['mnt_id']=='3')
				{
					$bgcolor ='#FA5858';
				}
			else if($row['mnt_id']=='6')
				{
					$bgcolor ='#8181F7';
				}
			else if($row['mnt_id']=='10')
				{
					$bgcolor ='#F5A9A9';
				}
			else if($row['mnt_id']=='11' OR $row['mnt_id']=='12' OR $row['mnt_id']=='13')
				{
					$bgcolor ='#FFFF00';
				}
			else
				{
					$bgcolor ='#fffff';
				}
			$sched_id = MYSQL_RESULT($result,$i,"sched_id");
			$student_name = MYSQL_RESULT($result,$i,"course_yrSec");
			$teacher_name = MYSQL_RESULT($result,$i,"teacher_name");
			$student_time = MYSQL_RESULT($result,$i,"stime_s1");
			$teacher_time = MYSQL_RESULT($result,$i,"stime_s2");
			$hidden_pdept = MYSQL_RESULT($result,$i,"department");
			$teacher_idp = MYSQL_RESULT($result,$i,"teacher_id");
			$student_idp = MYSQL_RESULT($result,$i,"course_id");
			$monitor_name = MYSQL_RESULT($result,$i,"mnt_name");
			$start_time = MYSQL_RESULT($result,$i,"st");
			$end_time = MYSQL_RESULT($result,$i,"dur");
			$pdept = MYSQL_RESULT($result,$i,"dept_id");
			$a_pdept = MYSQL_RESULT($result,$i,"adept_id");
			$state = MYSQL_RESULT($result,$i,"type");
			$php_time = MYSQL_RESULT($result,$i,"php_tz");
			$stua = MYSQL_RESULT($result,$i,"status");
			$mnp = MYSQL_RESULT($result,$i,"mnt_id");
			$admin_date = MYSQL_RESULT($result,$i,"date");
			$student_date = MYSQL_RESULT($result,$i,"date2");
			$admin_day = MYSQL_RESULT($result,$i,"adayid");
			$admin_mon= MYSQL_RESULT($result,$i,"amonid");
			$admin_year= MYSQL_RESULT($result,$i,"ayearid");
			$student_day = MYSQL_RESULT($result,$i,"sdayid");
			$student_mon= MYSQL_RESULT($result,$i,"smonid");
			$student_year= MYSQL_RESULT($result,$i,"syearid");
			$adaypid= MYSQL_RESULT($result,$i,"adayid");
			$pppp= MYSQL_RESULT($result,$i,"parent_id");
?>							</tr>
								</thead>
								<tbody>
								<tr bgcolor="<?php echo $bgcolor; ?>">
								<td><a href="skype:<?php sum($student_idp); ?>?call"><i class="fa fa-phone"></i></a></td>
								<td>
									 <b><?php echo $teacher_time; ?></b>
								</td>
								<td>
									 <b><?php echo $student_time; ?></b>
								</td>
								<td>
									 <b><?php echo $student_name; ?> <?php if ($state == 8){ echo ''; } elseif ($state == 2){ echo '<span class="label label-sm label-warning">Extra</span>'; } elseif ($state == 2){ echo '<span class="label label-sm label-success">Make-up</span>'; }?></b>
								</td>
								<td>
									 <b><?php echo $hidden_pdept; ?></b>
								</td>
								<td>
									 <a href="history_course?Course_ID=<?php echo base64_encode($student_idp); ?>"><b>History</b></a>
								</td>
								<td>
								<?php if ($stua == 11){ echo '<span class="label label-sm label-warning">On Trial</span>'; } else { echo '<span class="label label-sm label-success">Regular</span>'; } ?>
								</td>
								<td><?php if ($mnp == 5){echo "<a href='file-wating?parent_id=$sched_id&php=$php_time&student=$student_idp&dayid=$adaypid'><button type='button' style='width: 75px' class='btn red btn-xs'>Activate</button></a>";} elseif ($mnp == 10){echo "<a href='file-start?parent_id=$sched_id&student=$student_idp&dayid=$adaypid'><button type='button' style='width: 75px' class='btn green btn-xs'>Start</button></a>";} elseif ($mnp == 2) { echo '<button type="button" style="width: 75px" class="btn green btn-xs disabled">Taken</button>'; } elseif ($mnp == 3) { echo '<button type="button" style="width: 75px" class="btn red btn-xs disabled">Absent</button>'; } elseif ($mnp == 6) { echo '<button type="button" style="width: 75px" class="btn blue btn-xs disabled">On Leave</button>'; } elseif ($mnp == 1 && $pdept != 3) {echo "<a href='attendence-all?&student_id=$student_idp&teacher_id=$teacher_idp&parent_id=$sched_id&d=$pdept&php=$php_time&start=$start_time&end=$end_time&adate=$admin_date&sdate=$student_date&aday=$admin_day&amon=$admin_mon&ayear=$admin_year&sday=$student_day&smon=$student_mon&syear=$student_year&dept=$pdept&adept=$a_pdept&type_id=$state'><button type='button' style='width: 75px' class='btn yellow btn-xs'>End</button></a>";} elseif ($mnp == 1 && $pdept == 3) {echo "<a href='attendence-hifz?&student_id=$student_idp&teacher_id=$teacher_idp&parent_id=$sched_id&d=$pdept&php=$php_time&start=$start_time&end=$end_time&adate=$admin_date&sdate=$student_date&aday=$admin_day&amon=$admin_mon&ayear=$admin_year&sday=$student_day&smon=$student_mon&syear=$student_year&dept=$pdept&adept=$a_pdept&type_id=$state'><button type='button' style='width: 75px' class='btn yellow btn-xs'>End</button></a>";} ?></td>
								<td><?php if ($mnp == 10) {echo "<a class='allocation' href='#allocation-c' data-toggle='modal' data-target='#allocation-c' student_id='".$student_idp."' teacher_id='".$teacher_idp."' parent_id='".$sched_id."' d='".$pdept."' php='".$php_time."' start='".$start_time."' end='".$end_time."' adate='".$admin_date."' sdate='".$student_date."' aday='".$admin_day."' amon='".$admin_mon."' ayear='".$admin_year."' sday='".$student_day."' smon='".$student_mon."' syear='".$student_year."' dept='".$pdept."' adept='".$a_pdept."' sname='".$student_name."' aaaid='6'><button type='button' style='width: 75px' class='btn blue btn-xs'>Leave</button></a>";} else {echo "";} ?></td>
								<td><?php if ($mnp == 10){echo "<a class='allocation' href='#allocation-c' data-toggle='modal' data-target='#allocation-c' student_id='".$student_idp."' teacher_id='".$teacher_idp."' parent_id='".$sched_id."' d='".$pdept."' php='".$php_time."' start='".$start_time."' end='".$end_time."' adate='".$admin_date."' sdate='".$student_date."' aday='".$admin_day."' amon='".$admin_mon."' ayear='".$admin_year."' sday='".$student_day."' smon='".$student_mon."' syear='".$student_year."' dept='".$pdept."' adept='".$a_pdept."' sname='".$student_name."' aaaid='4'><button type='button' style='width: 75px' class='btn red btn-xs'>Absent</button></a>";} else {echo "";} ?></td>
								<td><?php if ($mnp == 1 OR $mnp == 10) {echo "<a href='file-valid?parent_id=$sched_id'><button type='button' style='width: 75px' class='btn btn-warning btn-xs'>Validate</button></a>";} ?></td>
								
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
					<div class="modal fade bs-modal-lg" id="allocation-c" tabindex="-1" role="dialog" aria-hidden="true">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">


        </div>
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
<script>
$('.allocation').click(function(){
    var student_id=$(this).attr('student_id');
    var parent_id=$(this).attr('parent_id');
    var teacher_id=$(this).attr('teacher_id');
    var d=$(this).attr('d');
    var php=$(this).attr('php');
    var start=$(this).attr('start');
    var end=$(this).attr('end');
    var adate=$(this).attr('adate');
    var sdate=$(this).attr('sdate');
    var aday=$(this).attr('aday');
    var amon=$(this).attr('amon');
    var ayear=$(this).attr('ayear');
    var sday=$(this).attr('sday');
    var smon=$(this).attr('smon');
    var syear=$(this).attr('syear');
    var dept=$(this).attr('dept');
    var adept=$(this).attr('adept');
    var aaaid=$(this).attr('aaaid');
    var sname=$(this).attr('sname');

    $.ajax({url:"file-absent1.php?student_id="+student_id+"&teacher_id="+teacher_id+"&d="+d+"&php="+php+"&start="+start+"&end="+end+"&adate="+adate+"&sdate="+sdate+"&aday="+aday+"&amon="+amon+"&ayear="+ayear+"&sday="+sday+"&smon="+smon+"&syear="+syear+"&dept="+dept+"&adept="+adept+"&parent_id="+parent_id+"&aaaid="+aaaid+"&sname="+sname,cache:false,success:function(result){
        $(".modal-content").html(result);
    }});
});
</script>