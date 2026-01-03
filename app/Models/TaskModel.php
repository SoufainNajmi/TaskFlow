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
    public function findById($id) {
        $stmt = $this->db->prepare("SELECT * FROM tasks WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $data = $stmt->fetch();
        
        return $data ? new Task($data) : null;
    }
    public function save(Task $task) {
        if ($task->getId()) {
            return $this->update($task);
        } else {
            return $this->create($task);
        }
    }
    private function create(Task $task) {
        $sql = "INSERT INTO tasks (title, description, priority, done) 
                VALUES (:title, :description, :priority, :done)";
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':title' => $task->getTitle(),
            ':description' => $task->getDescription(),
            ':priority' => $task->getPriority(),
            ':done' => $task->isDone() ? 1 : 0
        ]);
        
        return $this->db->lastInsertId();
    }
    private function update(Task $task) {
        $sql = "UPDATE tasks SET 
                title = :title,
                description = :description,
                priority = :priority,
                done = :done
                WHERE id = :id";
        
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':title' => $task->getTitle(),
            ':description' => $task->getDescription(),
            ':priority' => $task->getPriority(),
            ':done' => $task->isDone() ? 1 : 0,
            ':id' => $task->getId()
        ]);
    }
      public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM tasks WHERE id = :id");
        return $stmt->execute([':id' => $id]);
    }
    public function toggleStatus($id) {
        $task = $this->findById($id);
        if ($task) {
            $task->setDone(!$task->isDone());
            return $this->save($task);
        }
        return false;
    }   
     
     public function search($keyword) {
        $sql = "SELECT * FROM tasks 
                WHERE title LIKE :keyword 
                OR description LIKE :keyword
                ORDER BY created_at DESC";
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':keyword' => "%$keyword%"]);
        
        $tasks = [];
        while ($row = $stmt->fetch()) {
            $tasks[] = new Task($row);
        }
        return $tasks;
    }
    
    
}
?>