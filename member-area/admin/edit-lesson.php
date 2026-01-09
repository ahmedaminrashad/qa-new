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
$cid =$_REQUEST['c_id'];
$cname =$_REQUEST['cname'];
$course_name =$_REQUEST['course'];
$did =$_REQUEST['did'];
	$result = mysql_query("SELECT * FROM lesson_pages WHERE lesson_id = '$cid'");
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
			$lid = MYSQL_RESULT($result,$i,"lesson_id");
			$ldept = MYSQL_RESULT($result,$i,"dept_id");
			$lpos = MYSQL_RESULT($result,$i,"position_id");
			$img = MYSQL_RESULT($result,$i,"image_name");
			$lname = MYSQL_RESULT($result,$i,"lesson_name");
			$ldes = MYSQL_RESULT($result,$i,"lesson_des");
			}
?>
<?php
if (isset($_POST['cmdSubmit'])) 
  	{ 	
  $acname= $_POST['lesson'];
  $adesi= $_POST['des'];
  $aposi= $_POST['pos'];
  $acid= $_POST['ccid'];
  $abid= $_POST['bid'];
  $abname= $_POST['bname'];

			mysql_query( "UPDATE lesson_pages SET lesson_name = '$acname', lesson_des = '$adesi', position_id = '$aposi' WHERE lesson_id = '$acid'") or die(mysql_error()); 
							 header("Location: course-material-lesson?c_id=$abid&cname=$abname");
				}
?>
<?php
date_default_timezone_set("Africa/Cairo");
$sy = date('Y-m-d');
?>
<?php echo $main_header; ?>
<head>
<link href="../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css"/>
<link href="../assets/global/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css" rel="stylesheet" type="text/css"/>
<link href="../assets/global/plugins/bootstrap-modal/css/bootstrap-modal.css" rel="stylesheet" type="text/css"/>
<script src="jquery-1.9.0.min.js"></script>
    <script>
      $(document).ready(function() {
        $(".add").click(function() {
          $('<div><input class="files" name="user_files[]" type="file" ><span class="rem" ><a href="javascript:void(0);" >Remove</span></div>').appendTo(".contents");

        });
        $('.contents').on('click', '.rem', function() {
          $(this).parent("div").remove();
        });

      });
    </script>
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
				<h1>Edit <small><?php echo $cname; ?> in <?php echo $course_name; ?></small></h1>
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
					<a href="course-material">All Courses</a><i class="fa fa-circle"></i>
				</li>
				<li class="active">
					 You are editing <?php echo $cname; ?> in <?php echo $course_name; ?>
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
											<i class="fa fa-edit"></i> Edit Lesson Details 
										</div>
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<div class="form-body">
										<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" class="form-horizontal form-row-seperated">
										<div class="form-body">
												<div class="form-group">
															<label class="control-label col-md-3">
															<strong>Lesson Name*</strong></label>
															<div class="col-md-4">
																<input required type="text" value="<?php echo $lname; ?>" name="lesson" id="lesson" class="form-control">	
														</div>
													</div>
													<!--/span-->
												<div class="form-group">
															<label class="control-label col-md-3">
															<strong>Position*</strong></label>
															<div class="col-md-4">
																<input required type="number" value="<?php echo $lpos; ?>" name="pos" id="pos" class="form-control">	
														</div>
													</div>
													<!--/span-->
												<div class="form-group">
															<label class="control-label col-md-3">
															<strong>Description*</strong></label>
															<div class="col-md-4">
															<textarea required type="text" name="des" id="des" class="form-control"><?php echo $ldes; ?></textarea>														</div>
													</div>
													</div>
													<input type="hidden" value="<?php echo $cid; ?>" name="ccid" id="ccid" class="form-control">
													<input type="hidden" value="<?php echo $did; ?>" name="bid" id="bid" class="form-control">
													<input type="hidden" value="<?php echo $course_name; ?>" name="bname" id="bname" class="form-control">
													<!--/span-->
											<div class="form-actions">
												<div class="row">
													<div class="col-md-offset-3 col-md-9">
														<button type="submit" name="cmdSubmit" value="Upload Images" class="btn btn-circle blue">Submit</button>
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
				<div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title">Help!</h4>
										</div>
										<div class="modal-body">
											 <li>1. COURSE NAME will be displayed in LIST OF STUDENTS under course heading.</li>
											 <li>1. DISPLAY NAME will be displayed on COURSE MATERIAL page.</li>
											 <li>1. COURSE NAME will be displayed in LIST OF STUDENTS under course heading.</li>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn default" data-dismiss="modal">Close</button>
										</div>
									</div>
									<!-- /.modal-content -->
								</div>
								<!-- /.modal-dialog -->
							</div>
			</div>
			<!-- END PAGE CONTENT INNER -->
		</div>
	</div>
	<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->
<script>
$(document).on("click", ".open-AddBookDialog", function () {
     var myBookId = $(this).data('id');
     $(".modal-body #bookId").val( myBookId );
});
</script>
<?php echo $fot; ?>
<script type="text/javascript" src="../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="../assets/global/plugins/bootstrap-modal/js/bootstrap-modalmanager.js" type="text/javascript"></script>
<script src="../assets/global/plugins/bootstrap-modal/js/bootstrap-modal.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="../assets/admin/pages/scripts/ui-extended-modals.js"></script>