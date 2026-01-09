<?php
/**
 * Base Model Class
 * All models should extend this class
 */
class Model {
    protected $db;
    protected $table;
    protected $primaryKey = 'id';

    public function __construct($db = null) {
        global $conn;
        $this->db = $db ?: $conn;
        
        if (!$this->db instanceof mysqli) {
            throw new Exception('Database connection not available');
        }
    }

    /**
     * Execute a query
     */
    protected function query($sql, $params = []) {
        if (empty($params)) {
            $result = $this->db->query($sql);
            if (!$result) {
                error_log("Query failed: " . $this->db->error . " - SQL: " . $sql);
                return false;
            }
            return $result;
        }
        
        $stmt = $this->db->prepare($sql);
        if (!$stmt) {
            error_log("Prepare failed: " . $this->db->error);
            return false;
        }
        
        if (!empty($params)) {
            $types = '';
            foreach ($params as $param) {
                if (is_int($param)) {
                    $types .= 'i';
                } elseif (is_float($param)) {
                    $types .= 'd';
                } else {
                    $types .= 's';
                }
            }
            $stmt->bind_param($types, ...$params);
        }
        
        if (!$stmt->execute()) {
            error_log("Execute failed: " . $stmt->error);
            $stmt->close();
            return false;
        }
        
        $result = $stmt->get_result();
        $stmt->close();
        return $result;
    }

    /**
     * Find a record by ID
     */
    public function find($id) {
        $sql = "SELECT * FROM {$this->table} WHERE {$this->primaryKey} = ?";
        $result = $this->query($sql, [$id]);
        if ($result) {
            return $result->fetch_assoc();
        }
        return null;
    }

    /**
     * Find all records
     */
    public function findAll($conditions = [], $orderBy = null, $limit = null) {
        $sql = "SELECT * FROM {$this->table}";
        $params = [];
        
        if (!empty($conditions)) {
            $where = [];
            foreach ($conditions as $field => $value) {
                $where[] = "$field = ?";
                $params[] = $value;
            }
            $sql .= " WHERE " . implode(" AND ", $where);
        }
        
        if ($orderBy) {
            $sql .= " ORDER BY $orderBy";
        }
        
        if ($limit) {
            $sql .= " LIMIT $limit";
        }
        
        $result = $this->query($sql, $params);
        if ($result) {
            $rows = [];
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
            return $rows;
        }
        return [];
    }

    /**
     * Insert a record
     */
    public function insert($data) {
        $fields = array_keys($data);
        $values = array_values($data);
        $placeholders = str_repeat('?,', count($values) - 1) . '?';
        
        $sql = "INSERT INTO {$this->table} (" . implode(', ', $fields) . ") VALUES ($placeholders)";
        $result = $this->query($sql, $values);
        
        if ($result) {
            return $this->db->insert_id;
        }
        return false;
    }

    /**
     * Update a record
     */
    public function update($id, $data) {
        $fields = [];
        $values = [];
        
        foreach ($data as $field => $value) {
            $fields[] = "$field = ?";
            $values[] = $value;
        }
        
        $values[] = $id;
        $sql = "UPDATE {$this->table} SET " . implode(', ', $fields) . " WHERE {$this->primaryKey} = ?";
        
        return $this->query($sql, $values);
    }

    /**
     * Delete a record
     */
    public function delete($id) {
        $sql = "DELETE FROM {$this->table} WHERE {$this->primaryKey} = ?";
        return $this->query($sql, [$id]);
    }

    /**
     * Execute raw SQL query (for complex queries)
     */
    public function rawQuery($sql, $params = []) {
        return $this->query($sql, $params);
    }
}

