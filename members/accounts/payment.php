<?php if (empty($session)) { session_start(); } 
?>
<?php
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
  include("../includes/session.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("header.php");
  $tt = $_SESSION['is']['parent_id'];
  $pyid = $_POST['checkbox'];
$sql = 'select sum(fee) from invoice where py_id IN (' . implode(',', array_map('intval', $pyid)) . ')';
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$fee = $row[0];
$sql = 'select sum(invoice_add) from invoice where py_id IN (' . implode(',', array_map('intval', $pyid)) . ')';
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$add = $row[0];
$pamu = $fee+$add;
$pyid1 = implode(',', array_map('intval', $pyid));
$cur_m =$_REQUEST['cur_m'];
function ccur(){
require ("../includes/dbconnection.php");
$cm =$_REQUEST['cur_n'];
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
					$acat_name = $row['currency_name'];
					echo $acat_name;
		
			}
			}
}

?>
<?php 
function all1($var){
require ("../includes/dbconnection.php");
$sql = "SELECT `invoice`.*, `month`.`month_name`, `school_yr`.`school_year` FROM `invoice`,`month`,`school_yr` WHERE invoice.mon_id=month.month_id and invoice.y_id=school_yr.year_id HAVING py_id = $var ORDER BY py_id DESC";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){		
			$mon = $row['month_name'];
			$yr = $row['school_year'];
echo ''.$mon.'-'.$yr.'';
		}
	}
	}
?>
<?php
$page_title = 'Invoice Payment';
$page_subtitle = 'You are processing your invoice';
$table_name = 'You are processing your invoice';
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
<script>
    (function (document, src, libName, config) {
        var script             = document.createElement('script');
        script.src             = src;
        script.async           = true;
        var firstScriptElement = document.getElementsByTagName('script')[0];
        script.onload          = function () {
            for (var namespace in config) {
                if (config.hasOwnProperty(namespace)) {
                    window[libName].setup.setConfig(namespace, config[namespace]);
                }
            }
            window[libName].register();
        };

        firstScriptElement.parentNode.insertBefore(script, firstScriptElement);
    })(document, 'https://secure.2checkout.com/checkout/client/twoCoInlineCart.js', 'TwoCoInlineCart',{"app":{"merchant":"<?php echo $CO_number; ?>","iframeLoad":"checkout"},"cart":{"host":"https:\/\/secure.2checkout.com","customization":"inline"}});
</script>
</head>
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
								<thead>
								<tr>
								<th>
									<i class="fa fa-calendar"></i> Month
								</th>
								<th>
									<i class="fa fa-calendar"></i> Due Date
								</th>
								<th class="auto-style1">
									<i class="fa fa-money"></i> Fee
								</th>
								<?php 
$checkbox = $_POST['checkbox'];

for($i=0;$i<count($checkbox);$i++){
$del_id = $checkbox[$i];
$sql = "SELECT `invoice`.*, `month`.`month_name`, `school_yr`.`school_year`, `statusp`.`status_name`, `currency`.`currency_name` FROM `invoice`,`month`,`school_yr`,`statusp`,`currency` WHERE invoice.mon_id=month.month_id and invoice.y_id=school_yr.year_id and invoice.status=statusp.s_id and invoice.currency_id=currency.currency_id HAVING py_id = '$del_id' ORDER BY py_id DESC";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){	?>
														</tr>
														</thead>
														<tbody>
														<tr>
															<td>
																<font color="<?php echo $bgcolor; ?>"><?php echo $row['month_name']; ?>-<?php echo $row['school_year']; ?></font>
															</td>
															<td>
																 <font color="<?php echo $bgcolor; ?>"><?php echo $row['due']; ?></font>
															</td>
															<td class="auto-style1">
																<font color="<?php echo $bgcolor; ?>"><?php echo $row['currency_name']; ?> <?php echo $row['fee']+$row['invoice_add']; ?>/-</font>
															</td>
														</tr>
														<?php		
		}
	}
	}
?>
								<tr>
									<td colspan="3" class="auto-style1"><b>Total:</b> <a href="#" class="btn btn-success" id="buy-button"><?php ccur(); ?> <?php echo $pamu; ?>/- Pay Now!</a></td>
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
<?php echo $footer; ?>
<script>
    window.document.getElementById('buy-button').addEventListener('click', function() {
  TwoCoInlineCart.setup.setMode('DYNAMIC');
  TwoCoInlineCart.cart.setCurrency('<?php echo $cur_m; ?>');
  TwoCoInlineCart.cart.setReset('true');
  TwoCoInlineCart.cart.setReturnMethod({
    type: 'redirect',
    url : '<?php echo $site; ?>/members/accounts/confirm.php?py_id=<?php echo $pyid1; ?>'
  });
  TwoCoInlineCart.billing.setEmail('<?php echo $_SESSION['is']['email_id']; ?>');
  
  TwoCoInlineCart.products.add({
    name: '<?php echo $_SESSION['is']['parent']; ?> for <?php 
$checkbox = $_POST['checkbox'];

for($i=0;$i<count($checkbox);$i++){
$del_id = $checkbox[$i];
echo all1("$del_id");echo ', '; }?>',
    quantity: 1,
    price: '<?php echo $pamu; ?>',
  });
  TwoCoInlineCart.cart.checkout();
});
</script>