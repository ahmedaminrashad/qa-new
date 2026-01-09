<?php session_start(); ?>
  <?php
  include("../includes/session1.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("../includes/notifications.php");
  include("header.php");
  if ($right != 4)
  {
  header('Location: admin-home');
  }
  $month =$_REQUEST['month_id'];
  $year =$_REQUEST['year_id'];
  $dateObj   = DateTime::createFromFormat('!m', $month);
$month_n = $dateObj->format('F'); // March
function psum($m, $y){
require ("../includes/dbconnection.php");
  $sql = "select sum(amount) from account_entry where (ac_cat_id = 2 OR ac_cat_id = 7 OR ac_cat_id = 8 OR ac_cat_id = 9 OR ac_cat_id = 1 OR ac_cat_id = 10 OR ac_cat_id = 10) AND MONTH(date) = $m AND YEAR(date) = $y";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
if($row[0] > 0) 
        {
            echo number_format($row[0], 0);
        }
    else
        {
            echo '--';
        }
}
function rsum($m, $y){
require ("../includes/dbconnection.php");
  $sql = "select sum(amount) from account_entry where (ac_cat_id = 3 OR ac_cat_id = 4 OR ac_cat_id = 6) AND MONTH(date) = $m AND YEAR(date) = $y";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
if($row[0] > 0) 
        {
            echo number_format($row[0], 0);
        }
    else
        {
            echo '--';
        }
}
function tot($m, $y){
require ("../includes/dbconnection.php");
  $sql = "select sum(amount) from account_entry where (ac_cat_id = 2 OR ac_cat_id = 7 OR ac_cat_id = 8 OR ac_cat_id = 9 OR ac_cat_id = 1 OR ac_cat_id = 10 OR ac_cat_id = 10) AND MONTH(date) = $m AND YEAR(date) = $y";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$first = $row[0];
$sql = "select sum(amount) from account_entry where (ac_cat_id = 3 OR ac_cat_id = 4 OR ac_cat_id = 6) AND MONTH(date) = $m AND YEAR(date) = $y";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$second = $row[0];
$total = $second-$first;
if($total >= 0) 
        {
            echo '<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 margin-bottom-10">
					<a class="dashboard-stat dashboard-stat-light green-haze">
					<div class="visual">
						<i class="fa fa-mortar-board fa-icon-medium"></i>
					</div>
					<div class="details">
						<div class="number">
							 '.number_format($total, 0).'
						</div>
						<div class="desc">
							 Surplus
						</div>
					</div>
					</a>
				</div>';
        }
    else
        {
            echo '<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 margin-bottom-10">
					<a class="dashboard-stat dashboard-stat-light red-intense">
					<div class="visual">
						<i class="fa fa-mortar-board fa-icon-medium"></i>
					</div>
					<div class="details">
						<div class="number">
							 '.number_format($total, 0).'
						</div>
						<div class="desc">
							 Deficit
						</div>
					</div>
					</a>
				</div>';
        }
}
function psumi($h){
require ("../includes/dbconnection.php");
$month =$_REQUEST['month_id'];
$year =$_REQUEST['year_id'];
$sql = "select sum(amount) from account_entry where account_head = $h AND MONTH(date) = $month AND YEAR(date) = $year";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$second = $row[0];
echo number_format($second, 0);
}
function head_name($h){
require ("../includes/dbconnection.php");
$sql = "select * from accounts_head where account_head_id = $h";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){		
			$en_name = $row['account_head_name'];
			echo $en_name;
		}
	}
}
?>
<?php
$page_title = 'Payments and Receipts';
$page_subtitle = 'Payments and Receipts';
$table_name = 'Payments and Receipts';
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
                                    <div class="page-title-subheading"><?php echo $page_subtitle; ?> for <?php echo $month_n; ?>-<?php echo $year; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="page-title-actions">
                                <div class="d-inline-block dropdown">
                                <a href="#invoice" data-toggle="modal" data-target="#invoice"><button class="mb-2 mr-2 btn btn-shadow btn-danger">Search for Previous Month</button></a>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <!-- Page Title End-->
                    <!-- Table Row Start-->
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="main-card mb-3 card">
                                <div class="card-body"><h5 class="card-title">Total Receipts for <?php echo $month_n; ?>-<?php echo $year; ?></h5>
                                    <div class="table-responsive">
                                        <table class="align-middle mb-0 table table-striped table-hover">
								<thead>
								<tr>
								<th>
									 #
								</th>
								<th>
									 Head
								</th>
								<th>
									 Amount
								</th>
								<?php 
// sending query
$sql = "SELECT * FROM account_entry WHERE (ac_cat_id = 3 OR ac_cat_id = 4 OR ac_cat_id = 6) AND MONTH(date) = $month AND YEAR(date) = $year GROUP BY account_head";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){		
			$en_id = $row['entry_id'];
			$en_date = $row['date'];
			$en_vou = $row['voucher_id'];
			$en_des = $row['description'];
			$en_ven = $row['vendor_id'];
			$en_cat = $row['ac_cat_id'];
			$en_head = $row['account_head'];
			$en_amu = $row['amount'];
?>
							</tr>
								</thead>
								<tbody>
								<tr bgcolor="">
								<td>
									 <?php echo ++$counter; ?>
								</td>
								<td>
									 <a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo $en_head; ?>" data-value="<?php echo psumi("$en_head"); ?>" data-month="<?php echo $month; ?>" data-year="<?php echo $year; ?>" data-nn="<?php echo head_name("$en_head"); ?>"><?php echo head_name("$en_head"); ?></a>
								</td>
								<td>
									 <?php echo psumi("$en_head"); ?>
								</td>
							</tr>
							<?php 	
		}
	}	
?>
								<tr bgcolor="#44b6ae">
								<td colspan="2" align="right">
									 <strong>Total</strong>
								</td>
								<td>
									 <strong><?php echo rsum("$month","$year"); ?></strong>
								</td>
							</tr>
								</tbody>
								</table>
							</div>
						</div>
					</div>
					</div>
					<!-- Table Row Start-->
                        <div class="col-lg-6">
                            <div class="main-card mb-3 card">
                                <div class="card-body"><h5 class="card-title">Total Payments for <?php echo $month_n; ?>-<?php echo $year; ?></h5>
                                    <div class="table-responsive">
                                        <table class="align-middle mb-0 table table-striped table-hover">
								<thead>
								<tr>
								<th>
									 #
								</th>
								<th>
									 Head
								</th>
								<th>
									 Amount
								</th>
								<?php 
// sending query
$sql = "SELECT * FROM account_entry WHERE (ac_cat_id = 2 OR ac_cat_id = 7 OR ac_cat_id = 8 OR ac_cat_id = 9 OR ac_cat_id = 1 OR ac_cat_id = 10 OR ac_cat_id = 11) AND MONTH(date) = $month AND YEAR(date) = $year GROUP BY account_head";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){		
			$en_id = $row['entry_id'];
			$en_date = $row['date'];
			$en_vou = $row['voucher_id'];
			$en_des = $row['description'];
			$en_ven = $row['vendor_id'];
			$en_cat = $row['ac_cat_id'];
			$en_head = $row['account_head'];
			$en_amu = $row['amount'];
?>
							</tr>
								</thead>
								<tbody>
								<tr bgcolor="">
								<td>
									 <?php echo ++$counter; ?>
								</td>
								<td>
									 <a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo $en_head; ?>" data-value="<?php echo psumi("$en_head"); ?>" data-month="<?php echo $month; ?>" data-year="<?php echo $year; ?>" data-nn="<?php echo head_name("$en_head"); ?>"><?php echo head_name("$en_head"); ?></a>
								</td>
								<td>
									 <?php echo psumi("$en_head"); ?>
								</td>
							</tr>
							<?php 	
		}
	}	
?>
								<tr bgcolor="#e35b5a">
								<td colspan="2" align="right">
									 <strong>Total</strong>
								</td>
								<td>
									<strong><?php echo psum("$month","$year"); ?></strong>
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
<?php echo $footer; ?>
<!-- Large modal start -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-throttle-debounce/1.1/jquery.ba-throttle-debounce.min.js"></script>
<div class="modal fade bd-example-modal-lg" id="notes-d" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        
        </div>
    </div>
</div>
<!-- Large modal end  -->
<!-- Large modal start -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-throttle-debounce/1.1/jquery.ba-throttle-debounce.min.js"></script>
<div class="modal fade bd-example-modal-lg" id="invoice" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Search</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="signupForm" class="col-md-10 mx-auto" method="post" action="receipt-payment-search">
				<input type="hidden" id="$month =$_REQUEST['mon'];" name="$month =$_REQUEST['mon'];"  value="<?php echo $month_n; ?>" />
                                <div class="form-group">
<label>Month</label>
<div>
<select required class="form-control" name="month_id"  id="month_id">

<?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
$sql = "SELECT * FROM month ORDER BY month_id ";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)){  ?>
<option value="<?php echo $row['num'];?>"><?php echo $row['month_name'];?> </option>
<?php } ?>
</select>
</div>
</div>
<div class="form-group">
<label>Year</label>
<div>
<select required class="form-control" name="year_id"  id="year_id">
<?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
$sql = "SELECT * FROM school_yr ORDER BY year_id ";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)){  ?>
<option value="<?php echo $row['school_year'];?>"><?php echo $row['school_year'];?> </option>
<?php } ?>
</select>
</div>
</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name ="submit" class="btn btn-primary">Search</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Large modal end  -->
<script>
$('.notes').click(function(){
    var famID=$(this).attr('data-id');
    var famValue=$(this).attr('data-value');
    var famMonth=$(this).attr('data-month');
    var famYear=$(this).attr('data-year');
    var famnn=$(this).attr('data-nn');

    $.ajax({url:"entry-details.php?famID="+famID+"&famValue="+famValue+"&famMonth="+famMonth+"&famYear="+famYear+"&famnn="+famnn,cache:false,success:function(result){
        $(".modal-content").html(result);
    }});
});
</script>