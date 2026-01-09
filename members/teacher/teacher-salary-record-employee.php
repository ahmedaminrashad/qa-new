<?php session_start(); ?>
  <?php
  include("../includes/session.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("header.php");
  $tech_id =$_SESSION['is']['teacher_id'];
  $name_id =$_SESSION['is']['teacher_name'];
?>
<?php
date_default_timezone_set($TimeZoneCustome);
$sy = date('Y-m-d');
?>
<?php
$page_title = 'Salary Details';
$page_subtitle = 'Salary Details';
$table_name = 'Salary Details';
?>
<?php echo $main_header; ?>
<head>
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
$sql = "SELECT * FROM teacher_salary WHERE teacher_id = $tech_id ORDER BY salary_id DESC";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){		
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
?>
								<tr>
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
									 <b><?php echo $paid;?></b>(<?php echo $currency; ?>)
								</td>
							</tr>
							<?php 	
		}
	}	
?>
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
<div class="modal fade bd-example-modal-lg" id="leaves-d" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        
        </div>
    </div>
</div>
<!-- Large modal end  -->
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