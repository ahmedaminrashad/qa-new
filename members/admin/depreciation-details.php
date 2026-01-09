<?php session_start(); ?>
  <?php
  include("../includes/session1.php");
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("../includes/notifications.php");
  include("header.php");
  $link = $_SERVER['REQUEST_URI'];
  $enid =$_REQUEST['en_id'];
  $sql = "SELECT `account_entry`.*, `accounts_head`.`account_head_name`, `vendor`.`vendor_name` FROM `account_entry`,`accounts_head`, `vendor` WHERE account_entry.account_head=accounts_head.account_head_id and account_entry.vendor_id=vendor.vendor_id HAVING entry_id = '$enid'";
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
	
		}
	}
function dep_amu($var1, $var2, $var3){
require ("../includes/dbconnection.php");
$sql = "select sum(ad_amount) from adjusment_account where entry_id = $var1 AND date <= '$var2'";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($q);
$second = $row[0];
$total = $var3-$second;
echo number_format($total, 2);
}
?>
<?php
date_default_timezone_set("Africa/Cairo");
$sy = date('Y-m-d');
?>
<?php
$page_title = 'Depriciation';
$page_subtitle = 'Depriciation';
$table_name = 'Depriciation';
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
								<thead>
								<tr>
								<th>
									 Purchase Date
								</th>
								<th>
									 Head
								</th>
								<th>
									 Vender
								</th>
								<th>
									 Depreciation
								</th>
								<th>
									 Value
								</th>
								<th></th>
								</tr>
								</thead>
								<tbody>
								<tr bgcolor="<?php echo $bgcolor; ?>">
								<td>
									 <?php $date1=date_create("$vdate"); echo date_format($date1,"d/m/Y"); ?>
								</td>
								<td>
									 <?php echo $vhead; ?>
								</td>
								<td>
									 <?php echo $vname; ?>
								</td>
								<td>
									 <?php echo $vdes; ?>
								</td>
								<td>
									 Rs. <?php echo number_format($vamu, 0); ?>
								</td>
								<td><a href="add-adjustment-entry?en_id=<?php echo $en_id; ?>&ac_c_id=<?php echo $vmod; ?>&link=<?php echo $link; ?>"><button type="button" class="btn blue btn-xs"><i class="fa fa-plus"></i></button></a></td>
							</tr>
</tbody>
								</table>
							</div>
							<div id="mytable" class="table-responsive">
								<table class="table table-hover">
								<thead>
								<tr>
								<th>
									 Date
								</th>
								<th>
									 Depreciation
								</th>
								<th>
									 Residual Value
								</th>
								</tr>
								</thead>
								<tbody>
								<?php 
// sending query
$sql = "SELECT * FROM adjusment_account where entry_id = $enid ORDER BY date DESC";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){		
			$a_id = $row['add_id'];
			$aen_id = $row['entry_id'];
			$aamu = $row['ad_amount'];
			$atype = $row['ac_cat_id'];
			$adate = $row['date'];
?>
								<tr bgcolor="<?php echo $bgcolor; ?>">
								<td>
									 As at <?php $date1=date_create("$adate"); echo date_format($date1,"d-m-Y"); ?>
								</td>
								<td>
									 <?php echo $aamu; ?>
								</td>
								<td>
									<?php echo dep_amu("$enid","$adate","$vamu"); ?>
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
<!-- Large modal start -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-throttle-debounce/1.1/jquery.ba-throttle-debounce.min.js"></script>
<div class="modal fade bd-example-modal-lg" id="allocation-c" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        
        </div>
    </div>
</div>
<!-- Large modal end  -->
<script>
$('.notes').click(function(){
    var famID=$(this).attr('data-id');
    var famName=$(this).attr('data-name');

    $.ajax({url:"note-details.php?famID="+famID+"&famName="+famName,cache:false,success:function(result){
        $(".modal-content").html(result);
    }});
});
$('.allocation').click(function(){
    var famID=$(this).attr('data-id');
    var famName=$(this).attr('data-name');

    $.ajax({url:"allocate-csr.php?famID="+famID+"&famName="+famName,cache:false,success:function(result){
        $(".modal-content").html(result);
    }});
});
</script>