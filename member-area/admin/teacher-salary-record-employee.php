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
  $tech_id =$_SESSION['is']['teacher_id'];
  $name_id =$_SESSION['is']['teacher_name'];
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
<style type="text/css">
.auto-style1 {
	text-align: center;
}
.auto-style2 {
	text-align: right;
    vertical-align: middle;
    padding: 5px;
    position: relative;
}
</style>
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
				<li>
					 <a href="teacher-accounts-profile?profile_no=<?php echo base64_encode($tech_id); ?>">Profile of <?php echo $name_id; ?></a>
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
								<table class="table table-bordered table-hover">
								<thead>
								<tr>
								<th>
									 <div class="label label-info"><?php echo $name_id; ?></div>
								</th>
								<th colspan="5" class="auto-style1">
									 EARNED INCOME
								</th>
								<th colspan="2" class="auto-style1">
									 DIRECT INCOME
								</th>
								<th rowspan="2" class="auto-style2 success">
									TOTAL
								</th>
								<th colspan="4" class="auto-style1">
									 FINES &amp; DEDUCTIONS
								</th>
								<th rowspan="2" class="auto-style2 danger">
									 TOTAL
								</th>
								<th rowspan="2" class="auto-style2 warning">
									 PAID
								</th>
								</tr>
								<tr>
								<th>
									Month-Year
								</th>
								<th class="auto-style2 success">
									 Fixed
								</th>
								<th class="auto-style2 success">
									 Class
								</th>
								<th class="auto-style2 success">
									 Hour
								</th>
								<th class="auto-style2 success">
									 Slot
								</th>
								<th class="auto-style2 success">
									 CSR
								</th>
								<th class="auto-style2 success">
									 <span title="Salary Adjustment Additions">ADJ</span>
								</th>
								<th class="auto-style2 success">
									 <span title="All Types of Allowance">ALW</span>
								</th>
								<th class="auto-style2 danger">
									 <span title="Salary Adjustment Deductions">ADJ</span>
								</th>
								<th class="auto-style2 danger">
									 Leave
								</th>
								<th class="auto-style2 danger">
									 Eobi
								</th>
								<th class="auto-style2 danger">
									 Tax
								</th>
								</tr>
								</thead>
								<tbody>
								<?php 
// sending query
$result = mysql_query("SELECT * FROM teacher_salary WHERE teacher_id = $tech_id ORDER BY salary_id DESC;");
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
			$t_gift = MYSQL_RESULT($result,$i,"gift");
			$t_oadd = MYSQL_RESULT($result,$i,"other_add");
			$t_odec = MYSQL_RESULT($result,$i,"other_dec");
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
			$date_start = MYSQL_RESULT($result,$i,"date1");
			$date_end = MYSQL_RESULT($result,$i,"date2");
			$total_add = $t_salary + $t_returns + $t_bouns + $t_rent + $t_reduc + $t_class + $t_csr + $t_medi + $t_misc + $t_hour + $t_slot + $t_gift + $t_oadd;
			$total_sub = $t_fine + $t_leave + $t_advance + $t_tax + $t_eobi + $t_odec;
			$paid = $total_add - $total_sub;
?>
								<tr bgcolor="<?php echo $bgcolor; ?>">
								<td>
									 <b><a href="salary-details-employees?sal_id=<?php echo $sal_id; ?>&month=<?php echo date('F-Y',strtotime($t_date)); ?>&teach_id=<?php echo $ttt_id; ?>"><?php echo date('F-Y',strtotime($t_date)); ?></a></b>
								</td>
								<td class="auto-style2 success">
									 <?php echo $t_salary;?>
								</td>
								<td class="auto-style2 success">
									 <span title="Class Rate = <?php echo $class_rate; ?>&#13;Total Classes = <?php echo $class_num; ?>"><?php echo $t_class; ?></span>
								</td>
								<td class="auto-style2 success">
									 <span title="Hour Rate = <?php echo $hour_rate; ?>&#13;Total Hours = <?php echo $class_hour; ?>"><?php echo $t_hour; ?></span>
								</td>
								<td class="auto-style2 success">
									 <span title="Slab Rate = <?php echo $hour_rate; ?>&#13;Total Hours = <?php echo $class_hour; ?>"><?php echo $t_slot;?></span>
								</td>
								<td class="auto-style2 success">
									 <span title="CSR Rate = <?php echo $csr_rate; ?>&#13;Total Students = <?php echo $stu_num; ?>"><?php echo $t_csr; ?></span>
								</td>
								<td class="auto-style2 success">
									 <a class="fine" href="#fine-d" data-toggle="modal" data-target="#fine-d" data-id="<?php echo $ttt_id; ?>" data-month="<?php echo $date_start; ?>" data-year="<?php echo $date_end; ?>" data-type="2,4,5,6,7" data-name="All Additions (Bonus, Gift, Arrears, Reduction in Fine, Others)"><?php echo $t_returns + $t_bouns + $t_reduc + $t_gift + $t_oadd;?></a>
								</td>
								<td class="auto-style2 success">
									 <span title="Residence Allowance = <?php echo $t-rent; ?>&#13;Medical Allowance = <?php echo $t-medi; ?>&#13;Entertainment Allowance = <?php echo $t-ent; ?>&#13;Miscellaneous Allowance = <?php echo $t-misc; ?>"><?php echo $t_rent+$t_medi+$t_ent+$t_misc;?></span>
								</td>
								<td class="auto-style2 success">
									<b><?php echo $total_add; ?></b>
								</td>
								<td class="auto-style2 danger">
									 <a class="fine" href="#fine-d" data-toggle="modal" data-target="#fine-d" data-id="<?php echo $ttt_id; ?>" data-month="<?php echo $date_start; ?>" data-year="<?php echo $date_end; ?>" data-type="1,3,8" data-name="All Deductions (Fines, Advance, Others)"><?php echo $t_fine + $t_advance + $t_odec;?></a>
								</td>
								<td class="auto-style2 danger">
									 <a class="leaves" href="#leaves-d" data-toggle="modal" data-target="#leaves-d" data-id="<?php echo $ttt_id; ?>" data-month="<?php echo $mm_id; ?>" data-year="<?php echo $yy_id; ?>" data-amu="<?php echo $t_salary; ?>"><?php echo $t_leave;?></a>
								</td>
								<td class="auto-style2 danger">
									 <?php echo $t_eobi;?>
								</td>
								<td class="auto-style2 danger">
									 <?php echo $t_tax;?>
								</td>
								<td class="auto-style2 danger">
									 <b><?php echo $total_sub;?></b>
								</td>
								<td class="auto-style2 warning">
									 <b><?php echo $paid;?></b> (EGP)
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
					<div class="modal fade bs-modal-lg" id="fine-d" tabindex="-1" role="dialog" aria-hidden="true">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">


        </div>
    </div>
</div>
<div class="modal fade bs-modal-lg" id="leaves-d" tabindex="-1" role="dialog" aria-hidden="true">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">


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
<script>
$('.fine').click(function(){
    var famID=$(this).attr('data-id');
    var famMonth=$(this).attr('data-month');
    var famYear=$(this).attr('data-year');
    var famType=$(this).attr('data-type');
    var famName=$(this).attr('data-name');

    $.ajax({url:"salary-fine-details.php?famID="+famID+"&famMonth="+famMonth+"&famYear="+famYear+"&famType="+famType+"&famName="+famName,cache:false,success:function(result){
        $(".modal-content").html(result);
    }});
});
$('.leaves').click(function(){
    var famID=$(this).attr('data-id');
    var famMonth=$(this).attr('data-month');
    var famYear=$(this).attr('data-year');
    var famAmu=$(this).attr('data-amu');

    $.ajax({url:"salary-leaves-details.php?famID="+famID+"&famMonth="+famMonth+"&famYear="+famYear+"&famAmu="+famAmu,cache:false,success:function(result){
        $(".modal-content").html(result);
    }});
});
</script>