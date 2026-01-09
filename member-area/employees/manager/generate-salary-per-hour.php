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
$tid =$_REQUEST['t_id'];
$dat1 =$_REQUEST['date1'];
$dat2 =$_REQUEST['date2'];
$t_link =$_REQUEST['t_link'];
$month =$_REQUEST['mon'];
$year =$_REQUEST['yyy'];
$tname =$_REQUEST['t_name'];
$tsalary =$_REQUEST['t_salary'];
$trent =$_REQUEST['t_rent'];
$ttax =$_REQUEST['t_tax'];
$tcrate =$_REQUEST['c_rate'];
$tcsrrate =$_REQUEST['csr_rate'];
$thourrate =$_REQUEST['hour_rate'];
$typerate =$_REQUEST['type_rate'];
$accType =$_REQUEST['ac_cat'];
$catID =$_REQUEST['type_cat'];
$ddd = ''.$year.'-'.$month.'-01';
$last_date = date("Y-m-t", strtotime($ddd));
function fine($t, $ty)
  {
  $dat1 =$_REQUEST['date1'];
$dat2 =$_REQUEST['date2'];
  $sql = "select sum(amount) from teacher_fine WHERE date >= '$dat1' AND date <= '$dat2' AND teacher_id = $t AND type = $ty";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
if ($row[0] > 0){ echo $row[0]; } else { echo 0; }
	}
function leave_duc($t, $ty, $sal)
  {
  $dat1 =$_REQUEST['date1'];
$dat2 =$_REQUEST['date2'];
  $result = mysql_query("SELECT * FROM teacher_attendance WHERE teacher_id = $t AND date >= '$dat1' AND date <= '$dat2' AND status = $ty");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$tnumberOfRows = MYSQL_NUMROWS($result);
If ($tnumberOfRows == 0){
			echo '0';
			}
		else if ($tnumberOfRows > 0) 
			{$sum = ($sal/30)*$tnumberOfRows;
			echo $sum;
			}
	}
	function hour_earning($a, $t){
$date_start =$_REQUEST['date1'];
$date_end =$_REQUEST['date2'];
$result7 = mysql_query("SELECT * FROM profile WHERE teacher_id = '$t'");
if (!$result7) 
	{
    die("Query to show");
	}
$numberOfRows7 = MYSQL_NUMROWS($result7);
If ($numberOfRows7 == 0) 
	{
	echo 'not found';
	}
else if ($numberOfRows7 > 0) 
	{
	$rate_id = MYSQL_RESULT($result7,$i,"hour_rate");
	$cur_id = MYSQL_RESULT($result7,$i,"currency");
	}

$sql2="SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(`duration`))) AS total FROM class_history WHERE teacher_id = '$t' AND status != 11 AND re_status != 2 AND date_teacher >= '$date_start' AND date_teacher <= '$date_end'  AND (monitor_id = 4 OR monitor_id = 9  OR monitor_id = 21)";
$res2 = mysql_query($sql2);
$totalRow = mysql_fetch_array($res2);
$total = $totalRow['total'];
$hours=$total;

    list($h, $m, $s) = explode(':',$hours);  //Split up string into hours/minutes
    $decimal = $m/60;  //get minutes as decimal
    $hoursAsDecimal = $h+$decimal;
if ($a == 1){
echo $hoursAsDecimal*$rate_id;
}
else {echo $hoursAsDecimal;}
}
function hour_earning_old($a, $t)
{
$dat1 =$_REQUEST['date1'];
$dat2 =$_REQUEST['date2'];
$thourrate = $_REQUEST['hour_rate'];
$result = mysql_query("SELECT * FROM class_history WHERE (monitor_id = 9 OR monitor_id = 4  OR monitor_id = 21) AND re_status != 2 AND teacher_id = '$t' AND date_admin >= '$dat1' AND date_admin <= '$dat2'");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$tnumberOfRows = MYSQL_NUMROWS($result);
if ($a == 1){
echo ($tnumberOfRows*$thourrate)/2;
}
else {echo $tnumberOfRows/2;}
}
function csr_earning($a, $t)
{
$dat1 =$_REQUEST['date1'];
$dat2 =$_REQUEST['date2'];
$tcsrrate =$_REQUEST['csr_rate'];
$result = mysql_query("SELECT * FROM course WHERE csr_id = '$t' AND regular_date >= '$dat1' AND regular_date <= '$dat2'");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$tnumberOfRows = MYSQL_NUMROWS($result);
if ($a == 1){
echo $tnumberOfRows*$tcsrrate;
}
else {echo $tnumberOfRows;}
}
?>
<?php
if (isset($_POST['genSubmit'])) 
  	{ 		
		 	$tech_id= $_POST['tech_id'];
		 	$salary= $_POST['teacher_salary'];
		 	$returns= $_POST['teacher_returns'];
		 	$bouns= $_POST['teacher_bouns'];
		 	$rent= $_POST['teacher_rent'];
		 	$fine= $_POST['teacher_fine'];
		 	$fine_reduc= $_POST['teacher_reduc'];
		 	$leave= $_POST['teacher_leave'];
		 	$advance= $_POST['teacher_advance'];
		 	$tax= $_POST['teacher_tax'];
		 	$add_date= $_POST['date'];
		 	$class_s= '0';
		 	$csr_s= $_POST['csr_salary'];
		 	$hour_s= $_POST['hour_salary'];
		 	$slot_s= '0';
		 	$link= $_POST['link_id'];
		 	$TCRate= $_POST['tech_c_rate'];
		 	$TSRate= $_POST['tech_s_rate'];
		 	$THRate= $_POST['tech_h_rate'];
		 	$cat_tid= $_POST['cat_id'];
		 	$TSLRate= '0';
		 	$TypeRate= $_POST['tech_type'];
		 	$TypeAcc= $_POST['acc_id'];
		 	$total_class= $_POST['total_classes'];
		 	$total_hour= $_POST['total_hours'];
		 	$total_stu= $_POST['total_students'];
		 	$total_gift= $_POST['teacher_gift'];
		 	$total_oadd= $_POST['teacher_other_add'];
		 	$total_odec= $_POST['teacher_other_dec'];
		 	$dateStart= $_POST['date_start'];
		 	$dateEnd= $_POST['date_end'];
			mysql_query ("INSERT INTO teacher_salary (teacher_id, date, monthly_salary, company_returns, performance, residence_all, fine, leave_duc, advance_duc, tax, type, fine_reduc, class_earning, csr_earning, hour_earning, slot_earning, slot_rate, class_rate, hour_rate, csr_rate, acc_type, cat_id, total_classes, total_hours, num_student, gift, other_add, other_dec, date1, date2)
					VALUES('$tech_id', '$add_date', '$salary', '$returns', '$bouns', '$rent', '$fine', '$leave', '$advance', '$tax', '$TypeRate', '$fine_reduc', '$class_s', '$csr_s', '$hour_s', '$slot_s', '$TSLRate', '$TCRate', '$THRate', '$TSRate', '$TypeAcc', '$cat_tid', '$total_class', '$total_hour', '$total_stu', '$total_gift', '$total_oadd', '$total_odec', '$dateStart', '$dateEnd')") or die(mysql_error()); 
			 	header('Location: list-of-employees1');
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
				<h1>Generate <small>Salary</small></h1>
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
					<a href="<?php echo $t_link; ?>"><?php echo $tname; ?></a><i class="fa fa-circle"></i>
				</li>
				<li class="active">
					 Generate Salary for (<?php echo $ddd; ?> - <?php echo $last_date; ?>)
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="row">
				<div class="col-md-12">
					<div class="tabbable tabbable-custom tabbable-noborder tabbable-reversed">
						<div class="tab-content">
								<div class="portlet box green">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-plus"></i>You are generating salary for <?php echo $tname; ?>
										</div> 
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" class="form-horizontal form-row-seperated">
										<div class="form-group">
															<label class="control-label col-md-3">
															<strong>Teacher Name</strong></label>
															<div class="col-md-4">
															<input type="text" value="<?php echo $tname; ?>" name="teacher_name" id="teacher_name" class="form-control input-circle" readonly>															</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label"><strong>Monthly Salary</strong> (Fixed Monthly)</label>
													<div class="col-md-4">
														<input type="text" value="<?php echo $tsalary; ?>" name="teacher_salary" id="teacher_salary" class="form-control input-circle" readonly>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label"><strong>Earning Via Hours</strong> (<?php echo hour_earning("2", "$tid"); ?> X <?php echo $thourrate; ?>)</label>
													<div class="col-md-4">
														<input type="text" value="<?php echo hour_earning("1", "$tid"); ?>" name="hour_salary" id="hour_salary" class="form-control input-circle" readonly>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label"><strong>Earning New Student</strong> (<?php echo csr_earning("2", "$tid"); ?> X <?php echo $tcsrrate; ?>)</label>
													<div class="col-md-4">
														<input type="text" value="<?php echo csr_earning("1", "$tid"); ?>" name="csr_salary" id="csr_salary" class="form-control input-circle" readonly>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label"><strong>Company Returns</strong></label>
													<div class="col-md-4">
														<input type="text" value="<?php echo fine("$tid", "4"); ?>" name="teacher_returns" id="teacher_returns" class="form-control input-circle">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label"><strong>Performance Bonus</strong></label>
													<div class="col-md-4">
														<input type="text" value="<?php echo fine("$tid", "2"); ?>" name="teacher_bouns" id="teacher_bouns" class="form-control input-circle">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label"><strong>Residence Allowance</strong></label>
													<div class="col-md-4">
														<input type="text" value="<?php echo $trent; ?>" name="teacher_rent" id="teacher_rent" class="form-control input-circle" readonly>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label"><strong>Fine</strong></label>
													<div class="col-md-4">
														<input type="text" value="<?php echo fine("$tid", "1"); ?>" name="teacher_fine" id="teacher_fine" class="form-control input-circle">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label"><strong>Reduction in Fine</strong></label>
													<div class="col-md-4">
														<input type="text" value="<?php echo fine("$tid", "5"); ?>" name="teacher_reduc" id="teacher_reduc" class="form-control input-circle">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label"><strong>Leave Deduction</strong></label>
													<div class="col-md-4">
														<input type="text" value="<?php echo leave_duc("$tid", "2", "$tsalary"); ?>" name="teacher_leave" id="teacher_leave" class="form-control input-circle">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label"><strong>Advance Deduction</strong></label>
													<div class="col-md-4">
														<input type="text" value="<?php echo fine("$tid", "3"); ?>" name="teacher_advance" id="teacher_advance" class="form-control input-circle">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label"><strong>Gift</strong></label>
													<div class="col-md-4">
														<input type="text" value="<?php echo fine("$tid", "6"); ?>" name="teacher_gift" id="teacher_gift" class="form-control input-circle">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label"><strong>Other Additions</strong></label>
													<div class="col-md-4">
														<input type="text" value="<?php echo fine("$tid", "7"); ?>" name="teacher_other_add" id="teacher_other_add" class="form-control input-circle">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label"><strong>Other Deduction</strong></label>
													<div class="col-md-4">
														<input type="text" value="<?php echo fine("$tid", "8"); ?>" name="teacher_other_dec" id="teacher_other_dec" class="form-control input-circle">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label"><strong>Tax</strong></label>
													<div class="col-md-4">
														<input type="text" value="<?php echo $ttax; ?>" name="teacher_tax" id="teacher_tax" class="form-control input-circle">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label"><strong>Salary Date</strong></label>
													<div class="col-md-4">
														<input type="date" value="<?php echo $last_date; ?>" name="date" id="date" class="form-control input-circle" readonly>
													</div>
												</div>
												<input type="hidden" value="<?php echo $tid; ?>" name="tech_id" id="tech_id" class="form-control input-circle">
												<input type="hidden" value="<?php echo $_REQUEST['ac_cat']; ?>" name="acc_id" id="acc_id" class="form-control input-circle">
												<input type="hidden" value="<?php echo $_REQUEST['catID']; ?>" name="cat_id" id="cat_id" class="form-control input-circle">
												<input type="hidden" value="<?php echo $_REQUEST['type_rate']; ?>" name="tech_type" id="tech_type" class="form-control input-circle">
												<input type="hidden" value="<?php echo $_REQUEST['c_rate']; ?>" name="tech_c_rate" id="tech_c_rate" class="form-control input-circle">
												<input type="hidden" value="<?php echo $_REQUEST['csr_rate']; ?>" name="tech_s_rate" id="tech_s_rate" class="form-control input-circle">
												<input type="hidden" value="<?php echo $_REQUEST['hour_rate']; ?>" name="tech_h_rate" id="tech_h_rate" class="form-control input-circle">
												<input type="hidden" value="<?php echo $t_link; ?>" name="link_id" id="link_id" class="form-control input-circle">
												<input type="hidden" value="<?php echo csr_earning("2", "$tid"); ?>" name="total_students" id="total_students" class="form-control input-circle">
												<input type="hidden" value="0" name="total_classes" id="total_classes" class="form-control input-circle">
												<input type="hidden" value="<?php echo hour_earning("2", "$tid"); ?>" name="total_hours" id="total_hours" class="form-control input-circle">
												<input type="hidden" value="<?php echo $dat1; ?>" name="date_start" id="date_start" class="form-control input-circle">
												<input type="hidden" value="<?php echo $dat2; ?>" name="date_end" id="date_end" class="form-control input-circle">
												<?php
	$result = mysql_query("SELECT * FROM teacher_salary where teacher_id = '$tid' and date = '$last_date'");
	if (!$result) 
		{
		die("Query to show fields from table failed");
		}
			$numberOfRows = MYSQL_NUMROWS($result);
			If ($numberOfRows == 0) 
				{
			echo '<div class="form-actions">
												<div class="row">
													<div class="col-md-offset-3 col-md-9">
														<button type="submit" name="genSubmit" class="btn btn-circle blue">Submit</button>
														<a href="'.$t_link.'"><button type="button" class="btn btn-circle default">
														Cancel</button></a>
													</div>
												</div>
											</div>';
				}
			else if ($numberOfRows > 0) 
				{
				echo '<span class="label label-sm label-success">Already Generated</span>';
			}
?>

											
										</form>
										<!-- END FORM-->
									</div>
								</div>
							</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- END PAGE CONTENT INNER -->
		</div>
	</div>
	<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->
<?php echo $fot; ?>