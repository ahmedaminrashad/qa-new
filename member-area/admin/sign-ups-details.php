<?
require ("../includes/dbconnection.php");
$famID=$_GET['famID'];
$famName=$_GET['famName'];
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
									 Name
								</th>
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
								</tr>
								</thead>
								<tbody>
								<?php 
// sending query
$result = mysql_query("SELECT * FROM new_request Where MONTH(date) = $famID AND YEAR(date) = $famName");
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
			$from_id = MYSQL_RESULT($result,$i,"time_from");
			$to_id = MYSQL_RESULT($result,$i,"time_to");
			?>
								<tr bgcolor="<?php echo $bgcolor; ?>">
								<td>
									 <?php echo $aname; ?>
								</td>
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
							</tr>
						<?php 	
		$i++;		
		}
	}	
?>
</tbody>
								</table>
								</div>
								</span>
								</div>
							</div>
						</div>
										</div></div>
