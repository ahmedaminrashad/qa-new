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
    if (isset($_POST['cmdSubmit'])) 
  	{ 		
		 	$issue= $_POST['issue'];
		 	$end= $_POST['end'];
		 	$cat= $_POST['cat'];
		 	$msg= $_POST['msg'];
			mysql_query ("INSERT INTO announcement (ann_date, ann_cat, ann_msg, ann_end)
					VALUES('$issue', '$cat', '" . mysql_real_escape_string($_POST['msg']) . "', '$end')") or die(mysql_error()); 
					 header(
			 	"Location: current-announcement");
				}
?>
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
				<h1>Add <small>New Task</small></h1>
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
					 You are adding new task
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
											<i class="fa fa-plus"></i>You are adding new task
										</div>
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" class="form-horizontal form-row-seperated">
												<div class="form-group">
															<label class="control-label col-md-3">
															<strong>Shown From Date: </strong></label>
															<div class="col-md-4">
															<input required type="date" name="issue" id="issue" class="form-control input-circle"></input>
              												</div>
												</div>
												<div class="form-group">
															<label class="control-label col-md-3">
															<strong>Till this date: </strong></label>
															<div class="col-md-4">
															<input required type="date" name="end" id="end" class="form-control input-circle"></input>
              												</div>
												</div>
												<div class="form-group">
															<label class="control-label col-md-3">
															<strong>Select Level: </strong></label>
															<div class="col-md-4">
															<select required class="form-control input-circle" name="cat"  id="cat" onchange="javascript: return optionList49_SelectedIndex()">
												<option value="4">Senior Managers</option>
												<option value="5">Floor Managers</option>
												<option value="7">CSRs</option>
												<option value="8">Teachers</option>
              									</select>
              												</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label"><strong>
													Announcement</strong></label>
													<div class="col-md-9">
														<textarea class="form-control input-circle" placeholder="Enter Your Announcement" name="msg" id="msg"></textarea>
													</div>
												</div>
											<div class="form-actions">
												<div class="row">
													<div class="col-md-offset-3 col-md-9">
														<button type="submit" name="cmdSubmit" class="btn btn-circle blue">
														Submit</button>
														<button type="button" class="btn btn-circle default">
														Cancel</button>
													</div>
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