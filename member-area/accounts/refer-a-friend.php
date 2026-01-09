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
  include("../includes/main-var.php");
  include("header.php");
  $tt = $_SESSION['is']['parent_id'];
  $new_msg =$_REQUEST['msg'];
date_default_timezone_set($TimeZoneCustome);
$sy = date('Y-m-d');
$date = date('h:i a', time());
$syw = date('Y');
?>
<?php echo $main_header; ?>
<script type="text/javascript">
  function submitForm(action) {
    var form = document.getElementById('form1');
    form.action = action;
    form.submit();
  }
</script>
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
				<h1>Refer<small> A Friend</small></h1>			</div>
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
					 Refer a Friend
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="row">
				<div class="col-md-12">
					<div class="tabbable tabbable-custom tabbable-noborder tabbable-reversed">
						<div class="tab-content">
						<?php if ($new_msg == 1) { echo '<div class="alert alert-success">Your referral has been submitted successfully.</div>'; }
						elseif ($new_msg == 2) { echo '<div class="alert alert-success">Your referral has been submitted successfully. Also a copy of email has been sent to the given email.</div>'; }
						else { echo '<div class="alert alert-danger"><strong>Note!</strong> Each friend/family referred by you will be your contribution in spreading Words of Allah. At '.$site_nameC.' you will get 25% discount in your one month invoice by reffering one family.</div>'; } ?>
								<div class="portlet box green">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-plus"></i>Please add details of your Friend or Family for online Quran Classes
										</div>
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form id="form1" name="form1" method="post" class="form-horizontal form-row-seperated">
										<input type="hidden" name="p_id" size="20" value="<?php echo $_SESSION['is']['parent_id']; ?>">
										<input type="hidden" name="p_name" size="20" value="<?php echo $_SESSION['is']['parent']; ?>">
										<div class="form-group">
													<label class="col-md-3 control-label"><strong>Name*</strong></label>
													<div class="col-md-4">
														<input type="text" name="name" id="name" class="form-control" required>
													</div>
												</div>
										<div class="form-group">
													<label class="col-md-3 control-label"><strong>Email</strong></label>
													<div class="col-md-4">
														<input type="email" name="email" id="email" class="form-control" >
													</div>
												</div>
										<div class="form-group">
													<label class="col-md-3 control-label"><strong>Phone*</strong></label>
													<div class="col-md-4">
														<input type="text" name="phone" id="phone" class="form-control" required>
													</div>
												</div>
										<div class="form-group">
													<label class="col-md-3 control-label"><strong>Country</strong></label>
													<div class="col-md-4">
														<input type="text" name="skype" id="skype" class="form-control">
													</div>
												</div>
										<div class="form-group">
													<label class="col-md-3 control-label"><strong>Your Relation</strong></label>
													<div class="col-md-4">
														<input type="text" name="relation" id="relation" class="form-control">
													</div>
												</div>
										<div class="form-group">
													<label class="col-md-3 control-label"><strong>Any Comment</strong></label>
													<div class="col-md-4">
														<textarea class="form-control" name="comments" id="comments"></textarea>													</div>
												</div>
											<div class="form-actions">
												<div class="row">
													<div class="col-md-offset-3 col-md-9">
														<input type="button" class="btn btn-circle blue" onclick="submitForm('submit-refferal')" value="Submit Referral" />
  														<input type="button" class="btn btn-circle green" onclick="submitForm('refferal-email')" value="Submit & Send copy to the above Email" />
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