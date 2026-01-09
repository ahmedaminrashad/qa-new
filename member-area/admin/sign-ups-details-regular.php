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
								</tr>
								</thead>
								<tbody>
								<?php 
// sending query
$result = mysql_query("SELECT * FROM account Where MONTH(regular_date) = $famID AND YEAR(regular_date) = $famName");
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
			?>
								<tr bgcolor="<?php echo $bgcolor; ?>">
								<td>
									 <?php echo $pname; ?>
								</td>
								<td>
									 <?php echo $pemail; ?>
								</td>
								<td>
									 <?php echo $pt; ?>
								</td>
								<td>
									 <?php echo $ps; ?>
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
