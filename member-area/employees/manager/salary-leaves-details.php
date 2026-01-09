<?
require ("../includes/dbconnection.php");
$famID=$_GET['famID'];
$famMonth=$_GET['famMonth'];
$famYear=$_GET['famYear'];
$famAmu=$_GET['famAmu'];
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
									<h4>Leaves for <?php echo $famMonth; ?>-<?php echo $famYear; ?></h4>
								<table class="table table-hover">
								<thead>
								<tr>
								<th>
									 Date
								</th>
								<th>
									 Status
								</th>
								<th>
									Deduction 
								</th>
								<?php 
// sending query
$result = mysql_query("SELECT * FROM teacher_attendance WHERE teacher_id = $famID AND YEAR(date) = $famYear AND MONTH(date) = $famMonth AND status = 2");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
If ($numberOfRows == 0) 
	{
	echo '<b class="green">No Leave Found in '.$famMonth.'-'.$famYear.'</b>';
	}
else if ($numberOfRows > 0) 
	{
	$i=0;
	while ($i<$numberOfRows)
		{		
			if(($i%2)==0) 
				{
					$bgcolor ='#FFFFFF';
				}
			else
				{
					$bgcolor ='#F7F7FF';
				}		
			$attendence_id = MYSQL_RESULT($result,$i,"attendence_id");
			$techa_id = MYSQL_RESULT($result,$i,"teacher_id");
			$a_date = MYSQL_RESULT($result,$i,"date");
			$a_time = MYSQL_RESULT($result,$i,"time_in");
			$a_status = MYSQL_RESULT($result,$i,"status");
?>
							</tr>
								</thead>
								<tbody>
								<tr bgcolor="<?php echo $bgcolor; ?>">
								<td>
									 <?php echo $a_date; ?>
								</td>
								<td>
									<?php if($a_status == 1){echo 'Present';} elseif($a_status == 2){echo 'Absent';} ?>
								</td>
								<td><?php echo $famAmu/30; ?></td>
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
