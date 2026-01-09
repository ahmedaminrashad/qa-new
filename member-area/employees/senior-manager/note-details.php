<?
require ("../includes/dbconnection.php");
$famID=$_GET['famID'];
$famName=$_GET['famName'];
?>
<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title">Notes Details of <?php echo $famName; ?></h4>
										</div>
										<div class="modal-body">
							<div class="scroller" data-height="290px" data-always-visible="1" data-rail-visible1="1">
															<ul class="feeds">
						<?php 
// sending query
$result = mysql_query("SELECT * FROM new_request_comments WHERE request_id = $famID");
$counter = 0;
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);
If ($numberOfRows == 0) 
	{
	echo 'There is no pending request...';
	}
else if ($numberOfRows > 0) 
	{
	$i=0;
	while ($i<$numberOfRows)
		{		
			$acom_id = MYSQL_RESULT($result,$i,"com_id");
			$arid = MYSQL_RESULT($result,$i,"request_id");
			$acom = MYSQL_RESULT($result,$i,"comment");
			$adate = MYSQL_RESULT($result,$i,"date");
?>
						<li>
																	<div class="col1">
																		<div class="cont">
																			<div class="cont-col1">
																				<div class="label label-info">
																					<?php echo $adate; ?>
																				</div>
																			</div>
																			<div class="cont-col2">
																				<div class="desc">
																					 <?php echo $acom; ?>
																				</div>
																			</div>
																		</div>
																	</div>
																</li>						<?php 	
		$i++;		
		}
	}	
?>							</ul>
														</div>
														<div class="scroller" style="height:300px" data-always-visible="1" data-rail-visible1="1">
											</div>
										</div>
