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
  function abc($er)
{
// sending query
   $result = mysql_query("SELECT * FROM course Where Teacher = $er");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$tnumberOfRows = MYSQL_NUMROWS($result);
echo $tnumberOfRows;
}
  function today($var1, $var2, $var3)
{
$result = mysql_query("SELECT COUNT(history_id) FROM class_history WHERE date_admin = '$var1' and monitor_id = '$var2' and teacher_id = '$var3' and re_status = '1'");
echo COUNT(history_id);
}
function today1($var1, $var3)
{
$result = mysql_query("SELECT COUNT(history_id) FROM class_history WHERE date_admin = '$var1' and teacher_id = '$var3'");
}
?>
<?php
date_default_timezone_set("Africa/Cairo");
$sy = date('Y-m-d');
$mm_id = date('m');
$yy_id = date('Y');
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
				<h1>Teacher<small> Student's List</small></h1>
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
					<a href="parent-accounts">List of Teachers</a><i class="fa fa-circle"></i>
				</li>
				<li class="active">
					 Daily Class Report
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN SAMPLE TABLE PORTLET-->
					<div class="portlet light">
					<h4></h4>
<a class="btn default" data-target="#full-width" data-toggle="modal">
									View Previous Month Class History <b>(<?php echo date('F'); ?>-<?php echo date('Y'); ?>)</b></a>
						<div class="portlet-body">
							<div id="mytable" class="table-responsive">
								<table class="table table-hover table-light">
								<thead>
								<tr>
								<th colspan="2">
									 Teacher Name
								</th>
								<th>
									 Total
								</th>
								<th>
									 Taken
								</th>
								<th>
									 Absent
								</th>
								<th>
									 Leave
								</th>
								<th>
									 Declined
								</th>
								<th>
									 Total Payable
								</th>
								<?php 
// sending query
$result = mysql_query("SELECT * FROM `profile` WHERE (cat_id = 8 OR  teacher_rights = 1) AND active = 1");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
If ($numberOfRows == 0) 
	{
	echo 'Sorry No Record Found!';
	}
else if ($numberOfRows > 0) 
	{
	$i=0;
	while($row = mysql_fetch_array($result))
		{		
			if($row['g_id']==1 and $row['inout_id']==1) 
				{
					$bgcolor ='#FFFFFF';
				}
			else
				{
					$bgcolor ='#D3D3D3';
				}		
				$profile_no = MYSQL_RESULT($result,$i,"teacher_id");
			$tname = MYSQL_RESULT($result,$i,"teacher_name");
			$aimage = MYSQL_RESULT($result,$i,"ima");

?>
							</tr>
								</thead>
								<tbody>
								<tr bgcolor="<?php echo $bgcolor; ?>">
								<td class="fit">
										<img class="user-pic" src="../uploads/thumb/<?php echo $aimage; ?>">
									</td>
								<td>
									 <b><a href="teacher-accounts-profile?profile_no=<?php echo base64_encode($profile_no); ?>"><?php echo $tname; ?></a></b> 
									 <a href="teacher-student-list?ptec=<?php echo base64_encode($pT); ?>"><button type="button" class="btn green btn-xs"><?php echo abc("$profile_no"); ?></button></a> 
									 <a href="teacher-schedule?pT=<?php echo $profile_no; ?>"><button type="button" class="btn green btn-xs">Schedule</button></a>
								</td>
								<td>
									<button type="button" class="btn btn-sm"><?php echo today1("$sy","$profile_no"); ?></button>
								</td>
								<td>
									<button type="button" class="btn green btn-sm"><?php echo today("$sy","9","$profile_no"); ?></button>
								</td>
								<td>
									<button type="button" class="btn red btn-sm"><?php echo today("$sy","4","$profile_no"); ?></button>
								</td>
								<td>
									<button type="button" class="btn blue btn-sm"><?php echo today("$sy","5","$profile_no"); ?></button>
								</td>
								<td>
									<button type="button" class="btn yellow btn-sm"><?php echo today("$sy","6","$profile_no"); ?></button>
								</td>
								<td>
									
								</td>
							</tr>
							<?php 	
		$i++;		
		}
	}	
?>
								</tbody>
								</table>
							</div>
						</div>
						<!-- full width -->
							<div id="full-width" class="modal container fade" tabindex="-1">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
								</div>
								<div class="portlet box green">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-chevron-right"></i>Search For Previous Month Records
										</div>
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="teacher-student-list-search" method="GET" class="form-horizontal">
											<div class="form-body">
												<h3 class="form-section">Please Select Desired Month and Year</h3>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Month</label>
															<div class="col-md-9">
																<select required class="form-control" name="month_id"  id="month_id">

																	<?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$result = mysql_query("SELECT * FROM month ORDER BY month_id ");			  	
				do {  ?>
  <option value="<?php echo $row['num'];?>"><?php echo $row['month_name'];?> </option>
  <?php } while ($row = mysql_fetch_assoc($result)); ?>
</select>
																<span class="help-block">
																Please Select Month. </span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Year</label>
															<div class="col-md-9">
															<select required class="form-control" name="year_id"  id="year_id">
																<?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$result = mysql_query("SELECT * FROM school_yr ORDER BY year_id ");			  	
				do {  ?>
  <option value="<?php echo $row['school_year'];?>"><?php echo $row['school_year'];?> </option>
  <?php } while ($row = mysql_fetch_assoc($result)); ?>
</select>
<span class="help-block">
																Please Select Year. </span>

<input type="hidden" id="ptec" name="ptec"  value="<?php echo base64_encode($pT); ?>" />

															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
												</div>
											<div class="form-actions">
												<div class="row">
													<div class="col-md-6">
														<div class="row">
															<div class="col-md-offset-3 col-md-9">
																<button type="submit" class="btn green">Submit</button>
															</div>
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
					<!-- END SAMPLE TABLE PORTLET-->
				</div>
			</div>
			<!-- END PAGE CONTENT INNER -->
		</div>
	</div>
	<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->
<?php echo $fot; ?>