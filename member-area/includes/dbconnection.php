<?php
/**
 * Database Connection Configuration
 * Refactored to use mysqli instead of deprecated mysql_* functions
 */

// Declare $conn as global at the top level
global $conn;

// Define $TimeZoneCustome before guard check so it's always available
if (!isset($GLOBALS['TimeZoneCustome'])) {
    $GLOBALS['TimeZoneCustome'] = 'Africa/Cairo';
    $TimeZoneCustome = 'Africa/Cairo';
}

// Prevent multiple includes
if (defined('DBCONNECTION_LOADED')) {
    // Connection already loaded, ensure $conn is accessible via $GLOBALS
    if (isset($GLOBALS['conn']) && ($GLOBALS['conn'] instanceof mysqli)) {
        // Make sure $conn is available in this scope
        $conn = $GLOBALS['conn'];
    }
    // Ensure TimeZoneCustome is available in this scope
    if (isset($GLOBALS['TimeZoneCustome'])) {
        $TimeZoneCustome = $GLOBALS['TimeZoneCustome'];
    }
    return;
}
define('DBCONNECTION_LOADED', true);

// Error reporting - enable for development, disable for production
error_reporting(E_ALL);
ini_set('display_errors', 1);  // Changed to 1 to show errors during debugging
ini_set('display_startup_errors', 1);
ini_set('log_errors', 1);

date_default_timezone_set("Africa/Cairo");

// Database configuration
$username_db = 'root';
$userpass_db = '';
$name_db = 'quraan-laravel';
$server_db = 'localhost';
$TimeZoneCustome = 'Africa/Cairo';
// Store in GLOBALS for consistency
$GLOBALS['TimeZoneCustome'] = $TimeZoneCustome;

// Check if mysqli extension is loaded
if (!extension_loaded('mysqli')) {
    error_log("mysqli extension is not loaded");
    die("Database extension not available. Please contact administrator.");
}

// Create mysqli connection (only if not already created)
// $conn is already declared as global above
if (!isset($GLOBALS['conn']) || !($GLOBALS['conn'] instanceof mysqli)) {
    try {
        $conn = new mysqli($server_db, $username_db, $userpass_db, $name_db);
        
        // Store in $GLOBALS to ensure it's accessible everywhere
        $GLOBALS['conn'] = $conn;
        
        // Check connection
        if ($conn->connect_error) {
            error_log("Database connection failed: " . $conn->connect_error);
            // In development, show the error; in production, show generic message
            if (ini_get('display_errors')) {
                die("Database connection failed: " . $conn->connect_error);
            } else {
                die("Connection failed. Please contact the administrator. test". $conn->connect_error);
            }
        }
        
        // Set charset to utf8 to prevent encoding issues
        $conn->set_charset("utf8");
    } catch (Exception $e) {
        error_log("Database connection exception: " . $e->getMessage());
        if (ini_get('display_errors')) {
            die("Database connection error: " . $e->getMessage());
        } else {
            die("Connection failed. Please contact the administrator. test  ");
        }
    }
}

/**
 * Helper function to execute prepared statements
 * 
 * @param string $query SQL query with placeholders
 * @param array $params Parameters to bind
 * @param string $types Parameter types (i=integer, d=double, s=string, b=blob)
 * @return mysqli_result|bool Query result or false on failure
 */
if (!function_exists('db_query')) {
function db_query($query, $params = [], $types = '') {
    global $conn;
    
    $stmt = $conn->prepare($query);
    if (!$stmt) {
        error_log("Prepare failed: " . $conn->error);
        return false;
    }
    
    if (!empty($params)) {
        if (empty($types)) {
            // Auto-detect types if not provided
            $types = str_repeat('s', count($params));
        }
        $stmt->bind_param($types, ...$params);
    }
    
    $result = $stmt->execute();
    if (!$result) {
        error_log("Execute failed: " . $stmt->error);
        $stmt->close();
        return false;
    }
    
    $result = $stmt->get_result();
    $stmt->close();
    
    return $result;
}
}

/**
 * Helper function to fetch a single row
 * 
 * @param string $query SQL query with placeholders
 * @param array $params Parameters to bind
 * @param string $types Parameter types
 * @return array|null Associative array or null if no result
 */
if (!function_exists('db_fetch_one')) {
function db_fetch_one($query, $params = [], $types = '') {
    $result = db_query($query, $params, $types);
    if ($result) {
        return $result->fetch_assoc();
    }
    return null;
}
}

/**
 * Helper function to fetch all rows
 * 
 * @param string $query SQL query with placeholders
 * @param array $params Parameters to bind
 * @param string $types Parameter types
 * @return array Array of associative arrays
 */
if (!function_exists('db_fetch_all')) {
function db_fetch_all($query, $params = [], $types = '') {
    $result = db_query($query, $params, $types);
    if ($result) {
        $rows = [];
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }
    return [];
}
}

/**
 * Helper function to escape strings (use prepared statements instead when possible)
 * 
 * @param string $string String to escape
 * @return string Escaped string
 */
if (!function_exists('db_escape')) {
function db_escape($string) {
    global $conn;
    return $conn->real_escape_string($string);
}
}
?>