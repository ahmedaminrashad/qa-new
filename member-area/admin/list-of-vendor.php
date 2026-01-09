<?php session_start(); ?>
  <?php
  include("../includes/session1.php");
  require ("../includes/dbconnection.php");
  include("header-accounts.php");
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
				<h1>Vendors<small> Added</small></h1>

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
					 List of Vendors
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN SAMPLE TABLE PORTLET-->
					<div class="portlet light">
					<h4><?php 
$result = mysql_query("SELECT * FROM vendor");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
echo "Total Number of Added Vendors: $numberOfRows"; ?></h4>
						<div class="portlet-body">
							<div id="mytable" class="table-responsive">
								<table class="table table-hover">
								<thead>
								<tr>
								<th>
									 Sr.No
								</th>
								<th>
									 Vendor Name
								</th>
								<th>
									 Contact Details
								</th>
								<th>
									 Address
								</th>
								<th>
									 &nbsp;
								</th>
								<?php 
// sending query
$result = mysql_query("SELECT * FROM vendor");
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
	while ($i<$numberOfRows)
		{		
		
				$v_id = MYSQL_RESULT($result,$i,"vendor_id");
			$v_name = MYSQL_RESULT($result,$i,"vendor_name");
			$v_contact = MYSQL_RESULT($result,$i,"contact");
			$v_address = MYSQL_RESULT($result,$i,"address");
?>
							</tr>
								</thead>
								<tbody>
								<tr bgcolor="<?php echo $bgcolor; ?>">
								<td>
									 <?php echo ++$counter; ?>
								</td>
								<td>
									 <?php echo $v_name; ?>
								</td>
								<td>
									 <?php echo $v_contact; ?>
								</td>
								<td>
									 <?php echo $v_address; ?>
								</td>
								<td><a href="edit-vendor?pT=<?php echo base64_encode($v_id); ?>"><button type="button" class="btn yellow btn-xs">Edit Vendor</button></a></td>
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