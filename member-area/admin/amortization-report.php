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
  include("header-accounts.php");
  $link = $_SERVER['REQUEST_URI'];
  $sy =$_REQUEST['date_id2'];
  $y =date('Y', strtotime($sy));
  $p_y =$y-1;
  $p_sy =''.$p_y.'-06-30';
function tan_ass($y, $en){
$sql = "select sum(amount) from account_entry where ac_cat_id = 1 AND account_head = $en AND date <= '$y'";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$first = $row[0];
$sql = "select sum(tax) from account_entry where ac_cat_id = 1 AND account_head = $en AND date <= '$y'";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$second = $row[0];
$total = $first+$second;
if ($total == 0){ echo '--'; }
else{
echo number_format($total, 0);
}
}
function tan_ass_dep($y, $en){
$sql = "select sum(ad_amount) from adjusment_account where ac_cat_id = 1 AND head_id = $en AND date <= '$y'";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$third = $row[0];
$total = $third;
if ($total == 0){ echo '--'; }
else{
echo number_format($total, 0);
}
}
function tan_ass_dep_current($x, $y, $en){
$sql = "select sum(ad_amount) from adjusment_account where ac_cat_id = 1 AND head_id = $en AND date > '$x' AND date <= '$y'";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$third = $row[0];
$total = $third;
if ($total == 0){ echo '--'; }
else{
echo number_format($total, 0);
}
}
function tan_add($x, $y, $en){
$sql = "select sum(amount) from account_entry where ac_cat_id = 1 AND account_head = $en AND date > '$x' AND date <= '$y'";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$first = $row[0];
$sql = "select sum(tax) from account_entry where ac_cat_id = 1 AND account_head = $en AND date > '$x' AND date <= '$y'";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$second = $row[0];
$total = $first+$second;
if ($total == 0){ echo '--'; }
else{
echo number_format($total, 0);
}
}
function tan_ass_tot($y, $en){
$sql = "select sum(amount) from account_entry where ac_cat_id = 1 AND account_head = $en AND date <= '$y'";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$first = $row[0];
$sql = "select sum(tax) from account_entry where ac_cat_id = 1 AND account_head = $en AND date <= '$y'";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$second = $row[0];
$sql = "select sum(ad_amount) from adjusment_account where ac_cat_id = 1 AND head_id = $en AND date <= '$y'";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$third = $row[0];
$total = $third;
$total = $first+$second-$third;
if ($total == 0){ echo '--'; }
else{
echo number_format($total, 0);
}
}
function total_tan_ass($y){
$sql = "select sum(amount) from account_entry where ac_cat_id = 1 AND date <= '$y'";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$first = $row[0];
$sql = "select sum(tax) from account_entry where ac_cat_id = 1 AND date <= '$y'";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$second = $row[0];
$total = $first+$second;
if ($total == 0){ echo '--'; }
else{
echo number_format($total, 0);
}
}
function total_tan_ass_dep($y){
$sql = "select sum(ad_amount) from adjusment_account where ac_cat_id = 1 AND date <= '$y'";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$third = $row[0];
$total = $third;
if ($total == 0){ echo '--'; }
else{
echo number_format($total, 0);
}
}
function total_tan_ass_dep_current($x, $y){
$sql = "select sum(ad_amount) from adjusment_account where ac_cat_id = 1 AND date > '$x' AND date <= '$y'";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$third = $row[0];
$total = $third;
if ($total == 0){ echo '--'; }
else{
echo number_format($total, 0);
}
}
function total_tan_add($x, $y){
$sql = "select sum(amount) from account_entry where ac_cat_id = 1 AND date > '$x' AND date <= '$y'";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$first = $row[0];
$sql = "select sum(tax) from account_entry where ac_cat_id = 1 AND date > '$x' AND date <= '$y'";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$second = $row[0];
$total = $first+$second;
if ($total == 0){ echo '--'; }
else{
echo number_format($total, 0);
}
}
function total_tan_ass_tot($y){
$sql = "select sum(amount) from account_entry where ac_cat_id = 1 AND date <= '$y'";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$first = $row[0];
$sql = "select sum(tax) from account_entry where ac_cat_id = 1 AND date <= '$y'";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$second = $row[0];
$sql = "select sum(ad_amount) from adjusment_account where ac_cat_id = 1 AND date <= '$y'";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$third = $row[0];
$total = $third;
$total = $first+$second-$third;
if ($total == 0){ echo '--'; }
else{
echo number_format($total, 0);
}
}
?>
<?php echo $main_header; ?>
<head>
<style type="text/css">
.auto-style1 {
	text-align: center;
}
.auto-style2 {
	text-align: right;
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
				<h1>Amortization <small>Report</small></h1>

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
					 Amortization Report for the period <b><?php $date1=date_create($p_sy); 
echo date_format($date1,"M d, Y");
 ?> To <?php $date1=date_create($sy); 
echo date_format($date1,"M d, Y");
 ?></b>
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN SAMPLE TABLE PORTLET-->
					<div class="portlet light">
					<h4></h4>
							<div id="mytable" class="table-responsive">
								<table class="table table-bordered table-hover">
								<thead>
								<tr>
								<th>
									 
								</th>
								<th colspan="3" class="auto-style1">
									 COST
								</th>
								<th colspan="3" class="auto-style1">
									 DEPRECIATION
								</th>
								<th class="auto-style1">
									 WRITTEN DOWN VALUE
								</th>
								<th class="auto-style1">
								</th>
								</tr>
								</thead>
								<tbody>
								<tr>
								<td>
									 <b>PARTICULARS</b>
								</td>
								<td class="auto-style1 active">
									 As at <br><b><?php $date1=date_create("$p_sy"); echo date_format($date1,"d-m-Y"); ?></b>
								</td>
								<td class="auto-style1 active">
									 Addition/<br>(Deletion)
								</td>
								<td class="auto-style1 active">
									 As at <br><b><?php $date1=date_create("$sy"); echo date_format($date1,"d-m-Y"); ?></b>
								</td>
								<td class="auto-style1 warning">
									As at <br><b><?php $date1=date_create("$p_sy"); echo date_format($date1,"d-m-Y"); ?></b>
								</td>
								<td class="auto-style1 warning">
									For the Year <br><b><?php echo $p_y; ?>-<?php echo $y; ?></b>
								</td>
								<td class="auto-style1 warning">
									As at <br><b><?php $date1=date_create("$sy"); echo date_format($date1,"d-m-Y"); ?></b>
								</td>
								<td class="auto-style1 success">
									As at <br><b><?php $date1=date_create("$sy"); echo date_format($date1,"d-m-Y"); ?></b>
								</td>
								<td class="auto-style1">
									<b>RATE</b>
								</td>
							</tr>
								<?php 
// sending query
$result = mysql_query("SELECT `account_entry`.*, `accounts_head`.`account_head_name`, `vendor`.`vendor_name` FROM `account_entry`,`accounts_head`, `vendor` WHERE account_entry.account_head=accounts_head.account_head_id and account_entry.vendor_id=vendor.vendor_id GROUP BY account_head HAVING ac_cat_id = 1 ORDER BY date DESC;");
	if (!$result) 
	{
    die("There is an issue in data");
	}
$numberOfRows = MYSQL_NUMROWS($result);
If ($numberOfRows == 0) 
	{
	echo 'No Entry Found';
	}
else if ($numberOfRows > 0) 
	{
	$i=0;
	while ($i<$numberOfRows)
		{	
	
			$en_id = MYSQL_RESULT($result,$i,"entry_id");
			$vdate = MYSQL_RESULT($result,$i,"date");
			$vdes = MYSQL_RESULT($result,$i,"description");
			$vname = MYSQL_RESULT($result,$i,"vendor_name");
			$vmod = MYSQL_RESULT($result,$i,"ac_cat_id");
			$vamu = MYSQL_RESULT($result,$i,"amount");
			$vhead = MYSQL_RESULT($result,$i,"account_head_name");
			$en_head = MYSQL_RESULT($result,$i,"account_head");
?>
								<tr>
								<td>
									 <?php echo $vhead; ?>
								</td>
								<td class="auto-style2 active">
									 <?php echo tan_ass("$p_sy","$en_head"); ?>
								</td>
								<td class="auto-style2 active">
									 <?php echo tan_add("$p_sy","$sy","$en_head"); ?>
								</td>
								<td class="auto-style2 active">
									 <?php echo tan_ass("$sy","$en_head"); ?>
								</td>
								<td class="auto-style2 warning">
									 <?php echo tan_ass_dep("$p_sy","$en_head"); ?>
								</td>
								<td class="auto-style2 warning">
									 <?php echo tan_ass_dep_current("$p_sy","$sy","$en_head"); ?>
								</td>
								<td class="auto-style2 warning">
									 <?php echo tan_ass_dep("$sy","$en_head"); ?>
								</td>
								<td class="auto-style1 success">
									<?php echo tan_ass_tot("$sy","$en_head"); ?>
								</td>
								<td>
									
								</td>
							</tr>
						<?php 	
		$i++;		
		}
	}	
?>
								<tr>
								<td>
									 <b>Total</b>
								</td>
								<td class="auto-style2 active">
									 <b><?php echo total_tan_ass("$p_sy"); ?></b>
								</td>
								<td class="auto-style2 active">
									 <b><?php echo total_tan_add("$p_sy","$sy"); ?></b>
								</td>
								<td class="auto-style2 active">
									 <b><?php echo total_tan_ass("$sy"); ?></b>
								</td>
								<td class="auto-style2 warning">
									 <b><?php echo total_tan_ass_dep("$p_sy"); ?></b>
								</td>
								<td class="auto-style2 warning">
									 <b><?php echo total_tan_ass_dep_current("$p_sy","$sy"); ?></b>
								</td>
								<td class="auto-style2 warning">
									 <b><?php echo total_tan_ass_dep("$sy"); ?></b>
								</td>
								<td class="auto-style1 success">
									<b><?php echo total_tan_ass_tot("$sy"); ?></b>
								</td>
								<td>
									
								</td>
							</tr>
</tbody>
								</table>
							</div>
						</div>
					</div>
					<!-- END SAMPLE TABLE PORTLET-->
<div class="modal fade bs-modal-lg" id="notes-d" tabindex="-1" role="dialog" aria-hidden="true">
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
function sumup( o ) {
 var t = [], cell,
  row = document.getElementById( 'sumtable' ).rows,
  i = row.length - 1,
  lastrow = row[i];
 while(i--) {
  cell = row[i].cells; j = cell.length;
  while(j--) {
   if( !t[j] ) { t[j] = 0; }
   t[j] += parseFloat( cell[j].firstChild.nodeValue ) || 0;
  }
 }
 j = t.length; while(j--) {
  if( lastrow.cells[j] ) { lastrow.cells[j].firstChild.nodeValue = t[j]; }
 }
 o.disabled = true;
}
</script>