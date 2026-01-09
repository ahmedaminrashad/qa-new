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
require("../includes/dbconnection.php");
include("../includes/teacher_rights.php");include("header.php");
$studentid =$_REQUEST['sid'];
$student_name =$_REQUEST['sname'];
$teacherid =$_REQUEST['tid'];
$teacher_name =$_REQUEST['tname'];
$parentid =$_REQUEST['pid'];
date_default_timezone_set("Asia/Karachi");
$sy11 = date('Y-m-d');
$date11 = date('h:i a', time());

    if (isset($_POST['cmdSubmit'])) 
  	{ 		
		 	$sn= $_POST['student_name'];
		 	$snid= $_POST['student_id'];
		 	$tn= $_POST['teacher_name'];
		 	$tnid= $_POST['teacher_id'];
		 	$da= $_POST['date'];
		 	$ti= $_POST['time'];
		 	$de= $_POST['desc'];
		 	$pe= $_POST['pppid'];
		 	$pman= $_POST['pman'];
			mysql_query ("INSERT INTO note_student (note_text, date, time, course_id, teacher_id, student_name, teacher_name, parent_id, user_id)
					VALUES('" . mysql_real_escape_string($de) . "', '$da', '$ti', '$snid', '$tnid', '$sn', '$tn', '$pe', '$pman')") or die(mysql_error()); 
					 header(
			 	"Location: teacher-student-list");
				}?>
<?php echo $main_header; ?>
<?php echo $tool_bar; ?>
<?php echo $start_menu; ?>
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
										<!-- BEGIN FORM-->
										<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" class="form-horizontal form-row-seperated">
										<div class="form-group">
															<label class="control-label col-md-3">
															<strong>Student Name</strong></label>
															<div class="col-md-9">
															<input type="text" name="student_name" id="student_name" class="form-control" value="<?php echo $student_name; ?>" readonly>															</div>
												</div>
												<div class="form-group">
															<label class="control-label col-md-3">
															<strong>Select Manager</strong></label>
															<div class="col-md-9">
															<select required class="form-control" name="pman"  id="pman" onchange="javascript: return optionList43_SelectedIndex()">
                      <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$result = mysql_query("SELECT * FROM profile WHERE (cat_id < 6 or super_rights = 1) and active = 1 ORDER BY teacher_id ");			  	
				do {  ?>
                      <option value="<?php echo $row['teacher_id'];?>"><?php echo $row['teacher_name'];?> </option>
                      <?php } while ($row = mysql_fetch_assoc($result)); ?>
               </select>
															</div>
												</div>
										<div class="form-group">
															<label class="control-label col-md-3">
															<strong>Note</strong></label>
															<div class="col-md-9">
															<textarea required name="desc" id="desc" class="form-control" placeholder="Add Note"></textarea>															</div>
												</div>
												<input type="hidden" class="form-control" value="<?php echo $studentid; ?>" name="student_id" id="student_id">
												<input type="hidden" class="form-control" value="<?php echo $teacherid; ?>" name="teacher_id" id="teacher_id">
												<input type="hidden" class="form-control" value="<?php echo $teacher_name; ?>" name="teacher_name" id="teacher_name">
												<input type="hidden" class="form-control" value="<?php echo $sy11; ?>" name="date" id="date">
												<input type="hidden" class="form-control" value="<?php echo $date11; ?>" name="time" id="time">
												<input type="hidden" class="form-control" value="<?php echo $parentid; ?>" name="pppid" id="pppid">
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