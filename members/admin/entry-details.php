<?
require ("../includes/dbconnection.php");
$famID=$_GET['famID'];
$famValue=$_GET['famValue'];
$famMonth=$_GET['famMonth'];
$famYear=$_GET['famYear'];
$famnn=$_GET['famnn'];
$dateObj   = DateTime::createFromFormat('!m', $famMonth);
$month_n = $dateObj->format('F'); // March
?>
<div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">All Enteries under <?php echo $famnn; ?> for <?php echo $month_n; ?>-<?php echo $famYear; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                                        <table class="align-middle mb-0 table table-striped table-hover">
								<thead>
								<tr>
								<th>
									 Date
								</th>
								<th>
									 Head
								</th>
								<th>
									 Description
								</th>
								<th>
									 Vendor Name
								</th>
								<th>
									 Amount
								</th>
								</tr>
								</thead>
								<tbody>
								<?php 
// sending query
$sql = "SELECT `account_entry`.*, `accounts_head`.`account_head_name`, `vendor`.`vendor_name` FROM `account_entry`,`accounts_head`, `vendor` WHERE account_entry.account_head=accounts_head.account_head_id and account_entry.vendor_id=vendor.vendor_id HAVING MONTH(date) = $famMonth AND YEAR(date) = $famYear AND account_head = $famID ORDER BY date";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){		
			$vdate = $row['date'];
			$vdes = $row['description'];
			$vname = $row['vendor_name'];
			$vmod = $row['ac_cat_id'];
			$vamu = $row['amount'];
			$vhead = $row['account_head_name'];
			$en_head = $row['account_head'];
?>
								<tr bgcolor="<?php echo $bgcolor; ?>">
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
									 <?php echo $vname; ?>
								</td>
								<td>
									 <?php echo number_format($vamu, 0); ?>
								</td>
							</tr>
						<?php 	
		}
	}	
?>
<tr bgcolor="#E0DFDF">
								<td colspan="4">
									Total
								</td>
								<td>
									 <?php echo $famValue; ?>
								</td>
							</tr>
</tbody>
								</table>
								</div>
								</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>