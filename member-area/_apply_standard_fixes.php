<?php
/**
 * Apply Standard Fixes to All PHP Files
 * Adds error reporting, mysql-compat, and database connection checks
 */

$memberAreaDir = __DIR__;
$fixedCount = 0;
$skippedCount = 0;
$errorCount = 0;
$fixedFiles = [];

// Files to skip
$skipPatterns = [
    'standard-header.php',
    'mysql-compat.php',
    'dbconnection.php',
    'fix-blank-pages.php',
    '_fix_all_pages.php',
    '_apply_standard_fixes.php',
    'init.php',
    'page-init.php',
    'db-helpers.php',
    'session.php',
    'session1.php',
    '.backup.',
    'PHPMailer',
    'vendor',
    '.git',
    'node_modules'
];

function shouldSkip($filePath, $skipPatterns) {
    foreach ($skipPatterns as $pattern) {
        if (strpos($filePath, $pattern) !== false) {
            return true;
        }
    }
    return false;
}

function hasStandardFixes($content) {
    // Check if file already has standard fixes
    $patterns = [
        '/ini_set\([\'"]display_errors[\'"]/i',
        '/error_reporting\(E_ALL\)/i',
        '/mysql-compat\.php/i',
        '/standard-header\.php/i',
        '/PAGE_INIT_LOADED/i'
    ];
    
    foreach ($patterns as $pattern) {
        if (preg_match($pattern, $content)) {
            return true;
        }
    }
    return false;
}

function getRelativePath($filePath, $memberAreaDir) {
    $relativePath = str_replace($memberAreaDir . DIRECTORY_SEPARATOR, '', $filePath);
    return str_replace('\\', '/', $relativePath);
}

function calculateDepth($relativePath) {
    return substr_count($relativePath, '/');
}

function getIncludesPath($depth) {
    if ($depth == 0) {
        return '../includes/';
    } elseif ($depth == 1) {
        return '../includes/';
    } else {
        return str_repeat('../', $depth - 1) . 'includes/';
    }
}

function applyStandardFixes($filePath, $memberAreaDir) {
    global $fixedCount, $skippedCount, $errorCount, $fixedFiles;
    
    if (shouldSkip($filePath, $GLOBALS['skipPatterns'])) {
        return false;
    }
    
    $content = @file_get_contents($filePath);
    if ($content === false) {
        $errorCount++;
        echo "ERROR: Could not read file: $filePath\n";
        return false;
    }
    
    // Skip if already has fixes
    if (hasStandardFixes($content)) {
        $skippedCount++;
        return false;
    }
    
    // Skip files that don't start with <?php
    if (strpos(trim($content), '<?php') !== 0) {
        $skippedCount++;
        return false;
    }
    
    // Calculate relative path to includes directory
    $relativePath = getRelativePath($filePath, $memberAreaDir);
    $depth = calculateDepth($relativePath);
    $includesPath = getIncludesPath($depth);
    
    // Create the standard fix header
    $fixHeader = <<<'FIX'
<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ini_set('log_errors', 1);

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

require("{{INCLUDES_PATH}}dbconnection.php");
require_once("{{INCLUDES_PATH}}mysql-compat.php");

// Check database connection
if (!isset($conn) || !$conn) {
    die("Database connection failed. Please contact the administrator.");
}

FIX;

    $fixHeader = str_replace('{{INCLUDES_PATH}}', $includesPath, $fixHeader);
    
    // Find where to insert the fix
    // Look for existing includes/requires and insert after them
    $lines = explode("\n", $content);
    $insertPos = 1; // After opening <?php
    
    // Check if there are existing includes at the top
    $foundIncludes = false;
    for ($i = 0; $i < min(20, count($lines)); $i++) {
        $line = trim($lines[$i]);
        if (preg_match('/^(require|include|require_once|include_once)/', $line)) {
            $insertPos = $i + 1;
            $foundIncludes = true;
        }
        // Stop if we hit actual PHP code (not just includes/comments)
        if (!$foundIncludes && $line && 
            !preg_match('/^(require|include|\/\/|\/\*|#|\?>|session_start)/', $line) &&
            !preg_match('/^<\?php$/', $line)) {
            break;
        }
    }
    
    // Insert the fix header
    array_splice($lines, $insertPos, 0, explode("\n", trim($fixHeader)));
    
    $newContent = implode("\n", $lines);
    
    // Backup original file
    $backupPath = $filePath . '.backup.' . date('YmdHis');
    @copy($filePath, $backupPath);
    
    // Write fixed content
    if (file_put_contents($filePath, $newContent)) {
        $fixedCount++;
        $fixedFiles[] = getRelativePath($filePath, $memberAreaDir);
        echo "✓ Fixed: " . getRelativePath($filePath, $memberAreaDir) . "\n";
        return true;
    } else {
        $errorCount++;
        echo "ERROR: Could not write file: $filePath\n";
        return false;
    }
}

function findPHPFiles($dir, &$files = []) {
    if (!is_dir($dir)) return $files;
    
    $items = scandir($dir);
    foreach ($items as $item) {
        if ($item == '.' || $item == '..') continue;
        
        $path = $dir . DIRECTORY_SEPARATOR . $item;
        
        if (is_dir($path)) {
            findPHPFiles($path, $files);
        } elseif (is_file($path) && pathinfo($path, PATHINFO_EXTENSION) === 'php') {
            $files[] = $path;
        }
    }
    return $files;
}

// Main execution
echo "=== Applying Standard Fixes to All PHP Files ===\n\n";

// Find all PHP files
$allFiles = findPHPFiles($memberAreaDir);

echo "Found " . count($allFiles) . " PHP files\n\n";
echo "Processing files...\n\n";

foreach ($allFiles as $file) {
    applyStandardFixes($file, $memberAreaDir);
}

echo "\n=== Summary ===\n";
echo "Files fixed: $fixedCount\n";
echo "Files skipped (already fixed): $skippedCount\n";
echo "Errors: $errorCount\n";
echo "Total processed: " . ($fixedCount + $skippedCount + $errorCount) . "\n\n";

if ($fixedCount > 0) {
    echo "Fixed files:\n";
    foreach ($fixedFiles as $file) {
        echo "  - $file\n";
    }
}

echo "\nDone!\n";

