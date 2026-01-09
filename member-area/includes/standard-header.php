<?php
/**
 * Standard Header for All Pages
 * Include this at the very top of PHP files to fix blank page issues
 * Usage: require_once(__DIR__ . '/../includes/standard-header.php');
 */

// Enable error reporting
if (!defined('ERROR_REPORTING_SET')) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    ini_set('log_errors', 1);
    define('ERROR_REPORTING_SET', true);
}

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Load database connection
if (!defined('DBCONNECTION_LOADED')) {
    $db_paths = [
        __DIR__ . '/dbconnection.php',
        dirname(__DIR__) . '/includes/dbconnection.php',
    ];
    
    foreach ($db_paths as $path) {
        if (file_exists($path)) {
            require_once($path);
            define('DBCONNECTION_LOADED', true);
            break;
        }
    }
    
    if (!defined('DBCONNECTION_LOADED')) {
        trigger_error("Database connection file not found", E_USER_ERROR);
    }
}

// Load mysql compatibility layer
if (!defined('MYSQL_COMPAT_LOADED')) {
    $compat_paths = [
        __DIR__ . '/mysql-compat.php',
        dirname(__DIR__) . '/includes/mysql-compat.php',
    ];
    
    foreach ($compat_paths as $path) {
        if (file_exists($path)) {
            require_once($path);
            define('MYSQL_COMPAT_LOADED', true);
            break;
        }
    }
}

?>

