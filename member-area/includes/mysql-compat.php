<?php
/**
 * MySQL Compatibility Layer
 * Temporary compatibility layer for deprecated mysql_* functions
 * This should be gradually replaced with proper mysqli prepared statements
 * WARNING: This does NOT prevent SQL injection - it's only for compatibility
 */

if (!function_exists('mysql_connect')) {
    function mysql_connect($server = null, $username = null, $password = null) {
        global $conn;
        // mysqli connection is already established in dbconnection.php
        return $conn;
    }
}

if (!function_exists('mysql_select_db')) {
    function mysql_select_db($database, $link = null) {
        // Database is already selected in mysqli connection
        return true;
    }
}

if (!function_exists('mysql_query')) {
    function mysql_query($query, $link = null) {
        global $conn;
        if (!$conn) {
            trigger_error("Database connection not available", E_USER_ERROR);
            return false;
        }
        // WARNING: This still allows SQL injection if query contains unescaped variables
        // This is a temporary compatibility measure
        $result = $conn->query($query);
        if (!$result) {
            trigger_error("MySQL Error: " . $conn->error, E_USER_WARNING);
        }
        return $result;
    }
}

if (!function_exists('mysql_num_rows')) {
    function mysql_num_rows($result) {
        if ($result instanceof mysqli_result) {
            return $result->num_rows;
        }
        return 0;
    }
}

if (!function_exists('mysql_fetch_array')) {
    function mysql_fetch_array($result, $result_type = MYSQLI_BOTH) {
        if ($result instanceof mysqli_result) {
            if ($result_type == MYSQLI_ASSOC) {
                return $result->fetch_assoc();
            } elseif ($result_type == MYSQLI_NUM) {
                return $result->fetch_array(MYSQLI_NUM);
            } else {
                return $result->fetch_array(MYSQLI_BOTH);
            }
        }
        return false;
    }
}

if (!function_exists('mysql_fetch_assoc')) {
    function mysql_fetch_assoc($result) {
        if ($result instanceof mysqli_result) {
            return $result->fetch_assoc();
        }
        return false;
    }
}

if (!function_exists('mysql_fetch_row')) {
    function mysql_fetch_row($result) {
        if ($result instanceof mysqli_result) {
            return $result->fetch_array(MYSQLI_NUM);
        }
        return false;
    }
}

if (!function_exists('mysql_result')) {
    function mysql_result($result, $row, $field = 0) {
        if (!($result instanceof mysqli_result)) {
            return false;
        }
        
        // Validate row parameter - must be an integer
        if (!is_numeric($row) || $row < 0) {
            return false;
        }
        $row = (int)$row;
        
        // Seek to the requested row
        if (!$result->data_seek($row)) {
            return false;
        }
        
        // Fetch the row
        $row_data = $result->fetch_assoc();
        
        // Reset pointer back to the row position for subsequent calls
        $result->data_seek($row);
        
        if (!$row_data) {
            return false;
        }
        
        // If field is a string (field name), return from associative array
        if (is_string($field)) {
            return isset($row_data[$field]) ? $row_data[$field] : false;
        }
        
        // If field is numeric (index), convert to numeric array
        $numeric_data = array_values($row_data);
        return isset($numeric_data[$field]) ? $numeric_data[$field] : false;
    }
}

if (!function_exists('mysql_error')) {
    function mysql_error($link = null) {
        global $conn;
        if ($conn instanceof mysqli) {
            return $conn->error;
        }
        return '';
    }
}

if (!function_exists('mysql_real_escape_string')) {
    function mysql_real_escape_string($string, $link = null) {
        global $conn;
        if ($conn instanceof mysqli) {
            return $conn->real_escape_string($string);
        }
        return addslashes($string);
    }
}

// Define constants if not already defined
if (!defined('MYSQLI_BOTH')) {
    define('MYSQLI_BOTH', 3);
}
if (!defined('MYSQLI_ASSOC')) {
    define('MYSQLI_ASSOC', 2);
}
if (!defined('MYSQLI_NUM')) {
    define('MYSQLI_NUM', 1);
}

// Legacy MYSQL_RESULT function (uppercase)
if (!function_exists('MYSQL_RESULT')) {
    function MYSQL_RESULT($result, $row, $field = 0) {
        return mysql_result($result, $row, $field);
    }
}

// Legacy MYSQL_NUMROWS function (uppercase)
if (!function_exists('MYSQL_NUMROWS')) {
    function MYSQL_NUMROWS($result) {
        return mysql_num_rows($result);
    }
}

?>

