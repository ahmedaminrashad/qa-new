<?php session_start(); ?>
  <?php
  include("../includes/session.php");
  require ("../includes/dbconnection.php");
  include("header.php");
  $Course_ID =base64_decode($_GET["Course_ID"]);
function lesson($er)
{
require ("../includes/dbconnection.php");
// sending query
   $sql = "SELECT * FROM lesson_pages Where lesson_id = $er";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){			
					$l_name = $row['lesson_name'];
			  		echo $l_name;
			}
			}
	}
?>
<?php
date_default_timezone_set($TimeZoneCustome);
$sy = date('Y-m-d');
?>
<?php
$page_title = 'Lesson History';
$page_subtitle = 'Lesson History';
$table_name = 'Lesson History';
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
									 Date
								</th>
								<th>
									 Class
								</th>
								<th>
									 Duration
								</th>
								<th>
									 Course
								</th>
								<th>
									 Lesson
								</th>
								<th>
									 Description
								</th>
								<th>
									 Sabaq
								</th>
								<th>
									 Sabaqi
								</th>
								<th>
									 Manzil
								</th>
								</tr>
								</thead>
								<tbody>
								<?php 
// sending query
   $Course_ID =base64_decode($_GET["Course_ID"]);
$sql = "SELECT `class_history`.*,`course`.`course_yrSec`,`monitor`.`mnt_name`,`remaks`.`remak`,`profile`.`teacher_name` FROM `class_history`,`course`,`monitor`,`remaks`,`profile` WHERE class_history.course_id=course.course_id and class_history.monitor_id=monitor.mnt_id and class_history.teacher_remarks=remaks.remk_id and class_history.teacher_id=profile.teacher_id HAVING monitor_id > 1 AND course_id = '$Course_ID' ORDER BY date_teacher DESC";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){
			$hid = $row['history_id'];
			$student = $row['course_yrSec'];
			$remarkst = $row['remak'];
			$teacher = $row['teacher_name'];
			$t_date = $row['date_teacher'];
			$tech_id = $row['teacher_id'];
			$stur_course_id = $row['course_id'];
			$st = $row['start_time'];
			$et = $row['end_time'];
			$sabuq = $row['sabaq'];
			$sabuqi = $row['sabaqi'];
			$manz = $row['manzil'];
			$r_course_id = $row['dept_id'];
			$r_lesson_id = $row['lesson_id'];
			$r_lesson_des = $row['lesson_discription'];
			$a_course_id = $row['adept_id'];
			$a_lesson_id = $row['alesson_id'];
			$a_lesson_des = $row['additional_des'];
			$monitor = $row['mnt_name'];
			$status = $row['status'];
			$t_date = $row['date_teacher'];
			$mnp_id = $row['monitor_id'];
			$mhome = $row['home_work'];
			$mnote = $row['note'];

?>
								<tr>
								<td>
									 <?php echo $t_date; ?>
								</td>
								<td>
									 <a href="lesson-page?c_id=<?php echo $r_lesson_id; ?>&did=<?php echo $r_course_id; ?>"><?php echo lesson("$r_lesson_id"); ?></a>
								</td>
								<td>
									 <?php echo $r_lesson_des; ?>
								</td>
								<td>
									 <?php echo $mhome; ?>
								</td>
								<td>
									 <a href="lesson-page?c_id=<?php echo $a_lesson_id; ?>&did=<?php echo $a_course_id; ?>"><?php echo lesson("$a_lesson_id"); ?></a>
								</td>
								<td>
									 <?php echo $a_lesson_des; ?>
								</td>
								<td>
									 <?php echo $mnote; ?>
								</td>
								<td><?php echo $teacher; ?></td>
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