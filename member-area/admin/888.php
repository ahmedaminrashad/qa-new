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
  include("header-main.php");
  $link = $_SERVER['REQUEST_URI'];
date_default_timezone_set("Africa/Cairo");
$date = date('d/m/Y', time());
$m =$_REQUEST['mon'];
$y =$_REQUEST['year'];
$cuid =$_REQUEST['cur'];
$cname =$_REQUEST['currency_name'];
function abc2($er)
{
// sending query
   $result = mysql_query("SELECT * FROM invoice Where parent_id = $er and status = 1");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$tnumberOfRows = MYSQL_NUMROWS($result);
echo $tnumberOfRows;
}
function family_status($h){
$result = mysql_query("select * from account where parent_id = '$h'");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
If ($numberOfRows == 0) 
	{
	echo '';
	}
else if ($numberOfRows > 0) 
	{
	$i=0;
	while ($i<$numberOfRows)
		{		
				$en_name = MYSQL_RESULT($result,$i,"active");
				$en_type = MYSQL_RESULT($result,$i,"invoice_type");
				if($en_name =='11') 
				{
					$level ='<span class="label label-sm label-warning"><strong>On Trial</strong></span>';
				}
			elseif($en_name =='7')
				{
					$level ='<span class="label label-sm label-info"><strong>On Leave</strong></span>';
				}		
			elseif($en_name =='3')
				{
					$level ='<span class="label label-sm label-danger"><strong>Deactived</strong></span>';
				}
			elseif($en_name =='17')
				{
					$level ='<span class="label label-sm label-danger"><strong>Suspended</strong></span>';
				}
			else
				{
					$level ='<span class="label label-sm label-success"><strong>Regular</strong></span>';
				}
			if ($en_type == '2')
				{
					$rec = '<span class="label label-sm label-success"><strong>R</strong></span>';
				}
			else {
					$rec = '<span class="label label-sm label-warning"><strong>M</strong></span>';
					}
				echo ''.$level.' '.$rec.'';
$i++;		
		}
	}
}
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
				<h1>Invoice Details<small> <?php $result = mysql_query("SELECT * FROM month WHERE month_id = $m");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
$pidm = MYSQL_RESULT($result,$i,"month_name");
echo $pidm; ?> -
<?php $result = mysql_query("SELECT * FROM school_yr WHERE year_id = $y");
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
				<li>
					<a href="invoice-details">Invoice Details</a><i class="fa fa-circle"></i>
				</li>
				<li class="active">
					 <?php $result = mysql_query("SELECT * FROM month WHERE month_id = $m");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
$pidm = MYSQL_RESULT($result,$i,"month_name");
echo $pidm ?> -
<?php $result = mysql_query("SELECT * FROM school_yr WHERE year_id = $y");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
$pidm = MYSQL_RESULT($result,$i,"school_year");
echo $pidm ?>
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN SAMPLE TABLE PORTLET-->
					<div class="portlet light">
					<h4>Invoice details for the month of <font color="#44B6AE"> <b><?php $result = mysql_query("SELECT * FROM month WHERE month_id = $m");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
$pidm = MYSQL_RESULT($result,$i,"month_name");
echo $pidm ?> -
<?php $result = mysql_query("SELECT * FROM school_yr WHERE year_id = $y");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
$pidm = MYSQL_RESULT($result,$i,"school_year");
echo $pidm ?></b></font></h4>
						<div class="portlet-title">

															<a href="888?mon=<?php echo $m; ?>&year=<?php echo $y; ?>&cur=<?php echo $cuid; ?>&currency_name=<?php echo $cname; ?>" class="btn blue"><i class="fa fa-user"></i>Total (<?php
// sending query
$result = mysql_query("SELECT * FROM invoice WHERE mon_id = $m and y_id = $y and currency_id = $cuid");
if (!$result)
	{
    die("Total Problem");
	}
$tnumberOfRows = MYSQL_NUMROWS($result);
echo $tnumberOfRows; ?> -- <?php
$sql = "select sum(fee) from invoice where mon_id = $m and y_id = $y and currency_id = $cuid";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$fee = $row[0];
$sql = "select sum(invoice_add) from invoice where mon_id = $m and y_id = $y and currency_id = $cuid";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$addfee = $row[0];
$finalFee = $fee+$addfee;
echo $cname; echo $finalFee;
?>)</a>
															<a href="8881.php?mon=<?php echo $m; ?>&stu=2&year=<?php echo $y; ?>&cur=<?php echo $cuid; ?>&currency_name=<?php echo $cname; ?>" class="btn green"><i class="fa fa-user"></i>Total Paid (<?php
// sending query
$result = mysql_query("SELECT * FROM invoice WHERE mon_id = $m and y_id = $y and currency_id = $cuid  and status = 2");
if (!$result)
	{
    die("Query to show fields from table failed");
	}
$tnumberOfRows = MYSQL_NUMROWS($result);
echo $tnumberOfRows; ?> -- <?php
$sql = "select sum(fee) from invoice where status = 2 and mon_id = $m and y_id = $y and currency_id = $cuid";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$fee = $row[0];
$sql = "select sum(invoice_add) from invoice where status = 2 and mon_id = $m and y_id = $y and currency_id = $cuid";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$addfee = $row[0];
$finalFee = $fee+$addfee;
echo $cname; echo $finalFee;
?>)</a>
															<a href="8881.php?mon=<?php echo $m; ?>&stu=1&year=<?php echo $y; ?>&cur=<?php echo $cuid; ?>&currency_name=<?php echo $cname; ?>" class="btn red"><i class="fa fa-chain-broken"></i>Total Unpaid (<?php
// sending query
$result = mysql_query("SELECT * FROM invoice WHERE mon_id = $m and y_id = $y and currency_id = $cuid  and status = 1");
if (!$result)
	{
    die("Query to show fields from table failed");
	}
$tnumberOfRows = MYSQL_NUMROWS($result);
echo $tnumberOfRows; ?> -- <?php
$sql = "select sum(fee+invoice_add) from invoice where status = 1 and mon_id = $m and y_id = $y and currency_id = $cuid";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
echo $cname; echo $row[0];
?>)</a>
						</div>
						<div class="portlet-body">
							<div id="mytable" class="table-responsive">
								<table class="table table-hover">
								<thead>
								<tr>
								<th>
									 &nbsp;
								</th>
								<th>
									 Name
								</th>
								<th>
									 Contry
								</th>
								<th>
									 Fee
								</th>
								<th>
									 Adj.
								</th>
								<th>
									 Pay.
								</th>
								<th>
									 Due Date
								</th>
								<th>
									 &nbsp;
								</th>
								<th>
									 &nbsp;
								</th>
								<th>
									 &nbsp;
								</th>
								<th>
									 &nbsp;
								</th>
								<?php 
// sending query
$result = mysql_query("SELECT `invoice`.*, `month`.`month_name`, `statusp`.`name`, `country`.`c_name` FROM `invoice`,`month`,`statusp`,`country` WHERE invoice.mon_id=month.month_id and invoice.status=statusp.s_id and invoice.c_id=country.c_id HAVING mon_id = $m and y_id = $y and currency_id = $cuid ORDER BY py_id");
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
	while($row = mysql_fetch_array($result))
		{		
			if($row['status']=='1') 
				{
					$bgcolor ='#FE2E2E';
				}
			else if($row['status']=='2')
				{
					$bgcolor ='#04B404';
				}		
				else
				{
					$bgcolor ='#ffffff';
				}
			$pid = MYSQL_RESULT($result,$i,"py_id");
			$prid = MYSQL_RESULT($result,$i,"parent_id");
			$pn = MYSQL_RESULT($result,$i,"parent_name");
			$iss = MYSQL_RESULT($result,$i,"issue");
			$du = MYSQL_RESULT($result,$i,"due");
			$sub = MYSQL_RESULT($result,$i,"submit");
			$fe = MYSQL_RESULT($result,$i,"fee");
			$fe_add = MYSQL_RESULT($result,$i,"invoice_add");
			$sts = MYSQL_RESULT($result,$i,"name");
			$mon = MYSQL_RESULT($result,$i,"month_name");
			$ssid = MYSQL_RESULT($result,$i,"status");
			$m = MYSQL_RESULT($result,$i,"mon_id");
			$y = MYSQL_RESULT($result,$i,"y_id");
			$em = MYSQL_RESULT($result,$i,"email");
			$etele = MYSQL_RESULT($result,$i,"telephone");
			$emob = MYSQL_RESULT($result,$i,"mobile");
			$esky = MYSQL_RESULT($result,$i,"skype");
			$econ = MYSQL_RESULT($result,$i,"c_name");
			$sttat = MYSQL_RESULT($result,$i,"status");
			$number = MYSQL_RESULT($result,$i,"order_num");
?>
							</tr>
								</thead>
								<tbody>
								<tr>
								<td><a href="parent-accounts-profile?parent_id=<?php echo base64_encode($prid); ?>"><button type="button" class="btn red btn-xs"><?php echo abc2("$prid"); ?></button></a></td>
								<td>
								    <?php echo $number; ?>
								</td>
								<td>
									 <a href="parent-accounts-profile?parent_id=<?php echo base64_encode($prid); ?>"><font color="<?php echo $bgcolor; ?>"><?php echo $pn; ?></font></a>
								</td>
								<td>
								<?php echo $econ; ?>
								</td>
								<td>
									 <a href="ind_details?parent_id=<?php echo base64_encode($prid); ?>"><font color="<?php echo $bgcolor; ?>"><?php echo $cname; ?> <?php echo $fe; ?></font></a>
								</td>
								<td>
									 <a href="ind_details?parent_id=<?php echo base64_encode($prid); ?>"><font color="<?php echo $bgcolor; ?>"><?php echo $cname; ?> <?php echo $fe_add; ?></font></a>
								</td>
								<td>
									 <a href="ind_details?parent_id=<?php echo base64_encode($prid); ?>"><font color="<?php echo $bgcolor; ?>"><b><?php echo $cname; ?> <?php echo $fe+$fe_add; ?></b></font></a>
								</td>
								<td>
									 <font color="<?php echo $bgcolor; ?>"><?php echo $du; ?></font>
								</td>
								<td><a href="edit-invoice?pT=<?php echo base64_encode($pid); ?>&link=<?php echo base64_encode($link); ?>"><button type="button" class="btn yellow btn-xs" title="Edit Invoice"><i class="fa fa-edit"></i></button></a></td>
								<td><a href="invoice-del.php?pidt=<?php echo $pid; ?>" onclick="return confirm('You are about to delete this invoice. Please confirm your action!');"><button type="button" class="btn red btn-xs" title="Delete Invoice"><i class="fa fa-ban"></i></button></a></td>
								<td><?php if ($sttat == 1){ echo "<a href='paid.php?payment_id=$pid'><button type='button' class='btn red btn-xs'>Mark</button></a>"; } else { echo '<span class="label label-sm label-success">Paid</span>'; } ?></td>
								<td><?php echo family_status("$prid"); ?></td>
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