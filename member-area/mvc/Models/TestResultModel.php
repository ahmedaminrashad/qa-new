<?php
/**
 * TestResult Model
 */
class TestResultModel extends Model {
    protected $table = 'test_results';
    protected $primaryKey = 'test_result_id';
    
    /**
     * Get count by month, year, and status
     */
    public function getCountByMonthYearStatus($month, $year, $statusId = null) {
        $sql = "SELECT COUNT(*) as count FROM {$this->table} WHERE MONTH(test_date) = ? AND YEAR(test_date) = ?";
        $params = [(int)$month, (int)$year];
        
        if ($statusId !== null) {
            $sql .= " AND status_id = ?";
            $params[] = (int)$statusId;
        }
        
        $result = $this->query($sql, $params);
        if ($result) {
            $row = $result->fetch_assoc();
            return $row['count'] ?? 0;
        }
        return 0;
    }
}

