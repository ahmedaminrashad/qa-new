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
   include("header.php");
 function LeaveApproved($s)
  	{
  		$result = mysql_query("SELECT * FROM leave_app WHERE status = '$s'");
$counter = 0;
if (!$result) 
	{
    die("Contact Farooq");
	}
$numberOfRowsot = MYSQL_NUMROWS($result);
echo number_format($numberOfRowsot, 0);
}
function tech($er)
{
// sending query
   $result = mysql_query("SELECT * FROM profile Where teacher_id = $er");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$tnumberOfRows = MYSQL_NUMROWS($result);
If ($tnumberOfRows == 0){
			echo '';
			}
		else if ($tnumberOfRows > 0) 
			{
			$i=0;
			while ($i<$tnumberOfRows)
				{			
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"teacher_id");
	
			  		echo $hidden_pt;
	$i++;	 
			}
			}
	}
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
				<h1>Leave<small> Aplication Status</small></h1>			</div>
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
				<li class="active">
					 Leave Application Status
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN TODO SIDEBAR -->
					<div class="todo-sidebar">
						<div class="portlet light">
							<div class="portlet-title">
								<div class="caption" data-toggle="collapse" data-target=".todo-project-list-content">
									<span class="caption-subject font-green-sharp bold uppercase">Leave Application Status </span>
									<span class="caption-helper visible-sm-inline-block visible-xs-inline-block">click to view project list</span>
								</div>
							</div>
							<div class="portlet-body todo-project-list-content">
								<div class="todo-project-list">
									<ul class="nav nav-pills nav-stacked">
										<li class="active">
											<a href="leave-status">
											<span class="badge badge-success badge-active"> <?php echo LeaveApproved("2"); ?> </span> PENDING </a>
										</li>
										<li>
											<a href="leave-status-approved">
											<span class="badge badge-success"> <?php echo LeaveApproved("5"); ?> </span> APPROVED </a>
										</li>
										<li>
											<a href="leave-status-not-approved">
											<span class="badge badge-success"> <?php echo LeaveApproved("6"); ?> </span> NOT-APPROVED </a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<!-- END TODO SIDEBAR -->
					<!-- BEGIN TODO CONTENT -->
					<div class="todo-content">
						<div class="portlet light">
							<!-- PROJECT HEAD -->
							<div class="portlet-title">
								<div class="caption">
									<i class="icon-bar-chart font-green-sharp hide"></i>
									<span class="caption-helper">Pending for Approval:</span> &nbsp; <span class="caption-subject font-green-sharp bold uppercase"> APPLICATIONS (<?php echo LeaveApproved("2"); ?>)</span>
								</div>
							</div>
							<!-- end PROJECT HEAD -->
							<div class="portlet-body">
								<div class="row">
									<div class="">
										<div class="scroller" style="max-height: 800px;" data-always-visible="0" data-rail-visible="0" data-handle-color="#dae3e7">
											<div class="todo-tasklist">
											<?php 
// sending query
$result = mysql_query("SELECT * FROM leave_app WHERE status = 2 ORDER BY leave_id DESC;");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
If ($numberOfRows == 0) 
	{
	echo '<div class="label label-info">No Pending leave Application Found!</div>';
	}
else if ($numberOfRows > 0) 
	{
	$i=0;
	while ($i<$numberOfRows)
		{		
		if(($i%2)==0) 
				{
					$bgcolor ='#FFFFFF';
				}
			else
				{
					$bgcolor ='#F7F7FF';
				}
		
			$leaveid = MYSQL_RESULT($result,$i,"leave_id");
			$teacherid = MYSQL_RESULT($result,$i,"teacher_id");
			$teacherName = MYSQL_RESULT($result,$i,"teacher_name");
			$designation = MYSQL_RESULT($result,$i,"teacher_cat");
			$apply_date = MYSQL_RESULT($result,$i,"date");
			$sdate = MYSQL_RESULT($result,$i,"from_date");
			$tdate = MYSQL_RESULT($result,$i,"to_date");
			$status = MYSQL_RESULT($result,$i,"status");
			$man = MYSQL_RESULT($result,$i,"manager_id");
			$dis = MYSQL_RESULT($result,$i,"discription");
			$man_dis = MYSQL_RESULT($result,$i,"manager_remarks");
?>
													<div class="todo-tasklist-item todo-tasklist-item-border-green">
													<div class="todo-tasklist-item-title">
														<font color="#A80707">NAME: <?php echo $teacherName; ?> <?php echo '('.$designation.')'; ?><br>FROM: <?php echo $sdate; ?>  --  TO: <?php echo $tdate; ?><br>BYE: <?php echo tech($man); ?></font>
													</div>
													<div class="todo-tasklist-item-text">
														 <?php echo '<b>Leave Discription:</b> '.$dis.'<br><br><b>Manager Remarks:</b> '.$man_dis.''; ?>
													</div>
													<div class="todo-tasklist-controls pull-left">
														<span class="todo-tasklist-date"><i class="fa fa-calendar"></i> <?php echo $apply_date; ?> </span>
														<span class="todo-tasklist-badge badge badge-roundless"><?php if ($status == 1){echo "Under Suppervision";} elseif ($status == 2){echo "Sent for Approval";} elseif ($status == 3){echo "Approval Excepted";} elseif ($status == 4){echo "Approval Rejected";} elseif ($status == 5){echo "Approved";} else {echo "Not Approved";} ?></span>
													</div>
													<div class="todo-tasklist-controls pull-right">
													<a href="update-leave?status=3&leave=<?php echo $leaveid; ?>"><button type="button" class="btn green btn-xs">Approve</button></a> <a href="update-leave?status=4&leave=<?php echo $leaveid; ?>"><button type="button" class="btn red btn-xs">Reject</button></a>
														</div>
												</div>
												<?php 	
		$i++;		
		}
	}	
?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- END TODO CONTENT -->
					<div class="modal fade bs-modal-lg" id="leave" tabindex="-1" role="dialog" aria-hidden="true">
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
$('.leave').click(function(){
    var leave=$(this).attr('leave-id');
    var status=$(this).attr('status');
    $.ajax({url:"mark-leave.php?leave="+leave+"&status="+status,cache:false,success:function(result){
        $(".modal-content").html(result);
    }});
});
</script>