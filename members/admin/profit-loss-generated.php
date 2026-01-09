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
  $d1 =$_REQUEST['date_id1'];
$d2 =$_REQUEST['date_id2'];
$date1=date_create($d1);
$showdate1 = date_format($date1,"jS M Y");
$date2=date_create($d2);
$showdate2 = date_format($date2,"jS M Y");
function net_income($d1, $d2){
require ("../includes/dbconnection.php");
//Total income from CASH AND BANK(3) BALANCES and INCOME(6)
$sql = "select sum(amount) from account_entry where (ac_cat_id = 3 OR ac_cat_id = 6) AND date >= '$d1' AND date <= '$d2'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$income = $row[0];
//Total Adjustment of accrued(5)
$sql = "select sum(ad_amount) from adjusment_account where ac_cat_id = 5 AND date >= '$d1' AND date <= '$d2'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$accrued_adj = $row[0];
// Total income - Accrued expence adjustment
$total = $income-$accrued_adj;
echo number_format($total, 2);
}
function cost_of_services($d1, $d2){
require ("../includes/dbconnection.php");
//Total COST OF SERVICES(7)
$sql = "select sum(amount) from account_entry where ac_cat_id = 7 AND date >= '$d1' AND date <= '$d2'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$cost = $row[0];
//Total Adjustment of advance where head is teaching staff(2, 35)
$sql = "select sum(ad_amount) from adjusment_account where ac_cat_id = 2 AND head_id = 35 AND date >= '$d1' AND date <= '$d2'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$advance_adj_teach = $row[0];
//Total Accrued Expense where head is teaching staff(5, 28)
$sql = "select sum(amount) from account_entry where ac_cat_id = 5 AND account_head = 28 AND date >= '$d1' AND date <= '$d2'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$accrued_adj_teach = $row[0];
//Total cost+advance_adj+accrued_ex
$total = $cost+$advance_adj_teach+$accrued_adj_teach;
echo number_format($total, 2);
}
function gross_profit($d1, $d2){
require ("../includes/dbconnection.php");
//Total COST OF SERVICES(7)
$sql = "select sum(amount) from account_entry where ac_cat_id = 7 AND date >= '$d1' AND date <= '$d2'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$cost = $row[0];
//Total Adjustment of advance where head is teaching staff(2, 35)
$sql = "select sum(ad_amount) from adjusment_account where ac_cat_id = 2 AND head_id = 35 AND date >= '$d1' AND date <= '$d2'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$advance_adj_teach = $row[0];
//Total Accrued Expense where head is teaching staff(5, 28)
$sql = "select sum(amount) from account_entry where ac_cat_id = 5 AND account_head = 28 AND date >= '$d1' AND date <= '$d2'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$accrued_adj_teach = $row[0];
//Total income from CASH AND BANK(3) BALANCES and INCOME(6)
$sql = "select sum(amount) from account_entry where (ac_cat_id = 3 OR ac_cat_id = 6) AND date >= '$d1' AND date <= '$d2'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$income = $row[0];
//Total Adjustment of accrued(5)
$sql = "select sum(ad_amount) from adjusment_account where ac_cat_id = 5 AND date >= '$d1' AND date <= '$d2'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$accrued_adj = $row[0];
$total = $income-$cost-$advance_adj_teach-$accrued_adj_teach-$accrued_adj;
echo number_format($total, 2);
}
function op_expense($d1, $d2){
require ("../includes/dbconnection.php");
//Total ADMINISTRATIVE & GENERAL EXPENSES(8)
$sql = "select sum(amount) from account_entry where ac_cat_id = 8 AND date >= '$d1' AND date <= '$d2'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$admin_ex = $row[0];
//Total Adjustment of Tangible and Intangible Assets(10, 1)
$sql = "select sum(ad_amount) from adjusment_account where (ac_cat_id = 1 OR ac_cat_id = 10) AND date >= '$d1' AND date <= '$d2'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$dep_amo_ex = $row[0];
//Total Adjustment of advance where head is admin staff(2, (36, 53))
$sql = "select sum(ad_amount) from adjusment_account where (head_id = 36 OR head_id = 53) AND ac_cat_id = 2 AND date >= '$d1' AND date <= '$d2'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$advance_adj_oth = $row[0];
//Total Accrued Expense where head is teaching staff(5, (29, 30, 54)
$sql = "select sum(amount) from account_entry where (account_head = 29 OR account_head = 30 OR account_head = 54) AND ac_cat_id = 5 AND date >= '$d1' AND date <= '$d2'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$accrued_adj_oth = $row[0];
$total = $admin_ex+$dep_amo_ex+$advance_adj_oth+$accrued_adj_oth;
echo number_format($total, 2);
}
function pbfc($d1, $d2){
require ("../includes/dbconnection.php");
//Total COST OF SERVICES(7) and ADMINISTRATIVE & GENERAL EXPENSES(8) and Accrued Expense
$sql = "select sum(amount) from account_entry where (ac_cat_id = 7 OR ac_cat_id = 8 OR ac_cat_id = 5) AND date >= '$d1' AND date <= '$d2'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$cost = $row[0];
//Total Adjustment of advance
$sql = "select sum(ad_amount) from adjusment_account where date >= '$d1' AND date <= '$d2'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$advance_adj_teach = $row[0];
//Total income from CASH AND BANK(3) BALANCES and INCOME(6)
$sql = "select sum(amount) from account_entry where (ac_cat_id = 3 OR ac_cat_id = 6) AND date >= '$d1' AND date <= '$d2'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$income = $row[0];
$total = $income-$cost-$advance_adj_teach;
echo number_format($total, 2);
}
function bank_charges($d1, $d2){
require ("../includes/dbconnection.php");
$sql = "select sum(amount) from account_entry where (ac_cat_id = 9) AND date >= '$d1' AND date <= '$d2'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$second = $row[0];
echo number_format($second, 2);
}
function pbt($d1, $d2){
require ("../includes/dbconnection.php");
//Total COST OF SERVICES(7) and ADMINISTRATIVE & GENERAL EXPENSES(8) and Accrued Expense
$sql = "select sum(amount) from account_entry where (ac_cat_id = 7 OR ac_cat_id = 8 OR ac_cat_id = 5 OR ac_cat_id = 9) AND date >= '$d1' AND date <= '$d2'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$cost = $row[0];
//Total Adjustment of advance
$sql = "select sum(ad_amount) from adjusment_account where date >= '$d1' AND date <= '$d2'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$advance_adj_teach = $row[0];
//Total income from CASH AND BANK(3) BALANCES and INCOME(6)
$sql = "select sum(amount) from account_entry where (ac_cat_id = 3 OR ac_cat_id = 6) AND date >= '$d1' AND date <= '$d2'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$income = $row[0];
$total = $income-$cost-$advance_adj_teach;
echo number_format($total, 2);
}
function pro_tax($d1, $d2){
require ("../includes/dbconnection.php");
$sql = "select sum(tax) from account_entry where date >= '$d1' AND date <= '$d2'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$second = $row[0];
echo number_format($second, 2);
}
function p_after_tax($d1, $d2){
//Total COST OF SERVICES(7) and ADMINISTRATIVE & GENERAL EXPENSES(8) and Accrued Expense
$sql = "select sum(amount) from account_entry where (ac_cat_id = 7 OR ac_cat_id = 8 OR ac_cat_id = 5 OR ac_cat_id = 9) AND date >= '$d1' AND date <= '$d2'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$cost = $row[0];
//Total Adjustment of advance
$sql = "select sum(ad_amount) from adjusment_account where date >= '$d1' AND date <= '$d2'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$advance_adj_teach = $row[0];
//Total income from CASH AND BANK(3) BALANCES and INCOME(6)
$sql = "select sum(amount) from account_entry where (ac_cat_id = 3 OR ac_cat_id = 6) AND date >= '$d1' AND date <= '$d2'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$income = $row[0];
//tax
$sql = "select sum(tax) from account_entry where date >= '$d1' AND date <= '$d2'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$tax = $row[0];
$total = $income-$cost-$advance_adj_teach-$tax;
echo number_format($total, 2);
}
function p_boy_fwd($d1){
require ("../includes/dbconnection.php");
//Total COST OF SERVICES(7) and ADMINISTRATIVE & GENERAL EXPENSES(8) and Accrued Expense
$sql = "select sum(amount) from account_entry where (ac_cat_id = 7 OR ac_cat_id = 8 OR ac_cat_id = 5 OR ac_cat_id = 9) AND date < '$d1'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$cost = $row[0];
//Total Adjustment of advance
$sql = "select sum(ad_amount) from adjusment_account where date < '$d1'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$advance_adj_teach = $row[0];
//Total income from CASH AND BANK(3) BALANCES and INCOME(6)
$sql = "select sum(amount) from account_entry where (ac_cat_id = 3 OR ac_cat_id = 6) AND date < '$d1'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$income = $row[0];
//tax
$sql = "select sum(tax) from account_entry where date < '$d1'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$tax = $row[0];
$total = $income-$cost-$advance_adj_teach-$tax;
echo number_format($total, 2);
}
function p_boy_bal($d1){
require ("../includes/dbconnection.php");
//Total COST OF SERVICES(7) and ADMINISTRATIVE & GENERAL EXPENSES(8) and Accrued Expense
$sql = "select sum(amount) from account_entry where (ac_cat_id = 7 OR ac_cat_id = 8 OR ac_cat_id = 5 OR ac_cat_id = 9) AND date <= '$d1'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$cost = $row[0];
//Total Adjustment of advance
$sql = "select sum(ad_amount) from adjusment_account where date <= '$d1'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$advance_adj_teach = $row[0];
//Total income from CASH AND BANK(3) BALANCES and INCOME(6)
$sql = "select sum(amount) from account_entry where (ac_cat_id = 3 OR ac_cat_id = 6) AND date <= '$d1'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$income = $row[0];
//tax
$sql = "select sum(tax) from account_entry where date <= '$d1'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$tax = $row[0];
$total = $income-$cost-$advance_adj_teach-$tax;
echo number_format($total, 2);
}
?>
<?php
$page_title = 'Profit and Loss';
$page_subtitle = 'Between '.$showdate1.' and '.$showdate2.'';
$table_name = 'Profit and Loss';
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
								<td><b><?php echo net_income("$d1","$d2"); ?></b></td>
								</tr>
								<tr>
								<td>Cost of Services</td>
								<td><?php echo cost_of_services("$d1","$d2"); ?></td>
								</tr>
								<tr>
								<td><b>Gross profit</b></td>
								<td><b><?php echo gross_profit("$d1","$d2"); ?></b></td>
								</tr>
								<tr>
								<td>Operating expenses</td>
								<td><?php echo op_expense("$d1","$d2"); ?></td>
								</tr>
								<tr>
								<td><b>Profit before financial charges</b></td>
								<td><b><?php echo pbfc("$d1","$d2"); ?></b></td>
								</tr>
								<tr>
								<td>Financial Charges</td>
								<td><?php echo bank_charges("$d1","$d2"); ?></td>
								</tr>
								<tr>
								<td><b>Profit before taxation</b></td>
								<td><b><?php echo pbt("$d1","$d2"); ?></b></td>
								</tr>
								<tr>
								<td>Provision for taxation</td>
								<td><?php echo pro_tax("$d1","$d2"); ?></td>
								</tr>
								<tr>
								<td><b>Profit after taxation</b></td>
								<td><b><?php echo p_after_tax("$d1","$d2"); ?></b></td>
								</tr>
								<tr>
								<td><b>Profit brought forward</b></td>
								<td><b><?php echo p_boy_fwd("$d1"); ?></b></td>
								</tr>
								<tr>
								<td><b>Profit carried to balance sheet</b></td>
								<td><b><?php echo p_boy_bal("$d2"); ?></b></td>
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