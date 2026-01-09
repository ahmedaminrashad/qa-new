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
    function vamu($var){
    require ("../includes/dbconnection.php");
  $sql = "select sum(amount) from account_entry where voucher_id = $var";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
if($row[0] > 0) 
        {
            echo $row[0];
        }
    else
        {
            echo '--';
        }
}
function ent($var)
{
require ("../includes/dbconnection.php");
// sending query
$sql = "SELECT * FROM account_entry where voucher_id = $var";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{ echo $numberOfRows; }
			}
?>
<?php
$sy = date('Y-m-d');
$year = date('Y');
$month = date('m');
$month_n = date('F');
?>
<?php
$page_title = 'Accounts';
$page_subtitle = 'Accounts';
$table_name = 'Accountsg';
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
                                <div>List of Vouchers
                                    <div class="page-title-subheading">List of Vouchers for <?php echo $month_n; ?>-<?php echo $year; ?>
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
                                <div class="card-body"><h5 class="card-title">List of Vouchers for <?php echo $month_n; ?>-<?php echo $year; ?></h5>
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
									 Voucher Number
								</th>
								<th>
									 Cheque Number
								</th>
								<th>
									 Amount
								</th>
								<th>
									 &nbsp;
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
$sy = date('Y-m-d');
$year = date('Y');
$month = date('m');
$month_n = date('F');
$sql = "SELECT `voucher`.*, `bank_account`.`bank_name` FROM `voucher`,`bank_account` WHERE voucher.bank_id=bank_account.bank_id HAVING MONTH(date) = $month and YEAR(date) = $year ORDER BY date";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){		
			$vou_id = $row['voucher_id'];
			$vou_num = $row['voucher_num'];
			$che_num = $row['cheque_num'];
			$voudate = $row['date'];
			$voutype = $row['type_id'];
			$voubankid = $row['bank_id'];
			$voubank = $row['bank_name'];
?>
								<tr bgcolor="<?php if ($voutype == 1){ echo '#D9FFCB';} else {echo '#FFD6D6';} ?>">
								<td>
									 <?php echo ++$counter; ?>
								</td>
								<td>
									 <?php $date1=date_create("$voudate"); echo date_format($date1,"d/m/Y"); ?>
								</td>
								<td>
									 <?php echo $vou_num; ?><?php echo $vou_id; ?>
								</td>
								<td>
									 <?php echo $che_num; ?>
								</td>
								<td>
									 <a class="notes" href="#notes-d" data-toggle="modal" data-target="#notes-d" data-id="<?php echo $vou_id; ?>" data-name="<?php echo $vou_num; ?>" data-value="<?php echo vamu($vou_id); ?>"><button type="button" class="btn green btn-xs"><?php echo vamu($vou_id); ?> (<?php echo ent($vou_id); ?>)</button></a>
								</td>
								<td>
									<span class="label label-sm label-info"><?php echo $voubank; ?></span>
								</td>
								<td>
									 <?php if ($voutype == 1){ echo '<span class="label label-sm label-success">Receipt</span>';} else {echo '<span class="label label-sm label-danger">Payment</span>';} ?>
								</td>
								<td><a href="add-account-entry?vou_id=<?php echo $vou_id; ?>&vou_n=<?php echo $vou_num; ?><?php echo $vou_id; ?>&vou_bank=<?php echo $voubankid; ?>&vou_bankna=<?php echo $voubank; ?>&vou_date=<?php echo $voudate; ?>"><button type="button" class="btn blue btn-xs"><i class="fa fa-plus"></i></button></a> <a href="edit-voucher?pT=<?php echo base64_encode($vou_id); ?>"><button type="button" class="btn yellow btn-xs"><i class="fa fa-edit"></i></button></a> <a href="delete-voucher?cid=<?php echo $vou_id; ?>"><button type="button" class="btn red btn-xs" title="Delete Voucher"><i class="fa fa-close"></i></button></a></td>
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
                <form id="signupForm" class="col-md-10 mx-auto" method="post" action="list-of-voucher-search">
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
    var famName=$(this).attr('data-name');
    var famValue=$(this).attr('data-value');

    $.ajax({url:"voucher-details.php?famID="+famID+"&famName="+famName+"&famValue="+famValue,cache:false,success:function(result){
        $(".modal-content").html(result);
    }});
});
</script>