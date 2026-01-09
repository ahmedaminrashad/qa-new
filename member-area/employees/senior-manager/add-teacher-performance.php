<?php session_start(); ?>
<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ini_set('log_errors', 1);

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

require("../includes/dbconnection.php");
require_once("../includes/mysql-compat.php");

// Check database connection
if (!isset($conn) || !$conn) {
    die("Database connection failed. Please contact the administrator.");
}
<?php
include("../includes/session.php");
  include("../includes/s_manager_rights.php");
  require ("../includes/dbconnection.php");
include("header.php");
$tid =$_REQUEST['t_id'];
$t_link =$_REQUEST['t_link'];
$month =$_REQUEST['mon'];
$year =$_REQUEST['yyy'];
$ddd = ''.$year.'-'.$month.'-01';
$last_date = date("Y-m-t", strtotime($ddd));
function attendence_p($m, $y, $t)
{
$result = mysql_query("SELECT * FROM teacher_attendance Where MONTH(date) = $m AND YEAR(date) = $y AND teacher_id = $t");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$tnumberOfRows = MYSQL_NUMROWS($result);
$att_p = 100-($tnumberOfRows*3.33);
echo number_format($att_p, 2);
}

function classes_p($t)
{
$result = mysql_query("SELECT * FROM sched Where teacher_id = $t");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$tnumberOfRows = MYSQL_NUMROWS($result);
echo number_format($tnumberOfRows, 2);
}

function test_p($m, $y, $t)
{
$sql = "select sum(teacher_p) from test_results Where MONTH(test_date) = $m AND YEAR(test_date) = $y AND teacher_id = $t";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
if ($row = 0){
echo '0.00';
}
else{
$result = mysql_query("SELECT * FROM test_results Where MONTH(test_date) = $m AND YEAR(test_date) = $y AND teacher_id = $t AND status_id = 2");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$tnumberOfRows = MYSQL_NUMROWS($result);
$t_p = $row/$tnumberOfRows;
echo number_format($t_p, 2);
}
}

function complaint_p($m, $y, $t)
{
$result = mysql_query("SELECT * FROM complaint Where MONTH(date1) = $m AND YEAR(date1) = $y AND teacher_id = $t");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$tnumberOfRows = MYSQL_NUMROWS($result);
$com_p = 100-($tnumberOfRows*5);
echo number_format($com_p, 2);
}
if (isset($_POST['genSubmit'])) 
  	{ 		
		 	$p_att= $_POST['att'];
		 	$p_test= $_POST['test'];
		 	$p_comp= $_POST['comp'];
		 	$p_teach= $_POST['teach'];
		 	$p_lan= $_POST['lan'];
		 	$p_sub= $_POST['sub'];
		 	$p_aten= $_POST['aten'];
		 	$p_dress= $_POST['dress'];
		 	$p_bav= $_POST['bav'];
		 	$p_decl= $_POST['decl'];
		 	$p_link= $_POST['link_id'];
		 	$p_tid= $_POST['tech_id'];
		 	$p_date= $_POST['date'];
		 	$p_classes= $_POST['classes'];
		 	$p_ldate= $_POST['l_date'];
		 	$p_user= $_POST['userid'];
			mysql_query ("INSERT INTO teacher_performance_c (teacher_id, user_id, date, attendence, test, teaching, language, subject, attentiveness, dress_code, behaviour, discipline, complaints, last_date, classes)
					VALUES('$p_tid', '$p_user', '$p_date', '$p_att', '$p_test', '$p_teach', '$p_lan', '$p_sub', '$p_aten', '$p_dress', '$p_bav', '$p_decl', '$p_comp', '$p_ldate', '$p_classes')") or die(mysql_error()); 
					 header(
			 	"Location: $p_link");
				}
?>
<?php
date_default_timezone_set("Africa/Cairo");
$sy = date('Y-m-d');
?>
<?php echo $main_header; ?>
<head>
<link href="../../assets/global/plugins/nouislider/jquery.nouislider.min.css" rel="stylesheet" type="text/css"/>
<link href="../../assets/global/plugins/nouislider/jquery.nouislider.pips.min.css" rel="stylesheet" type="text/css"/>
</head>
<?php echo $tool_bar; ?>
<?php echo $start_menu; ?>
<?php echo $search_bar; ?>
<?php echo $main_menu; ?>
<!-- BEGIN PAGE CONTAINER -->
<div class="page-container">
	<!-- BEGIN PAGE HEAD -->
	<div class="page-head">
		<div class="container">
			<!-- BEGIN PAGE TITLE -->
			<div class="page-title">
				<h1>Add <small>Teacher Performance</small></h1>
			</div>
			<!-- END PAGE TITLE -->
			<!-- BEGIN PAGE TOOLBAR -->
			<div class="page-toolbar">
			</div>
			<!-- END PAGE TOOLBAR -->
		</div>
	</div>
	<!-- END PAGE HEAD -->
	<!-- BEGIN PAGE CONTENT -->
	<div class="page-content">
		<div class="container">
			<!-- BEGIN PAGE BREADCRUMB -->
			<ul class="page-breadcrumb breadcrumb">
				<li>
					<a href="admin-home">Home</a><i class="fa fa-circle"></i>
				</li>
				<li class="active">
					 You are adding Teacher Performance
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="row">
				<div class="col-md-12">
					<div class="tabbable tabbable-custom tabbable-noborder tabbable-reversed">
						<div class="tab-content">
								<div class="portlet box green">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-plus"></i>You are adding Teacher Performance
										</div>
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" class="form-horizontal form-row-seperated">
										<div class="form-group">
										<label class="col-md-3 control-label"><b>Attendence Performance</b></label>
										<div class="col-md-4">
										<input type="text" value="<?php echo attendence_p("$month", "$year", "$tid"); ?>" name="att" id="att" class="form-control input-circle" readonly>
									</div>
									</div>
										<div class="form-group">
										<label class="col-md-3 control-label"><b>Test Performance</b></label>
										<div class="col-md-4">
										<input type="text" value="<?php echo test_p("$month", "$year", "$tid"); ?>" name="test" id="test" class="form-control input-circle" readonly>
									</div>
									</div>
										<div class="form-group">
										<label class="col-md-3 control-label"><b>Classes/Week</b></label>
										<div class="col-md-4">
										<input type="text" value="<?php echo classes_p("$tid"); ?>" name="classes" id="classes" class="form-control input-circle" readonly>
									</div>
									</div>
										<div class="form-group">
										<label class="col-md-3 control-label"><b>Complaints Records</b></label>
										<div class="col-md-4">
										<input type="text" value="<?php echo complaint_p("$month", "$year", "$tid"); ?>" name="comp" id="comp" class="form-control input-circle" readonly>
									</div>
									</div>
										<div class="form-group">
										<label class="col-md-3 control-label"><b>Teaching Skills</b></label>
										<div class="col-md-4">
											<div class="noUi-gree noUi-connect" id="slider1">
											</div>
											<input required type="text" placeholder="e.g. Pakistan" name="teach" id="slider1-span" class="form-control input-circle">
										</div>
									</div>
										<div class="form-group">
										<label class="col-md-3 control-label"><b>Language Skills</b></label>
										<div class="col-md-4">
											<div class="noUi-gree noUi-connect" id="slider4">
											</div>
											<input required type="text" placeholder="e.g. Pakistan" name="lan" id="slider4-span" class="form-control input-circle">
										</div>
									</div>
										<div class="form-group">
										<label class="col-md-3 control-label"><b>Subject Knowledge</b></label>
										<div class="col-md-4">
											<div class="noUi-gree noUi-connect" id="slider5">
											</div>
											<input required type="text" placeholder="e.g. Pakistan" name="sub" id="slider5-span" class="form-control input-circle">
										</div>
									</div>
										<div class="form-group">
										<label class="col-md-3 control-label"><b>Attentiveness</b></label>
										<div class="col-md-4">
											<div class="noUi-bm noUi-connect" id="slider2">
											</div>
											<input required type="text" placeholder="e.g. Pakistan" name="aten" id="slider2-span" class="form-control input-circle">
										</div>
									</div>
										<div class="form-group">
										<label class="col-md-3 control-label"><b>Dress Code</b></label>
										<div class="col-md-4">
											<div class="noUi-warning noUi-connect" id="slider6">
											</div>
											<input required type="text" placeholder="e.g. Pakistan" name="dress" id="slider6-span" class="form-control input-circle">
										</div>
									</div>
										<div class="form-group">
										<label class="col-md-3 control-label"><b>Behaviour</b></label>
										<div class="col-md-4">
											<div class="noUi-danger noUi-connect" id="slider3">
											</div>
											<input required type="text" placeholder="e.g. Pakistan" name="bav" id="slider3-span" class="form-control input-circle">
										</div>
									</div>
										<div class="form-group">
										<label class="col-md-3 control-label"><b>Discipline</b></label>
										<div class="col-md-4">
											<div class="noUi-bch noUi-connect" id="slider7">
											</div>
											<input required type="text" placeholder="e.g. Pakistan" name="decl" id="slider7-span" class="form-control input-circle">
											<a href="javascript:;" id="slider2-btn" class="btn btn-success" style="float:right;margin:20px 0 0">Lock</a>
										</div>
									</div>
												<input type="hidden" value="<?php echo $t_link; ?>" name="link_id" id="link_id" class="form-control input-circle">
												<input type="hidden" value="<?php echo $tid; ?>" name="tech_id" id="tech_id" class="form-control input-circle">
												<input type="hidden" value="<?php echo $sy; ?>" name="date" id="date" class="form-control input-circle">
												<input type="hidden" value="<?php echo $ID; ?>" name="userid" id="userid" class="form-control input-circle">
												<input type="hidden" value="<?php echo $last_date; ?>" name="l_date" id="l_date" class="form-control input-circle">
											<?php
	$result = mysql_query("SELECT * FROM teacher_performance_c where teacher_id = '$tid' and MONTH(last_date) = '$month' AND YEAR(last_date) = '$year'");
	if (!$result) 
		{
		die("Query to show fields from table failed");
		}
			$numberOfRows = MYSQL_NUMROWS($result);
			If ($numberOfRows == 0) 
				{
			echo '<div class="form-actions">
												<div class="row">
													<div class="col-md-offset-3 col-md-9">
														<button type="submit" name="genSubmit" class="btn btn-circle blue">Submit</button>
														<a href="'.$t_link.'"><button type="button" class="btn btn-circle default">
														Cancel</button></a>
													</div>
												</div>
											</div>';
				}
			else if ($numberOfRows > 0) 
				{
				echo '<span class="label label-sm label-success">Already Generated</span>';
			}
?>
										</form>
										<!-- END FORM-->
									</div>
								</div>
							</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- END PAGE CONTENT INNER -->
		</div>
	</div>
	<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->
<?php echo $fot; ?>
<script src="../../assets/global/plugins/nouislider/jquery.nouislider.all.js"></script>
<script src="../../assets/admin/pages/scripts/components-nouisliders.js"></script>
<script>
jQuery(document).ready(function() {       
   // initiate layout and plugins
   Metronic.init(); // init metronic core components
Layout.init(); // init current layout
Demo.init(); // init demo features  // set current page
   ComponentsNoUiSliders.init();
});
</script>