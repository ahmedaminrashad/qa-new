<?php
require ("../includes/dbconnection.php");  
$time_start = date(" g:i:A", time(true));
?>
<?php
	// sending query
	$sql = "TRUNCATE TABLE payment";
?>
<?php
$m =$_REQUEST['month'];
$isd =$_REQUEST['issue'];
$dd =$_REQUEST['due'];
$y =$_REQUEST['year'];
$date = date('d-m-Y', time());
	$sql = "INSERT INTO payment (parent_id, parent_name, fee, email, username, userpass, telephone, mobile, skype, c_id, currency_id, mode_id, m_id, group_id)
	SELECT parent_id, parent_name, fee, email, username, userpass, telephone, mobile, skype, c_id, currency_id, mode_id, m_id, group_id
	FROM account WHERE active = 1 AND payment_cycle = 15 AND invoice_type = 1";  
	if ($conn->query($sql) === TRUE) {
	$sql = "UPDATE payment SET issue = '$date', due = '$dd', submit = '00-00-0000', mon_id = '$m', y_id = '$y'";
	$sql = "delete from payment where exists (select 1 from invoice where payment.parent_id = invoice.parent_id and payment.mon_id = invoice.mon_id and payment.y_id = invoice.y_id)";
	if ($conn->query($sql) === TRUE) {
echo '';
}
header("Location: confirm-monthly-invoice?due=$dd&month=$m&year=$y");
}
?>