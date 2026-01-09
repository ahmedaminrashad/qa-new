<?php
/**
 * ListOfInactiveStudents Controller
 * Migrated from list-of-inactive-students.php
 */
class ListOfInactiveStudentsController extends Controller {
    
    public function index() {
        // Enable error reporting for debugging
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
        ini_set('log_errors', 1);
        
        // Date configuration
        date_default_timezone_set("Africa/Cairo");
        
        // Register helper functions first (must be before view includes)
        $this->registerHelperFunctions();
        
        // Prepare data for view
        $data = [];
        
        // Render using legacy header for compatibility
        $this->renderLegacyView('admin/list-of-inactive-students', $data);
    }
    
    /**
     * Register helper functions globally for view compatibility
     */
    private function registerHelperFunctions() {
        // Register abc function if not exists
        if (!function_exists('abc')) {
            function abc($er) {
                global $conn;
                
                if (!isset($conn) || !($conn instanceof mysqli)) {
                    echo '';
                    return;
                }
                
                // Convert deprecated mysql_query to mysqli with prepared statement
                $stmt = $conn->prepare("SELECT * FROM sched WHERE course_id = ?");
                if ($stmt) {
                    $stmt->bind_param("i", $er);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $tnumberOfRows = $result->num_rows;
                    $stmt->close();
                    
                    if ($tnumberOfRows == 0) {
                        echo '<i class="fa fa-exclamation font-red"></i>';
                    } else if ($tnumberOfRows > 0) {
                        echo '<i class="fa fa-check font-green"></i>';
                    }
                } else {
                    error_log("Query failed in abc(): " . $conn->error);
                    echo '';
                }
            }
        }
    }
    
    /**
     * Render view using legacy header/footer system
     * This file uses header.php and includes it itself, so we just need to change directory
     */
    private function renderLegacyView($viewName, $data = []) {
        extract($data);
        
        // Change to admin directory context for relative paths in the view file
        $originalDir = getcwd();
        $adminDir = __DIR__ . '/../../admin';
        
        // Include the actual view content (it will include header.php itself)
        $viewFile = __DIR__ . '/../../admin/' . str_replace('admin/', '', $viewName) . '.php';
        if (file_exists($viewFile)) {
            // Change to admin directory for view includes (so ../includes/ paths work)
            if (is_dir($adminDir)) {
                chdir($adminDir);
            }
            extract($data);
            include($viewFile);
            // Restore directory after view (it may change during include)
            if ($originalDir) {
                chdir($originalDir);
            }
        } else {
            throw new Exception("View file not found: $viewFile");
        }
    }
}