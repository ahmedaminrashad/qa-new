<?php session_start(); ?>
  <?php
  include("../includes/session1.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("../includes/notifications.php");
  include("header.php");
  $mm_id =$_REQUEST['mon'];
  $yy_id =$_REQUEST['yyy'];
function salary1($tr, $mr, $yr)
{
require ("../includes/dbconnection.php");
// sending query
   $result = $sql = "SELECT * FROM teacher_salary WHERE teacher_id = '$tr' AND MONTH(date) = '$mr' AND YEAR(date) = '$yr'";
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
			
			$total_add = $t_salary + $t_returns + $t_bouns + $t_rent + $t_reduc + $t_class + $t_csr + $t_medi + $t_misc + $t_hour + $t_slot;
			$total_sub = $t_fine + $t_leave + $t_advance + $t_tax + $t_eobi;
			$paid = $total_add - $total_sub;

			echo $paid;
}
			}
	}

function abc($er)
{
require ("../includes/dbconnection.php");
// sending query
   $sql = "SELECT * FROM course Where Teacher = $er";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
echo $numberOfRows;
}
}
?>
<?php

$sy = date('Y-m-d');
?>
<?php
$page_title = 'Monthly Salary Record';
$page_subtitle = 'Monthly Salary Record';
$table_name = 'Monthly Salary Record';
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
                            <div class="main-card mb-3 card">
                                <div class="card-body"><h5 class="card-title"><?php $table_name; ?></h5>
                                    <div class="table-responsive">
                                        <table class="mb-0 table">
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
$sql = "SELECT * FROM profile WHERE active = 1";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){		
			if($row['g_id']==1 and $row['inout_id']==1) 
				{
					$bgcolor ='#D3D3D3';
				}
			else
				{
					$bgcolor ='#FFFFFF';
				}		
				$profile_no = $row['teacher_id'];
			$tname = $row['teacher_name'];
			$pT = $row['teacher_id'];
			$aimage = $row['ima'];
			$witness_id1 = $row['w1'];
			$witness_id2 = $row['w2'];
			$cheque_id = $row['cheque'];
			$agree_id = $row['agreement'];
			$b_name = $row['bank'];
			$b_code = $row['branch_code'];
			$b_no = $row['account_no'];
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