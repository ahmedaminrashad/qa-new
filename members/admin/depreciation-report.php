<?php session_start(); ?>
  <?php
  include("../includes/session1.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("../includes/notifications.php");
  include("header.php");
  $link = $_SERVER['REQUEST_URI'];
  $sy =$_REQUEST['date_id2'];
  $y =date('Y', strtotime($sy));
  $p_y =$y-1;
  $p_sy =''.$p_y.'-06-30';
function tan_ass($y, $en){
require ("../includes/dbconnection.php");
$sql = "select sum(amount) from account_entry where ac_cat_id = 10 AND account_head = $en AND date <= '$y'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$first = $row[0];
$sql = "select sum(tax) from account_entry where ac_cat_id = 10 AND account_head = $en AND date <= '$y'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$second = $row[0];
$total = $first+$second;
if ($total == 0){ echo '--'; }
else{
echo number_format($total, 0);
}
}
function tan_ass_dep($y, $en){
require ("../includes/dbconnection.php");
$sql = "select sum(ad_amount) from adjusment_account where ac_cat_id = 10 AND head_id = $en AND date <= '$y'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$third = $row[0];
$total = $third;
if ($total == 0){ echo '--'; }
else{
echo number_format($total, 0);
}
}
function tan_ass_dep_current($x, $y, $en){
require ("../includes/dbconnection.php");
$sql = "select sum(ad_amount) from adjusment_account where ac_cat_id = 10 AND head_id = $en AND date > '$x' AND date <= '$y'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$third = $row[0];
$total = $third;
if ($total == 0){ echo '--'; }
else{
echo number_format($total, 0);
}
}
function tan_add($x, $y, $en){
require ("../includes/dbconnection.php");
$sql = "select sum(amount) from account_entry where ac_cat_id = 10 AND account_head = $en AND date > '$x' AND date <= '$y'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$first = $row[0];
$sql = "select sum(tax) from account_entry where ac_cat_id = 10 AND account_head = $en AND date > '$x' AND date <= '$y'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$second = $row[0];
$total = $first+$second;
if ($total == 0){ echo '--'; }
else{
echo number_format($total, 0);
}
}
function tan_ass_tot($y, $en){
require ("../includes/dbconnection.php");
$sql = "select sum(amount) from account_entry where ac_cat_id = 10 AND account_head = $en AND date <= '$y'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$first = $row[0];
$sql = "select sum(tax) from account_entry where ac_cat_id = 10 AND account_head = $en AND date <= '$y'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$second = $row[0];
$sql = "select sum(ad_amount) from adjusment_account where ac_cat_id = 10 AND head_id = $en AND date <= '$y'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$third = $row[0];
$total = $third;
$total = $first+$second-$third;
if ($total == 0){ echo '--'; }
else{
echo number_format($total, 0);
}
}
function total_tan_ass($y){
require ("../includes/dbconnection.php");
$sql = "select sum(amount) from account_entry where ac_cat_id = 10 AND date <= '$y'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$first = $row[0];
$sql = "select sum(tax) from account_entry where ac_cat_id = 10 AND date <= '$y'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$second = $row[0];
$total = $first+$second;
if ($total == 0){ echo '--'; }
else{
echo number_format($total, 0);
}
}
function total_tan_ass_dep($y){
require ("../includes/dbconnection.php");
$sql = "select sum(ad_amount) from adjusment_account where ac_cat_id = 10 AND date <= '$y'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$third = $row[0];
$total = $third;
if ($total == 0){ echo '--'; }
else{
echo number_format($total, 0);
}
}
function total_tan_ass_dep_current($x, $y){
require ("../includes/dbconnection.php");
$sql = "select sum(ad_amount) from adjusment_account where ac_cat_id = 10 AND date > '$x' AND date <= '$y'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$third = $row[0];
$total = $third;
if ($total == 0){ echo '--'; }
else{
echo number_format($total, 0);
}
}
function total_tan_add($x, $y){
require ("../includes/dbconnection.php");
$sql = "select sum(amount) from account_entry where ac_cat_id = 10 AND date > '$x' AND date <= '$y'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$first = $row[0];
$sql = "select sum(tax) from account_entry where ac_cat_id = 10 AND date > '$x' AND date <= '$y'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$second = $row[0];
$total = $first+$second;
if ($total == 0){ echo '--'; }
else{
echo number_format($total, 0);
}
}
function total_tan_ass_tot($y){
require ("../includes/dbconnection.php");
$sql = "select sum(amount) from account_entry where ac_cat_id = 10 AND date <= '$y'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$first = $row[0];
$sql = "select sum(tax) from account_entry where ac_cat_id = 10 AND date <= '$y'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$second = $row[0];
$sql = "select sum(ad_amount) from adjusment_account where ac_cat_id = 10 AND date <= '$y'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$third = $row[0];
$total = $third;
$total = $first+$second-$third;
if ($total == 0){ echo '--'; }
else{
echo number_format($total, 0);
}
}
?>
<?php
$page_title = 'Depriciation';
$page_subtitle = 'Depriciation';
$table_name = 'Depriciation';
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
<body>
<?php echo $top_bar_logo; ?>
<?php echo $search_bar; ?>
<?php echo $notification_bar; ?>
<?php echo $main_menu_start; ?>
<?php echo $main_menu; ?>
<?php echo $main_menu_end; ?>
<div class="app-main__outer">
            
            <!-- App inner start-->
                <div class="app-main__inner">
                
                <!-- Page Title Start-->
                    <div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
                                    </i>
                                </div>
                                <div><?php echo $page_title; ?>
                                    <div class="page-title-subheading"><?php echo $page_subtitle; ?>
                                    </div>
                                </div>
                            </div>
                            </div>
                    </div>
                    <!-- Page Title End-->
                    <!-- Table Row Start-->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="main-card mb-3 card">
                                <div class="card-body"><h5 class="card-title"><?php $table_name; ?></h5>
                                    <div class="table-responsive">
                                        <table class="align-middle mb-0 table table-striped table-hover">
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
								<td class="auto-style1 active" bgcolor="#e6f2ff">
									 As at <br><b><?php $date1=date_create("$p_sy"); echo date_format($date1,"d-m-Y"); ?></b>
								</td>
								<td class="auto-style1 active" bgcolor="#e6f2ff">
									 Addition/<br>(Deletion)
								</td>
								<td class="auto-style1 active" bgcolor="#e6f2ff">
									 As at <br><b><?php $date1=date_create("$sy"); echo date_format($date1,"d-m-Y"); ?></b>
								</td>
								<td class="auto-style1 warning" bgcolor="#ffffcc">
									As at <br><b><?php $date1=date_create("$p_sy"); echo date_format($date1,"d-m-Y"); ?></b>
								</td>
								<td class="auto-style1 warning" bgcolor="#ffffcc">
									For the Year <br><b><?php echo $p_y; ?>-<?php echo $y; ?></b>
								</td>
								<td class="auto-style1 warning" bgcolor="#ffffcc">
									As at <br><b><?php $date1=date_create("$sy"); echo date_format($date1,"d-m-Y"); ?></b>
								</td>
								<td class="auto-style1 success" bgcolor="#ccffcc">
									As at <br><b><?php $date1=date_create("$sy"); echo date_format($date1,"d-m-Y"); ?></b>
								</td>
								<td class="auto-style1">
									<b>RATE</b>
								</td>
							</tr>
								<?php 
// sending query
$sql = "SELECT `account_entry`.*, `accounts_head`.`account_head_name`, `vendor`.`vendor_name` FROM `account_entry`,`accounts_head`, `vendor` WHERE account_entry.account_head=accounts_head.account_head_id and account_entry.vendor_id=vendor.vendor_id GROUP BY account_head HAVING ac_cat_id = 10 ORDER BY date DESC";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){	
	
			$en_id = $row['entry_id'];
			$vdate = $row['date'];
			$vdes = $row['description'];
			$vname = $row['vendor_name'];
			$vmod = $row['ac_cat_id'];
			$vamu = $row['amount'];
			$vhead = $row['account_head_name'];
			$en_head = $row['account_head'];
?>
								<tr>
								<td>
									 <?php echo $vhead; ?>
								</td>
								<td class="auto-style2 active" bgcolor="#e6f2ff">
									 <?php echo tan_ass("$p_sy","$en_head"); ?>
								</td>
								<td class="auto-style2 active" bgcolor="#e6f2ff">
									 <?php echo tan_add("$p_sy","$sy","$en_head"); ?>
								</td>
								<td class="auto-style2 active" bgcolor="#e6f2ff">
									 <?php echo tan_ass("$sy","$en_head"); ?>
								</td>
								<td class="auto-style2 warning" bgcolor="#ffffcc">
									 <?php echo tan_ass_dep("$p_sy","$en_head"); ?>
								</td>
								<td class="auto-style2 warning" bgcolor="#ffffcc">
									 <?php echo tan_ass_dep_current("$p_sy","$sy","$en_head"); ?>
								</td>
								<td class="auto-style2 warning" bgcolor="#ffffcc">
									 <?php echo tan_ass_dep("$sy","$en_head"); ?>
								</td>
								<td class="auto-style1 success" bgcolor="#ccffcc">
									<?php echo tan_ass_tot("$sy","$en_head"); ?>
								</td>
								<td>
									
								</td>
							</tr>
						<?php 	
		}
	}	
?>
								<tr>
								<td>
									 <b>Total</b>
								</td>
								<td class="auto-style2 active" bgcolor="#e6f2ff">
									 <b><?php echo total_tan_ass("$p_sy"); ?></b>
								</td>
								<td class="auto-style2 active" bgcolor="#e6f2ff">
									 <b><?php echo total_tan_add("$p_sy","$sy"); ?></b>
								</td>
								<td class="auto-style2 active" bgcolor="#e6f2ff">
									 <b><?php echo total_tan_ass("$sy"); ?></b>
								</td>
								<td class="auto-style2 warning" bgcolor="#ffffcc">
									 <b><?php echo total_tan_ass_dep("$p_sy"); ?></b>
								</td>
								<td class="auto-style2 warning" bgcolor="#ffffcc">
									 <b><?php echo total_tan_ass_dep_current("$p_sy","$sy"); ?></b>
								</td>
								<td class="auto-style2 warning" bgcolor="#ffffcc">
									 <b><?php echo total_tan_ass_dep("$sy"); ?></b>
								</td>
								<td class="auto-style1 success" bgcolor="#ccffcc">
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
                        </div>
                    </div>
                    <!-- Table Row End -->
                    
                </div>
                <!-- App inner end -->
<?php echo $footer; ?>
<!-- Large modal start -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-throttle-debounce/1.1/jquery.ba-throttle-debounce.min.js"></script>
<div class="modal fade bd-example-modal-lg" id="notes-d" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        
        </div>
    </div>
</div>
<!-- Large modal end  -->
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