<?php
  require ("../includes/dbconnection.php");
  include("../includes/main-var.php");
  include("header.php");
  $tt = $_SESSION['is']['parent_id'];
date_default_timezone_set($TimeZoneCustome);
$time_start = date('Y-m-d H:i:s');
$history =$_GET['famID'];
$teacher =$_GET['famAmu'];
?>
<div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Message From <?php echo $site_nameC; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <?php
						$sql = "SELECT * FROM `class_history` WHERE history_id = '$history'";

$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){
				// $this_course_ID = MYSQL_RESULT($result,$i,"course_id");
			$fff = $row['monitor_id'];
					if ($fff == 1)
					{
					echo 'Teacher is not in the class room. 
					If this is your class time, please wait one or two minutes and click on Take Class button again. May be teacher is preparing class room for you.
					<br><br><b>Note: If you have waited for more then 5 minutes, please contact Admin HelpDesk via your whatsApp group.</b>';
					}
					elseif ($fff == 2 OR $fff == 3)
					{
					$sql = "UPDATE class_history SET monitor_id = '3', start_time = '$time_start', end_time = '$time_start' WHERE history_id = '$history'";
					if ($conn->query($sql) === TRUE) {
					echo 'Teacher is in the class waiting for you. Please click to join the class room.<br><br>
					<a target="_blank" href="classroom?tid='.base64_encode($teacher).'&time='.time().'"><button class="mb-2 mr-2 btn btn-outline-success">Join Class Now</button></a>';
					}
					}
					else {
					header("Location: https://www.".$site_nameS."/member-area/accounts/parents-home");
					}
					}
				}
						?>
                                </div>
            <div class="modal-footer">
                <button type="submit" value="Refresh Page" name ="submit" class="btn btn-primary" onClick="window.location.reload()">Close</button>
            </div>