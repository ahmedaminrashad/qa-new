<?php
date_default_timezone_set("Africa/Cairo");
if (empty($_SESSION['is']['username'])) {
require('index.php');
exit;
}
$user =  $_SESSION['is']['username'];
if (!$user) { 
require('index.php');
exit;
}
?>