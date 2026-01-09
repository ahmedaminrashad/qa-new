<?
require ("../includes/dbconnection.php");
$famID=$_GET['famID'];
$famMonth=$_GET['famMonth'];
$famYear=$_GET['famYear'];
$famType=$_GET['famType'];
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
									<h4><?php echo $famName; ?><br>From: <?php echo $famMonth; ?> To: <?php echo $famYear; ?></h4>
								<table class="table table-hover">
								<thead>
								<tr>
								<th>
									 Date
								</th>
								<th>
									 Amount
								</th>
								<th>
									 Nature
								</th>
								<th>
									 Description
								</th>
								<?php 
// sending query
$result = mysql_query("SELECT * FROM teacher_fine WHERE teacher_id = $famID AND date >= '$famMonth' AND date <= '$famYear' AND type = '$famType'");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
If ($numberOfRows == 0) 
	{
	echo 'No '.$famName.' found!';
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
			$fine_id = MYSQL_RESULT($result,$i,"fine_id");
			$techf_id = MYSQL_RESULT($result,$i,"teacher_id");
			$f_date = MYSQL_RESULT($result,$i,"date");
			$f_amount = MYSQL_RESULT($result,$i,"amount");
			$f_des = MYSQL_RESULT($result,$i,"des");
			$f_type = MYSQL_RESULT($result,$i,"type");
?>
							</tr>
								</thead>
								<tbody>
								<tr bgcolor="<?php echo $bgcolor; ?>">
								<td>
									 <?php echo $f_date; ?>
								</td>
								<td>
									<?php echo $f_amount; ?>
								</td>
								<td>
									<?php if($f_type == 1){echo 'Fine';} elseif($f_type == 2){echo 'Bouns';} elseif($f_type == 3){echo 'Advance';} elseif($f_type == 4){echo 'Returns';} elseif($f_type == 5){echo 'Reduction';} elseif($f_type == 6){echo 'Gift';} elseif($f_type == 7){echo 'Other Additions';} elseif($f_type == 8){echo 'Other Deductions';} ?>
								</td>
								<td>
									<?php echo $f_des; ?>
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
