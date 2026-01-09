<?php session_start(); ?>
  <?php
  include("../includes/session1.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("../includes/notifications.php");
  include("header.php");
  function blocked($d){
  require ("../includes/dbconnection.php");
$pT =$_REQUEST['teach_id'];
$sql = "SELECT `profile`.*, `gender`.`gender`, `employee_catagory`.`cat_name` FROM `profile`,`gender`,`employee_catagory` WHERE profile.g_id=gender.g_id and profile.cat_id=employee_catagory.cat_id HAVING teacher_id = '$pT'";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){
		
			$tname = $row['teacher_name'];
			$gender = $row['gender'];
			$employ = $row['cat_name'];
			if ($d == 'gender') {
				echo $gender;
			}
			elseif ($d == 'name') {
				echo $tname;
			}
			elseif ($d == 'designation') {
				echo $employ;
			}
			}
			}
	}
  $sal_id =$_REQUEST['sal_id'];
  $tname =$_REQUEST['teacher_n'];
  $smonth =$_REQUEST['month'];
  $syear =$_REQUEST['year'];
  $tgender =$_REQUEST['teacher_gender'];
$sql = "SELECT * FROM teacher_salary WHERE salary_id = $sal_id";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){		
			//basic details
			$sal_id = $row['salary_id'];
			$ttt_id = $row['teacher_id'];
			$t_date = $row['date'];
			$t_salary = $row['monthly_salary'];
			$t_type = $row['type'];
			$t_cat = $row['cat_id'];
			//Allowance and deductions
			$t_returns = $row['company_returns'];
			$t_bouns = $row['performance'];
			$t_rent = $row['residence_all'];
			$t_medi = $row['medical_allowance'];
			$t_ent = $row['entertainment_allowance'];
			$t_misc = $row['misc_allowances'];
			$t_eobi = $row['eobi'];
			$t_fine = $row['fine'];
			$t_leave = $row['leave_duc'];
			$t_advance = $row['advance_duc'];
			$t_reduc = $row['fine_reduc'];
			$t_tax = $row['tax'];
			$t_gift = $row['gift'];
			$t_oadd = $row['other_add'];
			$t_odec = $row['other_dec'];
			//salary types and rates
			$class_rate = $row['class_rate'];
			$csr_rate = $row['csr_rate'];
			$slot_rate = $row['slot_rate'];
			$hour_rate = $row['hour_rate'];
			$numStu = $row['num_student'];
			$t_to_class = $row['total_classes'];
			$t_to_hours = $row['total_hours'];
			//earning
			$t_class = $row['class_earning'];
			$t_csr = $row['csr_earning'];
			$t_hour = $row['hour_earning'];
			$t_slot = $row['slot_earning'];
			$date_start = $row['date1'];
			$date_end = $row['date2'];
			$currency = $row['currency'];
			
			$total_add = $t_salary + $t_returns + $t_bouns + $t_rent + $t_reduc + $t_class + $t_csr + $t_medi + $t_misc + $t_hour + $t_slot + $t_gift + $t_oadd;
			$total_sub = $t_fine + $t_leave + $t_advance + $t_tax + $t_eobi + $t_odec;
			$paid = $total_add - $total_sub;
			}
			}
?>
<?php
$page_title = 'Salary Details';
$page_subtitle = 'Salary Details';
$table_name = 'Salary Details';
?>
<?php echo $main_header; ?>
<head>
<style type="text/css">
.auto-style5 {
	text-align: right;
}
</style>
</head>
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
                                <div class="card-body"><h5 class="card-title"><?php $table_name; ?></h5>
                                    <div class="table-responsive">
                                        <table class="align-middle mb-0 table table-striped table-hover">
								<tbody>
								<tr class="warning">
								<td><b>Name:</b></td>
								<td><?php echo blocked("name"); ?></td>
								<td><b>Designation:</b></td>
								<td><?php echo blocked('designation'); ?></td>
								<td><b>Gender:</b></td>
								<td><?php echo blocked('gender'); ?></td>
								</tr>
								<tr class="warning">
								<td><b>Department:</b></td>
								<td><?php if ($t_cat == 1 OR $t_cat == 2 OR $t_cat == 3 OR $t_cat == 4 OR $t_cat == 5 OR $t_cat == 6 OR $t_cat == 10){ echo 'ADMIN'; } elseif ($t_cat == 8) {echo 'TEACHING';} elseif ($t_cat == 9) {echo 'ACCOUNTS';} else {echo 'HELP DESK';}?></td>
								<td><b>Salary Type:</b></td>
								<td><?php if ($t_type == 1) {echo 'Monthly-Fixed';} elseif ($t_type == 2) {echo 'Per Class';} elseif ($t_type == 3) {echo 'Per Hour';} elseif ($t_type == 4) {echo 'Slab Based';} ?></td>
								<td><b><?php if ($t_type == 1) {echo 'Monthly Salary';} elseif ($t_type == 2) { echo 'Total Classes (Rate: '.$class_rate.')'; } elseif ($t_type == 3) { echo 'Total Hours (Rate: '.$hour_rate.')'; } elseif ($t_type == 4) {echo 'Slab (Size: '.$slot_rate.')';} else {echo '--';} ?></b></td>
								<td><?php if ($t_type == 1) {echo $t_salary;} elseif ($t_type == 2) { echo $t_to_class; } elseif ($t_type == 3) { echo $t_to_hours; } elseif ($t_type == 4) {echo $t_slot;} else {echo '--';} ?></td>
								</tr>
								</tbody>
								</table>
								<table class="table table-bordered table-hover">
								<tbody class="warning">
								<tr class="info">
								<td><b>Pay and Allowances</b></td>
								<td class="auto-style5"><b>Amount (<?php echo $currency; ?>)</b></td>
								<td></td>
								<td><b>Deductions/Recoveries</b></td>
								<td class="auto-style5"><b>Amount (<?php echo $currency; ?>)</b></td>
								</tr>
								<tr class="info">
								<td colspan="5"></td>
								</tr>
								<tr class="info">
								<td><b>Basic Pay</b></td>
								<td class="auto-style5"><?php echo number_format($t_salary, 2); ?></td>
								<td  rowspan="12"></td>
								<td><b>Income Tax</b></td>
								<td class="auto-style5"><?php echo number_format($t_tax, 2); ?></td>
								</tr>
								<tr class="info">
								<td><b>Hours Earning</b></td>
								<td class="auto-style5">(<?php echo $t_to_hours; ?> x <?php echo $hour_rate; ?>) = <?php echo $t_hour; ?></td>
								<td><b>Loan Deduction</b></td>
								<td class="auto-style5"><a class="fine" href="#fine-d" data-toggle="modal" data-target="#fine-d" data-id="<?php echo $ttt_id; ?>" data-month="<?php echo $date_start; ?>" data-year="<?php echo $date_end; ?>" data-type="3" data-name="Advances"><?php echo number_format($t_advance, 2); ?></a></td>
								</tr>
								<tr class="info">
								<td><b>Student Commission</b></td>
								<td class="auto-style5"><?php echo number_format($t_csr, 2); ?></td>
								<td><b>Leave Deduction</b></td>
								<td class="auto-style5"><a class="leaves" href="#leaves-d" data-toggle="modal" data-target="#leaves-d" data-id="<?php echo $ttt_id; ?>" data-month="<?php echo $date_start; ?>" data-year="<?php echo $date_end; ?>" data-amu="<?php echo $t_salary; ?>"><?php echo number_format($t_leave, 2); ?></a></td>
								</tr>
								<tr class="info">
								<td><b>Medical Allowance</b></td>
								<td class="auto-style5"><?php echo number_format($t_medi, 2); ?></td>
								<td><b>Fine Deduction</b></td>
								<td class="auto-style5"><a class="fine" href="#fine-d" data-toggle="modal" data-target="#fine-d" data-id="<?php echo $ttt_id; ?>" data-month="<?php echo $date_start; ?>" data-year="<?php echo $date_end; ?>" data-type="1" data-name="Fines"><?php echo number_format($t_fine, 2); ?></a></td>
								</tr>
								<tr class="info">
								<td><b>Residence Allowance</b></td>
								<td class="auto-style5"><?php echo number_format($t_rent, 2); ?></td>
								<td><b>EOBI Deduction</b></td>
								<td class="auto-style5"><?php echo number_format($t_eobi, 2); ?></td>
								</tr>
								<tr class="info">
								<td><b>Bonus</b></td>
								<td class="auto-style5"><a class="fine" href="#fine-d" data-toggle="modal" data-target="#fine-d" data-id="<?php echo $ttt_id; ?>" data-id="<?php echo $ttt_id; ?>" data-month="<?php echo $date_start; ?>" data-year="<?php echo $date_end; ?>" data-type="2" data-name="Bonus"><?php echo number_format($t_bouns, 2); ?></a></td>
								<td><b>Other Deductions</b></td>
								<td class="auto-style5"><?php echo number_format($t_odec, 2); ?></td>
								</tr>
								<tr class="info">
								<td><b>Fine Reduction</b></td>
								<td class="auto-style5"><a class="fine" href="#fine-d" data-toggle="modal" data-target="#fine-d" data-id="<?php echo $ttt_id; ?>" data-id="<?php echo $ttt_id; ?>" data-month="<?php echo $date_start; ?>" data-year="<?php echo $date_end; ?>" data-type="5" data-name="Fine Reduction"><?php echo number_format($t_reduc, 2); ?></a></td>
								<td>&nbsp;</td>
								<td></td>
								</tr>
								<tr class="info">
								<td><b>Gift</b></td>
								<td class="auto-style5"><a class="fine" href="#fine-d" data-toggle="modal" data-target="#fine-d" data-id="<?php echo $ttt_id; ?>" data-id="<?php echo $ttt_id; ?>" data-month="<?php echo $date_start; ?>" data-year="<?php echo $date_end; ?>" data-type="6" data-name="Fine Reduction"><?php echo number_format($t_gift, 2); ?></a></td>
								<td>&nbsp;</td>
								<td></td>
								</tr>
								<tr class="info">
								<td><b>Other Additions</b></td>
								<td class="auto-style5"><a class="fine" href="#fine-d" data-toggle="modal" data-target="#fine-d" data-id="<?php echo $ttt_id; ?>" data-id="<?php echo $ttt_id; ?>" data-month="<?php echo $date_start; ?>" data-year="<?php echo $date_end; ?>" data-type="7" data-name="Fine Reduction"><?php echo number_format($t_oadd, 2); ?></a></td>
								<td>&nbsp;</td>
								<td></td>
								</tr>
								<tr class="info">
								<td><b>Entertainment Allowance</b></td>
								<td class="auto-style5"><?php echo number_format($t_ent, 2); ?></td>
								<td>&nbsp;</td>
								<td></td>
								</tr>
								<tr class="info">
								<td><b>Arrears</b></td>
								<td class="auto-style5"><a class="fine" href="#fine-d" data-toggle="modal" data-target="#fine-d" data-id="<?php echo $ttt_id; ?>" data-id="<?php echo $ttt_id; ?>" data-month="<?php echo $date_start; ?>" data-year="<?php echo $date_end; ?>" data-type="4" data-name="Compony Returns"><?php echo number_format($t_returns, 2); ?></a></td>
								<td>&nbsp;</td>
								<td></td>
								</tr>
								<tr class="info">
								<td><b>Misc. Allowances</b></td>
								<td class="auto-style5"><?php echo number_format($t_misc, 2); ?></td>
								<td>&nbsp;</td>
								<td></td>
								</tr>
								<tr class="info">
								<td><b>Gross Total:</b></td>
								<td class="auto-style5"><b><?php echo number_format($total_add, 2); ?></b></td>
								<td></td>
								<td><b>Total Deduction:</b></td>
								<td class="auto-style5"><b><?php echo number_format($total_sub, 2); ?></b></td>
								</tr>
								<tr>
								<td colspan="5"></td>
								</tr>
								<tr class="success">
								<td colspan="3"></td>
								<td><b>Net Payable:</b></td>
								<td class="auto-style5"><b><?php echo number_format($paid, 2); ?></b></td>
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
<!-- Large modal start -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-throttle-debounce/1.1/jquery.ba-throttle-debounce.min.js"></script>
<div class="modal fade bd-example-modal-lg" id="fine-d" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        
        </div>
    </div>
</div>
<!-- Large modal end  -->
<!-- Large modal start -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-throttle-debounce/1.1/jquery.ba-throttle-debounce.min.js"></script>
<div class="modal fade bd-example-modal-lg" id="leaves-d" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        
        </div>
    </div>
</div>
<!-- Large modal end  -->
<script>
$('.fine').click(function(){
    var famID=$(this).attr('data-id');
    var famMonth=$(this).attr('data-month');
    var famYear=$(this).attr('data-year');
    var famType=$(this).attr('data-type');
    var famName=$(this).attr('data-name');

    $.ajax({url:"salary-cat-details.php?famID="+famID+"&famMonth="+famMonth+"&famYear="+famYear+"&famType="+famType+"&famName="+famName,cache:false,success:function(result){
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