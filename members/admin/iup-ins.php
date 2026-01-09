<?php
  require ("../includes/dbconnection.php");  
?>
<?php
$m =$_REQUEST['month'];
$dd =$_REQUEST['due'];
$y =$_REQUEST['year'];
$p =$_REQUEST['pid'];
$mn =$_REQUEST['mont'];
$yr =$_REQUEST['yeat'];
$link =$_REQUEST['link2'];
$sql = "SELECT * FROM invoice";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){			
			$parent_id = $row['parent_id'];
			$mon_id = $row['mon_id'];
			$y_id = $row['y_id'];
			if ($parent_id == $p && $mon_id == $mn && $y_id == $yr){
			   $sql = "SELECT `invoice`.*, `month`.`month_name`, `school_yr`.`school_year` FROM `invoice`,`month`,`school_yr` WHERE invoice.mon_id=month.month_id and invoice.y_id=school_yr.year_id having parent_id = '$parent_id'";
			 $result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){			
			$parent = $row['parent_name'];
			$mon = $row['month_name'];
			$y = $row['school_year'];
			}
			}
			echo "&nbsp;&nbsp;&nbsp;&nbsp;<font face = 'Verdana, Arial, Helvetica, sans-serif', color = '#FF0000' size='2'><i><b>* You have already send invoice for the month of $mon, $y to $parent.</b> <a href='".$link."'>Go Back</a></i></font><br><br> ";
			$conflict = true;
			end;
			}
			}
			}
if ($conflict != true){
	$sql = "INSERT INTO invoice(parent_id, parent_name, fee, issue, due, submit, status, mon_id, y_id, email, telephone, mobile, skype, c_id, currency_id, mode_id, m_id, group_id, whats_email)
	SELECT parent_id, parent_name, fee, issue, due, submit, status, mon_id, y_id, email, telephone, mobile, skype, c_id, currency_id, mode_id, m_id, group_id, whats_email
	FROM payment"; 
	if ($conn->query($sql) === TRUE) {
	$last_id = $conn->insert_id; 	
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
					$status = $row['monthly_ins'];
					if ($status == 'Account-Profile-Status'){
					header("Location: monthly-invoice-ins?due=".$dd."&month=".$m."&year=".$y."&mmm=".$mmm."&yyy=".$yyy."&payID=".$last_id."");
					}
					elseif ($status == 'WhatsApp'){
					header("Location: monthly-invoice-ins-whatsapp?due=".$dd."&month=".$m."&year=".$y."&mmm=".$mmm."&yyy=".$yyy."&payID=".$last_id."");
					}
					elseif ($status == 'Email'){
					header("Location: monthly-invoice-ins-email?due=".$dd."&month=".$m."&year=".$y."&mmm=".$mmm."&yyy=".$yyy."&payID=".$last_id."");
					}
			}
			}
	}
		}
?>