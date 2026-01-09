<?php session_start(); ?>
  <?php
  include("../includes/session1.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("../includes/notifications.php");
  include("header.php");
  include("monitoring-functions.php");
$date = date('d/m/Y', time());
$sy = date('Y-m-d');
$mm_id = date('m');
$yy_id = date('Y');
$tech_id =$_REQUEST['teacher'];
$date_id =$_REQUEST['date'];
$data_date = $date_id;
function ttm($t1, $t2){
$startTime = new DateTime($t1);
$endTime = new DateTime($t2);
$duration = $startTime->diff($endTime); //$duration is a DateInterval object
echo $duration->format("%H:%I");
};
$sy = date('Y-m-d');
?>
<?php
$page_title = 'List of Classes';
$page_subtitle = 'List of all classes today!';
$table_name = 'CLasses';
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
                    <!-- Class Dashboard Start-->
                    <div class="row">
                                <div class="col-lg-12 col-xl-6">
                                    <div class="main-card mb-3 card">
                                        <div class="card-body">
                                            <div class="grid-menu grid-menu-3col">
                                                <div class="no-gutters row">
                                                    <div class="col-sm-6 col-xl-4">
                                                        <a href="admin-home-all?date=<?php echo $data_date; ?>"><button class="btn-icon-vertical btn-square btn-transition btn btn-outline-primary"><i class="lnr-laptop-phone btn-icon-wrapper"> </i>Total <?php $sql = "SELECT * FROM class_history WHERE date_admin = '$data_date'";
$result = mysqli_query($conn, $sql);
$tnumberOfRows = mysqli_num_rows($result);
echo $tnumberOfRows; ?></button></a>
                                                    </div>
                                                    <div class="col-sm-6 col-xl-4">
                                                        <a href="admin-home-taken-classes?date=<?php echo $data_date; ?>"><button class="btn-icon-vertical btn-square btn-transition btn btn-outline-success"><i class="lnr-thumbs-up btn-icon-wrapper"> </i>Taken <?php echo today("$data_date", "9"); ?></button></a>
                                                    </div>
                                                    <div class="col-sm-6 col-xl-4">
                                                        <a href="admin-home-remaining-classes?date=<?php echo $data_date; ?>"><button class="btn-icon-vertical btn-square btn-transition btn btn-outline-secondary"><i class="lnr-redo btn-icon-wrapper"> </i>Remaining <?php echo today("$data_date", "1"); ?></button></a>
                                                    </div>
                                                    <div class="col-sm-6 col-xl-4">
                                                        <a href="admin-home-absents?date=<?php echo $data_date; ?>"><button class="btn-icon-vertical btn-square btn-transition btn btn-outline-danger"><i class="lnr-neutral btn-icon-wrapper"> </i>Absent <?php echo today("$data_date", "4"); ?></button></a>
                                                    </div>
                                                    <div class="col-sm-6 col-xl-4">
                                                        <a href="admin-home-leaves?date=<?php echo $data_date; ?>"><button class="btn-icon-vertical btn-square btn-transition btn btn-outline-warning"><i class="lnr-highlight btn-icon-wrapper"> </i>Leave <?php echo today("$data_date", "5"); ?></button></a>
                                                    </div>
                                                    <div class="col-sm-6 col-xl-4">
                                                        <a href="admin-home-running-classes?date=<?php echo $data_date; ?>"><button class="btn-icon-vertical btn-square btn-transition btn btn-outline-info"><i class="lnr-bicycle btn-icon-wrapper"> </i>Runing <?php echo today("$data_date", "3"); ?></button></a>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xl-6">
                                    <div class="main-card mb-3 card">
                                        <div class="card-body">
                                            <div class="grid-menu grid-menu-3col">
                                                <div class="no-gutters row">
                                                    <div class="col-sm-6 col-xl-4">
                                                        <a href="admin-home-declined?date=<?php echo $data_date; ?>"><button class="btn-icon-vertical btn-square btn-transition btn btn-outline-danger"><i class="lnr-sad btn-icon-wrapper"> </i>Declined <?php echo today("$data_date", "6"); ?></button></a>
                                                    </div>
                                                    <div class="col-sm-6 col-xl-4">
                                                        <a href="admin-home-suspended?date=<?php echo $data_date; ?>"><button class="btn-icon-vertical btn-square btn-transition btn btn-outline-danger"><i class="lnr-hand btn-icon-wrapper"> </i>Suspended <?php $sql = "SELECT * FROM class_history WHERE date_admin = '$data_date' AND status = 17";
$result = mysqli_query($conn, $sql);
$tnumberOfRows = mysqli_num_rows($result);
echo $tnumberOfRows; ?></button></a>
                                                    </div>
                                                    <div class="col-sm-6 col-xl-4">
                                                        <a href="admin-home-on-trial?date=<?php echo $data_date; ?>"><button class="btn-icon-vertical btn-square btn-transition btn btn-outline-warning"><i class="lnr-history btn-icon-wrapper"> </i>Trials <?php $sql = "SELECT * FROM class_history WHERE date_admin = '$data_date'AND status = 11";
$result = mysqli_query($conn, $sql);
$tnumberOfRows = mysqli_num_rows($result);
echo $tnumberOfRows; ?></button></a>
                                                    </div>
                                                    <div class="col-sm-6 col-xl-4">
                                                        <a href="admin-home-advance?date=<?php echo $data_date; ?>"><button class="btn-icon-vertical btn-square btn-transition btn btn-outline-info"><i class="pe-7s-graph1 btn-icon-wrapper"> </i>Advance <?php $sql = "SELECT * FROM class_history WHERE date_admin = '$data_date' AND status = 19";
$result = mysqli_query($conn, $sql);
$tnumberOfRows = mysqli_num_rows($result);
echo $tnumberOfRows; ?></button></a>
                                                    </div>
                                                    <div class="col-sm-6 col-xl-4">
                                                        <a href="admin-home-rescheduled?date=<?php echo $data_date; ?>"><button class="btn-icon-vertical btn-square btn-transition btn btn-outline-warning"><i class="lnr-clock btn-icon-wrapper"> </i>Re-Scheduled <?php $sql = "SELECT * FROM class_history WHERE date_admin = '$data_date' AND status = 20";
$result = mysqli_query($conn, $sql);
$tnumberOfRows = mysqli_num_rows($result);
echo $tnumberOfRows; ?></button></a>
                                                    </div>
                                                    <div class="col-sm-6 col-xl-4">
                                                        <a href="admin-home-current-classes"><button class="btn-icon-vertical btn-square btn-transition btn btn-outline-primary"><i class="lnr-hourglass btn-icon-wrapper"> </i>See Current Classes</button></a>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <!-- Class Dashboard ENd-->
                                <!-- form start -->
                                <form class="" action="date_definer" method="post">
                                        <div class="form-row">
                                            <div class="col-md-4">
                                                <div class="position-relative form-group"><label for="exampleSelect" class="">Time</label><select name="select" id="exampleSelect" class="form-control">
                                                    <option></option>
                                                    <?php 
                                                    $sql = "SELECT * FROM timetable ORDER BY TimeID";
$counter = 0;
$result = mysqli_query($conn, $sql);			  	
				while ($row = mysqli_fetch_assoc($result)){  ?>
                      <option value="<?php echo $row['TimeName'];?>"><?php echo $row['TimeList'];?></option>
                      <?php }  ?>
                                                </select></div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="position-relative form-group"><label for="examplePassword11" class="">Date</label><input name="date" id="date" placeholder="password placeholder" type="date" class="form-control"></div>
                                            </div>
                                            <div class="col-md-4">
                                            	<div class="position-relative form-group"><label for="examplePassword11" class="">Teacher</label><input name="pteacher" list="cars" placeholder="password placeholder" type="text" class="form-control"></div>
                                                    <datalist id="cars">
  <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$sql = "SELECT * FROM profile WHERE (cat_id = 8 or teacher_rights = 1) and active = 1 and training = 1 ORDER BY teacher_id";
$counter = 0;
$result = mysqli_query($conn, $sql);			  	
				do {  ?>
                      <option value="<?php echo $row['teacher_id'];?>"> <?php echo $row['teacher_name'];?> (<?php echo $row['Nationality'];?> <?php if ($row['g_id'] == 1) { echo 'Male'; } else { echo 'Female'; }?>)</option>
                      <?php } while ($row = mysqli_fetch_assoc($result)); ?>
</datalist>
                                                </div>
                                            </div>
                                        <button class="mt-2 btn btn-primary">Search By any or Mix of Above</button>
                                    </form>
                                    <!-- form end -->
                    <!-- Table Row Start-->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="main-card mb-3 card">
                                <div class="card-body"><h5 class="card-title"><?php $old_date_timestamp = strtotime($data_date);
$new_date = date('l jS F-Y', $old_date_timestamp); echo '<div class="ml-auto badge badge-success">'.$new_date.'</div>'; ?> <div class="ml-auto badge badge-success">Admin Home</div></h5>
                                    <div class="table-responsive">
                                        <table class="align-middle mb-0 table table-hover">
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
								</tr>
								</thead>
								<tbody>
								<?php
// sending query
   $sql = "SELECT * FROM `class_history` WHERE date_admin = '$date_id' AND teacher_id = '$tech_id' ORDER BY start_time_A";
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
			$sched_id = $row['history_id'];
			$admin_timeS = $row['start_time_A'];
			$admin_timeE = $row['end_time_A'];
			$student_timeS = $row['start_time_S'];
			$student_timeE = $row['end_time_S'];
			$teacher_timeS = $row['time_start'];
			$teacher_timeE = $row['time_end'];
			$duration = $row['duration'];
			$teacher_id = $row['teacher_id'];
			$student_id = $row['course_id'];
			$parent_id = $row['parent_id'];
			$monitor = $row['monitor_id'];// pending, taken, absent, leave, taken advance, running, waiting or still pending
			$dept_id = $row['dept_id'];
			$wa = $row['activation'];
			$status = $row['status'];// Regular, Trial, Rescheduled or Suspended
			$re_status = $row['re_status'];
			$his_date = $row['date_admin'];
?>
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