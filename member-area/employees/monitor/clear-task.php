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
require ("../includes/smsGateway.php");
include("header.php");

    $pnid =base64_decode($_GET["pT"]);
    $link =$_REQUEST['link'];
	$result = mysql_query("SELECT * FROM task WHERE task_id = '$pnid'");
	if (!$result) 
		{
		die("There is an issue in your SQL please contact Farooq");
		}
			$numberOfRows = MYSQL_NUMROWS($result);
			If ($numberOfRows == 0) 
				{
			//echo 'Sorry No Record Found!';
				}
			else if ($numberOfRows > 0) 
				{
				$i=0;
			$taskid = MYSQL_RESULT($result,$i,"task_id");
			$pid = MYSQL_RESULT($result,$i,"parent_id");
			$pname = MYSQL_RESULT($result,$i,"parent_name");
			$taskdes = MYSQL_RESULT($result,$i,"task_des");
			$stu = MYSQL_RESULT($result,$i,"status");
			$reply = MYSQL_RESULT($result,$i,"responce");
			$adate = MYSQL_RESULT($result,$i,"task_date");
			$rdate = MYSQL_RESULT($result,$i,"responce_date");
			$type = MYSQL_RESULT($result,$i,"type_id");
			}
?>
<?php
if (isset($_POST['cmdSubmit'])) 
  	{ 	
			$ataskid= $_POST['s_task_id'];
			$ares= $_POST['s_res'];
			$adate= $_POST['s_date'];
			$apname= $_POST['name'];
			$alink= $_POST['link'];

			mysql_query( "UPDATE task SET responce = '$ares', responce_date = '$adate', status = '2' where task_id = '$ataskid'") or die(mysql_error()); 

			$result = mysql_query("SELECT * FROM sms_status WHERE service_id = 6");
 if (!$result) 
			{
			die("Query to show fields from table failed");
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
					$ser_id = MYSQL_RESULT($result,$i,"service_id");
					$ser_name = MYSQL_RESULT($result,$i,"service_name");
					$ser_status = MYSQL_RESULT($result,$i,"service_status");
					$ser_number = MYSQL_RESULT($result,$i,"service_number");
					$ser_device = MYSQL_RESULT($result,$i,"device_id");
					$ser_user = MYSQL_RESULT($result,$i,"sms_user");
					$ser_pass = MYSQL_RESULT($result,$i,"sms_pass");
			 if ($ser_status == 1){			
 $smsGateway = new SmsGateway($ser_user, $ser_pass);

$deviceID = $ser_device;
$number = $ser_number;
$message = ''.$ser_name.' ('.$pname.'): '.$ares.'';

$options = [
'expires_at' => strtotime('+1 hour') // Cancel the message in 1 hour if the message is not yet sent
];

//Please note options is no required and can be left out
$result = $smsGateway->sendMessageToNumber($number, $message, $deviceID, $options);
}
else {}
	$i++;	 
			}
			}
			header("Location: ".$alink."");	
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
				<h1>Add <small>Task Responce</small></h1>
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
					<a href="<?php echo $link; ?>">Go Bank</a><i class="fa fa-circle"></i>
				</li>
				<li class="active">
					 You are adding task responce
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
											<i class="fa fa-plus"></i>Task responce for <?php echo $pname; ?>
										</div>
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" class="form-horizontal form-row-seperated">
										<div class="form-group">
															<label class="control-label col-md-3">
															<strong>Task Query</strong></label>
															<div class="col-md-9">
															<input required type="text" value="<?php echo $taskdes; ?>" name="task_des" id="task_des" class="form-control input-circle" readonly>															</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label"><strong>Task Responce</strong></label>
													<div class="col-md-9">
														<textarea required class="form-control" placeholder="Enter Task Responce" name="s_res" id="s_res"></textarea>													</div>
												</div>
												<input type="hidden" value="<?php echo $taskid; ?>" name="s_task_id" id="s_task_id" class="form-control input-circle">
												<input type="hidden" value="<?php echo $sy; ?>" name="s_date" id="s_date" class="form-control input-circle">
												<input type="hidden" value="<?php echo $pname; ?>" name="name" id="name" class="form-control input-circle">
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