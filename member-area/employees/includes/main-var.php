<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ini_set('log_errors', 1);

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

require("../includes/dbconnection.php");
require_once("../includes/mysql-compat.php");

// Check database connection
if (!isset($conn) || !$conn) {
    die("Database connection failed. Please contact the administrator.");
}
$name = 'Qarabic Institute';
$title = 'Qarabic | Online Learning Portal';
$site_nameC = 'qarabic.com';
$site_nameS = 'qarabic.com';
$site = 'https://www.qarabic.com';
$paypal_email = 'Ruwayda.Elsayed@gmail.com';//'mohamedramadan.ebay@gmail.com';
$CO_number = '250206830546';
//$CO_number = '250130361281';
$email1 = 'info@qarabic.com';
$email2 = 'accounts@qarabic.com';
$email3 = '';
$social1 = '<a href="https://www.facebook.com/qarabicacademy" data-original-title="facebook" class="facebook"></a>';
$social2 = '<a href="https://twitter.com/qarabicacademy" data-original-title="twitter" class="twitter"></a>';
$social3 = '<a href="https://www.youtube.com/channel/UCN95F_XKKYAbQMcpdMJdO5Q?view_as=subscriber" data-original-title="youtube" class="youtube"></a>';
$social4 = '<a href="https://www.instagram.com/qarabicacademy/" data-original-title="instagram" class="instagram"></a>';
$about = 'qarabic is a humble effort to build online tuition community.';
// $phone1 = 'USA: +1 209-210-2070<br>';
// $phone2 = 'UK: +44 333-303-4823<br>';
$phone1 = 'USA: +1 (309) 377-5300<br>';
$phone2 = 'UK: +44-02070974858<br>';
$phone3 = '';
$bottom_line = ''.date("Y").' &copy; Developed by qarabic. <a href="https://www.qarabic.com/" title="software development" target="_blank">Visit Us</a>';
$blog_url = 'https://qarabic.com/blog';
$contact_url = 'https://qarabic.com/registration/';
$index_bottom_line = '&copy; '.date("Y").' <a href="#" title="software development" target="_blank">Software developed</a> by <a href="#" title="software development" target="_blank">qarabic.Com';
$skype_zoom = 'Skype: qarabic';
$TimeZoneCustome = 'Africa/Cairo';
?>