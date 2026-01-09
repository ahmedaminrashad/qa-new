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
class Logger {
    public static function log($message) {
        $date = date('Y-m-d',  strtotime('now +1 hour'));
        $datetime = date('Y-m-d H:i:s',  strtotime('now +1 hour'));
        $formattedMessage = "[$datetime] $message" . PHP_EOL;
        file_put_contents('logs/app'.$date.'.log', $formattedMessage, FILE_APPEND);
    }
}
