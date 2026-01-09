<?php session_start(); ?>
  <?php
  include("../includes/session.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("header.php");
  $link = $_SERVER['REQUEST_URI'];
  date_default_timezone_set($_SESSION['is']['teacher_time']);
  $today = base64_decode($_REQUEST['date']);
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
$page_title = 'Old Classes';
$page_subtitle = 'Old Classes';
$table_name = 'Old Classes';
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
			$id = $row['id'];
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
                                    <?php echo ++$counter; echo '#'.$id?>
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
								<?php if ($status == 11){ echo '<div class="ml-auto badge badge-warning">On Trial</span>'; } 
								elseif ($status == 17){ echo '<div class="ml-auto badge badge-danger">Suspended</div>'; } 
								elseif ($status == 18){ echo '<div class="ml-auto badge badge-danger">Shifted</div>'; }
								elseif ($status == 19){ echo '<div class="ml-auto badge badge-danger">Advance</div>'; } 
								elseif ($status == 20){ echo '<div class="ml-auto badge badge-danger">Re-Scheduled</div>'; } 
								elseif ($status == 21){ echo '<div class="ml-auto badge badge-warning">Extra</div>'; }
								else { echo '<div class="ml-auto badge badge-success">Regular</div>'; } ?>
								</td>
								<td><?php if ($mnp == 1){echo "<button type='button' class='mb-2 mr-2 btn btn-success disabled'>Activate</button>";} 
								elseif ($mnp == 2){echo "<a href='#'><button type='button' class='mb-2 mr-2 btn btn-success disabled'>Start</button></a>";} 
								elseif ($mnp == 9) { echo '<button type="button" class="mb-2 mr-2 btn btn-success disabled">Taken</button>'; } 
								elseif ($mnp == 4) { echo '<button type="button" class="mb-2 mr-2 btn btn-danger disabled">Absent</button>'; } 
								elseif ($mnp == 5) { echo '<button type="button" class="mb-2 mr-2 btn btn-info disabled">On Leave</button>'; }
								elseif ($mnp == 6){echo '<button type="button" class="mb-2 mr-2 btn btn-danger disabled">Declined</button>';}
								elseif ($mnp == 7){echo '<button type="button" class="mb-2 mr-2 btn btn-danger disabled">Pending</button>';}
								elseif ($mnp == 8){echo '<button type="button" class="mb-2 mr-2 btn btn-danger disabled">Advance</button>';}
								elseif ($mnp == 3 && $dept_id != 3) {echo "<button type='button' class='mb-2 mr-2 btn btn-warning disabled'>End</button>";} elseif ($mnp == 3 && $dept_id == 3) {echo "<button type='button' class='mb-2 mr-2 btn btn-warning disabled'>End</button>";} ?>
								<?php if (($mnp == 4 OR $mnp == 5 OR $mnp == 6) && $restatus != 2) {echo '<a class="allocation1" href="#allocation-c" data-toggle="modal" data-target="#allocation-c" data-id="'.$history_id.'"><button type="button" class="mb-2 mr-2 btn btn-info">Re-schedule</button></a>'; } 
								elseif ($mnp == 5 && $restatus == 2) {echo '<button type="button" class="mb-2 mr-2 btn btn-danger disabled">Re-scheduled</button>'; } ?>
								<?php if ($mnp == 2) {echo "<button type='button' class='mb-2 mr-2 btn btn-danger'>";} else {echo "";} ?>
								<?php if ($mnp == 2) {echo "<button type='button' class='mb-2 mr-2 btn btn-info'>Leave</button>";} else {echo "";} ?>
								<?php if ($mnp == 2 OR $mnp == 3) {echo "<button type='button' class='mb-2 mr-2 btn btn-danger'><i class='fa fa-frown-o'></i></button>";} ?> <?php if ($mnp == 2 OR $mnp == 3) {echo "<button type='button' class='btn btn-warning btn-xs'><i class='fa fa-check'></i></button></a>";} ?></td>
								
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
<script>
$('.allocation1').click(function(){
    var famID=$(this).attr('data-id');
    
    $.ajax({url:"re-schedule-class-teacher.php?famID="+famID,cache:false,success:function(result){
        $(".modal-content").html(result);
    }});
});
</script>