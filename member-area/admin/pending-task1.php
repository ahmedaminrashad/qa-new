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
  require ("../includes/dbconnection.php");
  $link = $_SERVER['REQUEST_URI'];
?>
<?php
date_default_timezone_set("Africa/Cairo");
$sy = date('Y-m-d');
?>
<?php echo $main_header; ?>
<?php echo $headmenu; ?>
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
				<h1>Todo & Tasks <small>todo & task management</small></h1>
			</div>
			<!-- END PAGE TITLE -->
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
					 Todo & Tasks
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
									<span class="caption-subject font-green-sharp bold uppercase">TODO & TASKS </span>
									<span class="caption-helper visible-sm-inline-block visible-xs-inline-block">click to view project list</span>
								</div>
							</div>
							<div class="portlet-body todo-project-list-content">
								<div class="todo-project-list">
									<ul class="nav nav-pills nav-stacked">
										<li class="active">
											<a href="pending-task">
											<span class="badge badge-success badge-active"> <?php echo taskpen(); ?> </span> PENDING </a>
										</li>
										<li>
											<a href="completed-task">
											<span class="badge badge-success"> <?php echo taskcom(); ?> </span> COMPLETED </a>
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
									<span class="caption-helper">Tasks:</span> &nbsp; <span class="caption-subject font-green-sharp bold uppercase">PENDING (<?php echo taskpen(); ?>)</span>
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
$result = mysql_query("SELECT * FROM task WHERE status = 1 ORDER BY task_id DESC;");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
If ($numberOfRows == 0) 
	{
	echo 'No Pending Task Found';
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
		
			$taskid = MYSQL_RESULT($result,$i,"task_id");
			$pname = MYSQL_RESULT($result,$i,"parent_name");
			$taskdes = MYSQL_RESULT($result,$i,"task_des");
			$stu = MYSQL_RESULT($result,$i,"status");
			$reply = MYSQL_RESULT($result,$i,"responce");
			$adate = MYSQL_RESULT($result,$i,"task_date");
			$rdate = MYSQL_RESULT($result,$i,"responce_date");
			$type = MYSQL_RESULT($result,$i,"type_id");
			$man = MYSQL_RESULT($result,$i,"manager");
			$pid = MYSQL_RESULT($result,$i,"parent_id");
?>
													<div class="todo-tasklist-item todo-tasklist-item-border-green">
													<div class="todo-tasklist-item-title">
														<?php if ($pid > 0){echo '<font color="#44B6AE">(Family Name: <a href="parent-accounts-profile?parent_id='.base64_encode($pid).'">'.$pname.'</a>)';} else {echo '';} ?> <font color="#A80707">Assigned to <?php echo $man; ?></font>
													</div>
													<div class="todo-tasklist-item-text">
														 <?php echo $taskdes; ?>
													</div>
													<div class="todo-tasklist-controls pull-left">
														<span class="todo-tasklist-date"><i class="fa fa-calendar"></i> <?php echo $adate; ?> </span>
														<span class="todo-tasklist-badge badge badge-roundless"><?php if ($type ==1){echo "Urgent";} else {echo "Casual";} ?></span>
													</div>
													<div class="todo-tasklist-controls pull-right">
														<a href="clear-task?pT=<?php echo base64_encode($taskid); ?>&link=<?php echo $link; ?>"><button type="button" class="btn green btn-xs">Clear Now</button></a>
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
				</div>
			</div>
			<!-- END PAGE CONTENT INNER -->
		</div>
	</div>
	<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->
<!-- BEGIN PRE-FOOTER -->
<div class="page-prefooter">
	<div class="container">
		<div class="row">
			<div class="col-md-3 col-sm-6 col-xs-12 footer-block">
				<h2>About</h2>
				<p>
					 Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam dolore.
				</p>
			</div>
			<div class="col-md-3 col-sm-6 col-xs12 footer-block">
				<h2>Subscribe Email</h2>
				<div class="subscribe-form">
					<form action="javascript:;">
						<div class="input-group">
							<input type="text" placeholder="mail@email.com" class="form-control">
							<span class="input-group-btn">
							<button class="btn" type="submit">Submit</button>
							</span>
						</div>
					</form>
				</div>
			</div>
			<div class="col-md-3 col-sm-6 col-xs-12 footer-block">
				<h2>Follow Us On</h2>
				<ul class="social-icons">
					<li>
						<a href="javascript:;" data-original-title="rss" class="rss"></a>
					</li>
					<li>
						<a href="javascript:;" data-original-title="facebook" class="facebook"></a>
					</li>
					<li>
						<a href="javascript:;" data-original-title="twitter" class="twitter"></a>
					</li>
					<li>
						<a href="javascript:;" data-original-title="googleplus" class="googleplus"></a>
					</li>
					<li>
						<a href="javascript:;" data-original-title="linkedin" class="linkedin"></a>
					</li>
					<li>
						<a href="javascript:;" data-original-title="youtube" class="youtube"></a>
					</li>
					<li>
						<a href="javascript:;" data-original-title="vimeo" class="vimeo"></a>
					</li>
				</ul>
			</div>
			<div class="col-md-3 col-sm-6 col-xs-12 footer-block">
				<h2>Contacts</h2>
				<address class="margin-bottom-40">
				Phone: 800 123 3456<br>
				 Email: <a href="mailto:info@metronic.com">info@metronic.com</a>
				</address>
			</div>
		</div>
	</div>
</div>
<!-- END PRE-FOOTER -->
<!-- BEGIN FOOTER -->
<div class="page-footer">
	<div class="container">
		 2014 &copy; Metronic by keenthemes. <a href="http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes" title="Purchase Metronic just for 27$ and get lifetime updates for free" target="_blank">Purchase Metronic!</a>
	</div>
</div>
<div class="scroll-to-top">
	<i class="icon-arrow-up"></i>
</div>
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="../assets/global/plugins/respond.min.js"></script>
<script src="../assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
<script src="../assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="../assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE PLUGINS & SCRIPTS -->
<script type="text/javascript" src="../assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="../assets/global/plugins/select2/select2.min.js"></script>
<script src="../assets/admin/pages/scripts/todo.js" type="text/javascript"></script>
<!-- END PAGE PLUGINS & SCRIPTS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="../assets/global/plugins/jquery.pulsate.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jquery-bootpag/jquery.bootpag.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/holder.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="../assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="../assets/admin/layout3/scripts/layout.js" type="text/javascript"></script>
<script src="../assets/admin/layout3/scripts/demo.js" type="text/javascript"></script>
<script src="../assets/admin/pages/scripts/ui-general.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->

<script>
jQuery(document).ready(function() {    
   Metronic.init(); // init metronic core components
Layout.init(); // init current layout
Demo.init(); // init demo features
Todo.init(); // init todo page
UIGeneral.init();
});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>