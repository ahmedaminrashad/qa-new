<?php
/**
 * Universal Page Initialization
 * Add this ONE line to any PHP file: require_once(__DIR__ . '/../includes/page-init.php');
 * Adjust the path based on your file's location
 */

// Prevent multiple includes
if (defined('PAGE_INIT_LOADED')) {
    return;
}
define('PAGE_INIT_LOADED', true);

// Enable error reporting (change to 0 in production)
$DEBUG_MODE = 1;
if ($DEBUG_MODE) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}
ini_set('log_errors', 1);

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Load database connection
$baseDir = dirname(__FILE__);
$dbPaths = [
    $baseDir . '/dbconnection.php',
    dirname($baseDir) . '/includes/dbconnection.php',
];

$dbLoaded = false;
foreach ($dbPaths as $path) {
    if (file_exists($path)) {
        require_once($path);
        $dbLoaded = true;
        break;
    }
}

if (!$dbLoaded) {
    trigger_error("Database connection file not found", E_USER_ERROR);
}

// Load mysql compatibility layer
$compatPaths = [
    $baseDir . '/mysql-compat.php',
    dirname($baseDir) . '/includes/mysql-compat.php',
];

$compatLoaded = false;
foreach ($compatPaths as $path) {
    if (file_exists($path)) {
        require_once($path);
        $compatLoaded = true;
        break;
    }
}

// Verify database connection
if (!isset($conn) || !($conn instanceof mysqli)) {
    if ($DEBUG_MODE) {
        die("Database connection not available. Check your database configuration.");
    } else {
        die("Service temporarily unavailable. Please contact administrator.");
    }
}

?>

