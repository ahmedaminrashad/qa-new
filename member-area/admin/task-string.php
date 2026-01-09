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
  $tk_id =base64_decode($_REQUEST["task"]);
  function TeacherName($var, $a){
$result1 = mysql_query("SELECT * FROM profile Where teacher_id = '$var'");
if (!$result1) 
	{
    die("Query to show fields from table failed");
	}
$tnumberOfRows1 = MYSQL_NUMROWS($result1);
If ($tnumberOfRows1 == 0){
			echo '';
			}
		else if ($tnumberOfRows1 > 0) 
			{
					$name = MYSQL_RESULT($result1,$i,"teacher_name");
					$img = MYSQL_RESULT($result1,$i,"ima");
	
			  		if ($a == 1){
			  		echo $name;
			  		}
			  		elseif ($a == 2){
			  		echo $img;
			  		}
			}
}
  $result = mysql_query("SELECT * FROM `task_creator` WHERE task_id = '$tk_id'");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
If ($numberOfRows == 0) 
	{
	echo '<div class="label label-info">No Pending Task Found!</div>';
	}
else if ($numberOfRows > 0) 
	{
	$i=0;
			$taskid = MYSQL_RESULT($result,$i,"task_id");
			$pid = MYSQL_RESULT($result,$i,"parent_id");
			$pname = MYSQL_RESULT($result,$i,"parent_name");
			$to_p = MYSQL_RESULT($result,$i,"to_person");
			$to_f = MYSQL_RESULT($result,$i,"from_person");
			$add_date = MYSQL_RESULT($result,$i,"date");
			$status = MYSQL_RESULT($result,$i,"status");
			$type = MYSQL_RESULT($result,$i,"clear");
			$des = MYSQL_RESULT($result,$i,"des");
	}
?>
<?php
$db = new mysqli($server_db,$username_db,$userpass_db,$name_db);
  $query = "SELECT * FROM employee_catagory WHERE cat_id > 1 OR cat_id < 10";
  $result = $db->query($query);

  while($row = $result->fetch_assoc()){
    $categories[] = array("id" => $row['cat_id'], "val" => $row['cat_name']);
  }

  $query = "SELECT * FROM profile";
  $result = $db->query($query);

  while($row = $result->fetch_assoc()){
    $subcats[$row['cat_id']][] = array("id" => $row['teacher_id'], "val" => $row['teacher_name']);
  }

  $jsonCats = json_encode($categories);
  $jsonSubCats = json_encode($subcats);
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title><?php echo $head_title; ?></title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css">
<link href="../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="../assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css">
<link href="../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="../assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css">
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="../assets/global/css/components-rounded.css" id="style_components" rel="stylesheet" type="text/css">
<link href="../assets/global/css/plugins.css" rel="stylesheet" type="text/css">
<link href="../assets/admin/layout3/css/layout.css" rel="stylesheet" type="text/css">
<link href="../assets/admin/layout3/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color">
<link href="../assets/admin/layout3/css/custom.css" rel="stylesheet" type="text/css">
<link href="../assets/admin/pages/css/timeline.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
<script>
    function Reload()   {
        document.getElementById("mytable").innerHTML;
    }
    </script>
<script type='text/javascript'>
      <?php
        echo "var categories = $jsonCats; \n";
        echo "var subcats = $jsonSubCats; \n";
      ?>
      function loadCategories(){
        var select = document.getElementById("categoriesSelect");
        select.onchange = updateSubCats;
        for(var i = 0; i < categories.length; i++){
          select.options[i] = new Option(categories[i].val,categories[i].id);          
        }
      }
      function updateSubCats(){
        var catSelect = this;
        var teacher_id = this.value;
        var subcatSelect = document.getElementById("subcatsSelect");
        subcatSelect.options.length = 0; //delete all options if any present
        for(var i = 0; i < subcats[teacher_id].length; i++){
          subcatSelect.options[i] = new Option(subcats[teacher_id][i].val,subcats[teacher_id][i].id);
        }
      }
    </script>
<style type="text/css">
.auto-style1 {
	color: #B70E0E;
}
.auto-style2 {
	color: #115911;
}
.auto-style3 {
	color: #0A0A87;
}
</style>

</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-menu-fixed" class to set the mega menu fixed  -->
<!-- DOC: Apply "page-header-top-fixed" class to set the top menu fixed  -->
<body onload='loadCategories()'>
<!-- BEGIN HEADER -->
<div class="page-header">
	<!-- BEGIN HEADER TOP -->
	<div class="page-header-top">
		<div class="container">
			<!-- BEGIN LOGO -->
			<div class="page-logo">
				<a href="index.html"><img src="../assets/admin/layout3/img/logo-default.png" alt="logo" class="logo-default"></a>
			</div>
			<!-- END LOGO -->
			<!-- BEGIN RESPONSIVE MENU TOGGLER -->
			<a href="javascript:;" class="menu-toggler"></a>
			<!-- END RESPONSIVE MENU TOGGLER -->
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
				<h1>Task<small> Details</small></h1>
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
					 List of Active Teachers
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="portlet light">
				<div class="portlet-body">
					<div class="timeline">
						<!-- TIMELINE ITEM -->
						<div class="timeline-item">
							<div class="timeline-badge">
								<img class="timeline-badge-userpic" src="../uploads/<?php echo TeacherName("$to_f","2"); ?>">
							</div>
							<div class="timeline-body bg-green-turquoise">
								<div class="timeline-body-arrow">
								</div>
								<div class="timeline-body-head">
									<div class="timeline-body-head-caption">
										Created by: <span class="timeline-body-title font-blue-madison"><?php echo TeacherName("$to_f",'1'); ?></span>
										Created for: <span class="timeline-body-title font-blue-madison"><?php echo TeacherName("$to_p",'1'); ?></span>
										<span class="timeline-body-time font-blue-chambray">
										Created at <?php echo $add_date; ?></span>
									</div>
								</div>
								<div class="timeline-body-content">
									Initial Job: 
									<strong>"<?php echo $des; ?>"</strong>
								</div>
							</div>
						</div>
						<!-- END TIMELINE ITEM -->
						<?php 
// sending query
$result = mysql_query("SELECT * FROM `task_string` WHERE task_id = '$tk_id' ORDER BY string_id ASC;");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
If ($numberOfRows == 0) 
	{
	echo '';
	}
else if ($numberOfRows > 0) 
	{
	$i=0;
	while ($i<$numberOfRows)
		{		
			$stringid = MYSQL_RESULT($result,$i,"string_id");
			$takid = MYSQL_RESULT($result,$i,"task_id");
			$userid = MYSQL_RESULT($result,$i,"user");
			$dateid = MYSQL_RESULT($result,$i,"date");
			$msg = MYSQL_RESULT($result,$i,"msg");
?>
<!-- TIMELINE ITEM -->
						<div class="timeline-item">
							<div class="timeline-badge">
								<img class="timeline-badge-userpic" src="../uploads/<?php echo TeacherName("$userid","2"); ?>">
							</div>
							<div class="timeline-body <?php if ($userid == 1) { echo 'bg-grey-silver'; } else { echo 'bg-grey-steel'; } ?>">
								<div class="timeline-body-arrow">
								</div>
								<div class="timeline-body-head">
									<div class="timeline-body-head-caption">
										<a href="javascript:;" class="timeline-body-title font-blue-madison"><?php echo TeacherName("$userid","1"); ?></a>
										<span class="timeline-body-time font-blue-chambray">
										Responded at <?php echo $dateid; ?></span>
									</div>
								</div>
								<div class="timeline-body-content">
									<?php echo $msg; ?>
								</div>
							</div>
						</div>
						<!-- END TIMELINE ITEM -->
<?php 	
		$i++;		
		}
	}	
?>
					<!-- TIMELINE ITEM -->
						<div class="timeline-item">
							<div class="timeline-body">
								<div class="timeline-body-arrow">
								</div>
								<div class="timeline-body-head">
									<div class="timeline-body-head-caption">
										<span class="timeline-body-time font-grey-cascade">
										<?php if ($status == 2){ echo '<span class="font-red">Action Pending from your side...</span>'; } elseif ($status == 1){ echo '<span class="font-green">No Action Required from your side...</span>';} ?></span>
									</div>
									<?php if ($type == 1){ echo '<div class="timeline-body-head-actions">
										<div class="btn-group">
											<button class="btn btn-circle green-haze btn-sm dropdown-toggle" type="button" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
											Actions <i class="fa fa-angle-down"></i>
											</button>
											<ul class="dropdown-menu pull-right" role="menu">
												<li>
													<a data-target="#note" data-toggle="modal">
													Add New Comment</a>
												</li>
												<li>
													<a data-target="#task" data-toggle="modal">
													Re-Allocate</a>
												</li>
												<li class="divider">
												</li>
												<li>
													<a href="clear-issued-task?new_id='.$taskid.'">Close 
													Task</a>
												</li>
											</ul>
										</div>
									</div>'; } elseif ($type == 2){ echo 'Task Closed'; } ?>
								</div>
							</div>
						</div>
						<!-- END TIMELINE ITEM -->
					</div>
				</div>
			</div>
			<!-- END PAGE CONTENT INNER -->
		</div>
	</div>
	<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->

<!-- START COMMENT ADD-->
<div class="modal fade" id="note" tabindex="-1" role="dialog" aria-hidden="true">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title">Add New 
											Comment</h4>
										</div>
										<div class="modal-body">
								<div class="portlet box green">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-plus"></i>Add New 
											Comments for <?php echo TeacherName("$to_p",'1'); ?>
										</div>
										<div class="tools">
											<a href="javascript:;" class="collapse">
											</a>
										</div>
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="add-new-comment-issued-task" method="post" class="form-horizontal form-row-seperated">
											<div class="form-body">
												<div class="form-group">
													<label class="col-md-3 control-label"><strong>
													Your Comments</strong></label>
													<div class="col-md-9">
														<textarea class="form-control input-circle" placeholder="Enter Your Comments" name="comment" id="comment"></textarea>
													</div>
												</div>
												<input type="hidden" value="<?php echo $taskid; ?>" name="new_id" id="new_id" class="form-control input-circle">
												<input type="hidden" value="<?php echo $to_f; ?>" name="usertk_id" id="usertk_id" class="form-control input-circle">
											<div class="form-actions">
												<div class="row">
													<div class="col-md-offset-3 col-md-9">
														<button type="submit" name="cmdSubmit" class="btn btn-circle blue">
														Submit</button>
														<button type="button" data-dismiss="modal" aria-hidden="true" class="btn btn-circle default">
														Cancel</button>
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
									</div>
									<!-- END COMMENT ADD-->
									<!-- START ALLOCATION -->
									<div class="modal fade" id="task" tabindex="-1" role="dialog" aria-hidden="true">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title">Re-Allocate this Task</h4>
										</div>
										<div class="modal-body">
								<div class="portlet box green">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-plus"></i>Re-Allocate Task to Other 
										</div>
										<div class="tools">
											<a href="javascript:;" class="collapse">
											</a>
										</div>
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="re-allocate-issued-task" method="post" class="form-horizontal form-row-seperated">
												<div class="form-group">
															<label class="control-label col-md-3">
															<strong>Level</strong></label>
															<div class="col-md-4">
															<select class="form-control" name="catid" id="categoriesSelect"></select>
              												</div>
												</div>
												<div class="form-group">
															<label class="control-label col-md-3">
															<strong>To</strong></label>
															<div class="col-md-4">
															<select class="form-control" name="techid" id="subcatsSelect"></select>
              												</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label"><strong>
													Your Comments</strong></label>
													<div class="col-md-9">
														<textarea class="form-control input-circle" placeholder="Enter Your Comments" name="comment" id="comment"></textarea>
													</div>
												</div>
												<input type="hidden" value="<?php echo $taskid; ?>" name="new_id" id="new_id" class="form-control input-circle">
												<input type="hidden" value="<?php echo $to_f; ?>" name="usertk_id" id="usertk_id" class="form-control input-circle">
											<div class="form-actions">
												<div class="row">
													<div class="col-md-offset-3 col-md-9">
														<button type="submit" name="cmdSubmit" class="btn btn-circle blue">
														Submit</button>
														<button type="button" data-dismiss="modal" aria-hidden="true" class="btn btn-circle default">
														Cancel</button>
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
									</div>
								<!-- END ALLOCATION -->
<?php echo $fot; ?>