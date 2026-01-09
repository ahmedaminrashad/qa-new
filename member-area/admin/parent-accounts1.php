<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ini_set('log_errors', 1);

if (session_status() !== PHP_SESSION_ACTIVE) session_start();

include("../includes/session1.php");
require("../includes/dbconnection.php");
require_once("../includes/mysql-compat.php");

if (!isset($conn) || !$conn instanceof mysqli) {
    die("Database connection not available. Please contact administrator.");
}

include("header.php");
?>
<?php
function NUM($var){
$result = mysql_query("SELECT * FROM account WHERE active = '$var'");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
echo $numberOfRows;
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
			echo '';
			}
		else if ($tnumberOfRows > 0) 
			{echo '<span class="label label-sm label-danger">'.$tnumberOfRows.'</span>';}
			}
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
<head>
<link href="../assets/admin/pages/css/timeline.css" rel="stylesheet" type="text/css"/>
</head>
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
				<h1>Parent Accounts<small> Active</small></h1>

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
<a href="parent-accounts" class="btn blue"><i class="fa fa-user"></i> Active (Active, Free, Trial &amp; Suspended) <b>(No. <?php 
$result = mysql_query("SELECT * FROM account WHERE active = 1 OR active = 5 OR active = 17 OR active = 11");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
echo $numberOfRows; ?>)</b></a>
<a href="parent-accounts-deactive" class="btn red"><i class="fa fa-user-times"></i> Deactivated (Left, Completed, Deactivated &amp; On Leave) <b>(No. <?php echo NUM("3"); ?>)</b></a>

						</div>
						<div class="tabbable tabbable-custom tabbable-custom-profile">
											<ul class="nav nav-tabs">
												<li class="active">
													<a href="#tab_1_11" data-toggle="tab" class="btn green">
													Paid <b>(No. <?php echo NUM("1"); ?>)</b> </a>
												</li>
												<li>
													<a href="#tab_1_22" data-toggle="tab" class="btn purple">
													Free <b>(No. <?php echo NUM("5"); ?>)</b> </a>
												</li>
												<li>
													<a href="#tab_1_33" data-toggle="tab" class="btn yellow">
													Trial <b>(No. <?php echo NUM("11"); ?>)</b> </a>
												</li>
												<li>
													<a href="#tab_1_55" data-toggle="tab" class="btn red">
													Suspended <b>(No. <?php echo NUM("17"); ?>)</b> </a>
												</li>
											</ul>
										<div class="tab-content">
												<div class="tab-pane active" id="tab_1_11">
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
									 Telephone
								</th>
								<th>
									 Email
								</th>
								<th>
									 Mobile
								</th>
								<th>
									 country
								</th>
								<?php 
$result = mysql_query("SELECT `account`.*, `currency`.`currency_name`, `time_zone`.* ,`country`.`c_a`FROM `account`,`country`,`currency`,`time_zone` WHERE account.currency_id=currency.currency_id and account.c_id=country.c_id and account.timezone=time_zone.tz_id HAVING active = 1 ORDER BY regular_date DESC;");

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
			$pt = MYSQL_RESULT($result,$i,"telephone");
			$pm = MYSQL_RESULT($result,$i,"mobile");
			$pcname = MYSQL_RESULT($result,$i,"c_a");
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
			$rdate = MYSQL_RESULT($result,$i,"regular_date");
			$pay_type = MYSQL_RESULT($result,$i,"invoice_type");

?>	<th>
						
						
								</thead>
								<tbody>
								<tr bgcolor="<?php echo $bg; ?>">
								<td>
									 <?php if ($pst == 5){echo '<a href="account6?t_id='.$pid.'">'; } elseif ($pst == 1) {echo '<a href="account5?t_id='.$pid.'">'; } ?><?php echo ++$counter; ?></a>
								</td>
								<td>
									 <b><?php echo $pname; ?></b>
								</td>
								<td>
									  <?php echo $pt; ?>
								</td>
								<td>
									 <a href="parent-accounts-profile?parent_id=<?php echo base64_encode($pid); ?>"><?php echo $pemail; ?></a>
								</td>
								<td>
										  <?php echo $pm; ?>
								</td>
								<td>
								<b> <?php echo $pcname?></b>
								</td>
								<td>
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
								
								<div class="tab-pane" id="tab_1_22">
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
									 Telephone
								</th>
								<th>
									 Email
								</th>
								<th>
									 Mobile
								</th>
								<th>
									 country
								</th>
								<?php 
$result = mysql_query("SELECT `account`.*, `currency`.`currency_name`, `time_zone`.* ,`country`.`c_a`FROM `account`,`country`,`currency`,`time_zone` WHERE account.currency_id=currency.currency_id and account.c_id=country.c_id and account.timezone=time_zone.tz_id HAVING active = 5 ORDER BY regular_date DESC;");
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
			$pt = MYSQL_RESULT($result,$i,"telephone");
			$pm = MYSQL_RESULT($result,$i,"mobile");
			$pcname = MYSQL_RESULT($result,$i,"c_a");
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
			$rdate = MYSQL_RESULT($result,$i,"regular_date");
			$pay_type = MYSQL_RESULT($result,$i,"invoice_type");

?>
							</tr>
								</thead>
								<tbody>
							<tr bgcolor="<?php echo $bg; ?>">
								<td>
									 <?php if ($pst == 5){echo '<a href="account6?t_id='.$pid.'">'; } elseif ($pst == 1) {echo '<a href="account5?t_id='.$pid.'">'; } ?><?php echo ++$counter; ?></a>
								</td>
								<td>
									 <b><?php echo $pname; ?></b>
								</td>
								<td>
									  <?php echo $pt; ?>
								</td>
								<td>
									 <a href="parent-accounts-profile?parent_id=<?php echo base64_encode($pid); ?>"><?php echo $pemail; ?></a>
								</td>
								<td>
										  <?php echo $pm; ?>
								</td>
								<td>
								<b> <?php echo $pcname?></b>
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
							
							
							<div class="tab-pane" id="tab_1_33">
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
									 Telephone
								</th>
								<th>
									 Email
								</th>
								<th>
									 Mobile
								</th>
								<th>
									 country
								</th>
								<?php 
$result = mysql_query("SELECT `account`.*, `currency`.`currency_name`, `time_zone`.* ,`country`.`c_a`FROM `account`,`country`,`currency`,`time_zone` WHERE account.currency_id=currency.currency_id and account.c_id=country.c_id and account.timezone=time_zone.tz_id HAVING active = 11 ORDER BY regular_date DESC;");
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
			$pt = MYSQL_RESULT($result,$i,"telephone");
			$pm = MYSQL_RESULT($result,$i,"mobile");
			$pcname = MYSQL_RESULT($result,$i,"c_a");
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
			$rdate = MYSQL_RESULT($result,$i,"regular_date");
			$pay_type = MYSQL_RESULT($result,$i,"invoice_type");
?>
							</tr>
								</thead>
								<tbody>
								<tr bgcolor="<?php echo $bg; ?>">
								<td>
									 <?php if ($pst == 5){echo '<a href="account6?t_id='.$pid.'">'; } elseif ($pst == 1) {echo '<a href="account5?t_id='.$pid.'">'; } ?><?php echo ++$counter; ?></a>
								</td>
								<td>
									 <b><?php echo $pname; ?></b>
								</td>
								<td>
									  <?php echo $pt; ?>
								</td>
								<td>
									 <a href="parent-accounts-profile?parent_id=<?php echo base64_encode($pid); ?>"><?php echo $pemail; ?></a>
								</td>
								<td>
										  <?php echo $pm; ?>
								</td>
								<td>
								<b> <?php echo $pcname?></b>
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
							
							<div class="tab-pane" id="tab_1_55">
							<div id="mytable" class="table-responsive red">
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
									 Telephone
								</th>
								<th>
									 Email
								</th>
								<th>
									 Mobile
								</th>
								<th>
									 country
								</th>
								<?php 
$result = mysql_query("SELECT `account`.*, `currency`.`currency_name`, `time_zone`.* ,`country`.`c_a`FROM `account`,`country`,`currency`,`time_zone` WHERE account.currency_id=currency.currency_id and account.c_id=country.c_id and account.timezone=time_zone.tz_id HAVING active = 17 ORDER BY regular_date DESC;");
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
			$pid = MYSQL_RESULT($result,$i,"parent_id");
			$pname = MYSQL_RESULT($result,$i,"parent_name");
			$pemail = MYSQL_RESULT($result,$i,"email");
			$pt = MYSQL_RESULT($result,$i,"telephone");
			$pm = MYSQL_RESULT($result,$i,"mobile");
			$pcname = MYSQL_RESULT($result,$i,"c_a");
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
			$rdate = MYSQL_RESULT($result,$i,"regular_date");
			$pay_type = MYSQL_RESULT($result,$i,"invoice_type");

?>
							</tr>
								</thead>
								<tbody>
								<tr bgcolor="<?php echo $bg; ?>">
								<td>
									 <?php if ($pst == 5){echo '<a href="account6?t_id='.$pid.'">'; } elseif ($pst == 1) {echo '<a href="account5?t_id='.$pid.'">'; } ?><?php echo ++$counter; ?></a>
								</td>
								<td>
									 <b><?php echo $pname; ?></b>
								</td>
								<td>
									  <?php echo $pt; ?>
								</td>
								<td>
									 <a href="parent-accounts-profile?parent_id=<?php echo base64_encode($pid); ?>"><?php echo $pemail; ?></a>
								</td>
								<td>
										  <?php echo $pm; ?>
								</td>
								<td>
								<b> <?php echo $pcname?></b>
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
					</div>
					<!-- END SAMPLE TABLE PORTLET-->
				</div>
			</div>
			<!-- END PAGE CONTENT INNER -->
			<div class="modal fade bs-modal-lg" id="ref" tabindex="-1" role="dialog" aria-hidden="true">
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
<?php echo $fot; ?>
<script>
$('.reff').click(function(){
    var famID=$(this).attr('data-id');
    var famDis=$(this).attr('data-dis');

    $.ajax({url:"reff-details.php?famID="+famID+"&famDis="+famDis,cache:false,success:function(result){
        $(".modal-content").html(result);
    }});
});
</script>