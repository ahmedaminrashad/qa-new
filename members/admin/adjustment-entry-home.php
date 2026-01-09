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
    $link = $_SERVER['REQUEST_URI'];
function dep_time($var)
{
require ("../includes/dbconnection.php");
// sending query
   $sql = "SELECT * FROM adjusment_account where entry_id = $var";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{ echo $numberOfRows; }
}
function dep_amu($var){
require ("../includes/dbconnection.php");
$sql = "select sum(ad_amount) from adjusment_account where entry_id = $var";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$second = $row[0];
echo number_format($second, 0);
}
function dep_res($var){
require ("../includes/dbconnection.php");
  $sql = "select sum(amount) from account_entry where entry_id = $var";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$first = $row[0];
$sql = "select sum(ad_amount) from adjusment_account where entry_id = $var";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$second = $row[0];
$total = $first-$second;
echo number_format($total, 0);
}
function dep_upto($var)
{
require ("../includes/dbconnection.php");
$sql = "SELECT * FROM adjusment_account where entry_id = $var";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
$sql = "SELECT MAX(date) AS max_date FROM adjusment_account where entry_id = $var";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$date1=date_create($row['max_date']); 
echo date_format($date1,"M d, Y");
}
}
?>
<?php
$page_title = 'Addjustment Entries';
$page_subtitle = 'Addjustment Entries Home Page';
$table_name = 'Addjustment Entries';
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
									 Transaction Date
								</th>
								<th>
									 Head
								</th>
								<th>
									 Description
								</th>
								<th>
									 Value
								</th>
								<th>
									 Adjustment
								</th>
								<th>
									 Residual
								</th>
								<th>
									Upto (x Times)
								</th>
								<th>
								</th>
								</tr>
								</thead>
								<tbody>
								<?php 
// sending query
$sql = "SELECT `account_entry`.*, `accounts_head`.`account_head_name`, `vendor`.`vendor_name` FROM `account_entry`,`accounts_head`, `vendor` WHERE account_entry.account_head=accounts_head.account_head_id and account_entry.vendor_id=vendor.vendor_id HAVING (ac_cat_id = 2 OR ac_cat_id = 5) AND status = 1 ORDER BY date DESC";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){	
	
			$en_id = $row['entry_id'];
			$vdate = $row['date'];
			$vdes = $row['description'];
			$vname = $row['vendor_name'];
			$vmod = $row['ac_cat_id'];
			$vamu = $row['amount'];
			$vhead = $row['account_head_name'];
			$en_head = $row['account_head'];
?>
								<tr bgcolor="<?php if ($vmod == 2) { echo '#FFF0A9'; } else { echo '#CFFDA8'; } ?>">
								<td>
									 <?php $date1=date_create("$vdate"); echo date_format($date1,"d/m/Y"); ?>
								</td>
								<td>
									 <?php echo $vhead; ?>
								</td>
								<td>
									 <?php echo $vdes; ?>
								</td>
								<td>
									 Rs. <?php echo number_format($vamu, 0); ?>
								</td>
								<td>
									<?php echo dep_amu("$en_id"); ?>
								</td>
								<td>
									<?php echo dep_res("$en_id"); ?>
								</td>
								<td>
									<a href="depreciation-details?en_id=<?php echo $en_id; ?>"><b><?php echo dep_upto("$en_id"); ?></b> (<?php echo dep_time("$en_id"); ?>)</a>
								</td>
								<td>
									<a href="add-adjustment-entry?en_id=<?php echo $en_id; ?>&en_head=<?php echo $en_head; ?>&ac_c_id=<?php echo $vmod; ?>&link=<?php echo $link; ?>"><button type="button" class="mb-2 mr-2 btn btn-info"><i class="fa fa-plus"></i></button></a>
								</td>
								<td>
									<a href="mark-cleared?ent_id=<?php echo $en_id; ?>"><button type="button" class="mb-2 mr-2 btn btn-danger"><i class="fa fa-ban"></i></button></a>
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
<!-- Large modal -->

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Search For Previous Month Class History</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="signupForm" class="col-md-10 mx-auto" method="post" action="add-schedule-one">
                                <div class="form-group">
                                    <label for="lastname">Month</label>
                                    <div>
                                        <select required class="form-control" name="month_id"  id="month_id">

																	<?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$sql = "SELECT * FROM month ORDER BY month_id ";			  	
				$result = mysqli_query($conn, $sql);
				while ($row = mysql_fetch_assoc($result)){  ?>
  <option value="<?php echo $row['num'];?>"><?php echo $row['month_name'];?> </option>
  <?php } ?>
</select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="lastname">Year</label>
                                    <div>
                                        <select required class="form-control" name="year_id"  id="year_id">
																<?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$sql = "SELECT * FROM school_yr ORDER BY year_id ";			  	
				$result = mysqli_query($conn, $sql);
				while ($row = mysql_fetch_assoc($result)){ ?>
  <option value="<?php echo $row['school_year'];?>"><?php echo $row['school_year'];?> </option>
  <?php } ?>
</select>
                                    </div>
                                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name ="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Large modal end  -->						
<script>
$('.notes').click(function(){
    var famID=$(this).attr('data-id');
    var famName=$(this).attr('data-name');
    var famValue=$(this).attr('data-value');

    $.ajax({url:"voucher-details.php?famID="+famID+"&famName="+famName+"&famValue="+famValue,cache:false,success:function(result){
        $(".modal-content").html(result);
    }});
});
</script>