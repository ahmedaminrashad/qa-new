<?php session_start(); ?>
  <?php
  include("../includes/session1.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("../includes/notifications.php");
  include("header.php");
  include("monitoring-functions.php");
$data_date1 = date('Y-m-d', time());
$date_get =$_REQUEST['date'];
if (!empty($date_get)) {$data_date = $date_get;} else { $data_date = $data_date1; }
$sy = date('Y-m-d');
$mm_id = date('m');
$yy_id = date('Y');
function ttm($t1, $t2){
$startTime = new DateTime($t1);
$endTime = new DateTime($t2);
$duration = $startTime->diff($endTime); //$duration is a DateInterval object
echo $duration->format("%H:%I");
}
$sy = date('Y-m-d');
$time_start = date("Gi", time());

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
?>
<?php
$page_title = 'List of Classes';
$page_subtitle = 'List of current classes today!';
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
$new_date = date('l jS F-Y', $old_date_timestamp); echo '<div class="ml-auto badge badge-success">'.$new_date.'</div>'; ?> <div class="ml-auto badge badge-success">Current</div></h5>
                                    <div class="table-responsive">
                                        <table class="align-middle mb-0 table table-hover">
                                            <thead>
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
                                            </thead>
                                            <tbody>
                                            <?php 
// sending query
$sql = "SELECT * FROM `class_history` WHERE date_admin = '$data_date' AND atime_s_id = '$cc' ORDER BY 'start_time_A'";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
if ($numberOfRows == 0) 
	{
	echo 'Sorry No Record Found!';
	}
elseif ($numberOfRows > 0) 
	{
	while($row = mysqli_fetch_array($result))
		{		
			if($row['monitor_id']=='2') //waiting
				{
					$bgcolor ='#F5A9A9';
				}
			elseif($row['monitor_id']=='3') //running
				{
					$bgcolor ='#F2F5A9';
				}		
			elseif($row['monitor_id']=='4') //absent
				{
					$bgcolor ='#F9BCBC';
				}
			elseif($row['monitor_id']=='5') //leave
				{
					$bgcolor ='#C3C3FA';
				}
			elseif($row['monitor_id']=='6') //declined
				{
					$bgcolor ='#CEECF5';
				}
			elseif($row['monitor_id']=='7') //still pending
				{
					$bgcolor ='#FE642E';
				}
			elseif($row['monitor_id']=='8') //taken advance
				{
					$bgcolor ='#D8D8D8';
				}
			elseif($row['monitor_id']=='9') //taken
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
								<td><a href="valid.php?parent_id=<?php echo $sched_id; ?>"><button class="mb-2 mr-2 btn btn-outline-primary"><i class='lnr-redo'></i></button></a></td>
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