<?
require ("../includes/dbconnection.php");
$famID=$_GET['famID'];
$famDis=$_GET['famDis'];
?>
<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title">Referals by: <?php echo $famDis; ?></h4>
										</div>
										<div class="modal-body">
							<?php 
// sending query
$result = mysql_query("SELECT * FROM new_request WHERE parent_id = '$famID' ORDER BY request_id DESC;");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
If ($numberOfRows == 0) 
	{
	echo '<div class="label label-info">No New Request Found!</div>';
	}
else if ($numberOfRows > 0) 
	{
	$i=0;
	while ($i<$numberOfRows)
		{		
			$arequest_id = MYSQL_RESULT($result,$i,"request_id");
			$aname = MYSQL_RESULT($result,$i,"name");
			$aemail = MYSQL_RESULT($result,$i,"email");
			$aphone = MYSQL_RESULT($result,$i,"phone");
			$askype = MYSQL_RESULT($result,$i,"skype");
			$acountry = MYSQL_RESULT($result,$i,"country");
			$acity = MYSQL_RESULT($result,$i,"city");
			$amessage = MYSQL_RESULT($result,$i,"message");
			$adate = MYSQL_RESULT($result,$i,"date");
			$atime = MYSQL_RESULT($result,$i,"time");
			$aupdate = MYSQL_RESULT($result,$i,"time_update");
			$asent = MYSQL_RESULT($result,$i,"sent");
			$acsr_id = MYSQL_RESULT($result,$i,"csr_id");
			$asite_id = MYSQL_RESULT($result,$i,"site_id");
			$ip_id = MYSQL_RESULT($result,$i,"ip_address");
			$parent_id = MYSQL_RESULT($result,$i,"parent_id");
			$parent_name = MYSQL_RESULT($result,$i,"parent_name");
?>
						<div class="timeline-item">
							<div class="timeline-body">
								<div class="timeline-body-arrow">
								</div>
								<div class="timeline-body-head">
									<div class="timeline-body-head-caption">
										<a href="javascript:;" class="timeline-body-title font-blue-madison"><?php echo $aname; ?></a>
										<span class="timeline-body-time font-grey-cascade"><?php echo $adate; ?> (<?php echo $atime; ?>) <?php if ($asite_id == 1){echo '<span class="label label-sm label-info" title="Islamicnet.com"> Islamicnet.com</span>';} elseif ($asite_id == 2){echo '<span class="label label-sm label-warning" title="Islamicnet.co.uk"> Islamicnet.co.uk</span>';} elseif ($asite_id == 3){echo '<span class="label label-sm label-danger" title="Islamicnet.com.au"> Islamicnet.com.au</span>';} elseif ($asite_id == 0){echo '<a href="parent-accounts-profile?parent_id='.base64_encode($parent_id).'"><span class="label label-sm label-danger" title="Refferal">Reffered by: '.$parent_name.'</span></a>';} ?></span>
									</div>
								</div>
								<div class="timeline-body-content">
									<span class="font-grey-cascade">
									<div id="mytable" class="table-responsive">
								<table class="table table-hover">
								<thead>
								<tr>
								<th>
									 Email
								</th>
								<th>
									 Phone
								</th>
								<th>
									 Skype
								</th>
								<th>
									 Country
								</th>
								<th>
									 City
								</th>
								</tr>
								</thead>
								<tbody>
								<tr bgcolor="<?php echo $bgcolor; ?>">
								<td>
									 <?php echo $aemail; ?>
								</td>
								<td>
									 <?php echo $aphone; ?>
								</td>
								<td>
									 <?php echo $askype; ?>
								</td>
								<td>
									 <?php echo $acountry; ?>
								</td>
								<td>
										<?php echo $acity; ?>
								</td>
							</tr>
							<tr>
								<td>
								<strong>Message:</strong>
								</td>
								<td colspan="4">
									<?php echo $amessage; ?>
								</td>
							</tr>
							<tr>
								<td>
								<strong>IP Address:</strong>
								</td>
								<td colspan="4">
									<?php echo $ip_id; ?>
								</td>
							</tr>
							</tbody>
								</table>
								</div>
								</span>
								</div>
							</div>
						</div>
						<?php 	
		$i++;		
		}
	}	
?>
														<div class="scroller" style="height:300px" data-always-visible="1" data-rail-visible1="1">
											</div>
										</div>
