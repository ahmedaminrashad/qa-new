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

$pnid =base64_decode($_GET["pT"]);

   if (isset($_POST['cmdSubmit'])) 
{
		 	$con_id= $_POST['con_id'];
			$time_diff = $_POST['tz_diff'];
			$time_name = $_POST['tz_name'];
			$time_php = $_POST['tz_php'];

			mysql_query ("INSERT INTO time_zone(c_id, timezone_diff, timezone_name, php_tz)
					VALUES('$con_id','$time_diff','$time_name','$time_php')") or die(mysql_error()); 					
 		header(
			 	"Location: list-of-country-timezone?con=$con_id");
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
				<h1>Add<small> New Timezone</small></h1>
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
				<li>
					<a href="list-of-country">list of Countries</a><i class="fa fa-circle"></i>
				</li>
				<li class="active">
					 You are adding new timezone
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
											<i class="fa fa-plus"></i>You are adding new timezone
										</div>
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" class="form-horizontal form-row-seperated">
										<div class="form-group">
															<label class="control-label col-md-3">
															<strong>Timezone Name</strong></label>
															<div class="col-md-9">
															<input required type="text" placeholder="e.g. Pakistan Standard Time (PST)" name="tz_name" id="tz_name" class="form-control input-circle">															</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label"><strong>Timezone Difference</strong></label>
													<div class="col-md-4">
														<input required type="text" placeholder="e.g. -9" name="tz_diff" id="tz_diff" class="form-control input-circle">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label"><strong>PHP Timezone</strong></label>
													<div class="col-md-4">
														<input required type="text" placeholder="e.g. Asia/Pakistan" name="tz_php" id="tz_php" class="form-control input-circle">
													</div>
												</div>
												<input type="hidden" value="<?php echo $pnid; ?>" name="con_id" id="con_id" class="form-control input-circle">
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