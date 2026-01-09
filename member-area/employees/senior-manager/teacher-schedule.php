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
  include("../includes/s_manager_rights.php");
  require ("../includes/dbconnection.php");
  include("header.php");
  $pT =$_REQUEST['pT'];
	
$result = mysql_query("SELECT * FROM profile HAVING teacher_id = $pT");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0) 
			{
			echo "";
			}
		else if ($numberOfRows > 0) 
			{
		
					$st1 = MYSQL_RESULT($result,$i,"st1");
					$st2 = MYSQL_RESULT($result,$i,"st2");
					$et1 = MYSQL_RESULT($result,$i,"et1");
					$et2 = MYSQL_RESULT($result,$i,"et2");
					$st3 = MYSQL_RESULT($result,$i,"st3");
					$et3 = MYSQL_RESULT($result,$i,"et3");

			}
function color($d, $t){
$pT =$_REQUEST['pT'];
			$result = mysql_query("SELECT * FROM sched HAVING teacher_id = '$pT' and day_id = '$d' and time_start <= '$t' and time_end > '$t'
  			");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0){
			echo '#CECE0F';
			}
		else if ($numberOfRows > 0) 
			{
			echo '#989800';
			 }
		}
function color2($d, $t){
$pT =$_REQUEST['pT'];
			$result = mysql_query("SELECT * FROM profile HAVING teacher_id = $pT");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0){
			echo '';
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
				{			
					$schedule_iti = MYSQL_RESULT($result,$i,"schedule_status");
			 if ($schedule_iti == 1){	
			  		echo '';
						}
			 elseif ($schedule_iti == 2){	
			  		echo '#000000';
						}
			
	$i++;	 
			}
			}
	}
function abc($d, $t)
  {
  $pT =$_REQUEST['pT'];
			$result = mysql_query("SELECT `sched`.*,`course`.`course_yrSec`,`profile`.`teacher_name` FROM `sched`,`course`,`profile` WHERE sched.course_id=course.course_id and sched.teacher_id=profile.teacher_id
 HAVING teacher_id='$pT' and day_id = '$d' and time_start <= '$t' and time_end > '$t'
  			");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0){
			echo '<a class="add" href="#invoice" data-toggle="modal" data-target="#invoice" teacher-id="'.$pT.'" time-id="'.$t.'" day-id="'.$d.'"><font color="#FFFFFF">--</font></a>';
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
				{			
					$sched = MYSQL_RESULT($result,$i,"sched_id");
					$TID = MYSQL_RESULT($result,$i,"teacher_id");
					$SID = MYSQL_RESULT($result,$i,"course_id");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$tt1 = MYSQL_RESULT($result,$i,"time_start");
					$tt2 = MYSQL_RESULT($result,$i,"time_end");
					$trial = MYSQL_RESULT($result,$i,"status");
			  		echo '<a class="edit" href="#invoice" data-toggle="modal" data-target="#invoice" data-id="'.$sched.'" tech-id="'.$TID.'" sut-id="'.$SID.'"><font color="#FFFFFF">'.$hidden_pcourse.'</font></a>';
			 if ($hidden_pday == $d && $trial == 11){	
			  		echo "*";
						}
			 if ($hidden_pday == $d && $trial == 17){	
			  		echo "#";
						}

	$i++;	 
			}
			}
	}
function blocked($d){
$pT =$_REQUEST['pT'];
			$result = mysql_query("SELECT * FROM profile HAVING teacher_id = $pT");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0){
			echo '';
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
				{			
					$schedule_iti = MYSQL_RESULT($result,$i,"schedule_status");
			 if ($schedule_iti == 1){	
			  		echo '';
						}
			 elseif ($schedule_iti == 2){	
			  		echo "<h4><font color='#EE1B1B'> <b>Schedule Blocked</b></font><h4>";
						}
			
	$i++;	 
			}
			}
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
<head>
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<!--[if IE]>
  		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
</head>
<!-- BEGIN PAGE CONTAINER -->
<div class="page-container">
	<!-- BEGIN PAGE HEAD -->
	<div class="page-head">
		<div class="container">
			<!-- BEGIN PAGE TITLE -->
			<div class="page-title">
				<h1>Admin Home<small>Today's Classes</small></h1>
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
					 <a href="list-of-teachers">List of Teachers</a><i class="fa fa-circle"></i>
				</li>
				<li class="active">
					 Schedule of Teacher <?php 
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
					<?php 
// sending query
$result = mysql_query("SELECT * FROM trial WHERE mnt_id = 1");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
If ($numberOfRows == 0) 
	{
	echo "";
	}
else if ($numberOfRows > 0)
				{
					echo "<div class='alert alert-info'>
						<p>
							 You have requests waiting for your <strong>responce...</strong>
						</p>
					</div>";
				}

?>
					<!-- BEGIN SAMPLE TABLE PORTLET-->
					<div class="portlet light">
					<?php echo blocked('$pT'); ?>
					<h4><?php 
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
			$sss = MYSQL_RESULT($result1,$i,"schedule_status");
				}			
		echo "Teacher Name: <font color='#44B6AE'> <b>$teacher</b></font>"; ?> <?php
			$result = mysql_query("SELECT * FROM `sched` WHERE teacher_id='$pT'
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
echo "Classes in a Week: <font color='#44B6AE'> <b>$numberOfRows</b></font>";
?></h4>
						<div class="portlet-body">
							<div id="mytable" class="table-responsive">
								<table class="table table-striped table-bordered table-hover">
								<thead>
								<tr>
									<th>Time/Date</th>
									<th>MONDAY</th>
									<th>TUESDAY</th>
									<th>WEDNESDAY</th>
									<th>THURSDAY</th>
									<th>FRIDAY</th>
									<th>SATURDAY</th>
									<th>SUNDAY</th>
								</tr>
								</thead>
<tbody>
<?php 
// sending query
$result = mysql_query("SELECT * FROM TimeTable WHERE (TimeID >= $st1 AND TimeID <=$et1) OR (TimeID >= $st2 AND TimeID <=$et2) OR (TimeID >= $st3 AND TimeID <=$et3) AND TimeID != 97");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
If ($numberOfRows == 0) 
	{
	echo 'Sorry No Record Found!';
	}
else if ($numberOfRows > 0) 
	{
	$i=0;
	while($row = mysql_fetch_array($result))
		{		
				$ID = MYSQL_RESULT($result,$i,"TimeID");
			$name = MYSQL_RESULT($result,$i,"TimeName");
			$list = MYSQL_RESULT($result,$i,"TimeList");
			

?>
								<tr>
								    <td><?php echo $list; ?></td>
                                    <td bgcolor="<?php echo color("1","$name"); ?><?php echo color2('1','$name'); ?>"><font color="#FFFFFF"><?php echo abc("1","$name"); ?></font></td>
                                    <td bgcolor="<?php echo color("2","$name"); ?><?php echo color2('2','$name'); ?>"><font color="#FFFFFF"><?php echo abc("2","$name"); ?></font></td>
                                    <td bgcolor="<?php echo color("3","$name"); ?><?php echo color2('3','$name'); ?>"><font color="#FFFFFF"><?php echo abc("3","$name"); ?></font></td>
                                    <td bgcolor="<?php echo color("4","$name"); ?><?php echo color2('4','$name'); ?>"><font color="#FFFFFF"><?php echo abc("4","$name"); ?></font></td>
                                    <td bgcolor="<?php echo color("5","$name"); ?><?php echo color2('5','$name'); ?>"><font color="#FFFFFF"><?php echo abc("5","$name"); ?></font></td>
                                    <td bgcolor="<?php echo color("6","$name"); ?><?php echo color2('6','$name'); ?>"><font color="#FFFFFF"><?php echo abc("6","$name"); ?></font></td>
                                    <td bgcolor="<?php echo color("7","$name"); ?><?php echo color2('7','$name'); ?>"><font color="#FFFFFF"><?php echo abc("7","$name"); ?></font></td>
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
			<div class="modal fade bs-modal-lg" id="invoice" tabindex="-1" role="dialog" aria-hidden="true">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">


        </div>
    </div>
</div>
		</div>
	</div>
	<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->
<?php echo $fot; ?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-throttle-debounce/1.1/jquery.ba-throttle-debounce.min.js"></script>
		<script src="js/jquery.stickyheader.js"></script>
<script>
$('.add').click(function(){
    var TeacherID=$(this).attr('teacher-id');
     var TimeID=$(this).attr('time-id');
     var DayID=$(this).attr('day-id');

    $.ajax({url:"01-add-schedule.php?TeacherID="+TeacherID+"&TimeID="+TimeID+"&DayID="+DayID,cache:false,success:function(result){
        $(".modal-content").html(result);
    }});
});
</script>
<script>
$('.edit').click(function(){
    var famID=$(this).attr('data-id');
     var TechID=$(this).attr('tech-id');
     var SutID=$(this).attr('sut-id');

    $.ajax({url:"01-edit-schedule.php?famID="+famID+"&TechID="+TechID+"&SutID="+SutID,cache:false,success:function(result){
        $(".modal-content").html(result);
    }});
});
</script>