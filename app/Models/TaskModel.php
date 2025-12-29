<?php
namespace App\Models;

require_once __DIR__ . '/../../config/database.php';

class TaskModel {
    private $db;
    
    public function __construct() {
        $database = \Database::getInstance();
        $this->db = $database->getConnection();
    }
}
?>