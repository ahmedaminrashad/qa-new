<?php
/**
 * Quick Fix Script for Blank Pages
 * Adds standard error reporting and mysql compatibility to PHP files
 */

$memberAreaDir = __DIR__ . '/member-area';

function fixFile($filePath, $memberAreaDir) {
    $content = file_get_contents($filePath);
    if ($content === false) return false;
    
    // Skip if already has our fixes
    if (strpos($content, 'standard-header.php') !== false || 
        strpos($content, 'ERROR_REPORTING_SET') !== false ||
        strpos($content, 'mysql-compat.php') !== false) {
        return false; // Already fixed
    }
    
    // Calculate path to standard-header.php
    $relativePath = str_replace($memberAreaDir . '/', '', $filePath);
    $depth = substr_count($relativePath, '/');
    
    if ($depth == 0) {
        $headerPath = 'includes/standard-header.php';
    } elseif ($depth == 1) {
        $headerPath = '../includes/standard-header.php';
    } else {
        $headerPath = str_repeat('../', $depth) . 'includes/standard-header.php';
    }
    
    // Find opening PHP tag
    if (preg_match('/^<\?php\s*\n/', $content)) {
        // Standard opening tag
        $insert = "<?php\nrequire_once(__DIR__ . '/" . $headerPath . "');\n";
        $newContent = preg_replace('/^<\?php\s*\n/', $insert, $content, 1);
    } elseif (preg_match('/^<\?php\s+session_start/', $content)) {
        // Has session_start on same line
        $insert = "<?php\nrequire_once(__DIR__ . '/" . $headerPath . "');\n";
        $newContent = preg_replace('/^<\?php\s+/', $insert, $content, 1);
        // Remove duplicate session_start if standard-header adds it
        $newContent = preg_replace('/session_start\(\);\s*\n/', '', $newContent, 1);
    } elseif (preg_match('/^<\?php\s+/', $content)) {
        $insert = "<?php\nrequire_once(__DIR__ . '/" . $headerPath . "');\n\n";
        $newContent = preg_replace('/^<\?php\s+/', $insert, $content, 1);
    } else {
        return false; // Couldn't parse
    }
    
    return $newContent;
}

function findPHPFiles($dir, &$files = []) {
    if (!is_dir($dir)) return $files;
    
    $items = scandir($dir);
    foreach ($items as $item) {
        if ($item == '.' || $item == '..') continue;
        if (strpos($item, 'vendor') !== false) continue;
        if (strpos($item, '.git') !== false) continue;
        
        $path = $dir . '/' . $item;
        if (is_dir($path)) {
            findPHPFiles($path, $files);
        } elseif (is_file($path) && pathinfo($path, PATHINFO_EXTENSION) === 'php') {
            // Skip certain files
            if (strpos($path, 'standard-header.php') !== false ||
                strpos($path, 'mysql-compat.php') !== false ||
                strpos($path, 'dbconnection.php') !== false ||
                strpos($path, 'fix-blank-pages.php') !== false ||
                strpos($path, '_fix_all_pages.php') !== false ||
                strpos($path, 'init.php') !== false) {
                continue;
            }
            $files[] = $path;
        }
    }
    return $files;
}

// Process admin directory files first
echo "Fixing admin directory files...\n";
$adminFiles = findPHPFiles($memberAreaDir . '/admin');
$fixed = 0;
$skipped = 0;

foreach ($adminFiles as $file) {
    $newContent = fixFile($file, $memberAreaDir);
    if ($newContent && $newContent !== file_get_contents($file)) {
        // Backup
        copy($file, $file . '.backup.' . time());
        if (file_put_contents($file, $newContent)) {
            $fixed++;
            $relPath = str_replace($memberAreaDir . '/', '', $file);
            echo "Fixed: $relPath\n";
        }
    } else {
        $skipped++;
    }
}

echo "\nAdmin files: Fixed=$fixed, Skipped=$skipped\n";

// Process accounts directory
echo "\nFixing accounts directory files...\n";
$accountsFiles = findPHPFiles($memberAreaDir . '/accounts');
$fixed2 = 0;
$skipped2 = 0;

foreach ($accountsFiles as $file) {
    $newContent = fixFile($file, $memberAreaDir);
    if ($newContent && $newContent !== file_get_contents($file)) {
        copy($file, $file . '.backup.' . time());
        if (file_put_contents($file, $newContent)) {
            $fixed2++;
            $relPath = str_replace($memberAreaDir . '/', '', $file);
            echo "Fixed: $relPath\n";
        }
    } else {
        $skipped2++;
    }
}

echo "\nAccounts files: Fixed=$fixed2, Skipped=$skipped2\n";

// Process employees directory (sample - can take time)
echo "\nFixing employees directory files (first 50)...\n";
$employeesFiles = findPHPFiles($memberAreaDir . '/employees');
$fixed3 = 0;
$skipped3 = 0;
$processed = 0;
$limit = 50;

foreach ($employeesFiles as $file) {
    if ($processed >= $limit) break;
    
    $newContent = fixFile($file, $memberAreaDir);
    if ($newContent && $newContent !== file_get_contents($file)) {
        copy($file, $file . '.backup.' . time());
        if (file_put_contents($file, $newContent)) {
            $fixed3++;
            $relPath = str_replace($memberAreaDir . '/', '', $file);
            echo "Fixed: $relPath\n";
        }
    } else {
        $skipped3++;
    }
    $processed++;
}

echo "\nEmployees files (first $limit): Fixed=$fixed3, Skipped=$skipped3\n";

echo "\n=== Summary ===\n";
echo "Total fixed: " . ($fixed + $fixed2 + $fixed3) . "\n";
echo "Total skipped: " . ($skipped + $skipped2 + $skipped3) . "\n";
echo "\nTo fix remaining files, run this script again or fix manually.\n";

?>

