<?php session_start(); ?>
  <?php
  include("../includes/session1.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("../includes/notifications.php");
  include("header.php");
  $link = $_SERVER['REQUEST_URI'];
$date = date('d/m/Y', time());
$m =$_REQUEST['mon'];
$y =$_REQUEST['year'];
$cuid =$_REQUEST['cur'];
$cname =$_REQUEST['currency_name'];
function abc2($er)
{
require ("../includes/dbconnection.php");
// sending query
   $sql = "SELECT * FROM invoice Where parent_id = $er and status = 1";
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
$page_title = 'Adjustment Details';
$page_subtitle = 'Adjustment Details';
$table_name = 'Adjustment Details';
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
                                        <table class="mb-0 table">
								<thead>
								<tr>
								<th>
									 &nbsp;
								</th>
								<th>
									 Name
								</th>
								<th>
									 Contry
								</th>
								<th>
									 Fee
								</th>
								<th>
									 Email
								</th>
								<th>
									 Phone
								</th>
								<th>
									 Due Date
								</th>
								<th>
									 &nbsp;
								</th>
								<th>
									 &nbsp;
								</th>
								</tr>
								</thead>
								<tbody>
								<?php 
// sending query
$sql = "SELECT `invoice`.*, `month`.`month_name`, `statusp`.`name`, `country`.`c_name` FROM `invoice`,`month`,`statusp`,`country` WHERE invoice.mon_id=month.month_id and invoice.status=statusp.s_id and invoice.c_id=country.c_id HAVING mon_id = $m and status = 2 and y_id = $y and currency_id = $cuid ORDER BY d DESC";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){		
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
			$pid = $row['py_id'];
			$prid = $row['parent_id'];
			$pn = $row['parent_name'];
			$iss = $row['issue'];
			$du = $row['due'];
			$sub = $row['submit'];
			$fe = $row['fee'];
			$fe_add = $row['invoice_add'];
			$sts = $row['name'];
			$mon = $row['month_name'];
			$ssid = $row['status'];
			$m = $row['mon_id'];
			$y = $row['y_id'];
			$em = $row['email'];
			$etele = $row['telephone'];
			$emob = $row['mobile'];
			$esky = $row['skype'];
			$econ = $row['c_name'];
			$sttat = $row['status'];
?>
							
								<tr>
								<td><a href="parent-accounts-profile?parent_id=<?php echo base64_encode($prid); ?>"><button type="button" class="btn red btn-xs"><?php echo abc2("$prid"); ?></button></a></td>
								<td>
									 <a href="parent-accounts-profile?parent_id=<?php echo base64_encode($prid); ?>"><font color="<?php echo $bgcolor; ?>"><?php echo $pn; ?></font></a>
								</td>
								<td>
								<?php echo $econ; ?>
								</td>
								<td>
									 <a href="ind_details?parent_id=<?php echo base64_encode($prid); ?>"><font color="<?php echo $bgcolor; ?>"><?php echo $cname; ?> <?php echo $fe+$fe_add; ?></font></a>
								</td>
								<td>
									 <a href="parent-accounts-profile?parent_id=<?php echo base64_encode($prid); ?>"><font color="<?php echo $bgcolor; ?>"><?php echo $em; ?></font></a>
								</td>
								<td>
									 <font color="<?php echo $bgcolor; ?>"><?php echo $emob; ?></font>
								</td>
								<td>
									 <font color="<?php echo $bgcolor; ?>"><?php echo $du; ?></font>
								</td>
								<td><a href="edit-invoice?pT=<?php echo base64_encode($pid); ?>&link=<?php echo base64_encode($link); ?>"><button type="button" class="btn yellow btn-xs">Edit</button></a></td>
								<td><a href="invoice-del.php?pidt=<?php echo $pid; ?>" onclick="return confirm('You are about to delete this invoice. Please confirm your action!');"><button type="button" class="btn red btn-xs">Delete</button></a></td>
							</tr>
							<?php 	
		}
	}	
?>
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