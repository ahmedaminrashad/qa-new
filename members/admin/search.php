<?php session_start(); ?>
  <?php
  include("../includes/session1.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("../includes/notifications.php");
  include("header.php");
$pdept =$_REQUEST['query'];
function request_status($er)
{
if ($er == 1){
			echo '<div class="ml-auto badge badge-info">New</div>';
			}
elseif ($er == 2){
			echo '<div class="ml-auto badge badge-success">Archives</div>';
			}
elseif ($er == 3){
			echo '<div class="ml-auto badge badge-warning">Teaching</div>';
			}
elseif ($er == 6){
			echo '<div class="ml-auto badge badge-danger">Responded</div>';
			}
elseif ($er == 7){
			echo '<div class="ml-auto badge badge-info">Allocated</div>';
			}
elseif ($er == 10){
			echo '<div class="ml-auto badge badge-info">Later</div>';
			}
else{
			echo 'Un-defined';
			}
}
function abc($er)
{
include("../includes/dbconnection.php");
date_default_timezone_set($er);
$date = date('h:i a', time());
echo $date;
}

function abc2($er)
{
include("../includes/dbconnection.php");
// sending query
$sql = "SELECT * FROM invoice Where parent_id = $er and status = 1";
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
function abc1($er)
{
include("../includes/dbconnection.php");
// sending query
$sql = "SELECT * FROM sched Where course_id = $er";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '<i class="fa fa-exclamation font-red"></i>';
			}
		elseif ($numberOfRows > 0) 
			{
			echo '<i class="fa fa-check font-green"></i>';
			}

	}		 	 
function abc3($er)
{
include("../includes/dbconnection.php");
// sending query
$sql = "SELECT * FROM sched Where course_id = $er";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '<i class="fa fa-exclamation font-red"></i>';
			}
		elseif ($numberOfRows > 0) 
			{
			echo '<i class="fa fa-check font-green"></i>';
			}
	}
function tech($er)
{
include("../includes/dbconnection.php");
// sending query
$sql = "SELECT * FROM profile Where teacher_id = $er";
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
function tech1($er)
{
include("../includes/dbconnection.php");
// sending query
$sql = "SELECT * FROM profile Where teacher_id = $er";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '<div class="ml-auto badge badge-danger">In-Active</div>';
			}
		else if ($numberOfRows > 0) 
			{echo '';}
			}
?>
<?php
$sy = date('Y-m-d');
?>
<?php
$page_title = 'Search Results';
$page_subtitle = 'Search results from Parent, Students and Requests';
$table_name = 'Search Results';
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
                                <div class="card-body"><h5 class="card-title">Accounts</h5>
                                    <div class="table-responsive">
								<table class="mb-0 table">
								<thead>
								<tr>
								<th>
									 No
								</th>
								<th>
									 Parent Name
								</th>
								<th>
									 Fee
								</th>
								<th>
									 Email
								</th>
								<th>
									 Local Time
								</th>
								<th>
									 &nbsp;
								</th>
								<th>
									 &nbsp;
								</th>
								</tr>
								</thead>
								<tbody>
								<?php 
$sql = "SELECT `account`.*, `currency`.`currency_name`, `time_zone`.* FROM `account`,`currency`,`time_zone` WHERE account.currency_id=currency.currency_id and account.timezone=time_zone.tz_id HAVING `parent_name` LIKE  '%".$pdept."%' OR `skype` LIKE  '%".$pdept."%' OR `city` LIKE  '%".$pdept."%' OR `email` LIKE  '%".$pdept."%' OR `telephone` LIKE  '%".$pdept."%' OR `mobile` LIKE  '%".$pdept."%'";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){		
			$pid = $row['parent_id'];
			$pname = $row['parent_name'];
			$pemail = $row['email'];
			$puser = $row['username'];
			$ppass = $row['userpass'];
			$pfee = $row['fee'];
			$active_s = $row['active'];
			$pcid = $row['c_id'];
			$pmid = $row['m_id'];
			$cu = $row['currency_name'];
			$cuid = $row['currency_id'];
			$num = $row['telephone'];
			$timez = $row['timezone'];
			$timezdif = $row['timezone_diff'];
			$phptime = $row['php_tz'];

?>
								<tr>
								<td>
									 <a href="<? if ($pst == 5){ echo 'account6'; } else { echo 'account5'; } ?>?t_id=<? echo $pid; ?>">&nbsp;&nbsp;<?php echo ++$counter; ?></a>
								</td>
								<td>
									 <b><?php echo $pname; ?></b>
								</td>
								<td>
									 <a href="ind_details?parent_id=<?php echo base64_encode($pid); ?>"><?php echo $cu; ?> <?php echo $pfee; ?>.00</a>
								</td>
								<td>
									 <a href="parent-accounts-profile?parent_id=<?php echo base64_encode($pid); ?>"><?php echo $pemail; ?></a>
								</td>
								<td>
								<b><?php echo abc("$phptime"); ?></b> (<?php echo $timezdif; ?>.00)
								</td>
								<td>
								<a href="parent-accounts-profile-invoice?parent_id=<?php echo base64_encode($pid); ?>"><button type="button" class="btn red btn-xs"><?php echo abc2("$pid"); ?></button></a>
								</td>
								<td><?php if ($active_s == 11){ echo '<div class="ml-auto badge badge-warning"><strong>On Trial</strong></div>'; } elseif ($active_s == 7){ echo '<div class="ml-auto badge badge-info"><strong>On Leave</strong></div>'; } elseif ($active_s == 3){ echo '<div class="ml-auto badge badge-danger"><strong>Deactived</strong></div>'; } elseif ($active_s == 17){ echo '<div class="ml-auto badge badge-danger"><strong>Suspended</strong></div>'; } else { echo '<div class="ml-auto badge badge-success"><strong>Regular</strong></div>'; } ?></td>
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
							<!-- Table Row Start-->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="main-card mb-3 card">
                                <div class="card-body"><h5 class="card-title">Students</h5>
                                    <div class="table-responsive">
								<table class="mb-0 table">
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
									 T-zone
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
								<th>
									 Teacher
								</th>
								</tr>
								</thead>
								<tbody>
								<?php 
// sending query
$sql = "SELECT `course`.*, `dept`.`department`, `Gender`.`gender`, `country`.`c_name`, `account`.`parent_name`, `lan`.`lan_name` FROM
  			`course`,`dept`,`Gender`,`country`,`account`,`lan` WHERE course.dept_id=dept.dept_id and course.g_id=Gender.g_id and course.c_id=country.c_id and course.parent_id=account.parent_id and course.lan_id=lan.lan_id HAVING `course_yrSec` LIKE  '%".$pdept."%' OR `Skype_ID` LIKE  '%".$pdept."%'";
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
			$trial = $row['Trial_Class'];
			$pCourse = $row['course_id'];
			$ptea = $row['Teacher'];
			$pdt = $row['dept_id'];
			$dept_id = $row['dept_id'];
			$teacher_id = $row['Teacher'];
			$pn = $row['parent_name'];
			$plan = $row['lan_name'];
			$pnat = $row['nature'];
			$ptime = $row['timezone'];
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
									 <a href="parent-accounts-profile?parent_id=<?php echo base64_encode($ppid); ?>"><?php echo $pn; ?></a>
								</td>
								<td>
									 <?php echo $con; ?>
								</td>
								<td>
									 <?php echo $ptime; ?>
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
									 <a href="history_course?Course_ID=<?php echo base64_encode($Course_ID); ?>">Daily Progress</a>
								</td>
								<td>
									 <a href="teacher-schedule?pT=<?php echo $ptea; ?>"><?php echo tech("$ptea"); ?></a><?php echo tech1("$ptea"); ?>
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
								<!-- Table Row Start-->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="main-card mb-3 card">
                                <div class="card-body"><h5 class="card-title">Submitted Requests</h5>
                                    <div class="table-responsive">
								<table class="mb-0 table">
								<thead>
								<tr>
								<th>
									 #
								</th>
								<th>
									 Name
								</th>
								<th>
									 Email
								</th>
								<th>
									 Phone
								</th>
								<th>
									 Skype
								</th>
								<th>
									 Country
								</th>

								<th>
									 City
								</th>
								<th>
									 Status
								</th>
								</tr>
								</thead>
								<tbody>
								<?php 
// sending query
$sql = "SELECT * FROM new_request WHERE `name` LIKE  '%".$pdept."%' OR `skype` LIKE  '%".$pdept."%' OR `email` LIKE  '%".$pdept."%' OR `phone` LIKE  '%".$pdept."%' ORDER BY request_id DESC;";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){		
			$arequest_id = $row['request_id'];
			$arname = $row['name'];
			$aremail = $row['email'];
			$arphone = $row['phone'];
			$arskype = $row['skype'];
			$arcountry = $row['country'];
			$arcity = $row['city'];
			$armessage = $row['message'];
			$ardate = $row['date'];
			$artime = $row['time'];
			$arupdate = $row['time_update'];
			$rasent = $row['sent'];
			$arcsr_id = $row['csr_id'];
			$arsite_id = $row['site_id'];
			$arstatus_id = $row['status'];
?>
								<tr>
								<td>
									 <?php echo ++$counter; ?>
								</td>
								<td>
									 <?php echo $arname; ?>
								</td>
								<td>
									 <?php echo $aremail; ?>
								</td>
								<td>
									 <?php echo $arphone; ?>
								</td>
								<td>
									 <?php echo $arskype; ?>
								</td>
								<td>
									 <?php echo $arcountry; ?>
								</td>
								<td>
										<?php echo $arcity; ?>
								</td>
								<td>
									 <?php echo request_status("$arstatus_id"); ?> <?php echo tech("$arcsr_id"); ?>
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
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="main-card mb-3 card">
                                <div class="card-body"><h5 class="card-title">Invoices</h5>
                                    <div class="table-responsive">
								<table class="mb-0 table">
								<thead>
								<tr>
								<th>
									<?php //echo abv("$pcur"); ?>
								</th>
								<th>
									Month
								</th>
								<th>
									Due
								</th>
								<th>
									Paid
								</th>
								<th>
									Fee
								</th>
								<th>
									ADJ
								</th>
								<th>
									AMT
								</th>
															<th>
															</th>
															<th>
															</th>
															<th>
															</th>
															<th>
															</th>
															<th>
															</th>
								</tr>
								</thead>
								<tbody>
								<?php 
$sql = "SELECT `invoice`.*, `month`.`month_name`, `statusp`.`status_name`, `currency`.`currency_name`, `school_yr`.`school_year` FROM `invoice`,`month`,`statusp`,`currency`,`school_yr` WHERE invoice.mon_id=month.month_id and invoice.status=statusp.s_id and invoice.currency_id=currency.currency_id and invoice.y_id=school_yr.year_id HAVING order_num = '$pdept'";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){
			$pidy = $row['py_id'];
			$prid = $row['parent_id'];
			$iss = $row['issue'];
			$du = $row['due'];
			$sub = $row['submit'];
			$fe = $row['fee'];
			$fe_add = $row['invoice_add'];
			$sts = $row['status_name'];
			$mon = $row['month_name'];
			$s = $row['status'];
			$cuan = $row['currency_name'];
			$cuanid = $row['currency_id'];
			$order = $row['order_num'];
			$anote = $row['add_note'];
			$ayear = $row['school_year'];
?>
								<tr>
															<td>
																<font color="<?php echo $bgcolor; ?>"><a href="parent-accounts-profile?parent_id=<?php echo base64_encode($prid); ?>"><?php echo $order; ?></font></a>															</td>
															<td class="hidden-xs">
																 <a class="invoicelink" href="#invoice" data-toggle="modal" data-target="#invoice" data-id="<?php echo $pidy; ?>" data-amu="<?php echo $fe+$fe_add; ?>" data-acc="<?php echo $cuan; ?>" data-month="<?php echo ''.$pname.'-for-'.$mon.'-'.$ayear; ?>" email="<?php echo $pemail; ?>"><font color="<?php echo $bgcolor; ?>"><?php echo substr($mon, 0, 3); ?></font></a>
															</td>
															<td>
																 <font color="<?php echo $bgcolor; ?>"><?php echo $du; ?></font>															</td>
															<td>
																<font color="<?php echo $bgcolor; ?>"><?php echo $sub; ?></font>
															</td>
															<td>
																<font color="<?php echo $bgcolor; ?>"><?php echo $cuan; ?><?php echo $fe; ?></font>
															</td>
															<td>
																<font color="<?php echo $bgcolor; ?>"><a class="invoicesnote" href="#invoice" data-toggle="modal" data-target="#invoice" data-add="<?php echo $fe_add; ?>" data-note="<?php echo $anote; ?>"><?php echo $cuan; ?><?php echo $fe_add; ?>/-</a></font>
															</td>
															<td style="width: 52px">
																<font color="<?php echo $bgcolor; ?>"><?php echo $cuan; ?><?php echo $fe+$fe_add; ?>/-</font>
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