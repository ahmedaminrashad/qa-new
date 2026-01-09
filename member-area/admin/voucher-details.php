<?
require ("../includes/dbconnection.php");
$famID=$_GET['famID'];
$famName=$_GET['famName'];
$famValue=$_GET['famValue'];
?>
<div class="portlet-body">
<div class="timeline">
						<div class="timeline-item">
							<div class="timeline-body">
								<div class="timeline-body-arrow">
								</div>
								<div class="timeline-body-head">
								<div class="timeline-body-content">
									<span class="font-grey-cascade">
									<div id="mytable" class="table-responsive">
								<table class="table table-hover">
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
$result = mysql_query("SELECT `account_entry`.*, `accounts_head`.`account_head_name`, `vendor`.`vendor_name` FROM `account_entry`,`accounts_head`, `vendor` WHERE account_entry.account_head=accounts_head.account_head_id and account_entry.vendor_id=vendor.vendor_id HAVING voucher_id = $famID");
	if (!$result) 
	{
    die("There is an issue in data");
	}
$numberOfRows = MYSQL_NUMROWS($result);
If ($numberOfRows == 0) 
	{
	echo 'No Entry Found';
	}
else if ($numberOfRows > 0) 
	{
	$i=0;
	while ($i<$numberOfRows)
		{		
			$vid = MYSQL_RESULT($result,$i,"entry_id");
			$vdate = MYSQL_RESULT($result,$i,"date");
			$vdes = MYSQL_RESULT($result,$i,"description");
			$vname = MYSQL_RESULT($result,$i,"vendor_name");
			$vmod = MYSQL_RESULT($result,$i,"ac_cat_id");
			$vamu = MYSQL_RESULT($result,$i,"amount");
			$vhead = MYSQL_RESULT($result,$i,"account_head_name");
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
								<td>
									 <a href="delete-entry?cid=<?php echo $vid; ?>"><button type="button" class="btn red btn-xs" title="Delete Entry"><i class="fa fa-close"></i></button></a>
								</td>
							</tr>
						<?php 	
		$i++;		
		}
	}	
?>
<tr bgcolor="<?php echo $bgcolor; ?>">
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
								</span>
								</div>
							</div>
						</div>
										</div></div>
