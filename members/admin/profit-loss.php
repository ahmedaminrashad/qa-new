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
function net_income($y){
require ("../includes/dbconnection.php");
$sql = "select sum(amount) from account_entry where (ac_cat_id = 3 OR ac_cat_id = 6) AND date <= '$y'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$second = $row[0];
echo number_format($second, 2);
}
function cost_of_services($y){
require ("../includes/dbconnection.php");
$sql = "select sum(amount) from account_entry where ac_cat_id = 7 AND date <= '$y'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$first = $row[0];
$sql = "select sum(ad_amount) from adjusment_account where (ac_cat_id = 2 OR ac_cat_id = 4) AND date <= '$y'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$second = $row[0];
$total = $first+$second;
echo number_format($total, 2);
}
function gross_profit($y){
require ("../includes/dbconnection.php");
$sql = "select sum(amount) from account_entry where (ac_cat_id = 3 OR ac_cat_id = 6) AND date <= '$y'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$first = $row[0];
$sql = "select sum(ad_amount) from adjusment_account where (ac_cat_id = 2 OR ac_cat_id = 4) AND date <= '$y'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$second = $row[0];
$sql = "select sum(amount) from account_entry where ac_cat_id = 7 AND date <= '$y'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$third = $row[0];
$total = $first-$second-$third;
echo number_format($total, 2);
}
function op_expense($y){
require ("../includes/dbconnection.php");
$sql = "select sum(amount) from account_entry where ac_cat_id = 8 AND date <= '$y'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$first = $row[0];
$sql = "select sum(ad_amount) from adjusment_account where (ac_cat_id = 1 OR ac_cat_id = 10) AND date <= '$y'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$second = $row[0];
$total = $first+$second;
echo number_format($total, 2);
}
function pbfc($y){
require ("../includes/dbconnection.php");
$sql = "select sum(amount) from account_entry where (ac_cat_id = 3 OR ac_cat_id = 6) AND date <= '$y'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$first = $row[0];
$sql = "select sum(ad_amount) from adjusment_account where date <= '$y'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$second = $row[0];
$sql = "select sum(amount) from account_entry where (ac_cat_id = 7 OR ac_cat_id = 8) AND date <= '$y'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$third = $row[0];
$total = $first-$second-$third;
echo number_format($total, 2);
}
function bank_charges($y){
require ("../includes/dbconnection.php");
$sql = "select sum(amount) from account_entry where ac_cat_id = 9 AND date <= '$y'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$second = $row[0];
echo number_format($second, 2);
}
function pbt($y){
require ("../includes/dbconnection.php");
$sql = "select sum(amount) from account_entry where (ac_cat_id = 3 OR ac_cat_id = 6) AND date <= '$y'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$first = $row[0];
$sql = "select sum(ad_amount) from adjusment_account where date <= '$y'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$second = $row[0];
$sql = "select sum(amount) from account_entry where (ac_cat_id = 7 OR ac_cat_id = 8 OR ac_cat_id = 9) AND date <= '$y'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$third = $row[0];
$total = $first-$second-$third;
echo number_format($total, 2);
}
function pro_tax($y){
require ("../includes/dbconnection.php");
$sql = "select sum(tax) from account_entry where date <= '$y'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$second = $row[0];
echo number_format($second, 2);
}
function p_after_tax($y){
require ("../includes/dbconnection.php");
$sql = "select sum(amount) from account_entry where (ac_cat_id = 3 OR ac_cat_id = 6) AND date <= '$y'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$first = $row[0];
$sql = "select sum(ad_amount) from adjusment_account where date <= '$y'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$second = $row[0];
$sql = "select sum(amount) from account_entry where (ac_cat_id = 7 OR ac_cat_id = 8 OR ac_cat_id = 9) AND date <= '$y'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$third = $row[0];
$total = $first-$second-$third;
$sql = "select sum(tax) from account_entry where date <= '$y'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$second3 = $row[0];
$final_profit = $total-$second3;
echo number_format($final_profit, 2);
}
?>
<?php echo $main_header; ?>
<?php
$sy = date('Y-m-d');
$date=date_create($sy);
$showdate = date_format($date,"jS M Y");
?>
<?php
$page_title = 'Profit and Loss';
$page_subtitle = 'Profit and Loss Till '.$showdate.'';
$table_name = 'Profit and Loss Till '.$showdate.'';
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
                                    <div class="table-responsive">
                                        <table class="align-middle mb-0 table table-striped table-hover">
								<tbody>
								<tr>
								<td><b>Net Income</b></td>
								<td><b><?php echo net_income("$sy"); ?></b></td>
								</tr>
								<tr>
								<td>Cost of Services</td>
								<td><?php echo cost_of_services("$sy"); ?></td>
								</tr>
								<tr>
								<td><b>Gross profit</b></td>
								<td><b><?php echo gross_profit("$sy"); ?></b></td>
								</tr>
								<tr>
								<td>Operating expenses</td>
								<td><?php echo op_expense("$sy"); ?></td>
								</tr>
								<tr>
								<td><b>Profit before financial charges</b></td>
								<td><b><?php echo pbfc("$sy"); ?></b></td>
								</tr>
								<tr>
								<td>Financial Charges</td>
								<td><?php echo bank_charges("$sy"); ?></td>
								</tr>
								<tr>
								<td><b>Profit before taxation</b></td>
								<td><b><?php echo pbt("$sy"); ?></b></td>
								</tr>
								<tr>
								<td>Provision for taxation</td>
								<td><?php echo pro_tax("$sy"); ?></td>
								</tr>
								<tr>
								<td><b>Profit after taxation</b></td>
								<td><b><?php echo p_after_tax("$sy"); ?></b></td>
								</tr>
								<tr>
								<td><b>Profit brought forward</b></td>
								<td><b><?php echo p_after_tax("$sy"); ?></b></td>
								</tr>
								<tr>
								<td><b>Profit carried to balance sheet</b></td>
								<td><b><?php echo p_after_tax("$sy"); ?></b></td>
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