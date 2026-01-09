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
  $cid =$_REQUEST['c_id'];
  $did =$_REQUEST['did'];
?>
<?php 
$result1 = mysql_query("SELECT * FROM dept HAVING dept_id='$did'");
if (!$result1) 
		{
		die("Query to show fields from table failed");
		}
			$numberOfRows = MYSQL_NUMROWS($result1);
			If ($numberOfRows == 0) 
				{
				echo '';
				}
			else if ($numberOfRows > 0) 
				{
				$i=0;
			$course_name = MYSQL_RESULT($result1,$i,"name");
				}			
?>
<?php 
$result1 = mysql_query("SELECT * FROM lesson_pages HAVING lesson_id='$cid'");
if (!$result1) 
		{
		die("Query to show fields from table failed");
		}
			$numberOfRows = MYSQL_NUMROWS($result1);
			If ($numberOfRows == 0) 
				{
				echo '';
				}
			else if ($numberOfRows > 0) 
				{
				$i=0;
			$cname = MYSQL_RESULT($result1,$i,"lesson_name");
				}			
?>
<?php
date_default_timezone_set("Asia/Karachi");
$sy = date('Y-m-d');
?>
<?php echo $main_header; ?>
<head>
<style>.my-simple-gallery {
  width: 100%;
  float: left;
}
.my-simple-gallery img {
  width: 100%;
  height: auto;
}
.my-simple-gallery figure {
  display: block;
  float: left;
  margin: 0 5px 5px 0;
  width: 150px;
}
.my-simple-gallery figcaption {
  display: none;
}
</style>
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
				<h1><?php echo $course_name; ?> <small><?php echo $cname; ?></small></h1>
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
				<li>
					<a href="course-material">All Courses</a><i class="fa fa-circle"></i>
				</li>
				<li>
					<a href="course-material-lesson?c_id=<?php echo $did; ?>"><?php echo $course_name; ?></a><i class="fa fa-circle"></i>
				</li>
				<li class="active">
					 <?php echo $cname; ?>
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN SAMPLE TABLE PORTLET-->
						<div class="portlet-body">
							<div id="mytable" class="table-responsive">
							<div class="my-simple-gallery">
    <div>
							<?php 
// sending query
$result = mysql_query("SELECT * FROM lesson_image WHERE lesson_id = $cid ORDER BY position_id ASC;");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
If ($numberOfRows == 0) 
	{
	echo 'No Pending Note Found';
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
		
			$pid1 = MYSQL_RESULT($result,$i,"page_id");
			$lid = MYSQL_RESULT($result,$i,"lesson_id");
			$pname = MYSQL_RESULT($result,$i,"page_name");
			$img = MYSQL_RESULT($result,$i,"image_name");
			$pid = MYSQL_RESULT($result,$i,"position_id");
?>
    <figure itemprop="associatedMedia">
      <a href="../../uploads/<?php echo $img; ?>" itemprop="contentUrl" data-size="1080x1500">
          <img src="../../uploads/thumb/<?php echo $img; ?>" itemprop="thumbnail" alt="Image description" /><p style="text-align: center !important">
		<?php echo $pname; ?></a> 
       <figcaption itemprop="caption description"><?php echo $pname; ?></figcaption>
       
    </figure>    
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