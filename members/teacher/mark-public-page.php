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
?>
<?php
$page_title = 'Details';
$page_subtitle = 'Details';
$table_name = 'Details;
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
                                    <form action="mark-class-publich-holiday" method="POST">
                                        <table class="align-middle mb-0 table table-striped table-hover">
								<thead>
								<tr>
								<th>
									#
								</th>
								<th>
									 &nbsp;
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
   $sql = "SELECT * FROM `class_history` WHERE date_teacher = '$today' and teacher_id = '$tt' ORDER BY time_s_id";
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
			$student_time = $row['stime_s_id'];
			$teacher_time = $row['time_s_id'];
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
									<?php if ($mnp == 21){echo '<i class="fa fa-check font-green"></i>';} else { echo '<input name="checkbox[]" type="checkbox" value="'.$history_id.'" checked>'; } ?>
								</td>
								<td><a href="skype:<?php sum($student_id); ?>?call"><i class="fa fa-phone"></i></a></td>
								<td>
									 <b><?php echo time1("$teacher_time"); ?></b>
								</td>
								<td>
									 <b><?php echo time1("$student_time"); ?></b>
								</td>
								<td>
									 <b><?php echo StudentName("$student_id"); ?> <?php //if ($class_type == 1){ echo ''; } elseif ($class_type == 2){ echo '<div class="ml-auto badge badge-success">Extra</span>'; } elseif ($class_type == 3){ echo '<div class="ml-auto badge badge-warning">Re-Scheduled</span>'; } ?></b>
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
								<td><?php if ($mnp == 1){echo "<button type='button' style='width: 75px' class='mb-2 mr-2 btn btn-outline-danger disabled'>Activate</button>";} 
								elseif ($mnp == 21){echo '<a href="valid.php?parent_id='.$history_id.'"><button type="button" class="mb-2 mr-2 btn btn-outline-warning">Reset</button></a>';} 
								?>								
							</tr>
							<?php 	
		}
	}	
?>
</tbody>
								</table>
								<button type="submit" class="btn green">Mark Selected as Public Holiday</button>
								</form>
								</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Table Row End -->
                    
                </div>
                <!-- App inner end -->
<?php echo $footer; ?>