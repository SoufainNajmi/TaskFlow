<?php
namespace App\Models;

require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/Task.php';


class TaskModel {
    private $db;
    
    public function __construct() {
        $database = \Database::getInstance();
        $this->db = $database->getConnection();
    }

    public function findAll($filter = null) {
        $sql = "SELECT * FROM tasks";
        
        if ($filter === 'done') {
            $sql .= " WHERE done = 1";
        } elseif ($filter === 'pending') {
            $sql .= " WHERE done = 0";
        }
        
        $sql .= " ORDER BY created_at DESC";
        $stmt = $this->db->query($sql);
        
        $tasks = [];
        while ($row = $stmt->fetch()) {
            $tasks[] = new Task($row);
        }
        return $tasks;
    }
    
}
?>