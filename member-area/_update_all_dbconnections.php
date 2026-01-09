<?php
/**
 * Script to update all dbconnection.php files
 * Run this once to update all database connection files
 */

$dbconnection_content = <<<'EOT'
<?php
/**
 * Database Connection - Uses main connection from includes/
 * This file now uses the centralized database connection
 */

// Try to include from relative paths
$possible_paths = [
    __DIR__ . '/../includes/dbconnection.php',
    __DIR__ . '/../../includes/dbconnection.php',
    __DIR__ . '/../../../includes/dbconnection.php',
    dirname(dirname(__DIR__)) . '/includes/dbconnection.php',
];

$loaded = false;
foreach ($possible_paths as $path) {
    if (file_exists($path)) {
        require_once($path);
        $loaded = true;
        break;
    }
}

if (!$loaded) {
    // Fallback: create local connection if main one not found
    error_reporting(E_ALL);
    ini_set('display_errors', 0);
    ini_set('log_errors', 1);
    
    date_default_timezone_set("Africa/Cairo");
    
    $username_db = 'root';
    $userpass_db = '';
    $name_db = 'quraan-laravel';
    $server_db = 'localhost';
    $TimeZoneCustome = 'Africa/Cairo';
    
    if (!extension_loaded('mysqli')) {
        error_log("mysqli extension is not loaded");
        die("Database extension not available.");
    }
    
    try {
        $conn = new mysqli($server_db, $username_db, $userpass_db, $name_db);
        
        if ($conn->connect_error) {
            error_log("Database connection failed: " . $conn->connect_error);
            if (ini_get('display_errors')) {
                die("Database connection failed: " . $conn->connect_error);
            } else {
                die("Connection failed. Please contact administrator.");
            }
        }
        
        $conn->set_charset("utf8");
    } catch (Exception $e) {
        error_log("Database connection exception: " . $e->getMessage());
        if (ini_get('display_errors')) {
            die("Database connection error: " . $e->getMessage());
        } else {
            die("Connection failed. Please contact administrator.");
        }
    }
}
?>
EOT;

// List of all dbconnection.php files to update
$files = [
    'employees/includes/dbconnection.php',
    'employees/teacher/dbconnection.php',
    'employees/quality-assurance-manager/dbconnection.php',
    'admin/dbconnection.php',
    'employees/billing/dbconnection.php',
    'employees/customer-service-representative/dbconnection.php',
    'employees/accounts/dbconnection.php',
    'accounts/payments/dbconnection.php',
    'employees/senior-manager/dbconnection.php',
    'employees/manager/dbconnection.php',
    'employees/monitor/dbconnection.php',
];

$base_dir = __DIR__;
$updated = 0;
$failed = [];

foreach ($files as $file) {
    $full_path = $base_dir . '/' . $file;
    
    if (file_exists($full_path)) {
        // Backup original file
        $backup_path = $full_path . '.backup.' . date('Y-m-d_H-i-s');
        if (copy($full_path, $backup_path)) {
            // Write new content
            if (file_put_contents($full_path, $dbconnection_content) !== false) {
                echo "Updated: $file\n";
                $updated++;
            } else {
                echo "Failed to write: $file\n";
                $failed[] = $file;
            }
        } else {
            echo "Failed to backup: $file\n";
            $failed[] = $file;
        }
    } else {
        echo "File not found: $file\n";
    }
}

echo "\n=== Summary ===\n";
echo "Updated: $updated files\n";
if (!empty($failed)) {
    echo "Failed: " . implode(", ", $failed) . "\n";
}

?>

