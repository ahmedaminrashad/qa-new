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
  include("header-main.php");
date_default_timezone_set("Africa/Cairo");
$date = date('d/m/Y', time());
?>
<?php
date_default_timezone_set("Africa/Cairo");
$m = date('n');
?>
<?php
date_default_timezone_set("Africa/Cairo");
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
?>
<?php
// Total adjustments
function allAdj($m, $y, $c, $sign){
$sql = "select sum(invoice_add) from invoice WHERE mon_id = '$m' and y_id = '$y' and currency_id = '$c'";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$fee = $row[0];
if ($fee != 0){
echo '<a href="invoice-adjusted?mon='.$m.'&year='.$y.'&cur='.$c.'&currency_name='.$sign.'"><span class="font-red" title="Total Adjustments">('.number_format($fee, 0).')</span></a>';
}
else {echo '';}
}

// Total with adjustments
function allSend($m, $y, $c, $sign){
$sql = "select sum(fee+invoice_add) from invoice WHERE mon_id = '$m' and y_id = '$y' and currency_id = '$c'";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$fee = $row[0];
if ($fee != 0){
echo '<a href="888?mon='.$m.'&year='.$y.'&cur='.$c.'&currency_name='.$sign.'">'.$sign.' '.number_format($fee, 0).'</a>';
}
else {echo '--';}
}

// Total Recieved
function recieved($m, $y, $c, $sign){
$sql = "select sum(fee+invoice_add) from invoice WHERE mon_id = '$m' and y_id = '$y' and currency_id = '$c' and invoice.status = '2'";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$fee = $row[0];
if ($fee > 0){
echo '<a href="invoice-received?mon='.$m.'&year='.$y.'&cur='.$c.'&currency_name='.$sign.'">'.$sign.' '.number_format($fee, 0).'</a>';
}
else {
echo '--';
}
}
// Total Pending - dead wait
function pending($m, $y, $c, $sign){
$sql = "select sum(fee+invoice_add) from invoice WHERE mon_id = '$m' and y_id = '$y' and currency_id = '$c' and invoice.status = '1'";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$fee = $row[0];
$sql = "select sum(invoice.fee+invoice.invoice_add) from invoice JOIN account ON account.parent_id = invoice.parent_id WHERE invoice.mon_id = '$m' and invoice.y_id = '$y' and invoice.currency_id = '$c' and invoice.status = '1' and account.dept_id = '1003'";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$addfee = $row[0];
$finalFee = $fee-$addfee;
if ($finalFee > 0){
echo '<span class="font-red">'.$sign.' '.number_format($finalFee, 0).'</span>';
}
else {
echo '--';
}
}

// Dead Wait loss
function dead($m, $y, $c, $sign){
$sql = "select sum(invoice.fee+invoice.invoice_add) from invoice JOIN account ON account.parent_id = invoice.parent_id WHERE invoice.mon_id = '$m' and invoice.y_id = '$y' and invoice.currency_id = '$c' and invoice.status = '1' and account.dept_id = '1003'";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$addfee = $row[0];
if ($addfee != 0){
echo '<span class="font-blue">('.number_format($addfee, 0).')</span>';
}
else {
echo '';
}
}

// Total With out Recurring
function allInvoices($m, $y, $c, $sign){
$cm = date('n');
$sql = "select sum(invoice.fee+invoice.invoice_add) from invoice JOIN account ON account.parent_id = invoice.parent_id WHERE invoice.mon_id = '$m' and invoice.y_id = '$y' and invoice.currency_id = '$c' and account.invoice_type = '2'";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$addfee = $row[0];
$sql = "select sum(fee) from invoice WHERE mon_id = '$m' and y_id = '$y' and currency_id = '$c'";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$fee = $row[0];
$final = $fee-$addfee;
if ($m == $cm && $fee != 0){
echo '<span title="Monthly Invoices Sent"><a href="888?mon='.$m.'&year='.$y.'&cur='.$c.'&currency_name='.$sign.'">'.number_format($final, 0).'</a></span> <span class="font-green" title="Recurring Occurred Until Now">('.number_format($addfee, 0).')</span>';
}
elseif ($m != $cm && $fee != 0) { echo '<span title="Monthly Invoices Sent"><a href="888?mon='.$m.'&year='.$y.'&cur='.$c.'&currency_name='.$sign.'">'.number_format($fee, 0).'</a></span>'; }
else { echo ''; }
}

function allInvoices2($m, $y, $c, $sign){
$sql = "select sum(fee) from invoice WHERE mon_id = '$m' and y_id = '$y' and currency_id = '$c'";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$fee = $row[0];
$final = $fee;

echo '<span title="Monthly Invoices Sent"><a href="888?mon='.$m.'&year='.$y.'&cur='.$c.'&currency_name='.$sign.'">'.number_format($final, 0).'</a></span>';
}

// Total Difference
function dif($m, $y, $c, $sign){
$sql = "select sum(fee+invoice_add) from invoice WHERE mon_id = '$m' and y_id = '$y' and currency_id = '$c'";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
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
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$fee3 = $row[0];
$fee2 = $fee-$fee3;
if ($fee2 > 0){
echo '<i class="fa fa-caret-up font-green" title="'.$sign.' '.number_format($fee2, 2).'"></i>';
}
elseif ($fee2 < 0){
echo '<i class="fa fa-caret-down font-red" title="'.$sign.' '.number_format($fee2, 2).'"></i>';
}
else {
echo '';
}
}
date_default_timezone_set("Africa/Cairo");
$syyw = date('Y-m-d');
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
				<h1>Invoice Details<small> <?php $result = mysql_query("SELECT * FROM school_yr WHERE year_id = $y");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
$pidm = MYSQL_RESULT($result,$i,"school_year");
echo $pidm;?></small></h1>
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
					 Invoice Records<i class="fa fa-circle"></i>
				</li>
				<li class="active">
					 <strong>Current Expected Revenue = <?php
$sql = "select sum(fee) from account WHERE active = 1 and currency_id = 1";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$fee = $row[0];
$sql = "select sum(invoice_add) from account WHERE active = 1 and currency_id = 1";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$addfee = $row[0];
$finalFee = $fee+$addfee;
echo '$ ' .number_format($finalFee, 2);
?>.00 - <?php
$sql = "select sum(fee) from account WHERE active = 1 and currency_id = 2";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$fee = $row[0];
$sql = "select sum(invoice_add) from account WHERE active = 1 and currency_id = 2";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$addfee = $row[0];
$finalFee = $fee+$addfee;
echo 'GBP ' .number_format($finalFee, 2);
?>.00 - <?php
$sql = "select sum(fee) from account WHERE active = 1 and currency_id = 3";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$fee = $row[0];
$sql = "select sum(invoice_add) from account WHERE active = 1 and currency_id = 3";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$addfee = $row[0];
$finalFee = $fee+$addfee;
echo 'AUD ' .number_format($finalFee, 2);
?>.00 - <?php
$sql = "select sum(fee) from account WHERE active = 1 and currency_id = 4";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$fee = $row[0];
$sql = "select sum(invoice_add) from account WHERE active = 1 and currency_id = 4";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$addfee = $row[0];
$finalFee = $fee+$addfee;
echo 'Rs ' .number_format($finalFee, 2);
?>.00</strong>
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN SAMPLE TABLE PORTLET-->
					<div class="row">
					<div class="tiles">
					<div class="tile bg-blue-hoki">
					<div class="tile-body">
						<i class="fa fa-money"></i>
					</div>
					<div class="tile-object">
						<div class="name">
							 USD
						</div>
						<div class="number">
							 <?php
$sql = "select sum(fee) from account where active = 1 and currency_id = 1";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
if($row[0] > 0) 
        {
            echo number_format($row[0], 2);
        }
    else
        {
            echo '--';
        }
?>
						</div>
					</div>
				</div>
					<div class="tile bg-green-haze">
					<div class="tile-body">
						<i class="fa fa-money"></i>
					</div>
					<div class="tile-object">
						<div class="name">
							 GBP
						</div>
						<div class="number">
							 <?php
$sql = "select sum(fee) from account where active = 1 and currency_id = 2";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
if($row[0] > 0) 
        {
            echo number_format($row[0], 2);
        }
    else
        {
            echo '--';
        }
?>
						</div>
					</div>
				</div>
				<div class="tile bg-red-intense">
					<div class="tile-body">
						<i class="fa fa-money"></i>
					</div>
					<div class="tile-object">
						<div class="name">
							 AUD
						</div>
						<div class="number">
							 <?php
$sql = "select sum(fee) from account where active = 1 and currency_id = 3";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
if($row[0] > 0) 
        {
            echo number_format($row[0], 2);
        }
    else
        {
            echo '--';
        }
?>
						</div>
					</div>
				</div>
				<div class="tile bg-yellow-crusta">
					<div class="tile-body">
						<i class="fa fa-money"></i>
					</div>
					<div class="tile-object">
						<div class="name">
							 EGP
						</div>
						<div class="number">
							 <?php
$sql = "select sum(fee) from account where active = 1 and currency_id = 4";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
if($row[0] > 0) 
        {
            echo number_format($row[0], 2);
        }
    else
        {
            echo '--';
        }
?>
						</div>
					</div>
				</div>
				<div class="tile bg-red">
					<div class="tile-body">
						<i class="fa fa-money"></i>
					</div>
					<div class="tile-object">
						<div class="name">
							 CAD
						</div>
						<div class="number">
							 <?php
$sql = "select sum(fee) from account where active = 1 and currency_id = 5";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
if($row[0] > 0) 
        {
            echo number_format($row[0], 2);
        }
    else
        {
            echo '--';
        }
?>
						</div>
					</div>
				</div>
				<div class="tile bg-blue-madison">
					<div class="tile-body">
						<i class="fa fa-money"></i>
					</div>
					<div class="tile-object">
						<div class="name">
							 EUR
						</div>
						<div class="number">
							 <?php
$sql = "select sum(fee) from account where active = 1 and currency_id = 6";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
if($row[0] > 0) 
        {
            echo number_format($row[0], 2);
        }
    else
        {
            echo '--';
        }
?>
						</div>
					</div>
				</div>
				<div class="tile bg-grey-cascade">
					<div class="tile-body">
						<i class="fa fa-money"></i>
					</div>
					<div class="tile-object">
						<div class="name">
							 NZD
						</div>
						<div class="number">
							 <?php
$sql = "select sum(fee) from account where active = 1 and currency_id = 7";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
if($row[0] > 0) 
        {
            echo number_format($row[0], 2);
        }
    else
        {
            echo '--';
        }
?>
						</div>
					</div>
				</div>
				<div class="tile bg-red-thunderbird">
					<div class="tile-body">
						<i class="fa fa-money"></i>
					</div>
					<div class="tile-object">
						<div class="name">
							 AED
						</div>
						<div class="number">
							 <?php
$sql = "select sum(fee) from account where active = 1 and currency_id = 8";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
if($row[0] > 0) 
        {
            echo number_format($row[0], 2);
        }
    else
        {
            echo '--';
        }
?>
						</div>
					</div>
				</div>
			</div></div></div>
			<div class="row">
				<div class="col-md-6">
					<!-- Begin: life time stats -->
					<div class="portlet light">
						<div class="portlet-title">
							<div class="caption">
								<i class="icon-bar-chart font-green-sharp"></i>
								<span class="caption-helper">INVOICE DETAILS FOR THE YEAR</span>
								<span class="caption-subject font-green-sharp bold uppercase"><?php $result = mysql_query("SELECT * FROM school_yr WHERE year_id = $y");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
$pidm = MYSQL_RESULT($result,$i,"school_year");
echo $pidm ?></span>
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="#portlet-config" data-toggle="modal" class="config">
								</a>
								<a href="javascript:;" class="reload">
								</a>
								<a href="javascript:;" class="remove">
								</a>
							</div>
						</div>
						<div class="portlet-body">
							<div class="tabbable-line">
								<ul class="nav nav-tabs">
									<li class="active">
										<a href="#overview_1" data-toggle="tab">
										USD </a>
									</li>
									<li>
										<a href="#overview_2" data-toggle="tab">
										GBP </a>
									</li>
									<li>
										<a href="#overview_3" data-toggle="tab">
										AUD </a>
									</li>
									<li>
										<a href="#overview_4" data-toggle="tab">
										EGP </a>
									</li>
									<li>
										<a href="#overview_5" data-toggle="tab">
										CAD </a>
									</li>
									<li>
										<a href="#overview_6" data-toggle="tab">
										EUR </a>
									</li>
									<li>
										<a href="#overview_7" data-toggle="tab">
										NZD </a>
									</li>
									<li>
										<a href="#overview_8" data-toggle="tab">
										AED </a>
									</li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane active" id="overview_1">
										<div class="table-responsive">
											<table class="table table-hover table-light">
											<thead>
											<tr class="uppercase">
												<th>
													 Month
												</th>
												<th>
													 Sent
												</th>
												<th>
													 Rec.
												</th>
												<th>
													Pen. 
												</th>
											</tr>
											</thead>
											<tbody>
											<tr>
												<td>Jan <?php echo allInvoices("1", "$y", "1", "$"); ?> <?php echo allAdj("1", "$y", "1", "$"); ?></td>
												<td><?php echo dif("1", "$y", "1", "$"); ?> <?php echo allSend("1", "$y", "1", "$"); ?></td>
												<td><?php echo recieved("1", "$y", "1", "$"); ?></td>
												<td><?php echo pending("1", "$y", "1", "$"); ?> <?php echo dead("1", "$y", "1", "$"); ?></td>
											</tr>
											<tr>
												<td>Feb <?php echo allInvoices("2", "$y", "1", "$"); ?> <?php echo allAdj("2", "$y", "1", "$"); ?></td>
												<td><?php echo dif("2", "$y", "1", "$"); ?> <?php echo allSend("2", "$y", "1", "$"); ?></td>
												<td><?php echo recieved("2", "$y", "1", "$"); ?></td>
												<td><?php echo pending("2", "$y", "1", "$"); ?> <?php echo dead("2", "$y", "1", "$"); ?></td>
											</tr>
											<tr>
												<td>Mar <?php echo allInvoices("3", "$y", "1", "$"); ?> <?php echo allAdj("3", "$y", "1", "$"); ?></td>
												<td><?php echo dif("3", "$y", "1", "$"); ?> <?php echo allSend("3", "$y", "1", "$"); ?></td>
												<td><?php echo recieved("3", "$y", "1", "$"); ?></td>
												<td><?php echo pending("3", "$y", "1", "$"); ?> <?php echo dead("3", "$y", "1", "$"); ?></td>
											</tr>
											<tr>
												<td>Apr <?php echo allInvoices("4", "$y", "1", "$"); ?> <?php echo allAdj("4", "$y", "1", "$"); ?></td>
												<td><?php echo dif("4", "$y", "1", "$"); ?> <?php echo allSend("4", "$y", "1", "$"); ?></td>
												<td><?php echo recieved("4", "$y", "1", "$"); ?></td>
												<td><?php echo pending("4", "$y", "1", "$"); ?> <?php echo dead("4", "$y", "1", "$"); ?></td>
											</tr>
											<tr>
												<td>May <?php echo allInvoices("5", "$y", "1", "$"); ?> <?php echo allAdj("5", "$y", "1", "$"); ?></td>
												<td><?php echo dif("5", "$y", "1", "$"); ?> <?php echo allSend("5", "$y", "1", "$"); ?></td>
												<td><?php echo recieved("5", "$y", "1", "$"); ?></td>
												<td><?php echo pending("5", "$y", "1", "$"); ?> <?php echo dead("5", "$y", "1", "$"); ?></td>
											</tr>
											<tr>
												<td>Jun <?php echo allInvoices("6", "$y", "1", "$"); ?> <?php echo allAdj("6", "$y", "1", "$"); ?></td>
												<td><?php echo dif("6", "$y", "1", "$"); ?> <?php echo allSend("6", "$y", "1", "$"); ?></td>
												<td><?php echo recieved("6", "$y", "1", "$"); ?></td>
												<td><?php echo pending("6", "$y", "1", "$"); ?> <?php echo dead("6", "$y", "1", "$"); ?></td>
											</tr>
											<tr>
												<td>Jul <?php echo allInvoices("7", "$y", "1", "$"); ?> <?php echo allAdj("7", "$y", "1", "$"); ?></td>
												<td><?php echo dif("7", "$y", "1", "$"); ?> <?php echo allSend("7", "$y", "1", "$"); ?></td>
												<td><?php echo recieved("7", "$y", "1", "$"); ?></td>
												<td><?php echo pending("7", "$y", "1", "$"); ?> <?php echo dead("7", "$y", "1", "$"); ?></td>
											</tr>
											<tr>
												<td>Aug <?php echo allInvoices("8", "$y", "1", "$"); ?> <?php echo allAdj("8", "$y", "1", "$"); ?></td>
												<td><?php echo dif("8", "$y", "1", "$"); ?> <?php echo allSend("8", "$y", "1", "$"); ?></td>
												<td><?php echo recieved("8", "$y", "1", "$"); ?></td>
												<td><?php echo pending("8", "$y", "1", "$"); ?> <?php echo dead("8", "$y", "1", "$"); ?></td>
											</tr>
											<tr>
												<td>Sep <?php echo allInvoices("9", "$y", "1", "$"); ?> <?php echo allAdj("9", "$y", "1", "$"); ?></td>
												<td><?php echo dif("9", "$y", "1", "$"); ?> <?php echo allSend("9", "$y", "1", "$"); ?></td>
												<td><?php echo recieved("9", "$y", "1", "$"); ?></td>
												<td><?php echo pending("9", "$y", "1", "$"); ?> <?php echo dead("9", "$y", "1", "$"); ?></td>
											</tr>
											<tr>
												<td>Oct <?php echo allInvoices("10", "$y", "1", "$"); ?> <?php echo allAdj("10", "$y", "1", "$"); ?></td>
												<td><?php echo dif("10", "$y", "1", "$"); ?> <?php echo allSend("10", "$y", "1", "$"); ?></td>
												<td><?php echo recieved("10", "$y", "1", "$"); ?></td>
												<td><?php echo pending("10", "$y", "1", "$"); ?> <?php echo dead("10", "$y", "1", "$"); ?></td>
											</tr>
											<tr>
												<td>Nov <?php echo allInvoices("11", "$y", "1", "$"); ?> <?php echo allAdj("11", "$y", "1", "$"); ?></td>
												<td><?php echo dif("11", "$y", "1", "$"); ?> <?php echo allSend("11", "$y", "1", "$"); ?></td>
												<td><?php echo recieved("11", "$y", "1", "$"); ?></td>
												<td><?php echo pending("11", "$y", "1", "$"); ?> <?php echo dead("11", "$y", "1", "$"); ?></td>
											</tr>
											<tr>
												<td>Dec <?php echo allInvoices("12", "$y", "1", "$"); ?> <?php echo allAdj("12", "$y", "1", "$"); ?></td>
												<td><?php echo dif("12", "$y", "1", "$"); ?> <?php echo allSend("12", "$y", "1", "$"); ?></td>
												<td><?php echo recieved("12", "$y", "1", "$"); ?></td>
												<td><?php echo pending("12", "$y", "1", "$"); ?> <?php echo dead("12", "$y", "1", "$"); ?></td>
											</tr>
											</tbody>
											</table>
										</div>
									</div>
									<div class="tab-pane" id="overview_2">
										<div class="table-responsive">
											<table class="table table-hover table-light">
											<thead>
											<tr class="uppercase">
												<th>
													 Month
												</th>
												<th>
													 Sent
												</th>
												<th>
													 Rec.
												</th>
												<th>
													Pen. 
												</th>
											</tr>
											</thead>
											<tbody>
											<tr>
												<td>Jan <?php echo allInvoices("1", "$y", "2", "&pound;"); ?> <?php echo allAdj("1", "$y", "2", "&pound;"); ?></td>
												<td><?php echo dif("1", "$y", "2", "&pound;"); ?> <?php echo allSend("1", "$y", "2", "&pound;"); ?></td>
												<td><?php echo recieved("1", "$y", "2", "&pound;"); ?></td>
												<td><?php echo pending("1", "$y", "2", "&pound;"); ?> <?php echo dead("1", "$y", "2", "&pound;"); ?></td>
											</tr>
											<tr>
												<td>Feb <?php echo allInvoices("2", "$y", "2", "&pound;"); ?> <?php echo allAdj("2", "$y", "2", "&pound;"); ?></td>
												<td><?php echo dif("2", "$y", "2", "&pound;"); ?> <?php echo allSend("2", "$y", "2", "&pound;"); ?></td>
												<td><?php echo recieved("2", "$y", "2", "&pound;"); ?></td>
												<td><?php echo pending("2", "$y", "2", "&pound;"); ?> <?php echo dead("2", "$y", "2", "&pound;"); ?></td>
											</tr>
											<tr>
												<td>Mar <?php echo allInvoices("3", "$y", "2", "&pound;"); ?> <?php echo allAdj("3", "$y", "2", "&pound;"); ?></td>
												<td><?php echo dif("3", "$y", "2", "&pound;"); ?> <?php echo allSend("3", "$y", "2", "&pound;"); ?></td>
												<td><?php echo recieved("3", "$y", "2", "&pound;"); ?></td>
												<td><?php echo pending("3", "$y", "2", "&pound;"); ?> <?php echo dead("3", "$y", "2", "&pound;"); ?></td>
											</tr>
											<tr>
												<td>Apr <?php echo allInvoices("4", "$y", "2", "&pound;"); ?> <?php echo allAdj("4", "$y", "2", "&pound;"); ?></td>
												<td><?php echo dif("4", "$y", "2", "&pound;"); ?> <?php echo allSend("4", "$y", "2", "&pound;"); ?></td>
												<td><?php echo recieved("4", "$y", "2", "&pound;"); ?></td>
												<td><?php echo pending("4", "$y", "2", "&pound;"); ?> <?php echo dead("4", "$y", "2", "&pound;"); ?></td>
											</tr>
											<tr>
												<td>May <?php echo allInvoices("5", "$y", "2", "&pound;"); ?> <?php echo allAdj("5", "$y", "2", "&pound;"); ?></td>
												<td><?php echo dif("5", "$y", "2", "&pound;"); ?> <?php echo allSend("5", "$y", "2", "&pound;"); ?></td>
												<td><?php echo recieved("5", "$y", "2", "&pound;"); ?></td>
												<td><?php echo pending("5", "$y", "2", "&pound;"); ?> <?php echo dead("5", "$y", "2", "&pound;"); ?></td>
											</tr>
											<tr>
												<td>Jun <?php echo allInvoices("6", "$y", "2", "&pound;"); ?> <?php echo allAdj("6", "$y", "2", "&pound;"); ?></td>
												<td><?php echo dif("6", "$y", "2", "&pound;"); ?> <?php echo allSend("6", "$y", "2", "&pound;"); ?></td>
												<td><?php echo recieved("6", "$y", "2", "&pound;"); ?></td>
												<td><?php echo pending("6", "$y", "2", "&pound;"); ?> <?php echo dead("6", "$y", "2", "&pound;"); ?></td>
											</tr>
											<tr>
												<td>Jul <?php echo allInvoices("7", "$y", "2", "&pound;"); ?> <?php echo allAdj("7", "$y", "2", "&pound;"); ?></td>
												<td><?php echo dif("7", "$y", "2", "&pound;"); ?> <?php echo allSend("7", "$y", "2", "&pound;"); ?></td>
												<td><?php echo recieved("7", "$y", "2", "&pound;"); ?></td>
												<td><?php echo pending("7", "$y", "2", "&pound;"); ?> <?php echo dead("7", "$y", "2", "&pound;"); ?></td>
											</tr>
											<tr>
												<td>Aug <?php echo allInvoices("8", "$y", "2", "&pound;"); ?> <?php echo allAdj("8", "$y", "2", "&pound;"); ?></td>
												<td><?php echo dif("8", "$y", "2", "&pound;"); ?> <?php echo allSend("8", "$y", "2", "&pound;"); ?></td>
												<td><?php echo recieved("8", "$y", "2", "&pound;"); ?></td>
												<td><?php echo pending("8", "$y", "2", "&pound;"); ?> <?php echo dead("8", "$y", "2", "&pound;"); ?></td>
											</tr>
											<tr>
												<td>Sep <?php echo allInvoices("9", "$y", "2", "&pound;"); ?> <?php echo allAdj("9", "$y", "2", "&pound;"); ?></td>
												<td><?php echo dif("9", "$y", "2", "&pound;"); ?> <?php echo allSend("9", "$y", "2", "&pound;"); ?></td>
												<td><?php echo recieved("9", "$y", "2", "&pound;"); ?></td>
												<td><?php echo pending("9", "$y", "2", "&pound;"); ?> <?php echo dead("9", "$y", "2", "&pound;"); ?></td>
											</tr>
											<tr>
												<td>Oct <?php echo allInvoices("10", "$y", "2", "&pound;"); ?> <?php echo allAdj("10", "$y", "2", "&pound;"); ?></td>
												<td><?php echo dif("10", "$y", "2", "&pound;"); ?> <?php echo allSend("10", "$y", "2", "&pound;"); ?></td>
												<td><?php echo recieved("10", "$y", "2", "&pound;"); ?></td>
												<td><?php echo pending("10", "$y", "2", "&pound;"); ?> <?php echo dead("10", "$y", "2", "&pound;"); ?></td>
											</tr>
											<tr>
												<td>Nov <?php echo allInvoices("11", "$y", "2", "&pound;"); ?> <?php echo allAdj("11", "$y", "2", "&pound;"); ?></td>
												<td><?php echo dif("11", "$y", "2", "&pound;"); ?> <?php echo allSend("11", "$y", "2", "&pound;"); ?></td>
												<td><?php echo recieved("11", "$y", "2", "&pound;"); ?></td>
												<td><?php echo pending("11", "$y", "2", "&pound;"); ?> <?php echo dead("11", "$y", "2", "&pound;"); ?></td>
											</tr>
											<tr>
												<td>Dec <?php echo allInvoices("12", "$y", "2", "&pound;"); ?> <?php echo allAdj("12", "$y", "2", "&pound;"); ?></td>
												<td><?php echo dif("12", "$y", "2", "&pound;"); ?> <?php echo allSend("12", "$y", "2", "&pound;"); ?></td>
												<td><?php echo recieved("12", "$y", "2", "&pound;"); ?></td>
												<td><?php echo pending("12", "$y", "2", "&pound;"); ?> <?php echo dead("12", "$y", "2", "&pound;"); ?></td>
											</tr>
											</tbody>
											</table>
										</div>
									</div>
									<div class="tab-pane" id="overview_3">
										<div class="table-responsive">
											<table class="table table-hover table-light">
											<thead>
											<tr class="uppercase">
												<th>
													 Month
												</th>
												<th>
													 Sent
												</th>
												<th>
													 Rec.
												</th>
												<th>
													Pen. 
												</th>
											</tr>
											</thead>
											<tbody>
											<tr>
												<td>Jan <?php echo allInvoices("1", "$y", "3", "AUD"); ?> <?php echo allAdj("1", "$y", "3", "AUD"); ?></td>
												<td><?php echo dif("1", "$y", "3", "AUD"); ?> <?php echo allSend("1", "$y", "3", "AUD"); ?></td>
												<td><?php echo recieved("1", "$y", "3", "AUD"); ?></td>
												<td><?php echo pending("1", "$y", "3", "AUD"); ?> <?php echo dead("1", "$y", "3", "AUD"); ?></td>
											</tr>
											<tr>
												<td>Feb <?php echo allInvoices("2", "$y", "3", "AUD"); ?> <?php echo allAdj("2", "$y", "3", "AUD"); ?></td>
												<td><?php echo dif("2", "$y", "3", "AUD"); ?> <?php echo allSend("2", "$y", "3", "AUD"); ?></td>
												<td><?php echo recieved("2", "$y", "3", "AUD"); ?></td>
												<td><?php echo pending("2", "$y", "3", "AUD"); ?> <?php echo dead("2", "$y", "3", "AUD"); ?></td>
											</tr>
											<tr>
												<td>Mar <?php echo allInvoices("3", "$y", "3", "AUD"); ?> <?php echo allAdj("3", "$y", "3", "AUD"); ?></td>
												<td><?php echo dif("3", "$y", "3", "AUD"); ?> <?php echo allSend("3", "$y", "3", "AUD"); ?></td>
												<td><?php echo recieved("3", "$y", "3", "AUD"); ?></td>
												<td><?php echo pending("3", "$y", "3", "AUD"); ?> <?php echo dead("3", "$y", "3", "AUD"); ?></td>
											</tr>
											<tr>
												<td>Apr <?php echo allInvoices("4", "$y", "3", "AUD"); ?> <?php echo allAdj("4", "$y", "3", "AUD"); ?></td>
												<td><?php echo dif("4", "$y", "3", "AUD"); ?> <?php echo allSend("4", "$y", "3", "AUD"); ?></td>
												<td><?php echo recieved("4", "$y", "3", "AUD"); ?></td>
												<td><?php echo pending("4", "$y", "3", "AUD"); ?> <?php echo dead("4", "$y", "3", "AUD"); ?></td>
											</tr>
											<tr>
												<td>May <?php echo allInvoices("5", "$y", "3", "AUD"); ?> <?php echo allAdj("5", "$y", "3", "AUD"); ?></td>
												<td><?php echo dif("5", "$y", "3", "AUD"); ?> <?php echo allSend("5", "$y", "3", "AUD"); ?></td>
												<td><?php echo recieved("5", "$y", "3", "AUD"); ?></td>
												<td><?php echo pending("5", "$y", "3", "AUD"); ?> <?php echo dead("5", "$y", "3", "AUD"); ?></td>
											</tr>
											<tr>
												<td>Jun <?php echo allInvoices("6", "$y", "3", "AUD"); ?> <?php echo allAdj("6", "$y", "3", "AUD"); ?></td>
												<td><?php echo dif("6", "$y", "3", "AUD"); ?> <?php echo allSend("6", "$y", "3", "AUD"); ?></td>
												<td><?php echo recieved("6", "$y", "3", "AUD"); ?></td>
												<td><?php echo pending("6", "$y", "3", "AUD"); ?> <?php echo dead("6", "$y", "3", "AUD"); ?></td>
											</tr>
											<tr>
												<td>Jul <?php echo allInvoices("7", "$y", "3", "AUD"); ?> <?php echo allAdj("7", "$y", "3", "AUD"); ?></td>
												<td><?php echo dif("7", "$y", "3", "AUD"); ?> <?php echo allSend("7", "$y", "3", "AUD"); ?></td>
												<td><?php echo recieved("7", "$y", "3", "AUD"); ?></td>
												<td><?php echo pending("7", "$y", "3", "AUD"); ?> <?php echo dead("7", "$y", "3", "AUD"); ?></td>
											</tr>
											<tr>
												<td>Aug <?php echo allInvoices("8", "$y", "3", "AUD"); ?> <?php echo allAdj("8", "$y", "3", "AUD"); ?></td>
												<td><?php echo dif("8", "$y", "3", "AUD"); ?> <?php echo allSend("8", "$y", "3", "AUD"); ?></td>
												<td><?php echo recieved("8", "$y", "3", "AUD"); ?></td>
												<td><?php echo pending("8", "$y", "3", "AUD"); ?> <?php echo dead("8", "$y", "3", "AUD"); ?></td>
											</tr>
											<tr>
												<td>Sep <?php echo allInvoices("9", "$y", "3", "AUD"); ?> <?php echo allAdj("9", "$y", "3", "AUD"); ?></td>
												<td><?php echo dif("9", "$y", "3", "AUD"); ?> <?php echo allSend("9", "$y", "3", "AUD"); ?></td>
												<td><?php echo recieved("9", "$y", "3", "AUD"); ?></td>
												<td><?php echo pending("9", "$y", "3", "AUD"); ?> <?php echo dead("9", "$y", "3", "AUD"); ?></td>
											</tr>
											<tr>
												<td>Oct <?php echo allInvoices("10", "$y", "3", "AUD"); ?> <?php echo allAdj("10", "$y", "3", "AUD"); ?></td>
												<td><?php echo dif("10", "$y", "3", "AUD"); ?> <?php echo allSend("10", "$y", "3", "AUD"); ?></td>
												<td><?php echo recieved("10", "$y", "3", "AUD"); ?></td>
												<td><?php echo pending("10", "$y", "3", "AUD"); ?> <?php echo dead("10", "$y", "3", "AUD"); ?></td>
											</tr>
											<tr>
												<td>Nov <?php echo allInvoices("11", "$y", "3", "AUD"); ?> <?php echo allAdj("11", "$y", "3", "AUD"); ?></td>
												<td><?php echo dif("11", "$y", "3", "AUD"); ?> <?php echo allSend("11", "$y", "3", "AUD"); ?></td>
												<td><?php echo recieved("11", "$y", "3", "AUD"); ?></td>
												<td><?php echo pending("11", "$y", "3", "AUD"); ?> <?php echo dead("11", "$y", "3", "AUD"); ?></td>
											</tr>
											<tr>
												<td>Dec <?php echo allInvoices("12", "$y", "3", "AUD"); ?> <?php echo allAdj("12", "$y", "3", "AUD"); ?></td>
												<td><?php echo dif("12", "$y", "3", "AUD"); ?> <?php echo allSend("12", "$y", "3", "AUD"); ?></td>
												<td><?php echo recieved("12", "$y", "3", "AUD"); ?></td>
												<td><?php echo pending("12", "$y", "3", "AUD"); ?> <?php echo dead("12", "$y", "3", "AUD"); ?></td>
											</tr>
											</tbody>
											</table>
										</div>
									</div>
									<div class="tab-pane" id="overview_4">
										<div class="table-responsive">
											<table class="table table-hover table-light">
											<thead>
											<tr class="uppercase">
												<th>
													 Month
												</th>
												<th>
													 Sent
												</th>
												<th>
													 Rec.
												</th>
												<th>
													Pen. 
												</th>
											</tr>
											</thead>
											<tbody>
											<tr>
												<td>Jan <?php echo allInvoices("1", "$y", "4", "EGP"); ?> <?php echo allAdj("1", "$y", "4", "EGP"); ?></td>
												<td><?php echo dif("1", "$y", "4", "EGP"); ?> <?php echo allSend("1", "$y", "4", "EGP"); ?></td>
												<td><?php echo recieved("1", "$y", "4", "EGP"); ?></td>
												<td><?php echo pending("1", "$y", "4", "EGP"); ?> <?php echo dead("1", "$y", "4", "EGP"); ?></td>
											</tr>
											<tr>
												<td>Feb <?php echo allInvoices("2", "$y", "4", "EGP"); ?> <?php echo allAdj("2", "$y", "4", "EGP"); ?></td>
												<td><?php echo dif("2", "$y", "4", "EGP"); ?> <?php echo allSend("2", "$y", "4", "EGP"); ?></td>
												<td><?php echo recieved("2", "$y", "4", "EGP"); ?></td>
												<td><?php echo pending("2", "$y", "4", "EGP"); ?> <?php echo dead("2", "$y", "4", "EGP"); ?></td>
											</tr>
											<tr>
												<td>Mar <?php echo allInvoices("3", "$y", "4", "EGP"); ?> <?php echo allAdj("3", "$y", "4", "EGP"); ?></td>
												<td><?php echo dif("3", "$y", "4", "EGP"); ?> <?php echo allSend("3", "$y", "4", "EGP"); ?></td>
												<td><?php echo recieved("3", "$y", "4", "EGP"); ?></td>
												<td><?php echo pending("3", "$y", "4", "EGP"); ?> <?php echo dead("3", "$y", "4", "EGP"); ?></td>
											</tr>
											<tr>
												<td>Apr <?php echo allInvoices("4", "$y", "4", "EGP"); ?> <?php echo allAdj("4", "$y", "4", "EGP"); ?></td>
												<td><?php echo dif("4", "$y", "4", "EGP"); ?> <?php echo allSend("4", "$y", "4", "EGP"); ?></td>
												<td><?php echo recieved("4", "$y", "4", "EGP"); ?></td>
												<td><?php echo pending("4", "$y", "4", "EGP"); ?> <?php echo dead("4", "$y", "4", "EGP"); ?></td>
											</tr>
											<tr>
												<td>May <?php echo allInvoices("5", "$y", "4", "EGP"); ?> <?php echo allAdj("5", "$y", "4", "EGP"); ?></td>
												<td><?php echo dif("5", "$y", "4", "EGP"); ?> <?php echo allSend("5", "$y", "4", "EGP"); ?></td>
												<td><?php echo recieved("5", "$y", "4", "EGP"); ?></td>
												<td><?php echo pending("5", "$y", "4", "EGP"); ?> <?php echo dead("5", "$y", "4", "EGP"); ?></td>
											</tr>
											<tr>
												<td>Jun <?php echo allInvoices("6", "$y", "4", "EGP"); ?> <?php echo allAdj("6", "$y", "4", "EGP"); ?></td>
												<td><?php echo dif("6", "$y", "4", "EGP"); ?> <?php echo allSend("6", "$y", "4", "EGP"); ?></td>
												<td><?php echo recieved("6", "$y", "4", "EGP"); ?></td>
												<td><?php echo pending("6", "$y", "4", "EGP"); ?> <?php echo dead("6", "$y", "4", "EGP"); ?></td>
											</tr>
											<tr>
												<td>Jul <?php echo allInvoices("7", "$y", "4", "EGP"); ?> <?php echo allAdj("7", "$y", "4", "EGP"); ?></td>
												<td><?php echo dif("7", "$y", "4", "EGP"); ?> <?php echo allSend("7", "$y", "4", "EGP"); ?></td>
												<td><?php echo recieved("7", "$y", "4", "EGP"); ?></td>
												<td><?php echo pending("7", "$y", "4", "EGP"); ?> <?php echo dead("7", "$y", "4", "EGP"); ?></td>
											</tr>
											<tr>
												<td>Aug <?php echo allInvoices("8", "$y", "4", "EGP"); ?> <?php echo allAdj("8", "$y", "4", "EGP"); ?></td>
												<td><?php echo dif("8", "$y", "4", "EGP"); ?> <?php echo allSend("8", "$y", "4", "EGP"); ?></td>
												<td><?php echo recieved("8", "$y", "4", "EGP"); ?></td>
												<td><?php echo pending("8", "$y", "4", "EGP"); ?> <?php echo dead("8", "$y", "4", "EGP"); ?></td>
											</tr>
											<tr>
												<td>Sep <?php echo allInvoices("9", "$y", "4", "EGP"); ?> <?php echo allAdj("9", "$y", "4", "EGP"); ?></td>
												<td><?php echo dif("9", "$y", "4", "EGP"); ?> <?php echo allSend("9", "$y", "4", "EGP"); ?></td>
												<td><?php echo recieved("9", "$y", "4", "EGP"); ?></td>
												<td><?php echo pending("9", "$y", "4", "EGP"); ?> <?php echo dead("9", "$y", "4", "EGP"); ?></td>
											</tr>
											<tr>
												<td>Oct <?php echo allInvoices("10", "$y", "4", "EGP"); ?> <?php echo allAdj("10", "$y", "4", "EGP"); ?></td>
												<td><?php echo dif("10", "$y", "4", "EGP"); ?> <?php echo allSend("10", "$y", "4", "EGP"); ?></td>
												<td><?php echo recieved("10", "$y", "4", "EGP"); ?></td>
												<td><?php echo pending("10", "$y", "4", "EGP"); ?> <?php echo dead("10", "$y", "4", "EGP"); ?></td>
											</tr>
											<tr>
												<td>Nov <?php echo allInvoices("11", "$y", "4", "EGP"); ?> <?php echo allAdj("11", "$y", "4", "EGP"); ?></td>
												<td><?php echo dif("11", "$y", "4", "EGP"); ?> <?php echo allSend("11", "$y", "4", "EGP"); ?></td>
												<td><?php echo recieved("11", "$y", "4", "EGP"); ?></td>
												<td><?php echo pending("11", "$y", "4", "EGP"); ?> <?php echo dead("11", "$y", "4", "EGP"); ?></td>
											</tr>
											<tr>
												<td>Dec <?php echo allInvoices("12", "$y", "4", "EGP"); ?> <?php echo allAdj("12", "$y", "4", "EGP"); ?></td>
												<td><?php echo dif("12", "$y", "4", "EGP"); ?> <?php echo allSend("12", "$y", "4", "EGP"); ?></td>
												<td><?php echo recieved("12", "$y", "4", "EGP"); ?></td>
												<td><?php echo pending("12", "$y", "4", "EGP"); ?> <?php echo dead("12", "$y", "4", "EGP"); ?></td>
											</tr>
											</tbody>
											</table>
										</div>
									</div>
									<div class="tab-pane" id="overview_5">
										<div class="table-responsive">
											<table class="table table-hover table-light">
											<thead>
											<tr class="uppercase">
												<th>
													 Month
												</th>
												<th>
													 Sent
												</th>
												<th>
													 Rec.
												</th>
												<th>
													Pen. 
												</th>
											</tr>
											</thead>
											<tbody>
											<tr>
												<td>Jan <?php echo allInvoices("1", "$y", "5", "CAD"); ?> <?php echo allAdj("1", "$y", "5", "CAD"); ?></td>
												<td><?php echo dif("1", "$y", "5", "CAD"); ?> <?php echo allSend("1", "$y", "5", "CAD"); ?></td>
												<td><?php echo recieved("1", "$y", "5", "CAD"); ?></td>
												<td><?php echo pending("1", "$y", "5", "CAD"); ?> <?php echo dead("1", "$y", "5", "CAD"); ?></td>
											</tr>
											<tr>
												<td>Feb <?php echo allInvoices("2", "$y", "5", "CAD"); ?> <?php echo allAdj("2", "$y", "5", "CAD"); ?></td>
												<td><?php echo dif("2", "$y", "5", "CAD"); ?> <?php echo allSend("2", "$y", "5", "CAD"); ?></td>
												<td><?php echo recieved("2", "$y", "5", "CAD"); ?></td>
												<td><?php echo pending("2", "$y", "5", "CAD"); ?> <?php echo dead("2", "$y", "5", "CAD"); ?></td>
											</tr>
											<tr>
												<td>Mar <?php echo allInvoices("3", "$y", "5", "CAD"); ?> <?php echo allAdj("3", "$y", "5", "CAD"); ?></td>
												<td><?php echo dif("3", "$y", "5", "CAD"); ?> <?php echo allSend("3", "$y", "5", "CAD"); ?></td>
												<td><?php echo recieved("3", "$y", "5", "CAD"); ?></td>
												<td><?php echo pending("3", "$y", "5", "CAD"); ?> <?php echo dead("3", "$y", "5", "CAD"); ?></td>
											</tr>
											<tr>
												<td>Apr <?php echo allInvoices("4", "$y", "5", "CAD"); ?> <?php echo allAdj("4", "$y", "5", "CAD"); ?></td>
												<td><?php echo dif("4", "$y", "5", "CAD"); ?> <?php echo allSend("4", "$y", "5", "CAD"); ?></td>
												<td><?php echo recieved("4", "$y", "5", "CAD"); ?></td>
												<td><?php echo pending("4", "$y", "5", "CAD"); ?> <?php echo dead("4", "$y", "5", "CAD"); ?></td>
											</tr>
											<tr>
												<td>May <?php echo allInvoices("5", "$y", "5", "CAD"); ?> <?php echo allAdj("5", "$y", "5", "CAD"); ?></td>
												<td><?php echo dif("5", "$y", "5", "CAD"); ?> <?php echo allSend("5", "$y", "5", "CAD"); ?></td>
												<td><?php echo recieved("5", "$y", "5", "CAD"); ?></td>
												<td><?php echo pending("5", "$y", "5", "CAD"); ?> <?php echo dead("5", "$y", "5", "CAD"); ?></td>
											</tr>
											<tr>
												<td>Jun <?php echo allInvoices("6", "$y", "5", "CAD"); ?> <?php echo allAdj("6", "$y", "5", "CAD"); ?></td>
												<td><?php echo dif("6", "$y", "5", "CAD"); ?> <?php echo allSend("6", "$y", "5", "CAD"); ?></td>
												<td><?php echo recieved("6", "$y", "5", "CAD"); ?></td>
												<td><?php echo pending("6", "$y", "5", "CAD"); ?> <?php echo dead("6", "$y", "5", "CAD"); ?></td>
											</tr>
											<tr>
												<td>Jul <?php echo allInvoices("7", "$y", "5", "CAD"); ?> <?php echo allAdj("7", "$y", "5", "CAD"); ?></td>
												<td><?php echo dif("7", "$y", "5", "CAD"); ?> <?php echo allSend("7", "$y", "5", "CAD"); ?></td>
												<td><?php echo recieved("7", "$y", "5", "CAD"); ?></td>
												<td><?php echo pending("7", "$y", "5", "CAD"); ?> <?php echo dead("7", "$y", "5", "CAD"); ?></td>
											</tr>
											<tr>
												<td>Aug <?php echo allInvoices("8", "$y", "5", "CAD"); ?> <?php echo allAdj("8", "$y", "5", "CAD"); ?></td>
												<td><?php echo dif("8", "$y", "5", "CAD"); ?> <?php echo allSend("8", "$y", "5", "CAD"); ?></td>
												<td><?php echo recieved("8", "$y", "5", "CAD"); ?></td>
												<td><?php echo pending("8", "$y", "5", "CAD"); ?> <?php echo dead("8", "$y", "5", "CAD"); ?></td>
											</tr>
											<tr>
												<td>Sep <?php echo allInvoices("9", "$y", "5", "CAD"); ?> <?php echo allAdj("9", "$y", "5", "CAD"); ?></td>
												<td><?php echo dif("9", "$y", "5", "CAD"); ?> <?php echo allSend("9", "$y", "5", "CAD"); ?></td>
												<td><?php echo recieved("9", "$y", "5", "CAD"); ?></td>
												<td><?php echo pending("9", "$y", "5", "CAD"); ?> <?php echo dead("9", "$y", "5", "CAD"); ?></td>
											</tr>
											<tr>
												<td>Oct <?php echo allInvoices("10", "$y", "5", "CAD"); ?> <?php echo allAdj("10", "$y", "5", "CAD"); ?></td>
												<td><?php echo dif("10", "$y", "5", "CAD"); ?> <?php echo allSend("10", "$y", "5", "CAD"); ?></td>
												<td><?php echo recieved("10", "$y", "5", "CAD"); ?></td>
												<td><?php echo pending("10", "$y", "5", "CAD"); ?> <?php echo dead("10", "$y", "5", "CAD"); ?></td>
											</tr>
											<tr>
												<td>Nov <?php echo allInvoices("11", "$y", "5", "CAD"); ?> <?php echo allAdj("11", "$y", "5", "CAD"); ?></td>
												<td><?php echo dif("11", "$y", "5", "CAD"); ?> <?php echo allSend("11", "$y", "5", "CAD"); ?></td>
												<td><?php echo recieved("11", "$y", "5", "CAD"); ?></td>
												<td><?php echo pending("11", "$y", "5", "CAD"); ?> <?php echo dead("11", "$y", "5", "CAD"); ?></td>
											</tr>
											<tr>
												<td>Dec <?php echo allInvoices("12", "$y", "5", "CAD"); ?> <?php echo allAdj("12", "$y", "5", "CAD"); ?></td>
												<td><?php echo dif("12", "$y", "5", "CAD"); ?> <?php echo allSend("12", "$y", "5", "CAD"); ?></td>
												<td><?php echo recieved("12", "$y", "5", "CAD"); ?></td>
												<td><?php echo pending("12", "$y", "5", "CAD"); ?> <?php echo dead("12", "$y", "5", "CAD"); ?></td>
											</tr>
											</tbody>
											</table>
										</div>
									</div>
									<div class="tab-pane" id="overview_6">
										<div class="table-responsive">
											<table class="table table-hover table-light">
											<thead>
											<tr class="uppercase">
												<th>
													 Month
												</th>
												<th>
													 Sent
												</th>
												<th>
													 Rec.
												</th>
												<th>
													Pen. 
												</th>
											</tr>
											</thead>
											<tbody>
											<tr>
												<td>Jan <?php echo allInvoices("1", "$y", "6", "EUR"); ?> <?php echo allAdj("1", "$y", "6", "EUR"); ?></td>
												<td><?php echo dif("1", "$y", "6", "EUR"); ?> <?php echo allSend("1", "$y", "6", "EUR"); ?></td>
												<td><?php echo recieved("1", "$y", "6", "EUR"); ?></td>
												<td><?php echo pending("1", "$y", "6", "EUR"); ?> <?php echo dead("1", "$y", "6", "EUR"); ?></td>
											</tr>
											<tr>
												<td>Feb <?php echo allInvoices("2", "$y", "6", "EUR"); ?> <?php echo allAdj("2", "$y", "6", "EUR"); ?></td>
												<td><?php echo dif("2", "$y", "6", "EUR"); ?> <?php echo allSend("2", "$y", "6", "EUR"); ?></td>
												<td><?php echo recieved("2", "$y", "6", "EUR"); ?></td>
												<td><?php echo pending("2", "$y", "6", "EUR"); ?> <?php echo dead("2", "$y", "6", "EUR"); ?></td>
											</tr>
											<tr>
												<td>Mar <?php echo allInvoices("3", "$y", "6", "EUR"); ?> <?php echo allAdj("3", "$y", "6", "EUR"); ?></td>
												<td><?php echo dif("3", "$y", "6", "EUR"); ?> <?php echo allSend("3", "$y", "6", "EUR"); ?></td>
												<td><?php echo recieved("3", "$y", "6", "EUR"); ?></td>
												<td><?php echo pending("3", "$y", "6", "EUR"); ?> <?php echo dead("3", "$y", "6", "EUR"); ?></td>
											</tr>
											<tr>
												<td>Apr <?php echo allInvoices("4", "$y", "6", "EUR"); ?> <?php echo allAdj("4", "$y", "6", "EUR"); ?></td>
												<td><?php echo dif("4", "$y", "6", "EUR"); ?> <?php echo allSend("4", "$y", "6", "EUR"); ?></td>
												<td><?php echo recieved("4", "$y", "6", "EUR"); ?></td>
												<td><?php echo pending("4", "$y", "6", "EUR"); ?> <?php echo dead("4", "$y", "6", "EUR"); ?></td>
											</tr>
											<tr>
												<td>May <?php echo allInvoices("5", "$y", "6", "EUR"); ?> <?php echo allAdj("5", "$y", "6", "EUR"); ?></td>
												<td><?php echo dif("5", "$y", "6", "EUR"); ?> <?php echo allSend("5", "$y", "6", "EUR"); ?></td>
												<td><?php echo recieved("5", "$y", "6", "EUR"); ?></td>
												<td><?php echo pending("5", "$y", "6", "EUR"); ?> <?php echo dead("5", "$y", "6", "EUR"); ?></td>
											</tr>
											<tr>
												<td>Jun <?php echo allInvoices("6", "$y", "6", "EUR"); ?> <?php echo allAdj("6", "$y", "6", "EUR"); ?></td>
												<td><?php echo dif("6", "$y", "6", "EUR"); ?> <?php echo allSend("6", "$y", "6", "EUR"); ?></td>
												<td><?php echo recieved("6", "$y", "6", "EUR"); ?></td>
												<td><?php echo pending("6", "$y", "6", "EUR"); ?> <?php echo dead("6", "$y", "6", "EUR"); ?></td>
											</tr>
											<tr>
												<td>Jul <?php echo allInvoices("7", "$y", "6", "EUR"); ?> <?php echo allAdj("7", "$y", "6", "EUR"); ?></td>
												<td><?php echo dif("7", "$y", "6", "EUR"); ?> <?php echo allSend("7", "$y", "6", "EUR"); ?></td>
												<td><?php echo recieved("7", "$y", "6", "EUR"); ?></td>
												<td><?php echo pending("7", "$y", "6", "EUR"); ?> <?php echo dead("7", "$y", "6", "EUR"); ?></td>
											</tr>
											<tr>
												<td>Aug <?php echo allInvoices("8", "$y", "6", "EUR"); ?> <?php echo allAdj("8", "$y", "6", "EUR"); ?></td>
												<td><?php echo dif("8", "$y", "6", "EUR"); ?> <?php echo allSend("8", "$y", "6", "EUR"); ?></td>
												<td><?php echo recieved("8", "$y", "6", "EUR"); ?></td>
												<td><?php echo pending("8", "$y", "6", "EUR"); ?> <?php echo dead("8", "$y", "6", "EUR"); ?></td>
											</tr>
											<tr>
												<td>Sep <?php echo allInvoices("9", "$y", "6", "EUR"); ?> <?php echo allAdj("9", "$y", "6", "EUR"); ?></td>
												<td><?php echo dif("9", "$y", "6", "EUR"); ?> <?php echo allSend("9", "$y", "6", "EUR"); ?></td>
												<td><?php echo recieved("9", "$y", "6", "EUR"); ?></td>
												<td><?php echo pending("9", "$y", "6", "EUR"); ?> <?php echo dead("9", "$y", "6", "EUR"); ?></td>
											</tr>
											<tr>
												<td>Oct <?php echo allInvoices("10", "$y", "6", "EUR"); ?> <?php echo allAdj("10", "$y", "6", "EUR"); ?></td>
												<td><?php echo dif("10", "$y", "6", "EUR"); ?> <?php echo allSend("10", "$y", "6", "EUR"); ?></td>
												<td><?php echo recieved("10", "$y", "6", "EUR"); ?></td>
												<td><?php echo pending("10", "$y", "6", "EUR"); ?> <?php echo dead("10", "$y", "6", "EUR"); ?></td>
											</tr>
											<tr>
												<td>Nov <?php echo allInvoices("11", "$y", "6", "EUR"); ?> <?php echo allAdj("11", "$y", "6", "EUR"); ?></td>
												<td><?php echo dif("11", "$y", "6", "EUR"); ?> <?php echo allSend("11", "$y", "6", "EUR"); ?></td>
												<td><?php echo recieved("11", "$y", "6", "EUR"); ?></td>
												<td><?php echo pending("11", "$y", "6", "EUR"); ?> <?php echo dead("11", "$y", "6", "EUR"); ?></td>
											</tr>
											<tr>
												<td>Dec <?php echo allInvoices("12", "$y", "6", "EUR"); ?> <?php echo allAdj("12", "$y", "6", "EUR"); ?></td>
												<td><?php echo dif("12", "$y", "6", "EUR"); ?> <?php echo allSend("12", "$y", "6", "EUR"); ?></td>
												<td><?php echo recieved("12", "$y", "6", "EUR"); ?></td>
												<td><?php echo pending("12", "$y", "6", "EUR"); ?> <?php echo dead("12", "$y", "6", "EUR"); ?></td>
											</tr>
											</tbody>
											</table>
										</div>
									</div>
									<div class="tab-pane" id="overview_7">
										<div class="table-responsive">
											<table class="table table-hover table-light">
											<thead>
											<tr class="uppercase">
												<th>
													 Month
												</th>
												<th>
													 Sent
												</th>
												<th>
													 Rec.
												</th>
												<th>
													Pen. 
												</th>
											</tr>
											</thead>
											<tbody>
											<tr>
												<td>Jan <?php echo allInvoices("1", "$y", "7", "NZD"); ?> <?php echo allAdj("1", "$y", "7", "NZD"); ?></td>
												<td><?php echo dif("1", "$y", "7", "NZD"); ?> <?php echo allSend("1", "$y", "7", "NZD"); ?></td>
												<td><?php echo recieved("1", "$y", "7", "NZD"); ?></td>
												<td><?php echo pending("1", "$y", "7", "NZD"); ?> <?php echo dead("1", "$y", "7", "NZD"); ?></td>
											</tr>
											<tr>
												<td>Feb <?php echo allInvoices("2", "$y", "7", "NZD"); ?> <?php echo allAdj("2", "$y", "7", "NZD"); ?></td>
												<td><?php echo dif("2", "$y", "7", "NZD"); ?> <?php echo allSend("2", "$y", "7", "NZD"); ?></td>
												<td><?php echo recieved("2", "$y", "7", "NZD"); ?></td>
												<td><?php echo pending("2", "$y", "7", "NZD"); ?> <?php echo dead("2", "$y", "7", "NZD"); ?></td>
											</tr>
											<tr>
												<td>Mar <?php echo allInvoices("3", "$y", "7", "NZD"); ?> <?php echo allAdj("3", "$y", "7", "NZD"); ?></td>
												<td><?php echo dif("3", "$y", "7", "NZD"); ?> <?php echo allSend("3", "$y", "7", "NZD"); ?></td>
												<td><?php echo recieved("3", "$y", "7", "NZD"); ?></td>
												<td><?php echo pending("3", "$y", "7", "NZD"); ?> <?php echo dead("3", "$y", "7", "NZD"); ?></td>
											</tr>
											<tr>
												<td>Apr <?php echo allInvoices("4", "$y", "7", "NZD"); ?> <?php echo allAdj("4", "$y", "7", "NZD"); ?></td>
												<td><?php echo dif("4", "$y", "7", "NZD"); ?> <?php echo allSend("4", "$y", "7", "NZD"); ?></td>
												<td><?php echo recieved("4", "$y", "7", "NZD"); ?></td>
												<td><?php echo pending("4", "$y", "7", "NZD"); ?> <?php echo dead("4", "$y", "7", "NZD"); ?></td>
											</tr>
											<tr>
												<td>May <?php echo allInvoices("5", "$y", "7", "NZD"); ?> <?php echo allAdj("5", "$y", "7", "NZD"); ?></td>
												<td><?php echo dif("5", "$y", "7", "NZD"); ?> <?php echo allSend("5", "$y", "7", "NZD"); ?></td>
												<td><?php echo recieved("5", "$y", "7", "NZD"); ?></td>
												<td><?php echo pending("5", "$y", "7", "NZD"); ?> <?php echo dead("5", "$y", "7", "NZD"); ?></td>
											</tr>
											<tr>
												<td>Jun <?php echo allInvoices("6", "$y", "7", "NZD"); ?> <?php echo allAdj("7", "$y", "7", "NZD"); ?></td>
												<td><?php echo dif("6", "$y", "7", "NZD"); ?> <?php echo allSend("6", "$y", "7", "NZD"); ?></td>
												<td><?php echo recieved("6", "$y", "7", "NZD"); ?></td>
												<td><?php echo pending("6", "$y", "7", "NZD"); ?> <?php echo dead("6", "$y", "7", "NZD"); ?></td>
											</tr>
											<tr>
												<td>Jul <?php echo allInvoices("7", "$y", "7", "NZD"); ?> <?php echo allAdj("7", "$y", "7", "NZD"); ?></td>
												<td><?php echo dif("7", "$y", "7", "NZD"); ?> <?php echo allSend("7", "$y", "7", "NZD"); ?></td>
												<td><?php echo recieved("7", "$y", "7", "NZD"); ?></td>
												<td><?php echo pending("7", "$y", "7", "NZD"); ?> <?php echo dead("7", "$y", "7", "NZD"); ?></td>
											</tr>
											<tr>
												<td>Aug <?php echo allInvoices("8", "$y", "7", "NZD"); ?> <?php echo allAdj("8", "$y", "7", "NZD"); ?></td>
												<td><?php echo dif("8", "$y", "7", "NZD"); ?> <?php echo allSend("8", "$y", "7", "NZD"); ?></td>
												<td><?php echo recieved("8", "$y", "7", "NZD"); ?></td>
												<td><?php echo pending("8", "$y", "7", "NZD"); ?> <?php echo dead("8", "$y", "7", "NZD"); ?></td>
											</tr>
											<tr>
												<td>Sep <?php echo allInvoices("9", "$y", "7", "NZD"); ?> <?php echo allAdj("9", "$y", "7", "NZD"); ?></td>
												<td><?php echo dif("9", "$y", "7", "NZD"); ?> <?php echo allSend("9", "$y", "7", "NZD"); ?></td>
												<td><?php echo recieved("9", "$y", "7", "NZD"); ?></td>
												<td><?php echo pending("9", "$y", "7", "NZD"); ?> <?php echo dead("9", "$y", "7", "NZD"); ?></td>
											</tr>
											<tr>
												<td>Oct <?php echo allInvoices("10", "$y", "7", "NZD"); ?> <?php echo allAdj("10", "$y", "7", "NZD"); ?></td>
												<td><?php echo dif("10", "$y", "7", "NZD"); ?> <?php echo allSend("10", "$y", "7", "NZD"); ?></td>
												<td><?php echo recieved("10", "$y", "7", "NZD"); ?></td>
												<td><?php echo pending("10", "$y", "7", "NZD"); ?> <?php echo dead("10", "$y", "7", "NZD"); ?></td>
											</tr>
											<tr>
												<td>Nov <?php echo allInvoices("11", "$y", "7", "NZD"); ?> <?php echo allAdj("11", "$y", "7", "NZD"); ?></td>
												<td><?php echo dif("11", "$y", "7", "NZD"); ?> <?php echo allSend("11", "$y", "7", "NZD"); ?></td>
												<td><?php echo recieved("11", "$y", "7", "NZD"); ?></td>
												<td><?php echo pending("11", "$y", "7", "NZD"); ?> <?php echo dead("11", "$y", "7", "NZD"); ?></td>
											</tr>
											<tr>
												<td>Dec <?php echo allInvoices("12", "$y", "7", "NZD"); ?> <?php echo allAdj("12", "$y", "7", "NZD"); ?></td>
												<td><?php echo dif("12", "$y", "7", "NZD"); ?> <?php echo allSend("12", "$y", "7", "NZD"); ?></td>
												<td><?php echo recieved("12", "$y", "7", "NZD"); ?></td>
												<td><?php echo pending("12", "$y", "7", "NZD"); ?> <?php echo dead("12", "$y", "7", "NZD"); ?></td>
											</tr>
											</tbody>
											</table>
										</div>
									</div>
									<div class="tab-pane" id="overview_8">
										<div class="table-responsive">
											<table class="table table-hover table-light">
											<thead>
											<tr class="uppercase">
												<th>
													 Month
												</th>
												<th>
													 Sent
												</th>
												<th>
													 Rec.
												</th>
												<th>
													Pen. 
												</th>
											</tr>
											</thead>
											<tbody>
											<tr>
												<td>Jan <?php echo allInvoices("1", "$y", "8", "AED"); ?> <?php echo allAdj("1", "$y", "8", "AED"); ?></td>
												<td><?php echo dif("1", "$y", "8", "AED"); ?> <?php echo allSend("1", "$y", "8", "AED"); ?></td>
												<td><?php echo recieved("1", "$y", "8", "AED"); ?></td>
												<td><?php echo pending("1", "$y", "8", "AED"); ?> <?php echo dead("1", "$y", "8", "AED"); ?></td>
											</tr>
											<tr>
												<td>Feb <?php echo allInvoices("2", "$y", "8", "AED"); ?> <?php echo allAdj("2", "$y", "8", "AED"); ?></td>
												<td><?php echo dif("2", "$y", "8", "AED"); ?> <?php echo allSend("2", "$y", "8", "AED"); ?></td>
												<td><?php echo recieved("2", "$y", "8", "AED"); ?></td>
												<td><?php echo pending("2", "$y", "8", "AED"); ?> <?php echo dead("2", "$y", "8", "AED"); ?></td>
											</tr>
											<tr>
												<td>Mar <?php echo allInvoices("3", "$y", "8", "AED"); ?> <?php echo allAdj("3", "$y", "8", "AED"); ?></td>
												<td><?php echo dif("3", "$y", "8", "AED"); ?> <?php echo allSend("3", "$y", "8", "AED"); ?></td>
												<td><?php echo recieved("3", "$y", "8", "AED"); ?></td>
												<td><?php echo pending("3", "$y", "8", "AED"); ?> <?php echo dead("3", "$y", "8", "AED"); ?></td>
											</tr>
											<tr>
												<td>Apr <?php echo allInvoices("4", "$y", "8", "AED"); ?> <?php echo allAdj("4", "$y", "8", "AED"); ?></td>
												<td><?php echo dif("4", "$y", "8", "AED"); ?> <?php echo allSend("4", "$y", "8", "AED"); ?></td>
												<td><?php echo recieved("4", "$y", "8", "AED"); ?></td>
												<td><?php echo pending("4", "$y", "8", "AED"); ?> <?php echo dead("4", "$y", "8", "AED"); ?></td>
											</tr>
											<tr>
												<td>May <?php echo allInvoices("5", "$y", "8", "AED"); ?> <?php echo allAdj("5", "$y", "8", "AED"); ?></td>
												<td><?php echo dif("5", "$y", "8", "AED"); ?> <?php echo allSend("5", "$y", "8", "AED"); ?></td>
												<td><?php echo recieved("5", "$y", "8", "AED"); ?></td>
												<td><?php echo pending("5", "$y", "8", "AED"); ?> <?php echo dead("5", "$y", "8", "AED"); ?></td>
											</tr>
											<tr>
												<td>Jun <?php echo allInvoices("6", "$y", "8", "AED"); ?> <?php echo allAdj("8", "$y", "8", "AED"); ?></td>
												<td><?php echo dif("6", "$y", "8", "AED"); ?> <?php echo allSend("6", "$y", "8", "AED"); ?></td>
												<td><?php echo recieved("6", "$y", "8", "AED"); ?></td>
												<td><?php echo pending("6", "$y", "8", "AED"); ?> <?php echo dead("6", "$y", "8", "AED"); ?></td>
											</tr>
											<tr>
												<td>Jul <?php echo allInvoices("7", "$y", "8", "AED"); ?> <?php echo allAdj("7", "$y", "8", "AED"); ?></td>
												<td><?php echo dif("7", "$y", "8", "AED"); ?> <?php echo allSend("7", "$y", "8", "AED"); ?></td>
												<td><?php echo recieved("7", "$y", "8", "AED"); ?></td>
												<td><?php echo pending("7", "$y", "8", "AED"); ?> <?php echo dead("7", "$y", "8", "AED"); ?></td>
											</tr>
											<tr>
												<td>Aug <?php echo allInvoices("8", "$y", "8", "AED"); ?> <?php echo allAdj("8", "$y", "8", "AED"); ?></td>
												<td><?php echo dif("8", "$y", "8", "AED"); ?> <?php echo allSend("8", "$y", "8", "AED"); ?></td>
												<td><?php echo recieved("8", "$y", "8", "AED"); ?></td>
												<td><?php echo pending("8", "$y", "8", "AED"); ?> <?php echo dead("8", "$y", "8", "AED"); ?></td>
											</tr>
											<tr>
												<td>Sep <?php echo allInvoices("9", "$y", "8", "AED"); ?> <?php echo allAdj("9", "$y", "8", "AED"); ?></td>
												<td><?php echo dif("9", "$y", "8", "AED"); ?> <?php echo allSend("9", "$y", "8", "AED"); ?></td>
												<td><?php echo recieved("9", "$y", "8", "AED"); ?></td>
												<td><?php echo pending("9", "$y", "8", "AED"); ?> <?php echo dead("9", "$y", "8", "AED"); ?></td>
											</tr>
											<tr>
												<td>Oct <?php echo allInvoices("10", "$y", "8", "AED"); ?> <?php echo allAdj("10", "$y", "8", "AED"); ?></td>
												<td><?php echo dif("10", "$y", "8", "AED"); ?> <?php echo allSend("10", "$y", "8", "AED"); ?></td>
												<td><?php echo recieved("10", "$y", "8", "AED"); ?></td>
												<td><?php echo pending("10", "$y", "8", "AED"); ?> <?php echo dead("10", "$y", "8", "AED"); ?></td>
											</tr>
											<tr>
												<td>Nov <?php echo allInvoices("11", "$y", "8", "AED"); ?> <?php echo allAdj("11", "$y", "8", "AED"); ?></td>
												<td><?php echo dif("11", "$y", "8", "AED"); ?> <?php echo allSend("11", "$y", "8", "AED"); ?></td>
												<td><?php echo recieved("11", "$y", "8", "AED"); ?></td>
												<td><?php echo pending("11", "$y", "8", "AED"); ?> <?php echo dead("11", "$y", "8", "AED"); ?></td>
											</tr>
											<tr>
												<td>Dec <?php echo allInvoices("12", "$y", "8", "AED"); ?> <?php echo allAdj("12", "$y", "8", "AED"); ?></td>
												<td><?php echo dif("12", "$y", "8", "AED"); ?> <?php echo allSend("12", "$y", "8", "AED"); ?></td>
												<td><?php echo recieved("12", "$y", "8", "AED"); ?></td>
												<td><?php echo pending("12", "$y", "8", "AED"); ?> <?php echo dead("12", "$y", "8", "AED"); ?></td>
											</tr>
											</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- End: life time stats -->
				</div>
				<div class="col-md-6">
					<!-- Begin: life time stats -->
					<div class="portlet light">
						<div class="portlet-title">
							<div class="caption">
								<i class="icon-bar-chart font-green-sharp"></i>
								<span class="caption-helper">INVOICE DETAILS FOR THE YEAR</span>
								<span class="caption-subject font-green-sharp bold uppercase"><?php $result = mysql_query("SELECT * FROM school_yr WHERE year_id = $py");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
$pidm = MYSQL_RESULT($result,$i,"school_year");
echo $pidm ?></span>
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="#portlet-config" data-toggle="modal" class="config">
								</a>
								<a href="javascript:;" class="reload">
								</a>
								<a href="javascript:;" class="remove">
								</a>
							</div>
						</div>
						<div class="portlet-body">
							<div class="tabbable-line">
								<ul class="nav nav-tabs">
									<li class="active">
										<a href="#overview_9" data-toggle="tab">
										USD </a>
									</li>
									<li>
										<a href="#overview_10" data-toggle="tab">
										GBP </a>
									</li>
									<li>
										<a href="#overview_11" data-toggle="tab">
										AUD </a>
									</li>
									<li>
										<a href="#overview_12" data-toggle="tab">
										EGP </a>
									</li>
									<li>
										<a href="#overview_13" data-toggle="tab">
										CAD </a>
									</li>
									<li>
										<a href="#overview_14" data-toggle="tab">
										EUR </a>
									</li>
									<li>
										<a href="#overview_15" data-toggle="tab">
										NZD </a>
									</li>
									<li>
										<a href="#overview_16" data-toggle="tab">
										AED </a>
									</li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane active" id="overview_9">
										<div class="table-responsive">
											<table class="table table-hover table-light">
											<thead>
											<tr class="uppercase">
												<th>
													 Month
												</th>
												<th>
													 Sent
												</th>
												<th>
													 Rec.
												</th>
												<th>
													Pen. 
												</th>
											</tr>
											</thead>
											<tbody>
											<tr>
												<td>Jan <?php echo allInvoices("1", "$py", "1", "$"); ?> <?php echo allAdj("1", "$py", "1", "$"); ?></td>
												<td><?php echo dif("1", "$py", "1", "$"); ?> <?php echo allSend("1", "$py", "1", "$"); ?></td>
												<td><?php echo recieved("1", "$py", "1", "$"); ?></td>
												<td><?php echo pending("1", "$py", "1", "$"); ?> <?php echo dead("1", "$py", "1", "$"); ?></td>
											</tr>
											<tr>
												<td>Feb <?php echo allInvoices("2", "$py", "1", "$"); ?> <?php echo allAdj("2", "$py", "1", "$"); ?></td>
												<td><?php echo dif("2", "$py", "1", "$"); ?> <?php echo allSend("2", "$py", "1", "$"); ?></td>
												<td><?php echo recieved("2", "$py", "1", "$"); ?></td>
												<td><?php echo pending("2", "$py", "1", "$"); ?> <?php echo dead("2", "$py", "1", "$"); ?></td>
											</tr>
											<tr>
												<td>Mar <?php echo allInvoices("3", "$py", "1", "$"); ?> <?php echo allAdj("3", "$py", "1", "$"); ?></td>
												<td><?php echo dif("3", "$py", "1", "$"); ?> <?php echo allSend("3", "$py", "1", "$"); ?></td>
												<td><?php echo recieved("3", "$py", "1", "$"); ?></td>
												<td><?php echo pending("3", "$py", "1", "$"); ?> <?php echo dead("3", "$py", "1", "$"); ?></td>
											</tr>
											<tr>
												<td>Apr <?php echo allInvoices("4", "$py", "1", "$"); ?> <?php echo allAdj("4", "$py", "1", "$"); ?></td>
												<td><?php echo dif("4", "$py", "1", "$"); ?> <?php echo allSend("4", "$py", "1", "$"); ?></td>
												<td><?php echo recieved("4", "$py", "1", "$"); ?></td>
												<td><?php echo pending("4", "$py", "1", "$"); ?> <?php echo dead("4", "$py", "1", "$"); ?></td>
											</tr>
											<tr>
												<td>May <?php echo allInvoices("5", "$py", "1", "$"); ?> <?php echo allAdj("5", "$py", "1", "$"); ?></td>
												<td><?php echo dif("5", "$py", "1", "$"); ?> <?php echo allSend("5", "$py", "1", "$"); ?></td>
												<td><?php echo recieved("5", "$py", "1", "$"); ?></td>
												<td><?php echo pending("5", "$py", "1", "$"); ?> <?php echo dead("5", "$py", "1", "$"); ?></td>
											</tr>
											<tr>
												<td>Jun <?php echo allInvoices("6", "$py", "1", "$"); ?> <?php echo allAdj("6", "$py", "1", "$"); ?></td>
												<td><?php echo dif("6", "$py", "1", "$"); ?> <?php echo allSend("6", "$py", "1", "$"); ?></td>
												<td><?php echo recieved("6", "$py", "1", "$"); ?></td>
												<td><?php echo pending("6", "$py", "1", "$"); ?> <?php echo dead("6", "$py", "1", "$"); ?></td>
											</tr>
											<tr>
												<td>Jul <?php echo allInvoices("7", "$py", "1", "$"); ?> <?php echo allAdj("7", "$py", "1", "$"); ?></td>
												<td><?php echo dif("7", "$py", "1", "$"); ?> <?php echo allSend("7", "$py", "1", "$"); ?></td>
												<td><?php echo recieved("7", "$py", "1", "$"); ?></td>
												<td><?php echo pending("7", "$py", "1", "$"); ?> <?php echo dead("7", "$py", "1", "$"); ?></td>
											</tr>
											<tr>
												<td>Aug <?php echo allInvoices("8", "$py", "1", "$"); ?> <?php echo allAdj("8", "$py", "1", "$"); ?></td>
												<td><?php echo dif("8", "$py", "1", "$"); ?> <?php echo allSend("8", "$py", "1", "$"); ?></td>
												<td><?php echo recieved("8", "$py", "1", "$"); ?></td>
												<td><?php echo pending("8", "$py", "1", "$"); ?> <?php echo dead("8", "$py", "1", "$"); ?></td>
											</tr>
											<tr>
												<td>Sep <?php echo allInvoices("9", "$py", "1", "$"); ?> <?php echo allAdj("9", "$py", "1", "$"); ?></td>
												<td><?php echo dif("9", "$py", "1", "$"); ?> <?php echo allSend("9", "$py", "1", "$"); ?></td>
												<td><?php echo recieved("9", "$py", "1", "$"); ?></td>
												<td><?php echo pending("9", "$py", "1", "$"); ?> <?php echo dead("9", "$py", "1", "$"); ?></td>
											</tr>
											<tr>
												<td>Oct <?php echo allInvoices("10", "$py", "1", "$"); ?> <?php echo allAdj("10", "$py", "1", "$"); ?></td>
												<td><?php echo dif("10", "$py", "1", "$"); ?> <?php echo allSend("10", "$py", "1", "$"); ?></td>
												<td><?php echo recieved("10", "$py", "1", "$"); ?></td>
												<td><?php echo pending("10", "$py", "1", "$"); ?> <?php echo dead("10", "$py", "1", "$"); ?></td>
											</tr>
											<tr>
												<td>Nov <?php echo allInvoices("11", "$py", "1", "$"); ?> <?php echo allAdj("11", "$py", "1", "$"); ?></td>
												<td><?php echo dif("11", "$py", "1", "$"); ?> <?php echo allSend("11", "$py", "1", "$"); ?></td>
												<td><?php echo recieved("11", "$py", "1", "$"); ?></td>
												<td><?php echo pending("11", "$py", "1", "$"); ?> <?php echo dead("11", "$py", "1", "$"); ?></td>
											</tr>
											<tr>
												<td>Dec <?php echo allInvoices("12", "$py", "1", "$"); ?> <?php echo allAdj("12", "$py", "1", "$"); ?></td>
												<td><?php echo dif("12", "$py", "1", "$"); ?> <?php echo allSend("12", "$py", "1", "$"); ?></td>
												<td><?php echo recieved("12", "$py", "1", "$"); ?></td>
												<td><?php echo pending("12", "$py", "1", "$"); ?> <?php echo dead("12", "$py", "1", "$"); ?></td>
											</tr>
											</tbody>
											</table>
										</div>
									</div>
									<div class="tab-pane" id="overview_10">
										<div class="table-responsive">
											<table class="table table-hover table-light">
											<thead>
											<tr class="uppercase">
												<th>
													 Month
												</th>
												<th>
													 Sent
												</th>
												<th>
													 Rec.
												</th>
												<th>
													Pen. 
												</th>
											</tr>
											</thead>
											<tbody>
											<tr>
												<td>Jan <?php echo allInvoices("1", "$py", "2", "&pound;"); ?> <?php echo allAdj("1", "$py", "2", "&pound;"); ?></td>
												<td><?php echo dif("1", "$py", "2", "&pound;"); ?> <?php echo allSend("1", "$py", "2", "&pound;"); ?></td>
												<td><?php echo recieved("1", "$py", "2", "&pound;"); ?></td>
												<td><?php echo pending("1", "$py", "2", "&pound;"); ?> <?php echo dead("1", "$py", "2", "&pound;"); ?></td>
											</tr>
											<tr>
												<td>Feb <?php echo allInvoices("2", "$py", "2", "&pound;"); ?> <?php echo allAdj("2", "$py", "2", "&pound;"); ?></td>
												<td><?php echo dif("2", "$py", "2", "&pound;"); ?> <?php echo allSend("2", "$py", "2", "&pound;"); ?></td>
												<td><?php echo recieved("2", "$py", "2", "&pound;"); ?></td>
												<td><?php echo pending("2", "$py", "2", "&pound;"); ?> <?php echo dead("2", "$py", "2", "&pound;"); ?></td>
											</tr>
											<tr>
												<td>Mar <?php echo allInvoices("3", "$py", "2", "&pound;"); ?> <?php echo allAdj("3", "$py", "2", "&pound;"); ?></td>
												<td><?php echo dif("3", "$py", "2", "&pound;"); ?> <?php echo allSend("3", "$py", "2", "&pound;"); ?></td>
												<td><?php echo recieved("3", "$py", "2", "&pound;"); ?></td>
												<td><?php echo pending("3", "$py", "2", "&pound;"); ?> <?php echo dead("3", "$py", "2", "&pound;"); ?></td>
											</tr>
											<tr>
												<td>Apr <?php echo allInvoices("4", "$py", "2", "&pound;"); ?> <?php echo allAdj("4", "$py", "2", "&pound;"); ?></td>
												<td><?php echo dif("4", "$py", "2", "&pound;"); ?> <?php echo allSend("4", "$py", "2", "&pound;"); ?></td>
												<td><?php echo recieved("4", "$py", "2", "&pound;"); ?></td>
												<td><?php echo pending("4", "$py", "2", "&pound;"); ?> <?php echo dead("4", "$py", "2", "&pound;"); ?></td>
											</tr>
											<tr>
												<td>May <?php echo allInvoices("5", "$py", "2", "&pound;"); ?> <?php echo allAdj("5", "$py", "2", "&pound;"); ?></td>
												<td><?php echo dif("5", "$py", "2", "&pound;"); ?> <?php echo allSend("5", "$py", "2", "&pound;"); ?></td>
												<td><?php echo recieved("5", "$py", "2", "&pound;"); ?></td>
												<td><?php echo pending("5", "$py", "2", "&pound;"); ?> <?php echo dead("5", "$py", "2", "&pound;"); ?></td>
											</tr>
											<tr>
												<td>Jun <?php echo allInvoices("6", "$py", "2", "&pound;"); ?> <?php echo allAdj("6", "$py", "2", "&pound;"); ?></td>
												<td><?php echo dif("6", "$py", "2", "&pound;"); ?> <?php echo allSend("6", "$py", "2", "&pound;"); ?></td>
												<td><?php echo recieved("6", "$py", "2", "&pound;"); ?></td>
												<td><?php echo pending("6", "$py", "2", "&pound;"); ?> <?php echo dead("6", "$py", "2", "&pound;"); ?></td>
											</tr>
											<tr>
												<td>Jul <?php echo allInvoices("7", "$py", "2", "&pound;"); ?> <?php echo allAdj("7", "$py", "2", "&pound;"); ?></td>
												<td><?php echo dif("7", "$py", "2", "&pound;"); ?> <?php echo allSend("7", "$py", "2", "&pound;"); ?></td>
												<td><?php echo recieved("7", "$py", "2", "&pound;"); ?></td>
												<td><?php echo pending("7", "$py", "2", "&pound;"); ?> <?php echo dead("7", "$py", "2", "&pound;"); ?></td>
											</tr>
											<tr>
												<td>Aug <?php echo allInvoices("8", "$py", "2", "&pound;"); ?> <?php echo allAdj("8", "$py", "2", "&pound;"); ?></td>
												<td><?php echo dif("8", "$py", "2", "&pound;"); ?> <?php echo allSend("8", "$py", "2", "&pound;"); ?></td>
												<td><?php echo recieved("8", "$py", "2", "&pound;"); ?></td>
												<td><?php echo pending("8", "$py", "2", "&pound;"); ?> <?php echo dead("8", "$py", "2", "&pound;"); ?></td>
											</tr>
											<tr>
												<td>Sep <?php echo allInvoices("9", "$py", "2", "&pound;"); ?> <?php echo allAdj("9", "$py", "2", "&pound;"); ?></td>
												<td><?php echo dif("9", "$py", "2", "&pound;"); ?> <?php echo allSend("9", "$py", "2", "&pound;"); ?></td>
												<td><?php echo recieved("9", "$py", "2", "&pound;"); ?></td>
												<td><?php echo pending("9", "$py", "2", "&pound;"); ?> <?php echo dead("9", "$py", "2", "&pound;"); ?></td>
											</tr>
											<tr>
												<td>Oct <?php echo allInvoices("10", "$py", "2", "&pound;"); ?> <?php echo allAdj("10", "$py", "2", "&pound;"); ?></td>
												<td><?php echo dif("10", "$py", "2", "&pound;"); ?> <?php echo allSend("10", "$py", "2", "&pound;"); ?></td>
												<td><?php echo recieved("10", "$py", "2", "&pound;"); ?></td>
												<td><?php echo pending("10", "$py", "2", "&pound;"); ?> <?php echo dead("10", "$py", "2", "&pound;"); ?></td>
											</tr>
											<tr>
												<td>Nov <?php echo allInvoices("11", "$py", "2", "&pound;"); ?> <?php echo allAdj("11", "$py", "2", "&pound;"); ?></td>
												<td><?php echo dif("11", "$py", "2", "&pound;"); ?> <?php echo allSend("11", "$py", "2", "&pound;"); ?></td>
												<td><?php echo recieved("11", "$py", "2", "&pound;"); ?></td>
												<td><?php echo pending("11", "$py", "2", "&pound;"); ?> <?php echo dead("11", "$py", "2", "&pound;"); ?></td>
											</tr>
											<tr>
												<td>Dec <?php echo allInvoices("12", "$py", "2", "&pound;"); ?> <?php echo allAdj("12", "$py", "2", "&pound;"); ?></td>
												<td><?php echo dif("12", "$py", "2", "&pound;"); ?> <?php echo allSend("12", "$py", "2", "&pound;"); ?></td>
												<td><?php echo recieved("12", "$py", "2", "&pound;"); ?></td>
												<td><?php echo pending("12", "$py", "2", "&pound;"); ?> <?php echo dead("12", "$py", "2", "&pound;"); ?></td>
											</tr>
											</tbody>
											</table>
										</div>
									</div>
									<div class="tab-pane" id="overview_11">
										<div class="table-responsive">
											<table class="table table-hover table-light">
											<thead>
											<tr class="uppercase">
												<th>
													 Month
												</th>
												<th>
													 Sent
												</th>
												<th>
													 Rec.
												</th>
												<th>
													Pen. 
												</th>
											</tr>
											</thead>
											<tbody>
											<tr>
												<td>Jan <?php echo allInvoices("1", "$py", "3", "AUD"); ?> <?php echo allAdj("1", "$py", "3", "AUD"); ?></td>
												<td><?php echo dif("1", "$py", "3", "AUD"); ?> <?php echo allSend("1", "$py", "3", "AUD"); ?></td>
												<td><?php echo recieved("1", "$py", "3", "AUD"); ?></td>
												<td><?php echo pending("1", "$py", "3", "AUD"); ?> <?php echo dead("1", "$py", "3", "AUD"); ?></td>
											</tr>
											<tr>
												<td>Feb <?php echo allInvoices("2", "$py", "3", "AUD"); ?> <?php echo allAdj("2", "$py", "3", "AUD"); ?></td>
												<td><?php echo dif("2", "$py", "3", "AUD"); ?> <?php echo allSend("2", "$py", "3", "AUD"); ?></td>
												<td><?php echo recieved("2", "$py", "3", "AUD"); ?></td>
												<td><?php echo pending("2", "$py", "3", "AUD"); ?> <?php echo dead("2", "$py", "3", "AUD"); ?></td>
											</tr>
											<tr>
												<td>Mar <?php echo allInvoices("3", "$py", "3", "AUD"); ?> <?php echo allAdj("3", "$py", "3", "AUD"); ?></td>
												<td><?php echo dif("3", "$py", "3", "AUD"); ?> <?php echo allSend("3", "$py", "3", "AUD"); ?></td>
												<td><?php echo recieved("3", "$py", "3", "AUD"); ?></td>
												<td><?php echo pending("3", "$py", "3", "AUD"); ?> <?php echo dead("3", "$py", "3", "AUD"); ?></td>
											</tr>
											<tr>
												<td>Apr <?php echo allInvoices("4", "$py", "3", "AUD"); ?> <?php echo allAdj("4", "$py", "3", "AUD"); ?></td>
												<td><?php echo dif("4", "$py", "3", "AUD"); ?> <?php echo allSend("4", "$py", "3", "AUD"); ?></td>
												<td><?php echo recieved("4", "$py", "3", "AUD"); ?></td>
												<td><?php echo pending("4", "$py", "3", "AUD"); ?> <?php echo dead("4", "$py", "3", "AUD"); ?></td>
											</tr>
											<tr>
												<td>May <?php echo allInvoices("5", "$py", "3", "AUD"); ?> <?php echo allAdj("5", "$py", "3", "AUD"); ?></td>
												<td><?php echo dif("5", "$py", "3", "AUD"); ?> <?php echo allSend("5", "$py", "3", "AUD"); ?></td>
												<td><?php echo recieved("5", "$py", "3", "AUD"); ?></td>
												<td><?php echo pending("5", "$py", "3", "AUD"); ?> <?php echo dead("5", "$py", "3", "AUD"); ?></td>
											</tr>
											<tr>
												<td>Jun <?php echo allInvoices("6", "$py", "3", "AUD"); ?> <?php echo allAdj("6", "$py", "3", "AUD"); ?></td>
												<td><?php echo dif("6", "$py", "3", "AUD"); ?> <?php echo allSend("6", "$py", "3", "AUD"); ?></td>
												<td><?php echo recieved("6", "$py", "3", "AUD"); ?></td>
												<td><?php echo pending("6", "$py", "3", "AUD"); ?> <?php echo dead("6", "$py", "3", "AUD"); ?></td>
											</tr>
											<tr>
												<td>Jul <?php echo allInvoices("7", "$py", "3", "AUD"); ?> <?php echo allAdj("7", "$py", "3", "AUD"); ?></td>
												<td><?php echo dif("7", "$py", "3", "AUD"); ?> <?php echo allSend("7", "$py", "3", "AUD"); ?></td>
												<td><?php echo recieved("7", "$py", "3", "AUD"); ?></td>
												<td><?php echo pending("7", "$py", "3", "AUD"); ?> <?php echo dead("7", "$py", "3", "AUD"); ?></td>
											</tr>
											<tr>
												<td>Aug <?php echo allInvoices("8", "$py", "3", "AUD"); ?> <?php echo allAdj("8", "$py", "3", "AUD"); ?></td>
												<td><?php echo dif("8", "$py", "3", "AUD"); ?> <?php echo allSend("8", "$py", "3", "AUD"); ?></td>
												<td><?php echo recieved("8", "$py", "3", "AUD"); ?></td>
												<td><?php echo pending("8", "$py", "3", "AUD"); ?> <?php echo dead("8", "$py", "3", "AUD"); ?></td>
											</tr>
											<tr>
												<td>Sep <?php echo allInvoices("9", "$py", "3", "AUD"); ?> <?php echo allAdj("9", "$py", "3", "AUD"); ?></td>
												<td><?php echo dif("9", "$py", "3", "AUD"); ?> <?php echo allSend("9", "$py", "3", "AUD"); ?></td>
												<td><?php echo recieved("9", "$py", "3", "AUD"); ?></td>
												<td><?php echo pending("9", "$py", "3", "AUD"); ?> <?php echo dead("9", "$py", "3", "AUD"); ?></td>
											</tr>
											<tr>
												<td>Oct <?php echo allInvoices("10", "$py", "3", "AUD"); ?> <?php echo allAdj("10", "$py", "3", "AUD"); ?></td>
												<td><?php echo dif("10", "$py", "3", "AUD"); ?> <?php echo allSend("10", "$py", "3", "AUD"); ?></td>
												<td><?php echo recieved("10", "$py", "3", "AUD"); ?></td>
												<td><?php echo pending("10", "$py", "3", "AUD"); ?> <?php echo dead("10", "$py", "3", "AUD"); ?></td>
											</tr>
											<tr>
												<td>Nov <?php echo allInvoices("11", "$py", "3", "AUD"); ?> <?php echo allAdj("11", "$py", "3", "AUD"); ?></td>
												<td><?php echo dif("11", "$py", "3", "AUD"); ?> <?php echo allSend("11", "$py", "3", "AUD"); ?></td>
												<td><?php echo recieved("11", "$py", "3", "AUD"); ?></td>
												<td><?php echo pending("11", "$py", "3", "AUD"); ?> <?php echo dead("11", "$py", "3", "AUD"); ?></td>
											</tr>
											<tr>
												<td>Dec <?php echo allInvoices("12", "$py", "3", "AUD"); ?> <?php echo allAdj("12", "$py", "3", "AUD"); ?></td>
												<td><?php echo dif("12", "$py", "3", "AUD"); ?> <?php echo allSend("12", "$py", "3", "AUD"); ?></td>
												<td><?php echo recieved("12", "$py", "3", "AUD"); ?></td>
												<td><?php echo pending("12", "$py", "3", "AUD"); ?> <?php echo dead("12", "$py", "3", "AUD"); ?></td>
											</tr>
											</tbody>
											</table>
										</div>
									</div>
									<div class="tab-pane" id="overview_12">
										<div class="table-responsive">
											<table class="table table-hover table-light">
											<thead>
											<tr class="uppercase">
												<th>
													 Month
												</th>
												<th>
													 Sent
												</th>
												<th>
													 Rec.
												</th>
												<th>
													Pen. 
												</th>
											</tr>
											</thead>
											<tbody>
											<tr>
												<td>Jan <?php echo allInvoices("1", "$py", "4", "EGP"); ?> <?php echo allAdj("1", "$py", "4", "EGP"); ?></td>
												<td><?php echo dif("1", "$py", "4", "EGP"); ?> <?php echo allSend("1", "$py", "4", "EGP"); ?></td>
												<td><?php echo recieved("1", "$py", "4", "EGP"); ?></td>
												<td><?php echo pending("1", "$py", "4", "EGP"); ?> <?php echo dead("1", "$py", "4", "EGP"); ?></td>
											</tr>
											<tr>
												<td>Feb <?php echo allInvoices("2", "$py", "4", "EGP"); ?> <?php echo allAdj("2", "$py", "4", "EGP"); ?></td>
												<td><?php echo dif("2", "$py", "4", "EGP"); ?> <?php echo allSend("2", "$py", "4", "EGP"); ?></td>
												<td><?php echo recieved("2", "$py", "4", "EGP"); ?></td>
												<td><?php echo pending("2", "$py", "4", "EGP"); ?> <?php echo dead("2", "$py", "4", "EGP"); ?></td>
											</tr>
											<tr>
												<td>Mar <?php echo allInvoices("3", "$py", "4", "EGP"); ?> <?php echo allAdj("3", "$py", "4", "EGP"); ?></td>
												<td><?php echo dif("3", "$py", "4", "EGP"); ?> <?php echo allSend("3", "$py", "4", "EGP"); ?></td>
												<td><?php echo recieved("3", "$py", "4", "EGP"); ?></td>
												<td><?php echo pending("3", "$py", "4", "EGP"); ?> <?php echo dead("3", "$py", "4", "EGP"); ?></td>
											</tr>
											<tr>
												<td>Apr <?php echo allInvoices("4", "$py", "4", "EGP"); ?> <?php echo allAdj("4", "$py", "4", "EGP"); ?></td>
												<td><?php echo dif("4", "$py", "4", "EGP"); ?> <?php echo allSend("4", "$py", "4", "EGP"); ?></td>
												<td><?php echo recieved("4", "$py", "4", "EGP"); ?></td>
												<td><?php echo pending("4", "$py", "4", "EGP"); ?> <?php echo dead("4", "$py", "4", "EGP"); ?></td>
											</tr>
											<tr>
												<td>May <?php echo allInvoices("5", "$py", "4", "EGP"); ?> <?php echo allAdj("5", "$py", "4", "EGP"); ?></td>
												<td><?php echo dif("5", "$py", "4", "EGP"); ?> <?php echo allSend("5", "$py", "4", "EGP"); ?></td>
												<td><?php echo recieved("5", "$py", "4", "EGP"); ?></td>
												<td><?php echo pending("5", "$py", "4", "EGP"); ?> <?php echo dead("5", "$py", "4", "EGP"); ?></td>
											</tr>
											<tr>
												<td>Jun <?php echo allInvoices("6", "$py", "4", "EGP"); ?> <?php echo allAdj("6", "$py", "4", "EGP"); ?></td>
												<td><?php echo dif("6", "$py", "4", "EGP"); ?> <?php echo allSend("6", "$py", "4", "EGP"); ?></td>
												<td><?php echo recieved("6", "$py", "4", "EGP"); ?></td>
												<td><?php echo pending("6", "$py", "4", "EGP"); ?> <?php echo dead("6", "$py", "4", "EGP"); ?></td>
											</tr>
											<tr>
												<td>Jul <?php echo allInvoices("7", "$py", "4", "EGP"); ?> <?php echo allAdj("7", "$py", "4", "EGP"); ?></td>
												<td><?php echo dif("7", "$py", "4", "EGP"); ?> <?php echo allSend("7", "$py", "4", "EGP"); ?></td>
												<td><?php echo recieved("7", "$py", "4", "EGP"); ?></td>
												<td><?php echo pending("7", "$py", "4", "EGP"); ?> <?php echo dead("7", "$py", "4", "EGP"); ?></td>
											</tr>
											<tr>
												<td>Aug <?php echo allInvoices("8", "$py", "4", "EGP"); ?> <?php echo allAdj("8", "$py", "4", "EGP"); ?></td>
												<td><?php echo dif("8", "$py", "4", "EGP"); ?> <?php echo allSend("8", "$py", "4", "EGP"); ?></td>
												<td><?php echo recieved("8", "$py", "4", "EGP"); ?></td>
												<td><?php echo pending("8", "$py", "4", "EGP"); ?> <?php echo dead("8", "$py", "4", "EGP"); ?></td>
											</tr>
											<tr>
												<td>Sep <?php echo allInvoices("9", "$py", "4", "EGP"); ?> <?php echo allAdj("9", "$py", "4", "EGP"); ?></td>
												<td><?php echo dif("9", "$py", "4", "EGP"); ?> <?php echo allSend("9", "$py", "4", "EGP"); ?></td>
												<td><?php echo recieved("9", "$py", "4", "EGP"); ?></td>
												<td><?php echo pending("9", "$py", "4", "EGP"); ?> <?php echo dead("9", "$py", "4", "EGP"); ?></td>
											</tr>
											<tr>
												<td>Oct <?php echo allInvoices("10", "$py", "4", "EGP"); ?> <?php echo allAdj("10", "$py", "4", "EGP"); ?></td>
												<td><?php echo dif("10", "$py", "4", "EGP"); ?> <?php echo allSend("10", "$py", "4", "EGP"); ?></td>
												<td><?php echo recieved("10", "$py", "4", "EGP"); ?></td>
												<td><?php echo pending("10", "$py", "4", "EGP"); ?> <?php echo dead("10", "$py", "4", "EGP"); ?></td>
											</tr>
											<tr>
												<td>Nov <?php echo allInvoices("11", "$py", "4", "EGP"); ?> <?php echo allAdj("11", "$py", "4", "EGP"); ?></td>
												<td><?php echo dif("11", "$py", "4", "EGP"); ?> <?php echo allSend("11", "$py", "4", "EGP"); ?></td>
												<td><?php echo recieved("11", "$py", "4", "EGP"); ?></td>
												<td><?php echo pending("11", "$py", "4", "EGP"); ?> <?php echo dead("11", "$py", "4", "EGP"); ?></td>
											</tr>
											<tr>
												<td>Dec <?php echo allInvoices("12", "$py", "4", "EGP"); ?> <?php echo allAdj("12", "$py", "4", "EGP"); ?></td>
												<td><?php echo dif("12", "$py", "4", "EGP"); ?> <?php echo allSend("12", "$py", "4", "EGP"); ?></td>
												<td><?php echo recieved("12", "$py", "4", "EGP"); ?></td>
												<td><?php echo pending("12", "$py", "4", "EGP"); ?> <?php echo dead("12", "$py", "4", "EGP"); ?></td>
											</tr>
											</tbody>
											</table>
										</div>
									</div>
									<div class="tab-pane" id="overview_13">
										<div class="table-responsive">
											<table class="table table-hover table-light">
											<thead>
											<tr class="uppercase">
												<th>
													 Month
												</th>
												<th>
													 Sent
												</th>
												<th>
													 Rec.
												</th>
												<th>
													Pen. 
												</th>
											</tr>
											</thead>
											<tbody>
											<tr>
												<td>Jan <?php echo allInvoices("1", "$py", "5", "CAD"); ?> <?php echo allAdj("1", "$py", "5", "CAD"); ?></td>
												<td><?php echo dif("1", "$py", "5", "CAD"); ?> <?php echo allSend("1", "$py", "5", "CAD"); ?></td>
												<td><?php echo recieved("1", "$py", "5", "CAD"); ?></td>
												<td><?php echo pending("1", "$py", "5", "CAD"); ?> <?php echo dead("1", "$py", "5", "CAD"); ?></td>
											</tr>
											<tr>
												<td>Feb <?php echo allInvoices("2", "$py", "5", "CAD"); ?> <?php echo allAdj("2", "$py", "5", "CAD"); ?></td>
												<td><?php echo dif("2", "$py", "5", "CAD"); ?> <?php echo allSend("2", "$py", "5", "CAD"); ?></td>
												<td><?php echo recieved("2", "$py", "5", "CAD"); ?></td>
												<td><?php echo pending("2", "$py", "5", "CAD"); ?> <?php echo dead("2", "$py", "5", "CAD"); ?></td>
											</tr>
											<tr>
												<td>Mar <?php echo allInvoices("3", "$py", "5", "CAD"); ?> <?php echo allAdj("3", "$py", "5", "CAD"); ?></td>
												<td><?php echo dif("3", "$py", "5", "CAD"); ?> <?php echo allSend("3", "$py", "5", "CAD"); ?></td>
												<td><?php echo recieved("3", "$py", "5", "CAD"); ?></td>
												<td><?php echo pending("3", "$py", "5", "CAD"); ?> <?php echo dead("3", "$py", "5", "CAD"); ?></td>
											</tr>
											<tr>
												<td>Apr <?php echo allInvoices("4", "$py", "5", "CAD"); ?> <?php echo allAdj("4", "$py", "5", "CAD"); ?></td>
												<td><?php echo dif("4", "$py", "5", "CAD"); ?> <?php echo allSend("4", "$py", "5", "CAD"); ?></td>
												<td><?php echo recieved("4", "$py", "5", "CAD"); ?></td>
												<td><?php echo pending("4", "$py", "5", "CAD"); ?> <?php echo dead("4", "$py", "5", "CAD"); ?></td>
											</tr>
											<tr>
												<td>May <?php echo allInvoices("5", "$py", "5", "CAD"); ?> <?php echo allAdj("5", "$py", "5", "CAD"); ?></td>
												<td><?php echo dif("5", "$py", "5", "CAD"); ?> <?php echo allSend("5", "$py", "5", "CAD"); ?></td>
												<td><?php echo recieved("5", "$py", "5", "CAD"); ?></td>
												<td><?php echo pending("5", "$py", "5", "CAD"); ?> <?php echo dead("5", "$py", "5", "CAD"); ?></td>
											</tr>
											<tr>
												<td>Jun <?php echo allInvoices("6", "$py", "5", "CAD"); ?> <?php echo allAdj("6", "$py", "5", "CAD"); ?></td>
												<td><?php echo dif("6", "$py", "5", "CAD"); ?> <?php echo allSend("6", "$py", "5", "CAD"); ?></td>
												<td><?php echo recieved("6", "$py", "5", "CAD"); ?></td>
												<td><?php echo pending("6", "$py", "5", "CAD"); ?> <?php echo dead("6", "$py", "5", "CAD"); ?></td>
											</tr>
											<tr>
												<td>Jul <?php echo allInvoices("7", "$py", "5", "CAD"); ?> <?php echo allAdj("7", "$py", "5", "CAD"); ?></td>
												<td><?php echo dif("7", "$py", "5", "CAD"); ?> <?php echo allSend("7", "$py", "5", "CAD"); ?></td>
												<td><?php echo recieved("7", "$py", "5", "CAD"); ?></td>
												<td><?php echo pending("7", "$py", "5", "CAD"); ?> <?php echo dead("7", "$py", "5", "CAD"); ?></td>
											</tr>
											<tr>
												<td>Aug <?php echo allInvoices("8", "$py", "5", "CAD"); ?> <?php echo allAdj("8", "$py", "5", "CAD"); ?></td>
												<td><?php echo dif("8", "$py", "5", "CAD"); ?> <?php echo allSend("8", "$py", "5", "CAD"); ?></td>
												<td><?php echo recieved("8", "$py", "5", "CAD"); ?></td>
												<td><?php echo pending("8", "$py", "5", "CAD"); ?> <?php echo dead("8", "$py", "5", "CAD"); ?></td>
											</tr>
											<tr>
												<td>Sep <?php echo allInvoices("9", "$py", "5", "CAD"); ?> <?php echo allAdj("9", "$py", "5", "CAD"); ?></td>
												<td><?php echo dif("9", "$py", "5", "CAD"); ?> <?php echo allSend("9", "$py", "5", "CAD"); ?></td>
												<td><?php echo recieved("9", "$py", "5", "CAD"); ?></td>
												<td><?php echo pending("9", "$py", "5", "CAD"); ?> <?php echo dead("9", "$py", "5", "CAD"); ?></td>
											</tr>
											<tr>
												<td>Oct <?php echo allInvoices("10", "$py", "5", "CAD"); ?> <?php echo allAdj("10", "$py", "5", "CAD"); ?></td>
												<td><?php echo dif("10", "$py", "5", "CAD"); ?> <?php echo allSend("10", "$py", "5", "CAD"); ?></td>
												<td><?php echo recieved("10", "$py", "5", "CAD"); ?></td>
												<td><?php echo pending("10", "$py", "5", "CAD"); ?> <?php echo dead("10", "$py", "5", "CAD"); ?></td>
											</tr>
											<tr>
												<td>Nov <?php echo allInvoices("11", "$py", "5", "CAD"); ?> <?php echo allAdj("11", "$py", "5", "CAD"); ?></td>
												<td><?php echo dif("11", "$py", "5", "CAD"); ?> <?php echo allSend("11", "$py", "5", "CAD"); ?></td>
												<td><?php echo recieved("11", "$py", "5", "CAD"); ?></td>
												<td><?php echo pending("11", "$py", "5", "CAD"); ?> <?php echo dead("11", "$py", "5", "CAD"); ?></td>
											</tr>
											<tr>
												<td>Dec <?php echo allInvoices("12", "$py", "5", "CAD"); ?> <?php echo allAdj("12", "$py", "5", "CAD"); ?></td>
												<td><?php echo dif("12", "$py", "5", "CAD"); ?> <?php echo allSend("12", "$py", "5", "CAD"); ?></td>
												<td><?php echo recieved("12", "$py", "5", "CAD"); ?></td>
												<td><?php echo pending("12", "$py", "5", "CAD"); ?> <?php echo dead("12", "$py", "5", "CAD"); ?></td>
											</tr>
											</tbody>
											</table>
										</div>
									</div>
									<div class="tab-pane" id="overview_14">
										<div class="table-responsive">
											<table class="table table-hover table-light">
											<thead>
											<tr class="uppercase">
												<th>
													 Month
												</th>
												<th>
													 Sent
												</th>
												<th>
													 Rec.
												</th>
												<th>
													Pen. 
												</th>
											</tr>
											</thead>
											<tbody>
											<tr>
												<td>Jan <?php echo allInvoices("1", "$py", "6", "EUR"); ?> <?php echo allAdj("1", "$py", "6", "EUR"); ?></td>
												<td><?php echo dif("1", "$py", "6", "EUR"); ?> <?php echo allSend("1", "$py", "6", "EUR"); ?></td>
												<td><?php echo recieved("1", "$py", "6", "EUR"); ?></td>
												<td><?php echo pending("1", "$py", "6", "EUR"); ?> <?php echo dead("1", "$py", "6", "EUR"); ?></td>
											</tr>
											<tr>
												<td>Feb <?php echo allInvoices("2", "$py", "6", "EUR"); ?> <?php echo allAdj("2", "$py", "6", "EUR"); ?></td>
												<td><?php echo dif("2", "$py", "6", "EUR"); ?> <?php echo allSend("2", "$py", "6", "EUR"); ?></td>
												<td><?php echo recieved("2", "$py", "6", "EUR"); ?></td>
												<td><?php echo pending("2", "$py", "6", "EUR"); ?> <?php echo dead("2", "$py", "6", "EUR"); ?></td>
											</tr>
											<tr>
												<td>Mar <?php echo allInvoices("3", "$py", "6", "EUR"); ?> <?php echo allAdj("3", "$py", "6", "EUR"); ?></td>
												<td><?php echo dif("3", "$py", "6", "EUR"); ?> <?php echo allSend("3", "$py", "6", "EUR"); ?></td>
												<td><?php echo recieved("3", "$py", "6", "EUR"); ?></td>
												<td><?php echo pending("3", "$py", "6", "EUR"); ?> <?php echo dead("3", "$py", "6", "EUR"); ?></td>
											</tr>
											<tr>
												<td>Apr <?php echo allInvoices("4", "$py", "6", "EUR"); ?> <?php echo allAdj("4", "$py", "6", "EUR"); ?></td>
												<td><?php echo dif("4", "$py", "6", "EUR"); ?> <?php echo allSend("4", "$py", "6", "EUR"); ?></td>
												<td><?php echo recieved("4", "$py", "6", "EUR"); ?></td>
												<td><?php echo pending("4", "$py", "6", "EUR"); ?> <?php echo dead("4", "$py", "6", "EUR"); ?></td>
											</tr>
											<tr>
												<td>May <?php echo allInvoices("5", "$py", "6", "EUR"); ?> <?php echo allAdj("5", "$py", "6", "EUR"); ?></td>
												<td><?php echo dif("5", "$py", "6", "EUR"); ?> <?php echo allSend("5", "$py", "6", "EUR"); ?></td>
												<td><?php echo recieved("5", "$py", "6", "EUR"); ?></td>
												<td><?php echo pending("5", "$py", "6", "EUR"); ?> <?php echo dead("5", "$py", "6", "EUR"); ?></td>
											</tr>
											<tr>
												<td>Jun <?php echo allInvoices("6", "$py", "6", "EUR"); ?> <?php echo allAdj("6", "$py", "6", "EUR"); ?></td>
												<td><?php echo dif("6", "$py", "6", "EUR"); ?> <?php echo allSend("6", "$py", "6", "EUR"); ?></td>
												<td><?php echo recieved("6", "$py", "6", "EUR"); ?></td>
												<td><?php echo pending("6", "$py", "6", "EUR"); ?> <?php echo dead("6", "$py", "6", "EUR"); ?></td>
											</tr>
											<tr>
												<td>Jul <?php echo allInvoices("7", "$py", "6", "EUR"); ?> <?php echo allAdj("7", "$py", "6", "EUR"); ?></td>
												<td><?php echo dif("7", "$py", "6", "EUR"); ?> <?php echo allSend("7", "$py", "6", "EUR"); ?></td>
												<td><?php echo recieved("7", "$py", "6", "EUR"); ?></td>
												<td><?php echo pending("7", "$py", "6", "EUR"); ?> <?php echo dead("7", "$py", "6", "EUR"); ?></td>
											</tr>
											<tr>
												<td>Aug <?php echo allInvoices("8", "$py", "6", "EUR"); ?> <?php echo allAdj("8", "$py", "6", "EUR"); ?></td>
												<td><?php echo dif("8", "$py", "6", "EUR"); ?> <?php echo allSend("8", "$py", "6", "EUR"); ?></td>
												<td><?php echo recieved("8", "$py", "6", "EUR"); ?></td>
												<td><?php echo pending("8", "$py", "6", "EUR"); ?> <?php echo dead("8", "$py", "6", "EUR"); ?></td>
											</tr>
											<tr>
												<td>Sep <?php echo allInvoices("9", "$py", "6", "EUR"); ?> <?php echo allAdj("9", "$py", "6", "EUR"); ?></td>
												<td><?php echo dif("9", "$py", "6", "EUR"); ?> <?php echo allSend("9", "$py", "6", "EUR"); ?></td>
												<td><?php echo recieved("9", "$py", "6", "EUR"); ?></td>
												<td><?php echo pending("9", "$py", "6", "EUR"); ?> <?php echo dead("9", "$py", "6", "EUR"); ?></td>
											</tr>
											<tr>
												<td>Oct <?php echo allInvoices("10", "$py", "6", "EUR"); ?> <?php echo allAdj("10", "$py", "6", "EUR"); ?></td>
												<td><?php echo dif("10", "$py", "6", "EUR"); ?> <?php echo allSend("10", "$py", "6", "EUR"); ?></td>
												<td><?php echo recieved("10", "$py", "6", "EUR"); ?></td>
												<td><?php echo pending("10", "$py", "6", "EUR"); ?> <?php echo dead("10", "$py", "6", "EUR"); ?></td>
											</tr>
											<tr>
												<td>Nov <?php echo allInvoices("11", "$py", "6", "EUR"); ?> <?php echo allAdj("11", "$py", "6", "EUR"); ?></td>
												<td><?php echo dif("11", "$py", "6", "EUR"); ?> <?php echo allSend("11", "$py", "6", "EUR"); ?></td>
												<td><?php echo recieved("11", "$py", "6", "EUR"); ?></td>
												<td><?php echo pending("11", "$py", "6", "EUR"); ?> <?php echo dead("11", "$py", "6", "EUR"); ?></td>
											</tr>
											<tr>
												<td>Dec <?php echo allInvoices("12", "$py", "6", "EUR"); ?> <?php echo allAdj("12", "$py", "6", "EUR"); ?></td>
												<td><?php echo dif("12", "$py", "6", "EUR"); ?> <?php echo allSend("12", "$py", "6", "EUR"); ?></td>
												<td><?php echo recieved("12", "$py", "6", "EUR"); ?></td>
												<td><?php echo pending("12", "$py", "6", "EUR"); ?> <?php echo dead("12", "$py", "6", "EUR"); ?></td>
											</tr>
											</tbody>
											</table>
										</div>
									</div>
									<div class="tab-pane" id="overview_15">
										<div class="table-responsive">
											<table class="table table-hover table-light">
											<thead>
											<tr class="uppercase">
												<th>
													 Month
												</th>
												<th>
													 Sent
												</th>
												<th>
													 Rec.
												</th>
												<th>
													Pen. 
												</th>
											</tr>
											</thead>
											<tbody>
											<tr>
												<td>Jan <?php echo allInvoices("1", "$py", "7", "NZD"); ?> <?php echo allAdj("1", "$py", "7", "NZD"); ?></td>
												<td><?php echo dif("1", "$py", "7", "NZD"); ?> <?php echo allSend("1", "$py", "7", "NZD"); ?></td>
												<td><?php echo recieved("1", "$py", "7", "NZD"); ?></td>
												<td><?php echo pending("1", "$py", "7", "NZD"); ?> <?php echo dead("1", "$py", "7", "NZD"); ?></td>
											</tr>
											<tr>
												<td>Feb <?php echo allInvoices("2", "$py", "7", "NZD"); ?> <?php echo allAdj("2", "$py", "7", "NZD"); ?></td>
												<td><?php echo dif("2", "$py", "7", "NZD"); ?> <?php echo allSend("2", "$py", "7", "NZD"); ?></td>
												<td><?php echo recieved("2", "$py", "7", "NZD"); ?></td>
												<td><?php echo pending("2", "$py", "7", "NZD"); ?> <?php echo dead("2", "$py", "7", "NZD"); ?></td>
											</tr>
											<tr>
												<td>Mar <?php echo allInvoices("3", "$py", "7", "NZD"); ?> <?php echo allAdj("3", "$py", "7", "NZD"); ?></td>
												<td><?php echo dif("3", "$py", "7", "NZD"); ?> <?php echo allSend("3", "$py", "7", "NZD"); ?></td>
												<td><?php echo recieved("3", "$py", "7", "NZD"); ?></td>
												<td><?php echo pending("3", "$py", "7", "NZD"); ?> <?php echo dead("3", "$py", "7", "NZD"); ?></td>
											</tr>
											<tr>
												<td>Apr <?php echo allInvoices("4", "$py", "7", "NZD"); ?> <?php echo allAdj("4", "$py", "7", "NZD"); ?></td>
												<td><?php echo dif("4", "$py", "7", "NZD"); ?> <?php echo allSend("4", "$py", "7", "NZD"); ?></td>
												<td><?php echo recieved("4", "$py", "7", "NZD"); ?></td>
												<td><?php echo pending("4", "$py", "7", "NZD"); ?> <?php echo dead("4", "$py", "7", "NZD"); ?></td>
											</tr>
											<tr>
												<td>May <?php echo allInvoices("5", "$py", "7", "NZD"); ?> <?php echo allAdj("5", "$py", "7", "NZD"); ?></td>
												<td><?php echo dif("5", "$py", "7", "NZD"); ?> <?php echo allSend("5", "$py", "7", "NZD"); ?></td>
												<td><?php echo recieved("5", "$py", "7", "NZD"); ?></td>
												<td><?php echo pending("5", "$py", "7", "NZD"); ?> <?php echo dead("5", "$py", "7", "NZD"); ?></td>
											</tr>
											<tr>
												<td>Jun <?php echo allInvoices("6", "$py", "7", "NZD"); ?> <?php echo allAdj("7", "$py", "7", "NZD"); ?></td>
												<td><?php echo dif("6", "$py", "7", "NZD"); ?> <?php echo allSend("6", "$py", "7", "NZD"); ?></td>
												<td><?php echo recieved("6", "$py", "7", "NZD"); ?></td>
												<td><?php echo pending("6", "$py", "7", "NZD"); ?> <?php echo dead("6", "$py", "7", "NZD"); ?></td>
											</tr>
											<tr>
												<td>Jul <?php echo allInvoices("7", "$py", "7", "NZD"); ?> <?php echo allAdj("7", "$py", "7", "NZD"); ?></td>
												<td><?php echo dif("7", "$py", "7", "NZD"); ?> <?php echo allSend("7", "$py", "7", "NZD"); ?></td>
												<td><?php echo recieved("7", "$py", "7", "NZD"); ?></td>
												<td><?php echo pending("7", "$py", "7", "NZD"); ?> <?php echo dead("7", "$py", "7", "NZD"); ?></td>
											</tr>
											<tr>
												<td>Aug <?php echo allInvoices("8", "$py", "7", "NZD"); ?> <?php echo allAdj("8", "$py", "7", "NZD"); ?></td>
												<td><?php echo dif("8", "$py", "7", "NZD"); ?> <?php echo allSend("8", "$py", "7", "NZD"); ?></td>
												<td><?php echo recieved("8", "$py", "7", "NZD"); ?></td>
												<td><?php echo pending("8", "$py", "7", "NZD"); ?> <?php echo dead("8", "$py", "7", "NZD"); ?></td>
											</tr>
											<tr>
												<td>Sep <?php echo allInvoices("9", "$py", "7", "NZD"); ?> <?php echo allAdj("9", "$py", "7", "NZD"); ?></td>
												<td><?php echo dif("9", "$py", "7", "NZD"); ?> <?php echo allSend("9", "$py", "7", "NZD"); ?></td>
												<td><?php echo recieved("9", "$py", "7", "NZD"); ?></td>
												<td><?php echo pending("9", "$py", "7", "NZD"); ?> <?php echo dead("9", "$py", "7", "NZD"); ?></td>
											</tr>
											<tr>
												<td>Oct <?php echo allInvoices("10", "$py", "7", "NZD"); ?> <?php echo allAdj("10", "$py", "7", "NZD"); ?></td>
												<td><?php echo dif("10", "$py", "7", "NZD"); ?> <?php echo allSend("10", "$py", "7", "NZD"); ?></td>
												<td><?php echo recieved("10", "$py", "7", "NZD"); ?></td>
												<td><?php echo pending("10", "$py", "7", "NZD"); ?> <?php echo dead("10", "$py", "7", "NZD"); ?></td>
											</tr>
											<tr>
												<td>Nov <?php echo allInvoices("11", "$py", "7", "NZD"); ?> <?php echo allAdj("11", "$py", "7", "NZD"); ?></td>
												<td><?php echo dif("11", "$py", "7", "NZD"); ?> <?php echo allSend("11", "$py", "7", "NZD"); ?></td>
												<td><?php echo recieved("11", "$py", "7", "NZD"); ?></td>
												<td><?php echo pending("11", "$py", "7", "NZD"); ?> <?php echo dead("11", "$py", "7", "NZD"); ?></td>
											</tr>
											<tr>
												<td>Dec <?php echo allInvoices("12", "$py", "7", "NZD"); ?> <?php echo allAdj("12", "$py", "7", "NZD"); ?></td>
												<td><?php echo dif("12", "$py", "7", "NZD"); ?> <?php echo allSend("12", "$py", "7", "NZD"); ?></td>
												<td><?php echo recieved("12", "$py", "7", "NZD"); ?></td>
												<td><?php echo pending("12", "$py", "7", "NZD"); ?> <?php echo dead("12", "$py", "7", "NZD"); ?></td>
											</tr>
											</tbody>
											</table>
										</div>
									</div>
									<div class="tab-pane" id="overview_16">
										<div class="table-responsive">
											<table class="table table-hover table-light">
											<thead>
											<tr class="uppercase">
												<th>
													 Month
												</th>
												<th>
													 Sent
												</th>
												<th>
													 Rec.
												</th>
												<th>
													Pen. 
												</th>
											</tr>
											</thead>
											<tbody>
											<tr>
												<td>Jan <?php echo allInvoices("1", "$py", "8", "AED"); ?> <?php echo allAdj("1", "$py", "8", "AED"); ?></td>
												<td><?php echo dif("1", "$py", "8", "AED"); ?> <?php echo allSend("1", "$py", "8", "AED"); ?></td>
												<td><?php echo recieved("1", "$py", "8", "AED"); ?></td>
												<td><?php echo pending("1", "$py", "8", "AED"); ?> <?php echo dead("1", "$py", "8", "AED"); ?></td>
											</tr>
											<tr>
												<td>Feb <?php echo allInvoices("2", "$py", "8", "AED"); ?> <?php echo allAdj("2", "$py", "8", "AED"); ?></td>
												<td><?php echo dif("2", "$py", "8", "AED"); ?> <?php echo allSend("2", "$py", "8", "AED"); ?></td>
												<td><?php echo recieved("2", "$py", "8", "AED"); ?></td>
												<td><?php echo pending("2", "$py", "8", "AED"); ?> <?php echo dead("2", "$py", "8", "AED"); ?></td>
											</tr>
											<tr>
												<td>Mar <?php echo allInvoices("3", "$py", "8", "AED"); ?> <?php echo allAdj("3", "$py", "8", "AED"); ?></td>
												<td><?php echo dif("3", "$py", "8", "AED"); ?> <?php echo allSend("3", "$py", "8", "AED"); ?></td>
												<td><?php echo recieved("3", "$py", "8", "AED"); ?></td>
												<td><?php echo pending("3", "$py", "8", "AED"); ?> <?php echo dead("3", "$py", "8", "AED"); ?></td>
											</tr>
											<tr>
												<td>Apr <?php echo allInvoices("4", "$py", "8", "AED"); ?> <?php echo allAdj("4", "$py", "8", "AED"); ?></td>
												<td><?php echo dif("4", "$py", "8", "AED"); ?> <?php echo allSend("4", "$py", "8", "AED"); ?></td>
												<td><?php echo recieved("4", "$py", "8", "AED"); ?></td>
												<td><?php echo pending("4", "$py", "8", "AED"); ?> <?php echo dead("4", "$py", "8", "AED"); ?></td>
											</tr>
											<tr>
												<td>May <?php echo allInvoices("5", "$py", "8", "AED"); ?> <?php echo allAdj("5", "$py", "8", "AED"); ?></td>
												<td><?php echo dif("5", "$py", "8", "AED"); ?> <?php echo allSend("5", "$py", "8", "AED"); ?></td>
												<td><?php echo recieved("5", "$py", "8", "AED"); ?></td>
												<td><?php echo pending("5", "$py", "8", "AED"); ?> <?php echo dead("5", "$py", "8", "AED"); ?></td>
											</tr>
											<tr>
												<td>Jun <?php echo allInvoices("6", "$py", "8", "AED"); ?> <?php echo allAdj("8", "$py", "8", "AED"); ?></td>
												<td><?php echo dif("6", "$py", "8", "AED"); ?> <?php echo allSend("6", "$py", "8", "AED"); ?></td>
												<td><?php echo recieved("6", "$py", "8", "AED"); ?></td>
												<td><?php echo pending("6", "$py", "8", "AED"); ?> <?php echo dead("6", "$py", "8", "AED"); ?></td>
											</tr>
											<tr>
												<td>Jul <?php echo allInvoices("7", "$py", "8", "AED"); ?> <?php echo allAdj("7", "$py", "8", "AED"); ?></td>
												<td><?php echo dif("7", "$py", "8", "AED"); ?> <?php echo allSend("7", "$py", "8", "AED"); ?></td>
												<td><?php echo recieved("7", "$py", "8", "AED"); ?></td>
												<td><?php echo pending("7", "$py", "8", "AED"); ?> <?php echo dead("7", "$py", "8", "AED"); ?></td>
											</tr>
											<tr>
												<td>Aug <?php echo allInvoices("8", "$py", "8", "AED"); ?> <?php echo allAdj("8", "$py", "8", "AED"); ?></td>
												<td><?php echo dif("8", "$py", "8", "AED"); ?> <?php echo allSend("8", "$py", "8", "AED"); ?></td>
												<td><?php echo recieved("8", "$py", "8", "AED"); ?></td>
												<td><?php echo pending("8", "$py", "8", "AED"); ?> <?php echo dead("8", "$py", "8", "AED"); ?></td>
											</tr>
											<tr>
												<td>Sep <?php echo allInvoices("9", "$py", "8", "AED"); ?> <?php echo allAdj("9", "$py", "8", "AED"); ?></td>
												<td><?php echo dif("9", "$py", "8", "AED"); ?> <?php echo allSend("9", "$py", "8", "AED"); ?></td>
												<td><?php echo recieved("9", "$py", "8", "AED"); ?></td>
												<td><?php echo pending("9", "$py", "8", "AED"); ?> <?php echo dead("9", "$py", "8", "AED"); ?></td>
											</tr>
											<tr>
												<td>Oct <?php echo allInvoices("10", "$py", "8", "AED"); ?> <?php echo allAdj("10", "$py", "8", "AED"); ?></td>
												<td><?php echo dif("10", "$py", "8", "AED"); ?> <?php echo allSend("10", "$py", "8", "AED"); ?></td>
												<td><?php echo recieved("10", "$py", "8", "AED"); ?></td>
												<td><?php echo pending("10", "$py", "8", "AED"); ?> <?php echo dead("10", "$py", "8", "AED"); ?></td>
											</tr>
											<tr>
												<td>Nov <?php echo allInvoices("11", "$py", "8", "AED"); ?> <?php echo allAdj("11", "$py", "8", "AED"); ?></td>
												<td><?php echo dif("11", "$py", "8", "AED"); ?> <?php echo allSend("11", "$py", "8", "AED"); ?></td>
												<td><?php echo recieved("11", "$py", "8", "AED"); ?></td>
												<td><?php echo pending("11", "$py", "8", "AED"); ?> <?php echo dead("11", "$py", "8", "AED"); ?></td>
											</tr>
											<tr>
												<td>Dec <?php echo allInvoices("12", "$py", "8", "AED"); ?> <?php echo allAdj("12", "$py", "8", "AED"); ?></td>
												<td><?php echo dif("12", "$py", "8", "AED"); ?> <?php echo allSend("12", "$py", "8", "AED"); ?></td>
												<td><?php echo recieved("12", "$py", "8", "AED"); ?></td>
												<td><?php echo pending("12", "$py", "8", "AED"); ?> <?php echo dead("12", "$py", "8", "AED"); ?></td>
											</tr>
											</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- End: life time stats -->
				</div>
			</div>
			<!-- END PAGE CONTENT INNER -->
		</div>
	</div>
	<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->
<?php echo $fot; ?>