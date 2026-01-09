<?php
/**
 * Dashboard Controller
 * Migrated from dashboard.php
 */
class DashboardController extends Controller {
    
    public function index() {
        // Make helper functions available globally for view compatibility
        $this->registerHelperFunctions();
        
        // Date configuration
        date_default_timezone_set("Africa/Cairo");
        $data_date = date('Y-m-d', strtotime('now +1 hour'));
        $date = date('d/m/Y', strtotime('now +1 hour'));
        $mm_id = date('m', strtotime('now +1 hour'));
        $yy_id = date('Y', strtotime('now +1 hour'));
        $sy = date('Y-m-d', strtotime('now +1 hour'));
        $year1 = date('Y', strtotime('now +1 hour'));
        $month1 = date('m', strtotime('now +1 hour'));
        $month_n = date('M', strtotime('now +1 hour'));
        $year1sm = date('y', strtotime('now +1 hour'));
        $ddd1 = $year1 . '-' . $month1 . '-01';
        $last_date1 = date("Y-m-t", strtotime($ddd1));
        
        // Load legacy home-functions for compatibility (provides requests, trials, regulars, etc.)
        if (file_exists(__DIR__ . '/../../admin/load-data-files/home-functions.php')) {
            include(__DIR__ . '/../../admin/load-data-files/home-functions.php');
        }
        
        // trial2 and leave2 are calculated in header-main.php
        // They will be available after header is included, but set defaults here
        $trial2 = 0;
        $leave2 = '';
        
        // Prepare data for view
        $data = [
            'data_date' => $data_date,
            'date' => $date,
            'mm_id' => $mm_id,
            'yy_id' => $yy_id,
            'sy' => $sy,
            'year1' => $year1,
            'month1' => $month1,
            'month_n' => $month_n,
            'year1sm' => $year1sm,
            'last_date1' => $last_date1,
            'ddd1' => $ddd1,
            'trial2' => $trial2,
            'leave2' => $leave2,
        ];
        
        // Render using legacy header for compatibility
        $this->renderLegacyView('admin/dashboard', $data);
    }
    
    /**
     * Register helper functions globally for view compatibility
     */
    private function registerHelperFunctions() {
        $controller = $this;
        
        // Register today function
        if (!function_exists('today')) {
            function today($var1, $var2) {
                global $conn;
                $stmt = $conn->prepare("SELECT COUNT(*) as count FROM class_history WHERE date_admin = ? AND monitor_id = ?");
                if ($stmt) {
                    $stmt->bind_param("si", $var1, $var2);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $row = $result->fetch_assoc();
                    $rnumberOfRows = $row['count'] ?? 0;
                    $stmt->close();
                    echo $rnumberOfRows;
                } else {
                    echo '0';
                }
            }
        }
        
        // Register group_name function
        if (!function_exists('group_name')) {
            function group_name($var) {
                global $conn;
                $stmt = $conn->prepare("SELECT cat_name FROM employee_catagory WHERE cat_id = ?");
                if ($stmt) {
                    $stmt->bind_param("i", $var);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        echo htmlspecialchars($row['cat_name'] ?? 'General', ENT_QUOTES, 'UTF-8');
                    } else {
                        echo 'General';
                    }
                    $stmt->close();
                } else {
                    echo 'General';
                }
            }
        }
        
        // Register pen_task function
        if (!function_exists('pen_task')) {
            function pen_task() {
                global $conn;
                $stmt = $conn->prepare("SELECT COUNT(*) as count FROM task WHERE status = 1");
                if ($stmt) {
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $row = $result->fetch_assoc();
                    $numberOfRowsot = $row['count'] ?? 0;
                    $stmt->close();
                    echo number_format($numberOfRowsot, 0);
                } else {
                    echo '0';
                }
            }
        }
        
        // Register active_ann function
        if (!function_exists('active_ann')) {
            function active_ann($d) {
                global $conn;
                $stmt = $conn->prepare("SELECT COUNT(*) as count FROM announcement WHERE ann_date <= ? AND ann_end >= ?");
                if ($stmt) {
                    $stmt->bind_param("ss", $d, $d);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $row = $result->fetch_assoc();
                    $numberOfRowsot = $row['count'] ?? 0;
                    $stmt->close();
                    echo number_format($numberOfRowsot, 0);
                } else {
                    echo '0';
                }
            }
        }
        
        // Register csr_active function
        if (!function_exists('csr_active')) {
            function csr_active($var) {
                global $conn;
                $stmt = $conn->prepare("SELECT COUNT(*) as count FROM new_request WHERE csr_id = ? AND status = 7");
                if ($stmt) {
                    $stmt->bind_param("i", $var);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $row = $result->fetch_assoc();
                    $tnumberOfRows = $row['count'] ?? 0;
                    $stmt->close();
                    echo number_format($tnumberOfRows, 0);
                } else {
                    echo '0';
                }
            }
        }
        
        // Register csr_remove function
        if (!function_exists('csr_remove')) {
            function csr_remove($var) {
                global $conn;
                $stmt = $conn->prepare("SELECT COUNT(*) as count FROM new_request WHERE csr_id = ? AND status = 6");
                if ($stmt) {
                    $stmt->bind_param("i", $var);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $row = $result->fetch_assoc();
                    $tnumberOfRows = $row['count'] ?? 0;
                    $stmt->close();
                    echo number_format($tnumberOfRows, 0);
                } else {
                    echo '0';
                }
            }
        }
        
        // Register csr_trials function
        if (!function_exists('csr_trials')) {
            function csr_trials($var) {
                global $conn;
                $mm_id = date('m', strtotime('now +1 hour'));
                $yy_id = date('Y', strtotime('now +1 hour'));
                $stmt = $conn->prepare("SELECT COUNT(*) as count FROM account WHERE csr_id = ? AND MONTH(trial_date) = ? AND YEAR(trial_date) = ?");
                if ($stmt) {
                    $stmt->bind_param("iii", $var, $mm_id, $yy_id);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $row = $result->fetch_assoc();
                    $tnumberOfRows = $row['count'] ?? 0;
                    $stmt->close();
                    echo number_format($tnumberOfRows, 0);
                } else {
                    echo '0';
                }
            }
        }
        
        // Register csr_regulars function
        if (!function_exists('csr_regulars')) {
            function csr_regulars($var) {
                global $conn;
                $mm_id = date('m', strtotime('now +1 hour'));
                $yy_id = date('Y', strtotime('now +1 hour'));
                $stmt = $conn->prepare("SELECT COUNT(*) as count FROM account WHERE csr_id = ? AND MONTH(regular_date) = ? AND YEAR(regular_date) = ?");
                if ($stmt) {
                    $stmt->bind_param("iii", $var, $mm_id, $yy_id);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $row = $result->fetch_assoc();
                    $tnumberOfRows = $row['count'] ?? 0;
                    $stmt->close();
                    echo number_format($tnumberOfRows, 0);
                } else {
                    echo '0';
                }
            }
        }
        
        // Register csr_per function
        if (!function_exists('csr_per')) {
            function csr_per($var) {
                global $conn;
                $mm_id = date('m', strtotime('now +1 hour'));
                $yy_id = date('Y', strtotime('now +1 hour'));
                
                // Get regular count
                $stmt_regular = $conn->prepare("SELECT COUNT(*) as count FROM account WHERE csr_id = ? AND MONTH(regular_date) = ? AND YEAR(regular_date) = ?");
                if (!$stmt_regular) {
                    echo '0.00';
                    return;
                }
                $stmt_regular->bind_param("iii", $var, $mm_id, $yy_id);
                $stmt_regular->execute();
                $result_regular = $stmt_regular->get_result();
                $row_regular = $result_regular->fetch_assoc();
                $regular = $row_regular['count'] ?? 0;
                $stmt_regular->close();
                
                // Get total performance count
                $stmt_total = $conn->prepare("SELECT COUNT(*) as count FROM csr_performance WHERE csr_id = ? AND status = 1 AND MONTH(date) = ? AND YEAR(date) = ?");
                if (!$stmt_total) {
                    echo '0.00';
                    return;
                }
                $stmt_total->bind_param("iii", $var, $mm_id, $yy_id);
                $stmt_total->execute();
                $result_total = $stmt_total->get_result();
                $row_total = $result_total->fetch_assoc();
                $total = $row_total['count'] ?? 0;
                $stmt_total->close();
                
                // Prevent division by zero
                if ($total > 0) {
                    $avg = ($regular / $total) * 100;
                    echo number_format($avg, 2);
                } else {
                    echo '0.00';
                }
            }
        }
        
        // Note: req_note() and csr() are defined in home-functions.php or monitoring-functions.php
        // They will be available after home-functions.php is included
        // No need to redeclare them here
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
    
    /**
     * Helper function: Get count by date and monitor
     */
    public function today($var1, $var2) {
        global $conn;
        $stmt = $conn->prepare("SELECT COUNT(*) as count FROM class_history WHERE date_admin = ? AND monitor_id = ?");
        if ($stmt) {
            $stmt->bind_param("si", $var1, $var2);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            $count = $row['count'] ?? 0;
            $stmt->close();
            return $count;
        }
        return 0;
    }
    
    /**
     * Helper function: Get group name
     */
    public function group_name($var) {
        global $conn;
        $stmt = $conn->prepare("SELECT cat_name FROM employee_catagory WHERE cat_id = ?");
        if ($stmt) {
            $stmt->bind_param("i", $var);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $stmt->close();
                return htmlspecialchars($row['cat_name'] ?? 'General', ENT_QUOTES, 'UTF-8');
            }
            $stmt->close();
        }
        return 'General';
    }
    
    /**
     * Helper function: Get pending tasks count
     */
    public function pen_task() {
        global $conn;
        $stmt = $conn->prepare("SELECT COUNT(*) as count FROM task WHERE status = 1");
        if ($stmt) {
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            $count = $row['count'] ?? 0;
            $stmt->close();
            return number_format($count, 0);
        }
        return '0';
    }
    
    /**
     * Helper function: Get active announcements
     */
    public function active_ann($d) {
        global $conn;
        $stmt = $conn->prepare("SELECT COUNT(*) as count FROM announcement WHERE ann_date <= ? AND ann_end >= ?");
        if ($stmt) {
            $stmt->bind_param("ss", $d, $d);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            $count = $row['count'] ?? 0;
            $stmt->close();
            return number_format($count, 0);
        }
        return '0';
    }
    
    /**
     * Helper function: CSR active requests
     */
    public function csr_active($var) {
        global $conn;
        $stmt = $conn->prepare("SELECT COUNT(*) as count FROM new_request WHERE csr_id = ? AND status = 7");
        if ($stmt) {
            $stmt->bind_param("i", $var);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            $count = $row['count'] ?? 0;
            $stmt->close();
            return number_format($count, 0);
        }
        return '0';
    }
    
    /**
     * Helper function: CSR removed requests
     */
    public function csr_remove($var) {
        global $conn;
        $stmt = $conn->prepare("SELECT COUNT(*) as count FROM new_request WHERE csr_id = ? AND status = 6");
        if ($stmt) {
            $stmt->bind_param("i", $var);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            $count = $row['count'] ?? 0;
            $stmt->close();
            return number_format($count, 0);
        }
        return '0';
    }
    
    /**
     * Helper function: CSR trials this month
     */
    public function csr_trials($var) {
        global $conn;
        $mm_id = date('m', strtotime('now +1 hour'));
        $yy_id = date('Y', strtotime('now +1 hour'));
        $stmt = $conn->prepare("SELECT COUNT(*) as count FROM account WHERE csr_id = ? AND MONTH(trial_date) = ? AND YEAR(trial_date) = ?");
        if ($stmt) {
            $stmt->bind_param("iii", $var, $mm_id, $yy_id);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            $count = $row['count'] ?? 0;
            $stmt->close();
            return number_format($count, 0);
        }
        return '0';
    }
    
    /**
     * Helper function: CSR regulars this month
     */
    public function csr_regulars($var) {
        global $conn;
        $mm_id = date('m', strtotime('now +1 hour'));
        $yy_id = date('Y', strtotime('now +1 hour'));
        $stmt = $conn->prepare("SELECT COUNT(*) as count FROM account WHERE csr_id = ? AND MONTH(regular_date) = ? AND YEAR(regular_date) = ?");
        if ($stmt) {
            $stmt->bind_param("iii", $var, $mm_id, $yy_id);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            $count = $row['count'] ?? 0;
            $stmt->close();
            return number_format($count, 0);
        }
        return '0';
    }
    
    /**
     * Helper function: CSR performance percentage
     */
    public function csr_per($var) {
        global $conn;
        $mm_id = date('m', strtotime('now +1 hour'));
        $yy_id = date('Y', strtotime('now +1 hour'));
        
        // Get regular count
        $stmt_regular = $conn->prepare("SELECT COUNT(*) as count FROM account WHERE csr_id = ? AND MONTH(regular_date) = ? AND YEAR(regular_date) = ?");
        if (!$stmt_regular) {
            return '0.00';
        }
        $stmt_regular->bind_param("iii", $var, $mm_id, $yy_id);
        $stmt_regular->execute();
        $result_regular = $stmt_regular->get_result();
        $row_regular = $result_regular->fetch_assoc();
        $regular = $row_regular['count'] ?? 0;
        $stmt_regular->close();
        
        // Get total performance count
        $stmt_total = $conn->prepare("SELECT COUNT(*) as count FROM csr_performance WHERE csr_id = ? AND status = 1 AND MONTH(date) = ? AND YEAR(date) = ?");
        if (!$stmt_total) {
            return '0.00';
        }
        $stmt_total->bind_param("iii", $var, $mm_id, $yy_id);
        $stmt_total->execute();
        $result_total = $stmt_total->get_result();
        $row_total = $result_total->fetch_assoc();
        $total = $row_total['count'] ?? 0;
        $stmt_total->close();
        
        // Prevent division by zero
        if ($total > 0) {
            $avg = ($regular / $total) * 100;
            return number_format($avg, 2);
        }
        return '0.00';
    }
}

