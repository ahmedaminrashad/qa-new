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
function tot($y){
require ("../includes/dbconnection.php");
  $sql = "select sum(amount) from account_entry where (ac_cat_id = 2 OR ac_cat_id = 7 OR ac_cat_id = 8 OR ac_cat_id = 9 OR ac_cat_id = 1 OR ac_cat_id = 10 OR ac_cat_id = 11) AND date <= '$y'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$first = $row[0];
$sql = "select sum(amount) from account_entry where (ac_cat_id = 3 OR ac_cat_id = 4 OR ac_cat_id = 6) AND date <= '$y'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$second = $row[0];
$total = $second-$first;
echo $total;
}
function pa_d($y){
require ("../includes/dbconnection.php");
$sql = "select sum(amount) from account_entry where (ac_cat_id = 2 OR ac_cat_id = 7 OR ac_cat_id = 8 OR ac_cat_id = 9 OR ac_cat_id = 1 OR ac_cat_id = 10 OR ac_cat_id = 11) AND date = '$y'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$first = $row[0];
echo $first;
}
function re_d($y){
require ("../includes/dbconnection.php");
$sql = "select sum(amount) from account_entry where (ac_cat_id = 3 OR ac_cat_id = 4 OR ac_cat_id = 6) AND date = '$y'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$first = $row[0];
echo $first;
}
?>
<?php
$sy = date('Y-m-d');
$year = date('Y');
$month = date('m');
$month_n = date('F');
$pre_year = $year-1;
$pre_month_n = date('m', strtotime('-1 month'));
$date = new DateTime();
$date->modify("last day of previous month");
$pre_date = $date->format("Y-m-d");
$cun_date = date("Y-m-t", strtotime($sy));
?>
<?php
$page_title = 'Cash Book';
$page_subtitle = 'Cash Book Details';
$table_name = 'Cash Book';
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
                        <div class="col-lg-12">
                            <div class="main-card mb-3 card">
                                <div class="card-body"><h5 class="card-title"><?php echo $page_subtitle; ?> for <?php echo $month_n; ?>-<?php echo $year; ?></h5>
                                    <div class="table-responsive">
                                        <table class="align-middle mb-0 table table-striped table-hover">
								<thead>
								<tr>
								<th>
									 #
								</th>
								<th>
									 Date
								</th>
								<th>
									 See Details
								</th>
								<th>
									 Dr.
								</th>
								<th>
									 Cr.
								</th>
								<th>
									 Balance
								</th>
							</tr>
								</thead>
								<tbody>
								<tr bgcolor="">
								<td>--</td>
								<td>--</td>
								<td><strong>Opening Balance</strong></td>
								<td>--</td>
								<td>--</td>
								<td>
									 <strong><?php echo tot("$pre_date"); ?></strong>
								</td>
								</tr>
								<?php 
// sending query
$sql = "SELECT `account_entry`.*, `bank_account`.`bank_name`, `accounts_head`.`account_head_name`, `voucher`.`voucher_num` FROM `account_entry`,`bank_account`,`accounts_head`,`voucher` WHERE account_entry.bank_id=bank_account.bank_id and account_entry.account_head=accounts_head.account_head_id and account_entry.voucher_id=voucher.voucher_id GROUP BY date HAVING MONTH(date) = $month AND YEAR(date) = $year ORDER BY date, entry_id, voucher_id ASC";
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
			$en_voun = $row['voucher_num'];
			$en_des = $row['description'];
			$en_ven = $row['vendor_id'];
			$en_cat = $row['ac_cat_id'];
			$en_head = $row['account_head'];
			$en_bid = $row['bank_id'];
			$en_bname = $row['bank_name'];
			$en_head_name = $row['account_head_name'];
			$en_amu = $row['amount'];
?>
								<tr bgcolor="">
								<td>
									 <?php echo ++$counter; ?>
								</td>
								<td>
									 <?php $date1=date_create("$en_date"); echo date_format($date1,"d/m/Y"); ?>
								</td>
								<td>
									 <a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo $en_date; ?>">Click</a>
								</td>
								<td>
									 <?php echo re_d("$en_date"); ?>
								</td>
								<td>
									 <?php echo pa_d("$en_date"); ?>
								</td>
								<td>
									 <?php echo tot("$en_date"); ?>
								</td>
							</tr>
							<?php 	
		}
	}	
?>
								<tr bgcolor="">
								<td>--</td>
								<td>--</td>
								<td><strong>Closing Balance</strong></td>
								<td>--</td>
								<td>--</td>
								<td>
									 <strong><?php echo tot("$cun_date"); ?></strong>
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
                <form id="signupForm" class="col-md-10 mx-auto" method="post" action="cash-book-search">
				<input type="hidden" id="ptec" name="ptec"  value="<?php echo base64_encode($pT); ?>" />
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
    
    $.ajax({url:"entry-details-cash.php?famID="+famID,cache:false,success:function(result){
        $(".modal-content").html(result);
    }});
});
</script>