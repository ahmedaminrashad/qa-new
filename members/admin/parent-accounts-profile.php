<?php session_start(); ?>
  <?php
  include("../includes/session1.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("../includes/notifications.php");
  include("header.php");
  $pid111 =$_REQUEST['parent_id'];
   $link = $_SERVER['REQUEST_URI'];
   $user_id= $ID;
$user_name= $_SESSION['is']['username'];
function sub($var){
require ("../includes/dbconnection.php");
$current = date('Y-m-d');
$sql = "SELECT * FROM subscription Where parent_id = '$var' AND status = 2 AND d = (SELECT MAX(d) FROM subscription Where parent_id = '$var' AND status = 2)";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '<a class="addsubs" href="#invoice" data-toggle="modal" data-target="#invoice" data-id="'.$var.'"><div class="ml-auto badge badge-danger">Subscriptions Not Found</div></a>';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){			
					$sub_id = $row['sub_id'];
					$subP = $row['parent_id'];
					$subH1 = $row['hours'];
					$subD = $row['date'];
					$extra = $row['added'];
					$va = $row['value'];
					$subH = $subH1+$extra;

					$sql2="SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(`duration`))) AS total FROM class_history WHERE parent_id = '$var' AND re_status != 2 AND value = '$va' AND date_admin >= '$subD' AND date_admin <= '$current' AND (monitor_id = 4 OR monitor_id = 9 OR monitor_id = 6 OR monitor_id = 21)";
$res2 = mysqli_query($conn, $sql2);
$totalRow = mysqli_fetch_array($res2);
$total = $totalRow['total'];
$hours=$total;


    list($h, $m, $s) = explode(':',$hours);  //Split up string into hours/minutes
    $decimal = $m/60;  //get minutes as decimal
    $hoursAsDecimal = $h+$decimal;
    
    if($hoursAsDecimal < $subH){
    echo '<a class="subs" href="#invoice" data-toggle="modal" data-target="#invoice" data-id="'.$sub_id.'" value="1"><div class="ml-auto badge badge-success"><b>Hours Subscribed = '.$subH.'</b></div><br><div class="ml-auto badge badge-success"><b>Taken Hours = '.$hoursAsDecimal.'</b></div><br><div class="ml-auto badge badge-success"><b>Extra Hours Added = '.$extra.'</b></div><br><div class="ml-auto badge badge-success"><b>Subscription Status = Active</b></div></a>';
    }
    elseif($hoursAsDecimal >= $subH){
    echo '<a class="subs" href="#invoice" data-toggle="modal" data-target="#invoice" data-id="'.$sub_id.'" value="2"><div class="ml-auto badge badge-danger"><b>Hours Subscribed = '.$subH.'</b></div><br><div class="ml-auto badge badge-danger"><b>Taken Hours = '.$hoursAsDecimal.'</b></div><br><div class="ml-auto badge badge-danger"><b>Extra Hours Added = '.$extra.'</b></div><br><div class="ml-auto badge badge-danger"><b>Subscription Status = Suspended</b></div></a>';
    }

			}
			}
}
function sub1($var){
require ("../includes/dbconnection.php");
$current = date('Y-m-d');
$sql = "SELECT * FROM subscription Where parent_id = '$var' AND status = 1 AND d = (SELECT MAX(d) FROM subscription Where parent_id = '$var' AND status = 1)";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){			
					$sub_id = $row['sub_id'];
					$subP = $row['parent_id'];
					$subH1 = $row['hours'];
					$subD = $row['date'];
					$extra = $row['added'];
					$va = $row['value'];
					$subH = $subH1+$extra;

					$sql2="SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(`duration`))) AS total FROM class_history WHERE parent_id = '$var' AND re_status != 2 AND value = '$va' AND date_admin >= '$subD' AND date_admin <= '$current' AND (monitor_id = 4 OR monitor_id = 9 OR monitor_id = 6 OR monitor_id = 21)";
$res2 = mysqli_query($conn, $sql2);
$totalRow = mysqli_fetch_array($res2);
$total = $totalRow['total'];
$hours=$total;


    list($h, $m, $s) = explode(':',$hours);  //Split up string into hours/minutes
    $decimal = $m/60;  //get minutes as decimal
    $hoursAsDecimal = $h+$decimal;
    
    if($hoursAsDecimal < $subH){
    echo '<span class="label label-sm label-success"><b>Hours Subscribed = '.$subH.'</b></span><br><span class="label label-sm label-success"><b>Taken Hours = '.$hoursAsDecimal.'</b></span><br><span class="label label-sm label-success"><b>Extra Hours Added = '.$extra.'</b></span><br><span class="label label-sm label-success"><b>Subscription Status = Active</b></span>';
    }
    elseif($hoursAsDecimal >= $subH){
    echo '<span class="label label-sm label-danger"><b>Hours Subscribed = '.$subH.'</b></span><br><span class="label label-sm label-danger"><b>Taken Hours = '.$hoursAsDecimal.'</b></span><br><span class="label label-sm label-danger"><b>Extra Hours Added = '.$extra.'</b></span><br><span class="label label-sm label-danger"><b>Subscription Status = Suspended</b></span>';
    }

			}
			}
}
function feeall($var, $var2, $var3){
require ("../includes/dbconnection.php");
$sql2="SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(`duration`))) AS total FROM sched WHERE parent_id = '$var'";
$res2 = mysqli_query($conn, $sql2);
$totalRow = mysqli_fetch_array($res2);
$total = $totalRow['total'];
$hours=$total;

    list($h, $m, $s) = explode(':',$hours);  //Split up string into hours/minutes
    $decimal = $m/60;  //get minutes as decimal
    $hoursAsDecimal = $h+$decimal;
if ($var2 == 1){ echo $hoursAsDecimal*4; }
if ($var2 == 2){ echo $hoursAsDecimal*$var3*4; }
}
function feeone($var, $var2, $var3){
require ("../includes/dbconnection.php");
$sql2="SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(`duration`))) AS total FROM sched WHERE course_id = '$var'";
$res2 = mysqli_query($conn, $sql2);
$totalRow = mysqli_fetch_array($res2);
$total = $totalRow['total'];
$hours=$total;

    list($h, $m, $s) = explode(':',$hours);  //Split up string into hours/minutes
    $decimal = $m/60;  //get minutes as decimal
    $hoursAsDecimal = ($h+$decimal)*4;
if ($var2 == 1){ echo '('.$var3.' x '.$hoursAsDecimal.')'; }
if ($var2 == 2){ echo $hoursAsDecimal*$var3; }
}
function abv($var){
require ("../includes/dbconnection.php");
$sql = "SELECT * FROM currency Where currency_id = '$var'";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){			
					$acat_id = $row['currency_id'];
					$acat_name = $row['currency_name'];
					$acat_abv = $row['abv'];
					echo $acat_abv;
		
			}
			}
}
function reff($er)
{
require ("../includes/dbconnection.php");
// sending query
   $sql = "SELECT * FROM new_request Where parent_id = $er";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '<div class="ml-auto badge badge-danger">Referrals: 0</div>';
			}
		elseif ($numberOfRows > 0) 
			{echo '<div class="ml-auto badge badge-danger">Referrals: '.$tnumberOfRows.'</div>';}
			}
function cer($var)
{
require ("../includes/dbconnection.php");
// sending query
   $sql = "SELECT * FROM certificates Where student_id = '$var'";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '--';
			}
		elseif ($numberOfRows > 0) 
			{
			echo $numberOfRows;}
			}
function tech($er)
{
require ("../includes/dbconnection.php");
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
function tech1($er){
require ("../includes/dbconnection.php");
// sending query
   $sql = "SELECT * FROM profile Where teacher_id = $er";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '<div class="ml-auto badge badge-danger">Not-Assiged</div>';
			}
		else if ($numberOfRows > 0) 
			{echo '';}
			}

function student($er){
require ("../includes/dbconnection.php");
// sending query
   $sql = "SELECT * FROM course Where course_id = $er and nature = 2";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '<button class="mb-2 mr-2 btn btn-outline-danger btn-xs" title="Deactivate this student"><i class="pe-7s-delete-user"></i></button>';
			}
		else if ($numberOfRows > 0) 
			{echo '';}
			}
function student1($er){
require ("../includes/dbconnection.php");
// sending query
   $sql = "SELECT * FROM course Where course_id = $er and nature = 1";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '<button class="mb-2 mr-2 btn btn-outline-info btn-xs" title="Activate this student again"><i class="pe-7s-add-user"></i></button>';
			}
		else if ($numberOfRows > 0) 
			{echo '';}
			}
function student3($er){
require ("../includes/dbconnection.php");
// sending query
   $sql = "SELECT * FROM course Where course_id = $er and nature = 1 and active = 1";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			echo '<button class="mb-2 mr-2 btn btn-outline-danger btn-xs" title="Suspend this student"><i class="lnr-thumbs-down"></i></button>';}
			}
function student4($er){
require ("../includes/dbconnection.php");
// sending query
   $sql = "SELECT * FROM course Where course_id = $er and nature = 1 and active = 17";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			echo '<button class="mb-2 mr-2 btn btn-outline-success btn-xs" title="Un-Suspend this student"><i class="lnr-thumbs-up"></i></button>';}
			}
function classes($cr, $tr, $mr, $yr, $sr){
require ("../includes/dbconnection.php");
// sending query
   $sql = "SELECT * FROM class_history Where course_id = $cr AND teacher_id = $tr AND MONTH(date_admin) = $mr AND YEAR(date_admin) = $yr AND monitor_id = $sr";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '0';
			}
		elseif ($numberOfRows > 0) 
			{
			echo $numberOfRows;
			}
	}
function schedule_classes($cr){
require ("../includes/dbconnection.php");
// sending query
   $sql = "SELECT * FROM sched Where course_id = $cr";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '0';
			}
		elseif ($numberOfRows > 0) 
			{
			echo $numberOfRows;
			}
	}
function abc($er){
require ("../includes/dbconnection.php");
// sending query
   $sql = "SELECT * FROM sched Where course_id = $er";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '<i class="fa fa-exclamation font-red"></i>';
			}
		else if ($numberOfRows > 0) 
			{
			echo '<i class="fa fa-check font-green"></i>';
			}
	}

   $pnid =base64_decode($_GET["parent_id"]);
	$sql = "SELECT `account`.*, `currency`.`currency_name`, `country`.`c_a`, `time_zone`.* FROM `account`,`currency`, `country`, `time_zone` where account.currency_id=currency.currency_id and account.c_id=country.c_id and account.timezone=time_zone.tz_id HAVING parent_id = '$pnid'";
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
			$pc11 = $row['c_id'];
			$pt = $row['telephone'];
			$pm = $row['mobile'];
			$ps = $row['skype'];
			$pfe = $row['fee'];
			$pcity = $row['city'];
			$pman = $row['m_id'];
			$pcur = $row['currency_id'];
			$pdate = $row['date'];
			$ppayment = $row['mode_id'];
			$pbelong = $row['belong'];
			$ptz = $row['timezone'];
			$active_s = $row['active'];
			$pcname = $row['c_a'];
			$ptname = $row['timezone_name'];
			$pmname = $row['username'];
			$cu = $row['currency_name'];
			$t_date = $row['trial_date'];
			$t_csr = $row['csr_id'];
			$pay_type = $row['invoice_type'];
			$pdiscount = $row['discount'];
			$pgroup = $row['group_id'];
			$prate = $row['rate'];
			$subscription = $row['subscription'];
			$whats_email = $row['whats_email'];
			$zoomaction = $row['zoomaction'];
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
$sy = date('Y-m-d');
?>
<?php
$syyw = date('Y-m-d');
$mm_id = date('m');
$yy_id = date('Y');
?>
<?php
$sy11 = date('Y-m-d');
$date11 = date('h:i a', time());
?>
<?php
$page_title = 'Family Profile';
$page_subtitle = 'Family Profile';
$table_name = 'Family Profile';
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
                                                        src="../uploads/profile-img.png"
                                                        alt="Avatar 6"></div>
                                            </div>
                                            <div><h5 class="menu-header-title"><?php echo $pname; ?><br><?php if ($active_s == 11){ echo '<div class="ml-auto badge badge-warning"><strong>On Trial</strong></div>'; } elseif ($active_s == 7){ echo '<div class="ml-auto badge badge-info"><strong>On Leave</strong></div>'; } elseif ($active_s == 3){ echo '<div class="ml-auto badge badge-danger"><strong>Deactived</strong></div>'; } elseif ($active_s == 17){ echo '<div class="ml-auto badge badge-danger"><strong>Suspended</strong></div>'; } else { echo '<div class="ml-auto badge badge-success"><strong>Regular</strong></div>'; } ?> <?php if ($ppayment == 1) { echo '<div class="ml-auto badge badge-info">2CheckOut</div>';} if ($ppayment == 2) { echo '<div class="ml-auto badge badge-info">PayPal</div>';} ?></h5><h6 class="menu-header-subtitle"><?php echo sub("$pid"); ?> <?php echo sub1("$pid"); ?></h6>
                                            <p><?php echo reff("$pnid"); ?> <?php if ($active_s == 11 and $syyw > $t_date){ echo '<font color="FE2E2E"><b>(Trial Over)</b></font>'; } elseif ($active_s == 11 and $syyw < $t_date){ echo '(On Trial)'; } elseif ($active_s == 11 and $syyw == $t_date){ echo '(Last On Trial)'; }?> <?php if ($active_s == 1){ echo '<div class="ml-auto badge badge-warning title="System will send regular invoive">Monthly Invoice <i class="fa fa-check"></i></div>'; } else { echo '<div class="ml-auto badge badge-danger title="System will not send regular invoice">Monthly Invoice <i class="fa fa-close"></i></div>'; } ?> <?php if ($subscription == 1) { echo '<a href="subs-change?t_id='.$pid.'&w_id=2&y='.time().'"><div class="ml-auto badge badge-info">Monthly Payment</div></a>'; } elseif ($subscription == 2) { echo '<a href="subs-change?t_id='.$pid.'&w_id=1&y='.time().'"><div class="ml-auto badge badge-danger">Subscription</div></a>'; } ?> <?php if ($whats_email == 'email') { echo '<a href="whatsapp?t_id='.$pid.'&w_id=whatsapp&y='.time().'"><div class="ml-auto badge badge-info">Email</div></a>'; } elseif ($whats_email == 'whatsapp') { echo '<a href="whatsapp?t_id='.$pid.'&w_id=email&y='.time().'"><div class="ml-auto badge badge-danger">WhatsApp</div></a>'; } ?>
                                            <?php if ($zoomaction == 1) { echo '<a href="auto-zoom?t_id='.$pid.'&w_id=2&y='.time().'"><div class="ml-auto badge badge-info">Manual Class</div></a>'; } elseif ($zoomaction == 2) { echo '<a href="auto-zoom?t_id='.$pid.'&w_id=1&y='.time().'"><div class="ml-auto badge badge-danger">Auto Classes On Zoom</div></a>'; } ?>
</p>
<p><a href="save-student?t_id=<?php echo $pid; ?>&cp_id=<?php echo $pc11; ?>&man_id=<?php echo $pman; ?>&trial_id=<?php echo $active_s; ?>&time_id=<?php echo $ptz; ?>&csr_id=<?php echo $t_csr; ?>&cur_id=<?php echo $pcur; ?>"><button class="btn-shadow-danger btn btn-danger" title="Add New Stduents"><i class="pe-7s-add-user"></i> Add Student</button></a>
<a href="create-monthly-invoice-ins?pids=<?php echo $pid; ?>&frr=<?php echo $pfe; ?>&cur=<?php echo $cu; ?>&link=<?php echo $link; ?>"><button class="btn-shadow-danger btn btn-danger" title="Send Invoice"><i class="pe-7s-cash"></i> Send Invoice</button></a>
<a href="#anotes" data-target="#anotes" data-toggle="modal"><button class="btn-shadow-danger btn btn-danger" title="Add Manager Notes"><i class="pe-7s-note2"></i> Add Note</button></a>
<a href="add-new-task-manual?parent_id=<?php echo $pid; ?>&name=<?php echo $pname; ?>"><button class="btn-shadow-danger btn btn-danger" title="Add Task"><i class="pe-7s-paperclip"></i> Add Task</button></a>
<a class="sendemail" href="#invoice" data-toggle="modal" data-target="#invoice" data-id="<?php echo $pid; ?>" data-name="<?php echo $pname; ?>" data-email="<?php echo $pemail; ?>"><button class="btn-shadow-danger btn btn-danger" title="Send Email"><i class="pe-7s-paper-plane"></i> Send Email</button></a>
<a data-target="#notesche" data-toggle="modal"><button class="btn-shadow-danger btn btn-danger" title="Add Diary Notes"><i class="pe-7s-notebook"></i> Add Diary Notes</button></a>
</p>
</div>
                                            <div class="menu-header-btn-pane pt-2">
                                                <div role="group" class="btn-group text-center">
                                                    <div class="nav">
                                                        <a href="#tab-2-eg1" data-toggle="tab" class="active btn btn-dark">Students</a>
                                                        <a href="#tab-2-eg2" data-toggle="tab" class="btn btn-dark mr-1 ml-1">Payments</a>
                                                        <a href="#tab-2-eg3" data-toggle="tab" class="btn btn-dark">Manager Notes</a>
                                                        <a href="#tab-2-eg4" data-toggle="tab" class="btn btn-dark mr-1 ml-1">Teacher's Notes</a>
                                                        <a href="#tab-2-eg5" data-toggle="tab" class="btn btn-dark">Tasks</a>
                                                        <a href="#tab-2-eg6" data-toggle="tab" class="btn btn-dark mr-1 ml-1">Bio Data</a>
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
									 Reports
								</th>
								<th>
									 Teacher
								</th>
								<th>
									 Certificate
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
								</tr>
								</thead>
								<tbody>
								<?php 
// sending query
$sql = "SELECT `course`.*, `dept`.`department`, `gender`.`gender`, `country`.`c_name`, `account`.`parent_name`, `lan`.`lan_name` FROM `course`,`dept`,`gender`,`country`,`account`,`lan` WHERE course.dept_id=dept.dept_id and course.g_id=gender.g_id and course.c_id=country.c_id and course.parent_id=account.parent_id and course.lan_id=lan.lan_id HAVING parent_id = $pnid";
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
			$scsrid = $row['csr_id'];
			$tzy_stud = $row['php_tz'];

?>
								<tr class="<?php if ($pnat == 1) { echo 'success'; } else { echo 'danger'; } ?>">
								<td>
									 <div class="ml-auto badge badge-warning" title="<?php echo tech("$scsrid"); ?>"><strong><?php echo ++$counter; ?></strong></div>
								</td>
								<td>
									 <?php echo abc("$Course_ID"); ?> <a href="student-schedule?pT=<?php echo base64_encode($pCourse); ?>" title="(Classes/Week: <?php echo schedule_classes("$Course_ID");?>) (Taken this month: <?php echo classes("$Course_ID", "$ptea", "$mm_id", "$yy_id", "9"); ?>) (Absent this month: <?php echo classes("$Course_ID", "$ptea", "$mm_id", "$yy_id", "4"); ?>) (Leave this month: <?php echo classes("$Course_ID", "$ptea", "$mm_id", "$yy_id", "5"); ?>) (Delined this month: <?php echo classes("$Course_ID", "$ptea", "$mm_id", "$yy_id", "6"); ?>) (Pending this month: <?php echo classes("$Course_ID", "$ptea", "$mm_id", "$yy_id", "7"); ?>)"><?php echo $course_yrSec; ?></a>
								</td>
								<td>
									 <a href="history_course?Course_ID=<?php echo base64_encode($Course_ID); ?>">Progress</a>
								</td>
								<td>
									 <a href="list-of-reports?course=<?php echo $Course_ID; ?>">Report</a>
								</td>
								<td>
									 <a href="teacher-schedule?pT=<?php echo $ptea; ?>"><?php echo tech("$ptea"); ?></a><?php echo tech1("$ptea"); ?>
								</td>
								<td>
									<a class="certificate" href="#cer" data-toggle="modal" data-target="#cer" data-id="<?php echo $Course_ID; ?>" data-name="<?php echo $course_yrSec; ?>" data-teacher="<?php echo tech("$ptea"); ?>"><button class="mb-2 mr-2 btn btn-outline-danger btn-xs" title="Add Certificate"><i class="pe-7s-plus"></i></button></a> 
									<a href="list-certificates?SID=<?php echo $Course_ID; ?>&Sname=<?php echo $course_yrSec; ?>"><button class="mb-2 mr-2 btn btn-outline-success btn-xs" title="List of Certificate"><?php echo cer("$Course_ID"); ?></button></a>
								</td>
								<td><?php if ($pnat == 1) { echo '<a href="edit-student-account?Course_ID='.$Course_ID.'&link='.$link.'&cur_id='.$pcur.'"><button class="mb-2 mr-2 btn btn-outline-warning btn-xs" title="Edit Student Profile"><i class="pe-7s-note2"></i></button></a>'; } ?></td>								
								<td><a href="schedule-check?student_id=<?php echo $Course_ID; ?>&student_name=<?php echo $course_yrSec; ?>&student_Tzone=<?php echo $tzy_stud; ?>"><?php if ($pnat == 1) { echo '<button class="mb-2 mr-2 btn btn-outline-success btn-xs" title="Find Schedule Teacher Catogory"><i class="pe-7s-clock"></i></button>'; } ?></a>
								</td>
								<td><a href="schedule-check-one?student_id=<?php echo $Course_ID; ?>&student_name=<?php echo $course_yrSec; ?>&student_Tzone=<?php echo $tzy_stud; ?>"><?php if ($pnat == 1) { echo '<button class="mb-2 mr-2 btn btn-outline-danger btn-xs" title="Find Schedule Teacher Selected"><i class="pe-7s-clock"></i></button>'; } ?></a>
								</td>
								<td>
								    <a href="suspend-student?t_id=<?php echo $Course_ID; ?>&t_idName=<?php echo $course_yrSec; ?>&pp_idName=<?php echo $pid; ?>" onclick="return confirm('<?php echo "Are you sure about Suspension of Student ". $course_yrSec. " ?"; ?>');"><?php echo student3("$Course_ID"); ?></a>
								    <a href="un-suspend-student?t_id=<?php echo $Course_ID; ?>&t_idName=<?php echo $course_yrSec; ?>&pp_idName=<?php echo $pid; ?>" onclick="return confirm('<?php echo "Are you sure about Un-Suspension of Student ". $course_yrSec. " ?"; ?>');"><?php echo student4("$Course_ID"); ?></a>
								</td>
								<td><a href="student_inactive1?t_id1=<?php echo $Course_ID; ?>&t_idName=<?php echo $course_yrSec; ?>&pp_idName=<?php echo $pid; ?>" onclick="return confirm('<?php echo "Are you sure about deactivation of Student ". $course_yrSec. " ?"; ?>');"><?php echo student("$Course_ID"); ?></a>
									<a href="student_inactive2?t_id1=<?php echo $Course_ID; ?>&t_idName=<?php echo $course_yrSec; ?>&pp_idName=<?php echo $pid; ?>" onclick="return confirm('<?php echo "Are you sure about activation of Student ". $course_yrSec. " ?"; ?>');"><?php echo student1("$Course_ID"); ?></a>
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
								</tr>
								</thead>
								<tbody>
								<?php 
$sql = "SELECT `invoice`.*, `month`.`month_name`, `statusp`.`status_name`, `currency`.`currency_name`, `school_yr`.`school_year` FROM `invoice`,`month`,`statusp`,`currency`,`school_yr` WHERE invoice.mon_id=month.month_id and invoice.status=statusp.s_id and invoice.currency_id=currency.currency_id and invoice.y_id=school_yr.year_id HAVING parent_id = $pnid ORDER BY py_id DESC";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){		
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
																<font color="<?php echo $bgcolor; ?>"><?php echo $order; ?></font>															</td>
															<td>
																 <a class="invoicelink" href="#invoice" data-toggle="modal" data-target="#invoice" data-id="<?php echo $pidy; ?>" data-amu="<?php echo $fe+$fe_add; ?>" data-acc="<?php echo abv("$pcur"); ?>" data-month="<?php echo ''.$pname.'-for-'.$mon.'-'.$ayear; ?>" email="<?php echo $pemail; ?>"><font color="<?php echo $bgcolor; ?>"><?php echo substr($mon, 0, 3); ?></font></a>
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
															<td>
																<font color="<?php echo $bgcolor; ?>"><?php echo $cuan; ?><?php echo $fe+$fe_add; ?>/-</font>
															</td>
															<td>
																<a class="invoices" href="#invoice" data-toggle="modal" data-target="#invoice" data-id="<?php echo $pidy; ?>" data-add="<?php echo $fe_add; ?>" data-note="<?php echo $anote; ?>" data-name="<?php echo $pname; ?>"><button title="Add invoice adjustment +/-" class="mb-2 mr-2 btn btn-outline-info"><i class="pe-7s-cash"></i></button></a>
															</td>
															<td>
																<a class="<?php echo 'markpaid'.$subscription; ?>" href="#invoice" data-toggle="modal" data-target="#invoice" data-add="<?php echo $pidy; ?>" data-date="<?php echo $sub; ?>" data-note="<?php echo $order; ?>" data-ID="<?php echo $subscription; ?>"><?php if ($s == 1){echo '<button title="Mark this invoice paid" class="mb-2 mr-2 btn btn-outline-info">Mark</button>'; }?></a><?php if ($s == 2){ echo '<div class="ml-auto badge badge-success">Paid</div>'; } ?>
															</td>
															<td><a href="edit-invoice?pT=<?php echo base64_encode($pidy); ?>&link=<?php echo base64_encode($link); ?>"><button title="Edit Invoice" class="mb-2 mr-2 btn btn-outline-warning"><i class="fa fa-edit"></i></button></a></td>
															<td>
																<a class="split" href="#invoice" data-toggle="modal" data-target="#invoice" data-add="<?php echo $pidy; ?>" data-fee="<?php echo $fe; ?>"><button title="Split Invoice" class="mb-2 mr-2 btn btn-outline-success"><i class="lnr-unlink"></i></button></a>
															</td>
															<td><a href="monthly-invoice-link?y=<?php echo time(); ?>&invoice_no=<?php echo $pidy; ?>&account=<?php echo abv("$cuanid"); ?>&month=<?php echo $mon; ?>&year=<?php echo $ayear; ?>&cur=<?php echo $cuan; ?>&amount=<?php echo $fe+$fe_add; ?>&parent=<?php echo $prid; ?>&link=<?php echo $link; ?>"><button title="Email Payment Link" class="mb-2 mr-2 btn btn-outline-warning"><i class="pe-7s-mail"></i></button></a></td>
															<td><a href="delete-invoice?pT=<?php echo $pidy; ?>"><button title="Delete Invoice" class="mb-2 mr-2 btn btn-outline-danger"><i class="pe-7s-trash"></i></button></a></td>
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
                                        <tbody>
                                        <?php 
// sending query
$sql = "SELECT * FROM comment WHERE parent_id = '$pid' ORDER BY com_id DESC;";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '<div class="ml-auto badge badge-info">No Note Found!</div>';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){
		
			$auid = $row['user_id'];
			$atime = $row['time'];
			$adate = $row['date'];
			$auser = $row['username'];
			$amid = $row['manager_id'];
			$aname = $row['parent_name'];
			$acom = $row['comment'];
			$apid = $row['parent_id'];
			$atype = $row['type'];
?>
                                        <tr>
                                        	<td><div class="ml-auto badge badge-info"><?php echo $atime; ?></div></td>
                                        	<td><b><?php echo $atype; ?> by <?php echo tech($auid); ?>:</b></td>
                                        	<td><?php echo $acom; ?></td>
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
                                        <tbody>
                                        <?php 
// sending query
$sql = "SELECT * FROM note_student WHERE parent_id = '$pid' ORDER BY note_id DESC";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '<div class="ml-auto badge badge-info">No Note Found!</div>';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){
		
			$anid = $row['note_id'];
			$anote = $row['note_text'];
			$astatus = $row['status'];
			$adate = $row['date'];
			$atime = $row['time'];
			$asid = $row['course_id'];
			$atid = $row['teacher_id'];
			$asname = $row['student_name'];
			$atname = $row['teacher_name'];
			$apid = $row['parent_id'];
			$ardate = $row['read_date'];
			$artime = $row['read_time'];
?>
                                        <tr>
                                        	<td><div class="ml-auto badge badge-info"><?php echo $adate; ?></div></td>
                                        	<td><?php echo $anote; ?></td>
                                        	<td><?php if ($astatus == 1){ echo '<a href="add-note-reply-p?n_id='.$anid.'&link='.$link.'"<div class="ml-auto badge badge-warning">Pending</div></a>'; } elseif ($astatus == 2){echo '<a href="one-note?n_id='.$anid.'&link='.$link.'"<div class="ml-auto badge badge-success">Cleared</div></a>';}?></td>
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
                                        <tbody>
                                        <?php 
// sending query
$sql = "SELECT * FROM task_creator WHERE parent_id = '$pid' ORDER BY task_id DESC";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '<div class="ml-auto badge badge-info">No Task Found!</div>';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){
		
			$taskid = $row['task_id'];
			$pnameid = $row['parent_name'];
			$top = $row['to_person'];
			$fromp = $row['from_person'];
			$date = $row['date'];
			$status = $row['status'];
			$des = $row['des'];
			$clear = $row['clear'];
			$pid = $row['parent_id'];
?>
                                        <tr>
                                        	<td><div class="ml-auto badge badge-info"><?php echo $date; ?></div></td>
                                        	<td><b><?php echo tech($fromp); ?> To <?php echo tech($top); ?>:</b></td>
                                        	<td><?php echo $des; ?></td>
                                        	<td><?php if ($clear == 1) { echo'<div class="ml-auto badge badge-danger">Pending</div>'; } else {echo '<div class="ml-auto badge badge-success">Cleared</div>'; } ?></td>
                                        </tr>
                                        <?php
                                        }
                                        }
                                        ?>
                                        </tbody>
                                        </table>
                                    </div>
                                    </div>
                                    <div class="tab-pane" id="tab-2-eg6">
                                            <div class="table-responsive">
                                        <table class="align-middle mb-0 table table-striped table-hover">
                                        <tr>
                                        	<td>Email:</td>
                                        	<td><font color="#44B6AE"> <b><?php echo $pemail; ?></b></font></td>
                                        	<td>Telephone:</td>
                                        	<td><font color="#44B6AE"> <b><?php echo $pt; ?></b></font></td>
                                        	<td>Mobile:</td>
                                        	<td><font color="#44B6AE"> <b><?php echo $pm; ?></b></font></td>
                                        </tr>
                                        <tr>
                                        	<td>Skype:</td>
                                        	<td><font color="#44B6AE"> <b><?php echo $ps; ?></b></font></td>
                                        	<td>Fee:</td>
                                        	<td><font color="#44B6AE"> <b><?php echo $pfe; ?></b></font></td>
                                        	<td>Rate:</td>
                                        	<td><font color="#44B6AE"> <b><?php echo $prate; ?></b></font></td>
                                        </tr>
                                        <tr>
                                        	<td>Hours:</td>
                                        	<td><font color="#44B6AE"> <b><?php echo feeall("$pid","1","$prate"); ?> /Month</b></font></td>
                                        	<td>Fee:</td>
                                        	<td><font color="#44B6AE"> <b><?php echo $cu; ?> <?php echo feeall("$pid","2","$prate"); ?> /Month</b></font></td>
                                        	<td>Country:</td>
                                        	<td><font color="#44B6AE"> <b><?php echo $pcname; ?></b></font></td>
                                        </tr>
                                        <tr>
                                        	<td>City:</td>
                                        	<td><font color="#44B6AE"> <b><?php echo $pcity; ?></b></font></td>
                                        	<td>Timezone:</td>
                                        	<td><font color="#44B6AE"> <b><?php echo $ptname; ?></b></font></td>
                                        	<td>WhatsApp ID:</td>
                                        	<td><font color="#44B6AE"> <b><?php echo $pgroup; ?></b></font></td>
                                        </tr>
                                        <tr>
                                        	<td>Username:</td>
                                        	<td><font color="#44B6AE"> <b><?php echo $puser; ?></b></font></td>
                                        	<td>Password:</td>
                                        	<td><font color="#44B6AE"> <b><?php echo $ppass; ?></b></font></td>
                                        	<td></td>
                                        	<td></td>
                                        </tr>
                                        </table>
                                    </div>
                                    </div>
                                </div>
                                <div class="text-center d-block card-footer">
                                    <a data-toggle="modal" href="#deactivation"><?php if ($active_s == 1 OR $active_s == 5 OR $active_s == 7 OR $active_s == 11){ echo '<button class="btn-shadow-danger btn btn-danger btn-lg">Deactivate</button>'; } ?></a><a href="activate-account?t_id=<?php echo $pid; ?>&name=<?php echo $pname; ?>" onclick="return confirm('<?php echo "Are you sure about activation of Account ". $pname. " ?"; ?>');"><?php if ($active_s == 3) { echo '<button class="btn-shadow-primary btn btn-success btn-lg">Activate</button>'; } ?></a>
                                    <a href="make-regular?t_id=<?php echo $pid; ?>&d_id=<?php echo $syyw ; ?>&frr=<?php echo $pfe; ?>&cur=<?php echo $cu; ?>&link=<?php echo $link; ?>"><?php if ($active_s == 11){ echo '<button class="btn-shadow-primary btn btn-success btn-lg">Make Regular</button>'; } ?>
																<a href="make-off-leave?t_id=<?php echo $pid; ?>"><?php if ($active_s == 7){ echo '<button class="btn-shadow-primary btn btn-success btn-lg">Make off Leave</button>'; } ?></a>
																<a data-toggle="modal" href="#leave"><?php if ($active_s == 1 OR $active_s == 5){ echo '<button class="btn-shadow-primary btn btn-info btn-lg">Make on Leave</button>'; } ?></a>
																<?php if ($active_s == 3){ echo '<span class="label label-warning"><strong>Not Applicable</strong></span>'; } ?>
                                    <?php if ($active_s != 17){ echo '<a data-toggle="modal" href="#suspension"><button class="btn-shadow-danger btn btn-danger btn-lg">Suspend Classes</button></a>'; } else { echo ''; } ?>
												<?php if ($active_s == 17){ echo '<a href="un-suspend-classes?t_id='.$pid.'&link='.$link.'&name='.$pname.'"><button class="btn-shadow-danger btn btn-danger btn-lg">Un-Suspend Classes</button></a>'; } else { echo ''; } ?>
												<a href="edit-parent-account?parent_id=<?php echo base64_encode($pid); ?>&link=<?php echo $link; ?>"><button class="btn-shadow-primary btn btn-primary btn-lg">Edit Profile</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Table Row End -->
                    
                </div>
                <!-- App inner end -->
<?php echo $footer; ?>
<!-- Large modal start -->
<div class="modal fade bd-example-modal-lg" id="notesche" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Diary Notes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="signupForm" class="col-md-10 mx-auto" method="post" action="add-note-family-update">
				<input type="hidden" id="ptec" name="ptec"  value="<?php echo base64_encode($pT); ?>" />
                                <div class="form-group">
									<label>Reminder Date</label>
										<div>
											<input required type="date" name="date" id="date" class="form-control">
										</div>
								</div>
								<div class="form-group">
									<label>For Dairy of</label>
										<div>
											<select required class="form-control" name="pteacher"  id="pteacher" onchange="javascript: return optionList43_SelectedIndex()">
    <option value="<?php echo $ID; ?>">For Yourself </option>
<?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
$sql = "SELECT * FROM profile WHERE (cat_id = 4 OR cat_id = 5 OR cat_id = 7 OR csr_rights = 1 OR super_rights = 1 OR s_supper_rights = 1) and active = 1 and training = 1 ORDER BY teacher_id ";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)){  ?>
<option value="<?php echo $row['teacher_id'];?>"><?php echo $row['teacher_name'];?> </option>
<?php } ?>
</select>
										</div>
								</div>
								<div class="form-group">
									<label>Notes</label>
										<div>
											<textarea required type="text" placeholder="Add note" name="note" id="note" class="form-control"></textarea>
										</div>
								</div>
								</div>
								<input required type="hidden" name="user" id="user" value="1" class="form-control input-circle">
<input required type="hidden" name="pid" id="pid" value="<?php echo $pid; ?>" class="form-control input-circle">
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name ="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Large modal end  -->
<!-- Large modal start -->
<div class="modal fade bd-example-modal-lg" id="anotes" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Note for <?php echo $pname; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="signupForm" class="col-md-10 mx-auto" method="post" action="add-chat-comment">
                                <div class="form-group">
									<label>Parent Name</label>
										<div>
											<input type="text" placeholder="<?php echo $pname; ?>" name="tz_name" id="tz_name" class="form-control input-circle" readonly>
										</div>
								</div>
								<div class="form-group">
									<label>Notes</label>
										<div>
											<textarea class="form-control input-circle" placeholder="Enter Your Comments" name="comment" id="comment"></textarea>
										</div>
								</div>
								</div>
								<input type="hidden" value="<?php echo $pid; ?>" name="p_id" id="p_id" class="form-control input-circle">
												<input type="hidden" value="1" name="u_id" id="u_id" class="form-control input-circle">
												<input type="hidden" value="<?php echo $date11; ?>" name="date" id="date" class="form-control input-circle">
												<input type="hidden" value="<?php echo $sy11; ?>" name="time" id="time" class="form-control input-circle">
												<input type="hidden" value="<?php echo $user_name; ?>" name="usname" id="usname" class="form-control input-circle">
												<input type="hidden" value="<?php echo $pname; ?>" name="psname" id="psname" class="form-control input-circle">
												<input type="hidden" value="Manager Note" name="type" id="type" class="form-control input-circle">
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name ="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Large modal end  -->
<!-- Large modal start -->
<div class="modal fade bd-example-modal-lg" id="deactivation" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Why are you deactivating <?php echo $pname; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="signupForm" class="col-md-10 mx-auto" method="post" action="add-chat-comment-to-deactivate">
								<div class="form-group">
									<label>Notes</label>
										<div>
											<textarea class="form-control input-circle" placeholder="Enter Your Comments" name="comment" id="comment"></textarea>
										</div>
								</div>
								</div>
								<input type="hidden" value="<?php echo $pid; ?>" name="p_id" id="p_id" class="form-control input-circle">
												<input type="hidden" value="<?php echo $ID; ?>" name="u_id" id="u_id" class="form-control input-circle">
												<input type="hidden" value="<?php echo $date11; ?>" name="date" id="date" class="form-control input-circle">
												<input type="hidden" value="<?php echo $sy11; ?>" name="time" id="time" class="form-control input-circle">
												<input type="hidden" value="<?php echo $user_name; ?>" name="usname" id="usname" class="form-control input-circle">
												<input type="hidden" value="<?php echo $pname; ?>" name="psname" id="psname" class="form-control input-circle">
												<input type="hidden" value="Deactivation Note" name="type" id="type" class="form-control input-circle">
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name ="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Large modal end  -->
<!-- Large modal start -->
<div class="modal fade bd-example-modal-lg" id="suspension" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Why are you suspending <?php echo $pname; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="signupForm" class="col-md-10 mx-auto" method="post" action="add-chat-comment-to-suspend">
								<div class="form-group">
									<label>Parent Name</label>
										<div>
											<input type="text" placeholder="<?php echo $pname; ?>" name="tz_name" id="tz_name" class="form-control input-circle" readonly>
										</div>
								</div>
								<div class="form-group">
															<label>Date</label>
															<div>
															<input type="date" name="date" id="date" class="form-control" required>
															</div>
												</div>
												<div class="form-group">
													<label>
													Your Comments</label>
													<div>
														<textarea class="form-control" placeholder="Enter Your Comments" name="comment" id="comment"></textarea>
													</div>
												</div>
												</div>
												<input type="hidden" value="<?php echo $pid; ?>" name="p_id" id="p_id" class="form-control input-circle">
												<input type="hidden" value="1" name="u_id" id="u_id" class="form-control input-circle">
												<input type="hidden" value="<?php echo $sy11; ?>" name="time" id="time" class="form-control input-circle">
												<input type="hidden" value="<?php echo $user_name; ?>" name="usname" id="usname" class="form-control input-circle">
												<input type="hidden" value="<?php echo $pname; ?>" name="psname" id="psname" class="form-control input-circle">
												<input type="hidden" value="<?php echo $ID; ?>" name="pman" id="pman" class="form-control input-circle">
												<input type="hidden" value="Suspension Note" name="type" id="type" class="form-control input-circle">
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name ="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Large modal end  -->
<!-- Large modal start -->
<div class="modal fade bd-example-modal-lg" id="leave" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Enter Date When Will <?php echo $pname; ?> Return For Classes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="signupForm" class="col-md-10 mx-auto" method="post" action="make-on-leave">
								<div class="form-group">
									<label>Parent Name</label>
										<div>
											<input type="text" placeholder="<?php echo $pname; ?>" name="tz_name" id="tz_name" class="form-control input-circle" readonly>
										</div>
								</div>
								<div class="form-group">
															<label>Date</label>
															<div>
															<input type="date" name="date" id="date" class="form-control" required>
															</div>
												</div>
												</div>
												<input type="hidden" value="<?php echo $pid; ?>" name="p_id" id="p_id" class="form-control input-circle">
												<input type="hidden" value="<?php echo $pname; ?>" name="psname" id="psname" class="form-control input-circle">
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name ="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Large modal end  -->
<!-- Large modal start -->
<div class="modal fade bd-example-modal-lg" id="teacher" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">It will Shift Schedule also</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="signupForm" class="col-md-10 mx-auto" method="post" action="change-teacher">
								<div class="form-group">
															<label>Select Teacher</label>
															<div class="col-md-5">
															<select required class="form-control" name="pteacher"  id="pteacher" onchange="javascript: return optionList43_SelectedIndex()">
                      <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$sql = "SELECT * FROM profile WHERE active = 1 ORDER BY teacher_id ";			  	
				$result = mysqli_query($conn, $sql);
				while ($row = mysqli_fetch_assoc($result)){  ?>
                      <option value="<?php echo $row['teacher_id'];?>"><?php echo $row['teacher_name'];?> </option>
                      <?php } ?>
               </select>

															</div>
												</div>
												</div>
												<input type="hidden" value="<?php echo $pid; ?>" name="p_id" id="p_id" class="form-control input-circle">
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name ="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Large modal end  -->
<!-- Large modal start -->
<div class="modal fade bd-example-modal-lg" id="trial" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Change in trial date of <?php echo $pname; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="signupForm" class="col-md-10 mx-auto" method="post" action="change-trial-date">
								<div class="form-group">
															<label>Date</label>
															<div>
															<input type="date" name="date" id="date" class="form-control" required>
															</div>
												</div>
												</div>
												<input type="hidden" value="<?php echo $pid; ?>" name="p_id" id="p_id" class="form-control input-circle">
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name ="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Large modal end  -->
<!-- Large modal start -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<div class="modal fade bd-example-modal-lg" id="invoice" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        </div>
    </div>
</div>
<!-- Large modal end  -->
<!-- Large modal start -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<div class="modal fade bd-example-modal-lg" id="cer" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        </div>
    </div>
</div>
<!-- Large modal end  -->
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
$('.subs').click(function(){
    var famID=$(this).attr('data-id');
    var VID=$(this).attr('value');

    $.ajax({url:"update-subs.php?famID="+famID+"&VID="+VID+"&famAmu=<?php echo $pname; ?>&famP=<?php echo $pid; ?>",cache:false,success:function(result){
        $(".modal-content").html(result);
    }});
});
</script>
<script>
$('.addsubs').click(function(){
    var famID=$(this).attr('data-id');

    $.ajax({url:"add-sub.php?famID="+famID+"&famAmu=<?php echo $pname; ?>&famP=<?php echo $pid; ?>",cache:false,success:function(result){
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
$('.scheduleoptions').click(function(){
    var famName=$(this).attr('name');
    var famEmail=$(this).attr('email');
    var famID=$(this).attr('course_id');
    var famSname=$(this).attr('sname');
    var famTeacher=$(this).attr('teacher');

    $.ajax({url:"schedule-email-options.php?famName="+famName+"&famEmail="+famEmail+"&famID="+famID+"&famSname="+famSname+"&famTeacher="+famTeacher,cache:false,success:function(result){
        $(".modal-content").html(result);
    }});
});
</script>
<script>
$('.sendemail').click(function(){
    var famName=$(this).attr('data-name');
    var famEmail=$(this).attr('data-email');
    var famID=$(this).attr('data-id');

    $.ajax({url:"email-form.php?famName="+famName+"&famEmail="+famEmail+"&famID="+famID,cache:false,success:function(result){
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
    var famEmail=$(this).attr('email');

    $.ajax({url:"invoice-link-details.php?famID="+famID+"&famAmu="+famAmu+"&famAcc="+famAcc+"&fammon="+fammon+"&famEmail="+famEmail,cache:false,success:function(result){
        $(".modal-content").html(result);
    }});
});
</script>
<script>
$('.markpaid2').click(function(){
    var famAdd=$(this).attr('data-add');
    var famNote=$(this).attr('data-note');
    var famDate=$(this).attr('data-date');
    var famID=$(this).attr('data-ID');

    $.ajax({url:"paid.php?famAdd="+famAdd+"&famNote="+famNote+"&famDate="+famDate+"&famID="+famID,cache:false,success:function(result){
        $(".modal-content").html(result);
    }});
});
</script>
<script>
$('.markpaid1').click(function(){
    var famAdd=$(this).attr('data-add');
    var famNote=$(this).attr('data-note');
    var famDate=$(this).attr('data-date');
    var famID=$(this).attr('data-ID');

    $.ajax({url:"paid.php?famAdd="+famAdd+"&famNote="+famNote+"&famDate="+famDate+"&famID="+famID,cache:false,success:function(result){
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
$('.certificate').click(function(){
    var famID=$(this).attr('data-id');
    var famName=$(this).attr('data-name');
    var famTeacher=$(this).attr('data-teacher');

    $.ajax({url:"add-certificate.php?famID="+famID+"&famName="+famName+"&famTeacher="+famTeacher,cache:false,success:function(result){
        $(".modal-content").html(result);
    }});
});
</script>











