<?php
require ("../includes/dbconnection.php");
include("../includes/main-var.php");
$pnid =base64_decode($_GET["py_id"]);
$sql = "SELECT `invoice`.*, `month`.`month_name`, `statusp`.`status_name`, `currency`.`abv`, `school_yr`.`school_year` FROM `invoice`,`month`,`statusp`,`currency`,`school_yr` WHERE invoice.mon_id=month.month_id and invoice.status=statusp.s_id and invoice.currency_id=currency.currency_id and invoice.y_id=school_yr.year_id HAVING py_id = '$pnid'";
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
			$email = $row['email'];
			$fe = $row['fee'];
			$fe_add = $row['invoice_add'];
			$sts = $row['status_name'];
			$mon = $row['month_name'];
			$s = $row['status'];
			$cuan = $row['abv'];
			$cuanid = $row['currency_id'];
			$order = $row['order_num'];
			$anote = $row['add_note'];
			$ayear = $row['school_year'];
			$aname = $row['parent_name'];

			}
			}
$famID=$pidy;
$famAmu=$fe+$fe_add;
$famAcc=$cuan;
$fammon=$mon.'-'.$ayear;
$famEmail=$email;
$nfamAcc = mb_strlen($famAcc, 'UTF-8');
$nfamAmu = mb_strlen($famAmu, 'UTF-8');
$nfammon = mb_strlen('Payment-link-'.$fammon, 'UTF-8');
$secret = $CO_Sec;
$string = ''.$nfamAcc.''.$famAcc.''.$nfamAmu.''.$famAmu.''.$nfammon.'Payment-link-'.$fammon.'11107product';
$sig = hash_hmac('sha256', $string, $secret);
function ccur($cm){
$sql = "SELECT * FROM currency Where currency_id = '$cm'";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){			
					$acat_id = $row['currency_id'];
					$acat_name = $row['abv'];
					echo $acat_name;
		
			}
			}
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title><?php echo $title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"
    />
    <meta name="description" content="Tables are the backbone of almost all web applications.">

    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">

<link href="./main.8d288f825d8dffbbe55e.css" rel="stylesheet">
</head>
<body>
 
                <div class="scrollbar-sidebar">
                    <div class="app-sidebar__inner">
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
                                <div>Payment Page (Direct Payment Link)!
                                    <div class="page-title-subheading">
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
                                <div class="card-body"><h5 class="card-title"><?php $table_name; ?></h5>
                                    <div class="table-responsive">
                                        <table class="align-middle mb-0 table table-striped table-hover">
                                        <tbody>
										<thead>
								<tr>
								<th colspan="2" class="auto-style1">
							        www.<?php echo $site_nameC; ?>
							    </th>
							    </tr>
							    </thead>
								<tbody>
								<tr>
								<td>
								    <b>Account Name:</b>
								</td>
								<td>
								    <?php echo $aname; ?>
								</td>
							</tr>
							<tr>
								<td>
								    <b>Email:</b>
								</td>
								<td>
								    <?php echo $email; ?>
								</td>
							</tr>
							<tr>
								<td>
								    <b>Invoice Amount:</b>
								</td>
								<td>
								    <?php echo $cuan; ?> <?php echo $fe; ?>
								</td>
							</tr>
							<tr>
								<td>
								    <b>Adjustments:</b>
								</td>
								<td>
								    <?php echo $cuan; ?> <?php echo $fe_add; ?>
								</td>
							</tr>
							<tr>
								<td>
								    <b>Amount Payable:</b>
								</td>
								<td>
								    <?php echo $cuan; ?> <?php echo $fe+$fe_add; ?>
								</td>
							</tr>
							<tr>
								<td>
								    <b>Billing Month:</b>
								</td>
								<td>
								    <?php echo $mon; ?>-<?php echo $ayear; ?>
								</td>
							</tr>
							<tr>
								<td>
								    <b>Due Date:</b>
								</td>
								<td>
								    <?php echo date("jS F-Y", strtotime($du));; ?>
								</td>
							</tr>
							<tr>
								<td>
								    <b>Status:</b>
								</td>
								<td>
								    <?php if ($s == 1) { echo '<div class="ml-auto badge badge-danger">UN-PAID</div>'; } elseif ($s == 2) { echo '<div class="ml-auto badge badge-success">PAID</div>'; } ?>
								</td>
							</tr>
														<tr>
															<td>
																<?php if ($s == 1) { echo '<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="item_name_1" value="'.$aname.' for '.$mon.'-'.$ayear.'" />
<input type="hidden" name="amount_1" value="'.$famAmu.'" />
<input type="hidden" name="quantity_1" value="1" />
<input type="hidden" name="item_number" value="" />
<input type="hidden" name="shipping_1" value="0.00" />
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif"
     name="submit" class="wp_cart_checkout_button"
     alt="Make payments with PayPal - it\'s fast, free and secure!" />
<input type="hidden" name="return" value="https://'.$site_nameS.'/members/accounts/payment-done.php" />
<input type="hidden" name="business" value="'.$paypal_email.'" />
<input type="hidden" name="currency_code" value="'.$cuan.'" />
<!-- Custom variable here: -->
<input type="hidden" name="custom" value="'.$pidy.'">
<input type="hidden" name="cmd" value="_cart" />
<input type="hidden" name="upload" value="1" />
<input type="hidden" name="rm" value="2" />
<input type="hidden" name="mrb" value="ABC2343FGBM234" />
</from>'; } elseif ($s == 2) { echo '<div class="ml-auto badge badge-success">Already Paid for '.$mon.'-'.$ayear.'</div>'; } ?>
															</td>
															<td>
															</td>
														</tr>
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
          </div>
          <!-- Main Body End  -->
          </div>
</div>
<div class="app-drawer-overlay d-none animated fadeIn"></div><script type="text/javascript" src="./assets/scripts/main.8d288f825d8dffbbe55e.js"></script>
</body>
</html>