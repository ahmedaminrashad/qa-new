<?php
  require ("../includes/dbconnection.php");
$date = date('d/m/Y', time());
$month =$_REQUEST['month'];
$year =$_REQUEST['year'];
$mid =$_REQUEST['mid'];
$yid =$_REQUEST['yid'];
$cid =$_REQUEST['cid'];
$cidS =$_REQUEST['cids']; 
  $sql = "SELECT * FROM settings_note";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){			
					$id = $row['id'];
					$status = $row['invoice_reminders'];
					if ($status == 'Account-Profile-Status'){
					header("Location: monthly-invoice-reminder?mid=".$mid."&yid=".$yid."&month=".$month."&year=".$year."&cid=".$cid."&cids=".$cidS."");
					}
					elseif ($status == 'WhatsApp'){
					header("Location: monthly-invoice-reminder-whatsapp?mid=".$mid."&yid=".$yid."&month=".$month."&year=".$year."&cid=".$cid."&cids=".$cidS."");
					}
					elseif ($status == 'Email'){
					header("Location: monthly-invoice-reminder-email?mid=".$mid."&yid=".$yid."&month=".$month."&year=".$year."&cid=".$cid."&cids=".$cidS."");
					}
			}
			} 
?>