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
  include("header.php");
  $ppdept =$_REQUEST['teacherday_id'];
date_default_timezone_set("Africa/Cairo");
$date = date('d/m/Y', time());
function class_details($h){
$result = mysql_query("select * from sched3 where sched_id = '$h' AND note_status = 2");
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
			$en_name = MYSQL_RESULT($result,$i,"note");
			echo '<ul class="nav navbar-nav pull-right">
					<div class="dropdown">
						<a href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						<i class="icon-envelope-open"></i></a>
						<ul class="dropdown-menu">
							<li>
								<div class="alert alert-info"><p>'.$en_name.'</p></div>
							</li>
							<li>
							</li>
						</ul>
					</div>
					</ul>';
$i++;		
		}
	}
}
?>
<?php 
    // set the default timezone to use. Available since PHP 5.1
    date_default_timezone_set("Africa/Cairo");
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
?>
<?php
date_default_timezone_set("Africa/Cairo");
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
				<h1>Admin Home<small> Today's Classes of <?php
				$result1 = mysql_query("SELECT * FROM profile HAVING teacher_id='$ppdept'");
if (!$result1) 
		{
		die("Query to shoiled");
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
					echo $teacher;
				}

?></small></h1>
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
							<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 margin-bottom-10">
					<a class="dashboard-stat dashboard-stat-light blue-madison" href="admin-home">
					<div class="visual">
						<i class="fa fa-mortar-board fa-icon-medium"></i>
					</div>
					<div class="details">
						<div class="number">
							 <?php
// sending query
   $result = mysql_query("SELECT * FROM sched3 WHERE day_id = $c");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$dnumberOfRows = MYSQL_NUMROWS($result);
echo $dnumberOfRows; ?>
						</div>
						<div class="desc">
							 Total Classes Today
						</div>
					</div>
					</a>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
					<a class="dashboard-stat dashboard-stat-light green-haze" href="admin-home-taken-classes">
					<div class="visual">
						<i class="fa fa-check-square-o fa-icon-medium"></i>
					</div>
					<div class="details">
						<div class="number">
							 <?php
// sending query
   $result = mysql_query("SELECT * FROM sched3 WHERE day_id = $c and mnt_id = 2");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$tnumberOfRows = MYSQL_NUMROWS($result);
echo $tnumberOfRows; ?>
						</div>
						<div class="desc">
							 Total Taken
						</div>
					</div>
					</a>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
					<a class="dashboard-stat dashboard-stat-light red-intense" href="admin-home-remaining-classes">
					<div class="visual">
						<i class="fa fa-user-times fa-icon-medium"></i>
					</div>
					<div class="details">
						<div class="number">
							 <?php
// sending query
   $result = mysql_query("SELECT * FROM sched3 WHERE day_id = $c and mnt_id = 5");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$rnumberOfRows = MYSQL_NUMROWS($result);
echo $rnumberOfRows; ?>
						</div>
						<div class="desc">
							 Total Remaining
						</div>
					</div>
					</a>
				</div>
				</div>
				<div class="row">
							<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 margin-bottom-10">
					<a class="dashboard-stat dashboard-stat-light yellow" href="admin-home-running-classes">
					<div class="visual">
						<i class="fa fa-forward fa-icon-medium"></i>
					</div>
					<div class="details">
						<div class="number">
							 <?php
// sending query
   $result = mysql_query("SELECT * FROM sched3 WHERE day_id = $c and mnt_id = 1");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$rnumberOfRows = MYSQL_NUMROWS($result);
echo $rnumberOfRows; ?>
						</div>
						<div class="desc">
							 Total Classes Running
						</div>
					</div>
					</a>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
					<a class="dashboard-stat dashboard-stat-light blue-chambray" href="admin-home-absents">
					<div class="visual">
						<i class="fa fa-thumbs-o-down fa-icon-medium"></i>
					</div>
					<div class="details">
						<div class="number">
							 <?php
// sending query
   $result = mysql_query("SELECT * FROM sched3 WHERE day_id = $c and mnt_id = 3");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$anumberOfRows = MYSQL_NUMROWS($result);
echo $anumberOfRows; ?>
						</div>
						<div class="desc">
							 Total Absents
						</div>
					</div>
					</a>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
					<a class="dashboard-stat dashboard-stat-light red-pink" href="admin-home-leaves">
					<div class="visual">
						<i class="fa fa-bed fa-icon-medium"></i>
					</div>
					<div class="details">
						<div class="number">
							 <?php
// sending query
   $result = mysql_query("SELECT * FROM sched3 WHERE day_id = $c and mnt_id = 6");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$lnumberOfRows = MYSQL_NUMROWS($result);
echo $lnumberOfRows; ?>
						</div>
						<div class="desc">
							 Total Leaves
						</div>
					</div>
					</a>
				</div>
				</div>
									<?php
				$result1 = mysql_query("SELECT * FROM profile HAVING teacher_id='$ppdept'");
if (!$result1) 
		{
		die("Query to shoiled");
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
					echo "<div class='alert alert-info'>
						<p>
							 Today's class details of <strong>$teacher</strong>
						</p>
					</div>";
				}

?>
					<!-- BEGIN SAMPLE TABLE PORTLET-->
					<div class="portlet light">
						<div class="portlet-title">
<div class="top-menu">
				<ul class="nav navbar-nav pull-left">
					<!-- BEGIN NOTIFICATION DROPDOWN -->
					<li class="dropdown dropdown-extended dropdown-dark dropdown-notification" id="header_notification_bar">
						<a href="admin-home-current-classes" class="dropdown-toggle">
						<button type="button" style="width: 150px" class="btn yellow btn-xs">Current Classes</button>
						</a>
					</li>
					<li class="dropdown" id="header_notification_bar">
						<a href="admin-home-on-trial">
						<button type="button" style="width: 150px" class="btn red btn-xs">Classes On Trial</button>
						</a>
					</li>
					<li class="dropdown" id="header_notification_bar">
					<form action="admin-home-time-filter" method="GET"><label>
															Class Time</label>
															<select class="form-control" name="time_id"  id="time_id" onchange="this.form.submit()">
                      <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$result = mysql_query("SELECT * FROM timestart ORDER BY time_s_id ");			  	
				do {  ?>
                      <option value="<?php echo $row['time_s_id'];?>"><?php echo $row['time_s'];?></option>
                      <?php } while ($row = mysql_fetch_assoc($result)); ?>
               </select>		</form>			</li>
               <li class="dropdown" id="header_notification_bar">
					<form action="admin-home-teacher-filter" method="GET"><label>
															Teacher Filter</label>
															<select class="form-control" name="teacherday_id"  id="teacherday_id" onchange="this.form.submit()">
                      <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$result = mysql_query("SELECT * FROM profile WHERE (cat_id = 8 or teacher_rights = 1) and active = 1 and training = 1 ORDER BY teacher_id ");			  	
				do {  ?>
  <option value="<?php echo $row['teacher_id'];?>"><?php echo $row['teacher_name'];?> </option>
                      <?php } while ($row = mysql_fetch_assoc($result)); ?>
               </select>		</form>			</li>
					<!-- END NOTIFICATION DROPDOWN -->
					</ul>
						</div>
						</div>
						<div class="portlet-body">
							<div id="mytable" class="table-responsive">
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
									 Start Time
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
								</th>
								<th>
									Shift
								</th>
								<th>
									 &nbsp;
								</th>
								<th>
									 &nbsp;
								</th>
								<?php
// sending query
   $result = mysql_query("SELECT `sched3`.*, `day`.`day_name`, `course`.`course_yrSec`, `timestart`.`time_s`, `3StimeS1time`.`stime_s1`, `3StimeS2time`.`stime_s2`, `monitor`.`mnt_name`,`profile`.`teacher_name`, `dept`.`department` FROM `sched3`,`course`,`profile`,`timestart`,`3StimeS1time`,`3StimeS2time`,`day`,`dept`,`monitor` WHERE sched3.course_id=course.course_id and sched3.teacher_id=profile.teacher_id and sched3.atime_s_id=timestart.time_s_id and sched3.stime_s_id=3StimeS1time.stime_s_id1 and sched3.time_s_id=3StimeS2time.stime_s_id2 and sched3.day_id=day.day_id and sched3.dept_id=dept.dept_id and sched3.mnt_id=monitor.mnt_id HAVING aday_id = $c and teacher_id = $ppdept ORDER BY atime_s_id;
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
					$bgcolor ='#F4FA58';
				}		
			else if($row['mnt_id']=='3')
				{
					$bgcolor ='#F5A9A9';
				}
			else if($row['mnt_id']=='6')
				{
					$bgcolor ='#CECEF6';
				}
			else if($row['mnt_id']=='10')
				{
					$bgcolor ='#FA5858';
				}
			else if($row['mnt_id']=='12')
				{
					$bgcolor ='#A4A4A4';
				}
			else
				{
					$bgcolor ='#fffff';
				}
			$sched_id = MYSQL_RESULT($result,$i,"sched_id");
			$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
			$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
			$hidden_pday = MYSQL_RESULT($result,$i,"day_name");
			$admin_time = MYSQL_RESULT($result,$i,"time_s");
			$hidden_pdept = MYSQL_RESULT($result,$i,"department");
			$pT = MYSQL_RESULT($result,$i,"teacher_id");
			$pCourse = MYSQL_RESULT($result,$i,"course_id");
			$pmnt = MYSQL_RESULT($result,$i,"mnt_name");
			$pst = MYSQL_RESULT($result,$i,"st");
			$psp = MYSQL_RESULT($result,$i,"dur");
			$pdt = MYSQL_RESULT($result,$i,"dept_id");
			$pstr = MYSQL_RESULT($result,$i,"time_s_id");
			$student_id = MYSQL_RESULT($result,$i,"course_id");
			$dept_id = MYSQL_RESULT($result,$i,"dept_id");
			$teacher_id = MYSQL_RESULT($result,$i,"teacher_id");
			$wa = MYSQL_RESULT($result,$i,"wait");
			$stua = MYSQL_RESULT($result,$i,"status");
			$student_time = MYSQL_RESULT($result,$i,"stime_s1");
			$teacher_time = MYSQL_RESULT($result,$i,"stime_s2");
?>							</tr>
								</thead>
								<tbody>
								<tr bgcolor="<?php echo $bgcolor; ?>">
								<td>
									 <?php echo $admin_time; ?>
								</td>
								<td>
									 <a class="allocation1" href="#allocation-c" data-toggle="modal" data-target="#allocation-c" data-id="<?php echo $sched_id; ?>" data-name="<?php echo $hidden_pcourse; ?>" data-time="<?php echo $teacher_time; ?>"><?php echo $teacher_time; ?></a>
								</td>
								<td>
									 <?php echo $student_time; ?>
								</td>
								<td>
									 <?php echo $wa; ?>
								</td>
								<td>
									 <?php echo $pst; ?>
								</td>
								<td>
									 <a href="student-schedule?pT=<?php echo base64_encode($pCourse); ?>"><?php echo $hidden_pcourse; ?></a>
								</td>
								<td>
									 <a href="history_course?Course_ID=<?php echo base64_encode($pCourse); ?>">History</a>
								</td>
								<td>
									 <a href="teacher-schedule?pT=<?php echo $teacher_id; ?>"><?php echo $hidden_pt; ?></a>
								</td>
								<td>
				<?php echo class_details("$sched_id"); ?>
								</td>
								<td>
									<a class="allocation" href="#allocation-c" data-toggle="modal" data-target="#allocation-c" data-id="<?php echo $sched_id; ?>" data-name="<?php echo $hidden_pcourse; ?>" data-time="<?php echo $teacher_time; ?>"><button type="button" class="btn green btn-xs">Shift</button></a>
								</td>
								<td>
								<?php if ($stua == 11){ echo '<span class="label label-sm label-warning">On Trial</span>'; } elseif ($stua == 17){ echo '<span class="label label-sm label-danger">Suspended</span>'; } else { echo '<span class="label label-sm label-success">Regular</span>'; } ?></td>
								<td><a href="valid.php?parent_id=<?php echo $sched_id; ?>"><button type="button" class="btn yellow btn-xs">Validate</button></a></td>
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
    var famID=$(this).attr('data-id');
    var famName=$(this).attr('data-name');
    var famTime=$(this).attr('data-time');

    $.ajax({url:"class-shift.php?famID="+famID+"&famName="+famName+"&famTime="+famTime,cache:false,success:function(result){
        $(".modal-content").html(result);
    }});
});
$('.allocation1').click(function(){
    var famID=$(this).attr('data-id');
    var famName=$(this).attr('data-name');
    var famTime=$(this).attr('data-time');

    $.ajax({url:"class-time-change.php?famID="+famID+"&famName="+famName+"&famTime="+famTime,cache:false,success:function(result){
        $(".modal-content").html(result);
    }});
});
</script>