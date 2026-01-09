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
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
  include("../includes/main-var.php");
  include("header.php");
$varid =base64_decode($_GET["y27"]);
$result = mysql_query("SELECT `invoice`.*, `month`.`month_name`, `school_yr`.`school_year`, `statusp`.`status_name`, `currency`.`currency_name` FROM `invoice`,`month`,`school_yr`,`statusp`,`currency` WHERE invoice.mon_id=month.month_id and invoice.y_id=school_yr.year_id and invoice.status=statusp.s_id and invoice.currency_id=currency.currency_id HAVING py_id = '$varid'");
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
			$i++;		
		}
	}
function ccur($cm){
$result = mysql_query("SELECT * FROM currency Where currency_id = '$cm'");
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
					$acat_name = MYSQL_RESULT($result,$i,"abv");
					echo $acat_name;
		
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
<style type="text/css">
.auto-style1 {
	text-align: right;
}
</style>
</head>
<!-- BEGIN TOP NAVIGATION MENU -->
			<!-- END TOP NAVIGATION MENU -->
			</div>
	</div>
	</div>
	</div>
<!-- BEGIN PAGE CONTAINER -->
<div class="page-container">
	<!-- BEGIN PAGE HEAD -->
	<div class="page-head">
		<div class="container">
			<!-- BEGIN PAGE TITLE -->
			<div class="page-title">
				<h1>Payment <small>Page</small></h1>
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
			<div class="row">
								<div class="col-md-6">
					<div class="tabbable tabbable-custom tabbable-noborder tabbable-reversed">
						<div class="tab-content">
								<div class="portlet box green">
									<div class="portlet-title">
										<div class="caption">
											Invoice Payment Page
										</div>
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<table class="table table-hover">
														<tbody>
														<tr>
															<td style="text-align:center">
																<h2>Invoice for the month of <?php echo $mon; ?>-<?php echo $yr; ?></h2>
															</td>
														</tr>
														<tr>
															<td style="text-align:center">
																<h3><?php echo $cuan; ?> <?php echo $fe; ?></h3>
															</td>
														</tr>
														<tr>
															<td style="text-align:center">
																<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="item_name_1" value="<?php echo $pn; ?> for <?php echo $mon; ?>-<?php echo $yr; ?>" />
<input type="hidden" name="amount_1" value='<?php echo $fe; ?>' />
<input type="hidden" name="quantity_1" value="1" />
<input type='hidden' name='item_number' value='' />
<input type="hidden" name="shipping_1" value='0.00' />
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif"
     name="submit" class="wp_cart_checkout_button"
     alt="Make payments with PayPal - it\'s fast, free and secure!" />
<input type="hidden" name="return" value="https://<?php echo $site_nameS; ?>/member-area/accounts/payment-done.php" />
<input type="hidden" name="business" value="<?php echo $paypal_email; ?>" />
<input type="hidden" name="currency_code" value="<?php echo ccur("$cuanid"); ?>" />
<!-- Custom variable here: -->
<input type="hidden" name="custom" value="<?php echo $pid; ?>">
<input type="hidden" name="cmd" value="_cart" />
<input type="hidden" name="upload" value="1" />
<input type="hidden" name="rm" value="2" />
<input type="hidden" name="mrb" value="ABC2343FGBM234" />
</from>
															</td>
														</tr>
								</tbody>
								</table>
										<!-- END FORM-->
									</div>
								</div>
							</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- END PAGE CONTENT INNER -->
		</div>
	</div>
	<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->
<?php echo $fot; ?>