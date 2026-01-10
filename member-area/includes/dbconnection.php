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
        
        // Verify the connection is still valid
        if (mysqli_connect_errno() || ($conn->connect_error && !empty($conn->connect_error))) {
            $error_no = mysqli_connect_errno();
            $error_msg = $conn->connect_error ? $conn->connect_error : mysqli_connect_error();
            $error_details = "<h2>Database Connection Error (Reused Connection)</h2>";
            $error_details .= "<p><strong>Error Code:</strong> $error_no</p>";
            $error_details .= "<p><strong>Error Message:</strong> " . htmlspecialchars($error_msg) . "</p>";
            $error_details .= "<p>The previously established connection is no longer valid.</p>";
            die($error_details);
        }
        
        // Test the connection with a ping
        if (!$conn->ping()) {
            $error_details = "<h2>Database Connection Lost</h2>";
            $error_details .= "<p><strong>Error:</strong> The database connection was lost or the server is not responding.</p>";
            $error_details .= "<p><strong>Error Message:</strong> " . htmlspecialchars($conn->error) . "</p>";
            die($error_details);
        }
    } else {
        // Connection was supposed to be loaded but isn't available
        $error_details = "<h2>Database Connection Error</h2>";
        $error_details .= "<p><strong>Error:</strong> Database connection was expected to be loaded but is not available.</p>";
        if (isset($GLOBALS['conn'])) {
            $error_details .= "<p><strong>Debug Info:</strong> \$GLOBALS['conn'] exists but is not a mysqli instance (type: " . gettype($GLOBALS['conn']) . ")</p>";
        } else {
            $error_details .= "<p><strong>Debug Info:</strong> \$GLOBALS['conn'] is not set</p>";
        }
        die($error_details);
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

// Load environment variables from .env file
if (!defined('ENV_LOADED')) {
    $envLoaderPath = __DIR__ . DIRECTORY_SEPARATOR . 'env-loader.php';
    if (file_exists($envLoaderPath)) {
        require_once($envLoaderPath);
    }
}

// Database configuration - read from environment variables with fallback to defaults
$server_db = env('DB_HOST', 'localhost');
$username_db = env('DB_USERNAME', 'forge');
$userpass_db = env('DB_PASSWORD', 'nUr8TVpfj3kXNolsLnZv');
$name_db = env('DB_NAME', 'live');
$db_charset = env('DB_CHARSET', 'utf8');
$TimeZoneCustome = env('APP_TIMEZONE', 'Africa/Cairo');

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
        // Display connection details for debugging (remove in production)
        error_log("Attempting database connection to: host=$server_db, user=$username_db, database=$name_db");
        
        // Suppress warnings during connection attempt - we'll handle errors explicitly
        $conn = @new mysqli($server_db, $username_db, $userpass_db, $name_db);
        
        // Store in $GLOBALS first
        $GLOBALS['conn'] = $conn;
        
        // Check for connection errors - use object properties (most reliable)
        // mysqli object always has connect_errno and connect_error properties
        $connect_errno = 0;
        $connect_error = '';
        
        if ($conn instanceof mysqli) {
            // Check both connect_errno and connect_error from the object
            $connect_errno = (int)$conn->connect_errno;
            $connect_error = (string)$conn->connect_error;
        } else {
            // If connection object wasn't created properly, check global functions
            $connect_errno = mysqli_connect_errno();
            $connect_error = mysqli_connect_error() ?: 'Failed to create mysqli connection object';
        }
        
        // Check connection - mysqli_connect_errno() returns 0 on success, non-zero on failure
        if ($connect_errno !== 0 || !empty($connect_error)) {
            error_log("Database connection failed - Error #$connect_errno: $connect_error");
            error_log("Connection parameters: host=$server_db, user=$username_db, database=$name_db");
            
            // Always show detailed error for debugging
            $error_details = "<!DOCTYPE html><html><head><title>Database Connection Error</title>";
            $error_details .= "<style>body{font-family:Arial,sans-serif;margin:40px;background:#f5f5f5;}";
            $error_details .= ".error-box{background:white;padding:30px;border-radius:5px;box-shadow:0 2px 10px rgba(0,0,0,0.1);}";
            $error_details .= "h2{color:#d32f2f;margin-top:0;}p{margin:10px 0;}strong{color:#333;}</style></head><body>";
            $error_details .= "<div class='error-box'>";
            $error_details .= "<h2>Database Connection Error</h2>";
            $error_details .= "<p><strong>Error Code:</strong> " . ($connect_errno ? $connect_errno : 'Unknown') . "</p>";
            $error_details .= "<p><strong>Error Message:</strong> " . htmlspecialchars($connect_error ? $connect_error : 'Connection failed') . "</p>";
            $error_details .= "<hr style='margin:20px 0;border:none;border-top:1px solid #ddd;'>";
            $error_details .= "<h3>Connection Parameters:</h3>";
            $error_details .= "<p><strong>Host:</strong> " . htmlspecialchars($server_db) . "</p>";
            $error_details .= "<p><strong>Username:</strong> " . htmlspecialchars($username_db) . "</p>";
            $error_details .= "<p><strong>Database:</strong> " . htmlspecialchars($name_db) . "</p>";
            $error_details .= "<hr style='margin:20px 0;border:none;border-top:1px solid #ddd;'>";
            $error_details .= "<h3>Troubleshooting Steps:</h3>";
            $error_details .= "<ul>";
            $error_details .= "<li>Verify MySQL/MariaDB service is running</li>";
            $error_details .= "<li>Check database credentials are correct</li>";
            $error_details .= "<li>Ensure database '" . htmlspecialchars($name_db) . "' exists</li>";
            $error_details .= "<li>Verify user '" . htmlspecialchars($username_db) . "' has access to the database</li>";
            $error_details .= "<li>Check firewall rules allow connection to MySQL port (usually 3306)</li>";
            $error_details .= "<li>If using XAMPP, ensure MySQL is started in XAMPP Control Panel</li>";
            $error_details .= "</ul>";
            $error_details .= "</div></body></html>";
            
            die($error_details);
        }
        
        // Verify the connection is actually working by testing it
        if (!$conn || !$conn->ping()) {
            $error_details = "<!DOCTYPE html><html><head><title>Database Connection Verification Failed</title>";
            $error_details .= "<style>body{font-family:Arial,sans-serif;margin:40px;background:#f5f5f5;}";
            $error_details .= ".error-box{background:white;padding:30px;border-radius:5px;box-shadow:0 2px 10px rgba(0,0,0,0.1);}";
            $error_details .= "h2{color:#d32f2f;margin-top:0;}p{margin:10px 0;}strong{color:#333;}</style></head><body>";
            $error_details .= "<div class='error-box'>";
            $error_details .= "<h2>Database Connection Verification Failed</h2>";
            $error_details .= "<p>The connection object was created but the connection test (ping) failed.</p>";
            $error_details .= "<p><strong>Host:</strong> " . htmlspecialchars($server_db) . "</p>";
            $error_details .= "<p><strong>Username:</strong> " . htmlspecialchars($username_db) . "</p>";
            $error_details .= "<p><strong>Database:</strong> " . htmlspecialchars($name_db) . "</p>";
            $error_details .= "</div></body></html>";
            die($error_details);
        }
        
        // Set charset to prevent encoding issues (from .env or default to utf8)
        if (!$conn->set_charset($db_charset)) {
            error_log("Warning: Failed to set charset to $db_charset. Error: " . $conn->error);
        }
    } catch (Exception $e) {
        $error_msg = $e->getMessage();
        error_log("Database connection exception: " . $error_msg);
        error_log("Connection parameters: host=$server_db, user=$username_db, database=$name_db");
        
        $error_details = "<!DOCTYPE html><html><head><title>Database Connection Exception</title>";
        $error_details .= "<style>body{font-family:Arial,sans-serif;margin:40px;background:#f5f5f5;}";
        $error_details .= ".error-box{background:white;padding:30px;border-radius:5px;box-shadow:0 2px 10px rgba(0,0,0,0.1);}";
        $error_details .= "h2{color:#d32f2f;margin-top:0;}p{margin:10px 0;}strong{color:#333;}</style></head><body>";
        $error_details .= "<div class='error-box'>";
        $error_details .= "<h2>Database Connection Exception</h2>";
        $error_details .= "<p><strong>Exception Message:</strong> " . htmlspecialchars($error_msg) . "</p>";
        $error_details .= "<p><strong>Host:</strong> " . htmlspecialchars($server_db) . "</p>";
        $error_details .= "<p><strong>Username:</strong> " . htmlspecialchars($username_db) . "</p>";
        $error_details .= "<p><strong>Database:</strong> " . htmlspecialchars($name_db) . "</p>";
        $error_details .= "</div></body></html>";
        
        die($error_details);
    } catch (Error $e) {
        // PHP 7+ also catches Error exceptions
        $error_msg = $e->getMessage();
        error_log("Database connection error: " . $error_msg);
        error_log("Connection parameters: host=$server_db, user=$username_db, database=$name_db");
        
        $error_details = "<!DOCTYPE html><html><head><title>Database Connection Error</title>";
        $error_details .= "<style>body{font-family:Arial,sans-serif;margin:40px;background:#f5f5f5;}";
        $error_details .= ".error-box{background:white;padding:30px;border-radius:5px;box-shadow:0 2px 10px rgba(0,0,0,0.1);}";
        $error_details .= "h2{color:#d32f2f;margin-top:0;}p{margin:10px 0;}strong{color:#333;}</style></head><body>";
        $error_details .= "<div class='error-box'>";
        $error_details .= "<h2>Database Connection Error</h2>";
        $error_details .= "<p><strong>Error Message:</strong> " . htmlspecialchars($error_msg) . "</p>";
        $error_details .= "<p><strong>Host:</strong> " . htmlspecialchars($server_db) . "</p>";
        $error_details .= "<p><strong>Username:</strong> " . htmlspecialchars($username_db) . "</p>";
        $error_details .= "<p><strong>Database:</strong> " . htmlspecialchars($name_db) . "</p>";
        $error_details .= "</div></body></html>";
        
        die($error_details);
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