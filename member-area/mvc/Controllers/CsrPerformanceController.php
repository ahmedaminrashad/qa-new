<?php
/**
 * CSR Performance Controller
 * Migrated from csr-performance.php
 */
class CsrPerformanceController extends Controller {
    
    public function index() {
        // Date configuration
        date_default_timezone_set("Africa/Cairo");
        
        // Get request parameters (from URL query string)
        $csr_id = $this->request('csr', '');
        $csr_name = $this->request('name', '');
        $yy_id = $this->request('year', date('Y'));
        $mm_id = $this->request('month', date('m'));
        
        // Current date values
        $year1 = date('Y', strtotime('now +1 hour'));
        $month1 = date('m', strtotime('now +1 hour'));
        $month_n = date('M', strtotime('now +1 hour'));
        $year1sm = date('y', strtotime('now +1 hour'));
        $ddd1 = $year1 . '-' . $month1 . '-01';
        $last_date1 = date("Y-m-t", strtotime($ddd1));
        
        // Load legacy home-functions for compatibility (provides helper functions)
        if (file_exists(__DIR__ . '/../../admin/load-data-files/home-functions.php')) {
            include(__DIR__ . '/../../admin/load-data-files/home-functions.php');
        }
        
        // Register helper functions
        $this->registerHelperFunctions();
        
        // Prepare data for view
        $data = [
            'csr_id' => $csr_id,
            'csr_name' => $csr_name,
            'mm_id' => $mm_id,
            'yy_id' => $yy_id,
            'year1' => $year1,
            'month1' => $month1,
            'month_n' => $month_n,
            'year1sm' => $year1sm,
            'last_date1' => $last_date1,
            'ddd1' => $ddd1,
        ];
        
        // Render using legacy header for compatibility
        $this->renderLegacyView('admin/csr-performance', $data);
    }
    
    /**
     * Register helper functions globally for view compatibility
     * Note: Functions from csr-performance.php are defined in the view file itself
     */
    private function registerHelperFunctions() {
        // Helper functions (csr_allocated, csr_active, csr_remove, etc.) 
        // are defined in the view file and will be available when included
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

