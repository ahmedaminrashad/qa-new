<?
require ("../includes/dbconnection.php");
$famID=$_GET['famID'];
$famName=$_GET['famName'];
?>
<div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add New CLass</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <ul>
						<?php 
// sending query
$sql = "SELECT `new_request_comments`.*, `profile`.`teacher_name` FROM `new_request_comments`,`profile` WHERE new_request_comments.teacher_id=profile.teacher_id HAVING request_id = $famID";
$counter = 0;
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){		
			$acom_id = $row['com_id'];
			$arid = $row['request_id'];
			$acom = $row['comment'];
			$adate = $row['date'];
			$aname = $row['teacher_name'];
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
																					 <?php echo $acom; ?> <b>(By: <?php echo $aname; ?>)</b>																			</div>
																			</div>
																		</div>
																	</div>
																</li>						<?php 			
		}
	}	
?>							</ul>
														</div>
														<div class="scroller" style="height:300px" data-always-visible="1" data-rail-visible1="1">
											</div>
										</div>
