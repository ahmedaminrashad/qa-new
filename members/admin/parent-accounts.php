<?php session_start(); ?>
  <?php
  include("../includes/session1.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("../includes/notifications.php");
  include("header.php");
?>
<?php
function sub($var){
    require ("../includes/dbconnection.php");
$current = date('Y-m-d');
$sql = "SELECT * FROM subscription Where parent_id = '$var' AND status = 2 AND d = (SELECT MAX(d) FROM subscription Where parent_id = '$var' AND status = 2)";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '<div class="ml-auto badge badge-danger">Subscriptions Not Found</button>';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){			
					$sub_id = $row['sub_id'];
					$subP = $row['parent_id'];
					$subH1 = $row['hours'];
					$subD = $row['date'];
					$extra = $row['added'];
					$subH = $subH1+$extra;

					$sql2="SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(`duration`))) AS total FROM class_history WHERE parent_id = '$var' AND re_status != 2 AND value = '1' AND date_admin >= '$subD' AND date_admin <= '$current' AND (monitor_id = 4 OR monitor_id = 9 OR monitor_id = 6 OR monitor_id = 21)";
$res2 = mysqli_query($conn, $sql2);
$totalRow = mysqli_fetch_array($res2);
$total = $totalRow['total'];
$hours=$total;


    list($h, $m, $s) = explode(':',$hours);  //Split up string into hours/minutes
    $decimal = $m/60;  //get minutes as decimal
    $hoursAsDecimal = $h+$decimal;
    
    if($hoursAsDecimal < $subH){
    echo '<span class="label label-sm label-success"><b>'.$subH.' / '.$hoursAsDecimal.' / '.$extra.'</b></span>';
    }
    elseif($hoursAsDecimal >= $subH){
    echo '<span class="label label-sm label-danger"><b>'.$subH.' / '.$hoursAsDecimal.' / '.$extra.'</b></span>';
    }

			}
			}
}
function NUM($var){
require ("../includes/dbconnection.php");
$sql = "SELECT * FROM account WHERE active = '$var'";
$counter = 0;
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
function reff($er)
{
require ("../includes/dbconnection.php");
// sending query
   $sql = "SELECT * FROM new_request Where parent_id = $er";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			echo '<div class="ml-auto badge badge-danger">'.$tnumberOfRows.'</div>';
			}
			}
function abc($er)
{
require ("../includes/dbconnection.php");
date_default_timezone_set($er);
$date = date('h:i a', time());
echo $date;
}

function abc3($er)
{
require ("../includes/dbconnection.php");
// sending query
   $sql = "SELECT * FROM comment WHERE parent_id = $er and status = 1 and manager_id = 1";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
echo '<i class="fa fa-comments font-red"></i>'; }
}

function abc2($er)
{
require ("../includes/dbconnection.php");
// sending query
   $sql = "SELECT * FROM invoice Where parent_id = $er and status = 1";
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
function abcs($er)
{
require ("../includes/dbconnection.php");
// sending query
   $sql = "SELECT * FROM course Where parent_id = $er";
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
$page_title = 'List of Accounts';
$page_subtitle = 'List of Parent Accounts';
$table_name = 'List of Accounts';
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
                                <div class="page-title-actions">
                                <div class="d-inline-block dropdown">
                                <a href="parent-accounts"><button class="mb-2 mr-2 btn btn-shadow btn-success">
                                        Active (Active, Free, Trial &amp; Suspended) (No. <?php
$sql = "SELECT * FROM account WHERE active = 1 OR active = 5 OR active = 17 OR active = 11";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
echo $numberOfRows; ?>)
                                    </button></a>
                                    <a href="parent-accounts-in-active"><button class="mb-2 mr-2 btn btn-shadow btn-danger">
                                        Deactivated (Left, Completed, Deactivated &amp; On Leave) (No. <?php $sql = "SELECT * FROM account WHERE active = 3 OR active = 7";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{

echo $numberOfRows;
} ?>)
                                    </button></a>
                                    </div>
                                </div>
                            </div>
                            </div>
                    <!-- Page Title End-->
                    <!-- Table Row Start-->
                    <div class="row">
                        <div class="col-lg-12">
                        <div class="mb-3 card">
                                        <div class="card-body">
                                            <ul class="tabs-animated-shadow tabs-animated nav">
                                                <li class="nav-item">
                                                    <a role="tab" class="nav-link active" id="tab-c-0" data-toggle="tab" href="#tab-animated-0">
                                                        <span>Paid <b>(No. <?php echo NUM("1"); ?>)</b></span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a role="tab" class="nav-link" id="tab-c-1" data-toggle="tab" href="#tab-animated-1">
                                                        <span>Free <b>(No. <?php echo NUM("5"); ?>)</b></span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a role="tab" class="nav-link" id="tab-c-2" data-toggle="tab" href="#tab-animated-2">
                                                        <span>Trial <b>(No. <?php echo NUM("11"); ?>)</b></span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a role="tab" class="nav-link" id="tab-c-3" data-toggle="tab" href="#tab-animated-3">
                                                        <span>Suspended <b>(No. <?php echo NUM("17"); ?>)</b></span>
                                                    </a>
                                                </li>
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="tab-animated-0" role="tabpanel">
                                                    <p class="mb-0"><div class="table-responsive">
                                        <table class="align-middle mb-0 table table-striped table-hover">
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
								</tr>
								</thead>
                                 <tbody>
                                 <?php 
$sql = "SELECT `account`.*, `currency`.`currency_name`, `time_zone`.* FROM `account`,`currency`,`time_zone` WHERE account.currency_id=currency.currency_id and account.timezone=time_zone.tz_id HAVING active = 1 ORDER BY regular_date DESC;";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){		
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
			$pid = $row['parent_id'];
			$pname = $row['parent_name'];
			$pemail = $row['email'];
			$puser = $row['username'];
			$ppass = $row['userpass'];
			$pfee = $row['fee'];
			$pst = $row['active'];
			$pcid = $row['c_id'];
			$pmid = $row['m_id'];
			$cu = $row['currency_name'];
			$cuid = $row['currency_id'];
			$num = $row['telephone'];
			$timez = $row['timezone'];
			$timezdif = $row['timezone_diff'];
			$phptime = $row['php_tz'];
			$rdate = $row['regular_date'];
			$pay_type = $row['invoice_type'];

?>
                                            
								<tr>
								<td>
									 <?php if ($pst == 5){echo '<a href="account6?t_id='.$pid.'">'; } elseif ($pst == 1) {echo '<a href="account5?t_id='.$pid.'">'; } ?><?php echo ++$counter; ?></a>
								</td>
								<td>
									 <?php echo $pname; ?> (<?php echo abcs("$pid"); ?>) <a class="reff" href="#ref" data-toggle="modal" data-target="#ref" data-id="<?php echo $pid; ?>" data-dis="<?php echo $pname; ?>"><?php echo reff("$pid"); ?></a> <?php echo abc3("$pid"); ?>
								</td>
								<td>
									 <?php echo $cu; ?> <?php echo $pfee; ?>
								</td>
								<td>
									 <a href="parent-accounts-profile?parent_id=<?php echo base64_encode($pid); ?>"><?php echo $pemail; ?></a>
								</td>
								<td>
									 <div class="ml-auto badge badge-success"><?php if ($pst == 11){ echo "On Trial"; } elseif ($pst == 7){ echo "On Leave"; } else { echo "Regular"; } ?></div>
								</td>
								<td>
								<b><?php echo abc("$phptime"); ?></b> (<?php echo $timezdif; ?>.00)
								</td>
								<td>
								<?php echo sub("$pid"); ?>
								</td>
								<td>
									<?php if ($pay_type == 2){ echo '<div class="ml-auto badge badge-success">Recurring</div>'; } 
												elseif ($pay_type == 3){ echo '<div class="ml-auto badge badge-danger">Failed</div>'; } 
												elseif ($pay_type == 4){ echo '<div class="ml-auto badge badge-warning">Stopped</div>'; } 
												else { echo '<div class="ml-auto badge badge-warning">Monthly</div>'; }?>
								</td>
								<td>
								<div class="ml-auto badge badge-danger"><?php echo abc2("$pid"); ?></div>
								</td>
							</tr>
							<?php 		
		}
	}	
?>
                                            </tbody>
                                        </table>
                                    </div></p>
                                                </div>
                                                <div class="tab-pane" id="tab-animated-1" role="tabpanel">
                                                    <p class="mb-0"><div class="table-responsive">
                                        <table class="align-middle mb-0 table table-striped table-hover">
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
								</tr>
								</thead>
                                            <tbody>
                                            <?php 
$sql = "SELECT `account`.*, `currency`.`currency_name`, `time_zone`.* FROM `account`,`currency`,`time_zone` WHERE account.currency_id=currency.currency_id and account.timezone=time_zone.tz_id HAVING active = 5 ORDER BY parent_id DESC;";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){		
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
			$pid = $row['parent_id'];
			$pname = $row['parent_name'];
			$pemail = $row['email'];
			$puser = $row['username'];
			$ppass = $row['userpass'];
			$pfee = $row['fee'];
			$pst = $row['active'];
			$pcid = $row['c_id'];
			$pmid = $row['m_id'];
			$cu = $row['currency_name'];
			$cuid = $row['currency_id'];
			$num = $row['telephone'];
			$timez = $row['timezone'];
			$timezdif = $row['timezone_diff'];
			$phptime = $row['php_tz'];
			$rdate = $row['regular_date'];
			$pay_type = $row['invoice_type'];

?>
                                            
								<tr>
								<td>
									 <?php if ($pst == 5){echo '<a href="account6?t_id='.$pid.'">'; } elseif ($pst == 1) {echo '<a href="account5?t_id='.$pid.'">'; } ?><?php echo ++$counter; ?></a>
								</td>
								<td>
									 <b><?php echo $pname; ?> <a class="reff" href="#ref" data-toggle="modal" data-target="#ref" data-id="<?php echo $pid; ?>" data-dis="<?php echo $pname; ?>"><?php echo reff("$pid"); ?></a> (<?php echo abcs("$pid"); ?>) <?php echo abc3("$pid"); ?></b>
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
								<?php echo $rdate; ?>
								</td>
								<td>
									<?php if ($pay_type == 2){ echo '<span class="label label-sm label-success">Recurring</span>'; } 
												elseif ($pay_type == 3){ echo '<span class="label label-sm label-danger">Failed</span>'; } 
												elseif ($pay_type == 4){ echo '<span class="label label-sm label-warning">Stopped</span>'; } 
												else { echo '<span class="label label-sm label-warning">Monthly</span>'; }?>
								</td>
								<td>
								<div class="ml-auto badge badge-danger"><?php echo abc2("$pid"); ?></div>
								</td>
							</tr>
							<?php 		
		}
	}	
?>
                                            </tbody>
                                        </table>
                                    </div></p>
                                                </div>
                                                <div class="tab-pane" id="tab-animated-2" role="tabpanel">
                                                    <p class="mb-0"><div class="table-responsive">
                                        <table class="align-middle mb-0 table table-striped table-hover">
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
								</tr>
								</thead>
                                            <tbody>
                                            <?php 
$sql = "SELECT `account`.*, `currency`.`currency_name`, `time_zone`.* FROM `account`,`currency`,`time_zone` WHERE account.currency_id=currency.currency_id and account.timezone=time_zone.tz_id HAVING active = 11";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){		
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
		
			$pid = $row['parent_id'];
			$pname = $row['parent_name'];
			$pemail = $row['email'];
			$puser = $row['username'];
			$ppass = $row['userpass'];
			$pfee = $row['fee'];
			$pst = $row['active'];
			$pcid = $row['c_id'];
			$pmid = $row['m_id'];
			$cu = $row['currency_name'];
			$cuid = $row['currency_id'];
			$num = $row['telephone'];
			$timez = $row['timezone'];
			$timezdif = $row['timezone_diff'];
			$phptime = $row['php_tz'];
			$t_d = $row['trial_date'];

?>
                                            
								<tr>
								<td>
									 <a href="<? if ($pst == 5){ echo 'account6'; } else { echo 'account5'; } ?>?t_id=<? echo $pid; ?>">&nbsp;&nbsp;<?php echo ++$counter; ?></a>
								</td>
								<td>
									 <b><a href="parent-accounts-student?p_id=<?php echo base64_encode($pid); ?>"><?php echo $pname; ?></a></b>
								</td>
								<td>
									 <a href="ind_details?parent_id=<?php echo base64_encode($pid); ?>"><?php echo $cu; ?> <?php echo $pfee; ?></a>
								</td>
								<td>
									 <a href="parent-accounts-profile?parent_id=<?php echo base64_encode($pid); ?>"><?php echo $pemail; ?></a>
								</td>
								<td>
									 <?php if ($t_d > $sy){ echo "On Trial"; } elseif ($t_d < $sy) { echo "<font color='FE2E2E'><b>Trial Over</b></font>"; } elseif ($t_d == $sy) { echo "<b>Last Day</b>"; } ?> (<?php echo $t_d; ?>)
								</td>
								<td>
								<b><?php echo abc("$phptime"); ?></b> (<?php echo $timezdif; ?>.00)
								</td>
							</tr>
							<?php 		
		}
	}	
?>
                                            </tbody>
                                        </table>
                                    </div></p>
                                                </div>
                                                <div class="tab-pane" id="tab-animated-3" role="tabpanel">
                                                    <p class="mb-0"><div class="table-responsive">
                                        <table class="align-middle mb-0 table table-striped table-hover">
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
								</tr>
								</thead>
                                            <tbody>
                                            <?php 
$sql = "SELECT `account`.*, `currency`.`currency_name`, `time_zone`.* FROM `account`,`currency`,`time_zone` WHERE account.currency_id=currency.currency_id and account.timezone=time_zone.tz_id HAVING active = 17 ORDER BY parent_id DESC";
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
			$pst = $row['active'];
			$pcid = $row['c_id'];
			$pmid = $row['m_id'];
			$cu = $row['currency_name'];
			$cuid = $row['currency_id'];
			$num = $row['telephone'];
			$timez = $row['timezone'];
			$timezdif = $row['timezone_diff'];
			$phptime = $row['php_tz'];
			$t_d = $row['suspension_date'];

?>
                                            
								<tr>
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
									 <?php if ($t_d > $sy){ echo "On Suspension"; } elseif ($t_d < $sy) { echo "<font color='FE2E2E'><b>Suspension Over</b></font>"; } elseif ($t_d == $sy) { echo "<b>Last of Suspension</b>"; } ?> (<?php echo $t_d; ?>)
								</td>
								<td>
								<b><?php echo $country; ?> <?php echo abc("$phptime"); ?></b> (<?php echo $timezdif; ?>)
								</td>
								<td>
								<div class="ml-auto badge badge-danger"><?php echo abc2("$pid"); ?></div>
								</td>
							</tr>
							<?php 		
		}
	}	
?>
                                            </tbody>
                                        </table>
                                    </div></p>
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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-throttle-debounce/1.1/jquery.ba-throttle-debounce.min.js"></script>
<div class="modal fade bd-example-modal-lg" id="ref" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        
        </div>
    </div>
</div>
<!-- Large modal end  -->                        
<script>
$('.reff').click(function(){
    var famID=$(this).attr('data-id');
    var famDis=$(this).attr('data-dis');

    $.ajax({url:"reff-details.php?famID="+famID+"&famDis="+famDis,cache:false,success:function(result){
        $(".modal-content").html(result);
    }});
});
</script>