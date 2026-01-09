<?php session_start(); ?>
<?php
  require ("../includes/dbconnection.php");
?>
<?php

$sy = date('Y-m-d');
$sy1 = date('d-m-Y');
?>
<?php 
// sending query
$vid = $_POST['vid'];
$vbi = $_POST['vbi'];
$date = $_POST['date'];
$checkbox = $_POST['checkbox'];
$checkbox_a = $_POST['amu'];
$checkbox_n = $_POST['name'];
$checkbox_t = $_POST['tax'];
$checkbox_c = $_POST['acc_cat'];
$checkbox_h = $_POST['acc_head'];
for($i=0;$i<count($checkbox);$i++){
$del_id = $checkbox[$i];
$del_ida = $checkbox_a[$i];
$del_idn = $checkbox_n[$i];
$del_idt = $checkbox_t[$i];
$ac_cat = $checkbox_c[$i];
$ac_head = $checkbox_h[$i];
$sql = "INSERT INTO account_entry(date, voucher_id, description, amount, vendor_id, ac_cat_id, account_head, bank_id, office_id, tax)
					VALUES('$date','$vid','Payment of $del_idn Salary FOM','$del_ida','1','$ac_cat','$ac_head','2','$vib','$del_idt')"; 					
 		if ($conn->query($sql) === TRUE) {
 		echo '';
			 	}
				}
				header(
			 	"Location: list-of-voucher");
				?>