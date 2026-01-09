<?php if (empty($session)) { session_start(); } 
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
?>
<?php
require('payments/config.php');
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
  include("../includes/session.php");
  include("header.php");
  
  $lang=$_POST['c_mon'];
  $rank=$_POST['c_year'];
  $tt = $_SESSION['is']['parent_id'];
  $pyid = $_POST['checkbox'];
$merge=array_combine($lang,$rank);

$sql = "select `account`.*, `country`.* FROM `account` ,`country` where account.parent_id = $tt and country.c_id = account.c_id";
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$parent_name = $row['parent_name'];
$email = $row['email'];
$mobile = $row['mobile'];
$c_a = $row['c_a'];
$city = $row['city'];
//die("$parent_name - $email - $mobile - $c_a - $city");

$sql = 'select sum(fee) from invoice where py_id IN (' . implode(',', array_map('intval', $pyid)) . ')';
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$fee = $row[0];
$sql = 'select sum(invoice_add) from invoice where py_id IN (' . implode(',', array_map('intval', $pyid)) . ')';
$q = mysql_query($sql);
$row = mysql_fetch_array($q);
$add = $row[0];
$pamu = $fee+$add;
$pyid1 = implode(',', array_map('intval', $pyid));
$cur_m =$_REQUEST['cur_m'];
function ccur(){
$cm =$_REQUEST['cur_n'];
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
					$acat_name = MYSQL_RESULT($result,$i,"currency_name");
					echo $acat_name;
		
	$i++;	 
			}
			}
}

?>
<?php 
function all1($var){
$result = mysql_query("SELECT `invoice`.*, `month`.`month_name`, `school_yr`.`school_year` FROM `invoice`,`month`,`school_yr` WHERE invoice.mon_id=month.month_id and invoice.y_id=school_yr.year_id HAVING py_id = $var ORDER BY py_id DESC");
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
			$mon = MYSQL_RESULT($result,$i,"month_name");
			$yr = MYSQL_RESULT($result,$i,"school_year");
echo ''.$mon.'-'.$yr.'';
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
			<div class="top-menu">
				<ul class="nav navbar-nav pull-right">
					<!-- BEGIN NOTIFICATION DROPDOWN -->
					<li class="dropdown dropdown-extended dropdown-dark dropdown-notification" id="header_notification_bar">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						<i class="icon-bell"></i>
						<?php 
$result = mysql_query("SELECT * FROM invoice WHERE status = 1 and parent_id =$tt");
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
$result = mysql_query("SELECT * FROM invoice WHERE status = 1 and parent_id =$tt");
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
				<h1>Payment <small>Details</small></h1>
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
			<?php echo $note; ?>
			<ul class="page-breadcrumb breadcrumb">
				<li>
					<a href="parents-home">Home</a><i class="fa fa-circle"></i>
				</li>
				<li class="active">
					 <a href="ind_details">Invoice(s)</a><i class="fa fa-circle"></i>
				</li>
				<li class="active">
					 Payment Form
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="row">
				<div class="col-md-12">
				<div class="note note-info note-bordered">
													<p>You have selected the following invoice(s)</p>
													</div></div>
													<div class="col-md-6">
											<table class="table table-hover">
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
$result = mysql_query("SELECT `invoice`.*, `month`.`month_name`, `school_yr`.`school_year`, `statusp`.`status_name`, `currency`.`currency_name` FROM `invoice`,`month`,`school_yr`,`statusp`,`currency` WHERE invoice.mon_id=month.month_id and invoice.y_id=school_yr.year_id and invoice.status=statusp.s_id and invoice.currency_id=currency.currency_id HAVING py_id = '$del_id' ORDER BY py_id DESC");
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
	while($row = mysql_fetch_array($result))
		{	?>
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
									<td colspan="2" class="auto-style1"><b>Total</b></td>
									<td class="auto-style1"><?php ccur(); ?> <?php echo $pamu; ?>/-</td>
								</tr>
							<tr>
							 	<td>   
							 
							 	    <form action="payments/submit.php" method="post">
							 	    
                                               <input type='hidden' name='checkbox' value="	<?php echo  implode(',', array_map('intval', $pyid))  ;?>" />
                                               <input type='hidden' name='amount' value="<?php echo $pamu."00"; ?>" />
                                               <input type='hidden' name='currency' value="<?php echo $cur_m; ?>" />
                                               <input type='hidden' name='description' value="<?php echo $description; ?>" />

                                      	<script 
                                      	   src="https://checkout.stripe.com/checkout.js" 
                                      	   class="stripe-button" 
                                      	   data-key="<?php echo $publishableKey ?>"
                                      	   data-amount="<?php echo $pamu."00" ?>" 
                                      	   data-name="<?php echo $parent_name ?>" 
                                      	   data-description="<?php echo $description ?>"
                                      	   data-image="<?php echo $image ?>"
                                      	   data-currency="<?php echo $cur_m ?>" 
                                      	   data-email="<?php echo $email ?>">
                                      	</script>
                                      </form>
							    	</td>
							</tr>

						
								</tbody>
								</table>
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