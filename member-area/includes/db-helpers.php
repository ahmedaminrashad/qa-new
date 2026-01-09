<?php
/**
 * Database Helper Functions
 * Provides backward compatibility functions for old mysql_* code
 * NOTE: These functions should be replaced with prepared statements over time
 */

/**
 * Backward compatibility wrapper for mysql_query
 * @deprecated Use db_query() with prepared statements instead
 */
function mysql_query_legacy($query) {
    global $conn;
    if (!$conn) {
        require_once(__DIR__ . '/dbconnection.php');
    }
    return $conn->query($query);
}

/**
 * Backward compatibility wrapper for mysql_fetch_array
 * @deprecated Use db_fetch_all() or fetch_assoc() instead
 */
function mysql_fetch_array_legacy($result) {
    if ($result instanceof mysqli_result) {
        return $result->fetch_array();
    }
    return false;
}

/**
 * Backward compatibility wrapper for mysql_fetch_assoc
 * @deprecated Use fetch_assoc() directly on mysqli_result
 */
function mysql_fetch_assoc_legacy($result) {
    if ($result instanceof mysqli_result) {
        return $result->fetch_assoc();
    }
    return false;
}

/**
 * Backward compatibility wrapper for mysql_num_rows
 * @deprecated Use $result->num_rows directly
 */
function mysql_num_rows_legacy($result) {
    if ($result instanceof mysqli_result) {
        return $result->num_rows;
    }
    return 0;
}

/**
 * Password hashing utility functions
 */

/**
 * Hash a password securely using bcrypt
 * 
 * @param string $password Plain text password
 * @return string Hashed password
 */
function hash_password($password) {
    return password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);
}

/**
 * Verify a password against a hash
 * 
 * @param string $password Plain text password
 * @param string $hash Stored password hash
 * @return bool True if password matches
 */
function verify_password($password, $hash) {
    return password_verify($password, $hash);
}

/**
 * Check if a password hash needs to be rehashed (e.g., if cost factor increased)
 * This is a wrapper for PHP's built-in password_needs_rehash()
 * 
 * @param string $hash Existing password hash
 * @return bool True if password needs rehashing
 */
function password_needs_rehash_check($hash) {
    return password_needs_rehash($hash, PASSWORD_BCRYPT, ['cost' => 12]);
}

/**
 * Secure input sanitization helpers
 */

/**
 * Sanitize string input
 * 
 * @param string $input User input
 * @return string Sanitized string
 */
function sanitize_input($input) {
    if (is_array($input)) {
        return array_map('sanitize_input', $input);
    }
    return htmlspecialchars(strip_tags(trim($input)), ENT_QUOTES, 'UTF-8');
}

/**
 * Validate and sanitize integer input
 * 
 * @param mixed $input User input
 * @param int $default Default value if invalid
 * @return int Validated integer
 */
function sanitize_int($input, $default = 0) {
    $value = filter_var($input, FILTER_VALIDATE_INT);
    return $value !== false ? $value : $default;
}

/**
 * Validate and sanitize email
 * 
 * @param string $input Email address
 * @return string|false Validated email or false
 */
function sanitize_email($input) {
    return filter_var(trim($input), FILTER_VALIDATE_EMAIL);
}

/**
 * Output escaping for XSS prevention
 * 
 * @param string $string String to escape
 * @return string Escaped string safe for HTML output
 */
function escape_output($string) {
    return htmlspecialchars($string ?? '', ENT_QUOTES, 'UTF-8');
}

?>

