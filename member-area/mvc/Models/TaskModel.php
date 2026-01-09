<?php
/**
 * Task Model
 */
class TaskModel extends Model {
    protected $table = 'task';
    protected $primaryKey = 'task_id';
    
    /**
     * Get pending tasks with manager info
     */
    public function getPendingTasksWithManager() {
        $sql = "SELECT `task`.*, `profile`.`teacher_name` 
                FROM `task`,`profile` 
                WHERE task.manager=profile.teacher_id AND task.status = 1 
                ORDER BY task_id DESC";
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

