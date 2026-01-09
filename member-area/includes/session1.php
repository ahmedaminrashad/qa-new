<?php
/**
 * Admin Session Security Check
 * Validates admin session and redirects if not authenticated
 */

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if user is logged in
if (empty($_SESSION['is']['username1']) || empty($_SESSION['is']['login'])) {
    // Redirect to login page
    header("Location: index.php");
    exit;
}

// Validate session data
$user = $_SESSION['is']['username1'] ?? null;
if (!$user) {
    header("Location: index.php");
    exit;
}

// Optional: Add session timeout check
// Regenerate session ID periodically for security
if (!isset($_SESSION['created'])) {
    $_SESSION['created'] = time();
} else if (time() - $_SESSION['created'] > 1800) {
    // Regenerate session ID every 30 minutes
    session_regenerate_id(true);
    $_SESSION['created'] = time();
}
?>