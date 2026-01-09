<?php
/**
 * NewRequest Model
 */
class NewRequestModel extends Model {
    protected $table = 'new_request';
    protected $primaryKey = 'request_id';
    
    /**
     * Get pending requests (status = 1)
     */
    public function getPendingRequests($limit = null) {
        $sql = "SELECT * FROM {$this->table} WHERE status = 1 ORDER BY request_id DESC";
        if ($limit) {
            $sql .= " LIMIT " . (int)$limit;
        }
        $result = $this->query($sql);
        $rows = [];
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
        }
        return $rows;
    }
    
    /**
     * Get count by status
     */
    public function getCountByStatus($status) {
        $sql = "SELECT COUNT(*) as count FROM {$this->table} WHERE status = ?";
        $result = $this->query($sql, [(int)$status]);
        if ($result) {
            $row = $result->fetch_assoc();
            return $row['count'] ?? 0;
        }
        return 0;
    }
    
    /**
     * Get count by CSR and status
     */
    public function getCountByCsrAndStatus($csrId, $status) {
        $sql = "SELECT COUNT(*) as count FROM {$this->table} WHERE csr_id = ? AND status = ?";
        $result = $this->query($sql, [(int)$csrId, (int)$status]);
        if ($result) {
            $row = $result->fetch_assoc();
            return $row['count'] ?? 0;
        }
        return 0;
    }
}

