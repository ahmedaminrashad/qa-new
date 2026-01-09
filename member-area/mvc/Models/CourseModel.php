<?php
/**
 * Course Model
 */
class CourseModel extends Model {
    protected $table = 'course';
    protected $primaryKey = 'course_id';
    
    /**
     * Get active students count
     */
    public function getActiveCount() {
        $sql = "SELECT COUNT(*) as count FROM {$this->table} WHERE nature = 1";
        $result = $this->query($sql);
        if ($result) {
            $row = $result->fetch_assoc();
            return $row['count'] ?? 0;
        }
        return 0;
    }
    
    /**
     * Get course by ID
     */
    public function getById($id) {
        return $this->find($id);
    }
}

