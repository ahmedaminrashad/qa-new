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
   include("../includes/session1.php");
   require ("../includes/dbconnection.php");
   include("header-main.php");
  $csr_id =$_REQUEST['csr'];
  $csr_name =$_REQUEST['name'];
  $yy_id = $_REQUEST['year'];
  $mm_id = $_REQUEST['month'];
?>
<?php
function abc($er)
{
date_default_timezone_set($er);
$date = date('h:i a', time());
echo $date;
}

function abc3($er)
{
// sending query
   $result = mysql_query("SELECT * FROM comment WHERE parent_id = $er and status = 1 and manager_id = 1");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$tnumberOfRows = MYSQL_NUMROWS($result);
if ($tnumberOfRows==0){
echo ''; }
else {
echo '<i class="fa fa-comments font-red"></i>'; }
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
function abcs($er)
{
// sending query
   $result = mysql_query("SELECT * FROM course Where parent_id = $er");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$tnumberOfRows = MYSQL_NUMROWS($result);
echo $tnumberOfRows;
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
				<h1>Parent Accounts<small></small></h1>

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
					<a href="dashboard">Home</a><i class="fa fa-circle"></i>
				</li>
				<li class="active">
					 List of Parent Accounts
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN SAMPLE TABLE PORTLET-->
					<div class="portlet light">
					<h4>Scheduled Trials by: <b><?php echo ''.$csr_name.' ('.$mm_id.'-'.$yy_id.')'; ?></b></h4>
						

															<a href="parent-accounts" class="btn blue"><i class="fa fa-user"></i> Active <b>(No. <?php 
$result = mysql_query("SELECT * FROM account WHERE active = 1 OR active = 5 OR active = 11 OR active = 7");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
echo $numberOfRows; ?>)</b></a>
															<a href="parent-accounts-left" class="btn red"><i class="fa fa-user-times"></i> Deactivated <b>(No. <?php 
$result = mysql_query("SELECT * FROM account WHERE active = 3");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
echo $numberOfRows; ?>)</b></a>
															<a href="parent-accounts-on-trial" class="btn yellow"><i class="fa fa-clock-o"></i> On Trial <b>(No. <?php 
$result = mysql_query("SELECT * FROM account WHERE active = 11");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
echo $numberOfRows; ?>)</b></a>
															<a href="parent-accounts-on-leave" class="btn green"><i class="fa fa-clock-o"></i> On Leave <b>(No. <?php 
$result = mysql_query("SELECT * FROM account WHERE active = 7");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
echo $numberOfRows; ?>)</b></a>
															<a href="parent-accounts-on-suspension" class="btn purple"><i class="fa fa-clock-o"></i> Suspended <b>(No. <?php 
$result = mysql_query("SELECT * FROM account WHERE active = 17");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
echo $numberOfRows; ?>)</b></a>
						</div>
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
								<?php 
$result = mysql_query("SELECT `account`.*, `currency`.`currency_name`, `time_zone`.* FROM `account`,`currency`,`time_zone` WHERE account.currency_id=currency.currency_id and account.timezone=time_zone.tz_id HAVING MONTH(trial_date) = $mm_id AND YEAR(trial_date) = $yy_id AND csr_id = $csr_id ORDER BY parent_id DESC;");
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
			elseif($row['active']=='7')
				{
					$bg ='#B1D3ED';
				}		
			$pid = MYSQL_RESULT($result,$i,"parent_id");
			$pname = MYSQL_RESULT($result,$i,"parent_name");
			$pemail = MYSQL_RESULT($result,$i,"email");
			$puser = MYSQL_RESULT($result,$i,"username");
			$ppass = MYSQL_RESULT($result,$i,"userpass");
			$pfee = MYSQL_RESULT($result,$i,"fee");
			$pst = MYSQL_RESULT($result,$i,"active");
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
									 <?php if ($pst == 5){echo '<a href="account6?t_id='.$pid.'">'; } elseif ($pst == 1) {echo '<a href="account5?t_id='.$pid.'">'; } ?><?php echo ++$counter; ?></a>
								</td>
								<td>
									 <b><a href="parent-accounts-student?p_id=<?php echo base64_encode($pid); ?>"><?php echo $pname; ?></a> (<?php echo abcs("$pid"); ?>) <?php echo abc3("$pid"); ?></b>
								</td>
								<td>
									 <a href="ind_details?parent_id=<?php echo base64_encode($pid); ?>"><?php echo $cu; ?> <?php echo $pfee; ?></a>
								</td>
								<td>
									 <a href="parent-accounts-profile?parent_id=<?php echo base64_encode($pid); ?>"><?php echo $pemail; ?></a>
								</td>
								<td>
									 <?php if ($pst == 11){ echo "On Trial"; } elseif ($pst == 7){ echo "On Leave"; } else { echo "Regular"; } ?>
								</td>
								<td>
								<b><?php echo abc("$phptime"); ?></b> (<?php echo $timezdif; ?>.00)
								</td>
								<td>
								<a href="parent-accounts-profile-invoice?parent_id=<?php echo base64_encode($pid); ?>"><button type="button" class="btn red btn-xs"><?php echo abc2("$pid"); ?></button></a>
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