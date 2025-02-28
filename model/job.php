<?php
require_once __DIR__ . '/../config/database.php';

class Job {
    private $db;

    public function __construct() {
        $this->db = (new Database())->conn;
    }

    public function getAllJobs() {
        $query = "SELECT * FROM jobs";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function searchJobs($keyword) {
        $query = "SELECT * FROM jobs 
                  WHERE title LIKE :keyword 
                     OR location LIKE :keyword 
                     OR description LIKE :keyword 
                     OR salary LIKE :keyword 
                     OR division LIKE :keyword";

        $stmt = $this->db->prepare($query);
        $searchTerm = "%" . $keyword . "%";
        $stmt->bindParam(':keyword', $searchTerm, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getJobById($id) {
        $query = "SELECT * FROM jobs WHERE id = :id LIMIT 1";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
}
?>
