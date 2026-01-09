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
  include("../includes/manager_rights.php");
  require ("../includes/dbconnection.php");
include("header.php");
$pdept =$_REQUEST['query'];
function request_status($er)
{
if ($er == 1){
			echo '<span class="label label-sm label-info">New</span>';
			}
elseif ($er == 2){
			echo '<span class="label label-sm label-success">Archives</span>';
			}
elseif ($er == 3){
			echo '<span class="label label-sm label-warning">Teaching</span>';
			}
elseif ($er == 6){
			echo '<span class="label label-sm label-danger">Responded</span>';
			}
elseif ($er == 7){
			echo '<span class="label label-sm label-info">Allocated</span>';
			}
elseif ($er == 10){
			echo '<span class="label label-sm label-info">Later</span>';
			}
else{
			echo 'Un-defined';
			}
}
function abc($er)
{
date_default_timezone_set($er);
$date = date('h:i a', time());
echo $date;
}

function abc2($er)
{
// sending query
   $result = mysql_query("SELECT * FROM invoice Where parent_id = $er and status = 1");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$tnumberOfRows = MYSQL_NUMROWS($result);
echo $tnumberOfRows;
}
function abc1($er)
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
function abc3($er)
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
			echo '<span class="label label-sm label-danger">In-Active</span>';
			}
		else if ($tnumberOfRows > 0) 
			{echo '';}
			}
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
<!-- BEGIN PAGE CONTAINER -->
<div class="page-container">
	<!-- BEGIN PAGE HEAD -->
	<div class="page-head">
		<div class="container">
			<!-- BEGIN PAGE TITLE -->
			<div class="page-title">
				<h1>Parent Account<small> Students</small></h1>

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
					 Search Results for <b><?php echo $pdept;	?></b>
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN SAMPLE TABLE PORTLET-->
					<div class="portlet light">
					<h4>List of Accounts for Search Results <b><?php echo $pdept;	?></b></h4>
						<div class="portlet-body">
							<div id="mytable" class="table-responsive">
								<table class="table table-hover">
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
									 Status
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
								<?php 
$result = mysql_query("SELECT `account`.*, `currency`.`currency_name`, `time_zone`.* FROM `account`,`currency`,`time_zone` WHERE account.currency_id=currency.currency_id and account.timezone=time_zone.tz_id HAVING `parent_name` LIKE  '%".$pdept."%' OR `skype` LIKE  '%".$pdept."%' OR `email` LIKE  '%".$pdept."%' OR `telephone` LIKE  '%".$pdept."%' OR `mobile` LIKE  '%".$pdept."%'");
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
	while($row = mysql_fetch_array($result))
		{		
			if($row['active']=='1') 
				{
					$bg ='#FFFFFF';
				}
			elseif($row['active']=='5')
				{
					$bg ='#F3F781';
				}
			elseif($row['active']=='11')
				{
					$bg ='#F6CECE';
				}
			elseif($row['active']=='2')
				{
					$bg ='#E6E6E6';
				}		
			$pid = MYSQL_RESULT($result,$i,"parent_id");
			$pname = MYSQL_RESULT($result,$i,"parent_name");
			$pemail = MYSQL_RESULT($result,$i,"email");
			$puser = MYSQL_RESULT($result,$i,"username");
			$ppass = MYSQL_RESULT($result,$i,"userpass");
			$pfee = MYSQL_RESULT($result,$i,"fee");
			$active_s = MYSQL_RESULT($result,$i,"active");
			$pcid = MYSQL_RESULT($result,$i,"c_id");
			$pmid = MYSQL_RESULT($result,$i,"m_id");
			$cu = MYSQL_RESULT($result,$i,"currency_name");
			$cuid = MYSQL_RESULT($result,$i,"currency_id");
			$num = MYSQL_RESULT($result,$i,"telephone");
			$timez = MYSQL_RESULT($result,$i,"timezone");
			$timezdif = MYSQL_RESULT($result,$i,"timezone_diff");
			$phptime = MYSQL_RESULT($result,$i,"php_tz");

?>
							</tr>
								</thead>
								<tbody>
								<tr bgcolor="<?php echo $bg; ?>">
								<td>
									 <a href="<? if ($pst == 5){ echo 'account6'; } else { echo 'account5'; } ?>?t_id=<? echo $pid; ?>">&nbsp;&nbsp;<?php echo ++$counter; ?></a>
								</td>
								<td>
									 <b><a href="parent-accounts-student?p_id=<?php echo base64_encode($pid); ?>"><?php echo $pname; ?></a></b>
								</td>
								<td>
									 <a href="ind_details?parent_id=<?php echo base64_encode($pid); ?>"><?php echo $cu; ?> <?php echo $pfee; ?>.00</a>
								</td>
								<td>
									 <a href="parent-accounts-profile?parent_id=<?php echo base64_encode($pid); ?>"><?php echo $pemail; ?></a>
								</td>
								<td>
									 <?php if ($pst == 11){ echo "On Trial"; } elseif ($pst == 2){ echo "Left"; } else { echo "Regular"; } ?>
								</td>
								<td>
								<b><?php echo abc("$phptime"); ?></b> (<?php echo $timezdif; ?>.00)
								</td>
								<td>
								<a href="parent-accounts-profile-invoice?parent_id=<?php echo base64_encode($pid); ?>"><button type="button" class="btn red btn-xs"><?php echo abc2("$pid"); ?></button></a>
								</td>
								<td><?php if ($active_s == 11){ echo '<span class="label label-warning"><strong>On Trial</strong></span>'; } elseif ($active_s == 7){ echo '<span class="label label-info"><strong>On Leave</strong></span>'; } elseif ($active_s == 3){ echo '<span class="label label-danger"><strong>Deactived</strong></span>'; } elseif ($active_s == 17){ echo '<span class="label label-danger"><strong>Suspended</strong></span>'; } else { echo '<span class="label label-success"><strong>Regular</strong></span>'; } ?></td>
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
						<h4>List of Students for Search Resuts <b><?php echo $pdept;	?></b></h4>

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
								<?php 
// sending query
$result = mysql_query("SELECT `course`.*, `dept`.`department`, `Gender`.`gender`, `country`.`c_name`, `account`.`parent_name`, `lan`.`lan_name` FROM
  			`course`,`dept`,`Gender`,`country`,`account`,`lan` WHERE course.dept_id=dept.dept_id and course.g_id=Gender.g_id and course.c_id=country.c_id and course.parent_id=account.parent_id and course.lan_id=lan.lan_id HAVING `course_yrSec` LIKE  '%".$pdept."%' OR `Skype_ID` LIKE  '%".$pdept."%'");
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
			$ptime = MYSQL_RESULT($result,$i,"timezone");
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
		$i++;		
		}
	}	
?>
								</tbody>
								</table>						</div>
						</div>
						<h4>List of Requests for Search Resuts <b><?php echo $pdept;	?></b></h4>

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
								<?php 
// sending query
$result = mysql_query("SELECT * FROM new_request WHERE `name` LIKE  '%".$pdept."%' OR `skype` LIKE  '%".$pdept."%' OR `email` LIKE  '%".$pdept."%' OR `phone` LIKE  '%".$pdept."%' ORDER BY request_id DESC;");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
If ($numberOfRows == 0) 
	{
	echo '<div class="label label-info">No New Request Found!</div>';
	}
else if ($numberOfRows > 0) 
	{
	$i=0;
	while ($i<$numberOfRows)
		{		
			$arequest_id = MYSQL_RESULT($result,$i,"request_id");
			$arname = MYSQL_RESULT($result,$i,"name");
			$aremail = MYSQL_RESULT($result,$i,"email");
			$arphone = MYSQL_RESULT($result,$i,"phone");
			$arskype = MYSQL_RESULT($result,$i,"skype");
			$arcountry = MYSQL_RESULT($result,$i,"country");
			$arcity = MYSQL_RESULT($result,$i,"city");
			$armessage = MYSQL_RESULT($result,$i,"message");
			$ardate = MYSQL_RESULT($result,$i,"date");
			$artime = MYSQL_RESULT($result,$i,"time");
			$arupdate = MYSQL_RESULT($result,$i,"time_update");
			$rasent = MYSQL_RESULT($result,$i,"sent");
			$arcsr_id = MYSQL_RESULT($result,$i,"csr_id");
			$arsite_id = MYSQL_RESULT($result,$i,"site_id");
			$arstatus_id = MYSQL_RESULT($result,$i,"status");
?>
							</tr>
								</thead>
								<tbody>
								<tr bgcolor="<?php echo $bgcolor; ?>">
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
		$i++;		
		}
	}	
?>
								</tbody>
								</table>						</div>
						</div>
						</div>
					</div>
					<!-- END SAMPLE TABLE PORTLET-->
				</div>
			</div>
			<!-- END PAGE CONTENT INNER -->
		</div>
	</div>
	<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->
<?php echo $fot; ?>