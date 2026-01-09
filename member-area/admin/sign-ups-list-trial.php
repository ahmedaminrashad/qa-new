<?
require ("../includes/dbconnection.php");
$Date1=$_GET['Date1'];
$Date2=$_GET['Date2'];
$status=$_GET['name'];
echo 'From: '.$Date1.' To: '.$Date2.'';
function csr($var){
$result = mysql_query("SELECT * FROM profile Where teacher_id = $var");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$tnumberOfRows = MYSQL_NUMROWS($result);
If ($tnumberOfRows == 0){
			echo 'Admin';
			}
		else if ($tnumberOfRows > 0) 
			{
			$i=0;
			while ($i<$tnumberOfRows)
				{			
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"teacher_id");
	
			  		echo $hidden_pt;
	$i++;	 
			}
			}
}
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
									 #
								</th>
								<th>
									 Name
								</th>
								<th>
									 Email
								</th>
								<th>
									 Account
								</th>
								<th>
									 Assigned
								</th>
								<th>
									 Status
								</th>
								</tr>
								</thead>
								<tbody>
								<?php 
// sending query
$result = mysql_query("SELECT `account`.*, `currency`.`currency_name` FROM `account`,`currency` WHERE account.currency_id=currency.currency_id HAVING ".$status." >= '$Date1' AND ".$status." <= '$Date2'");
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
			$pid = MYSQL_RESULT($result,$i,"parent_id");
			$pname = MYSQL_RESULT($result,$i,"parent_name");
			$pemail = MYSQL_RESULT($result,$i,"email");
			$pt = MYSQL_RESULT($result,$i,"telephone");
			$ps = MYSQL_RESULT($result,$i,"skype");
			$MID = MYSQL_RESULT($result,$i,"m_id");
			$CSRID = MYSQL_RESULT($result,$i,"csr_id");
			$stu = MYSQL_RESULT($result,$i,"active");
			?>
								<tr bgcolor="<?php echo $bgcolor; ?>">
								<td>
									 <?php echo ++$counter; ?>
								</td>
								<td>
									 <?php echo $pname; ?>
								</td>
								<td>
									 <a href="parent-accounts-profile?parent_id=<?php echo base64_encode($pid); ?>" target="_blank"><?php echo $pemail; ?></a>
								</td>
								<td>
									 <?php echo csr("$CSRID"); ?>
								</td>
								<td>
									 <?php echo csr("$MID"); ?>
								</td>
								<td>
									 <?php if ($stu == 11){ echo '<span class="label label-warning"><strong>On Trial</strong></span>'; }
									 elseif($stu == 7){ echo '<span class="label label-info"><strong>On Leave</strong></span>'; }
									 elseif($stu == 3){ echo '<span class="label label-danger"><strong>Deactived</strong></span>'; }
									 elseif($stu == 17){ echo '<span class="label label-danger"><strong>Suspended</strong></span>'; }
									 else { echo '<span class="label label-success"><strong>Regular</strong></span>'; }
									 ?>
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
