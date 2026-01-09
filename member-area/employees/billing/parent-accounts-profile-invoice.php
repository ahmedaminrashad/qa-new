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
  include("../includes/billing_rights.php");
  require ("../includes/dbconnection.php");
   include("header.php");
   $link = $_SERVER['REQUEST_URI'];
function abc($er)
{
// sending query
   $result = mysql_query("SELECT * FROM sched Where course_id = $er");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$tnumberOfRows = MYSQL_NUMROWS($result);
If ($tnumberOfRows == 0){
			echo '<i class="fa fa-exclamation font-red"></i>';
			}
		else if ($tnumberOfRows > 0) 
			{
			echo '<i class="fa fa-check font-green"></i>';
			}
	}

   $pnid =base64_decode($_GET["parent_id"]);
	$result = mysql_query("SELECT `account`.*, `country`.`c_a`, `manager`.`username`, `time_zone`.* FROM `account`, `country`, `manager`, `time_zone` where account.c_id=country.c_id and account.m_id=manager.user_id and account.timezone=time_zone.tz_id HAVING parent_id = '$pnid'");
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
			$pid = MYSQL_RESULT($result,$i,"parent_id");
			$pname = MYSQL_RESULT($result,$i,"parent_name");
			$pemail = MYSQL_RESULT($result,$i,"email");
			$puser = MYSQL_RESULT($result,$i,"username");
			$ppass = MYSQL_RESULT($result,$i,"userpass");
			$pc11 = MYSQL_RESULT($result,$i,"c_id");
			$pt = MYSQL_RESULT($result,$i,"telephone");
			$pm = MYSQL_RESULT($result,$i,"mobile");
			$ps = MYSQL_RESULT($result,$i,"skype");
			$pfe = MYSQL_RESULT($result,$i,"fee");
			$pcity = MYSQL_RESULT($result,$i,"city");
			$pcur = MYSQL_RESULT($result,$i,"m_id");
			$pman = MYSQL_RESULT($result,$i,"currency_id");
			$pdate = MYSQL_RESULT($result,$i,"date");
			$ppayment = MYSQL_RESULT($result,$i,"mode_id");
			$pbelong = MYSQL_RESULT($result,$i,"belong");
			$ptz = MYSQL_RESULT($result,$i,"timezone");
			$active_s = MYSQL_RESULT($result,$i,"active");
			$pcname = MYSQL_RESULT($result,$i,"c_a");
			$ptname = MYSQL_RESULT($result,$i,"timezone_name");
			$pmname = MYSQL_RESULT($result,$i,"username");
			$pphptz = MYSQL_RESULT($result,$i,"php_tz");

			}
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
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css">
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
<!-- BEGIN TOP NAVIGATION MENU -->
			<div class="top-menu">
				<ul class="nav navbar-nav pull-right">
					<li class="dropdown dropdown-extended dropdown-dark dropdown-inbox" id="header_inbox_bar">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						<span class="circle">3</span>
						<span class="corner"></span>
						</a>
						<ul class="dropdown-menu">
							<li class="external">
								<h3>You have <strong>7 New</strong> Messages</h3>
								<a href="javascript:;">view all</a>
							</li>
							<li>
								<ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
									<li>
										<a href="inbox.html?a=view">
										<span class="photo">
										<img src="../../assets/admin/layout3/img/avatar2.jpg" class="img-circle" alt="">
										</span>
										<span class="subject">
										<span class="from">
										Lisa Wong </span>
										<span class="time">Just Now </span>
										</span>
										<span class="message">
										Vivamus sed auctor nibh congue nibh. auctor nibh auctor nibh... </span>
										</a>
									</li>
								</ul>
							</li>
						</ul>
					</li>
					<!-- END INBOX DROPDOWN -->
					<!-- BEGIN USER LOGIN DROPDOWN -->
					<li class="dropdown dropdown-user dropdown-dark">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						<img alt="" class="img-circle" src="../../uploads/thumb/<?php echo $_SESSION['is']['image_name'];?>">
						<span class="username username-hide-mobile"><?php echo $_SESSION['is']['teacher_name']; ?></span>
						</a>
						<ul class="dropdown-menu dropdown-menu-default">
						<?php echo s_manager(); ?>
						<?php echo manager(); ?>
						<?php echo accounts(); ?>
						<?php echo csr(); ?>
						<?php echo teacher(); ?>
						<?php echo billing(); ?>
							<li>
								<a href="logout">
								<i class="icon-key"></i> Log Out </a>
							</li>
						</ul>
					</li>
					<!-- END USER LOGIN DROPDOWN -->
				</ul>
			</div>
			<!-- END TOP NAVIGATION MENU -->
			</div>
	</div>
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
			<h1>Parent Account<small> Invoice</small></h1>
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
					<a href="parent-accounts">List of Parent Accounts</a><i class="fa fa-circle"></i>
				</li>
				<li class="active">
					 Parent Account Profile				
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
									<div class="col-md-9">
										<div class="row">
											<div class="col-md-8 profile-info">
												<h1><?php echo $pname; ?></h1>
												<h1>Personal Bio Date</h1>
												<ul class="list-inline">
													<li>
														Name: <font color="#44B6AE"> <b><?php echo $pname; ?></b></font>
													</li>
													<li>
														Email: <font color="#44B6AE"> <b><?php echo $pemail; ?></b></font>
													</li>
													<li>
														Telephone: <font color="#44B6AE"> <b><?php echo $pt; ?></b></font>
													</li>
												</ul>
											</div>
											<div class="col-md-8 profile-info">
											<ul class="list-inline">
													<li>
														Mobile: <font color="#44B6AE"> <b><?php echo $pm; ?></b></font>
													</li>
													<li>
														Skype: <font color="#44B6AE"> <b><?php echo $ps; ?></b></font>
													</li>
													<li>
														Fee: <font color="#44B6AE"> <b>$ <?php echo $pfe; ?></b></font>
													</li>
												</ul>
											</div>
											<div class="col-md-8 profile-info">
											<ul class="list-inline">
											<li>
														Country: <font color="#44B6AE"> <b><?php echo $pcname; ?></b></font>
													</li>
													<li>
														City: <font color="#44B6AE"> <b><?php echo $pcity; ?></b></font>
													</li>
													<li>
														Timezone: <font color="#44B6AE"> <b><?php echo $ptname; ?></b></font>
													</li>
													</ul>
											</div>
											<!--end col-md-8-->
										</div>
										<!--end row-->
										<div class="tabbable tabbable-custom tabbable-custom-profile">
											<ul class="nav nav-tabs">
												<li class="active">
													<a href="#tab_1_11" data-toggle="tab">
													Invoice Details </a>
												</li>
												<li>
													<a href="#tab_1_22" data-toggle="tab">
													List of Kids </a>
												</li>
											</ul>
											<div class="tab-content">
												<div class="tab-pane active" id="tab_1_11">
													<div class="portlet-body">
														<table class="table table-striped table-bordered table-advance table-hover">
														<thead>
														<tr>
															<th>
																<i class="fa fa-calendar"></i> Month
															</th>
															<th class="hidden-xs">
																<i class="fa fa-calendar"></i> Issue date
															</th>
															<th>
																<i class="fa fa-calendar"></i> Due Date
															</th>
															<th>
																<i class="fa fa-calendar"></i> Paid Date
															</th>
															<th>
																<i class="fa fa-money"></i> Fee
															</th>
															<th>
																<i class="fa fa-user"></i> Status
															</th>
															<th>
															</th>
															<th>
															</th>
														<?php 
$result = mysql_query("SELECT `invoice`.*, `month`.`month_name`, `school_yr`.`school_year`, `statusp`.`status_name` FROM `invoice`,`month`,`school_yr`,`statusp` WHERE invoice.mon_id=month.month_id and invoice.y_id=school_yr.year_id and invoice.status=statusp.s_id HAVING parent_id = $pnid and status = 1 ORDER BY py_id DESC");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
If ($numberOfRows == 0) 
	{
	echo '<font color="#0DB5C0">NO UNPAID INVOICE PAID</font>';
	}
else if ($numberOfRows > 0) 
	{
	while($row = mysql_fetch_array($result))
		{		
			if($row['status']=='1') 
				{
					$bgcolor ='#FE2E2E';
				}
			else if($row['status']=='2')
				{
					$bgcolor ='#04B404';
				}		
				else
				{
					$bgcolor ='#ffffff';
				}
			$pid = MYSQL_RESULT($result,$i,"py_id");
			$prid = MYSQL_RESULT($result,$i,"parent_id");
			$pn = MYSQL_RESULT($result,$i,"parent_name");
			$iss = MYSQL_RESULT($result,$i,"issue");
			$du = MYSQL_RESULT($result,$i,"due");
			$sub = MYSQL_RESULT($result,$i,"submit");
			$fe = MYSQL_RESULT($result,$i,"fee");
			$sts = MYSQL_RESULT($result,$i,"status_name");
			$mon = MYSQL_RESULT($result,$i,"month_name");
			$yr = MYSQL_RESULT($result,$i,"school_year");
			$s = MYSQL_RESULT($result,$i,"status");
			$a = 'href=';
?>
														</tr>
														</thead>
														<tbody>
														<tr>
															<td>
																<font color="<?php echo $bgcolor; ?>"><?php echo $mon; ?> - <?php echo $yr; ?></a></font>															</td>
															<td class="hidden-xs">
																 <font color="<?php echo $bgcolor; ?>"><?php echo $iss; ?></a></font>
															</td>
															<td>
																 <font color="<?php echo $bgcolor; ?>"><?php echo $du; ?></font>															</td>
															<td>
																<font color="<?php echo $bgcolor; ?>"><?php echo $sub; ?></font>
															</td>
															<td>
																<font color="<?php echo $bgcolor; ?>">$ <?php echo $fe; ?>/-</font>
															</td>
															<td>
																<a href="paid.php?payment_id=<?php echo $pid; ?>" onclick="return confirm('<?php echo "You are about to mark this invoice paid. Please confirm your action."; ?>');"><?php if ($s == 1){echo '<button type="button" class="btn red btn-xs">Mark Paid</button>'; }?></a><?php if ($s == 2){ echo '<button type="button" class="btn green btn-xs">Paid</button>'; } ?>
															</td>
															<td><a href="edit-invoice?pT=<?php echo base64_encode($pid); ?>&link=<?php echo base64_encode($link); ?>"><button type="button" class="btn yellow btn-xs">Edit</button></a></td>
															<td><a href="delete-invoice?pT=<?php echo $pid; ?>"><button type="button" class="btn red btn-xs">Delete</button></a></td>
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
												<!--tab-pane-->
												<div class="tab-pane" id="tab_1_22">
													<div class="tab-pane active" id="tab_1_1_1">
														<div class="portlet-body">
							<div id="mytable" class="table-responsive">
								<table class="table table-hover">
								<thead>
								<tr>
								<th>
									 Sr.No
								</th>
								<th>
									 Name
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
								<th>
									 Teacher
								</th>
								<th>
									 &nbsp;
								</th>
								<th>
									 &nbsp;
								</th>
								<th>
									 &nbsp;
								</th>
								<?php 
// sending query
$result = mysql_query("SELECT `course`.*, `dept`.`department`, `Gender`.`gender`, `profile`.`teacher_name`, `country`.`c_name`, `account`.`parent_name`, `lan`.`lan_name` FROM
  			`course`,`dept`,`Gender`,`profile`,`country`,`account`,`lan` WHERE course.dept_id=dept.dept_id and course.g_id=Gender.g_id and course.Teacher=profile.teacher_id and course.c_id=country.c_id and course.parent_id=account.parent_id and course.lan_id=lan.lan_id HAVING parent_id = $pnid");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
If ($numberOfRows == 0) 
	{
	echo '';
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
			$pnat = MYSQL_RESULT($result,$i,"nature");

?>
							</tr>
								</thead>
								<tbody>
								<tr bgcolor="<?php echo $bgcolor; ?>">
								<td>
									 <?php echo ++$counter; ?>
								</td>
								<td>
									 <?php echo abc("$Course_ID"); ?> <a href="student-schedule?pT=<?php echo base64_encode($pCourse); ?>"><?php echo $course_yrSec; ?> (<?php echo $Course_ID; ?>)</a>
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
								<td>
									 <a href="teacher-schedule?pT=<?php echo $ptea; ?>"><?php echo $teacher; ?></a>
								</td>
								<td><?php if ($pnat == 1){ echo 'Active'; } else { echo 'In-Active'; } ?></td>
								<td><a href="edit-student?pT=<?php echo $Course_ID; ?>" class="btn btn-icon-only green">
															<i class="fa fa-edit"></i></a></td>
								<td><a href="student_inactive1?t_id1=<?php echo $Course_ID; ?>" class="btn btn-icon-only red" onclick="return confirm('<?php echo "Are you sure about deactivation of Student ". $course_yrSec. " ?"; ?>');">
															<i class="fa fa-ban"></i></a></td>
							</tr>
							<?php 	
		$i++;		
		}
	}	
?>
								</tbody>
								</table>
							</div>
						</div></div>												</div>
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
				</div>
			</div>
			<!-- END PAGE CONTENT INNER -->
		</div>
	</div>
	<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->
<?php echo $fot; ?>
<script type="text/javascript" src="../../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js"></script>
<script src="../../assets/global/plugins/bootstrap-modal/js/bootstrap-modalmanager.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/bootstrap-modal/js/bootstrap-modal.js" type="text/javascript"></script>
<script src="../../assets/admin/pages/scripts/ui-extended-modals.js"></script>