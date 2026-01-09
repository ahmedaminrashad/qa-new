<?php session_start(); ?>
  <?php
  include("../includes/session1.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("../includes/notifications.php");
  include("header.php");
  $pT =base64_decode($_GET['pT']);
  function abc($d, $t)
  {
  require ("../includes/dbconnection.php");
  $pT =base64_decode($_GET['pT']);
			$sql = "SELECT `sched`.*, `course`.`course_yrSec`,`profile`.`teacher_name`,`day`.`day_name` FROM `sched`,`course`,`profile`,`day` WHERE sched.course_id=course.course_id and sched.teacher_id=profile.teacher_id and sched.day_id=day.day_id HAVING course_id ='$pT' and sday_id = '$d' and start_time_S = '$t'";
			$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){			
					$sched = $row['sched_id'];
					$TID = $row['teacher_id'];
					$SID = $row['course_id'];
					$hidden_pcourse = $row['course_yrSec'];
					$hidden_pt = $row['teacher_name'];
					$hidden_pday = $row['day_id'];
					$tt1 = $row['time_start'];
					$tt2 = $row['time_end'];
					$trial = $row['status'];
					$hidden_ptime2 = $row['day_name'];
					$duration = $row['duration'];
			  		echo "<b>Teacher:</b> ".$hidden_pt."<br><b>Time:</b> ".date("g:i a", strtotime($tt1))."<br><b>Duration:</b> ".$duration."<br><b>Day:</b> ".$hidden_ptime2." <br><a href='sched_c_del?sched_id=".$sched."'><button class='mb-2 mr-2 btn btn-outline-danger'>Delete</button></a>";
			}
			}
	}
function color($d, $t){
require ("../includes/dbconnection.php");
$pT =base64_decode($_GET['pT']);
			$sql = "SELECT * FROM sched HAVING course_id = $pT and sday_id = $d and start_time_S = '$t'";
			$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '#CECE0F';
			}
		else if ($numberOfRows > 0) 
			{
			echo '#989800';
			 }
		}
?>
<?php
$sy = date('Y-m-d');
?>
<?php
$page_title = 'Student Schedule';
$page_subtitle = 'Student Schedule Details';
$table_name = 'Student Schedule ';
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
                                <div class="card-body"><h5 class="card-title"><a href="student-del-all-s.php?Course_ID=<?php echo $pT; ?>" class="btn red" onclick="return confirm('Are you sure you want to delete all schecdules of Selected Student?');"><button class="mb-2 mr-2 btn btn-outline-danger">Delete All Schedule</button></a></h5>
                                    <div class="table-responsive">
                                        <table class="mb-0 table">
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
$pT =base64_decode($_GET['pT']);
$sql = "SELECT * FROM timetable WHERE TimeName >= (SELECT MIN(start_time_S) FROM sched WHERE course_id = '$pT') AND TimeName <= (SELECT MAX(start_time_S) FROM sched WHERE course_id = '$pT')";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){		
				$ID = $row['TimeID'];
			$name = $row['TimeName'];
			$list = $row['TimeList'];
			

?>
								<tr>
								    <td><?php echo $list; ?></td>
                                    <td bgcolor="<?php echo color("1","$name"); ?>"><font color="#FFFFFF"><?php echo abc("1","$name"); ?></font></td>
                                    <td bgcolor="<?php echo color("2","$name"); ?>"><font color="#FFFFFF"><?php echo abc("2","$name"); ?></font></td>
                                    <td bgcolor="<?php echo color("3","$name"); ?>"><font color="#FFFFFF"><?php echo abc("3","$name"); ?></font></td>
                                    <td bgcolor="<?php echo color("4","$name"); ?>"><font color="#FFFFFF"><?php echo abc("4","$name"); ?></font></td>
                                    <td bgcolor="<?php echo color("5","$name"); ?>"><font color="#FFFFFF"><?php echo abc("5","$name"); ?></font></td>
                                    <td bgcolor="<?php echo color("6","$name"); ?>"><font color="#FFFFFF"><?php echo abc("6","$name"); ?></font></td>
                                    <td bgcolor="<?php echo color("7","$name"); ?>"><font color="#FFFFFF"><?php echo abc("7","$name"); ?></font></td>
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