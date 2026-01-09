<?php
require ("../includes/dbconnection.php");  
$time_start = date(" g:i:A", time(true));
?>
<?php
	// sending query
	$sql = "TRUNCATE TABLE payment";
	if ($conn->query($sql) === TRUE) {
echo '';
}
?>
<?php
$m =$_REQUEST['month'];
//$isd =$_REQUEST['issue'];
$dd =$_REQUEST['due'];
$y =$_REQUEST['year'];
$p =$_REQUEST['pid'];
$frs =$_REQUEST['fr'];
$link =$_REQUEST['link2'];
$date = date('d-m-Y', time());
	$sql = "INSERT INTO payment (parent_id, parent_name, email, username, userpass, telephone, mobile, skype, c_id, currency_id, mode_id, m_id, group_id, whats_email)
	SELECT parent_id, parent_name, email, username, userpass, telephone, mobile, skype, c_id, currency_id, mode_id, m_id, group_id, whats_email
	FROM account WHERE parent_id = $p";  	
if ($conn->query($sql) === TRUE) {
echo '';
}
$sql = "UPDATE payment SET issue = '$date', due = '$dd', submit = '00-00-0000', mon_id = '$m', y_id = '$y', fee = '$frs'";
if ($conn->query($sql) === TRUE) {
echo "<script>window.open('confirm-monthly-invoice-ins?due=".$dd."&month=".$m."&year=".$y."&pidp=".$p."&link=".$link."','_self')</script>";
}
?>