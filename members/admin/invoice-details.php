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
$date = date('d/m/Y', time());
?>
<?php
$m = date('n');
?>
<?php
$cid_id =$_REQUEST['cid'];
$cid_sig =$_REQUEST['sig'];
$sy = date('Y');
if($sy == "2014")
{
$y = 1;
}
elseif($sy == "2015")
{
$y = 2;
}
elseif($sy == "2016")
{
$y = 3;
}
elseif($sy == "2017")
{
$y = 4;
}
elseif($sy == "2018")
{
$y = 5;
}
elseif($sy == "2019")
{
$y = 6;
}
elseif($sy == "2020")
{
$y = 7;
}
elseif($sy == "2021")
{
$y = 8;
}
elseif($sy == "2022")
{
$y = 9;
}
elseif($sy == "2023")
{
$y = 10;
}
elseif($sy == "2024")
{
$y = 11;
}
elseif($sy == "2025")
{
$y = 12;
}
$py=$y-1;
$py3=$y-2;
$py4=$y-3;
$py5=$y-4;
$py6=$y-5;
$psy = $sy-1;
?>
<?php
// Positive Adjustemnts
function allAdjP($m, $y, $c, $sign){
require ("../includes/dbconnection.php");
$sql = "select sum(invoice_add) from invoice WHERE mon_id = '$m' and y_id = '$y' and currency_id = '$c' and invoice_add >= '1'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$fee = $row[0];
if ($fee != 0){
echo '<a href="invoice-adjusted?mon='.$m.'&year='.$y.'&cur='.$c.'&currency_name='.$sign.'"><span class="font-green" title="Positive Adjustemnts">'.number_format($fee, 0).'</span></a>';
}
else {echo '--';}
}
// Balance of Adjustemnts
function allAdj($m, $y, $c, $sign){
require ("../includes/dbconnection.php");
$sql = "select sum(invoice_add) from invoice WHERE mon_id = '$m' and y_id = '$y' and currency_id = '$c'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$fee = $row[0];
if ($fee >= 1){
echo '<a href="invoice-adjusted?mon='.$m.'&year='.$y.'&cur='.$c.'&currency_name='.$sign.'"><span class="font-green" title="Balance of Adjustemnts">'.number_format($fee, 0).'</span></a>';
}
elseif ($fee < 0){
echo '<a href="invoice-adjusted?mon='.$m.'&year='.$y.'&cur='.$c.'&currency_name='.$sign.'"><span class="font-red" title="Balance of Adjustemnts">'.number_format($fee, 0).'</span></a>';
}
else {echo '--';}
}
// Negative Adjustemnts
function allAdjN($m, $y, $c, $sign){
require ("../includes/dbconnection.php");
$sql = "select sum(invoice_add) from invoice WHERE mon_id = '$m' and y_id = '$y' and currency_id = '$c' and invoice_add < '1'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$fee = $row[0];
if ($fee != 0){
echo '<a href="invoice-adjusted?mon='.$m.'&year='.$y.'&cur='.$c.'&currency_name='.$sign.'"><span class="font-red" title="Negative Adjustemnts">'.number_format($fee, 0).'</span></a>';
}
else {echo '--';}
}
// Total with adjustments
function allSend($m, $y, $c, $sign){
require ("../includes/dbconnection.php");
$sql = "select sum(fee+invoice_add) from invoice WHERE mon_id = '$m' and y_id = '$y' and currency_id = '$c'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$fee = $row[0];
if ($fee != 0){
echo '<span class="font-green" title="Actual Revenue After Recurring & Adjustments"><a href="888?mon='.$m.'&year='.$y.'&cur='.$c.'&currency_name='.$sign.'">'.number_format($fee, 0).'</span></a>';
}
else {echo '--';}
}

// Total Recieved
function recieved($m, $y, $c, $sign){
require ("../includes/dbconnection.php");
$sql = "select sum(fee+invoice_add) from invoice WHERE mon_id = '$m' and y_id = '$y' and currency_id = '$c' and invoice.status = '2'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$fee = $row[0];
if ($fee > 0){
echo '<span class="font-green" title="Total Received"><a href="invoice-received?mon='.$m.'&year='.$y.'&cur='.$c.'&currency_name='.$sign.'">'.number_format($fee, 0).'</span></a>';
}
else {
echo '--';
}
}
// Total Pending - dead wait
function pending($m, $y, $c, $sign){
require ("../includes/dbconnection.php");
$sql = "select sum(fee+invoice_add) from invoice WHERE mon_id = '$m' and y_id = '$y' and currency_id = '$c' and invoice.status = '1'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$fee = $row[0];
$sql = "select sum(invoice.fee+invoice.invoice_add) from invoice JOIN account ON account.parent_id = invoice.parent_id WHERE invoice.mon_id = '$m' and invoice.y_id = '$y' and invoice.currency_id = '$c' and invoice.status = '1' and account.dept_id = '1003'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$addfee = $row[0];
$finalFee = $fee-$addfee;
if ($finalFee > 0){
echo '<span class="font-red" title="Total Receivable">'.number_format($finalFee, 0).'</span>';
}
else {
echo '--';
}
}

// Dead Wait loss
function dead($m, $y, $c, $sign){
require ("../includes/dbconnection.php");
$sql = "select sum(invoice.fee+invoice.invoice_add) from invoice JOIN account ON account.parent_id = invoice.parent_id WHERE invoice.mon_id = '$m' and invoice.y_id = '$y' and invoice.currency_id = '$c' and invoice.status = '1' and account.dept_id = '1003'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$addfee = $row[0];
if ($addfee != 0){
echo '<span class="font-green" title="Deadweight loss">('.number_format($addfee, 0).')</span>';
}
else {
echo '--';
}
}

// Created Invoices with out Adjustments and Recurring
function CreatedInvoices($m, $y, $c, $sign){
require ("../includes/dbconnection.php");
$sql = "select sum(fee) from invoice WHERE mon_id = '$m' and y_id = '$y' and currency_id = '$c' AND fee NOT LIKE '%.00%'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$fee = $row[0];
$final = $fee;
if ($fee != 0){
echo '<span class="font-green" title="Created Invoices with out Adjustments and Recurring"><a href="888?mon='.$m.'&year='.$y.'&cur='.$c.'&currency_name='.$sign.'">'.number_format($final, 0).'</a></span>';
}
else { echo '--'; }
}
// Total Recurring Paid
function RecurringInvoices($m, $y, $c, $sign){
require ("../includes/dbconnection.php");
$sql = "select sum(fee) from invoice WHERE mon_id = '$m' and y_id = '$y' and currency_id = '$c' and fee LIKE '%.00%'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$fee = $row[0];
$final = $fee;
if ($final != 0){
echo '<span title="Total Recurring Paid"><a href="888?mon='.$m.'&year='.$y.'&cur='.$c.'&currency_name='.$sign.'">'.number_format($final, 0).'</a></span>';
}
else { echo '--'; }
}

// Total Difference
function dif($m, $y, $c, $sign){
require ("../includes/dbconnection.php");
$sql = "select sum(fee+invoice_add) from invoice WHERE mon_id = '$m' and y_id = '$y' and currency_id = '$c'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$fee = $row[0];
if ($m-1 < 1){
$p = 12;
$pt = $y-1;
}
else {
$p = $m-1;
$pt = $y;
}
$sql = "select sum(fee+invoice_add) from invoice WHERE mon_id = '$p' and y_id = '$pt' and currency_id = '$c'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$fee3 = $row[0];
$fee2 = $fee-$fee3;
if ($fee2 > 0){
echo '<i class="fa fa-caret-up font-green" title="'.number_format($fee2, 2).'"></i>';
}
elseif ($fee2 < 0){
echo '<i class="fa fa-caret-down font-red" title="'.number_format($fee2, 2).'"></i>';
}
else {
echo '';
}
}
$syyw = date('Y-m-d');
?>
<?php
$page_title = 'Invoice Details';
$page_subtitle = 'Invoice Details';
$table_name = 'Invoice Details';
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
                        <div class="mb-3 card">
                                        <div class="card-body">
                                            <ul class="tabs-animated-shadow tabs-animated nav">
                                                <li class="nav-item">
                                                    <a role="tab" class="nav-link" href="invoice-details?cid=1&sig=$">
                                                        <span>USD</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a role="tab" class="nav-link" href="invoice-details?cid=2&sig=&#163;">
                                                        <span>GBP</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a role="tab" class="nav-link" href="invoice-details?cid=3&sig=AUD">
                                                        <span>AUD</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a role="tab" class="nav-link" href="invoice-details?cid=4&sig=EGP">
                                                        <span>EGP</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a role="tab" class="nav-link" href="invoice-details?cid=5&sig=CAD">
                                                        <span>CAD</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a role="tab" class="nav-link" href="invoice-details?cid=6&sig=EUR">
                                                        <span>EUR</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a role="tab" class="nav-link" href="invoice-details?cid=7&sig=NZD">
                                                        <span>NZD</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a role="tab" class="nav-link" href="invoice-details?cid=8&sig=AED">
                                                        <span>AED</span>
                                                    </a>
                                                </li>
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="tab-animated-0" role="tabpanel">
                                                    <p class="mb-0"><div class="table-responsive">
                                        <table class="align-middle mb-0 table table-striped table-hover">
<thead>
<tr class="uppercase center">
<th></th>
<th colspan="9"><i class="icon-bar-chart font-green-sharp"></i>
<span class="caption-helper">INVOICE DETAILS FOR THE YEAR</span> <span class="caption-subject font-green-sharp bold uppercase"><?php $sql = "SELECT * FROM school_yr WHERE year_id = $py";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){
$pidm = $row['school_year'];
}
}
echo $pidm ?> (<?php echo $cid_sig; ?>)</span></th>
<th></th>
<th colspan="9"><i class="icon-bar-chart font-green-sharp"></i>
<span class="caption-helper">INVOICE DETAILS FOR THE YEAR</span> <span class="caption-subject font-green-sharp bold uppercase"><?php $sql = "SELECT * FROM school_yr WHERE year_id = $y";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){
$pidm = $row['school_year'];
}
}
echo $pidm ?> (<?php echo $cid_sig; ?>)</span></th>
</tr>
<tr class="uppercase center">
<th>
Mo.
</th>
<th>
Created
</th>
<th>
RECU.
</th>
<th>
+ Adj
</th>
<th>
- Adj
</th>
<th>
<b>+/- Adj</b>
</th>
<th>
Rev
</th>
<th>
Rec
</th>
<th>
A/R
</th>
<th>
D.W.
</th>
<th>
    
</th>
<th>
    
</th>
<th>
Created
</th>
<th>
RECU.
</th>
<th>
+ Adj
</th>
<th>
- Adj
</th>
<th>
<b>+/- Adj</b>
</th>
<th>
Rev
</th>
<th>
Rec
</th>
<th>
A/R
</th>
<th>
D.W.
</th>
<th>
    
</th>
</tr>
</thead>
<tbody>
<tr>
<td>Jan</td>
<td class="info"><?php echo CreatedInvoices("1", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="info"><?php echo RecurringInvoices("1", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="info"><?php echo allAdjP("1", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="info"><?php echo allAdjN("1", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="info"><?php echo allAdj("1", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="success"><?php echo dif("1", "$py", "$cid_id", "$cid_sig"); ?> <?php echo allSend("1", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="success"><?php echo recieved("1", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="danger"><?php echo pending("1", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="danger"><?php echo dead("1", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="danger"><a target="_blank" href="reminder-definer?mid=1&yid=<?php echo $py; ?>&month=Jan&year=<?php echo $psy; ?>&cid=<?php echo $cid_id; ?>&cids=<?php echo $cid_sig; ?>"><button class="mb-2 mr-2 btn btn-outline-danger">-</button></a></td>
<td></td>
<td class="info"><?php echo CreatedInvoices("1", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="info"><?php echo RecurringInvoices("1", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="info"><?php echo allAdjP("1", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="info"><?php echo allAdjN("1", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="info"><?php echo allAdj("1", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="success"><?php echo dif("1", "$y", "$cid_id", "$cid_sig"); ?> <?php echo allSend("1", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="success"><?php echo recieved("1", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="danger"><?php echo pending("1", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="danger"><?php echo dead("1", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="danger"><a target="_blank" href="reminder-definer?mid=1&yid=<?php echo $y; ?>&month=Jan&year=<?php echo $sy; ?>&cid=<?php echo $cid_id; ?>&cids=<?php echo $cid_sig; ?>"><button class="mb-2 mr-2 btn btn-outline-danger">-</button></a></td>
</tr>
<tr>
<td>Feb</td>
<td class="info"><?php echo CreatedInvoices("2", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="info"><?php echo RecurringInvoices("2", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="info"><?php echo allAdjP("2", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="info"><?php echo allAdjN("2", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="info"><?php echo allAdj("2", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="success"><?php echo dif("2", "$py", "$cid_id", "$cid_sig"); ?> <?php echo allSend("2", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="success"><?php echo recieved("2", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="danger"><?php echo pending("2", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="danger"><?php echo dead("2", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="danger"><a target="_blank" href="reminder-definer?mid=2&yid=<?php echo $py; ?>&month=Feb&year=<?php echo $psy; ?>&cid=<?php echo $cid_id; ?>&cids=<?php echo $cid_sig; ?>"><button class="mb-2 mr-2 btn btn-outline-danger">-</button></a></td>
<td></td>
<td class="info"><?php echo CreatedInvoices("2", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="info"><?php echo RecurringInvoices("2", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="info"><?php echo allAdjP("2", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="info"><?php echo allAdjN("2", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="info"><?php echo allAdj("2", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="success"><?php echo dif("2", "$y", "$cid_id", "$cid_sig"); ?> <?php echo allSend("2", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="success"><?php echo recieved("2", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="danger"><?php echo pending("2", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="danger"><?php echo dead("2", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="danger"><a target="_blank" href="reminder-definer?mid=2&yid=<?php echo $y; ?>&month=Feb&year=<?php echo $sy; ?>&cid=<?php echo $cid_id; ?>&cids=<?php echo $cid_sig; ?>"><button class="mb-2 mr-2 btn btn-outline-danger">-</button></a></td>
</tr>
<tr>
<td>Mar</td>
<td class="info"><?php echo CreatedInvoices("3", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="info"><?php echo RecurringInvoices("3", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="info"><?php echo allAdjP("3", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="info"><?php echo allAdjN("3", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="info"><?php echo allAdj("3", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="success"><?php echo dif("3", "$py", "$cid_id", "$cid_sig"); ?> <?php echo allSend("3", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="success"><?php echo recieved("3", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="danger"><?php echo pending("3", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="danger"><?php echo dead("3", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="danger"><a target="_blank" href="reminder-definer?mid=3&yid=<?php echo $py; ?>&month=Mar&year=<?php echo $psy; ?>&cid=<?php echo $cid_id; ?>&cids=<?php echo $cid_sig; ?>"><button class="mb-2 mr-2 btn btn-outline-danger">-</button></a></td>
<td></td>
<td class="info"><?php echo CreatedInvoices("3", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="info"><?php echo RecurringInvoices("3", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="info"><?php echo allAdjP("3", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="info"><?php echo allAdjN("3", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="info"><?php echo allAdj("3", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="success"><?php echo dif("3", "$y", "$cid_id", "$cid_sig"); ?> <?php echo allSend("3", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="success"><?php echo recieved("3", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="danger"><?php echo pending("3", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="danger"><?php echo dead("3", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="danger"><a target="_blank" href="reminder-definer?mid=3&yid=<?php echo $y; ?>&month=Mar&year=<?php echo $sy; ?>&cid=<?php echo $cid_id; ?>&cids=<?php echo $cid_sig; ?>"><button class="mb-2 mr-2 btn btn-outline-danger">-</button></a></td>
</tr>
<tr>
<td>Apr</td>
<td class="info"><?php echo CreatedInvoices("4", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="info"><?php echo RecurringInvoices("4", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="info"><?php echo allAdjP("4", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="info"><?php echo allAdjN("4", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="info"><?php echo allAdj("4", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="success"><?php echo dif("4", "$py", "$cid_id", "$cid_sig"); ?> <?php echo allSend("4", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="success"><?php echo recieved("4", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="danger"><?php echo pending("4", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="danger"><?php echo dead("4", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="danger"><a target="_blank" href="reminder-definer?mid=4&yid=<?php echo $py; ?>&month=Apr&year=<?php echo $psy; ?>&cid=<?php echo $cid_id; ?>&cids=<?php echo $cid_sig; ?>"><button class="mb-2 mr-2 btn btn-outline-danger">-</button></a></td>
<td></td>
<td class="info"><?php echo CreatedInvoices("4", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="info"><?php echo RecurringInvoices("4", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="info"><?php echo allAdjP("4", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="info"><?php echo allAdjN("4", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="info"><?php echo allAdj("4", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="success"><?php echo dif("4", "$y", "$cid_id", "$cid_sig"); ?> <?php echo allSend("4", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="success"><?php echo recieved("4", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="danger"><?php echo pending("4", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="danger"><?php echo dead("4", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="danger"><a target="_blank" href="reminder-definer?mid=4&yid=<?php echo $y; ?>&month=Apr&year=<?php echo $sy; ?>&cid=<?php echo $cid_id; ?>&cids=<?php echo $cid_sig; ?>"><button class="mb-2 mr-2 btn btn-outline-danger">-</button></a></td>
</tr>
<tr>
<td>May</td>
<td class="info"><?php echo CreatedInvoices("5", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="info"><?php echo RecurringInvoices("5", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="info"><?php echo allAdjP("5", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="info"><?php echo allAdjN("5", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="info"><?php echo allAdj("5", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="success"><?php echo dif("5", "$py", "$cid_id", "$cid_sig"); ?> <?php echo allSend("5", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="success"><?php echo recieved("5", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="danger"><?php echo pending("5", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="danger"><?php echo dead("5", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="danger"><a target="_blank" href="reminder-definer?mid=5&yid=<?php echo $py; ?>&month=May&year=<?php echo $psy; ?>&cid=<?php echo $cid_id; ?>&cids=<?php echo $cid_sig; ?>"><button class="mb-2 mr-2 btn btn-outline-danger">-</button></a></td>
<td></td>
<td class="info"><?php echo CreatedInvoices("5", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="info"><?php echo RecurringInvoices("5", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="info"><?php echo allAdjP("5", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="info"><?php echo allAdjN("5", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="info"><?php echo allAdj("5", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="success"><?php echo dif("5", "$y", "$cid_id", "$cid_sig"); ?> <?php echo allSend("5", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="success"><?php echo recieved("5", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="danger"><?php echo pending("5", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="danger"><?php echo dead("5", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="danger"><a target="_blank" href="reminder-definer?mid=5&yid=<?php echo $y; ?>&month=May&year=<?php echo $sy; ?>&cid=<?php echo $cid_id; ?>&cids=<?php echo $cid_sig; ?>"><button class="mb-2 mr-2 btn btn-outline-danger">-</button></a></td>
</tr>
<tr>
<td>Jun</td>
<td class="info"><?php echo CreatedInvoices("6", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="info"><?php echo RecurringInvoices("6", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="info"><?php echo allAdjP("6", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="info"><?php echo allAdjN("6", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="info"><?php echo allAdj("6", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="success"><?php echo dif("6", "$py", "$cid_id", "$cid_sig"); ?> <?php echo allSend("6", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="success"><?php echo recieved("6", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="danger"><?php echo pending("6", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="danger"><?php echo dead("6", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="danger"><a target="_blank" href="reminder-definer?mid=6&yid=<?php echo $py; ?>&month=Jun&year=<?php echo $psy; ?>&cid=<?php echo $cid_id; ?>&cids=<?php echo $cid_sig; ?>"><button class="mb-2 mr-2 btn btn-outline-danger">-</button></a></td>
<td></td>
<td class="info"><?php echo CreatedInvoices("6", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="info"><?php echo RecurringInvoices("6", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="info"><?php echo allAdjP("6", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="info"><?php echo allAdjN("6", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="info"><?php echo allAdj("6", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="success"><?php echo dif("6", "$y", "$cid_id", "$cid_sig"); ?> <?php echo allSend("6", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="success"><?php echo recieved("6", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="danger"><?php echo pending("6", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="danger"><?php echo dead("6", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="danger"><a target="_blank" href="reminder-definer?mid=6&yid=<?php echo $y; ?>&month=Jun&year=<?php echo $sy; ?>&cid=<?php echo $cid_id; ?>&cids=<?php echo $cid_sig; ?>"><button class="mb-2 mr-2 btn btn-outline-danger">-</button></a></td>
</tr>
<tr>
<td>Jul</td>
<td class="info"><?php echo CreatedInvoices("7", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="info"><?php echo RecurringInvoices("7", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="info"><?php echo allAdjP("7", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="info"><?php echo allAdjN("7", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="info"><?php echo allAdj("7", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="success"><?php echo dif("7", "$py", "$cid_id", "$cid_sig"); ?> <?php echo allSend("7", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="success"><?php echo recieved("7", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="danger"><?php echo pending("7", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="danger"><?php echo dead("7", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="danger"><a target="_blank" href="reminder-definer?mid=7&yid=<?php echo $py; ?>&month=July&year=<?php echo $psy; ?>&cid=<?php echo $cid_id; ?>&cids=<?php echo $cid_sig; ?>"><button class="mb-2 mr-2 btn btn-outline-danger">-</button></a></td>
<td></td>
<td class="info"><?php echo CreatedInvoices("7", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="info"><?php echo RecurringInvoices("7", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="info"><?php echo allAdjP("7", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="info"><?php echo allAdjN("7", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="info"><?php echo allAdj("7", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="success"><?php echo dif("7", "$y", "$cid_id", "$cid_sig"); ?> <?php echo allSend("7", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="success"><?php echo recieved("7", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="danger"><?php echo pending("7", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="danger"><?php echo dead("7", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="danger"><a target="_blank" href="reminder-definer?mid=7&yid=<?php echo $y; ?>&month=July&year=<?php echo $sy; ?>&cid=<?php echo $cid_id; ?>&cids=<?php echo $cid_sig; ?>"><button class="mb-2 mr-2 btn btn-outline-danger">-</button></a></td>
</tr>
<tr>
<td>Aug</td>
<td class="info"><?php echo CreatedInvoices("8", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="info"><?php echo RecurringInvoices("8", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="info"><?php echo allAdjP("8", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="info"><?php echo allAdjN("8", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="info"><?php echo allAdj("8", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="success"><?php echo dif("8", "$py", "$cid_id", "$cid_sig"); ?> <?php echo allSend("8", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="success"><?php echo recieved("8", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="danger"><?php echo pending("8", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="danger"><?php echo dead("8", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="danger"><a target="_blank" href="reminder-definer?mid=8&yid=<?php echo $py; ?>&month=Aug&year=<?php echo $psy; ?>&cid=<?php echo $cid_id; ?>&cids=<?php echo $cid_sig; ?>"><button class="mb-2 mr-2 btn btn-outline-danger">-</button></a></td>
<td></td>
<td class="info"><?php echo CreatedInvoices("8", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="info"><?php echo RecurringInvoices("8", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="info"><?php echo allAdjP("8", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="info"><?php echo allAdjN("8", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="info"><?php echo allAdj("8", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="success"><?php echo dif("8", "$y", "$cid_id", "$cid_sig"); ?> <?php echo allSend("8", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="success"><?php echo recieved("8", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="danger"><?php echo pending("8", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="danger"><?php echo dead("8", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="danger"><a target="_blank" href="reminder-definer?mid=8&yid=<?php echo $y; ?>&month=Aug&year=<?php echo $sy; ?>&cid=<?php echo $cid_id; ?>&cids=<?php echo $cid_sig; ?>"><button class="mb-2 mr-2 btn btn-outline-danger">-</button></a></td>
</tr>
<tr>
<td>Sep</td>
<td class="info"><?php echo CreatedInvoices("9", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="info"><?php echo RecurringInvoices("9", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="info"><?php echo allAdjP("9", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="info"><?php echo allAdjN("9", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="info"><?php echo allAdj("9", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="success"><?php echo dif("9", "$py", "$cid_id", "$cid_sig"); ?> <?php echo allSend("9", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="success"><?php echo recieved("9", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="danger"><?php echo pending("9", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="danger"><?php echo dead("9", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="danger"><a target="_blank" href="reminder-definer?mid=9&yid=<?php echo $py; ?>&month=Sep&year=<?php echo $psy; ?>&cid=<?php echo $cid_id; ?>&cids=<?php echo $cid_sig; ?>"><button class="mb-2 mr-2 btn btn-outline-danger">-</button></a></td>
<td></td>
<td class="info"><?php echo CreatedInvoices("9", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="info"><?php echo RecurringInvoices("9", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="info"><?php echo allAdjP("9", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="info"><?php echo allAdjN("9", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="info"><?php echo allAdj("9", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="success"><?php echo dif("9", "$y", "$cid_id", "$cid_sig"); ?> <?php echo allSend("9", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="success"><?php echo recieved("9", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="danger"><?php echo pending("9", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="danger"><?php echo dead("9", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="danger"><a target="_blank" href="reminder-definer?mid=9&yid=<?php echo $y; ?>&month=Sep&year=<?php echo $sy; ?>&cid=<?php echo $cid_id; ?>&cids=<?php echo $cid_sig; ?>"><button class="mb-2 mr-2 btn btn-outline-danger">-</button></a></td>
</tr>
<tr>
<td>Oct</td>
<td class="info"><?php echo CreatedInvoices("10", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="info"><?php echo RecurringInvoices("10", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="info"><?php echo allAdjP("10", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="info"><?php echo allAdjN("10", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="info"><?php echo allAdj("10", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="success"><?php echo dif("10", "$py", "$cid_id", "$cid_sig"); ?> <?php echo allSend("10", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="success"><?php echo recieved("10", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="danger"><?php echo pending("10", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="danger"><?php echo dead("10", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="danger"><a target="_blank" href="reminder-definer?mid=10&yid=<?php echo $py; ?>&month=Oct&year=<?php echo $psy; ?>&cid=<?php echo $cid_id; ?>&cids=<?php echo $cid_sig; ?>"><button class="mb-2 mr-2 btn btn-outline-danger">-</button></a></td>
<td></td>
<td class="info"><?php echo CreatedInvoices("10", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="info"><?php echo RecurringInvoices("10", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="info"><?php echo allAdjP("10", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="info"><?php echo allAdjN("10", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="info"><?php echo allAdj("10", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="success"><?php echo dif("10", "$y", "$cid_id", "$cid_sig"); ?> <?php echo allSend("10", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="success"><?php echo recieved("10", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="danger"><?php echo pending("10", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="danger"><?php echo dead("10", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="danger"><a target="_blank" href="reminder-definer?mid=10&yid=<?php echo $y; ?>&month=Oct&year=<?php echo $sy; ?>&cid=<?php echo $cid_id; ?>&cids=<?php echo $cid_sig; ?>"><button class="mb-2 mr-2 btn btn-outline-danger">-</button></a></td>
</tr>
<tr>
<td>Nov</td>
<td class="info"><?php echo CreatedInvoices("11", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="info"><?php echo RecurringInvoices("11", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="info"><?php echo allAdjP("11", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="info"><?php echo allAdjN("11", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="info"><?php echo allAdj("11", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="success"><?php echo dif("11", "$py", "$cid_id", "$cid_sig"); ?> <?php echo allSend("11", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="success"><?php echo recieved("11", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="danger"><?php echo pending("11", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="danger"><?php echo dead("11", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="danger"><a target="_blank" href="reminder-definer?mid=11&yid=<?php echo $py; ?>&month=Nov&year=<?php echo $psy; ?>&cid=<?php echo $cid_id; ?>&cids=<?php echo $cid_sig; ?>"><button class="mb-2 mr-2 btn btn-outline-danger">-</button></a></td>
<td></td>
<td class="info"><?php echo CreatedInvoices("11", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="info"><?php echo RecurringInvoices("11", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="info"><?php echo allAdjP("11", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="info"><?php echo allAdjN("11", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="info"><?php echo allAdj("11", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="success"><?php echo dif("11", "$y", "$cid_id", "$cid_sig"); ?> <?php echo allSend("11", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="success"><?php echo recieved("11", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="danger"><?php echo pending("11", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="danger"><?php echo dead("11", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="danger"><a target="_blank" href="reminder-definer?mid=11&yid=<?php echo $y; ?>&month=Nov&year=<?php echo $sy; ?>&cid=<?php echo $cid_id; ?>&cids=<?php echo $cid_sig; ?>"><button class="mb-2 mr-2 btn btn-outline-danger">-</button></a></td>
</tr>
<tr>
<td>Dec</td>
<td class="info"><?php echo CreatedInvoices("12", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="info"><?php echo RecurringInvoices("12", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="info"><?php echo allAdjP("12", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="info"><?php echo allAdjN("12", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="info"><?php echo allAdj("12", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="success"><?php echo dif("12", "$py", "$cid_id", "$cid_sig"); ?> <?php echo allSend("12", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="success"><?php echo recieved("12", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="danger"><?php echo pending("12", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="danger"><?php echo dead("12", "$py", "$cid_id", "$cid_sig"); ?></td>
<td class="danger"><a target="_blank" href="reminder-definer?mid=12&yid=<?php echo $py; ?>&month=Dec&year=<?php echo $psy; ?>&cid=<?php echo $cid_id; ?>&cids=<?php echo $cid_sig; ?>"><button class="mb-2 mr-2 btn btn-outline-danger">-</button></a></td>
<td></td>
<td class="info"><?php echo CreatedInvoices("12", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="info"><?php echo RecurringInvoices("12", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="info"><?php echo allAdjP("12", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="info"><?php echo allAdjN("12", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="info"><?php echo allAdj("12", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="success"><?php echo dif("12", "$y", "$cid_id", "$cid_sig"); ?> <?php echo allSend("12", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="success"><?php echo recieved("12", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="danger"><?php echo pending("12", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="danger"><?php echo dead("12", "$y", "$cid_id", "$cid_sig"); ?></td>
<td class="danger"><a target="_blank" href="reminder-definer?mid=12&yid=<?php echo $y; ?>&month=Dec&year=<?php echo $sy; ?>&cid=<?php echo $cid_id; ?>&cids=<?php echo $cid_sig; ?>"><button class="mb-2 mr-2 btn btn-outline-danger">-</button></a></td>
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