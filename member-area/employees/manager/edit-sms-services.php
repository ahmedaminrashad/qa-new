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
  include("../includes/manager_rights.php");
  require ("../includes/dbconnection.php");
include("header.php");

    $pnid =base64_decode($_GET["pT"]);
	$result = mysql_query("SELECT * FROM sms_status where service_id = '$pnid'");
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
					$ser_id = MYSQL_RESULT($result,$i,"service_id");
					$ser_name = MYSQL_RESULT($result,$i,"service_name");
					$ser_status = MYSQL_RESULT($result,$i,"service_status");
					$ser_number = MYSQL_RESULT($result,$i,"service_number");
			}
?>
<?php
if (isset($_POST['cmdSubmit'])) 
  	{ 	
			$aser_id= $_POST['ser_iid'];
			$aser_name= $_POST['ser_n'];
			$aser_status= $_POST['ser_s'];
			$aser_number= $_POST['ser_num'];

			mysql_query( "UPDATE sms_status SET service_name = '$aser_name', service_status = '$aser_status', service_number = '$aser_number' where service_id = '$aser_id'") or die(mysql_error()); 
							 header("Location: list-of-sms-services");
				}
?>
<?php
date_default_timezone_set("Asia/Karachi");
$sy = date('Y-m-d');
?>
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
				<h1>Admin Home<small>Today's Classes</small></h1>
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
					 You are editing country
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
											<i class="fa fa-plus"></i>You are editing country
										</div>
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" class="form-horizontal form-row-seperated">
										<div class="form-group">
															<label class="control-label col-md-3">
															<strong>Sevice Name</strong></label>
															<div class="col-md-4">
															<input required type="text" value="<?php echo $ser_name; ?>" name="ser_n" id="ser_n" class="form-control input-circle">															</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label"><strong>Service Number</strong></label>
													<div class="col-md-4">
														<input required type="text" value="<?php echo $ser_number; ?>" name="ser_num" id="ser_num" maxlength="11" class="form-control input-circle">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label"><strong>Service Status</strong></label>
													<div class="col-md-4">
														<select class="form-control" name="ser_s"  id="ser_s" onchange="javascript: return optionList41119_SelectedIndex()">
              												<?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$result = mysql_query("SELECT * FROM statusp ORDER BY s_id ");			  	
				do {  ?>
  <option value="<?php echo $row['s_id'];?>"><?php echo $row['sms'];?> </option>
  <?php } while ($row = mysql_fetch_assoc($result)); ?>
</select>

													</div>
												</div>
												<input type="hidden" value="<?php echo $ser_id; ?>" name="ser_iid" id="ser_iid" class="form-control input-circle">
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
<script language="javascript" >
	var form = document.forms[0];
	//purpose?: to retrieve what users last input on the field..
	form.ser_s.value = ("<?php echo $ser_status; ?>");
	//alert (form.pCityM.value);				
</script>