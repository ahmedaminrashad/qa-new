<?php session_start(); ?>
<?php
include("../includes/session1.php");
require ("../includes/dbconnection.php");
$sy11 = date('Y-m-d');
$rid =$_REQUEST['py_id'];
$amu =$_REQUEST['amu'];
$note =$_REQUEST['note'];
			$sql = "UPDATE invoice SET invoice_add = '$amu', add_note = '$note' where py_id = '$rid'";
if ($conn->query($sql) === TRUE) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        echo 'error';
    }
?>
