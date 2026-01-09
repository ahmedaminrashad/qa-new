<?php
  require ("../includes/dbconnection.php");  
?>
<?php
	$pid =$_REQUEST['py_id'];
	$add_fee =$_REQUEST['fee'];
$sql = "SELECT * FROM invoice WHERE py_id = '$pid'";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){
		
			$apy_id = $row['py_id'];
			$aparent_id = $row['parent_id'];
			$aparent_name = $row['parent_name'];
			$aissue= $row['issue'];
			$adue= $row['due'];
			$asubmit= $row['submit'];
			$astatus= $row['status'];
			$amon_id= $row['mon_id'];
			$ay_id= $row['y_id'];
			$aemail= $row['email'];
			$ad = $row['d'];
			$aremind= $row['remind'];
			$atelephone= $row['telephone'];
			$amobile= $row['mobile'];
			$askype= $row['skype'];
			$ac_id= $row['c_id'];
			$am_id= $row['m_id'];
			$amode= $row['mode'];
			$apaid= $row['paid'];
			$acurrency_id= $row['currency_id'];
			$amode_id= $row['mode_id'];
			$afee= $row['fee'];
			$aextra = $row['extra'];
			$aduep= $row['duep'];
			$au_id= $row['u_id'];
			$ainvoice_add= $row['invoice_add'];
			$aorder_num= $row['order_num'];
			$aadd_note= $row['add_note'];
			$ac_rate= $row['c_rate'];
			$old_fee = $afee-$add_fee;
	}	
	}
	$sql = "INSERT INTO invoice (parent_id, parent_name, issue, due, submit, fee, status, mon_id, y_id, email, d, remind, telephone, mobile, skype, c_id, m_id, mode, paid, currency_id, mode_id, extra, duep, u_id, order_num, add_note, c_rate) 
			VALUES ('$aparent_id', '$aparent_name', '$aissue', '$adue', '$asubmit', '$add_fee', '$astatus', '$amon_id', '$ay_id', '$aemail', '$ad', '$aremind', '$atelephone', '$amobile', '$askype', '$ac_id', '$am_id', '$amode', '$apaid', '$acurrency_id', '$amode_id', '$aextra', '$aduep', '$au_id', '$aorder_num', '$aadd_note', '$ac_rate')"; 
	if ($conn->query($sql) === TRUE) {
	$sql = "UPDATE invoice SET fee = '$old_fee' WHERE py_id = '$pid'";
	if ($conn->query($sql) === TRUE) {
	echo '';}
	header('Location: ' . $_SERVER['HTTP_REFERER']);
	}
?>