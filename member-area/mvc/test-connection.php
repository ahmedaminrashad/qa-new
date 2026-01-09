<?php
/**
 * Test database connection
 */
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<h1>Database Connection Test</h1>";
echo "<pre>";

// Test 1: Load bootstrap
echo "1. Loading bootstrap.php...\n";
require_once __DIR__ . '/bootstrap.php';
echo "   ✓ Bootstrap loaded\n\n";

// Test 2: Check if $conn exists
echo "2. Checking \$conn variable...\n";
global $conn;
if (isset($conn)) {
    echo "   ✓ \$conn is set\n";
    if ($conn instanceof mysqli) {
        echo "   ✓ \$conn is mysqli instance\n";
        echo "   Connection status: " . ($conn->connect_error ? "ERROR: " . $conn->connect_error : "OK") . "\n";
    } else {
        echo "   ✗ \$conn is not mysqli instance (type: " . gettype($conn) . ")\n";
    }
} else {
    echo "   ✗ \$conn is NOT set\n";
}
echo "\n";

// Test 3: Try to include main-var.php
echo "3. Testing main-var.php include...\n";
$mainVarPath = __DIR__ . '/../includes/main-var.php';
if (file_exists($mainVarPath)) {
    echo "   File exists: $mainVarPath\n";
    try {
        // Change to includes directory for relative paths
        $originalDir = getcwd();
        chdir(__DIR__ . '/../includes');
        include($mainVarPath);
        chdir($originalDir);
        echo "   ✓ main-var.php included successfully\n";
    } catch (Exception $e) {
        echo "   ✗ Error: " . $e->getMessage() . "\n";
    }
} else {
    echo "   ✗ File not found: $mainVarPath\n";
}
echo "\n";

// Test 4: Check DBCONNECTION_LOADED constant
echo "4. Checking constants...\n";
if (defined('DBCONNECTION_LOADED')) {
    echo "   ✓ DBCONNECTION_LOADED is defined\n";
} else {
    echo "   ✗ DBCONNECTION_LOADED is NOT defined\n";
}
echo "\n";

echo "</pre>";
?>

