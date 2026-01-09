<?php session_start(); ?>
  <?php
  include("../includes/session1.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("../includes/notifications.php");
  include("header.php");
  function man($er)
{
require ("../includes/dbconnection.php");
// sending query
   $sql= "SELECT * FROM profile Where teacher_id = $er";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){			
					$hidden_pt = $row['teacher_name'];
					$hidden_pday = $row['teacher_id'];
	
			  		echo $hidden_pt;
			}
			}
	}
   $link = $_SERVER['REQUEST_URI'];
   $ptec =base64_decode($_GET["profile_no"]);
	$sql= "SELECT * FROM `profile`,`marital`,`gender`,`employee_catagory` WHERE profile.ms_id=marital.ms_id and profile.g_id=gender.g_id and profile.cat_id=employee_catagory.cat_id HAVING teacher_id = $ptec";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){
		    $this_profile_no = $row['teacher_id'];
			$tname = $row['teacher_name'];
			$fname = $row['Father_name'];
			$cnic = $row['CNIC'];
			$add = $row['Address'];
			$tphone = $row['Telephone'];
			$mphone = $row['Mobile'];
			$email = $row['Email'];
			$age = $row['Age'];
			$nat = $row['Nationality'];
			$gender = $row['gender'];
			$mat = $row['marital_s'];
			$q1 = $row['Qualification1'];
			$q2 = $row['Qualification2'];
			$q3 = $row['Qualification3'];
			$exe = $row['Experience'];
			$skype = $row['Skype'];
			$sal = $row['Salary'];
			$user = $row['username'];
			$pass = $row['userpass'];
			$i_remk = $row['i_remk'];
			$wn1 = $row['witness_1'];
			$cnic1 = $row['cnic_1'];
			$rel1 = $row['relation_1'];
			$mnum1 = $row['phone_1'];
			$anum1 = $row['aphone_1'];
			$year1 = $row['years_1'];
			$add1 = $row['address_1'];
			$wn2 = $row['witness_2'];
			$cnic2 = $row['cnic_2'];
			$rel2 = $row['relation_2'];
			$mnum2 = $row['phone_2'];
			$anum2 = $row['aphone_2'];
			$year2 = $row['years_2'];
			$add2 = $row['address_2'];
			$doj = $row['joining_date'];
			$tz_time = $row['time'];
			$tz_diff = $row['timezone_dif'];
			$skype_p = $row['s_pass'];
			$atphone = $row['alt_phone'];
			$amphone = $row['alt_moblie'];
			$aimage = $row['ima'];
			$witness_id1 = $row['w1'];
			$witness_id2 = $row['w2'];
			$cheque_id = $row['cheque'];
			$agree_id = $row['agreement'];
			$tsalary = $row['salary_amount'];
			$trent = $row['residence_all'];
			$ttax = $row['tax'];
			$tbank = $row['bank'];
			$tcode = $row['branch_code'];
			$tno = $row['account_no'];
			$ttitle = $row['account_title'];
			$category = $row['cat_name'];
			$cat1 = $row['cat_id'];
			$crate = $row['class_rate'];
			$csrrate = $row['csr_rate'];
			$hrate = $row['hour_rate'];
			$rg_csr = $row['csr_rights'];
			$rg_teacher = $row['teacher_rights'];
			$rg_manager = $row['super_rights'];
			$rg_s_manager = $row['s_supper_rights'];
			$rg_accounts = $row['accounts'];
			$rg_billing = $row['billing_rights'];
			$rg_active = $row['active'];
			$rg_training = $row['training'];
			$rg_level = $row['level'];
			$rg_medi = $row['medical'];
			$rg_ent = $row['entertainment'];
			$rg_misc = $row['misc'];
			$rg_eobi = $row['eobi'];
			$man_id = $row['manager_id'];
			$zoom_link = $row['link'];
			$groupid = $row['group_id'];
			$currency = $row['currency'];
			}
			}
?>
<?php
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
?>
<?php
$syyw = date('Y-m-d');
$c_month = date('m');
?>
<?php
$sy11 = date('Y-m-d');
$date11 = date('h:i a', time());
?>
<?php
$page_title = 'Teacher Profile';
$page_subtitle = 'Teacher Profile';
$table_name = 'Teacher Profile';
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
                        <div class="col-md-12">
                            <div class="card-hover-shadow profile-responsive card-border border-success mb-3 card">
                                <div class="dropdown-menu-header">
                                    <div class="dropdown-menu-header-inner bg-success">
                                        <div class="menu-header-content">
                                            <div class="avatar-icon-wrapper btn-hover-shine mb-2 avatar-icon-xl">
                                                <div class="avatar-icon rounded"><img
                                                        src="../uploads/thumb/<?php echo $aimage; ?>"
                                                        alt="Teacher pic"></div>
                                            </div>
                                            <div><h5 class="menu-header-title"><?php echo $tname; ?></h5><h6 class="menu-header-subtitle"> (<?php echo $category; ?> <?php if ($rg_training == 2){ echo '<font color="FE2E2E"><b><a href="teacher-rights-training?a_id='.$this_profile_no.'&link='.$link.'&sts=1">On Training</a></b></font>'; } else {echo '';} ?>)</h6>
                                            <p><a data-target="#level" data-toggle="modal"><?php if ($rg_level == 1){echo '<div class="ml-auto badge badge-danger">Class A</div>';} elseif ($rg_level == 2){echo '<div class="ml-auto badge badge-warning">Class B</div>';} else {echo '<div class="ml-auto badge badge-success">Class C</div>';} ?></a>
                                            <a class="manager" href="#manager" data-toggle="modal" data-target="#manager" teacher-id="<?php echo $this_profile_no; ?>" manager-id="<?php echo $man_id; ?>"><div class="ml-auto badge badge-warning"><?php echo man($man_id); ?></div></a>
                                            <a data-target="#bank" data-toggle="modal"><div class="ml-auto badge badge-warning">Edit Bank/Salary/Link Details</div></a></p>
<p><a href="upload-teacher-pic?ptec=<?php echo $this_profile_no; ?>&name=<?php echo $tname; ?>"><button class="btn-shadow-primary btn btn-warning btn-lg">Edit Picture</button></a>
											<a href="edit-teacher-account?profile_no=<?php echo $this_profile_no; ?>"><button class="btn-shadow-primary btn btn-warning btn-lg">Edit Profile</button></a>
											<a href="upload-teacher-doc?ptec=<?php echo $this_profile_no; ?>&name=<?php echo $tname; ?>"><button class="btn-shadow-warning btn btn-warning btn-lg">Upload Docs</button></a>
											<a href="teacher-student-list?ptec=<?php echo base64_encode($this_profile_no); ?>"><button class="btn-shadow-primary btn btn-warning btn-lg">Student Details</button></a>
											<a href="teacher-salary-record?ptec=<?php echo $this_profile_no; ?>&name=<?php echo $tname; ?>&last_link=<?php echo $link; ?>"><button class="btn-shadow-primary btn btn-warning btn-lg">Salary Record</button></a>
											<a href="teacher-schedule?pT=<?php echo $this_profile_no; ?>"><button class="btn-shadow-primary btn btn-info btn-lg">Schedule</button></a>
											<a class="fine" href="#fine" data-toggle="modal" data-target="#fine" teacher-id="<?php echo $this_profile_no; ?>"><button class="btn-shadow-primary btn btn-warning btn-lg">Salary Adjustment</button></a>
												<?php if ($rg_active == 1){ echo '<a href="deactivate-teacher?pname='.$tname.'&pteacher='.$this_profile_no.'&link='.$link.'&sts=2&stlog=8"><button class="btn-shadow-primary btn btn-danger btn-lg">Deactivate Account</button></a>'; } else { echo ''; } ?>
												<?php if ($rg_active == 2){ echo '<a href="deactivate-teacher?pname='.$tname.'&pteacher='.$this_profile_no.'&link='.$link.'&sts=1&stlog=1001"><button class="btn-shadow-primary btn btn-warning btn-lg">Activate Account</button></a>'; } else { echo ''; } ?></p>
</div>
                                            <div class="menu-header-btn-pane pt-2">
                                                <div role="group" class="btn-group text-center">
                                                    <div class="nav">
                                                        <a href="#tab-2-eg1" data-toggle="tab" class="active btn btn-dark">Salary Details</a>
                                                        <a href="#tab-2-eg2" data-toggle="tab" class="btn btn-dark mr-1 ml-1">List of Students</a>
                                                        <a href="#tab-2-eg3" data-toggle="tab" class="btn btn-dark">Current Month Deductions</a>
                                                        <a href="#tab-2-eg4" data-toggle="tab" class="btn btn-dark mr-1 ml-1">Current Month Leaves</a>
                                                        <a href="#tab-2-eg5" data-toggle="tab" class="btn btn-dark">Bio Data</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-0 card-body">
                                    <div class="tab-content">
                                        <div class="tab-pane active show" id="tab-2-eg1">
                                            <div class="table-responsive">
                                        <table class="align-middle mb-0 table table-striped table-hover">
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
								<th style="height: 23px">
									 
								</th>
								</tr>
								</thead>
								<tbody>
								<?php 
// sending query
$sql = "SELECT * FROM teacher_salary WHERE teacher_id = $ptec";
$counter = 0;
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
			$class_num = $row['total_classes'];
			$class_hour = $row['total_hours'];
			$stu_num = $row['num_student'];
			//earning
			$t_class = $row['class_earning'];
			$t_csr = $row['csr_earning'];
			$t_hour = $row['hour_earning'];
			$t_slot = $row['slot_earning'];
			$date_start = $row['date1'];
			$date_end = $row['date2'];
			$currency1 = $row['currency'];
			$total_add = $t_salary + $t_returns + $t_bouns + $t_rent + $t_reduc + $t_class + $t_csr + $t_medi + $t_misc + $t_hour + $t_slot + $t_gift + $t_oadd;
			$total_sub = $t_fine + $t_leave + $t_advance + $t_tax + $t_eobi + $t_odec;
			$paid = $total_add - $total_sub;

?>
								<tr>
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
									<b><?php echo $currency1; ?> <?php echo number_format($paid, 2); ?></b>
								</td>
								<td>
									<a href="salary-details?teach_id=<?php echo $ttt_id; ?>&sal_id=<?php echo $sal_id; ?>&teacher_n=<?php echo $tname; ?>&teacher_gender=<?php echo $gender; ?>&teacher_cat=<?php echo $category; ?>&teacher_catid=<?php echo $cat1; ?>&csr_rate=<?php echo $csrrate; ?>&class_rate=<?php echo $crate; ?>&year=<?php echo date('Y', strtotime($t_date)); ?>&month=<?php echo date('m', strtotime($t_date)); ?>"><button class="mb-2 mr-2 btn btn-outline-success">See Details</button></a>
								</td>
								<td>
									<a href="delete-salary?sal_id=<?php echo $sal_id; ?>"><button class="mb-2 mr-2 btn btn-outline-danger">Delete</button></a>
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
                                        <div class="tab-pane" id="tab-2-eg2">
                                            <div class="table-responsive">
                                        <table class="align-middle mb-0 table table-striped table-hover">
                                        <thead>
								<tr>
								<th>
									 #
								</th>
								<th>
									 Student Name
								</th>
								<th>
									 Parent
								</th>
								<th>
									 Country
								</th>
								<th>
									 Language
								</th>

								<th>
									 Gender
								</th>
								<th>
									 Course
								</th>
								<th>
									 History
								</th>
								</tr>
								</thead>
								<tbody>
								<?php 
$sql = "SELECT `course`.*, `dept`.`department`, `gender`.`gender`, `profile`.`teacher_name`, `country`.`c_name`, `account`.`parent_name`, `lan`.`lan_name` FROM
  			`course`,`dept`,`gender`,`profile`,`country`,`account`,`lan` WHERE course.dept_id=dept.dept_id and course.g_id=gender.g_id and course.Teacher=profile.teacher_id and course.c_id=country.c_id and course.parent_id=account.parent_id and course.lan_id=lan.lan_id HAVING Teacher = $ptec";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){			
			$Course_ID = $row['course_id'];
			$course_yrSec = $row['course_yrSec'];
			$doj = $row['Date_Of_Joining'];
			$skype = $row['Skype_ID'];
			$con = $row['c_name'];
			$age = $row['Age'];
			$gender = $row['gender'];
			$cour = $row['department'];
			$status = $row['Status'];
			$nod = $row['Number_of_Days'];
			$fee = $row['Fee'];
			$teacher = $row['teacher_name'];
			$trial = $row['Trial_Class'];
			$pCourse = $row['course_id'];
			$ptea = $row['Teacher'];
			$pdt = $row['dept_id'];
			$dept_id = $row['dept_id'];
			$teacher_id = $row['Teacher'];
			$pn = $row['parent_name'];
			$plan = $row['lan_name'];
			$ppid = $row['parent_id'];
?>
								<tr>
								<td>
									 <?php echo ++$counter; ?>
								</td>
								<td>
									 <a href="student-schedule?pT=<?php echo base64_encode($pCourse); ?>"><?php echo $course_yrSec; ?> (<?php echo $Course_ID; ?>)</a>
								</td>
								<td>
									 <a href="parent-accounts-profile?parent_id=<?php echo base64_encode($ppid); ?>"><?php echo $pn; ?>
								</td>
								<td>
									 <?php echo $con; ?>
								</td>
								<td>
									 <?php echo $plan; ?>
								</td>

								<td>
									 <?php echo $gender; ?>
								</td>
								<td>
									 <?php echo $cour; ?>
								</td>
								<td>
									 <a href="history_course_<?php echo $pdt; ?>?Course_ID=<?php echo base64_encode($Course_ID); ?>">Daily Progress</a>
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
                                        <div class="tab-pane" id="tab-2-eg3">
                                            <div class="table-responsive">
                                        <table class="align-middle mb-0 table table-striped table-hover">
                                        <thead>
								<tr>
								<th>
									 Date
								</th>
								<th>
									 Amount
								</th>
								<th>
									 Nature
								</th>
								<th>
									 Description
								</th>
								<th>
									 
								</th>
								</tr>
								</thead>
                                        <tbody>
                                        <?php 
// sending query
$sql = "SELECT * FROM teacher_fine WHERE teacher_id = $ptec AND YEAR(date) = $sy AND MONTH(date) = $c_month";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '<div class="ml-auto badge badge-info">No Note Found!</div>';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){
		
			$fine_id = $row['fine_id'];
			$techf_id = $row['teacher_id'];
			$f_date = $row['date'];
			$f_amount = $row['amount'];
			$f_des = $row['des'];
			$f_type = $row['type'];
?>
                                        <tr>
                                        	<td>
									 <?php echo $f_date; ?>
								</td>
								<td>
									<?php echo $f_amount; ?>
								</td>
								<td>
									<?php if($f_type == 1){echo 'Fine';} elseif($f_type == 2){echo 'Bouns';} elseif($f_type == 3){echo 'Advance';} elseif($f_type == 4){echo 'Returns';} elseif($f_type == 5){echo 'Reduction';} ?>
								</td>
								<td>
									<?php echo $f_des; ?>
								</td>
								<td><a href="delete-fine?cid=<?php echo $fine_id; ?>"><button class="mb-2 mr-2 btn btn-outline-danger">Delete</button></a></td>
							</tr>
                                        <?php
                                        }
                                        }
                                        ?>
                                        </tbody>
                                        </table>
                                    </div>
                                    </div>
                                    <div class="tab-pane" id="tab-2-eg4">
                                            <div class="table-responsive">
                                        <table class="align-middle mb-0 table table-striped table-hover">
                                        <thead>
								<tr>
								<th>
									 Date
								</th>
								<th>
									 Status
								</th>
								<th>
									 
								</th>
								</tr>
								</thead>
                                        <tbody>
                                        <?php 
// sending query
$sql = "SELECT * FROM teacher_attendance WHERE teacher_id = $ptec AND YEAR(date) = $sy AND MONTH(date) = $c_month AND status = 2";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '<div class="ml-auto badge badge-info">No Note Found!</div>';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){
		
			$attendence_id = $row['attendence_id'];
			$techa_id = $row['teacher_id'];
			$a_date = $row['date'];
			$a_time = $row['time_in'];
			$a_status = $row['status'];
?>
                                        <tr>
                                        	<td>
									 <?php echo $a_date; ?>
								</td>
								<td>
									<?php if($a_status == 1){echo 'Present';} elseif($a_status == 2){echo 'Absent';} ?>
								</td>
								<td><button type="button" class="btn green btn-xs">Delete</button></td>
							</tr>
                                        <?php
                                        }
                                        }
                                        ?>
                                        </tbody>
                                        </table>
                                    </div>
                                    </div>
                                    <div class="tab-pane" id="tab-2-eg5">
                                            <div class="table-responsive">
                                        <table class="align-middle mb-0 table table-striped table-hover">
                                        <tr>
                                        	<td>Father Name:</td>
                                        	<td><font color="#44B6AE"> <b><?php echo $fname; ?></b></font></td>
                                        	<td>CNIC:</td>
                                        	<td><font color="#44B6AE"> <b><?php echo $cnic; ?></b></font></td>
                                        	<td>Email:</td>
                                        	<td><font color="#44B6AE"> <b><?php echo $email; ?></b></font></td>
                                        </tr>
                                        <tr>
                                        	<td>Nationality:</td>
                                        	<td><font color="#44B6AE"> <b><?php echo $nat; ?></b></font></td>
                                        	<td>Phone:</td>
                                        	<td><font color="#44B6AE"> <b><?php echo $tphone; ?></b></font></td>
                                        	<td>Mobile:</td>
                                        	<td><font color="#44B6AE"> <b><?php echo $mphone; ?></b></font></td>
                                        </tr>
                                        <tr>
                                        	<td>Gender:</td>
                                        	<td><font color="#44B6AE"> <b><?php echo $gender; ?></b></font></td>
                                        	<td>Status:</td>
                                        	<td><font color="#44B6AE"> <b><?php echo $mat; ?></b></font></td>
                                        	<td>Qualification 01:</td>
                                        	<td><font color="#44B6AE"> <b><?php echo $q1; ?></b></font></td>
                                        </tr>
                                        <tr>
                                        	<td>Qualification 02:</td>
                                        	<td><font color="#44B6AE"> <b><?php echo $q2; ?></b></font></td>
                                        	<td>Qualification 03:</td>
                                        	<td><font color="#44B6AE"> <b><?php echo $q3; ?></b></font></td>
                                        	<td>Experience:</td>
                                        	<td><font color="#44B6AE"> <b><?php echo $exe; ?></b></font></td>
                                        </tr>
                                        <tr>
                                        	<td>Zoom:</td>
                                        	<td><font color="#44B6AE"> <b><?php echo $skype; ?></b></font></td>
                                        	<td>Zoom-Pass:</td>
                                        	<td><font color="#44B6AE"> <b><?php echo $skype_p; ?></b></font></td>
                                        	<td>Zoom-Link:</td>
                                        	<td><font color="#44B6AE"> <b><?php echo $zoom_link; ?></b></font></td>
                                        </tr>
                                        <tr>
                                        	<td>Group ID:</td>
                                        	<td><font color="#44B6AE"> <b><?php echo $groupid; ?></b></font></td>
                                        	<td>Username:</td>
                                        	<td><font color="#44B6AE"> <b><?php echo $user; ?></b></font></td>
                                        	<td>Pasword:</td>
                                        	<td><font color="#44B6AE"> <b><?php echo $pass; ?></b></font></td>
                                        </tr>
                                        <tr>
                                        	<td>Timezone:</td>
                                        	<td><font color="#44B6AE"> <b><?php echo $tz_time; ?></b></font></td>
                                        	<td>Difference:</td>
                                        	<td><font color="#44B6AE"> <b><?php echo $tz_diff; ?></b></font></td>
                                        	<td>DoJ:</td>
                                        	<td><font color="#44B6AE"> <b><?php echo $doj; ?></b></font></td>
                                        </tr>
                                        <tr>
                                        	<td>Account Title:</td>
                                        	<td><font color="#44B6AE"> <b><?php echo $ttitle; ?></b></font></td>
                                        	<td>Tax:</td>
                                        	<td><font color="#44B6AE"> <b><?php echo $ttax; ?></b></font></td>
                                        	<td>Residence ALW:</td>
                                        	<td><font color="#44B6AE"> <b><?php echo $trent; ?></b></font></td>
                                        </tr>
                                        <tr>
                                        	<td>Monthly Salary:</td>
                                        	<td><font color="#44B6AE"> <b><?php echo $tsalary; ?></b></font></td>
                                        	<td>Hour Rate:</td>
                                        	<td><font color="#44B6AE"> <b><?php echo $hrate; ?></b></font></td>
                                        	<td>CSR Rate:</td>
                                        	<td><font color="#44B6AE"> <b><?php echo $csrrate; ?></b></font></td>
                                        </tr>
                                        <tr>
                                        	<td>Bank:</td>
                                        	<td><font color="#44B6AE"> <b><?php echo $tbank; ?></b></font></td>
                                        	<td>Branch Code:</td>
                                        	<td><font color="#44B6AE"> <b><?php echo $tcode; ?></b></font></td>
                                        	<td>A/C No.:</td>
                                        	<td><font color="#44B6AE"> <b><?php echo $tno; ?></b></font></td>
                                        </tr>
                                        </table>
                                    </div>
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
<div class="modal fade bd-example-modal-lg" id="fine" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        
        </div>
    </div>
</div>
<!-- Large modal end  -->
<!-- Large modal start -->
<div class="modal fade bd-example-modal-lg" id="bank" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="signupForm" class="col-md-10 mx-auto" method="post" action="edit-bank-teacher">
				<div class="form-group">
															<label>Account Title</label>
															<div>
															<input type="text" name="atitle" id="atitle" class="form-control input-circle" value="<?php echo $ttitle; ?>" required></input>
															</div>
												</div>
												<div class="form-group">
															<label>Bank</label>
															<div>
															<input type="text" name="abank" id="abank" class="form-control input-circle" value="<?php echo $tbank; ?>" required></input>
															</div>
												</div>
												<div class="form-group">
															<label>Branch Code</label>
															<div>
															<input type="text" name="acode" id="acode" class="form-control input-circle" value="<?php echo $tcode; ?>" required></input>
															</div>
												</div>
												<div class="form-group">
															<label>Account No</label>
															<div>
															<input type="text" name="aacc" id="aacc" class="form-control input-circle" value="<?php echo $tno; ?>" required></input>
															</div>
												</div>
												<div class="form-group">
															<label>Monthly Salary</label>
															<div>
															<input type="text" name="tsalary" id="tsalary" class="form-control input-circle" value="<?php echo $tsalary; ?>" required></input>
															</div>
												</div>
												<div class="form-group">
															<label>Hour Rate</label>
															<div>
															<input type="text" name="hour_r" id="hour_r" class="form-control input-circle" value="<?php echo $hrate; ?>" required></input>
															</div>
												</div>
												<div class="form-group">
															<label>Zoom Link</label>
															<div>
															<input type="text" name="ZoomLink" id="ZoomLink" class="form-control input-circle" value="<?php echo $zoom_link; ?>" required></input>
															</div>
												</div>
												<div class="form-group">
															<label>WhatsApp Group</label>
															<div>
															<input type="text" name="ggidw" id="ggidw" class="form-control input-circle" value="<?php echo $groupid; ?>" required></input>
															</div>
												</div>
												<div class="form-group">
															<label>Currency</label>
															<div>
															<input type="text" name="curr" id="curr" class="form-control input-circle" value="<?php echo $currency; ?>" required></input>
															</div>
												</div>
												<div class="form-group">
															<label>Tax</label>
															<div>
															<input type="text" name="ttax" id="ttax" class="form-control input-circle" value="<?php echo $ttax; ?>" required></input>
															</div>
												</div>
												<div class="form-group">
															<label>Medi. Allow.</label>
															<div>
															<input type="text" name="tmedi" id="ttax" class="form-control input-circle" value="<?php echo $rg_medi; ?>" required></input>
															</div>
												</div>
												<div class="form-group">
															<label>Entertainment Allow.</label>
															<div>
															<input type="text" name="tent" id="ttax" class="form-control input-circle" value="<?php echo $rg_ent; ?>" required></input>
															</div>
												</div>
												<div class="form-group">
															<label>Misc. Allow.</label>
															<div>
															<input type="text" name="tmisc" id="ttax" class="form-control input-circle" value="<?php echo $rg_misc; ?>" required></input>
															</div>
												</div>
												<div class="form-group">
															<label>EOBI</label>
															<div>
															<input type="text" name="teobi" id="ttax" class="form-control input-circle" value="<?php echo $rg_eobi; ?>" required></input>
															</div>
												</div>
												<input type="hidden" value="<?php echo $this_profile_no; ?>" name="proiidd" id="proiidd" class="form-control input-circle"></input>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name ="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Large modal end  -->
<script>
$('.fine').click(function(){
    var famTECH=$(this).attr('teacher-id');
    $.ajax({url:"salary-adjustments.php?famTECH="+famTECH,cache:false,success:function(result){
        $(".modal-content").html(result);
    }});
});
</script>
