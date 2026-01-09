<?php
  require ("../includes/dbconnection.php");  
?>
<?php
$m =$_REQUEST['month'];
$dd =$_REQUEST['due'];
$y =$_REQUEST['year'];
$yyy =$_REQUEST['yyy'];
$mmm =$_REQUEST['mmm'];
	$sql = "INSERT INTO invoice(parent_id, parent_name, fee, issue, due, submit, status, mon_id, y_id, email, telephone, mobile, skype, c_id, currency_id, mode_id, m_id, group_id, whats_email)
	SELECT parent_id, parent_name, fee, issue, due, submit, status, mon_id, y_id, email, telephone, mobile, skype, c_id, currency_id, mode_id, m_id, group_id, whats_email
	FROM payment";
	if ($conn->query($sql) === TRUE) {
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
					$status = $row['monthly_invoices'];
					if ($status == 'Account-Profile-Status'){
					header("Location: monthly-invoice-notice?due=".$dd."&month=".$m."&year=".$y."&mmm=".$mmm."&yyy=".$yyy."");
					}
					elseif ($status == 'WhatsApp'){
					header("Location: monthly-invoice-notice-whatsapp?due=".$dd."&month=".$m."&year=".$y."&mmm=".$mmm."&yyy=".$yyy."");
					}
					elseif ($status == 'Email'){
					header("Location: monthly-invoice-notice-email?due=".$dd."&month=".$m."&year=".$y."&mmm=".$mmm."&yyy=".$yyy."");
					}
			}
			}  	
	}
?>