<?php
/**
 * Profile Model (for employees/teachers/CSR)
 */
class ProfileModel extends Model {
    protected $table = 'profile';
    protected $primaryKey = 'teacher_id';
    
    /**
     * Get active CSR profiles
     */
    public function getActiveCSR() {
        $sql = "SELECT * FROM {$this->table} 
                WHERE (cat_id = 7 OR csr_rights = 1) AND active = 1 
                ORDER BY teacher_id DESC";
        $result = $this->query($sql);
        $rows = [];
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
        }
        return $rows;
    }
}

