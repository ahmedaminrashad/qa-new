<?php
/**
 * Error Display Page
 * This page shows PHP errors and configuration
 * Remove this file in production
 */

// Enable all error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
ini_set('log_errors', 1);

?>
<!DOCTYPE html>
<html>
<head>
    <title>PHP Error Display</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; background: #f5f5f5; }
        .container { background: white; padding: 20px; border-radius: 5px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        h1 { color: #333; }
        h2 { color: #666; border-bottom: 2px solid #ddd; padding-bottom: 10px; }
        .error { background: #ffebee; border-left: 4px solid #f44336; padding: 10px; margin: 10px 0; }
        .warning { background: #fff3e0; border-left: 4px solid #ff9800; padding: 10px; margin: 10px 0; }
        .success { background: #e8f5e9; border-left: 4px solid #4caf50; padding: 10px; margin: 10px 0; }
        .info { background: #e3f2fd; border-left: 4px solid #2196f3; padding: 10px; margin: 10px 0; }
        pre { background: #f5f5f5; padding: 10px; border-radius: 3px; overflow-x: auto; }
        table { width: 100%; border-collapse: collapse; margin: 10px 0; }
        th, td { padding: 8px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background-color: #4CAF50; color: white; }
    </style>
</head>
<body>
    <div class="container">
        <h1>PHP Error Display & Configuration</h1>
        
        <h2>Error Reporting Status</h2>
        <table>
            <tr>
                <th>Setting</th>
                <th>Value</th>
            </tr>
            <tr>
                <td>error_reporting()</td>
                <td><?php echo error_reporting(); ?> (<?php echo error_reporting() === E_ALL ? 'E_ALL' : 'Custom'; ?>)</td>
            </tr>
            <tr>
                <td>display_errors</td>
                <td><?php echo ini_get('display_errors') ? 'ON' : 'OFF'; ?></td>
            </tr>
            <tr>
                <td>display_startup_errors</td>
                <td><?php echo ini_get('display_startup_errors') ? 'ON' : 'OFF'; ?></td>
            </tr>
            <tr>
                <td>log_errors</td>
                <td><?php echo ini_get('log_errors') ? 'ON' : 'OFF'; ?></td>
            </tr>
            <tr>
                <td>error_log</td>
                <td><?php echo ini_get('error_log') ?: 'Default system log'; ?></td>
            </tr>
        </table>

        <h2>PHP Extensions</h2>
        <div class="info">
            <strong>mysqli Extension:</strong> <?php echo extension_loaded('mysqli') ? '<span style="color: green;">✓ Loaded</span>' : '<span style="color: red;">✗ Not Loaded</span>'; ?><br>
            <strong>session Extension:</strong> <?php echo extension_loaded('session') ? '<span style="color: green;">✓ Loaded</span>' : '<span style="color: red;">✗ Not Loaded</span>'; ?><br>
            <strong>PDO Extension:</strong> <?php echo extension_loaded('pdo') ? '<span style="color: green;">✓ Loaded</span>' : '<span style="color: red;">✗ Not Loaded</span>'; ?>
        </div>

        <h2>Database Connection Test</h2>
        <?php
        require("../includes/dbconnection.php");
        
        if (isset($conn) && $conn instanceof mysqli) {
            if ($conn->connect_error) {
                echo '<div class="error">';
                echo '<strong>Connection Error:</strong> ' . htmlspecialchars($conn->connect_error);
                echo '</div>';
            } else {
                echo '<div class="success">';
                echo '<strong>✓ Database Connection Successful</strong><br>';
                echo 'Server Info: ' . htmlspecialchars($conn->server_info) . '<br>';
                echo 'Host Info: ' . htmlspecialchars($conn->host_info);
                echo '</div>';
                
                // Test query
                $test_query = $conn->query("SHOW TABLES");
                if ($test_query) {
                    echo '<div class="info">';
                    echo '<strong>✓ Can execute queries</strong><br>';
                    echo 'Tables in database: ' . $test_query->num_rows;
                    echo '</div>';
                } else {
                    echo '<div class="warning">';
                    echo '<strong>Warning:</strong> Could not execute test query: ' . htmlspecialchars($conn->error);
                    echo '</div>';
                }
            }
        } else {
            echo '<div class="error">';
            echo '<strong>✗ Database connection object not available</strong>';
            echo '</div>';
        }
        ?>

        <h2>Recent PHP Errors</h2>
        <?php
        $last_error = error_get_last();
        if ($last_error) {
            echo '<div class="error">';
            echo '<strong>Last Error:</strong><br>';
            echo 'Message: ' . htmlspecialchars($last_error['message']) . '<br>';
            echo 'File: ' . htmlspecialchars($last_error['file']) . '<br>';
            echo 'Line: ' . $last_error['line'] . '<br>';
            echo 'Type: ' . $last_error['type'];
            echo '</div>';
        } else {
            echo '<div class="success">No recent PHP errors detected.</div>';
        }
        ?>

        <h2>Session Information</h2>
        <?php
        if (session_status() === PHP_SESSION_ACTIVE) {
            echo '<div class="success">';
            echo '<strong>✓ Session is active</strong><br>';
            echo 'Session ID: ' . htmlspecialchars(session_id()) . '<br>';
            echo 'Session Name: ' . htmlspecialchars(session_name());
            echo '</div>';
            
            if (!empty($_SESSION)) {
                echo '<div class="info">';
                echo '<strong>Session Data:</strong>';
                echo '<pre>' . print_r($_SESSION, true) . '</pre>';
                echo '</div>';
            }
        } else {
            echo '<div class="warning">Session is not active</div>';
        }
        ?>

        <h2>Test Error Generation</h2>
        <p>Click the button below to generate a test error and verify error reporting is working:</p>
        <button onclick="location.href='?test_error=1'">Generate Test Error</button>
        
        <?php
        if (isset($_GET['test_error'])) {
            echo '<div class="warning">';
            echo 'Generating test errors...<br>';
            
            // Generate a notice
            trigger_error("This is a test notice", E_USER_NOTICE);
            
            // Generate a warning
            trigger_error("This is a test warning", E_USER_WARNING);
            
            echo 'Check above for the error messages.';
            echo '</div>';
        }
        ?>

        <h2>PHP Configuration</h2>
        <div class="info">
            <strong>PHP Version:</strong> <?php echo PHP_VERSION; ?><br>
            <strong>Server Software:</strong> <?php echo $_SERVER['SERVER_SOFTWARE'] ?? 'Unknown'; ?><br>
            <strong>Document Root:</strong> <?php echo $_SERVER['DOCUMENT_ROOT'] ?? 'Unknown'; ?><br>
            <strong>Script Filename:</strong> <?php echo $_SERVER['SCRIPT_FILENAME'] ?? 'Unknown'; ?>
        </div>

        <h2>Include Path</h2>
        <pre><?php echo get_include_path(); ?></pre>

        <hr>
        <p><small>This page is for debugging purposes only. Remove in production.</small></p>
    </div>
</body>
</html>

