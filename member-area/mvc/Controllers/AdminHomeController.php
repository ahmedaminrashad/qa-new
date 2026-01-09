<?php
/**
 * AdminHome Controller
 * Migrated from admin-home.php
 */
class AdminHomeController extends Controller {
    
    public function index() {
        // Date configuration
        date_default_timezone_set("Africa/Cairo");
        $data_date1 = date('Y-m-d', time());
        
        // Get request parameters
        $date_get = $this->request('date', '');
        $data_date = !empty($date_get) ? $date_get : $data_date1;
        
        // Validate date format
        if (!empty($data_date) && !preg_match('/^\d{4}-\d{2}-\d{2}$/', $data_date)) {
            $data_date = $data_date1;
        }
        
        // Register helper functions
        $this->registerHelperFunctions();
        
        // Load monitoring functions (legacy support - provides helper functions)
        if (file_exists(__DIR__ . '/../../admin/monitoring-functions.php')) {
            include(__DIR__ . '/../../admin/monitoring-functions.php');
        }
        
        // Prepare data for view
        $data = [
            'data_date' => $data_date,
            'data_date1' => $data_date1,
            'sy' => date('Y-m-d'),
            'mm_id' => date('m'),
            'yy_id' => date('Y'),
            'error_results' => $this->request('err', ''),
        ];
        
        // Render using legacy header for compatibility
        $this->renderLegacyView('admin/admin-home', $data);
    }
    
    /**
     * Admin Home - All Classes view
     * Migrated from admin-home-all.php
     */
    public function all() {
        // Date configuration
        date_default_timezone_set("Africa/Cairo");
        $data_date1 = date('Y-m-d', strtotime('now +1 hour'));
        
        // Get and sanitize request parameters
        $date_get = $this->request('date', '');
        $load = (int)$this->request('load', 0);
        $pteacher = (int)$this->request('pteacher', 0);
        
        // Validate date format
        if (!empty($date_get) && preg_match('/^\d{4}-\d{2}-\d{2}$/', $date_get)) {
            $data_date = $date_get;
        } else {
            $data_date = $data_date1;
        }
        
        // Load monitoring functions (legacy support)
        if (file_exists(__DIR__ . '/../../admin/monitoring-functions.php')) {
            include(__DIR__ . '/../../admin/monitoring-functions.php');
        }
        
        // Prepare data for view
        $data = [
            'data_date' => $data_date,
            'data_date1' => $data_date1,
            'load' => $load,
            'pteacher' => $pteacher,
            'sy' => date('Y-m-d'),
            'mm_id' => date('m'),
            'yy_id' => date('Y'),
            'error_results' => $this->request('err', ''),
        ];
        
        // Render using legacy header for compatibility
        $this->renderLegacyView('admin/admin-home-all', $data);
    }
    
    /**
     * Register helper functions globally for view compatibility
     */
    private function registerHelperFunctions() {
        // Register ttm function if not already defined
        if (!function_exists('ttm')) {
            function ttm($t1, $t2) {
                $startTime = new DateTime($t1);
                $endTime = new DateTime($t2);
                $duration = $startTime->diff($endTime);
                echo $duration->format("%H:%I");
            }
        }
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

