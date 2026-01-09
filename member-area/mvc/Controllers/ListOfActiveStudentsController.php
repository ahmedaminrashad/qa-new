<?php
/**
 * ListOfActiveStudents Controller
 * Migrated from list-of-active-students.php
 */
class ListOfActiveStudentsController extends Controller {
    
    public function index() {
        // Date configuration
        date_default_timezone_set("Africa/Cairo");
        $sy = date('Y');
        
        // Calculate year offset (dynamic calculation for years 2014 onwards)
        $y = 1; // Default value
        if ($sy >= 2014) {
            $y = $sy - 2013; // Dynamic calculation for years 2014 onwards
        }
        
        // Get request parameters
        $m = (int)$this->request('m', $y); // Month parameter, default to current year offset
        $yyy = $this->request('yyy', ''); // Year parameter
        
        // Load monitoring functions (legacy support)
        if (file_exists(__DIR__ . '/../../admin/monitoring-functions.php')) {
            include(__DIR__ . '/../../admin/monitoring-functions.php');
        }
        
        // Register helper functions from list-of-active-students.php
        $this->registerHelperFunctions();
        
        // Prepare data for view
        $data = [
            'sy' => $sy,
            'y' => $y,
            'm' => $m,
            'yyy' => $yyy,
        ];
        
        // Render using legacy header for compatibility
        $this->renderLegacyView('admin/list-of-active-students', $data);
    }
    
    /**
     * Register helper functions globally for view compatibility
     */
    private function registerHelperFunctions() {
        // Note: abc(), abc1(), abc2() functions are defined in the view file itself
        // They will be available when the view is included
        // These functions query the database and echo results directly
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

