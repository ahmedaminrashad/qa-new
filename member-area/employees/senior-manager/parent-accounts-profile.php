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
  include("../includes/s_manager_rights.php");
  require ("../includes/dbconnection.php");
include("header.php");
   $pid111 =$_REQUEST['parent_id'];
   $link = $_SERVER['REQUEST_URI'];
   $user_id= $_SESSION['is']['user_id'];
$user_name= $_SESSION['is']['username'];
function abv($var){
$result = mysql_query("SELECT * FROM currency Where currency_id = '$var'");
			//HAVING course_id='$pCourse'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		If ($numberOfRows == 0){
			echo '--';
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
				{			
					$acat_id = MYSQL_RESULT($result,$i,"currency_id");
					$acat_name = MYSQL_RESULT($result,$i,"currency_name");
					$acat_abv = MYSQL_RESULT($result,$i,"abv");
					echo $acat_abv;
		
	$i++;	 
			}
			}
}
function reff($er)
{
// sending query
   $result = mysql_query("SELECT * FROM new_request Where parent_id = $er");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$tnumberOfRows = MYSQL_NUMROWS($result);
If ($tnumberOfRows == 0){
			echo '<span class="label label-sm label-danger">0</span>';
			}
		else if ($tnumberOfRows > 0) 
			{echo '<span class="label label-sm label-danger">'.$tnumberOfRows.'</span>';}
			}
function tech($er)
{
// sending query
   $result = mysql_query("SELECT * FROM profile Where teacher_id = $er");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$tnumberOfRows = MYSQL_NUMROWS($result);
If ($tnumberOfRows == 0){
			echo '';
			}
		else if ($tnumberOfRows > 0) 
			{
			$i=0;
			while ($i<$tnumberOfRows)
				{			
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"teacher_id");
	
			  		echo $hidden_pt;
	$i++;	 
			}
			}
	}
function tech1($er)
{
// sending query
   $result = mysql_query("SELECT * FROM profile Where teacher_id = $er");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$tnumberOfRows = MYSQL_NUMROWS($result);
If ($tnumberOfRows == 0){
			echo '<span class="label label-sm label-danger">Not-Assiged</span>';
			}
		else if ($tnumberOfRows > 0) 
			{echo '';}
			}

function student($er)
{
// sending query
   $result = mysql_query("SELECT * FROM course Where course_id = $er and nature = 2");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$tnumberOfRows = MYSQL_NUMROWS($result);
If ($tnumberOfRows == 0){
			echo '<button type="button" class="btn red btn-xs" title="Deactivate this student"><i class="fa fa-ban"></i></button>';
			}
		else if ($tnumberOfRows > 0) 
			{echo '';}
			}
function student1($er)
{
// sending query
   $result = mysql_query("SELECT * FROM course Where course_id = $er and nature = 1");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$tnumberOfRows = MYSQL_NUMROWS($result);
If ($tnumberOfRows == 0){
			echo '<button type="button" class="btn blue btn-xs" title="Activate this student again"><i class="fa fa-user"></i></button>';
			}
		else if ($tnumberOfRows > 0) 
			{echo '';}
			}
function student3($er)
{
// sending query
   $result = mysql_query("SELECT * FROM course Where course_id = $er and nature = 1 and active = 1");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$tnumberOfRows = MYSQL_NUMROWS($result);
If ($tnumberOfRows == 0){
			echo '';
			}
		else if ($tnumberOfRows > 0) 
			{echo '<button type="button" class="btn red btn-xs" title="Suspend this student"><i class="fa fa-thumbs-o-down"></i></button>';}
			}
function student4($er)
{
// sending query
   $result = mysql_query("SELECT * FROM course Where course_id = $er and nature = 1 and active = 17");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$tnumberOfRows = MYSQL_NUMROWS($result);
If ($tnumberOfRows == 0){
			echo '';
			}
		else if ($tnumberOfRows > 0) 
			{echo '<button type="button" class="btn green btn-xs" title="Un-Suspend this student"><i class="fa fa-thumbs-o-up"></i></button>';}
			}
function classes($cr, $tr, $mr, $yr, $sr)
{
// sending query
   $result = mysql_query("SELECT * FROM class_history Where course_id = $cr AND teacher_id = $tr AND MONTH(date_admin) = $mr AND YEAR(date_admin) = $yr AND monitor_id = $sr");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$tnumberOfRows = MYSQL_NUMROWS($result);
If ($tnumberOfRows == 0){
			echo '0';
			}
		else if ($tnumberOfRows > 0) 
			{
			echo $tnumberOfRows;
			}
	}
function schedule_classes($cr)
{
// sending query
   $result = mysql_query("SELECT * FROM sched Where course_id = $cr");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$tnumberOfRows = MYSQL_NUMROWS($result);
If ($tnumberOfRows == 0){
			echo '0';
			}
		else if ($tnumberOfRows > 0) 
			{
			echo $tnumberOfRows;
			}
	}
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
	$result = mysql_query("SELECT `account`.*, `currency`.`currency_name`, `country`.`c_a`, `time_zone`.* FROM `account`,`currency`, `country`, `time_zone` where account.currency_id=currency.currency_id and account.c_id=country.c_id and account.timezone=time_zone.tz_id HAVING parent_id = '$pnid'");
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
			$pman = MYSQL_RESULT($result,$i,"m_id");
			$pcur = MYSQL_RESULT($result,$i,"currency_id");
			$pdate = MYSQL_RESULT($result,$i,"date");
			$ppayment = MYSQL_RESULT($result,$i,"mode_id");
			$pbelong = MYSQL_RESULT($result,$i,"belong");
			$ptz = MYSQL_RESULT($result,$i,"timezone");
			$active_s = MYSQL_RESULT($result,$i,"active");
			$pcname = MYSQL_RESULT($result,$i,"c_a");
			$ptname = MYSQL_RESULT($result,$i,"timezone_name");
			$pmname = MYSQL_RESULT($result,$i,"username");
			$cu = MYSQL_RESULT($result,$i,"currency_name");
			$t_date = MYSQL_RESULT($result,$i,"trial_date");
			$t_csr = MYSQL_RESULT($result,$i,"csr_id");
			$pay_type = MYSQL_RESULT($result,$i,"invoice_type");
			$pdiscount = MYSQL_RESULT($result,$i,"discount");
			$pgroup = MYSQL_RESULT($result,$i,"group_id");
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
$db = new mysqli($server_db,$username_db,$userpass_db,$name_db);
  $query = "SELECT * FROM employee_catagory WHERE cat_id > 0 OR cat_id < 10";
  $result = $db->query($query);

  while($row = $result->fetch_assoc()){
    $categories[] = array("id" => $row['cat_id'], "val" => $row['cat_name']);
  }

  $query = "SELECT * FROM profile";
  $result = $db->query($query);

  while($row = $result->fetch_assoc()){
    $subcats[$row['cat_id']][] = array("id" => $row['teacher_id'], "val" => $row['teacher_name']);
  }

  $jsonCats = json_encode($categories);
  $jsonSubCats = json_encode($subcats);
?>
<?php
date_default_timezone_set("Asia/Karachi");
$sy = date('Y-m-d');
?>
<?php
date_default_timezone_set("Asia/Karachi");
$syyw = date('Y-m-d');
$mm_id = date('m');
$yy_id = date('Y');
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
<link href="../../assets/global/plugins/bootstrap-modal/css/bootstrap-modal.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="../../assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css"/>
<link rel="stylesheet" type="text/css" href="../../assets/global/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="../../assets/admin/pages/css/todo.css"/>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
<script>
    function Reload()   {
        document.getElementById("mytable").innerHTML;
    }
    </script>
<script type='text/javascript'>
      <?php
        echo "var categories = $jsonCats; \n";
        echo "var subcats = $jsonSubCats; \n";
      ?>
      function loadCategories(){
        var select = document.getElementById("categoriesSelect");
        select.onchange = updateSubCats;
        for(var i = 0; i < categories.length; i++){
          select.options[i] = new Option(categories[i].val,categories[i].id);          
        }
      }
      function updateSubCats(){
        var catSelect = this;
        var teacher_id = this.value;
        var subcatSelect = document.getElementById("subcatsSelect");
        subcatSelect.options.length = 0; //delete all options if any present
        for(var i = 0; i < subcats[teacher_id].length; i++){
          subcatSelect.options[i] = new Option(subcats[teacher_id][i].val,subcats[teacher_id][i].id);
        }
      }
    </script>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-menu-fixed" class to set the mega menu fixed  -->
<!-- DOC: Apply "page-header-top-fixed" class to set the top menu fixed  -->
<body onload='loadCategories()'>
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
<!-- BEGIN PAGE CONTAINER -->
<div class="page-container">
	<!-- BEGIN PAGE HEAD -->
	<div class="page-head">
		<div class="container">
			<!-- BEGIN PAGE TITLE -->
			<div class="page-title">
			<h1>Parent Account<small> Profile</small></h1>

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
									<div class="col-md-3">
										<ul class="list-unstyled profile-nav">
											<li>
												<img src="../../assets/admin/pages/media/profile/profile-img.png" class="img-responsive" alt=""/>
											</li>
											<li>
												<a href="ind_details?parent_id=<?php echo base64_encode($pnid); ?>">
												<i class="fa fa-money"></i> Invoice Details </a>
											</li>
											<li>
												<a href="save-student?t_id=<?php echo $pid; ?>&cp_id=<?php echo $pc11; ?>&man_id=<?php echo $pman; ?>&trial_id=<?php echo $active_s; ?>&time_id=<?php echo $ptz; ?>&csr_id=<?php echo $t_csr; ?>">
												<i class="fa fa-plus"></i> Add New Student</a>
											</li>
											<li>
												<a href="create-monthly-invoice-ins?pids=<?php echo $pid; ?>&frr=<?php echo $pfe; ?>">
												<i class="fa fa-money"></i> Instant Invoice</a>
											</li>
											<li>
												<a href="edit-parent-account?parent_id=<?php echo base64_encode($pid); ?>&link=<?php echo $link; ?>">
												<i class="fa fa-edit"></i> Edit Profile</a>
											</li>
											<li>
												<a href="add-manual-invoice?parent_id=<?php echo base64_encode($pid); ?>&link=<?php echo base64_encode($link); ?>">
												<i class="fa fa-money"></i> <i class="fa fa-plus"></i> Add Invoice</a>
											</li>
											<li>
												<?php if ($active_s != 17){ echo '<a data-toggle="modal" href="#suspension"><i class="fa fa-money"></i> <i class="fa fa-plus"></i> Suspend Classes</a>'; } else { echo ''; } ?>
												<?php if ($active_s == 17){ echo '<a href="un-suspend-classes?t_id='.$pid.'&link='.$link.'"><i class="fa fa-money"></i> <i class="fa fa-plus"></i> Un-Suspend Classes</a>'; } else { echo ''; } ?>
											</li>
										</ul>
									</div>
									<div class="col-md-9">
										<div class="row">
											<div class="col-md-8 profile-info">
												<h1><?php echo $pname; ?> <?php echo reff("$pnid"); ?> <?php if ($active_s == 11 and $syyw > $t_date){ echo '<font color="FE2E2E"><b>(Trial Over)</b></font>'; } elseif ($active_s == 11 and $syyw < $t_date){ echo '(On Trial)'; } elseif ($active_s == 11 and $syyw == $t_date){ echo '(Last On Trial)'; }?> <?php if ($active_s == 1){ echo '<button type="button" class="btn green btn-xs" title="System will send regular invoive"><i class="fa fa-money"></i> <i class="fa fa-check"></i></button>'; } else { echo '<button type="button" class="btn red btn-xs" title="System will not send regular invoice"><i class="fa fa-money"></i> <i class="fa fa-close"></i></button>'; } ?> <?php if ($ppayment == 1) { echo '<span class="label label-sm label-info">2CheckOut</span>';} if ($ppayment == 2) { echo '<span class="label label-sm label-success">PayPal</span>';} ?></h1>
												<?php if ($active_s == 11){ echo '<p><a data-toggle="modal" href="#trial"><button type="button" class="btn red btn-xs"><i class="fa fa-clock-o"></i> Change Trial Date</button></a></p>'; }?>
												<?php if ($pay_type == 2){ echo '<p>Invoice Type: <span class="label label-sm label-success">Recurring</span></p>'; } 
												elseif ($pay_type == 3){ echo '<p>Invoice Type: <span class="label label-sm label-danger">Failed</span></p>'; } 
												elseif ($pay_type == 4){ echo '<p>Invoice Type: <span class="label label-sm label-warning">Stopped</span></p>'; } 
												else { echo '<p>Invoice Type: <span class="label label-sm label-warning">Monthly</span></p>'; }?>
												<p>
													 <?php echo $pname; ?> lives in <?php echo $pcity; ?>, <?php echo $pcname; ?> and originally belongs form <?php echo $pbelong; ?>, joined on <?php echo $pdate; ?>.
												</p>
												<p>Created By: <span class="label label-info"><strong><?php echo tech("$t_csr"); ?></strong></span> Manager: <span class="label label-info"><strong><?php echo tech("$pman"); ?></strong></span></p>
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
											<div class="col-md-4">
												<div class="portlet sale-summary">
													<div class="portlet-title">
														<div class="caption">
															 Status: 														</div>
														<div class="tools">
															<?php if ($active_s == 11){ echo '<span class="label label-warning"><strong>On Trial</strong></span>'; } elseif ($active_s == 7){ echo '<span class="label label-info"><strong>On Leave</strong></span>'; } elseif ($active_s == 3){ echo '<span class="label label-danger"><strong>Deactived</strong></span>'; } elseif ($active_s == 17){ echo '<span class="label label-danger"><strong>Suspended</strong></span>'; } else { echo '<span class="label label-success"><strong>Regular</strong></span>'; } ?>														</div>
													</div>
													<div class="portlet-body">
														<ul class="list-unstyled">
															<li>
																<span class="sale-info">
																---------<i class="fa fa-arrow-right"></i><i class="fa fa-img-up"></i>
																</span>
																<span class="sale-num">
																<a data-toggle="modal" href="#deactivation"><?php if ($active_s == 1 OR $active_s == 5 OR $active_s == 7 OR $active_s == 11){ echo '<button type="button" class="btn red btn-xs"><i class="fa fa-ban"></i> Deactivate</button>'; } ?></a><a href="activate-account?t_id=<?php echo $pid; ?>&name=<?php echo $pname; ?>" onclick="return confirm('<?php echo "Are you sure about activation of Account ". $pname. " ?"; ?>');"><?php if ($active_s == 3) { echo '<button type="button" class="btn blue btn-xs"><i class="fa fa-user"></i> Activate</button>'; } ?></a></span>
															</li>
															<li>
																<span class="sale-info">
																---------<i class="fa fa-arrow-right"></i><i class="fa fa-img-up"></i>
																</span>
																<span class="sale-num">
																<a href="make-regular?t_id=<?php echo $pid; ?>&d_id=<?php echo $syyw ; ?>&frr=<?php echo $pfe; ?>&cur=<?php echo $cu; ?>&link=<?php echo $link; ?>"><?php if ($active_s == 11){ echo '<button type="button" class="btn green btn-xs"><i class="fa fa-user"></i> Make Regular</button>'; } ?>
																<a href="make-off-leave?t_id=<?php echo $pid; ?>"><?php if ($active_s == 7){ echo '<button type="button" class="btn green btn-xs"><i class="fa fa-user"></i> Make off Leave</button>'; } ?></a>
																<a data-toggle="modal" href="#leave"><?php if ($active_s == 1 OR $active_s == 5){ echo '<button type="button" class="btn blue btn-xs"><i class="fa fa-user"></i> Make on Leave</button>'; } ?></a>
																<?php if ($active_s == 3){ echo '<span class="label label-warning"><strong>Not Applicable</strong></span>'; } ?>
																</span>
															</li>
														</ul>
													</div>
												</div>
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
														Fee: <font color="#44B6AE"> <b><?php if($user_id<=12) {echo $cu;} else {echo "Nil";} ?> <?php if($user_id<=12) {echo $pfe;} else {echo "Nil";} ?></b></font>
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
											<div class="col-md-8 profile-info">
											<ul class="list-inline">
											<li>
														Username: <font color="#44B6AE"> <b><?php echo $puser; ?></b></font>
													</li>
													<li>
														Password: <font color="#44B6AE"> <b><?php echo $ppass; ?></b></font>
													</li>
													<li>
														WhatsApp ID: <font color="#44B6AE"> <b><?php echo $pgroup; ?></b></font>
													</li>
													</ul>
											</div>
											<!--end col-md-8-->
											<div class="col-md-10 profile-info">
											<ul class="list-inline">
											<li>
														<a href="save-student?t_id=<?php echo $pid; ?>&cp_id=<?php echo $pc11; ?>&man_id=<?php echo $pman; ?>&trial_id=<?php echo $active_s; ?>&time_id=<?php echo $ptz; ?>&csr_id=<?php echo $t_csr; ?>&cur_id=<?php echo $pcur; ?>"><button type="button" class="btn blue btn-xs"><i class="fa fa-plus"></i> Add New Student</button></a>
													</li>
													<li>
														<a href="edit-parent-account?parent_id=<?php echo base64_encode($pid); ?>&link=<?php echo $link; ?>"><button type="button" class="btn yellow btn-xs"><i class="fa fa-edit"></i> Edit Profile</button></a>

													</li>
													<li>
														<a href="create-monthly-invoice-ins?pids=<?php echo $pid; ?>&frr=<?php echo $pfe; ?>&cur=<?php echo $cu; ?>&link=<?php echo $link; ?>"><button type="button" class="btn green btn-xs"><i class="fa fa-money"></i> Instant Invoice</button></a>
													</li>
													<li>
														<a data-target="#note" data-toggle="modal"><button type="button" class="btn red btn-xs"><i class="fa fa-comments"></i> Add Notes</button></a>
													</li>
													<li>
														<a href="add-new-task-manual?parent_id=<?php echo $pid; ?>&name=<?php echo $pname; ?>"><button type="button" class="btn blue btn-xs"><i class="fa fa-comments"></i> Add Task</button></a>
													</li>
													</ul>
											</div>
											<!--end col-md-8-->
										</div>
										<!--end row-->
										<div class="tabbable tabbable-custom tabbable-custom-profile">
											<ul class="nav nav-tabs">
												<li>
													<a href="#tab_1_11" data-toggle="tab">
													Invoice Details </a>
												</li>
												<li class="active">
													<a href="#tab_1_22" data-toggle="tab">
													List of Kids </a>
												</li>
												<li>
													<a href="#tab_1_33" data-toggle="tab">
													Manager Notes <span class="label label-sm label-danger"><?php $result = mysql_query("SELECT * FROM comment WHERE parent_id = '$pid'");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
If ($numberOfRows == 0){
			echo '0';
			}
		else if ($numberOfRows > 0) 
			{
			echo $numberOfRows;
			} ?></span> </a>
												</li>
												<li>
													<a href="#tab_1_44" data-toggle="tab">
													Teacher Notes <span class="label label-sm label-danger"><?php $result = mysql_query("SELECT * FROM note_student WHERE parent_id = '$pid'");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$tnumberOfRows = MYSQL_NUMROWS($result);
If ($tnumberOfRows == 0){
			echo '0';
			}
		else if ($tnumberOfRows > 0) 
			{
			echo $tnumberOfRows;
			} ?></span> </a>
												</li>
												<li>
													<a href="#tab_1_55" data-toggle="tab">
													Tasks </a>
												</li>
											</ul>
											<div class="tab-content">
												<div class="tab-pane" id="tab_1_11">
													<div class="portlet-body">
														<table class="table table-hover">
														<thead>
														<tr>
															<th>
									<?php echo abv("$pcur"); ?>
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
														<?php 
$result = mysql_query("SELECT `invoice`.*, `month`.`month_name`, `statusp`.`status_name`, `currency`.`currency_name`, `school_yr`.`school_year` FROM `invoice`,`month`,`statusp`,`currency`,`school_yr` WHERE invoice.mon_id=month.month_id and invoice.status=statusp.s_id and invoice.currency_id=currency.currency_id and invoice.y_id=school_yr.year_id HAVING parent_id = $pnid ORDER BY py_id DESC");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
If ($numberOfRows == 0) 
	{
	echo '<font color="#0DB5C0">Sorry No Invoice Send Yet!</font>';
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
			$pidy = MYSQL_RESULT($result,$i,"py_id");
			$prid = MYSQL_RESULT($result,$i,"parent_id");
			$iss = MYSQL_RESULT($result,$i,"issue");
			$du = MYSQL_RESULT($result,$i,"due");
			$sub = MYSQL_RESULT($result,$i,"submit");
			$fe = MYSQL_RESULT($result,$i,"fee");
			$fe_add = MYSQL_RESULT($result,$i,"invoice_add");
			$sts = MYSQL_RESULT($result,$i,"status_name");
			$mon = MYSQL_RESULT($result,$i,"month_name");
			$s = MYSQL_RESULT($result,$i,"status");
			$cuan = MYSQL_RESULT($result,$i,"currency_name");
			$cuanid = MYSQL_RESULT($result,$i,"currency_id");
			$order = MYSQL_RESULT($result,$i,"order_num");
			$anote = MYSQL_RESULT($result,$i,"add_note");
			$ayear = MYSQL_RESULT($result,$i,"school_year");
?>
														</tr>
														</thead>
														<tbody>
														<tr>
															<td>
																<font color="<?php echo $bgcolor; ?>"><?php echo $order; ?></font>															</td>
															<td class="hidden-xs">
																 <a class="invoicelink" href="#invoice" data-toggle="modal" data-target="#invoice" data-id="<?php echo $pidy; ?>" data-amu="<?php echo $fe+$fe_add; ?>" data-acc="<?php echo abv("$pcur"); ?>" data-month="<?php echo ''.$pemail.'-for-'.$mon.'-'.$ayear; ?>"><font color="<?php echo $bgcolor; ?>"><?php echo substr($mon, 0, 3); ?></font></a>
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
															<td>
																<a class="invoices" href="#invoice" data-toggle="modal" data-target="#invoice" data-id="<?php echo $pidy; ?>" data-add="<?php echo $fe_add; ?>" data-note="<?php echo $anote; ?>" data-name="<?php echo $pname; ?>"><button type="button" title="Add invoice adjustment +/-" class="btn blue btn-xs"><i class="fa fa-money"></i></button></a>
															</td>
															<td>
																<a class="markpaid" href="#invoice" data-toggle="modal" data-target="#invoice" data-add="<?php echo $pidy; ?>" data-date="<?php echo $sub; ?>" data-note="<?php echo $order; ?>"><?php if ($s == 1){echo '<button type="button" title="Mark this Invoice as Paid" class="btn red btn-xs">Mark</button>'; }?></a><?php if ($s == 2){ echo '<button type="button" title="A paid invoice" class="btn green btn-xs">Paid</button>'; } ?>
															</td>
															<td><a href="edit-invoice?pT=<?php echo base64_encode($pidy); ?>&link=<?php echo base64_encode($link); ?>"><button type="button" title="Edit Invoice" class="btn yellow btn-xs"><i class="fa fa-edit"></i></button></a></td>
															<td><a href="delete-invoice?pT=<?php echo $pidy; ?>"><button type="button" title="Delete Invoice" class="btn red btn-xs"><i class="fa fa-ban"></i></button></a></td>
															<td>
																<a class="split" href="#invoice" data-toggle="modal" data-target="#invoice" data-add="<?php echo $pidy; ?>" data-fee="<?php echo $fe; ?>"><button type="button" title="Split Invoice" class="btn red btn-xs"><i class="fa fa-unlink"></i></button></a>
															</td>
															<td><a href="mail-direct-link?invoice_no=<?php echo $pidy; ?>&account=<?php echo abv("$pcur"); ?>&month=<?php echo $mon; ?>&year=<?php echo $ayear; ?>&cur=<?php echo $cuan; ?>&amount=<?php echo $fe+$fe_add; ?>&parent=<?php echo $prid; ?>&link=<?php echo $link; ?>"><button type="button" title="Email Direct Payment Link" class="btn yellow btn-xs"><i class="fa fa-envelope"></i></button></a></td>
															<td><a href="mail-direct-link-recurring?invoice_no=<?php echo $pidy; ?>&account=<?php echo abv("$cuanid"); ?>&month=<?php echo $mon; ?>&year=<?php echo $ayear; ?>&cur=<?php echo $cuan; ?>&amount=<?php echo $fe+$fe_add; ?>&parent=<?php echo $prid; ?>&link=<?php echo $link; ?>"><button type="button" title="Email Recurring Payment Link" class="btn green btn-xs"><i class="fa fa-envelope"></i></button></a></td>
															<td><a href="mail-direct-link-paypal?invoice_no=<?php echo $pidy; ?>&account=<?php echo abv("$cuanid"); ?>&month=<?php echo $mon; ?>&year=<?php echo $ayear; ?>&cur=<?php echo $cuan; ?>&amount=<?php echo $fe+$fe_add; ?>&parent=<?php echo $prid; ?>&link=<?php echo $link; ?>"><button type="button" title="Email Direct Payment Link PayPal" class="btn yellow btn-xs"><i class="fa fa-paypal"></i></button></a></td>
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
												<div class="tab-pane active" id="tab_1_22">
												<div class="portlet-body">
							<div id="mytable" class="table-responsive">
								<table class="table table-hover">
								<thead>
								<tr>
								<th>
									 #
								</th>
								<th>
									 Name
								</th>
								<th>
									 History
								</th>
								<th>
									 Test
								</th>
								<th>
									 Teacher
								</th>
								<th>
									 Fee
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
								<th>
									 &nbsp;
								</th>
								<?php 
// sending query
$result = mysql_query("SELECT `course`.*, `dept`.`department`, `Gender`.`gender`, `country`.`c_name`, `account`.`parent_name`, `lan`.`lan_name` FROM
  			`course`,`dept`,`Gender`,`country`,`account`,`lan` WHERE course.dept_id=dept.dept_id and course.g_id=Gender.g_id and course.c_id=country.c_id and course.parent_id=account.parent_id and course.lan_id=lan.lan_id HAVING parent_id = $pnid");
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
			$trial = MYSQL_RESULT($result,$i,"Trial_Class");
			$pCourse = MYSQL_RESULT($result,$i,"course_id");
			$ptea = MYSQL_RESULT($result,$i,"Teacher");
			$pdt = MYSQL_RESULT($result,$i,"dept_id");
			$dept_id = MYSQL_RESULT($result,$i,"dept_id");
			$teacher_id = MYSQL_RESULT($result,$i,"Teacher");
			$pn = MYSQL_RESULT($result,$i,"parent_name");
			$plan = MYSQL_RESULT($result,$i,"lan_name");
			$pnat = MYSQL_RESULT($result,$i,"nature");
			$scsrid = MYSQL_RESULT($result,$i,"csr_id");

?>
							</tr>
								</thead>
								<tbody>
								<tr class="<?php if ($pnat == 1) { echo 'success'; } else { echo 'danger'; } ?>">
								<td>
									 <span class="label label-warning" title="<?php echo tech("$scsrid"); ?>"><strong><?php echo ++$counter; ?></strong></span>
								</td>
								<td>
									 <?php echo abc("$Course_ID"); ?> <a href="student-schedule?pT=<?php echo base64_encode($pCourse); ?>" title="(Classes/Week: <?php echo schedule_classes("$Course_ID");?>) (Taken this month: <?php echo classes("$Course_ID", "$ptea", "$mm_id", "$yy_id", "9"); ?>) (Absent this month: <?php echo classes("$Course_ID", "$ptea", "$mm_id", "$yy_id", "4"); ?>) (Leave this month: <?php echo classes("$Course_ID", "$ptea", "$mm_id", "$yy_id", "5"); ?>) (Delined this month: <?php echo classes("$Course_ID", "$ptea", "$mm_id", "$yy_id", "6"); ?>) (Pending this month: <?php echo classes("$Course_ID", "$ptea", "$mm_id", "$yy_id", "7"); ?>)"><?php echo $course_yrSec; ?></a>
								</td>
								<td>
									 <a href="history_course?Course_ID=<?php echo base64_encode($Course_ID); ?>">Progress</a>
								</td>
								<td>
									 <a href="student_results?Course_ID=<?php echo base64_encode($Course_ID); ?>&link=<?php echo base64_encode($link); ?>&name=<?php echo base64_encode($pname); ?>">Report</a>
								</td>
								<td>
									 <a href="teacher-schedule?pT=<?php echo $ptea; ?>"><?php echo tech("$ptea"); ?></a><?php echo tech1("$ptea"); ?>
								</td>
								<td>
									<?php echo $cu; ?> <?php if ($pnat == 1) { echo $fee; } else { echo '0'; } ?>
								</td>
								<td>
									<?php if ($pnat == 1) { echo '<a class="pack" href="#invoice" data-toggle="modal" data-target="#invoice" data-id="'.$Course_ID.'" data-pack="'.$nod.'" data-cur="'.$pcur.'"><button type="button" title="Change Package" class="btn red btn-xs"><i class="fa fa-graduation-cap"></i></button></a>'; } ?>
								</td>
								<td><?php if ($pnat == 1) { echo '<a href="edit-student-account?Course_ID='.$Course_ID.'&link='.$link.'&cur_id='.$pcur.'"><button type="button" class="btn yellow btn-xs" title="Edit Student Data"><i class="fa fa-edit"></i></button></a>'; } ?></td>								
								<td>
								    <a href="suspend-student?t_id=<?php echo $Course_ID; ?>" onclick="return confirm('<?php echo "Are you sure about Suspension of Student ". $course_yrSec. " ?"; ?>');"><?php echo student3("$Course_ID"); ?></a>
								    <a href="un-suspend-student?t_id=<?php echo $Course_ID; ?>" onclick="return confirm('<?php echo "Are you sure about Un-Suspension of Student ". $course_yrSec. " ?"; ?>');"><?php echo student4("$Course_ID"); ?></a>
								</td>
								<td><a href="student_inactive1?t_id1=<?php echo $Course_ID; ?>&link=<?php echo $link; ?>" onclick="return confirm('<?php echo "Are you sure about deactivation of Student ". $course_yrSec. " ?"; ?>');"><?php echo student("$Course_ID"); ?></a>
									<a href="student_inactive2?t_id1=<?php echo $Course_ID; ?>&link=<?php echo $link; ?>" onclick="return confirm('<?php echo "Are you sure about activation of Student ". $course_yrSec. " ?"; ?>');"><?php echo student1("$Course_ID"); ?></a>
								</td>
								</tr>
							<?php 	
		$i++;		
		}
	}	
?>
								</table>
							</div>												
							</div>
							</div>
						<div class="tab-pane" id="tab_1_33">
														<div class="scroller" data-height="290px" data-always-visible="1" data-rail-visible1="1">
															<ul class="feeds">
															<?php 
// sending query
$result = mysql_query("SELECT * FROM comment WHERE parent_id = '$pid' ORDER BY com_id DESC;");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
If ($numberOfRows == 0) 
	{
	echo '<div class="label label-info">No Note Found!</div>';
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
		
			$auid = MYSQL_RESULT($result,$i,"user_id");
			$atime = MYSQL_RESULT($result,$i,"time");
			$adate = MYSQL_RESULT($result,$i,"date");
			$auser = MYSQL_RESULT($result,$i,"username");
			$amid = MYSQL_RESULT($result,$i,"manager_id");
			$aname = MYSQL_RESULT($result,$i,"parent_name");
			$acom = MYSQL_RESULT($result,$i,"comment");
			$apid = MYSQL_RESULT($result,$i,"parent_id");
			$atype = MYSQL_RESULT($result,$i,"type");
?>
																<li>
																	<div class="col1">
																		<div class="cont">
																			<div class="cont-col1">
																				<div class="label label-info">
																					<?php echo $atime; ?>
																				</div>
																			</div>
																			<div class="cont-col2">
																				<div class="desc">
																					 <b><?php echo $atype; ?> by <?php echo tech($auid); ?>:</b> <?php echo $acom; ?>
																				</div>
																			</div>
																		</div>
																	</div>
																	<div class="col2">
																		<div class="date">
																			 <?php echo $adate; ?>
																		</div>
																	</div>
																</li>
																<?php 	
		$i++;		
		}
	}	
?>
															</ul>
														</div>
													</div>
										<div class="tab-pane" id="tab_1_44">
														<div class="scroller" data-height="290px" data-always-visible="1" data-rail-visible1="1">
															<ul class="feeds">
															<?php 
// sending query
$result = mysql_query("SELECT * FROM note_student WHERE parent_id = '$pid' ORDER BY note_id DESC;");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
If ($numberOfRows == 0) 
	{
	echo '<div class="label label-info">No Note Found!</div>';
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
		
			$anid = MYSQL_RESULT($result,$i,"note_id");
			$anote = MYSQL_RESULT($result,$i,"note_text");
			$astatus = MYSQL_RESULT($result,$i,"status");
			$adate = MYSQL_RESULT($result,$i,"date");
			$atime = MYSQL_RESULT($result,$i,"time");
			$asid = MYSQL_RESULT($result,$i,"course_id");
			$atid = MYSQL_RESULT($result,$i,"teacher_id");
			$asname = MYSQL_RESULT($result,$i,"student_name");
			$atname = MYSQL_RESULT($result,$i,"teacher_name");
			$apid = MYSQL_RESULT($result,$i,"parent_id");
			$ardate = MYSQL_RESULT($result,$i,"read_date");
			$artime = MYSQL_RESULT($result,$i,"read_time");
?>
																<li>
																	<div class="col1">
																		<div class="cont">
																			<div class="cont-col1">
																				<div class="label label-info">
																					<?php echo $adate; ?>
																				</div>
																			</div>
																			<div class="cont-col2">
																				<div class="desc">
																					 <?php echo $anote; ?>
																				</div>
																			</div>
																		</div>
																	</div>
																	<div class="col2">
																		<div class="date">
																			 <?php if ($astatus == 1){ echo '<a href="add-note-reply-p?n_id='.$anid.'&link='.$link.'"<span class="label label-sm label-warning">Pending</span></a>'; } elseif ($astatus == 2){echo '<a href="one-note?n_id='.$anid.'&link='.$link.'"<span class="label label-sm label-success">Cleared</span></a>';}?>
																		</div>
																	</div>
																</li>
																<?php 	
		$i++;		
		}
	}	
?>
															</ul>
														</div>
													</div>
													<div class="tab-pane" id="tab_1_55">
														<div class="scroller" style="height: 305px;" data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2">
											<div class="todo-tasklist">
											<?php 
// sending query
$result = mysql_query("SELECT * FROM task WHERE parent_id = '$pid' ORDER BY task_id DESC;");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
If ($numberOfRows == 0) 
	{
	echo '<div class="label label-info">No Pending Task Found!</div>';
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
		
			$taskid = MYSQL_RESULT($result,$i,"task_id");
			$pname = MYSQL_RESULT($result,$i,"parent_name");
			$taskdes = MYSQL_RESULT($result,$i,"task_des");
			$stu = MYSQL_RESULT($result,$i,"status");
			$reply = MYSQL_RESULT($result,$i,"responce");
			$adate = MYSQL_RESULT($result,$i,"task_date");
			$rdate = MYSQL_RESULT($result,$i,"responce_date");
			$type = MYSQL_RESULT($result,$i,"type_id");
			$man = MYSQL_RESULT($result,$i,"manager");
			$pid = MYSQL_RESULT($result,$i,"parent_id");
?>
													<div class="todo-tasklist-item todo-tasklist-item-border-green">
													<div class="todo-tasklist-item-title">
														<?php if ($pid > 0){echo '<font color="#44B6AE">(Family Name: <a href="parent-accounts-profile?parent_id='.base64_encode($pid).'">'.$pname.'</a>)';} else {echo '';} ?> <font color="#A80707">Assigned to <?php echo $man; ?></font>
													</div>
													<div class="todo-tasklist-item-text">
														 <?php echo $taskdes; ?>
													</div>
													<div class="todo-tasklist-controls pull-left">
														<span class="todo-tasklist-date"><i class="fa fa-calendar"></i> <?php echo $adate; ?> </span>
														<span class="todo-tasklist-badge badge badge-roundless"><?php if ($type ==1){echo "Urgent";} else {echo "Casual";} ?></span>
													</div>
													<div class="todo-tasklist-controls pull-right">
														<a href="clear-task?pT=<?php echo base64_encode($taskid); ?>&link=<?php echo $link; ?>"><button type="button" class="btn green btn-xs">Clear Now</button></a>
														</div>
												</div>
												<?php 	
		$i++;		
		}
	}	
?>
											</div>
										</div>
													</div>
												</div>
						</div>												</div>
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
					<div class="modal fade" id="note" tabindex="-1" role="dialog" aria-hidden="true">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title">Add Note</h4>
										</div>
										<div class="modal-body">
								<div class="portlet box green">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-plus"></i>Add Note for <?php echo $pname; ?>
										</div>
										<div class="tools">
											<a href="javascript:;" class="collapse">
											</a>
										</div>
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="add-chat-comment" method="post" class="form-horizontal form-row-seperated">
											<div class="form-body">
												<div class="form-group">
															<label class="control-label col-md-3">
															<strong>Parent Name</strong></label>
															<div class="col-md-4">
															<input type="text" placeholder="<?php echo $pname; ?>" name="tz_name" id="tz_name" class="form-control input-circle" readonly></input>
															</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label"><strong>
													Your Comments</strong></label>
													<div class="col-md-9">
														<textarea class="form-control input-circle" placeholder="Enter Your Comments" name="comment" id="comment"></textarea>
													</div>
												</div>
												<input type="hidden" value="<?php echo $pid; ?>" name="p_id" id="p_id" class="form-control input-circle"></input>
												<input type="hidden" value="1" name="u_id" id="u_id" class="form-control input-circle"></input>
												<input type="hidden" value="<?php echo $date11; ?>" name="date" id="date" class="form-control input-circle"></input>
												<input type="hidden" value="<?php echo $sy11; ?>" name="time" id="time" class="form-control input-circle"></input>
												<input type="hidden" value="<?php echo $user_name; ?>" name="usname" id="usname" class="form-control input-circle"></input>
												<input type="hidden" value="<?php echo $pname; ?>" name="psname" id="psname" class="form-control input-circle"></input>
												<input type="hidden" value="Manager Note" name="type" id="type" class="form-control input-circle"></input>
											<div class="form-actions">
												<div class="row">
													<div class="col-md-offset-3 col-md-9">
														<button type="submit" name="cmdSubmit" class="btn btn-circle blue">
														Submit</button>
														<button type="button" data-dismiss="modal" aria-hidden="true" class="btn btn-circle default">
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
								<!-- DEACTIVATION NOTE -->
						<div class="modal fade" id="deactivation" tabindex="-1" role="dialog" aria-hidden="true">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title">Add Note About Deactivation of <?php echo $pname; ?></h4>
										</div>
										<div class="modal-body">
								<div class="portlet box green">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-plus"></i>Why are you deactivating <?php echo $pname; ?>
										</div>
										<div class="tools">
											<a href="javascript:;" class="collapse">
											</a>
										</div>
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="add-chat-comment-to-deactivate" method="post" class="form-horizontal form-row-seperated">
											<div class="form-body">
												<div class="form-group">
															<label class="control-label col-md-3">
															<strong>Parent Name</strong></label>
															<div class="col-md-4">
															<input type="text" placeholder="<?php echo $pname; ?>" name="tz_name" id="tz_name" class="form-control input-circle" readonly></input>
															</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label"><strong>
													Your Comments</strong></label>
													<div class="col-md-9">
														<textarea class="form-control input-circle" placeholder="Enter Your Comments" name="comment" id="comment"></textarea>
													</div>
												</div>
												<input type="hidden" value="<?php echo $pid; ?>" name="p_id" id="p_id" class="form-control input-circle"></input>
												<input type="hidden" value="1" name="u_id" id="u_id" class="form-control input-circle"></input>
												<input type="hidden" value="<?php echo $date11; ?>" name="date" id="date" class="form-control input-circle"></input>
												<input type="hidden" value="<?php echo $sy11; ?>" name="time" id="time" class="form-control input-circle"></input>
												<input type="hidden" value="<?php echo $user_name; ?>" name="usname" id="usname" class="form-control input-circle"></input>
												<input type="hidden" value="<?php echo $pname; ?>" name="psname" id="psname" class="form-control input-circle"></input>
												<input type="hidden" value="Deactivation Note" name="type" id="type" class="form-control input-circle"></input>
											<div class="form-actions">
												<div class="row">
													<div class="col-md-offset-3 col-md-9">
														<button type="submit" name="cmdSubmit" class="btn btn-circle blue">
														Submit</button>
														<button type="button" data-dismiss="modal" aria-hidden="true" class="btn btn-circle default">
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
								<div class="modal fade" id="suspension" tabindex="-1" role="dialog" aria-hidden="true">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title">Add Note About Suspension of <?php echo $pname; ?></h4>
										</div>
										<div class="modal-body">
								<div class="portlet box green">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-plus"></i>Why are you suspending <?php echo $pname; ?>
										</div>
										<div class="tools">
											<a href="javascript:;" class="collapse">
											</a>
										</div>
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="add-chat-comment-to-suspend" method="post" class="form-horizontal form-row-seperated">
											<div class="form-body">
												<div class="form-group">
															<label class="control-label col-md-3">
															<strong>Parent Name</strong></label>
															<div class="col-md-4">
															<input type="text" placeholder="<?php echo $pname; ?>" name="tz_name" id="tz_name" class="form-control input-circle" readonly></input>
															</div>
												</div>
												<div class="form-group">
															<label class="control-label col-md-3">
															<strong>Date</strong></label>
															<div class="col-md-4">
															<input type="date" name="date" id="date" class="form-control input-circle" required></input>
															</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label"><strong>
													Your Comments</strong></label>
													<div class="col-md-9">
														<textarea class="form-control input-circle" placeholder="Enter Your Comments" name="comment" id="comment"></textarea>
													</div>
												</div>
												<input type="hidden" value="<?php echo $pid; ?>" name="p_id" id="p_id" class="form-control input-circle"></input>
												<input type="hidden" value="1" name="u_id" id="u_id" class="form-control input-circle"></input>
												<input type="hidden" value="<?php echo $sy11; ?>" name="time" id="time" class="form-control input-circle"></input>
												<input type="hidden" value="<?php echo $user_name; ?>" name="usname" id="usname" class="form-control input-circle"></input>
												<input type="hidden" value="<?php echo $pname; ?>" name="psname" id="psname" class="form-control input-circle"></input>
												<input type="hidden" value="Suspension Note" name="type" id="type" class="form-control input-circle"></input>
											<div class="form-actions">
												<div class="row">
													<div class="col-md-offset-3 col-md-9">
														<button type="submit" name="cmdSubmit" class="btn btn-circle blue">
														Submit</button>
														<button type="button" data-dismiss="modal" aria-hidden="true" class="btn btn-circle default">
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
							<div class="modal fade" id="leave" tabindex="-1" role="dialog" aria-hidden="true">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title">Enter Date When Will <?php echo $pname; ?> Return For Classes</h4>
										</div>
										<div class="modal-body">
										<div class="portlet box green">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-plus"></i>Add date for <?php echo $pname; ?>
										</div>
										<div class="tools">
											<a href="javascript:;" class="collapse">
											</a>
										</div>
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="make-on-leave" method="post" class="form-horizontal form-row-seperated">
											<div class="form-body">
												<div class="form-group">
															<label class="control-label col-md-3">
															<strong></strong></label>
															<div class="col-md-5">
															<input type="date" name="date" id="date" class="form-control input-circle" required></input>
															</div>
												</div>
												<input type="hidden" value="<?php echo $pid; ?>" name="p_id" id="p_id" class="form-control input-circle"></input>
											<div class="form-actions">
												<div class="row">
													<div class="col-md-offset-3 col-md-9">
														<button type="submit" name="cmdSubmit" class="btn btn-circle blue">
														Submit</button>
														<button type="button" data-dismiss="modal" aria-hidden="true" class="btn btn-circle default">
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
							<div class="modal fade" id="teacher" tabindex="-1" role="dialog" aria-hidden="true">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title">It will change Schedule also</h4>
										</div>
										<div class="modal-body">
										<div class="portlet box green">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-plus"></i>Select Teacher Name
										</div>
										<div class="tools">
											<a href="javascript:;" class="collapse">
											</a>
										</div>
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="change-teacher" method="post" class="form-horizontal form-row-seperated">
											<div class="form-body">
												<div class="form-group">
															<label class="control-label col-md-3">
															<strong></strong></label>
															<div class="col-md-5">
															<select required class="form-control" name="pteacher"  id="pteacher" onchange="javascript: return optionList43_SelectedIndex()">
                      <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$result = mysql_query("SELECT * FROM profile WHERE active = 1 ORDER BY teacher_id ");			  	
				do {  ?>
                      <option value="<?php echo $row['teacher_id'];?>"><?php echo $row['teacher_name'];?> </option>
                      <?php } while ($row = mysql_fetch_assoc($result)); ?>
               </select>

															</div>
												</div>
												<input type="hidden" value="<?php echo $pid; ?>" name="p_id" id="p_id" class="form-control input-circle"></input>
											<div class="form-actions">
												<div class="row">
													<div class="col-md-offset-3 col-md-9">
														<button type="submit" name="cmdSubmit" class="btn btn-circle blue">
														Submit</button>
														<button type="button" data-dismiss="modal" aria-hidden="true" class="btn btn-circle default">
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
							<div class="modal fade" id="trial" tabindex="-1" role="dialog" aria-hidden="true">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title">Change in trial date of <?php echo $pname; ?></h4>
										</div>
										<div class="modal-body">
										<div class="portlet box green">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-plus"></i>Add date for <?php echo $pname; ?>
										</div>
										<div class="tools">
											<a href="javascript:;" class="collapse">
											</a>
										</div>
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="change-trial-date" method="post" class="form-horizontal form-row-seperated">
											<div class="form-body">
												<div class="form-group">
															<label class="control-label col-md-3">
															<strong></strong></label>
															<div class="col-md-5">
															<input type="date" name="date" id="date" class="form-control input-circle" required>															</div>
												</div>
												<input type="hidden" value="<?php echo $pid; ?>" name="p_id" id="p_id" class="form-control input-circle">
											<div class="form-actions">
												<div class="row">
													<div class="col-md-offset-3 col-md-9">
														<button type="submit" name="cmdSubmit" class="btn btn-circle blue">
														Submit</button>
														<button type="button" data-dismiss="modal" aria-hidden="true" class="btn btn-circle default">
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
							
							<div class="modal fade" id="markpaid" tabindex="-1" role="dialog" aria-hidden="true">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title">Change in trial date of <?php echo $pname; ?></h4>
										</div>
										<div class="modal-body">
										<div class="portlet box green">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-plus"></i>Add date for <?php echo $pname; ?>
										</div>
										<div class="tools">
											<a href="javascript:;" class="collapse">
											</a>
										</div>
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="change-trial-date" method="post" class="form-horizontal form-row-seperated">
											<div class="form-body">
												<div class="form-group">
															<label class="control-label col-md-3">
															<strong></strong></label>
															<div class="col-md-5">
															<input type="date" name="date" id="date" class="form-control input-circle" required>															</div>
												</div>
												<input type="hidden" value="<?php echo $pid; ?>" name="p_id" id="p_id" class="form-control input-circle">
											<div class="form-actions">
												<div class="row">
													<div class="col-md-offset-3 col-md-9">
														<button type="submit" name="cmdSubmit" class="btn btn-circle blue">
														Submit</button>
														<button type="button" data-dismiss="modal" aria-hidden="true" class="btn btn-circle default">
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
				</div>
			</div>
			<!-- END PAGE CONTENT INNER -->
			<div class="modal fade bs-modal-lg" id="invoice" tabindex="-1" role="dialog" aria-hidden="true">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">


        </div>
    </div>
</div>
		</div>
	</div>
	<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->
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
<script>
$('.invoices').click(function(){
    var famID=$(this).attr('data-id');
    var famAdd=$(this).attr('data-add');
    var famNote=$(this).attr('data-note');
    var famName=$(this).attr('data-name');

    $.ajax({url:"add-invoice-adjustment.php?famID="+famID+"&famAdd="+famAdd+"&famNote="+famNote+"&famName="+famName,cache:false,success:function(result){
        $(".modal-content").html(result);
    }});
});
</script>
<script>
$('.invoicesnote').click(function(){
    var famAdd=$(this).attr('data-add');
    var famNote=$(this).attr('data-note');

    $.ajax({url:"invoice-adjustment-details.php?famAdd="+famAdd+"&famNote="+famNote,cache:false,success:function(result){
        $(".modal-content").html(result);
    }});
});
</script>
<script>
$('.invoicelink').click(function(){
    var famID=$(this).attr('data-id');
    var famAmu=$(this).attr('data-amu');
    var famAcc=$(this).attr('data-acc');
    var fammon=$(this).attr('data-month');

    $.ajax({url:"invoice-link-details.php?famID="+famID+"&famAmu="+famAmu+"&famAcc="+famAcc+"&fammon="+fammon,cache:false,success:function(result){
        $(".modal-content").html(result);
    }});
});
</script>
<script>
$('.markpaid').click(function(){
    var famAdd=$(this).attr('data-add');
    var famNote=$(this).attr('data-note');
    var famDate=$(this).attr('data-date');

    $.ajax({url:"paid.php?famAdd="+famAdd+"&famNote="+famNote+"&famDate="+famDate,cache:false,success:function(result){
        $(".modal-content").html(result);
    }});
});
</script>
<script>
$('.split').click(function(){
    var famAdd=$(this).attr('data-add');
    var famNote=$(this).attr('data-fee');

    $.ajax({url:"split-invoice.php?famAdd="+famAdd+"&famNote="+famNote,cache:false,success:function(result){
        $(".modal-content").html(result);
    }});
});
</script>
<script>
$('.pack').click(function(){
    var famID=$(this).attr('data-id');
    var famPack=$(this).attr('data-pack');
    var famCur=$(this).attr('data-cur');

    $.ajax({url:"change-pack.php?famID="+famID+"&famPack="+famPack+"&famCur="+famCur,cache:false,success:function(result){
        $(".modal-content").html(result);
    }});
});
</script>
<script>
$('.discount').click(function(){
    var famID=$(this).attr('data-id');
    var famDis=$(this).attr('data-dis');

    $.ajax({url:"invoice-discount.php?famID="+famID+"&famDis="+famDis,cache:false,success:function(result){
        $(".modal-content").html(result);
    }});
});
</script>