
<?php
require('stripe-php-master/init.php');
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

$publishableKey = "pk_live_51OeDHcLfsI8f0qtFdVPPWWAuDfiqUQyvctW3HmZ4ad0k7mzZaovLtITsOYBIXppSWfrtFdeFSVOovc2sllZSEsLG00fceImcoO";
                 //"pk_live_51JS1AvC141HCB2vSJh2dYdLKJM2CcbB4uxYRupPhQM8NzRF7VGSNVlkuCm4HYPGm9bl2N9rLdTyDab71dWbNq2HT00jdL0nurB";
               //   "pk_test_51JS1AvC141HCB2vSh7oLp3Csy2pp0TkscBMIE34zDhwJxQLrKgYvTGYc0SDN8S5Z79oYo3iXP5SiRJDE896Qx7co001AVLB8Ms";

$secretKey = "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";
            //"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";
           //  "sk_test_51JS1AvC141HCB2vSIC54pnhE00OgeBYce2xcqySmTbJ9DVDv6y5heWz2LExHuRsKjmMEP9GJBLmHW1Pq0gfjCr9r00VUA94JNk";
$currency  = "usd";
$productId='prod_PmEnANS8He0NfG';
$email  = "qarabicpayroll@gmail.com";  //qarabicpayroll@gmail.com
//$amount  = "100";
$name = "ahmed amin"; //Rewida Eladawy
$description = "";//"mobile application developer";
$image = "https://qarabic.com/member-area/assets/admin/layout3/img/logo-default.png";
$header=[
    'Content-Type: application/x-www-form-urlencoded',
    "Authorization: Bearer {$secretKey}"
];
