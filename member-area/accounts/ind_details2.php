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
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
include("../includes/session.php");
include("header.php");
$pnid =$_SESSION['is']['parent_id'];
$ccuid =$_SESSION['is']['$currency1'];
//$modeid =$_COOKIE['modeid'];

$sql = "SELECT * FROM account Where parent_id = '$pnid'";
$result = mysql_query($sql);

$modeid = MYSQL_RESULT($result,0,"mode_id");
?>
<?php
date_default_timezone_set($TimeZoneCustome);
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
    $y = 11;
}
elseif($sy == "2023")
{
    $y = 12;
}
elseif($sy == "2024")
{
    $y = 13;
}
elseif($sy == "2025")
{
    $y = 14;
}
?>
<?php
date_default_timezone_set($TimeZoneCustome);
$sy = date('Y-m-d');
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
?>
<?php echo $main_header; ?>
<head>
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="-1" />
</head>
<!-- BEGIN TOP NAVIGATION MENU -->
<div class="top-menu">
    <ul class="nav navbar-nav pull-right">
        <!-- BEGIN NOTIFICATION DROPDOWN -->
        <li class="dropdown dropdown-extended dropdown-dark dropdown-notification" id="header_notification_bar">
            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                <i class="icon-bell"></i>
                <?php
                $result = mysql_query("SELECT * FROM invoice WHERE status = 1 and parent_id =$pnid");
                $counter = 0;
                if (!$result)
                {
                    die("Query to show fields from table failed");
                }
                $numberOfRowsot = MYSQL_NUMROWS($result);
                If ($numberOfRowsot == 0)
                {
                    echo '';
                }
                else if ($numberOfRowsot > 0)
                {
                    echo '<span class="badge badge-default">'.$numberOfRowsot.'</span>';
                }
                ?>
            </a>
            <ul class="dropdown-menu">
                <li class="external">
                    <h3>You have <strong><?php
                            $result = mysql_query("SELECT * FROM invoice WHERE status = 1 and parent_id =$pnid");
                            $counter = 0;
                            if (!$result)
                            {
                                die("Query to show fields from table failed");
                            }
                            $numberOfRowsot1 = MYSQL_NUMROWS($result);
                            If ($numberOfRowsot == 0)
                            {
                                echo '0';
                            }
                            else if ($numberOfRowsot1 > 0)
                            {
                                echo $numberOfRowsot1;
                            }
                            ?> Invoice(s)</strong> unpaid</h3>
                    <a href="ind_details">view all</a>
                </li>
                <li>
                </li>
            </ul>
        </li>
        <!-- END NOTIFICATION DROPDOWN -->
        <li class="droddown dropdown-separator">
            <span class="separator"></span>
        </li>
        <!-- BEGIN USER LOGIN DROPDOWN -->
        <li class="dropdown dropdown-user dropdown-dark">
            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                <img alt="" class="img-circle" src="../assets/admin/layout3/img/user-alt-128.png">
                <span class="username username-hide-mobile"><?php echo $_SESSION['is']['parent']; ?></span>
            </a>
            <ul class="dropdown-menu dropdown-menu-default">
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
<?php echo $main_menu; ?>
<!-- BEGIN PAGE CONTAINER -->
<div class="page-container">
    <!-- BEGIN PAGE HEAD -->
    <div class="page-head">
        <div class="container">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                <h1>Invoice Details<small> <?php $result = mysql_query("SELECT * FROM school_yr WHERE year_id = $y");
                        if (!$result)
                        {
                            die("Query to show fields from table failed");
                        }
                        $numberOfRows = MYSQL_NUMROWS($result);
                        $pidm = MYSQL_RESULT($result,$i,"school_year");
                        echo $pidm;?></small></h1>
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
                    <a href="parents-home">Home</a><i class="fa fa-circle"></i>
                </li>
                <li class="active">
					 <span class="label label-sm label-success"><b>Invoice Details of <?php
                             $g =$_REQUEST['par_id'];
                             $result1 = mysql_query("SELECT * FROM account HAVING parent_id = $pnid");
                             $pname = MYSQL_RESULT($result1,$i,"parent_name");
                             echo $pname;
                             ?> for the year <?php $result = mysql_query("SELECT * FROM school_yr WHERE year_id = $y");
                             if (!$result)
                             {
                                 die("Query to show fields from table failed");
                             }
                             $numberOfRows = MYSQL_NUMROWS($result);
                             $pidm = MYSQL_RESULT($result,$i,"school_year");
                             echo $pidm ?></b></span>
                </li>
            </ul>
            <!-- END PAGE BREADCRUMB -->
            <!-- BEGIN PAGE CONTENT INNER -->
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN SAMPLE TABLE PORTLET-->
                    <div class="portlet light">
                        <form action="ind_details_b?pti=<?php echo $tt; ?>" method="GET" class="form-horizontal form-row-sepe">
                            <label class="control-label">Select Year</label>
                            <select class="form-control input-small select2me" data-placeholder="Select..." name="pdept"  id="pdept" onchange="this.form.submit()">
                                <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
                                // source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
                                $result = mysql_query("SELECT * FROM school_yr ORDER BY year_id ");
                                do {  ?>
                                    <option value="<?php echo $row['year_id'];?>"><?php echo $row['school_year'];?> </option>
                                <?php } while ($row = mysql_fetch_assoc($result)); ?>
                            </select>
                            <input type="hidden" id="hidden_pdept_id" name="hidden_p_pdept_id"  value="<?PHP echo trim($_POST['hidden_pdept_id']); ?>" />
                            <input type="hidden" id="hidden_dept" name="pti" value="<?PHP echo $pnid; ?>"/>

											</form><br>
											
						<form action="<?php if ($modeid == 1) { echo 'https://www.2checkout.com/checkout/purchase'; } elseif ($modeid == 2) { echo 'payments'; } ?>" method="POST">
						<input type='hidden' name='cur_m' value='<?php echo abv($_SESSION['is']['$currency1']); ?>' />
						<input type='hidden' name='cur_n' value='<?php echo $_SESSION['is']['$currency1']; ?>' />
						<h3><b><span class="label label-warning"><b>Please select one or more invoices to pay by click on PAY NOW BUTTON</b></span></b></h3>
						<h3><button type="submit" class="btn red btn-xs">Pay Now (Monthly)</button></h3>
						<div class="portlet-body">
							<div id="mytable" class="table-responsive">
								<table class="table table-hover">
								<thead>
								<tr>
								<th>
									#
								</th>
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
									<i class="fa fa-check"></i> Status
								</th>
								<?php 
$result = mysql_query("SELECT `invoice`.*, `month`.`month_name`, `school_yr`.`school_year`, `statusp`.`status_name`, `currency`.`currency_name` FROM `invoice`,`month`,`school_yr`,`statusp`,`currency` WHERE invoice.mon_id=month.month_id and invoice.y_id=school_yr.year_id and invoice.status=statusp.s_id and invoice.currency_id=currency.currency_id HAVING (y_id = $y OR status = 1) AND parent_id = $pnid ORDER BY py_id DESC");
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
			$pid = MYSQL_RESULT($result,$i,"py_id");
			$prid = MYSQL_RESULT($result,$i,"parent_id");
			$pn = MYSQL_RESULT($result,$i,"parent_name");
			$iss = MYSQL_RESULT($result,$i,"issue");
			$du = MYSQL_RESULT($result,$i,"due");
			$sub = MYSQL_RESULT($result,$i,"submit");
			$fe = MYSQL_RESULT($result,$i,"fee");
			$sts = MYSQL_RESULT($result,$i,"status_name");
			$mon = MYSQL_RESULT($result,$i,"month_name");
			$monid = MYSQL_RESULT($result,$i,"mon_id");
			$s = MYSQL_RESULT($result,$i,"status");
			$cuan = MYSQL_RESULT($result,$i,"currency_name");
			$cuanid = MYSQL_RESULT($result,$i,"currency_id");
			$yr = MYSQL_RESULT($result,$i,"school_year");
			$fe_add = MYSQL_RESULT($result,$i,"invoice_add");
?>
														</tr>
														</thead>
														<tbody>
														<tr>
															<td>
																<?php if ($s == 1){ echo '<input name="checkbox[]" style="" type="checkbox" value="'.$pid.'" checked>'; }
																else { echo '--'; } ?>
															</td>
															<td>
																<font color="<?php echo $bgcolor; ?>"><?php echo $mon; ?>-<?php echo $yr; ?></font>
															</td>
															<td class="hidden-xs">
																 <font color="<?php echo $bgcolor; ?>"><?php echo $iss; ?></font>
															</td>
															<td>
																 <font color="<?php echo $bgcolor; ?>"><?php echo $du; ?></font>
															</td>
															<td>
																<font color="<?php echo $bgcolor; ?>"><?php echo $sub; ?></font>
															</td>
															<td>
																<font color="<?php echo $bgcolor; ?>"><?php echo $cuan; ?> <?php echo $fe+$fe_add; ?>/-</font>
															</td>
															<td>
																<?php if ($s == 1){echo '<span class="label label-sm label-danger">Pending</span>'; } else { echo '<span class="label label-sm label-success">Paid</span>'; } ?>
															</td>
														</tr>
														<?php
														$i++;		
		}
	}	
?>
                                    <input type='hidden' name='li_0_name' value='<?php echo $_SESSION['is']['parent']; ?> for <?php 
                                            $checkbox = $_POST['checkbox'];

                                            for($i=0;$i<count($checkbox);$i++){
                                            $del_id = $checkbox[$i];
                                        echo all1("$del_id");echo ', '; }?>' />
                                                <input type='hidden' name='sid' value='250206830546' />
											    <input type='hidden' name='mode' value='2CO' />
										    	<input type='hidden' name='currency_code' value='<?php echo $cur_m; ?>' />
										    	<input type='hidden' name='li_0_type' value='product' />
											    <input type='hidden' name='py_id' value='<?php echo $pyid1; ?>' />
										    	<input type='hidden' name='li_0_price' value='<?php echo $pamu; ?>' />
                                        		<input type='hidden' name="card_holder_name"  value='<?php echo $parent_name; ?>'>
												<input type="hidden" name="street_address"  value='Est esse impedit s'>
												<input type="hidden" name="street_address2"   value='Facere nostrud est q'>	
												<input type="hidden" name="zip"  value='26603'>
												<input type="hidden" name="country"  value='<?php echo $c_a; ?>'>
												<input type="hidden" name="state"  value='Omnis quisquam liber'>	
												<input type="hidden" name="city"  value='<?php echo $city; ?>'>
												<input type="hidden" name="email"  value='<?php echo $email; ?>'>
												<input type="hidden" name="phone"  value='<?php echo $mobile; ?>'>
								</tbody>
								</table>
							</div>
						</div>
						</form>
						<script src="https://www.2checkout.com/static/checkout/javascript/direct.min.js"></script>
						  	<form action='https://www.2checkout.com/checkout/purchase' method='post' class="form-horizontal">
                               	        
											<input type='hidden' name='li_0_name' value='<?php echo $_SESSION['is']['parent']; ?> for <?php 
                                            $checkbox = $_POST['checkbox'];

                                            for($i=0;$i<count($checkbox);$i++){
                                            $del_id = $checkbox[$i];
                                        echo all1("$del_id");echo ', '; }?>' />
                                                <input type='hidden' name='sid' value='250206830546' />
											    <input type='hidden' name='mode' value='2CO' />
										    	<input type='hidden' name='currency_code' value='<?php echo $cur_m; ?>' />
										    	<input type='hidden' name='li_0_type' value='product' />
											    <input type='hidden' name='py_id' value='<?php echo $pyid1; ?>' />
										    	<input type='hidden' name='li_0_price' value='<?php echo $pamu; ?>' />
                                        		<input type='hidden' name="card_holder_name"  value='<?php echo $parent_name; ?>'>
												<input type="hidden" name="street_address"  value='Est esse impedit s'>
												<input type="hidden" name="street_address2"   value='Facere nostrud est q'>	
												<input type="hidden" name="zip"  value='26603'>
												<input type="hidden" name="country"  value='<?php echo $c_a; ?>'>
												<input type="hidden" name="state"  value='Omnis quisquam liber'>	
												<input type="hidden" name="city"  value='<?php echo $city; ?>'>
												<input type="hidden" name="email"  value='<?php echo $email; ?>'>
												<input type="hidden" name="phone"  value='<?php echo $mobile; ?>'>
												<input type="image"  style="height: 6vh;" src="https://quransquare.com/resources/newassets/images/checkout_btn.png"
                                                  name="cmdSubmit" class="wp_cart_checkout_button"/>  
                                </form>
                                	<!--<script src="https://www.2checkout.com/static/checkout/javascript/direct.min.js"></script>-->
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
<script language="javascript" >
    var form = document.forms[0];
    //purpose?: to retrieve what users last input on the field..
    form.pdept.value = ("<?php echo $y; ?>");
    //alert (form.pCityM.value);
</script>