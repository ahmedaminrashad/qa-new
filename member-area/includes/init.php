<?php
/**
 * Master Initialization File
 * Include this at the top of PHP files for consistent error handling and mysql compatibility
 * Usage: require_once(__DIR__ . '/includes/init.php');
 * 
 * This file:
 * - Enables error reporting (can be disabled for production)
 * - Loads database connection
 * - Loads mysql compatibility layer
 * - Provides helper functions
 */

// Enable error reporting for development
// Set to 0 for production
$SHOW_ERRORS = 1; // Change to 0 in production

if ($SHOW_ERRORS) {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
} else {
    error_reporting(E_ALL);
    ini_set('display_errors', 0);
}
ini_set('log_errors', 1);

// Load database connection
if (file_exists(__DIR__ . '/dbconnection.php')) {
    require_once(__DIR__ . '/dbconnection.php');
} else {
    // Try relative path from includes directory
    $db_path = dirname(__DIR__) . '/includes/dbconnection.php';
    if (file_exists($db_path)) {
        require_once($db_path);
    } else {
        trigger_error("Database connection file not found", E_USER_ERROR);
    }
}

// Load mysql compatibility layer
if (file_exists(__DIR__ . '/mysql-compat.php')) {
    require_once(__DIR__ . '/mysql-compat.php');
} else {
    $compat_path = dirname(__DIR__) . '/includes/mysql-compat.php';
    if (file_exists($compat_path)) {
        require_once($compat_path);
    }
}

// Load helper functions
if (file_exists(__DIR__ . '/db-helpers.php')) {
    require_once(__DIR__ . '/db-helpers.php');
}

// Ensure session is started if not already
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

?>

