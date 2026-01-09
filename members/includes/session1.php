<?php
date_default_timezone_set("Africa/Cairo");
if (empty($_SESSION['is']['username1'])) {
require('index.php');
exit;
}
$user =  $_SESSION['is']['username1'];
if (!$user) { 
require('index.php');
exit;
}
?>