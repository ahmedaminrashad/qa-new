<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ini_set('log_errors', 1);

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

require("../../../../../includes/dbconnection.php");
require_once("../../../../../includes/mysql-compat.php");

// Check database connection
if (!isset($conn) || !$conn) {
    die("Database connection failed. Please contact the administrator.");
}

if ( isset( $_POST['src'] ) && preg_match( '/scripts\/[a-zA-Z_\-_]+\.php/', $_POST['src'] ) !== 0 ) {
	echo htmlspecialchars( file_get_contents( '../server_side/'.$_POST['src'] ) );
}
else {
	echo '';
}


