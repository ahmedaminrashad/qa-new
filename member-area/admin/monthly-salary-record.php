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
  include("header.php");
  $mm_id =$_REQUEST['mon'];
  $yy_id =$_REQUEST['yyy'];
function salary1($tr, $mr, $yr)
{
// sending query
   $result = mysql_query("SELECT * FROM teacher_salary WHERE teacher_id = '$tr' AND MONTH(date) = '$mr' AND YEAR(date) = '$yr'");
if (!$result) 
	{
    die("Please Contact Farooq");
	}
$tnumberOfRows = MYSQL_NUMROWS($result);
If ($tnumberOfRows == 0){
			echo '<font color="#E26A6A"> <b>Not Genarated</b></font>';
			}
		else if ($tnumberOfRows > 0) 
			{
			$i=0;
		
			//basic details
			$sal_id = MYSQL_RESULT($result,$i,"salary_id");
			$ttt_id = MYSQL_RESULT($result,$i,"teacher_id");
			$t_date = MYSQL_RESULT($result,$i,"date");
			$t_salary = MYSQL_RESULT($result,$i,"monthly_salary");
			$t_type = MYSQL_RESULT($result,$i,"type");
			$t_cat = MYSQL_RESULT($result,$i,"cat_id");
			//Allowance and deductions
			$t_returns = MYSQL_RESULT($result,$i,"company_returns");
			$t_bouns = MYSQL_RESULT($result,$i,"performance");
			$t_rent = MYSQL_RESULT($result,$i,"residence_all");
			$t_medi = MYSQL_RESULT($result,$i,"medical_allowance");
			$t_ent = MYSQL_RESULT($result,$i,"entertainment_allowance");
			$t_misc = MYSQL_RESULT($result,$i,"misc_allowances");
			$t_eobi = MYSQL_RESULT($result,$i,"eobi");
			$t_fine = MYSQL_RESULT($result,$i,"fine");
			$t_leave = MYSQL_RESULT($result,$i,"leave_duc");
			$t_advance = MYSQL_RESULT($result,$i,"advance_duc");
			$t_reduc = MYSQL_RESULT($result,$i,"fine_reduc");
			$t_tax = MYSQL_RESULT($result,$i,"tax");
			//salary types and rates
			$class_rate = MYSQL_RESULT($result,$i,"class_rate");
			$csr_rate = MYSQL_RESULT($result,$i,"csr_rate");
			$slot_rate = MYSQL_RESULT($result,$i,"slot_rate");
			$hour_rate = MYSQL_RESULT($result,$i,"hour_rate");
			$numStu = MYSQL_RESULT($result,$i,"num_student");
			//earning
			$t_class = MYSQL_RESULT($result,$i,"class_earning");
			$t_csr = MYSQL_RESULT($result,$i,"csr_earning");
			$t_hour = MYSQL_RESULT($result,$i,"hour_earning");
			$t_slot = MYSQL_RESULT($result,$i,"slot_earning");
			
			$total_add = $t_salary + $t_returns + $t_bouns + $t_rent + $t_reduc + $t_class + $t_csr + $t_medi + $t_misc + $t_hour + $t_slot;
			$total_sub = $t_fine + $t_leave + $t_advance + $t_tax + $t_eobi;
			$paid = $total_add - $total_sub;

			echo $paid;

			}
	}

function abc($er)
{
// sending query
   $result = mysql_query("SELECT * FROM course Where Teacher = $er");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$tnumberOfRows = MYSQL_NUMROWS($result);
echo $tnumberOfRows;
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
				<h1>Teachers<small> Active</small></h1>
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
					 List of Active Teachers
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN SAMPLE TABLE PORTLET-->
					<div class="portlet light">
						<div class="portlet-body">
							<div id="mytable" class="table-responsive">
							<form action="monthly-salary-record-print" method="POST">
								<table class="table table-hover">
								<thead>
								<tr>
								<th>
									 #
								</th>
								<th>
									 Teacher Name
								</th>
								<th>
									 No.
								</th>
								<th>
									 Records
								</th>
								<th>
									 Amount
								</th>
								<th>
									 Bank
								</th>
								<th>
									 Branch Code
								</th>
								<th>
									 Account No
								</th>
								<?php 
// sending query
$result = mysql_query("SELECT * FROM profile WHERE active = 1");
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
	while($row = mysql_fetch_array($result))
		{		
			if($row['g_id']==1 and $row['inout_id']==1) 
				{
					$bgcolor ='#D3D3D3';
				}
			else
				{
					$bgcolor ='#FFFFFF';
				}		
				$profile_no = MYSQL_RESULT($result,$i,"teacher_id");
			$tname = MYSQL_RESULT($result,$i,"teacher_name");
			$pT = MYSQL_RESULT($result,$i,"teacher_id");
			$aimage = MYSQL_RESULT($result,$i,"ima");
			$witness_id1 = MYSQL_RESULT($result,$i,"w1");
			$witness_id2 = MYSQL_RESULT($result,$i,"w2");
			$cheque_id = MYSQL_RESULT($result,$i,"cheque");
			$agree_id = MYSQL_RESULT($result,$i,"agreement");
			$b_name = MYSQL_RESULT($result,$i,"bank");
			$b_code = MYSQL_RESULT($result,$i,"branch_code");
			$b_no = MYSQL_RESULT($result,$i,"account_no");
?>
							</tr>
								</thead>
								<tbody>
								<tr bgcolor="<?php echo $bgcolor; ?>">
								<td>
									 <input name="checkbox[]" type="checkbox" value="<?php echo $profile_no; ?>" checked>
								</td>
								<td>
									 <b><a href="teacher-schedule?pT=<?php echo $profile_no; ?>"><?php echo $tname; ?> (<?php echo $profile_no; ?>)</a> <?php if ($witness_id1 == 1 OR $witness_id2 == 1 OR $cheque_id == 1 Or $agree_id == 1) {echo '<i class="fa fa-warning font-yellow"></i>';} else {echo '';} ?></b>
								</td>
								<td>
									 <a href="teacher-student-list?ptec=<?php echo base64_encode($pT); ?>"><button type="button" class="btn green btn-xs"><?php echo abc("$pT"); ?></button></a>
								</td>
								<td>
									 <a href="teacher-accounts-profile?profile_no=<?php echo base64_encode($profile_no); ?>"><button type="button" class="btn green btn-xs">Profile</button></a>
								</td>
								<td><?php echo salary1("$profile_no", "$mm_id", "$yy_id"); ?></td>
								<td>
									 <?php echo $b_name; ?>
								</td>
								<td>
									 <?php echo $b_code; ?>
								</td>
								<td>
									 <?php echo $b_no; ?>
								</td>
							</tr>
							<?php 	
		$i++;		
		}
	}	
?>
								</tbody>
								</table>
								<input name="mon" type="hidden" value="<?php echo $mm_id; ?>">
								<input name="yyy" type="hidden" value="<?php echo $yy_id; ?>">
								<input name="date" type="hidden" value="<?php echo $sy; ?>">
								<div class="form-group">
															<div class="col-md-4">
																<select class="form-control" name="voucher"  id="voucher" onchange="javascript: return optionList9_SelectedIndex()">
                    <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$result = mysql_query("SELECT * FROM voucher WHERE status = 2 ORDER BY voucher_id DESC");			  	
				do {  ?>
  <option value="<?php echo $row['voucher_id'];?>-<?php echo $row['bank_id'];?>"><?php echo $row['voucher_num'];?><?php echo $row['voucher_id'];?> </option>
  <?php } while ($row = mysql_fetch_assoc($result)); ?>
</select>
															</div>
														</div>
								<button type="submit" class="btn green">Print</button>
										</form>
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