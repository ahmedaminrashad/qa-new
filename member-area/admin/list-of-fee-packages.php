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
  require_once("dbcontrollerinline.php");
$db_handle = new DBController();
$sql = "SELECT * from fee_package";
$faq = $db_handle->runQuery($sql);
  $link = $_SERVER['REQUEST_URI'];
?>
<?php echo $main_header; ?>
<?php echo $tool_bar; ?>
<?php echo $start_menu; ?>
<?php echo $search_bar; ?>
<?php echo $main_menu; ?>
<head>
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
		<script>
		function showEdit(editableObj) {
			$(editableObj).css("background","#FFF");
		} 
		
		function saveToDatabase(editableObj,column,id) {
			$(editableObj).css("background","#FFF url(loaderIcon.gif) no-repeat right");
			$.ajax({
				url: "saveedit.php",
				type: "POST",
				data:'column='+column+'&editval='+editableObj.innerHTML+'&id='+id,
				success: function(data){
					$(editableObj).css("background","#FDFDFD");
				}        
		   });
		}
		</script>
</head>
<!-- BEGIN PAGE CONTAINER -->
<div class="page-container">
	<!-- BEGIN PAGE HEAD -->
	<div class="page-head">
		<div class="container">
			<!-- BEGIN PAGE TITLE -->
			<div class="page-title">
				<h1>List<small> of Fee Packages</small></h1>

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
					 List of Fee Packages
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN SAMPLE TABLE PORTLET-->
					<div class="portlet light">
						</div>

						<div class="portlet-body">
							<div id="mytable" class="table-responsive">
								<table class="table table-hover">
								<thead>
								<tr>
								<th>
									 #
								</th>
								<th>
									 Package Title
								</th>
								<th>
									 Number of Classes
								</th>
								<th>
									 Fee (USD)
								</th>
								<th>
									 Fee (GBP)
								</th>
								<th>
									 Fee (AUD)
								</th>

								<th>
									 Fee (PKR)
								</th>
							</tr>
								</thead>
								<tbody>
								<?php
		  foreach($faq as $k=>$v) {
		  ?>
			  <tr class="table-row">
				<td><?php echo $faq[$k]["package_id"]; ?></td>
				<td contenteditable="true" onBlur="saveToDatabase(this,'package_name','<?php echo $faq[$k]["package_id"]; ?>')" onClick="showEdit(this);"><?php echo $faq[$k]["package_name"]; ?></td>
				<td contenteditable="true" onBlur="saveToDatabase(this,'package_classes','<?php echo $faq[$k]["package_id"]; ?>')" onClick="showEdit(this);"><?php echo $faq[$k]["package_classes"]; ?></td>
				<td contenteditable="true" onBlur="saveToDatabase(this,'fee_usd','<?php echo $faq[$k]["package_id"]; ?>')" onClick="showEdit(this);"><?php echo $faq[$k]["fee_usd"]; ?></td>
				<td contenteditable="true" onBlur="saveToDatabase(this,'fee_gbp','<?php echo $faq[$k]["package_id"]; ?>')" onClick="showEdit(this);"><?php echo $faq[$k]["fee_gbp"]; ?></td>
				<td contenteditable="true" onBlur="saveToDatabase(this,'fee_aud','<?php echo $faq[$k]["package_id"]; ?>')" onClick="showEdit(this);"><?php echo $faq[$k]["fee_aud"]; ?></td>
				<td contenteditable="true" onBlur="saveToDatabase(this,'fee_pkr','<?php echo $faq[$k]["package_id"]; ?>')" onClick="showEdit(this);"><?php echo $faq[$k]["fee_pkr"]; ?></td>
			  </tr>
		<?php
		}
		?>
								</tbody>
								</table>
							</div>
						</div>
						</div>
						</div>
						</div>
						</div>
						</div>


			<!-- END PAGE CONTENT INNER -->
<!-- END PAGE CONTAINER -->
<?php echo $fot; ?>