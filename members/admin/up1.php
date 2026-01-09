<?php
require ("../includes/dbconnection.php");  
$time_start = date(" g:i:A", time(true));
?>
<?php
	// sending query
	$sql = "TRUNCATE TABLE payment";
?>
<?php
$m =$_POST['pdept'];
$dd =$_POST['due'];
$y =$_POST['pgender'];
$date = date('d-m-Y', time());
	$sql = "INSERT INTO payment (parent_id, parent_name, fee, email, username, userpass, telephone, mobile, skype, c_id, currency_id, mode_id, m_id, group_id, whats_email)
	SELECT parent_id, parent_name, fee, email, username, userpass, telephone, mobile, skype, c_id, currency_id, mode_id, m_id, group_id, whats_email
	FROM account WHERE active = 1 AND invoice_type = 1 AND subscription = 1";  
	if ($conn->query($sql) === TRUE) {
	$sql = "UPDATE payment SET issue = '$date', due = '$dd', submit = '00-00-0000', mon_id = '$m', y_id = '$y'";
	if ($conn->query($sql) === TRUE) {
echo '';
}
	$sql = "delete from payment where exists (select 1 from invoice where payment.parent_id = invoice.parent_id and payment.mon_id = invoice.mon_id and payment.y_id = invoice.y_id)";
	if ($conn->query($sql) === TRUE) {
echo '';
}
header("Location: confirm-monthly-invoice?due=".$dd."&month=".$m."&year=".$y."");
}
?>