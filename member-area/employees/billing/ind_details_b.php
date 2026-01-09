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
include("../includes/session.php");
  include("../includes/billing_rights.php");
  require ("../includes/dbconnection.php");
  include("header.php");
  $link = $_SERVER['REQUEST_URI'];
  $pnid =$_REQUEST['pti'];
  $y =$_REQUEST['pdept'];
?>
<?php
date_default_timezone_set("Asia/Karachi");
$sy = date('Y-m-d');
?>
<?php echo $main_header; ?>
<!-- BEGIN TOP NAVIGATION MENU -->
			<div class="top-menu">
				<ul class="nav navbar-nav pull-right">
					<li class="dropdown dropdown-extended dropdown-dark dropdown-inbox" id="header_inbox_bar">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						<span class="circle">3</span>
						<span class="corner"></span>
						</a>
						<ul class="dropdown-menu">
							<li class="external">
								<h3>You have <strong>7 New</strong> Messages</h3>
								<a href="javascript:;">view all</a>
							</li>
							<li>
								<ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
									<li>
										<a href="inbox.html?a=view">
										<span class="photo">
										<img src="../../assets/admin/layout3/img/avatar2.jpg" class="img-circle" alt="">
										</span>
										<span class="subject">
										<span class="from">
										Lisa Wong </span>
										<span class="time">Just Now </span>
										</span>
										<span class="message">
										Vivamus sed auctor nibh congue nibh. auctor nibh auctor nibh... </span>
										</a>
									</li>
								</ul>
							</li>
						</ul>
					</li>
					<!-- END INBOX DROPDOWN -->
					<!-- BEGIN USER LOGIN DROPDOWN -->
					<li class="dropdown dropdown-user dropdown-dark">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						<img alt="" class="img-circle" src="../../uploads/thumb/<?php echo $_SESSION['is']['image_name'];?>">
						<span class="username username-hide-mobile"><?php echo $_SESSION['is']['teacher_name']; ?></span>
						</a>
						<ul class="dropdown-menu dropdown-menu-default">
						<?php echo s_manager(); ?>
						<?php echo manager(); ?>
						<?php echo accounts(); ?>
						<?php echo csr(); ?>
						<?php echo teacher(); ?>
						<?php echo billing(); ?>
							<li>
								<a href="logout">
								<i class="icon-key"></i> Log Out </a>
							</li>
						</ul>
					</li>
					<!-- END USER LOGIN DROPDOWN -->
				</ul>
			</div>
			<!-- END TOP NAVIGATION MENU -->
			</div>
	</div>
<?php echo $start_menu; ?>
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
				<li>
					<a href="parent-accounts">List of Parent Accounts</a><i class="fa fa-circle"></i>
				</li>
				<li class="active">
					 Invoice Details of <?php 
$g =$_REQUEST['par_id'];
$result1 = mysql_query("SELECT * FROM account HAVING parent_id = $pnid");	
$pname = MYSQL_RESULT($result1,$i,"parent_name");
echo $pname;	
?>			
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN SAMPLE TABLE PORTLET-->
					<div class="portlet light">
					<h3>For the Year: <span class="caption-subject font-green-sharp bold uppercase"><?php $result = mysql_query("SELECT * FROM school_yr WHERE year_id = $y");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
$pidm = MYSQL_RESULT($result,$i,"school_year");
echo $pidm ?></span></h3>
						<form action="ind_details_b.php?pti=<?php echo $tt; ?>" method="GET" class="form-horizontal form-row-sepe">
										<label class="control-label">Select Year</label>
											<select class="form-control input-small select2me" data-placeholder="Select..." name="pdept"  id="pdept" onchange="this.form.submit()">
												<?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$result = mysql_query("SELECT * FROM school_yr ORDER BY year_id ");			  	
				do {  ?>
  <option value="<?php echo $row['year_id'];?>"><?php echo $row['school_year'];?> </option>
  <?php } while ($row = mysql_fetch_assoc($result)); ?>
</select>
<input type="hidden" id="hidden_pdept_id" name="hidden_p_pdept_id"  value="<?PHP echo $pnid; ?>" />
                <input type="hidden" id="hidden_dept" name="pti" value="<?PHP echo $pnid; ?>"/>

											</form>
						<div class="portlet-body">
							<div id="mytable" class="table-responsive">
								<table class="table table-hover">
								<thead>
								<tr>
								<th>
									<i class="fa fa-calendar"></i> Month
								</th>
								<th class="hidden-xs">
									<i class="fa fa-calendar"></i> Issue date
								</th>
								<th>
									<i class="fa fa-calendar"></i> Due Date
								</th>
								<th>
									<i class="fa fa-calendar"></i> Paid Date
								</th>
								<th>
									<i class="fa fa-money"></i> Fee
								</th>
								<th>
									<i class="fa fa-user"></i> Status
								</th>

															<th>
															</th>
															<th>
															</th>
								<?php 
$result = mysql_query("SELECT `invoice`.*, `month`.`month_name`, `statusp`.`status_name`, `currency`.`currency_name` FROM `invoice`,`month`,`statusp`,`currency` WHERE invoice.mon_id=month.month_id and invoice.status=statusp.s_id and invoice.currency_id=currency.currency_id HAVING parent_id = $pnid and y_id = $y ORDER BY mon_id DESC");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
If ($numberOfRows == 0) 
	{
	echo '<font color="#0DB5C0">Sorry No Invoice Send Yet!</font>';
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
			$sts = MYSQL_RESULT($result,$i,"status_name");
			$mon = MYSQL_RESULT($result,$i,"month_name");
			$s = MYSQL_RESULT($result,$i,"status");
			$cuan = MYSQL_RESULT($result,$i,"currency_name");
?>
														</tr>
														</thead>
														<tbody>
														<tr>
															<td>
																<font color="<?php echo $bgcolor; ?>"><?php echo $mon; ?></font>															</td>
															<td class="hidden-xs">
																 <font color="<?php echo $bgcolor; ?>"><?php echo $iss; ?></font>
															</td>
															<td>
																 <font color="<?php echo $bgcolor; ?>"><?php echo $du; ?></font>															</td>
															<td>
																<font color="<?php echo $bgcolor; ?>"><?php echo $sub; ?></font>
															</td>
															<td>
																<font color="<?php echo $bgcolor; ?>"><?php echo $cuan; ?> <?php echo $fe; ?>/-</font>
															</td>
															<td>
																<a href="paid.php?payment_id=<?php echo $pid; ?>" onclick="return confirm('<?php echo "You are about to mark this invoice paid. Please confirm your action."; ?>');"><?php if ($s == 1){echo '<button type="button" class="btn red btn-xs">Mark Paid</button>'; }?></a><?php if ($s == 2){ echo '<button type="button" class="btn green btn-xs">Paid</button>'; } ?>
															</td>
															<td><a href="edit-invoice?pT=<?php echo base64_encode($pid); ?>&link=<?php echo base64_encode($link); ?>"><button type="button" class="btn yellow btn-xs">Edit</button></a></td>
															<td><a href="delete-invoice?pT=<?php echo $pid; ?>"><button type="button" class="btn red btn-xs">Delete</button></a></td>
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
<script language="javascript" >
	var form = document.forms[0];
	//purpose?: to retrieve what users last input on the field..
	form.pdept.value = ("<?php echo $y; ?>");
	//alert (form.pCityM.value);				
</script>