<?php
require ("../../includes/dbconnection.php");
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
$time_start = date("Gi", time(true));

		    if($time_start > '00' && $time_start <= '30')
				{
					$cc ='1';
				}
			else if($time_start > '30' && $time_start <= '100')
				{
					$cc ='2';
				}
			else if($time_start > '100' && $time_start <= '130')
				{
					$cc ='3';
				}
			else if($time_start > '130' && $time_start <= '200')
				{
					$cc ='4';
				}
			else if($time_start > '200' && $time_start <= '230')
				{
					$cc ='5';
				}
			else if($time_start > '230' && $time_start <= '300')
				{
					$cc ='6';
				}
			else if($time_start > '300' && $time_start <= '330')
				{
					$cc ='7';
				}
			else if($time_start > '330' && $time_start <= '400')
				{
					$cc ='8';
				}
			else if($time_start > '400' && $time_start <= '430') 
				{
					$cc ='9';
				}
			else if($time_start > '430' && $time_start <= '500')
				{
					$cc ='10';
				}
			else if($time_start > '500' && $time_start <= '530') 
				{
					$cc ='11';
				}
			else if($time_start > '530' && $time_start <= '600')
				{
					$cc ='12';
				}
			else if($time_start > '600' && $time_start <= '630') 
				{
					$cc ='13';
				}
			else if($time_start > '630' && $time_start <= '700')
				{
					$cc ='14';
				}
			else if($time_start > '700' && $time_start <= '730') 
				{
					$cc ='15';
				}
			else if($time_start > '730' && $time_start <= '800')
				{
					$cc ='16';
				}
			else if($time_start > '800' && $time_start <= '830') 
				{
					$cc ='17';
				}
			else if($time_start > '830' && $time_start <= '900')
				{
					$cc ='18';
				}
			else if($time_start > '900' && $time_start <= '930') 
				{
					$cc ='19';
				}
			else if($time_start > '930' && $time_start <= '1000')
				{
					$cc ='20';
				}
			else if($time_start > '1000' && $time_start <= '1030') 
				{
					$cc ='21';
				}
			else if($time_start > '1030' && $time_start <= '1100')
				{
					$cc ='22';
				}
			else if($time_start > '1100' && $time_start <= '1130') 
				{
					$cc ='23';
				}
			else if($time_start > '1130' && $time_start <= '1200')
				{
					$cc ='24';
				}
			else if($time_start > '1200' && $time_start <= '1230') 
				{
					$cc ='25';
				}
			else if($time_start > '1230' && $time_start <= '1300')
				{
					$cc ='26';
				}
			else if($time_start > '1300' && $time_start <= '1330') 
				{
					$cc ='27';
				}
			else if($time_start > '1330' && $time_start <= '1400')
				{
					$cc ='28';
				}
			else if($time_start > '1400' && $time_start <= '1430') 
				{
					$cc ='29';
				}
			else if($time_start > '1430' && $time_start <= '1500')
				{
					$cc ='30';
				}
			else if($time_start > '1500' && $time_start <= '1530') 
				{
					$cc ='31';
				}
			else if($time_start > '1530' && $time_start <= '1600')
				{
					$cc ='32';
				}
			else if($time_start > '1600' && $time_start <= '1630') 
				{
					$cc ='33';
				}
			else if($time_start > '1630' && $time_start <= '1700')
				{
					$cc ='34';
				}
			else if($time_start > '1700' && $time_start <= '1730') 
				{
					$cc ='35';
				}
			else if($time_start > '1730' && $time_start <= '1800')
				{
					$cc ='36';
				}
			else if($time_start > '1800' && $time_start <= '1830') 
				{
					$cc ='37';
				}
			else if($time_start > '1830' && $time_start <= '1900')
				{
					$cc ='38';
				}
			else if($time_start > '1900' && $time_start <= '1930') 
				{
					$cc ='39';
				}
			else if($time_start > '1930' && $time_start <= '2000')
				{
					$cc ='40';
				}
			else if($time_start > '2000' && $time_start <= '2030') 
				{
					$cc ='41';
				}
			else if($time_start > '2030' && $time_start <= '2100')
				{
					$cc ='42';
				}
			else if($time_start > '2100' && $time_start <= '2130') 
				{
					$cc ='43';
				}
			else if($time_start > '2130' && $time_start <= '2200')
				{
					$cc ='44';
				}
			else if($time_start > '2200' && $time_start <= '2230') 
				{
					$cc ='45';
				}
			else if($time_start > '2230' && $time_start <= '2300')
				{
					$cc ='46';
				}
			else if($time_start > '2300' && $time_start <= '2330') 
				{
					$cc ='47';
				}
			else{
					$cc ='48';
				}
$check_beta1 = $cc-2;
$check_beta2 = $cc+2;
if ($check_beta1 < 1){ $check_alpha1 = 1; } else { $check_alpha1 = $check_beta1; } 
if ($check_beta2 > 48){ $check_alpha2 = 48; } else { $check_alpha2 = $check_beta2; }
?>
<div id="mytable" class="table-responsive">
<?php echo date(" D d F, Y, h:i:s A", time()); ?>
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
// sending query
   $result = mysql_query("SELECT `sched3`.*, `day`.`day_name`, `course`.`course_yrSec`, `timestart`.`time_s`, `3StimeS1time`.`stime_s1`, `3StimeS2time`.`stime_s2`, `monitor`.`mnt_name`,`profile`.`teacher_name`, `dept`.`department` FROM `sched3`,`course`,`profile`,`timestart`,`3StimeS1time`,`3StimeS2time`,`day`,`dept`,`monitor` WHERE sched3.course_id=course.course_id and sched3.teacher_id=profile.teacher_id and sched3.atime_s_id=timestart.time_s_id and sched3.stime_s_id=3StimeS1time.stime_s_id1 and sched3.time_s_id=3StimeS2time.stime_s_id2 and sched3.day_id=day.day_id and sched3.dept_id=dept.dept_id and sched3.mnt_id=monitor.mnt_id HAVING aday_id = $c AND atime_s_id >= $check_alpha1 AND atime_s_id <= $check_alpha2 ORDER BY atime_s_id;
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
?>
							</tr>
								</thead>
								<tbody>
								<tr bgcolor="<?php echo $bgcolor; ?>">
								<td>
									 <?php echo $admin_time; ?>
								</td>
								<td>
									 <?php echo $teacher_time; ?>
								</td>
								<td>
									 <?php echo $student_time; ?>
								</td>
								<td>
									 <?php echo $wa; ?>
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
									 <?php echo $pmnt; ?>
								</td>
								<td>
								<?php if ($stua == 11){ echo '<span class="label label-sm label-warning">T</span>'; } else { echo '<span class="label label-sm label-success">R</span>'; } ?>								</td>
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