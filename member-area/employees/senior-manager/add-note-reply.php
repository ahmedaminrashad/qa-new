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
$pid =$_REQUEST['n_id'];
$user =$_SESSION['is']['username'];
$user_id =$_SESSION['is']['user_id'];
date_default_timezone_set("Africa/Cairo");
$sy11 = date('Y-m-d');
$date11 = date('h:i a', time());

    if (isset($_POST['cmdSubmit'])) 
  	{ 		
		 	$feed= $_POST['desc'];
		 	$uname= $_POST['user_name'];
		 	$uid= $_POST['user_id'];
		 	$rda= $_POST['rdate'];
		 	$rti= $_POST['rtime'];
		 	$rppid= $_POST['rpid'];
			mysql_query("UPDATE note_student SET status = '2', read_date = '$rda', read_time = '$rti', user_name = '$uname', user_id = '$uid', feed_back = '$feed' WHERE note_id = '$rppid'") or die(mysql_error()); 
					 header(
			 	"Location: comment-timeline-all");
				}?>
<?php
date_default_timezone_set("Africa/Cairo");
$sy = date('Y-m-d');
?>
<?php echo $main_header; ?>
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
				<h1>Add<small> Note</small></h1>
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
					<a href="teacher-home">Home</a><i class="fa fa-circle"></i>
				</li>
				<li>
					<a href="teacher-student-list">List of Students</a><i class="fa fa-circle"></i>
				</li>
				<li class="active">
					 Add Note
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
											<i class="fa fa-plus"></i>You are adding note for <?php echo $student_name; ?>
										</div>
									</div>
									<div class="portlet-body form">
									<?php $result = mysql_query("SELECT * FROM note_student WHERE note_id = $pid");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
If ($numberOfRows == 0) 
	{
	echo '';
	}
else if ($numberOfRows > 0) 
	{
	$i=0;
		
			$anid = MYSQL_RESULT($result,$i,"note_id");
			$anote = MYSQL_RESULT($result,$i,"note_text");
			$astatus = MYSQL_RESULT($result,$i,"status");
			$adate = MYSQL_RESULT($result,$i,"date");
			$atime = MYSQL_RESULT($result,$i,"time");
			$asid = MYSQL_RESULT($result,$i,"course_id");
			$atid = MYSQL_RESULT($result,$i,"teacher_id");
			$asname = MYSQL_RESULT($result,$i,"student_name");
			$atname = MYSQL_RESULT($result,$i,"teacher_name");
			$apid = MYSQL_RESULT($result,$i,"parent_id");
			$ardate = MYSQL_RESULT($result,$i,"read_date");
			$artime = MYSQL_RESULT($result,$i,"read_time");
			} ?>

										<!-- BEGIN FORM-->
										<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" class="form-horizontal form-row-seperated">
										<div class="form-group">
															<label class="control-label col-md-3">
															<strong>Student Name</strong></label>
															<div class="col-md-9">
															<input type="text" name="1_name" id="1_name" class="form-control" value="<?php echo $asname; ?>" readonly>															</div>
												</div>
										<div class="form-group">
															<label class="control-label col-md-3">
															<strong>Teacher Name</strong></label>
															<div class="col-md-9">
															<input type="text" name="1_name" id="2_name" class="form-control" value="<?php echo $atname; ?>" readonly>															</div>
												</div>
										<div class="form-group">
															<label class="control-label col-md-3">
															<strong>Note</strong></label>
															<div class="col-md-9">
															<input type="text" name="1_name" id="2_name" class="form-control" value="<?php echo $anote; ?>" readonly>															</div>
												</div>
										<div class="form-group">
															<label class="control-label col-md-3">
															<strong>Feed Back</strong></label>
															<div class="col-md-9">
															<textarea required name="desc" id="desc" class="form-control" placeholder="Add Feed Back"></textarea>															</div>
												</div>
												<input type="hidden" class="form-control" value="<?php echo $user; ?>" name="user_name" id="user_name">
												<input type="hidden" class="form-control" value="<?php echo $user_id; ?>" name="user_id" id="user_id">
												<input type="hidden" class="form-control" value="<?php echo $sy11; ?>" name="rdate" id="rdate">
												<input type="hidden" class="form-control" value="<?php echo $date11; ?>" name="rtime" id="rtime">
												<input type="hidden" class="form-control" value="<?php echo $pid; ?>" name="rpid" id="rpid">
											<div class="form-actions">
												<div class="row">
													<div class="col-md-offset-3 col-md-9">
														<button type="submit" name="cmdSubmit" class="btn btn-circle blue">Submit</button>
														<a href="parent-accounts"><button type="button" class="btn btn-circle default">Cancel</button></a>
													</div>
												</div>
											</div>
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
<script language="javascript" >
	var form = document.forms[0];
	//purpose?: to retrieve what users last input on the field..
	form.pcon.value = ("<?php echo $pid; ?>");
	form.pdept.value = ("<?php echo $m; ?>");
	form.pgender.value = ("<?php echo $y; ?>");
	//alert (form.pCityM.value);				
</script>