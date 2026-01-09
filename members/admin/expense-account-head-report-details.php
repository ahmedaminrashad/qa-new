<?php
require ("../includes/dbconnection.php");
$famID=$_GET['famID2'];
$famMonth=$_GET['famMonth'];
$famYear=$_GET['famYear'];
$famValue=$_GET['famValue'];
?>
<div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"></h5>
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
$sql = "SELECT `account_entry`.*, `accounts_head`.`account_head_name`, `vendor`.`vendor_name` FROM `account_entry`,`accounts_head`, `vendor` WHERE account_entry.account_head=accounts_head.account_head_id and account_entry.vendor_id=vendor.vendor_id HAVING MONTH(date) = $famMonth AND YEAR(date) = $famYear AND account_head = $famID";
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
?>
								<tr bgcolor="<?php echo $bgcolor; ?>">
								<td>
									 <?php echo $vdate; ?>
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
									 Rs. <?php echo $vamu; ?>
								</td>
							</tr>
						<?php 	
		}
	}	
?>
<tr bgcolor="<?php echo $bgcolor; ?>">
								<td colspan="4">
									Total
								</td>
								<td>
									 Rs. <?php echo $famValue; ?>
								</td>
							</tr>
</tbody>
								</table>
								</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>