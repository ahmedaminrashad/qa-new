<?php
/**
 * Debug script - Shows what the router sees
 */
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<h1>Router Debug Information</h1>";
echo "<pre>";
echo "SCRIPT_NAME: " . $_SERVER['SCRIPT_NAME'] . "\n";
echo "REQUEST_URI: " . $_SERVER['REQUEST_URI'] . "\n";
echo "REQUEST_METHOD: " . $_SERVER['REQUEST_METHOD'] . "\n";
echo "\n";

// Test base path detection
$scriptName = $_SERVER['SCRIPT_NAME'];
$basePath = dirname($scriptName);
echo "Detected Base Path: " . $basePath . "\n";
echo "\n";

// Simulate router logic
$requestUri = $_SERVER['REQUEST_URI'];
$requestUri = strtok($requestUri, '?');
if (strpos($requestUri, '/index.php') !== false) {
    $requestUri = str_replace('/index.php', '', $requestUri);
}
$requestUri = '/' . trim($requestUri, '/');
if ($requestUri === '/') {
    $requestUri = '/';
}

echo "Normalized URI: " . $requestUri . "\n";
echo "\n";

// Check if files exist
echo "File Checks:\n";
echo "bootstrap.php: " . (file_exists(__DIR__ . '/bootstrap.php') ? 'EXISTS' : 'NOT FOUND') . "\n";
echo "TestController.php: " . (file_exists(__DIR__ . '/Controllers/TestController.php') ? 'EXISTS' : 'NOT FOUND') . "\n";
echo "Views/test/index.php: " . (file_exists(__DIR__ . '/Views/test/index.php') ? 'EXISTS' : 'NOT FOUND') . "\n";

echo "\n";
echo "PHP Version: " . PHP_VERSION . "\n";
echo "Current Directory: " . __DIR__ . "\n";
echo "</pre>";

// Try to bootstrap
echo "<h2>Bootstrap Test</h2>";
try {
    require_once __DIR__ . '/bootstrap.php';
    echo "<p style='color: green;'>✓ Bootstrap loaded successfully</p>";
    
    if (class_exists('Router')) {
        echo "<p style='color: green;'>✓ Router class found</p>";
    } else {
        echo "<p style='color: red;'>✗ Router class not found</p>";
    }
    
    if (class_exists('Controller')) {
        echo "<p style='color: green;'>✓ Controller class found</p>";
    } else {
        echo "<p style='color: red;'>✗ Controller class not found</p>";
    }
    
    if (class_exists('TestController')) {
        echo "<p style='color: green;'>✓ TestController class found</p>";
    } else {
        echo "<p style='color: red;'>✗ TestController class not found - will be autoloaded</p>";
    }
    
} catch (Exception $e) {
    echo "<p style='color: red;'>✗ Error: " . $e->getMessage() . "</p>";
}

