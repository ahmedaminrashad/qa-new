<?php session_start(); ?>
  <?php
  include("../includes/session.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("header.php");
  $link = $_SERVER['REQUEST_URI'];
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
	
function course($er)
{
require ("../includes/dbconnection.php");
// sending query
   $sql = "SELECT * FROM dept Where dept_id = $er";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){			
					$c_name = $row['department'];
			  		echo $c_name;
			}
			}
	}
  
?>
<?php
$page_title = 'Lesson History';
$page_subtitle = 'History Detail of '.$student.'';
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
					<?php
					$ccc =$_REQUEST['cour'];
					$ddd =$_REQUEST['adate'];
$sql = "SELECT `class_history`.*,`course`.`course_yrSec`,`monitor`.`mnt_name`,`remaks`.`remak`,`profile`.`teacher_name` FROM `class_history`,`course`,`monitor`,`remaks`,`profile` WHERE class_history.course_id=course.course_id and class_history.monitor_id=monitor.mnt_id and class_history.teacher_remarks=remaks.remk_id and class_history.teacher_id=profile.teacher_id HAVING course_id = '$ccc' AND date_student = '$ddd'";
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
			$a_date = $row['date_student'];
			$re_a_date = $row['re_date_admin'];
			$le_a_date = $row['le_date_admin'];
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
			$restatus = $row['re_status'];
			$status = $row['status'];
			$t_date = $row['date_teacher'];
			$s_date = $row['date_student'];
			$mnp_id = $row['monitor_id'];
			$parent_id = $row['parent_id'];
			$mhome = $row['home_work'];
			$mnote = $row['note'];
?>
									<div class="row">
					<div class="col-md-6">
					<div class="portlet light">
									<h4>
									<font color="#44B6AE"> <b>Class Details:</b></font>
									</h4>
									<div id="mytable" class="table-responsive">
								<table class="table table-hover">
								<tbody>
								<tr>
								<td>Student:</td>
								<td> <b><a href="parent-accounts-profile?parent_id=<?php echo base64_encode($parent_id); ?>"><?php echo $student; ?></a></b></td>
								</tr>
								<tr>
								<td>Teacher:</td>
								<td> <b><a href="teacher-accounts-profile?profile_no=<?php echo base64_encode($tech_id); ?>"><?php echo $teacher; ?></a></b></td>
								</tr>
								<tr>
								<td>Date:</td>
								<td> <b><?php echo $a_date; ?></b></td>
								</tr>
								<tr>
								<td>Start:</td>
								<td> <b><?php $date1=date_create("$st"); echo date_format($date1,"h:i:s a"); ?></b></td>
								</tr>
								<tr>
								<td>End:</td>
								<td> <b><?php $date1=date_create("$et"); echo date_format($date1,"h:i:s a"); ?></b></td>
								</tr>
								<tr>
								<td>Duration:</td>
								<td> <b><?php $start_date = new DateTime("$st");
    $end_date = new DateTime("$et");
    $interval = $start_date->diff($end_date);
    echo "" . $interval->h. " hours, " . $interval->i." mins, ".$interval->s." sec "; ?></b></td>
								</tr>
								<tr>
								<td>Class Status:</td>
								<td><b><?php if ($status == 11){ echo '<span class="label label-sm label-warning">On Trial</span>'; } 
								elseif ($status == 17){ echo '<span class="label label-sm label-danger">Suspended</span>'; } 
								elseif ($status == 18){ echo '<span class="label label-sm label-danger">Shifted</span>'; }
								elseif ($status == 19){ echo '<span class="label label-sm label-danger">Advance for ('.$le_a_date.')</span>'; } 
								elseif ($status == 20){ echo '<span class="label label-sm label-danger">Re-Scheduled for ('.$le_a_date.')</span>'; } 
								else { echo '<span class="label label-sm label-success">Regular</span>'; } ?> 
								<span class="label label-sm label-success"><?php if ($mnp_id != 8){ echo $monitor; } else { echo '{Scheduled Advance on ('.$re_a_date.')}';} ?></span> 
								<span class="label label-sm label-danger"><?php if ($restatus == 2){echo '{Re-Scheduled on ('.$re_a_date.')}';} else {echo '';} ?></span>
								</b> </td>
								</tr>
								<tr>
								</tr>
								<tr>
								<td>Remarks:</td>
								<td> <b><?php echo $remarkst; ?></b></td>
								</tr>
								</tbody>
								</table>
								<h4>
									<font color="#44B6AE"> <b>Regular Lesson Details:</b></font>
									</h4>
								<table class="table table-hover">
								<tbody>
								<tr>
								<td>Course:</td>
								<td><b><?php echo course("$r_course_id"); ?></b></td>
								</tr>
								<tr>
								<td>Lesson Page:</td>
								<td><b><?php echo lesson("$r_lesson_id"); ?></b>&nbsp;&nbsp;<a href="lesson-page?c_id=<?php echo $r_lesson_id; ?>&did=<?php echo $r_course_id; ?>"><?php if ($r_lesson_id == 100){echo '';} else{ echo '<button type="button" class="btn green btn-xs">See Lesson</button>'; } ?></a></td>
								</tr>
								<tr>
								<td>Discription:</td>
								<td>
								<?php echo '<b>'.$r_lesson_des.'</b>'; ?>
								</td>
								</tr>
								<tr>
								<td>Home Work:</td>
								<td>
								<?php echo '<b>'.$mhome.'</b>'; ?>
								</td>
								</tr>
								</tbody>
								</table>
								<h4>
									<font color="#44B6AE"> <b>Additional Lesson Details:</b></font>
									</h4>
								<table class="table table-hover">
								<tbody>
								<tr>
								<td>Course:</td>
								<td><b><?php echo course("$a_course_id"); ?></b></td>
								</tr>
								<tr>
								<td>Lesson Page:</td>
								<td><b><?php echo lesson("$a_lesson_id"); ?></b>&nbsp;&nbsp;<a href="lesson-page?c_id=<?php echo $a_lesson_id; ?>&did=<?php echo $a_course_id; ?>"><?php if ($a_lesson_id == 100 OR $a_lesson_id == 0){echo '';} else{ echo '<button type="button" class="btn green btn-xs">See Lesson</button>'; } ?></a></td>
								</tr>
								<tr>
								<td>Discription:</td>
								<td>
								<b><?php echo $a_lesson_des; ?></b>
								</td>
								</tr>
								</tbody>
								</table>
								</div>
					<!-- END SAMPLE TABLE PORTLET-->
			</div>
			</div>
				<?php 	
		}
	}	
?>
</div>
                            </div>
                        </div>
                    </div>
                    <!-- Table Row End -->
                    
                </div>
                <!-- App inner end -->
<?php echo $footer; ?>