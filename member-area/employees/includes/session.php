<?php
date_default_timezone_set("Africa/Cairo");
error_reporting();
if (empty($_SESSION['is']['username'])) {
require('logout.php');
exit;
}
$user =  $_SESSION['is']['username'];
if (!$user) { 
require('logout.php');
exit;
}
?>