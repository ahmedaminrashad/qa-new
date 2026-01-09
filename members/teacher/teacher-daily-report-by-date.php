<?php session_start(); ?>
  <?php
  include("../includes/session.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("header.php");
  date_default_timezone_set($_SESSION['is']['teacher_time']);
  $today = $_REQUEST['date'];
  $tt = $_SESSION['is']['teacher_id'];
  $datep = date('Y-m-d');
  $date_p = date('Y-m-d', strtotime('-1 day', strtotime($datep)));
  function sum($con){
  require ("../includes/dbconnection.php");
			$sql = "SELECT * FROM `course` WHERE course_id  = $con";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){
				// $this_course_ID = $row['course_id");
			$skype = $row['Skype_ID'];
			echo $skype;
				}
				}
}
function course($con){
			if ($con == 3){echo 'hifz';}
			elseif ($con != 3){echo 'all';}
}
include("monitoring-functions.php");
function ttm($t1, $t2){
$startTime = new DateTime($t1);
$endTime = new DateTime($t2);
$duration = $startTime->diff($endTime); //$duration is a DateInterval object
echo $duration->format("%H:%I");
}
?>
<?php
$page_title = 'Class Details';
$page_subtitle = 'Class Details By Date';
$table_name = 'Class Details By Date';
?>
<?php echo $main_header; ?>
<body>
<?php echo $top_bar_logo; ?>
<?php echo $search_bar; ?>
<?php echo $notification_bar; ?>
<?php echo $main_menu_start; ?>
<?php echo $main_menu; ?>
<?php echo $main_menu_end; ?>
<div class="app-main__outer">
            
            <!-- App inner start-->
                <div class="app-main__inner">
                
                <!-- Page Title Start-->
                    <div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
                                    </i>
                                </div>
                                <div><?php echo $page_title; ?>
                                    <div class="page-title-subheading"><?php echo $page_subtitle; ?>
                                    </div>
                                </div>
                            </div>
                            </div>
                    </div>
                    <!-- Page Title End-->
                    <!-- Table Row Start-->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="main-card mb-3 card">
                                <div class="card-body"><h5 class="card-title"><?php $table_name; ?></h5>
                                    <div class="table-responsive">
                                        <table class="align-middle mb-0 table table-striped table-hover">
								<thead>
								<tr>
								<th>
									#
								</th>
								<th>
									 Teacher
								</th>
								<th>
									 Student
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
								</tr>
								</thead>
								<tbody>
								<?php
                $tt = $_SESSION['is']['teacher_id'];
// sending query
   $sql = "SELECT * FROM `class_history` WHERE date_teacher = '$today' and teacher_id = '$tt' ORDER BY 'time_start'";
   $counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){		
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
					$bgcolor ='#F5D0A9';
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
			$history_id = $row['history_id'];
			$student_id = $row['course_id'];
			$teacher_id = $row['teacher_id'];
			$admin_timeS = $row['start_time_A'];
			$admin_timeE = $row['end_time_A'];
			$student_timeS = $row['start_time_S'];
			$student_timeE = $row['end_time_S'];
			$teacher_timeS = $row['time_start'];
			$teacher_timeE = $row['time_end'];
			$duration = $row['duration'];
			$dept_id = $row['dept_id'];
			$adept_id = $row['adept_id'];
			$class_type = $row['type'];// Rescheduled, Makeup, Extra or Regular
			$status = $row['status'];// Regular, Trial, Rescheduled or Suspended
			$mnp = $row['monitor_id'];// pending, taken, absent, leave, taken advance, running, waiting or still pending
			$parent_id= $row['parent_id'];
?>							
								<tr bgcolor="<?php echo $bgcolor; ?>">
								<td>
									<?php echo ++$counter; ?>
								</td>
								<td>
									 <b><?php echo date("g:i a", strtotime($teacher_timeS)); ?> - <?php echo date("g:i a", strtotime($teacher_timeE)); ?></b>
								</td>
								<td>
									 <b><?php echo date("g:i a", strtotime($student_timeS)); ?> (<?php echo ttm($teacher_timeS, $teacher_timeE); ?>)</b>
								</td>
								<td>
									 <b><?php echo StudentName("$student_id"); ?> <?php //if ($class_type == 1){ echo ''; } elseif ($class_type == 2){ echo '<span class="label label-sm label-success">Extra</span>'; } elseif ($class_type == 3){ echo '<span class="label label-sm label-warning">Re-Scheduled</span>'; } ?></b>
								</td>
								<td>
									 <b><?php echo DeptName("$dept_id"); ?></b>
								</td>
								<td>
									 <a href="history_course?Course_ID=<?php echo base64_encode($student_id); ?>"><b>History</b></a>
								</td>
								<td>
								<?php if ($status == 11){ echo '<span class="label label-sm label-warning">On Trial</span>'; } 
								elseif ($status == 17){ echo '<span class="label label-sm label-danger">Suspended</span>'; } 
								elseif ($status == 18){ echo '<span class="label label-sm label-danger">Shifted</span>'; }
								elseif ($status == 19){ echo '<span class="label label-sm label-danger">Advance</span>'; } 
								elseif ($status == 20){ echo '<span class="label label-sm label-danger">Re-Scheduled</span>'; } 
								elseif ($status == 21){ echo '<span class="label label-sm label-warning">Extra</span>'; }
								else { echo '<span class="label label-sm label-success">Regular</span>'; } ?>
								</td>
								<td><?php if ($mnp == 1){echo "<button type='button' style='width: 75px' class='btn red btn-xs disabled'>Activate</button>";} 
								elseif ($mnp == 2){echo "<a href='#'><button type='button' style='width: 75px' class='btn green btn-xs'>Start</button></a>";} 
								elseif ($mnp == 9) { echo '<button type="button" style="width: 75px" class="btn green btn-xs disabled">Taken</button>'; } 
								elseif ($mnp == 4) { echo '<button type="button" style="width: 75px" class="btn red btn-xs disabled">Absent</button>'; } 
								elseif ($mnp == 5) { echo '<button type="button" style="width: 75px" class="btn blue btn-xs disabled">On Leave</button>'; }
								elseif ($mnp == 6){echo '<button type="button" style="width: 75px" class="btn red btn-xs disabled">Declined</button>';}
								elseif ($mnp == 7){echo '<button type="button" style="width: 75px" class="btn red btn-xs disabled">Pending</button>';}
								elseif ($mnp == 8){echo '<button type="button" style="width: 75px" class="btn red btn-xs disabled">Advance</button>';}
								elseif ($mnp == 3 && $dept_id != 3) {echo "<button type='button' style='width: 75px' class='btn yellow btn-xs'>End</button>";} elseif ($mnp == 3 && $dept_id == 3) {echo "<button type='button' style='width: 75px' class='btn yellow btn-xs'>End</button>";} ?>
								<?php if (($mnp == 4 OR $mnp == 5 OR $mnp == 6) && $restatus != 2) {echo '<a href="re-schedule-class-teacher?adateid='.$a_date.'&tdateid='.$t_date.'&sdateid='.$s_date.'&Course_ID='.$student_id.'&tech='.$teacher_id.'&studentName='.$student.'&link='.base64_encode($link).'&history_id='.$history_id.'&dept_id='.$dept_id.'&adept_id='.$adept_id.'"><button type="button" style="width: 85px" class="btn blue btn-xs">Re-schedule</button></a>'; } 
								elseif ($mnp == 5 && $restatus == 2) {echo '<button type="button" style="width: 90px" class="btn red btn-xs disabled">Re-scheduled</button>'; } ?>
								<?php if ($mnp == 2) {echo "<button type='button' style='width: 75px' class='btn red btn-xs'>Absent</button>";} else {echo "";} ?>
								<?php if ($mnp == 2) {echo "<button type='button' style='width: 75px' class='btn blue btn-xs'>Leave</button>";} else {echo "";} ?>
								<?php if ($mnp == 2 OR $mnp == 3) {echo "<button type='button' class='btn btn-danger btn-xs'><i class='fa fa-frown-o'></i></button>";} ?> <?php if ($mnp == 2 OR $mnp == 3) {echo "<button type='button' class='btn btn-warning btn-xs'><i class='fa fa-check'></i></button></a>";} ?></td>
								
							</tr>
							<?php 	
		}
	}	
?>
</tbody>
								</table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Table Row End -->
                    
                </div>
                <!-- App inner end -->
<?php echo $footer; ?>