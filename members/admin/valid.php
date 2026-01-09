<?php
if (session_status() !== PHP_SESSION_ACTIVE) session_start();
require("../includes/dbconnection.php");
$time_start = date(" g:i:A", time(true));
if ($_SESSION['is']['admin']) {
    $pid = $_REQUEST['parent_id'];
    $sql = "UPDATE class_history SET monitor_id = '1' WHERE history_id = '$pid'";
}

if ($conn->query($sql) === TRUE) {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
?>