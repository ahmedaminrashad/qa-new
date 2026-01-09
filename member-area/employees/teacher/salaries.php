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
require("../includes/dbconnection.php");
include("../includes/teacher_rights.php");  include("header.php");
  $tt = $_SESSION['is']['teacher_id'];
?>
<?php
date_default_timezone_set("Asia/Karachi");
$sy = date('Y');
?>
<?php echo $main_header; ?>
<?php echo $tool_bar; ?>
<?php echo $start_menu; ?>
<?php echo $main_menu; ?>
<!-- BEGIN PAGE CONTAINER -->
<div class="page-container">
	<!-- BEGIN PAGE HEAD -->
	<div class="page-head">
		<div class="container">
			<!-- BEGIN PAGE TITLE -->
			<div class="page-title">
				<h1>Salary<small> Details</small></h1>
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
					<a href="teacher-home">Home</a><i class="fa fa-circle"></i>
				</li>
				<li class="active">
					 Salary Details		
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN SAMPLE TABLE PORTLET-->
					<div class="portlet light">
					<h3>For the Year: <span class="caption-subject font-green-sharp bold uppercase"><?php echo $sy; ?></span></h3>
						<form action="salary_1_b" method="GET" class="form-horizontal form-row-sepe">
										<label class="control-label">Select Year</label>
											<select class="form-control input-small select2me" data-placeholder="Select..." name="pdept"  id="pdept" onchange="this.form.submit()">
												<?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$result = mysql_query("SELECT * FROM school_yr ORDER BY year_id ");			  	
				do {  ?>
  <option value="<?php echo $row['school_year'];?>"><?php echo $row['school_year'];?> </option>
  <?php } while ($row = mysql_fetch_assoc($result)); ?>
</select>											</form>
						<div class="portlet-body">
							<div id="mytable" class="table-responsive">
								<table class="table table-hover">
								<thead>
								<tr>
								<th style="height: 23px">
									 Month-Year
								</th>
								<th style="height: 23px">
									 Fixed <i class="fa fa-money green"></i>
								</th>
								<th style="height: 23px">
									 Makeup <i class="fa fa-arrow-up"></i>
								</th>
								<th style="height: 23px">
									 Deductions <i class="fa fa-arrow-down"></i>
								</th>
								<th style="height: 23px">
									 Fine <i class="fa fa-arrow-up"></i>
								</th>
								<th style="height: 23px">
									 Paid <i class="fa fa-money green"></i>
								</th>
								<?php 
// sending query
$result = mysql_query("SELECT * FROM teacher_salary WHERE teacher_id = $tt");
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
			if(($i%2)==0) 
				{
					$bgcolor ='#FFFFFF';
				}
			else
				{
					$bgcolor ='#F7F7FF';
				}		
			$sal_id = MYSQL_RESULT($result,$i,"salary_id");
			$ttt_id = MYSQL_RESULT($result,$i,"teacher_id");
			$t_date = MYSQL_RESULT($result,$i,"date");
			$t_salary = MYSQL_RESULT($result,$i,"monthly_salary");
			$t_returns = MYSQL_RESULT($result,$i,"company_returns");
			$t_bouns = MYSQL_RESULT($result,$i,"performance");
			$t_rent = MYSQL_RESULT($result,$i,"residence_all");
			$t_reduc = MYSQL_RESULT($result,$i,"fine_reduc");
			$t_class = MYSQL_RESULT($result,$i,"class_earning");
			$t_csr = MYSQL_RESULT($result,$i,"csr_earning");
			$t_hour = MYSQL_RESULT($result,$i,"hour_earning");
			$t_slot = MYSQL_RESULT($result,$i,"slot_earning");
			$t_medi = MYSQL_RESULT($result,$i,"medical_allowance");
			$t_ent = MYSQL_RESULT($result,$i,"entertainment_allowance");
			$t_misc = MYSQL_RESULT($result,$i,"misc_allowances");
			$t_fine = MYSQL_RESULT($result,$i,"fine");
			$t_leave = MYSQL_RESULT($result,$i,"leave_duc");
			$t_advance = MYSQL_RESULT($result,$i,"advance_duc");
			$t_tax = MYSQL_RESULT($result,$i,"tax");
			$t_type = MYSQL_RESULT($result,$i,"type");
			$t_eobi = MYSQL_RESULT($result,$i,"eobi");
			$total_add = $t_salary + $t_returns + $t_bouns + $t_rent + $t_reduc + $t_class + $t_csr + $t_medi + $t_misc + $t_hour + $t_slot;
			$total_sub = $t_fine + $t_leave + $t_advance + $t_tax + $t_eobi;
			$paid = $total_add - $total_sub;
?>
							</tr>
								</thead>
								<tbody>
								<tr bgcolor="<?php echo $bgcolor; ?>">
								<td>
									 <?php echo date('F-Y',strtotime($t_date)); ?>
								</td>
								<td>
									<b><?php echo number_format($t_salary, 2); ?></b>
								</td>
								<td>
									<?php echo number_format($total_add, 2); ?>
								</td>
								<td>
									<?php echo number_format($total_sub, 2); ?>
								</td>
								<td>
									<?php echo number_format($t_reduc, 2); ?>
								</td>
								<td>
									<b>EGP <?php echo number_format($paid, 2); ?></b>
								</td>
								<td>
									<a href="salary-details?sal_id=<?php echo $sal_id; ?>&teacher_n=<?php echo $tname; ?>&teacher_gender=<?php echo $gender; ?>&teacher_cat=<?php echo $category; ?>&teacher_catid=<?php echo $cat1; ?>&csr_rate=<?php echo $csrrate; ?>&class_rate=<?php echo $crate; ?>&year=<?php echo date('Y', strtotime($t_date)); ?>&month=<?php echo date('m', strtotime($t_date)); ?>"><button type="button" class="btn green btn-xs">See Details</button></a>
								</td>
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
	form.pdept.value = ("<?php echo $sy; ?>");
	//alert (form.pCityM.value);				
</script>