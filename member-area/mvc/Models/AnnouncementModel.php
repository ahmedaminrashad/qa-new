<?php
/**
 * Announcement Model
 */
class AnnouncementModel extends Model {
    protected $table = 'announcement';
    protected $primaryKey = 'ann_id';
    
    /**
     * Get active announcements for a date
     */
    public function getActiveByDate($date) {
        $sql = "SELECT * FROM {$this->table} WHERE ann_date <= ? AND ann_end >= ? ORDER BY ann_id DESC";
        $result = $this->query($sql, [$date, $date]);
        $rows = [];
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
        }
        return $rows;
    }
}

