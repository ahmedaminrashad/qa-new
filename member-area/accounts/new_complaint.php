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
  include("header.php");
  $tt = $_SESSION['is']['parent_id'];
date_default_timezone_set($TimeZoneCustome);
$sy = date('Y-m-d');
$date = date('h:i a', time());
$syw = date('Y');
?>
<?php
  $p =$_REQUEST['pdept'];
  $ttn = $_SESSION['is']['parent'];
  $tem = $_SESSION['is']['email_id'];
  $result = mysql_query("SELECT * FROM `course`,`profile`,`account` WHERE course.Teacher=profile.teacher_id AND course.parent_id=account.parent_id HAVING course_id='$p'");
		if (!$result) 
			{
			die("Query to sed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0){
			echo '';
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
				{			
					$tn = MYSQL_RESULT($result,$i,"teacher_name");
					$tid = MYSQL_RESULT($result,$i,"Teacher");	
					$sn = MYSQL_RESULT($result,$i,"course_yrSec");
					$pn = MYSQL_RESULT($result,$i,"parent_name");		
	$i++;	 
			}
			}
   if (isset($_POST['cmdSubmit'])) 
  	{ 		
		 	$tp= $_POST['pteacher'];
		 	$tname= $_POST['pteacher0'];
			$pemail= $_POST['pemail'];
			$pnam= $_POST['pname'];
			$msg= $_POST['S1'];
			$time= $_POST['time'];
			$date= $_POST['date'];
			$sname= $_POST['psn'];
			$sid= $_POST['ppp'];
			$paname= $_POST['pname1'];
		
			mysql_query ("INSERT INTO complaint(teacher_id, parent_id, issue, teacher_name, student_name, student_id, date1, time, parent_name, type)
					VALUES('$tp','$pnam','" . mysql_real_escape_string($msg) . "', '$tname', '$sname', '$sid', '$date', '$time', '$paname', '1')") or die(mysql_error()); 
 		header(
			 	"Location: complaint-email?name=".$paname."&email=".$pemail."&teacher=".$tname."&student=".$sname."&msg=".$msg."");
				}
?>
<?php echo $main_header; ?>
<!-- BEGIN TOP NAVIGATION MENU -->
			<div class="top-menu">
				<ul class="nav navbar-nav pull-right">
					<!-- BEGIN NOTIFICATION DROPDOWN -->
					<li class="dropdown dropdown-extended dropdown-dark dropdown-notification" id="header_notification_bar">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						<i class="icon-bell"></i>
						<?php 
$result = mysql_query("SELECT * FROM invoice WHERE status = 1 and parent_id =$tt");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRowsot = MYSQL_NUMROWS($result);
If ($numberOfRowsot == 0) 
	{
	echo '';
	}
else if ($numberOfRowsot > 0) 
	{
	echo '<span class="badge badge-default">'.$numberOfRowsot.'</span>';
	}
 ?>
						</a>
						<ul class="dropdown-menu">
							<li class="external">
								<h3>You have <strong><?php 
$result = mysql_query("SELECT * FROM invoice WHERE status = 1 and parent_id =$tt");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRowsot1 = MYSQL_NUMROWS($result);
If ($numberOfRowsot == 0) 
	{
	echo '0';
	}
else if ($numberOfRowsot1 > 0) 
	{
	echo $numberOfRowsot1;
	}
 ?> Invoice(s)</strong> unpaid</h3>
								<a href="ind_details">view all</a>
							</li>
							<li>
							</li>
						</ul>
					</li>
					<!-- END NOTIFICATION DROPDOWN -->
					<li class="droddown dropdown-separator">
						<span class="separator"></span>
					</li>
					<!-- BEGIN USER LOGIN DROPDOWN -->
					<li class="dropdown dropdown-user dropdown-dark">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						<img alt="" class="img-circle" src="../assets/admin/layout3/img/user-alt-128.png">
						<span class="username username-hide-mobile"><?php echo $_SESSION['is']['parent']; ?></span>
						</a>
						<ul class="dropdown-menu dropdown-menu-default">
							<li>
								<a href="logout">
								<i class="icon-key"></i> Log Out </a>
							</li>
						</ul>
					</li>
					<!-- END USER LOGIN DROPDOWN -->
				</ul>
			</div>
			<!-- END TOP NAVIGATION MENU -->
			</div>
	</div>
<?php echo $start_menu; ?>
<?php echo $main_menu; ?>
<!-- BEGIN PAGE CONTAINER -->
<div class="page-container">
	<!-- BEGIN PAGE HEAD -->
	<div class="page-head">
		<div class="container">
			<!-- BEGIN PAGE TITLE -->
			<div class="page-title">
				<h1>Complaint<small> Registration</small></h1>			</div>
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
					<a href="parents-home">Home</a><i class="fa fa-circle"></i>
				</li>
				<li class="active">
					 Complaint
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
											<i class="fa fa-plus"></i>Please Register Your Complaint
										</div>
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" class="form-horizontal form-row-seperated">
										<input type="hidden" name="pteacher0" size="20" value="<?php echo $tn; ?>">
										<input type="hidden" name="pteacher" size="20" value="<?php echo $tid; ?>">
										<input type="hidden" name="pstudent" size="20" value="<?php echo $sn; ?>">
										<input type="hidden" name="pname" size="20" value="<?php echo $_SESSION['is']['parent_id']; ?>">
										<input type="hidden" name="date" size="20" value="<?php echo $sy; ?>">
										<input type="hidden" name="time" size="20" value="<?php echo $date; ?>">
										<input type="hidden" name="ppp" size="20" value="<?php echo $p; ?>">
										<input type="hidden" name="pname1" size="20" value="<?php echo $pn; ?>">
										<div class="form-group">
													<label class="col-md-3 control-label"><strong>Teacher Name</strong></label>
															<div class="col-md-4">
															<input type="text" name="tname" id="tname" class="form-control input-circle" value="<?php echo $tn; ?>" readonly>
															</div>
												</div>
										<div class="form-group">
													<label class="col-md-3 control-label"><strong>Student Name</strong></label>
													<div class="col-md-4">
														<input type="text" name="psn" id="psn" class="form-control input-circle" value="<?php echo $sn; ?>" readonly>
													</div>
												</div>
										<div class="form-group">
													<label class="col-md-3 control-label"><strong>Your Email*</strong></label>
													<div class="col-md-4">
														<input type="email" name="pemail" id="pemail" class="form-control input-circle" value="<?php echo $tem; ?>" required>
													</div>
												</div>
										<div class="form-group">
													<label class="col-md-3 control-label"><strong>Complaint*</strong></label>
													<div class="col-md-4">
														<textarea class="form-control" placeholder="Enter your complaint" name="S1" id="S1" required style="height: 73px; width: 375px"></textarea>													</div>
												</div>
											<div class="form-actions">
												<div class="row">
													<div class="col-md-offset-3 col-md-9">
														<button type="submit" name="cmdSubmit" class="btn btn-circle blue">Submit</button>
														<button type="button" class="btn btn-circle default">Cancel</button>
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