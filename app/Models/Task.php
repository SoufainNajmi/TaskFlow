<?php

class Task {
    private $id;
    private $title;
    private $description;
    private $priority;
    private $done;
    private $created_at;
    
    public function __construct($data = []) {
        if (isset($data['id'])) $this->id = $data['id'];
        if (isset($data['title'])) $this->title = $data['title'];
        if (isset($data['description'])) $this->description = $data['description'];
        if (isset($data['priority'])) $this->priority = $data['priority'];
        if (isset($data['done'])) $this->done = $data['done'];
        if (isset($data['created_at'])) $this->created_at = $data['created_at'];
    }
    
    // Getters
    public function getId() { return $this->id; }
    public function getTitle() { return $this->title; }
    public function getDescription() { return $this->description; }
    public function getPriority() { return $this->priority; }
    public function isDone() { return $this->done; }
    public function getCreatedAt() { return $this->created_at; }
    
    // Setters
    public function setTitle($title) { $this->title = $title; }
    public function setDescription($description) { $this->description = $description; }
    public function setPriority($priority) { $this->priority = $priority; }
    public function setDone($done) { $this->done = $done; }
    
    public function toArray() {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'priority' => $this->priority,
            'done' => $this->done,
            'created_at' => $this->created_at
        ];
    }
}


?>