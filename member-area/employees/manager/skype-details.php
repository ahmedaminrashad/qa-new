<?
require ("../includes/dbconnection.php");
$famID=$_GET['famID'];
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
									 Teacher Name
								</th>
								<th>
									 Skype
								</th>
								<th>
									 Password
								</th>
								</tr>
								</thead>
								<tbody>
								<?php 
// sending query
$result = mysql_query("SELECT * FROM profile WHERE teacher_id = $famID");
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
			$asky = MYSQL_RESULT($result,$i,"Skype");		
			$aspass = MYSQL_RESULT($result,$i,"s_pass");
			$atname = MYSQL_RESULT($result,$i,"teacher_name");
?>
								<tr bgcolor="<?php echo $bgcolor; ?>">
								<td>
									 <?php echo $atname; ?>
								</td>
								<td>
									 <?php echo $asky; ?>
								</td>
								<td>
									 <?php echo $aspass; ?>
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
