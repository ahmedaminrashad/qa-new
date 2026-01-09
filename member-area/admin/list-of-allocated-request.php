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
  require ("../includes/dbconnection.php");
  include("header-main.php");
  function req_note($er)
{
// sending query
   $result = mysql_query("SELECT * FROM new_request_comments Where request_id = $er");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$tnumberOfRows = MYSQL_NUMROWS($result);
if ($tnumberOfRows > 0){
echo $tnumberOfRows;
}
else { echo 0; }
}
function csr($t)
  {
			$result = mysql_query("SELECT * FROM profile Where teacher_id = '$t'");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0){
			echo 'Not Alocated';
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
				{			
					$acat_id = MYSQL_RESULT($result,$i,"teacher_id");
					$acat_name = MYSQL_RESULT($result,$i,"teacher_name");
					echo $acat_name;
		
	$i++;	 
			}
			}
	}
?>
<?php
date_default_timezone_set("Africa/Cairo");
$sy = date('Y-m-d');
?>
<?php echo $main_header; ?>
<head>
<link href="../assets/admin/pages/css/timeline.css" rel="stylesheet" type="text/css"/>
</head>
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
				<h1>New<small> Requests</small></h1>

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
					 List of New Requests
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN SAMPLE TABLE PORTLET-->
					<div class="portlet light">
					<h4><a href="list-of-new-request" class="btn blue"> Active <b>(No. <?php 
$result = mysql_query("SELECT * FROM new_request WHERE status = 1");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
echo $numberOfRows; ?>)</b></a>
						   <a href="list-of-responded-request" class="btn red"> Responded <b>(No. <?php 
$result = mysql_query("SELECT * FROM new_request WHERE status = 6");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
echo $numberOfRows; ?>)</b></a>
<a href="list-of-allocated-request" class="btn green"> Allocated <b>(No. <?php 
$result = mysql_query("SELECT * FROM new_request WHERE status = 7");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
echo $numberOfRows; ?>)</b></a>
<a href="list-of-later-request" class="btn purple"> Later <b>(No. <?php 
$result = mysql_query("SELECT * FROM new_request WHERE status = 10");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
echo $numberOfRows; ?>)</b></a>
<a href="list-of-archives-request" class="btn yellow"> Archives <b>(No. <?php 
$result = mysql_query("SELECT * FROM new_request WHERE status = 2");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
echo $numberOfRows; ?>)</b></a>
						<a href="list-of-new-request-teaching" class="btn grey"> Teaching Requests <b>(No. <?php 
$result = mysql_query("SELECT * FROM new_request WHERE status = 3");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
echo $numberOfRows; ?>)</b></a></h4>
						<div class="portlet-body">
							<div class="timeline">
						<!-- TIMELINE ITEM -->
						<?php 
// sending query
$result = mysql_query("SELECT * FROM new_request WHERE status = 7 ORDER BY request_id DESC;");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
If ($numberOfRows == 0) 
	{
	echo 'There is no pending request...';
	}
else if ($numberOfRows > 0) 
	{
	$i=0;
	while ($i<$numberOfRows)
		{		
			$arequest_id = MYSQL_RESULT($result,$i,"request_id");
			$aname = MYSQL_RESULT($result,$i,"name");
			$aemail = MYSQL_RESULT($result,$i,"email");
			$aphone = MYSQL_RESULT($result,$i,"phone");
			$askype = MYSQL_RESULT($result,$i,"skype");
			$acountry = MYSQL_RESULT($result,$i,"country");
			$acity = MYSQL_RESULT($result,$i,"city");
			$amessage = MYSQL_RESULT($result,$i,"message");
			$adate = MYSQL_RESULT($result,$i,"date");
			$atime = MYSQL_RESULT($result,$i,"time");
			$aupdate = MYSQL_RESULT($result,$i,"time_update");
			$asent = MYSQL_RESULT($result,$i,"sent");
			$acsr_id = MYSQL_RESULT($result,$i,"csr_id");
?>
						<div class="timeline-item">
							<div class="timeline-body">
								<div class="timeline-body-arrow">
								</div>
								<div class="timeline-body-head">
									<div class="timeline-body-head-caption">
										<a href="javascript:;" class="timeline-body-title font-blue-madison"><?php echo $aname; ?></a>
										<span class="timeline-body-time font-grey-cascade"><?php echo $adate; ?> (<?php echo $atime; ?>)</span>
									</div>
									<div class="timeline-body-head-actions">
										<div class="btn-group">
											<button class="btn btn-circle green-haze btn-sm dropdown-toggle" type="button" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
											Actions <i class="fa fa-angle-down"></i>
											</button>
											<ul class="dropdown-menu pull-right" role="menu">
												<li>
													<a href="add-new-request-note?req=<?php echo $arequest_id; ?>&name=<?php echo $aname; ?>">Add Note </a>
												</li>
												<li>
													<a href="welcome-email?request=<?php echo $arequest_id; ?>">Send Email </a>
												</li>
												<li>
													<a class="allocation" href="#allocation-c" data-toggle="modal" data-target="#allocation-c" data-id="<?php echo $arequest_id; ?>" data-name="<?php echo $aname; ?>">Allocate CSR </a>
												</li>
												<li>
													<a href="add-parent-account?req=<?php echo $arequest_id; ?>&name=<?php echo $aname; ?>&email=<?php echo $aemail; ?>&phone=<?php echo $aphone; ?>&skype=<?php echo $askype; ?>&city=<?php echo $acity; ?>">Create Account </a>
												</li>
												<li>
													<a href="teaching-request?req=<?php echo $arequest_id; ?>">Teaching </a>
												</li>
												<li>
													<a href="remove-request?req=<?php echo $arequest_id; ?>">Archive </a>
												</li>
												<li>
													<a href="later-request?req=<?php echo $arequest_id; ?>">Later </a>
												</li>
												<li>
													<a href="delete-request?req=<?php echo $arequest_id; ?>">Delete </a>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<div class="timeline-body-content">
									<span class="font-grey-cascade">
									<div id="mytable" class="table-responsive">
								<table class="table table-hover">
								<thead>
								<tr>
								<th>
									 Email
								</th>
								<th>
									 Phone
								</th>
								<th>
									 Skype
								</th>
								<th>
									 Country
								</th>
								<th>
									 City
								</th>
								</tr>
								</thead>
								<tbody>
								<tr bgcolor="<?php echo $bgcolor; ?>">
								<td>
									 <?php echo $aemail; ?>
								</td>
								<td>
									 <?php echo $aphone; ?>
								</td>
								<td>
									 <?php echo $askype; ?>
								</td>
								<td>
									 <?php echo $acountry; ?>
								</td>
								<td>
										<?php echo $acity; ?>
								</td>
							</tr>
							<tr>
								<td>
								<strong>Message:</strong>
								</td>
								<td colspan="4">
									<?php echo $amessage; ?>
								</td>
							</tr>
							<tr>
								<td colspan="5">
								<span class="label label-sm label-warning" title="Email Status"><i class="fa fa-envelope"> <?php if ($asent == 2){ echo '<font color="green">Sent</font>';} else { echo '<font color="red">Not Sent</font>';} ?></i></span>
								<a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo $arequest_id; ?>" data-name="<?php echo $aname; ?>"><span class="label label-sm label-success" title="Note Details"><i class="fa fa-comments-o"> <?php echo req_note("$arequest_id"); ?></i></span></a>
								<?php if ($acsr_id == 0){ echo '<span class="label label-sm label-danger" title="Allocation"> Not Allocated</span>'; } else { echo '<span class="label label-sm label-info" title="Allocation"><i class="fa fa-mail-forward"></i></span> '.csr("$acsr_id").''; }?>
								</td>
							</tr>
							</tbody>
								</table>
								</div>
								</span>
								</div>
							</div>
						</div>
						<?php 	
		$i++;		
		}
	}	
?>							</div>
					</div>
					<!-- END SAMPLE TABLE PORTLET-->
        <div class="modal fade bs-modal-lg" id="notes-d" tabindex="-1" role="dialog" aria-hidden="true">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">


        </div>
    </div>
</div>
<div class="modal fade bs-modal-lg" id="allocation-c" tabindex="-1" role="dialog" aria-hidden="true">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">


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
<script>
$('.notes').click(function(){
    var famID=$(this).attr('data-id');
    var famName=$(this).attr('data-name');

    $.ajax({url:"note-details.php?famID="+famID+"&famName="+famName,cache:false,success:function(result){
        $(".modal-content").html(result);
    }});
});
$('.allocation').click(function(){
    var famID=$(this).attr('data-id');
    var famName=$(this).attr('data-name');

    $.ajax({url:"allocate-csr.php?famID="+famID+"&famName="+famName,cache:false,success:function(result){
        $(".modal-content").html(result);
    }});
});
</script>