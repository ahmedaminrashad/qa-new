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
$m =$_REQUEST['month'];
$isd =$_REQUEST['issue'];
$dd =$_REQUEST['due'];
$y =$_REQUEST['year'];
   if (isset($_POST['cmdSubmit'])) 
  	{ 		
$hidden_pdept= $_POST['hidden_pdept'];
			 header(
			 		"Location: iup?month=". $_POST['mon']
			 		."&due=". $_POST['dd']
			 		."&year=". $_POST['y']				
		 		   );			   				   	 	 
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
				<h1>Invoice<small> Confirm Invoice</small></h1>
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
					<a href="invoice-details">Invoice Details</a><i class="fa fa-circle"></i>
				</li>
				<li class="active">
					 Confirm Monthly Invoice
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
											<i class="fa fa-plus"></i>Please confirm monthly invoice
										</div>
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" class="form-horizontal form-row-seperated">
										<div class="form-group">
													<label class="col-md-3 control-label"><strong>Month</strong></label>
													<div class="col-md-4">
														<input type="text" name="mon" id="mon" class="form-control input-circle" value="<?php $result = mysql_query("SELECT * FROM month WHERE month_id = $m");
				if (!$result) 
	{
    die("Query to show fields from table failed");
	}
	$pid = MYSQL_RESULT($result,$i,"month_name");
	echo $pid;?>" readonly>

													</div>
												</div>
										<div class="form-group">
													<label class="col-md-3 control-label"><strong>Year</strong></label>
													<div class="col-md-4">
														<input type="text" name="y" id="y" class="form-control input-circle" value="<?php $result = mysql_query("SELECT * FROM school_yr WHERE year_id = $y");
				if (!$result) 
	{
    die("Query to show fields from table failed");
	}
	$pd = MYSQL_RESULT($result,$i,"school_year");
	echo $pd;?>" readonly>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label"><strong>Due Date</strong></label>
													<div class="col-md-4">
														<input type="text" name="dd" id="dd" class="form-control input-circle" value="<?php echo $dd; ?>" readonly>
													</div>
												</div>
											<div class="form-actions">
												<div class="row">
													<div class="col-md-offset-3 col-md-9">
														<button type="submit" name="cmdSubmit" class="btn btn-circle blue">Submit</button>
														<button type="button" class="btn btn-circle default">Cancel</button>
													</div>
												</div>
											</div>
											<input type="hidden" name="pteacher" size="20" value="<?php echo $pT; ?>">
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