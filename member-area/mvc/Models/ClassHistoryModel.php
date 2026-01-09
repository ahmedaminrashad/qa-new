<?php
/**
 * ClassHistory Model
 * Handles database operations for class_history table
 */
class ClassHistoryModel extends Model {
    protected $table = 'class_history';
    protected $primaryKey = 'history_id';
    
    /**
     * Get classes by admin date
     */
    public function getByDate($date, $teacherId = null) {
        $conditions = ['date_admin' => $date];
        if ($teacherId) {
            $conditions['teacher_id'] = $teacherId;
        }
        return $this->findAll($conditions, 'start_time_A ASC');
    }
    
    /**
     * Get count by date and monitor_id
     */
    public function getCountByDateAndMonitor($date, $monitorId) {
        $sql = "SELECT COUNT(*) as count FROM {$this->table} WHERE date_admin = ? AND monitor_id = ?";
        $result = $this->query($sql, [$date, $monitorId]);
        if ($result) {
            $row = $result->fetch_assoc();
            return $row['count'] ?? 0;
        }
        return 0;
    }
    
    /**
     * Get count by date and status
     */
    public function getCountByDateAndStatus($date, $status) {
        $sql = "SELECT COUNT(*) as count FROM {$this->table} WHERE date_admin = ? AND status = ?";
        $result = $this->query($sql, [$date, $status]);
        if ($result) {
            $row = $result->fetch_assoc();
            return $row['count'] ?? 0;
        }
        return 0;
    }
    
    /**
     * Get total count by date
     */
    public function getTotalByDate($date) {
        $sql = "SELECT COUNT(*) as count FROM {$this->table} WHERE date_admin = ?";
        $result = $this->query($sql, [$date]);
        if ($result) {
            $row = $result->fetch_assoc();
            return $row['count'] ?? 0;
        }
        return 0;
    }
}

