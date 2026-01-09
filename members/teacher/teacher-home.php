<?php session_start(); ?>
  <?php
  include("../includes/session.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("header.php");
  $link = $_SERVER['REQUEST_URI'];
  $timeValue=$_SESSION['is']['teacher_time'];
  date_default_timezone_set($_SESSION['is']['teacher_time']);
  $today = date("Y-m-d", time());
  $datep = date('Y-m-d');
  $date_p = date('Y-m-d', strtotime('-1 day', strtotime($datep)));
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
$page_title = 'List of Classes Today';
$page_subtitle = 'List of Classes Today'.$today;
$table_name = 'List of Classes Today';
?>
<?php echo $main_header; ?>
<head>
<script>
setTimeout(function(){
   window.location.reload(1);
}, 30000);
</script>
</head>
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
                                <div class="card-body">
                                <h5 class="card-title">
                                <form action="date_definer" method="post" class="form-horizontal form-row-seperated">
										<div class="form-group col-md-12">
															<label class="control-label col-md-6">
															<strong>List of Classes on: </strong></label>
															<div class="col-md-4">
															<input type="date" name="date" id="date" value="<?php echo $today; ?>" class="form-control" onchange="this.form.submit()"></div>
												</div>
												<input type="hidden" name="pteacher" id="pteacher" value="<?php echo $tt; ?>" class="form-control" required>
										</form>
								</h5>
                                    <div class="table-responsive">
                                        <table class="align-middle mb-0 table table-striped table-hover">
								<table class="table">
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
   $sql = "SELECT * FROM `class_history` WHERE date_teacher != '$today' and monitor_id = '3' and teacher_id = '$tt' ORDER BY time_start";
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
									 <b><?php echo StudentName("$student_id"); ?> <?php //if ($class_type == 1){ echo ''; } elseif ($class_type == 2){ echo '<div class="ml-auto badge badge-success">Extra</div>'; } elseif ($class_type == 3){ echo '<div class="ml-auto badge badge-warning">Re-Scheduled</div>'; } ?></b>
								</td>
								<td>
									 <b><?php echo DeptName("$dept_id"); ?></b>
								</td>
								<td>
									 <a href="history_course?Course_ID=<?php echo base64_encode($student_id); ?>"><b>History</b></a>
								</td>
								<td>
								<?php if ($status == 11){ echo '<div class="ml-auto badge badge-warning">On Trial</div>'; } 
								elseif ($status == 17){ echo '<div class="ml-auto badge badge-danger">Suspended</div>'; } 
								elseif ($status == 18){ echo '<div class="ml-auto badge badge-danger">Shifted</div>'; }
								elseif ($status == 19){ echo '<div class="ml-auto badge badge-danger">Advance</div>'; } 
								elseif ($status == 20){ echo '<div class="ml-auto badge badge-danger">Re-Scheduled</div>'; } 
								elseif ($status == 21){ echo '<div class="ml-auto badge badge-warning">Extra</div>'; }
								else { echo '<div class="ml-auto badge badge-success">Regular</div>'; } ?>
								</td>
								<td><?php if ($mnp == 1 && $status != 17){echo "<a href='file-activate?history_id=".$history_id."'><button type='button' class='mb-2 mr-2 btn btn-danger'>Activate</button></a>";} 
								elseif ($mnp == 2){echo "<a href='file-start?history_id=".$history_id."'><button type='button' class='mb-2 mr-2 btn btn-success'>Start</button></a>";} 
								elseif ($mnp == 9) { echo '<button type="button" class="mb-2 mr-2 btn btn-success disabled">Taken</button>'; } 
								elseif ($mnp == 4) { echo '<button type="button" class="mb-2 mr-2 btn btn-danger disabled">Absent</button>'; } 
								elseif ($mnp == 5) { echo '<button type="button" class="mb-2 mr-2 btn btn-info disabled">On Leave</button>'; }
								elseif ($mnp == 6){echo '<button type="button" class="mb-2 mr-2 btn btn-danger disabled">Declined</button>';}
								elseif ($mnp == 7){echo '<button type="button" class="mb-2 mr-2 btn btn-danger disabled">Pending</button>';}
								elseif ($mnp == 8){echo '<button type="button" class="mb-2 mr-2 btn btn-danger disabled">Advance</button>';}
								elseif ($mnp == 3) {echo "<a href='attendence-all?history_id=".$history_id."&dept_id=".$dept_id."&adept_id=".$adept_id."&pid=".$parent_id."&student=".$student_id."&ppis=".$parent_id."'><button type='button' class='btn yellow btn-xs'>End</button></a>";} ?>
								<?php if ($mnp == 2) {echo "<a href='leave_absent_mark?history_id=".$history_id."&attend=4&studentID=".$student_id."&parentID=".$parent_id."&teacherID=".$teacher_id."&date=".$s_date."&time=".$student_timeS."&Adate=".$a_date."&history_id=".$history_id."'><button type='button' class='mb-2 mr-2 btn btn-danger'>Absent</button></a>";} else {echo "";} ?>
								<?php if ($mnp == 2) {echo "<a href='leave_absent_mark?history_id=".$history_id."&attend=5&studentID=".$student_id."&parentID=".$parent_id."&teacherID=".$teacher_id."&date=".$s_date."&time=".$student_timeS."&Adate=".$a_date."&history_id=".$history_id."'><button type='button' class='mb-2 mr-2 btn btn-info'>Leave</button></a>";} ?>
								<?php if ($mnp == 3) {echo "<a href='leave_absent_mark?history_id=".$history_id."&attend=6&studentID=".$student_id."&parentID=".$parent_id."&teacherID=".$teacher_id."&date=".$s_date."&time=".$student_timeS."&Adate=".$a_date."&history_id=".$history_id."'><button type='button' class='mb-2 mr-2 btn btn-danger'><i class='fa fa-frown-o'></i></button></a>";} ?> <?php if ($mnp == 2 OR $mnp == 3) {echo "<a href='file-valid?history_id=".$history_id."'><button type='button' class='mb-2 mr-2 btn btn-warning'><i class='fa fa-check'></i></button></a>";} ?></td>
								
							</tr>
							<?php 	
		}
	}	
?>
								<tr>
									<td colspan="9">
									
									</td>
								</tr>
								<?php
                $tt = $_SESSION['is']['teacher_id'];
// sending query
   $sql = "SELECT * FROM `class_history` WHERE date_teacher = '$today' and teacher_id = '$tt' ORDER BY time_start ASC";
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
			$a_date = $row['date_admin'];
			$t_date = $row['date_teacher'];
			$s_date = $row['date_student'];
			$restatus = $row['re_status'];
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
									 <b><?php echo StudentName("$student_id"); ?></b>
								</td>
								<td>
									 <b><?php echo DeptName("$dept_id"); ?></b>
								</td>
								<td>
									 <a href="history_course?Course_ID=<?php echo base64_encode($student_id); ?>"><b>History</b></a>
								</td>
								<td>
								<?php if ($status == 11){ echo '<div class="ml-auto badge badge-warning">On Trial</div>'; } 
								elseif ($status == 17){ echo '<div class="ml-auto badge badge-danger">Suspended</div>'; } 
								elseif ($status == 18){ echo '<div class="ml-auto badge badge-danger">Shifted</div>'; }
								elseif ($status == 19){ echo '<div class="ml-auto badge badge-danger">Advance</div>'; } 
								elseif ($status == 20){ echo '<div class="ml-auto badge badge-danger">Re-Scheduled</div>'; } 
								elseif ($status == 21){ echo '<div class="ml-auto badge badge-warning">Extra</div>'; }
								else { echo '<div class="ml-auto badge badge-success">Regular</div>'; } ?>
								</td>
								<td><?php if ($mnp == 1 && $status != 17){echo "<a href='time-check?history_id=".$history_id."&timezone=".$timeValue."&Sid=".$student_id."&Tid=".$teacher_id."&Pid=".$parent_id."&TTS=".$teacher_timeS."&TTE=".$teacher_timeE."&y=".time()."'' target='_blank'><button class='mb-2 mr-2 btn btn-info'>Activate</button></a> <a href='time-check-leave?history_id=".$history_id."&timezone=".$timeValue."&TTS=".$teacher_timeS."&TTE=".$teacher_timeE."''><button class='mb-2 mr-2 btn btn-info'>Leave</button></a>";} 
								elseif ($mnp == 2){echo "<a href='file-start?history_id=".$history_id."'><button class='mb-2 mr-2 btn btn-success'>Start</button></a>";}
								elseif ($mnp == 9) { echo '<button type="button" class="mb-2 mr-2 btn btn-success disabled">Taken</button>'; } 
								elseif ($mnp == 4) { echo '<button type="button" class="mb-2 mr-2 btn btn-danger disabled">Absent</button>'; } 
								elseif ($mnp == 5) { echo '<button type="button" class="mb-2 mr-2 btn btn-info disabled">On Leave</button>'; }
								elseif ($mnp == 6){echo '<button type="button" class="mb-2 mr-2 btn btn-danger disabled">Declined</button>';}
								elseif ($mnp == 7){echo '<button type="button" class="mb-2 mr-2 btn btn-danger disabled">Pending</button>';}
								elseif ($mnp == 8){echo '<button type="button" class="mb-2 mr-2 btn btn-danger disabled">Advance</button>';}
								elseif ($mnp == 3) {echo "<a href='attendence-all?y=".time()."&history_id=".$history_id."&dept_id=".$dept_id."&adept_id=".$adept_id."&course_id=".$student_id."&tdate=".$tdate."&ppis=".$parent_id."&pid=".$parent_id."'><button class='mb-2 mr-2 btn btn-warning'>End</button></a>";} ?>
								<?php if (($mnp == 4 OR $mnp == 5 OR $mnp == 6) && $restatus != 2) {echo '<a class="allocation1" href="#allocation-c" data-toggle="modal" data-target="#allocation-c" data-id="'.$history_id.'"><button type="button" style="width: 85px" class="mb-2 mr-2 btn btn-info">Re-schedule</button></a>'; } 
								elseif ($mnp == 5 && $restatus == 2) {echo '<button type="button" style="width: 90px" class="mb-2 mr-2 btn btn-danger disabled">Re-scheduled</button>'; } ?>
								<?php if ($mnp == 2) {echo "<a href='leave_absent_mark?history_id=".$history_id."&attend=4&studentID=".$student_id."&parentID=".$parent_id."&teacherID=".$teacher_id."&date=".$s_date."&time=".$student_timeS."&Adate=".$a_date."&history_id=".$history_id."'><button class='mb-2 mr-2 btn btn-danger'>Absent</button></a>";} else {echo "";} ?>
								<?php if ($mnp == 2) {echo "<a href='leave_absent_mark?history_id=".$history_id."&attend=5&studentID=".$student_id."&parentID=".$parent_id."&teacherID=".$teacher_id."&date=".$s_date."&time=".$student_timeS."&Adate=".$a_date."&history_id=".$history_id."'><button class='mb-2 mr-2 btn btn-info'>Leave</button></a>";} ?>
								<?php if ($mnp == 3) {echo "<a href='leave_absent_mark?history_id=".$history_id."&attend=6&studentID=".$student_id."&parentID=".$parent_id."&teacherID=".$teacher_id."&date=".$s_date."&time=".$student_timeS."&Adate=".$a_date."&history_id=".$history_id."'><button class='mb-2 mr-2 btn btn-danger'><i class='fa fa-sad-tear'></i></button></a>";} ?> <?php if ($mnp == 2 OR $mnp == 3) {echo "<a href='classroom?teacher=".$teacher_id."' target='_blank'><button class='mb-2 mr-2 btn btn-warning'>Meeting Room</button></a>";} ?><?php if ($mnp == 2 OR $mnp == 3) {echo "<a href='file-valid?history_id=".$history_id."'><button class='mb-2 mr-2 btn btn-warning'><i class='fa fa-check'></i></button></a>";} ?>
								</td>								
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
<!-- Large modal start -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-throttle-debounce/1.1/jquery.ba-throttle-debounce.min.js"></script>
<div class="modal fade bd-example-modal-lg" id="allocation-c" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        
        </div>
    </div>
</div>
<!-- Large modal end  -->
<!-- Large modal start -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-throttle-debounce/1.1/jquery.ba-throttle-debounce.min.js"></script>
<div class="modal fade bd-example-modal-lg" id="leave1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add New CLass</h5>
                <a onclick="goBack()"><button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button></a>
            </div>
            <div class="modal-body">
               Its too late to mark this class on leave. You are not allowed to mark any class on leave after class time.                 
                                
             </div>
            <div class="modal-footer">
                <a onclick="goBack()"><button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button></a>
            </div>
        </div>
    </div>
</div>
<!-- Large modal end  -->
<!-- Large modal start -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-throttle-debounce/1.1/jquery.ba-throttle-debounce.min.js"></script>
<div class="modal fade bd-example-modal-lg" id="note" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add New CLass</h5>
                <a onclick="goBack()"><button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button></a>
            </div>
            <div class="modal-body">
                       From Now, you are not allowed to activate class other then class time. For example, if class time is 02:00 PM, you can <button type='button' class='mb-2 mr-2 btn btn-danger'>Activate</button> class
											  during your class time, means you can ACTIVATE class between 02:00 and 02:30 only else you have to contact admin to activate the class. You may face thi 
											  issue if the class is not scheduled correctly. Please make sure that the scheduled time should be correct. Please contact Admin QuranSheikh in this regard.         
                                
             </div>
            <div class="modal-footer">
                <a onclick="goBack()"><button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button></a>
            </div>
        </div>
    </div>
</div>
<!-- Large modal end  -->
<script>
$('.allocation1').click(function(){
    var famID=$(this).attr('data-id');
    
    $.ajax({url:"re-schedule-class-teacher.php?famID="+famID,cache:false,success:function(result){
        $(".modal-content").html(result);
    }});
});
</script>
<?php
if (!empty($_REQUEST['error_id']) && $_REQUEST['error_id'] == 1){
			echo "<script type='text/javascript'>
    $(window).on('load',function(){
        $('#note').modal('show');
    });
</script>";
}
elseif (!empty($_REQUEST['error_id']) && $_REQUEST['error_id'] == 2){
			echo "<script type='text/javascript'>
    $(window).on('load',function(){
        $('#leave1').modal('show');
    });
</script>";
}
else {
echo '';
}
?>
<script>
function goBack() {
    window.history.back();
}
</script>
