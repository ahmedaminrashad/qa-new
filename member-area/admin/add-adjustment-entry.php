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
include("../includes/session1.php");
  include("header-accounts.php");
    $enid =$_REQUEST['en_id'];
$acid =$_REQUEST['ac_c_id'];
$en_head =$_REQUEST['en_head'];
$link =$_REQUEST['link'];

    if (isset($_POST['cmdSubmit'])) 
  	{ 		
		 	$amount= $_POST['amu'];
		 	$adate= $_POST['date'];
		 	$anote= $_POST['head_note'];
		 	$end= $_POST['aen_id'];
		 	$acd= $_POST['aac_c_id'];
		 	$enhd= $_POST['aenh_id'];
		 	$link= $_POST['link'];
			mysql_query ("INSERT INTO adjusment_account (entry_id, ad_amount, ac_cat_id, date, note, head_id)
					VALUES('$end','$amount','$acd','$adate','" . mysql_real_escape_string($anote) . "','$enhd')") or die(mysql_error()); 
					 header(
			 	"Location: $link");
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
				<h1>D &amp; A <small>Entry</small></h1>
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
					 You are adding new D &amp; A
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
											<i class="fa fa-plus"></i>You are adding new D &amp; A
										</div>
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" class="form-horizontal form-row-seperated">
										<div class="form-group">
															<label class="control-label col-md-3">
															<strong>Amount</strong></label>
															<div class="col-md-4">
															<input required type="text" name="amu" id="amu" class="form-control input-circle">															
              									</div>
												</div>
										<div class="form-group">
															<label class="control-label col-md-3">
															<strong>Date upto</strong></label>
															<div class="col-md-4">
															<input required type="date" name="date" id="date" class="form-control input-circle">															</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label"><strong>Notes (If any)</strong></label>
													<div class="col-md-4">
														<textarea class="form-control" name="head_note" id="head_note"></textarea>
													</div>
												</div>
												<input type="hidden" value="<?php echo $enid; ?>" name="aen_id" id="aen_id" class="form-control input-circle">
												<input type="hidden" value="<?php echo $en_head; ?>" name="aenh_id" id="aenh_id" class="form-control input-circle">
												<input type="hidden" value="<?php echo $acid; ?>" name="aac_c_id" id="aac_c_id" class="form-control input-circle">
												<input type="hidden" value="<?php echo $link; ?>" name="link" id="link" class="form-control input-circle">
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