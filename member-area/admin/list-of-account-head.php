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
				<h1>Acconts <small>Head Added</small></h1>

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
					 List of Account Heads
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN SAMPLE TABLE PORTLET-->
					<div class="portlet light">
					<h4><?php 
$result = mysql_query("SELECT * FROM accounts_head");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
echo "Total Number of Added Heads: $numberOfRows"; ?></h4>
						<div class="portlet-body">
							<div id="mytable" class="table-responsive">
								<table class="table table-hover">
								<thead>
								<tr>
								<th>
									 Sr.No
								</th>
								<th>
									 Account Head Title
								</th>
								<th>
									 Account Category
								</th>
								<th>
									 Note
								</th>
								<th>
									 &nbsp;
								</th>
								<?php 
// sending query
$result = mysql_query("SELECT `accounts_head`.*, `accounts_cat`.`accounts_cat_name` FROM `accounts_head`,`accounts_cat` WHERE accounts_head.account_cat_id=accounts_cat.accounts_cat_id");
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
		
				$h_id = MYSQL_RESULT($result,$i,"account_head_id");
			$h_name = MYSQL_RESULT($result,$i,"account_head_name");
			$h_note = MYSQL_RESULT($result,$i,"note");
			$h_cat = MYSQL_RESULT($result,$i,"accounts_cat_name");
			if($row['account_cat_id']=='1') 
				{
					$bgcolor ='#F8E0E0';
				}
			else if($row['account_cat_id']=='2')
				{
					$bgcolor ='#E0E0F8';
				}		
			else if($row['account_cat_id']=='3')
				{
					$bgcolor ='#F2E0F7';
				}
			else if($row['account_cat_id']=='4')
				{
					$bgcolor ='#F5F6CE';
				}
			else if($row['account_cat_id']=='5')
				{
					$bgcolor ='#A9F5F2';
				}
			else if($row['account_cat_id']=='6')
				{
					$bgcolor ='#A9E2F3';
				}
				else if($row['account_cat_id']=='7')
				{
					$bgcolor ='#A9A9F5';
				}
				else if($row['account_cat_id']=='8')
				{
					$bgcolor ='#A9F5A9';
				}
			else
				{
					$bgcolor ='#fffff';
				}
?>
							</tr>
								</thead>
								<tbody>
								<tr bgcolor="<?php echo $bgcolor; ?>">
								<td>
									 <?php echo ++$counter; ?>
								</td>
								<td>
									 <?php echo $h_name; ?>
								</td>
								<td>
									 <?php echo $h_cat; ?>
								</td>
								<td>
									 <?php echo $h_note; ?>
								</td>
								<td><a href="edit-account-head?pT=<?php echo base64_encode($h_id); ?>"><button type="button" class="btn yellow btn-xs">Edit Head</button></a></td>
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