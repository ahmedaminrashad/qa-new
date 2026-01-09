<?php session_start(); ?>
  <?php
  header("Cache-Control: no-cache, must-revalidate");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
  include("../includes/session.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("header.php");
  $pnid =$_SESSION['is']['parent_id'];
  $ccuid =$_SESSION['is']['$currency1'];
  $modeid =$_SESSION['is']['$modeid'];
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
        elseif($sy == "2025") 
        {
            $y = 12;
        }
?>
<?php
date_default_timezone_set($TimeZoneCustome);
$sy = date('Y-m-d');
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
?>
<?php
$page_title = 'Invoice Details';
$page_subtitle = 'Invoice Details';
$table_name = 'Invoice Details';
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
                        <div class="col-lg-12">
                            <div class="main-card mb-3 card">
                                <div class="card-body"><h5 class="card-title"><?php $table_name; ?></h5>
                                    <div class="table-responsive">
                                        <table class="align-middle mb-0 table table-striped table-hover">
                                      <form action="<?php if ($modeid == 1) { echo 'payment?&yyyyy='.time().''; } elseif ($modeid == 2) { echo 'payment-paypal?&yyyyy='.time().''; } ?>" method="POST">
						<input type='hidden' name='cur_m' value='<?php echo abv($_SESSION['is']['$currency1']); ?>' />
						<input type='hidden' name='cur_n' value='<?php echo $_SESSION['is']['$currency1']; ?>' />
						<h3><b><span class="label label-warning"><b>Please select one or more invoices to pay by click on PAY NOW BUTTON</b></span></b></h3>
						<h3><button class="mb-2 mr-2 btn btn-outline-success">Pay Now (Monthly)</button></h3>
						<div class="portlet-body">
							<div id="mytable" class="table-responsive">
								<table class="table table-hover">
								<thead>
								<tr>
								<th>
									#
								</th>
								<th>
									Month
								</th>
								<th class="hidden-xs">
									Issue date
								</th>
								<th>
									Due Date
								</th>
								<th>
									Paid Date
								</th>
								<th>
									Amount
								</th>
								<th>
									Status
								</th>
								</tr>
														</thead>
														<tbody>
								<?php 
$sql = "SELECT `invoice`.*, `month`.`month_name`, `school_yr`.`school_year`, `statusp`.`status_name`, `currency`.`currency_name` FROM `invoice`,`month`,`school_yr`,`statusp`,`currency` WHERE invoice.mon_id=month.month_id and invoice.y_id=school_yr.year_id and invoice.status=statusp.s_id and invoice.currency_id=currency.currency_id HAVING (y_id = $y OR status = 1) AND parent_id = $pnid ORDER BY py_id DESC";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){
			$pid = $row['py_id'];
			$prid = $row['parent_id'];
			$pn = $row['parent_name'];
			$iss = $row['issue'];
			$du = $row['due'];
			$sub = $row['submit'];
			$fe = $row['fee'];
			$sts = $row['status_name'];
			$mon = $row['month_name'];
			$monid = $row['mon_id'];
			$s = $row['status'];
			$cuan = $row['currency_name'];
			$cuanid = $row['currency_id'];
			$yr = $row['school_year'];
			$fe_add = $row['invoice_add'];
?>
														
														<tr class="<?php if ($s == 1){ echo 'text-danger'; } else { echo 'text-success'; } ?>">
															<td>
																<?php if ($s == 1){ echo '<input name="checkbox[]" type="checkbox" value="'.$pid.'" checked>'; }
																else { echo '--'; } ?>
															</td>
															<td>
																<?php echo $mon; ?>-<?php echo $yr; ?>
															</td>
															<td class="hidden-xs">
																 <?php echo $iss; ?>
															</td>
															<td>
																 <?php echo $du; ?>
															</td>
															<td>
																<?php echo $sub; ?>
															</td>
															<td>
																<?php echo $cuan; ?> <?php echo $fe+$fe_add; ?>/-
															</td>
															<td>
																<?php if ($s == 1){echo '<div class="ml-auto badge badge-danger">Pending</div>'; } else { echo '<div class="ml-auto badge badge-success">Paid</div>'; } ?>
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
						</form>
					</div>
                        </div>
                    </div>
                    <!-- Table Row End -->
                    
                </div>
                <!-- App inner end -->
<?php echo $footer; ?>
<script language="javascript" >
	var form = document.forms[0];
	//purpose?: to retrieve what users last input on the field..
	form.pdept.value = ("<?php echo $y; ?>");
	//alert (form.pCityM.value);				
</script>