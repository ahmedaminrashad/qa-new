<?php
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
   $tt = $_SESSION['is']['parent_id'];
date_default_timezone_set($TimeZoneCustome);
$time_start = date('Y-m-d H:i:s');
$history =base64_decode($_GET["s"]);
$teacher =base64_decode($_GET["t"]);
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title><?php echo $_SESSION['is']['parent']; ?> - <?php echo $_SESSION['is']['email_id']; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"
    />
    <meta name="description" content="Tables are the backbone of almost all web applications.">

    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">

<link href="./main.8d288f825d8dffbbe55e.css" rel="stylesheet">
</head>
<body>
 
                <div class="scrollbar-sidebar">
                    <div class="app-sidebar__inner">
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
                                <div>Status of this class!
                                    <div class="page-title-subheading">
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
                                    <div class="jumbotron" data-step="1" data-intro="This is a tooltip!">
                                    <?php
                                    require ("../includes/dbconnection.php");
                                    $history =base64_decode($_GET["s"]);
$teacher =base64_decode($_GET["t"]);
$sql = "SELECT `class_history`.*,`course`.`course_yrSec`,`monitor`.`mnt_name`,`remaks`.`remak`,`profile`.`teacher_name` FROM `class_history`,`course`,`monitor`,`remaks`,`profile` WHERE class_history.course_id=course.course_id and class_history.monitor_id=monitor.mnt_id and class_history.teacher_remarks=remaks.remk_id and class_history.teacher_id=profile.teacher_id HAVING history_id = '$history'";

$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo 'dbbttbr';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){
			$fff = $row['monitor_id'];
			$hid = $row['history_id'];
			$student = $row['course_yrSec'];
			$remarkst = $row['remak'];
			$teacher = $row['teacher_name'];
			$a_date = $row['date_admin'];
			$re_a_date = $row['re_date_admin'];
			$le_a_date = $row['le_date_admin'];
			$tech_id = $row['teacher_id'];
			$stur_course_id = $row['course_id'];
			$admin_timeS = $row['start_time_A'];
			$admin_timeE = $row['end_time_A'];
			$student_timeS = $row['start_time_S'];
			$student_timeE = $row['end_time_S'];
			$teacher_timeS = $row['time_start'];
			$teacher_timeE = $row['time_end'];
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
			$typid = $row['type_id'];
			$status = $row['status'];
			$t_date = $row['date_teacher'];
			$s_date = $row['date_student'];
					if ($fff == 1) //pending
					{
					echo '<div class="alert alert-danger"><b>Student Name:</b> '.$student.'<br>
					<b>Teacher Name:</b> '.$teacher.'<br>
					<b>Scheduled Date:</b> '.date("D, jS M-Y", strtotime($s_date)).'<br>
					<b>Scheduled Time:</b> '.date("H:i", strtotime($student_timeS)).'<br>
					Teacher is not in the class room.
					If this is your class time, please wait one or two minutes and click on Take Class button again. May be teacher is preparing class room for you.
					<br><br><b>Note: If you have waited for more then 5 minutes, please contact Admin HelpDesk via your whatsApp group.</b></div>';
					}
					elseif ($fff == 2 OR $fff == 3) //2 waitning 3 running
					{
					$sql = "UPDATE class_history SET monitor_id = '3', start_time = '$time_start', end_time = '$time_start' WHERE history_id = '$history'";
					if ($conn->query($sql) === TRUE) {
        echo '';
    }
					
					echo '<div class="alert alert-success">Teacher is in the class waiting for you. Please click to join the class room.<br><br>
					<a href="classroom-d?t='.base64_encode($tech_id).'&time='.time().'&h='.base64_encode($history).'"><button class="mb-2 mr-2 btn btn-outline-success">Join Class Now</button></a></div>';
					}
					elseif ($fff == 4) //Absent
					{
					echo '<div class="alert alert-danger"><b>Student Name:</b> '.$student.'<br>
					<b>Teacher Name:</b> '.$teacher.'<br>
					<b>Scheduled Date:</b> '.date("D, jS M-Y", strtotime($s_date)).'<br>
					<b>Scheduled Time:</b> '.date("H:i", strtotime($student_timeS)).'<br><br>
					<b>The teacher was waiting for you during your scheduled time for the whole class and you did not show up. So, Teacher has marked this class as Absent.</b><br>
					No action needed from your side.<br>
					If you have any question in this regard, feel free to ask anything.</div>';
					}
					elseif ($fff == 5) //Leave
					{
					echo '<div class="alert alert-info"><b>Student Name:</b> '.$student.'<br>
					<b>Teacher Name:</b> '.$teacher.'<br>
					<b>Scheduled Date:</b> '.date("D, jS M-Y", strtotime($s_date)).'<br>
					<b>Scheduled Time:</b> '.date("H:i", strtotime($student_timeS)).'<br>
					<b>The teacher has marked this class as informed leave. You can contact Admin for more information.</b><br>
					No action needed from your side.<br>
					If you have any question in this regard, feel free to ask anything.</div>';
					}
					elseif ($fff == 9) //Leave
					{
					echo '<div class="alert alert-success"><b>Student Name:</b> '.$student.'<br>
					<b>Teacher Name:</b> '.$teacher.'<br>
					<b>Scheduled Date:</b> '.date("D, jS M-Y", strtotime($s_date)).'<br>
					<b>Scheduled Time:</b> '.date("H:i", strtotime($student_timeS)).'<br><br>
					<b>You have already taken this class.</b><br>
					No action needed from your side.<br>
					If you have any question in this regard, feel free to ask anything.</div>';
					}
					elseif ($fff == 6) //Leave
					{
					echo '<div class="alert alert-danger"><b>Student Name:</b> '.$student.'<br>
					<b>Teacher Name:</b> '.$teacher.'<br>
					<b>Scheduled Date:</b> '.date("D, jS M-Y", strtotime($s_date)).'<br>
					<b>Scheduled Time:</b> '.date("H:i", strtotime($student_timeS)).'<br><br>
					<b>Teacher has marked this class as Declined. Please contact Admin for more information.</b><br>
					No action needed from your side.<br>
					If you have any question in this regard, feel free to ask anything.</div>';
					}
				}
				}
						?>

                            </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Table Row End -->
                    
                </div>
                <!-- App inner end -->
          </div>
          <!-- Main Body End  -->
          </div>
</div>
<div class="app-drawer-overlay d-none animated fadeIn"></div><script type="text/javascript" src="./assets/scripts/main.8d288f825d8dffbbe55e.js"></script>
</body>
</html>