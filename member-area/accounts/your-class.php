<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ini_set('log_errors', 1);

if (session_status() !== PHP_SESSION_ACTIVE) session_start();

header("Cache-Control: no-cache, must-revalidate");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");

require("../includes/dbconnection.php");
require_once("../includes/mysql-compat.php");

if (!isset($conn) || !$conn instanceof mysqli) {
    die("Database connection not available. Please contact administrator.");
}

include("../includes/main-var.php");
$tt = $_SESSION['is']['parent_id'] ?? null;
date_default_timezone_set($TimeZoneCustome);
$time_start = date('Y-m-d H:i:s');
$history =base64_decode($_GET["s"]);
$teacher =base64_decode($_GET["t"]);
?>
<!DOCTYPE html>
<!-- 
Author: Muhammad Farooq
Website: http://www.tarteeltechnologies.com/
Contact: info@tarteeltechnologies.com
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title><?php echo $title; ?></title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css">
<link href="../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="../assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css">
<link href="../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="../assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css">
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="../assets/global/css/components-rounded.css" id="style_components" rel="stylesheet" type="text/css">
<link href="../assets/global/css/plugins.css" rel="stylesheet" type="text/css">
<link href="../assets/admin/layout3/css/layout.css" rel="stylesheet" type="text/css">
<link href="../assets/admin/layout3/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color">
<link href="../assets/admin/layout3/css/custom.css" rel="stylesheet" type="text/css">
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
<script>
    function Reload()   {
        document.getElementById("mytable").innerHTML;
    }
    </script>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-menu-fixed" class to set the mega menu fixed  -->
<!-- DOC: Apply "page-header-top-fixed" class to set the top menu fixed  -->
<body>
<!-- BEGIN HEADER -->
<div class="page-header">
	<!-- BEGIN HEADER TOP -->
	<div class="page-header-top">
		<div class="container">
			<!-- BEGIN LOGO -->
			<div class="page-logo">
				<a href="<?php echo $site; ?>"><img src="../assets/admin/layout3/img/logo-default.png" alt="logo" class="logo-default"></a>
			</div>
			<!-- END LOGO -->
			<!-- BEGIN RESPONSIVE MENU TOGGLER -->
			<a href="javascript:;" class="menu-toggler"></a>
			<!-- END RESPONSIVE MENU TOGGLER -->
<!-- END HEADER TOP -->

</div>
<!-- END HEADER -->
<div class="modal-header">
										</div>
										<div class="modal-body">
										<div class="portlet box green">
									<div class="portlet-title">
									    <div class="caption">Status of this class</div>

									</div>
<div class="portlet-body">
<div class="timeline">
						<div class="timeline-item">
							<div class="timeline-body">
								<div class="timeline-body-arrow">
								</div>
								<div class="timeline-body-head">
								<div class="timeline-body-content">
									<span class="font-grey-cascade">
<?php
						$result = mysql_query("SELECT `class_history`.*,`course`.`course_yrSec`,`monitor`.`mnt_name`,`remaks`.`remak`,`profile`.`teacher_name` FROM `class_history`,`course`,`monitor`,`remaks`,`profile` WHERE class_history.course_id=course.course_id and class_history.monitor_id=monitor.mnt_id and class_history.teacher_remarks=remaks.remk_id and class_history.teacher_id=profile.teacher_id HAVING history_id = '$history'");

if (!$result) 
		{
		die("Query to show fields from table failed");
		}
			$numberOfRows = MYSQL_NUMROWS($result);
			If ($numberOfRows == 0) 
				{
			//echo 'Sorry No Record Found!';
				}
			else if ($numberOfRows > 0) 
				{
				$i=0;
				// $this_course_ID = MYSQL_RESULT($result,$i,"course_id");
			$fff = MYSQL_RESULT($result,$i,"monitor_id");
			$hid = MYSQL_RESULT($result,$i,"history_id");
			$student = MYSQL_RESULT($result,$i,"course_yrSec");
			$remarkst = MYSQL_RESULT($result,$i,"remak");
			$teacher = MYSQL_RESULT($result,$i,"teacher_name");
			$a_date = MYSQL_RESULT($result,$i,"date_admin");
			$re_a_date = MYSQL_RESULT($result,$i,"re_date_admin");
			$le_a_date = MYSQL_RESULT($result,$i,"le_date_admin");
			$tech_id = MYSQL_RESULT($result,$i,"teacher_id");
			$stur_course_id = MYSQL_RESULT($result,$i,"course_id");
			$admin_timeS = MYSQL_RESULT($result,$i,"start_time_A");
			$admin_timeE = MYSQL_RESULT($result,$i,"end_time_A");
			$student_timeS = MYSQL_RESULT($result,$i,"start_time_S");
			$student_timeE = MYSQL_RESULT($result,$i,"end_time_S");
			$teacher_timeS = MYSQL_RESULT($result,$i,"time_start");
			$teacher_timeE = MYSQL_RESULT($result,$i,"time_end");
			$sabuq = MYSQL_RESULT($result,$i,"sabaq");
			$sabuqi = MYSQL_RESULT($result,$i,"sabaqi");
			$manz = MYSQL_RESULT($result,$i,"manzil");
			$r_course_id = MYSQL_RESULT($result,$i,"dept_id");
			$r_lesson_id = MYSQL_RESULT($result,$i,"lesson_id");
			$r_lesson_des = MYSQL_RESULT($result,$i,"lesson_discription");
			$a_course_id = MYSQL_RESULT($result,$i,"adept_id");
			$a_lesson_id = MYSQL_RESULT($result,$i,"alesson_id");
			$a_lesson_des = MYSQL_RESULT($result,$i,"additional_des");
			$monitor = MYSQL_RESULT($result,$i,"mnt_name");
			$restatus = MYSQL_RESULT($result,$i,"re_status");
			$typid = MYSQL_RESULT($result,$i,"type_id");
			$status = MYSQL_RESULT($result,$i,"status");
			$t_date = MYSQL_RESULT($result,$i,"date_teacher");
			$s_date = MYSQL_RESULT($result,$i,"date_student");
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
					mysql_query("UPDATE class_history SET monitor_id = '3', start_time = '$time_start', end_time = '$time_start' WHERE history_id = '$history'") or die(mysql_error());
					echo '<div class="alert alert-success">Teacher is in the class waiting for you. Please click to join the class room.<br><br>
					<a href="classroom-d?t='.base64_encode($tech_id).'&time='.time().'&h='.base64_encode($history).'"><button type="button" style="width: 100px" class="btn green btn-xs">Join Class Now</button></a></div>';
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
						?>
						</span>

								</div>
							</div>
						</div>
										</div></div></div></div>
										
<!-- BEGIN FOOTER -->
<div class="page-footer">
	<div class="container">
		 <?php echo $index_bottom_line; ?>
		 	</div>
</div>
<div class="scroll-to-top">
	<i class="icon-arrow-up"></i>
</div>
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="../assets/global/plugins/respond.min.js"></script>
<script src="../assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
<script src="../assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="../assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<script src="../assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="../assets/admin/layout3/scripts/layout.js" type="text/javascript"></script>
<script src="../assets/admin/layout3/scripts/demo.js" type="text/javascript"></script>
<script>
jQuery(document).ready(function() {       
   // initiate layout and plugins
   Metronic.init(); // init metronic core components
Layout.init(); // init current layout
Demo.init(); // init demo features
});
</script>
</body>
<!-- END BODY -->
</html>
