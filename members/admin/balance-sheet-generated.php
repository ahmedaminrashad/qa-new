<?php session_start(); ?>
  <?php
  include("../includes/session1.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("../includes/notifications.php");
  include("header.php");
  if ($right != 4)
  {
  header('Location: admin-home');
  }
    $sy =$_REQUEST['date_id2'];
    $date=date_create($sy);
$showdate = date_format($date,"jS M Y");
function tot($y){
require ("../includes/dbconnection.php");
  $sql = "select sum(amount) from account_entry where (ac_cat_id = 2 OR ac_cat_id = 7 OR ac_cat_id = 8 OR ac_cat_id = 9 OR ac_cat_id = 1 OR ac_cat_id = 10 OR ac_cat_id = 11) AND date <= '$y'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$first = $row[0];
$sql = "select sum(amount) from account_entry where (ac_cat_id = 3 OR ac_cat_id = 4 OR ac_cat_id = 6) AND date <= '$y'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$second = $row[0];
$sql = "select sum(ad_amount) from adjusment_account where ac_cat_id = 5 AND date <= '$y'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$acc = $row[0];
$total = $second-$first-$acc;
echo number_format($total, 2);
}
function tan_ass($y){
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
$total = $first+$second-$third;
echo number_format($total, 2);
}
function intan_ass($y){
require ("../includes/dbconnection.php");
$sql = "select sum(amount) from account_entry where ac_cat_id = 1 AND date <= '$y'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$first = $row[0];
$sql = "select sum(tax) from account_entry where ac_cat_id = 1 AND date <= '$y'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$second = $row[0];
$sql = "select sum(ad_amount) from adjusment_account where ac_cat_id = 1 AND date <= '$y'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$third = $row[0];
$total = $first+$second-$third;
echo number_format($total, 2);
}
function tot_ass($y){
require ("../includes/dbconnection.php");
$sql = "select sum(amount) from account_entry where (ac_cat_id = 10 OR ac_cat_id = 1) AND date <= '$y'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$first = $row[0];
$sql = "select sum(ad_amount) from adjusment_account where (ac_cat_id = 10 OR ac_cat_id = 1) AND date <= '$y'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$second = $row[0];
$sql = "select sum(tax) from account_entry where (ac_cat_id = 10 OR ac_cat_id = 1) AND date <= '$y'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$third = $row[0];
$total = $first+$third-$second;
echo number_format($total, 2);
}
function advances($y){
require ("../includes/dbconnection.php");
$sql = "select sum(amount) from account_entry where ac_cat_id = 2 AND date <= '$y'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$second = $row[0];
$sql = "select sum(ad_amount) from adjusment_account where ac_cat_id = 2 AND date <= '$y'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$third = $row[0];
$total = $second-$third;
echo number_format($total, 2);
}
function tot_n_ass($y){
require ("../includes/dbconnection.php");
  $sql = "select sum(amount) from account_entry where (ac_cat_id = 7 OR ac_cat_id = 8 OR ac_cat_id = 9 OR ac_cat_id = 1 OR ac_cat_id = 10 OR ac_cat_id = 11) AND date <= '$y'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$first = $row[0];
$sql = "select sum(amount) from account_entry where (ac_cat_id = 3 OR ac_cat_id = 4 OR ac_cat_id = 6) AND date <= '$y'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$second = $row[0];
$sql = "select sum(ad_amount) from adjusment_account where ac_cat_id = 2 AND date <= '$y'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$third = $row[0];
$total = $second-$first-$third;
echo number_format($total, 2);
}
function long_loan($y){
require ("../includes/dbconnection.php");
$sql = "select sum(amount) from account_entry where ac_cat_id = 4 AND date <= '$y'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$second = $row[0];
echo number_format($second, 2);
}
function accrued($y){
require ("../includes/dbconnection.php");
$sql = "select sum(amount) from account_entry where ac_cat_id = 5 AND date <= '$y'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$second = $row[0];
//Total Adjustment of accrued(5)
$sql = "select sum(ad_amount) from adjusment_account where ac_cat_id = 5 AND date <= '$y'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$accrued_adj = $row[0];
$total = $second-$accrued_adj;
echo number_format($total, 2);
}
function total_assests($y){
require ("../includes/dbconnection.php");
  $sql = "select sum(amount) from account_entry where (ac_cat_id = 7 OR ac_cat_id = 8 OR ac_cat_id = 9 OR ac_cat_id = 1 OR ac_cat_id = 10 OR ac_cat_id = 11) AND date <= '$y'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$first = $row[0];
$sql = "select sum(amount) from account_entry where (ac_cat_id = 3 OR ac_cat_id = 4 OR ac_cat_id = 6 OR ac_cat_id = 10 OR ac_cat_id = 1) AND date <= '$y'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$second = $row[0];
$sql = "select sum(ad_amount) from adjusment_account where (ac_cat_id = 2 OR ac_cat_id = 5 OR ac_cat_id = 10 OR ac_cat_id = 1) AND date <= '$y'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$third = $row[0];
$sql = "select sum(tax) from account_entry where (ac_cat_id = 10 OR ac_cat_id = 1) AND date <= '$y'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$tax = $row[0];
$total = $second-$first-$third+$tax;
echo number_format($total, 2);
}
function pot($y){
require ("../includes/dbconnection.php");
$sql = "select sum(amount) from account_entry where ac_cat_id = 11 AND date <= '$y'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$first = $row[0];
$sql = "select sum(tax) from account_entry where date <= '$y'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$second = $row[0];
$total = $second-$first;
echo number_format($total, 2);
}
function total_laibility($y){
require ("../includes/dbconnection.php");
  $sql = "select sum(amount) from account_entry where (ac_cat_id = 4 OR ac_cat_id = 5) AND date <= '$y'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$first1 = $row[0];
$sql = "select sum(amount) from account_entry where ac_cat_id = 11 AND date <= '$y'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$first = $row[0];
$sql = "select sum(tax) from account_entry where date <= '$y'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$second = $row[0];
$total = $second-$first+$first1;
echo number_format($total, 2);
}
function equity(){
require ("../includes/dbconnection.php");
 $sql = "select sum(share_value) from equity";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$first = $row[0];
$sql = "select sum(nos) from equity";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$second = $row[0];
$total = $second*$first;
echo number_format($total, 2);
}
function all_laibility($y){
require ("../includes/dbconnection.php");
  $sql = "select sum(amount) from account_entry where (ac_cat_id = 4 OR ac_cat_id = 5) AND date <= '$y'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$first1 = $row[0];
$sql = "select sum(amount) from account_entry where ac_cat_id = 11 AND date <= '$y'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$first = $row[0];
$sql = "select sum(tax) from account_entry where date <= '$y'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$second = $row[0];
$subtotal1 = $second-$first+$first1;
$sql = "select sum(share_value) from equity";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$firste = $row[0];
$sql = "select sum(nos) from equity";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$seconde = $row[0];
$subtotal2 = $seconde*$firste;
$gtotal = $subtotal2+$subtotal1;
echo number_format($gtotal, 2);
}
function p_boy_bal($y){
require ("../includes/dbconnection.php");
//Total COST OF SERVICES(7) and ADMINISTRATIVE & GENERAL EXPENSES(8) and Accrued Expense
$sql = "select sum(amount) from account_entry where (ac_cat_id = 7 OR ac_cat_id = 8 OR ac_cat_id = 5 OR ac_cat_id = 9) AND date <= '$y'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$cost = $row[0];
//Total Adjustment of advance
$sql = "select sum(ad_amount) from adjusment_account where date <= '$y'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$advance_adj_teach = $row[0];
//Total income from CASH AND BANK(3) BALANCES and INCOME(6)
$sql = "select sum(amount) from account_entry where (ac_cat_id = 3 OR ac_cat_id = 6) AND date <= '$y'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$income = $row[0];
//tax
$sql = "select sum(tax) from account_entry where date <= '$y'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$tax = $row[0];
$total = $income-$cost-$advance_adj_teach-$tax;
echo number_format($total, 2);
}
function tot_eqi($y){
require ("../includes/dbconnection.php");
$sql = "select sum(amount) from account_entry where (ac_cat_id = 3 OR ac_cat_id = 6) AND date <= '$y'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$first = $row[0];
$sql = "select sum(ad_amount) from adjusment_account where date <= '$y'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$second = $row[0];
$sql = "select sum(amount) from account_entry where (ac_cat_id = 7 OR ac_cat_id = 9 OR ac_cat_id = 8) AND date <= '$y'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$third = $row[0];
$total = $first-$second-$third;
$sql = "select sum(tax) from account_entry where date <= '$y'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$second3 = $row[0];
$final_profit = $total-$second3;
$sql = "select sum(share_value) from equity";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$first4 = $row[0];
$sql = "select sum(nos) from equity";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$second4 = $row[0];
$total4 = $second4*$first4;
$final4_total = $total4+$final_profit;
echo number_format($final4_total, 2);
}
?>
<?php
$page_title = 'Balance Sheet';
$page_subtitle = 'Balance Sheet Details Till '.$showdate.'';
$table_name = 'Balance Sheet';
?>
<?php echo $main_header; ?>
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
                                <div class="card-body"><h5 class="card-title"><?php echo $page_subtitle; ?></h5>
									<h4>
									<font color="#44B6AE"> <b>ASSETS</b></font>
									</h4><br>
									<h5>
									<font color="#44B6AE"> <b>NON-CURRENT ASSETS</b></font>
									</h5>
									<div class="table-responsive">
                                        <table class="align-middle mb-0 table table-striped table-hover">
								<tbody>
								<tr>
								<td>Tangible assets:</td>
								<td><?php echo tan_ass("$sy"); ?></td>
								</tr>
								<tr>
								<td>Intangible assets:</td>
								<td><?php echo intan_ass("$sy"); ?></td>
								</tr>
								<tr>
								<td><b>TOTAL NON-CURRENT ASSETS:</b></td>
								<td><b><?php echo tot_ass("$sy"); ?></b></td>
								</tr>
								<tr><td>
								<h5>
									<font color="#44B6AE"> <b>CURRENT ASSETS</b></font>
									</h5>
								</td><td></td></tr>
								<tr>
								<td>Advances, Deposits &amp; Prepayments:</td>
								<td><?php echo advances("$sy"); ?></td>
								</tr>
								<tr>
								<td>Cash &amp; Bank Balances:</td>
								<td><?php echo tot("$sy"); ?></td>
								</tr>
								<tr>
								<td><b>TOTAL CURRENT ASSETS:</b></td>
								<td><b><?php echo tot_n_ass("$sy"); ?></b></td>
								</tr>
								<tr bgcolor="#44B6AE">
								<td><b>TOTAL ASSETS:</b></td>
								<td><b><?php echo total_assests("$sy"); ?></b></td>
								</tr>
								<tr><td>								<h4>
									<font color="#44B6AE"> <b>EQUITY &amp; LIABILITIES</b></font>
									</h4><br>
									<h5>
									<font color="#44B6AE"> <b>SHARE CAPITAL &amp; RESERVES</b></font>
									</h5>
								</td><td></td></tr>								<tr>
								<td>Authorized capital (1,000 x 100 each):</td>
								<td><?php echo equity(); ?></td>
								</tr>
								<tr>
								<td>Issued, subscribed &amp; paid up capital (1,000 x 100 each):</td>
								<td><?php echo equity(); ?></td>
								</tr>
								<tr>
								<td>Surplus of income over expenses</td>
								<td>
								<?php echo p_boy_bal("$sy"); ?>
								</td>
								</tr>
								<tr>
								<td><b>TOTAL EQUITY:</b></td>
								<td><b><?php echo tot_eqi("$sy"); ?></b></td>
								</tr>
								<tr><td>								<h5>
									<font color="#44B6AE"> <b>NON-CURRENT LIABILITIES</b></font>
									</h5>
								</td><td></td></tr>								
								<tr>
								<td>Long Term Loan:</td>
								<td><?php echo long_loan("$sy"); ?></td>
								</tr>
								<tr>
								<td><b>TOTAL NON-CURRENT LIABILITIES:</b></td>
								<td><b><?php echo long_loan("$sy"); ?></b></td>
								</tr>
								<tr><td>								<h5>
									<font color="#44B6AE"> <b>CURRENT LIABILITIES</b></font>
									</h5>
								</td><td></td></tr>								<tr>
								<td>Accrued expenses:</td>
								<td><?php echo accrued("$sy"); ?></td>
								</tr>
								<tr>
								<td>Provision for Taxation:</td>
								<td><?php echo pot("$sy"); ?></td>
								</tr>
								<tr>
								<td><b>TOTAL CURRENT LIABILITIES:</b></td>
								<td><b><?php echo total_laibility("$sy"); ?></b></td>
								</tr>
								<tr bgcolor="#44B6AE">
								<td><b>TOTAL EQUITY &amp; LIABILITIES:</b></td>
								<td><b><?php echo all_laibility("$sy"); ?></b></td>
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