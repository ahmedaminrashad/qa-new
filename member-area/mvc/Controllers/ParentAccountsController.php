<?php
/**
 * ParentAccounts Controller
 * Migrated from parent-accounts.php
 */
class ParentAccountsController extends Controller {
    
    public function index() {
        // Date configuration
        date_default_timezone_set("Africa/Cairo");
        
        // Register helper functions
        $this->registerHelperFunctions();
        
        // Prepare data for view
        $data = [];
        
        // Render using legacy header for compatibility
        $this->renderLegacyView('admin/parent-accounts', $data);
    }
    
    /**
     * Register helper functions globally for view compatibility
     */
    private function registerHelperFunctions() {
        // Register NUM function if not already defined
        if (!function_exists('NUM')) {
            function NUM($var) {
                global $conn;
                $var_escaped = (int)$var;
                $stmt = $conn->prepare("SELECT COUNT(*) as count FROM account WHERE active = ?");
                if ($stmt) {
                    $stmt->bind_param("i", $var_escaped);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $row = $result->fetch_assoc();
                    echo $row['count'] ?? 0;
                    $stmt->close();
                } else {
                    echo '0';
                }
            }
        }
        
        // Register reff function if not already defined
        if (!function_exists('reff')) {
            function reff($er) {
                global $conn;
                $er_escaped = (int)$er;
                $stmt = $conn->prepare("SELECT COUNT(*) as count FROM new_request WHERE parent_id = ?");
                if ($stmt) {
                    $stmt->bind_param("i", $er_escaped);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $row = $result->fetch_assoc();
                    $tnumberOfRows = $row['count'] ?? 0;
                    $stmt->close();
                    
                    if ($tnumberOfRows == 0) {
                        echo '';
                    } else {
                        echo '<span class="label label-sm label-danger">' . htmlspecialchars($tnumberOfRows, ENT_QUOTES, 'UTF-8') . '</span>';
                    }
                } else {
                    echo '';
                }
            }
        }
        
        // Note: abc(), abc2(), abc3(), abcs() functions are defined in the view file
        // They will be available when the view is included
    }
    
    /**
     * Render view using legacy header/footer system
     */
    private function renderLegacyView($viewName, $data = []) {
        extract($data);
        
        // Change to admin directory context for relative paths in header-main.php
        $originalDir = getcwd();
        $adminDir = __DIR__ . '/../../admin';
        
        // Include legacy header (needs to be in admin directory context for relative includes)
        if (file_exists($adminDir . '/header-main.php')) {
            if (is_dir($adminDir)) {
                chdir($adminDir);
            }
            include($adminDir . '/header-main.php');
            // Restore directory after header (it may change during include)
            if ($originalDir) {
                chdir($originalDir);
            }
        }
        
        // Include the actual view content
        $viewFile = __DIR__ . '/../../admin/' . str_replace('admin/', '', $viewName) . '.php';
        if (file_exists($viewFile)) {
            // Change to admin directory for view includes
            if (is_dir($adminDir)) {
                chdir($adminDir);
            }
            extract($data);
            include($viewFile);
            // Restore directory
            if ($originalDir) {
                chdir($originalDir);
            }
        } else {
            throw new Exception("View file not found: $viewFile");
        }
    }
}

