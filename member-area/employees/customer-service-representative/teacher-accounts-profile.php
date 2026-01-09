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
  include("../includes/csr_rights.php");
  require ("../includes/dbconnection.php");
   include("header.php");
   $link = $_SERVER['REQUEST_URI'];
   $ptec =base64_decode($_GET["profile_no"]);
	$result =  mysql_query("SELECT * FROM `profile`,`marital`,`Gender`,`employee_catagory` WHERE profile.ms_id=marital.ms_id and profile.g_id=Gender.g_id and profile.cat_id=employee_catagory.cat_id HAVING teacher_id = $ptec");
if (!$result) 
		{
		die("Query to show fields from table failed");
		}
			$numberOfRows = MYSQL_NUMROWS($result);
			If ($numberOfRows == 0) 
				{
			//echo 'Sorry No Record Found!';
				}
			else if ($numberOfRows > 0) 
				{
				$i=0;
				}
		    $this_profile_no = MYSQL_RESULT($result,$i,"teacher_id");
			$tname = MYSQL_RESULT($result,$i,"teacher_name");
			$fname = MYSQL_RESULT($result,$i,"Father_name");
			$cnic = MYSQL_RESULT($result,$i,"CNIC");
			$add = MYSQL_RESULT($result,$i,"Address");
			$tphone = MYSQL_RESULT($result,$i,"Telephone");
			$mphone = MYSQL_RESULT($result,$i,"Mobile");
			$email = MYSQL_RESULT($result,$i,"Email");
			$age = MYSQL_RESULT($result,$i,"Age");
			$nat = MYSQL_RESULT($result,$i,"Nationality");
			$gender = MYSQL_RESULT($result,$i,"gender");
			$mat = MYSQL_RESULT($result,$i,"marital_s");
			$q1 = MYSQL_RESULT($result,$i,"Qualification1");
			$q2 = MYSQL_RESULT($result,$i,"Qualification2");
			$q3 = MYSQL_RESULT($result,$i,"Qualification3");
			$exe = MYSQL_RESULT($result,$i,"Experience");
			$skype = MYSQL_RESULT($result,$i,"Skype");
			$sal = MYSQL_RESULT($result,$i,"Salary");
			$user = MYSQL_RESULT($result,$i,"username");
			$pass = MYSQL_RESULT($result,$i,"userpass");
			$i_remk = MYSQL_RESULT($result,$i,"i_remk");
			$wn1 = MYSQL_RESULT($result,$i,"witness_1");
			$cnic1 = MYSQL_RESULT($result,$i,"cnic_1");
			$rel1 = MYSQL_RESULT($result,$i,"relation_1");
			$mnum1 = MYSQL_RESULT($result,$i,"phone_1");
			$anum1 = MYSQL_RESULT($result,$i,"aphone_1");
			$year1 = MYSQL_RESULT($result,$i,"years_1");
			$add1 = MYSQL_RESULT($result,$i,"address_1");
			$wn2 = MYSQL_RESULT($result,$i,"witness_2");
			$cnic2 = MYSQL_RESULT($result,$i,"cnic_2");
			$rel2 = MYSQL_RESULT($result,$i,"relation_2");
			$mnum2 = MYSQL_RESULT($result,$i,"phone_2");
			$anum2 = MYSQL_RESULT($result,$i,"aphone_2");
			$year2 = MYSQL_RESULT($result,$i,"years_2");
			$add2 = MYSQL_RESULT($result,$i,"address_2");
			$doj = MYSQL_RESULT($result,$i,"joining_date");
			$tz_time = MYSQL_RESULT($result,$i,"time");
			$tz_diff = MYSQL_RESULT($result,$i,"timezone_dif");
			$skype_p = MYSQL_RESULT($result,$i,"s_pass");
			$atphone = MYSQL_RESULT($result,$i,"alt_phone");
			$amphone = MYSQL_RESULT($result,$i,"alt_moblie");
			$aimage = MYSQL_RESULT($result,$i,"ima");
			$witness_id1 = MYSQL_RESULT($result,$i,"w1");
			$witness_id2 = MYSQL_RESULT($result,$i,"w2");
			$cheque_id = MYSQL_RESULT($result,$i,"cheque");
			$agree_id = MYSQL_RESULT($result,$i,"agreement");
			$tsalary = MYSQL_RESULT($result,$i,"salary_amount");
			$trent = MYSQL_RESULT($result,$i,"residence_all");
			$ttax = MYSQL_RESULT($result,$i,"tax");
			$tbank = MYSQL_RESULT($result,$i,"bank");
			$tcode = MYSQL_RESULT($result,$i,"branch_code");
			$tno = MYSQL_RESULT($result,$i,"account_no");
			$ttitle = MYSQL_RESULT($result,$i,"account_title");
			$category = MYSQL_RESULT($result,$i,"cat_name");
			$zoom_link = MYSQL_RESULT($result,$i,"link");
			$groupid = MYSQL_RESULT($result,$i,"group_id");
?>
<?php
date_default_timezone_set("Asia/Karachi");
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
?>
<?php
date_default_timezone_set("Asia/Karachi");
$syyw = date('Y-m-d');
$c_month = date('m');
?>
<?php
date_default_timezone_set("Asia/Karachi");
$sy11 = date('Y-m-d');
$date11 = date('h:i a', time());
?>
<!DOCTYPE html>
<!-- 
Author: Muhammad Farooq
Website: http://www.tarteeltechnologies.com/
Contact: info@tarteeltechnologies.com
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title><?php echo $head_title; ?></title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css">
<link href="../../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="../../assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css">
<link href="../../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="../../assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css">
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link href="../../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css"/>
<link href="../../assets/admin/pages/css/profile-old.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE LEVEL STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="../../assets/global/css/components-rounded.css" id="style_components" rel="stylesheet" type="text/css">
<link href="../../assets/global/css/plugins.css" rel="stylesheet" type="text/css">
<link href="../../assets/admin/layout3/css/layout.css" rel="stylesheet" type="text/css">
<link href="../../assets/admin/layout3/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color">
<link href="../../assets/admin/layout3/css/custom.css" rel="stylesheet" type="text/css">
<link href="../../assets/global/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css" rel="stylesheet" type="text/css"/>
<link href="../../assets/global/plugins/bootstrap-modal/css/bootstrap-modal.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="../../assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css"/>
<link rel="stylesheet" type="text/css" href="../../assets/global/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="../../assets/admin/pages/css/todo.css"/>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-menu-fixed" class to set the mega menu fixed  -->
<!-- DOC: Apply "page-header-top-fixed" class to set the top menu fixed  -->
<body>
<!-- BEGIN HEADER -->
<div class="page-header">
	<!-- BEGIN HEADER TOP -->
	<div class="page-header-top">
		<div class="container">
			<!-- BEGIN LOGO -->
			<div class="page-logo">
				<a href="index.html"><img src="../../assets/admin/layout3/img/logo-default.png" alt="logo" class="logo-default"></a>
			</div>
			<!-- END LOGO -->
			<!-- BEGIN RESPONSIVE MENU TOGGLER -->
			<a href="javascript:;" class="menu-toggler"></a>
			<!-- END RESPONSIVE MENU TOGGLER -->
<?php echo $tool_bar; ?>
<?php echo $start_menu; ?>
<?php echo $search_bar; ?>
<?php echo $main_menu; ?>
	<!-- BEGIN PAGE CONTENT -->
	<div class="page-content">
		<div class="container">
			<!-- BEGIN PAGE BREADCRUMB -->
			<ul class="page-breadcrumb breadcrumb">
				<li>
					<a href="admin-home">Home</a><i class="fa fa-circle"></i>
				</li>
				<li>
					<a href="list-of-teachers">List of Teacher Accounts</a><i class="fa fa-circle"></i>
				</li>
				<li class="active">
					 Teacher Account Profile				
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="row profile">
				<div class="col-md-12">
					<!--BEGIN TABS-->
					<div class="tabbable tabbable-custom tabbable-noborder">
						<ul class="nav nav-tabs">
							<li class="active">
								<a href="#tab_1_1" data-toggle="tab">
								Overview </a>
							</li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="tab_1_1">
								<div class="row">
									<div class="col-md-3">
										<ul class="list-unstyled profile-nav">
											<li>
												<img src="../../uploads/<?php echo $aimage; ?>" class="img-responsive" alt=""/>
											</li>
											<li>
												<a href="teacher-student-list?ptec=<?php echo base64_encode($this_profile_no); ?>">
												Student Details </a>
											</li>
										</ul>
									</div>
									<div class="col-md-9">
										<div class="row">
											<div class="profile-info">
												<h1><?php echo $tname; ?> (<?php echo $category; ?>)</h1>
												<h1>Personal Bio Date</h1>
												<ul class="list-inline">
													<li>
														Father Name: <font color="#44B6AE"> <b><?php echo $fname; ?></b></font>
													</li>
													<li>
														CNIC: <font color="#44B6AE"> <b><?php echo $cnic; ?></b></font>
													</li>
													<li>
														Email: <font color="#44B6AE"> <b><?php echo $email; ?></b></font>
													</li>
													</ul>
													<ul class="list-inline">
													<li>
														Nationality: <font color="#44B6AE"> <b><?php echo $nat; ?></b></font>
													</li>
													<li>
														Phone: <font color="#44B6AE"> <b><?php echo $tphone; ?></b></font>
													</li>
													<li>
														Mobile: <font color="#44B6AE"> <b><?php echo $mphone; ?></b></font>
													</li>
													</ul>
													<ul class="list-inline">
													<li>
														Alt-Phone: <font color="#44B6AE"> <b><?php echo $atphone; ?></b></font>
													</li>
													<li>
														Alt-Mobile: <font color="#44B6AE"> <b><?php echo $amphone; ?></b></font>
													</li>
													<li>
														Gender: <font color="#44B6AE"> <b><?php echo $gender; ?></b></font>
													</li>
													</ul>
													<ul class="list-inline">
													<li>
														Satatus: <font color="#44B6AE"> <b><?php echo $mat; ?></b></font>
													</li>
													<li>
														Qualification1: <font color="#44B6AE"> <b><?php echo $q1; ?></b></font>
													</li>
													<li>
														Qualification2: <font color="#44B6AE"> <b><?php echo $q2; ?></b></font>
													</li>
													</ul>
													<ul class="list-inline">
													<li>
														Qualification3: <font color="#44B6AE"> <b><?php echo $q3; ?></b></font>
													</li>
													<li>
														Address: <font color="#44B6AE"> <b><?php echo $add; ?></b></font>
													</li>
												</ul>
											</div>
											<div class="profile-info">
											<h1>First Witness Details</h1>
											<ul class="list-inline">
											<li>
														Name: <font color="#44B6AE"> <b><?php echo $wn1; ?></b></font>
													</li>
													<li>
														CNIC: <font color="#44B6AE"> <b><?php echo $cnic1; ?></b></font>
													</li>
													<li>
														Relation: <font color="#44B6AE"> <b><?php echo $rel1; ?></b></font>
													</li>
													<li>
														Contact: <font color="#44B6AE"> <b><?php echo $mnum1; ?></b></font>
													</li>
													<li>
														Alt-Contact: <font color="#44B6AE"> <b><?php echo $anum1; ?></b></font>
													</li>
													<li>
														Years: <font color="#44B6AE"> <b><?php echo $year1; ?></b></font>
													</li>
													<li>
														Address: <font color="#44B6AE"> <b><?php echo $add1; ?></b></font>
													</li>
													</ul>
											</div>
											<div class="profile-info">
											<h1>Second Witness Details</h1>
											<ul class="list-inline">
											<li>
														Name: <font color="#44B6AE"> <b><?php echo $wn2; ?></b></font>
													</li>
													<li>
														CNIC: <font color="#44B6AE"> <b><?php echo $cnic2; ?></b></font>
													</li>
													<li>
														Relation: <font color="#44B6AE"> <b><?php echo $rel2; ?></b></font>
													</li>
													<li>
														Contact: <font color="#44B6AE"> <b><?php echo $mnum2; ?></b></font>
													</li>
													<li>
														Alt-Contact: <font color="#44B6AE"> <b><?php echo $anum2; ?></b></font>
													</li>
													<li>
														Years: <font color="#44B6AE"> <b><?php echo $year2; ?></b></font>
													</li>
													<li>
														Address: <font color="#44B6AE"> <b><?php echo $add2; ?></b></font>
													</li>
													</ul>
											</div>
											<!--end col-md-8-->
										</div>
										<!--end row-->
										<div class="tabbable tabbable-custom tabbable-custom-profile">
											<ul class="nav nav-tabs">
												<li class="active">
													<a href="#tab_1_22" data-toggle="tab">
													List of Students </a>
												</li>
											</ul>
											<div class="tab-content">
												<div class="tab-pane active" id="tab_1_22">
													<div class="tab-pane active" id="tab_1_1_1">
														<div class="portlet-body">
							<div id="mytable" class="table-responsive">
								<table class="table table-hover">
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
								<?php 
// sending query
$result = mysql_query("SELECT `course`.*, `dept`.`department`, `Gender`.`gender`, `profile`.`teacher_name`, `country`.`c_name`, `account`.`parent_name`, `lan`.`lan_name` FROM
  			`course`,`dept`,`Gender`,`profile`,`country`,`account`,`lan` WHERE course.dept_id=dept.dept_id and course.g_id=Gender.g_id and course.Teacher=profile.teacher_id and course.c_id=country.c_id and course.parent_id=account.parent_id and course.lan_id=lan.lan_id HAVING Teacher = $ptec");
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
			$Course_ID = MYSQL_RESULT($result,$i,"course_id");
			$course_yrSec = MYSQL_RESULT($result,$i,"course_yrSec");
			$doj = MYSQL_RESULT($result,$i,"Date_Of_Joining");
			$skype = MYSQL_RESULT($result,$i,"Skype_ID");
			$con = MYSQL_RESULT($result,$i,"c_name");
			$age = MYSQL_RESULT($result,$i,"Age");
			$gender = MYSQL_RESULT($result,$i,"gender");
			$cour = MYSQL_RESULT($result,$i,"department");
			$status = MYSQL_RESULT($result,$i,"Status");
			$nod = MYSQL_RESULT($result,$i,"Number_of_Days");
			$fee = MYSQL_RESULT($result,$i,"Fee");
			$teacher = MYSQL_RESULT($result,$i,"teacher_name");
			$trial = MYSQL_RESULT($result,$i,"Trial_Class");
			$pCourse = MYSQL_RESULT($result,$i,"course_id");
			$ptea = MYSQL_RESULT($result,$i,"Teacher");
			$pdt = MYSQL_RESULT($result,$i,"dept_id");
			$dept_id = MYSQL_RESULT($result,$i,"dept_id");
			$teacher_id = MYSQL_RESULT($result,$i,"Teacher");
			$pn = MYSQL_RESULT($result,$i,"parent_name");
			$plan = MYSQL_RESULT($result,$i,"lan_name");
			$ppid = MYSQL_RESULT($result,$i,"parent_id");
?>
							</tr>
								</thead>
								<tbody>
								<tr bgcolor="<?php echo $bgcolor; ?>">
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
		$i++;		
		}
	}	
?>
								</tbody>
								</table>
							</div>
						</div></div></div>
						</div>
												<!--tab-pane-->
											</div>
										</div>
									</div>
								</div>
							</div>
							<!--tab_1_2-->
									<!--end col-md-9-->
								</div>
							</div>
							<!--end tab-pane-->
						</div>
					</div>
					<!--END TABS-->
					<!--fine modal start-->
					<div class="modal fade" id="fine" tabindex="-1" role="dialog" aria-hidden="true">
								<div class="modal-dialog modal-full">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title">Add New Fine</h4>
										</div>
										<div class="modal-body">
								<div class="portlet box green">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-plus"></i>Add fine for <?php echo $tname; ?>
										</div>
										<div class="tools">
											<a href="javascript:;" class="collapse">
											</a>
										</div>
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="add-fine" method="post" class="form-horizontal form-row-seperated">
											<div class="form-body">
												<div class="form-group">
															<label class="control-label col-md-3">
															<strong>Amount</strong></label>
															<div class="col-md-7">
															<input type="text" name="amount" id="amount" class="form-control input-circle" required></input>
															</div>
												</div>
												<div class="form-group">
															<label class="control-label col-md-3">
															<strong>Type</strong></label>
															<div class="col-md-7">
															<select required class="form-control input-circle" name="type"  id="type" onchange="javascript: return optionList49_SelectedIndex()">
                      							<option value="1">Fine</option>
												<option value="2">Bouns</option>
												<option value="3">Advance</option>
												<option value="4">Returns</option>
												<option value="5">Reduction in Fine</option>
              									</select>
              												</div>
												</div>
												<div class="form-group">
															<label class="control-label col-md-3">
															<strong>Date</strong></label>
															<div class="col-md-7">
															<input type="date" name="date" id="date" class="form-control input-circle" required></input>
															</div>
												</div>
												<div class="form-group">
															<label class="control-label col-md-3">
															<strong>Description</strong></label>
															<div class="col-md-7">
															<textarea class="form-control input-circle" name="des" id="des"></textarea>
															</div>
												</div>
												<input type="hidden" value="<?php echo $this_profile_no; ?>" name="t_id" id="t_id" class="form-control input-circle"></input>
											<div class="form-actions">
												<div class="row">
													<div class="col-md-offset-3 col-md-9">
														<button type="submit" name="cmdSubmit" class="btn btn-circle blue">
														Submit</button>
														<button type="button" class="btn btn-circle default">
														Cancel</button>
													</div>
												</div>
											</div>
											</div>
										</form>
										<!-- END FORM-->
									</div>
								</div>
							</div>
										</div>
									</div>
								</div>
								<!--fine modal end-->
								<!--bank account modal start-->
					<div class="modal fade" id="bank" tabindex="-1" role="dialog" aria-hidden="true">
								<div class="modal-dialog modal-full">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title">Add Bank Account Details</h4>
										</div>
										<div class="modal-body">
								<div class="portlet box green">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-plus"></i>Add Bank Account for <?php echo $tname; ?>
										</div>
										<div class="tools">
											<a href="javascript:;" class="collapse">
											</a>
										</div>
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="edit-bank-teacher" method="post" class="form-horizontal form-row-seperated">
											<div class="form-body">
												<div class="form-group">
															<label class="control-label col-md-3">
															<strong>Account Title</strong></label>
															<div class="col-md-7">
															<input type="text" name="atitle" id="atitle" class="form-control input-circle" value="<?php echo $ttitle; ?>" required></input>
															</div>
												</div>
												<div class="form-group">
															<label class="control-label col-md-3">
															<strong>Bank</strong></label>
															<div class="col-md-7">
															<input type="text" name="abank" id="abank" class="form-control input-circle" value="<?php echo $tbank; ?>" required></input>
															</div>
												</div>
												<div class="form-group">
															<label class="control-label col-md-3">
															<strong>Branch Code</strong></label>
															<div class="col-md-7">
															<input type="text" name="acode" id="acode" class="form-control input-circle" value="<?php echo $tcode; ?>" required></input>
															</div>
												</div>
												<div class="form-group">
															<label class="control-label col-md-3">
															<strong>Account No</strong></label>
															<div class="col-md-7">
															<input type="text" name="aacc" id="aacc" class="form-control input-circle" value="<?php echo $tno; ?>" required></input>
															</div>
												</div>
												<div class="form-group">
															<label class="control-label col-md-3">
															<strong>Salary</strong></label>
															<div class="col-md-7">
															<input type="text" name="tsalary" id="tsalary" class="form-control input-circle" value="<?php echo $tsalary; ?>" required></input>
															</div>
												</div>
												<div class="form-group">
															<label class="control-label col-md-3">
															<strong>Resudence Allo.</strong></label>
															<div class="col-md-7">
															<input type="text" name="trent" id="trent" class="form-control input-circle" value="<?php echo $trent; ?>" required></input>
															</div>
												</div>
												<div class="form-group">
															<label class="control-label col-md-3">
															<strong>Tax</strong></label>
															<div class="col-md-7">
															<input type="text" name="ttax" id="ttax" class="form-control input-circle" value="<?php echo $ttax; ?>" required></input>
															</div>
												</div>
												<input type="hidden" value="<?php echo $this_profile_no; ?>" name="proiidd" id="proiidd" class="form-control input-circle"></input>
											<div class="form-actions">
												<div class="row">
													<div class="col-md-offset-3 col-md-9">
														<button type="submit" name="cmdSubmit" class="btn btn-circle blue">
														Submit</button>
														<button type="button" class="btn btn-circle default">
														Cancel</button>
													</div>
												</div>
											</div>
											</div>
										</form>
										<!-- END FORM-->
									</div>
								</div>
							</div>
										</div>
									</div>
								</div>
								<!--bank account modal end-->
								<!--salary modal start-->
					<div class="modal fade" id="salary" tabindex="-1" role="dialog" aria-hidden="true">
								<div class="modal-dialog modal-full">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title">Generate Salary</h4>
										</div>
										<div class="modal-body">
								<div class="portlet box green">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-plus"></i>Generate salary for <?php echo $tname; ?>
										</div>
										<div class="tools">
											<a href="javascript:;" class="collapse">
											</a>
										</div>
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="<?php if ($sal == 1){ echo 'generate-salary'; } elseif ($sal == 2){ echo 'female-salary'; } ?>" method="post" class="form-horizontal form-row-seperated">
											<div class="form-body">
												<div class="form-group">
															<label class="control-label col-md-3">
															<strong>Month</strong></label>
															<div class="col-md-4">
															<select required class="form-control input-circle" name="mon"  id="mon" onchange="javascript: return optionList49_SelectedIndex()">
                      							<option value="01">January</option>
												<option value="02">February</option>
												<option value="03">March</option>
												<option value="04">April</option>
												<option value="05">May</option>
												<option value="06">June</option>
												<option value="07">July</option>
												<option value="08">August</option>
												<option value="09">September</option>
												<option value="10">October</option>
												<option value="11">November</option>
												<option value="12">December</option>
              									</select>
              												</div>
												</div>
												<div class="form-group">
															<label class="control-label col-md-3">
															<strong>Year</strong></label>
															<div class="col-md-4">
															<select required class="form-control input-circle" name="yyy"  id="yyy" onchange="javascript: return optionList49_SelectedIndex()">
												<option value="2016">2016</option>
												<option value="2017">2017</option>
												<option value="2018">2018</option>
              									</select>
              												</div>
												</div>
												<input type="hidden" value="<?php echo $this_profile_no; ?>" name="t_id" id="t_id" class="form-control input-circle"></input>
												<input type="hidden" value="<?php echo $tname; ?>" name="t_name" id="t_name" class="form-control input-circle"></input>
												<input type="hidden" value="<?php echo $tsalary; ?>" name="t_salary" id="t_salary" class="form-control input-circle"></input>
												<input type="hidden" value="<?php echo $trent; ?>" name="t_rent" id="t_rent" class="form-control input-circle"></input>
												<input type="hidden" value="<?php echo $ttax; ?>" name="t_tax" id="t_tax" class="form-control input-circle"></input>
												<input type="hidden" value="<?php echo $link; ?>" name="t_link" id="t_link" class="form-control input-circle"></input>
											<div class="form-actions">
												<div class="row">
													<div class="col-md-offset-3 col-md-9">
														<button type="submit" name="cmdSubmit" class="btn btn-circle blue">
														Submit</button>
														<button type="button" class="btn btn-circle default">
														Cancel</button>
													</div>
												</div>
											</div>
											</div>
										</form>
										<!-- END FORM-->
									</div>
								</div>
							</div>
										</div>
									</div>
								</div>
								<!--salary modal end-->
				</div>
			</div>
			<!-- END PAGE CONTENT INNER -->
		</div>
	</div>
	<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->
<script>
$(document).on("click", ".open-AddBookDialog", function () {
     var myBookId = $(this).data('id');
     $(".modal-body #bookId").val( myBookId );
});
</script>
<?php $fot1; ?>
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="../../assets/global/plugins/respond.min.js"></script>
<script src="../../assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
<script src="../../assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="../../assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="../../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="../../assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="../../assets/admin/layout3/scripts/layout.js" type="text/javascript"></script>
<script src="../../assets/admin/layout3/scripts/demo.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/bootstrap-modal/js/bootstrap-modalmanager.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/bootstrap-modal/js/bootstrap-modal.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="../../assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="../../assets/admin/layout3/scripts/layout.js" type="text/javascript"></script>
<script src="../../assets/admin/layout3/scripts/demo.js" type="text/javascript"></script>
<script src="../../assets/admin/pages/scripts/ui-extended-modals.js"></script>
<script src="../../assets/global/plugins/jquery.pulsate.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/jquery-bootpag/jquery.bootpag.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/holder.js" type="text/javascript"></script>
<script src="../../assets/admin/pages/scripts/ui-general.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {       
   // initiate layout and plugins
   Metronic.init(); // init metronic core components
Layout.init(); // init current layout
Demo.init(); // init demo features
UIGeneral.init();
});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>